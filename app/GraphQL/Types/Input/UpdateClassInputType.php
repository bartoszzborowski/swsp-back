<?php

namespace App\GraphQL\Types\Input;

use App\Models\Classes;
use GraphQL\Type\Definition\Type;

class UpdateClassInputType extends ClassInputType
{
    public const TYPE_NAME = 'UpdateClassInputType';

    public const FIELD_CLASS_ID = 'id';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => Classes::class,
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
