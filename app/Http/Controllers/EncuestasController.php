<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuestas;
use DB;
class EncuestasController extends Controller
{
  public function encuesta($cliente_id, $calificacion, $protocolo_id)
  {
     $encuestalista = DB::table('encuestas')->where('protocolo_id', $protocolo_id)->count();
     if ($encuestalista > 0){
       return view('encontrado');
      }else{
        try {
            $encuesta = DB::table('encuestas')->insert(
              ['cliente_id' => $cliente_id, 'calificacion' => $calificacion, 'protocolo_id' => $protocolo_id]
            );

         return view('gracias');

        } catch (Exception $e) {
             return view('error');
        }
    }

  }
}
