<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmobiliaria;
use App\Proyecto;
use App\Inventario;
use App\Cliente;
use App\Producto;
use App\Pdfprotocoloscliente;
use Response;
use Validator;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::orderBy('nombre', 'asc')->get();
        return Response::json($proyectos);
    }

    public function inmobiliariaProyecto($id)
    {
        $inmobiliaria_proyecto = Proyecto::where('inmobiliaria_id', $id)->orderBy('nombre', 'asc')->get();
        return Response::json($inmobiliaria_proyecto);
    }

    public function inmobiliaria_proyecto($id_inmo)
    {


        $proyectos = Proyecto::where('inmobiliaria_id',$id_inmo)
                     ->select('id')->get();

        $data = collect($proyectos)->toArray(); 
        

        return $data;

    }



    public function datos_proyecto()
    {

    $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();
    $datos_proyecto = [];

        foreach ($inmobiliarias as $inmobiliaria) {
            $inmobiliaria_id = $inmobiliaria->id;
            $proyectos = Proyecto::where('inmobiliaria_id', $inmobiliaria_id)->orderBy('nombre', 'asc')->get();
    
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
                                "nombre_inmobiliaria" => $inmobiliaria->nombre,
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
    
        }
        //return Response::json($datos_proyecto);
        
        return response()->json([
            "proyectos" => $datos_proyecto
        ]);
        
    }

    public function proyectoFecha()
    {
        //$proyectos = Proyecto::where('fecha_inicio_instalacion','>',$fecha)
          //           ->select('id')->get();

        $proyectos = Proyecto::select('id')->orderBy('fecha_inicio_instalacion','asc')->get();

        $data = collect($proyectos)->toArray(); 
        

        return $data;

    }

    //Informe por cada proyecto
    public function informe_proyecto($id)
    {
        $datos_inmobiliaria_proyecto = Inmobiliaria::join('proyectos', 'inmobiliarias.id', 'proyectos.inmobiliaria_id')
                            ->where('proyectos.id', $id)
                            ->select('inmobiliarias.nombre as nombre_inmobiliaria', 'proyectos.nombre as nombre_proyecto', 'proyectos.fecha_inicio_instalacion', 'proyectos.fecha_termino_instalacion', 'proyectos.cantidad')
                            ->get();

        $get_inventario = Producto::join('inventarios', 'productos.id', 'inventarios.producto_id')
                            ->where('inventarios.proyecto_id', $id)
                            ->select('productos.codigo', 'productos.producto', 'inventarios.cantidad', 'inventarios.tiempo_instalacion_hora', 'inventarios.tiempo_configuracion_hora', 'inventarios.total')
                            ->get();

        $get_clientes_ins_cap = Cliente::where('proyecto_id', $id)->where('estado_id', 8)->count();
        $get_clientes_ins = Cliente::where('proyecto_id', $id)->where('estado_id', 3)->count();

        $get_fecha_minima_instalacion = Cliente::where('proyecto_id', $id)->min('fecha_instalacion');

        if($get_fecha_minima_instalacion !== null){
            $get_fecha_real_termino_ins = date('Y-m-d', strtotime("$get_fecha_minima_instalacion + 90 day"));
        } else {
            $get_fecha_real_termino_ins = null;
        }

        $cantidad_clientes_ins_cap = Cliente::where('proyecto_id', $id)->where('estado_id', 8)->count();

        return response()->json([
            "datos_inmobiliaria_proyecto" => $datos_inmobiliaria_proyecto,
            "get_clientes_ins_cap" => $get_clientes_ins_cap,
            "get_clientes_ins" => $get_clientes_ins,
            "get_inventario" => $get_inventario,
            "get_fecha_minima_instalacion" => $get_fecha_minima_instalacion,
            "get_fecha_real_termino_ins" => $get_fecha_real_termino_ins,
            "cantidad_clientes_ins_cap" => $cantidad_clientes_ins_cap
        ]);
    }

    //Mostrar inmobiliarias para protocolo
    public function listar_inmobiliarias()
    {
        $inmobiliarias = Inmobiliaria::where('estado_id', 6)->orderBy('nombre', 'asc')->get();
        return Response::json($inmobiliarias);
    }

    //Mostrar proyectos por inmobiliaria
    public function listar_proyecto_inmobiliaria($id = null)
    {
        if(!$id){
            return Response::json('falta id inmobiliaria');
        } else {
            $proyectos = Proyecto::where('inmobiliaria_id', $id)->where('estado_id', 6)->orderBy('nombre', 'asc')->get();
            return Response::json($proyectos);
        }

    }

    //Mostrat clientes asociados a un proyecto
    public function listar_clientes_proyecto($id = null)
    {
        if(!$id){
            return Response::json('falta id proyecto');
        } else {

            $clientes = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->join('inmobiliarias', 'proyectos.inmobiliaria_id', 'inmobiliarias.id')
                            ->select('clientes.id', 'clientes.vivienda', 'proyectos.nombre as nombre_proyecto', 'inmobiliarias.nombre as nombre_inmobiliaria')
                            ->where('clientes.proyecto_id', $id)
                            ->where('clientes.pdf_protocolo', null)
                            ->get();

            return Response::json($clientes);
        }
    }

    //Agregar PDF Protocolo
    public function agregar_pdf_protocolo(Request $request, $id = null)
    {
        if(!$id){
            return Response::json('falta id cliente');
        } else {
            $pdf_protocolo = $request->input('pdf_protocolo');
            //$direccion_cliente = $request->input('direccion_cliente');

            $this->validate($request, [
                'pdf_protocolo' => 'required'
            ]);

            Cliente::where('id', $id)->update(['pdf_protocolo' => $pdf_protocolo]);
            //Cliente::where('id', $id)->where('vivienda', $direccion_cliente)->update(['pdf_protocolo' => $pdf_protocolo]);
            //$insert_pdf = new Pdfprotocoloscliente();
            //$insert_pdf->cliente_id = $id;
            //$insert_pdf->pdf_protocolo = $pdf_protocolo;
            //$insert_pdf->save();
            //$comprobar_insert = $insert_pdf->save();
            return Response::json('PDF Agregado a cliente');
        }
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
        $proyecto = Proyecto::where('id', $id)->get();
        return Response::json($proyecto);
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

    public function nombre_proyecto($id)
    {
      $nombre = Proyecto::where('id',$id)->value('nombre');

      return Response::json($nombre);
    }

}
