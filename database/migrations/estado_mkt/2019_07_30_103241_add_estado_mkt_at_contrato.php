<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoMktAtContrato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->integer('estado_mkt')->unsigned()->nullable($value = true);
            $table->integer('estado_at')->unsigned()->nullable($value = true);
            $table->foreign('estado_mkt')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('estado_at')->references('id')->on('estados')->onDelete('cascade');
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
