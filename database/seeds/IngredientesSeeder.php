<?php

use App\Ingrediente;
use App\Marca;
use Illuminate\Database\Seeder;

class IngredientesSeeder extends Seeder
{
    public function run()
    {
        //SELECT id FROM marcas WHERE nombre='Blancaflor'
        //$marcaId = Marca::where('nombre','Veronica')->value('id');
        /**
        Ingrediente::create([
        'nombre' => 'Queso',
        'marca_id' => $marcaId
        ]);
        **/

        factory(Ingrediente::class, 50)->create();

    }
}
