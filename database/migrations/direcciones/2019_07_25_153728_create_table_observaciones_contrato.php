<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableObservacionesContrato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observacionescontrato', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_observacion')->nullable($value = true);
            $table->longText('observacion')->nullable($value = true);
            $table->date('codigo_jira')->nullable($value = true);
            $table->integer('estado_id')->unsigned()->nullable($value = true);
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->integer('contrato_id')->unsigned()->nullable($value = true);
            $table->foreign('contrato_id')->references('id')->on('contrato')->onDelete('cascade');
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
