<?php

namespace App\GraphQL\Types\Output;

use App\Models\DailyAttendance;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AttendanceType extends GraphQLType
{
    public const TYPE_NAME = 'AttendanceType';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => DailyAttendance::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'student_id' => [
                'type' => Type::int(),
            ],
            'subject_id' => [
                'type' => Type::int(),
            ],
            'status' => [
                'type' => Type::string(),
            ],
            'timestamp' => [
                'type' => Type::string(),
            ]
        ];
    }
}
