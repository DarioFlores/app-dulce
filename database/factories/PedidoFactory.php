<?php

use Faker\Generator as Faker;

$factory->define(App\Pedido::class, function (Faker $faker) {
    return [
        'cliente_id'  => \App\Cliente::all()->random()->id,
        'envio'  => $faker->boolean(),
        'fecha'  => $faker->date(),
        'hora'  => $faker->time(),
        'pagado'  => $faker->boolean(),
        'senia'  => $faker->randomFloat(4,1,300),
    ];
});
