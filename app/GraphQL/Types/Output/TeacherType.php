<?php

namespace App\GraphQL\Types\Output;

use App\Models\Classes;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TeacherType extends GraphQLType
{
    public const TYPE_NAME = 'TeacherType';

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
            'user' => [
                'type' => GraphQL::type(UserType::TYPE_NAME),
            ],
        ];
    }
}
