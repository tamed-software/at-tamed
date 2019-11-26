<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportefallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportefallas', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('producto_servicio_falla')->nullable($value = true);
            $table->longText('descripcion_falla')->nullable($value = true);
            $table->integer('orden_id')->unsigned()->nullable($value = true);
            $table->foreign('orden_id')->references('id')->on('ordenestrabajo')->onDelete('cascade');
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
        Schema::dropIfExists('reportefallas');
    }
}
