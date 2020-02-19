<?php

namespace App\GraphQL\Queries;

use App\Constants\GraphQL as GraphQLConstants;
use App\Criteria\GetByIdCriteria;
use App\GraphQL\Types\Input\Filters\FiltersStudentSubject;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Output\StudentSubjectType;
use App\Repository\ClassRepository;
use App\Repository\StudentSubjectRepository;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

class GetStudentSubject extends Query
{
    public const QUERY_NAME = 'studentSubject';

    protected $attributes = [
        'name' => self::QUERY_NAME
    ];

    public function type(): Type
    {
        return GraphQL::paginate(StudentSubjectType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            ['name' => GraphQLConstants::FILTER_ARG_NAME, 'type' => GraphQL::type(FiltersStudentSubject::TYPE_NAME)],
            ['name' => GraphQLConstants::PAGINATION_ARG_NAME, 'type' => GraphQL::type(PaginationType::TYPE_NAME)],
        ];
    }

    public function resolve($root, $args)
    {
        /** @var StudentSubjectRepository $subjectRepository */
        $subjectRepository = app(StudentSubjectRepository::class);
        // FILTER ARGUMENTS //
        $filters = $this->getFiltersFromQuery($args);
        [$take, $page] = $this->getPaginationFromQuery($args);

        foreach ($filters as $index => $value) {
            switch ($index) {
                case FiltersStudentSubject::FIELD_ID:
                    $subjectRepository->pushCriteria(new GetByIdCriteria($value));
                    break;
                case FiltersStudentSubject::FIELD_CLASS_ID:
                    $subjectRepository->pushCriteria(new GetByIdCriteria($value, 'class_id'));
            }
        }

        return $subjectRepository->paginate($take, $page);
    }
}
