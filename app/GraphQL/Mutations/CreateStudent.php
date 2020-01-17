<?php

namespace App\GraphQL\Mutations;

use App\Constants\GraphQL as GraphQLConstant;
use App\GraphQL\Types\Input\StudentType as StudentInputType;
use App\GraphQL\Types\Output\StudentType;
use App\Models\Student;
use App\Models\User;
use App\Repository\StudentRepository;
use App\Repository\UserRepository;
use Closure;
use GraphQL\Error\Error;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;
use Tymon\JWTAuth\Facades\JWTAuth;

class CreateStudent extends Mutation
{
    public const MUTATION_NAME = 'createStudent';

    /**
     * @var StudentRepository $studentRepository
     */
    private $studentRepository;
    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    public function __construct(StudentRepository $studentRepository, UserRepository $userRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
    }

    protected $attributes = [
        'name' => self::MUTATION_NAME
    ];

    public function type(): GraphqlType
    {
        return GraphQL::type(StudentType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            [
                'name' => GraphQLConstant::INPUT_ARG_NAME,
                'type' => GraphQL::type(StudentInputType::TYPE_NAME)]
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

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields): Student
    {
        $args = Arr::get($args, GraphQLConstant::INPUT_ARG_NAME);
        $schoolId = Arr::get($args, StudentInputType::FIELD_SCHOOL_ID);
        $parentId = Arr::get($args, StudentInputType::FIELD_PARENT_ID);

        try {
            $user = $this->userRepository->create($args);
            return $this->studentRepository->addNewStudent($user, $schoolId, $parentId);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            new Error($e->getMessage());
        }
    }
}
