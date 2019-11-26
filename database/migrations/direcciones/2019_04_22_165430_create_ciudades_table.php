<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiudadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->integer('region_id')->unsigned();
            $table->timestamps();
            $table->foreign('region_id')->references('id')->on('regiones')->onDelete('cascade');
        });
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Arica',
             'region_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Parinacota',
             'region_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Iquique',
             'region_id'=>'2',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia del Tamarugal',
             'region_id'=>'2',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Tocopilla',
             'region_id'=>'3',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de El Loa',
             'region_id'=>'3',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Antofagasta',
             'region_id'=>'3',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Chañaral',
             'region_id'=>'4',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Copiapó',
             'region_id'=>'4',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Huasco',
             'region_id'=>'4',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Elqui',
             'region_id'=>'5',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Limarí',
             'region_id'=>'5',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Choapa',
             'region_id'=>'5',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Petorca',
             'region_id'=>'6',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Los Andes',
             'region_id'=>'6',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de San Felipe de Aconcagua',
             'region_id'=>'6',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Quillota',
             'region_id'=>'6',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Valparaíso',
             'region_id'=>'6',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de San Antonio',
             'region_id'=>'6',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Isla de Pascua',
             'region_id'=>'6',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Marga Marga',
             'region_id'=>'6',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Chacabuco',
             'region_id'=>'7',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Santiago',
             'region_id'=>'7',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Cordillera',
             'region_id'=>'7',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Maipo',
             'region_id'=>'7',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Melipilla',
             'region_id'=>'7',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Talagante',
             'region_id'=>'7',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Cachapoal',
             'region_id'=>'8',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Colchagua',
             'region_id'=>'8',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Cardenal Caro',
             'region_id'=>'8',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Curicó',
             'region_id'=>'9',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Talca',
             'region_id'=>'9',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Linares',
             'region_id'=>'9',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Cauquenes',
             'region_id'=>'9',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Ñuble',
             'region_id'=>'10',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Biobío',
             'region_id'=>'10',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Concepción',
             'region_id'=>'10',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Arauco',
             'region_id'=>'10',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Malleco',
             'region_id'=>'11',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Cautín',
             'region_id'=>'11',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Valdivia',
             'region_id'=>'12',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia del Ranco',
             'region_id'=>'12',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Osorno',
             'region_id'=>'13',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Llanquihue',
             'region_id'=>'13',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Chiloé',
             'region_id'=>'13',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Palena',
             'region_id'=>'13',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Coyhaique',
             'region_id'=>'14',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Aysén',
             'region_id'=>'14',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de General Carrera',
             'region_id'=>'14',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Capitán Prat',
             'region_id'=>'14',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Última Esperanza',
             'region_id'=>'15',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Magallanes',
             'region_id'=>'15',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de Tierra del Fuego',
             'region_id'=>'15',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('ciudades')->insert(
            array(
             'nombre'=>'Provincia de la Antártica Chilena',
             'region_id'=>'15',
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
        Schema::dropIfExists('ciudades');
    }
}
