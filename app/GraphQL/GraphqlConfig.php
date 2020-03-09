<?php
namespace App\GraphQL;

use App\GraphQL\InputObject\ReviewInput;
use App\GraphQL\Mutations\CreateAttendance;
use App\GraphQL\Mutations\CreateClass;
use App\GraphQL\Mutations\CreateClassSection;
use App\GraphQL\Mutations\CreateSession;
use App\GraphQL\Mutations\CreateStudent;
use App\GraphQL\Mutations\CreateSubject;
use App\GraphQL\Mutations\DeleteClass;
use App\GraphQL\Mutations\DeleteClassSection;
use App\GraphQL\Mutations\DeleteSession;
use App\GraphQL\Mutations\DeleteStudent;
use App\GraphQL\Mutations\DeleteStudentSubject;
use App\GraphQL\Mutations\LoginUser;
use App\GraphQL\Mutations\RegisterUser;
use App\GraphQL\Mutations\UpdateAttendance;
use App\GraphQL\Mutations\UpdateClass;
use App\GraphQL\Mutations\UpdateClassSection;
use App\GraphQL\Mutations\UpdateSession;
use App\GraphQL\Mutations\UpdateStudent;
use App\GraphQL\Mutations\UpdateSubject;
use App\GraphQL\Mutations\UpdateUser;
use App\GraphQL\Mutations\UpdateUserPasswordMutation;
use App\GraphQL\Queries\ElasticSearch;
use App\GraphQL\Queries\GetAttendance;
use App\GraphQL\Queries\GetClasses;
use App\GraphQL\Queries\GetClassSections;
use App\GraphQL\Queries\GetParents;
use App\GraphQL\Queries\GetSchools;
use App\GraphQL\Queries\GetSessions;
use App\GraphQL\Queries\GetStudents;
use App\GraphQL\Queries\GetStudentSubject;
use App\GraphQL\Queries\GetTeachers;
use App\GraphQL\Queries\GetUsers;
use App\GraphQL\Queries\UsersQuery;
use App\GraphQL\Type\Enum\ElasticSearchTypeEnum;
use App\GraphQL\Type\Enum\RoleTypeEnum;
use App\GraphQL\Types\Input\ClassInputType;
use App\GraphQL\Types\Input\ClassSectionInputType;
use App\GraphQL\Types\Input\Filters\FiltersAttendanceType;
use App\GraphQL\Types\Input\Filters\FiltersSearchElasticType;
use App\GraphQL\Types\Input\Filters\FiltersSectionsType;
use App\GraphQL\Types\Input\Filters\FiltersStudentSubject;
use App\GraphQL\Types\Input\Filters\FiltersStudentType;
use App\GraphQL\Types\Input\Filters\FiltersType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Input\StudentSubjectInputType;
use App\GraphQL\Types\Input\UpdateAttendanceType;
use App\GraphQL\Types\Input\UpdateClassInputType;
use App\GraphQL\Types\Input\UpdateClassSectionInputType;
use App\GraphQL\Types\Input\UpdateStudentSubjectInputType;
use App\GraphQL\Types\Input\UpdateStudentType as UpdateStudentInputType;
use App\GraphQL\Types\Input\UpdateUserType;
use App\GraphQL\Types\Input\UserLoginType;
use App\GraphQL\Types\Input\UserRegisterType;
use App\GraphQL\Types\Output\AttendanceType;
use App\GraphQL\Types\Output\ClassSectionType;
use App\GraphQL\Types\Output\ClassType;
use App\GraphQL\Types\Output\ParentType;
use App\GraphQL\Types\Output\SchoolType;
use App\GraphQL\Types\Output\SearchElasticType;
use App\GraphQL\Types\Output\SessionType;
use App\GraphQL\Types\Input\SessionType as SessionInputType;
use App\GraphQL\Types\Input\UpdateSessionType as UpdateSessionInputType;
use App\GraphQL\Types\Output\StudentSubjectType;
use App\GraphQL\Types\Output\StudentType;
use App\GraphQL\Types\Input\StudentType as StudentInputType;
use App\GraphQL\Types\Output\TeacherType;
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
            GetClassSections::class,
            GetSchools::class,
            GetTeachers::class,
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
            CreateAttendance::class,
            UpdateAttendance::class,
            CreateClassSection::class,
            UpdateClassSection::class,
            DeleteClassSection::class,
            CreateClass::class,
            UpdateClass::class,
            DeleteClass::class,
            CreateSubject::class,
            UpdateSubject::class,
            DeleteStudentSubject::class,
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
            AttendanceType::class,
            \App\GraphQL\Types\Input\AttendanceType::class,
            FiltersAttendanceType::class,
            UpdateAttendanceType::class,
            ClassSectionType::class,
            ClassSectionInputType::class,
            UpdateClassSectionInputType::class,
            ClassInputType::class,
            UpdateClassInputType::class,
            RoleTypeEnum::class,
            StudentSubjectInputType::class,
            UpdateStudentSubjectInputType::class,
            FiltersSectionsType::class,
            SchoolType::class,
            TeacherType::class,
        ];
    }
}
