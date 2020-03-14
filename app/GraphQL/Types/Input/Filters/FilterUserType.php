<?php

namespace App\GraphQL\Types\Input\Filters;

use App\GraphQL\Type\Enum\RoleTypeEnum;
use Rebing\GraphQL\Support\Facades\GraphQL;

class FilterUserType extends FiltersType
{
    public const TYPE_NAME = 'FiltersUserInputType';

    public const FIELD_ROLE = 'role';

    protected $attributes = [
        'name' => self::TYPE_NAME
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_ROLE => [
                'type' => GraphQL::type(RoleTypeEnum::TYPE_NAME)
            ],
        ]);
    }
}
