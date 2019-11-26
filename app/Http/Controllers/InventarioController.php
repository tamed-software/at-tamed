<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use App\Inmobiliaria;
use App\Producto;
use App\Proyecto;
use App\Inventario;
use App\Cliente;

class InventarioController extends Controller
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
        $productos = Producto::all();
        return view('inventario.index')->with('inmobiliarias', $inmobiliarias)->with('productos', $productos);
    }

    public function listar()
    {
        $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();
        //$inventarios = Inventario::orderBy('proyecto_id', 'asc')->get();
        $inventarios = Inventario::join('proyectos', 'inventarios.proyecto_id', 'proyectos.id')
                            ->join('productos', 'inventarios.producto_id', 'productos.id')
                            ->join('inmobiliarias', 'proyectos.inmobiliaria_id', 'inmobiliarias.id')
                            ->select('inventarios.id','inventarios.tiempo_instalacion_hora','inventarios.tiempo_configuracion_hora','inventarios.cantidad as cantidad_producto', 'inventarios.total', 'inventarios.proyecto_id', 'inventarios.producto_id', 'proyectos.nombre', 'proyectos.cantidad', 'proyectos.fecha_inicio_instalacion', 'proyectos.id as id_proyecto', 'productos.codigo', 'productos.producto', 'inmobiliarias.nombre as nombre_inmobiliaria')
                            ->get();

        //$cantidad_clientes_ins_cap = Cliente::where('proyecto_id', $id)->where('estado_id', 8)->count();
        $cantidad_clientes_ins_cap = Cliente::where('estado_id', 8)->count();

        return view('inventario.listar')->with('inventarios', $inventarios)->with('inmobiliarias', $inmobiliarias);
    }

    public function editar()
    {
        $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();

        return view('inventario.editar')->with('inmobiliarias', $inmobiliarias);
    }

    public function listar_inventario_proyecto($id = null){
        if(!$id){
            return Response::json('Falta especificar proyecto');
        } else {
            $inventarios = Inventario::where('proyecto_id', $id)->get();
            $productos = Producto::all();
            $proyectos = Proyecto::orderBy('nombre', 'asc')->get();
            return response()->json([
                'inventarios' => $inventarios,
                'productos' => $productos,
                'proyectos' => $proyectos
            ]);
        }
    }

    public function listado_tabla_por_proyecto($id)
    {
        //$inventarios = Inventario::where('proyecto_id', $id)->orderBy('proyecto_id', 'asc')->get();
        //return Response::json($inventarios);
        //$count_producto_proyectos = Inventario::where('proyecto_id', $id)->count();
        
        $inventarios = Inventario::join('proyectos', 'inventarios.proyecto_id', 'proyectos.id')
                            ->join('productos', 'inventarios.producto_id', 'productos.id')
                            ->join('inmobiliarias', 'proyectos.inmobiliaria_id', 'inmobiliarias.id')
                            ->select('inventarios.id','inventarios.tiempo_instalacion_hora','inventarios.tiempo_configuracion_hora','inventarios.cantidad as cantidad_producto', 'inventarios.total', 'inventarios.proyecto_id', 'inventarios.producto_id', 'proyectos.nombre', 'proyectos.cantidad', 'proyectos.fecha_inicio_instalacion', 'productos.codigo', 'productos.producto', 'inmobiliarias.nombre as nombre_inmobiliaria')
                            ->where('inventarios.proyecto_id', $id)
                            ->get();

        return Response::json($inventarios);
        /*
        return response()->json([
            "inventarios" => $inventarios,
            "count_producto_proyectos" => $count_producto_proyectos
        ]);
        */
    }

    public function count_clientes_ins_cap($id)
    {
        /*
        $inventarios = Inventario::join('proyectos', 'inventarios.proyecto_id', 'proyectos.id')
                                ->join('productos', 'inventarios.producto_id', 'productos.id')
                                ->join('inmobiliarias', 'proyectos.inmobiliaria_id', 'inmobiliarias.id')
                                ->select('inventarios.id', 'inventarios.tiempo_instalacion_hora', 'inventarios.tiempo_configuracion_hora', 'inventarios.cantidad as cantidad_producto', 'inventarios.total', 'inventarios.proyecto_id', 'inventarios.producto_id', 'proyectos.nombre', 'proyectos.cantidad', 'proyectos.fecha_inicio_instalacion', 'productos.codigo', 'productos.producto', 'inmobiliarias.nombre as nombre_inmobiliaria')
                                ->where('inventarios.proyecto_id', $id)
                                ->get();
        */

        $cantidad_clientes_ins_cap = Cliente::where('proyecto_id', $id)->where('estado_id', 8)->count();
        

        return Response::json($cantidad_clientes_ins_cap);
    }

    //Mostrar cuantos son los productos restantes por instalar
    public function resto_productos_por_instalar()
    {
        //$datos = [];
        //$datos_inventario_proyecto = [];
        $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();
        $datos_inventario_proyecto = [];

        foreach($inmobiliarias as $inmobiliaria){
            $inmobiliaria_id = $inmobiliaria->id;
            $proyectos = Proyecto::where('inmobiliaria_id', $inmobiliaria_id)->orderBy('nombre', 'asc')->get();

            foreach($proyectos as $proyecto){

                $count_clientes_ins = Cliente::where('proyecto_id', $proyecto->id)->where('estado_id', 3)->count();
                $count_clientes_ins_cap = Cliente::where('proyecto_id', $proyecto->id)->where('estado_id', 8)->count(); 
                $total_clientes = $count_clientes_ins + $count_clientes_ins_cap;

                $count_inventarios_proyecto = Inventario::where('proyecto_id', $proyecto->id)->count();
                $inventarios_proyecto = Inventario::where('proyecto_id', $proyecto->id)->get();
                
                //$datos_inventario_proyecto = [];
                foreach($inventarios_proyecto as $inventario){
                    //$datos_inventario_proyecto = [];

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
        return Response::json($datos_inventario_proyecto);
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
        /*
        $this->validate($request, [
            'codigo' => 'required'
        ]);
        */
        //$arrayProductos2 = $request->input('arrayProductos');
        /*
        try
        {

        } catch (\Exception $e)
        {
            catch (\Exception $e)
            DB::rollback();
            return redirect()->route('admin-users.index')->with('error','');
        }
        */
        //$arrayProductos = $request->input('arrayProductos.*');
        //$arrayProductos = Input::get('arrayProductos');
        $arrayProductos = $request->input('arrayProductos');
        $proyecto_id = $request->input('proyecto_id');

        $count_producto_proyectos = Inventario::where('proyecto_id', $proyecto_id)->count();
        
        if($count_producto_proyectos > 1000){
            return 1;
        } else {
            //$data = '';
            foreach ($arrayProductos as $ar){
                $data = [];
                $get_producto_id = (int)$ar['id'];
                $producto = Producto::find($get_producto_id);

                $get_tiempo_ins_hora = $producto->tiempo_instalacion_hora;
                $get_tiempo_cap_hora = $producto->tiempo_configuracion_hora;

                $get_cant_ins_hora = $get_tiempo_ins_hora * (int)$ar['cantidad'];
                $cant_ins_hora = number_format((float)$get_cant_ins_hora,2,'.','');

                $get_cant_cap_hora = $get_tiempo_cap_hora * (int)$ar['cantidad'];
                $cant_cap_hora = number_format((float)$get_cant_cap_hora,2,'.','');

                $get_suma_total = $cant_ins_hora + $cant_cap_hora;
                $suma_total = number_format((float)$get_suma_total,2,'.','');
                
                $data[] = array(
                    "tiempo_instalacion_hora" => $cant_ins_hora,
                    "tiempo_configuracion_hora" => $cant_cap_hora,
                    "cantidad" => (int)$ar['cantidad'],
                    "total" => $suma_total,
                    "proyecto_id" => $proyecto_id,
                    "producto_id" => (int)$ar['id'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                Inventario::insert($data);
            }
            //Inventario::create($data);

            return response()->json([
                "proyecto_id" => $proyecto_id,
                "arrayProductos" => $arrayProductos,
                "data" => $data
                //"count_producto_proyectos" => $count_producto_proyectos
            ]);
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
        $actual_tiempo_instalacion_hora     = $request->input('tiempo_instalacion_hora');
        $actual_tiempo_configuracion_hora   = $request->input('tiempo_configuracion_hora');
        $cantidad                           = $request->input('cantidad');
        $total                              = $request->input('total');
        $proyecto_id                        = $request->input('proyecto_id');
        $producto_id                        = $request->input('producto_id');

        $producto = Producto::find($producto_id);

        $get_tiempo_instalacion_hora = $producto->tiempo_instalacion_hora;

        $get_tiempo_configuracion_hora = $producto->tiempo_configuracion_hora;

        $get_instalacion_hora = $get_tiempo_instalacion_hora * $cantidad;
        $instalacion_hora = number_format((float)$get_instalacion_hora,2,'.','');

        $get_configuracion_hora = $get_tiempo_configuracion_hora * $cantidad;
        $configuracion_hora = number_format((float)$get_configuracion_hora,2,'.',''); 

        $get_suma_total = $instalacion_hora + $configuracion_hora;
        $suma_total = number_format((float)$get_suma_total,2,'.','');

        $update_inventario = Inventario::find($id);
        $update_inventario->tiempo_instalacion_hora     = $instalacion_hora;
        $update_inventario->tiempo_configuracion_hora   = $configuracion_hora;
        $update_inventario->cantidad                    = $cantidad;
        $update_inventario->total                       = $suma_total;
        $update_inventario->producto_id                 = $producto_id;

        if($update_inventario->proyecto_id != $proyecto_id){
            $actual_proyecto = $update_inventario->proyecto_id;
            $update_inventario->proyecto_id = $proyecto_id;
            $update_inventario->save();
            $inventarios = Inventario::where('proyecto_id', $actual_proyecto)->get();
        } else {
            $update_inventario->proyecto_id = $proyecto_id;
            $update_inventario->save();
            $inventarios = Inventario::where('proyecto_id', $proyecto_id)->get();
        }

        $comprobar_update = $update_inventario->save();

        if($comprobar_update){
            
            $productos = Producto::all();
            $proyectos = Proyecto::orderBy('nombre', 'asc')->get();

            return response()->json([
                'id'                        => $id,
                'tiempo_instalacion_hora'   => $instalacion_hora,
                'tiempo_configuracion_hora' => $configuracion_hora,
                'cantidad'                  => $cantidad,
                'total'                     => $suma_total,
                'proyecto_id'               => $proyecto_id,
                'producto_id'               => $producto_id,
                'inventarios'               => $inventarios,
                'productos'                 => $productos,
                'proyectos'                 => $proyectos,
                'respuesta'                 => 0
            ]);
        } else {
            return response()->json([
                'id'                        => $id,
                'tiempo_instalacion_hora'   => $instalacion_hora,
                'tiempo_configuracion_hora' => $configuracion_hora,
                'cantidad'                  => $cantidad,
                'total'                     => $suma_total,
                'proyecto_id'               => $proyecto_id,
                'producto_id'               => $producto_id,
                'respuesta'                 => 1
            ]);
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
        //
    }

    public function agregar(Request $request){


        $arrayProductos = $request->input('arrayProductos');
        $proyecto_id = $request->input('proyecto_id');

        $count_producto_proyectos = Inventario::where('proyecto_id', $proyecto_id)->count();
        
        if($count_producto_proyectos > 1000){
            return 1;
        } else {
            //$data = '';
            foreach ($arrayProductos as $ar){
                $data = [];
                $get_producto_id = (int)$ar['id'];
                $producto = Producto::find($get_producto_id);

                $get_tiempo_ins_hora = $producto->tiempo_instalacion_hora;
                $get_tiempo_cap_hora = $producto->tiempo_configuracion_hora;

                $get_cant_ins_hora = $get_tiempo_ins_hora * (int)$ar['cantidad'];
                $cant_ins_hora = number_format((float)$get_cant_ins_hora,2,'.','');

                $get_cant_cap_hora = $get_tiempo_cap_hora * (int)$ar['cantidad'];
                $cant_cap_hora = number_format((float)$get_cant_cap_hora,2,'.','');

                $get_suma_total = $cant_ins_hora + $cant_cap_hora;
                $suma_total = number_format((float)$get_suma_total,2,'.','');
                
                $data[] = array(
                    "tiempo_instalacion_hora" => $cant_ins_hora,
                    "tiempo_configuracion_hora" => $cant_cap_hora,
                    "cantidad" => (int)$ar['cantidad'],
                    "total" => $suma_total,
                    "proyecto_id" => $proyecto_id,
                    "producto_id" => (int)$ar['id'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                Inventario::insert($data);
            }
            //Inventario::create($data);

            return response()->json([
                "proyecto_id" => $proyecto_id,
                "arrayProductos" => $arrayProductos,
                "data" => $data
                //"count_producto_proyectos" => $count_producto_proyectos
            ]);
        }

    }
}
