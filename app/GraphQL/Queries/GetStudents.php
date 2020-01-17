<?php

namespace App\GraphQL\Queries;

use App\GraphQL\Types\Output\StudentType;
use App\Models\User;
use App\Repository\StudentRepository;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class GetStudents extends Query
{
    public const QUERY_NAME = 'students';

    protected $attributes = [
        'name' => self::QUERY_NAME
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type(StudentType::TYPE_NAME));
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::string()],
            'email' => ['name' => 'email', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var StudentRepository $studentRepository */
        $studentRepository = app(StudentRepository::class);
//        if (isset($args['id'])) {
//            return User::where('id' , $args['id'])->get();
//        }
//
//        if (isset($args['email'])) {
//            return User::where('email', $args['email'])->get();
//        }

        return $studentRepository->all();
    }
}
