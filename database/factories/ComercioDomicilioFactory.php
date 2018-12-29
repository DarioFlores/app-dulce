<?php

use App\Comercio;
use Faker\Generator as Faker;

$factory->define(App\ComercioDomicilio::class, function (Faker $faker) {
    return [
        'comercio_id'    => Comercio::all()->random()->id,
        'latitud'       => $faker->latitude(-28.415555, -28.525555),
        'longitud'      => $faker->longitude(-65.685555, -65.825555),
        'calle'         => $faker->streetName,
        'numero'        => $faker->buildingNumber,
        'entre_calles'  => $faker->streetName,
    ];
});
