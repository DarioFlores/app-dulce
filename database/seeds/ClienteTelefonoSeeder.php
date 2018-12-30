<?php

use Illuminate\Database\Seeder;

class ClienteTelefonoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ClienteTelefono::class, 50)->create();
    }
}
