<?php

use App\Models\Classes;
use App\Models\ClassSection;
use App\Models\DailyAttendance;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\StudentSubject;
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
        ini_set('memory_limit', '2048M');

        $baseSchool = factory(School::class)->create();
        $userStudents = factory(User::class, 1000)->create(['school_id' => $baseSchool->getId()]);
        $userParents = factory(User::class, 1000)->create(['school_id' => $baseSchool->getId()]);
        $classes = factory(Classes::class, 5)->create(['school_id' => $baseSchool->getId()]);
        $classesSections = factory(ClassSection::class, 10)->create(['school_id' => $baseSchool->getId()]);

        $classes->each(static function (Classes $class) {
            $studentSubject = factory(StudentSubject::class, rand(2, 8))->create(['class_id' => $class->getId()]);
        });


        $parents = new Collection();

        $userParents->each(static function ($parent) use ($parents, $baseSchool) {
            $parents->push(factory(StudentParent::class)->create(['school_id' => $baseSchool->getId(),
                'user_id' => $parent->getId()]));
        });

        $userStudents->each(static function ($user, $index) use ($baseSchool, $parents, $classes, $classesSections) {
            $student = factory(Student::class)->create(
                [
                    'school_id' => $baseSchool->getId(),
                    'user_id' => $user->getId(),
                    'classes_id' => $classes->get($index % 5)->getId(),
                    'parent_id' => $parents->get($index % 500)->getId()
                ]
            );

            factory(DailyAttendance::class, 4)->create(
                [
                    'school_id' => $baseSchool->getId(),
                    'section_id' => $classesSections->get($index & 5)->getId(),
                    'student_id' => $student->getId(),
                    'class_id' => $student->classes->getId()
                ]
            );
        });
    }
}
