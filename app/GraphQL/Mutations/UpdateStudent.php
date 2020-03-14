<?php

namespace App\GraphQL\Mutations;

use App\Constants\GraphQL as GraphQLConstant;
use App\GraphQL\Types\Input\UpdateStudentType as UpdateStudentInputType;
use App\GraphQL\Types\Output\StudentType;
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

class UpdateStudent extends Mutation
{
    public const MUTATION_NAME = 'updateStudent';

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
                'type' => GraphQL::type(UpdateStudentInputType::TYPE_NAME)]
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

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $args = Arr::get($args, GraphQLConstant::INPUT_ARG_NAME);
        $studentId = Arr::get($args, UpdateStudentInputType::FIELD_STUDENT_ID);
        unset($args[UpdateStudentInputType::FIELD_STUDENT_ID]);
        try {
            $student = $this->studentRepository->find($studentId, ['id', 'user_id']);
            $user = $this->userRepository->find($student->getUserId());
            $this->userRepository->update($args, $user->getId());
            return $this->studentRepository->update($args, $student->getId());
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return new Error($e->getMessage());
        }
    }
}
