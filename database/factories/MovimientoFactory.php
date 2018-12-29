<?php

use Faker\Generator as Faker;

$factory->define(App\Movimiento::class, function (Faker $faker) {
    return [
        'ingrediente_id'  => \App\Ingrediente::all()->random()->id,
        'comercio_id'  => \App\Comercio::all()->random()->id,
        'precio'  => $faker->randomFloat(4,1,300),
        'cantidad'  => $faker->numberBetween(1,10),
        'vencimiento'  => $faker->date(),
    ];
});
