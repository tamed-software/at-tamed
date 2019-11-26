<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialclientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialclientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userinmobiliaria_id')->unsigned()->nullable($value = true);
            $table->integer('cliente_id')->unsigned()->nullable($value = true);
            $table->date('fecha_modificacion')->nullable($value = true);
            $table->timestamps();
            $table->foreign('userinmobiliaria_id')->references('id')->on('usersinmobiliarias')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historialclientes');
    }
}
