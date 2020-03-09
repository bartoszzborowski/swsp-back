<?php

namespace App\GraphQL\Mutations;

use App\Repository\ClassRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class DeleteClass extends Mutation
{
    public const MUTATION_NAME = 'deleteClass';

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
                $this->classRepository->delete($id);
                return true;
            } catch (\Exception $e) {
                return new Error($e->getMessage());
            }
        }
    }
}
