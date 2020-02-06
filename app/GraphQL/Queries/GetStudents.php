<?php

namespace App\GraphQL\Queries;

use App\Constants\GraphQL as GraphQLConstants;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Output\StudentType;
use App\Repository\StudentRepository;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class GetStudents extends Query
{
    public const QUERY_NAME = 'students';

    protected $attributes = [
        'name' => self::QUERY_NAME
    ];

    public function type(): Type
    {
        return GraphQL::paginate(StudentType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            [
                'name' => GraphQLConstants::PAGINATION_ARG_NAME,
                'type' => GraphQL::type(PaginationType::TYPE_NAME)
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        [$take, $page] = $this->getPaginationFromQuery($args);
        /** @var StudentRepository $studentRepository */
        $studentRepository = app(StudentRepository::class);
        return $studentRepository->paginate($take, $page);
    }
}
