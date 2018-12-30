<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComerciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercios', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');
            //$table->string('ofertas');
            // https://www.tiendeo.com.ar/san-fernando-del-valle-de-catamarca/supermercados-vea
            // https://www.tiendeo.com.ar/{ciudad}/{comercio}

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comercios');
    }
}
