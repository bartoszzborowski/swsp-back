<?php

namespace App\GraphQL\Type\Enum;

use Rebing\GraphQL\Support\Type as GraphQLType;

class RoleTypeEnum extends GraphQLType
{
    public const TYPE_NAME = 'EnumRoleType';

    protected $enumObject = true;

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'values' => [
            'admin',
            'student',
            'teacher',
            'user',
            'parent',
        ]
    ];
}
