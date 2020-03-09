<?php

namespace App\GraphQL\Types\Output;

use App\Models\Classes;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ClassSectionType extends GraphQLType
{
    public const TYPE_NAME = 'SectionType';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => Classes::class,
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
            'class_id' => [
                'type' => Type::int(),
            ],
            'school_id' => [
                'type' => Type::int(),
            ],
        ];
    }
}
