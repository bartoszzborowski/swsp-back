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
use App\GraphQL\Queries\GetAttendance;
use App\GraphQL\Queries\GetClasses;
use App\GraphQL\Queries\GetParents;
use App\GraphQL\Queries\GetSessions;
use App\GraphQL\Queries\GetStudents;
use App\GraphQL\Queries\GetStudentSubject;
use App\GraphQL\Queries\GetUsers;
use App\GraphQL\Queries\UsersQuery;
use App\GraphQL\Type\Enum\ElasticSearchTypeEnum;
use App\GraphQL\Types\Input\Filters\FiltersSearchElasticType;
use App\GraphQL\Types\Input\Filters\FiltersStudentSubject;
use App\GraphQL\Types\Input\Filters\FiltersStudentType;
use App\GraphQL\Types\Input\Filters\FiltersType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Input\UpdateStudentType as UpdateStudentInputType;
use App\GraphQL\Types\Input\UpdateUserType;
use App\GraphQL\Types\Input\UserLoginType;
use App\GraphQL\Types\Input\UserRegisterType;
use App\GraphQL\Types\Output\AttendanceType;
use App\GraphQL\Types\Output\ClassType;
use App\GraphQL\Types\Output\ParentType;
use App\GraphQL\Types\Output\SearchElasticType;
use App\GraphQL\Types\Output\SessionType;
use App\GraphQL\Types\Input\SessionType as SessionInputType;
use App\GraphQL\Types\Input\UpdateSessionType as UpdateSessionInputType;
use App\GraphQL\Types\Output\StudentSubjectType;
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
            GetAttendance::class,
            GetStudentSubject::class,
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
            StudentType::class,
            AttendanceType::class,
            ClassType::class,
            ElasticSearchTypeEnum::class,
            FiltersSearchElasticType::class,
            FiltersStudentSubject::class,
            FiltersStudentType::class,
            FiltersType::class,
            PaginationType::class,
            ParentType::class,
            SearchElasticType::class,
            SessionInputType::class,
            SessionType::class,
            StudentInputType::class,
            StudentSubjectType::class,
            UpdateSessionInputType::class,
            UpdateStudentInputType::class,
            UpdateUserType::class,
            UserRegisterType::class,
        ];
    }
}
