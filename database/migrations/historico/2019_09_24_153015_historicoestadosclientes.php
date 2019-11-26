<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Historicoestadosclientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicoestadosclientes', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('cant_sin_info')->nullable($value = true);
            $table->integer('cant_no_contactados')->nullable($value = true);
            $table->integer('cant_contactados')->nullable($value = true);
            $table->integer('cant_agendados')->unsigned()->nullable($value = true);
            $table->integer('cant_instalados')->unsigned()->nullable($value = true);
            $table->integer('cant_con_observacion')->unsigned()->nullable($value = true);
            $table->integer('cant_ins_cap')->unsigned()->nullable($value = true);
            $table->date('fecha_respaldo')->nullable($value = true);
            
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
