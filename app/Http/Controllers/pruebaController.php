<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Estado;
use App\Inmobiliaria;
use App\Proyecto;
use App\Nuevoproyecto;
use DB;
class pruebaController extends Controller
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
        $estados = Estado::all();
        return view('adm_inmobiliara_proyecto')->with('estados', $estados);
    }

    //Editar inmobiliarias y proyectos
    public function listar()
    {
        $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();
        $proyectos = Proyecto::orderBy('nombre', 'asc')->get();
        $estados = Estado::all();
        $nuevos_proyectos = Nuevoproyecto::orderBy('nombre', 'asc')->get();

        return view('admin_inmobiliaria.listar')->with('inmobiliarias', $inmobiliarias)->with('proyectos', $proyectos)->with('estados', $estados)->with('nuevos_proyectos', $nuevos_proyectos);
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

        //Validar campos requeridos
        $this->validate($request, [
            'nombre_inmobiliaria' => 'required'
        ]);

        $nombre_inmobiliaria  = $request->input('nombre_inmobiliaria');
        $num_doc_inmobiliaria = $request->input('num_doc_inmobiliaria');
        $estado_inmobiliaria  = $request->input('estado_inmobiliaria');


        $validacion = Inmobiliaria::where('nombre', $nombre_inmobiliaria)->count();



            if($validacion == 0 ){

            $insert_inmobiliaria = new Inmobiliaria();
            $insert_inmobiliaria->nombre = strtoupper($nombre_inmobiliaria);
            $insert_inmobiliaria->num_documento = $num_doc_inmobiliaria;
            $insert_inmobiliaria->estado_id = $estado_inmobiliaria;
            $insert_inmobiliaria->save();

            $comprobar_add = $insert_inmobiliaria->save();

                if($comprobar_add){
                    return response()->json([
                        'nombre_inmobiliaria'  => $nombre_inmobiliaria,
                        'num_doc_inmobiliaria' => $num_doc_inmobiliaria,
                        'estado_inmobiliaria'  => $estado_inmobiliaria
                    ]);
                } else {
                    return 1;
                }
            }else{
                return 0;
            }


    }

    //Agregar proyecto
    public function agregar_proyecto(Request $request)
    {
        $this->validate($request, [
            'inmobiliaria' => 'required',
            'estado_proyecto' => 'required',
            'nombre_proyecto' => 'required'
        ]);

        $inmobiliaria       = $request->input('inmobiliaria');
        $estado_proyecto    = $request->input('estado_proyecto');
        $nombre_proyecto    = $request->input('nombre_proyecto');
        $num_doc_proyecto   = $request->input('num_doc_proyecto');
        $direccion_proyecto = $request->input('direccion_proyecto');
        $fecha_inicio_instalacion = $request->input('fecha_inicio_instalacion');
        $fecha_termino_instalacion = $request->input('fecha_termino_instalacion');
        $cantidad_viviendas = $request->input('cantidad_viviendas');

        $validacion = Proyecto::where('nombre', $nombre_proyecto)->count();

        if($validacion == 0 ){

            $insert_proyecto = new Proyecto;
            $insert_proyecto->num_documento = $num_doc_proyecto;
            $insert_proyecto->nombre = $nombre_proyecto;
            $insert_proyecto->direccion = $direccion_proyecto;
            $insert_proyecto->inmobiliaria_id = $inmobiliaria;
            $insert_proyecto->estado_id = $estado_proyecto;
            $insert_proyecto->fecha_inicio_instalacion = $fecha_inicio_instalacion;
            $insert_proyecto->fecha_termino_instalacion = $fecha_termino_instalacion;
            $insert_proyecto->cantidad = $cantidad_viviendas;
            $insert_proyecto->save();

            $comprobar_add = $insert_proyecto->save();

            if($comprobar_add){
                return response()->json([
                    'inmobiliaria' => $inmobiliaria,
                    'estado_proyecto' => $estado_proyecto,
                    'nombre_proyecto' => $nombre_proyecto,
                    'num_doc_proyecto' => $num_doc_proyecto,
                    'direccion_proyecto' => $direccion_proyecto
                ]);
            } else {
                return 1;
            }
        }else{
            return 0;
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
        $nombre = $request->input('nombre');
        $num_documento = $request->input('num_documento');
        $estado = $request->input('estado');

        $update_inmobiliaria = Inmobiliaria::find($id);
        $update_inmobiliaria->nombre = $nombre;
        $update_inmobiliaria->num_documento = $num_documento;
        if($estado != 0){
            $update_inmobiliaria->estado_id = $estado;
        }
        $update_inmobiliaria->save();

        $comprobar_update = $update_inmobiliaria->save();

        if($comprobar_update){
            $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();
            $estados = Estado::where('id', 6)->orWhere('id', 7)->get();
            return response()->json([
                'id'  => $id,
                'nombre' => $nombre,
                'num_documento' => $num_documento,
                'estado' => $estado,
                'inmobiliarias' => $inmobiliarias,
                'estados' => $estados,
                'resultado' => 0
            ]);
        } else {
            return response()->json([
                'id'  => $id,
                'nombre' => $nombre,
                'num_documento' => $num_documento,
                'estado' => $estado,
                'resultado' => 1
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
}
