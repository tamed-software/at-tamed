<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Nuevoproyecto;

class NuevoProyectoController extends Controller
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
        //
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
        $listado_nuevos_proyectos = Nuevoproyecto::where('id', $id)->orderBy('nombre', 'asc')->get();
        return Response::json($listado_nuevos_proyectos);
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

        $nuevo_id = $request->input('id');

        /*
        $num_documento = $request->input('num_documento');
        $nombre_proyecto = $request->input('nombre');
        $direccion_proyecto = $request->input('direccion');
        $inmobiliaria_id = $request->input('inmobiliaria_id');   
        $estado_id = $request->input('estado_id');
        $fecha_inicio_instalacion = $request->input('fecha_inicio_instalacion');
        $fecha_termino_instalacion = $request->input('fecha_termino_instalacion');
        $cantidad = $request->input('cantidad');
            
        $update_proyecto = new Nuevoproyecto;
        $update_proyecto->num_documento = $num_documento;
        $update_proyecto->nombre = $nombre_proyecto;
        $update_proyecto->direccion = $direccion_proyecto;
        $update_proyecto->inmobiliaria_id = $inmobiliaria_id;
        $update_proyecto->estado_id = $estado_id;
        $update_proyecto->fecha_inicio_instalacion = $fecha_inicio_instalacion;
        $update_proyecto->fecha_termino_instalacion = $fecha_termino_instalacion;
        $update_proyecto->cantidad = $cantidad;*/
        //echo($request);
        
        //echo($num_documento);
        
        Nuevoproyecto::find($nuevo_id)->update($request->all());

        $prueba = Nuevoproyecto::find($nuevo_id)->update($request->all());
        if($prueba){
            return 0;
        }else{
            return 1;
        }
        //return redirect()->route('http://18.236.97.163:8001/listar_inmobiliaria_proyecto')->with('success','Registro actualizado satisfactoriamente');


        /*if($comprobar_update){
            return 1;
        }else{
            return 0;
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Nuevoproyecto::find($id);
        $proyecto->delete();

        if ($proyecto) {
            return 0;
        } else {
            return 1;
        }
    }
}
