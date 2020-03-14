<?php

namespace App\Repository;

use App\Models\Routine;

class RoutineRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Routine::class;
    }
}
