<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariopilotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventariopilotos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('tiempo_instalacion_hora', 20, 2)->nullable($value = true);
            $table->float('tiempo_configuracion_hora', 20, 2)->nullable($value = true);
            $table->integer('cantidad')->nullable($value = true);
            $table->float('total', 20, 2)->nullable($value = true);
            $table->integer('piloto_id')->unsigned()->nullable($value = true);
            $table->integer('producto_id')->unsigned()->nullable($value = true);
            $table->foreign('piloto_id')->references('id')->on('pilotos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('inventariopilotos');
    }
}
