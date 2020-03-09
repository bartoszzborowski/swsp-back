<?php

namespace App\Repository;

use App\Models\ClassSection;

class ClassSectionRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return ClassSection::class;
    }
}
