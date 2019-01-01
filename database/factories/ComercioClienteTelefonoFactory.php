<?php

use Faker\Generator as Faker;

$factory->define(App\ComercioClienteTelefono::class, function (Faker $faker) {
    return [
        'comercio_id'    => \App\Comercio::all()->random()->id,
        'cliente_id'    => \App\Cliente::all()->random()->id,
        'telefono_id'    => \App\Telefono::all()->random()->id,
    ];
});
