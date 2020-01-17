<?php

namespace App\GraphQL\Types\Output;

use App\Models\StudentParent;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ParentType extends GraphQLType
{
    public const TYPE_NAME = 'ParentType';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'description' => 'A parent',
        'model' => StudentParent::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the user',
            ],
            'user' => [
                'type' => GraphQL::type(UserType::TYPE_NAME),
            ],
        ];
    }
}
