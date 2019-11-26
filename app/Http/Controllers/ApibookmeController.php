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
use Illuminate\Support\Facades\Hash;

class ApibookmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inmobiliarias = Inmobiliaria::orderBy('nombre', 'asc')->get();
        return Response::json($inmobiliarias);
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
        $inmobiliaria = Inmobiliaria::where('id', $id)->get();
        return Response::json($inmobiliaria);
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


    public function validar_usuario($password)
    {

        $calve= Hash::make($password);
        return $clave;

    
   // $datosCliente  = Cliente::join('proyectos','clientes.proyecto_id','=','proyectos.id')
   //			         ->join('inmobiliarias','proyectos.inmobiliaria_id','=','inmobiliarias.id')
   //                  ->where('correo',$user)->select('clientes.id as cliente_id','clientes.nombre as cliente_nombre','clientes.apellido','clientes.num_documento','clientes.correo','clientes.telefono1','proyectos.id as proyecto_id','proyectos.nombre as proyecto_nombre','inmobiliarias.id as inmobiliaria_id','inmobiliarias.nombre as inmobiliaria_nombre')->get();

   // $prueba2 = '$2y$10$Cu.rFyp.OPC8TVMVL/HtEOtsjUNF2FNtqe6rvNYNOMj6vzdQAVK0i';

   // if(sizeof($datosCliente)==0 ){

   //  	return response()->json([
   //  	"datosCliente" => "email no coincide con ningun registro"
   //  ]);

   // }else{

   //     if (Hash::check($password,$prueba2)) {

   //     		return response()->json([
   //       		"idCliente" => $datosCliente,
   //       		"pruebaClave" => "clave valida"
   //     ]);

   //     }else{

   //     	$pruebaClave = "contraseña invalida";

   //     	return response()->json([

   //      		"pruebaClave" => $pruebaClave

   //     	]);
   //     }	
   // }
   	
    }

}
