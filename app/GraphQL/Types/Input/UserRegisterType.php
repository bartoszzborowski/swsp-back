<?php

namespace App\GraphQL\Types\Input;

use App\Models\User;
use Rebing\GraphQL\Support\Field;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class UserRegisterType extends GraphQLType
{
    public const TYPE_NAME = 'UserRegisterInputType';

    public const FIELD_ADDRESS = 'address';
    public const FIELD_BIRTHDAY = 'birthday';
    public const FIELD_BLOOD_GROUP = 'blood_group';
    public const FIELD_EMAIL = 'email';
    public const FIELD_GENDER = 'gender';
    public const FIELD_LAST_NAME = 'last_name';
    public const FIELD_MARITAL = 'marital';
    public const FIELD_NAME = 'name';
    public const FIELD_PASSWORD = 'password';
    public const FIELD_PHONE = 'phone';
    public const FIELD_ROLE = 'role';

    protected $inputObject = true;

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'description' => 'A user',
        'model' => User::class,
    ];

    public function fields(): array
    {
        return [
            self::FIELD_NAME => [
                'type' => Type::string()
            ],
            self::FIELD_LAST_NAME => [
                'type' => Type::string()
            ],
            self::FIELD_PHONE => [
                'type' => Type::string()
            ],
            self::FIELD_ADDRESS => [
                'type' => Type::string()
            ],
            self::FIELD_EMAIL => [
                'type' => Type::string()
            ],
            self::FIELD_PASSWORD => [
                'type' => Type::string()
            ],
            self::FIELD_BLOOD_GROUP => [
                'type' => Type::string()
            ],
            self::FIELD_BIRTHDAY => [
                'type' => Type::string()
            ],
            self::FIELD_GENDER => [
                'type' => Type::string()
            ],
            self::FIELD_MARITAL => [
                'type' => Type::string()
            ],
            self::FIELD_ROLE => [
                'type' => Type::string()
            ],
        ];
    }
}
