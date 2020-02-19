<?php

namespace App\GraphQL\Types\Input;

use App\Models\Student;
use GraphQL\Type\Definition\Type;

class UpdateStudentType extends UserRegisterType
{
    public const TYPE_NAME = 'UpdateStudentInputType';

    public const FIELD_PARENT_ID = 'parent_id';
    public const FIELD_SCHOOL_ID = 'school_id';
    public const FIELD_CLASSES_ID = 'classes_id';
    public const FIELD_SESSION_ID = 'session_id';
    public const FIELD_STUDENT_ID = 'id';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => Student::class,
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_PARENT_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SCHOOL_ID => [
                'type' => Type::int()
            ],
            self::FIELD_STUDENT_ID => [
                'type' => Type::int()
            ],
            self::FIELD_CLASSES_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SESSION_ID => [
                'type' => Type::int()
            ],
        ]);
    }
}
