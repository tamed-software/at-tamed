<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelInstaladores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instaladores', function (Blueprint $table){
            $table->increments('id');
            $table->string('nombre_instalador',55)->nullable($value = true);
            $table->string('rut_instalador',20)->nullable($value = true);
            $table->integer('nivel')->nullable($value = true);  
            $table->string('tipo',50)->nullable($value = true);  
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
