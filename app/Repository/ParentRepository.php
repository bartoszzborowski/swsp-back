<?php

namespace App\Repository;

use App\Models\Classes;
use App\Models\StudentParent;

class ParentRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return StudentParent::class;
    }
}
