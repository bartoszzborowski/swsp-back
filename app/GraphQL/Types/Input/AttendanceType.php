<?php

namespace App\GraphQL\Types\Input;

use App\Models\DailyAttendance;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AttendanceType extends GraphQLType
{
    public const TYPE_NAME = 'AttendanceInputType';

    public const FIELD_CLASS_ID = 'class_id';
    public const FIELD_STUDENT_ID = 'student_id';
    public const FIELD_SESSION_ID = 'session_id';
    public const FIELD_SECTION_ID = 'section_id';
    public const FIELD_SCHOOL_ID = 'school_id';
    public const FIELD_SUBJECT_ID = 'subject_id';
    public const FIELD_TIMESTAMP = 'timestamp';
    public const FIELD_STATUS = 'status';

    protected $inputObject = true;

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => DailyAttendance::class,
    ];

    public function fields(): array
    {
        return [
            self::FIELD_SESSION_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SCHOOL_ID => [
                'type' => Type::int()
            ],
            self::FIELD_CLASS_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SUBJECT_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SECTION_ID => [
                'type' => Type::int()
            ],
            self::FIELD_STUDENT_ID => [
                'type' => Type::int()
            ],
            self::FIELD_TIMESTAMP => [
                'type' => Type::string()
            ],
            self::FIELD_STATUS => [
                'type' => Type::string()
            ]
        ];
    }
}
