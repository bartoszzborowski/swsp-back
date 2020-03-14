<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClassSection;
use App\Models\DailyAttendance;
use App\Models\StudentSubject;
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

$factory->define(StudentSubject::class, static function (Faker $faker, $args) {
    $name = 'Subject ' . $faker->numberBetween(1, 100);
    isset($args['school_id']) ? $baseSchool = $args['school_id'] : $baseSchool = factory(\App\Models\School::class)->create()->getId();
    isset($args['class_id']) ? $classID = $args['class_id'] : $classID = factory(\App\Models\Classes::class)->create(['school_id' => $baseSchool]);
    isset($args['session_id']) ? $sessionId = $args['session_id'] : $sessionId = factory(\App\Models\Session::class)->create(['school_id' => $baseSchool]);

    return [
        'name' => $name,
        'slug' => \Illuminate\Support\Str::slug($name),
        'session_id' => $sessionId,
        'class_id' => $classID,
        'school_id' => $baseSchool
    ];
});
