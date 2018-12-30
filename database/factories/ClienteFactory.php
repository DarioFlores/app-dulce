<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'nombre'    => $faker->sentence(3 , false),
        'apellido'  => $faker->sentence(3 , false),
        'user_id'   => \App\User::all()->random()->id,
        //'confianza' => $faker->numberBetween(0, 10),
    ];
});
