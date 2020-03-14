<?php

namespace App\GraphQL\Mutations;

use App\Repository\RoomRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class DeleteRoom extends Mutation
{
    public const MUTATION_NAME = 'deleteRoom';

    /**
     * @var RoomRepository
     */
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
        return GraphqlType::boolean();
    }

    public function args(): array
    {
        return [
            [
                'name' => 'ids',
                'type' => GraphqlType::listOf(GraphqlType::int())
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $ids = Arr::get($args, 'ids');

        foreach ($ids as $id) {
            try {
                $this->roomRepository->delete($id);
                return true;
            } catch (\Exception $e) {
                return new Error($e->getMessage());
            }
        }
    }
}
