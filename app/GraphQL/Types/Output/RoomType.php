<?php

namespace App\GraphQL\Types\Output;

use App\Models\Classes;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class RoomType extends GraphQLType
{
    public const TYPE_NAME = 'RoomType';

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
            'school_id' => [
                'type' => Type::int(),
            ],
            'capacity' => [
                'type' => Type::int(),
            ],
        ];
    }
}
