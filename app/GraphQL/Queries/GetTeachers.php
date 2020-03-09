<?php

namespace App\GraphQL\Queries;

use App\Constants\GraphQL as GraphQLConstants;
use App\Criteria\GetByIdCriteria;
use App\GraphQL\Types\Input\Filters\FiltersType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Output\ClassType;
use App\GraphQL\Types\Output\TeacherType;
use App\Repository\ClassRepository;
use App\Repository\TeacherRepository;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

class GetTeachers extends Query
{
    public const QUERY_NAME = 'teachers';

    protected $attributes = [
        'name' => self::QUERY_NAME
    ];

    public function type(): Type
    {
        return GraphQL::paginate(TeacherType::TYPE_NAME);
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
        /** @var TeacherRepository $teacherRepository */
        $teacherRepository = app(TeacherRepository::class);
        // FILTER ARGUMENTS //
        $filters = $this->getFiltersFromQuery($args);
        [$take, $page] = $this->getPaginationFromQuery($args);

        foreach ($filters as $index => $value) {
            switch ($index) {
                case FiltersType::FIELD_ID:
                    $teacherRepository->pushCriteria(new GetByIdCriteria($value));
                    break;
            }
        }

        return $teacherRepository->paginate($take, $page);
    }
}
