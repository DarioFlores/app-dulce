<?php

use Faker\Generator as Faker;

$factory->define(\App\Marca::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence(3, false),
    ];
});
