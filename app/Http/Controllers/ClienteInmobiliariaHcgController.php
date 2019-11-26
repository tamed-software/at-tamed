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

class ClienteInmobiliariaHcgController extends Controller
{
    public function showLoginForm()
    {
      return view('inmobiliarias.hcg.index');
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
            return redirect()->intended('hcg/dashboard');
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
        return redirect('/hcg');
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
            
            //GRUPOACTIVA | Activa Entre Cerros
            $parque_garcia_huerta_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 11)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $parque_garcia_huerta_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 11)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $parque_garcia_huerta_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 81)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $parque_garcia_huerta_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 11)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $parque_garcia_huerta_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 11)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $parque_garcia_huerta_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 11)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $parque_garcia_huerta_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 11)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            //HCG | Los Alerces y los Jazmines
            $alerces_jazmines_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 15)
                                          ->where('clientes.estado_id', 1)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();
            $alerces_jazmines_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 15)
                                          ->where('clientes.estado_id', 2)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $alerces_jazmines_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 15)
                                          ->where('clientes.estado_id', 3)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $alerces_jazmines_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 15)
                                          ->where('clientes.estado_id', 4)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $alerces_jazmines_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 15)
                                          ->where('clientes.estado_id', 5)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $alerces_jazmines_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 15)
                                          ->where('clientes.estado_id', 10)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

            $alerces_jazmines_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                          ->where('clientes.proyecto_id', 15)
                                          ->where('clientes.estado_id', 8)
                                          ->where('proyectos.estado_id', 6)
                                          ->count();

          

            return view('inmobiliarias.hcg.dashboard')->with('parque_garcia_huerta_con', $parque_garcia_huerta_con)->with('parque_garcia_huerta_noCon', $parque_garcia_huerta_noCon)->with('parque_garcia_huerta_ins', $parque_garcia_huerta_ins)->with('parque_garcia_huerta_agen', $parque_garcia_huerta_agen)->with('parque_garcia_huerta_sin', $parque_garcia_huerta_sin)->with('parque_garcia_huerta_pendiente', $parque_garcia_huerta_pendiente)->with('parque_garcia_huerta_ins_cap', $parque_garcia_huerta_ins_cap)
            ->with('alerces_jazmines_con', $alerces_jazmines_con)->with('alerces_jazmines_noCon', $alerces_jazmines_noCon)->with('alerces_jazmines_ins', $alerces_jazmines_ins)->with('alerces_jazmines_agen', $alerces_jazmines_agen)->with('alerces_jazmines_sin', $alerces_jazmines_sin)->with('alerces_jazmines_pendiente', $alerces_jazmines_pendiente)->with('alerces_jazmines_ins_cap', $alerces_jazmines_ins_cap);

        } else {
            return redirect('/hcg');
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

    public function parque_garcia_huerta()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            //$parque_garcia_huerta = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                          //  ->where('clientes.proyecto_id', 11)
                          //  ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo','clientes.pdf_protocolo')
                          //  ->get();
            $parque_garcia_huerta = Arrendatario::select('id','nombre','telefono','correo')->get();

            return view('inmobiliarias.hcg.parque_garcia_huerta')->with('parque_garcia_huerta', $parque_garcia_huerta);
        } else {
            return redirect('/hcg');
        }
    }

    public function alerces_jazmines()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $alerces_jazmines = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                              ->where('clientes.proyecto_id', 15)
                              ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo')
                              ->get();

            return view('inmobiliarias.hcg.alerces_jazmines')->with('alerces_jazmines', $alerces_jazmines);
        } else {
            return redirect('/hcg');
        }
    }

    public function pdf_parque_garcia_huerta()
    {
        $pdf_parque_garcia_huerta = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 11)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_parque_garcia_huerta' => $pdf_parque_garcia_huerta,
            'title' => 'Reporte PDF Inmobiliaria HCG',
            'parqueGarciaHuerta' => 'Parque García de la Huerta'
        ];

        $pdf = PDF::loadView('inmobiliarias.hcg.reporte_parque_garcia_huerta', $data);
        return $pdf->download('reporte_parque_garcia_huerta.pdf');  
    }

    public function pdf_alerces_jazmines()
    {
        $pdf_alerces_jazmines = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 15)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();
        $data = [
            'pdf_alerces_jazmines' => $pdf_alerces_jazmines,
            'title' => 'Reporte PDF Inmobiliaria HCG',
            'losAlercesYJazmines' => 'Los Alerces y los Jazmines'
        ];

        $pdf = PDF::loadView('inmobiliarias.hcg.reporte_alerces_jazmines', $data);
        return $pdf->download('reporte_los_alerces_los_jazmines.pdf');  
    }

    public function generar_reporte()
    {
        $pdf_parque_garcia_huerta = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 11)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();

        $pdf_alerces_jazmines = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 15)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion','clientes.fecha_emision_protocolo')
                                ->get();

        

        $data = [
            'pdf_parque_garcia_huerta' => $pdf_parque_garcia_huerta,
            'pdf_alerces_jazmines' => $pdf_alerces_jazmines,
            'title' => 'Reporte PDF Inmobiliaria HCG',
            'parqueGarciaHuerta' => 'Parque García de la huerta',
            'alercesJazmines' => 'Los Alerces y los Jazmines'
        ];

        $pdf = PDF::loadView('inmobiliarias.hcg.reporte', $data);
        return $pdf->download('reporte_hcg.pdf');
    }

    public function historial_cliente()
    {

    if(Auth::guard('userinmobiliarios')->check()){
        
      return view('inmobiliarias.hcg.historialcliente');

    } else {
      
       return redirect('/hcg');
      
        }
    }

    public function importar_clientes_hcg()
    {

    if(Auth::guard('userinmobiliarios')->check()){

      $proyectos = Proyecto::where('inmobiliaria_id',10)->get();
        
      return view('inmobiliarias.hcg.importar_clientes_hcg')->with('proyectos',$proyectos);

    } else {
      
       return redirect('/hcg');
      
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
