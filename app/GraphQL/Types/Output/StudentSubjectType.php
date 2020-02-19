<?php

namespace App\GraphQL\Types\Output;

use App\Models\Classes;
use App\Models\StudentSubject;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class StudentSubjectType extends GraphQLType
{
    public const TYPE_NAME = 'StudentSubjectType';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => StudentSubject::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
            ],
            'name' => [
                'type' => Type::string(),
            ],
        ];
    }
}
