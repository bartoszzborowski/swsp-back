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
        $this->syncUserRole($attributes, $user);

        return $user;
    }

    public function update(array $attributes, $id)
    {
        $user = parent::update($attributes, $id);
        $this->syncUserRole($attributes, $user);

        return $user;
    }

    private function syncUserRole(array $attributes, User $user)
    {
        if ($role = Arr::get($attributes, 'role')) {
            $userRole = $user->getRoles()->first();
            /** @var TeacherRepository $teacherRepository */
            $teacherRepository = app(TeacherRepository::class);
            $parentRepository = app(ParentRepository::class);
            $studentRepository = app(StudentRepository::class);

            if ($userRole && $userRole->getName() === $role) {
                return;
            }

            $teacherRepository->deleteWhere(['user_id' => $user->getId()]);
            $parentRepository->deleteWhere(['user_id' => $user->getId()]);
            $studentRepository->deleteWhere(['user_id' => $user->getId()]);

            $roleModel = Role::whereName($role)->get()->first();

            if ($roleModel) {
                $user->syncRoles([$roleModel->id]);
            }

            if ($role === 'student') {
                $studentData = [
                    'user_id' => $user->getId(),
                    'school_id' => $user->getSchoolId()
                ];
                $studentRepository->create($studentData);
            }


            if ($role === 'teacher') {
                $teacherData = [
                    'user_id' => $user->getId(),
                    'school_id' => $user->getSchoolId()
                ];

                $teacherRepository->create($teacherData);
            }

            if ($role === 'parent') {
                $parentData = [
                    'user_id' => $user->getId(),
                    'school_id' => $user->getSchoolId()
                ];

                $parentRepository->create($parentData);
            }
        }
    }
}
