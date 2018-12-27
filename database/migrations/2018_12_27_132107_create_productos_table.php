<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');
            $table->string('preparacion');
            $table->float('peso');
            $table->integer('num_porcion');
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('molde_id');
            $table->string('descripcion');


            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('molde_id')->references('id')->on('moldes');

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
        Schema::dropIfExists('productos');
    }
}
