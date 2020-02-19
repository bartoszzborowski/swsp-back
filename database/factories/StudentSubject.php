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
    $baseSchool = factory(\App\Models\School::class)->create();
    return [
        'name' => $name,
        'slug' => \Illuminate\Support\Str::slug($name),
        'session' => null,
        'class_id' => factory(\App\Models\Classes::class)->create(['school_id' => $baseSchool->getId()])->getId()
    ];
});
