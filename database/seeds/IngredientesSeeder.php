<?php

use App\Ingrediente;
use App\Marca;
use Illuminate\Database\Seeder;

class IngredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //SELECT id FROM marcas WHERE nombre='Blancaflor'
        $marcaId = Marca::where('nombre','Veronica')->value('id');

        Ingrediente::create([
            'nombre' => 'Harina',
            'marca_id' => $marcaId
        ]);
        $i=0;
        while ($i<50){
            factory(Ingrediente::class)->create([
                'marca_id' => random_int(1,50),
            ]);
            $i++;
        }


        Ingrediente::create([
            'nombre' => 'Queso',
            'marca_id' => $marcaId
        ]);
    }
}
