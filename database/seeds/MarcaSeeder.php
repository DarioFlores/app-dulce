<?php

use App\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create([
            'nombre' => 'Veronica'
        ]);

        factory(Marca::class, 50)->create();

        Marca::create([
            'nombre' => 'Blancaflor'
        ]);

        Marca::create([
            'nombre' => 'Tomacita'
        ]);
    }
}
