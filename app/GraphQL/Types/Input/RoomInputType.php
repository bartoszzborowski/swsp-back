<?php

namespace App\GraphQL\Types\Input;

use App\Models\ClassRoom;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class RoomInputType extends GraphQLType
{
    public const TYPE_NAME = 'RoomInputType';

    public const FIELD_NAME = 'name';
    public const FIELD_CAPACITY = 'capacity';
    public const FIELD_SCHOOL_ID = 'school_id';

    protected $inputObject = true;

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => ClassRoom::class,
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_NAME => [
                'type' => Type::string()
            ],
            self::FIELD_CAPACITY => [
                'type' => Type::int()
            ],
            self::FIELD_SCHOOL_ID => [
                'type' => Type::int()
            ],
        ]);
    }
}
