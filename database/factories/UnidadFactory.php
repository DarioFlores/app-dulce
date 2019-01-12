<?php

use Faker\Generator as Faker;

$factory->define(App\Unidad::class, function (Faker $faker) {
    return [
        'nombre'      => $faker->word,
        'simbolo'      => $faker->randomLetter,
    ];
});
