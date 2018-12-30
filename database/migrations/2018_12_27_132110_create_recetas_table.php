<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('ingrediente_id');
            $table->float('cantidad');

            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');

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
        Schema::dropIfExists('recetas');
    }
}
