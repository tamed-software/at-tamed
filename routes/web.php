<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Proyecto;
use App\Inmobiliaria;
use App\Cliente;
use App\Pdfprotocoloscliente;
use App\Ordentrabajo;
use Illuminate\Support\Facades\Input;

//
Route::get('/', function () {
    return redirect('login');
});

//
Route::get('/logout', function () {
	return redirect('login');
});

Auth::routes();

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "All cache cleared";
});

Route::resource('clientes', 'HomeController');
Route::get('/home2', 'HomeController@index')->name('home');
Route::get('/home_instalador', 'InstaladorController@index')->name('index');
Route::get('/cliente', 'HomeController@cliente')->name('cliente');
Route::get('/agendaInstaladores', 'HomeController@agendaInstaladores')->name('agendaInstaladores');
Route::get('/programarAgendaInstaladores/{id_proyecto}/{id_instalador}', 'InstaladorController@programarAgendaInstaladores')->name('programarAgendaInstaladores');
Route::get('/habilitarAgendaInstaladores', 'InstaladorController@habilitarAgendaInstaladores')->name('habilitarAgendaInstaladores');
Route::post('agenda/nuevafecha', 'InstaladorController@nuevafecha')->name('newdate');
Route::get('/importar', 'HomeController@importar')->name('importar');
Route::post('clienteImport', 'HomeController@clienteImport')->name('cliente.import');
Route::get('/reporteProyectos', 'ReporteController@index')->name('reporteProyectos');
Route::get('/reporteMensualProyectos', 'ReporteController@reporte_mensual')->name('reporteMensualProyectos')->middleware('auth');
Route::get('/reporteMensualProyectosDetallado', 'ReporteController@reporte_mensual_proyectos_detallado')->name('reporteMensualProyectosDetallado')->middleware('auth');

Route::get('/ajax-proyectos', function(){

	$inm_id 	= Input::get('inm_id');
	$proyectos 	= Proyecto::where('inmobiliaria_id', '=', $inm_id)->where('estado_id', 6)->orderBy('nombre', 'asc')->get();
	return Response::json($proyectos);
});

//
Route::get('/mostrarClientes', function(){

	$id_proyecto 	= Input::get('id_proyecto');
	$estado_id 		= Input::get('estado_id');
	$datos = [];

	if ($estado_id == 1) {
		$clientes = Cliente::where('proyecto_id', '=', $id_proyecto)->where('estado_id', $estado_id)->orderBy('nombre', 'asc')->orderBy('nombre', 'asc')->get();
	} else if ($estado_id == 2) {
		$clientes = Cliente::where('proyecto_id', '=', $id_proyecto)->where('estado_id', $estado_id)->orderBy('nombre', 'asc')->orderBy('nombre', 'asc')->get();
	} else if ($estado_id == 3) {
		$clientes = Cliente::where('proyecto_id', '=', $id_proyecto)->where('estado_id', $estado_id)->orderBy('nombre', 'asc')->orderBy('nombre', 'asc')->get();
	} else if ($estado_id == 4) {
		$clientes = Cliente::where('proyecto_id', '=', $id_proyecto)->where('estado_id', $estado_id)->orderBy('nombre', 'asc')->orderBy('nombre', 'asc')->get();
	} else if ($estado_id == 5) {
		$clientes = Cliente::where('proyecto_id', '=', $id_proyecto)->where('estado_id', $estado_id)->orderBy('nombre', 'asc')->orderBy('nombre', 'asc')->get();
	} else if ($estado_id == 8) {
		$clientes = Cliente::where('proyecto_id', '=', $id_proyecto)->where('estado_id', $estado_id)->orderBy('nombre', 'asc')->orderBy('nombre', 'asc')->get();
	} else if ($estado_id == 9) {
		$clientes = Cliente::where('proyecto_id', '=', $id_proyecto)->where('estado_id', $estado_id)->orderBy('nombre', 'asc')->orderBy('nombre', 'asc')->get();
	} else if ($estado_id == 10) {
		$clientes = Cliente::where('proyecto_id', '=', $id_proyecto)->where('estado_id', $estado_id)->orderBy('nombre', 'asc')->orderBy('nombre', 'asc')->get();
	} else if ($estado_id == 0) {
		$clientes = Cliente::where('proyecto_id', '=', $id_proyecto)->orderBy('nombre', 'asc')->orderBy('vivienda', 'asc')->get();
	}

	foreach ($clientes as $cliente) {

		$ordenes = Ordentrabajo::where('cliente_id',$cliente->id)->count();

		$datos[] = array(

		    'id' => $cliente->id,
		    'estado_id' => $cliente->estado_id,
		    'vivienda' => $cliente->vivienda,
		    'nombre' => $cliente->nombre,
		    'apellido' => $cliente->apellido,
		    'telefono1' => $cliente->telefono1,
		    'correo' =>$cliente->correo,
		    'observacion' => $cliente->observacion,
		    'pdf_protocolo' => $cliente->pdf_protocolo,
		    'countOrdenes' => $ordenes

		);

	}

	return Response::json($datos);
});

Route::get('/mostrar_fechas_proyecto', function(){
	$id_proyecto 	= Input::get('id_proyecto');
	$count_fecha_inicio_instalacion = Proyecto::select('fecha_inicio_instalacion', 'cantidad')->where('id', $id_proyecto)->count();
    if($count_fecha_inicio_instalacion){
        $fecha_inicio_instalacion = Proyecto::select('fecha_inicio_instalacion', 'cantidad')->where('id', $id_proyecto)->get();
        return Response::json($fecha_inicio_instalacion);
    } else {
        return 1;
    }
});

//
Route::get('/editarClientes', function(){

	$id_cliente = Input::get('id');
	$cliente 	= Cliente::where('id', '=', $id_cliente)->get();
	return Response::json($cliente);
});

// Mostrar estados de clientes por proyecto
Route::get('/mostrarEstadosClientes', function(){

	$proyecto_id = Input::get('proyecto_id');

	// Estados
	$countContactados 	 = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto_id)
                           ->where('clientes.estado_id', 1)->where('proyectos.estado_id', 6)->count();
    $countNoContactados  = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto_id)
                           ->where('clientes.estado_id', 2)->where('proyectos.estado_id', 6)->count();
    $countInstalados     = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto_id)
                           ->where('clientes.estado_id', 3)->where('proyectos.estado_id', 6)->count();
    $countAgendados      = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto_id)
                           ->where('clientes.estado_id', 4)->where('proyectos.estado_id', 6)->count();
    $countSinInformacion = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto_id)
                           ->where('clientes.estado_id', 5)->where('proyectos.estado_id', 6)->count();
    $countInsCap         = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto_id)
                           ->where('clientes.estado_id', 8)->where('proyectos.estado_id', 6)->count();
    $countCapacitados    = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto_id)
                           ->where('clientes.estado_id', 9)->where('proyectos.estado_id', 6)->count();
    $countObservacion    = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto_id)
                           ->where('clientes.estado_id', 10)->where('proyectos.estado_id', 6)->count();

    // Capacitados
    $clienteCapacitado 	 = Cliente::where('proyecto_id',$proyecto_id)->where('capacitacion', 'CAPACITADO')->count();
    $clienteNoCapacitado = Cliente::where('proyecto_id',$proyecto_id)->where('capacitacion', 'NO CAPACITADO')->count();
    $clienteAgendado 	 = Cliente::where('proyecto_id',$proyecto_id)->where('capacitacion', 'AGENDADO')->count();
    $clienteNoContactado = Cliente::where('proyecto_id',$proyecto_id)->where('capacitacion', 'NO CONTACTADO')->count();

    return Response::json(array(
    	'countContactados' 		=> $countContactados,
		'countNoContactados' 	=> $countNoContactados,
		'countInstalados' 		=> $countInstalados,
		'countAgendados' 		=> $countAgendados,
		'countSinInformacion' 	=> $countSinInformacion,
        'countInsCap'           => $countInsCap,
        'countCapacitados'      => $countCapacitados,
        'countObservacion'      => $countObservacion,
		'clienteCapacitado' 	=> $clienteCapacitado,
		'clienteNoCapacitado' 	=> $clienteNoCapacitado,
		'clienteAgendado' 		=> $clienteAgendado,
		'clienteNoContactado' 	=> $clienteNoContactado
    ));
});

// Mostrar graficos por fecha estado y capacitados
Route::get('estadosPorFecha/{fecha?}', 'HomeController@estadosPorFecha')->name('estados.fecha')->middleware('auth');

// Mostrar graficos totales por estado y capacitados
Route::get('totalGraficosClientes', 'HomeController@graficos_totales_clientes')->name('graficos.totales')->middleware('auth');

Route::get('crear_grafico_fecha_estado', 'ReporteController@crear_grafico_fecha_estado')->name('crear_grafico_fecha_estado')->middleware('auth');

Route::get('crear_grafico_proyeccion_instalaciones', 'ReporteController@crear_grafico_proyeccion_instalaciones')->name('crear_grafico_proyeccion_instalaciones')->middleware('auth');

Route::get('reporteProyeccionDetallado/{fecha}', 'ReporteController@reporte_proyeccion_detallado')->name('reporte_proyeccion_detallado')->middleware('auth');

//Exportar a excel
Route::get('exportarExcel', 'HomeController@exportarExcel')->name('exportar.excel')->middleware('auth');

// Contratos
Route::resource('contrato', 'ContratoController');

Route::get('fechas_personalizadas/{id}', 'ContratoController@fechas_personalizadas')->name('fechas_personalizadas')->middleware('auth');

Route::get('contrato.create', 'ContratoController@crear_contrato')->name('contrato.create')->middleware('auth');

Route::get('contrato.index', 'ContratoController@index')->name('contrato.index')->middleware('auth');

//
Route::get('listar_regiones/{id?}', 'ContratoController@listar_regiones')->name('listar_regiones')->middleware('auth');
//
Route::get('listar_ciudades/{id?}', 'ContratoController@listar_ciudades')->name('listar_ciudades')->middleware('auth');

//
Route::get('listar_comunas/{id?}', 'ContratoController@listar_comunas')->name('listar_comunas')->middleware('auth');

//
Route::get('get_cantidad_vivienda_proyecto/{id?}', 'ContratoController@get_cantidad_vivienda_proyecto')->name('get_cantidad_vivienda_proyecto')->middleware('auth');

//
Route::get('id_inmobiliaria_proyecto', 'ContratoController@id_inmobiliaria_proyecto')->name('id_inmobiliaria_proyecto')->middleware('auth');

//
Route::get('contrato.listado', 'ContratoController@listado')->name('contrato.listado')->middleware('auth');

Route::get('buscar_cliente_por_nombre', 'ClienteController@buscarPorNombre')->name('buscar_cliente_por_nombre')->middleware('auth');

Route::get('contrasenna/{contraseña}', 'ApibookmeController@contrasenna')->name('contrasenna')->middleware('auth');

Route::get('contrato.finanza', 'ContratoController@finanza')->name('contrato.finanza')->middleware('auth');

Route::get('contrato_proyecto/{inmobiliaria}', 'ContratoController@contrato_proyecto')->name('contrato_proyecto')->middleware('auth');

Route::get('pago_contrato/{id?}', 'ContratoController@pago_por_contrato')->name('pago_contrato')->middleware('auth');

Route::get('estados_contrato/{pais?}', 'ContratoController@contratos_piloto_sala_estados')->name('estados_contrato')->middleware('auth');

Route::get('buscar_contrato_por_fecha', 'ContratoController@buscar_contrato_por_fecha')->name('buscar_contrato_por_fecha')->middleware('auth');

Route::post('subir_pdf_Protocolo', 'HomeController@subirPdfProtocolo')->name('subir_pdf_Protocolo')->middleware('auth');

Route::get('listado_pdf_protocolo_cliente/{id?}', 'ClienteController@listado_pdf_protocolo_cliente')->name('listado_pdf_protocolo_cliente')->middleware('auth');

Route::get('listar_paises', 'ContratoController@listar_paises')->name('listar_paises')->middleware('auth');

Route::get('ubicacion_proyecto/{id_comuna}', 'ContratoController@ubicacion_proyecto')->name('ubicacion_proyecto')->middleware('auth');

Route::get('eliminar_inventario_sala/{id_sala}', 'ContratoController@eliminar_inventario_sala')->name('eliminar_inventario_sala')->middleware('auth');

Route::get('eliminar_inventario_piloto/{id_sala}', 'ContratoController@eliminar_inventario_piloto')->name('eliminar_inventario_piloto')->middleware('auth');

Route::get('listarcomentariosmkt/{id}', 'ContratoController@ver_comentarios_mkt')->name('ver_comentarios_mkt')->middleware('auth');

Route::get('listarcomentariosfinanza/{id}', 'ContratoController@ver_comentarios_finanza')->name('ver_comentarios_finanza')->middleware('auth');

Route::get('listarcomentariosat/{id}', 'ContratoController@ver_comentarios_at')->name('ver_comentarios_at')->middleware('auth');

Route::get('listarcomentarioscomercial/{id}', 'ContratoController@ver_comentarios_comercial')->name('ver_comentarios_comercial')->middleware('auth');

// Administración de inmobiliaria y proyectos
Route::resource('adminmobiliariaproyecto', 'AdmInmobiliariaProyecto');
Route::get('agregarinmobiliariaproyecto', 'AdmInmobiliariaProyecto@agregarinmobiliariaproyecto')->name('agregarinmobiliariaproyecto')->middleware('auth');
// Ruta para listar las inmobiliarias y proyectos
Route::get('listar_inmobiliaria_proyecto', 'AdmInmobiliariaProyecto@listar')->name('listar_inmobiliaria_proyecto');

//Agregar proyecto
Route::get('agregar_proyecto', 'AdmInmobiliariaProyecto@agregar_proyecto')->name('agregar_proyecto');

//ORDENES DE TRABAJO
Route::post('agregar_orden', 'OrdenController@store')->name('agregar_orden')->middleware('auth');
Route::get('datos_modal/{id}', 'OrdenController@datos_modal')->name('datos_modal')->middleware('auth');
Route::get('ver_orden/{id}', 'OrdenController@ver_orden')->name('ver_orden')->middleware('auth');
Route::put('actualizar_orden', 'InstaladorController@edit')->name('edit')->middleware('auth');
Route::get('editar_orden/{id}', 'OrdenController@edit')->name('edit')->middleware('auth');
Route::get('listado_ordenes/{id}', 'OrdenController@listado_ordenes')->name('listado_ordenes')->middleware('auth');

//Ver estados, etapas y prouectos al editar contrato
Route::get('datosEditarContrato/{id}', 'ContratoController@datosEditarContrato')->name('datosEditarContrato');

// Productos
Route::resource('producto', 'ProductoController');

Route::get('producto_agregar', 'ProductoController@agregar_producto')->name('producto_agregar')->middleware('auth');

Route::get('producto.index', 'ProductoController@index')->name('producto.index')->middleware('auth');

Route::get('producto.listar', 'ProductoController@listar')->name('producto.listar')->middleware('auth');

Route::get('producto.editar', 'ProductoController@editar_producto')->name('producto.editar')->middleware('auth');

Route::get('listado_tabla', 'InventarioController@listado_tabla')->name('listado_tabla')->middleware('auth');

Route::get('producto.cantidad', 'ProductoController@listarProductosCantidad')->name('producto.cantidad')->middleware('auth');

Route::put('incrementar_cantidad/{id}', 'ProductoController@incrementarCantidad')->name('incrementar_cantidad')->middleware('auth');

Route::put('decrementa_cantidad/{id}', 'ProductoController@decrementaCantidad')->name('decrementa_cantidad')->middleware('auth');

Route::put('decrementa_cantidad/{id}', 'ProductoController@decrementaCantidad')->name('decrementa_cantidad')->middleware('auth');

Route::get('eliminar_protocolo/{id}', 'HomeController@eliminar_protocolo')->name('eliminar_protocolo')->middleware('auth');

Route::get('reporte_perzonalizado_prueba', 'ReporteController@reporte_perzonalizado_prueba')->name('reporte_perzonalizado_prueba')->middleware('auth');

Route::put('sala_venta/{salaventa}', 'ContratoController@editar_sala_venta')->name('sala_venta')->middleware('auth');

Route::put('editar_piloto/{piloto}', 'ContratoController@editar_piloto')->name('editar_piloto')->middleware('auth');

Route::get('ver_sala_ventas/{id}', 'ContratoController@verSalaVentas')->name('ver_sala_ventas')->middleware('auth');

Route::get('listado_piloto/{id}', 'ContratoController@listarPiloto')->name('listado_piloto')->middleware('auth');

Route::get('agregar_comentario_mkt/{id}', 'ContratoController@agregarComentariosMkt')->name('agregarComentariosMkt')->middleware('auth');

Route::get('agregar_comentario_at/{id}', 'ContratoController@agregarComentariosAT')->name('agregarComentariosAt')->middleware('auth');

Route::get('agregar_comentario_finanza/{id}', 'ContratoController@agregarComentariosFinanza')->name('agregarComentariosFinanza')->middleware('auth');

Route::get('agregar_comentario_comercial/{id}', 'ContratoController@agregarComentariosComercial')->name('agregarComentariosComercial')->middleware('auth');

// Inventarios
Route::resource('inventario', 'InventarioController');
Route::get('inventario_agregar', 'InventarioController@agregar')->name('inventario_agregar')->middleware('auth');
Route::get('inventario.listar', 'InventarioController@listar')->name('inventario.listar')->middleware('auth');

Route::get('inventario.editar', 'InventarioController@editar')->name('inventario.editar')->middleware('auth');

Route::get('listar_inventario_proyecto/{id?}', 'InventarioController@listar_inventario_proyecto')->name('listar_inventario_proyecto')->middleware('auth');

Route::get('listado_tabla_por_proyecto/{id}', 'InventarioController@listado_tabla_por_proyecto')->name('listado_tabla_por_proyecto')->middleware('auth');

Route::get('generarReporte', 'ReporteController@descargarReporte')->name('generarReporte')->middleware('auth');

Route::get('count_clientes_ins_cap/{id}', 'InventarioController@count_clientes_ins_cap')->name('count_clientes_ins_cap')->middleware('auth');

Route::get('resto_productos_por_instalar', 'InventarioController@resto_productos_por_instalar')->name('resto_productos_por_instalar')->middleware('auth');

// Nuevos Proyectos
Route::resource('nuevoproyecto', 'NuevoProyectoController');

Route::get('nombre_proyecto/{id}', 'ProyectoController@nombre_proyecto')->name('nombre_proyecto')->middleware('auth');

Route::get('datos_proyecto/{id}',array('as'=>'datos.proyecto','uses'=>'ReporteController@datos_proyecto_filtrados'));

// Informes de productos por proyecto
Route::get('informe_proyecto/{id}', 'ProyectoController@informe_proyecto')->name('informe_proyecto')->middleware('auth');

// Clientes Inmobiliarios REZEPKA
Route::group(['prefix' => 'rezepka'], function() {
    Route::get('/', 'ClienteInmobiliariaController@showLoginForm');
    Route::get('register', 'ClienteInmobiliariaController@create');
    Route::post('login_cliente_inmobiliaria', 'ClienteInmobiliariaController@authenticate')->name('rezepka/login_cliente_inmobiliaria');
    Route::get('dashboard', 'ClienteInmobiliariaController@dashboard')->name('dashboard');
    Route::get('backoffice1', 'ClienteInmobiliariaController@backoffice1')->name('backoffice1');
    Route::get('backoffice2', 'ClienteInmobiliariaController@backoffice2')->name('backoffice2');
    Route::post('logout_cliente_inmobiliaria', 'ClienteInmobiliariaController@logout')->name('rezepka/logout_cliente_inmobiliaria');
    Route::get('reporte', 'ClienteInmobiliariaController@generar_reporte')->name('reporte');
    Route::get('reporte_etapa1', 'ClienteInmobiliariaController@generar_reporte_etapa1')->name('reporte_etapa1');
    Route::get('reporte_etapa2', 'ClienteInmobiliariaController@generar_reporte_etapa2')->name('reporte_etapa2');
});

// Clientes Inmobiliarios MALPO
Route::group(['prefix' => 'malpo'], function() {
    Route::get('/', 'ClienteInmobiliariaMalpoController@showLoginForm');
    //Route::get('register', 'ClienteInmobiliariaController@create');
    Route::post('login_cliente_inmobiliaria', 'ClienteInmobiliariaMalpoController@authenticate')->name('malpo/login_cliente_inmobiliaria');
    Route::get('dashboard', 'ClienteInmobiliariaMalpoController@dashboard')->name('dashboard');
    Route::get('altos_rucahue_colonial', 'ClienteInmobiliariaMalpoController@altos_rucahue_colonial')->name('altos_rucahue_colonial');
    Route::get('claros_rauquen', 'ClienteInmobiliariaMalpoController@claros_rauquen')->name('claros_rauquen');
    Route::get('altos_maiten_boldo', 'ClienteInmobiliariaMalpoController@altos_maiten_boldo')->name('altos_maiten_boldo');
    Route::get('lomas_bosque', 'ClienteInmobiliariaMalpoController@lomas_bosque')->name('lomas_bosque');
    Route::get('altos_maiten_laurel', 'ClienteInmobiliariaMalpoController@altos_maiten_laurel')->name('altos_maiten_laurel');
    Route::post('logout_cliente_inmobiliaria', 'ClienteInmobiliariaMalpoController@logout')->name('malpo/logout_cliente_inmobiliaria');
    Route::get('reporte_alto_rauquen_colonial', 'ClienteInmobiliariaMalpoController@pdf_alto_rauquen_colonial')->name('reporte_alto_rauquen_colonial');
    Route::get('reporte_claros_rauquen', 'ClienteInmobiliariaMalpoController@pdf_claros_rauquen_curico')->name('reporte_claros_rauquen');
    Route::get('reporte_altos_maiten_boldo', 'ClienteInmobiliariaMalpoController@pdf_altos_maiten_boldo')->name('reporte_altos_maiten_boldo');
    Route::get('reporte_altos_maiten_laurel', 'ClienteInmobiliariaMalpoController@pdf_altos_maiten_laurel')->name('reporte_altos_maiten_laurel');
    Route::get('reporte_lomas_bosque', 'ClienteInmobiliariaMalpoController@pdf_lomas_bosque')->name('reporte_lomas_bosque');
    Route::get('reporte', 'ClienteInmobiliariaMalpoController@generar_reporte')->name('reporte');
});

//Cliente Inmobiliaria GRUPOACTIVA
Route::group(['prefix' => 'grupoactiva'], function() {
    Route::get('/', 'ClienteInmobiliariaGrupoactivaController@showLoginForm');
    //Route::get('register', 'ClienteInmobiliariaGrupoactivaController@create');
    Route::post('login_cliente_inmobiliaria', 'ClienteInmobiliariaGrupoactivaController@authenticate')->name('grupoactiva/login_cliente_inmobiliaria');
    Route::get('dashboard', 'ClienteInmobiliariaGrupoactivaController@dashboard')->name('dashboard');
    Route::get('listado_pdf/{id}', 'ClienteInmobiliariaGrupoactivaController@listado_pdf_protocolo_cliente')->name('grupoactiva/listado_pdf');
    Route::get('activa_entre_cerros', 'ClienteInmobiliariaGrupoactivaController@activa_entre_cerros')->name('activa_entre_cerros');
    Route::get('gral_saavedra', 'ClienteInmobiliariaGrupoactivaController@gral_saavedra')->name('gral_saavedra');
    Route::get('hipodromo', 'ClienteInmobiliariaGrupoactivaController@hipodromo')->name('hipodromo');
    Route::get('activa_blanco', 'ClienteInmobiliariaGrupoactivaController@activa_blanco')->name('activa_blanco');
    Route::get('activa_nataniel', 'ClienteInmobiliariaGrupoactivaController@activa_nataniel')->name('activa_nataniel');
    Route::get('activa_mitjans', 'ClienteInmobiliariaGrupoactivaController@activa_mitjans')->name('activa_mitjans');
    Route::get('walker_martinez', 'ClienteInmobiliariaGrupoactivaController@walker_martinez')->name('walker_martinez');
    Route::post('logout_cliente_inmobiliaria', 'ClienteInmobiliariaGrupoactivaController@logout')->name('grupoactiva/logout_cliente_inmobiliaria');
    Route::get('reporte_activa_entre_cerros', 'ClienteInmobiliariaGrupoactivaController@pdf_activa_entre_cerros')->name('reporte_activa_entre_cerros');
    Route::get('reporte_gral_saavedra', 'ClienteInmobiliariaGrupoactivaController@pdf_gral_saavedra')->name('reporte_gral_saavedra');
    Route::get('reporte_hipodromo', 'ClienteInmobiliariaGrupoactivaController@pdf_hipodromo')->name('reporte_hipodromo');
    Route::get('reporte_activa_blanco', 'ClienteInmobiliariaGrupoactivaController@pdf_activa_blanco')->name('reporte_activa_blanco');
    Route::get('reporte_activa_mitjans', 'ClienteInmobiliariaGrupoactivaController@pdf_activa_mitjans')->name('reporte_activa_mitjans');
    Route::get('reporte_activa_nataniel', 'ClienteInmobiliariaGrupoactivaController@pdf_activa_nataniel')->name('reporte_activa_nataniel');
    Route::get('reporte_walker_martinez', 'ClienteInmobiliariaGrupoactivaController@pdf_walker_martinez')->name('reporte_walker_martinez');
    Route::get('reporte', 'ClienteInmobiliariaGrupoactivaController@generar_reporte')->name('reporte');
});

//Cliente Inmobiliaria HCG
Route::group(['prefix' => 'hcg'], function() {
    Route::get('/', 'ClienteInmobiliariaHcgController@showLoginForm');
    //Route::get('register', 'ClienteInmobiliariaHcgController@create');
    Route::post('login_cliente_inmobiliaria', 'ClienteInmobiliariaHcgController@authenticate')->name('hcg/login_cliente_inmobiliaria');
    Route::get('dashboard', 'ClienteInmobiliariaHcgController@dashboard')->name('dashboard');
    Route::get('alerces_jazmines', 'ClienteInmobiliariaHcgController@alerces_jazmines')->name('alerces_jazmines');
    Route::get('parque_garcia_huerta', 'ClienteInmobiliariaHcgController@parque_garcia_huerta')->name('parque_garcia_huerta');
    Route::post('logout_cliente_inmobiliaria', 'ClienteInmobiliariaHcgController@logout')->name('hcg/logout_cliente_inmobiliaria');
    Route::get('reporte_parque_garcia_huerta', 'ClienteInmobiliariaHcgController@pdf_parque_garcia_huerta')->name('reporte_parque_garcia_huerta');
    Route::get('reporte_alerces_jazmines', 'ClienteInmobiliariaHcgController@pdf_alerces_jazmines')->name('reporte_alerces_jazmines');
    Route::get('historialcliente', 'ClienteInmobiliariaHcgController@historial_cliente')->name('historialcliente');
    Route::get('importar_clientes_hcg', 'ClienteInmobiliariaHcgController@importar_clientes_hcg')->name('importar_clientes_hcg');
    //Route::get('reporte_activa_blanco', 'ClienteInmobiliariaGrupoactivaController@pdf_activa_blanco')->name('reporte_activa_blanco');
    //Route::get('reporte_activa_mitjans', 'ClienteInmobiliariaGrupoactivaController@pdf_activa_mitjans')->name('reporte_activa_mitjans');
    //Route::get('reporte_activa_nataniel', 'ClienteInmobiliariaGrupoactivaController@pdf_activa_nataniel')->name('reporte_activa_nataniel');
    //Route::get('reporte_walker_martinez', 'ClienteInmobiliariaGrupoactivaController@pdf_walker_martinez')->name('reporte_walker_martinez');
    //Route::get('reporte_claros_rauquen', 'ClienteInmobiliariaGrupoactivaController@pdf_claros_rauquen_curico')->name('reporte_claros_rauquen');
    //Route::get('reporte_altos_maiten_boldo', 'ClienteInmobiliariaGrupoactivaController@pdf_altos_maiten_boldo')->name('reporte_altos_maiten_boldo');
    //Route::get('reporte_altos_maiten_laurel', 'ClienteInmobiliariaGrupoactivaController@pdf_altos_maiten_laurel')->name('reporte_altos_maiten_laurel');
    //Route::get('reporte_lomas_bosque', 'ClienteInmobiliariaGrupoactivaController@pdf_lomas_bosque')->name('reporte_lomas_bosque');
    Route::get('reporte', 'ClienteInmobiliariaHcgController@generar_reporte')->name('reporte');
});

//Cliente Inmobiliaria ileben
Route::group(['prefix' => 'ileben'], function() {
    Route::get('/', 'ClienteInmobiliariaIlebenController@showLoginForm');
    Route::get('listado_pdf/{id}', 'ClienteInmobiliariaIlebenController@listado_pdf_protocolo_cliente')->name('ileben/listado_pdf');
    //Route::get('register', 'ClienteInmobiliariaHcgController@create');
    Route::post('login_cliente_inmobiliaria', 'ClienteInmobiliariaIlebenController@authenticate')->name('ileben/login_cliente_inmobiliaria');
    Route::get('dashboard', 'ClienteInmobiliariaIlebenController@dashboard')->name('dashboard');
    Route::get('reflex', 'ClienteInmobiliariaIlebenController@reflex')->name('reflex');
    Route::get('choice', 'ClienteInmobiliariaIlebenController@choice')->name('choice');
    Route::get('bloom', 'ClienteInmobiliariaIlebenController@bloom')->name('bloom');
    Route::get('parque_la_huasa', 'ClienteInmobiliariaIlebenController@parque_la_huasa')->name('parque_la_huasa');
    Route::get('open_concept', 'ClienteInmobiliariaIlebenController@open_concept')->name('open_concept');
    Route::get('jazz_life_1', 'ClienteInmobiliariaIlebenController@jazz_life_1')->name('jazz_life_1');
    Route::get('jazz_life_2', 'ClienteInmobiliariaIlebenController@jazz_life_2')->name('jazz_life_2');
    Route::get('jazz_life_3', 'ClienteInmobiliariaIlebenController@jazz_life_3')->name('jazz_life_3');
    Route::post('logout_cliente_inmobiliaria', 'ClienteInmobiliariaIlebenController@logout')->name('ileben/logout_cliente_inmobiliaria');
    Route::get('reporte_reflex', 'ClienteInmobiliariaIlebenController@pdf_reflex')->name('reporte_reflex');
    Route::get('reporte_choice', 'ClienteInmobiliariaIlebenController@pdf_choice')->name('reporte_choice');
    Route::get('reporte_bloom', 'ClienteInmobiliariaIlebenController@pdf_bloom')->name('reporte_bloom');
    Route::get('reporte_parque_la_huasa', 'ClienteInmobiliariaIlebenController@pdf_parque_la_huasa')->name('reporte_parque_la_huasa');
    Route::get('reporte_open_concept', 'ClienteInmobiliariaIlebenController@pdf_open_concept')->name('reporte_open_concept');
    Route::get('reporte_jazz_life_1', 'ClienteInmobiliariaIlebenController@pdf_jazz_life_1')->name('reporte_jazz_life_1');
    Route::get('reporte_jazz_life_2', 'ClienteInmobiliariaIlebenController@pdf_jazz_life_2')->name('reporte_jazz_life_2');
    Route::get('reporte_jazz_life_3', 'ClienteInmobiliariaIlebenController@pdf_jazz_life_3')->name('reporte_jazz_life_3');
    Route::get('reporte', 'ClienteInmobiliariaIlebenController@generar_reporte')->name('reporte');
});


Route::group(['prefix' => 'activaTuHogar'], function() {
    Route::get('/{id}', 'ActivaTuHogarController@showLoginForm');
    Route::post('verificarCorreo', 'ActivaTuHogarController@authenticate')->name('activaTuHogar/verificarCorreo');
    Route::post('iniciarSesion', 'ActivaTuHogarController@iniciarSesion')->name('activaTuHogar/iniciarSesion');
    Route::get('calendario', 'ActivaTuHogarController@calendarioAgendamiento')->name('activaTuHogar/caledario');
});
Route::get('activaTuHogar2/caledario2', 'ActivaTuHogarController@calendarioAgendamiento2')->name('activaTuHogar2/caledario2');
Route::get('activaTuHogar2/veragenda', 'ActivaTuHogarController@veragenda')->name('veragenda');
Route::get('agendarcliente', 'ActivaTuHogarController@agendarcliente')->name('agendarcliente');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
