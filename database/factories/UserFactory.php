<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Inicio\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Inicio\Models\Area\AreaModel;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

// TODO: OJOOOOOOO
$factory->define(AreaModel::class, function (Faker $faker) {
    return [
        'nombre_area' => $faker->name,
        'condicion_area' => '0'
    ];
});

