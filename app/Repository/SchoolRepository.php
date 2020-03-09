<?php

namespace App\Repository;

use App\Models\School;

class SchoolRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return School::class;
    }
}
