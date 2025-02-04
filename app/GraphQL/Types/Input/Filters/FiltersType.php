<?php

namespace App\GraphQL\Types\Input\Filters;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class FiltersType extends GraphQLType
{
    public const TYPE_NAME = 'FiltersInputType';
    public const FIELD_ID = 'id';
    public const FIELD_SCHOOL_ID = 'school_id';

    protected $inputObject = true;

    protected $attributes = [
        'name' => self::TYPE_NAME
    ];


    public function fields(): array
    {
        return [
            self::FIELD_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SCHOOL_ID => [
                'type' => Type::int()
            ],
        ];
    }
}
