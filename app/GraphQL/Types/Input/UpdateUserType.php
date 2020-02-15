<?php

namespace App\GraphQL\Types\Input;

use App\Models\User;
use GraphQL\Type\Definition\Type;

class UpdateUserType extends UserRegisterType
{
    public const TYPE_NAME = 'UpdateUserInputType';

    public const FIELD_USER_ID = 'id';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => User::class,
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_USER_ID => [
                'type' => Type::int()
            ],
        ]);
    }
}
