<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('inmobiliaria', 'InmobiliariaController')->middleware('cors');
Route::resource('proyecto', 'ProyectoController');
Route::resource('cliente', 'ClienteController');
Route::get('agregar_cliente', 'ClienteController@nuevo_cliente');
Route::resource('arrendatario', 'ArrendatarioController');
Route::get('inmobiliaria_proyecto/{id}',array('as'=>'inmobiliaria.proyecto','uses'=>'ProyectoController@inmobiliariaProyecto'));
Route::get('inmobiliariaProyecto/{id}',array('as'=>'inmobiliaria.proyecto','uses'=>'ProyectoController@inmobiliaria_proyecto'));
Route::get('proyecto_cliente/{id}',array('as'=>'proyecto.cliente','uses'=>'ClienteController@proyectoCliente'));
Route::get('proyecto_fecha',array('as'=>'proyecto.fecha','uses'=>'ProyectoController@proyectoFecha'));
Route::get('encuestas/{cliente_id}/{calificacion}/{protocolo_id}','EncuestasController@encuesta');
// apis para web
Route::get('inmobiliarias_proyectos','InmobiliariasProyectosController@datosInmobiliariasProyectos');
Route::get('inmobiliarias_proyectosCasas','InmobiliariasProyectosController@datosInmobiliariasProyectosCasas');
Route::get('inmobiliarias_proyectosDepartamentos','InmobiliariasProyectosController@datosInmobiliariasProyectosDepartamentos');
Route::get('inmobiliarias_proyectosOficinas','InmobiliariasProyectosController@datosInmobiliariasProyectosOficinas');
Route::get('inmobiliarias_proyectosID/{nombre}','InmobiliariasProyectosController@datosInmobiliariasProyectosID');
Route::get('inmobiliarias_proyectosCasasRegiones','InmobiliariasProyectosController@datosInmobiliariasProyectosCasasRegiones');
Route::get('inmobiliarias_proyectosDepartamentosRegiones','InmobiliariasProyectosController@datosInmobiliariasProyectosDepartamentosRegiones');
Route::get('inmobiliarias_proyectosCasasSantiago','InmobiliariasProyectosController@datosInmobiliariasProyectosCasasSantiago');
Route::get('inmobiliarias_proyectosDepartamentosSantiago','InmobiliariasProyectosController@datosInmobiliariasProyectosDepartamentosSantiago');
// Validar código de cliente
Route::get('verificar_codigo/{proyecto_id}',array('as'=>'verificar.codigo','uses'=>'ClienteController@verificarCodigo'));
// Enviar código email de cliente donde el proyecto no coincida
Route::get('enviar_codigo_cliente',array('as'=>'enviar.codigo','uses'=>'ClienteController@enviarCodigoCliente'));
// Enviar código email de cliente cuando se solicita desde el formulario del index
Route::get('solicitud_codigo_cliente',array('as'=>'solicitud.codigo','uses'=>'ClienteController@solicitudCodigoCliente'));
// Activar código de cliente
Route::get('activar_codigo_cliente',array('as'=>'activar.codigo','uses'=>'ClienteController@activarCodigoCliente'));
// Agregar arrendatario
Route::post('agregar_arrendatario',array('as'=>'agregar.arrendatario','uses'=>'ClienteController@agregarArrendatario'));
// Agregar arrendatario
Route::post('agregar_cliente',array('as'=>'agregar.cliente','uses'=>'ClienteController@agregarCliente'));
// Listar arrendatarios por cliente id
Route::get('listar_arrendatarios/{id_cliente}',array('as'=>'listar.arrendatarios','uses'=>'ArrendatarioController@arrendatariosCliente'));

Route::get('crearProtocoloPdf/{ultimo_hc}',array('as'=>'crearProtocoloPdf','uses'=>'ClienteController@crearProtocoloPdf'))->middleware('cors');
// Listar datos de cliente
//Route::get('listar_datos_cliente',array('as'=>'listar.cliente','uses'=>'ClienteController@listarDatosCliente'));
//Listar proyectos
Route::get('inmobiliariaProyecto/{id}',array('as'=>'inmobiliaria.proyecto','uses'=>'ProyectoController@inmobiliaria_proyecto'));
//Eloqua
Route::get('/form-eloqua', function () {
	return view('form_eloqua');
});
// Rutas validar clave
Route::get('validar_usuario/{user}/{password}',array('as'=>'validar_usuario','uses'=>'ApibookmeController@validar_usuario'))->middleware('cors');
// Rutas para protocolo
Route::get('listar_inmobiliarias',array('as'=>'listar_inmobiliarias','uses'=>'ProyectoController@listar_inmobiliarias'))->middleware('cors');
// Mostrar proyectos asociados una inmobiliaria
Route::get('listar_proyecto_inmobiliaria/{id?}',array('as'=>'listar_proyecto_inmobiliaria','uses'=>'ProyectoController@listar_proyecto_inmobiliaria'))->middleware('cors');
// Mostrar clientes asociados a un proyecto
Route::get('listar_clientes_proyecto/{id?}',array('as'=>'listar_clientes_proyecto','uses'=>'ProyectoController@listar_clientes_proyecto'))->middleware('cors');
// Agregar PDF Protocolo en cliente AT
Route::post('agregar_pdf_protocolo/{id?}',array('as'=>'agregar_pdf_protocolo','uses'=>'ProyectoController@agregar_pdf_protocolo'))->middleware('cors');
