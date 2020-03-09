<?php

namespace App\GraphQL\Queries;

use App\Constants\GraphQL as GraphQLConstants;
use App\Criteria\GetByIdCriteria;
use App\GraphQL\Types\Input\Filters\FiltersAttendanceType;
use App\GraphQL\Types\Input\Filters\FiltersType;
use App\GraphQL\Types\Input\PaginationType;
use App\GraphQL\Types\Output\AttendanceType;
use App\Repository\AttendanceRepository;
use Carbon\Carbon;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

class GetAttendance extends Query
{
    public const QUERY_NAME = 'attendance';

    protected $attributes = [
        'name' => self::QUERY_NAME
    ];

    public function type(): Type
    {
        return GraphQL::paginate(AttendanceType::TYPE_NAME);
    }

    public function args(): array
    {
        return [
            ['name' => GraphQLConstants::FILTER_ARG_NAME, 'type' => GraphQL::type(FiltersAttendanceType::TYPE_NAME)],
            ['name' => GraphQLConstants::PAGINATION_ARG_NAME, 'type' => GraphQL::type(PaginationType::TYPE_NAME)],
        ];
    }

    public function resolve($root, $args)
    {
        /** @var AttendanceRepository $attendanceRepository */
        $attendanceRepository = app(AttendanceRepository::class);
        // FILTER ARGUMENTS //
        $filters = $this->getFiltersFromQuery($args);
        [$take, $page] = $this->getPaginationFromQuery($args);

        foreach ($filters as $index => $value) {
            switch ($index) {
                case FiltersAttendanceType::FIELD_ID:
                    $attendanceRepository->pushCriteria(new GetByIdCriteria($value));
                    break;
                case FiltersAttendanceType::FIELD_SUBJECT_ID:
                    $attendanceRepository->pushCriteria(new GetByIdCriteria($value, 'subject_id'));
                    break;
                case FiltersAttendanceType::FIELD_SCHOOL_ID:
                    $attendanceRepository->pushCriteria(new GetByIdCriteria($value, 'school_id'));
                    break;
                case FiltersAttendanceType::FIELD_SESSION_ID:
                    $attendanceRepository->pushCriteria(new GetByIdCriteria($value, 'session_id'));
                    break;
                case FiltersAttendanceType::FIELD_CLASS_ID:
                    $attendanceRepository->pushCriteria(new GetByIdCriteria($value, 'class_id'));
                    break;
                case FiltersAttendanceType::FIELD_SECTION_ID:
                    $attendanceRepository->pushCriteria(new GetByIdCriteria($value, 'section_id'));
                    break;
                case FiltersAttendanceType::FIELD_TIMESTAMP:
                    $attendanceRepository->pushCriteria(new GetByIdCriteria(Carbon::parse($value)->setTimezone('UTC')->toDateString(), 'timestamp', true));
                    break;
            }
        }

        return $attendanceRepository->paginate($take, $page);
    }
}
