<?php

use Faker\Generator as Faker;

$factory->define(App\Telefono::class, function (Faker $faker) {
    return [
        'telefono'  => $faker->phoneNumber,
        'tipo'      => $faker->word,
    ];
});
