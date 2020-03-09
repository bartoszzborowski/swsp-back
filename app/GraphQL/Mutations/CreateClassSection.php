<?php

namespace App\GraphQL\Mutations;

use App\Constants\GraphQL as GraphQLConstant;
use App\GraphQL\Types\Input\ClassSectionInputType;
use App\GraphQL\Types\Output\ClassSectionType;
use App\Repository\ClassSectionRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class CreateClassSection extends Mutation
{
    public const MUTATION_NAME = 'createClassSection';

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
        return GraphQL::type(ClassSectionType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            [
                'name' => GraphQLConstant::INPUT_ARG_NAME,
                'type' => GraphQL::type(ClassSectionInputType::TYPE_NAME)]
        ];
    }

    public function resolve($root, $args)
    {
        $args = Arr::get($args, GraphQLConstant::INPUT_ARG_NAME);

        try {
            return $this->classSectionRepository->create($args);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return new Error($e->getMessage());
        }
    }
}
