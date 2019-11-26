<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->integer('ciudad_id')->unsigned();
            $table->timestamps();
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade');
        });
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Arica',
             'ciudad_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Camarones',
             'ciudad_id'=>'1',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Putre',
             'ciudad_id'=>'2',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'General Lagos',
             'ciudad_id'=>'2',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Iquique',
             'ciudad_id'=>'3',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Alto Hospicio',
             'ciudad_id'=>'3',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pozo Almonte',
             'ciudad_id'=>'4',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Camiña',
             'ciudad_id'=>'4',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Colchane',
             'ciudad_id'=>'4',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Huara',
             'ciudad_id'=>'4',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pica',
             'ciudad_id'=>'4',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Tocopilla',
             'ciudad_id'=>'5',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'María Elena',
             'ciudad_id'=>'5',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Calama',
             'ciudad_id'=>'6',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Ollagüe',
             'ciudad_id'=>'6',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Pedro de Atacama',
             'ciudad_id'=>'6',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Antofagasta',
             'ciudad_id'=>'7',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Mejillones',
             'ciudad_id'=>'7',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Sierra Gorda',
             'ciudad_id'=>'7',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Taltal',
             'ciudad_id'=>'7',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Chañaral',
             'ciudad_id'=>'8',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Diego de Almagro',
             'ciudad_id'=>'8',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Copiapó',
             'ciudad_id'=>'9',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Caldera',
             'ciudad_id'=>'9',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Tierra Amarilla',
             'ciudad_id'=>'9',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Vallenar',
             'ciudad_id'=>'10',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Alto del Carmen',
             'ciudad_id'=>'10',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Freirina',
             'ciudad_id'=>'10',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Huasco',
             'ciudad_id'=>'10',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'La Serena',
             'ciudad_id'=>'11',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Coquimbo',
             'ciudad_id'=>'11',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Andacollo',
             'ciudad_id'=>'11',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'La Higuera',
             'ciudad_id'=>'11',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Paiguano',
             'ciudad_id'=>'11',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Vicuña',
             'ciudad_id'=>'11',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Ovalle',
             'ciudad_id'=>'12',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Combarbalá',
             'ciudad_id'=>'12',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Monte Patria',
             'ciudad_id'=>'12',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Punitaqui',
             'ciudad_id'=>'12',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Río Hurtado',
             'ciudad_id'=>'12',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Illapel',
             'ciudad_id'=>'13',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Canela',
             'ciudad_id'=>'13',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Los Vilos',
             'ciudad_id'=>'13',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Salamanca',
             'ciudad_id'=>'13',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'La Ligua',
             'ciudad_id'=>'14',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cabildo',
             'ciudad_id'=>'14',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Papudo',
             'ciudad_id'=>'14',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Petorca',
             'ciudad_id'=>'14',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Zapallar',
             'ciudad_id'=>'14',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Los Andes',
             'ciudad_id'=>'15',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Calle Larga',
             'ciudad_id'=>'15',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Rinconada',
             'ciudad_id'=>'15',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Esteban',
             'ciudad_id'=>'15',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Felipe',
             'ciudad_id'=>'16',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Catemu',
             'ciudad_id'=>'16',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Llaillay',
             'ciudad_id'=>'16',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Panquehue',
             'ciudad_id'=>'16',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Putaendo',
             'ciudad_id'=>'16',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Santa María',
             'ciudad_id'=>'16',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quillota',
             'ciudad_id'=>'17',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Calera',
             'ciudad_id'=>'17',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Hijuelas',
             'ciudad_id'=>'17',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'La Cruz',
             'ciudad_id'=>'17',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Nogales',
             'ciudad_id'=>'17',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Valparaíso',
             'ciudad_id'=>'18',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Casablanca',
             'ciudad_id'=>'18',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Concón',
             'ciudad_id'=>'18',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Juan Fernández',
             'ciudad_id'=>'18',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Puchuncaví',
             'ciudad_id'=>'18',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quintero',
             'ciudad_id'=>'18',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Viña del Mar',
             'ciudad_id'=>'18',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Antonio',
             'ciudad_id'=>'19',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Algarrobo',
             'ciudad_id'=>'19',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cartagena',
             'ciudad_id'=>'19',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'El Quisco',
             'ciudad_id'=>'19',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'El Tabo',
             'ciudad_id'=>'19',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Santo Domingo',
             'ciudad_id'=>'19',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Isla de Pascua',
             'ciudad_id'=>'20',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Limache',
             'ciudad_id'=>'21',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quilpué',
             'ciudad_id'=>'21',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Villa Alemana',
             'ciudad_id'=>'21',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Olmué',
             'ciudad_id'=>'21',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Colina',
             'ciudad_id'=>'22',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lampa',
             'ciudad_id'=>'22',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Tiltil',
             'ciudad_id'=>'22',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Santiago',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cerrillos',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cerro Navia',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Conchalí',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'El Bosque',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Estación Central',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Huechuraba',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Independencia',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'La Cisterna',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'La Florida',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'La Granja',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'La Pintana',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'La Reina',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Las Condes',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lo Barnechea',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lo Espejo',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lo Prado',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Macul',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Maipú',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Ñuñoa',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pedro Aguirre Cerda',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Peñalolén',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Providencia',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pudahuel',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quilicura',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quinta Normal',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Recoleta',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Renca',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Joaquín',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Miguel',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Ramón',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Vitacura',
             'ciudad_id'=>'23',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Puente Alto',
             'ciudad_id'=>'24',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pirque',
             'ciudad_id'=>'24',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San José de Maipo',
             'ciudad_id'=>'24',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Bernardo',
             'ciudad_id'=>'25',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Buin',
             'ciudad_id'=>'25',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Calera de Tango',
             'ciudad_id'=>'25',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Paine',
             'ciudad_id'=>'25',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Melipilla',
             'ciudad_id'=>'26',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Alhué',
             'ciudad_id'=>'26',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Curacaví',
             'ciudad_id'=>'26',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'María Pinto',
             'ciudad_id'=>'26',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Pedro',
             'ciudad_id'=>'26',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Talagante',
             'ciudad_id'=>'27',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'El Monte',
             'ciudad_id'=>'27',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Isla de Maipo',
             'ciudad_id'=>'27',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Padre Hurtado',
             'ciudad_id'=>'27',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Peñaflor',
             'ciudad_id'=>'27',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Rancagua',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Codegua',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Coinco',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Coltauco',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Doñihue',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Graneros',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Las Cabras',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Machalí',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Malloa',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Mostazal',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Olivar',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Peumo',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pichidegua',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quinta de Tilcoco',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Rengo',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Requínoa',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Vicente',
             'ciudad_id'=>'28',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Fernando',
             'ciudad_id'=>'29',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Chépica',
             'ciudad_id'=>'29',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Chimbarongo',
             'ciudad_id'=>'29',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lolol',
             'ciudad_id'=>'29',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Nancagua',
             'ciudad_id'=>'29',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Palmilla',
             'ciudad_id'=>'29',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Peralillo',
             'ciudad_id'=>'29',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Placilla',
             'ciudad_id'=>'29',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pumanque',
             'ciudad_id'=>'29',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Santa Cruz',
             'ciudad_id'=>'29',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pichilemu',
             'ciudad_id'=>'30',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'La Estrella',
             'ciudad_id'=>'30',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Litueche',
             'ciudad_id'=>'30',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Marchihue',
             'ciudad_id'=>'30',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Navidad',
             'ciudad_id'=>'30',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Paredones',
             'ciudad_id'=>'30',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Curicó',
             'ciudad_id'=>'31',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Hualañé',
             'ciudad_id'=>'31',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Licantén',
             'ciudad_id'=>'31',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Molina',
             'ciudad_id'=>'31',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Rauco',
             'ciudad_id'=>'31',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Romeral',
             'ciudad_id'=>'31',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Sagrada Familia',
             'ciudad_id'=>'31',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Teno',
             'ciudad_id'=>'31',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Vichuquén',
             'ciudad_id'=>'31',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Talca',
             'ciudad_id'=>'32',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Constitución',
             'ciudad_id'=>'32',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Curepto',
             'ciudad_id'=>'32',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Empedrado',
             'ciudad_id'=>'32',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Maule',
             'ciudad_id'=>'32',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pelarco',
             'ciudad_id'=>'32',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pencahue',
             'ciudad_id'=>'32',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Río Claro',
             'ciudad_id'=>'32',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Clemente',
             'ciudad_id'=>'32',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Rafael',
             'ciudad_id'=>'32',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Linares',
             'ciudad_id'=>'33',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Colbún',
             'ciudad_id'=>'33',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Longaví',
             'ciudad_id'=>'33',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Parral',
             'ciudad_id'=>'33',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Retiro',
             'ciudad_id'=>'33',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Javier',
             'ciudad_id'=>'33',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Villa Alegre',
             'ciudad_id'=>'33',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Yerbas Buenas',
             'ciudad_id'=>'33',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cauquenes',
             'ciudad_id'=>'34',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Chanco',
             'ciudad_id'=>'34',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pelluhue',
             'ciudad_id'=>'34',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Chillán',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Bulnes',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cobquecura',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Coelemu',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Coihueco',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Chillán Viejo',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'El Carmen',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Ninhue',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Ñiquén',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pemuco',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pinto',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Portezuelo',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quillón',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quirihue',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Ránquil',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Carlos',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Fabián',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Ignacio',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Nicolás',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Treguaco',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Yungay',
             'ciudad_id'=>'35',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Los Angeles',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Antuco',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cabrero',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Laja',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Mulchén',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Nacimiento',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Negrete',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quilaco',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quilleco',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Rosendo',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Santa Bárbara',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Tucapel',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Yumbel',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Yumbel',
             'ciudad_id'=>'36',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Concepción',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Coronel',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Chiguayante',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Florida',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Hualqui',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lota',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Penco',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Pedro de la Paz',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Santa Juana',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Talcahuano',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Tomé',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Hualpén',
             'ciudad_id'=>'37',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lebu',
             'ciudad_id'=>'38',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Arauco',
             'ciudad_id'=>'38',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cañete',
             'ciudad_id'=>'38',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Contulmo',
             'ciudad_id'=>'38',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Curanilahue',
             'ciudad_id'=>'38',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Los Alamos',
             'ciudad_id'=>'38',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Tirúa',
             'ciudad_id'=>'38',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Angol',
             'ciudad_id'=>'39',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Collipulli',
             'ciudad_id'=>'39',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Curacautín',
             'ciudad_id'=>'39',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Ercilla',
             'ciudad_id'=>'39',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lonquimay',
             'ciudad_id'=>'39',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Los Sauces',
             'ciudad_id'=>'39',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lumaco',
             'ciudad_id'=>'39',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Purén',
             'ciudad_id'=>'39',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Renaico',
             'ciudad_id'=>'39',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Traiguén',
             'ciudad_id'=>'39',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Victoria',
             'ciudad_id'=>'39',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Temuco',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Carahue',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cunco',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Curarrehue',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Freire',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Galvarino',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Gorbea',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lautaro',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Loncoche',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Melipeuco',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Nueva Imperial',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Padre Las Casas',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Perquenco',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pitrufquén',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Pucón',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Saavedra',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Teodoro Schmidt',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Toltén',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Vilcún',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Villarrica',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cholchol',
             'ciudad_id'=>'40',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Valdivia',
             'ciudad_id'=>'41',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Corral',
             'ciudad_id'=>'41',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lanco',
             'ciudad_id'=>'41',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Los Lagos',
             'ciudad_id'=>'41',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Máfil',
             'ciudad_id'=>'41',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Mariquina',
             'ciudad_id'=>'41',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Paillaco',
             'ciudad_id'=>'41',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Panguipulli',
             'ciudad_id'=>'41',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'La Unión',
             'ciudad_id'=>'42',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Futrono',
             'ciudad_id'=>'42',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lago Ranco',
             'ciudad_id'=>'42',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Río Bueno',
             'ciudad_id'=>'42',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Osorno',
             'ciudad_id'=>'43',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Puerto Octay',
             'ciudad_id'=>'43',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Purranque',
             'ciudad_id'=>'43',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Puyehue',
             'ciudad_id'=>'43',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Río Negro',
             'ciudad_id'=>'43',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Juan de la Costa',
             'ciudad_id'=>'43',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Pablo',
             'ciudad_id'=>'43',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Puerto Montt',
             'ciudad_id'=>'44',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Calbuco',
             'ciudad_id'=>'44',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cochamó',
             'ciudad_id'=>'44',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Fresia',
             'ciudad_id'=>'44',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Frutillar',
             'ciudad_id'=>'44',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Los Muermos',
             'ciudad_id'=>'44',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Llanquihue',
             'ciudad_id'=>'44',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Maullín',
             'ciudad_id'=>'44',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Puerto Varas',
             'ciudad_id'=>'44',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Castro',
             'ciudad_id'=>'45',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Ancud',
             'ciudad_id'=>'45',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Chonchi',
             'ciudad_id'=>'45',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Curaco de Vélez',
             'ciudad_id'=>'45',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Dalcahue',
             'ciudad_id'=>'45',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Puqueldón',
             'ciudad_id'=>'45',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Queilén',
             'ciudad_id'=>'45',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quellón',
             'ciudad_id'=>'45',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quemchi',
             'ciudad_id'=>'45',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Quinchao',
             'ciudad_id'=>'45',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Chaitén',
             'ciudad_id'=>'46',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Futaleufú',
             'ciudad_id'=>'46',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Hualaihué',
             'ciudad_id'=>'46',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Palena',
             'ciudad_id'=>'46',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Coyhaique',
             'ciudad_id'=>'47',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Lago Verde',
             'ciudad_id'=>'47',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Aysén',
             'ciudad_id'=>'48',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cisnes',
             'ciudad_id'=>'48',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Guaitecas',
             'ciudad_id'=>'48',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Chile Chico',
             'ciudad_id'=>'49',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Río Ibáñez',
             'ciudad_id'=>'49',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cochrane',
             'ciudad_id'=>'50',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>"O'Higgins",
             'ciudad_id'=>'50',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Tortel',
             'ciudad_id'=>'50',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Natales',
             'ciudad_id'=>'51',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Torres del Paine',
             'ciudad_id'=>'51',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Punta Arenas',
             'ciudad_id'=>'52',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Laguna Blanca',
             'ciudad_id'=>'52',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Río Verde',
             'ciudad_id'=>'52',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'San Gregorio',
             'ciudad_id'=>'52',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Porvenir',
             'ciudad_id'=>'53',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Primavera',
             'ciudad_id'=>'53',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Timaukel',
             'ciudad_id'=>'53',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Cabo de Hornos',
             'ciudad_id'=>'54',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('comunas')->insert(
            array(
             'nombre'=>'Antártica',
             'ciudad_id'=>'54',
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
        Schema::dropIfExists('comunas');
    }
}
