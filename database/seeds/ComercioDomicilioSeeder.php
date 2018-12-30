<?php

use Illuminate\Database\Seeder;

class ComercioDomicilioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ComercioDomicilio::class, 50)->create();
    }
}
