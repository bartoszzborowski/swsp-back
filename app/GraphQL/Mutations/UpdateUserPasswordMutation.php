<?php

namespace App\GraphQL\Mutations;

use App\GraphQL\Types\Output\UserType;
use CLosure;
use App\Models\User;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateUserPasswordMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUserPassword'
    ];

    public function type(): Type
    {
        return GraphQL::type(UserType::TYPE_NAME);
    }

    protected function rules(array $args = []): array
    {
        return [
            'id' => ['required'],
            'email' => ['required', 'email']
        ];
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::string())],
            'password' => ['name' => 'password', 'type' => Type::nonNull(Type::string())]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $user = User::find($args['id']);
        if(!$user) {
            return null;
        }

        $user->password = bcrypt($args['password']);
        $user->save();

        return $user;
    }
}
