<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComentarioFinanza extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentariosfinanza', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_observacion')->nullable($value = true);
            $table->longText('observacion')->nullable($value = true);
            $table->string('responsable', 100)->nullable($value = true);
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
        //
    }
}