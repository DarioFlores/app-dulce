<?php

use Faker\Generator as Faker;

$factory->define(\App\Ingrediente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence(3 , false),
    ];
});
