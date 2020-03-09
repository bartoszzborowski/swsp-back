<?php

namespace App\GraphQL\Mutations;

use App\Repository\SessionRepository;
use App\Repository\StudentSubjectRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class DeleteStudentSubject extends Mutation
{
    public const MUTATION_NAME = 'deleteStudentSubject';

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
                $this->studentSubjectRepository->delete($id);
                return true;
            } catch (\Exception $e) {
                return new Error($e->getMessage());
            }
        }
    }
}
