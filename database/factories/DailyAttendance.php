<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClassSection;
use App\Models\DailyAttendance;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(DailyAttendance::class, static function (Faker $faker, $args) {
    $baseSchool = factory(\App\Models\School::class)->create();
    $classID = factory(\App\Models\Classes::class)->create(['school_id' => $baseSchool->getId()]);
    $sectionID = factory(\App\Models\ClassSection::class)->create(['school_id' => $baseSchool->getId()]);

    return [
        'school_id' => $baseSchool->getId(),
        'class_id' => $classID->getId(),
        'section_id' => $sectionID->getId(),
        'student_id' => null,
        'status' => $faker->numberBetween(1, 3),
    ];
});
