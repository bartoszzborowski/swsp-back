<?php

namespace App\GraphQL\Types\Output;

use App\Models\Classes;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class RoutineType extends GraphQLType
{
    public const TYPE_NAME = 'RoutineType';

    public const FIELD_ID = 'id';
    public const FIELD_CLASS_ID = 'class_id';
    public const FIELD_SECTION_ID = 'section_id';
    public const FIELD_SUBJECT_ID = 'subject_id';
    public const FIELD_SUBJECT = 'subject';
    public const FIELD_TEACHER_ID = 'teacher_id';
    public const FIELD_ROOM_ID = 'room_id';
    public const FIELD_STARTING_HOUR = 'starting_hour';
    public const FIELD_ENDING_HOUR = 'ending_hour';
    public const FIELD_STARTING_MINUTE = 'starting_minute';
    public const FIELD_ENDING_MINUTE = 'ending_minute';
    public const FIELD_LESSON_NUMBER = 'lesson_number';
    public const FIELD_DAY = 'day';
    public const FIELD_SCHOOL_ID = 'school_id';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => Classes::class,
    ];


    public function fields(): array
    {
        return [
            self::FIELD_ID => [
                'type' => Type::int()
            ],
            self::FIELD_CLASS_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SECTION_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SUBJECT_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SUBJECT => [
                'type' => GraphQL::type(StudentSubjectType::TYPE_NAME)
            ],
            self::FIELD_TEACHER_ID => [
                'type' => Type::int()
            ],
            self::FIELD_ROOM_ID => [
                'type' => Type::int()
            ],
            self::FIELD_STARTING_HOUR => [
                'type' => Type::string()
            ],
            self::FIELD_ENDING_HOUR => [
                'type' => Type::string()
            ],
            self::FIELD_STARTING_MINUTE => [
                'type' => Type::string()
            ],
            self::FIELD_ENDING_MINUTE => [
                'type' => Type::string()
            ],
            self::FIELD_LESSON_NUMBER => [
                'type' => Type::int()
            ],
            self::FIELD_DAY => [
                'type' => Type::string()
            ],
            self::FIELD_SCHOOL_ID => [
                'type' => Type::int()
            ]
        ];
    }
}
