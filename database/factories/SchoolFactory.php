<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\School;
use Faker\Generator as Faker;

$factory->define(School::class, static function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'address' =>  $faker->address,
        'phone' =>  $faker->phoneNumber,
    ];
});
