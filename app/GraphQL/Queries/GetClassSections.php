<?php

namespace App\GraphQL\Queries;

use App\Constants\GraphQL as GraphQLConstants;
use App\Criteria\ClassSectionCriteria;
use App\Criteria\GetByIdCriteria;
use App\GraphQL\Types\Input\Filters\FiltersSectionsType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Output\ClassSectionType;
use App\Repository\ClassSectionRepository;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

class GetClassSections extends Query
{
    public const QUERY_NAME = 'classSections';

    protected $attributes = [
        'name' => self::QUERY_NAME
    ];

    public function type(): Type
    {
        return GraphQL::paginate(ClassSectionType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            ['name' => GraphQLConstants::FILTER_ARG_NAME, 'type' => GraphQL::type(FiltersSectionsType::TYPE_NAME)],
            ['name' => GraphQLConstants::PAGINATION_ARG_NAME, 'type' => GraphQL::type(PaginationType::TYPE_NAME)],
        ];
    }

    public function resolve($root, $args)
    {
        /** @var ClassSectionRepository $classSectionRepository */
        $classSectionRepository = app(ClassSectionRepository::class);
        // FILTER ARGUMENTS //
        $filters = $this->getFiltersFromQuery($args);
        [$take, $page] = $this->getPaginationFromQuery($args);

        foreach ($filters as $index => $value) {
            switch ($index) {
                case FiltersSectionsType::FIELD_ID:
                    $classSectionRepository->pushCriteria(new GetByIdCriteria($value));
                    break;
                case FiltersSectionsType::FIELD_CLASS_ID:
                    $classSectionRepository->pushCriteria(new ClassSectionCriteria($value));
                    break;
            }
        }

        return $classSectionRepository->paginate($take, $page);
    }
}
