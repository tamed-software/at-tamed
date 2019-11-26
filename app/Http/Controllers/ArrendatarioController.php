<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arrendatario;
use Response;

class ArrendatarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    // Listar arrendatarios por cliente id
    public function arrendatariosCliente($id_cliente){
        if(!empty($id_cliente)){
            $arrendatarios = Arrendatario::where('cliente_id', $id_cliente)->orderBy('nombre', 'asc')->get();
            return Response::json($arrendatarios);
        } else {
            return Response::json('Falta id');
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
        $id_cliente             = $request->input('cliente_id');
        $nombre_arrendatario    = $request->input('nombre_arrendatario');
        $telefono_arrendatario  = $request->input('telefono_arrendatario');
        $correo_arrendatario    = $request->input('correo_arrendatario');

        if (empty($id_cliente) || empty($nombre_arrendatario) || empty($telefono_arrendatario) || empty($correo_arrendatario)) {
            return Response::json('faltan datos para agregar al arrendatario');
        } else {
            $arrendatario               = new Arrendatario();
            $arrendatario->cliente_id   = $id_cliente;
            $arrendatario->nombre       = $nombre_arrendatario;
            $arrendatario->telefono     = $telefono_arrendatario;
            $arrendatario->correo       = $correo_arrendatario;

            $comprobar_add = $arrendatario->save();

            if ($comprobar_add) {

                $lista_arrendatarios = Arrendatario::where('cliente_id', $id_cliente)->orderBy('nombre', 'asc')->get();
                
                return Response::json(array(
                    'respuesta' => 0,
                    'lista_arrendatarios' => $lista_arrendatarios
                ));
            } else {
                return Response::json(1);
            }
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
        $arrendatario           = Arrendatario::find($id);
        $id_arrendatario        = $arrendatario->id;
        $cliente_id             = $arrendatario->cliente_id;
        $nombre_arrendatario    = $arrendatario->nombre;
        $telefono_arrendatario  = $arrendatario->telefono;
        $correo_arrendatario    = $arrendatario->correo;

        return Response::json(array(
            'id_arrendatario'       => $id_arrendatario,
            'cliente_id'            => $cliente_id,
            'nombre_arrendatario'   => $nombre_arrendatario,
            'telefono_arrendatario' => $telefono_arrendatario,
            'correo_arrendatario'   => $correo_arrendatario
        ));
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
        $cliente_id                 = $request->input('cliente_id');
        $edit_nombre_arrendatario   = $request->input('edit_nombre_arrendatario');
        $edit_telefono_arrendatario = $request->input('edit_telefono_arrendatario');
        $edit_correo_arrendatario   = $request->input('edit_correo_arrendatario');

        if(empty($cliente_id) || empty($edit_nombre_arrendatario) || empty($edit_telefono_arrendatario) || empty($edit_correo_arrendatario)){
            return Response::json('datosVacios');
        } else {
            $arrendatario = Arrendatario::find($id);
            $arrendatario->cliente_id = $cliente_id;
            $arrendatario->nombre = $edit_nombre_arrendatario;
            $arrendatario->telefono = $edit_telefono_arrendatario;
            $arrendatario->correo = $edit_correo_arrendatario;

            $comprobar_edit = $arrendatario->save();

            if ($comprobar_edit) {
                $lista_arrendatarios = Arrendatario::where('cliente_id', $cliente_id)->orderBy('nombre', 'asc')->get();
                 return Response::json(array(
                    'respuesta'           => 0,
                    'lista_arrendatarios' => $lista_arrendatarios
                ));
            } else {
                return Response::json(1);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   
        $cliente_id = $request->input('cliente_id');

        if(empty($cliente_id)){
            return Response::json('noExisteClienteId');
        } else {
            $arrendatario = Arrendatario::find($id);
            $eliminar_arrendatario = $arrendatario->delete();

            if ($eliminar_arrendatario){
                $lista_arrendatarios = Arrendatario::where('cliente_id', $cliente_id)->orderBy('nombre', 'asc')->get();
                return Response::json(array(
                    'respuesta'           => 0,
                    'lista_arrendatarios' => $lista_arrendatarios
                ));
            } else {
                return Response::json(1);
            }
        }
    }
}
