<?php

namespace App\GraphQL\Types\Input;

use App\Models\Session;
use GraphQL\Type\Definition\Type;

class UpdateSessionType extends SessionType
{
    public const TYPE_NAME = 'UpdateSessionInputType';

    public const FIELD_SESSION_ID = 'id';

    protected $attributes = [
        'name' => self::TYPE_NAME,
        'model' => Session::class,
    ];

    public function fields(): array
    {
        $fields = parent::fields();

        return array_merge($fields, [
            self::FIELD_SESSION_ID => [
                'type' => Type::int()
            ],
        ]);
    }
}
