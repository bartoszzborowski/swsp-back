<?php

namespace App\GraphQL\Types\Output;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Auth;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    public const TYPE_NAME = 'UserType';

    protected $attributes = [
        'name'        => self::TYPE_NAME,
        'description' => 'A user',
        'model'       => User::class,
    ];

    public function fields(): array
    {
        return [
            'id'    => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The id of the user',
            ],
            'email' => [
                'type'        => Type::string(),
                'description' => 'The email of user',
            ],
            'name' => [
                'type'        => Type::string(),
                'description' => 'The name of user',
            ],
            'address' => [
                'type'        => Type::string(),
                'description' => 'The address of user',
            ],
            'phone' => [
                'type'        => Type::string(),
                'description' => 'The phone of user',
            ],
            'birthday' => [
                'type'        => Type::string(),
                'description' => 'The birthday of user',
            ],
            'blood_group' => [
                'type'        => Type::string(),
                'description' => 'The blood group of user',
            ],
            'token'  => [
                'type'        => Type::string(),
                'description' => 'True, if the queried user is the current user',
                'selectable'  => true, // Does not try to query this from the database
            ]
        ];
    }
}
