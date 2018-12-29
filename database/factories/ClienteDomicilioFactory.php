<?php

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(App\ClienteDomicilio::class, function (Faker $faker) {
    return [
        'cliente_id'    => Cliente::all()->random()->id,
        'latitud'       => $faker->latitude(-28.415555, -28.525555),
        'longitud'      => $faker->longitude(-65.685555, -65.825555),
        'calle'         => $faker->streetName,
        'numero'        => $faker->buildingNumber,
        'entre_calles'  => $faker->streetName,
    ];
});
