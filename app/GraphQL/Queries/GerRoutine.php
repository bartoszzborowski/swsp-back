<?php

namespace App\GraphQL\Queries;

use App\Constants\GraphQL as GraphQLConstants;
use App\Criteria\GetByIdCriteria;
use App\GraphQL\Types\Input\Filters\FiltersRoutineType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Output\RoutineType;
use App\Repository\RoutineRepository;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

class GerRoutine extends Query
{
    public const QUERY_NAME = 'routine';

    protected $attributes = [
        'name' => self::QUERY_NAME
    ];

    public function type(): Type
    {
        return GraphQL::paginate(RoutineType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            ['name' => GraphQLConstants::FILTER_ARG_NAME, 'type' => GraphQL::type(FiltersRoutineType::TYPE_NAME)],
            ['name' => GraphQLConstants::PAGINATION_ARG_NAME, 'type' => GraphQL::type(PaginationType::TYPE_NAME)],
        ];
    }

    public function resolve($root, $args)
    {
        /** @var RoutineRepository $routineRepository */
        $routineRepository = app(RoutineRepository::class);
        // FILTER ARGUMENTS //
        $filters = $this->getFiltersFromQuery($args);
        [$take, $page] = $this->getPaginationFromQuery($args);

        foreach ($filters as $index => $value) {
            switch ($index) {
                case FiltersRoutineType::FIELD_ID:
                    $routineRepository->pushCriteria(new GetByIdCriteria($value));
                    break;
                case FiltersRoutineType::FIELD_SCHOOL_ID:
                    $routineRepository->pushCriteria(new GetByIdCriteria($value, 'school_id'));
                    break;
                case FiltersRoutineType::FIELD_SECTION_ID:
                    $routineRepository->pushCriteria(new GetByIdCriteria($value, 'section_id'));
                    break;
                case FiltersRoutineType::FIELD_CLASS_ID:
                    $routineRepository->pushCriteria(new GetByIdCriteria($value, 'class_id'));
                    break;
                case FiltersRoutineType::FIELD_DAY:
                    $routineRepository->pushCriteria(new GetByIdCriteria($value, 'day'));
                    break;
            }
        }

        return $routineRepository->paginate($take, $page);
    }
}
