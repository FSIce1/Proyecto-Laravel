<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Inicio\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Inicio\Models\Area\AreaModel;
use Inicio\Models\Documento\DocumentoModel;

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
        'condicion_area' => rand(0,1)
    ];
});

$factory->define(DocumentoModel::class, function (Faker $faker) {
    return [
        'descripcion_documento' => $faker->name,
        'archivo_documento' => null,//imageUrl($width = 640, $height = 480),
        'condicion_documento' =>rand(0,1)
    ];
});

