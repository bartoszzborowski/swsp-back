<?php

namespace App\GraphQL\Types\Input;

use App\Models\Classes;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ClassInputType extends GraphQLType
{
    public const TYPE_NAME = 'ClassInputType';

    public const FIELD_NAME = 'name';
    public const FIELD_SCHOOL_ID = 'school_id';
    public const FIELD_SECTIONS = 'sections';

    protected $inputObject = true;

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => Classes::class,
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_NAME => [
                'type' => Type::string()
            ],
            self::FIELD_SECTIONS => [
                    'type' => Type::listOf(Type::int())
            ],
            self::FIELD_SCHOOL_ID => [
                'type' => Type::int()
            ],
        ]);
    }
}
