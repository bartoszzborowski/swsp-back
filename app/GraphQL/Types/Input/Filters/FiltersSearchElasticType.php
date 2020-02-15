<?php

namespace App\GraphQL\Types\Input\Filters;

use App\GraphQL\Type\Enum\ElasticSearchTypeEnum;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class FiltersSearchElasticType extends FiltersType
{
    public const TYPE_NAME = 'FiltersElasticSearchInputType';
    public const FIELD_IS_INDEX = 'index';
    public const FIELD_IS_QUERY = 'query';

    protected $attributes = [
        'name' => self::TYPE_NAME
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_IS_INDEX => [
                'type' => GraphQL::type(ElasticSearchTypeEnum::TYPE_NAME)
            ],
            self::FIELD_IS_QUERY => [
                'type' => Type::string()
            ]
        ]);
    }
}
