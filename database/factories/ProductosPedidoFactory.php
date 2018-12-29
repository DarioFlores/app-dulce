<?php

use Faker\Generator as Faker;

$factory->define(App\ProductosPedido::class, function (Faker $faker) {
    return [
        'pedido_id'  => \App\Pedido::all()->random()->id,
        'producto_id'  => \App\Producto::all()->random()->id,
        'precio'  => $faker->randomFloat(3,0, 300),
        'cantidad'  => $faker->numberBetween(0, 10),
    ];
});
