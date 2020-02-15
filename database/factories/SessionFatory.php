<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Session;
use Faker\Generator as Faker;

$factory->define(Session::class, static function (Faker $faker) {
    $numberBetween = $faker->numberBetween(1, 20);
    return [
        'name' => \Carbon\Carbon::now()->addYears($numberBetween)->year
            . '/' . \Carbon\Carbon::now()->addYears($numberBetween+1)->year,
        'status' =>  $faker->boolean,
        'school_id' =>  factory(\App\Models\School::class)->create()->getId(),
    ];
});
