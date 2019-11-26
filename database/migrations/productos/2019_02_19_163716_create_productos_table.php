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
            $table->string('codigo', 100)->nullable($value = true);
            $table->string('producto', 200)->nullable($value = true);
            $table->float('tiempo_instalacion_hora', 20, 2)->nullable($value = true);
            $table->float('tiempo_configuracion_hora', 20, 2)->nullable($value = true);
            $table->float('total', 20, 2)->nullable($value = true);
            $table->integer('cantidad')->nullable($value = true);
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
