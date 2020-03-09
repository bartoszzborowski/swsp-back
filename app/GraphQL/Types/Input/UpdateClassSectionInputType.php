<?php

namespace App\GraphQL\Types\Input;

use App\Models\ClassSection;
use GraphQL\Type\Definition\Type;

class UpdateClassSectionInputType extends ClassSectionInputType
{
    public const TYPE_NAME = 'UpdateClassSectionInputType';

    public const FIELD_SECTION_ID = 'id';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => ClassSection::class,
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_SECTION_ID => [
                'type' => Type::int()
            ],
        ]);
    }
}
