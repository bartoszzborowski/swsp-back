<?php

namespace App\GraphQL\Type\Enum;

use Rebing\GraphQL\Support\Type as GraphQLType;

class ElasticSearchTypeEnum extends GraphQLType
{
    public const TYPE_NAME = 'EnumElasticSearchType';

    protected $enumObject = true;

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'values' => [
            'parents',
            'students',
        ]
    ];
}
