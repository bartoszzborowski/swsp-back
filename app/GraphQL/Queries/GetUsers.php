<?php

namespace App\GraphQL\Queries;

use App\Constants\GraphQL as GraphQLConstants;
use App\Criteria\GetByIdCriteria;
use App\Criteria\RoleCriteria;
use App\GraphQL\Types\Input\Filters\FilterUserType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Output\UserType;
use App\Repository\UserRepository;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

class GetUsers extends Query
{
    public const QUERY_NAME = 'users';

    protected $attributes = [
        'name' => self::QUERY_NAME
    ];

    public function type(): Type
    {
        return GraphQL::paginate(UserType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            ['name' => GraphQLConstants::FILTER_ARG_NAME, 'type' => GraphQL::type(FilterUserType::TYPE_NAME)],
            ['name' => GraphQLConstants::PAGINATION_ARG_NAME, 'type' => GraphQL::type(PaginationType::TYPE_NAME)],
        ];
    }

    public function resolve($root, $args)
    {
        /** @var UserRepository $userRepository */
        $userRepository = app(UserRepository::class);
        // FILTER ARGUMENTS //
        $filters = $this->getFiltersFromQuery($args);
        [$take, $page] = $this->getPaginationFromQuery($args);

        foreach ($filters as $index => $value) {
            switch ($index) {
                case FilterUserType::FIELD_ID:
                    $userRepository->pushCriteria(new GetByIdCriteria($value));
                    break;
                case FilterUserType::FIELD_ROLE:
                    $userRepository->pushCriteria(new RoleCriteria($value));
            }
        }

        return $userRepository->paginate($take, $page);
    }
}
