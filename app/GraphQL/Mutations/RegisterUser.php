<?php

namespace App\GraphQL\Mutations;

use App\Constants\GraphQL as GraphQLConstant;
use App\GraphQL\Types\Input\UserRegisterType;
use App\GraphQL\Types\Output\UserType;
use App\Models\Role;
use App\Models\User;
use App\Repository\UserRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterUser extends Mutation
{
    public const MUTATION_NAME = 'register';

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    protected $attributes = [
        'name' => self::MUTATION_NAME
    ];

    public function type(): GraphqlType
    {
        return GraphQL::type(UserType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            [
                'name' => GraphQLConstant::INPUT_ARG_NAME,
                'type' => GraphQL::type(UserRegisterType::TYPE_NAME)]
        ];
    }

//    public function rules(array $args = []): array
//    {
//        $input = GraphQLConstant::INPUT_ARG_NAME . '.';
//
//        return [
//            $input . UserLoginType::FIELD_EMAIL => ['required', 'email'],
//            $input . UserLoginType::FIELD_PASSWORD => ['required']
//        ];
//    }

    /**
     * @param $root
     * @param $args
     * @return User
     * @throws \Exception
     */
    public function resolve($root, $args)
    {
        $args = Arr::get($args, 'input');
        $args['password'] = bcrypt(Arr::get($args, 'password'));

        /** @var User $user */
        $user = $this->userRepository->create($args);

        if ($user) {
            $user[User::TOKEN] = JWTAuth::fromUser($user);
            return $user;
        }

        throw new Error('Register not successful');
    }
}
