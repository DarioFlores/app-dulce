<?php

use App\Molde;
use Illuminate\Database\Seeder;

class MoldeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Molde::class, 20)->create();
    }
}
