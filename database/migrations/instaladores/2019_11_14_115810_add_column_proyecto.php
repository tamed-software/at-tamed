<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table){
            
            $table->string('url_proyecto',250)->nullable($value = true);
            $table->string('url_cotizacion',250)->nullable($value = true);
            $table->integer('prioridad')->nullable($value = true);
            $table->string('tipo',250)->nullable($value = true);
            $table->string('ciudad',250)->nullable($value = true);
            
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
