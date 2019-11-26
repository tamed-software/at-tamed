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
use App\Pdfprotocoloscliente;

class ClienteInmobiliariaGrupoactivaController extends Controller
{
    public function showLoginForm()
    {
        return view('inmobiliarias.grupoactiva.index');
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
        $email = $request->input('email');

        $get_inmobiliaria_id = Usersinmobiliaria::where('email', $email)->get();
        foreach($get_inmobiliaria_id as $imb_id){
        	$inmobiliaria_id = $imb_id->inmobiliaria_id;
        }

        if (Auth::guard('userinmobiliarios')->attempt($credentials) && $inmobiliaria_id === 39) {
        	return redirect()->intended('grupoactiva/dashboard');
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
        return redirect('/grupoactiva');
    }

    protected function guard()
    {
        return Auth::guard('userinmobiliarios');
    }

    public function dashboard()
    {

if(Auth::guard('userinmobiliarios')->check()){

            //GRUPOACTIVA | Activa Entre Cerros
            $activa_entre_cerros_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 81)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $activa_entre_cerros_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 81)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_entre_cerros_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 81)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_entre_cerros_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 81)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_entre_cerros_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 81)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_entre_cerros_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 81)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_entre_cerros_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 81)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            //GRUPOACTIVA | General Saavedra
            $gral_saavedra_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 114)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $gral_saavedra_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 114)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $gral_saavedra_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 114)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $gral_saavedra_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 114)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $gral_saavedra_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 114)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $gral_saavedra_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 114)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $gral_saavedra_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 114)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            //GRUPOACTIVA | Activa Mitjans
            $activa_mitjans_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 82)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $activa_mitjans_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 82)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_mitjans_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 82)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_mitjans_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 82)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_mitjans_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 82)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_mitjans_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 82)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_mitjans_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 82)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            //GRUPOACTIVA | Activa Blanco
            $activa_blanco_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 80)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $activa_blanco_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 80)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_blanco_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 80)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_blanco_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 80)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_blanco_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 80)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_blanco_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 80)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_blanco_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 80)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();


            //GRUPOACTIVA | Activa Nataniel
            $activa_nataniel_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 83)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $activa_nataniel_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 83)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_nataniel_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 83)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_nataniel_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 83)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_nataniel_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 83)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_nataniel_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 83)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $activa_nataniel_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 83)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            //GRUPOACTIVA | Walker Martinez
            $walker_martinez_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 41)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $walker_martinez_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 41)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $walker_martinez_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 41)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $walker_martinez_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 41)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $walker_martinez_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 41)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $walker_martinez_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 41)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $walker_martinez_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 41)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();


            //GRUPOACTIVA | Walker Martinez
            $hipodromo_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 162)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $hipodromo_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 162)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $hipodromo_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 162)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $hipodromo_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 162)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $hipodromo_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 162)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $hipodromo_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 162)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $hipodromo_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 162)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();



            return view('inmobiliarias.grupoactiva.dashboard')->with('activa_entre_cerros_con', $activa_entre_cerros_con)->with('activa_entre_cerros_noCon', $activa_entre_cerros_noCon)->with('activa_entre_cerros_ins', $activa_entre_cerros_ins)->with('activa_entre_cerros_agen', $activa_entre_cerros_agen)->with('activa_entre_cerros_sin', $activa_entre_cerros_sin)->with('activa_entre_cerros_pendiente', $activa_entre_cerros_pendiente)->with('activa_entre_cerros_ins_cap', $activa_entre_cerros_ins_cap)
            ->with('gral_saavedra_con', $gral_saavedra_con)->with('gral_saavedra_noCon', $gral_saavedra_noCon)->with('gral_saavedra_ins', $gral_saavedra_ins)->with('gral_saavedra_agen', $gral_saavedra_agen)->with('gral_saavedra_sin', $gral_saavedra_sin)->with('gral_saavedra_pendiente', $gral_saavedra_pendiente)->with('gral_saavedra_ins_cap', $gral_saavedra_ins_cap)->with('activa_mitjans_con', $activa_mitjans_con)->with('activa_mitjans_noCon', $activa_mitjans_noCon)->with('activa_mitjans_ins', $activa_mitjans_ins)->with('activa_mitjans_agen', $activa_mitjans_agen)->with('activa_mitjans_sin', $activa_mitjans_sin)->with('activa_mitjans_pendiente', $activa_mitjans_pendiente)->with('activa_mitjans_ins_cap', $activa_mitjans_ins_cap)->with('activa_blanco_con', $activa_blanco_con)->with('activa_blanco_noCon', $activa_blanco_noCon)->with('activa_blanco_ins', $activa_blanco_ins)->with('activa_blanco_agen', $activa_blanco_agen)->with('activa_blanco_sin', $activa_blanco_sin)->with('activa_blanco_pendiente', $activa_blanco_pendiente)->with('activa_blanco_ins_cap', $activa_blanco_ins_cap)->with('activa_nataniel_con', $activa_nataniel_con)->with('activa_nataniel_noCon', $activa_nataniel_noCon)->with('activa_nataniel_ins', $activa_nataniel_ins)->with('activa_nataniel_agen', $activa_nataniel_agen)->with('activa_nataniel_sin', $activa_nataniel_sin)->with('activa_nataniel_pendiente', $activa_nataniel_pendiente)->with('activa_nataniel_ins_cap', $activa_nataniel_ins_cap)->with('walker_martinez_con', $walker_martinez_con)->with('walker_martinez_noCon', $walker_martinez_noCon)->with('walker_martinez_ins', $walker_martinez_ins)->with('walker_martinez_agen', $walker_martinez_agen)->with('walker_martinez_sin', $walker_martinez_sin)->with('walker_martinez_pendiente', $walker_martinez_pendiente)->with('walker_martinez_ins_cap', $walker_martinez_ins_cap)->with('hipodromo_con', $hipodromo_con)->with('hipodromo_noCon', $hipodromo_noCon)->with('hipodromo_ins', $hipodromo_ins)->with('hipodromo_agen', $hipodromo_agen)->with('hipodromo_sin', $hipodromo_sin)->with('hipodromo_pendiente', $hipodromo_pendiente)->with('hipodromo_ins_cap', $hipodromo_ins_cap);

        } else {
            return redirect('/grupoactiva');
        }
    }
    public function activa_entre_cerros()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $activa_entre_cerros = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 81)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo', 'clientes.id as id')
                              ->get();

            return view('inmobiliarias.grupoactiva.activa_entre_cerros')->with('activa_entre_cerros', $activa_entre_cerros);
        } else {
            return redirect('/grupoactiva');
        }
    }

    public function gral_saavedra()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $gral_saavedra = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 114)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo', 'clientes.id as id')
                              ->get();

            return view('inmobiliarias.grupoactiva.gral_saavedra')->with('gral_saavedra', $gral_saavedra);
        } else {
            return redirect('/grupoactiva');
        }
    }

    public function hipodromo()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $hipodromo = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 162)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo', 'clientes.id as id')
                              ->get();

            return view('inmobiliarias.grupoactiva.hipodromo')->with('hipodromo', $hipodromo);
        } else {
            return redirect('/grupoactiva');
        }
    }

    public function activa_blanco()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $activa_blanco = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 80)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo','clientes.pdf_protocolo', 'clientes.id as id')
                              ->get();

            return view('inmobiliarias.grupoactiva.activa_blanco')->with('activa_blanco', $activa_blanco);
        } else {
            return redirect('/grupoactiva');
        }
    }

    public function activa_nataniel()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $activa_nataniel = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 83)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo', 'clientes.id as id')
                              ->get();

            return view('inmobiliarias.grupoactiva.activa_nataniel')->with('activa_nataniel', $activa_nataniel);
        } else {
            return redirect('/grupoactiva');
        }
    }

    public function activa_mitjans()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $activa_mitjans = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 82)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo', 'clientes.id as id')
                              ->get();

            return view('inmobiliarias.grupoactiva.activa_mitjans')->with('activa_mitjans', $activa_mitjans);
        } else {
            return redirect('/grupoactiva');
        }
    }

    public function walker_martinez()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $walker_martinez = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 41)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo', 'clientes.id as id')
                              ->get();

            return view('inmobiliarias.grupoactiva.walker_martinez')->with('walker_martinez', $walker_martinez);
        } else {
            return redirect('/grupoactiva');
        }
    }

    //Reportes PDF
    public function pdf_activa_entre_cerros()
    {
        $pdf_activa_entre_cerros = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 81)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_activa_entre_cerros' => $pdf_activa_entre_cerros,
            'title' => 'Reporte PDF Inmobiliaria GRUPOACTIVA',
            'activaEntreCerros' => 'Activa Entre Cerros'
        ];

        $pdf = PDF::loadView('inmobiliarias.grupoactiva.reporte_activa_entre_cerros', $data);
        return $pdf->download('reporte_activa_entre_cerros.pdf');
    }

    //Reportes PDF
    public function pdf_hipodromo()
    {
        $pdf_hipodromo = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 162)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_hipodromo' => $pdf_hipodromo,
            'title' => 'Reporte PDF Inmobiliaria GRUPOACTIVA',
            'activaHipodromo' => 'Activa Hipódromo'
        ];

        $pdf = PDF::loadView('inmobiliarias.grupoactiva.reporte_hipodromo', $data);
        return $pdf->download('reporte_activa_hipodromo.pdf');
    }

    public function pdf_gral_saavedra()
    {
        $pdf_gral_saavedra = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 114)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_gral_saavedra' => $pdf_gral_saavedra,
            'title' => 'Reporte PDF Inmobiliaria GRUPOACTIVA',
            'gralSaavedra' => 'General Saavedra'
        ];

        $pdf = PDF::loadView('inmobiliarias.grupoactiva.reporte_gral_saavedra', $data);
        return $pdf->download('reporte_gral_saavedra.pdf');
    }

    public function pdf_activa_mitjans()
    {
        $pdf_activa_mitjans = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 82)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_activa_mitjans' => $pdf_activa_mitjans,
            'title' => 'Reporte PDF Inmobiliaria GRUPOACTIVA',
            'activaMitjans' => 'Activa Mitjans'
        ];

        $pdf = PDF::loadView('inmobiliarias.grupoactiva.reporte_activa_mitjans', $data);
        return $pdf->download('reporte_activa_mitjans.pdf');
    }


    public function pdf_activa_blanco()
    {
        $pdf_activa_blanco = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 80)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_activa_blanco' => $pdf_activa_blanco,
            'title' => 'Reporte PDF Inmobiliaria GRUPOACTIVA',
            'activaBlanco' => 'Activa Blanco'
        ];

        $pdf = PDF::loadView('inmobiliarias.grupoactiva.reporte_activa_blanco', $data);
        return $pdf->download('reporte_activa_blanco.pdf');
    }

    public function pdf_activa_nataniel()
    {
        $pdf_activa_nataniel = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 83)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_activa_nataniel' => $pdf_activa_nataniel,
            'title' => 'Reporte PDF Inmobiliaria GRUPOACTIVA',
            'activaNataniel' => 'Activa Nataniel'
        ];

        $pdf = PDF::loadView('inmobiliarias.grupoactiva.reporte_activa_nataniel', $data);
        return $pdf->download('reporte_activa_nataniel.pdf');
    }

    public function pdf_walker_martinez()
    {
        $pdf_walker_martinez = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 41)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_walker_martinez' => $pdf_walker_martinez,
            'title' => 'Reporte PDF Inmobiliaria GRUPOACTIVA',
            'walkerMartinez' => 'Walker Martínez'
        ];

        $pdf = PDF::loadView('inmobiliarias.grupoactiva.reporte_walker_martinez', $data);
        return $pdf->download('reporte_walker_martinez.pdf');
    }


    public function generar_reporte()
    {
        $pdf_activa_entre_cerros = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 81)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_gral_saavedra = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 114)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_activa_mitjans = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 82)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_activa_blanco = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 80)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_activa_nataniel = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 83)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_walker_martinez = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 41)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_hipodromo = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 162)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();                                

        $data = [
            'pdf_activa_entre_cerros' => $pdf_activa_entre_cerros,
            'pdf_gral_saavedra' => $pdf_gral_saavedra,
            'pdf_activa_mitjans' => $pdf_activa_mitjans,
            'pdf_activa_blanco' => $pdf_activa_blanco,
            'pdf_activa_nataniel' => $pdf_activa_nataniel,
            'pdf_walker_martinez' => $pdf_walker_martinez,
            'pdf_hipodromo' =>  $pdf_hipodromo,
            'title' => 'Reporte PDF Inmobiliaria GRUPOACTIVA',
            'activaEntreCerros' => 'Activa Entre Cerros',
            'gralSaavedra' => 'Activa General Saavedra',
            'activaMitjans' => 'Activa Mitjans',
            'activaBlanco' => 'Activa Blanco',
            'activaNataniel' => 'Activa Nataniel',
            'walkerMartinez' => 'Activa Walker Martínez',
            'hipodromo' => 'Activa Hipódromo'
        ];

        $pdf = PDF::loadView('inmobiliarias.grupoactiva.reporte', $data);
        return $pdf->download('reporte_grupoactiva.pdf');
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
