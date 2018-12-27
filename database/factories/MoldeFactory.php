<?php

use Faker\Generator as Faker;

$factory->define(App\Molde::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence(3 , false),
        'medidas' => $faker->sentence(),
        'detalles' => $faker->sentence(),
    ];
});
