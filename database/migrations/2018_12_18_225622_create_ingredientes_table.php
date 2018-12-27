<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');
            $table->unsignedInteger('marca_id');
            $table->unsignedInteger('unidad_id');
            $table->float('cantidad');
            $table->boolean('has_tacc');
            $table->string('cod_barra');
            $table->string('detalles');


            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('unidad_id')->references('id')->on('unidads');

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
        Schema::dropIfExists('ingredientes');
    }
}
