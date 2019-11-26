<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumPdf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datospdf', function (Blueprint $table){


            $table->string('nombre_cliente', 200)->nullable($value = true);
            $table->string('apellido_cliente', 200)->nullable($value = true);
            $table->string('telefono_cliente', 200)->nullable($value = true);
            $table->string('email_cliente', 200)->nullable($value = true);
            $table->string('rut_cliente', 200)->nullable($value = true);
            $table->string('inmobiliaria', 200)->nullable($value = true);
            $table->string('proyecto', 200)->nullable($value = true);            


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
