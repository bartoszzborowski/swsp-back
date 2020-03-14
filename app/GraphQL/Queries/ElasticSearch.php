<?php

namespace App\GraphQL\Queries;

use App\Constants\GraphQL as GraphQLConstants;
use App\Criteria\GetByIdCriteria;
use App\GraphQL\Types\Input\Filters\FiltersSearchElasticType;
use App\GraphQL\Types\Input\Filters\FiltersType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Output\SearchElasticType;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\User;
use App\Repository\ClassRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

class ElasticSearch extends Query
{
    public const QUERY_NAME = 'search';

    protected $attributes = [
        'name' => self::QUERY_NAME
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type(SearchElasticType::TYPE_NAME));
    }

    public function args(): array
    {
        return [
            ['name' => GraphQLConstants::FILTER_ARG_NAME, 'type' => GraphQL::type(FiltersSearchElasticType::TYPE_NAME)],
            ['name' => GraphQLConstants::PAGINATION_ARG_NAME, 'type' => GraphQL::type(PaginationType::TYPE_NAME)],
        ];
    }

    public function resolve($root, $args)
    {
        $filters = $this->getFiltersFromQuery($args);
        $query = empty($filters['query']) ? '*' : $filters['query'];
        $index = $filters['index'];
        $result = null;

        if ($index === 'parents') {
            $result = StudentParent::search($query)->with('user')->paginate(10);
        }

        if ($index === 'students') {
            $result = Student::search($query)->with('user')->paginate(10);
        }

        return $result;
    }
}
