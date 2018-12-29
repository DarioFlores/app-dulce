<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_domicilios', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('cliente_id')->nullable();
            $table->float('latitud')->nullable();
            $table->float('longitud')->nullable();
            $table->string('calle');
            $table->integer('numero');
            $table->string('entre_calles');

            $table->foreign('cliente_id')->references('id')->on('clientes');

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
        Schema::dropIfExists('cliente_domicilios');
    }
}
