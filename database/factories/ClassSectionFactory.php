<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClassSection;
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

$factory->define(ClassSection::class, static function (Faker $faker, $args) {
    $baseSchool = factory(\App\Models\School::class)->create();
    return [
        'name' => 'Section ' . $faker->numberBetween(1, 20),
        'class_id' => factory(\App\Models\Classes::class)->create(['school_id' => $baseSchool->getId()])->getId(),
        'school_id' => $baseSchool->getId(),
    ];
});
