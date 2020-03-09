<?php

namespace App\Repository;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Arr;

class UserRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    public function create(array $attributes)
    {
        /** @var User $user */
        $user = parent::create($attributes);

        if ($role = Arr::get($attributes, 'role')) {
            $roleModel = Role::whereName($role)->get()->first();
            if ($roleModel) {
                $user->syncRoles([$roleModel->id]);
            }

            if ($role === 'teacher') {
                $teacherRepository = app(TeacherRepository::class);
                $teacherData = [
                    'user_id' => $user->getId(),
                    'school_id' => $user->getSchoolId()
                ];

                $teacherRepository->create($teacherData);
            }

            if ($role === 'parent') {
                $parentRepository = app(ParentRepository::class);
                $parentData = [
                    'user_id' => $user->getId(),
                    'school_id' => $user->getSchoolId()
                ];

                $parentRepository->create($parentData);
            }
        }

        return $user;
    }

    public function update(array $attributes, $id)
    {
        $user =  parent::update($attributes, $id);

        if ($role = Arr::get($attributes, 'role')) {
            $roleModel = Role::whereName($role)->get()->first();
            if ($roleModel) {
                $user->syncRoles([$roleModel->id]);
            }
        }

        return $user;
    }
}
