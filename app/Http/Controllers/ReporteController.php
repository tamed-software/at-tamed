<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmobiliaria;
use App\Proyecto;
use App\Cliente;
use App\Estado;
use App\Inventario;
use App\Producto;
use App\Contrato;
use App\ProyeccionInstalacion;
use DateTime;
use DB;
use Mail;
use Response;
use Session;
use Excel;
use File;
use PDF;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Input;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();

        return view('reporte.index')->with('inmobiliarias',$inmobiliarias);
    }

    //Reporte cantidad de instalaciones por mes de los proyectos
    public function reporte_mensual()
    {
        $estados = Estado::all();

        //$cantidad_viviendas_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-01-01')->where('fecha_inicio_instalacion', '<=', '2019-12-31')->sum('cantidad');

        $cantidad_viviendas_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-01-01')->where('fecha_probable_entrega', '<=', '2019-12-31')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-01-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-12-31')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-01-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-12-31')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_enero_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-01-01')->where('fecha_inicio_instalacion', '<=', '2019-01-31')->sum('cantidad');

        $cantidad_viviendas_enero_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-01-01')->where('fecha_probable_entrega', '<=', '2019-01-31')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_enero_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-01-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-01-31')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_enero_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-01-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-01-31')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_febrero_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-02-01')->where('fecha_inicio_instalacion', '<=', '2019-02-28')->sum('cantidad');
        $cantidad_viviendas_febrero_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-02-01')->where('fecha_probable_entrega', '<=', '2019-02-28')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_febrero_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-02-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-02-28')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_febrero_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-02-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-02-28')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_marzo_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-03-01')->where('fecha_inicio_instalacion', '<=', '2019-03-31')->sum('cantidad');
        $cantidad_viviendas_marzo_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-03-01')->where('fecha_probable_entrega', '<=', '2019-03-31')->sum('total_viviendas_proyecto');

        /*$instaladosCapacitados_marzo_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-03-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-03-31')
                ->where('clientes.estado_id', 8)
                ->count();
		*/
        $instaladosCapacitados_marzo_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
        		->where('clientes.fecha_instalacion', '>=', '2019-03-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-03-31')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_abril_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-04-01')->where('fecha_inicio_instalacion', '<=', '2019-04-30')->sum('cantidad');
        $cantidad_viviendas_abril_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-04-01')->where('fecha_probable_entrega', '<=', '2019-04-30')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_abril_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-04-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-04-30')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_abril_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-04-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-04-30')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_mayo_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-05-01')->where('fecha_inicio_instalacion', '<=', '2019-05-31')->sum('cantidad');
        $cantidad_viviendas_mayo_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-05-01')->where('fecha_probable_entrega', '<=', '2019-05-31')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_mayo_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-05-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-05-31')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_mayo_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-05-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-05-31')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_junio_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-06-01')->where('fecha_inicio_instalacion', '<=', '2019-06-30')->sum('cantidad');
        $cantidad_viviendas_junio_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-06-01')->where('fecha_probable_entrega', '<=', '2019-06-30')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_junio_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-06-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-06-30')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_junio_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-06-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-06-30')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_julio_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-07-01')->where('fecha_inicio_instalacion', '<=', '2019-07-31')->sum('cantidad');
        $cantidad_viviendas_julio_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-07-01')->where('fecha_probable_entrega', '<=', '2019-07-31')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_julio_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-07-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-07-30')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_julio_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-07-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-07-30')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_agosto_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-08-01')->where('fecha_inicio_instalacion', '<=', '2019-08-31')->sum('cantidad');
        $cantidad_viviendas_agosto_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-08-01')->where('fecha_probable_entrega', '<=', '2019-08-31')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_agosto_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-08-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-08-31')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_agosto_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-08-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-08-31')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_septiembre_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-09-01')->where('fecha_inicio_instalacion', '<=', '2019-09-30')->sum('cantidad');
        $cantidad_viviendas_septiembre_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-09-01')->where('fecha_probable_entrega', '<=', '2019-09-30')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_septiembre_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-09-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-09-30')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_septiembre_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-09-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-09-30')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_octubre_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-10-01')->where('fecha_inicio_instalacion', '<=', '2019-10-31')->sum('cantidad');
        $cantidad_viviendas_octubre_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-10-01')->where('fecha_probable_entrega', '<=', '2019-10-31')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_octubre_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-10-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-10-31')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_octubre_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-10-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-10-31')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_noviembre_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-11-01')->where('fecha_inicio_instalacion', '<=', '2019-11-30')->sum('cantidad');
        $cantidad_viviendas_noviembre_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-11-01')->where('fecha_probable_entrega', '<=', '2019-11-30')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_noviembre_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-11-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-11-30')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_noviembre_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-11-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-11-30')
                ->where('clientes.estado_id', 8)
                ->count();

        //$cantidad_viviendas_diciembre_2019 = Proyecto::where('fecha_inicio_instalacion', '>=', '2019-12-01')->where('fecha_inicio_instalacion', '<=', '2019-12-31')->sum('cantidad');
        $cantidad_viviendas_diciembre_2019 = Contrato::where('fecha_probable_entrega', '>=', '2019-12-01')->where('fecha_probable_entrega', '<=', '2019-12-31')->sum('total_viviendas_proyecto');
        /*
        $instaladosCapacitados_diciembre_2019 = Proyecto::join('clientes', 'proyectos.id', 'clientes.proyecto_id')
                ->where('proyectos.fecha_inicio_instalacion', '>=', '2019-12-01')
                ->where('proyectos.fecha_inicio_instalacion', '<=', '2019-12-31')
                ->where('clientes.estado_id', 8)
                ->count();
        */
        $instaladosCapacitados_diciembre_2019 = Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
                ->where('clientes.fecha_instalacion', '>=', '2019-12-01')
                ->where('clientes.fecha_instalacion', '<=', '2019-12-31')
                ->where('clientes.estado_id', 8)
                ->count();

        return view('reporte.reporte_mensual_proyectos')->with('estados', $estados)->with('cantidad_viviendas_2019', $cantidad_viviendas_2019)->with('cantidad_viviendas_enero_2019', $cantidad_viviendas_enero_2019)->with('cantidad_viviendas_febrero_2019', $cantidad_viviendas_febrero_2019)->with('cantidad_viviendas_marzo_2019', $cantidad_viviendas_marzo_2019)->with('cantidad_viviendas_abril_2019', $cantidad_viviendas_abril_2019)->with('cantidad_viviendas_mayo_2019', $cantidad_viviendas_mayo_2019)->with('cantidad_viviendas_junio_2019', $cantidad_viviendas_junio_2019)->with('cantidad_viviendas_julio_2019', $cantidad_viviendas_julio_2019)->with('cantidad_viviendas_agosto_2019', $cantidad_viviendas_agosto_2019)->with('cantidad_viviendas_septiembre_2019', $cantidad_viviendas_septiembre_2019)->with('cantidad_viviendas_octubre_2019', $cantidad_viviendas_octubre_2019)->with('cantidad_viviendas_noviembre_2019', $cantidad_viviendas_noviembre_2019)->with('cantidad_viviendas_diciembre_2019', $cantidad_viviendas_diciembre_2019)

            ->with('instaladosCapacitados_2019', $instaladosCapacitados_2019)->with('instaladosCapacitados_enero_2019', $instaladosCapacitados_enero_2019)->with('instaladosCapacitados_febrero_2019', $instaladosCapacitados_febrero_2019)->with('instaladosCapacitados_marzo_2019', $instaladosCapacitados_marzo_2019)->with('instaladosCapacitados_abril_2019', $instaladosCapacitados_abril_2019)->with('instaladosCapacitados_mayo_2019', $instaladosCapacitados_mayo_2019)->with('instaladosCapacitados_junio_2019', $instaladosCapacitados_junio_2019)->with('instaladosCapacitados_julio_2019', $instaladosCapacitados_julio_2019)->with('instaladosCapacitados_agosto_2019', $instaladosCapacitados_agosto_2019)->with('instaladosCapacitados_septiembre_2019', $instaladosCapacitados_septiembre_2019)->with('instaladosCapacitados_octubre_2019', $instaladosCapacitados_octubre_2019)->with('instaladosCapacitados_noviembre_2019', $instaladosCapacitados_noviembre_2019)->with('instaladosCapacitados_diciembre_2019', $instaladosCapacitados_diciembre_2019);
    }

    //Crear gráfico por fechas y estado
    public function crear_grafico_fecha_estado(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_termino = $request->input('fecha_termino');
        $estado_cliente = $request->input('estado_cliente');

        $period = CarbonPeriod::create($fecha_inicio, $fecha_termino);
        $comprobar_mes1 = '';
        $comprobar_mes2 = '';
        $array_fechas = [];
        $array_datos_grafico = [];
        $count = 0;

        // Armar fechas para consulta
        foreach ($period as $date) {
            $comprobar_mes1 = $date->format('Y-m');
            if($comprobar_mes2 !== $comprobar_mes1){
            	$count = $count + 1;
            	$array_fechas[] = array(
                	"fecha_inicio" => Carbon::parse($date)->format('Y-m-d'),
                    "fecha_fin" => Carbon::parse($date)->endOfMonth()->format('Y-m-d'),
                    "anio_mes" => Carbon::parse($date)->format('Y-m')
                );
                $comprobar_mes2 = $date->format('Y-m');
            }
        }

        $array_fechas[$count-1]["fecha_fin"] = $fecha_termino;

        // Armar datos para gráficos
        foreach ($array_fechas as $fecha){

            $array_datos_grafico[] = array(
            	"cantidad_viviendas_fecha" => Contrato::where('fecha_probable_entrega', '>=', $fecha['fecha_inicio'])->where('fecha_probable_entrega', '<=', $fecha['fecha_fin'])->sum('total_viviendas_proyecto'),
            	"cantidad_viviendas_estado" => Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
            		->where('clientes.fecha_instalacion', '>=', $fecha['fecha_inicio'])
                	->where('clientes.fecha_instalacion', '<=', $fecha['fecha_fin'])
                	->where('clientes.estado_id', $estado_cliente)
                	->count(),
                "reporte" => Contrato::join('clientes', 'contratos.proyecto_id', 'clientes.proyecto_id')
            		->where('clientes.fecha_instalacion', '>=', $fecha['fecha_inicio'])
                	->where('clientes.fecha_instalacion', '<=', $fecha['fecha_fin'])
                	->where('clientes.estado_id', $estado_cliente)
                	->orderBy('contratos.nombre_inmobiliaria', 'asc')
                	->get(),
                "anio_mes" => $fecha['anio_mes']
            );
        }

        return Response::json($array_datos_grafico);
    }

    public function reporte_mensual_proyectos_detallado(Request $request){

        $fecha = $request->input('fecha');
        $estado = $request->input('estado_id');
        $columna = $request->input('columna');
        $fecha_desde = $fecha."-01";
        $fecha_hasta = $fecha."-31";

        if($columna == 2){

       		$clientes = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
       		                   ->join('inmobiliarias', 'proyectos.inmobiliaria_id', 'inmobiliarias.id')
       		                   ->join('estados', 'clientes.estado_id', 'estados.id')
       		                   ->join('contratos', 'proyectos.id','contratos.proyecto_id')
       		                   ->whereBetween('clientes.fecha_instalacion', [$fecha_desde, $fecha_hasta])
       		                   ->where('clientes.estado_id',$estado)
       		                   ->select('inmobiliarias.nombre as inmobiliaria','proyectos.nombre as proyecto', 'clientes.nombre as nombre_cliente', 'clientes.apellido as cliente_apellido', 'clientes.vivienda as viviendas','clientes.telefono1 as telefono', 'clientes.correo as correo', 'estados.nombre as estado','contratos.fecha_probable_entrega as fecha_probable_entrega', 'clientes.fecha_instalacion')->get();

       		return $clientes;

        }elseif ($columna == 1) {

        	$proyectos = Contrato::whereBetween('fecha_probable_entrega',[$fecha_desde,$fecha_hasta])
        				->select('nombre_inmobiliaria','nombre_proyecto','total_viviendas_proyecto', 'fecha_probable_entrega')->get();

        	return $proyectos;

        }



    }

    //
    public function datos_proyecto_filtrados($id)
    {
        $proyectos = Proyecto::where('inmobiliaria_id',$id)->get();

        $inmobiliarias = Inmobiliaria::where('id', $id)->value('nombre');

        $datos_proyecto = [];

            foreach ($proyectos as $proyecto) {

                $countContactados    = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto->id)
                                       ->where('clientes.estado_id', 1)->where('proyectos.estado_id', 6)->count();
                $countNoContactados  = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto->id)
                                       ->where('clientes.estado_id', 2)->where('proyectos.estado_id', 6)->count();
                $countInstalados     = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto->id)
                                       ->where('clientes.estado_id', 3)->where('proyectos.estado_id', 6)->count();
                $countAgendados      = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto->id)
                                       ->where('clientes.estado_id', 4)->where('proyectos.estado_id', 6)->count();
                $countSinInformacion = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto->id)
                                       ->where('clientes.estado_id', 5)->where('proyectos.estado_id', 6)->count();
                $countInsCap         = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto->id)
                                       ->where('clientes.estado_id', 8)->where('proyectos.estado_id', 6)->count();
                $countCapacitados    = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto->id)
                                       ->where('clientes.estado_id', 9)->where('proyectos.estado_id', 6)->count();
                $countObservacion    = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')->where('clientes.proyecto_id', $proyecto->id)
                                       ->where('clientes.estado_id', 10)->where('proyectos.estado_id', 6)->count();



                $datos_proyecto[] = array(
                                "nombre_inmobiliaria" => $inmobiliarias,
                                "nombre_proyecto" => $proyecto->nombre,
                                "contactados" => $countContactados,
                                "no_contactados" => $countNoContactados,
                                "instalados" => $countInstalados,
                                "agendados" => $countAgendados ,
                                "sinInformacion" => $countSinInformacion,
                                "instaladosCapacitados" => $countInsCap,
                                "capacitados" => $countCapacitados,
                                "conObservacion" => $countObservacion
                            );
            }

        return Response::json($datos_proyecto);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function crear_grafico_proyeccion_instalaciones(Request $request){

      $fecha_inicio = $request->input('fecha_inicio');
      $fecha_termino = $request->input('fecha_termino');

      $period = CarbonPeriod::create($fecha_inicio, $fecha_termino);
      $comprobar_mes1 = '';
      $comprobar_mes2 = '';
      $array_fechas = [];
      $array_datos_grafico = [];
      $count = 0;

      // Armar fechas para consulta
      foreach ($period as $date) {
          $comprobar_mes1 = $date->format('Y-m');
          if($comprobar_mes2 !== $comprobar_mes1){
              $count = $count + 1;
              $array_fechas[] = array(
                  "fecha_inicio" => Carbon::parse($date)->format('m-20y'),
                  "fecha_fin" => Carbon::parse($date)->endOfMonth()->format('Y-m-d'),
                  "fecha_inicio_masiva" => Carbon::parse($date)->firstOfMonth()->format('Y-m-d'),
                  "anio_mes" => Carbon::parse($date)->format('Y-m')
              );
              $comprobar_mes2 = $date->format('Y-m');
          }
      }

      foreach ($array_fechas as $fecha) {

          $personalizadas = ProyeccionInstalacion::where('mes_annio_instalacion', $fecha['fecha_inicio'])->sum('cantidad_instalacion');

          $masivas = Contrato::whereBetween('fecha_probable_entrega',[$fecha['fecha_inicio_masiva'], $fecha['fecha_fin']])->where('fecha_instalacion_personalizada', null)->sum('total_viviendas_proyecto');

          $array_datos_grafico[] = array(

              'fecha' => $fecha['fecha_inicio'],
              'sum' => $personalizadas+$masivas,
              'personalizadas' => $personalizadas,
              'masivas' => $masivas,
              'division' => ($personalizadas+$masivas)/40

          );

      }

      return $array_datos_grafico;

    }

    function reporte_proyeccion_detallado($fecha){

        $fecha = $fecha;

        $fecha_inicio = "01-".$fecha;
        $fecha_hasta = "31-".$fecha;

        $fecha_inicio_masiva = strtotime($fecha_inicio);
        $fecha_inicio_masiva2 = date('Y-m-d',$fecha_inicio_masiva);
        $fecha_hasta_masiva = strtotime($fecha_hasta);
        $fecha_hasta_masiva2 = date('Y-m-d',$fecha_hasta_masiva);

        

        $array_modal = [];

        $proyectos_perosnalizados = ProyeccionInstalacion::where('mes_annio_instalacion', $fecha)->select('proyecto_id', 'cantidad_instalacion')->get();

        foreach ($proyectos_perosnalizados as $id) {


            $datos = Contrato::where('proyecto_id', $id->proyecto_id)->get();



            foreach ($datos as $dato) {
                
                

                $inventarios = Inventario::where('proyecto_id', $dato["proyecto_id"])->get();
                
                foreach ($inventarios as $inventario ) {
                    
                    $producto = Producto::find($inventario->producto_id);
                    
                    $array_modal[]=Array(

                        "nombre_proyecto" => $dato->nombre_proyecto,
                        "producto" => $producto->producto,
                        "cantidad" => $inventario->cantidad*$id->cantidad_instalacion,
                        "inmobiliaria" => $dato->nombre_inmobiliaria,
                        "personalizado" => "SI"

                    );
                }

            }
            
        }

        $proyectos_masivos = Contrato::whereBetween('fecha_probable_entrega', [$fecha_inicio_masiva2, $fecha_hasta_masiva2])->where('fecha_instalacion_personalizada', null)->select('proyecto_id', 'total_viviendas_proyecto', 'nombre_proyecto', 'nombre_inmobiliaria')->get();

        

        foreach ($proyectos_masivos as $masivo ) {
            
            $inventarios_masivo = Inventario::where('proyecto_id', $masivo["proyecto_id"])->get();

                foreach ($inventarios_masivo as $inventario_masivo ) {
                    
                    $producto = Producto::find($inventario_masivo->producto_id);
                    
                    $array_modal[]=Array(

                        "nombre_proyecto" => $masivo->nombre_proyecto,
                        "producto" => $producto->producto,
                        "cantidad" => $inventario_masivo->cantidad*$masivo->total_viviendas_proyecto,
                        "inmobiliaria" => $masivo->nombre_inmobiliaria,
                        "personalizado" => "NO"

                    );
                }

        }

        return $array_modal;


    }

    function descargarReporte(Request $request){

        $verificarSoloInmo = $request->input('verificarSoloInmo');
        $idProyectos = $request->input('idProyectos');
        $idInmo = $request->input('idInmo');
        $datos = [];

        foreach ($idProyectos as $id ) {
            $inmobiliaria = Inmobiliaria::find($idInmo);
            $clientes = [];
            $clientes = Cliente::where('proyecto_id', $id)->get();

            $proyecto = Proyecto::find($id);

            $datos[] = array(

                'clientes' => $clientes,
                'proyecto' => $proyecto->nombre


            );

            $instalados = Cliente::where('proyecto_id', $id)->where('estado_id', 8)->count();


        }

            $datos[] = array(

                'inmobiliaria' => $inmobiliaria->nombre


            );


        //$pdf = PDF::loadView('reporte.reporte', $datos);
        //return $pdf->download('reporte_bloom.pdf');  
        return $datos;

    }

}
