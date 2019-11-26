<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmobiliaria;
use App\Proyecto;
use App\Actividadordentrabajo;
use App\Ordentrabajo;
use App\Instalador;
use App\Materialutilizado;
use App\Reportefallo;
use App\Cliente;
use App\Event;
use App\Quota;
use Response;
use DB;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Calendar;

class InstaladorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id_instalador = Instalador::where('nombre_instalador', auth()->user()->name)->value('id');


        $datos = Ordentrabajo::join('clientes', 'ordenestrabajo.cliente_id', 'clientes.id')
                            ->join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->join('inmobiliarias', 'proyectos.inmobiliaria_id', 'inmobiliarias.id')
                            ->where('ordenestrabajo.responsable_asignado_id', $id_instalador)
                            ->where('ordenestrabajo.actualizado', 0)
                            ->select('ordenestrabajo.nombre_cliente as cliente', 'ordenestrabajo.direccion_cliente as direccion', 'inmobiliarias.nombre as inmobiliaria',
                            'proyectos.nombre as proyecto', 'ordenestrabajo.id as id_orden', 'ordenestrabajo.fecha_pautada as fecha', 'ordenestrabajo.hora_pautada as hora')->get();



        return view('home_instaladores')->with('datos', $datos);
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
    public function edit(Request $request)
    {
        $arrayReporteFalla = $request->input('arrayReporteFalla');
        $arrayActividades = $request->input('arrayActividades');
        $requerimientosAdicionales = $request->input('requerimientosAdicionales');
        $comprobarReportes = $request->input('comprobarReportes');
        $id_orden = $request->input('id_orden');
        $compActividad = "";
        $compFallo = "";

        foreach ($arrayActividades as $actividad) {

            $actividad1 = Actividadordentrabajo::find($actividad['id']);
            $actividad1->observacion = $actividad['observacion'];
            $actividad1->ejecutado = $actividad['ejecutado'];

            $actividad1->save();

            if($actividad1->save()){

            }else{
                $compActividad = 0;
            }

        }

        if($comprobarReportes != "no"){

            foreach ($arrayReporteFalla as $falla) {

                $nuevaFalla = new Reportefallo();

                $nuevaFalla->producto_servicio_falla = $falla['productoServicioFalla'];
                $nuevaFalla->descripcion_falla = $falla['descripcionFalla'];
                $nuevaFalla->orden_id = $id_orden;

                $nuevaFalla->save();

                if($nuevaFalla->save()){

                }else{
                    $compFallo = 0;
                }

            }

        }

        $orden = Ordentrabajo::find($id_orden);

        $orden->requerimientos_adicionales = $requerimientosAdicionales;
        $orden->actualizado = 1;

        $comprobar = $orden->save();


        if($comprobar){
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

    public function programarAgendaInstaladores($id_proyecto, $id_instalador){

        $user = $id_instalador;

        //trae el calendario del profesor con todos los eventos agendados
        $events = [];


        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                if(($value->id_instalador) == $user ){

                    if($value->start_date < now('America/Santiago')){
                        $color = '#89ea8f';
                        Event::where('id', $value->id)->update(['estado' => '1']);

                    }
                    else{
                        $color = $value->color;
                    }


                    $events[] = Calendar::event(
                        $value->title,
                        false,
                        new \DateTime($value->start_date),
                        new \DateTime($value->end_date),
                        0,
                        // Add color and link on event
                     [
                        // 'url' => route('detallesclase')."?idevento=".$value->id,
                        'color' => $color,
                     ]
                    );
                }

            }



        }
        $datos = Instalador::find($user);
        // $locale = App::getLocale();

            $calendar = Calendar::addEvents($events)->setOptions([
                'eventLimit'     => 4,
                'minTime' => '7:00',
                'maxTime' => '23:00',
                'lang' => 'es',
            ]);



        //notificaciones
        $date = Carbon::yesterday('America/Santiago');

        $quota = Quota::all();

        //listado de eventos agendado pero que aun no han sido tomados por un estudiante
        $eventosdisponibles = Event::where('id_cliente',null)->where('start_date','>',now('America/Santiago'))->where('id_instalador',$user)->get();

        //listado de clases agendadas por estudianta
        //$clasesagendadas = Event::join('class','class.events_id','events.id')->where('estudiante', '<>', null)->where('start_date','>',now('America/Santiago'))->where('profesor',$user)->get();
        //$clasesagendadasestudiante =Event::join('students','students.user_id','events.estudiante')
        //    ->join('users','users.id','events.estudiante')
        //    ->join('quota','quota.idquota','events.cupo')
        //    ->join('class','class.events_id','events.id')
        //    ->where('estudiante', '<>', null)
        //    ->where('start_date','>',now('America/Bogota'))
        //    ->where('profesor',$user)->get();



        //hora actual + dos horas para restringir la cancelaciond clases minimo dos horas antes
        $hourmore = Carbon::parse(now('America/santiago'))->addHour(2);


        return view('programarAgendaInstalador', compact('calendar','datos','date','eventosdisponibles','hourmore'))->with('id_proyecto', $id_proyecto)->with('id_instalador', $id_instalador)->with('quotas', $quota);
    }

    public function nuevafecha(Request $request){
        $data = $request->all();


        $id = $data['id_instalador'];
        $date = $data['date'];
        $cupo = $data['cupo'];
        $id_proyecto = $data['id_proyecto'];

        switch($cupo){
            case 1:
                $start_date = $date." 08:00:00";
                $end_date = $date." 09:00:00";
                break;
            case 2:
                $start_date = $date." 09:30:00";
                $end_date = $date." 10:30:00";
                break;
            case 3:
                $start_date = $date." 11:00:00";
                $end_date = $date." 12:00:00";
                break;
            case 4:
                $start_date = $date." 13:30:00";
                $end_date = $date." 14:30:00";
                break;
            case 5:
                $start_date = $date." 15:00:00";
                $end_date = $date." 16:00:00";
                break;
            case 6:
                $start_date = $date." 16:30:00";
                $end_date = $date." 17:30:00";
                break;
            case 7:
                $start_date = $date." 18:00:00";
                $end_date = $date." 19:00:00";
                break;
        }


        $evento = new Event;

        $evento->start_date = $start_date;
        $evento->end_date = $end_date;
        $evento->title = 'Disponible';
        $evento->id_instalador = $id;
        $evento->color = '#89ea8f';
        $evento->id_cliente = 1;
        $evento->estado = 1;
        $evento->id_proyecto = $id_proyecto;
        $evento->id_cupo = $cupo;
        $evento->date = $date;

        $evento->save();
        $alerta = 3;




        return redirect('/programarAgendaInstaladores/'.$id_proyecto.'/'.$id);
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
