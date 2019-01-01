<?php

use Illuminate\Database\Seeder;

class ComercioClienteTelefonoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ComercioClienteTelefono::class, 50)->create();
    }
}
