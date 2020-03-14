<?php

namespace App\GraphQL\Types\Input\Filters;

use GraphQL\Type\Definition\Type;

class FiltersRoutineType extends FiltersType
{
    public const TYPE_NAME = 'FiltersRoutineType';

    public const FIELD_SECTION_ID = 'section_id';
    public const FIELD_CLASS_ID = 'class_id';
    public const FIELD_DAY = 'day';

    protected $attributes = [
        'name' => self::TYPE_NAME
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_SECTION_ID => [
                'type' => Type::int()
            ],
            self::FIELD_CLASS_ID => [
                'type' => Type::int()
            ],
            self::FIELD_DAY => [
                'type' => Type::string()
            ],
        ]);
    }
}
