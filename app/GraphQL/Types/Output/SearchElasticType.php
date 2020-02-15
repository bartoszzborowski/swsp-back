<?php


namespace App\GraphQL\Types\Output;

use App\Models\Student;
use App\Models\StudentParent;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\UnionType;

class SearchElasticType extends UnionType
{
    public const TYPE_NAME = 'SearchElasticType';

    protected $attributes = [
        'name' => self::TYPE_NAME,
    ];

    public function types(): array
    {
        return [
            GraphQL::type(StudentType::TYPE_NAME),
            GraphQL::type(ParentType::TYPE_NAME),
        ];
    }

    public function resolveType($value): ?\GraphQL\Type\Definition\Type
    {
        if ($value instanceof Student) {
            return GraphQL::type(StudentType::TYPE_NAME);
        }

        if ($value instanceof StudentParent) {
            return GraphQL::type(ParentType::TYPE_NAME);
        }
    }
}
