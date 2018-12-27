<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'nombre'    => $faker->sentence(3 , false),
        'apellido'  => $faker->sentence(3 , false),
        'domicilio' => $faker->sentence(3 , false),
        'email'     => $faker->email,
        'confianza' => $faker->numberBetween(0, 10),
        'telefono'  => $faker->phoneNumber,
    ];
});
