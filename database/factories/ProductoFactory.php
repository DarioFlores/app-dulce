<?php

use App\Categoria;
use App\Molde;
use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence(3 , false),
        'preparacion' => $faker->text(),
        'peso' => $faker->randomFloat(4,0,5),
        'num_porcion' => $faker->numberBetween(0,10),
        'categoria_id' => Categoria::all()->random()->id,
        'molde_id' => Molde::all()->random()->id,
        'descripcion' => $faker->text(),
    ];
});
