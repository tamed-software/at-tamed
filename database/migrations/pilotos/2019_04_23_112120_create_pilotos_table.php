<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilotos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_implementacion')->nullable($value = true);
            $table->date('fecha_capacitacion')->nullable($value = true);
            $table->date('fecha_retiro')->nullable($value = true);
            $table->string('direccion', 100)->nullable($value = true);
            $table->longText('descripcion')->nullable($value = true);
            $table->longText('observacion')->nullable($value = true);
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
        Schema::dropIfExists('pilotos');
    }
}
