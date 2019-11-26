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

class ClienteInmobiliariaMalpoController extends Controller
{
    public function showLoginForm()
    {
        return view('inmobiliarias.malpo.index');
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
        
        if (Auth::guard('userinmobiliarios')->attempt($credentials) && $inmobiliaria_id === 1) {
            return redirect()->intended('malpo/dashboard');
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
        return redirect('/malpo');
    }

    protected function guard()
    {
        return Auth::guard('userinmobiliarios');
    }

    public function dashboard()
    {
        if(Auth::guard('userinmobiliarios')->check()){  

            //Maplo / alto rucahue colonial

            $altos_rucahue_colonial_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 1)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $altos_rucahue_colonial_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 1)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_rucahue_colonial_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 1)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_rucahue_colonial_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 1)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_rucahue_colonial_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 1)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_rucahue_colonial_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 1)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_rucahue_colonial_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 1)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            //Maplo / claros rauquen

            $claros_rauquen_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 49)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $claros_rauquen_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 49)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $claros_rauquen_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 49)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $claros_rauquen_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 49)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $claros_rauquen_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 49)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $claros_rauquen_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 49)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $claros_rauquen_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 49)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            //Maplo / altos maiten boldo

            $altos_maiten_boldo_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 50)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $altos_maiten_boldo_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 50)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_maiten_boldo_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 50)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_maiten_boldo_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 50)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_maiten_boldo_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 50)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_maiten_boldo_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 50)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_maiten_boldo_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 50)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            //Maplo / lomas del bosque 

            $lomas_bosque_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 51)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $lomas_bosque_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 51)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $lomas_bosque_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 51)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $lomas_bosque_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 51)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $lomas_bosque_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 51)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $lomas_bosque_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 51)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $lomas_bosque_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 51)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            //Maplo / altos maiten laurel

            $altos_maiten_laurel_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 141)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $altos_maiten_laurel_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 141)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_maiten_laurel_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 141)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_maiten_laurel_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 141)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_maiten_laurel_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 141)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_maiten_laurel_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 141)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $altos_maiten_laurel_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 141)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            return view('inmobiliarias.malpo.dashboard')->with('altos_rucahue_colonial_con', $altos_rucahue_colonial_con)->with('altos_rucahue_colonial_noCon', $altos_rucahue_colonial_noCon)->with('altos_rucahue_colonial_ins', $altos_rucahue_colonial_ins)->with('altos_rucahue_colonial_agen', $altos_rucahue_colonial_agen)->with('altos_rucahue_colonial_sin', $altos_rucahue_colonial_sin)->with('altos_rucahue_colonial_pendiente', $altos_rucahue_colonial_pendiente)->with('altos_rucahue_colonial_ins_cap', $altos_rucahue_colonial_ins_cap)
            ->with('claros_rauquen_con', $claros_rauquen_con)->with('claros_rauquen_noCon', $claros_rauquen_noCon)->with('claros_rauquen_ins', $claros_rauquen_ins)->with('claros_rauquen_agen', $claros_rauquen_agen)->with('claros_rauquen_sin', $claros_rauquen_sin)->with('claros_rauquen_pendiente', $claros_rauquen_pendiente)->with('claros_rauquen_ins_cap', $claros_rauquen_ins_cap)
            ->with('lomas_bosque_con', $lomas_bosque_con)->with('lomas_bosque_noCon', $lomas_bosque_noCon)->with('lomas_bosque_ins', $lomas_bosque_ins)->with('lomas_bosque_agen', $lomas_bosque_agen)->with('lomas_bosque_sin', $lomas_bosque_sin)->with('lomas_bosque_pendiente', $lomas_bosque_pendiente)->with('lomas_bosque_ins_cap', $lomas_bosque_ins_cap)
            ->with('altos_maiten_laurel_con', $altos_maiten_laurel_con)->with('altos_maiten_laurel_noCon', $altos_maiten_laurel_noCon)->with('altos_maiten_laurel_ins', $altos_maiten_laurel_ins)->with('altos_maiten_laurel_agen', $altos_maiten_laurel_agen)->with('altos_maiten_laurel_sin', $altos_maiten_laurel_sin)->with('altos_maiten_laurel_pendiente', $altos_maiten_laurel_pendiente)->with('altos_maiten_laurel_ins_cap', $altos_maiten_laurel_ins_cap)
            ->with('altos_maiten_boldo_con', $altos_maiten_boldo_con)->with('altos_maiten_boldo_noCon', $altos_maiten_boldo_noCon)->with('altos_maiten_boldo_ins', $altos_maiten_boldo_ins)->with('altos_maiten_boldo_agen', $altos_maiten_boldo_agen)->with('altos_maiten_boldo_sin', $altos_maiten_boldo_sin)->with('altos_maiten_boldo_pendiente', $altos_maiten_boldo_pendiente)->with('altos_maiten_boldo_ins_cap', $altos_maiten_boldo_ins_cap);

        } else {
            return redirect('/malpo');
        }
    }

    public function altos_rucahue_colonial()
    {
        if(Auth::guard('userinmobiliarios')->check()){

            $altos_rucahue_colonial = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                      ->where('clientes.proyecto_id', 1)
                                      ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo')
                                      ->get();

            return view('inmobiliarias.malpo.altos_rucahue_colonial')->with('altos_rucahue_colonial', $altos_rucahue_colonial);
        } else {
            return redirect('/malpo');
        }

    } 

    public function claros_rauquen()
    {
        if(Auth::guard('userinmobiliarios')->check()){

            $claros_rauquen = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 49)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo')
                              ->get();

            return view('inmobiliarias.malpo.claros_rauquen')->with('claros_rauquen', $claros_rauquen);
        } else {
            return redirect('/malpo');
        }
    } 

    public function altos_maiten_boldo()
    {
        if(Auth::guard('userinmobiliarios')->check()){

            $altos_maiten_boldo = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 50)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo')
                              ->get();

            return view('inmobiliarias.malpo.altos_maiten_boldo')->with('altos_maiten_boldo', $altos_maiten_boldo);
        } else {
            return redirect('/malpo');
        }
    }

    public function lomas_bosque()
    {
        if(Auth::guard('userinmobiliarios')->check()){

            $lomas_bosque =   Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 51)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo')
                              ->get();

            return view('inmobiliarias.malpo.lomas_bosque')->with('lomas_bosque', $lomas_bosque);
        } else {
            return redirect('/malpo');
        }
    }

    public function altos_maiten_laurel()
    {
        if(Auth::guard('userinmobiliarios')->check()){

            $altos_maiten_laurel =   Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                     ->where('clientes.proyecto_id', 141)
                                     ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo')
                                     ->get();

            return view('inmobiliarias.malpo.altos_maiten_laurel')->with('altos_maiten_laurel', $altos_maiten_laurel);
        } else {
            return redirect('/malpo');
        }
    }

    public function pdf_alto_rauquen_colonial()
    {
        $pdf_alto_rauquen_colonial = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 1)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_alto_rauquen_colonial' => $pdf_alto_rauquen_colonial,
            'title' => 'Reporte PDF Inmobiliaria MALPO',
            'altoRauquen' => 'Alto Rucahue Colonial'
        ];

        $pdf = PDF::loadView('inmobiliarias.malpo.reporte_alto_rauquen_colonial', $data);
        return $pdf->download('reporte_alto_rauquen_colonial.pdf');  
    }

    public function pdf_claros_rauquen_curico()
    {
        $pdf_claros_rauquen_curico = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 49)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
          $data = [
              'pdf_claros_rauquen_curico' => $pdf_claros_rauquen_curico,
              'title' => 'Reporte PDF Inmobiliaria MALPO',
              'clarosRauquen' => 'Claros de Rauquén, Curico'
          ];

          $pdf = PDF::loadView('inmobiliarias.malpo.reporte_claros_rauquen_curico', $data);
          return $pdf->download('reporte_claros_rauquen_curico.pdf');  
    }

    public function pdf_altos_maiten_boldo()
    {
        $pdf_altos_maiten_boldo = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 50)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_altos_maiten_boldo' => $pdf_altos_maiten_boldo,
            'title' => 'Reporte PDF Inmobiliaria MALPO',
            'maitenBoldo' => 'Altos del Maitén, Boldo Melipilla'
        ];

        $pdf = PDF::loadView('inmobiliarias.malpo.reporte_altos_maiten_boldo', $data);
        return $pdf->download('reporte_altos_maiten_boldo.pdf');  
    }

    public function pdf_altos_maiten_laurel()
    {
        $pdf_altos_maiten_laurel = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 50)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_altos_maiten_laurel' => $pdf_altos_maiten_laurel,
            'title' => 'Reporte PDF Inmobiliaria MALPO',
            'maitenLaurel' => 'Altos del Maitén, Laurel Melipilla'
        ];

        $pdf = PDF::loadView('inmobiliarias.malpo.reporte_altos_maiten_laurel', $data);
        return $pdf->download('reporte_altos_maiten_laurel.pdf');  
    }

    public function pdf_lomas_bosque()
    { 
        $pdf_lomas_bosque = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 51)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        
        if (!$pdf_lomas_bosque->isEmpty()){
          $data = [
            'pdf_lomas_bosque' => $pdf_lomas_bosque,
            'title' => 'Reporte PDF Inmobiliaria MALPO',
            'lomasBosque' => 'Lomas del Bosque, Los Angeles'
          ];
          $pdf = PDF::loadView('inmobiliarias.malpo.reporte_lomas_bosque', $data);
          return $pdf->download('reporte_lomas_bosque.pdf');
        } else {
          return back();
        }
    }

    public function generar_reporte()
    {
        $pdf_alto_rauquen_colonial = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 1)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get(); 

        $pdf_claros_rauquen_curico = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 49)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_altos_maiten_boldo = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 50)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_altos_maiten_laurel = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 50)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_lomas_bosque = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 51)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();

        $data = [
            'pdf_alto_rauquen_colonial' => $pdf_alto_rauquen_colonial,
            'pdf_claros_rauquen_curico' => $pdf_claros_rauquen_curico,
            'pdf_altos_maiten_boldo' => $pdf_altos_maiten_boldo,
            'pdf_altos_maiten_laurel' => $pdf_altos_maiten_laurel,
            'pdf_lomas_bosque' => $pdf_lomas_bosque,
            'title' => 'Reporte PDF Inmobiliaria MALPO',
            'altoRauquen' => 'Alto Rucahue Colonial',
            'clarosRauquen' => 'Claros de Rauquén, Curico',
            'maitenBoldo' => 'Altos del Maitén, Boldo Melipilla',
            'maitenLaurel' => 'Altos del Maitén, Laurel Melipilla',
            'lomasBosque' => 'Lomas del Bosque, Los Angeles'
        ];

        $pdf = PDF::loadView('inmobiliarias.malpo.reporte', $data);
        return $pdf->download('reporte_malpo.pdf');  

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
