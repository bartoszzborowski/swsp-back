<?php

namespace App\GraphQL\Mutations;

use App\Constants\GraphQL as GraphQLConstant;
use App\GraphQL\Types\Input\ClassInputType;
use App\GraphQL\Types\Input\StudentSubjectInputType;
use App\GraphQL\Types\Input\UpdateClassInputType;
use App\GraphQL\Types\Input\UpdateStudentSubjectInputType;
use App\GraphQL\Types\Output\ClassType;
use App\GraphQL\Types\Output\StudentSubjectType;
use App\Repository\ClassRepository;
use App\Repository\StudentSubjectRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class UpdateSubject extends Mutation
{
    public const MUTATION_NAME = 'updateSubject';

    private $studentSubjectRepository;

    public function __construct(StudentSubjectRepository $studentSubjectRepository)
    {
        $this->studentSubjectRepository = $studentSubjectRepository;
    }

    protected $attributes = [
        'name' => self::MUTATION_NAME
    ];

    public function type(): GraphqlType
    {
        return GraphQL::type(StudentSubjectType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            [
                'name' => GraphQLConstant::INPUT_ARG_NAME,
                'type' => GraphQL::type(UpdateStudentSubjectInputType::TYPE_NAME)
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $args = Arr::get($args, GraphQLConstant::INPUT_ARG_NAME);
        $classId = Arr::get($args, UpdateStudentSubjectInputType::FIELD_SUBJECT_ID);
        unset($args[UpdateStudentSubjectInputType::FIELD_SUBJECT_ID]);
        try {
            return $this->studentSubjectRepository->update($args, $classId);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return new Error($e->getMessage());
        }
    }
}
