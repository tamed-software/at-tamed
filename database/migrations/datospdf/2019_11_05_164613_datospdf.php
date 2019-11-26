<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Datospdf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datospdf', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pregunta1')->nullable($value = true);
            $table->integer('pregunta2')->nullable($value = true);
            $table->integer('pregunta3')->nullable($value = true);
            $table->integer('pregunta4')->nullable($value = true);
            $table->integer('pregunta5')->nullable($value = true);
            $table->integer('pregunta6')->nullable($value = true);
            $table->integer('pregunta7')->nullable($value = true);
            $table->integer('pregunta8')->nullable($value = true);
            $table->integer('pregunta9')->nullable($value = true);
            $table->integer('pregunta10')->nullable($value = true);
            $table->integer('pregunta11')->nullable($value = true);
            $table->integer('pregunta12')->nullable($value = true);
            $table->integer('pregunta13')->nullable($value = true);
            $table->integer('pregunta14')->nullable($value = true);
            $table->integer('pregunta15')->nullable($value = true);
            $table->integer('pregunta16')->nullable($value = true);
            $table->integer('pregunta17')->nullable($value = true);
            $table->integer('cliente_id')->nullable($value = true);
            $table->integer('direccion_id')->nullable($value = true);
            $table->integer('tecnico_id')->nullable($value = true);
            $table->integer('ultimo_id_hc_ingresado')->nullable($value = true);
            $table->integer('numeroProtocoloCliente')->nullable($value = true);
            $table->longText('comentarioProtocoloCliente')->nullable($value = true);
            $table->string('hora_inicio_protocolo')->nullable($value = true);
            $table->string('hora_termino_protocolo')->nullable($value = true);
            $table->string('nombre_tecnico')->nullable($value = true);
            $table->string('apellido_tecnico')->nullable($value = true);

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
        //
    }
}
