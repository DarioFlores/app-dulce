<?php

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(App\ClienteTelefono::class, function (Faker $faker) {
    return [
        'cliente_id'  => Cliente::all()->random()->id,
        'telefono'  => $faker->phoneNumber,
    ];
});
