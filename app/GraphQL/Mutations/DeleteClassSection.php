<?php

namespace App\GraphQL\Mutations;

use App\Repository\ClassSectionRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class DeleteClassSection extends Mutation
{
    public const MUTATION_NAME = 'deleteClassSection';

    /**
     * @var ClassSectionRepository $classSectionRepository
     */
    private $classSectionRepository;

    public function __construct(ClassSectionRepository $classSectionRepository)
    {
        $this->classSectionRepository = $classSectionRepository;
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
                $this->classSectionRepository->delete($id);
                return true;
            } catch (\Exception $e) {
                return new Error($e->getMessage());
            }
        }
    }
}
