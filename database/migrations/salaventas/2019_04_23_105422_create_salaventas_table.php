<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaventas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_implementacion')->nullable($value = true);
            $table->date('fecha_capacitacion')->nullable($value = true);
            $table->date('fecha_retiro')->nullable($value = true);
            $table->string('stand', 20)->nullable($value = true);
            $table->longText('descripcion')->nullable($value = true);
            $table->integer('contrato_id')->unsigned()->nullable($value = true);
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
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
        Schema::dropIfExists('salaventas');
    }
}
