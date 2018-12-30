<?php

use Illuminate\Database\Seeder;

class ClienteDomicilioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ClienteDomicilio::class, 50)->create();
    }
}
