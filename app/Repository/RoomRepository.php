<?php

namespace App\Repository;

use App\Models\ClassRoom;

class RoomRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return ClassRoom::class;
    }
}
