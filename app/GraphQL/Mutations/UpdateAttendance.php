<?php

namespace App\GraphQL\Mutations;

use App\Constants\GraphQL as GraphQLConstant;
use App\GraphQL\Types\Input\UpdateAttendanceType;
use App\GraphQL\Types\Output\AttendanceType;
use App\GraphQL\Types\Input\AttendanceType as AttendanceInputType;
use App\Repository\AttendanceRepository;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class UpdateAttendance extends Mutation
{
    public const MUTATION_NAME = 'updateAttendance';

    /**
     * @var AttendanceRepository $attendanceRepository
     */
    private $attendanceRepository;

    public function __construct(AttendanceRepository $attendanceRepository)
    {
        $this->attendanceRepository = $attendanceRepository;
    }

    protected $attributes = [
        'name' => self::MUTATION_NAME
    ];

    public function type(): GraphqlType
    {
        return GraphqlType::listOf(GraphQL::type(AttendanceType::TYPE_NAME));
    }

    public function args(): array
    {
        return [
            [
                'name' => GraphQLConstant::INPUT_ARG_NAME,
                'type' => GraphqlType::listOf(GraphQL::type(UpdateAttendanceType::TYPE_NAME))
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $args = Arr::get($args, GraphQLConstant::INPUT_ARG_NAME);

        try {
            $test = new Collection();

            foreach ($args as $arg) {
                $test->push($this->attendanceRepository->update($arg, $arg['id']));
            }

            return $test;
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return new Error($e->getMessage());
        }
    }
}
