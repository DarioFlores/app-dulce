<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->vaciarTablas([
            'marcas',
            'unidads',
            'users',
            'ingredientes',
            'categorias',
            'moldes',
            'productos',
            'clientes',
            'recetas',
        ]);

        // $this->call(UsersTableSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(UnidadSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(IngredientesSeeder::class);
        $this->call(MoldeSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(RecetaSeeder::class);

    }

    /**
     * @param $tablas
     */
    protected function vaciarTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }


}
