<?php

namespace App\GraphQL\Mutations;

use App\Constants\GraphQL as GraphQLConstant;
use App\GraphQL\Types\Input\RoutineInputType;
use App\GraphQL\Types\Output\RoutineType;
use App\Repository\RoutineRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class CreateRoutines extends Mutation
{
    public const MUTATION_NAME = 'createRoutine';

    private $routineRepository;

    public function __construct(RoutineRepository $routineRepository)
    {
        $this->routineRepository = $routineRepository;
    }

    protected $attributes = [
        'name' => self::MUTATION_NAME
    ];

    public function type(): GraphqlType
    {
        return GraphQL::type(RoutineType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            [
                'name' => GraphQLConstant::INPUT_ARG_NAME,
                'type' => GraphQL::type(RoutineInputType::TYPE_NAME)
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $args = Arr::get($args, GraphQLConstant::INPUT_ARG_NAME);

        try {
            return $this->routineRepository->create($args);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return new Error($e->getMessage());
        }
    }
}
