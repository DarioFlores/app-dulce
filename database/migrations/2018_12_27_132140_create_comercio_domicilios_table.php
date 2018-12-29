<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComercioDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercio_domicilios', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('comercio_id');
            $table->float('latitud')->nullable();
            $table->float('longitud')->nullable();
            $table->string('calle');
            $table->integer('numero');
            $table->string('entre_calles');

            $table->foreign('comercio_id')->references('id')->on('comercios');

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
        Schema::dropIfExists('comercio_domicilios');
    }
}
