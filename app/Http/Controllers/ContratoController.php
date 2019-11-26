<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Inmobiliaria;
use App\Proyecto;
use App\Contrato;
use App\Estado;
use App\Pais;
use App\Region;
use App\Ciudad;
use App\Comuna;
use App\Producto;
use App\Piloto;
use App\Salaventa;
use App\Inventariopiloto;
use App\Inventariostand;
use App\Visitasalaventa;
use App\Visitapiloto;
use App\Comentariomkt;
use App\Comentarioat;
use App\Comentariofinanza;
use App\Comentariocomercial;
use App\ProyeccionInstalacion;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();
        $estados = Estado::all();
        $paises = Pais::all();
        $productos = Producto::all();

        return view('contrato.index')->with('inmobiliarias', $inmobiliarias)->with('estados', $estados)->with('paises', $paises)->with('productos', $productos);
    }

    //
    public function listado()
    {
        $contratos = Contrato::all();
        $inmobiliarias = Inmobiliaria::all();
        $proyectos = Proyecto::where('estado_id', 6)->get();
        $estados = Estado::all();
        $productos = Producto::all();

        return view('contrato.listar')->with('contratos', $contratos)->with('proyectos', $proyectos)->with('estados', $estados)->with('inmobiliarias',$inmobiliarias)->with('productos',$productos);
    }

    //Región por pais id
    public function listar_regiones($id = null)
    {
        if(!$id){
            return Response::json('Falta especificar pais');
        } else {
            $regiones = Region::where('pais_id', $id)->get();
            return Response::json($regiones);
        }
    }

    //Ciudad por region id
    public function listar_ciudades($id = null)
    {
        if(!$id){
            return Response::json('Falta especificar region');
        } else {
            $ciudades = Ciudad::where('region_id', $id)->get();
            return Response::json($ciudades);
        }
    }

    //Comunas por ciudad id
    public function listar_comunas($id = null)
    {
        if(!$id){
            return Response::json('Falta especificar ciudad');
        } else {
            $comunas = Comuna::where('ciudad_id', $id)->get();
            return Response::json($comunas);
        }
    }

    public function listar_paises()
    {

            $pais = Pais::all();
            return $pais;

    }

    public function ubicacion_proyecto($id)
    {

        $ubicacion = Comuna::join('ciudades','comunas.ciudad_id','ciudades.id')
                            ->join('regiones','ciudades.region_id','regiones.id')
                            ->join('paises','regiones.pais_id','paises.id')
                            ->where('comunas.id',$id)
                            ->select('regiones.id as region_id','regiones.nombre as region_nombre','ciudades.id as ciudad_id','ciudades.nombre as ciudad_nombre','paises.id as pais_id','paises.nombre as pais_nombre')
                            ->get();

        return $ubicacion;

    }

    //Obtener cantidad de viviendas del proyecto
    public function get_cantidad_vivienda_proyecto($id = null)
    {
        if(!$id){
            return Response::json('Falta especificar proyecto');
        } else {
            $get_cantidad_vivienda_proyecto = Proyecto::find($id);
            $cantidad_vivienda_proyecto = $get_cantidad_vivienda_proyecto->cantidad;
            if($cantidad_vivienda_proyecto === null){
                return Response::json(0);
            } else {
                return Response::json($cantidad_vivienda_proyecto);
            }
        }
    }

    //Obtener inmobiliaria_id y producto_id para cargar datetimepicker
    public function id_inmobiliaria_proyecto()
    {
        $inmobiliaria_id_proyecto_id = Inmobiliaria::join('proyectos', 'inmobiliarias.id', 'proyectos.inmobiliaria_id')
                                        ->select('inmobiliarias.id as inmobiliaria_id', 'proyectos.id as proyecto_id')
                                        ->get();

        return Response::json($inmobiliaria_id_proyecto_id);
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

    // Finanzas de contratos
    public function finanza()
    {
        //$listado_contratos = Contrato::orderBy('nombre_inmobiliaria', 'asc')->get();
        //return view('contrato.finanza')->with('contratos', $contratos);

        $contratos = Contrato::join('proyectos', 'contratos.proyecto_id', 'proyectos.id')
                            ->select('contratos.id', 'contratos.nombre_inmobiliaria', 'contratos.nombre_proyecto', 'proyectos.fecha_inicio_instalacion', 'contratos.pago1_fecha', 'contratos.monto_pago1', 'contratos.pago2_fecha', 'contratos.monto_pago2', 'contratos.pago3_fecha', 'contratos.monto_pago3', 'contratos.pago4_fecha', 'contratos.monto_pago4', 'contratos.pago5_fecha', 'contratos.monto_pago5', 'contratos.monto_contrato')
                            ->orderBy('contratos.nombre_inmobiliaria', 'asc')
                            ->get();

        return view('contrato.finanza')->with('contratos', $contratos);
        //return Response::json($contratos);
    }

    public function pago_por_contrato($id = null)
    {
        if(!$id){
            return Response::json('Falta id contrato');
        } else {
            $contrato = Contrato::where('id', $id)->get();
            if(count($contrato)){
                //Validar cuantas fechas de pago tiene el contrato
                $cont = 0;
                foreach($contrato as $c){
                    $monto_contrato = $c->monto_contrato;
                    $proyecto_id = $c->proyecto_id;
                    if(!is_null($c->pago1_fecha)){
                        $cont++;
                    }
                    if(!is_null($c->pago2_fecha)){
                        $cont++;
                    }
                    if(!is_null($c->pago3_fecha)){
                        $cont++;
                    }
                    if(!is_null($c->pago4_fecha)){
                        $cont++;
                    }
                    if(!is_null($c->pago5_fecha)){
                        $cont++;
                    }
                }

                $get_inmobiliaria = Proyecto::find($proyecto_id);
                $inmobiliaria_id = $get_inmobiliaria->inmobiliaria_id;

                $get_nombre_inmobiliaria = Inmobiliaria::find($inmobiliaria_id);
                $nombre_inmobiliaria = $get_nombre_inmobiliaria->nombre;

                if($cont === 0 || $cont === 1 || $cont === 2 || $cont === 4){
                    $cantidad_fechas = 0;
                } else if($cont === 3){
                    $cantidad_fechas = $cont;
                } else if($cont === 5){
                    $cantidad_fechas = $cont;
                }

                return response()->json([
                    'contrato' => $contrato,
                    'monto_contrato' => $monto_contrato,
                    'cont' => $cont,
                    'cantidad_fechas' => $cantidad_fechas,
                    'nombre_inmobiliaria' => $nombre_inmobiliaria,
                    'respuesta' => 0
                ]);
            } else {
                return Response::json(1);
            }
        }
    }

    public function buscar_contrato_por_fecha(Request $request)
    {
        $fecha_desde = $request->input('fecha_desde');
        $fecha_hasta = $request->input('fecha_hasta');

        if(!is_null($fecha_desde) && is_null($fecha_hasta)){
            //

            $fechapago1 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago1_fecha as fecha_pago', 'monto_pago1 as monto_pago')
                            ->where('pago1_fecha','>=', $fecha_desde)->orderBy('nombre_inmobiliaria')->get();

            $fechapago2 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago2_fecha as fecha_pago', 'monto_pago2 as monto_pago')
                            ->where('pago2_fecha','>=', $fecha_desde)->orderBy('nombre_inmobiliaria')->get();

            $fechapago3 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago3_fecha as fecha_pago', 'monto_pago3 as monto_pago')
                            ->where('pago3_fecha','>=', $fecha_desde)->orderBy('nombre_inmobiliaria')->get();

            $fechapago4 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago4_fecha as fecha_pago', 'monto_pago4 as monto_pago')
                            ->where('pago4_fecha','>=', $fecha_desde)->orderBy('nombre_inmobiliaria')->get();

            $fechapago5 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago5_fecha as fecha_pago', 'monto_pago5 as monto_pago')
                            ->where('pago5_fecha','>=', $fecha_desde)->orderBy('nombre_inmobiliaria')->get();

            $countpago1 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago1_fecha as fecha_pago', 'monto_pago1 as monto_pago')
                            ->where('pago1_fecha','>=', $fecha_desde)->orderBy('nombre_inmobiliaria')->count();

            $countpago2 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago2_fecha as fecha_pago', 'monto_pago2 as monto_pago')
                            ->where('pago2_fecha','>=', $fecha_desde)->orderBy('nombre_inmobiliaria')->count();

            $countpago3 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago3_fecha as fecha_pago', 'monto_pago3 as monto_pago')
                            ->where('pago3_fecha','>=', $fecha_desde)->orderBy('nombre_inmobiliaria')->count();

            $countpago4 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago4_fecha as fecha_pago', 'monto_pago4 as monto_pago')
                            ->where('pago4_fecha','>=', $fecha_desde)->orderBy('nombre_inmobiliaria')->count();

            $countpago5 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago5_fecha as fecha_pago', 'monto_pago5 as monto_pago')
                            ->where('pago5_fecha','>=', $fecha_desde)->orderBy('nombre_inmobiliaria')->count();

            $counts = array(
                $countpago1,
                $countpago2,
                $countpago3,
                $countpago4,
                $countpago5
            );
           //$contratos = Contrato::join('proyectos', 'contratos.proyecto_id', 'proyectos.id')
           //                ->select('contratos.id', 'contratos.nombre_inmobiliaria', 'contratos.nombre_proyecto', 'proyectos.fecha_inicio_instalacion', 'contratos.pago1_fecha', 'contratos.monto_pago1', 'contratos.pago2_fecha', 'contratos.monto_pago2', 'contratos.pago3_fecha', 'contratos.monto_pago3', 'contratos.pago4_fecha', 'contratos.monto_pago4', 'contratos.pago5_fecha', 'contratos.monto_pago5', 'contratos.monto_contrato')
           //                ->where('proyectos.fecha_inicio_instalacion', '>=', $fecha_desde)
           //              	->orderBy('proyectos.fecha_inicio_instalacion', 'asc')
           //                ->get();

           //return response()->json([
           //    'fecha desde' => $fecha_desde,
           //    'respuesta' => 'Solo desde',
           //    'contratos' => $contratos
           //]);

            return response()->json([
                'fecha desde' => $fecha_desde,
                'respuesta' => 'Solo desde',
                'fechapago1' => $fechapago1,
                'fechapago2' => $fechapago2,
                'fechapago3' => $fechapago3,
                'fechapago4' => $fechapago4,
                'fechapago5' => $fechapago5,
                'counts' => $counts
            ]);

        } else if(is_null($fecha_desde) && !is_null($fecha_hasta)){
            //

            $fechapago1 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago1_fecha as fecha_pago', 'monto_pago1 as monto_pago')
                            ->where('pago1_fecha','<=', $fecha_hasta)->orderBy('nombre_inmobiliaria')->get();

            $fechapago2 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago2_fecha as fecha_pago', 'monto_pago2 as monto_pago')
                            ->where('pago2_fecha','<=', $fecha_hasta)->orderBy('nombre_inmobiliaria')->get();

            $fechapago3 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago3_fecha as fecha_pago', 'monto_pago3 as monto_pago')
                            ->where('pago3_fecha','<=', $fecha_hasta)->orderBy('nombre_inmobiliaria')->get();

            $fechapago4 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago4_fecha as fecha_pago', 'monto_pago4 as monto_pago')
                            ->where('pago4_fecha','<=', $fecha_hasta)->orderBy('nombre_inmobiliaria')->get();

            $fechapago5 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago5_fecha as fecha_pago', 'monto_pago5 as monto_pago')
                            ->where('pago5_fecha','<=', $fecha_hasta)->orderBy('nombre_inmobiliaria')->get();

            $countpago1 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago1_fecha as fecha_pago', 'monto_pago1 as monto_pago')
                            ->where('pago1_fecha','<=', $fecha_hasta)->orderBy('nombre_inmobiliaria')->count();

            $countpago2 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago2_fecha as fecha_pago', 'monto_pago2 as monto_pago')
                            ->where('pago2_fecha','<=', $fecha_hasta)->orderBy('nombre_inmobiliaria')->count();

            $countpago3 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago3_fecha as fecha_pago', 'monto_pago3 as monto_pago')
                            ->where('pago3_fecha','<=', $fecha_hasta)->orderBy('nombre_inmobiliaria')->count();

            $countpago4 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago4_fecha as fecha_pago', 'monto_pago4 as monto_pago')
                            ->where('pago4_fecha','<=', $fecha_hasta)->orderBy('nombre_inmobiliaria')->count();

            $countpago5 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago5_fecha as fecha_pago', 'monto_pago5 as monto_pago')
                            ->where('pago5_fecha','<=', $fecha_hasta)->orderBy('nombre_inmobiliaria')->count();

            $counts = array(
                $countpago1,
                $countpago2,
                $countpago3,
                $countpago4,
                $countpago5
            );
          //$contratos = Contrato::join('proyectos', 'contratos.proyecto_id', 'proyectos.id')
          //                ->select('contratos.id', 'contratos.nombre_inmobiliaria', 'contratos.nombre_proyecto', 'proyectos.fecha_inicio_instalacion', 'contratos.pago1_fecha', 'contratos.monto_pago1', 'contratos.pago2_fecha', 'contratos.monto_pago2', 'contratos.pago3_fecha', 'contratos.monto_pago3', 'contratos.pago4_fecha', 'contratos.monto_pago4', 'contratos.pago5_fecha', 'contratos.monto_pago5', 'contratos.monto_contrato')
          //                ->where('proyectos.fecha_inicio_instalacion', '<=', $fecha_hasta)
          //                ->orderBy('proyectos.fecha_inicio_instalacion', 'asc')
          //                ->get();

          //return response()->json([
          //    'fecha hasta' => $fecha_hasta,
          //    'respuesta' => 'Solo hasta',
          //    'contratos' => $contratos
          //]);

            return response()->json([
                'fecha hasta' => $fecha_hasta,
                'respuesta' => 'Solo hasta',
                'fechapago1' => $fechapago1,
                'fechapago2' => $fechapago2,
                'fechapago3' => $fechapago3,
                'fechapago4' => $fechapago4,
                'fechapago5' => $fechapago5,
                'counts' => $counts
            ]);


        } else if(!is_null($fecha_desde) && !is_null($fecha_hasta)){
            //

        $fechapago2 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago2_fecha as fecha_pago', 'monto_pago2 as monto_pago')
        					->whereBetween('pago2_fecha',[$fecha_desde,$fecha_hasta])->orderBy('nombre_inmobiliaria')->get();

        $fechapago3 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago3_fecha as fecha_pago', 'monto_pago3 as monto_pago')
        					->whereBetween('pago3_fecha',[$fecha_desde,$fecha_hasta])->orderBy('nombre_inmobiliaria')->get();

        $fechapago4 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago4_fecha as fecha_pago', 'monto_pago4 as monto_pago')
        					->whereBetween('pago4_fecha',[$fecha_desde,$fecha_hasta])->orderBy('nombre_inmobiliaria')->get();

        $fechapago5 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago5_fecha as fecha_pago', 'monto_pago5 as monto_pago')
        					->whereBetween('pago5_fecha',[$fecha_desde,$fecha_hasta])->orderBy('nombre_inmobiliaria')->get();

        $fechapago1 = Contrato::select('nombre_inmobiliaria', 'nombre_proyecto', 'pago1_fecha as fecha_pago', 'monto_pago1 as monto_pago')
        					->whereBetween('pago1_fecha',[$fecha_desde,$fecha_hasta])->orderBy('nombre_inmobiliaria')->get();

        $countpago2 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago2_fecha as fecha_pago', 'monto_pago2 as monto_pago')
        					->whereBetween('pago2_fecha',[$fecha_desde,$fecha_hasta])->orderBy('nombre_inmobiliaria')->count();

        $countpago3 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago3_fecha as fecha_pago', 'monto_pago3 as monto_pago')
        					->whereBetween('pago3_fecha',[$fecha_desde,$fecha_hasta])->orderBy('nombre_inmobiliaria')->count();

        $countpago4 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago4_fecha as fecha_pago', 'monto_pago4 as monto_pago')
        					->whereBetween('pago4_fecha',[$fecha_desde,$fecha_hasta])->orderBy('nombre_inmobiliaria')->count();

        $countpago5 = Contrato::select('nombre_inmobiliaria','nombre_proyecto','pago5_fecha as fecha_pago', 'monto_pago5 as monto_pago')
        					->whereBetween('pago5_fecha',[$fecha_desde,$fecha_hasta])->orderBy('nombre_inmobiliaria')->count();

        $countpago1 = Contrato::select('nombre_inmobiliaria', 'nombre_proyecto', 'pago1_fecha as fecha_pago', 'monto_pago1 as monto_pago')
        					->whereBetween('pago1_fecha',[$fecha_desde,$fecha_hasta])->orderBy('nombre_inmobiliaria')->count();

        $counts = array(
        	 $countpago1,
        	 $countpago2,
        	 $countpago3,
        	 $countpago4,
        	 $countpago5
        );


        //$contratos = Contrato::join('proyectos', 'contratos.proyecto_id', 'proyectos.id')
        //                ->select('contratos.id', 'contratos.nombre_inmobiliaria', 'contratos.nombre_proyecto', 'proyectos.fecha_inicio_instalacion', 'contratos.pago1_fecha', 'contratos.monto_pago1', 'contratos.pago2_fecha', 'contratos.monto_pago2', 'contratos.pago3_fecha', 'contratos.monto_pago3', 'contratos.pago4_fecha', 'contratos.monto_pago4', 'contratos.pago5_fecha', 'contratos.monto_pago5', 'contratos.monto_contrato')
        //                ->where('proyectos.fecha_inicio_instalacion', '>=', $fecha_desde)
        //                ->where('proyectos.fecha_inicio_instalacion', '<=', $fecha_hasta)
        //                ->orderBy('proyectos.fecha_inicio_instalacion', 'asc')
        //                ->get();

            return response()->json([
                'fecha desde' => $fecha_desde,
                'fecha hasta' => $fecha_hasta,
                'respuesta' => 'Ambas fechas',
                'fechapago1' => $fechapago1,
                'fechapago2' => $fechapago2,
                'fechapago3' => $fechapago3,
                'fechapago4' => $fechapago4,
                'fechapago5' => $fechapago5,
                'counts' => $counts
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar campos requeridos
        $this->validate($request, [
            'proyecto_id'     => 'required'
        ]);

        //CONTRATO
        $inmobiliaria_id            = $request->input('inmobiliaria_id');
        $proyecto_id                = $request->input('proyecto_id');
        $nombre_proyecto            = $request->input('nombre_proyecto');
        $total_viviendas_proyectos  = $request->input('total_viviendas_proyectos');
        $estado_proyecto            = $request->input('estado_proyecto');
        $comuna_id                  = $request->input('comuna_id');
        $nombre_comuna              = $request->input('nombre_comuna');
        $direccion_proyecto         = $request->input('direccion_proyecto');
        $mandante_proyecto          = $request->input('mandante_proyecto');
        $rut_mandante_proyecto      = $request->input('rut_mandante_proyecto');
        $rep_legal_proyecto         = $request->input('rep_legal_proyecto');
        $rut_rep_legal              = $request->input('rut_rep_legal');
        $ins_personeria_juridica    = $request->input('ins_personeria_juridica');
        $notario_inscripcion        = $request->input('notario_inscripcion');
        $nombre_inmobiliaria        = $request->input('nombre_inmobiliaria');
        $mes_confeccion_contrato    = $request->input('mes_confeccion_contrato');
        $numero_contrato            = $request->input('numero_contrato');
        $comuna_rep_legal           = $request->input('comuna_rep_legal');
        $region_rep_legal           = $request->input('region_rep_legal');
        $direccion_rep_legal        = $request->input('direccion_rep_legal');
        $num_oficina_rep_legal      = $request->input('num_oficina_rep_legal');
        $razon_social_factura       = $request->input('razon_social_factura');
        $giro_factura               = $request->input('giro_factura');
        $rut_factura                = $request->input('rut_factura');
        $direccion_factura          = $request->input('direccion_factura');
        $encargado_finanzas         = $request->input('encargado_finanzas');
        $email_encargado_finanzas   = $request->input('email_encargado_finanzas');
        $email_dte                  = $request->input('email_dte');
        $email_pdf                  = $request->input('email_pdf');
        $fecha_esc_personeria       = $request->input('fecha_esc_personeria');
        $notaria_esc_personeria     = $request->input('notaria_esc_personeria');
        $nom_notario_publico        = $request->input('nom_notario_publico');
        $pago1_fecha                = $request->input('pago1_fecha');
        $pago2_fecha                = $request->input('pago2_fecha');
        $pago3_fecha                = $request->input('pago3_fecha');
        $pago4_fecha                = $request->input('pago4_fecha');
        $pago5_fecha                = $request->input('pago5_fecha');
        $monto_contrato             = $request->input('monto_contrato');
        $nombre_contacto_cont       = $request->input('nombre_contacto_cont');
        $cargo_contacto_cont        = $request->input('cargo_contacto_cont');
        $email_contacto_cont        = $request->input('email_contacto_cont');
        $telefono_contacto_cont     = $request->input('telefono_contacto_cont');
        $nombre_contacto_mkt        = $request->input('nombre_contacto_mkt');
        $cargo_contacto_mkt         = $request->input('cargo_contacto_mkt');
        $email_contacto_mkt         = $request->input('email_contacto_mkt');
        $nombre_agencia_externa     = $request->input('nombre_agencia_externa');
        $link_oficial_proyecto      = $request->input('link_oficial_proyecto');
        $fecha_inicio_instalacion   = $request->input('fecha_inicio_instalacion');
        $url_drive                  = $request->input('url_drive');
        //SALA DE VENTAS
        $sala_venta_contrato        = $request->input('sala_venta_contrato');
        $stand_sala_venta           = $request->input('stand_sala_venta');
        $domotizacion_stand         = $request->input('domotizacion_stand');
        $fecha_imp_sala_venta       = $request->input('fecha_imp_sala_venta');
        $fecha_cap_sala_venta       = $request->input('fecha_cap_sala_venta');
        $fecha_ret_sala_venta       = $request->input('fecha_ret_sala_venta');
        $arrayInventarioSalaVenta   = $request->input('arrayInventarioSalaVenta');
        //PILOTO
        $piloto_contrato            = $request->input('piloto_contrato');
        $comuna_piloto              = $request->input('comuna_piloto');
        $direccion_piloto           = $request->input('direccion_piloto');
        $cantidad_piloto            = $request->input('cantidad_piloto');
        $observacion_piloto         = $request->input('observacion_piloto');
        $arrayAllPilotos            = $request->input('arrayAllPilotos');

        //
        $datos_sala_ventas = $request->input('datos_sala_ventas');
        $datos_piloto = $request->input('datos_piloto');

        $validar_contrato_duplicado = Contrato::where('proyecto_id', $proyecto_id)->count();

        if($validar_contrato_duplicado === 0){
            // INSERT CONTRATO
            $insert_contrato = new Contrato;
            $insert_contrato->estado_id                     = $estado_proyecto;
            $insert_contrato->proyecto_id                   = $proyecto_id;
            $insert_contrato->nombre_proyecto               = $nombre_proyecto;
            $insert_contrato->total_viviendas_proyecto      = $total_viviendas_proyectos;
            $insert_contrato->direccion_proyecto            = $direccion_proyecto;
            $insert_contrato->comuna_id                     = $comuna_id;
            if($comuna_id === null){
                $insert_contrato->comuna_proyecto = NULL;
            } else {
                $insert_contrato->comuna_proyecto = $nombre_comuna;
            }
            $insert_contrato->fecha_probable_entrega        = $fecha_inicio_instalacion;
            $insert_contrato->sala_ventas                   = $sala_venta_contrato;
            $insert_contrato->sala_ventas_domotizacion      = $domotizacion_stand;
            $insert_contrato->piloto                        = $piloto_contrato;
            $insert_contrato->comuna_piloto                 = $comuna_piloto;
            $insert_contrato->mandante_proyecto             = $mandante_proyecto;
            $insert_contrato->rut_mandante_proyecto         = $rut_mandante_proyecto;
            $insert_contrato->representante_legal_proyecto  = $rep_legal_proyecto;
            $insert_contrato->rut_rep_legal                 = $rut_rep_legal;
            $insert_contrato->ins_personeria_juridica       = $ins_personeria_juridica;
            $insert_contrato->notario_ins_proyecto          = $notario_inscripcion;
            $insert_contrato->razon_social                  = $razon_social_factura;
            $insert_contrato->giro_factura                  = $giro_factura;
            $insert_contrato->rut_factura                   = $rut_factura;
            $insert_contrato->direccion_factura             = $direccion_factura;
            $insert_contrato->encargado_finanzas            = $encargado_finanzas;
            $insert_contrato->email_encargado_finanzas      = $email_encargado_finanzas;
            $insert_contrato->email_dte                     = $email_dte;
            $insert_contrato->email_pdf                     = $email_pdf;
            $insert_contrato->nombre_responsable            = $nombre_contacto_cont;
            $insert_contrato->cargo_responsable             = $cargo_contacto_cont;
            $insert_contrato->email_responsable             = $email_contacto_cont;
            $insert_contrato->telefono_responsable          = $telefono_contacto_cont;
            $insert_contrato->nombre_contacto_mkt           = $nombre_contacto_mkt;
            $insert_contrato->cargo_contacto_mkt            = $cargo_contacto_mkt;
            $insert_contrato->email_contacto_mkt            = $email_contacto_mkt;
            $insert_contrato->nombre_agencia_externa        = $nombre_agencia_externa;
            $insert_contrato->url_oficial_proyecto          = $link_oficial_proyecto;
            $insert_contrato->direccion_representante_legal = $direccion_rep_legal;
            $insert_contrato->oficina_representante_legal   = $num_oficina_rep_legal;
            $insert_contrato->comuna_representante_legal    = $comuna_rep_legal;
            $insert_contrato->region_representante_legal    = $region_rep_legal;
            $insert_contrato->nombre_inmobiliaria           = $nombre_inmobiliaria;
            $insert_contrato->fecha_escritura_personeria    = $fecha_esc_personeria;
            $insert_contrato->notaria_escritura_personeria  = $notaria_esc_personeria;
            $insert_contrato->nombre_notario_publico        = $nom_notario_publico;
            $insert_contrato->numero_contrato               = $numero_contrato;
            $insert_contrato->mes_confeccion_contrato       = $mes_confeccion_contrato;
            $insert_contrato->observacion                   = NULL;
            $insert_contrato->estado_observacion            = 10;
            $insert_contrato->url_drive                     = $url_drive;

            $insert_contrato->pago1_fecha                   = $pago1_fecha;
            $insert_contrato->pago2_fecha                   = $pago2_fecha;
            $insert_contrato->pago3_fecha                   = $pago3_fecha;
            $insert_contrato->pago4_fecha                   = $pago4_fecha;
            $insert_contrato->pago5_fecha                   = $pago5_fecha;

            $insert_contrato->monto_contrato                = $monto_contrato;

            if(!is_null($monto_contrato)){

                if(!is_null($pago1_fecha) && !is_null($pago2_fecha) && !is_null($pago3_fecha) && is_null($pago4_fecha) && is_null($pago5_fecha)){

                    $get_monto_10_porcentaje = $monto_contrato * 0.10;
                    $monto_10_porcentaje = number_format((float)$get_monto_10_porcentaje,2,'.','');

                    $get_monto_50_porcentaje = $monto_contrato * 0.50;
                    $monto_50_porcentaje = number_format((float)$get_monto_50_porcentaje,2,'.','');

                    $get_monto_40_porcentaje = $monto_contrato * 0.40;
                    $monto_40_porcentaje = number_format((float)$get_monto_40_porcentaje,2,'.','');

                    $insert_contrato->monto_pago1 = $monto_10_porcentaje;
                    $insert_contrato->monto_pago2 = $monto_50_porcentaje;
                    $insert_contrato->monto_pago3 = $monto_40_porcentaje;
                    $insert_contrato->monto_pago4 = NULL;
                    $insert_contrato->monto_pago5 = NULL;
                } else if(!is_null($pago1_fecha) && !is_null($pago2_fecha) && !is_null($pago3_fecha) && !is_null($pago4_fecha) && !is_null($pago5_fecha)){

                    $get_monto_10_porcentaje = $monto_contrato * 0.10;
                    $monto_10_porcentaje = number_format((float)$get_monto_10_porcentaje,2,'.','');

                    $get_monto_25_porcentaje = $monto_contrato * 0.25;
                    $monto_25_porcentaje = number_format((float)$get_monto_25_porcentaje,2,'.','');

                    $get_monto2_25_porcentaje = $monto_contrato * 0.25;
                    $monto2_25_porcentaje = number_format((float)$get_monto2_25_porcentaje,2,'.','');

                    $get_monto_20_porcentaje = $monto_contrato * 0.20;
                    $monto_20_porcentaje = number_format((float)$get_monto_20_porcentaje,2,'.','');

                    $get_monto2_20_porcentaje = $monto_contrato * 0.20;
                    $monto2_20_porcentaje = number_format((float)$get_monto2_20_porcentaje,2,'.','');

                    $insert_contrato->monto_pago1 = $monto_10_porcentaje;
                    $insert_contrato->monto_pago2 = $monto_25_porcentaje;
                    $insert_contrato->monto_pago3 = $monto2_25_porcentaje;
                    $insert_contrato->monto_pago4 = $monto_20_porcentaje;
                    $insert_contrato->monto_pago5 = $monto2_20_porcentaje;
                } else {
                    $insert_contrato->monto_pago1 = NULL;
                    $insert_contrato->monto_pago2 = NULL;
                    $insert_contrato->monto_pago3 = NULL;
                    $insert_contrato->monto_pago4 = NULL;
                    $insert_contrato->monto_pago5 = NULL;
                }
            } else {
                $insert_contrato->monto_pago1 = NULL;
                $insert_contrato->monto_pago2 = NULL;
                $insert_contrato->monto_pago3 = NULL;
                $insert_contrato->monto_pago4 = NULL;
                $insert_contrato->monto_pago5 = NULL;
            }

            if($sala_venta_contrato === 'SI' && $datos_sala_ventas === 'por definir'){
                $insert_contrato->datos_sala_ventas = $datos_sala_ventas;
                $insert_contrato->save();
            } else {
                $insert_contrato->datos_sala_ventas = NULL;
                $insert_contrato->save();
            }
            if($piloto_contrato === 'SI' && $datos_piloto === 'por definir'){
                $insert_contrato->datos_piloto = $datos_piloto;
                $insert_contrato->save();
            } else {
                $insert_contrato->datos_piloto = NULL;
                $insert_contrato->save();
            }

            $insert_contrato->save();

            $ultimo_insert_contrato = $insert_contrato->id;

            // VERIFICAR SI TIENE SALA DE VENTAS Y DOMOTIZACIÓN
            if($sala_venta_contrato === 'SI' && $datos_sala_ventas === null){

                if($domotizacion_stand === 'SI'){
                    // Insert Sala de Ventas
                    $insert_sala_venta = new Salaventa;
                    $insert_sala_venta->fecha_implementacion = $fecha_imp_sala_venta;
                    $insert_sala_venta->fecha_capacitacion = $fecha_cap_sala_venta;
                    $insert_sala_venta->fecha_retiro = $fecha_ret_sala_venta;
                    $insert_sala_venta->stand = 'SI';
                    $insert_sala_venta->estado_id = 10;
                    $insert_sala_venta->descripcion = NULL;
                    $insert_sala_venta->observacion = NULL;
                    $insert_sala_venta->contrato_id = $ultimo_insert_contrato;
                    $insert_sala_venta->save();

                    $ultimo_insert_sala_venta = $insert_sala_venta->id;

                    // Insert Inventario Sala de ventas
                    foreach($arrayInventarioSalaVenta as $sala_venta){
                        $data_sala_venta = [];

                        $get_producto_id = (int)$sala_venta['id'];
                        $producto = Producto::find($get_producto_id);

                        $get_tiempo_ins_hora = $producto->tiempo_instalacion_hora;
                        $get_tiempo_cap_hora = $producto->tiempo_configuracion_hora;

                        $get_cant_ins_hora = $get_tiempo_ins_hora * (int)$sala_venta['cantidad'];
                        $cant_ins_hora = number_format((float)$get_cant_ins_hora,2,'.','');

                        $get_cant_cap_hora = $get_tiempo_cap_hora * (int)$sala_venta['cantidad'];
                        $cant_cap_hora = number_format((float)$get_cant_cap_hora,2,'.','');

                        $get_suma_total = $cant_ins_hora + $cant_cap_hora;
                        $suma_total = number_format((float)$get_suma_total,2,'.','');

                        $data_sala_venta[] = array(
                            "tiempo_instalacion_hora" => $cant_ins_hora,
                            "tiempo_configuracion_hora" => $cant_cap_hora,
                            "cantidad" => (int)$sala_venta['cantidad'],
                            "total" => $suma_total,
                            "salaventa_id" => $ultimo_insert_sala_venta,
                            "producto_id" => (int)$sala_venta['id'],
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        Inventariostand::insert($data_sala_venta);
                    }
                } else {
                    // Insert Sala de Ventas
                    $insert_sala_venta = new Salaventa;
                    $insert_sala_venta->fecha_implementacion = $fecha_imp_sala_venta;
                    $insert_sala_venta->fecha_capacitacion = $fecha_cap_sala_venta;
                    $insert_sala_venta->fecha_retiro = $fecha_ret_sala_venta;
                    $insert_sala_venta->stand = 'NO';
                    $insert_sala_venta->estado_id = 10;
                    $insert_sala_venta->descripcion = NULL;
                    $insert_sala_venta->observacion = NULL;
                    $insert_sala_venta->contrato_id = $ultimo_insert_contrato;
                    $insert_sala_venta->save();
                    $arrayInventarioSalaVenta = [];
                }
            } else {
                $arrayInventarioSalaVenta = [];
            }

            // VERIFICAR SI LLEVA UNO O MÁS PILOTOS
            if($piloto_contrato === 'SI' && $datos_piloto === null){
                // INSERT PILOTOS
                foreach($arrayAllPilotos as $piloto){

                    $insert_piloto = new Piloto;
                    $insert_piloto->fecha_capacitacion = $piloto['fecha_cap_piloto'];
                    $insert_piloto->fecha_implementacion = $piloto['fecha_imp_piloto'];
                    $insert_piloto->fecha_retiro = $piloto['fecha_ret_piloto'];
                    $insert_piloto->direccion = $direccion_piloto;
                    $insert_piloto->estado_id = 10;
                    $insert_piloto->observacion = NULL;
                    $insert_piloto->descripcion = $observacion_piloto;
                    $insert_piloto->contrato_id = $ultimo_insert_contrato;
                    $insert_piloto->save();
                    $ultimo_insert_piloto = $insert_piloto->id;

                    // INSERT INVENTARIO PILOTO
                    foreach($piloto['inventario_piloto'] as $inv_piloto){

                        $data_inv_piloto = [];

                        $get_producto_id = (int)$inv_piloto['id'];
                        $producto = Producto::find($get_producto_id);

                        $get_tiempo_ins_hora = $producto->tiempo_instalacion_hora;
                        $get_tiempo_cap_hora = $producto->tiempo_configuracion_hora;

                        $get_cant_ins_hora = $get_tiempo_ins_hora * (int)$inv_piloto['cantidad'];
                        $cant_ins_hora = number_format((float)$get_cant_ins_hora,2,'.','');

                        $get_cant_cap_hora = $get_tiempo_cap_hora * (int)$inv_piloto['cantidad'];
                        $cant_cap_hora = number_format((float)$get_cant_cap_hora,2,'.','');

                        $get_suma_total = $cant_ins_hora + $cant_cap_hora;
                        $suma_total = number_format((float)$get_suma_total,2,'.','');

                        $data_inv_piloto[] = array(
                            "tiempo_instalacion_hora" => $cant_ins_hora,
                            "tiempo_configuracion_hora" => $cant_cap_hora,
                            "cantidad" => (int)$inv_piloto['cantidad'],
                            "total" => $suma_total,
                            "piloto_id" => $ultimo_insert_piloto,
                            "producto_id" => (int)$inv_piloto['id'],
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        Inventariopiloto::insert($data_inv_piloto);
                    }
                }
            } else {
                $arrayAllPilotos = [];
            }
            return response()->json([
                'inmobiliaria_id'           => $inmobiliaria_id,
                'proyecto_id'               => $proyecto_id,
                'nombre_proyecto'           => $nombre_proyecto,
                'total_viviendas_proyectos' => $total_viviendas_proyectos,
                'estado_proyecto'           => $estado_proyecto,
                'comuna_id'                 => $comuna_id,
                'nombre_comuna'             => $nombre_comuna,
                'direccion_proyecto'        => $direccion_proyecto,
                'mandante_proyecto'         => $mandante_proyecto,
                'rut_mandante_proyecto'     => $rut_mandante_proyecto,
                'rep_legal_proyecto'        => $rep_legal_proyecto,
                'rut_rep_legal'             => $rut_rep_legal,
                'ins_personeria_juridica'   => $ins_personeria_juridica,
                'notario_inscripcion'       => $notario_inscripcion,
                'nombre_inmobiliaria'       => $nombre_inmobiliaria,
                'mes_confeccion_contrato'   => $mes_confeccion_contrato,
                'numero_contrato'           => $numero_contrato,
                'comuna_rep_legal'          => $comuna_rep_legal,
                'region_rep_legal'          => $region_rep_legal,
                'direccion_rep_legal'       => $direccion_rep_legal,
                'num_oficina_rep_legal'     => $num_oficina_rep_legal,
                'razon_social_factura'      => $razon_social_factura,
                'giro_factura'              => $giro_factura,
                'rut_factura'               => $rut_factura,
                'direccion_factura'         => $direccion_factura,
                'encargado_finanzas'        => $encargado_finanzas,
                'email_encargado_finanzas'  => $email_encargado_finanzas,
                'email_dte'                 => $email_dte,
                'email_pdf'                 => $email_pdf,
                'fecha_esc_personeria'      => $fecha_esc_personeria,
                'notaria_esc_personeria'    => $notaria_esc_personeria,
                'nom_notario_publico'       => $nom_notario_publico,
                'pago1_fecha'               => $pago1_fecha,
                'pago2_fecha'               => $pago2_fecha,
                'pago3_fecha'               => $pago3_fecha,
                'pago4_fecha'               => $pago4_fecha,
                'pago5_fecha'               => $pago5_fecha,
                'monto_contrato'            => $monto_contrato,
                'nombre_contacto_cont'      => $nombre_contacto_cont,
                'cargo_contacto_cont'       => $cargo_contacto_cont,
                'email_contacto_cont'       => $email_contacto_cont,
                'telefono_contacto_cont'    => $telefono_contacto_cont,
                'nombre_contacto_mkt'       => $nombre_contacto_mkt,
                'cargo_contacto_mkt'        => $cargo_contacto_mkt,
                'email_contacto_mkt'        => $email_contacto_mkt,
                'nombre_agencia_externa'    => $nombre_agencia_externa,
                'link_oficial_proyecto'     => $link_oficial_proyecto,
                'sala_venta_contrato'       => $sala_venta_contrato,
                'piloto_contrato'           => $piloto_contrato,
                'stand_sala_venta'          => $stand_sala_venta,
                'domotizacion_stand'        => $domotizacion_stand,
                'fecha_imp_sala_venta'      => $fecha_imp_sala_venta,
                'fecha_cap_sala_venta'      => $fecha_cap_sala_venta,
                'fecha_ret_sala_venta'      => $fecha_ret_sala_venta,
                'comuna_piloto'             => $comuna_piloto,
                'direccion_piloto'          => $direccion_piloto,
                'cantidad_piloto'           => $cantidad_piloto,
                'observacion_piloto'        => $observacion_piloto,
                'ultimo_insert_contrato'    => $ultimo_insert_contrato,
                'arrayInventarioSalaVenta'  => $arrayInventarioSalaVenta,
                'arrayAllPilotos'           => $arrayAllPilotos,
                'resultado'                 => 0
            ]);
        } else {
            return Response::json('Contrato Duplicado');
        }

    }

    public function crear_contrato(Request $request){

                //Validar campos requeridos
        $this->validate($request, [
            'proyecto_id'     => 'required'
        ]);

        //CONTRATO
        $inmobiliaria_id            = $request->input('inmobiliaria_id');
        $proyecto_id                = $request->input('proyecto_id');
        $nombre_proyecto            = $request->input('nombre_proyecto');
        $total_viviendas_proyectos  = $request->input('total_viviendas_proyectos');
        $estado_proyecto            = $request->input('estado_proyecto');
        $comuna_id                  = $request->input('comuna_id');
        $nombre_comuna              = $request->input('nombre_comuna');
        $direccion_proyecto         = $request->input('direccion_proyecto');
        $mandante_proyecto          = $request->input('mandante_proyecto');
        $rut_mandante_proyecto      = $request->input('rut_mandante_proyecto');
        $rep_legal_proyecto         = $request->input('rep_legal_proyecto');
        $rut_rep_legal              = $request->input('rut_rep_legal');
        $ins_personeria_juridica    = $request->input('ins_personeria_juridica');
        $notario_inscripcion        = $request->input('notario_inscripcion');
        $nombre_inmobiliaria        = $request->input('nombre_inmobiliaria');
        $mes_confeccion_contrato    = $request->input('mes_confeccion_contrato');
        $numero_contrato            = $request->input('numero_contrato');
        $comuna_rep_legal           = $request->input('comuna_rep_legal');
        $region_rep_legal           = $request->input('region_rep_legal');
        $direccion_rep_legal        = $request->input('direccion_rep_legal');
        $num_oficina_rep_legal      = $request->input('num_oficina_rep_legal');
        $razon_social_factura       = $request->input('razon_social_factura');
        $giro_factura               = $request->input('giro_factura');
        $rut_factura                = $request->input('rut_factura');
        $direccion_factura          = $request->input('direccion_factura');
        $encargado_finanzas         = $request->input('encargado_finanzas');
        $email_encargado_finanzas   = $request->input('email_encargado_finanzas');
        $email_dte                  = $request->input('email_dte');
        $email_pdf                  = $request->input('email_pdf');
        $fecha_esc_personeria       = $request->input('fecha_esc_personeria');
        $notaria_esc_personeria     = $request->input('notaria_esc_personeria');
        $nom_notario_publico        = $request->input('nom_notario_publico');
        $pago1_fecha                = $request->input('pago1_fecha');
        $pago2_fecha                = $request->input('pago2_fecha');
        $pago3_fecha                = $request->input('pago3_fecha');
        $pago4_fecha                = $request->input('pago4_fecha');
        $pago5_fecha                = $request->input('pago5_fecha');
        $monto_contrato             = $request->input('monto_contrato');
        $nombre_contacto_cont       = $request->input('nombre_contacto_cont');
        $cargo_contacto_cont        = $request->input('cargo_contacto_cont');
        $email_contacto_cont        = $request->input('email_contacto_cont');
        $telefono_contacto_cont     = $request->input('telefono_contacto_cont');
        $nombre_contacto_mkt        = $request->input('nombre_contacto_mkt');
        $cargo_contacto_mkt         = $request->input('cargo_contacto_mkt');
        $email_contacto_mkt         = $request->input('email_contacto_mkt');
        $nombre_agencia_externa     = $request->input('nombre_agencia_externa');
        $link_oficial_proyecto      = $request->input('link_oficial_proyecto');
        $fecha_inicio_instalacion   = $request->input('fecha_inicio_instalacion');
        $url_drive                  = $request->input('url_drive');
        //SALA DE VENTAS
        $sala_venta_contrato        = $request->input('sala_venta_contrato');
        $stand_sala_venta           = $request->input('stand_sala_venta');
        $domotizacion_stand         = $request->input('domotizacion_stand');
        $fecha_imp_sala_venta       = $request->input('fecha_imp_sala_venta');
        $fecha_cap_sala_venta       = $request->input('fecha_cap_sala_venta');
        $fecha_ret_sala_venta       = $request->input('fecha_ret_sala_venta');
        $arrayInventarioSalaVenta   = $request->input('arrayInventarioSalaVenta');
        //PILOTO
        $piloto_contrato            = $request->input('piloto_contrato');
        $comuna_piloto              = $request->input('comuna_piloto');
        $direccion_piloto           = $request->input('direccion_piloto');
        $cantidad_piloto            = $request->input('cantidad_piloto');
        $observacion_piloto         = $request->input('observacion_piloto');
        $arrayAllPilotos            = $request->input('arrayAllPilotos');

        //
        $datos_sala_ventas = $request->input('datos_sala_ventas');
        $datos_piloto = $request->input('datos_piloto');

        $validar_contrato_duplicado = Contrato::where('proyecto_id', $proyecto_id)->count();

        if($validar_contrato_duplicado === 0){
            // INSERT CONTRATO
            $insert_contrato = new Contrato;
            $insert_contrato->estado_id                     = $estado_proyecto;
            $insert_contrato->proyecto_id                   = $proyecto_id;
            $insert_contrato->nombre_proyecto               = $nombre_proyecto;
            $insert_contrato->total_viviendas_proyecto      = $total_viviendas_proyectos;
            $insert_contrato->direccion_proyecto            = $direccion_proyecto;
            $insert_contrato->comuna_id                     = $comuna_id;
            if($comuna_id === null){
                $insert_contrato->comuna_proyecto = NULL;
            } else {
                $insert_contrato->comuna_proyecto = $nombre_comuna;
            }
            $insert_contrato->fecha_probable_entrega        = $fecha_inicio_instalacion;
            $insert_contrato->sala_ventas                   = $sala_venta_contrato;
            $insert_contrato->sala_ventas_domotizacion      = $domotizacion_stand;
            $insert_contrato->piloto                        = $piloto_contrato;
            $insert_contrato->comuna_piloto                 = $comuna_piloto;
            $insert_contrato->mandante_proyecto             = $mandante_proyecto;
            $insert_contrato->rut_mandante_proyecto         = $rut_mandante_proyecto;
            $insert_contrato->representante_legal_proyecto  = $rep_legal_proyecto;
            $insert_contrato->rut_rep_legal                 = $rut_rep_legal;
            $insert_contrato->ins_personeria_juridica       = $ins_personeria_juridica;
            $insert_contrato->notario_ins_proyecto          = $notario_inscripcion;
            $insert_contrato->razon_social                  = $razon_social_factura;
            $insert_contrato->giro_factura                  = $giro_factura;
            $insert_contrato->rut_factura                   = $rut_factura;
            $insert_contrato->direccion_factura             = $direccion_factura;
            $insert_contrato->encargado_finanzas            = $encargado_finanzas;
            $insert_contrato->email_encargado_finanzas      = $email_encargado_finanzas;
            $insert_contrato->email_dte                     = $email_dte;
            $insert_contrato->email_pdf                     = $email_pdf;
            $insert_contrato->nombre_responsable            = $nombre_contacto_cont;
            $insert_contrato->cargo_responsable             = $cargo_contacto_cont;
            $insert_contrato->email_responsable             = $email_contacto_cont;
            $insert_contrato->telefono_responsable          = $telefono_contacto_cont;
            $insert_contrato->nombre_contacto_mkt           = $nombre_contacto_mkt;
            $insert_contrato->cargo_contacto_mkt            = $cargo_contacto_mkt;
            $insert_contrato->email_contacto_mkt            = $email_contacto_mkt;
            $insert_contrato->nombre_agencia_externa        = $nombre_agencia_externa;
            $insert_contrato->url_oficial_proyecto          = $link_oficial_proyecto;
            $insert_contrato->direccion_representante_legal = $direccion_rep_legal;
            $insert_contrato->oficina_representante_legal   = $num_oficina_rep_legal;
            $insert_contrato->comuna_representante_legal    = $comuna_rep_legal;
            $insert_contrato->region_representante_legal    = $region_rep_legal;
            $insert_contrato->nombre_inmobiliaria           = $nombre_inmobiliaria;
            $insert_contrato->fecha_escritura_personeria    = $fecha_esc_personeria;
            $insert_contrato->notaria_escritura_personeria  = $notaria_esc_personeria;
            $insert_contrato->nombre_notario_publico        = $nom_notario_publico;
            $insert_contrato->numero_contrato               = $numero_contrato;
            $insert_contrato->mes_confeccion_contrato       = $mes_confeccion_contrato;
            $insert_contrato->observacion                   = NULL;
            $insert_contrato->estado_observacion            = 10;
            $insert_contrato->url_drive                     = $url_drive;

            $insert_contrato->pago1_fecha                   = $pago1_fecha;
            $insert_contrato->pago2_fecha                   = $pago2_fecha;
            $insert_contrato->pago3_fecha                   = $pago3_fecha;
            $insert_contrato->pago4_fecha                   = $pago4_fecha;
            $insert_contrato->pago5_fecha                   = $pago5_fecha;

            $insert_contrato->monto_contrato                = $monto_contrato;

            if(!is_null($monto_contrato)){

                if(!is_null($pago1_fecha) && !is_null($pago2_fecha) && !is_null($pago3_fecha) && is_null($pago4_fecha) && is_null($pago5_fecha)){

                    $get_monto_10_porcentaje = $monto_contrato * 0.10;
                    $monto_10_porcentaje = number_format((float)$get_monto_10_porcentaje,2,'.','');

                    $get_monto_50_porcentaje = $monto_contrato * 0.50;
                    $monto_50_porcentaje = number_format((float)$get_monto_50_porcentaje,2,'.','');

                    $get_monto_40_porcentaje = $monto_contrato * 0.40;
                    $monto_40_porcentaje = number_format((float)$get_monto_40_porcentaje,2,'.','');

                    $insert_contrato->monto_pago1 = $monto_10_porcentaje;
                    $insert_contrato->monto_pago2 = $monto_50_porcentaje;
                    $insert_contrato->monto_pago3 = $monto_40_porcentaje;
                    $insert_contrato->monto_pago4 = NULL;
                    $insert_contrato->monto_pago5 = NULL;
                } else if(!is_null($pago1_fecha) && !is_null($pago2_fecha) && !is_null($pago3_fecha) && !is_null($pago4_fecha) && !is_null($pago5_fecha)){

                    $get_monto_10_porcentaje = $monto_contrato * 0.10;
                    $monto_10_porcentaje = number_format((float)$get_monto_10_porcentaje,2,'.','');

                    $get_monto_25_porcentaje = $monto_contrato * 0.25;
                    $monto_25_porcentaje = number_format((float)$get_monto_25_porcentaje,2,'.','');

                    $get_monto2_25_porcentaje = $monto_contrato * 0.25;
                    $monto2_25_porcentaje = number_format((float)$get_monto2_25_porcentaje,2,'.','');

                    $get_monto_20_porcentaje = $monto_contrato * 0.20;
                    $monto_20_porcentaje = number_format((float)$get_monto_20_porcentaje,2,'.','');

                    $get_monto2_20_porcentaje = $monto_contrato * 0.20;
                    $monto2_20_porcentaje = number_format((float)$get_monto2_20_porcentaje,2,'.','');

                    $insert_contrato->monto_pago1 = $monto_10_porcentaje;
                    $insert_contrato->monto_pago2 = $monto_25_porcentaje;
                    $insert_contrato->monto_pago3 = $monto2_25_porcentaje;
                    $insert_contrato->monto_pago4 = $monto_20_porcentaje;
                    $insert_contrato->monto_pago5 = $monto2_20_porcentaje;
                } else {
                    $insert_contrato->monto_pago1 = NULL;
                    $insert_contrato->monto_pago2 = NULL;
                    $insert_contrato->monto_pago3 = NULL;
                    $insert_contrato->monto_pago4 = NULL;
                    $insert_contrato->monto_pago5 = NULL;
                }
            } else {
                $insert_contrato->monto_pago1 = NULL;
                $insert_contrato->monto_pago2 = NULL;
                $insert_contrato->monto_pago3 = NULL;
                $insert_contrato->monto_pago4 = NULL;
                $insert_contrato->monto_pago5 = NULL;
            }

            if($sala_venta_contrato === 'SI' && $datos_sala_ventas === 'por definir'){
                $insert_contrato->datos_sala_ventas = $datos_sala_ventas;
                $insert_contrato->save();
            } else {
                $insert_contrato->datos_sala_ventas = NULL;
                $insert_contrato->save();
            }
            if($piloto_contrato === 'SI' && $datos_piloto === 'por definir'){
                $insert_contrato->datos_piloto = $datos_piloto;
                $insert_contrato->save();
            } else {
                $insert_contrato->datos_piloto = NULL;
                $insert_contrato->save();
            }

            $insert_contrato->save();

            $ultimo_insert_contrato = $insert_contrato->id;

            // VERIFICAR SI TIENE SALA DE VENTAS Y DOMOTIZACIÓN
            if($sala_venta_contrato === 'SI' && $datos_sala_ventas === null){

                if($domotizacion_stand === 'SI'){
                    // Insert Sala de Ventas
                    $insert_sala_venta = new Salaventa;
                    $insert_sala_venta->fecha_implementacion = $fecha_imp_sala_venta;
                    $insert_sala_venta->fecha_capacitacion = $fecha_cap_sala_venta;
                    $insert_sala_venta->fecha_retiro = $fecha_ret_sala_venta;
                    $insert_sala_venta->stand = 'SI';
                    $insert_sala_venta->estado_id = 10;
                    $insert_sala_venta->descripcion = NULL;
                    $insert_sala_venta->observacion = NULL;
                    $insert_sala_venta->contrato_id = $ultimo_insert_contrato;
                    $insert_sala_venta->save();

                    $ultimo_insert_sala_venta = $insert_sala_venta->id;

                    // Insert Inventario Sala de ventas
                    foreach($arrayInventarioSalaVenta as $sala_venta){
                        $data_sala_venta = [];

                        $get_producto_id = (int)$sala_venta['id'];
                        $producto = Producto::find($get_producto_id);

                        $get_tiempo_ins_hora = $producto->tiempo_instalacion_hora;
                        $get_tiempo_cap_hora = $producto->tiempo_configuracion_hora;

                        $get_cant_ins_hora = $get_tiempo_ins_hora * (int)$sala_venta['cantidad'];
                        $cant_ins_hora = number_format((float)$get_cant_ins_hora,2,'.','');

                        $get_cant_cap_hora = $get_tiempo_cap_hora * (int)$sala_venta['cantidad'];
                        $cant_cap_hora = number_format((float)$get_cant_cap_hora,2,'.','');

                        $get_suma_total = $cant_ins_hora + $cant_cap_hora;
                        $suma_total = number_format((float)$get_suma_total,2,'.','');

                        $data_sala_venta[] = array(
                            "tiempo_instalacion_hora" => $cant_ins_hora,
                            "tiempo_configuracion_hora" => $cant_cap_hora,
                            "cantidad" => (int)$sala_venta['cantidad'],
                            "total" => $suma_total,
                            "salaventa_id" => $ultimo_insert_sala_venta,
                            "producto_id" => (int)$sala_venta['id'],
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        Inventariostand::insert($data_sala_venta);
                    }
                } else {
                    // Insert Sala de Ventas
                    $insert_sala_venta = new Salaventa;
                    $insert_sala_venta->fecha_implementacion = $fecha_imp_sala_venta;
                    $insert_sala_venta->fecha_capacitacion = $fecha_cap_sala_venta;
                    $insert_sala_venta->fecha_retiro = $fecha_ret_sala_venta;
                    $insert_sala_venta->stand = 'NO';
                    $insert_sala_venta->estado_id = 10;
                    $insert_sala_venta->descripcion = NULL;
                    $insert_sala_venta->observacion = NULL;
                    $insert_sala_venta->contrato_id = $ultimo_insert_contrato;
                    $insert_sala_venta->save();
                    $arrayInventarioSalaVenta = [];
                }
            } else {
                $arrayInventarioSalaVenta = [];
            }

            // VERIFICAR SI LLEVA UNO O MÁS PILOTOS
            if($piloto_contrato === 'SI' && $datos_piloto === null){
                // INSERT PILOTOS
                foreach($arrayAllPilotos as $piloto){

                    $insert_piloto = new Piloto;
                    $insert_piloto->fecha_capacitacion = $piloto['fecha_cap_piloto'];
                    $insert_piloto->fecha_implementacion = $piloto['fecha_imp_piloto'];
                    $insert_piloto->fecha_retiro = $piloto['fecha_ret_piloto'];
                    $insert_piloto->direccion = $direccion_piloto;
                    $insert_piloto->estado_id = 10;
                    $insert_piloto->observacion = NULL;
                    $insert_piloto->descripcion = $observacion_piloto;
                    $insert_piloto->contrato_id = $ultimo_insert_contrato;
                    $insert_piloto->save();
                    $ultimo_insert_piloto = $insert_piloto->id;

                    // INSERT INVENTARIO PILOTO
                    foreach($piloto['inventario_piloto'] as $inv_piloto){

                        $data_inv_piloto = [];

                        $get_producto_id = (int)$inv_piloto['id'];
                        $producto = Producto::find($get_producto_id);

                        $get_tiempo_ins_hora = $producto->tiempo_instalacion_hora;
                        $get_tiempo_cap_hora = $producto->tiempo_configuracion_hora;

                        $get_cant_ins_hora = $get_tiempo_ins_hora * (int)$inv_piloto['cantidad'];
                        $cant_ins_hora = number_format((float)$get_cant_ins_hora,2,'.','');

                        $get_cant_cap_hora = $get_tiempo_cap_hora * (int)$inv_piloto['cantidad'];
                        $cant_cap_hora = number_format((float)$get_cant_cap_hora,2,'.','');

                        $get_suma_total = $cant_ins_hora + $cant_cap_hora;
                        $suma_total = number_format((float)$get_suma_total,2,'.','');

                        $data_inv_piloto[] = array(
                            "tiempo_instalacion_hora" => $cant_ins_hora,
                            "tiempo_configuracion_hora" => $cant_cap_hora,
                            "cantidad" => (int)$inv_piloto['cantidad'],
                            "total" => $suma_total,
                            "piloto_id" => $ultimo_insert_piloto,
                            "producto_id" => (int)$inv_piloto['id'],
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        Inventariopiloto::insert($data_inv_piloto);
                    }
                }
            } else {
                $arrayAllPilotos = [];
            }
            return response()->json([
                'inmobiliaria_id'           => $inmobiliaria_id,
                'proyecto_id'               => $proyecto_id,
                'nombre_proyecto'           => $nombre_proyecto,
                'total_viviendas_proyectos' => $total_viviendas_proyectos,
                'estado_proyecto'           => $estado_proyecto,
                'comuna_id'                 => $comuna_id,
                'nombre_comuna'             => $nombre_comuna,
                'direccion_proyecto'        => $direccion_proyecto,
                'mandante_proyecto'         => $mandante_proyecto,
                'rut_mandante_proyecto'     => $rut_mandante_proyecto,
                'rep_legal_proyecto'        => $rep_legal_proyecto,
                'rut_rep_legal'             => $rut_rep_legal,
                'ins_personeria_juridica'   => $ins_personeria_juridica,
                'notario_inscripcion'       => $notario_inscripcion,
                'nombre_inmobiliaria'       => $nombre_inmobiliaria,
                'mes_confeccion_contrato'   => $mes_confeccion_contrato,
                'numero_contrato'           => $numero_contrato,
                'comuna_rep_legal'          => $comuna_rep_legal,
                'region_rep_legal'          => $region_rep_legal,
                'direccion_rep_legal'       => $direccion_rep_legal,
                'num_oficina_rep_legal'     => $num_oficina_rep_legal,
                'razon_social_factura'      => $razon_social_factura,
                'giro_factura'              => $giro_factura,
                'rut_factura'               => $rut_factura,
                'direccion_factura'         => $direccion_factura,
                'encargado_finanzas'        => $encargado_finanzas,
                'email_encargado_finanzas'  => $email_encargado_finanzas,
                'email_dte'                 => $email_dte,
                'email_pdf'                 => $email_pdf,
                'fecha_esc_personeria'      => $fecha_esc_personeria,
                'notaria_esc_personeria'    => $notaria_esc_personeria,
                'nom_notario_publico'       => $nom_notario_publico,
                'pago1_fecha'               => $pago1_fecha,
                'pago2_fecha'               => $pago2_fecha,
                'pago3_fecha'               => $pago3_fecha,
                'pago4_fecha'               => $pago4_fecha,
                'pago5_fecha'               => $pago5_fecha,
                'monto_contrato'            => $monto_contrato,
                'nombre_contacto_cont'      => $nombre_contacto_cont,
                'cargo_contacto_cont'       => $cargo_contacto_cont,
                'email_contacto_cont'       => $email_contacto_cont,
                'telefono_contacto_cont'    => $telefono_contacto_cont,
                'nombre_contacto_mkt'       => $nombre_contacto_mkt,
                'cargo_contacto_mkt'        => $cargo_contacto_mkt,
                'email_contacto_mkt'        => $email_contacto_mkt,
                'nombre_agencia_externa'    => $nombre_agencia_externa,
                'link_oficial_proyecto'     => $link_oficial_proyecto,
                'sala_venta_contrato'       => $sala_venta_contrato,
                'piloto_contrato'           => $piloto_contrato,
                'stand_sala_venta'          => $stand_sala_venta,
                'domotizacion_stand'        => $domotizacion_stand,
                'fecha_imp_sala_venta'      => $fecha_imp_sala_venta,
                'fecha_cap_sala_venta'      => $fecha_cap_sala_venta,
                'fecha_ret_sala_venta'      => $fecha_ret_sala_venta,
                'comuna_piloto'             => $comuna_piloto,
                'direccion_piloto'          => $direccion_piloto,
                'cantidad_piloto'           => $cantidad_piloto,
                'observacion_piloto'        => $observacion_piloto,
                'ultimo_insert_contrato'    => $ultimo_insert_contrato,
                'arrayInventarioSalaVenta'  => $arrayInventarioSalaVenta,
                'arrayAllPilotos'           => $arrayAllPilotos,
                'resultado'                 => 0
            ]);
        } else {
            return Response::json('Contrato Duplicado');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contrato::find($id);

        //return json_decode($contrato);
        return response()->json([
            'contrato' => $contrato
        ]);

    }

    public function fechas_personalizadas($id)
    {

        $id_proyecto = Contrato::where('id', $id)->value('proyecto_id'); 
        $fechas = ProyeccionInstalacion::where('proyecto_id', $id_proyecto)->get();

        return response()->json($fechas);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $contrato = Contrato::find($id);

        return response()->json([
            'contrato' => $contrato
        ]);
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
        //Datos de la vista
        $id_contrato                = $request->input('id_contrato');
        $estado_proyecto            = $request->input('estado_proyecto');
        $proyecto_id                = $request->input('proyecto_id');
        $nombre_proyecto            = $request->input('nombre_proyecto');
        $total_viviendas_proyecto   = $request->input('total_viviendas_proyectos');
        $direccion_proyecto         = $request->input('direccion_proyecto');
        $comuna_proyecto            = $request->input('comuna_proyecto');
        $comuna_proyecto_id         = $request->input('comuna_proyecto_id');
        $numero_contrato            = $request->input('numero_contrato');
        $nombre_inmobiliaria        = $request->input('nombre_inmobiliaria');
        $mesAñoConfeccion           = $request->input('mesAñoConfeccion');
        $sala_ventas                = $request->input('sala_ventas');
        $vivienda_piloto            = $request->input('vivienda_piloto');
        $rep_legal_proyecto         = $request->input('rep_legal_proyecto');
        $rut_rep_legal              = $request->input('rut_rep_legal');
        $rep_legal_proyecto2        = $request->input('rep_legal_proyecto2');
        $rut_rep_legal2             = $request->input('rut_rep_legal2');
        $razon_social_factura       = $request->input('razon_social_factura');
        $giro_factura               = $request->input('giro_factura');
        $rut_factura                = $request->input('rut_factura');
        $direccion_factura          = $request->input('direccion_factura');
        $encargado_finanzas         = $request->input('encargado_finanzas');
        $email_encargado_finanzas   = $request->input('email_encargado_finanzas');
        $email_dte                  = $request->input('email_dte');
        $monto_contrato             = $request->input('monto_contrato');
        $fecha_pago_1               = $request->input('fecha_pago_1');
        $fecha_pago_2               = $request->input('fecha_pago_2');
        $fecha_pago_3               = $request->input('fecha_pago_3');
        $fecha_pago_4               = $request->input('fecha_pago_4');
        $fecha_pago_5               = $request->input('fecha_pago_5');
        $nombre_responsable         = $request->input('nombre_responsable');
        $cargo_rep_legal            = $request->input('cargo_rep_legal');
        $email_rep_legal            = $request->input('email_rep_legal');
        $telefono_rep_legal         = $request->input('telefono_rep_legal');
        $nombre_contacto_mkt        = $request->input('nombre_contacto_mkt');
        $cargo_contacto_mkt         = $request->input('cargo_contacto_mkt');
        $email_contacto_mkt         = $request->input('email_contacto_mkt');
        $agencia_externa            = $request->input('agencia_externa');
        $link_proyecto              = $request->input('link_proyecto');
        $notario_publico            = $request->input('notario_publico');
        $ins_personeria_juridica    = $request->input('ins_personeria_juridica');
        $fecha_inicio_instalacion   = $request->input('fecha_inicio_instalacion');
        $estado_observacion         = $request->input('estado_observacion');
        $observacion_contrato       = $request->input('observacion_contrato');
        $verificarPersonalizacion   = $request->input('verificarPersonalizacion');
        $verificarRangoPersonalizacion   = $request->input('verificarRangoPersonalizacion');
        $arrayFechasInstalaciones   = $request->input('arrayFechasInstalaciones');
        $fecha_hasta_personalizado   = $request->input('fecha_hasta_personalizado');
        $fecha_desde_personalizado   = $request->input('fecha_desde_personalizado');



        $update_contrato = Contrato::find($id);

        $update_contrato->estado_id = $estado_proyecto;
        $update_contrato->proyecto_id = $proyecto_id;
        $update_contrato->nombre_proyecto = $nombre_proyecto;
        $update_contrato->total_viviendas_proyecto = $total_viviendas_proyecto;
        $update_contrato->direccion_proyecto = $direccion_proyecto;
        $update_contrato->comuna_proyecto = $comuna_proyecto;
        $update_contrato->numero_contrato = $numero_contrato;
        $update_contrato->nombre_inmobiliaria = $nombre_inmobiliaria;
        $update_contrato->mes_confeccion_contrato = $mesAñoConfeccion;
        $update_contrato->sala_ventas = $sala_ventas;
        $update_contrato->piloto = $vivienda_piloto;
        $update_contrato->representante_legal_proyecto = $rep_legal_proyecto;
        $update_contrato->rut_rep_legal = $rut_rep_legal;
        $update_contrato->mandante_proyecto = $rep_legal_proyecto2;
        $update_contrato->rut_mandante_proyecto = $rut_rep_legal2;
        $update_contrato->razon_social = $razon_social_factura;
        $update_contrato->giro_factura = $giro_factura;
        $update_contrato->rut_factura = $rut_factura;
        $update_contrato->direccion_factura = $direccion_factura;
        $update_contrato->encargado_finanzas = $encargado_finanzas;
        $update_contrato->email_encargado_finanzas = $email_encargado_finanzas;
        $update_contrato->email_dte = $email_dte;
        $update_contrato->monto_contrato = $monto_contrato;
        $update_contrato->pago1_fecha = $fecha_pago_1;
        $update_contrato->pago2_fecha = $fecha_pago_2;
        $update_contrato->pago3_fecha = $fecha_pago_3;
        $update_contrato->fecha_probable_entrega = $fecha_inicio_instalacion;
        $update_contrato->observacion = $observacion_contrato;
        $update_contrato->estado_observacion = $estado_observacion;

        if($fecha_pago_4 == "" || $fecha_pago_4 == " "){

            $update_contrato->pago4_fecha = NULL;
            $update_contrato->pago5_fecha = NULL;

        }else{

            $update_contrato->pago4_fecha = $fecha_pago_4;
            $update_contrato->pago5_fecha = $fecha_pago_5;
        }

        $update_contrato->nombre_responsable = $nombre_responsable;
        $update_contrato->cargo_responsable = $cargo_rep_legal;
        $update_contrato->email_responsable = $email_rep_legal;
        $update_contrato->telefono_responsable = $telefono_rep_legal;
        $update_contrato->nombre_contacto_mkt = $nombre_contacto_mkt;
        $update_contrato->cargo_contacto_mkt = $cargo_contacto_mkt;
        $update_contrato->email_contacto_mkt = $email_contacto_mkt;
        $update_contrato->nombre_agencia_externa = $agencia_externa;
        $update_contrato->url_oficial_proyecto = $link_proyecto;
        $update_contrato->ins_personeria_juridica = $ins_personeria_juridica;
        $update_contrato->nombre_notario_publico = $notario_publico;
        $update_contrato->comuna_id = $comuna_proyecto_id;
        $update_contrato->fecha_probable_entrega = $update_contrato->fecha_probable_entrega;
        $update_contrato->sala_ventas_domotizacion = $update_contrato->sala_ventas_domotizacion;
        $update_contrato->comuna_piloto = $update_contrato->comuna_piloto;
        $update_contrato->notario_ins_proyecto = $update_contrato->notario_ins_proyecto;
        $update_contrato->email_pdf = $update_contrato->email_pdf;
        $update_contrato->direccion_representante_legal = $update_contrato->direccion_representante_legal;
        $update_contrato->oficina_representante_legal = $update_contrato->oficina_representante_legal;
        $update_contrato->comuna_representante_legal = $update_contrato->comuna_representante_legal;
        $update_contrato->region_representante_legal = $update_contrato->region_representante_legal;
        $update_contrato->fecha_escritura_personeria = $update_contrato->fecha_escritura_personeria;
        $update_contrato->notaria_escritura_personeria = $update_contrato->notaria_escritura_personeria;

        if(!is_null($monto_contrato)){

                if(!is_null($fecha_pago_1) && !is_null($fecha_pago_2) && !is_null($fecha_pago_3) && is_null($fecha_pago_4) && is_null($fecha_pago_5)){

                    $get_monto_10_porcentaje = $monto_contrato * 0.10;
                    $monto_10_porcentaje = number_format((float)$get_monto_10_porcentaje,2,'.','');

                    $get_monto_50_porcentaje = $monto_contrato * 0.50;
                    $monto_50_porcentaje = number_format((float)$get_monto_50_porcentaje,2,'.','');

                    $get_monto_40_porcentaje = $monto_contrato * 0.40;
                    $monto_40_porcentaje = number_format((float)$get_monto_40_porcentaje,2,'.','');

                    $update_contrato->monto_pago1 = $monto_10_porcentaje;
                    $update_contrato->monto_pago2 = $monto_50_porcentaje;
                    $update_contrato->monto_pago3 = $monto_40_porcentaje;
                    $update_contrato->monto_pago4 = NULL;
                    $update_contrato->monto_pago5 = NULL;
                } else if(!is_null($fecha_pago_1) && !is_null($fecha_pago_2) && !is_null($fecha_pago_3) && !is_null($fecha_pago_4) && !is_null($fecha_pago_5)){

                    $get_monto_10_porcentaje = $monto_contrato * 0.10;
                    $monto_10_porcentaje = number_format((float)$get_monto_10_porcentaje,2,'.','');

                    $get_monto_25_porcentaje = $monto_contrato * 0.25;
                    $monto_25_porcentaje = number_format((float)$get_monto_25_porcentaje,2,'.','');

                    $get_monto2_25_porcentaje = $monto_contrato * 0.25;
                    $monto2_25_porcentaje = number_format((float)$get_monto2_25_porcentaje,2,'.','');

                    $get_monto_20_porcentaje = $monto_contrato * 0.20;
                    $monto_20_porcentaje = number_format((float)$get_monto_20_porcentaje,2,'.','');

                    $get_monto2_20_porcentaje = $monto_contrato * 0.20;
                    $monto2_20_porcentaje = number_format((float)$get_monto2_20_porcentaje,2,'.','');

                    $update_contrato->monto_pago1 = $monto_10_porcentaje;
                    $update_contrato->monto_pago2 = $monto_25_porcentaje;
                    $update_contrato->monto_pago3 = $monto2_25_porcentaje;
                    $update_contrato->monto_pago4 = $monto_20_porcentaje;
                    $update_contrato->monto_pago5 = $monto2_20_porcentaje;
                } else {
                    $update_contrato->monto_pago1 = NULL;
                    $update_contrato->monto_pago2 = NULL;
                    $update_contrato->monto_pago3 = NULL;
                    $update_contrato->monto_pago4 = NULL;
                    $update_contrato->monto_pago5 = NULL;
                }
            } else {
                $update_contrato->monto_pago1 = NULL;
                $update_contrato->monto_pago2 = NULL;
                $update_contrato->monto_pago3 = NULL;
                $update_contrato->monto_pago4 = NULL;
                $update_contrato->monto_pago5 = NULL;
            }

            if($verificarRangoPersonalizacion == "true"){

                $validar = ProyeccionInstalacion::where('proyecto_id', $proyecto_id)->count();

                if($validar > 0){

                  $datos = ProyeccionInstalacion::where('proyecto_id',$proyecto_id)->get();

                  foreach ($datos as $dato) {
                      $dato->delete();
                  }

                }



                $period = CarbonPeriod::create($fecha_desde_personalizado, $fecha_hasta_personalizado);

                $comprobar_mes3 = '';
                $comprobar_mes4 = '';
                $count = 0;

                // Armar fechas para consulta
                foreach ($period as $date) {
                    $comprobar_mes3 = $date->format('Y-m');
                    if($comprobar_mes4 !== $comprobar_mes3){

                      $count = $count + 1;
                      $comprobar_mes4 = $date->format('Y-m');
                    }
                }

                $cant_a_instalar = intval($total_viviendas_proyecto/$count);
                $cant_restante = $total_viviendas_proyecto%$count;

                $comprobar_mes1 = '';
                $comprobar_mes2 = '';
                $array_fechas = [];


                foreach ($period as $date) {
                    $comprobar_mes1 = $date->format('Y-m');
                    if($comprobar_mes2 !== $comprobar_mes1){

                      $array_fechas[] = array(
                          "proyecto_id" => $proyecto_id,
                          "mes_annio_instalacion" => Carbon::parse($date)->format('m-20y'),
                          "cantidad_instalacion" => $cant_a_instalar,
                          'created_at' => date('Y-m-d H:i:s'),
                          'updated_at' => date('Y-m-d H:i:s')
                        );
                        $comprobar_mes2 = $date->format('Y-m');
                    }
                }

                $contador_array = 0;
                while ($cant_restante > 0){

                  if($contador_array <= count($array_fechas) - 1){

                    $array_fechas[$contador_array]["cantidad_instalacion"]= $cant_a_instalar+1;
                    $cant_restante = $cant_restante -1;
                    $contador_array = $contador_array + 1;

                  }else{

                    $contador_array = 0;

                  }

                }



                foreach ($array_fechas as $dato ) {

                  $insertProyeccion = new ProyeccionInstalacion;
                  $insertProyeccion->proyecto_id = $dato['proyecto_id'];
                  $insertProyeccion->mes_annio_instalacion = $dato['mes_annio_instalacion'];
                  $insertProyeccion->cantidad_instalacion = $dato['cantidad_instalacion'];

                  $insertProyeccion->save();

                }

                $update_contrato->fecha_instalacion_personalizada = 1;

              }

              if($verificarPersonalizacion == "true"){

                $validarFechas = ProyeccionInstalacion::where('proyecto_id', $proyecto_id)->count();

                if($validarFechas > 0){

                  $datos = ProyeccionInstalacion::where('proyecto_id',$proyecto_id)->get();

                  foreach ($datos as $dato) {
                      $dato->delete();
                  }

                }

                foreach ($arrayFechasInstalaciones as $dato ) {

                  $insertProyeccion = new ProyeccionInstalacion;
                  $insertProyeccion->proyecto_id = $dato['proyecto_id'];
                  $insertProyeccion->mes_annio_instalacion = $dato['mes_annio_instalacion'];
                  $insertProyeccion->cantidad_instalacion = $dato['cantidad_instalacion'];

                  $insertProyeccion->save();

                }

                $update_contrato->fecha_instalacion_personalizada = 1;
              }


        $update_contrato->save();

        $comprobar_update = $update_contrato->save();

        if($comprobar_update){
            return response()->json([
                'resultado'                 => 0
            ]);
        } else {
            return 1;
        }
    }

    public function verSalaVentas($id)
    {
    	$contrato_sala_venta = Contrato::where('id',$id)->value('sala_ventas');

    	if($contrato_sala_venta == 'si' || $contrato_sala_venta == 'SI'){

    		$id_sala = Salaventa::where('contrato_id',$id)->value('id');

   			 //$sala = Salaventa::where('id',$id_sala)->get();

   			$fecha_implementacion = Salaventa::where('id',$id_sala)->value('fecha_implementacion');
   			$fecha_capacitacion = Salaventa::where('id',$id_sala)->value('fecha_capacitacion');
   			$fecha_retiro = Salaventa::where('id',$id_sala)->value('fecha_retiro');
   			$stand_sala = Salaventa::where('id',$id_sala)->value('stand');
   			$descripcion = Salaventa::where('id',$id_sala)->value('descripcion');
   			$contrato_id = Salaventa::where('id',$id_sala)->value('contrato_id');
            $observacion = Salaventa::where('id',$id_sala)->value('observacion');
            $estado_sala = Salaventa::where('id',$id_sala)->value('estado_id');
            $visitas = [];

            $visitas_sala = Visitasalaventa::where('sala_venta_id',$id_sala)->get();

            if(sizeof($visitas_sala) != 0){

                foreach ($visitas_sala as $visita_sala) {
                    $visitas[] = array(

                        'fecha_visita' => $visita_sala->fecha_visita,
                        'observacion' => $visita_sala->observacion,
                        'responsable' => $visita_sala->responsable

                    );
                }

            }else{

                $visitas[] = array(

                    'fecha_visita' => 0,
                    'observacion' => 0,
                    'responsable' => 0

                );

            }


   			$inventario_sala = Inventariostand::where('salaventa_id', $id_sala)->get();

   			$stand = [];

            $datos_sala_ventas = [];

   			if(sizeof($inventario_sala)!=0){

   			 	foreach ($inventario_sala as $inventario) {

   			     	$tiempo_instalacion_hora = Inventariostand::where('id',$inventario->id)->value('tiempo_instalacion_hora');
   			     	$tiempo_configuracion_hora = Inventariostand::where('id',$inventario->id)->value('tiempo_configuracion_hora');
   			     	$cantidad = Inventariostand::where('id',$inventario->id)->value('cantidad');
   			     	$total = Inventariostand::where('id',$inventario->id)->value('total');
   			     	$producto_id = Inventariostand::where('id',$inventario->id)->value('producto_id');
   			     	$producto = Producto::where('id',$producto_id)->value('producto');

   			    	$stand[] = array(

   			    	    'tiempo_instalacion_hora' => $tiempo_instalacion_hora,
   			    	    'tiempo_configuracion_hora' => $tiempo_configuracion_hora,
   			    	    'cantidad' => $cantidad,
   			    	    'total' => $total,
   			    	    'producto_id' => $producto
   			    	);
   			 	}

   			}else{

   				$stand[] = array(

                        'tiempo_instalacion_hora' => 0,
                        'tiempo_configuracion_hora' => 0,
                        'cantidad' => 0,
                        'total' => 0,
                        'producto_id' => 0

   			    	);

   			}

    	}else{

    		return 0;

    	}

        $datos_sala_ventas[] = array(
                        'fecha_implementacion' => $fecha_implementacion,
                        'fecha_capacitacion' => $fecha_capacitacion,
                        'fecha_retiro' => $fecha_retiro,
                        'stand_sala' => $stand_sala,
                        'descripcion' => $descripcion,
                        'contrato_id' => $contrato_id,
                        'estado_sala' => $estado_sala,
                        'observacion' => $observacion,
                        'id_sala' => $id_sala,
                        'inventario_sala' => $stand,
                        'visitas' => $visitas
                    );

       return $datos_sala_ventas;

    }

    public function listarPiloto($id)
    {

      $inventario_piloto = [];
      $datos_piloto = [];
      $visitas_piloto = [];
      $datos_final = [];

      $pilotos = Piloto::where('contrato_id',$id)->get();

      if(count($pilotos) == 0){

          return 0;

      }else{

          foreach ($pilotos as $piloto) {

              $datos_piloto[] = array(
                                  'id_piloto' => $piloto->id,
                                  'id_contrato' => $piloto->contrato_id,
                                  'fecha_implementacion' => $piloto->fecha_implementacion,
                                  'fecha_capacitacion' => $piloto->fecha_capacitacion,
                                  'fecha_retiro' => $piloto->fecha_retiro,
                                  'direccion' => $piloto->direccion,
                                  'descripcion' => $piloto->descripcion,
                                  'observacion' => $piloto->observacion,
                                  'estado' => $piloto->estado_id
                              );

              $inventarios = Inventariopiloto::where('piloto_id', $piloto->id)->get();

              if(count($inventarios) == 0){

                  $inventario_piloto[] = array(
                                      'tiempo_instalacion_hora' => 0,
                                      'tiempo_configuracion_hora' => 0,
                                      'cantidad' => 0,
                                      'total' => 0,
                                      'producto' => 0
                                  );
              }else{

                  foreach ($inventarios as $inventario) {

                      $producto = Producto::where('id', $inventario->producto_id)->value('producto');

                      $inventario_piloto[] = array(

                                      'tiempo_instalacion_hora' => $inventario->tiempo_instalacion_hora,
                                      'tiempo_configuracion_hora' => $inventario->tiempo_configuracion_hora,
                                      'cantidad' => $inventario->cantidad,
                                      'total' => $inventario->total,
                                      'producto' => $producto
                                  );

                  }

              }

              $visitas = Visitapiloto::where('piloto_id', $piloto->id)->get();

              if(count($visitas) == 0){

                  $visitas_piloto[] = array(

                          'fecha_visita' => 0,
                          'observacion' => 0,
                          'responsable' => 0

                      );
              }else{

                  foreach ($visitas as $visita) {

                      $visitas_piloto[] = array(

                          'fecha_visita' => $visita->fecha_visita,
                          'observacion' => $visita->observacion,
                          'responsable' => $visita->responsable

                      );

                  }

              }

              $datos_final[] = array(

                  'datos' => $datos_piloto,
                  'inventario' => $inventario_piloto,
                  'visitas' => $visitas_piloto

              );

          }

        return $datos_final;

      }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id);
        $contrato->delete();

        if ($contrato) {
            return 0;
        } else {
            return 1;
        }
    }

    public function contrato_proyecto($inmobiliaria){

        $inm_id = Inmobiliaria::where('nombre','like','%'.$inmobiliaria.'%')->value('id');

        $proyectos = Proyecto::where('inmobiliaria_id',$inm_id)->select('id','nombre')->get();

        return $proyectos;
    }

    public function editar_piloto(Request $request){

        $fecha_implementacion_piloto  = $request->input('fecha_implementacion_piloto');
        $fecha_capacitacion_piloto    = $request->input('fecha_capacitacion_piloto');
        $fecha_retiro_piloto          = $request->input('fecha_retiro_piloto');
        $direccion_piloto             = $request->input('direccion_piloto');
        $descripcion_piloto           = $request->input('descripcion_piloto');
        $contrato_id                  = $request->input('contrato_id');
        $piloto_id                    = $request->input('piloto_id');
        $estado_piloto                = $request->input('estado_piloto');
        $observacion_piloto           = $request->input('observacion_piloto');
        $arrayInventarioPiloto        = $request->input('arrayInventarioPiloto');
        $arrayVisitaPiloto            = $request->input('arrayVisitaPiloto');

        if($piloto_id == 0){

            $contrato_update = Contrato::find($contrato_id);
            $contrato_update->piloto = 'SI';
            $contrato_update->save();

            $insert_piloto = new Piloto;
            $insert_piloto->fecha_capacitacion = $fecha_capacitacion_piloto;
            $insert_piloto->fecha_implementacion = $fecha_implementacion_piloto;
            $insert_piloto->fecha_retiro = $fecha_retiro_piloto;
            $insert_piloto->direccion = $direccion_piloto;
            $insert_piloto->descripcion = $descripcion_piloto;
            $insert_piloto->estado_id = $estado_piloto;
            $insert_piloto->observacion = $observacion_piloto;
            $insert_piloto->contrato_id = $contrato_id;

            $insert_piloto->save();

            $ultimo_insert_piloto = $insert_piloto->id;


            if($arrayInventarioPiloto != ""){
                foreach($arrayInventarioPiloto as $inv_piloto){

                $data_inv_piloto = [];

                $get_producto_id = (int)$inv_piloto['id'];
                $producto = Producto::find($get_producto_id);

                $get_tiempo_ins_hora = $producto->tiempo_instalacion_hora;
                $get_tiempo_cap_hora = $producto->tiempo_configuracion_hora;

                $get_cant_ins_hora = $get_tiempo_ins_hora * (int)$inv_piloto['cantidad'];
                $cant_ins_hora = number_format((float)$get_cant_ins_hora,2,'.','');

                $get_cant_cap_hora = $get_tiempo_cap_hora * (int)$inv_piloto['cantidad'];
                $cant_cap_hora = number_format((float)$get_cant_cap_hora,2,'.','');

                $get_suma_total = $cant_ins_hora + $cant_cap_hora;
                $suma_total = number_format((float)$get_suma_total,2,'.','');

                $data_inv_piloto[] = array(
                    "tiempo_instalacion_hora" => $cant_ins_hora,
                    "tiempo_configuracion_hora" => $cant_cap_hora,
                    "cantidad" => (int)$inv_piloto['cantidad'],
                    "total" => $suma_total,
                    "piloto_id" => $ultimo_insert_piloto,
                    "producto_id" => (int)$inv_piloto['id'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                Inventariopiloto::insert($data_inv_piloto);
            }
            if($arrayVisitaPiloto != ""){

                foreach ($arrayVisitaPiloto as $data) {
                    $data_visita_piloto = [];

                    $data_visita_piloto[] = array(

                        'fecha_visita' => $data['fecha'],
                        'observacion' => $data['observacion'],
                        'responsable' => $data['responsable'],
                        'pdf_visita_piloto' => null,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'piloto_id' => $ultimo_insert_piloto

                    );
                    Visitapiloto::insert($data_visita_piloto);
                }

            }

                $comprobar = $insert_piloto->save();
            if($comprobar){
                    return 0;
                }else{
                    return 1;
                }

            }else{

                $comprobar = $insert_piloto->save();
                if($comprobar){
                    return 0;
                }else{
                    return 1;
                }

            }

        }else{

            if($arrayInventarioPiloto != ""){

                if($arrayVisitaPiloto != ""){

                    foreach ($arrayVisitaPiloto as $data) {
                        $data_visita_piloto = [];

                        $data_visita_piloto[] = array(

                            'fecha_visita' => $data['fecha'],
                            'observacion' => $data['observacion'],
                            'responsable' => $data['responsable'],
                            'pdf_visita_piloto' => null,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            'piloto_id' => $piloto_id

                        );
                        Visitapiloto::insert($data_visita_piloto);
                    }

                }

                foreach($arrayInventarioPiloto as $inv_piloto){

                $data_inv_piloto = [];

                $get_producto_id = (int)$inv_piloto['id'];
                $producto = Producto::find($get_producto_id);

                $get_tiempo_ins_hora = $producto->tiempo_instalacion_hora;
                $get_tiempo_cap_hora = $producto->tiempo_configuracion_hora;

                $get_cant_ins_hora = $get_tiempo_ins_hora * (int)$inv_piloto['cantidad'];
                $cant_ins_hora = number_format((float)$get_cant_ins_hora,2,'.','');

                $get_cant_cap_hora = $get_tiempo_cap_hora * (int)$inv_piloto['cantidad'];
                $cant_cap_hora = number_format((float)$get_cant_cap_hora,2,'.','');

                $get_suma_total = $cant_ins_hora + $cant_cap_hora;
                $suma_total = number_format((float)$get_suma_total,2,'.','');

                $data_inv_piloto[] = array(
                    "tiempo_instalacion_hora" => $cant_ins_hora,
                    "tiempo_configuracion_hora" => $cant_cap_hora,
                    "cantidad" => (int)$inv_piloto['cantidad'],
                    "total" => $suma_total,
                    "piloto_id" => $piloto_id,
                    "producto_id" => (int)$inv_piloto['id'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                    Inventariopiloto::insert($data_inv_piloto);
                }

                $update_piloto = Piloto::find($piloto_id);
                $update_piloto->fecha_implementacion = $fecha_implementacion_piloto;
                $update_piloto->fecha_capacitacion = $fecha_capacitacion_piloto;
                $update_piloto->fecha_retiro = $fecha_retiro_piloto;
                $update_piloto->observacion = $observacion_piloto;
                $update_piloto->estado_id = $estado_piloto;
                $update_piloto->direccion = $direccion_piloto;
                $update_piloto->descripcion = $descripcion_piloto;

                $comprobar = $update_piloto->save();

                if($comprobar){

                    return 0;

                }else{

                    return 2;

                }

            }else{

                $update_piloto = Piloto::find($piloto_id);
                $update_piloto->fecha_implementacion = $fecha_implementacion_piloto;
                $update_piloto->fecha_capacitacion = $fecha_capacitacion_piloto;
                $update_piloto->fecha_retiro = $fecha_retiro_piloto;
                $update_piloto->observacion = $observacion_piloto;
                $update_piloto->estado_id = $estado_piloto;
                $update_piloto->direccion = $direccion_piloto;
                $update_piloto->descripcion = $descripcion_piloto;

                    if($arrayVisitaPiloto != ""){

                        foreach ($arrayVisitaPiloto as $data) {
                            $data_visita_piloto = [];

                            $data_visita_piloto[] = array(

                                'fecha_visita' => $data['fecha'],
                                'observacion' => $data['observacion'],
                                'responsable' => $data['responsable'],
                                'pdf_visita_piloto' => null,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                                'piloto_id' => $piloto_id

                            );
                            Visitapiloto::insert($data_visita_piloto);
                        }

                    }

                $comprobar = $update_piloto->save();

                if($comprobar){

                    return 0;

                }else{

                    return 3;

                }

            }

        }

    }

    public function contratos_piloto_sala_estados($pais){


      	$contratos_estados = [];

      	if($pais == 0){

      	    $contratos_id = Contrato::orderBy('nombre_inmobiliaria', 'asc')->where('estado_id', 6 )->select('id')->get();

      	}else{

      	   $contratos_id = Contrato::join('comunas', 'contratos.comuna_id', 'comunas.id')
      	                        ->join('ciudades', 'comunas.ciudad_id', 'ciudades.id')
      	                        ->join('regiones','ciudades.region_id', 'regiones.id')
      	                        ->join('paises' , 'regiones.pais_id', 'paises.id')
      	                        ->where('paises.id', $pais)
      	                        ->where('estado_id', 6 )
      	                        ->orderBy('nombre_inmobiliaria', 'asc')
      	                        ->select('contratos.id as id')->get();

      	}

     	foreach ($contratos_id as $contrato_id) {

     		$contrato = Contrato::find($contrato_id['id']);

     	    $estado_piloto = Piloto::where('contrato_id',$contrato_id)->value('estado_id');
     	    $estado_sala = Salaventa::where('contrato_id', $contrato_id)->value('estado_id');

     	    $contratos_estados[] = array(

     	                'id_contrato' => $contrato->id,
     	                'nombre_inmobiliaria' => $contrato->nombre_inmobiliaria,
     	                'nombre_proyecto' => $contrato->nombre_proyecto,
     	                'sala_ventas' => $contrato->sala_ventas,
     	                'piloto' => $contrato->piloto,
     	                'direccion_proyecto' => $contrato->direccion_proyecto,
     	                'estado_piloto' => $estado_piloto,
     	                'estado_sala' => $estado_sala,
     	                'estado_contrato' => $contrato->estado_observacion,
     	                'estado_mkt' => $contrato->estado_mkt,
     	                'estado_at' => $contrato->estado_at,
     	                'estado_finanza' => $contrato->estado_finanza,
     	                'estado_comercial' => $contrato->estado_comercial
     	            );

     	}
     	return $contratos_estados;

    }

    public function eliminar_inventario_sala($id){


        $productos = Inventariostand::where('salaventa_id',$id)->get();

        foreach ($productos as $producto) {
            $producto->delete();
        }

        if($producto){
            return 1;
        }else{
            return 0;
        }

    }

    public function eliminar_inventario_piloto($id){


        $productos = Inventariopiloto::where('piloto_id',$id)->get();

        foreach ($productos as $producto) {
            $producto->delete();
        }

        if($producto){
            return 1;
        }else{
            return 0;
        }

    }

    public function editar_sala_venta(Request $request){

        //Datos de la vista
          $arrayInventarioSalaVenta           = $request->input('arrayInventarioSalaVenta');
          $arrayVisitaSalaVenta               = $request->input('arrayVisitaSalaVenta');
          $id_sala_venta                      = $request->input('id_sala');
          $fecha_implementacion_sala_ventas   = $request->input('fecha_implementacion_sala_ventas');
          $fecha_retiro_sala_ventas           = $request->input('fecha_retiro_sala_ventas');
          $fecha_capacitacion_sala_ventas     = $request->input('fecha_capacitacion_sala_ventas');
          $stand_sala_ventas                  = $request->input('stand_sala_ventas');
          $descripcion                        = $request->input('descripcion');
          $estado_sala                        = $request->input('estado_sala');
          $observacion_sala                   = $request->input('observacion_sala');
          $contrato_id                        = $request->input('id_contrato');

          if($id_sala_venta == 0){


            if($arrayInventarioSalaVenta != ""){


                $contrato_update = Contrato::find($contrato_id);
                $contrato_update->sala_ventas = 'SI';
                $contrato_update->sala_ventas_domotizacion = 'SI';
                $contrato_update->save();
                $insert_sala_venta = new Salaventa;
                $insert_sala_venta->fecha_implementacion = $fecha_implementacion_sala_ventas;
                $insert_sala_venta->fecha_capacitacion = $fecha_capacitacion_sala_ventas;
                $insert_sala_venta->fecha_retiro = $fecha_retiro_sala_ventas;
                $insert_sala_venta->stand = 'SI';
                $insert_sala_venta->descripcion = NULL;
                $insert_sala_venta->estado_id = $estado_sala;
                $insert_sala_venta->observacion = $observacion_sala;
                $insert_sala_venta->contrato_id = $contrato_id;
                $insert_sala_venta->save();

                $ultimo_insert_sala_venta = $insert_sala_venta->id;

                if($arrayVisitaSalaVenta != ""){

                    foreach ($arrayVisitaSalaVenta as $data) {
                        $data_visita_sala = [];

                        $data_visita_sala[] = array(

                            'fecha_visita' => $data['fecha'],
                            'observacion' => $data['observacion'],
                            'responsable' => $data['responsable'],
                            'pdf_visita_sala_venta' => null,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            'sala_venta_id' => $ultimo_insert_sala_venta

                        );
                        Visitasalaventa::insert($data_visita_sala);
                    }

                }

                foreach($arrayInventarioSalaVenta as $sala_venta){
                     $data_sala_venta = [];

                     $get_producto_id = (int)$sala_venta['id'];
                     $producto = Producto::find($get_producto_id);

                     $get_tiempo_ins_hora = $producto->tiempo_instalacion_hora;
                     $get_tiempo_cap_hora = $producto->tiempo_configuracion_hora;

                     $get_cant_ins_hora = $get_tiempo_ins_hora * (int)$sala_venta['cantidad'];
                     $cant_ins_hora = number_format((float)$get_cant_ins_hora,2,'.','');

                     $get_cant_cap_hora = $get_tiempo_cap_hora * (int)$sala_venta['cantidad'];
                     $cant_cap_hora = number_format((float)$get_cant_cap_hora,2,'.','');

                     $get_suma_total = $cant_ins_hora + $cant_cap_hora;
                     $suma_total = number_format((float)$get_suma_total,2,'.','');

                     $data_sala_venta[] = array(
                         "tiempo_instalacion_hora" => $cant_ins_hora,
                         "tiempo_configuracion_hora" => $cant_cap_hora,
                         "cantidad" => (int)$sala_venta['cantidad'],
                         "total" => $suma_total,
                         "salaventa_id" => $ultimo_insert_sala_venta,
                         "producto_id" => (int)$sala_venta['id'],
                         'created_at' => date('Y-m-d H:i:s'),
                         'updated_at' => date('Y-m-d H:i:s')
                     );
                     Inventariostand::insert($data_sala_venta);
                 }

                 if($insert_sala_venta->save()){

                    return 3;

                 }else{

                    return 1;

                 }

            }else{

                $contrato_update = Contrato::find($contrato_id);
                $contrato_update->sala_ventas = 'SI';
                $contrato_update->sala_ventas_domotizacion = 'NO';
                $contrato_update->save();
                $insert_sala_venta = new Salaventa;
                $insert_sala_venta->fecha_implementacion = $fecha_implementacion_sala_ventas;
                $insert_sala_venta->fecha_capacitacion = $fecha_capacitacion_sala_ventas;
                $insert_sala_venta->fecha_retiro = $fecha_retiro_sala_ventas;
                $insert_sala_venta->stand = 'NO';
                $insert_sala_venta->descripcion = NULL;
                $insert_sala_venta->estado_id = $estado_sala;
                $insert_sala_venta->observacion = $observacion_sala;
                $insert_sala_venta->contrato_id = $contrato_id;
                $insert_sala_venta->save();
                $ultimo_insert_sala_venta = $insert_sala_venta->id;

                if($arrayVisitaSalaVenta != ""){

                    foreach ($arrayVisitaSalaVenta as $data) {
                        $data_visita_sala = [];

                        $data_visita_sala[] = array(

                            'fecha_visita' => $data['fecha'],
                            'observacion' => $data['observacion'],
                            'responsable' => $data['responsable'],
                            'pdf_visita_sala_venta' => null,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            'sala_venta_id' => $ultimo_insert_sala_venta

                        );

                        Visitasalaventa::insert($data_visita_sala);

                    }



                }

                if($insert_sala_venta->save()){

                    return 3;

                }else{

                    return 1;

                }

            }

          }else{

            $update_salaVenta = Salaventa::find($id_sala_venta);
            $update_salaVenta->fecha_implementacion = $fecha_implementacion_sala_ventas;
            $update_salaVenta->fecha_capacitacion   = $fecha_capacitacion_sala_ventas;
            $update_salaVenta->fecha_retiro         = $fecha_retiro_sala_ventas;
            $update_salaVenta->descripcion          = $descripcion;
            $update_salaVenta->estado_id            = $estado_sala;
            $update_salaVenta->observacion          = $observacion_sala;
            $contrato_id2                           = $update_salaVenta->contrato_id;

                if($arrayVisitaSalaVenta != ""){

                    foreach ($arrayVisitaSalaVenta as $data) {
                        $data_visita_sala = [];

                        $data_visita_sala[] = array(

                            'fecha_visita' => $data['fecha'],
                            'observacion' => $data['observacion'],
                            'responsable' => $data['responsable'],
                            'pdf_visita_sala_venta' => null,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            'sala_venta_id' => $id_sala_venta

                        );
                        Visitasalaventa::insert($data_visita_sala);
                    }

                }

            if($arrayInventarioSalaVenta != ""){

                 foreach($arrayInventarioSalaVenta as $sala_venta){
                     $data_sala_venta = [];

                     $get_producto_id = (int)$sala_venta['id'];
                     $producto = Producto::find($get_producto_id);

                     $get_tiempo_ins_hora = $producto->tiempo_instalacion_hora;
                     $get_tiempo_cap_hora = $producto->tiempo_configuracion_hora;

                     $get_cant_ins_hora = $get_tiempo_ins_hora * (int)$sala_venta['cantidad'];
                     $cant_ins_hora = number_format((float)$get_cant_ins_hora,2,'.','');

                     $get_cant_cap_hora = $get_tiempo_cap_hora * (int)$sala_venta['cantidad'];
                     $cant_cap_hora = number_format((float)$get_cant_cap_hora,2,'.','');

                     $get_suma_total = $cant_ins_hora + $cant_cap_hora;
                     $suma_total = number_format((float)$get_suma_total,2,'.','');

                     $data_sala_venta[] = array(
                         "tiempo_instalacion_hora" => $cant_ins_hora,
                         "tiempo_configuracion_hora" => $cant_cap_hora,
                         "cantidad" => (int)$sala_venta['cantidad'],
                         "total" => $suma_total,
                         "salaventa_id" => $id_sala_venta,
                         "producto_id" => (int)$sala_venta['id'],
                         'created_at' => date('Y-m-d H:i:s'),
                         'updated_at' => date('Y-m-d H:i:s')
                     );
                     Inventariostand::insert($data_sala_venta);
                 }

                 $standDomotizado = Contrato::find($contrato_id2);
                 $standDomotizado->sala_ventas_domotizacion = 'SI';
                 $standDomotizado->save();
                 $contrato_sala_venta = Contrato::find($contrato_id2);
                 $contrato_sala_venta->sala_ventas = 'SI';
                 $update_salaVenta->stand      = 'SI';
                 $update_salaVenta->save();

                 $comprobar_update = $update_salaVenta->save();

                 if($comprobar_update){
                     return 2;
                 } else {
                     return 1;
                 }

            }else{



                $update_salaVenta->save();

                $comprobar_update = $update_salaVenta->save();

                if($comprobar_update){
                    return 0;
                } else {
                    return 1;
                }

            }

        }
    }

    public function agregarComentariosMkt(Request $request){

        $array_comentario_mkt = $request->input('arrayComentarioMkt');
        $estado_mkt = $request->input('estado_id');
        $contrato_id = $request->input('contrato_id');

        if($array_comentario_mkt != ""){

            foreach ($array_comentario_mkt as $comentario) {
                $data_comentarios = [];

                $data_comentarios[] = array(
                    "fecha_observacion" => $comentario['fecha'],
                    "responsable" => $comentario['responsable'],
                    "observacion" => $comentario['observacion'],
                    "contrato_id" => $contrato_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                Comentariomkt::insert($data_comentarios);
            }
            Contrato::where('id', $contrato_id)->update(['estado_mkt' => $estado_mkt]);

            return 1;

        }else{

            Contrato::where('id', $contrato_id)->update(['estado_mkt' => $estado_mkt]);

            return 0;

        }

    }

    public function agregarComentariosComercial(Request $request){

        $array_comentario_comercial = $request->input('arrayComentarioComercial');
        $estado_comercial = $request->input('estado_id');
        $contrato_id = $request->input('contrato_id');

        if($array_comentario_comercial != ""){

            foreach ($array_comentario_comercial as $comentario) {
                $data_comentarios = [];

                $data_comentarios[] = array(
                    "fecha_observacion" => $comentario['fecha'],
                    "responsable" => $comentario['responsable'],
                    "observacion" => $comentario['observacion'],
                    "contrato_id" => $contrato_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                Comentariocomercial::insert($data_comentarios);
            }
            Contrato::where('id', $contrato_id)->update(['estado_comercial' => $estado_comercial]);

            return 1;

        }else{

            Contrato::where('id', $contrato_id)->update(['estado_comercial' => $estado_comercial]);

            return 0;

        }

    }

    public function agregarComentariosAT(Request $request){

        $array_comentario_at = $request->input('arrayComentarioAT');
        $estado_at = $request->input('estado_id');
        $contrato_id = $request->input('contrato_id');

        if($array_comentario_at != ""){

            foreach ($array_comentario_at as $comentario) {
                $data_comentarios = [];

                $data_comentarios[] = array(
                    "fecha_observacion" => $comentario['fecha'],
                    "responsable" => $comentario['responsable'],
                    "observacion" => $comentario['observacion'],
                    "contrato_id" => $contrato_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                Comentarioat::insert($data_comentarios);
            }
            Contrato::where('id', $contrato_id)->update(['estado_at' => $estado_at]);

            return 1;

        }else{

            Contrato::where('id', $contrato_id)->update(['estado_at' => $estado_at]);

            return 0;

        }

    }

    public function agregarComentariosFinanza(Request $request){

        $array_comentario_finanza = $request->input('arrayComentarioFinanza');
        $estado_finanza = $request->input('estado_id');
        $contrato_id = $request->input('contrato_id');

        if($array_comentario_finanza != ""){

            $data_comentarios = [];

            foreach ($array_comentario_finanza as $comentario) {

                $data_comentarios[] = array(
                    "fecha_observacion" => $comentario['fecha'],
                    "responsable" => $comentario['responsable'],
                    "observacion" => $comentario['observacion'],
                    "contrato_id" => $contrato_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                Comentariofinanza::insert($data_comentarios);
            }
            Contrato::where('id', $contrato_id)->update(['estado_finanza' => $estado_finanza]);

            return 1;

        }else{

            Contrato::where('id', $contrato_id)->update(['estado_finanza' => $estado_finanza]);

            return 0;

        }

    }
    public function ver_comentarios_finanza($id){

        $comentarios = Comentariofinanza::where('contrato_id', $id)->get();
        $contrato = Contrato::find($id);

        $estado = $contrato->estado_finanza;

        $data_comentario = [];

        if($comentarios != ""){

            foreach ($comentarios as $comentario) {

                $data_comentario[] = array(

                    'id' => $comentario->id,
                    'estado' => $estado,
                    'fecha_observacion' => $comentario->fecha_observacion,
                    'observacion' => $comentario->observacion,
                    'responsable' => $comentario->responsable

                );

            }

        return $data_comentario;

        }else{

            return 0;
        }


    }


    public function ver_comentarios_mkt($id){

        $comentarios = Comentariomkt::where('contrato_id', $id)->get();
        $contrato = Contrato::find($id);

        $estado = $contrato->estado_mkt;

        $data_comentario = [];

        if($comentarios != ""){

            foreach ($comentarios as $comentario) {

                $data_comentario[] = array(

                    'id' => $comentario->id,
                    'estado' => $estado,
                    'fecha_observacion' => $comentario->fecha_observacion,
                    'observacion' => $comentario->observacion,
                    'responsable' => $comentario->responsable

                );

            }

        return $data_comentario;

        }else{

            return 0;
        }


    }

    public function ver_comentarios_at($id){

        $comentarios = Comentarioat::where('contrato_id', $id)->get();
        $contrato = Contrato::find($id);

        $estado = $contrato->estado_at;

        $data_comentario = [];

        if($comentarios != ""){

            foreach ($comentarios as $comentario) {

                $data_comentario[] = array(

                    'id' => $comentario->id,
                    'estado' => $estado,
                    'fecha_observacion' => $comentario->fecha_observacion,
                    'observacion' => $comentario->observacion,
                    'responsable' => $comentario->responsable

                );

            }

            return $data_comentario;

        }else{

            return 0;

        }

    }

}
