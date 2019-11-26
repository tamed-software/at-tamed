<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regiones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->integer('pais_id')->unsigned();
            $table->timestamps();
            $table->foreign('pais_id')->references('id')->on('paises')->onDelete('cascade');
        });
        DB::table('regiones')->insert(
            array(
             'nombre'=>'Región de Arica y Parinacota',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región de Tarapacá',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región de Antofagasta',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región de Atacama',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región de Coquimbo',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región de Valparaíso',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región Metropolitana de Santiago',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>"Región del Libertador General Bernardo O'Higgins",
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región del Maule',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región del Biobío',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región de La Araucanía',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región de Los Ríos',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región de Los Lagos',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(   
            array(
             'nombre'=>'Región de Aysén del General Carlos Ibáñez del Campo',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('regiones')->insert(  
            array(
             'nombre'=>'Región de Magallanes y de la Antártica Chilena',
             'pais_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regiones');
    }
}
