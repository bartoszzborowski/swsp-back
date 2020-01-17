<?php

namespace App\GraphQL\Types\Input;

use App\Models\Student;
use GraphQL\Type\Definition\Type;

class StudentType extends UserRegisterType
{
    public const TYPE_NAME = 'StudentInputType';

    public const FIELD_PARENT_ID = 'parent_id';
    public const FIELD_SCHOOL_ID = 'school_id';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'description' => 'A user',
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
            ]
        ]);
    }
}
