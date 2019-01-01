<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComercioClienteDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercio_cliente_domicilios', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('comercio_id');
            $table->unsignedInteger('domicilio_id');

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('comercio_id')->references('id')->on('comercios');
            $table->foreign('domicilio_id')->references('id')->on('domicilios');

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
        Schema::dropIfExists('comercio_cliente_domicilios');
    }
}
