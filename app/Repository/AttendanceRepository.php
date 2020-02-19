<?php

namespace App\Repository;

use App\Models\DailyAttendance;

class AttendanceRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return DailyAttendance::class;
    }
}
