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
    isset($args['school_id']) ? $baseSchool = $args['school_id'] : $baseSchool = factory(\App\Models\School::class)->create()->getId();
    isset($args['class_id']) ? $classID = $args['class_id'] : $classID = factory(\App\Models\Classes::class)->create(['school_id' => $baseSchool]);

    return [
        'name' => 'Section ' . $faker->numberBetween(1, 20),
        'class_id' => $classID,
        'school_id' => $baseSchool,
    ];
});
