<?php


namespace App\GraphQL;


use App\GraphQL\InputObject\ReviewInput;
use App\GraphQL\Mutations\LoginUser;
use App\GraphQL\Mutations\RegisterUser;
use App\GraphQL\Mutations\UpdateUserPasswordMutation;
use App\GraphQL\Queries\UsersQuery;
use App\GraphQL\Types\Input\UserLoginType;
use App\GraphQL\Types\Input\UserRegisterType;
use App\GraphQL\Types\Output\UserType;

class GraphqlConfig
{
    public static function queryList()
    {
        return [
            'users' => UsersQuery::class
        ];
    }

    public static function mutationList()
    {
        return [
            'updateUserPassword' => UpdateUserPasswordMutation::class,
            'userLogin' => LoginUser::class,
            RegisterUser::class
        ];
    }

    public static function typesList()
    {
        return [
            \Rebing\GraphQL\Support\UploadType::class,
            'UserType' => UserType::class,
            'UserLoginInputType' => UserLoginType::class,
            'ReviewInput' => ReviewInput::class,
            UserRegisterType::class
        ];
    }
}
