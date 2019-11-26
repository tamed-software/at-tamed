<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_documento', 20)->nullable($value = true);
            $table->string('nombre', 100)->nullable($value = true);
            $table->string('direccion', 200)->nullable($value = true);
            $table->integer('inmobiliaria_id')->unsigned()->nullable($value = true);
            $table->foreign('inmobiliaria_id')->references('id')->on('inmobiliarias')->onDelete('cascade');
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
        Schema::dropIfExists('proyectos');
    }
}
