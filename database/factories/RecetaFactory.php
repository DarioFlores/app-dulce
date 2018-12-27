<?php

use App\Ingrediente;
use App\Producto;
use Faker\Generator as Faker;

$factory->define(App\Receta::class, function (Faker $faker) {
    return [
        'producto_id'  => Producto::all()->random()->id,
        'ingrediente_id' => Ingrediente::all()->random()->id,
        'cantidad' => $faker->randomFloat(4,0,10),
    ];
});
