<?php
namespace App\GraphQL;

use App\GraphQL\InputObject\ReviewInput;
use App\GraphQL\Mutations\CreateSession;
use App\GraphQL\Mutations\CreateStudent;
use App\GraphQL\Mutations\DeleteSession;
use App\GraphQL\Mutations\DeleteStudent;
use App\GraphQL\Mutations\LoginUser;
use App\GraphQL\Mutations\RegisterUser;
use App\GraphQL\Mutations\UpdateSession;
use App\GraphQL\Mutations\UpdateStudent;
use App\GraphQL\Mutations\UpdateUser;
use App\GraphQL\Mutations\UpdateUserPasswordMutation;
use App\GraphQL\Queries\ElasticSearch;
use App\GraphQL\Queries\GetClasses;
use App\GraphQL\Queries\GetParents;
use App\GraphQL\Queries\GetSessions;
use App\GraphQL\Queries\GetStudents;
use App\GraphQL\Queries\GetUsers;
use App\GraphQL\Queries\UsersQuery;
use App\GraphQL\Type\Enum\ElasticSearchTypeEnum;
use App\GraphQL\Types\Input\Filters\FiltersSearchElasticType;
use App\GraphQL\Types\Input\Filters\FiltersStudentType;
use App\GraphQL\Types\Input\Filters\FiltersType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Input\UpdateStudentType as UpdateStudentInputType;
use App\GraphQL\Types\Input\UpdateUserType;
use App\GraphQL\Types\Input\UserLoginType;
use App\GraphQL\Types\Input\UserRegisterType;
use App\GraphQL\Types\Output\ClassType;
use App\GraphQL\Types\Output\ParentType;
use App\GraphQL\Types\Output\SearchElasticType;
use App\GraphQL\Types\Output\SessionType;
use App\GraphQL\Types\Input\SessionType as SessionInputType;
use App\GraphQL\Types\Input\UpdateSessionType as UpdateSessionInputType;
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
            GetClasses::class,
            GetParents::class,
            GetSessions::class,
            ElasticSearch::class,
            GetUsers::class,
        ];
    }

    public static function mutationList(): array
    {
        return [
            'updateUserPassword' => UpdateUserPasswordMutation::class,
            'userLogin' => LoginUser::class,
            RegisterUser::class,
            UpdateUser::class,
            CreateStudent::class,
            UpdateStudent::class,
            DeleteStudent::class,
            CreateSession::class,
            UpdateSession::class,
            DeleteSession::class,
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
            UpdateUserType::class,
            ParentType::class,
            StudentType::class,
            StudentInputType::class,
            UpdateStudentInputType::class,
            PaginationType::class,
            FiltersType::class,
            FiltersStudentType::class,
            ClassType::class,
            SessionType::class,
            SessionInputType::class,
            UpdateSessionInputType::class,
            ElasticSearchTypeEnum::class,
            FiltersSearchElasticType::class,
            SearchElasticType::class,
        ];
    }
}
