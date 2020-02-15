<?php

namespace App\GraphQL\Queries;

use App\Constants\GraphQL as GraphQLConstants;
use Rebing\GraphQL\Support\Query as RebingQuery;
use Illuminate\Support\Arr;

abstract class Query extends RebingQuery
{
    public function getPaginationFromQuery($args): array
    {
        return Arr::flatten(Arr::get($args, GraphQLConstants::PAGINATION_ARG_NAME) ?? [10, 1]) ?? [10, 1];
    }

    public function getFiltersFromQuery($args)
    {
        return Arr::get($args, GraphQLConstants::FILTER_ARG_NAME) ?? [];
    }

    public function getSortFromQuery($args)
    {
        return Arr::get($args, GraphQLConstants::SORT_ARG_NAME) ?? [];
    }
}
