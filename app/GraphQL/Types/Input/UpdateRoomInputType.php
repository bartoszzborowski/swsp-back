<?php

namespace App\GraphQL\Types\Input;

use App\Models\ClassRoom;
use App\Models\Routine;
use GraphQL\Type\Definition\Type;

class UpdateRoomInputType extends RoomInputType
{
    public const TYPE_NAME = 'UpdateRoomInputType';

    public const FIELD_ROOM_ID = 'id';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => Routine::class,
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_ROOM_ID => [
                'type' => Type::int()
            ],
        ]);
    }
}
