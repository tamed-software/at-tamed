<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialesutilizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materialesutilizados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 100)->nullable($value = true);
            $table->integer('unidades')->nullable($value = true);
            $table->integer('cantidades')->nullable($value = true);
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
        Schema::dropIfExists('materialesutilizados');
    }
}
