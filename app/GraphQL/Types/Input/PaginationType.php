<?php

namespace App\GraphQL\Types\Input;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PaginationType extends GraphQLType
{
    const TYPE_NAME = 'PaginateInputType';
    const FIELD_TAKE = 'take';
    const FIELD_PAGE = 'page';

    protected $inputObject = true;

    protected $attributes = [
        'name' => self::TYPE_NAME
    ];

    public function fields(): array
    {
        return [
            self::FIELD_TAKE => [
                'type' => Type::nonNull(Type::int())
            ],
            self::FIELD_PAGE => [
                'type' => Type::nonNull(Type::int())
            ],

        ];
    }
}
