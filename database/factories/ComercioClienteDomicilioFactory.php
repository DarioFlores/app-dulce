<?php

use Faker\Generator as Faker;

$factory->define(App\ComercioClienteDomicilio::class, function (Faker $faker) {
    return [
        'comercio_id'    => \App\Comercio::all()->random()->id,
        'cliente_id'    => \App\Cliente::all()->random()->id,
        'domicilio_id'    => \App\Domicilio::all()->random()->id,
    ];
});
