<?php

namespace App\GraphQL\Types\Input;

use App\Models\StudentSubject;
use GraphQL\Type\Definition\Type;

class UpdateStudentSubjectInputType extends StudentSubjectInputType
{
    public const TYPE_NAME = 'UpdateStudentSubjectInputType';

    public const FIELD_SUBJECT_ID = 'id';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => StudentSubject::class,
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_SUBJECT_ID => [
                'type' => Type::int()
            ],
        ]);
    }
}
