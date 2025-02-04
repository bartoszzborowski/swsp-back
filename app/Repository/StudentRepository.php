<?php

namespace App\Repository;

use App\Models\Student;
use App\Models\User;
use GraphQL\Error\Error;

class StudentRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Student::class;
    }

    public function addNewStudent(
        User $user,
        ?int $schoolId = null,
        ?int $parentId = null,
        ?int $classesId = null
    ): Student {
        $args = [
            'user_id' => $user->getId(),
            'parent_id' => $parentId,
            'school_id' => $schoolId,
            'classes_id' => $classesId,
        ];

        try {
            return $this->create($args);
        } catch (\Exception $exception) {
            throw new Error($exception->getMessage());
        }
    }
}
