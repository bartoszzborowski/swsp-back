<?php

namespace App\GraphQL\Types\Input\Filters;

use GraphQL\Type\Definition\Type;

class FiltersStudentSubject extends FiltersType
{
    public const TYPE_NAME = 'FiltersStudentSubjectInputType';

    public const FIELD_CLASS_ID = 'class_id';

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
        ]);
    }
}
