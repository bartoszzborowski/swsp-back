<?php

namespace App\Repository;

use App\Models\StudentSubject;

class StudentSubjectRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return StudentSubject::class;
    }
}
