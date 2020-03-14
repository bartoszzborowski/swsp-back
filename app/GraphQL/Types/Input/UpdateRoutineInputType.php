<?php

namespace App\GraphQL\Types\Input;

use App\Models\ClassRoom;
use App\Models\Routine;
use GraphQL\Type\Definition\Type;

class UpdateRoutineInputType extends RoutineInputType
{
    public const TYPE_NAME = 'UpdateRoutineInputType';

    public const FIELD_ROUTINE_ID = 'id';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => Routine::class,
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_ROUTINE_ID => [
                'type' => Type::int()
            ],
        ]);
    }
}
