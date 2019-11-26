<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProyeccionesFechasInstalaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyeccionInstalaciones', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('proyecto_id')->unsigned()->nullable($value = true);
          $table->date('mes_annio_instalacion')->nullable($value = true);
          $table->integer('cantidad_instalacion')->unsigned()->nullable($value = true);
          $table->timestamps();

          $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
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
