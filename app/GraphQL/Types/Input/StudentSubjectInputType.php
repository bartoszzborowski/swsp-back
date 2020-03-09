<?php

namespace App\GraphQL\Types\Input;

use App\Models\StudentSubject;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class StudentSubjectInputType extends GraphQLType
{
    public const TYPE_NAME = 'StudentSubjectInputType';

    public const FIELD_NAME = 'name';
    public const FIELD_SCHOOL_ID = 'school_id';

    protected $inputObject = true;

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => StudentSubject::class,
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
        ]);
    }
}
