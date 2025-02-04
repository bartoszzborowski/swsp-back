<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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

$factory->define(User::class, static function (Faker $faker, $args) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'address' =>  $faker->address,
        'phone' =>  $faker->phoneNumber,
        'birthday' =>  $faker->date('Y-m-d'),
        'blood_group' =>  'AB',
        'gender' =>  $faker->randomElement([1,2]),
        'marital' =>  $faker->randomElement([1,2]),
        'remember_token' => Str::random(10),
    ];
});
