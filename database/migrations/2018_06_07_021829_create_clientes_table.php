<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado_id')->unsigned()->nullable($value = true);
            $table->integer('proyecto_id')->unsigned()->nullable($value = true);
            $table->string('vivienda', 20)->nullable($value = true);
            $table->string('num_documento', 20)->nullable($value = true);
            $table->string('nombre', 50)->nullable($value = true);
            $table->string('apellido', 50)->nullable($value = true);
            $table->date('fecha_nacimiento')->nullable($value = true);
            $table->string('telefono1', 15)->nullable($value = true);
            $table->string('telefono2', 15)->nullable($value = true);
            $table->string('correo', 50)->nullable($value = true);
            $table->string('pregunta1', 250)->nullable($value = true);
            $table->string('respuesta1', 250)->nullable($value = true);
            $table->string('pregunta2', 250)->nullable($value = true);
            $table->string('respuesta2', 250)->nullable($value = true);
            $table->string('pregunta3', 250)->nullable($value = true);
            $table->string('respuesta3', 250)->nullable($value = true);
            $table->string('email', 250)->nullable($value = true);
            $table->string('resp_email', 250)->nullable($value = true);
            $table->string('capacitacion', 50)->nullable($value = true);
            $table->string('codigo', 100)->nullable($value = true);
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
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
        Schema::dropIfExists('clientes');
    }
}
