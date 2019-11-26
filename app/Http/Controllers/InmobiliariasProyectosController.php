<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Inmobiliaria;
use App\Proyecto;
use App\Cliente;

class InmobiliariasProyectosController extends Controller
{
  public function datosInmobiliariasProyectos()
  {

    $datos = Proyecto::join('inmobiliarias', 'proyectos.inmobiliaria_id','inmobiliarias.id')
               ->select('proyectos.id as id', 'proyectos.nombre as nombre', 'proyectos.inmobiliaria_id', 'proyectos.descripcion as descripcion', 'proyectos.imagenprevia as imagenprevia', 'proyectos.foto as foto', 'proyectos.foto1 as foto1', 'proyectos.foto2 as foto2', 'proyectos.foto3 as foto3', 'proyectos.fotomobile as fotomobile', 'proyectos.fotomobile1 as fotomobile1', 'proyectos.fotomobile2 as fotomobile2', 'proyectos.fotomobile3 as fotomobile3', 'proyectos.latitud as latitud', 'proyectos.longitud as longitud', 'proyectos.kit as kit', 'proyectos.kit_mobile as kit_mobile', 'proyectos.codigo_kit as codigo_kit', 'proyectos.url_proyecto as url_proyecto', 'proyectos.url_cotizacion as url_cotizacion', 'proyectos.prioridad as prioridad', 'proyectos.tipo as tipo', 'proyectos.ciudad as ciudad', 'inmobiliarias.id as id_inmobiliaria' ,'inmobiliarias.nombre as nombre_inmobiliaria', 'inmobiliarias.logo as logo_inmobiliaria', 'inmobiliarias.imagen as inmobiliaria_imagen', 'inmobiliarias.prioridad as inmobiliaria_prioridad')
               ->get();


    return $datos;

  }
  public function datosInmobiliariasProyectosID($nombre)
  {
    $id_proyecto = str_replace("%20", " ", $nombre);
    $datos = Proyecto::join('inmobiliarias', 'proyectos.inmobiliaria_id','inmobiliarias.id')
               ->select('proyectos.id as id', 'proyectos.nombre as nombre', 'proyectos.inmobiliaria_id', 'proyectos.descripcion as descripcion', 'proyectos.imagenprevia as imagenprevia', 'proyectos.foto as foto', 'proyectos.foto1 as foto1', 'proyectos.foto2 as foto2', 'proyectos.foto3 as foto3', 'proyectos.fotomobile as fotomobile', 'proyectos.fotomobile1 as fotomobile1', 'proyectos.fotomobile2 as fotomobile2', 'proyectos.fotomobile3 as fotomobile3', 'proyectos.latitud as latitud', 'proyectos.longitud as longitud', 'proyectos.kit as kit', 'proyectos.kit_mobile as kit_mobile', 'proyectos.codigo_kit as codigo_kit', 'proyectos.url_proyecto as url_proyecto', 'proyectos.url_cotizacion as url_cotizacion', 'proyectos.prioridad as prioridad', 'proyectos.tipo as tipo', 'proyectos.ciudad as ciudad', 'inmobiliarias.id as id_inmobiliaria' ,'inmobiliarias.nombre as nombre_inmobiliaria', 'inmobiliarias.logo as logo_inmobiliaria', 'inmobiliarias.imagen as inmobiliaria_imagen', 'inmobiliarias.prioridad as inmobiliaria_prioridad')
               ->where('proyectos.nombre', '=', $id_proyecto)
               ->get();
    return $datos;

  }
  public function datosInmobiliariasProyectosCasas()
  {

    $datos = Proyecto::join('inmobiliarias', 'proyectos.inmobiliaria_id','inmobiliarias.id')
               ->select('proyectos.id as id', 'proyectos.nombre as nombre', 'proyectos.inmobiliaria_id', 'proyectos.descripcion as descripcion', 'proyectos.imagenprevia as imagenprevia', 'proyectos.foto as foto', 'proyectos.foto1 as foto1', 'proyectos.foto2 as foto2', 'proyectos.foto3 as foto3', 'proyectos.fotomobile as fotomobile', 'proyectos.fotomobile1 as fotomobile1', 'proyectos.fotomobile2 as fotomobile2', 'proyectos.fotomobile3 as fotomobile3', 'proyectos.latitud as latitud', 'proyectos.longitud as longitud', 'proyectos.kit as kit', 'proyectos.kit_mobile as kit_mobile', 'proyectos.codigo_kit as codigo_kit', 'proyectos.url_proyecto as url_proyecto', 'proyectos.url_cotizacion as url_cotizacion', 'proyectos.prioridad as prioridad', 'proyectos.tipo as tipo', 'proyectos.ciudad as ciudad', 'inmobiliarias.id as id_inmobiliaria' ,'inmobiliarias.nombre as nombre_inmobiliaria', 'inmobiliarias.logo as logo_inmobiliaria', 'inmobiliarias.imagen as inmobiliaria_imagen', 'inmobiliarias.prioridad as inmobiliaria_prioridad')
               ->where('proyectos.tipo', 'Casa')
               ->orderby('proyectos.prioridad', 'ASC')
               ->get();


    return $datos;

  }
  public function datosInmobiliariasProyectosDepartamentos()
  {

    $datos = Proyecto::join('inmobiliarias', 'proyectos.inmobiliaria_id','inmobiliarias.id')
               ->select('proyectos.id as id', 'proyectos.nombre as nombre', 'proyectos.inmobiliaria_id', 'proyectos.descripcion as descripcion', 'proyectos.imagenprevia as imagenprevia', 'proyectos.foto as foto', 'proyectos.foto1 as foto1', 'proyectos.foto2 as foto2', 'proyectos.foto3 as foto3', 'proyectos.fotomobile as fotomobile', 'proyectos.fotomobile1 as fotomobile1', 'proyectos.fotomobile2 as fotomobile2', 'proyectos.fotomobile3 as fotomobile3', 'proyectos.latitud as latitud', 'proyectos.longitud as longitud', 'proyectos.kit as kit', 'proyectos.kit_mobile as kit_mobile', 'proyectos.codigo_kit as codigo_kit', 'proyectos.url_proyecto as url_proyecto', 'proyectos.url_cotizacion as url_cotizacion', 'proyectos.prioridad as prioridad', 'proyectos.tipo as tipo', 'proyectos.ciudad as ciudad', 'inmobiliarias.id as id_inmobiliaria' ,'inmobiliarias.nombre as nombre_inmobiliaria', 'inmobiliarias.logo as logo_inmobiliaria', 'inmobiliarias.imagen as inmobiliaria_imagen', 'inmobiliarias.prioridad as inmobiliaria_prioridad')
               ->where('proyectos.tipo', 'Departamento')
               ->orderby('proyectos.prioridad', 'ASC')
               ->get();


    return $datos;

  }
  public function datosInmobiliariasProyectosOficinas()
  {

    $datos = Proyecto::join('inmobiliarias', 'proyectos.inmobiliaria_id','inmobiliarias.id')
               ->select('proyectos.id as id', 'proyectos.nombre as nombre', 'proyectos.inmobiliaria_id', 'proyectos.descripcion as descripcion', 'proyectos.imagenprevia as imagenprevia', 'proyectos.foto as foto', 'proyectos.foto1 as foto1', 'proyectos.foto2 as foto2', 'proyectos.foto3 as foto3', 'proyectos.fotomobile as fotomobile', 'proyectos.fotomobile1 as fotomobile1', 'proyectos.fotomobile2 as fotomobile2', 'proyectos.fotomobile3 as fotomobile3', 'proyectos.latitud as latitud', 'proyectos.longitud as longitud', 'proyectos.kit as kit', 'proyectos.kit_mobile as kit_mobile', 'proyectos.codigo_kit as codigo_kit', 'proyectos.url_proyecto as url_proyecto', 'proyectos.url_cotizacion as url_cotizacion', 'proyectos.prioridad as prioridad', 'proyectos.tipo as tipo', 'proyectos.ciudad as ciudad', 'inmobiliarias.id as id_inmobiliaria' ,'inmobiliarias.nombre as nombre_inmobiliaria', 'inmobiliarias.logo as logo_inmobiliaria', 'inmobiliarias.imagen as inmobiliaria_imagen', 'inmobiliarias.prioridad as inmobiliaria_prioridad')
               ->where('proyectos.tipo', 'Oficina')
               ->orderby('proyectos.prioridad', 'ASC')
               ->get();


    return $datos;

  }
  public function datosInmobiliariasProyectosCasasSantiago()
  {

    $datos = Proyecto::join('inmobiliarias', 'proyectos.inmobiliaria_id','inmobiliarias.id')
               ->select('proyectos.id as id', 'proyectos.nombre as nombre', 'proyectos.inmobiliaria_id', 'proyectos.descripcion as descripcion', 'proyectos.imagenprevia as imagenprevia', 'proyectos.foto as foto', 'proyectos.foto1 as foto1', 'proyectos.foto2 as foto2', 'proyectos.foto3 as foto3', 'proyectos.fotomobile as fotomobile', 'proyectos.fotomobile1 as fotomobile1', 'proyectos.fotomobile2 as fotomobile2', 'proyectos.fotomobile3 as fotomobile3', 'proyectos.latitud as latitud', 'proyectos.longitud as longitud', 'proyectos.kit as kit', 'proyectos.kit_mobile as kit_mobile', 'proyectos.codigo_kit as codigo_kit', 'proyectos.url_proyecto as url_proyecto', 'proyectos.url_cotizacion as url_cotizacion', 'proyectos.prioridad as prioridad', 'proyectos.tipo as tipo', 'proyectos.ciudad as ciudad', 'inmobiliarias.id as id_inmobiliaria' ,'inmobiliarias.nombre as nombre_inmobiliaria', 'inmobiliarias.logo as logo_inmobiliaria', 'inmobiliarias.imagen as inmobiliaria_imagen', 'inmobiliarias.prioridad as inmobiliaria_prioridad')
               ->where('proyectos.tipo', 'Casa')
               ->where('proyectos.ciudad', 'Santiago')
               ->orderby('proyectos.prioridad', 'ASC')
               ->get();


    return $datos;

  }
  public function datosInmobiliariasProyectosDepartamentosSantiago()
  {

    $datos = Proyecto::join('inmobiliarias', 'proyectos.inmobiliaria_id','inmobiliarias.id')
               ->select('proyectos.id as id', 'proyectos.nombre as nombre', 'proyectos.inmobiliaria_id', 'proyectos.descripcion as descripcion', 'proyectos.imagenprevia as imagenprevia', 'proyectos.foto as foto', 'proyectos.foto1 as foto1', 'proyectos.foto2 as foto2', 'proyectos.foto3 as foto3', 'proyectos.fotomobile as fotomobile', 'proyectos.fotomobile1 as fotomobile1', 'proyectos.fotomobile2 as fotomobile2', 'proyectos.fotomobile3 as fotomobile3', 'proyectos.latitud as latitud', 'proyectos.longitud as longitud', 'proyectos.kit as kit', 'proyectos.kit_mobile as kit_mobile', 'proyectos.codigo_kit as codigo_kit', 'proyectos.url_proyecto as url_proyecto', 'proyectos.url_cotizacion as url_cotizacion', 'proyectos.prioridad as prioridad', 'proyectos.tipo as tipo', 'proyectos.ciudad as ciudad', 'inmobiliarias.id as id_inmobiliaria' ,'inmobiliarias.nombre as nombre_inmobiliaria', 'inmobiliarias.logo as logo_inmobiliaria', 'inmobiliarias.imagen as inmobiliaria_imagen', 'inmobiliarias.prioridad as inmobiliaria_prioridad')
               ->where('proyectos.tipo', 'Departamento')
               ->where('proyectos.ciudad', 'Santiago')
               ->orderby('proyectos.prioridad', 'ASC')
               ->get();


    return $datos;

  }
  public function datosInmobiliariasProyectosCasasRegiones()
  {

    $datos = Proyecto::join('inmobiliarias', 'proyectos.inmobiliaria_id','inmobiliarias.id')
               ->select('proyectos.id as id', 'proyectos.nombre as nombre', 'proyectos.inmobiliaria_id', 'proyectos.descripcion as descripcion', 'proyectos.imagenprevia as imagenprevia', 'proyectos.foto as foto', 'proyectos.foto1 as foto1', 'proyectos.foto2 as foto2', 'proyectos.foto3 as foto3', 'proyectos.fotomobile as fotomobile', 'proyectos.fotomobile1 as fotomobile1', 'proyectos.fotomobile2 as fotomobile2', 'proyectos.fotomobile3 as fotomobile3', 'proyectos.latitud as latitud', 'proyectos.longitud as longitud', 'proyectos.kit as kit', 'proyectos.kit_mobile as kit_mobile', 'proyectos.codigo_kit as codigo_kit', 'proyectos.url_proyecto as url_proyecto', 'proyectos.url_cotizacion as url_cotizacion', 'proyectos.prioridad as prioridad', 'proyectos.tipo as tipo', 'proyectos.ciudad as ciudad', 'inmobiliarias.id as id_inmobiliaria' ,'inmobiliarias.nombre as nombre_inmobiliaria', 'inmobiliarias.logo as logo_inmobiliaria', 'inmobiliarias.imagen as inmobiliaria_imagen', 'inmobiliarias.prioridad as inmobiliaria_prioridad')
               ->where('proyectos.tipo', 'Casa')
               ->where('proyectos.ciudad', '!=', 'Santiago')
               ->orderby('proyectos.prioridad', 'ASC')
               ->get();


    return $datos;

  }
  public function datosInmobiliariasProyectosDepartamentosRegiones()
  {

    $datos = Proyecto::join('inmobiliarias', 'proyectos.inmobiliaria_id','inmobiliarias.id')
               ->select('proyectos.id as id', 'proyectos.nombre as nombre', 'proyectos.inmobiliaria_id', 'proyectos.descripcion as descripcion', 'proyectos.imagenprevia as imagenprevia', 'proyectos.foto as foto', 'proyectos.foto1 as foto1', 'proyectos.foto2 as foto2', 'proyectos.foto3 as foto3', 'proyectos.fotomobile as fotomobile', 'proyectos.fotomobile1 as fotomobile1', 'proyectos.fotomobile2 as fotomobile2', 'proyectos.fotomobile3 as fotomobile3', 'proyectos.latitud as latitud', 'proyectos.longitud as longitud', 'proyectos.kit as kit', 'proyectos.kit_mobile as kit_mobile', 'proyectos.codigo_kit as codigo_kit', 'proyectos.url_proyecto as url_proyecto', 'proyectos.url_cotizacion as url_cotizacion', 'proyectos.prioridad as prioridad', 'proyectos.tipo as tipo', 'proyectos.ciudad as ciudad', 'inmobiliarias.id as id_inmobiliaria' ,'inmobiliarias.nombre as nombre_inmobiliaria', 'inmobiliarias.logo as logo_inmobiliaria', 'inmobiliarias.imagen as inmobiliaria_imagen', 'inmobiliarias.prioridad as inmobiliaria_prioridad')
               ->where('proyectos.tipo', 'Departamento')
               ->where('proyectos.ciudad', '!=', 'Santiago')
               ->orderby('proyectos.prioridad', 'ASC')
               ->get();


    return $datos;

  }
}
