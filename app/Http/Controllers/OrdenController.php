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
use App\Actividadordentrabajo;
use App\Ordentrabajo;
use App\Instalador;
use App\Materialutilizado;
use App\Reportefallo;
use App\Cliente;
use DB;


class OrdenController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fecha_pautada                = $request->input('fecha_pautada');
        $hora_pautada                 = $request->input('hora_pautada');
        $tipo_trabajo                 = $request->input('tipo_trabajo');
        $responsable_asignado         = $request->input('responsable_asignado');
        $numero_orden                 = $request->input('numero_orden');
        $nombre_cliente               = $request->input('nombre_cliente');
        $direccion_cliente            = $request->input('direccion_cliente');
        $responsable_ultima_visita    = $request->input('responsable_ultima_visita');
        $codigo_interno               = $request->input('codigo_interno');
        $obra_gruesa                  = $request->input('obra_gruesa');
        $mudanza                      = $request->input('mudanza');
        $terminaciones_menores        = $request->input('terminaciones_menores');
        $habitada                     = $request->input('habitada');
        $observacion_visita_anterior  = $request->input('observacion_visita_anterior');
        $requerimientos_adicionales   = $request->input('requerimientos_adicionales');
        $cliente_id                   = $request->input('cliente_id');
        $comprobarReportes            = $request->input('comprobarReportes');
        $comprobarActividades         = $request->input('comprobarActividades');
        $comprobarMateriales          = $request->input('comprobarMateriales');
        $arrayActividades             = $request->input('arrayActividades');
        $arrayReporteFalla            = $request->input('arrayReporteFalla');
        $arrayMaterialesUtilizados    = $request->input('arrayMaterialesUtilizados');

        $nueva_orden = new Ordentrabajo();

        $nueva_orden->fecha_pautada = $fecha_pautada;
        $nueva_orden->hora_pautada = $hora_pautada;
        $nueva_orden->tipo_trabajo = $tipo_trabajo;
        $nueva_orden->responsable_asignado_id = $responsable_asignado;
        $nueva_orden->numero_orden = $numero_orden;
        $nueva_orden->nombre_cliente = $nombre_cliente;
        $nueva_orden->direccion_cliente = $direccion_cliente;
        $nueva_orden->responsable_ultima_visita_id = $responsable_ultima_visita;
        $nueva_orden->codigo_interno = $codigo_interno;
        $nueva_orden->obra_gruesa = $obra_gruesa;
        $nueva_orden->mudanza = $mudanza;
        $nueva_orden->terminaciones_menores = $terminaciones_menores;
        $nueva_orden->habitada = $habitada;
        $nueva_orden->observaciones_visita_anterior = $observacion_visita_anterior;
        $nueva_orden->requerimientos_adicionales = $requerimientos_adicionales;
        $nueva_orden->cliente_id = $cliente_id;
        $nueva_orden->actualizado = 0;

        $nueva_orden->save();

        $ultimo_insert_orden = $nueva_orden->id;


        if($comprobarMateriales != "no"){

        $data_materiales = [];

            foreach ($arrayMaterialesUtilizados as $material) {

              if($material['descripcion'] == "" && $material['cantidades'] == ""){

                $nada = 0;

              }else{

                $data_materiales[] = array(
                    "descripcion" => $material['descripcion'],
                    "unidad" => $material['unidades'],
                    "cantidades" => $material['cantidades'],
                    "orden_id" => $ultimo_insert_orden,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );     

              }         

            }

            Materialutilizado::insert($data_materiales); 

        }

      if($comprobarActividades != "no"){

         $data_actividades = [];

          foreach ($arrayActividades as $actividad) {

            if($actividad['actividad'] == "" && $actividad['observacion'] == "" ){

              $nada = 0;

            }else{

              $data_actividades[] = array(
                  "actividad" => $actividad['actividad'],
                  "observacion" => $actividad['observacion'],
                  "ejecutado" => $actividad['ejecutado'],
                  "orden_id" => $ultimo_insert_orden,
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
              );        

            }

          }
          Actividadordentrabajo::insert($data_actividades); 

      }

      $comprobarInsert = $nueva_orden->save();

      if($comprobarInsert){
          return 1;
      }else{
          return 0;
      }



        
    }

    public function datos_modal($id)
    {

        $cliente = Cliente::find($id);

        $nombre = $cliente->nombre;
        $apellido = $cliente->apellido;
        $id_proyecto = $cliente->proyecto_id;

        $direccion_proyecto = Proyecto::where('id', $id_proyecto)->value('direccion');
        $vivienda_cliente = $cliente->vivienda;

        $nombre_completo = $nombre." ".$apellido;
        $direccion_cliente = $direccion_proyecto."/".$vivienda_cliente;

        $visitas_anteriores = Ordentrabajo::where('cliente_id',$id)->count();
        $count_ordenes = Ordentrabajo::count() + 1;

        $ultima_visita = Ordentrabajo::where('cliente_id', $id)->orderBy('id', 'desc')->take(1)->value('requerimientos_adicionales');

        $array_datos = [];

        $array_datos = array(

            'nombre_cliente' => $nombre_completo,
            'direccion_cliente' => $direccion_cliente,
            'visitas_anteriores' => $visitas_anteriores,
            'count_ordenes' => $count_ordenes,
            'comentario_visita_anterior' => $ultima_visita

        );

        return $array_datos;

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
    public function edit($id, Request $request)
    {
        
        $nuevaFechaOrden              = $request->input('nuevaFechaOrden');    
        $nuevaHoraOrden               = $request->input('nuevaHoraOrden');    
        $nuevoResponableAsignado      = $request->input('nuevoResponableAsignado');    
        $nuevoTipoOrden               = $request->input('nuevoTipoOrden');    
        $nuevoResponsableUltimaVisita = $request->input('nuevoResponsableUltimaVisita');  
        $nuevoCodigoInterno           = $request->input('nuevoCodigoInterno');  
        $nuevaCondicionInstalacionOG  = $request->input('nuevaCondicionInstalacionOG');    
        $nuevaCondicionInstalacionTM  = $request->input('nuevaCondicionInstalacionTM');    
        $nuevaCondicionInstalacionH   = $request->input('nuevaCondicionInstalacionH');    
        $nuevaCondicionInstalacionM   = $request->input('nuevaCondicionInstalacionM');   
        $arrayNuevasActividades       = $request->input('arrayNuevasActividades');    
        $arrayNuevosMateriales        = $request->input('arrayNuevosMateriales');   

        $orden = Ordentrabajo::find($id);

        $orden->fecha_pautada = $nuevaFechaOrden;
        $orden->hora_pautada = $nuevaHoraOrden;
        $orden->tipo_trabajo = $nuevoTipoOrden;
        $orden->responsable_asignado_id = $nuevoResponableAsignado;
        $orden->responsable_ultima_visita_id = $nuevoResponsableUltimaVisita;
        $orden->codigo_interno = $nuevoCodigoInterno;
        $orden->obra_gruesa = $nuevaCondicionInstalacionOG;
        $orden->mudanza = $nuevaCondicionInstalacionM;
        $orden->terminaciones_menores = $nuevaCondicionInstalacionTM;
        $orden->habitada = $nuevaCondicionInstalacionH;

        $orden->save();

        if($arrayNuevasActividades != "" ){

          $data_actividades = [];

          foreach ($arrayNuevasActividades as $actividad) {

            if($actividad['actividad'] == ""){

              $nada = 0;

            }else{

              $data_actividades[] = array(
                  "actividad" => $actividad['actividad'],
                  "observacion" => $actividad['observacion'],
                  "ejecutado" => $actividad['ejecutado'],
                  "orden_id" => $id,
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s')
              );        

            }

          }
          Actividadordentrabajo::insert($data_actividades); 

        }

        if($arrayNuevosMateriales != ""){

            $data_materiales = [];

            foreach ($arrayNuevosMateriales as $material) {

              if($material['descripcion'] == "" && $material['cantidades'] == ""){

                $nada = 0;

              }else{

                $data_materiales[] = array(
                    "descripcion" => $material['descripcion'],
                    "unidad" => $material['unidades'],
                    "cantidades" => $material['cantidades'],
                    "orden_id" => $id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );     

              }         

            }

            Materialutilizado::insert($data_materiales); 


        }

        if($orden->save()){

          return 1;
        }else{

          return 0;
        }

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

    public function listado_ordenes($id){

        $ordenes = Ordentrabajo::where('cliente_id',$id)->get();

        return $ordenes;

    }

    public function ver_orden($id)
    {

        $orden = Ordentrabajo::find($id);

        $instalador = Instalador::where('id', $orden->responsable_asignado_id)->value('nombre_instalador');
        $instalador_id = Instalador::where('id', $orden->responsable_asignado_id)->value('id');
        $instalador_visita_anterior = Instalador::where('id', $orden->responsable_ultima_visita_id)->value('nombre_instalador');
        $instalador_visita_anterior_id = Instalador::where('id', $orden->responsable_ultima_visita_id)->value('id');

        $countVisitasAnteriores = Ordentrabajo::where('cliente_id', $orden->cliente_id)->count();

        $actividades = Actividadordentrabajo::where('orden_id', $id)->get();

        $materiales = Materialutilizado::where('orden_id', $id)->get();

        $fallos = Reportefallo::where('orden_id',$id)->get();

        $arrayDatos = array('orden' => $orden, 'actividades' => $actividades, 'materiales' => $materiales, 'instalador' => $instalador,'instalador_id' => $instalador_id, 'visitas_anteriores' => $countVisitasAnteriores, 'instalador_visita_anterior' => $instalador_visita_anterior, 'instalador_visita_anterior_id' => $instalador_visita_anterior_id, 'fallos' => $fallos);

        return $arrayDatos;

    }
}
