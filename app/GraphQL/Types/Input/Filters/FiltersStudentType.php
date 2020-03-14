<?php

namespace App\GraphQL\Types\Input\Filters;

use GraphQL\Type\Definition\Type;

class FiltersStudentType extends FiltersType
{
    public const TYPE_NAME = 'FiltersStudentInputType';
    public const FIELD_IS_ADDITIONAL = 'is_additional';
    public const FIELD_IS_PREMIUM = 'is_premium';
    public const FIELD_CLASS_ID = 'class_id';
    public const FIELD_SECTION_ID = 'section_id';
    public const FIELD_USER_ID = 'user_id';

    protected $attributes = [
        'name' => self::TYPE_NAME
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_IS_ADDITIONAL => [
                'type' => Type::boolean()
            ],
            self::FIELD_IS_PREMIUM => [
                'type' => Type::boolean()
            ],
            self::FIELD_CLASS_ID => [
                'type' => Type::int()
            ],
            self::FIELD_SECTION_ID => [
                'type' => Type::int()
            ],
            self::FIELD_USER_ID => [
                'type' => Type::int()
            ]
        ]);
    }
}
