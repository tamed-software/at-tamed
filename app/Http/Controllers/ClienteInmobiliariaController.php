<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Response;
use Session;
use PDF;
use App\Inmobiliaria;
use App\Proyecto;
use App\Cliente;
use App\Estado;
use App\Usersinmobiliaria;

class ClienteInmobiliariaController extends Controller
{

    //use AuthenticatesUsers;
    
    public function showLoginForm()
    {
        return view('inmobiliarias.rezepka.index');
    }
    

    //protected $loginView = 'inmobiliarias.rezepka.index';

    //protected $guard = 'userinmobiliarios';

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

        if (Auth::guard('userinmobiliarios')->attempt($credentials) && $inmobiliaria_id === 25) {
            return redirect()->intended('rezepka/dashboard');
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
        return redirect('/rezepka');
    }
    
    protected function guard()
    {
        return Auth::guard('userinmobiliarios');
    }

    public function index()
    {
        //return view('inmobiliarias.rezepka.index');
    }

    public function login()
    {
        /*
        $credentials = $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials)){
            return 'Tu sesión a iniciado correctamente';
        } else {
            return back()
                ->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros'])
                ->withInput(request(['email']));
        }
        */
    }

    public function dashboard()
    {
        if(Auth::guard('userinmobiliarios')->check()){     
            //Proyecto Back+Office Bussiness Park Etapa1
            $etapa1_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 27)
                                ->where('clientes.estado_id', 1)
                                ->where('proyectos.estado_id', 6)
                                ->count();
            $etapa1_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 27)
                                ->where('clientes.estado_id', 2)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            $etapa1_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 27)
                                ->where('clientes.estado_id', 3)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            $etapa1_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 27)
                                ->where('clientes.estado_id', 4)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            $etapa1_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 27)
                                ->where('clientes.estado_id', 5)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            $etapa1_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 27)
                                ->where('clientes.estado_id', 10)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            $etapa1_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 27)
                                ->where('clientes.estado_id', 8)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            //Proyecto Back+Office Bussiness Park Etapa2
            $etapa2_con = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 78)
                                ->where('clientes.estado_id', 1)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            $etapa2_noCon = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 78)
                                ->where('clientes.estado_id', 2)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            $etapa2_ins = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 78)
                                ->where('clientes.estado_id', 3)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            $etapa2_agen = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 78)
                                ->where('clientes.estado_id', 4)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            $etapa2_sin = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 78)
                                ->where('clientes.estado_id', 5)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            $etapa2_pendiente = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 78)
                                ->where('clientes.estado_id', 10)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            $etapa2_ins_cap = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                                ->where('clientes.proyecto_id', 78)
                                ->where('clientes.estado_id', 8)
                                ->where('proyectos.estado_id', 6)
                                ->count();

            return view('inmobiliarias.rezepka.dashboard')->with('etapa1_con', $etapa1_con)->with('etapa1_noCon', $etapa1_noCon)->with('etapa1_ins', $etapa1_ins)->with('etapa1_agen', $etapa1_agen)->with('etapa1_sin', $etapa1_sin)->with('etapa1_pendiente', $etapa1_pendiente)->with('etapa1_ins_cap', $etapa1_ins_cap)->with('etapa2_con', $etapa2_con)->with('etapa2_noCon', $etapa2_noCon)->with('etapa2_ins', $etapa2_ins)->with('etapa2_agen', $etapa2_agen)->with('etapa2_sin', $etapa2_sin)->with('etapa2_pendiente', $etapa2_pendiente)->with('etapa2_ins_cap', $etapa2_ins_cap);
        } else {
            return redirect('/rezepka');
        }
    }

    public function backoffice1()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $backoffice_etapa1 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 27)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo')
                                ->get();

            return view('inmobiliarias.rezepka.backoffice_etapa1')->with('backoffice_etapa1', $backoffice_etapa1);
        } else {
            return redirect('/rezepka');
        }
    }

    public function backoffice2()
    {
        if(Auth::guard('userinmobiliarios')->check()){
            $backoffice_etapa2 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 78)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo', 'clientes.pdf_protocolo')
                                ->get();

            return view('inmobiliarias.rezepka.backoffice_etapa2')->with('backoffice_etapa2', $backoffice_etapa2);
        } else {
            return redirect('/rezepka');
        }
    }

    public function generar_reporte()
    {
        $reporte_rezepka_etapa1 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 27)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();

        $reporte_rezepka_etapa2 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 78)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion', 'clientes.fecha_emision_protocolo')
                                ->get();

        $data = [
            'reporte_rezepka_etapa1' => $reporte_rezepka_etapa1,
            'reporte_rezepka_etapa2' => $reporte_rezepka_etapa2,
            'title' => 'Reporte PDF Inmobiliaria Rezepka',
            'etapa1' => 'Back+Office Business Park - Etapa 1',
            'etapa2' => 'Back+Office Business Park - Etapa 2'
        ];
        
        $pdf = PDF::loadView('inmobiliarias.rezepka.reporte', $data);
        return $pdf->download('reporte_rezepka.pdf');
    }

    public function generar_reporte_etapa1()
    {
        $reporte_rezepka_etapa1 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 27)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion')
                                ->get();
        
        $data = [
            'reporte_rezepka_etapa1' => $reporte_rezepka_etapa1,
            'title' => 'Reporte PDF Inmobiliaria Rezepka',
            'etapa1' => 'Back+Office Business Park - Etapa 1'
        ];

        $pdf = PDF::loadView('inmobiliarias.rezepka.reporte_etapa1', $data);
        return $pdf->download('reporte_rezepka_etapa1.pdf');   
    }

    public function generar_reporte_etapa2()
    {
        $reporte_rezepka_etapa2 = Cliente::join('estados', 'clientes.estado_id', 'estados.id')
                                ->where('clientes.proyecto_id', 78)
                                ->select('estados.nombre as nombre_estado', 'clientes.vivienda', 'clientes.nombre', 'clientes.apellido', 'clientes.telefono1', 'clientes.correo', 'clientes.fecha_instalacion')
                                ->get();
        
        $data = [
            'reporte_rezepka_etapa2' => $reporte_rezepka_etapa2,
            'title' => 'Reporte PDF Inmobiliaria Rezepka',
            'etapa2' => 'Back+Office Business Park - Etapa 2'
        ];

        $pdf = PDF::loadView('inmobiliarias.rezepka.reporte_etapa2', $data);
        return $pdf->download('reporte_rezepka_etapa2.pdf');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inmobiliarias = Inmobiliaria::where('estado_id', 6)->orderBy('nombre', 'asc')->get();
        return view('inmobiliarias.rezepka.register')->with('inmobiliarias', $inmobiliarias);
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
