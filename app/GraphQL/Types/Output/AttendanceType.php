<?php

namespace App\GraphQL\Types\Output;

use App\Models\StudentParent;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AttendanceType extends GraphQLType
{
    public const TYPE_NAME = 'AttendanceType';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'description' => 'A parent',
        'model' => StudentParent::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
        ];
    }
}
