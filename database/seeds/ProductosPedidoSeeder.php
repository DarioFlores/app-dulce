<?php

use Illuminate\Database\Seeder;

class ProductosPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ProductosPedido::class, 50)->create();
    }
}
