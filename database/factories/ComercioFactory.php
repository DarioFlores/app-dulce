<?php

use Faker\Generator as Faker;

$factory->define(App\Comercio::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company,
    ];
});
