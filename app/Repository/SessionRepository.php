<?php

namespace App\Repository;

use App\Models\Session;

class SessionRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Session::class;
    }
}
