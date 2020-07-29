<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Inicio\Area\AreaModel;
use Faker\Generator as Faker;

$factory->define(AreaModel::class, function (Faker $faker) {
    return [
        'nombre_area' => $faker->name,
        'condicion_area' => rand(0,1)
    ];
});
