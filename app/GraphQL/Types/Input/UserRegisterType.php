<?php

namespace App\GraphQL\Types\Input;

use App\Models\User;
use Rebing\GraphQL\Support\Field;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class UserRegisterType extends GraphQLType
{
    const TYPE_NAME = 'UserRegisterInputType';

    const FIELD_EMAIL = 'email';
    const FIELD_PASSWORD = 'password';
    const FIELD_NAME = 'name';
    const FIELD_PHONE = 'phone';
    const FIELD_ADDRESS = 'address';
    const FIELD_BLOOD_GROUP = 'blood_group';

    protected $inputObject = true;

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'description' => 'A user',
        'model' => User::class,
    ];

    public function fields(): array
    {
        return [
            self::FIELD_EMAIL => [
                'type' => Type::string()
            ],
            self::FIELD_PASSWORD => [
                'type' => Type::string()
            ],
            self::FIELD_NAME => [
                'type' => Type::string()
            ],
            self::FIELD_PHONE => [
                'type' => Type::string()
            ],
            self::FIELD_ADDRESS => [
                'type' => Type::string()
            ],
            self::FIELD_BLOOD_GROUP => [
                'type' => Type::string()
            ],
        ];
    }
}
