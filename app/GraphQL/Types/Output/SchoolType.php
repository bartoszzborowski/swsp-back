<?php

namespace App\GraphQL\Types\Output;

use App\Models\Classes;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SchoolType extends GraphQLType
{
    public const TYPE_NAME = 'SchoolType';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => Classes::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'name' => [
                'type' => Type::string(),
            ],
            'address' => [
                'type' => Type::string()
            ],
            'email' => [
                'type' => Type::string()
            ],
            'city' => [
                'type' => Type::string()
            ],
            'phone' => [
                'type' => Type::string()
            ],
            'zip_code' => [
                'type' => Type::string()
            ],
        ];
    }
}
