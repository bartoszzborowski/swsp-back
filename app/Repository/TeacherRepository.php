<?php

namespace App\Repository;

use App\Models\Classes;
use App\Models\ClassesSections;
use App\Models\Teacher;
use Illuminate\Support\Arr;

class TeacherRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Teacher::class;
    }
}
