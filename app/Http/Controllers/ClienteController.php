<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Cliente;
use App\Arrendatario;
use App\Proyecto;
use App\Inmobiliaria;
use App\Pdfprotocoloscliente;
use App\User;
use App\Pregunta;
use App\Address;
use App\Comuna;
use App\Ssid;
use App\Provider;
use App\Router;
use App\Marca;
use App\Hc;
use App\Protocolo;
use App\Device;
use App\Encuestas;
use App\Preguntasrespuestas;
use App\DatoPdf;
use Response;
use Mail;
use PDF;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nombre', 'asc')->get();
        return Response::json($clientes);
    }

    public function proyectoCliente($id)
    {
        $proyecto_cliente = Cliente::where('proyecto_id', $id)->orderBy('nombre', 'asc')->get();
        return Response::json($proyecto_cliente);
    }

    //Ver listado de los PDF del cliente
    public function listado_pdf_protocolo_cliente($id = null)
    {
        if(!$id){
            return 'Falta id cliente';
        } else {
            $listado_pdf_protocolo_cliente = Pdfprotocoloscliente::where('cliente_id', $id)->get();

            return Response::json($listado_pdf_protocolo_cliente);
        }
    }

    // Verificar código de cliente
    public function verificarCodigo(Request $request, $proyecto_id)
    {
    	$codigo_form       = $request->input('codigo_cliente');
    	$codigo_servicio   = $request->input('codigo_servicio');

    	if (empty($codigo_form)) {
    		return Response::json('vacio');
    	}
    	
        $sql_cod = Cliente::where('codigo', $codigo_form)->count();
        
        if ($sql_cod == 0) {
        	
            return Response::json('noExiste');
        
        } else {

            $sql_cod2 = Cliente::where('proyecto_id', $proyecto_id)->where('codigo', $codigo_form)->count();

            if ($sql_cod2 == 0) {

                $respuesta = 'false';
                return Response::json($respuesta);
            
            } else {

                $proyecto_cliente = collect(\DB::select('SELECT * FROM clientes WHERE proyecto_id = "'.$proyecto_id.'" AND codigo = "'.$codigo_form.'"'))->first();
        		
        		$id_cliente = $proyecto_cliente->id;
        		
                // Obtener los datos del cliente
        		$cliente = Cliente::find($id_cliente);
        		$direccion_cliente 				 = $cliente->vivienda;
        		$documento_cliente 				 = $cliente->num_documento;
        		$nombre_cliente 				 = $cliente->nombre;
        		$apellido_cliente 				 = $cliente->apellido;
        		$telefono1_cliente 				 = $cliente->telefono1;
        		$correo_cliente 				 = $cliente->correo;
        		$capacitacion_cliente 			 = $cliente->capacitacion;
        		$fecha_instalacion_cliente 		 = $cliente->fecha_instalacion;
        		$fecha_emision_protocolo_cliente = $cliente->fecha_emision_protocolo;
        		$fecha_capacitacion_cliente 	 = $cliente->fecha_capacitacion;
                $activacion_codigo               = $cliente->activacion_codigo;
        		$codigo_cliente                  = $cliente->codigo;
        		$proyecto_cliente                = $cliente->proyecto_id;

                // Obtener los datos del arendatario
                $get_arrendatario = collect(\DB::select('SELECT * FROM arrendatarios WHERE cliente_id = "'.$id_cliente.'"'))->first();

                if($get_arrendatario){
                    $id_arrendatario     = $get_arrendatario->id;
                    $arrendatario        = Arrendatario::find($id_arrendatario);
                    $lista_arrendatarios = Arrendatario::where('cliente_id', $id_cliente)->orderBy('nombre', 'asc')->get();
                } else {
                    $lista_arrendatarios = [];
                }

                if ($codigo_cliente == $codigo_form && $proyecto_cliente == $proyecto_id) {

                    if ($activacion_codigo == 0) {

                        $url_activar_codigo = 'http://18.236.97.163:8001/api/activar_codigo_cliente/?codigo_cliente='.$codigo_cliente;
                        $destinatarioEmail  = 'tamed.instalaciones@gmail.com';
                        $datosEmail = array(
                            'email'              => $destinatarioEmail,
                            'url_activar_codigo' => $url_activar_codigo
                        );
                        Mail::send('emails.mail_activar_codigo', $datosEmail, function($message) use ($datosEmail){
                            $message->from('tamed.instalaciones@gmail.com', 'Activación de código');
                            $message->to($datosEmail['email'])->subject("Activación de código");
                        });
                    }
                	
                    return Response::json(array(
                        'id_cliente'                      => $id_cliente,
                    	'codigo_cliente' 				  => $codigo_cliente,
                    	'direccion_cliente' 			  => $direccion_cliente,
                    	'nombre_cliente' 				  => $nombre_cliente,
                    	'apellido_cliente' 				  => $apellido_cliente,
                    	'telefono1_cliente' 			  => $telefono1_cliente,
                    	'correo_cliente' 				  => $correo_cliente,
                    	'capacitacion_cliente' 			  => $capacitacion_cliente,
                    	'fecha_instalacion_cliente' 	  => $fecha_instalacion_cliente,
                    	'fecha_emision_protocolo_cliente' => $fecha_emision_protocolo_cliente,
                    	'fecha_capacitacion_cliente' 	  => $fecha_emision_protocolo_cliente,
                    	'codigo_servicio' 				  => $codigo_servicio,
                        'activacion_codigo'               => $activacion_codigo,
                        'lista_arrendatarios'             => $lista_arrendatarios,
                    	'respuesta'                       => 'true'
                    ));

                } else {
                    $respuesta = 'false';
                    return Response::json($respuesta);
                }
            }
        }
    }

    // Enviar codigo a cliente
    public function enviarCodigoCliente(Request $request)
    {
        $vivienda_cliente   = $request->input('vivienda_cliente');
        $rut_cliente        = $request->input('rut_cliente');
        $proyecto_id        = $request->input('proyecto_id');
        
        if (empty($vivienda_cliente) || empty($rut_cliente)) {
            
            return Response::json('Faltan datos');
        
        } else {

            $sql_datos_cliente = Cliente::where('proyecto_id', $proyecto_id)->where('vivienda', $vivienda_cliente)->where('num_documento', $rut_cliente)->count();

            if ($sql_datos_cliente == 0) {

                return Response::json('noExisteCliente');
            
            } else {

                $datos_cliente = collect(\DB::select('SELECT * FROM clientes WHERE vivienda = "'.$vivienda_cliente.'" AND num_documento = "'.$rut_cliente.'"'))->first();
                $id_cliente         = $datos_cliente->id;
                $cliente            = Cliente::find($id_cliente);
                $correo_cliente     = $cliente->correo;
                $codigo_cliente     = $cliente->codigo;

                $destinatarioEmail  = 'tamed.instalaciones@gmail.com';

                $datosEmail = array(
                    'email'     => $destinatarioEmail,
                    'codigo'    => $codigo_cliente
                );

                Mail::send('emails.mail_envio_codigo', $datosEmail, function($message) use ($datosEmail){
                    $message->from('tamed.instalaciones@gmail.com', 'Código de activación');
                    $message->to($datosEmail['email'])->subject("Código de activación");
                });
                
                return Response::json($correo_cliente);
            }
        }
    }

    // Solicitud de código de cliente
    public function solicitudCodigoCliente(Request $request)
    {
        $rut_cliente   = $request->input('rut_cliente');
        $vivienda_cliente = $request->input('vivienda_cliente');
        $proyecto_id = $request->input('proyecto_id');

        if (empty($rut_cliente) || empty($vivienda_cliente) || empty($proyecto_id)) {
            return Response::json('datos erroneos al solictar el código');
        } else {

            $sql_datos_cliente = Cliente::where('proyecto_id', $proyecto_id)->where('vivienda', $vivienda_cliente)->where('num_documento', $rut_cliente)->count();

            if ($sql_datos_cliente == 0) {

                return Response::json('noExisteCliente');
            } else {

                $datos_cliente = collect(\DB::select('SELECT * FROM clientes WHERE proyecto_id = "'.$proyecto_id.'" AND num_documento = "'.$rut_cliente.'" AND vivienda = "'.$vivienda_cliente.'"'))->first();
                $id_cliente         = $datos_cliente->id;
                $cliente            = Cliente::find($id_cliente);
                $correo_cliente     = $cliente->correo;
                $codigo_cliente     = $cliente->codigo;

                $destinatarioEmail  = 'tamed.instalaciones@gmail.com';

                $datosEmail = array(
                    'email'     => $destinatarioEmail,
                    'codigo'    => $codigo_cliente
                );

                Mail::send('emails.mail_envio_codigo', $datosEmail, function($message) use ($datosEmail){
                    $message->from('tamed.instalaciones@gmail.com', 'Código de activación');
                    $message->to($datosEmail['email'])->subject("Código de activación");
                });
                    
                return Response::json($correo_cliente);
            }
        }
    }

    // Activar código de cliente
    public function activarCodigoCliente(Request $request)
    {
        $codigo_cliente_email = trim($request->input('codigo_cliente'));

        if (empty($codigo_cliente_email)) {
            return Response::json('Activación incorrecta');
        } else {
            $sql_activacion = Cliente::where('codigo', $codigo_cliente_email)->where('activacion_codigo', 0)->count();
            if ($sql_activacion > 0) {
                Cliente::where('codigo', $codigo_cliente_email)->update(['activacion_codigo'=>1]);
                return Response::json('Activación de código correcta');
            } else {
                return Response::json('El código ya se encuentra activado');
            }
        }
    }

    // Agregar arrendatario
    public function agregarArrendatario(Request $request)
    {
        $id_cliente             = $request->input('cliente_id');
        $nombre_arrendatario    = $request->input('nombre_arrendatario');
        $telefono_arrendatario  = $request->input('telefono_arrendatario');
        $correo_arrendatario    = $request->input('correo_arrendatario');

        //$cliente    = Cliente::find(2);
        //$id_cliente = $cliente->id;

        $arrendatario               = new Arrendatario();
        $arrendatario->cliente_id   = $id_cliente;
        $arrendatario->nombre       = $nombre_arrendatario;
        $arrendatario->telefono     = $telefono_arrendatario;
        $arrendatario->correo       = $correo_arrendatario;

        $comprobar_add = $arrendatario->save();

        if ($comprobar_add) {
            return Response::json('Arrendatario agregado');
        } else {
            return Response::json('No se pudo agregar el arrendatario');
        }
    }

    //Agregar cliente
    public function agregarCliente(Request $request)
    {
        $nombre_cliente           = $request->input('nombre_cliente');
        $apellido_cliente    = $request->input('apellido_cliente');
        $rut_cliente  = $request->input('rut_cliente');
        $telefono_cliente    = $request->input('telefono_cliente');
        $correo_cliente    = $request->input('correo_cliente');
        $inmobiliaria_id    = $request->input('inmobiliaria_id');
        $proyecto_id    = $request->input('proyecto_id');
        $vivienda_cliente    = $request->input('vivienda_cliente');

        if(empty($nombre_cliente) || empty($apellido_cliente) || empty($rut_cliente) || empty($telefono_cliente) || empty($correo_cliente) || empty($proyecto_id) || empty($vivienda_cliente)){
            return Response::json('faltan datos');
        } else {
            $codigo = $inmobiliaria_id.$proyecto_id.$vivienda_cliente.$rut_cliente;

            $cliente = new Cliente();
            $cliente->nombre = $nombre_cliente;
            $cliente->apellido = $apellido_cliente;
            $cliente->num_documento = $rut_cliente;
            $cliente->telefono1 = $telefono_cliente;
            $cliente->correo = $correo_cliente;
            $cliente->proyecto_id = $proyecto_id;
            $cliente->vivienda = $vivienda_cliente;
            $cliente->estado_id = 5;
            $cliente->capacitacion = 'NO CAPACITADO';
            $cliente->codigo = $codigo;
            $cliente->activacion_codigo = 1;

            $cliente->fecha_nacimiento  = NULL;
            $cliente->telefono2         = NULL;
            $cliente->pregunta1         = NULL;
            $cliente->respuesta1        = NULL;
            $cliente->pregunta2         = NULL;
            $cliente->respuesta2        = NULL;
            $cliente->pregunta3         = NULL;
            $cliente->respuesta3        = NULL;
            $cliente->email             = NULL;
            $cliente->resp_email        = NULL;
            $cliente->fecha_instalacion         = NULL;
            $cliente->fecha_emision_protocolo   = NULL;
            $cliente->fecha_capacitacion        = NULL;

            $comprobar_add = $cliente->save();

            if($comprobar_add){
                $datosEmail = array(
                    'email'     => $correo_cliente,
                    'codigo'    => $codigo
                );

                Mail::send('emails.mail_cliente_agregado', $datosEmail, function($message) use ($datosEmail){
                    $message->from('tamed.instalaciones@gmail.com', 'Cliente agregado');
                    $message->to($datosEmail['email'])->subject("Cliente agregado");
                });

                return Response::json(0);

            } else {
                return Response::json(1);
            }
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

        $form_proyecto_id               = $request->input('form_proyecto');
        $form_direccion                 = $request->input('form_direccion');
        $form_num_documento             = $request->input('form_num_documento');
        $form_nombre                    = $request->input('form_nombre');
        $form_apellido                  = $request->input('form_apellido');
        $form_contacto                  = $request->input('form_contacto');
        $form_correo                    = $request->input('form_correo');
        $form_telefono1                 = $request->input('form_telefono1');
        $form_telefono2                 = $request->input('form_telefono2');
        $form_estado                    = $request->input('form_estado');
        $form_capacitacion              = $request->input('form_capacitacion');
        $form_fecha_instalacion         = $request->input('form_fecha_instalacion');
        $form_fecha_emision_protocolo   = $request->input('form_fecha_emision_protocolo');
        $form_fecha_capacitacion        = $request->input('form_fecha_capacitacion');
        // Armar codigo
        $codigo = $form_direccion . "/" . $form_num_documento;
        $proyecto_id = (int)$form_proyecto_id;
        $estado_id = (int)$form_estado;

        $validar_direccion = Cliente::where('vivienda', $form_direccion)->get();
        $cantidad_viviendas = Proyecto::where('id',$form_proyecto_id)->value('cantidad');
        $validar_cantidad_viviendas = Cliente::where('proyecto_id',$form_proyecto_id)->count();



        if(sizeof($validar_direccion) == 0){
         $validar_cantidad_viviendas = $validar_cantidad_viviendas+1;
            if($validar_cantidad_viviendas <= $cantidad_viviendas){
                 // Insertar cliente
                 $cliente = new Cliente();
                 $cliente->estado_id         = $estado_id;
                 $cliente->proyecto_id       = $proyecto_id;
                 $cliente->vivienda          = $form_direccion;
                 $cliente->num_documento     = $form_num_documento;
                 $cliente->nombre            = $form_nombre;
                 $cliente->apellido          = $form_apellido;
                 $cliente->fecha_nacimiento  = NULL;
                 $cliente->telefono1         = $form_telefono1;
                 $cliente->telefono2         = $form_telefono2;
                 $cliente->correo            = $form_correo;
                 $cliente->pregunta1         = NULL;
                 $cliente->respuesta1        = NULL;
                 $cliente->pregunta2         = NULL;
                 $cliente->respuesta2        = NULL;
                 $cliente->pregunta3         = NULL;
                 $cliente->respuesta3        = NULL;
                 $cliente->email             = NULL;
                 $cliente->resp_email        = NULL;
                 $cliente->capacitacion      = $form_capacitacion;
                 $cliente->codigo            = $codigo;
                 $cliente->fecha_instalacion = $form_fecha_instalacion;
                 $cliente->fecha_emision_protocolo = $form_fecha_emision_protocolo;
                 $cliente->fecha_capacitacion      = $form_fecha_capacitacion;
                 // Valor de activación de código por defecto
                 $cliente->activacion_codigo = 0;

                 $cliente->save();

                 if ($cliente) {
                     $mensaje = array('Mensaje' => 'Cliente agregado correctamente!');
                 } else {
                     $mensaje = array('Mensaje' => 'Error en agregar cliente!');
                 }

                 return $mensaje;

            }else{

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
        $cliente = Cliente::find($id);
        $id_cliente             = $cliente->id;
        $estado                 = $cliente->estado_id;
        $proyecto_id            = $cliente->proyecto_id;
        $nombre_cliente         = $cliente->nombre;
        $apellido_cliente       = $cliente->apellido;
        $direccion_cliente      = $cliente->vivienda;
        $telefono_cliente       = $cliente->telefono1;
        $correo_cliente         = $cliente->correo;
        $capacitacion_cliente   = $cliente->capacitacion;
        $codigo_cliente         = $cliente->codigo;

        return Response::json(array(
            'id_cliente'            => $id_cliente,
            'estado'                => $estado,
            'proyecto_id'           => $proyecto_id,
            'nombre_cliente'        => $nombre_cliente,
            'apellido_cliente'      => $apellido_cliente,
            'direccion_cliente'     => $direccion_cliente,
            'telefono_cliente'      => $telefono_cliente,
            'correo_cliente'        => $correo_cliente,
            'capacitacion_cliente'  => $capacitacion_cliente,
            'codigo_cliente'        => $codigo_cliente
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $cliente = Cliente::find($id);
        $id_cliente         = $cliente->id;
        $nombre_cliente     = $cliente->nombre;
        $apellido_cliente   = $cliente->apellido;
        $direccion_cliente  = $cliente->vivienda;
        $correo_cliente     = $cliente->correo;

        return Response::json(array(
            'id_cliente'        => $id_cliente,
            'nombre_cliente'    => $nombre_cliente,
            'apellido_cliente'  => $apellido_cliente,
            'direccion_cliente' => $direccion_cliente,
            'correo_cliente'    => $correo_cliente
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
        $edit_nombre_cliente    = $request->input('edit_nombre_cliente');
        $edit_apellido_cliente  = $request->input('edit_apellido_cliente');
        $edit_direccion_cliente = $request->input('edit_direccion_cliente');
        $edit_correo_cliente    = $request->input('edit_correo_cliente');

        if (empty($edit_nombre_cliente) || empty($edit_apellido_cliente) || empty($edit_direccion_cliente) || empty($edit_correo_cliente)) {
            return Response::json('datosVacios');
        } else {
            $cliente = Cliente::find($id);
            $cliente->nombre        = $edit_nombre_cliente;
            $cliente->apellido      = $edit_apellido_cliente;
            $cliente->vivienda      = $edit_direccion_cliente;
            $cliente->correo        = $edit_correo_cliente;
            $comprobar_edit         = $cliente->save();

            if ($comprobar_edit) {
                return Response::json(0);
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
    public function destroy($id)
    {
        //
    }

    public function buscarPorNombre(Request $request)
    {
        $nombre = $request->input('nombre_cliente');
        $datos =[];

        $clientes = Cliente::where('nombre', 'like', '%'.$nombre.'%')
                   ->orWhere('apellido', 'like', '%'.$nombre.'%')
                   ->orWhere('observacion', 'like', '%'.$nombre.'%')
                   ->orWhere('correo','like', '%'.$nombre.'%')
                ->get();

        foreach ($clientes as $cliente) {
            $proyecto = Proyecto::find($cliente->proyecto_id);
            $inmobiliaria = Inmobiliaria::find($proyecto->inmobiliaria_id);

            $datos[] = array(

                'id' => $cliente->id,
                'nombre' => $cliente->nombre,
                'apellido' => $cliente->apellido,
                'direccion' => $cliente->vivienda,
                'telefono' => $cliente->telefono1,
                'email' => $cliente->email,
                'observacion' => $cliente->observacion,
                'pdf' => $cliente->pdf_protocolo,
                'inmobiliaria' => $inmobiliaria->nombre,
                'proyecto' => $proyecto->nombre

            );
        }

        return $datos;

    }    

    public function nuevo_cliente(Request $request){

        $form_proyecto_id               = $request->input('form_proyecto');
        $form_direccion                 = $request->input('form_direccion');
        $form_num_documento             = $request->input('form_num_documento');
        $form_nombre                    = $request->input('form_nombre');
        $form_apellido                  = $request->input('form_apellido');
        $form_contacto                  = $request->input('form_contacto');
        $form_correo                    = $request->input('form_correo');
        $form_telefono1                 = $request->input('form_telefono1');
        $form_telefono2                 = $request->input('form_telefono2');
        $form_estado                    = $request->input('form_estado');
        $form_capacitacion              = $request->input('form_capacitacion');
        $form_fecha_instalacion         = $request->input('form_fecha_instalacion');
        $form_fecha_emision_protocolo   = $request->input('form_fecha_emision_protocolo');
        $form_fecha_capacitacion        = $request->input('form_fecha_capacitacion');
        // Armar codigo
        $codigo = $form_direccion . "/" . $form_num_documento;
        $proyecto_id = (int)$form_proyecto_id;
        $estado_id = (int)$form_estado;

        $validar_direccion = Cliente::where('vivienda', $form_direccion)->get();
        $cantidad_viviendas = Proyecto::where('id',$form_proyecto_id)->value('cantidad');
        $validar_cantidad_viviendas = Cliente::where('proyecto_id',$form_proyecto_id)->count();



        if(sizeof($validar_direccion) == 0){
         $validar_cantidad_viviendas = $validar_cantidad_viviendas+1;
            if($validar_cantidad_viviendas <= $cantidad_viviendas){
                 // Insertar cliente
                 $cliente = new Cliente();
                 $cliente->estado_id         = $estado_id;
                 $cliente->proyecto_id       = $proyecto_id;
                 $cliente->vivienda          = $form_direccion;
                 $cliente->num_documento     = $form_num_documento;
                 $cliente->nombre            = $form_nombre;
                 $cliente->apellido          = $form_apellido;
                 $cliente->fecha_nacimiento  = NULL;
                 $cliente->telefono1         = $form_telefono1;
                 $cliente->telefono2         = $form_telefono2;
                 $cliente->correo            = $form_correo;
                 $cliente->pregunta1         = NULL;
                 $cliente->respuesta1        = NULL;
                 $cliente->pregunta2         = NULL;
                 $cliente->respuesta2        = NULL;
                 $cliente->pregunta3         = NULL;
                 $cliente->respuesta3        = NULL;
                 $cliente->email             = NULL;
                 $cliente->resp_email        = NULL;
                 $cliente->capacitacion      = $form_capacitacion;
                 $cliente->codigo            = $codigo;
                 $cliente->fecha_instalacion = $form_fecha_instalacion;
                 $cliente->fecha_emision_protocolo = $form_fecha_emision_protocolo;
                 $cliente->fecha_capacitacion      = $form_fecha_capacitacion;
                 // Valor de activación de código por defecto
                 $cliente->activacion_codigo = 0;

                 $cliente->save();

                 if ($cliente) {
                     $mensaje = array('Mensaje' => 'Cliente agregado correctamente!');
                 } else {
                     $mensaje = array('Mensaje' => 'Error en agregar cliente!');
                 }

                 return $mensaje;

            }else{

                return 1;

            }

        }else{

           return 0;

        }

    }



    public function crearProtocoloPdf($ultimo_hc)
    {
        
        
        //$datos = $request->input('datos');

        //$datos = json_decode($datos);

        
            
        //$cliente_id = $datos->cliente_id;
        //$direccion_id = $datos->direccion_id;
        //$ultimo_id_hc_ingresado = $datos->ultimo_id_hc_ingresado;
        //$id_tecnico = $datos->id_tecnico;
        //$nombre_tecnico = $datos->nombre_tecnico;
        //$apellido_tecnico = $datos->apellido_tecnico;
        
        $datosPdf = DatoPdf::where('ultimo_id_hc_ingresado', $ultimo_hc)->get();




        foreach ($datosPdf as $data) {

            $contPregunta1 = $data->pregunta1;
            $contPregunta2 = $data->pregunta2;
            $contPregunta3 = $data->pregunta3;
            $contPregunta4 = $data->pregunta4;
            $contPregunta5 = $data->pregunta5;
            $contPregunta6 = $data->pregunta6;
            $contPregunta7 = $data->pregunta7;
            $contPregunta8 = $data->pregunta8;
            $contPregunta9 = $data->pregunta9;
            $contPregunta10 = $data->pregunta10; 
            $contPregunta11 = $data->pregunta11;
            $contPregunta12 = $data->pregunta12;
            $contPregunta13 = $data->pregunta13;
            $contPregunta14 = $data->pregunta14;
            $contPregunta15 = $data->pregunta15;
            $contPregunta16 = $data->pregunta16;
            $contPregunta17 = $data->pregunta17;
            $numeroProtocoloCliente = $data->numeroProtocoloCliente;
            $hora_inicio_protocolo = $data->hora_inicio_protocolo;
            $hora_termino_protocolo = $data->hora_termino_protocolo;
            $cliente_id = $data->cliente_id;
            $direccion_id = $data->direccion_id;
            $id_tecnico = $data->tecnico_id;
            $ultimo_id_hc_ingresado = $ultimo_hc;
            $comentarioProtocoloCliente = $data->comentarioProtocoloCliente;
            $nombre_tecnico = $data->nombre_tecnico;
            $apellido_tecnico = $data->apellido_tecnico;
            $nombre_cliente = $data->nombre_cliente;
            $apellido_cliente = $data->apellido_cliente;
            $telefono_cliente = $data->telefono_cliente;
            $email_cliente = $data->email_cliente;
            $rut_cliente = $data->rut_cliente;
            $inmobiliaria = $data->inmobiliaria;
            $proyecto = $data->proyecto;
            
        }


        // Variables de session

        $get_direccion_cliente = Proyecto::join('clientes', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.id', $cliente_id)
                                ->value('direccion');
        $direccion_cliente = $get_direccion_cliente;

        // Get current ID user
        $datos_tecnico = User::where('id', $id_tecnico)->get();

        // Obtener los datos del cliente
        //$get_cliente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
        //            ->join('contratos', 'proyectos.id', 'contratos.proyecto_id')
        //            ->where('clientes.id', $cliente_id)
        //            ->select('clientes.id as id','clientes.num_documento as num_documento','clientes.nombre as nombre_cliente','clientes.apellido as apellido','clientes.correo as correo','clientes.telefono1 as telefono1','proyectos.direccion as direccion','clientes.firma_cl','contratos.comuna_proyecto as comuna','proyectos.nombre as proyecto','contratos.nombre_inmobiliaria as inmobiliaria', 'clientes.vivienda as vivienda')
        //            ->get();

        $get_cliente = Cliente::find($cliente_id);

        

        foreach ($get_cliente as $value) {
            $id_cliente = $cliente_id;
            $nombre_receptor = $nombre_cliente;
            $apellido_receptor = $apellido_cliente;
            $email_cliente = $email_cliente;
            $proyecto = $proyecto;

        }

        $vivienda = $get_cliente->vivienda;

        $firma_cl = $get_cliente->firma_cl;

        $get_cliente2[] = array(

            "nombres" => $nombre_receptor,
            "apellidos" => $apellido_receptor,
            "email" => $email_cliente,
            "telefono" => $telefono_cliente,
            "id" => $id_cliente

        );
        

        // Obtener el listado de las preguntas
        $preguntas = Pregunta::all();

        $join_hc_device = Device::join('hcs', 'devices.fk_id_auto_hc', 'hcs.id')
                            ->where('hcs.id', $ultimo_id_hc_ingresado)
                            ->select('devices.id')
                            ->get();

        foreach ($join_hc_device as $value) {
            $id_hc_dev = $value->id;
        }

        $data_hc_dev = Device::find($id_hc_dev);

        // Data para armar el PDF
        $data = [
                    'title' => 'PDF Protocolo TAMED',
                    'get_cliente' => $get_cliente2,
                    'datos_tecnico' => $datos_tecnico,
                    'data_device_hc' => json_decode($data_hc_dev->data),
                    'preguntas' => $preguntas,
                    'contPregunta1' => $contPregunta1,
                    'contPregunta2' => $contPregunta2,
                    'contPregunta3' => $contPregunta3,
                    'contPregunta4' => $contPregunta4,
                    'contPregunta5' => $contPregunta5,
                    'contPregunta6' => $contPregunta6,
                    'contPregunta7' => $contPregunta7,
                    'contPregunta8' => $contPregunta8,
                    'contPregunta9' => $contPregunta9,
                    'contPregunta10' => $contPregunta10,
                    'contPregunta11' => $contPregunta11,
                    'contPregunta12' => $contPregunta12,
                    'contPregunta13' => $contPregunta13,
                    'contPregunta14' => $contPregunta14,
                    'contPregunta15' => $contPregunta15,
                    'contPregunta16' => $contPregunta16,
                    'contPregunta17' => $contPregunta17,
                    'numeroProtocoloCliente' => $numeroProtocoloCliente,
                    'comentarioProtocoloCliente' => $comentarioProtocoloCliente,
                    'hora_inicio_protocolo' => $hora_inicio_protocolo,
                    'hora_termino_protocolo' => $hora_termino_protocolo,
                    'direccion_cliente' => $direccion_cliente,
                    'firma_cl' => $firma_cl,
                    'rut_cliente' => $rut_cliente
                ];     



        $pdf = PDF::loadView('myPDF', $data);



        //$pdf = PDF::loadView('myPDF', $data);

        //return $pdf->download('das.pdf');
        $fecha_hora = date('Ymd_Hi');

        $path = public_path().'/pdf_inmobiliarias/';

        //$pdf->save('c:/laragon/www/protocolos/public/pdf_protocolo_store/'.$numeroProtocoloCliente.'_'.$fecha_hora.'_'.$nombre_tecnico.'_'.$apellido_tecnico.'.pdf')->stream($numeroProtocoloCliente.'.pdf');

        $nombre_pdf = $proyecto."_vivienda_nro_".$vivienda.'.pdf';
        $ruta_completa_pdf = '';
        
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

            $ruta_completa_pdf = $path_pdf.$nombre_pdf;
            $pdf->save($ruta_completa_pdf);
            $pdf->stream($numeroProtocoloCliente.'.pdf');
            //Actualizar cliente
            Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
            //Guardar los pdfs del cliente
            $pdf_del_cliente = new Pdfprotocoloscliente();
            $pdf_del_cliente->cliente_id = $cliente_id;
            $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/AC_CANTAUCO/'.$nombre_pdf;
            $pdf_del_cliente->nombre_pdf = $nombre_pdf;
            $pdf_del_cliente->save();
//
        } else if($get_inmobiliaria_id === 74){
            
            $path_pdf = $path.'BARRIO_ALAMEDA/';
            $ruta_completa_pdf = $path_pdf.$nombre_pdf;
            $pdf->save($ruta_completa_pdf);
            $pdf->stream($numeroProtocoloCliente.'.pdf');
            //Actualizar cliente
            Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
            //Guardar los pdfs del cliente
            $pdf_del_cliente = new Pdfprotocoloscliente();
            $pdf_del_cliente->cliente_id = $cliente_id;
            $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/BARRIO_ALAMEDA/'.$nombre_pdf;
            $pdf_del_cliente->nombre_pdf = $nombre_pdf;
            $pdf_del_cliente->save();
//
        } else if($get_inmobiliaria_id === 27){
            
            $path_pdf = $path.'DA_CANTAUCO/';
           $ruta_completa_pdf = $path_pdf.$nombre_pdf;
            $pdf->save($ruta_completa_pdf);
            $pdf->stream($numeroProtocoloCliente.'.pdf');
            //Actualizar cliente
            Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
            //Guardar los pdfs del cliente
            $pdf_del_cliente = new Pdfprotocoloscliente();
            $pdf_del_cliente->cliente_id = $cliente_id;
            $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/DA_CANTAUCO/'.$nombre_pdf;
            $pdf_del_cliente->nombre_pdf = $nombre_pdf;
            $pdf_del_cliente->save();
//
        } else if($get_inmobiliaria_id === 24){
            
            $path_pdf = $path.'INMOBILIARIA_GUZMAN/';
           $ruta_completa_pdf = $path_pdf.$nombre_pdf;
            $pdf->save($ruta_completa_pdf);
            $pdf->stream($numeroProtocoloCliente.'.pdf');
            //Actualizar cliente
            Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
            //Guardar los pdfs del cliente
            $pdf_del_cliente = new Pdfprotocoloscliente();
            $pdf_del_cliente->cliente_id = $cliente_id;
            $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/INMOBILIARIA_GUZMAN/'.$nombre_pdf;
            $pdf_del_cliente->nombre_pdf = $nombre_pdf;
            $pdf_del_cliente->save();
//
        } else if($get_inmobiliaria_id === 32){
            
            $path_pdf = $path.'SAN_ISIDRO/';
            $ruta_completa_pdf = $path_pdf.$nombre_pdf;
            $pdf->save($ruta_completa_pdf);
            $pdf->stream($numeroProtocoloCliente.'.pdf');
            //Actualizar cliente
            Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
            //Guardar los pdfs del cliente
            $pdf_del_cliente = new Pdfprotocoloscliente();
            $pdf_del_cliente->cliente_id = $cliente_id;
            $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/SAN_ISIDRO/'.$nombre_pdf;
            $pdf_del_cliente->nombre_pdf = $nombre_pdf;
            $pdf_del_cliente->save();
//
        } else if($get_inmobiliaria_id === 9){
            
            $path_pdf = $path.'VIVIENDAS_2000/';
            $ruta_completa_pdf = $path_pdf.$nombre_pdf;
            $pdf->save($ruta_completa_pdf);
            $pdf->stream($numeroProtocoloCliente.'.pdf');
            //Actualizar cliente
            Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
            //Guardar los pdfs del cliente
            $pdf_del_cliente = new Pdfprotocoloscliente();
            $pdf_del_cliente->cliente_id = $cliente_id;
            $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/VIVIENDAS_2000/'.$nombre_pdf;
            $pdf_del_cliente->nombre_pdf = $nombre_pdf;
            $pdf_del_cliente->save();
//
        } else if($get_inmobiliaria_id === 72){
            
            $path_pdf = $path.'NAPOLEON/';
            $ruta_completa_pdf = $path_pdf.$nombre_pdf;
            $pdf->save($ruta_completa_pdf);
            $pdf->stream($numeroProtocoloCliente.'.pdf');
            //Actualizar cliente
            Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
            //Guardar los pdfs del cliente
            $pdf_del_cliente = new Pdfprotocoloscliente();
            $pdf_del_cliente->cliente_id = $cliente_id;
            $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/NAPOLEON/'.$nombre_pdf;
            $pdf_del_cliente->nombre_pdf = $nombre_pdf;
            $pdf_del_cliente->save();
//
        } else {
            $path_pdf = $path.$nombre_inmobiliaria.'/';
            $ruta_completa_pdf = $path_pdf.$nombre_pdf;
            $pdf->save($ruta_completa_pdf);
            $pdf->stream($numeroProtocoloCliente.'.pdf');

            //Actualizar cliente
            Cliente::where('id', $cliente_id)->update(['pdf_protocolo' => $path_pdf]);
            //Guardar los pdfs del cliente
            $pdf_del_cliente = new Pdfprotocoloscliente();
            $pdf_del_cliente->cliente_id = $cliente_id;
            $pdf_del_cliente->pdf_protocolo = '/pdf_inmobiliarias/'.$nombre_inmobiliaria.'/'.$nombre_pdf;
            $pdf_del_cliente->nombre_pdf = $nombre_pdf;
            $pdf_del_cliente->save();
        }

  

        if($pdf){

            //$pdfClave = PDF::loadView('myPDF', $data);
            //$s = str_replace("-", '', $rut_cliente);
            //$contraseña = str_replace('.', '', $s);
            //$pdfClave->SetProtection(array(), $contraseña, 'MyPassword');
            //$nombre_pdf = $proyecto."_vivienda_nro_".$vivienda.'.pdf';

            //$path_pdf = $path.$nombre_inmobiliaria.'/';
            //$ruta_completa_pdf2 = $path_pdf.$nombre_pdf;
            //$pdfClave->save($ruta_completa_pdf2);
            //return $ruta_completa_pdf2;
            //return $path_pdf;

            

            $insert_protocolo = new Protocolo;
            $insert_protocolo->numero_protocolo = $numeroProtocoloCliente;
            $insert_protocolo->comentario = $comentarioProtocoloCliente;
            $insert_protocolo->protocolo = $ruta_completa_pdf;
            $insert_protocolo->nombre_receptor = $nombre_receptor.' '.$apellido_receptor;
            $insert_protocolo->rut_receptor = null;
            $insert_protocolo->firma_rc = $firma_cl;
            $insert_protocolo->fecha = date('Y-m-d H:i:s');
            $insert_protocolo->cliente_id = $cliente_id;
            $insert_protocolo->user_id = $id_tecnico;
            $comprobar_add = $insert_protocolo->save();
            $email_tecnico = $datos_tecnico[0]['email'];

            $datosEmail = array(
                'email'         => $email_tecnico,
                'protocolo_id' => $insert_protocolo->id,
                'cliente_id' => $id_cliente,
                'nombre_cliente' => $nombre_receptor,
                'url_protocolo' => 'https://protocolos.tamed.global',
                'pdf_generado' => $ruta_completa_pdf,
                'email_cliente' => $email_cliente
            );

            Mail::send('emails.mail_protocolo', $datosEmail, function($message) use ($datosEmail){
                $message->from('instalaciones@tamed.global', 'PDF Protocolo');
                $message->to($datosEmail['email'])->subject("PDF Protocolo")->attach($datosEmail['pdf_generado']);
            });

           Mail::send('emails.mail_protocolo', $datosEmail, function($message) use ($datosEmail){
               $message->from('instalaciones@tamed.global', 'PDF Protocolo');
               $message->to($datosEmail['email_cliente'])->subject("PDF Protocolo TAMED")->attach($datosEmail['pdf_generado']);
           });

           Mail::send('emails.mail_protocolo', $datosEmail, function($message) use ($datosEmail){
               $message->from('instalaciones@tamed.global', 'PDF Protocolo');
               $message->to('instalaciones@tamed.global')->subject("Protocolo ".$nombre_receptor." ".$apellido_receptor." ".$proyecto." vivienda ".$vivienda)->attach($datosEmail['pdf_generado']);
           });


            if($comprobar_add){
                $insert_protocolo_id = $insert_protocolo->id;
                $pdf_attach = $insert_protocolo->protocolo;
                // Registrar preguntas y respuestas
                foreach($preguntas as $pr){
                    if($pr->id === 1){
                        $preguntas_respuestas = new Preguntasrespuestas;
                        $preguntas_respuestas->pregunta_id = 1;
                        $preguntas_respuestas->respuesta_id = $contPregunta1;
                        $preguntas_respuestas->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas->save();
                    }
                    if($pr->id === 2){
                        $preguntas_respuestas2 = new Preguntasrespuestas;
                        $preguntas_respuestas2->pregunta_id = 2;
                        $preguntas_respuestas2->respuesta_id = $contPregunta2;
                        $preguntas_respuestas2->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas2->save();
                    }
                    if($pr->id === 3){
                        $preguntas_respuestas3 = new Preguntasrespuestas;
                        $preguntas_respuestas3->pregunta_id = 3;
                        $preguntas_respuestas3->respuesta_id = $contPregunta3;
                        $preguntas_respuestas3->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas3->save();
                    }
                    if($pr->id === 4){
                        $preguntas_respuestas4 = new Preguntasrespuestas;
                        $preguntas_respuestas4->pregunta_id = 4;
                        $preguntas_respuestas4->respuesta_id = $contPregunta4;
                        $preguntas_respuestas4->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas4->save();
                    }
                    if($pr->id === 5){
                        $preguntas_respuestas5 = new Preguntasrespuestas;
                        $preguntas_respuestas5->pregunta_id = 5;
                        $preguntas_respuestas5->respuesta_id = $contPregunta5;
                        $preguntas_respuestas5->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas5->save();
                    }
                    if($pr->id === 6){
                        $preguntas_respuestas6 = new Preguntasrespuestas;
                        $preguntas_respuestas6->pregunta_id = 6;
                        $preguntas_respuestas6->respuesta_id = $contPregunta6;
                        $preguntas_respuestas6->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas6->save();
                    }
                    if($pr->id === 7){
                        $preguntas_respuestas7 = new Preguntasrespuestas;
                        $preguntas_respuestas7->pregunta_id = 7;
                        $preguntas_respuestas7->respuesta_id = $contPregunta7;
                        $preguntas_respuestas7->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas7->save();
                    }
                    if($pr->id === 8){
                        $preguntas_respuestas8 = new Preguntasrespuestas;
                        $preguntas_respuestas8->pregunta_id = 8;
                        $preguntas_respuestas8->respuesta_id = $contPregunta8;
                        $preguntas_respuestas8->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas8->save();
                    }
                    if($pr->id === 9){
                        $preguntas_respuestas9 = new Preguntasrespuestas;
                        $preguntas_respuestas9->pregunta_id = 9;
                        $preguntas_respuestas9->respuesta_id = $contPregunta9;
                        $preguntas_respuestas9->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas9->save();
                    }
                    if($pr->id === 10){
                        $preguntas_respuestas10 = new Preguntasrespuestas;
                        $preguntas_respuestas10->pregunta_id = 10;
                        $preguntas_respuestas10->respuesta_id = $contPregunta10;
                        $preguntas_respuestas10->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas10->save();
                    }
                    if($pr->id === 11){
                        $preguntas_respuestas11 = new Preguntasrespuestas;
                        $preguntas_respuestas11->pregunta_id = 11;
                        $preguntas_respuestas11->respuesta_id = $contPregunta11;
                        $preguntas_respuestas11->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas11->save();
                    }
                    if($pr->id === 12){
                        $preguntas_respuestas12 = new Preguntasrespuestas;
                        $preguntas_respuestas12->pregunta_id = 12;
                        $preguntas_respuestas12->respuesta_id = $contPregunta12;
                        $preguntas_respuestas12->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas12->save();
                    }
                    if($pr->id === 13){
                        $preguntas_respuestas13 = new Preguntasrespuestas;
                        $preguntas_respuestas13->pregunta_id = 13;
                        $preguntas_respuestas13->respuesta_id = $contPregunta13;
                        $preguntas_respuestas13->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas13->save();
                    }
                    if($pr->id === 14){
                        $preguntas_respuestas14 = new Preguntasrespuestas;
                        $preguntas_respuestas14->pregunta_id = 14;
                        $preguntas_respuestas14->respuesta_id = $contPregunta14;
                        $preguntas_respuestas14->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas14->save();
                    }
                    if($pr->id === 15){
                        $preguntas_respuestas15 = new Preguntasrespuestas;
                        $preguntas_respuestas15->pregunta_id = 15;
                        $preguntas_respuestas15->respuesta_id = $contPregunta15;
                        $preguntas_respuestas15->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas15->save();
                    }
                    if($pr->id === 16){
                        $preguntas_respuestas16 = new Preguntasrespuestas;
                        $preguntas_respuestas16->pregunta_id = 16;
                        $preguntas_respuestas16->respuesta_id = $contPregunta16;
                        $preguntas_respuestas16->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas16->save();
                    }
                    if($pr->id === 17){
                        $preguntas_respuestas17 = new Preguntasrespuestas;
                        $preguntas_respuestas17->pregunta_id = 17;
                        $preguntas_respuestas17->respuesta_id = $contPregunta17;
                        $preguntas_respuestas17->protocolo_id = $insert_protocolo_id;
                        $preguntas_respuestas17->save();
                    }
                }//fin foreach

                
            return $ruta_completa_pdf;
          } else {
              return 'Error insert protocolo';
          } // Fin if comprobar add
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

}
