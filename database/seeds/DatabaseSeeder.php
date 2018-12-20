<?php

use App\Unidad;
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
            'ingredientes',
            'users',
            'unidads',
        ]);

        // $this->call(UsersTableSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(UnidadSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(IngredientesSeeder::class);

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
