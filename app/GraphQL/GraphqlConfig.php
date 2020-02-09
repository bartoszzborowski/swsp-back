<?php
namespace App\GraphQL;

use App\GraphQL\InputObject\ReviewInput;
use App\GraphQL\Mutations\CreateStudent;
use App\GraphQL\Mutations\DeleteStudent;
use App\GraphQL\Mutations\LoginUser;
use App\GraphQL\Mutations\RegisterUser;
use App\GraphQL\Mutations\UpdateStudent;
use App\GraphQL\Mutations\UpdateUserPasswordMutation;
use App\GraphQL\Queries\GetClasses;
use App\GraphQL\Queries\GetStudents;
use App\GraphQL\Queries\UsersQuery;
use App\GraphQL\Types\Input\Filters\FiltersStudentType;
use App\GraphQL\Types\Input\Filters\FiltersType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Input\UpdateStudentType as UpdateStudentInputType;
use App\GraphQL\Types\Input\UserLoginType;
use App\GraphQL\Types\Input\UserRegisterType;
use App\GraphQL\Types\Output\ClassesType;
use App\GraphQL\Types\Output\ParentType;
use App\GraphQL\Types\Output\StudentType;
use App\GraphQL\Types\Input\StudentType as StudentInputType;
use App\GraphQL\Types\Output\UserType;

class GraphqlConfig
{
    public static function queryList(): array
    {
        return [
            'users' => UsersQuery::class,
            GetStudents::class,
            GetClasses::class
        ];
    }

    public static function mutationList(): array
    {
        return [
            'updateUserPassword' => UpdateUserPasswordMutation::class,
            'userLogin' => LoginUser::class,
            RegisterUser::class,
            CreateStudent::class,
            UpdateStudent::class,
            DeleteStudent::class,
        ];
    }

    public static function typesList(): array
    {
        return [
            \Rebing\GraphQL\Support\UploadType::class,
            'UserType' => UserType::class,
            'UserLoginInputType' => UserLoginType::class,
            'ReviewInput' => ReviewInput::class,
            UserRegisterType::class,
            ParentType::class,
            StudentType::class,
            StudentInputType::class,
            UpdateStudentInputType::class,
            PaginationType::class,
            FiltersType::class,
            FiltersStudentType::class,
            ClassesType::class,
        ];
    }
}
