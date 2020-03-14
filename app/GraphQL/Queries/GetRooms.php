<?php

namespace App\GraphQL\Queries;

use App\Constants\GraphQL as GraphQLConstants;
use App\Criteria\GetByIdCriteria;
use App\GraphQL\Types\Input\Filters\FiltersType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Output\RoomType;
use App\Repository\RoomRepository;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

class GetRooms extends Query
{
    public const QUERY_NAME = 'rooms';

    protected $attributes = [
        'name' => self::QUERY_NAME
    ];

    public function type(): Type
    {
        return GraphQL::paginate(RoomType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            ['name' => GraphQLConstants::FILTER_ARG_NAME, 'type' => GraphQL::type(FiltersType::TYPE_NAME)],
            ['name' => GraphQLConstants::PAGINATION_ARG_NAME, 'type' => GraphQL::type(PaginationType::TYPE_NAME)],
        ];
    }

    public function resolve($root, $args)
    {
        /** @var RoomRepository $roomRepository */
        $roomRepository = app(RoomRepository::class);
        // FILTER ARGUMENTS //
        $filters = $this->getFiltersFromQuery($args);
        [$take, $page] = $this->getPaginationFromQuery($args);

        foreach ($filters as $index => $value) {
            switch ($index) {
                case FiltersType::FIELD_ID:
                    $roomRepository->pushCriteria(new GetByIdCriteria($value));
                    break;
            }
        }

        return $roomRepository->paginate($take, $page);
    }
}
