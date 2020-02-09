<?php

namespace App\GraphQL\Types\Input\Filters;

use GraphQL\Type\Definition\Type;

class FiltersStudentType extends FiltersType
{
    public const TYPE_NAME = 'FiltersStudentInputType';
    public const FIELD_IS_ADDITIONAL = 'is_additional';
    public const FIELD_IS_PREMIUM = 'is_premium';

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
            ]
        ]);
    }
}
