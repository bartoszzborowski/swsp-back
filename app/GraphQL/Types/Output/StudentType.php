<?php

namespace App\GraphQL\Types\Output;

use App\Models\Student;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class StudentType extends GraphQLType
{
    public const TYPE_NAME = 'StudentType';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'description' => 'A user',
        'model' => Student::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
            ],
            'user' => [
                'type' => GraphQL::type(UserType::TYPE_NAME),
            ],
            'parent' => [
                'type' => GraphQL::type(ParentType::TYPE_NAME)
            ],
            'classes' => [
                'type' => GraphQL::type(ClassType::TYPE_NAME)
            ],
            'session' => [
                'type' => GraphQL::type(SessionType::TYPE_NAME)
            ]
        ];
    }
}
