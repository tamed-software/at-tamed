<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Producto;
use App\Proyecto;
use App\Cliente;
use App\Inventario;
use App\Nuevoproyecto;

class ProductoController extends Controller
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
        return view('producto.index');
    }

    //Editar productos
    public function editar_producto()
    {
        $productos = Producto::all();
        //return view('producto.editar')->with('productos', $productos);
        $nuevoproyectos = Nuevoproyecto::all();
        return view('producto.editar')->with('productos', $productos)->with('nuevoproyectos', $nuevoproyectos);
    }

    //Listar productos
    public function listar()
    {

        $productos = Producto::all();
        $suma_total_viviendas = Proyecto::sum('cantidad');
        $clientes_ins = Cliente::where('estado_id', 3)->count();
        $clientes_ins_cap = Cliente::where('estado_id', 8)->count();
        $total_clientes = $clientes_ins + $clientes_ins_cap;  

        $listado_productos = Producto::all();

        $data_productos_pendientes = [];
        $producto_id_inventario = 0;
        
        foreach($listado_productos as $producto){
            $cantidad_productos_inventario = 0;
            $productos_pendientes = 0; 
            
            $cantidad_proyectos = 0;
            
            $clientes_ins_proyecto = 0;
            $clientes_ins_cap_proyecto = 0;
            $total_clientes_ins_cap = 0;
            $get_total_viviendas_proyecto = '';
            $total_viviendas_proyecto = 0;
            $resto_vivienda_proyecto = 0;
            $productos_pendientes_proyecto = 0;

            $inventarios = Inventario::all();
            
            foreach($inventarios as $inventario){
                if($producto->id === $inventario->producto_id){

                    $cantidad_productos_inventario = $cantidad_productos_inventario + $inventario->cantidad;
                    //$producto_id_inventario = $inventario->producto_id;
                    //$cantidad_proyectos = $cantidad_proyectos + 1; 
                    $clientes_ins_proyecto = Cliente::where('proyecto_id', $inventario->proyecto_id)->where('estado_id', 3)->count();
                    $clientes_ins_cap_proyecto = Cliente::where('proyecto_id', $inventario->proyecto_id)->where('estado_id', 8)->count();
                    $get_total_viviendas_proyecto = Proyecto::find($inventario->proyecto_id);
                    $total_viviendas_proyecto = $get_total_viviendas_proyecto->cantidad;
                    $total_clientes_ins_cap = $clientes_ins_proyecto + $clientes_ins_cap_proyecto;

                    $resto_vivienda_proyecto = $total_viviendas_proyecto - $total_clientes_ins_cap;
                    $productos_pendientes_proyecto = $inventario->cantidad * $resto_vivienda_proyecto;
                }
            }

            //$get_productos_pendientes =  $suma_total_viviendas - $total_clientes;
            //$productos_pendientes = $get_productos_pendientes * $cantidad_productos_inventario;
            //$productos_pendientes = $cantidad_productos_inventario * $cantidad_proyectos;
            $productos_pendientes = $productos_pendientes + $productos_pendientes_proyecto;

            $data_productos_pendientes[] = array(
                "producto_id" => $producto->id,
                "codigo" => $producto->codigo,
                "nombre_producto" => $producto->producto,
                "tiempo_instalacion_hora" => $producto->tiempo_instalacion_hora,
                "tiempo_configuracion_hora" => $producto->tiempo_configuracion_hora,
                "cantidad_productos_inventario" => $cantidad_productos_inventario,
                //"cantidad_proyectos" => $cantidad_proyectos,
                "total_por_instalar" => $productos_pendientes
            );
        }
       
        return view('producto.listar', compact('data_productos_pendientes'))->with('productos',$productos);
    }

    public function listado_productos_pendientes()
    {
        $suma_total_viviendas = Proyecto::sum('cantidad');
        $clientes_ins = Cliente::where('estado_id', 3)->count();
        $clientes_ins_cap = Cliente::where('estado_id', 8)->count();
        $total_clientes = $clientes_ins + $clientes_ins_cap;  

        $listado_productos = Producto::all();

        $data_productos_pendientes = [];
        $producto_id_inventario = 0;
        $productos_pendientes = 0;

        foreach($listado_productos as $producto){
            
            $cantidad_productos_inventario = 0;
            $cantidad_proyectos = 0;
            
            $clientes_ins_proyecto = 0;
            $clientes_ins_cap_proyecto = 0;
            $total_clientes_ins_cap = 0;
            $get_total_viviendas_proyecto = '';
            $total_viviendas_proyecto = 0;
            $resto_vivienda_proyecto = 0;
            $productos_pendientes_proyecto = 0;

            $inventarios = Inventario::all();
            
            foreach($inventarios as $inventario){
                if($producto->id === $inventario->producto_id){

                    $cantidad_productos_inventario = $cantidad_productos_inventario + $inventario->cantidad;
                    $producto_id_inventario = $inventario->producto_id;
                    //$cantidad_proyectos = $cantidad_proyectos + 1; 
                    $clientes_ins_proyecto = Cliente::where('proyecto_id', $inventario->proyecto_id)->where('estado_id', 3)->count();
                    $clientes_ins_cap_proyecto = Cliente::where('proyecto_id', $inventario->proyecto_id)->where('estado_id', 8)->count();
                    $get_total_viviendas_proyecto = Proyecto::find($inventario->proyecto_id);
                    $total_viviendas_proyecto = $get_total_viviendas_proyecto->cantidad;
                    $total_clientes_ins_cap = $clientes_ins_proyecto + $clientes_ins_cap_proyecto;

                    $resto_vivienda_proyecto = $total_viviendas_proyecto - $total_clientes_ins_cap;
                    $productos_pendientes_proyecto = $inventario->cantidad * $resto_vivienda_proyecto;
                }
            }

            //$get_productos_pendientes =  $suma_total_viviendas - $total_clientes;
            //$productos_pendientes = $get_productos_pendientes * $cantidad_productos_inventario;
            //$productos_pendientes = $cantidad_productos_inventario * $cantidad_proyectos;
            $productos_pendientes = $productos_pendientes + $productos_pendientes_proyecto;

            $data_productos_pendientes[] = array(
                "producto_id" => $producto->id,
                "codigo" => $producto->codigo,
                "nombre_producto" => $producto->producto,
                "tiempo_instalacion_hora" => $producto->tiempo_instalacion_hora,
                "tiempo_configuracion_hora" => $producto->tiempo_configuracion_hora,
                "cantidad_productos_inventario" => $cantidad_productos_inventario,
                "cantidad_proyectos" => $cantidad_proyectos,
                "total_por_instalar" => $productos_pendientes
            );
        }

        return response()->json([
            "productos_pendientes" => $data_productos_pendientes
        ]);
    }

    //Listar productos con cantidad mayor a 0
    public function listarProductosCantidad()
    {
        $productos = Producto::where('cantidad', '>', 0)->get();
        return Response::json($productos);
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
        $this->validate($request, [
            'codigo' => 'required'
        ]);

        $codigo                    = $request->input('codigo');
        $producto                  = $request->input('producto');
        $cantidad                  = $request->input('cantidad');
        $tiempo_instalacion_hora   = number_format((float)$request->input('tiempo_instalacion_hora'),2,'.','');
        $tiempo_configuracion_hora = number_format((float)$request->input('tiempo_configuracion_hora'),2,'.','');

        //Multiplicación de tiempo instalación X cantidad
        //$get_tiempo_instalacion_hora = $tiempo_instalacion_hora * $cantidad;
        $format_tiempo_instalacion_hora = number_format((float)$tiempo_instalacion_hora,2,'.','');
        //Multiplicación de tiempo configuración X cantidad
        //$get_tiempo_configuracion_hora = $tiempo_configuracion_hora * $cantidad;
        $format_tiempo_configuracion_hora = number_format((float)$tiempo_configuracion_hora,2,'.','');
        //Suma de tiempo instalación y tiempo de configuración
        $get_suma_total = $format_tiempo_instalacion_hora + $format_tiempo_configuracion_hora;
        $suma_total = number_format((float)$get_suma_total,2,'.','');

        $insert_producto = new Producto;
        $insert_producto->codigo = $codigo;
        $insert_producto->producto = $producto;
        $insert_producto->cantidad = NULL;
        $insert_producto->tiempo_instalacion_hora = $format_tiempo_instalacion_hora;
        $insert_producto->tiempo_configuracion_hora = $format_tiempo_configuracion_hora;
        $insert_producto->tiempo_instalacion_hora_nuevo = NULL;
        $insert_producto->tiempo_configuracion_hora_nuevo = NULL;
        $insert_producto->total = NULL;
        $insert_producto->unidad = NULL;
        $insert_producto->save();

        $comprobar_add = $insert_producto->save();

        if($comprobar_add){
            return 0;
        } else {
            return 1;
        }
    }

    //Incrementar cantidad de productos
    public function incrementarCantidad(Request $request, $id)
    {
        /*
        $cantidad_producto = $request->input('cantidad');

        if($cantidad_producto < 0){
            return 1;
        } else {
            $producto = Producto::find($id);
            $tiempo_instalacion_hora_actual   = $producto->tiempo_instalacion_hora;
            $tiempo_configuracion_hora_actual = $producto->tiempo_configuracion_hora;
            $total_actual    = $producto->total;
            $cantidad_actual = $producto->cantidad;

            //Multiplicación de tiempo instalación X cantidad
            $get_tiempo_instalacion_hora = $tiempo_instalacion_hora_actual * $cantidad_producto;
            $format_tiempo_instalacion_hora = number_format((float)$get_tiempo_instalacion_hora,2,'.','');
            //Multiplicación de tiempo configuración X cantidad
            $get_tiempo_configuracion_hora = $tiempo_configuracion_hora_actual * $cantidad_producto;
            $format_tiempo_configuracion_hora = number_format((float)$get_tiempo_configuracion_hora,2,'.','');
            //Suma de tiempo instalación y tiempo de configuración
            $get_suma_total = $format_tiempo_instalacion_hora + $format_tiempo_configuracion_hora;
            $suma_total = number_format((float)$get_suma_total,2,'.','');

            $update_producto = Producto::find($id);
            $update_producto->cantidad = $cantidad_producto;
            $update_producto->tiempo_instalacion_hora_nuevo   = $format_tiempo_instalacion_hora;
            $update_producto->tiempo_configuracion_hora_nuevo = $format_tiempo_configuracion_hora;
            $update_producto->total = $suma_total;
            $update_producto->save();

            $nueva_cantidad = $update_producto->cantidad;

            return Response::json($nueva_cantidad);
        }
        */
    }

    //Decrementa cantidad de productos
    public function decrementaCantidad(Request $request, $id)
    {
        /*
        $cantidad_producto = $request->input('cantidad');

        if($cantidad_producto < 0){
            return 1;
        } else {
            $producto = Producto::find($id);
            $tiempo_instalacion_hora_actual   = $producto->tiempo_instalacion_hora;
            $tiempo_configuracion_hora_actual = $producto->tiempo_configuracion_hora;
            $total_actual    = $producto->total;
            $cantidad_actual = $producto->cantidad;

            //Multiplicación de tiempo instalación X cantidad
            $get_tiempo_instalacion_hora = $tiempo_instalacion_hora_actual * $cantidad_producto;
            $format_tiempo_instalacion_hora = number_format((float)$get_tiempo_instalacion_hora,2,'.','');
            //Multiplicación de tiempo configuración X cantidad
            $get_tiempo_configuracion_hora = $tiempo_configuracion_hora_actual * $cantidad_producto;
            $format_tiempo_configuracion_hora = number_format((float)$get_tiempo_configuracion_hora,2,'.','');
            //Suma de tiempo instalación y tiempo de configuración
            $get_suma_total = $format_tiempo_instalacion_hora + $format_tiempo_configuracion_hora;
            $suma_total = number_format((float)$get_suma_total,2,'.','');

            $update_producto = Producto::find($id);
            $update_producto->cantidad = $cantidad_producto;
            $update_producto->tiempo_instalacion_hora_nuevo   = $format_tiempo_instalacion_hora;
            $update_producto->tiempo_configuracion_hora_nuevo = $format_tiempo_configuracion_hora;
            $update_producto->total = $suma_total;
            $update_producto->save();

            $nueva_cantidad = $update_producto->cantidad;

            return Response::json($nueva_cantidad);
        }
        */
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

        $listado_nuevoproyectos = Nuevoproyecto::where('id', $id)->get();
        return Response::json($listado_nuevoproyectos);
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
        $codigo_producto = trim($request->input('codigo_producto'));
        $nombre_producto = trim($request->input('nombre_producto'));
        $tiempo_instalacion_hora = trim($request->input('tiempo_instalacion_hora'));
        $tiempo_configuracion_hora = trim($request->input('tiempo_configuracion_hora'));

        $update_producto = Producto::find($id);
        $update_producto->codigo = $codigo_producto;
        $update_producto->producto = $nombre_producto;
        $update_producto->tiempo_instalacion_hora = $tiempo_instalacion_hora;
        $update_producto->tiempo_configuracion_hora = $tiempo_configuracion_hora;
        $update_producto->save();

        $comprobar_update = $update_producto->save();;

        if($comprobar_update){
            $productos = Producto::all();
            return response()->json([
                "id" => $id,
                "codigo_producto" => $codigo_producto,
                "nombre_producto" => $nombre_producto,
                "tiempo_instalacion_hora" => $tiempo_instalacion_hora,
                "tiempo_configuracion_hora" => $tiempo_configuracion_hora,
                "productos" => $productos,
                "resultado" => 0
            ]);
        } else {
            return response()->json([
                "id" => $id,
                "codigo_producto" => $codigo_producto,
                "nombre_producto" => $nombre_producto,
                "tiempo_instalacion_hora" => $tiempo_instalacion_hora,
                "tiempo_configuracion_hora" => $tiempo_configuracion_hora,
                "resultado" => 1
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
        $eliminar_proyecto = Nuevoproyecto::find($id);
        $eliminar_proyecto->delete();

        //$comprobar_delete = $eliminar_proyecto->delete();
        
        if($eliminar_proyecto){
            $nuevoproyectos = Nuevoproyecto::all();
            return response()->json([
                "nuevoproyectos" => $nuevoproyectos,
                "resultado" => 0 
            ]);
        } else {
            return response()->json([
                "resultado" => 1
            ]);
        }

    }

    public function agregar_producto(Request $request){

        $this->validate($request, [
            'codigo' => 'required'
        ]);

        $codigo                    = $request->input('codigo');
        $producto                  = $request->input('producto');
        //$cantidad                  = $request->input('cantidad');
        $tiempo_instalacion_hora   = number_format((float)$request->input('tiempo_instalacion_hora'),2,'.','');
        $tiempo_configuracion_hora = number_format((float)$request->input('tiempo_configuracion_hora'),2,'.','');

        //Multiplicación de tiempo instalación X cantidad
        //$get_tiempo_instalacion_hora = $tiempo_instalacion_hora * $cantidad;
        $format_tiempo_instalacion_hora = number_format((float)$tiempo_instalacion_hora,2,'.','');
        //Multiplicación de tiempo configuración X cantidad
        //$get_tiempo_configuracion_hora = $tiempo_configuracion_hora * $cantidad;
        $format_tiempo_configuracion_hora = number_format((float)$tiempo_configuracion_hora,2,'.','');
        //Suma de tiempo instalación y tiempo de configuración
        $get_suma_total = $format_tiempo_instalacion_hora + $format_tiempo_configuracion_hora;
        $suma_total = number_format((float)$get_suma_total,2,'.','');

        $insert_producto = new Producto;
        $insert_producto->codigo = $codigo;
        $insert_producto->producto = $producto;
        $insert_producto->tiempo_instalacion_hora = $format_tiempo_instalacion_hora;
        $insert_producto->tiempo_configuracion_hora = $format_tiempo_configuracion_hora;
        $insert_producto->unidad = NULL;
        $insert_producto->save();

        $comprobar_add = $insert_producto->save();

        if($comprobar_add){
            return 0;
        } else {
            return 1;
        }

    }
}
