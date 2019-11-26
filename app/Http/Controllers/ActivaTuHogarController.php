<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Inmobiliaria;
use App\Proyecto;
use App\Cliente;
use Session;
use Mail;
use DateTime;
use App\Event;
use DB;
use Carbon\Carbon;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Date\Date;

class ActivaTuHogarController extends Controller
{


    public function showLoginForm($id)
    {

      return view(' activaTuHogar.index')->with('id', $id);

    }

    public function authenticate(Request $request)
    {

      $id_proyecto = $request->input('id_proyecto');
      $email = $request->input('email');

      $clientes = Cliente::where('proyecto_id', $id_proyecto)
                ->where('correo', $email)
                ->get();


      if(sizeof($clientes) > 0){

         $characters = '012348cdefklmnqPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < $charactersLength; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
         }


          $password = Hash::make($randomString);

          foreach ($clientes as $cliente) {

            $editarCliente = Cliente::find($cliente->id);

            $editarCliente->contraseña = $password;

            $editarCliente->save();

          }


            $datosEmail = array(
                'email'         => $email,
                'codigo' => $randomString
            );

          Mail::send('emails.mail_envio_codigo2', $datosEmail, function($message) use ($datosEmail){
               $message->from('instalaciones@tamed.global', 'contraseña Activa tu hogar');
               $message->to($datosEmail['email'])->subject("hola");
            });


        return redirect()->back()->with('message', 'En el correo ingresado encontrarás tu contraseña.')->with('correo', $email)->with('id_proyecto',$id_proyecto);

      }else{

            return back()
                ->withErrors(['email' => 'El correo ingresado no corresponde a un cliente de este proyecto.'])
                ->withInput(request(['email']));

      }


    }

    public function iniciarSesion(Request $request)
    {

      $id_proyecto = $request->input('id_proyecto');
      $email = $request->input('email');
      $password = $request->input('password');

      $cliente = Cliente::where('proyecto_id', $id_proyecto)
                ->where('correo', $email)
                ->first();

        $password2 = $cliente->contraseña;

        if (Hash::check($password,$password2)) {
          Session::put('cliente_id', $cliente->id);
          Session::put('proyecto_id', $id_proyecto);
          Session::put('email', $email);
            return redirect()->intended('activaTuHogar2/caledario2');

        }else{

            return back()->withErrors(['email' => 'Datos incorrectos'])->withInput(request(['email']));

        }

    }

    public function calendarioAgendamiento()
    {

      return 'Hola';//view('activaTuHogar.calendarioAgendamiento');

    }

    public function calendarioAgendamiento2(){
      $cliente_id = Session::get('cliente_id');
      $proyecto_id = Session::get('proyecto_id');
      $email = Session::get('email');
      $hogares = Cliente::where('proyecto_id', $proyecto_id)
                ->where('correo', $email)
                ->get();
      $proyecto = Proyecto::where('id', $proyecto_id)->first();
        $user = $cliente_id;
        // dd($_GET['genero']);
        // dd($genero);

        // $valido = Student::select('estado')->where('user_id', Auth::user()->id)->first();
        // $valido = $valido->estado;

        $agendas = Event::join('instaladores','instaladores.id', 'events.id_instalador')
            ->select('events.*','instaladores.nombre_instalador')
            ->get();


        $events = [];
        $data = Event::where('id_proyecto', $proyecto_id)->where('estado', 1)->get();

        if($data->count()) {
            foreach ($data as $key => $value) {
                foreach( $agendas as $agenda){
                    if(($value->id == $agenda->id) and ($value->start_date > now('America/Santiago')) ){
                            $events[] = Calendar::event(
                                date("h:i", strtotime($value->start_date)),
                                false,
                                new \DateTime($value->start_date),
                                new \DateTime($value->end_date),
                                1,
                                // Add color and link on event
                                [
                                    'color' => $value->color,
                                    'url' => route('veragenda')."?idevento=".$agenda->id,
                                ]
                        );
                    }
                }
            }
        }
        if(\App::isLocale('es')){
            $calendar = Calendar::addEvents($events)->setOptions([
                    'eventLimit'     => 2,
                    'minTime' => '8:00',
                    'maxTime' => '17:00',
                    'lang' => 'es',
                ]);
        }else{
             $calendar = Calendar::addEvents($events)->setOptions([
                    'eventLimit'     => 2,
                    'minTime' => '8:00',
                    'maxTime' => '17:00',
                    'lang' => 'en',
                ]);
        }

                    $date = Carbon::yesterday('America/Santiago');

        return view('activaTuHogar.calendarioAgendamiento', compact('calendar', 'date', 'hogares', 'proyecto'));


    }
    public function veragenda()
    {
        $id_agenda = $_GET['idevento'];
        $evento = Event::where('id', $id_agenda)->First();
        $id_cliente = Session::get('cliente_id');
        $proyecto = DB::table('contratos')->where('proyecto_id', $evento->id_proyecto)
                                          ->first();
        $inmobiliaria = DB::table('proyectos')->where('proyectos.id', $evento->id_proyecto)
                                              ->join('inmobiliarias', 'proyectos.inmobiliaria_id', '=', 'inmobiliarias.id')
                                              ->select('inmobiliarias.nombre as inmobiliaria')
                                              ->first();
        $cliente = Cliente::where('id', $id_cliente)
                  ->first();

        return view('activaTuHogar.agendar', compact('evento','cliente','proyecto','inmobiliaria'));
    }
    public function agendarcliente()
    {
        $id_agenda = $_GET['idevento'];
        $evento = Event::where('id', $id_agenda)->First();
        $id_cliente = Session::get('cliente_id');
        $proyecto = DB::table('contratos')->where('proyecto_id', $evento->id_proyecto)
                                          ->first();
        $inmobiliaria = DB::table('proyectos')->where('proyectos.id', $evento->id_proyecto)
                                              ->join('inmobiliarias', 'proyectos.inmobiliaria_id', '=', 'inmobiliarias.id')
                                              ->select('inmobiliarias.nombre as inmobiliaria')
                                              ->first();
        $cliente = Cliente::where('id', $id_cliente)
                  ->first();

                  $event           = Event::find($id_agenda);
                  $event->id_cliente      = $id_cliente;
                  $event->estado          = 2;
                  $event->title = "Agendado por cliente";
                  $event->save();


        return view('activaTuHogar.confirmacion', compact('evento','cliente','proyecto','inmobiliaria'));
    }



}
