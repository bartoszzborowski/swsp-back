<?php

namespace App\GraphQL\Types\Input;

use App\Models\DailyAttendance;
use GraphQL\Type\Definition\Type;

class UpdateAttendanceType extends AttendanceType
{
    public const TYPE_NAME = 'UpdateAttendanceInputType';

    public const FIELD_SESSION_ID = 'id';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => DailyAttendance::class,
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_SESSION_ID => [
                'type' => Type::int()
            ],
        ]);
    }
}
