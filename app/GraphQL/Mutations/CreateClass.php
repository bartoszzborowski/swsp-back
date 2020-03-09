<?php

namespace App\GraphQL\Mutations;

use App\Constants\GraphQL as GraphQLConstant;
use App\GraphQL\Types\Input\ClassInputType;
use App\GraphQL\Types\Input\ClassSectionInputType;
use App\GraphQL\Types\Input\SessionType as SessionInputType;
use App\GraphQL\Types\Output\ClassSectionType;
use App\GraphQL\Types\Output\ClassType;
use App\GraphQL\Types\Output\SessionType;
use App\Repository\ClassRepository;
use App\Repository\ClassSectionRepository;
use App\Repository\SessionRepository;
use App\Repository\StudentRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class CreateClass extends Mutation
{
    public const MUTATION_NAME = 'createClass';

    private $classRepository;

    public function __construct(ClassRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    protected $attributes = [
        'name' => self::MUTATION_NAME
    ];

    public function type(): GraphqlType
    {
        return GraphQL::type(ClassType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            [
                'name' => GraphQLConstant::INPUT_ARG_NAME,
                'type' => GraphQL::type(ClassInputType::TYPE_NAME)
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $args = Arr::get($args, GraphQLConstant::INPUT_ARG_NAME);

        try {
            return $this->classRepository->create($args);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return new Error($e->getMessage());
        }
    }
}
