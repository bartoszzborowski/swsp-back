<?php

namespace App\GraphQL\Types\Input;

use App\Models\Session;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SessionType extends GraphQLType
{
    public const TYPE_NAME = 'SessionInputType';

    public const FIELD_NAME = 'name';
    public const FIELD_STATUS = 'status';
    public const FIELD_SCHOOL_ID = 'school_id';

    protected $inputObject = true;

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => Session::class,
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_NAME => [
                'type' => Type::string()
            ],
            self::FIELD_SCHOOL_ID => [
                'type' => Type::int()
            ],
            self::FIELD_STATUS => [
                'type' => Type::int()
            ]
        ]);
    }
}
