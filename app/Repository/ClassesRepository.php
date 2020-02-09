<?php

namespace App\Repository;

use App\Models\Classes;

class ClassesRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Classes::class;
    }
}
