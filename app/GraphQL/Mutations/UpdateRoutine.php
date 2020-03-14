<?php

namespace App\GraphQL\Mutations;

use App\Constants\GraphQL as GraphQLConstant;
use App\GraphQL\Types\Input\UpdateRoutineInputType;
use App\GraphQL\Types\Output\RoomType;
use App\GraphQL\Types\Output\RoutineType;
use App\Repository\RoutineRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class UpdateRoutine extends Mutation
{
    public const MUTATION_NAME = 'updateRoutine';

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
                'type' => GraphQL::type(UpdateRoutineInputType::TYPE_NAME)
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $args = Arr::get($args, GraphQLConstant::INPUT_ARG_NAME);
        $routineId = Arr::get($args, UpdateRoutineInputType::FIELD_ROUTINE_ID);
        unset($args[UpdateRoutineInputType::FIELD_ROUTINE_ID]);

        try {
            return $this->routineRepository->update($args, $routineId);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return new Error($e->getMessage());
        }
    }
}
