<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
use Session;
use PDF;
use App\Inmobiliaria;
use App\Proyecto;
use App\Cliente;
use App\Estado;
use App\Usersinmobiliaria;
use App\Arrendatario;
use App\Pdfprotocoloscliente;

class ClienteInmobiliariaIlebenController extends Controller
{
    public function showLoginForm()
    {
      return view('inmobiliarias.ileben.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:userinmobiliarios',['only' => 'index']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('userinmobiliarios')->attempt($credentials)) {
            return redirect()->intended('ileben/dashboard');
        } else {
            return back()
                ->withErrors(['email' => 'Datos incorrectos'])
                ->withInput(request(['email']));
        }
    }

    public function logout(Request $request)
    {
        $this->guard('userinmobiliarios')->logout();
        $request->session()->invalidate();
        return redirect('/ileben');
    }

    public function index()
    {
        //
    }

   protected function guard()
    {
        return Auth::guard('userinmobiliarios');
    }

     public function dashboard()
    {
        
    if(Auth::guard('userinmobiliarios')->check()){
            
            //Ileben | Reflex
            $reflex_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 35)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $reflex_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 35)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $reflex_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 35)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $reflex_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 35)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $reflex_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 35)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $reflex_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 35)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $reflex_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 35)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            //Ileben | Choice
            $choice_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 36)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $choice_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 36)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $choice_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 36)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $choice_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 36)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $choice_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 36)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $choice_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 36)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $choice_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 36)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();


            //Ileben | Bloom
            $bloom_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 37)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $bloom_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 37)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $bloom_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 37)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $bloom_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 37)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $bloom_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 37)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $bloom_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 37)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $bloom_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 37)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();    

            //Ileben | Parque la Huasa
            $parque_la_huasa_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 38)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $parque_la_huasa_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 38)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $parque_la_huasa_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 38)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $parque_la_huasa_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 38)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $parque_la_huasa_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 38)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $parque_la_huasa_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 38)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $parque_la_huasa_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 38)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();     

            //Ileben | Open Concept
            $open_concept_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 39)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $open_concept_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 39)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $open_concept_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 39)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $open_concept_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 39)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $open_concept_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 39)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $open_concept_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 39)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $open_concept_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 39)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();   

            //Ileben | Open Concept
            $jazz_life_1_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 40)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $jazz_life_1_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 40)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_1_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 40)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_1_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 40)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_1_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 40)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_1_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 40)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_1_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 40)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count(); 


            //Ileben | Open Concept
            $jazz_life_2_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 124)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $jazz_life_2_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 124)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_2_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 124)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_2_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 124)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_2_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 124)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_2_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 124)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_2_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 124)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();                                           


            //Ileben | Open Concept
            $jazz_life_3_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 125)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $jazz_life_3_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 125)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_3_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 125)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_3_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 125)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_3_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 125)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_3_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 125)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $jazz_life_3_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 125)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();  

          

            return view('inmobiliarias.ileben.dashboard')->with('reflex_con', $reflex_con)->with('reflex_noCon', $reflex_noCon)->with('reflex_ins', $reflex_ins)->with('reflex_agen', $reflex_agen)->with('reflex_sin', $reflex_sin)->with('reflex_pendiente', $reflex_pendiente)->with('reflex_ins_cap', $reflex_ins_cap)
            ->with('choice_con', $choice_con)->with('choice_noCon', $choice_noCon)->with('choice_ins', $choice_ins)->with('choice_agen', $choice_agen)->with('choice_sin', $choice_sin)->with('choice_pendiente', $choice_pendiente)->with('choice_ins_cap', $choice_ins_cap)
            ->with('bloom_con', $bloom_con)->with('bloom_noCon', $bloom_noCon)->with('bloom_ins', $bloom_ins)->with('bloom_agen', $bloom_agen)->with('bloom_sin', $bloom_sin)->with('bloom_pendiente', $bloom_pendiente)->with('bloom_ins_cap', $bloom_ins_cap)
            ->with('parque_la_huasa_con', $parque_la_huasa_con)->with('parque_la_huasa_noCon', $parque_la_huasa_noCon)->with('parque_la_huasa_ins', $parque_la_huasa_ins)->with('parque_la_huasa_agen', $parque_la_huasa_agen)->with('parque_la_huasa_sin', $parque_la_huasa_sin)->with('parque_la_huasa_pendiente', $parque_la_huasa_pendiente)->with('parque_la_huasa_ins_cap', $parque_la_huasa_ins_cap)
            ->with('open_concept_con', $open_concept_con)->with('open_concept_noCon', $open_concept_noCon)->with('open_concept_ins', $open_concept_ins)->with('open_concept_agen', $open_concept_agen)->with('open_concept_sin', $open_concept_sin)->with('open_concept_pendiente', $open_concept_pendiente)->with('open_concept_ins_cap', $open_concept_ins_cap)
             ->with('jazz_life_1_con', $jazz_life_1_con)->with('jazz_life_1_noCon', $jazz_life_1_noCon)->with('jazz_life_1_ins', $jazz_life_1_ins)->with('jazz_life_1_agen', $jazz_life_1_agen)->with('jazz_life_1_sin', $jazz_life_1_sin)->with('jazz_life_1_pendiente', $jazz_life_1_pendiente)->with('jazz_life_1_ins_cap', $jazz_life_1_ins_cap)
             ->with('jazz_life_2_con', $jazz_life_2_con)->with('jazz_life_2_noCon', $jazz_life_2_noCon)->with('jazz_life_2_ins', $jazz_life_2_ins)->with('jazz_life_2_agen', $jazz_life_2_agen)->with('jazz_life_2_sin', $jazz_life_2_sin)->with('jazz_life_2_pendiente', $jazz_life_2_pendiente)->with('jazz_life_2_ins_cap', $jazz_life_2_ins_cap)
             ->with('jazz_life_3_con', $jazz_life_3_con)->with('jazz_life_3_noCon', $jazz_life_3_noCon)->with('jazz_life_3_ins', $jazz_life_3_ins)->with('jazz_life_3_agen', $jazz_life_3_agen)->with('jazz_life_3_sin', $jazz_life_3_sin)->with('jazz_life_3_pendiente', $jazz_life_3_pendiente)->with('jazz_life_3_ins_cap', $jazz_life_3_ins_cap);

        } else {
            return redirect('/ileben');
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

    public function reflex()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $reflex = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                            ->where('clientes.proyecto_id', 35)
                            ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo','clientes.pdf_protocolo', 'clientes.id as id')
                            ->get();
            //$parque_garcia_huerta = Arrendatario::select('id','nombre','telefono','correo')->get();

            return view('inmobiliarias.ileben.reflex')->with('reflex', $reflex);
        } else {
            return redirect('/ileben');
        }
    }

    public function choice()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $choice = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 36)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo', 'clientes.id as id')
                              ->get();

            return view('inmobiliarias.ileben.choice')->with('choice', $choice);
        } else {
            return redirect('/ileben');
        }
    }

    public function bloom()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $bloom = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 37)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo','clientes.id as id')
                              ->get();

            return view('inmobiliarias.ileben.bloom')->with('bloom', $bloom);
        } else {
            return redirect('/ileben');
        }
    }

    public function parque_la_huasa()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $parque_la_huasa = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 38)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo','clientes.id as id')
                              ->get();

            return view('inmobiliarias.ileben.parque_la_huasa')->with('parque_la_huasa', $parque_la_huasa);
        } else {
            return redirect('/ileben');
        }
    }    

    public function open_concept()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $open_concept = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 39)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo','clientes.id as id')
                              ->get();

            return view('inmobiliarias.ileben.open_concept')->with('open_concept', $open_concept);
        } else {
            return redirect('/ileben');
        }
    }      

    public function jazz_life_1()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $jazz_life_1 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 40)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo','clientes.id as id')
                              ->get();

            return view('inmobiliarias.ileben.jazz_life_1')->with('jazz_life_1', $jazz_life_1);
        } else {
            return redirect('/ileben');
        }
    }         

    public function jazz_life_2()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $jazz_life_2 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 124)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo','clientes.id as id')
                              ->get();

            return view('inmobiliarias.ileben.jazz_life_2')->with('jazz_life_2', $jazz_life_2);
        } else {
            return redirect('/ileben');
        }
    }   

    public function jazz_life_3()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $jazz_life_3 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 125)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo','clientes.id as id')
                              ->get();

            return view('inmobiliarias.ileben.jazz_life_3')->with('jazz_life_3', $jazz_life_3);
        } else {
            return redirect('/ileben');
        }
    }              

    public function pdf_reflex()
    {
        $pdf_reflex = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 35)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_reflex' => $pdf_reflex,
            'title' => 'Reporte PDF Inmobiliaria ILEBEN',
            'reflex' => 'REFLEX'
        ];

        $pdf = PDF::loadView('inmobiliarias.ileben.reporte_reflex', $data);
        return $pdf->download('reporte_reflex.pdf');  
    }

    public function pdf_choice()
    {
        $pdf_choice = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 36)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_choice' => $pdf_choice,
            'title' => 'Reporte PDF Inmobiliaria ILEBEN',
            'choice' => 'choice'
        ];

        $pdf = PDF::loadView('inmobiliarias.ileben.reporte_choice', $data);
        return $pdf->download('reporte_choice.pdf');  
    }

    public function pdf_bloom()
    {
        $pdf_bloom = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 37)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_bloom' => $pdf_bloom,
            'title' => 'Reporte PDF Inmobiliaria ILEBEN',
            'bloom' => 'Bloom'
        ];

        $pdf = PDF::loadView('inmobiliarias.ileben.reporte_bloom', $data);
        return $pdf->download('reporte_bloom.pdf');  
    }

    public function pdf_open_concept()
    {
        $pdf_open_concept = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 39)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_open_concept' => $pdf_open_concept,
            'title' => 'Reporte PDF Inmobiliaria ILEBEN',
            'open_concept' => 'Open Concept'
        ];

        $pdf = PDF::loadView('inmobiliarias.ileben.reporte_open_concept', $data);
        return $pdf->download('reporte_open_concept.pdf');  
    }        

    public function pdf_parque_la_huasa()
    {
        $pdf_parque_la_huasa = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 38)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_parque_la_huasa' => $pdf_parque_la_huasa,
            'title' => 'Reporte PDF Inmobiliaria ILEBEN',
            'parque_la_huasa' => 'Parque la Huasa'
        ];

        $pdf = PDF::loadView('inmobiliarias.ileben.reporte_parque_la_huasa', $data);
        return $pdf->download('reporte_parque_la_huasa.pdf');  
    }      

    public function pdf_jazz_life_1()
    {
        $pdf_jazz_life_1 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 40)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_jazz_life_1' => $pdf_jazz_life_1,
            'title' => 'Reporte PDF Inmobiliaria ILEBEN',
            'jazz_life_1' => 'Jazz Life - Etapa 1'
        ];

        $pdf = PDF::loadView('inmobiliarias.ileben.reporte_jazz_life_1', $data);
        return $pdf->download('reporte_jazz_life_1.pdf');  
    }             

    public function pdf_jazz_life_2()
    {
        $pdf_jazz_life_2 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 124)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_jazz_life_2' => $pdf_jazz_life_2,
            'title' => 'Reporte PDF Inmobiliaria ILEBEN',
            'jazz_life_2' => 'Jazz Life - Etapa 2'
        ];

        $pdf = PDF::loadView('inmobiliarias.ileben.reporte_jazz_life_2', $data);
        return $pdf->download('reporte_jazz_life_2.pdf');  
    }      

    public function pdf_jazz_life_3()
    {
        $pdf_jazz_life_3 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 125)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_jazz_life_3' => $pdf_jazz_life_3,
            'title' => 'Reporte PDF Inmobiliaria ILEBEN',
            'jazz_life_3' => 'Jazz Life - Etapa 3'
        ];

        $pdf = PDF::loadView('inmobiliarias.ileben.reporte_jazz_life_3', $data);
        return $pdf->download('reporte_jazz_life_3.pdf');  
    }          

    public function generar_reporte()
    {
        $pdf_reflex = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 35)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_choice = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 36)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_parque_la_huasa = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 37)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_bloom = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 38)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();         

        $pdf_open_concept = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 39)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();  

        $pdf_jazz_life_1 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 40)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();    

        $pdf_jazz_life_2 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 124)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();          

        $pdf_jazz_life_3 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 125)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();                                                                                                                                                                                   

        

        $data = [
            'pdf_reflex' => $pdf_reflex,
            'pdf_choice' => $pdf_choice,
            'pdf_parque_la_huasa' => $pdf_parque_la_huasa,
            'pdf_bloom' => $pdf_bloom,
            'pdf_open_concept' => $pdf_open_concept,
            'pdf_jazz_life_1' => $pdf_jazz_life_1,
            'pdf_jazz_life_2' => $pdf_jazz_life_2,
            'pdf_jazz_life_3' => $pdf_jazz_life_3,
            'title' => 'Reporte PDF Inmobiliaria ILEBEN',
            'reflex' => 'Reflex',
            'choice' => 'Choice',
            'parque_la_huasa' => 'Parque La Huasa',
            'bloom' => 'Bloom',
            'open_concept' => 'Open Concept',
            'jazz_life_1' => 'Jazz Life - Etapa 1',
            'jazz_life_2' => 'Jazz Life - Etapa 2',
            'jazz_life_3' => 'Jazz Life - Etapa 3'
        ];

        $pdf = PDF::loadView('inmobiliarias.ileben.reporte', $data);
        return $pdf->download('reporte_ileben.pdf');
    }

    public function historial_cliente()
    {

    if(Auth::guard('userinmobiliarios')->check()){
        
      return view('inmobiliarias.hcg.historialcliente');

    } else {
      
       return redirect('/ileben');
      
        }
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

    public function importar_clientes_hcg()
    {

    if(Auth::guard('userinmobiliarios')->check()){

      $proyectos = Proyecto::where('inmobiliaria_id',10)->get();
        
      return view('inmobiliarias.hcg.importar_clientes_hcg')->with('proyectos',$proyectos);

    } else {
      
       return redirect('/ileben');
      
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

}
