<?php

use App\Models\School;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class BaseSchoolStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baseSchool = factory(School::class)->create();
        $userStudents = factory(User::class, 10)->create(['school_id' => $baseSchool->getId()]);
        $userParents = factory(User::class, 5)->create(['school_id' => $baseSchool->getId()]);

        $students = new Collection();
        $parents = new Collection();

        $userParents->each(static function ($parent) use ($parents, $baseSchool) {
            $parents->push(factory(StudentParent::class)->create(['school_id' => $baseSchool->getId(),
                'user_id' => $parent->getId()]));
        });

        $userStudents->each(static function ($user, $index) use ($baseSchool, $students, $parents) {
            $students->push(factory(Student::class)->create(['school_id' => $baseSchool->getId(),
                'user_id' => $user->getId(), 'parent_id' => $parents->get($index % 5)->getId()]));
        });
    }
}
