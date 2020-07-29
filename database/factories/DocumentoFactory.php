<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Inicio\Documento\DocumentoModel;
use Faker\Generator as Faker;

$factory->define(DocumentoModel::class, function (Faker $faker) {
    return [
        'descripcion_documento' => $faker->name,
        'archivo_documento' => imageUrl($width = 640, $height = 480),
        'condicion_documento' => rand(0,1)
    ];
});
