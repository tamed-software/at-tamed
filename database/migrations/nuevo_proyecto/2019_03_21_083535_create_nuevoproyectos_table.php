<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNuevoproyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nuevoproyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_documento',20)->nullable($value = true);
            $table->string('nombre',100)->nullable($value = true);
            $table->string('direccion',200)->nullable($value = true);
            $table->integer('inmobiliaria_id')->nullable($value = true);
            $table->integer('estado_id')->nullable($value = true);
            $table->date('fecha_inicio_instalacion')->nullable($value = true);
            $table->date('fecha_termino_instalacion')->nullable($value = true);
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
        Schema::dropIfExists('nuevoproyectos');
    }
}
