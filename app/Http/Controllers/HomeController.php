<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmobiliaria;
use App\Proyecto;
use App\Cliente;
use App\Estado;
use App\Inventario;
use App\Producto;
use App\Pdfprotocoloscliente;
use App\Instalador;
use App\Historicoestadocliente;
use Mail;
use Response;
use Session;
use Excel;
use File;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fecha_minima_instalacion = Proyecto::min('fecha_inicio_instalacion');
        $fecha_maxima_instalacion = Proyecto::max('fecha_termino_instalacion');
        $fecha_minima_instalacion_cliente = Cliente::min('fecha_instalacion');
        $fecha_mayor_instalacion_cliente = Cliente::max('fecha_instalacion');
        $proyecto_fecha_minima = Proyecto::where('fecha_inicio_instalacion',$fecha_minima_instalacion)->get();
        $proyecto_fecha_maxima = Proyecto::where('fecha_termino_instalacion',$fecha_maxima_instalacion)->select('nombre')->get();
        $suma_total_viviendas = Proyecto::sum('cantidad');
        $clientes_ins = Cliente::where('estado_id', 3)->count();
        $clientes_ins_cap = Cliente::where('estado_id', 8)->count();
        $total_clientes_ins_cap = $clientes_ins + $clientes_ins_cap; 
        $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();
        $datos_inventario_proyecto = [];
        $total_proyectos = Proyecto::count();

        foreach($inmobiliarias as $inmobiliaria){
            $inmobiliaria_id = $inmobiliaria->id;
            $proyectos = Proyecto::where('inmobiliaria_id', $inmobiliaria_id)->orderBy('nombre', 'asc')->get();

            foreach($proyectos as $proyecto){

                $count_clientes_ins = Cliente::where('proyecto_id', $proyecto->id)->where('estado_id', 3)->count();
                $count_clientes_ins_cap = Cliente::where('proyecto_id', $proyecto->id)->where('estado_id', 8)->count(); 
                $total_clientes = $count_clientes_ins + $count_clientes_ins_cap;

                $count_inventarios_proyecto = Inventario::where('proyecto_id', $proyecto->id)->count();
                $inventarios_proyecto = Inventario::where('proyecto_id', $proyecto->id)->get();
                
                foreach($inventarios_proyecto as $inventario){

                    $producto_id = $inventario->producto_id;
                    $producto = Producto::find($producto_id);
                    $nombre_producto = $producto->producto;
                    $cantidad_producto = $inventario->cantidad;
                    

                    if($proyecto->cantidad === null){
                        $resto_productos_por_instalar = ($total_clientes - 0) * $inventario->cantidad; 
                        $datos_inventario_proyecto[] = array(
                            "nombre_inmobiliaria" => $inmobiliaria->nombre,
                            "nombre_proyecto" => $proyecto->nombre,
                            "fecha_inicio_instalacion" => $proyecto->fecha_inicio_instalacion,
                            "fecha_termino_instalacion" => $proyecto->fecha_termino_instalacion,
                            "cantidad_viviendas" => 0, 
                            "count_clientes_ins" => $count_clientes_ins,
                            "count_clientes_ins_cap" => $count_clientes_ins_cap,
                            "total_clientes" => $total_clientes,
                            "count_inventario_proyecto" => $count_inventarios_proyecto,
                            "producto_id" => $producto_id,
                            "nombre_producto" => $nombre_producto,
                            "cantidad_producto" => $cantidad_producto,
                            "resto_productos_por_instalar" => $resto_productos_por_instalar
                        );
                    } else {
                        $resto_productos_por_instalar = ($proyecto->cantidad - $total_clientes) * $inventario->cantidad;
                        $datos_inventario_proyecto[] = array(
                            "nombre_inmobiliaria" => $inmobiliaria->nombre,
                            "nombre_proyecto" => $proyecto->nombre,
                            "fecha_inicio_instalacion" => $proyecto->fecha_inicio_instalacion,
                            "fecha_termino_instalacion" => $proyecto->fecha_termino_instalacion,
                            "cantidad_viviendas" => $proyecto->cantidad, 
                            "count_clientes_ins" => $count_clientes_ins,
                            "count_clientes_ins_cap" => $count_clientes_ins_cap,
                            "total_clientes" => $total_clientes,
                            "count_inventario_proyecto" => $count_inventarios_proyecto,
                            "producto_id" => $producto_id,
                            "nombre_producto" => $nombre_producto,
                            "cantidad_producto" => $cantidad_producto,
                            "resto_productos_por_instalar" => $resto_productos_por_instalar
                        );
                    }
                } 
            }
        }
        //

        $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();



        //Total proyectos activos
        $totalContactados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
        					->where('clientes.estado_id', 1)
        					->where('proyectos.estado_id', 6)
        					->count();

       	$totalNoContactados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
        					->where('clientes.estado_id', 2)
        					->where('proyectos.estado_id', 6)
        					->count();

        $totalInstalados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
        					->where('clientes.estado_id', 3)
        					->where('proyectos.estado_id', 6)
        					->count();

        $totalAgendados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
        					->where('clientes.estado_id', 4)
        					->where('proyectos.estado_id', 6)
        					->count();

        $totalSinInformacion = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
        					->where('clientes.estado_id', 5)
        					->where('proyectos.estado_id', 6)
        					->count();

        $totalCapacitados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
        					->where('clientes.estado_id', 9)
        					->where('proyectos.estado_id', 6)
        					->count();

        $totalPendientes = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $totalInstaladosCapacitados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto varas gallardo
        $proyecto_varas_gallardo_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 5)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_varas_gallardo_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 5)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_varas_gallardo_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 5)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_varas_gallardo_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 5)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_varas_gallardo_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 5)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_varas_gallardo_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 5)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_varas_gallardo_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 5)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_varas_gallardo_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 5)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto bosque real
        $proyecto_bosque_real_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 17)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_bosque_real_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 17)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bosque_real_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 17)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bosque_real_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 17)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bosque_real_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 17)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bosque_real_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 17)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bosque_real_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 17)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bosque_real_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 17)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto condominio el rincon
        $proyecto_condominio_elrincon_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 16)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condominio_elrincon_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 16)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condominio_elrincon_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 16)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condominio_elrincon_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 16)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condominio_elrincon_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 16)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condominio_elrincon_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 16)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condominio_elrincon_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 16)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condominio_elrincon_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 16)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto parque garcia de la huerta
        $proyecto_parque_garcia_huerta_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 11)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parque_garcia_huerta_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 11)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parque_garcia_huerta_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 11)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parque_garcia_huerta_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 11)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parque_garcia_huerta_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 11)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parque_garcia_huerta_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 11)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parque_garcia_huerta_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 11)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parque_garcia_huerta_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 11)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto los alerces y jazmines
        $proyecto_los_alerces_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 15)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_los_alerces_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 15)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_los_alerces_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 15)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_los_alerces_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 15)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_los_alerces_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 15)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_los_alerces_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 15)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_los_alerces_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 15)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();                    

        $proyecto_los_alerces_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 15)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Claros de Rauquén
        $proyecto_claros_rauquen_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 49)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_claros_rauquen_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 49)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_claros_rauquen_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 49)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_claros_rauquen_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 49)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_claros_rauquen_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 49)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_claros_rauquen_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 49)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_claros_rauquen_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 49)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();                      

        $proyecto_claros_rauquen_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 49)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Cubica Marbella
        $proyecto_cubica_marbella_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 43)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_cubica_marbella_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 43)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_cubica_marbella_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 43)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_cubica_marbella_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 43)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_cubica_marbella_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 43)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_cubica_marbella_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 43)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_cubica_marbella_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 43)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count(); 

        $proyecto_cubica_marbella_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 43)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Portal el Candíl
        $proyecto_portal_candil_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 45)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_portal_candil_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 45)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_portal_candil_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 45)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_portal_candil_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 45)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_portal_candil_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 45)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_portal_candil_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 45)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_portal_candil_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 45)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count(); 

        $proyecto_portal_candil_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 45)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Edificio Porta Latadía
        $proyecto_porta_latadia_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 31)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_porta_latadia_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 31)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_porta_latadia_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 31)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_porta_latadia_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 31)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_porta_latadia_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 31)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_porta_latadia_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 31)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_porta_latadia_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 31)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count(); 

        $proyecto_porta_latadia_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 31)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Back+Office Bussiness Park
        $proyecto_back_office_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 27)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_back_office_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 27)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 27)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 27)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 27)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 27)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 27)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 27)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Back+Office Bussiness Park
        $proyecto_jardines_sanDamian_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 12)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jardines_sanDamian_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 12)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardines_sanDamian_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 12)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardines_sanDamian_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 12)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardines_sanDamian_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 12)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardines_sanDamian_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 12)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardines_sanDamian_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 12)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardines_sanDamian_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 12)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Mirador de Pumalal
        $proyecto_mirador_pumalal_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 143)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_mirador_pumalal_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 143)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mirador_pumalal_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 143)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mirador_pumalal_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 143)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mirador_pumalal_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 143)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mirador_pumalal_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 143)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mirador_pumalal_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 143)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mirador_pumalal_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 143)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto URBES Viena
        $proyecto_urbes_viena_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 14)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_urbes_viena_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 14)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_urbes_viena_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 14)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_urbes_viena_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 14)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_urbes_viena_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 14)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_urbes_viena_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 14)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_urbes_viena_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 14)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_urbes_viena_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 14)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Alfred Nobel
        $proyecto_alfred_nobel_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 20)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_alfred_nobel_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 20)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_alfred_nobel_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 20)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_alfred_nobel_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 20)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_alfred_nobel_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 20)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_alfred_nobel_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 20)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_alfred_nobel_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 20)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_alfred_nobel_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 20)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto alto rucahue
        $proyecto_altoRucahue_colonial_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 1)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_altoRucahue_colonial_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 1)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altoRucahue_colonial_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 1)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altoRucahue_colonial_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 1)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altoRucahue_colonial_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 1)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altoRucahue_colonial_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 1)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altoRucahue_colonial_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 1)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altoRucahue_colonial_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 1)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Altos del Maiten Melipilla
        $proyecto_altosMaiten_melipilla_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 50)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_altosMaiten_melipilla_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 50)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosMaiten_melipilla_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 50)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosMaiten_melipilla_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 50)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosMaiten_melipilla_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 50)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosMaiten_melipilla_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 50)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosMaiten_melipilla_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 50)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosMaiten_melipilla_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 50)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Altos del Maiten Melipilla
        $proyecto_altos_raco_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 9)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_altos_raco_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 9)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altos_raco_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 9)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altos_raco_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 9)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altos_raco_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 9)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altos_raco_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 9)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altos_raco_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 9)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altos_raco_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 9)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Altos del Maiten Melipilla
        $proyecto_andes_laDehesa_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 18)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_andes_laDehesa_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 18)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andes_laDehesa_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 18)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andes_laDehesa_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 18)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andes_laDehesa_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 18)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andes_laDehesa_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 18)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andes_laDehesa_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 18)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andes_laDehesa_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 18)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Altos del Maiten Melipilla
        $proyecto_bloom_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 37)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_bloom_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 37)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bloom_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 37)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bloom_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 37)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bloom_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 37)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bloom_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 37)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bloom_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 37)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bloom_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 37)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Altos del Maiten Melipilla
        $proyecto_bordemar_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 2)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_bordemar_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 2)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bordemar_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 2)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bordemar_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 2)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bordemar_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 2)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bordemar_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 2)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bordemar_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 2)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_bordemar_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 2)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Altos del Maiten Melipilla
        $proyecto_boulevardDelMar_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 7)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_boulevardDelMar_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 7)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_boulevardDelMar_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 7)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_boulevardDelMar_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 7)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_boulevardDelMar_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 7)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_boulevardDelMar_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 7)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_boulevardDelMar_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 7)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_boulevardDelMar_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 7)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Buena Vista
        $proyecto_buenaVista_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 19)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_buenaVista_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 19)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_buenaVista_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 19)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_buenaVista_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 19)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_buenaVista_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 19)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_buenaVista_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 19)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_buenaVista_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 19)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_buenaVista_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 19)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        //Proyecto Chicureo TownHouse
        $proyecto_chicureoTown_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_chicureoTown_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_chicureoTown_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_chicureoTown_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_chicureoTown_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_chicureoTown_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_chicureoTown_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_chicureoTown_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Proyecto Edificio Italia - SAN ISIDRO
        $proyecto_edItalia_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 68)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_edItalia_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 68)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_edItalia_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 68)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_edItalia_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 68)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_edItalia_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 68)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_edItalia_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 68)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_edItalia_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 68)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();


        $proyecto_edItalia_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 68)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Condominio Plaza El Roble - ICTINOS
        $proyecto_plazaElRoble_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 4)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_plazaElRoble_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 4)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_plazaElRoble_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 4)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_plazaElRoble_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 4)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_plazaElRoble_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 4)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_plazaElRoble_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 4)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_plazaElRoble_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 4)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_plazaElRoble_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 4)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Choice - ILEBEN 
        $proyecto_choice_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 36)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_choice_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 36)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_choice_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 36)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_choice_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 36)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_choice_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 36)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_choice_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 36)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_choice_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 36)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_choice_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 36)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

         // jazzLifeEtapa1 - ILEBEN 
        $proyecto_jazzLifeEtapa1_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 40)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jazzLifeEtapa1_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 40)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa1_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 40)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa1_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 40)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa1_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 40)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa1_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 40)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa1_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 40)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa1_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 40)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // openConcept - ILEBEN 
        $proyecto_openConcept_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 39)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_openConcept_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 39)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_openConcept_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 39)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_openConcept_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 39)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_openConcept_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 39)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_openConcept_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 39)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_openConcept_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 39)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_openConcept_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 39)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // parqueLaHuasa - ILEBEN 
        $proyecto_parqueLaHuasa_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 38)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_parqueLaHuasa_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 38)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parqueLaHuasa_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 38)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parqueLaHuasa_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 38)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parqueLaHuasa_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 38)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parqueLaHuasa_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 38)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parqueLaHuasa_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 38)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_parqueLaHuasa_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 38)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // reflex - ILEBEN 
        $proyecto_reflex_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 35)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_reflex_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 35)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_reflex_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 35)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_reflex_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 35)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_reflex_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 35)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_reflex_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 35)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_reflex_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 35)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_reflex_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 35)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // MASTERPLAN | lasPircas
        $proyecto_lasPircas_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 42)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_lasPircas_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 42)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPircas_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 42)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPircas_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 42)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPircas_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 42)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPircas_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 42)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPircas_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 42)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPircas_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 42)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // REZEPKA | Back office etapa 2
        $proyecto_back_office_etapa_2_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_back_office_etapa_2_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // SECURITY | Laderas del valle primera etapa
        $proyecto_laderas_del_valle_1_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_laderas_del_valle_1_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laderas_del_valle_1_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laderas_del_valle_1_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laderas_del_valle_1_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laderas_del_valle_1_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laderas_del_valle_1_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laderas_del_valle_1_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // REZEPKA | Back office etapa 2
        $proyecto_back_office_etapa_2_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_back_office_etapa_2_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_back_office_etapa_2_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 78)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // ACTUAL | Palermo 
        $proyecto_palermo_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 73)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_palermo_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 73)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_palermo_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 73)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_palermo_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 73)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_palermo_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 73)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_palermo_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_palermo_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_palermo_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 73)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();    

        // ACTUAL | Seminario 
        $proyecto_seminario_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 72)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_seminario_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 72)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_seminario_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 72)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_seminario_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 72)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_seminario_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 72)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_seminario_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_seminario_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 70)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_seminario_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 72)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

         // ARDAC | Maderos de Abedules 
        $proyecto_maderos_de_abedules_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 23)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_maderos_de_abedules_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 23)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_maderos_de_abedules_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 23)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_maderos_de_abedules_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 23)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_maderos_de_abedules_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 23)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_maderos_de_abedules_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 23)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_maderos_de_abedules_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 23)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_maderos_de_abedules_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 23)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

         // BUROTTO  | Mitte Vitacura 
        $proyecto_mitte_vitacura_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 46)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_mitte_vitacura_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 46)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mitte_vitacura_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 46)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mitte_vitacura_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 46)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mitte_vitacura_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 46)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mitte_vitacura_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 46)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mitte_vitacura_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 46)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_mitte_vitacura_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 46)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // CISS  | Concepto andalhue 
        $proyecto_andalhue_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 33)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_andalhue_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 33)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andalhue_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 33)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andalhue_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 33)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andalhue_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 33)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andalhue_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 33)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andalhue_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 33)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andalhue_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 33)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // INMOBILIARIA GUZMAN  | Edificio balanche 2698 
        $proyecto_balanche_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 26)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_balanche_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 26)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_balanche_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 26)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_balanche_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 26)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_balanche_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 26)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_balanche_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 26)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_balanche_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 26)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_balanche_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 26)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // IPL | Patagonia Plaza Y SPA
        $proyecto_patagoniaPS_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 8)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_patagoniaPS_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 8)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_patagoniaPS_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 8)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_patagoniaPS_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 8)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_patagoniaPS_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 8)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_patagoniaPS_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 8)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_patagoniaPS_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 8)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();


        $proyecto_patagoniaPS_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 8)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

         // PENTA | Jardin Costanera A
        $proyecto_jardinA_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 53)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jardinA_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 53)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinA_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 53)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinA_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 53)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinA_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 53)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinA_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 53)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinA_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 53)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinA_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 53)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

       

        // PENTA | Jardin Costanera B
        $proyecto_jardinB_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 69)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jardinB_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 69)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinB_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 69)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinB_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 69)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinB_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 69)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinB_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 69)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinB_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 69)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinB_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 69)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // PIQUEN | Chicureo Townhouse 
        $proyecto_townhouse_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_townhouse_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_townhouse_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_townhouse_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_townhouse_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_townhouse_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_townhouse_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_townhouse_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 30)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // PLAN | Condominio reina las perdices 
        $proyecto_lasPerdices_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 97)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_lasPerdices_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 97)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPerdices_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 97)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPerdices_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 97)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPerdices_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 97)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPerdices_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 97)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPerdices_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 97)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_lasPerdices_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 97)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // REINA LAS PERDICES | Condominio reina las perdices 
        $proyecto_condLasPerdices_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 47)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_condLasPerdices_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 47)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condLasPerdices_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 47)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condLasPerdices_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 47)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condLasPerdices_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 47)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condLasPerdices_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 47)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condLasPerdices_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 47)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_condLasPerdices_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 47)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // TOWNHOUSE | Los Acacios 
        $proyecto_losAcacios_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 25)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_losAcacios_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 25)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_losAcacios_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 25)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_losAcacios_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 25)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_losAcacios_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 25)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_losAcacios_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 25)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_losAcacios_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 25)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_losAcacios_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 25)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // TOWNHOUSE | Quillay 
        $proyecto_quillay_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 24)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_quillay_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 24)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_quillay_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 24)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_quillay_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 24)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_quillay_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 24)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_quillay_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 24)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_quillay_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 24)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_quillay_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 24)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // VIVENDAS 2000 | El tirol 
        $proyecto_elTirol_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 10)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_elTirol_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 10)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_elTirol_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 10)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_elTirol_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 10)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_elTirol_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 10)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_elTirol_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 10)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_elTirol_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 10)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_elTirol_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 10)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Andes La Dehesa(>3º piso, TorreSur) | IANDES
        $proyecto_andesTorreSur_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 86)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_andesTorreSur_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 86)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesTorreSur_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 86)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesTorreSur_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 86)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesTorreSur_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 86)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesTorreSur_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 86)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesTorreSur_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 86)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesTorreSur_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 86)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Andes La Dehesa(A y B piso 2, Torre Norte y Poniente) | IANDES
        $proyecto_andesAB2NortePoniente_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 87)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_andesAB2NortePoniente_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 87)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2NortePoniente_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 87)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2NortePoniente_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 87)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2NortePoniente_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 87)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2NortePoniente_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 87)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2NortePoniente_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 87)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2NortePoniente_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 87)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Andes LA Dehesa (A y B piso 2, Torre Sur) | IANDES
        $proyecto_andesAB2TorreSur_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 88)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_andesAB2TorreSur_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 88)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2TorreSur_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 88)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2TorreSur_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 88)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2TorreSur_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 88)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2TorreSur_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 88)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2TorreSur_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 88)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesAB2TorreSur_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 88)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Andes La Dehesa (C y D piso 2, Torre Norte y Poniente) | IANDES
        $proyecto_andesCD2TorreNorPon_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 89)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_andesCD2TorreNorPon_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 89)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreNorPon_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 89)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreNorPon_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 89)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreNorPon_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 89)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreNorPon_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 89)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreNorPon_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 89)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreNorPon_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 89)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Andes La Dehesa (C y D piso 2, Torre Sur) | IANDES
        $proyecto_andesCD2TorreSur_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 90)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_andesCD2TorreSur_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 90)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreSur_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 90)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreSur_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 90)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreSur_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 90)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreSur_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 90)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreSur_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 90)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesCD2TorreSur_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 90)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Andes La Dehesa (E piso 2, Torre Norte y Poniente) | IANDES
        $proyecto_andesE2NorPon_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 91)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_andesE2NorPon_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 91)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesE2NorPon_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 91)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesE2NorPon_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 91)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesE2NorPon_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 91)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesE2NorPon_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 91)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesE2NorPon_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 91)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_andesE2NorPon_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 91)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Jazz Life Etapa 2 | ILEBEN
        $proyecto_jazzLifeEtapa2_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 124)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jazzLifeEtapa2_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 124)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa2_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 124)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa2_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 124)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa2_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 124)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa2_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 124)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa2_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 124)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa2_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 124)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Jazz Life Etapa 3 | ILEBEN
        $proyecto_jazzLifeEtapa3_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 125)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jazzLifeEtapa3_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 125)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa3_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 125)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa3_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 125)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa3_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 125)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa3_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 125)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa3_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 125)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jazzLifeEtapa3_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 125)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Viñas de Chicureo Country | INDESA
        $proyecto_vinaChicureoCountry_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 139)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_vinaChicureoCountry_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 139)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_vinaChicureoCountry_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 139)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_vinaChicureoCountry_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 139)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_vinaChicureoCountry_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 139)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_vinaChicureoCountry_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 139)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_vinaChicureoCountry_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 139)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_vinaChicureoCountry_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 139)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // ISA Pinzón | ISA
        $proyecto_isaPinzon_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 122)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_isaPinzon_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 122)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_isaPinzon_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 122)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_isaPinzon_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 122)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_isaPinzon_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 122)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_isaPinzon_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 122)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_isaPinzon_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 122)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_isaPinzon_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 122)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Altos del Maitén, Laurel Melipilla | MALPO
        $proyecto_laurelMelipilla_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 141)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_laurelMelipilla_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 141)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laurelMelipilla_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 141)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laurelMelipilla_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 141)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laurelMelipilla_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 141)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laurelMelipilla_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 141)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laurelMelipilla_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 141)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_laurelMelipilla_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 141)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Cubica Montemar | MASTERPLAN
        $proyecto_cubicaMontemar_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 44)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_cubicaMontemar_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 44)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_cubicaMontemar_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 44)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_cubicaMontemar_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 44)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_cubicaMontemar_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 44)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_cubicaMontemar_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 44)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_cubicaMontemar_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 44)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_cubicaMontemar_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 44)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Altos del Raco Etapa 9 | QUEYLEN
        $proyecto_altosRacoEtapa9_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 79)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_altosRacoEtapa9_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 79)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosRacoEtapa9_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 79)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosRacoEtapa9_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 79)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosRacoEtapa9_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 79)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosRacoEtapa9_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 79)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosRacoEtapa9_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 79)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_altosRacoEtapa9_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 79)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Jardines San Damián Etapa 2 | SECURITY
        $proyecto_sanDamianEtapa2_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 123)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_sanDamianEtapa2_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 123)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_sanDamianEtapa2_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 123)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_sanDamianEtapa2_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 123)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_sanDamianEtapa2_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 123)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_sanDamianEtapa2_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 123)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_sanDamianEtapa2_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 123)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_sanDamianEtapa2_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 123)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // JARDINES DE ANTONIO VARAS H | SINERGIA
        $proyecto_jardinesAntonioVaras_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 64)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jardinesAntonioVaras_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 64)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVaras_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 64)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVaras_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 64)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVaras_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 64)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVaras_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 64)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVaras_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 64)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVaras_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 64)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // JARDINES DE ANTONIO VARAS C | SINERGIA
        $proyecto_jardinesAntonioVarasC_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 156)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jardinesAntonioVarasC_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 156)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasC_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 156)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasC_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 156)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasC_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 156)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasC_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 156)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasC_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 156)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasC_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 156)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // JARDINES DE ANTONIO VARAS C | SINERGIA
        $proyecto_jardinesAntonioVarasD_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 153)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jardinesAntonioVarasD_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 153)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasD_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 153)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasD_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 153)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasD_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 153)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasD_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 153)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasD_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 153)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasD_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 153)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // JARDINES DE ANTONIO VARAS A/B | SINERGIA
        $proyecto_jardinesAntonioVarasAB_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 151)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jardinesAntonioVarasAB_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 151)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasAB_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 151)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasAB_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 151)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasAB_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 151)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasAB_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 151)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasAB_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 151)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasAB_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 151)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // JARDINES DE ANTONIO VARAS G | SINERGIA
        $proyecto_jardinesAntonioVarasG_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 155)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jardinesAntonioVarasG_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 155)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasG_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 155)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasG_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 155)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasG_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 155)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasG_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 155)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasG_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 155)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasG_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 155)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // JARDINES DE ANTONIO VARAS E/F | SINERGIA
        $proyecto_jardinesAntonioVarasEF_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 152)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_jardinesAntonioVarasEF_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 152)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasEF_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 152)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasEF_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 152)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasEF_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 152)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasEF_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 152)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasEF_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 152)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_jardinesAntonioVarasEF_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 152)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // General Saavedra | GRUPO ACTIVA
        $proyecto_gralSaavedra_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 114)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_gralSaavedra_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 114)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_gralSaavedra_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 114)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_gralSaavedra_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 114)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_gralSaavedra_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 114)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_gralSaavedra_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 114)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_gralSaavedra_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 114)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_gralSaavedra_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 114)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // Activa Entre Cerros | GRUPOACTIVA
        $proyecto_activaEntreCerros_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 81)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $proyecto_activaEntreCerros_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 81)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_activaEntreCerros_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 81)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_activaEntreCerros_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 81)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_activaEntreCerros_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 81)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_activaEntreCerros_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 81)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_activaEntreCerros_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 81)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $proyecto_activaEntreCerros_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 81)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        // las violetas I y II | GRUPOACTIVA
        $lasVioletas_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 32)
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();
        $lasVioletas_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 32)
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $lasVioletas_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 32)
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $lasVioletas_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 32)
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $lasVioletas_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 32)
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $lasVioletas_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 32)
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $lasVioletas_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 32)
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $lasVioletas_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.proyecto_id', 32)
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();


        // Por capacitados
        //$totalCapacitados       = Cliente::where('capacitacion', 'Capacitado')->orWhere('capacitacion', 'CAPACITADO')->count();
        //$totalNoCapacitados     = Cliente::where('capacitacion', 'No Capacitado')->orWhere('capacitacion', 'NO CAPACITADO')->count();

        return view('home2', compact('datos_inventario_proyecto'))->with('suma_total_viviendas', $suma_total_viviendas)->with('clientes_ins', $clientes_ins)->with('clientes_ins_cap', $clientes_ins_cap)->with('total_clientes_ins_cap', $total_clientes_ins_cap)->with('inmobiliarias', $inmobiliarias)->with('totalContactados', $totalContactados)->with('totalNoContactados', $totalNoContactados)->with('totalInstalados', $totalInstalados)->with('totalAgendados', $totalAgendados)->with('totalSinInformacion', $totalSinInformacion)->with('totalCapacitados', $totalCapacitados)->with('totalInstaladosCapacitados', $totalInstaladosCapacitados)->with('totalPendientes', $totalPendientes)->with('fecha_minima',$fecha_minima_instalacion)->with('fecha_maxima',$fecha_maxima_instalacion)->with('proyecto_fecha_minima',$proyecto_fecha_minima)->with('proyecto_fecha_maxima',$proyecto_fecha_maxima)->with('fecha_minima_instalacion_cliente',$fecha_minima_instalacion_cliente)->with('fecha_mayor_instalacion_cliente',$fecha_mayor_instalacion_cliente)->with('total_proyectos', $total_proyectos)
            ->with('proyecto_varas_gallardo_cap', $proyecto_varas_gallardo_cap)->with('proyecto_varas_gallardo_con', $proyecto_varas_gallardo_con)->with('proyecto_varas_gallardo_noCon', $proyecto_varas_gallardo_noCon)->with('proyecto_varas_gallardo_ins', $proyecto_varas_gallardo_ins)->with('proyecto_varas_gallardo_agen', $proyecto_varas_gallardo_agen)->with('proyecto_varas_gallardo_sin', $proyecto_varas_gallardo_sin)->with('proyecto_varas_gallardo_ins_cap', $proyecto_varas_gallardo_ins_cap)->with('proyecto_varas_gallardo_pendiente', $proyecto_varas_gallardo_pendiente)
            ->with('proyecto_bosque_real_con', $proyecto_bosque_real_con)->with('proyecto_bosque_real_noCon', $proyecto_bosque_real_noCon)->with('proyecto_bosque_real_ins', $proyecto_bosque_real_ins)->with('proyecto_bosque_real_agen', $proyecto_bosque_real_agen)->with('proyecto_bosque_real_sin', $proyecto_bosque_real_sin)->with('proyecto_bosque_real_cap', $proyecto_bosque_real_cap)->with('proyecto_bosque_real_ins_cap', $proyecto_bosque_real_ins_cap)->with('proyecto_bosque_real_pendiente', $proyecto_bosque_real_pendiente)
            ->with('proyecto_condominio_elrincon_con', $proyecto_condominio_elrincon_con)->with('proyecto_condominio_elrincon_noCon', $proyecto_condominio_elrincon_noCon)->with('proyecto_condominio_elrincon_ins', $proyecto_condominio_elrincon_ins)->with('proyecto_condominio_elrincon_agen', $proyecto_condominio_elrincon_agen)->with('proyecto_condominio_elrincon_sin', $proyecto_condominio_elrincon_sin)->with('proyecto_condominio_elrincon_cap', $proyecto_condominio_elrincon_cap)->with('proyecto_condominio_elrincon_ins_cap', $proyecto_condominio_elrincon_ins_cap)->with('proyecto_condominio_elrincon_pendiente', $proyecto_condominio_elrincon_pendiente)
            ->with('proyecto_parque_garcia_huerta_con', $proyecto_parque_garcia_huerta_con)->with('proyecto_parque_garcia_huerta_noCon', $proyecto_parque_garcia_huerta_noCon)->with('proyecto_parque_garcia_huerta_ins', $proyecto_parque_garcia_huerta_ins)->with('proyecto_parque_garcia_huerta_agen', $proyecto_parque_garcia_huerta_agen)->with('proyecto_parque_garcia_huerta_sin', $proyecto_parque_garcia_huerta_sin)->with('proyecto_parque_garcia_huerta_cap', $proyecto_parque_garcia_huerta_cap)->with('proyecto_parque_garcia_huerta_ins_cap', $proyecto_parque_garcia_huerta_ins_cap)->with('proyecto_parque_garcia_huerta_pendiente', $proyecto_parque_garcia_huerta_pendiente)
            ->with('proyecto_los_alerces_con', $proyecto_los_alerces_con)->with('proyecto_los_alerces_noCon', $proyecto_los_alerces_noCon)->with('proyecto_los_alerces_ins', $proyecto_los_alerces_ins)->with('proyecto_los_alerces_agen', $proyecto_los_alerces_agen)->with('proyecto_los_alerces_sin', $proyecto_los_alerces_sin)->with('proyecto_los_alerces_cap', $proyecto_los_alerces_cap)->with('proyecto_los_alerces_ins_cap', $proyecto_los_alerces_ins_cap)->with('proyecto_los_alerces_pendiente', $proyecto_los_alerces_pendiente)
            ->with('proyecto_claros_rauquen_con', $proyecto_claros_rauquen_con)->with('proyecto_claros_rauquen_noCon', $proyecto_claros_rauquen_noCon)->with('proyecto_claros_rauquen_ins', $proyecto_claros_rauquen_ins)->with('proyecto_claros_rauquen_agen', $proyecto_claros_rauquen_agen)->with('proyecto_claros_rauquen_sin', $proyecto_claros_rauquen_sin)->with('proyecto_claros_rauquen_cap', $proyecto_claros_rauquen_cap)->with('proyecto_claros_rauquen_ins_cap', $proyecto_claros_rauquen_ins_cap)->with('proyecto_claros_rauquen_pendiente', $proyecto_claros_rauquen_pendiente)
            ->with('proyecto_cubica_marbella_con', $proyecto_cubica_marbella_con)->with('proyecto_cubica_marbella_noCon', $proyecto_cubica_marbella_noCon)->with('proyecto_cubica_marbella_ins', $proyecto_cubica_marbella_ins)->with('proyecto_cubica_marbella_agen', $proyecto_cubica_marbella_agen)->with('proyecto_cubica_marbella_sin', $proyecto_cubica_marbella_sin)->with('proyecto_cubica_marbella_cap', $proyecto_cubica_marbella_cap)->with('proyecto_cubica_marbella_ins_cap', $proyecto_cubica_marbella_ins_cap)->with('proyecto_cubica_marbella_pendiente', $proyecto_cubica_marbella_pendiente)
            ->with('proyecto_portal_candil_con', $proyecto_portal_candil_con)->with('proyecto_portal_candil_noCon', $proyecto_portal_candil_noCon)->with('proyecto_portal_candil_ins', $proyecto_portal_candil_ins)->with('proyecto_portal_candil_agen', $proyecto_portal_candil_agen)->with('proyecto_portal_candil_sin', $proyecto_portal_candil_sin)->with('proyecto_portal_candil_cap', $proyecto_portal_candil_cap)->with('proyecto_portal_candil_ins_cap', $proyecto_portal_candil_ins_cap)->with('proyecto_portal_candil_pendiente', $proyecto_portal_candil_pendiente)
            ->with('proyecto_porta_latadia_con', $proyecto_porta_latadia_con)->with('proyecto_porta_latadia_noCon', $proyecto_porta_latadia_noCon)->with('proyecto_porta_latadia_ins', $proyecto_porta_latadia_ins)->with('proyecto_porta_latadia_agen', $proyecto_porta_latadia_agen)->with('proyecto_porta_latadia_sin', $proyecto_porta_latadia_sin)->with('proyecto_porta_latadia_cap', $proyecto_porta_latadia_cap)->with('proyecto_porta_latadia_ins_cap', $proyecto_porta_latadia_ins_cap)->with('proyecto_porta_latadia_pendiente', $proyecto_porta_latadia_pendiente)
            ->with('proyecto_back_office_con', $proyecto_back_office_con)->with('proyecto_back_office_noCon', $proyecto_back_office_noCon)->with('proyecto_back_office_ins', $proyecto_back_office_ins)->with('proyecto_back_office_agen', $proyecto_back_office_agen)->with('proyecto_back_office_sin', $proyecto_back_office_sin)->with('proyecto_back_office_cap', $proyecto_back_office_cap)->with('proyecto_back_office_ins_cap', $proyecto_back_office_ins_cap)->with('proyecto_back_office_pendiente', $proyecto_back_office_pendiente)
            ->with('proyecto_jardines_sanDamian_con', $proyecto_jardines_sanDamian_con)->with('proyecto_jardines_sanDamian_noCon', $proyecto_jardines_sanDamian_noCon)->with('proyecto_jardines_sanDamian_ins', $proyecto_jardines_sanDamian_ins)->with('proyecto_jardines_sanDamian_agen', $proyecto_jardines_sanDamian_agen)->with('proyecto_jardines_sanDamian_sin', $proyecto_jardines_sanDamian_sin)->with('proyecto_jardines_sanDamian_cap', $proyecto_jardines_sanDamian_cap)->with('proyecto_jardines_sanDamian_ins_cap', $proyecto_jardines_sanDamian_ins_cap)->with('proyecto_jardines_sanDamian_pendiente', $proyecto_jardines_sanDamian_pendiente)
            ->with('proyecto_mirador_pumalal_con', $proyecto_mirador_pumalal_con)->with('proyecto_mirador_pumalal_noCon', $proyecto_mirador_pumalal_noCon)->with('proyecto_mirador_pumalal_ins', $proyecto_mirador_pumalal_ins)->with('proyecto_mirador_pumalal_agen', $proyecto_mirador_pumalal_agen)->with('proyecto_mirador_pumalal_sin', $proyecto_mirador_pumalal_sin)->with('proyecto_mirador_pumalal_cap', $proyecto_mirador_pumalal_cap)->with('proyecto_mirador_pumalal_ins_cap', $proyecto_mirador_pumalal_ins_cap)->with('proyecto_mirador_pumalal_pendiente', $proyecto_mirador_pumalal_pendiente)
            ->with('proyecto_urbes_viena_con', $proyecto_urbes_viena_con)->with('proyecto_urbes_viena_noCon', $proyecto_urbes_viena_noCon)->with('proyecto_urbes_viena_ins', $proyecto_urbes_viena_ins)->with('proyecto_urbes_viena_agen', $proyecto_urbes_viena_agen)->with('proyecto_urbes_viena_sin', $proyecto_urbes_viena_sin)->with('proyecto_urbes_viena_cap', $proyecto_urbes_viena_cap)->with('proyecto_urbes_viena_ins_cap', $proyecto_urbes_viena_ins_cap)->with('proyecto_urbes_viena_pendiente', $proyecto_urbes_viena_pendiente)
            ->with('proyecto_alfred_nobel_con', $proyecto_alfred_nobel_con)->with('proyecto_alfred_nobel_noCon', $proyecto_alfred_nobel_noCon)->with('proyecto_alfred_nobel_ins', $proyecto_alfred_nobel_ins)->with('proyecto_alfred_nobel_agen', $proyecto_alfred_nobel_agen)->with('proyecto_alfred_nobel_sin', $proyecto_alfred_nobel_sin)->with('proyecto_alfred_nobel_cap', $proyecto_alfred_nobel_cap)->with('proyecto_alfred_nobel_ins_cap', $proyecto_alfred_nobel_ins_cap)->with('proyecto_alfred_nobel_pendiente', $proyecto_alfred_nobel_pendiente)
            ->with('proyecto_altoRucahue_colonial_con', $proyecto_altoRucahue_colonial_con)->with('proyecto_altoRucahue_colonial_noCon', $proyecto_altoRucahue_colonial_noCon)->with('proyecto_altoRucahue_colonial_ins', $proyecto_altoRucahue_colonial_ins)->with('proyecto_altoRucahue_colonial_agen', $proyecto_altoRucahue_colonial_agen)->with('proyecto_altoRucahue_colonial_sin', $proyecto_altoRucahue_colonial_sin)->with('proyecto_altoRucahue_colonial_cap', $proyecto_altoRucahue_colonial_cap)->with('proyecto_altoRucahue_colonial_ins_cap', $proyecto_altoRucahue_colonial_ins_cap)->with('proyecto_altoRucahue_colonial_pendiente', $proyecto_altoRucahue_colonial_pendiente)
            ->with('proyecto_altosMaiten_melipilla_con', $proyecto_altosMaiten_melipilla_con)->with('proyecto_altosMaiten_melipilla_noCon', $proyecto_altosMaiten_melipilla_noCon)->with('proyecto_altosMaiten_melipilla_ins', $proyecto_altosMaiten_melipilla_ins)->with('proyecto_altosMaiten_melipilla_agen', $proyecto_altosMaiten_melipilla_agen)->with('proyecto_altosMaiten_melipilla_sin', $proyecto_altosMaiten_melipilla_sin)->with('proyecto_altosMaiten_melipilla_cap', $proyecto_altosMaiten_melipilla_cap)->with('proyecto_altosMaiten_melipilla_ins_cap', $proyecto_altosMaiten_melipilla_ins_cap)->with('proyecto_altosMaiten_melipilla_pendiente', $proyecto_altosMaiten_melipilla_pendiente)
            ->with('proyecto_altos_raco_con', $proyecto_altos_raco_con)->with('proyecto_altos_raco_noCon', $proyecto_altos_raco_noCon)->with('proyecto_altos_raco_ins', $proyecto_altos_raco_ins)->with('proyecto_altos_raco_agen', $proyecto_altos_raco_agen)->with('proyecto_altos_raco_sin', $proyecto_altos_raco_sin)->with('proyecto_altos_raco_cap', $proyecto_altos_raco_cap)->with('proyecto_altos_raco_ins_cap', $proyecto_altos_raco_ins_cap)->with('proyecto_altos_raco_pendiente', $proyecto_altos_raco_pendiente)
            ->with('proyecto_andes_laDehesa_con', $proyecto_andes_laDehesa_con)->with('proyecto_andes_laDehesa_noCon', $proyecto_andes_laDehesa_noCon)->with('proyecto_andes_laDehesa_ins', $proyecto_andes_laDehesa_ins)->with('proyecto_andes_laDehesa_agen', $proyecto_andes_laDehesa_agen)->with('proyecto_andes_laDehesa_sin', $proyecto_andes_laDehesa_sin)->with('proyecto_andes_laDehesa_cap', $proyecto_andes_laDehesa_cap)->with('proyecto_andes_laDehesa_ins_cap', $proyecto_andes_laDehesa_ins_cap)->with('proyecto_andes_laDehesa_pendiente', $proyecto_andes_laDehesa_pendiente)
            ->with('proyecto_bloom_con', $proyecto_bloom_con)->with('proyecto_bloom_noCon', $proyecto_bloom_noCon)->with('proyecto_bloom_ins', $proyecto_bloom_ins)->with('proyecto_bloom_agen', $proyecto_bloom_agen)->with('proyecto_bloom_sin', $proyecto_bloom_sin)->with('proyecto_bloom_cap', $proyecto_bloom_cap)->with('proyecto_bloom_ins_cap', $proyecto_bloom_ins_cap)->with('proyecto_bloom_pendiente', $proyecto_bloom_pendiente)
            ->with('proyecto_boulevardDelMar_con', $proyecto_boulevardDelMar_con)->with('proyecto_boulevardDelMar_noCon', $proyecto_boulevardDelMar_noCon)->with('proyecto_boulevardDelMar_ins', $proyecto_boulevardDelMar_ins)->with('proyecto_boulevardDelMar_agen', $proyecto_boulevardDelMar_agen)->with('proyecto_boulevardDelMar_sin', $proyecto_boulevardDelMar_sin)->with('proyecto_boulevardDelMar_cap', $proyecto_boulevardDelMar_cap)->with('proyecto_boulevardDelMar_ins_cap', $proyecto_boulevardDelMar_ins_cap)->with('proyecto_boulevardDelMar_pendiente', $proyecto_boulevardDelMar_pendiente)
            ->with('proyecto_buenaVista_con', $proyecto_buenaVista_con)->with('proyecto_buenaVista_noCon', $proyecto_buenaVista_noCon)->with('proyecto_buenaVista_ins', $proyecto_buenaVista_ins)->with('proyecto_buenaVista_agen', $proyecto_buenaVista_agen)->with('proyecto_buenaVista_sin', $proyecto_buenaVista_sin)->with('proyecto_buenaVista_cap', $proyecto_buenaVista_cap)->with('proyecto_buenaVista_ins_cap', $proyecto_buenaVista_ins_cap)->with('proyecto_buenaVista_pendiente', $proyecto_buenaVista_pendiente)
            ->with('proyecto_chicureoTown_con', $proyecto_chicureoTown_con)->with('proyecto_chicureoTown_noCon', $proyecto_chicureoTown_noCon)->with('proyecto_chicureoTown_ins', $proyecto_chicureoTown_ins)->with('proyecto_chicureoTown_agen', $proyecto_chicureoTown_agen)->with('proyecto_chicureoTown_sin', $proyecto_chicureoTown_sin)->with('proyecto_chicureoTown_cap', $proyecto_chicureoTown_cap)->with('proyecto_chicureoTown_ins_cap', $proyecto_chicureoTown_ins_cap)->with('proyecto_chicureoTown_pendiente', $proyecto_chicureoTown_pendiente)
            ->with('proyecto_edItalia_con', $proyecto_edItalia_con)->with('proyecto_edItalia_noCon', $proyecto_edItalia_noCon)->with('proyecto_edItalia_ins', $proyecto_edItalia_ins)->with('proyecto_edItalia_agen', $proyecto_edItalia_agen)->with('proyecto_edItalia_sin', $proyecto_edItalia_sin)->with('proyecto_edItalia_cap', $proyecto_edItalia_cap)->with('proyecto_edItalia_ins_cap', $proyecto_edItalia_ins_cap)->with('proyecto_edItalia_pendiente', $proyecto_edItalia_pendiente)
            ->with('proyecto_plazaElRoble_con', $proyecto_plazaElRoble_con)->with('proyecto_plazaElRoble_noCon', $proyecto_plazaElRoble_noCon)->with('proyecto_plazaElRoble_ins', $proyecto_plazaElRoble_ins)->with('proyecto_plazaElRoble_agen', $proyecto_plazaElRoble_agen)->with('proyecto_plazaElRoble_sin', $proyecto_plazaElRoble_sin)->with('proyecto_plazaElRoble_cap', $proyecto_plazaElRoble_cap)->with('proyecto_plazaElRoble_ins_cap', $proyecto_plazaElRoble_ins_cap)->with('proyecto_plazaElRoble_pendiente', $proyecto_plazaElRoble_pendiente)
            ->with('proyecto_choice_con', $proyecto_choice_con)->with('proyecto_choice_noCon', $proyecto_choice_noCon)->with('proyecto_choice_ins', $proyecto_choice_ins)->with('proyecto_choice_agen', $proyecto_choice_agen)->with('proyecto_choice_sin', $proyecto_choice_sin)->with('proyecto_choice_cap', $proyecto_choice_cap)->with('proyecto_choice_ins_cap', $proyecto_choice_ins_cap)->with('proyecto_choice_pendiente', $proyecto_choice_pendiente)
            ->with('proyecto_jazzLifeEtapa1_con', $proyecto_jazzLifeEtapa1_con)->with('proyecto_jazzLifeEtapa1_noCon', $proyecto_jazzLifeEtapa1_noCon)->with('proyecto_jazzLifeEtapa1_ins', $proyecto_jazzLifeEtapa1_ins)->with('proyecto_jazzLifeEtapa1_agen', $proyecto_jazzLifeEtapa1_agen)->with('proyecto_jazzLifeEtapa1_sin', $proyecto_jazzLifeEtapa1_sin)->with('proyecto_jazzLifeEtapa1_cap', $proyecto_jazzLifeEtapa1_cap)->with('proyecto_jazzLifeEtapa1_ins_cap', $proyecto_jazzLifeEtapa1_ins_cap)->with('proyecto_jazzLifeEtapa1_pendiente', $proyecto_jazzLifeEtapa1_pendiente)
            ->with('proyecto_openConcept_con', $proyecto_openConcept_con)->with('proyecto_openConcept_noCon', $proyecto_openConcept_noCon)->with('proyecto_openConcept_ins', $proyecto_openConcept_ins)->with('proyecto_openConcept_agen', $proyecto_openConcept_agen)->with('proyecto_openConcept_sin', $proyecto_openConcept_sin)->with('proyecto_openConcept_cap', $proyecto_openConcept_cap)->with('proyecto_openConcept_ins_cap', $proyecto_openConcept_ins_cap)->with('proyecto_openConcept_pendiente', $proyecto_openConcept_pendiente)
            ->with('proyecto_parqueLaHuasa_con', $proyecto_parqueLaHuasa_con)->with('proyecto_parqueLaHuasa_noCon', $proyecto_parqueLaHuasa_noCon)->with('proyecto_parqueLaHuasa_ins', $proyecto_parqueLaHuasa_ins)->with('proyecto_parqueLaHuasa_agen', $proyecto_parqueLaHuasa_agen)->with('proyecto_parqueLaHuasa_sin', $proyecto_parqueLaHuasa_sin)->with('proyecto_parqueLaHuasa_cap', $proyecto_parqueLaHuasa_cap)->with('proyecto_parqueLaHuasa_ins_cap', $proyecto_parqueLaHuasa_ins_cap)->with('proyecto_parqueLaHuasa_pendiente', $proyecto_parqueLaHuasa_pendiente)
            ->with('proyecto_reflex_con', $proyecto_reflex_con)->with('proyecto_reflex_noCon', $proyecto_reflex_noCon)->with('proyecto_reflex_ins', $proyecto_reflex_ins)->with('proyecto_reflex_agen', $proyecto_reflex_agen)->with('proyecto_reflex_sin', $proyecto_reflex_sin)->with('proyecto_reflex_cap', $proyecto_reflex_cap)->with('proyecto_reflex_ins_cap', $proyecto_reflex_ins_cap)->with('proyecto_reflex_pendiente', $proyecto_reflex_pendiente)
            ->with('proyecto_lasPircas_con', $proyecto_lasPircas_con)->with('proyecto_lasPircas_noCon', $proyecto_lasPircas_noCon)->with('proyecto_lasPircas_ins', $proyecto_lasPircas_ins)->with('proyecto_lasPircas_agen', $proyecto_lasPircas_agen)->with('proyecto_lasPircas_sin', $proyecto_lasPircas_sin)->with('proyecto_lasPircas_cap', $proyecto_lasPircas_cap)->with('proyecto_lasPircas_ins_cap', $proyecto_lasPircas_ins_cap)->with('proyecto_lasPircas_pendiente', $proyecto_lasPircas_pendiente)
            ->with('proyecto_back_office_etapa_2_con', $proyecto_back_office_etapa_2_con)->with('proyecto_back_office_etapa_2_noCon', $proyecto_back_office_etapa_2_noCon)->with('proyecto_back_office_etapa_2_ins', $proyecto_back_office_etapa_2_ins)->with('proyecto_back_office_etapa_2_agen', $proyecto_back_office_etapa_2_agen)->with('proyecto_back_office_etapa_2_sin', $proyecto_back_office_etapa_2_sin)->with('proyecto_back_office_etapa_2_cap', $proyecto_back_office_etapa_2_cap)->with('proyecto_back_office_etapa_2_ins_cap', $proyecto_back_office_etapa_2_ins_cap)->with('proyecto_back_office_etapa_2_pendiente', $proyecto_back_office_etapa_2_pendiente)
            ->with('proyecto_laderas_del_valle_1_con', $proyecto_laderas_del_valle_1_con)->with('proyecto_laderas_del_valle_1_noCon', $proyecto_laderas_del_valle_1_noCon)->with('proyecto_laderas_del_valle_1_ins', $proyecto_laderas_del_valle_1_ins)->with('proyecto_laderas_del_valle_1_agen', $proyecto_laderas_del_valle_1_agen)->with('proyecto_laderas_del_valle_1_sin', $proyecto_laderas_del_valle_1_sin)->with('proyecto_laderas_del_valle_1_cap', $proyecto_laderas_del_valle_1_cap)->with('proyecto_laderas_del_valle_1_ins_cap', $proyecto_laderas_del_valle_1_ins_cap)->with('proyecto_laderas_del_valle_1_pendiente', $proyecto_laderas_del_valle_1_pendiente)
            ->with('proyecto_palermo_con', $proyecto_palermo_con)->with('proyecto_palermo_noCon', $proyecto_palermo_noCon)->with('proyecto_palermo_ins', $proyecto_palermo_ins)->with('proyecto_palermo_agen', $proyecto_palermo_agen)->with('proyecto_palermo_sin', $proyecto_palermo_sin)->with('proyecto_palermo_cap', $proyecto_palermo_cap)->with('proyecto_palermo_ins_cap', $proyecto_palermo_ins_cap)->with('proyecto_palermo_pendiente', $proyecto_palermo_pendiente)
            ->with('proyecto_seminario_con', $proyecto_seminario_con)->with('proyecto_seminario_noCon', $proyecto_seminario_noCon)->with('proyecto_seminario_ins', $proyecto_seminario_ins)->with('proyecto_seminario_agen', $proyecto_seminario_agen)->with('proyecto_seminario_sin', $proyecto_seminario_sin)->with('proyecto_seminario_cap', $proyecto_seminario_cap)->with('proyecto_seminario_ins_cap', $proyecto_seminario_ins_cap)->with('proyecto_seminario_pendiente', $proyecto_seminario_pendiente)
            ->with('proyecto_maderos_de_abedules_con', $proyecto_maderos_de_abedules_con)->with('proyecto_maderos_de_abedules_noCon', $proyecto_maderos_de_abedules_noCon)->with('proyecto_maderos_de_abedules_ins', $proyecto_maderos_de_abedules_ins)->with('proyecto_maderos_de_abedules_agen', $proyecto_maderos_de_abedules_agen)->with('proyecto_maderos_de_abedules_sin', $proyecto_maderos_de_abedules_sin)->with('proyecto_maderos_de_abedules_cap', $proyecto_maderos_de_abedules_cap)->with('proyecto_maderos_de_abedules_ins_cap', $proyecto_maderos_de_abedules_ins_cap)->with('proyecto_maderos_de_abedules_pendiente', $proyecto_maderos_de_abedules_pendiente)
           ->with('proyecto_bordemar_con', $proyecto_bordemar_con)->with('proyecto_bordemar_noCon', $proyecto_bordemar_noCon)->with('proyecto_bordemar_ins', $proyecto_bordemar_ins)->with('proyecto_bordemar_agen', $proyecto_bordemar_agen)->with('proyecto_bordemar_sin', $proyecto_bordemar_sin)->with('proyecto_bordemar_cap', $proyecto_bordemar_cap)->with('proyecto_bordemar_ins_cap', $proyecto_bordemar_ins_cap)->with('proyecto_bordemar_pendiente', $proyecto_bordemar_pendiente)
           ->with('proyecto_mitte_vitacura_con', $proyecto_mitte_vitacura_con)->with('proyecto_mitte_vitacura_noCon', $proyecto_mitte_vitacura_noCon)->with('proyecto_mitte_vitacura_ins', $proyecto_mitte_vitacura_ins)->with('proyecto_mitte_vitacura_agen', $proyecto_mitte_vitacura_agen)->with('proyecto_mitte_vitacura_sin', $proyecto_mitte_vitacura_sin)->with('proyecto_mitte_vitacura_cap', $proyecto_mitte_vitacura_cap)->with('proyecto_mitte_vitacura_ins_cap', $proyecto_mitte_vitacura_ins_cap)->with('proyecto_mitte_vitacura_pendiente', $proyecto_mitte_vitacura_pendiente)
           ->with('proyecto_andalhue_con', $proyecto_andalhue_con)->with('proyecto_andalhue_noCon', $proyecto_andalhue_noCon)->with('proyecto_andalhue_ins', $proyecto_andalhue_ins)->with('proyecto_andalhue_agen', $proyecto_andalhue_agen)->with('proyecto_andalhue_sin', $proyecto_andalhue_sin)->with('proyecto_andalhue_cap', $proyecto_andalhue_cap)->with('proyecto_andalhue_ins_cap', $proyecto_andalhue_ins_cap)->with('proyecto_andalhue_pendiente', $proyecto_andalhue_pendiente)
           ->with('proyecto_balanche_con', $proyecto_balanche_con)->with('proyecto_balanche_noCon', $proyecto_balanche_noCon)->with('proyecto_balanche_ins', $proyecto_balanche_ins)->with('proyecto_balanche_agen', $proyecto_balanche_agen)->with('proyecto_balanche_sin', $proyecto_balanche_sin)->with('proyecto_balanche_cap', $proyecto_balanche_cap)->with('proyecto_balanche_ins_cap', $proyecto_balanche_ins_cap)->with('proyecto_balanche_pendiente', $proyecto_balanche_pendiente)
            ->with('proyecto_patagoniaPS_con', $proyecto_patagoniaPS_con)->with('proyecto_patagoniaPS_noCon', $proyecto_patagoniaPS_noCon)->with('proyecto_patagoniaPS_ins', $proyecto_patagoniaPS_ins)->with('proyecto_patagoniaPS_agen', $proyecto_patagoniaPS_agen)->with('proyecto_patagoniaPS_sin', $proyecto_patagoniaPS_sin)->with('proyecto_patagoniaPS_cap', $proyecto_patagoniaPS_cap)->with('proyecto_patagoniaPS_ins_cap', $proyecto_patagoniaPS_ins_cap)->with('proyecto_patagoniaPS_pendiente', $proyecto_patagoniaPS_pendiente)
            ->with('proyecto_jardinA_con', $proyecto_jardinA_con)->with('proyecto_jardinA_noCon', $proyecto_jardinA_noCon)->with('proyecto_jardinA_ins', $proyecto_jardinA_ins)->with('proyecto_jardinA_agen', $proyecto_jardinA_agen)->with('proyecto_jardinA_sin', $proyecto_jardinA_sin)->with('proyecto_jardinA_cap', $proyecto_jardinA_cap)->with('proyecto_jardinA_ins_cap', $proyecto_jardinA_ins_cap)->with('proyecto_jardinA_pendiente', $proyecto_jardinA_pendiente)
            ->with('proyecto_jardinB_con', $proyecto_jardinB_con)->with('proyecto_jardinB_noCon', $proyecto_jardinB_noCon)->with('proyecto_jardinB_ins', $proyecto_jardinB_ins)->with('proyecto_jardinB_agen', $proyecto_jardinB_agen)->with('proyecto_jardinB_sin', $proyecto_jardinB_sin)->with('proyecto_jardinB_cap', $proyecto_jardinB_cap)->with('proyecto_jardinB_ins_cap', $proyecto_jardinB_ins_cap)->with('proyecto_jardinB_pendiente', $proyecto_jardinB_pendiente)
            ->with('proyecto_townhouse_con', $proyecto_townhouse_con)->with('proyecto_townhouse_noCon', $proyecto_townhouse_noCon)->with('proyecto_townhouse_ins', $proyecto_townhouse_ins)->with('proyecto_townhouse_agen', $proyecto_townhouse_agen)->with('proyecto_townhouse_sin', $proyecto_townhouse_sin)->with('proyecto_townhouse_cap', $proyecto_townhouse_cap)->with('proyecto_townhouse_ins_cap', $proyecto_townhouse_ins_cap)->with('proyecto_townhouse_pendiente', $proyecto_townhouse_pendiente)
            ->with('proyecto_lasPerdices_con', $proyecto_lasPerdices_con)->with('proyecto_lasPerdices_noCon', $proyecto_lasPerdices_noCon)->with('proyecto_lasPerdices_ins', $proyecto_lasPerdices_ins)->with('proyecto_lasPerdices_agen', $proyecto_lasPerdices_agen)->with('proyecto_lasPerdices_sin', $proyecto_lasPerdices_sin)->with('proyecto_lasPerdices_cap', $proyecto_lasPerdices_cap)->with('proyecto_lasPerdices_ins_cap', $proyecto_lasPerdices_ins_cap)->with('proyecto_lasPerdices_pendiente', $proyecto_lasPerdices_pendiente)
            ->with('proyecto_condLasPerdices_con', $proyecto_condLasPerdices_con)->with('proyecto_condLasPerdices_noCon', $proyecto_condLasPerdices_noCon)->with('proyecto_condLasPerdices_ins', $proyecto_condLasPerdices_ins)->with('proyecto_condLasPerdices_agen', $proyecto_condLasPerdices_agen)->with('proyecto_condLasPerdices_sin', $proyecto_condLasPerdices_sin)->with('proyecto_condLasPerdices_cap', $proyecto_condLasPerdices_cap)->with('proyecto_condLasPerdices_ins_cap', $proyecto_condLasPerdices_ins_cap)->with('proyecto_condLasPerdices_pendiente', $proyecto_condLasPerdices_pendiente)
            ->with('proyecto_losAcacios_con', $proyecto_losAcacios_con)->with('proyecto_losAcacios_noCon', $proyecto_losAcacios_noCon)->with('proyecto_losAcacios_ins', $proyecto_losAcacios_ins)->with('proyecto_losAcacios_agen', $proyecto_losAcacios_agen)->with('proyecto_losAcacios_sin', $proyecto_losAcacios_sin)->with('proyecto_losAcacios_cap', $proyecto_losAcacios_cap)->with('proyecto_losAcacios_ins_cap', $proyecto_losAcacios_ins_cap)->with('proyecto_losAcacios_pendiente', $proyecto_losAcacios_pendiente)
            ->with('proyecto_quillay_con', $proyecto_quillay_con)->with('proyecto_quillay_noCon', $proyecto_quillay_noCon)->with('proyecto_quillay_ins', $proyecto_quillay_ins)->with('proyecto_quillay_agen', $proyecto_quillay_agen)->with('proyecto_quillay_sin', $proyecto_quillay_sin)->with('proyecto_quillay_cap', $proyecto_quillay_cap)->with('proyecto_quillay_ins_cap', $proyecto_quillay_ins_cap)->with('proyecto_quillay_pendiente', $proyecto_quillay_pendiente)
            ->with('proyecto_elTirol_con', $proyecto_elTirol_con)->with('proyecto_elTirol_noCon', $proyecto_elTirol_noCon)->with('proyecto_elTirol_ins', $proyecto_elTirol_ins)->with('proyecto_elTirol_agen', $proyecto_elTirol_agen)->with('proyecto_elTirol_sin', $proyecto_elTirol_sin)->with('proyecto_elTirol_cap', $proyecto_elTirol_cap)->with('proyecto_elTirol_ins_cap', $proyecto_elTirol_ins_cap)->with('proyecto_elTirol_pendiente', $proyecto_elTirol_pendiente)
            ->with('proyecto_andesTorreSur_con', $proyecto_andesTorreSur_con)->with('proyecto_andesTorreSur_noCon', $proyecto_andesTorreSur_noCon)->with('proyecto_andesTorreSur_ins', $proyecto_andesTorreSur_ins)->with('proyecto_andesTorreSur_agen', $proyecto_andesTorreSur_agen)->with('proyecto_andesTorreSur_sin', $proyecto_andesTorreSur_sin)->with('proyecto_andesTorreSur_cap', $proyecto_andesTorreSur_cap)->with('proyecto_andesTorreSur_ins_cap', $proyecto_andesTorreSur_ins_cap)->with('proyecto_andesTorreSur_pendiente', $proyecto_andesTorreSur_pendiente)
            ->with('proyecto_andesAB2NortePoniente_con', $proyecto_andesAB2NortePoniente_con)->with('proyecto_andesAB2NortePoniente_noCon', $proyecto_andesAB2NortePoniente_noCon)->with('proyecto_andesAB2NortePoniente_ins', $proyecto_andesAB2NortePoniente_ins)->with('proyecto_andesAB2NortePoniente_agen', $proyecto_andesAB2NortePoniente_agen)->with('proyecto_andesAB2NortePoniente_sin', $proyecto_andesAB2NortePoniente_sin)->with('proyecto_andesAB2NortePoniente_cap', $proyecto_andesAB2NortePoniente_cap)->with('proyecto_andesAB2NortePoniente_ins_cap', $proyecto_andesAB2NortePoniente_ins_cap)->with('proyecto_andesAB2NortePoniente_pendiente', $proyecto_andesAB2NortePoniente_pendiente)
            ->with('proyecto_andesAB2TorreSur_con', $proyecto_andesAB2TorreSur_con)->with('proyecto_andesAB2TorreSur_noCon', $proyecto_andesAB2TorreSur_noCon)->with('proyecto_andesAB2TorreSur_ins', $proyecto_andesAB2TorreSur_ins)->with('proyecto_andesAB2TorreSur_agen', $proyecto_andesAB2TorreSur_agen)->with('proyecto_andesAB2TorreSur_sin', $proyecto_andesAB2TorreSur_sin)->with('proyecto_andesAB2TorreSur_cap', $proyecto_andesAB2TorreSur_cap)->with('proyecto_andesAB2TorreSur_ins_cap', $proyecto_andesAB2TorreSur_ins_cap)->with('proyecto_andesAB2TorreSur_pendiente', $proyecto_andesAB2TorreSur_pendiente)
            ->with('proyecto_andesCD2TorreNorPon_con', $proyecto_andesCD2TorreNorPon_con)->with('proyecto_andesCD2TorreNorPon_noCon', $proyecto_andesCD2TorreNorPon_noCon)->with('proyecto_andesCD2TorreNorPon_ins', $proyecto_andesCD2TorreNorPon_ins)->with('proyecto_andesCD2TorreNorPon_agen', $proyecto_andesCD2TorreNorPon_agen)->with('proyecto_andesCD2TorreNorPon_sin', $proyecto_andesCD2TorreNorPon_sin)->with('proyecto_andesCD2TorreNorPon_cap', $proyecto_andesCD2TorreNorPon_cap)->with('proyecto_andesCD2TorreNorPon_ins_cap', $proyecto_andesCD2TorreNorPon_ins_cap)->with('proyecto_andesCD2TorreNorPon_pendiente', $proyecto_andesCD2TorreNorPon_pendiente)
            ->with('proyecto_andesCD2TorreSur_con', $proyecto_andesCD2TorreSur_con)->with('proyecto_andesCD2TorreSur_noCon', $proyecto_andesCD2TorreSur_noCon)->with('proyecto_andesCD2TorreSur_ins', $proyecto_andesCD2TorreSur_ins)->with('proyecto_andesCD2TorreSur_agen', $proyecto_andesCD2TorreSur_agen)->with('proyecto_andesCD2TorreSur_sin', $proyecto_andesCD2TorreSur_sin)->with('proyecto_andesCD2TorreSur_cap', $proyecto_andesCD2TorreSur_cap)->with('proyecto_andesCD2TorreSur_ins_cap', $proyecto_andesCD2TorreSur_ins_cap)->with('proyecto_andesCD2TorreSur_pendiente', $proyecto_andesCD2TorreSur_pendiente)
            ->with('proyecto_andesE2NorPon_con', $proyecto_andesE2NorPon_con)->with('proyecto_andesE2NorPon_noCon', $proyecto_andesE2NorPon_noCon)->with('proyecto_andesE2NorPon_ins', $proyecto_andesE2NorPon_ins)->with('proyecto_andesE2NorPon_agen', $proyecto_andesE2NorPon_agen)->with('proyecto_andesE2NorPon_sin', $proyecto_andesE2NorPon_sin)->with('proyecto_andesE2NorPon_cap', $proyecto_andesE2NorPon_cap)->with('proyecto_andesE2NorPon_ins_cap', $proyecto_andesE2NorPon_ins_cap)->with('proyecto_andesE2NorPon_pendiente', $proyecto_andesE2NorPon_pendiente)
            ->with('proyecto_jazzLifeEtapa2_con', $proyecto_jazzLifeEtapa2_con)->with('proyecto_jazzLifeEtapa2_noCon', $proyecto_jazzLifeEtapa2_noCon)->with('proyecto_jazzLifeEtapa2_ins', $proyecto_jazzLifeEtapa2_ins)->with('proyecto_jazzLifeEtapa2_agen', $proyecto_jazzLifeEtapa2_agen)->with('proyecto_jazzLifeEtapa2_sin', $proyecto_jazzLifeEtapa2_sin)->with('proyecto_jazzLifeEtapa2_cap', $proyecto_jazzLifeEtapa2_cap)->with('proyecto_jazzLifeEtapa2_ins_cap', $proyecto_jazzLifeEtapa2_ins_cap)->with('proyecto_jazzLifeEtapa2_pendiente', $proyecto_jazzLifeEtapa2_pendiente)
            ->with('proyecto_jazzLifeEtapa3_con', $proyecto_jazzLifeEtapa3_con)->with('proyecto_jazzLifeEtapa3_noCon', $proyecto_jazzLifeEtapa3_noCon)->with('proyecto_jazzLifeEtapa3_ins', $proyecto_jazzLifeEtapa3_ins)->with('proyecto_jazzLifeEtapa3_agen', $proyecto_jazzLifeEtapa3_agen)->with('proyecto_jazzLifeEtapa3_sin', $proyecto_jazzLifeEtapa3_sin)->with('proyecto_jazzLifeEtapa3_cap', $proyecto_jazzLifeEtapa3_cap)->with('proyecto_jazzLifeEtapa3_ins_cap', $proyecto_jazzLifeEtapa3_ins_cap)->with('proyecto_jazzLifeEtapa3_pendiente', $proyecto_jazzLifeEtapa3_pendiente)
            ->with('proyecto_vinaChicureoCountry_con', $proyecto_vinaChicureoCountry_con)->with('proyecto_vinaChicureoCountry_noCon', $proyecto_vinaChicureoCountry_noCon)->with('proyecto_vinaChicureoCountry_ins', $proyecto_vinaChicureoCountry_ins)->with('proyecto_vinaChicureoCountry_agen', $proyecto_vinaChicureoCountry_agen)->with('proyecto_vinaChicureoCountry_sin', $proyecto_vinaChicureoCountry_sin)->with('proyecto_vinaChicureoCountry_cap', $proyecto_vinaChicureoCountry_cap)->with('proyecto_vinaChicureoCountry_ins_cap', $proyecto_vinaChicureoCountry_ins_cap)->with('proyecto_vinaChicureoCountry_pendiente', $proyecto_vinaChicureoCountry_pendiente)
            ->with('proyecto_isaPinzon_con', $proyecto_isaPinzon_con)->with('proyecto_isaPinzon_noCon', $proyecto_isaPinzon_noCon)->with('proyecto_isaPinzon_ins', $proyecto_isaPinzon_ins)->with('proyecto_isaPinzon_agen', $proyecto_isaPinzon_agen)->with('proyecto_isaPinzon_sin', $proyecto_isaPinzon_sin)->with('proyecto_isaPinzon_cap', $proyecto_isaPinzon_cap)->with('proyecto_isaPinzon_ins_cap', $proyecto_isaPinzon_ins_cap)->with('proyecto_isaPinzon_pendiente', $proyecto_isaPinzon_pendiente)
            ->with('proyecto_laurelMelipilla_con', $proyecto_laurelMelipilla_con)->with('proyecto_laurelMelipilla_noCon', $proyecto_laurelMelipilla_noCon)->with('proyecto_laurelMelipilla_ins', $proyecto_laurelMelipilla_ins)->with('proyecto_laurelMelipilla_agen', $proyecto_laurelMelipilla_agen)->with('proyecto_laurelMelipilla_sin', $proyecto_laurelMelipilla_sin)->with('proyecto_laurelMelipilla_cap', $proyecto_laurelMelipilla_cap)->with('proyecto_laurelMelipilla_ins_cap', $proyecto_laurelMelipilla_ins_cap)->with('proyecto_laurelMelipilla_pendiente', $proyecto_laurelMelipilla_pendiente)
            ->with('proyecto_cubicaMontemar_con', $proyecto_cubicaMontemar_con)->with('proyecto_cubicaMontemar_noCon', $proyecto_cubicaMontemar_noCon)->with('proyecto_cubicaMontemar_ins', $proyecto_cubicaMontemar_ins)->with('proyecto_cubicaMontemar_agen', $proyecto_cubicaMontemar_agen)->with('proyecto_cubicaMontemar_sin', $proyecto_cubicaMontemar_sin)->with('proyecto_cubicaMontemar_cap', $proyecto_cubicaMontemar_cap)->with('proyecto_cubicaMontemar_ins_cap', $proyecto_cubicaMontemar_ins_cap)->with('proyecto_cubicaMontemar_pendiente', $proyecto_cubicaMontemar_pendiente)
            ->with('proyecto_altosRacoEtapa9_con', $proyecto_altosRacoEtapa9_con)->with('proyecto_altosRacoEtapa9_noCon', $proyecto_altosRacoEtapa9_noCon)->with('proyecto_altosRacoEtapa9_ins', $proyecto_altosRacoEtapa9_ins)->with('proyecto_altosRacoEtapa9_agen', $proyecto_altosRacoEtapa9_agen)->with('proyecto_altosRacoEtapa9_sin', $proyecto_altosRacoEtapa9_sin)->with('proyecto_altosRacoEtapa9_cap', $proyecto_altosRacoEtapa9_cap)->with('proyecto_altosRacoEtapa9_ins_cap', $proyecto_altosRacoEtapa9_ins_cap)->with('proyecto_altosRacoEtapa9_pendiente', $proyecto_altosRacoEtapa9_pendiente)
            ->with('proyecto_sanDamianEtapa2_con', $proyecto_sanDamianEtapa2_con)->with('proyecto_sanDamianEtapa2_noCon', $proyecto_sanDamianEtapa2_noCon)->with('proyecto_sanDamianEtapa2_ins', $proyecto_sanDamianEtapa2_ins)->with('proyecto_sanDamianEtapa2_agen', $proyecto_sanDamianEtapa2_agen)->with('proyecto_sanDamianEtapa2_sin', $proyecto_sanDamianEtapa2_sin)->with('proyecto_sanDamianEtapa2_cap', $proyecto_sanDamianEtapa2_cap)->with('proyecto_sanDamianEtapa2_ins_cap', $proyecto_sanDamianEtapa2_ins_cap)->with('proyecto_sanDamianEtapa2_pendiente', $proyecto_sanDamianEtapa2_pendiente)
            ->with('proyecto_jardinesAntonioVaras_con', $proyecto_jardinesAntonioVaras_con)->with('proyecto_jardinesAntonioVaras_noCon', $proyecto_jardinesAntonioVaras_noCon)->with('proyecto_jardinesAntonioVaras_ins', $proyecto_jardinesAntonioVaras_ins)->with('proyecto_jardinesAntonioVaras_agen', $proyecto_jardinesAntonioVaras_agen)->with('proyecto_jardinesAntonioVaras_sin', $proyecto_jardinesAntonioVaras_sin)->with('proyecto_jardinesAntonioVaras_cap', $proyecto_jardinesAntonioVaras_cap)->with('proyecto_jardinesAntonioVaras_ins_cap', $proyecto_jardinesAntonioVaras_ins_cap)->with('proyecto_jardinesAntonioVaras_pendiente', $proyecto_jardinesAntonioVaras_pendiente)
            ->with('proyecto_gralSaavedra_con', $proyecto_gralSaavedra_con)->with('proyecto_gralSaavedra_noCon', $proyecto_gralSaavedra_noCon)->with('proyecto_gralSaavedra_ins', $proyecto_gralSaavedra_ins)->with('proyecto_gralSaavedra_agen', $proyecto_gralSaavedra_agen)->with('proyecto_gralSaavedra_sin', $proyecto_gralSaavedra_sin)->with('proyecto_gralSaavedra_cap', $proyecto_gralSaavedra_cap)->with('proyecto_gralSaavedra_ins_cap', $proyecto_gralSaavedra_ins_cap)->with('proyecto_gralSaavedra_pendiente', $proyecto_gralSaavedra_pendiente)
            ->with('proyecto_activaEntreCerros_con', $proyecto_activaEntreCerros_con)->with('proyecto_activaEntreCerros_noCon', $proyecto_activaEntreCerros_noCon)->with('proyecto_activaEntreCerros_ins', $proyecto_activaEntreCerros_ins)->with('proyecto_activaEntreCerros_agen', $proyecto_activaEntreCerros_agen)->with('proyecto_activaEntreCerros_sin', $proyecto_activaEntreCerros_sin)->with('proyecto_activaEntreCerros_cap', $proyecto_activaEntreCerros_cap)->with('proyecto_activaEntreCerros_ins_cap', $proyecto_activaEntreCerros_ins_cap)->with('proyecto_activaEntreCerros_pendiente', $proyecto_activaEntreCerros_pendiente)
            ->with('lasVioletas_con', $lasVioletas_con)->with('lasVioletas_noCon', $lasVioletas_noCon)->with('lasVioletas_ins', $lasVioletas_ins)->with('lasVioletas_agen', $lasVioletas_agen)->with('lasVioletas_sin', $lasVioletas_sin)->with('lasVioletas_cap', $lasVioletas_cap)->with('lasVioletas_ins_cap', $lasVioletas_ins_cap)->with('lasVioletas_pendiente', $lasVioletas_pendiente)
            ->with('proyecto_jardinesAntonioVarasC_con', $proyecto_jardinesAntonioVarasC_con)->with('proyecto_jardinesAntonioVarasC_noCon', $proyecto_jardinesAntonioVarasC_noCon)->with('proyecto_jardinesAntonioVarasC_ins', $proyecto_jardinesAntonioVarasC_ins)->with('proyecto_jardinesAntonioVarasC_agen', $proyecto_jardinesAntonioVarasC_agen)->with('proyecto_jardinesAntonioVarasC_sin', $proyecto_jardinesAntonioVarasC_sin)->with('proyecto_jardinesAntonioVarasC_cap', $proyecto_jardinesAntonioVarasC_cap)->with('proyecto_jardinesAntonioVarasC_ins_cap', $proyecto_jardinesAntonioVarasC_ins_cap)->with('proyecto_jardinesAntonioVarasC_pendiente', $proyecto_jardinesAntonioVarasC_pendiente)
            ->with('proyecto_jardinesAntonioVarasD_con', $proyecto_jardinesAntonioVarasD_con)->with('proyecto_jardinesAntonioVarasD_noCon', $proyecto_jardinesAntonioVarasD_noCon)->with('proyecto_jardinesAntonioVarasD_ins', $proyecto_jardinesAntonioVarasD_ins)->with('proyecto_jardinesAntonioVarasD_agen', $proyecto_jardinesAntonioVarasD_agen)->with('proyecto_jardinesAntonioVarasD_sin', $proyecto_jardinesAntonioVarasD_sin)->with('proyecto_jardinesAntonioVarasD_cap', $proyecto_jardinesAntonioVarasD_cap)->with('proyecto_jardinesAntonioVarasD_ins_cap', $proyecto_jardinesAntonioVarasD_ins_cap)->with('proyecto_jardinesAntonioVarasD_pendiente', $proyecto_jardinesAntonioVarasD_pendiente)
            ->with('proyecto_jardinesAntonioVarasAB_con', $proyecto_jardinesAntonioVarasAB_con)->with('proyecto_jardinesAntonioVarasAB_noCon', $proyecto_jardinesAntonioVarasAB_noCon)->with('proyecto_jardinesAntonioVarasAB_ins', $proyecto_jardinesAntonioVarasAB_ins)->with('proyecto_jardinesAntonioVarasAB_agen', $proyecto_jardinesAntonioVarasAB_agen)->with('proyecto_jardinesAntonioVarasAB_sin', $proyecto_jardinesAntonioVarasAB_sin)->with('proyecto_jardinesAntonioVarasAB_cap', $proyecto_jardinesAntonioVarasAB_cap)->with('proyecto_jardinesAntonioVarasAB_ins_cap', $proyecto_jardinesAntonioVarasAB_ins_cap)->with('proyecto_jardinesAntonioVarasAB_pendiente', $proyecto_jardinesAntonioVarasAB_pendiente)
            ->with('proyecto_jardinesAntonioVarasG_con', $proyecto_jardinesAntonioVarasG_con)->with('proyecto_jardinesAntonioVarasG_noCon', $proyecto_jardinesAntonioVarasG_noCon)->with('proyecto_jardinesAntonioVarasG_ins', $proyecto_jardinesAntonioVarasG_ins)->with('proyecto_jardinesAntonioVarasG_agen', $proyecto_jardinesAntonioVarasG_agen)->with('proyecto_jardinesAntonioVarasG_sin', $proyecto_jardinesAntonioVarasG_sin)->with('proyecto_jardinesAntonioVarasG_cap', $proyecto_jardinesAntonioVarasG_cap)->with('proyecto_jardinesAntonioVarasG_ins_cap', $proyecto_jardinesAntonioVarasG_ins_cap)->with('proyecto_jardinesAntonioVarasG_pendiente', $proyecto_jardinesAntonioVarasG_pendiente)
            ->with('proyecto_jardinesAntonioVarasEF_con', $proyecto_jardinesAntonioVarasEF_con)->with('proyecto_jardinesAntonioVarasEF_noCon', $proyecto_jardinesAntonioVarasEF_noCon)->with('proyecto_jardinesAntonioVarasEF_ins', $proyecto_jardinesAntonioVarasEF_ins)->with('proyecto_jardinesAntonioVarasEF_agen', $proyecto_jardinesAntonioVarasEF_agen)->with('proyecto_jardinesAntonioVarasEF_sin', $proyecto_jardinesAntonioVarasEF_sin)->with('proyecto_jardinesAntonioVarasEF_cap', $proyecto_jardinesAntonioVarasEF_cap)->with('proyecto_jardinesAntonioVarasEF_ins_cap', $proyecto_jardinesAntonioVarasEF_ins_cap)->with('proyecto_jardinesAntonioVarasEF_pendiente', $proyecto_jardinesAntonioVarasEF_pendiente);
    }

    // Función para gráficos totales por estados y capacitados   
    public function graficos_totales_clientes()
    {	
    	// Por estados
    	$totalClientesContactados 		= Cliente::where('estado_id',1)->count();
        $totalClientesNoContactados 	= Cliente::where('estado_id',2)->count();
        $totalClientesInstalados 		= Cliente::where('estado_id',3)->count();
        $totalClientesAgendados 		= Cliente::where('estado_id',4)->count();
        $totalClientesSinInformacion 	= Cliente::where('estado_id',5)->count();
        $totalClientesInsYCap           = Cliente::where('estado_id',8)->count();
        $totalClientesCap               = Cliente::where('estado_id',9)->count();
        $totalClientesConObs            = Cliente::where('estado_id',10)->count();
        // Por capacitados
        $totalClientesCapacitados 		= Cliente::where('capacitacion', 'Capacitado')->orWhere('capacitacion', 'CAPACITADO')->orderBy('nombre', 'asc')->count();
        $totalClientesNoCapacitados 	= Cliente::where('capacitacion', 'No Capacitado')->orWhere('capacitacion', 'NO CAPACITADO')->orderBy('nombre', 'asc')->count();

        return Response::json(array(
        	'totalClientesContactados' 		=> $totalClientesContactados,
        	'totalClientesNoContactados' 	=> $totalClientesNoContactados,
        	'totalClientesInstalados' 		=> $totalClientesInstalados,
        	'totalClientesAgendados' 		=> $totalClientesAgendados,
        	'totalClientesSinInformacion' 	=> $totalClientesSinInformacion,
            'totalClientesInsYCap'          => $totalClientesInsYCap,
            'totalClientesCap'              => $totalClientesCap,
            'totalClientesConObs'           => $totalClientesConObs, 
        	'totalClientesCapacitados' 		=> $totalClientesCapacitados,
        	'totalClientesNoCapacitados' 	=> $totalClientesNoCapacitados
        ));
    }

    // Metodo mostrar información en vista cliente
    public function cliente()
    {
        $inmobiliarias 	= Inmobiliaria::orderBy('nombre', 'asc')->get();
        $estados 		= Estado::orderBy('id', 'asc')->get();
        $instaladores   = Instalador::get();
        
        return view('cliente')->with('inmobiliarias', $inmobiliarias)->with('estados', $estados)->with('instaladores', $instaladores);
    }

    public function agendaInstaladores()
    {
        $inmobiliarias  = Inmobiliaria::orderBy('nombre', 'asc')->get();
        $estados        = Estado::orderBy('id', 'asc')->get();
        $instaladores   = Instalador::all();
        
        return view('agendaInstaladores')->with('inmobiliarias', $inmobiliarias)->with('instaladores', $instaladores);
    }

    
    // Metodo mostrar información en vista importar
    public function importar()
    {
        $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();
        return view('importar')->with('inmobiliarias', $inmobiliarias);
    }

    // Metodo actualizar datos de cliente y enviar correo por cambio de estado o capacitado
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        
        $cliente->vivienda 					= $request->vivienda;
        $cliente->num_documento 			= $request->num_documento;
        $cliente->nombre 					= $request->nombre;
        $cliente->apellido 					= $request->apellido;
        $cliente->fecha_nacimiento 			= $request->fecha_nacimiento;
        $cliente->telefono1 				= $request->telefono1;
        $cliente->telefono2 				= $request->telefono2;
        $cliente->correo 					= $request->correo;
        $cliente->pregunta1 				= $request->pregunta1;
        $cliente->respuesta1 				= $request->respuesta1;
        $cliente->pregunta2 				= $request->pregunta2;
        $cliente->respuesta2 				= $request->respuesta2;
        $cliente->pregunta3 				= $request->pregunta3;
        $cliente->respuesta3 				= $request->respuesta3;
        $cliente->email 					= $request->email;
        $cliente->resp_email 				= $request->resp_email;
        $cliente->fecha_instalacion 		= $request->fecha_instalacion;
        $cliente->fecha_emision_protocolo 	= $request->fecha_emision_protocolo;
        $cliente->fecha_capacitacion 		= $request->fecha_capacitacion;
        $cliente->observacion               = $request->observacion;
        $cliente->pdf_protocolo             = $cliente->pdf_protocolo;

        if ($request->estado_id != 0) {
            $cliente->estado_id = $request->estado_id;
        }

        if ($request->capacitacion != 'ACTUAL') {
        	$cliente->capacitacion = $request->capacitacion;
        }

        /*
        if ($request->estado_id == 3 && $request->instalado == 0) {
            Mail::send('emails.welcome', $request->all(), function($message){
                $message->from('tamed.instalaciones@gmail.com', 'Aviso de cliente instalado');
                $message->to('planes@tamed.global')->subject('Aviso de cliente instalado')->cc('tamed.instalaciones@gmail.com')->subject('Aviso de cliente instalado');
            });
        }
        */
        /*
        if ($request->capacitacion == 'CAPACITADO' && $request->instalado == 0) {
            Mail::send('emails.welcome', $request->all(), function($message){
                $message->from('instalaciones@tamed.global', 'Aviso de cliente instalado');
                $message->to('planes@tamed.global')->subject('Aviso de cliente instalado')->cc('instalaciones@tamed.global')->subject('Aviso de cliente instalado');
            });
        }
        */
        // guardar cambios en la base de datos
        $cliente->save();
        
        return response()->json($cliente);
    }

    // Metodo importar datos de clientes masivos por planilla excel
    public function clienteImport(Request $request){

        $get_id_proyecto = $request->input('id_proyecto');
        $id_proyecto = (int)$get_id_proyecto;

        $this->validate($request, array(
            'cliente' => 'required' 
        ));
 
        if ($request->hasFile('cliente')) {
            $extension = File::extension($request->cliente->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                
                $path = $request->cliente->getRealPath();
                $data = Excel::selectSheets('Hoja1')->load($path, function($reader){})->get();
                
                if (!empty($data) && $data->count()) {
                    
                    $get_cant_clientes_proyecto = Proyecto::find($id_proyecto);
                    $cant_clientes_proyecto = $get_cant_clientes_proyecto->cantidad;
                    $nombre_proyecto = $get_cant_clientes_proyecto->nombre;

                    $cant_clientes = Cliente::where('proyecto_id', $id_proyecto)->count();

                    $clientes_disponibles = $cant_clientes_proyecto - $cant_clientes; 

                    if($cant_clientes_proyecto === NULL){
                        return back()->with("errors", "No hay cantidad de viviendas establecida en el proyecto, $nombre_proyecto");
                    } else if($cant_clientes >= $cant_clientes_proyecto){
                        return back()->with("errors", "No se puede agregar clientes por superar la cantidad de viviendas establecida en el proyecto, cantidad: $cant_clientes_proyecto");
                    } else if($data->count() > $clientes_disponibles){
                        return back()->with("errors", "No se puede agregar los clientes por que supera la cantidad disponible, puede agregar a: $clientes_disponibles cliente, de: ".$data->count()." en el excel adjunto");
                    } else {
                        foreach ($data as $key => $value) {
                            $proyecto_id       = $id_proyecto;
                            $vivienda          = $value->direccion;
                            $num_documento     = $value->num_documento;
                            $nombre            = $value->nombre;
                            $apellido          = $value->apellido;
                            $contacto          = $value->contacto;
                            $telefono1         = $value->telefono1;
                            $telefono2         = $value->telefono2;
                            $correo            = $value->correo;
                            $pregunta1         = $value->pregunta1;
                            $respuesta1        = $value->respuesta1;
                            $pregunta2         = $value->pregunta2;
                            $respuesta2        = $value->respuesta2;
                            $pregunta3         = $value->pregunta3;
                            $respuesta3        = $value->respuesta3;
                            $email             = $value->email;
                            $resp_email        = $value->resp_email;
                            $observacion       = $value->observacion;
                            if (trim($value->capacitacion) == "capacitado" || trim($value->capacitacion) == "no capacitado") {
                                $capacitacion = strtoupper($value->capacitacion);    
                            } else {
                                $capacitacion = 'NO CAPACITADO';
                            }
                            $codigo = $value->direccion . "/" . $value->num_documento;
                            $activacion_codigo = 0;
                            $fecha_instalacion         = $value->fecha_instalacion;
                            $fecha_emision_protocolo   = $value->fecha_emision_protocolo;
                            $fecha_capacitacion        = $value->fecha_capacitacion;

                            if (strtolower($value->estado) == "contactado") {
                                $estado_id = 1;
                            } else if (strtolower($value->estado) == "no contactado") {
                                $estado_id = 2;
                            } else if (strtolower($value->estado) == "instalado") {
                                $estado_id = 3;
                            } else if (strtolower($value->estado) == "agendado") {
                                $estado_id = 4;
                            } else if (strtolower($value->estado) == "sin informacion" || strtolower($value->estado) == "sin información" || strtolower($value->estado) == "sin informaci&oacuten" || strtolower($value->estado) == "") {
                                $estado_id = 5;
                            } else if(strtolower($value->estado) == "instalado y capacitado") {
                                $estado_id = 8;
                            } else if(strtolower($value->estado) == "pendiente") {
                                $estado_id = 10;
                            } else if(strtolower($value->estado) == "capacitado") {
                                $estado_id = 9;
                            }

                            if ($vivienda == "" || trim($vivienda) == "") {
                                $datos_sin_vivienda[] = [           
                                    'proyecto_id'       => $id_proyecto,
                                    'vivienda'          => $vivienda,
                                ];
                            } else {
                                $comprobar_direccion_duplicada = Cliente::where('proyecto_id', $proyecto_id)->where('vivienda', $vivienda)->count();
                                if ($comprobar_direccion_duplicada > 0) {
                                    $vivienda_duplicada[] = [           
                                        'proyecto_id'       => $id_proyecto,
                                        'vivienda'          => $vivienda,
                                    ];
                                } else {
                                    $insert[] = [           
                                        'proyecto_id'       => $id_proyecto,
                                        'vivienda'          => $vivienda,
                                        'num_documento'     => $num_documento,
                                        'nombre'            => $nombre,
                                        'apellido'          => $apellido,
                                        'fecha_nacimiento'  => $contacto,
                                        'telefono1'         => $telefono1,
                                        'telefono2'         => $telefono2,
                                        'correo'            => $correo,
                                        'pregunta1'         => $pregunta1,
                                        'respuesta1'        => $respuesta1,
                                        'pregunta2'         => $pregunta2,
                                        'respuesta2'        => $respuesta2,
                                        'pregunta3'         => $pregunta3,
                                        'respuesta3'        => $respuesta3,
                                        'email'             => $email,
                                        'resp_email'        => $resp_email,
                                        'capacitacion'      => $capacitacion,
                                        'codigo'            => $codigo,
                                        'activacion_codigo' => $activacion_codigo,
                                        'fecha_instalacion'         => $fecha_instalacion,
                                        'fecha_emision_protocolo'   => $fecha_emision_protocolo,
                                        'fecha_capacitacion'        => $fecha_capacitacion,
                                        'estado_id'         => $estado_id,
                                        'observacion'       => $observacion,
                                        'pdf_protocolo'     => null,
                                        'created_at'        => date('Y-m-d H:i:s'),
                                        'updated_at'        => date('Y-m-d H:i:s')
                                    ];
                                }//Fin else comprobar ducplicado
                            }//Fin else
                        }//Fin foreach
                        if (!empty($insert)) {
                            $insertData = \DB::table('clientes')->insert($insert);
                            if ($insertData) {
                                return back()->with("success", "¡Clientes agregados correctamente!");
                            } else {                        
                                return back()->with("errors", "Error en agregar clientes");
                            }
                        }//Fin if insert
                    }//Fin else cant clientes 
                } else {
                    return back()->with("errors", "No hay datos de clientes en el archivo excel adjunto");
                }
            } else {
                return back()->with("errors", "Extensión del archivo no es válida");
            }
        }//Fin hasFile
    }

    // Metodo para exportar datos a excel
    public function exportarExcel() {
        \Excel::create('Listado_de_clientes', function($excel){
            $excel->sheet('Clientes', function($sheet){
                //Header
                $sheet->row(1, ['Dirección', 'Número documento', 'Nombre', 'Apellido', 'Fecha nacimiento', 'Télefono 1', 'Télefono 2', 'Correo', 'Llamada 1', 'Respuesta 1', 'Llamada 2', 'Respuesta 2', 'Llamada 3', 'Respuesta 3', 'EMail', 'Respuesta EMail', 'Estado', 'Capacitación']);
                // Data
                $get_clientes = Cliente::all();
                
                foreach ($get_clientes as $cliente) {
                    $row = [];
                    $row[0]  = $cliente->vivienda;
                    $row[1]  = $cliente->num_documento;
                    $row[2]  = $cliente->nombre;
                    $row[3]  = $cliente->apellido;
                    $row[4]  = $cliente->fecha_nacimiento;
                    $row[5]  = $cliente->telefono1;
                    $row[6]  = $cliente->telefono2;
                    $row[7]  = $cliente->correo;
                    $row[8]  = $cliente->pregunta1;
                    $row[9]  = $cliente->respuesta1;
                    $row[10] = $cliente->pregunta2;
                    $row[11] = $cliente->respuesta2;
                    $row[12] = $cliente->pregunta3;
                    $row[13] = $cliente->respuesta3;
                    $row[14] = $cliente->email;
                    $row[15] = $cliente->resp_email;
                    $row[16] = $cliente->estado->nombre;
                    $row[17] = $cliente->capacitacion;
                    $sheet->appendRow($row);
                }
            });
        })->export('xls');
    }

    //Subir PDF
    public function subirPdfProtocolo(Request $request)
    {
    	$archivo_pdf = $request->file('archivo_pdf');
    	$cliente_id = $request->input('cliente_id');
    	$path = public_path().'/pdf_inmobiliarias/';
    	$ruta_completa_pdf = '';

    	//Verificar si es válido el archivo subido
    	if($archivo_pdf->isValid()){
    		
    		//Obtener la extensión del archivo
    		$extension = $archivo_pdf->getClientOriginalExtension();
    		
    		//Validar la extensión del archivo
    		if($extension === 'pdf' || $extension === 'PDF'){
    			
    			//Obtener el nombre del archivo
    			$nombre_pdf = $archivo_pdf->getClientOriginalName();
    			
    			//Obtener el proyecto_id
    			$get_proyecto = Cliente::find($cliente_id);
    			$get_proyecto_id = $get_proyecto->proyecto_id; 
    			
    			//Obtener la inmobiliaria_id
    			$get_inmobiliaria = Proyecto::find($get_proyecto_id);
    			$get_inmobiliaria_id = $get_inmobiliaria->inmobiliaria->id;
    			
    			//Obtener el nombre de la inmobiliaria
    			$get_nombre_inmobiliaria = Inmobiliaria::find($get_inmobiliaria_id);
    			$nombre_inmobiliaria = $get_nombre_inmobiliaria->nombre;
    			
    			//Corregir nombres de path
    			if($get_inmobiliaria_id === 26){
    				
                    $path_pdf = $path.'AC_CANTAUCO/';
                    $archivo_pdf->move($path_pdf, $nombre_pdf);
                    $ruta_completa_pdf = $path_pdf.$nombre_pdf;
                    //Actualizar cliente
                    Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
                    //Guardar los pdfs del cliente
                    $pdf_del_cliente = new Pdfprotocoloscliente();
                    $pdf_del_cliente->cliente_id = $cliente_id;
                    $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/AC_CANTAUCO/'.$nombre_pdf;
                    $pdf_del_cliente->nombre_pdf = $nombre_pdf;
                    $pdf_del_cliente->save();

    			} else if($get_inmobiliaria_id === 74){
    				
                    $path_pdf = $path.'BARRIO_ALAMEDA/';
                    $archivo_pdf->move($path_pdf, $nombre_pdf);
                    $ruta_completa_pdf = $path_pdf.$nombre_pdf;
                    //Actualizar cliente
                    Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
                    //Guardar los pdfs del cliente
                    $pdf_del_cliente = new Pdfprotocoloscliente();
                    $pdf_del_cliente->cliente_id = $cliente_id;
                    $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/BARRIO_ALAMEDA/'.$nombre_pdf;
                    $pdf_del_cliente->nombre_pdf = $nombre_pdf;
                    $pdf_del_cliente->save();

    			} else if($get_inmobiliaria_id === 27){
    				
                    $path_pdf = $path.'DA_CANTAUCO/';
                    $archivo_pdf->move($path_pdf, $nombre_pdf);
                    $ruta_completa_pdf = $path_pdf.$nombre_pdf;
                    //Actualizar cliente
                    Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
                    //Guardar los pdfs del cliente
                    $pdf_del_cliente = new Pdfprotocoloscliente();
                    $pdf_del_cliente->cliente_id = $cliente_id;
                    $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/DA_CANTAUCO/'.$nombre_pdf;
                    $pdf_del_cliente->nombre_pdf = $nombre_pdf;
                    $pdf_del_cliente->save();

    			} else if($get_inmobiliaria_id === 24){
    				
                    $path_pdf = $path.'INMOBILIARIA_GUZMAN/';
                    $archivo_pdf->move($path_pdf, $nombre_pdf);
                    $ruta_completa_pdf = $path_pdf.$nombre_pdf;
                    //Actualizar cliente
                    Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
                    //Guardar los pdfs del cliente
                    $pdf_del_cliente = new Pdfprotocoloscliente();
                    $pdf_del_cliente->cliente_id = $cliente_id;
                    $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/INMOBILIARIA_GUZMAN/'.$nombre_pdf;
                    $pdf_del_cliente->nombre_pdf = $nombre_pdf;
                    $pdf_del_cliente->save();

    			} else if($get_inmobiliaria_id === 32){
    				
                    $path_pdf = $path.'SAN_ISIDRO/';
                    $archivo_pdf->move($path_pdf, $nombre_pdf);
                    $ruta_completa_pdf = $path_pdf.$nombre_pdf;
                    //Actualizar cliente
                    Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
                    //Guardar los pdfs del cliente
                    $pdf_del_cliente = new Pdfprotocoloscliente();
                    $pdf_del_cliente->cliente_id = $cliente_id;
                    $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/SAN_ISIDRO/'.$nombre_pdf;
                    $pdf_del_cliente->nombre_pdf = $nombre_pdf;
                    $pdf_del_cliente->save();

    			} else if($get_inmobiliaria_id === 9){
    				
                    $path_pdf = $path.'VIVIENDAS_2000/';
                    $archivo_pdf->move($path_pdf, $nombre_pdf);
                    $ruta_completa_pdf = $path_pdf.$nombre_pdf;
                    //Actualizar cliente
                    Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
                    //Guardar los pdfs del cliente
                    $pdf_del_cliente = new Pdfprotocoloscliente();
                    $pdf_del_cliente->cliente_id = $cliente_id;
                    $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/VIVIENDAS_2000/'.$nombre_pdf;
                    $pdf_del_cliente->nombre_pdf = $nombre_pdf;
                    $pdf_del_cliente->save();

    			} else if($get_inmobiliaria_id === 72){
    				
                    $path_pdf = $path.'NAPOLEON/';
                    $archivo_pdf->move($path_pdf, $nombre_pdf);
                    $ruta_completa_pdf = $path_pdf.$nombre_pdf;
                    //Actualizar cliente
                    Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
                    //Guardar los pdfs del cliente
                    $pdf_del_cliente = new Pdfprotocoloscliente();
                    $pdf_del_cliente->cliente_id = $cliente_id;
                    $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/NAPOLEON/'.$nombre_pdf;
                    $pdf_del_cliente->nombre_pdf = $nombre_pdf;
                    $pdf_del_cliente->save();

    			} else {
    				$path_pdf = $path.$nombre_inmobiliaria.'/';
    				$archivo_pdf->move($path_pdf, $nombre_pdf);
    				$ruta_completa_pdf = $path_pdf.$nombre_pdf;
    				//Actualizar cliente
    				Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
    				//Guardar los pdfs del cliente
    				$pdf_del_cliente = new Pdfprotocoloscliente();
    				$pdf_del_cliente->cliente_id = $cliente_id;
                    $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/'.$nombre_inmobiliaria.'/'.$nombre_pdf;
                    $pdf_del_cliente->nombre_pdf = $nombre_pdf;
                    $pdf_del_cliente->save();
    			}
    			return response()->json([
                    "ruta_completa_pdf" => $ruta_completa_pdf,
                    "respuesta" => 0 
                ]);
    			//return $ruta_completa_pdf;
    			//return $path_pdf;
    		} else {
    			return 1;
    		}	
    	} else {
    		return 1;
    	}

    	/*
    	return response()->json([
    		"archivo_pdf" => $archivo_pdf,
    		"cliente_id" => $cliente_id
    	]);
    	*/
    }



    function eliminar_protocolo(Request $request){

        $id_cliente = $request->input('id_cliente');
        $id_protocolo = $request->input('id_protocolo');

        $count_protocolos = Pdfprotocoloscliente::where('cliente_id', $id_cliente)->count();

        if($count_protocolos>1){

            $protocolo = Pdfprotocoloscliente::find($id_protocolo);
            $protocolo->delete();
            return 1;

        }else{

            $protocolo = Pdfprotocoloscliente::find($id_protocolo);
            $protocolo->delete();           

            Cliente::where('id', $id_cliente)->update(['pdf_protocolo' => null]);

            return 1;

        }

    }

    function estadosPorFecha($fecha){


        $datos = Historicoestadocliente::where('fecha_respaldo', $fecha)->get();



        $array_datos = [];

        foreach ($datos as $dato) {

            $array_datos = array(

                'cant_sin_info' => $dato->cant_sin_info,
                'cant_no_contactados' => $dato->cant_no_contactados,
                'cant_contactados' => $dato->cant_contactados,
                'cant_agendados' => $dato->cant_agendados,
                'cant_instalados' => $dato->cant_instalados,
                'cant_con_observacion' => $dato->cant_con_observacion,
                'cant_ins_cap' => $dato->cant_ins_cap,
                'fecha' => $dato->fecha_respaldo

            );
        }

        return $array_datos;
    }
    
}
