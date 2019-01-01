<?php

use Illuminate\Database\Seeder;

class ComercioClienteDomicilioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ComercioClienteDomicilio::class, 50)->create();
    }
}
