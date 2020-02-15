<?php

namespace App\GraphQL\Types\Output;

use App\Models\Classes;
use App\Models\Session;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SessionType extends GraphQLType
{
    public const TYPE_NAME = 'SessionType';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => Session::class,
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
            'status' => [
                'type' => Type::int(),
            ],
            'school_id' => [
                'type' => Type::int()
            ],
        ];
    }
}
