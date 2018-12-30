<?php

use Illuminate\Database\Seeder;

class ComercioTelefonoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ComercioTelefono::class, 50)->create();
    }
}
