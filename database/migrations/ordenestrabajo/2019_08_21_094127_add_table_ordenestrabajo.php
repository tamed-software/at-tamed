<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableOrdenestrabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenestrabajo', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_pautada')->nullable($value = true);
            $table->time('hora_pautada')->nullable($value = true);
            $table->string('tipo_trabajo')->nullable($value = true);
            $table->integer('responsable_asignado_id')->unsigned()->nullable($value = true);
            $table->integer('numero_orden')->nullable($value = true);
            $table->string('nombre_cliente', 100)->nullable($value = true);
            $table->string('direccion_cliente')->nullable($value = true);
            $table->integer('responsable_ultima_visita_id')->unsigned()->nullable($value = true);
            $table->string('codigo_interno', 100)->nullable($value = true);
            $table->string('obra_gruesa', 100)->nullable($value = true);
            $table->string('mudanza',100)->nullable($value = true);
            $table->string('terminaciones_menores', 100)->nullable($value = true);
            $table->string('habitada', 100)->nullable($value = true);
            $table->longText('observaciones_visita_anterior')->nullable($value = true);
            $table->longText('requerimientos_adicionales')->nullable($value = true);
            $table->integer('cliente_id')->unsigned()->nullable($value = true);
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('responsable_asignado_id')->references('id')->on('instaladores')->onDelete('cascade');
            $table->foreign('responsable_ultima_visita_id')->references('id')->on('instaladores')->onDelete('cascade');
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
