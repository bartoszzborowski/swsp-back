<?php

namespace App\GraphQL\Types\Input\Filters;

use GraphQL\Type\Definition\Type;

class FiltersAttendanceType extends FiltersType
{
    public const TYPE_NAME = 'FiltersAttendanceInputType';

    public const FIELD_STUDENT_ID = 'student_id';
    public const FIELD_SUBJECT_ID = 'subject_id';
    public const FIELD_SCHOOL_ID = 'school_id';
    public const FIELD_SESSION_ID = 'session_id';
    public const FIELD_CLASS_ID = 'class_id';
    public const FIELD_SECTION_ID = 'section_id';
    public const FIELD_TIMESTAMP = 'timestamp';

    protected $attributes = [
        'name' => self::TYPE_NAME
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_CLASS_ID => [
                'type' => Type::int()
            ],
            self::FIELD_STUDENT_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SUBJECT_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SCHOOL_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SESSION_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SECTION_ID => [
                'type' => Type::int()
            ],
            self::FIELD_TIMESTAMP => [
                'type' => Type::string()
            ],
        ]);
    }
}
