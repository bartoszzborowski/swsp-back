<?php

namespace App\GraphQL\Mutations;

use App\Constants\GraphQL as GraphQLConstant;
use App\GraphQL\Types\Input\UpdateClassInputType;
use App\GraphQL\Types\Input\UpdateRoomInputType;
use App\GraphQL\Types\Output\ClassType;
use App\GraphQL\Types\Output\RoomType;
use App\Repository\ClassRepository;
use App\Repository\RoomRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class UpdateRoom extends Mutation
{
    public const MUTATION_NAME = 'updateRoom';

    private $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    protected $attributes = [
        'name' => self::MUTATION_NAME
    ];

    public function type(): GraphqlType
    {
        return GraphQL::type(RoomType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            [
                'name' => GraphQLConstant::INPUT_ARG_NAME,
                'type' => GraphQL::type(UpdateRoomInputType::TYPE_NAME)]
        ];
    }

    public function resolve($root, $args)
    {
        $args = Arr::get($args, GraphQLConstant::INPUT_ARG_NAME);
        $roomId = Arr::get($args, UpdateRoomInputType::FIELD_ROOM_ID);
        unset($args[UpdateRoomInputType::FIELD_ROOM_ID]);

        try {
            return $this->roomRepository->update($args, $roomId);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return new Error($e->getMessage());
        }
    }
}
