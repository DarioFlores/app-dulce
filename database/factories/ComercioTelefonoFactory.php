<?php

use App\Comercio;
use Faker\Generator as Faker;

$factory->define(App\ComercioTelefono::class, function (Faker $faker) {
    return [
        'comercio_id'  => Comercio::all()->random()->id,
        'telefono'  => $faker->phoneNumber,
    ];
});
