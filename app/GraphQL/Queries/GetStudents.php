<?php

namespace App\GraphQL\Queries;

use App\Constants\GraphQL as GraphQLConstants;
use App\Criteria\GetByIdCriteria;
use App\GraphQL\Types\Input\Filters\FiltersStudentType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Output\StudentType;
use App\Repository\StudentRepository;
use Rebing\GraphQL\Support\Facades\GraphQL;
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
            ['name' => GraphQLConstants::FILTER_ARG_NAME, 'type' => GraphQL::type(FiltersStudentType::TYPE_NAME)],
            ['name' => GraphQLConstants::PAGINATION_ARG_NAME, 'type' => GraphQL::type(PaginationType::TYPE_NAME)],
        ];
    }

    public function resolve($root, $args)
    {
        /** @var StudentRepository $studentRepository */
        $studentRepository = app(StudentRepository::class);
        // FILTER ARGUMENTS //
        $filters = $this->getFiltersFromQuery($args);
        [$take, $page] = $this->getPaginationFromQuery($args);

        foreach ($filters as $index => $value) {
            switch ($index) {
                case FiltersStudentType::FIELD_ID:
                    $studentRepository->pushCriteria(new GetByIdCriteria($value));
                    break;
                case FiltersStudentType::FIELD_CLASS_ID:
                    $studentRepository->pushCriteria(new GetByIdCriteria($value, 'classes_id'));
                    break;
                case FiltersStudentType::FIELD_SECTION_ID:
                    $studentRepository->pushCriteria(new GetByIdCriteria($value, 'section_id'));
                    break;
                case FiltersStudentType::FIELD_USER_ID:
                    $studentRepository->pushCriteria(new GetByIdCriteria($value, 'user_id'));
                    break;
            }
        }

        return $studentRepository->paginate($take, $page);
    }
}
