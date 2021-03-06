<?php

use App\Ingrediente;
use App\Marca;
use App\Unidad;
use Faker\Generator as Faker;

$factory->define(Ingrediente::class, function (Faker $faker) {
    return [
        'nombre'    => $faker->sentence(3 , false),
        'marca_id'  => Marca::all()->random()->id,
        'unidad_id' => Unidad::all()->random()->id,
        'cantidad'  => $faker->randomFloat(3,0, 1),
        'cod_barra' => $faker->ean13,
        'detalles'  => $faker->text(),
        'has_tacc'  => $faker->boolean,
    ];
});
