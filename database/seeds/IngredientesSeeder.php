<?php

use App\Ingrediente;
use Illuminate\Database\Seeder;

class IngredientesSeeder extends Seeder
{
    public function run()
    {
        factory(Ingrediente::class, 50)->create();
    }
}
