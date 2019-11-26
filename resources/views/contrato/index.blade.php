<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page title -->
    <title>TAMED | Inmobiliarias</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" type="image/ico" href="images/favicon.png" />

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/metisMenu/dist/metisMenu.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/toastr/build/toastr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke/css/helper.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">

</head>
<body class="fixed-navbar sidebar-scroll">

<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            <img src="images/logo_tamed_login.png" class="img-responsive">
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">HOMER APP</span>
        </div>
        <form role="search" class="navbar-form-custom" method="post" action="#">
            <div class="form-group">
                <input type="text" placeholder="Buscas algo en especial" class="form-control" name="search">
            </div>
        </form>
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li class="dropdown">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="left" title="Cerrar sesión">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
           <!-- <a href="{{ url('home2') }}">
                <img src="images/perfilChanchita.JPG" class="img-circle m-b" alt="logo">
            </a>-->

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">{{ Auth::user()->name }}</span>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted">Menú usuario <b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated flipInX m-t-xs">
                       <!-- <li><a href="#">Contactos</a></li>
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Reportes</a></li>
                        <li class="divider"></li>-->
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Cerrar sesión') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ url('home2') }}">Home</a>
            </li>
            <li>
                <a href="#"><span class="nav-label">Reportes</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('reporteProyectos') }}">Reporte estados clientes</a></li>
                    <li><a href="{{ url('reporteMensualProyectos') }}">Reporte por fecha</a></li>
                    <li><a href="{{ url('contrato.finanza') }}">Finanzas</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('cliente') }}"> <span class="nav-label">Buscar clientes</span></a>
            </li>
            <li>
                <a href="{{ url('importar') }}"> <span class="nav-label">Importar clientes</span></a>
            </li>
            <li>
                <a href="#"><span class="nav-label">Contrato</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('contrato.index') }}">Crear</a></li>
                    <li><a href="{{ url('contrato.listado') }}">Ver contratos</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Inmobiliarias</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('adminmobiliariaproyecto') }}">Crear</a></li>
                    <li><a href="{{ url('listar_inmobiliaria_proyecto') }}">Listar</a></li>
                </ul>
            </li>
            <li>
                <a href="#"> <span class="nav-label">Productos</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('producto.index') }}">Crear</a></li>
                    <li><a href="{{ url('producto.listar') }}">Ver productos</a></li>
                </ul>
            </li>
            <li>
                <a href="#"> <span class="nav-label">Inventario de Proyectos</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('inventario') }}">Crear</a></li>
                    <li><a href="{{ url('inventario.listar') }}">Ver inventarios</a></li>
                    <li><a href="{{ url('inventario.editar') }}">Editar inventarios</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('agendaInstaladores') }}"> <span class="nav-label">Agenda Instaladores</span></a>
            </li>
        </ul>
    </div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="normalheader ">
        <div class="hpanel">
            <div class="panel-body">
                <a class="small-header-action" href="">
                    <div class="clip-header">
                        <i class="fa fa-arrow-up"></i>
                    </div>
                </a>

                <div id="hbreadcrumb" class="pull-right m-t-lg">
                    <ol class="hbreadcrumb breadcrumb">
                        <li><a href="{{ url('contrato') }}">Crear contrato</a></li>
                        <li class="active">
                            <span>Contrato</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Crear contrato
                </h2>
                <small>Crear contrato de proyecto</small>
            </div>
        </div>
    </div>



<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    Agregar contrato
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form id="form_contrato">
                            <div class="col-md-10 col-md-offset-1">
                                <h3 class="text-center text-info">DATOS DEL PROYECTO</h3>
                                <hr style="border-color: #FFF;">
                                <div class="form-group">
                                    <label class="control-label" for="inmobiliaria">Inmobiliaria</label>
                                    <select class="form-control" id="inmobiliaria" name="inmobiliaria">
                                        <option value="">-- Seleccione una inmobiliaria --</option>
                                        @foreach($inmobiliarias as $inmobiliaria)
                                            <option value="{{ $inmobiliaria->id }}">{{ $inmobiliaria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="proyecto">Proyecto</label>
                                    <select class="form-control" id="proyecto" name="proyecto">
                                        <option value="">-- Seleccione un proyecto --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="url_drive">Link contrato Google Drive</label>
                                    <input type="number" class="form-control" name="url_drive" id="url_drive" placeholder="Ingrese link a google Drive" min="0">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="cantidad_viviendas_proyectos">Total de viviendas del proyecto</label>
                                    <input type="number" class="form-control" name="cantidad_viviendas_proyectos" id="cantidad_viviendas_proyectos" placeholder="Ingrese cantidad de viviendas" min="0">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="estado_proyecto">Estado del contrato</label>
                                    <select class="form-control" id="estado_proyecto" name="estado_proyecto">
                                        <option value="">-- Seleccione un estado --</option>
                                        @foreach($estados as $estado)
                                            @if($estado->id === 6 || $estado->id === 7)
                                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="pais">País</label>
                                    <select class="form-control" id="pais" name="pais">
                                        <option value="">-- Seleccione un País --</option>
                                        @foreach($paises as $pais)
                                            <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="region">Región/Distrito</label>
                                    <select class="form-control" id="region" name="region">
                                        <option value="">-- Seleccione una Región/Distrito --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="ciudad">Provincia</label>
                                    <select class="form-control" id="ciudad" name="ciudad">
                                        <option value="">-- Seleccione una Provincia --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="comuna">Comuna/Municipio</label>
                                    <select class="form-control" id="comuna" name="comuna">
                                        <option value="">-- Seleccione Comuna/Municipio --</option>
                                    </select>
                                </div>
                                <hr style="border-color: #FFF;">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="rep_legal_proyecto">Nombre representante legal 1</label>
                                            <input type="text" class="form-control" id="rep_legal_proyecto" name="rep_legal_proyecto">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group" id="addClassErrorRutRepLegal">
                                            <label class="control-label" for="rut_rep_legal">Rut representante legal 1</label>
                                            <input type="text" class="form-control" id="rut_rep_legal" name="rut_rep_legal" placeholder="Ingrese RUT 11111111-1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="mandante_proyecto">Nombre representante legal 2</label>
                                            <input type="text" class="form-control" id="mandante_proyecto" name="mandante_proyecto">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group" id="addClassErrorRutMandante">
                                            <label class="control-label" for="rut_mandante_proyecto">Rut representante legal 2</label>
                                            <input type="text" class="form-control" id="rut_mandante_proyecto" name="rut_mandante_proyecto" maxlength="20" placeholder="Ingrese RUT 11111111-1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="ins_personeria_juridica">Fecha inscripción personería jurídica</label>
                                            <div class="input-group date" id="datetimepicker2">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                                <input type="text" class="form-control" id="ins_personeria_juridica" name="ins_personeria_juridica">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="numero_contrato">Número de contrato</label>
                                            <input type="text" class="form-control" id="numero_contrato" name="numero_contrato">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6" hidden="true">
                                        <div class="form-group">
                                            <label class="control-label" for="notario_inscripcion">Notario de inscripción</label>
                                            <input type="text" class="form-control" id="notario_inscripcion" name="notario_inscripcion" placeholder="Ingrese notario de inscripción" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="nom_notario_publico">Nombre notario público</label>
                                            <input type="text" class="form-control" id="nom_notario_publico" name="nom_notario_publico" maxlength="150">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="mes_confeccion_contrato">Mes / Año de confección contrato</label>
                                            <input type="text" class="form-control" id="mes_confeccion_contrato" name="mes_confeccion_contrato">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="nombre_inmobiliaria">Nombre inmobiliaria</label>
                                    <input type="text" class="form-control" id="nombre_inmobiliaria" name="nombre_inmobiliaria" maxlength="50" placeholder="Ingresar nombre de la inmobiliaria">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="direccion">Dirección del proyecto</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" maxlength="150" placeholder="Ingresar dirección del proyecto">
                                </div>
                                <div class="row">
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                            <label class="control-label" for="fecha_inicio_instalacion">Fecha inicio instalación</label>
                                            <div class="input-group date" id="datetimepicker22">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                                <input type="text" class="form-control" id="fecha_inicio_instalacion" name="fecha_inicio_instalacion">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label" for="sala_ventas">Sala de ventas</label>
                                    <br>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="radio_sala_ventas_si" value="si" name="radioInline">
                                        <label for="radio_sala_ventas_si"> Si </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="radio_sala_ventas_no" value="no" name="radioInline">
                                        <label for="radio_sala_ventas_no"> No </label>
                                    </div>
                                </div>
                                <div class="collapse" id="sala_ventas_collapse">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label" for="fecha_imp_sala_venta">Fecha implementación</label>
                                                <div class="input-group date" id="datetimepicker11">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                    <input type="text" class="form-control" id="fecha_imp_sala_venta" name="fecha_imp_sala_venta">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label" for="fecha_cap_sala_venta">Fecha capacitación</label>
                                                <div class="input-group date" id="datetimepicker12">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                    <input type="text" class="form-control" id="fecha_cap_sala_venta" name="fecha_cap_sala_venta">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label" for="fecha_ret_sala_venta">Fecha retiro</label>
                                                <div class="input-group date" id="datetimepicker13">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                    <input type="text" class="form-control" id="fecha_ret_sala_venta" name="fecha_ret_sala_venta">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox checkbox-info">
                                            <input id="chk_stand" name="chk_stand" type="checkbox">
                                            <label for="chk_stand"> Stand </label>
                                        </div>
                                        <div class="checkbox checkbox-info">
                                            <input id="chk_domitizacion" name="chk_domitizacion" type="checkbox">
                                            <label for="chk_domitizacion"> Domotización </label>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <hr>
                                <div class="collapse" id="inventario_stand_collapse">
                                    <div class="form-group">
                                        <h3 class="text-info">Listado de productos</h3>
                                        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="tabla_inventario_sala_ventas">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">id</th>
                                                    <th>Seleccionar</th>
                                                    <th>Código</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Tiempo instalación<br> en horas</th>
                                                    <th>Tiempo configuración<br> en horas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($productos as $producto)
                                                <tr>
                                                    <td style="display: none;">{{ $producto->id }}</td>
                                                    <td>
                                                        <center>
                                                            <div class="checkbox checkbox-info">
                                                                <input type="checkbox" id="checkbox_sala_ventas" name="checkbox_sala_ventas[]" value="{{ $producto->id }}">
                                                                <label for="checkbox_sala_ventas"></label>
                                                            </div>
                                                        </center>
                                                    </td>
                                                    <td>{{ $producto->codigo }}</td>
                                                    <td>{{ $producto->producto }}</td>
                                                    <td><input type="number" class="form-control" id="cantidad_producto" name="cantidad_producto[]" placeholder="Cantidad de productos" min="0"></td>
                                                    <td>{{ $producto->tiempo_instalacion_hora }}</td>
                                                    <td>{{ $producto->tiempo_configuracion_hora }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-info" id="btnAgregarProductoInventarioSalaVenta">Agregar inventario sala de ventas</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Piloto</label>
                                    <br>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="radio_piloto_si" value="si" name="radioInline2">
                                        <label for="radio_piloto_si"> Si </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="radio_piloto_no" value="no" name="radioInline2">
                                        <label for="radio_piloto_no"> No </label>
                                    </div>
                                </div>
                                <div class="collapse" id="piloto_collapse">
                                    <br>
                                    <div class="form-group" hidden="true">
                                        <label class="control-label" for="comuna_piloto">Comuna piloto</label>
                                        <input type="text" class="form-control" id="comuna_piloto" name="comuna_piloto" readonly="true">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="direccion_piloto">Dirección piloto</label>
                                        <input type="text" class="form-control" id="direccion_piloto" name="direccion_piloto" placeholder="Ingrese dirección del piloto" maxlength="100">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="cantidad_piloto">Ingrese cantidad de pilotos</label>
                                        <input type="number" class="form-control" id="cantidad_piloto" name="cantidad_piloto" min="1" placeholder="Ingrese un valor entre 1 y 10">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="observacion_piloto">Observación</label>
                                        <textarea class="form-control" id="observacion_piloto" name="observacion_piloto" rows="4" placeholder="Ingrese una observación"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info" id="btn_agregar_piloto">Agregar Piloto/s</button>
                                    </div>
                                </div>
                                <div class="collapse" id="inventario_piloto_collapse">
                                    <div id="form_inventario_piloto">
                                    </div>
                                    <!--div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <br>
                                                <button type="button" class="btn btn-info" id="btn_agregar_colleccion_piloto">Agregar pilotos especificados</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div-->
                                </div>
                                <hr style="border-color: #FFF;">
                                <h3 class="text-center text-info">DATOS PARA LA FACTURA</h3>
                                <hr style="border-color: #FFF;">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="razon_social_factura">Razón social</label>
                                            <input type="text" class="form-control" id="razon_social_factura" name="razon_social_factura" maxlength="150" placeholder="Ingresar razón social">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="giro_factura">Giro</label>
                                            <input type="text" class="form-control" id="giro_factura" name="giro_factura" maxlength="150" placeholder="ingresar Giro">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group" id="addClassErrorRutFactura">
                                            <label class="control-label" for="rut_factura">Rut</label>
                                            <input type="text" class="form-control" id="rut_factura" name="rut_factura" maxlength="20" placeholder="Ingersar RUT para la factura">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="direccion_factura">Dirección</label>
                                            <input type="text" class="form-control" id="direccion_factura" name="direccion_factura" maxlength="150" placeholder="Ingresar dirección">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="encargado_finanzas">Encargado de finanzas</label>
                                            <input type="text" class="form-control" id="encargado_finanzas" name="encargado_finanzas" maxlength="150">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="email_encargado_finanzas">Email encargado de finanzas</label>
                                            <input type="email" class="form-control" id="email_encargado_finanzas" name="email_encargado_finanzas" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="email_dte">Email DTE</label>
                                            <input type="email" class="form-control" id="email_dte" name="email_dte" maxlength="100">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="monto_contrato">Monto Contrato</label>
                                            <input class="form-control" type="number" id="monto_contrato" name="monto_contrato" placeholder="Ingrese monto del contrato" min="0">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6" hidden="true">
                                        <div class="form-group">
                                            <label class="control-label" for="email_pdf">Email PDF</label>
                                            <input type="email" class="form-control" id="email_pdf" name="email_pdf" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6" hidden="true">
                                        <div class="form-group">
                                            <label class="control-label" for="fecha_esc_personeria">Fecha escritura personería</label>
                                            <div class="input-group date" id="datetimepicker3">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                                <input type="text" class="form-control" id="fecha_esc_personeria" name="fecha_esc_personeria">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6" hidden="true">
                                        <div class="form-group">
                                            <label class="control-label" for="notaria_esc_personeria">Notaría escritura personería</label>
                                            <input type="text" class="form-control" id="notaria_esc_personeria" name="notaria_esc_personeria" maxlength="150">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="pago1_fecha">Pago 1 fecha</label>
                                            <div class="input-group date" id="datetimepicker4">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                                <input type="text" class="form-control" id="pago1_fecha" name="pago1_fecha">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="pago2_fecha">Pago 2 fecha</label>
                                            <div class="input-group date" id="datetimepicker5">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                                <input type="text" class="form-control" id="pago2_fecha" name="pago2_fecha">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="pago3_fecha">Pago 3 fecha</label>
                                            <div class="input-group date" id="datetimepicker6">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                                <input type="text" class="form-control" id="pago3_fecha" name="pago3_fecha">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="pago4_fecha">Pago 4 fecha</label>
                                            <div class="input-group date" id="datetimepicker20">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                                <input type="text" class="form-control" id="pago4_fecha" name="pago4_fecha">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="pago4_fecha">Pago 5 fecha</label>
                                            <div class="input-group date" id="datetimepicker21">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                                <input type="text" class="form-control" id="pago5_fecha" name="pago5_fecha">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border-color: #FFF;">
                                <h3 class="text-center text-info">DATOS RESPONSABLE DE CONTRATO</h3>
                                <hr style="border-color: #FFF;">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="nombre_contacto_cont">Nombre contacto</label>
                                            <input type="text" class="form-control" id="nombre_contacto_cont" name="nombre_contacto_cont">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="cargo_contacto_cont">Cargo contacto</label>
                                            <input type="text" class="form-control" id="cargo_contacto_cont" name="cargo_contacto_cont">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="email_contacto_cont">Email contacto</label>
                                            <input type="email" class="form-control" id="email_contacto_cont" name="email_contacto_cont">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="telefono_contacto_cont">Teléfono contacto</label>
                                            <input type="text" class="form-control" id="telefono_contacto_cont" name="telefono_contacto_cont">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" hidden="true">
                                    <label class="control-label" for="pais_rep_legal">País del representante legal</label>
                                    <select class="form-control" id="pais_rep_legal" name="pais_rep_legal">
                                        <option value="">-- Seleccione País --</option>
                                        @foreach($paises as $pais_rep_legal)
                                            <option value="{{ $pais_rep_legal->id }}">{{ $pais_rep_legal->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" hidden="true">
                                    <label class="control-label" for="region_rep_legal">Región representante legal</label>
                                    <select class="form-control" id="region_rep_legal" name="region_rep_legal">
                                        <option value="">-- Seleccione Región --</option>
                                    </select>
                                </div>
                                <div class="form-group" hidden="true">
                                    <label class="control-label" for="provincia_rep_legal">Provincia representante legal</label>
                                    <select class="form-control" id="provincia_rep_legal" name="provincia_rep_legal">
                                        <option value="">-- Seleccione una Provincia --</option>
                                    </select>
                                </div>
                                <div class="form-group" hidden="true">
                                    <label class="control-label" for="comuna_rep_legal">Comuna representante legal</label>
                                    <select class="form-control" id="comuna_rep_legal" name="comuna_rep_legal">
                                        <option value="">-- Seleccione una Comuna --</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6" hidden="true">
                                        <div class="form-group">
                                            <label class="control-label" for="direccion_rep_legal">Dirección representante legal</label>
                                            <input type="text" class="form-control" id="direccion_rep_legal" name="direccion_rep_legal" placeholder="Ingresar dirección" maxlength="150">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6" hidden="true">
                                        <div class="form-group">
                                            <label class="control-label" for="num_oficina_rep_legal">N° Oficina representante legal</label>
                                            <input type="text" class="form-control" id="num_oficina_rep_legal" name="num_oficina_rep_legal" placeholder="N° Oficina representante legal" maxlength="150">
                                        </div>
                                    </div>
                                </div>
                                <hr style="border-color: #FFF;">
                                <h3 class="text-center text-info">DATOS RESPONSABLE DE MARKETING</h3>
                                <hr style="border-color: #FFF;">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="nombre_contacto_mkt">Nombre contacto MKT</label>
                                            <input type="text" class="form-control" id="nombre_contacto_mkt" name="nombre_contacto_mkt">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="cargo_contacto_mkt">Cargo MKT</label>
                                            <input type="text" class="form-control" id="cargo_contacto_mkt" name="cargo_contacto_mkt">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" form="email_contacto_mkt">Email MKT</label>
                                            <input type="email" class="form-control" id="email_contacto_mkt" name="email_contacto_mkt">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="nombre_agencia_externa">Nombre agencia externa (si aplica)</label>
                                            <input type="text" class="form-control" id="nombre_agencia_externa" name="nombre_agencia_externa">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="link_oficial_proyecto">Link oficial del proyecto</label>
                                    <input type="text" class="form-control" id="link_oficial_proyecto" name="link_oficial_proyecto">
                                </div>
                            </div><!-- Fin Offset inputs -->
                        </form><!-- Fin Formulario Contrato -->
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <hr style="border-color: #FFF;">
                            <button class="btn btn-info btn-block btn-lg" id="btnAgregarContrato">Agregar contrato</button>
                            <hr style="border-color: #FFF;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Inicio modal agregar inventario de piloto -->
<div class="modal fade hmodal-info" id="modalAgregarInventarioPiloto" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg3">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Agregar inventario de productos piloto</h4>
                <small class="font-bold">Formulario para agregar inventario de productos a piloto.</small>
            </div>
            <div class="modal-body" id="">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="hidden" id="numero_piloto" name="numero_piloto">
                        <p class="text-info">Listado de productos</p>
                        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="tabla_inventario_piloto">
                            <thead>
                                <tr>
                                    <th style="display: none;">id</th>
                                    <th>Seleccionar</th>
                                    <th>Código</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Tiempo instalación<br> en horas</th>
                                    <th>Tiempo configuración<br> en horas</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($productos as $producto)
                                <tr>
                                    <td style="display: none;">{{ $producto->id }}</td>
                                    <td>
                                        <center>
                                            <div class="checkbox checkbox-info">
                                                <input type="checkbox" id="checkbox_piloto" name="checkbox_piloto[]" value="{{ $producto->id }}">
                                                <label for="checkbox_piloto"></label>
                                            </div>
                                        </center>
                                    </td>
                                        <td>{{ $producto->codigo }}</td>
                                        <td>{{ $producto->producto }}</td>
                                        <td><input type="number" class="form-control" id="cantidad_producto_piloto" name="cantidad_producto_piloto[]" placeholder="Cantidad de productos" min="0"></td>
                                        <td>{{ $producto->tiempo_instalacion_hora }}</td>
                                        <td>{{ $producto->tiempo_configuracion_hora }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="btnAgregarProductosInventarioPiloto">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin modal agregar inventario piloto -->

    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{session('success')}}</strong>
                </div>
            @endif
        </div>
    </div>

</div>

    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            TAMED GLOBAL
        </span>
        2018 Copyright
    </footer>

</div>



<!-- Vendor scripts -->
<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/metisMenu/dist/metisMenu.min.js') }}"></script>
<script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('vendor/sparkline/index.js') }}"></script>
<script src="{{ asset('vendor/moment/moment.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('vendor/toastr/build/toastr.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- DataTables buttons scripts -->
<script src="{{ asset('vendor/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendor/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<!-- App scripts -->
<script src="{{ asset('scripts/homer.js') }}"></script>
<script src="{{ asset('js/CifrasEnLetras.js') }}"></script>

<script>
$(function(){
    $('#datetimepicker1').datepicker();
    $('#datetimepicker2').datepicker();
    $('#datetimepicker3').datepicker();
    $('#datetimepicker4').datepicker();
    $('#datetimepicker5').datepicker();
    $('#datetimepicker6').datepicker();
    $('#datetimepicker7').datepicker();
    $('#datetimepicker8').datepicker();
    $('#datetimepicker9').datepicker();
    $('#datetimepicker10').datepicker();
    //Fecha implementacion sala de ventas
    $('#datetimepicker11').datepicker();
    //Fecha capacitacion sala de ventas
    $('#datetimepicker12').datepicker();
    //Fecha retiro sala de ventas
    $('#datetimepicker13').datepicker();

    //Fecha implementacion piloto
    $('#datetimepicker14').datepicker();
    //Fecha capacitacion piloto
    $('#datetimepicker15').datepicker();
    //Fecha retiro piloto
    $('#datetimepicker16').datepicker();

    $('#datetimepicker20').datepicker();
    $('#datetimepicker21').datepicker();
    $('#datetimepicker22').datepicker();
});
</script>

<script>
$(window).load(function(){
    $('#direccion').prop('readonly', true);
    $('#direccion_rep_legal').prop('readonly', true);
    $('#radio_sala_ventas_si').prop('disabled', true);
    $('#radio_sala_ventas_no').prop('disabled', true);
    $('#radio_piloto_si').prop('disabled', true);
    $('#radio_piloto_no').prop('disabled', true);
    $('#btnAgregarContrato').prop('disabled', true);
    $('#nombre_inmobiliaria').prop('disabled', true);
    $('#inventario_piloto_collapse').collapse('hide');
});
</script>

<script>
$(document).ready(function(){

    //Datatables
    var table_sala_ventas = $('#tabla_inventario_sala_ventas').dataTable({
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        buttons: [],
    });

    var table_piloto = $('#tabla_inventario_piloto').dataTable({
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        buttons: [],
    });

    //Quitar puntos en los input RUT
    $('#rut_mandante_proyecto').keyup(function(){
        var quitarPunto = $(this).val();
        var rutSinPuntos = quitarPunto.replace(".", "");
        $('#rut_mandante_proyecto').val(rutSinPuntos);
    });
    $('#rut_rep_legal').keyup(function(){
        var quitarPunto = $(this).val();
        var rutSinPuntos = quitarPunto.replace(".", "");
        $('#rut_rep_legal').val(rutSinPuntos);
    });
    $('#rut_factura').keyup(function(){
        var quitarPunto = $(this).val();
        var rutSinPuntos = quitarPunto.replace(".", "");
        $('#rut_factura').val(rutSinPuntos);
    });

    //Quitar espacios en los input RUT
    $('#rut_mandante_proyecto').keyup(function(){
        var quitarEspacio = $(this).val();
        var rutSinEspacios = quitarEspacio.replace(" ", "");
        $('#rut_mandante_proyecto').val(rutSinEspacios);
    });
    $('#rut_rep_legal').keyup(function(){
        var quitarEspacio = $(this).val();
        var rutSinEspacios = quitarEspacio.replace(" ", "");
        $('#rut_rep_legal').val(rutSinEspacios);
    });
    $('#rut_factura').keyup(function(){
        var quitarEspacio = $(this).val();
        var rutSinEspacios = quitarEspacio.replace(" ", "");
        $('#rut_factura').val(rutSinEspacios);
    });

    // Arrays para sala de ventas y pilotos
    var arrayInventarioSalaVenta = new Array();
    //var arrayAllPilotos = [];
    var arrayAllPilotos = new Array();
    //almacenar dato de si lleva o no sala de ventas
    var sala_venta_contrato = '';
    //almacenar si lleva o no stand
    var stand_sala_venta = '';
    //almacenar si lleva domotizacion
    var domotizacion_stand = '';
    //almacenar si lleva o no piloto
    //var arrayAllPilotos = '';
    //almacenar si lleva o no piloto
    var piloto_contrato = '';
    //Si se selecciona piloto pero con form vácio
    var datos_sala_ventas = null;
    var datos_piloto = null;

    //Seleccionar proyectos por inmobiliaria
    $('#inmobiliaria').on('change', function() {
        var inmobiliariaID = $(this).val();
        if(inmobiliariaID) {
            $('#nombre_inmobiliaria').val($('#inmobiliaria').find(":selected").text());
            $.ajax({
                url: '/ajax-proyectos?inm_id='+inmobiliariaID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    console.log(data);
                    //console.log(data[0].cantidad);
                    $('#proyecto').empty();
                    if(data[0].cantidad !== null){
                        $('#cantidad_viviendas_proyectos').empty().val(data[0].cantidad);
                    } else {
                        $('#cantidad_viviendas_proyectos').empty().val(0);
                    }
                    $('#btnAgregarContrato').prop('disabled', false);
                    $.each(data, function(index, proyecto) {
                        $('#proyecto').append('<option value="'+ proyecto.id +'">'+ proyecto.nombre +'</option>');
                    });
                    $('#radio_sala_ventas_si').prop('disabled', false);
                    $('#radio_sala_ventas_no').prop('disabled', false);
                    $('#radio_piloto_si').prop('disabled', false);
                    $('#radio_piloto_no').prop('disabled', false);
                }
            });
        } else {
            $('#proyecto').empty().append('<option value="">-- Seleccione un proyecto --</option>');
            $('#cantidad_viviendas_proyectos').val('');
            $('#nombre_inmobiliaria').val('');
            $('#btnAgregarContrato').prop('disabled', true);

            $('#radio_sala_ventas_si').prop('disabled', true);
            $('#radio_sala_ventas_no').prop('disabled', true);
            $('#radio_piloto_si').prop('disabled', true);
            $('#radio_piloto_no').prop('disabled', true);

            $("#chk_stand").prop("checked", false);
            $("#chk_domitizacion").prop("checked", false);
            $('#fecha_imp_sala_venta').val('');
            $('#fecha_cap_sala_venta').val('');
            $('#fecha_ret_sala_venta').val('');
            $('#inventario_stand_collapse').collapse('hide');

            $('#radio_sala_ventas_si').prop('checked', false);
            $('#radio_sala_ventas_no').prop('checked', false);
            $('#radio_piloto_si').prop('checked', false);
            $('#radio_piloto_no').prop('checked', false);

            $('#sala_ventas_collapse').collapse('hide');
            $('#piloto_collapse').collapse('hide');
            $('#inventario_piloto_collapse').collapse('hide');

            $('#direccion_piloto').val('');
            $('#cantidad_piloto').val('');
            $('#observacion_piloto').val('');

            $('#form_inventario_piloto').empty();
        }
    });

    // Obtener cantidad de viviendas del proyecto seleccionado
    $('#proyecto').on('change', function(){
        var proyecto_id = $('#proyecto').find(":selected").val();
        $.get('get_cantidad_vivienda_proyecto/'+proyecto_id, function(data){
            //console.log(data);
            $('#cantidad_viviendas_proyectos').val(data);
        });
    });

    // Seleccionar Región por País
    $('#pais').on('change', function(){
        var pais_id = $(this).val();
        if(pais_id){
            $.ajax({
                url: '/listar_regiones/'+pais_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    //console.log(data);
                    $('#region').empty();
                    $.each(data, function(index, value){
                        $('#region').append('<option value="'+value.id+'">'+value.nombre+'</option>');
                    });
                }
            });
        } else {
            $('#region').empty().append('<option value="">-- Seleccione una Región/Distrito --</option>');
            $('#ciudad').empty().append('<option value="">-- Seleccione una Ciudad --</option>');
            $('#comuna').empty().append('<option value="">-- Seleccione Comuna/Municipio --</option>');
            $('#direccion').val('');
            $('#direccion').prop('readonly', true);
        }
    });

    // Pais Representante legal
    $('#pais_rep_legal').on('change', function(){
        var pais_id = $(this).val();
        if(pais_id){
            $.ajax({
                url: '/listar_regiones/'+pais_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('#region_rep_legal').empty();
                    $.each(data, function(index, value){
                        $('#region_rep_legal').append('<option value="'+value.id+'">'+value.nombre+'</option>');
                    });
                }
            });
        } else {
            $('#region_rep_legal').empty().append('<option value="">-- Seleccione País --</option>');
            $('#provincia_rep_legal').empty().append('<option value="">-- Seleccione una Provincia --</option>');
            $('#comuna_rep_legal').empty().append('<option value="">-- Seleccione una Comuna --<option>');
            $('#direccion_rep_legal').val('');
            $('#direccion_rep_legal').prop('readonly', true);
        }
    });

    // Seleccionar Ciudad por Región
    $('#region').on('change', function(){
        var region_id = $(this).val();
        if(region_id){
            $.ajax({
                url: '/listar_ciudades/'+region_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    //console.log(data);
                    $('#ciudad').empty();
                    $.each(data, function(index, value){
                        $('#ciudad').append('<option value="'+value.id+'">'+value.nombre+'</option>');
                    });
                }
            });
        } else {
            $('#ciudad').empty().append('<option value="">-- Seleccione una Ciudad --</option>');
        }
    });

    // Región representante legal
    $('#region_rep_legal').on('change', function(){
        var region_id = $(this).val();
        if(region_id){
            $.ajax({
                url: '/listar_ciudades/'+region_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('#provincia_rep_legal').empty();
                    $.each(data, function(index, value){
                        $('#provincia_rep_legal').append('<option value="'+value.id+'">'+value.nombre+'</option>');
                    });
                }
            });
        } else {
            $('#provincia_rep_legal').append('<option value="'+value.id+'">'+value.nombre+'</option>');
        }
    });

    // Seleccionar Comuna por Ciudad
    $('#ciudad').on('change', function(){
        var ciudad_id = $(this).val();
        if(ciudad_id){
            $.ajax({
                url: '/listar_comunas/'+ciudad_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    //console.log(data);
                    $('#direccion').prop('readonly', false);
                    $('#comuna').empty();
                    $.each(data, function(index, value){
                        $('#comuna').append('<option value="'+value.id+'">'+value.nombre+'</option>');
                    });
                }
            })
        } else {
            $('#comuna').empty().append('<option value="">-- Seleccione Comuna/Municipio --</option>');
        }
    });

    // Provincia representante legal
    $('#provincia_rep_legal').on('change', function(){
        var provincia_id = $(this).val();
        if(provincia_id){
            $.ajax({
                url: '/listar_comunas/'+provincia_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('#direccion_rep_legal').prop('readonly', false);
                    $('#comuna_rep_legal').empty();
                    $.each(data, function(index, value){
                        $('#comuna_rep_legal').append('<option ="'+value.id+'">'+value.nombre+'</option>');
                    });
                }
            });
        } else {
            $('#comuna_rep_legal').empty().append('<option>-- Seleccione una Comuna --</option>');
        }
    });

    //Establecer comuna del piloto
    $('#comuna').on('change', function(){
        $('#comuna_piloto').val('');
        var comuna = $('#comuna').find(":selected").text();
        $('#comuna_piloto').val(comuna);
    });

    // Desplegar collapse de sala venta
    $('#radio_sala_ventas_si, #radio_sala_ventas_no').on('click', function(){
        //alert($(this).val());
        if($(this).val() === 'si'){
            sala_venta_contrato = 'SI';
            $('#sala_ventas_collapse').collapse('show');
        } else {
            sala_venta_contrato = 'NO';
            $('#sala_ventas_collapse').collapse('hide');
            $("#chk_stand").prop("checked", false);
            $("#chk_domitizacion").prop("checked", false);
            $('#fecha_imp_sala_venta').val('');
            $('#fecha_cap_sala_venta').val('');
            $('#fecha_ret_sala_venta').val('');
            $('#inventario_stand_collapse').collapse('hide');
            //Vaciar la tabla
            table_sala_ventas.$('input[type="checkbox"]:checked').each(function(){
                $(this).prop('checked', false);
                $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val('');
            });
            arrayInventarioSalaVenta = [];
            console.log(arrayInventarioSalaVenta);
        }
    });

    // Establecer si lleva o no stand
    $('#chk_stand').on('click', function(){
        if($('#chk_stand').is(':checked')){
            stand_sala_venta = 'SI';
        } else {
            stand_sala_venta = 'NO';
        }
    });

    // Abrir subform de productos para realizar inventario de sala de venta
    $('#chk_domitizacion').on('click', function(){
        if($('#chk_domitizacion').is(':checked')){
            domotizacion_stand = 'SI';
            $('#inventario_stand_collapse').collapse('show');
        } else {
            domotizacion_stand = 'NO';
            $('#inventario_stand_collapse').collapse('hide');
            //Vaciar la tabla sala de ventas
            table_sala_ventas.$('input[type="checkbox"]:checked').each(function(){
                $(this).prop('checked', false);
                $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val('');
            });
            arrayInventarioSalaVenta = [];
            console.log(arrayInventarioSalaVenta);
        }
    });

    // Crear inventario de sala de venta
    $('#btnAgregarProductoInventarioSalaVenta').on('click', function(e){
        e.preventDefault();
        //Recorrer la tabla y llenar el array
        if($('[name="checkbox_sala_ventas[]"]:checked').length <= 0){
        	toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Seleccione al menos 1 producto para crear el inventario');
        } else {
        	if(arrayInventarioSalaVenta.length < 1){
            	table_sala_ventas.$('input[type="checkbox"]:checked').each(function(){
                	if($(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val() <= 0){
                    	console.log('La cantidad no puede ser 0');
                	} else {
                    	item = {}
                    	item ["id"] = $(this).val();
                    	item ["cantidad"] = $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val();
                    	arrayInventarioSalaVenta.push(item);
                	}
            	});
            	console.log(arrayInventarioSalaVenta);
            	toastr.options = {
                	"debug": false,
                	"newestOnTop": false,
                	"positionClass": "toast-top-center",
                	"closeButton": true,
                	"toastClass": "animated fadeInDown",
            	};
            	toastr.success('Inventario de productos agregado a la sala de ventas');
        	} else {
            	toastr.options = {
                	"debug": false,
                	"newestOnTop": false,
                	"positionClass": "toast-top-center",
                	"closeButton": true,
                	"toastClass": "animated fadeInDown",
            	};
            	toastr.error('Error - Solo se puede agregar un inventario a la sala de ventas');
        	}//Fin else
        }//Fin else
    });

    // Desplegar subform de piloto
    $('#radio_piloto_si, #radio_piloto_no').on('click', function(){
        //alert($(this).val());
        if($(this).val() === 'si'){
            $('#comuna_piloto').val($('#comuna').find(":selected").text());
            $('#piloto_collapse').collapse('show');
            $('#inventario_piloto_collapse').collapse('show');
            piloto_contrato = 'SI';
        } else {
            $('#comuna_piloto').val('');
            piloto_contrato = 'NO';
            $('#direccion_piloto').val('');
            $('#observacion_piloto').val('');
            $('#cantidad_piloto').val('');
            $('#piloto_collapse').collapse('hide');
            $('#inventario_piloto_collapse').collapse('hide');
            $('#form_inventario_piloto').empty();
            //Vaciar la tabla productos piloto
            table_piloto.$('input[type="checkbox"]:checked').each(function(){
                $(this).prop('checked', false);
                $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val('');
            });
            arrayAllPilotos = [];
            console.log(arrayAllPilotos);
        }
    });

    //
    $('#btn_agregar_piloto').on('click', function(e){
        e.preventDefault();
        var cantidad_piloto = $.trim($('#cantidad_piloto').val());
        var inmobiliaria_id = $('#inmobiliaria').find(":selected").val();
        var proyecto_id = $('#proyecto').find(":selected").val();
        if(!$.isNumeric(cantidad_piloto)){
            //alert('debe ingresar un valor numérico');
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Debe ingresar un valor numérico');
        } else if(cantidad_piloto > 0 && cantidad_piloto <= 10){
            //alert('cantidad permitida');
            /*
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Cantidad permitida');
            */
            $('#inventario_piloto_collapse').collapse('show');
            $('#form_inventario_piloto').empty();

            for(var i=1; i<=cantidad_piloto;i++){

                console.log(i+inmobiliaria_id+proyecto_id);

                $('#form_inventario_piloto').append(
                    '<div class="row">'+
                        '<div class="col-md-12 col-sm-12 col-xs-12">'+
                            '<h3 class="text-info">Ingrese los datos del piloto: '+i+'</h3>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row">'+
                        '<div class="col-md-4 col-sm-4 col-xs-12">'+
                            '<div class="form-group">'+
                                '<label class="control-label" for="fecha_imp_piloto_'+i+inmobiliaria_id+proyecto_id+'">Fecha implementación</label>'+
                                '<div class="input-group date" id="datetimepicker1'+i+inmobiliaria_id+proyecto_id+'">'+
                                    '<span class="input-group-addon">'+
                                        '<span class="fa fa-calendar"></span>'+
                                    '</span>'+
                                    '<input type="text" class="form-control" id="fecha_imp_piloto'+i+inmobiliaria_id+proyecto_id+'" name="fecha_imp_piloto'+i+inmobiliaria_id+proyecto_id+'">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-4 col-sm-4 col-xs-12">'+
                            '<div class="form-group">'+
                                '<label class="control-label" for="fecha_cap_piloto_'+i+inmobiliaria_id+proyecto_id+'">Fecha capacitación</label>'+
                                '<div class="input-group date" id="datetimepicker2'+i+inmobiliaria_id+proyecto_id+'">'+
                                    '<span class="input-group-addon">'+
                                        '<span class="fa fa-calendar"></span>'+
                                    '</span>'+
                                    '<input type="text" class="form-control" id="fecha_cap_piloto'+i+inmobiliaria_id+proyecto_id+'" name="fecha_cap_piloto'+i+inmobiliaria_id+proyecto_id+'">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-4 col-sm-4 col-xs-12">'+
                            '<div class="form-group">'+
                                '<label class="control-label" for="fecha_ret_piloto_'+i+inmobiliaria_id+proyecto_id+'">Fecha retiro</label>'+
                                '<div class="input-group date" id="datetimepicker3'+i+inmobiliaria_id+proyecto_id+'">'+
                                    '<span class="input-group-addon">'+
                                        '<span class="fa fa-calendar"></span>'+
                                    '</span>'+
                                    '<input type="text" class="form-control" id="fecha_ret_piloto'+i+inmobiliaria_id+proyecto_id+'" name="fecha_ret_piloto'+i+inmobiliaria_id+proyecto_id+'">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row">'+
                        '<div class="col-md-12 col-sm-12 col-xs-12">'+
                            "<button type='button' class='btn btn-info' id='btn_inventario_piloto_'"+i+inmobiliaria_id+proyecto_id+"' onclick='modal_agregar_inventario_piloto("+i+")'>Agregar inventario de piloto: "+i+"</button>"+
                        '</div>'+
                    '</div>'
                );
                $("#datetimepicker1"+i+inmobiliaria_id+proyecto_id+"").datepicker();
                $("#datetimepicker2"+i+inmobiliaria_id+proyecto_id+"").datepicker();
                $("#datetimepicker3"+i+inmobiliaria_id+proyecto_id+"").datepicker();
            }// Fin for
        } else {
            //alert('cantidad no permitida');
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Cantidad no permitida');
        }
    });

    // Agregar productos al inventario de pilotos
    $('#btnAgregarProductosInventarioPiloto').on('click', function(e){
        e.preventDefault();

        if($('[name="checkbox_piloto[]"]:checked').length <= 0){
        	toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Seleccione al menos 1 producto para crear el inventario');
        } else {
        	var inmobiliaria_id = $('#inmobiliaria').find(":selected").val();
        	var proyecto_id = $('#proyecto').find(":selected").val();
        	var numero_piloto = $('#numero_piloto').val();
        	console.log('inmobiliaria_id: '+inmobiliaria_id+' proyecto_id: '+proyecto_id+' numero_piloto: '+numero_piloto);

        	var fecha_imp_piloto = $("#fecha_imp_piloto"+numero_piloto+inmobiliaria_id+proyecto_id+"").val();
        	var fecha_cap_piloto = $("#fecha_cap_piloto"+numero_piloto+inmobiliaria_id+proyecto_id+"").val();
        	var fecha_ret_piloto = $("#fecha_ret_piloto"+numero_piloto+inmobiliaria_id+proyecto_id+"").val();

        	console.log('fecha_imp_piloto: '+fecha_imp_piloto+' fecha_cap_piloto: '+fecha_cap_piloto+' fecha_ret_piloto: '+fecha_ret_piloto);

        	$("#tabla_inventario_piloto").dataTable().fnDestroy();

        	var table_piloto = $('#tabla_inventario_piloto').dataTable({
            	dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            	"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            	buttons: [],
        	});

        	//Recorrer la tabla y llenar el array
        	var arrayInventarioPiloto = new Array();
        	table_piloto.$('input[type="checkbox"]:checked').each(function(){
            	if($(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val() <= 0){
                	console.log('La cantidad no puede ser 0');
                	//arrayCantidadCero.push($(this).val());
            	} else {
                	item = {}
                	item ["id"] = $(this).val();
                	item ["cantidad"] = $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val();
                	arrayInventarioPiloto.push(item);
            	}
        	});

        	itemAll = {}
        	itemAll ["fecha_imp_piloto"] = fecha_imp_piloto;
        	itemAll ["fecha_cap_piloto"] = fecha_cap_piloto;
        	itemAll ["fecha_ret_piloto"] = fecha_ret_piloto;
        	itemAll ["inventario_piloto"] = arrayInventarioPiloto;
        	arrayAllPilotos.push(itemAll);
        	/*
        	for(i=0; i<arrayAllPilotos.length; i++){
            	console.log(arrayAllPilotos[i]);
        	}
        	*/
        	console.log(arrayInventarioPiloto);
        	console.log(arrayAllPilotos);
        	toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Inventario de productos de piloto creado');
        	$('#modalAgregarInventarioPiloto').modal('hide');
        }
    });

    /*
        AGREGAR CONTRATO
    */
    $('#btnAgregarContrato').on('click', function(e){
        e.preventDefault();

        //CONTRATO
        var inmobiliaria_id             = $('#inmobiliaria').find(":selected").val();
        var nombre_inmobiliaria         = $('#inmobiliaria').find(":selected").text();
        var proyecto_id                 = $('#proyecto').find(':selected').val();
        var nombre_proyecto             = $('#proyecto').find(':selected').text();
        var total_viviendas_proyectos   = $.trim($('#cantidad_viviendas_proyectos').val());
        var estado_proyecto             = $('#estado_proyecto').find(':selected').val();
        var comuna_id                   = $('#comuna').find(":selected").val();
        var nombre_comuna               = $('#comuna').find(":selected").text();
        var direccion_proyecto          = $.trim($('#direccion').val());
        var mandante_proyecto           = $.trim($('#mandante_proyecto').val());
        var rut_mandante_proyecto       = $.trim($('#rut_mandante_proyecto').val());
        var rep_legal_proyecto          = $.trim($('#rep_legal_proyecto').val());
        var rut_rep_legal               = $.trim($('#rut_rep_legal').val());
        var ins_personeria_juridica     = $.trim($('#ins_personeria_juridica').val());
        var notario_inscripcion         = null;
        var nombre_inmobiliaria         = $.trim($('#nombre_inmobiliaria').val());
        var mes_confeccion_contrato     = $.trim($('#mes_confeccion_contrato').val());
        var numero_contrato             = $.trim($('#numero_contrato').val());
        var comuna_rep_legal            = null;
        var region_rep_legal            = null;
        var direccion_rep_legal         = null;
        var num_oficina_rep_legal       = null;
        var fecha_inicio_instalacion    = $('#fecha_inicio_instalacion').val();// esta ocupará el campo "Fecha probable de entraga" hasta que se pueda editar la tabla y migrar (Cambio provisional)
        var url_drive                   = $.trim($('#url_drive').val());

        // DATOS DE FACTURA
        var razon_social_factura        = $.trim($('#razon_social_factura').val());
        var giro_factura                = $.trim($('#giro_factura').val());
        var rut_factura                 = $.trim($('#rut_factura').val());
        var direccion_factura           = $.trim($('#direccion_factura').val());
        var encargado_finanzas          = $.trim($('#encargado_finanzas').val());
        var email_encargado_finanzas    = $.trim($('#email_encargado_finanzas').val());
        var email_dte                   = $.trim($('#email_dte').val());
        var email_pdf                   = null;
        var fecha_esc_personeria        = null;
        var notaria_esc_personeria      = null;
        var nom_notario_publico         = $.trim($('#nom_notario_publico').val());
        var pago1_fecha                 = $('#pago1_fecha').val();
        var pago2_fecha                 = $('#pago2_fecha').val();
        var pago3_fecha                 = $('#pago3_fecha').val();
        var pago4_fecha                 = $('#pago4_fecha').val();
        var pago5_fecha                 = $('#pago5_fecha').val();
        var monto_contrato              = $.trim($('#monto_contrato').val());
        var cantidad_piloto             = $.trim($('#cantidad_piloto').val());

        // VERIFICAR QUE EL MONTO NO SEA NEGATIVO O MENOR A CERO
        if(!$.isNumeric(monto_contrato) || monto_contrato < 0){
            monto_contrato = 0;
        } else {
            monto_contrato = $.trim($('#monto_contrato').val());
        }

        // RESPONSABLE DEL CONTRATO
        var nombre_contacto_cont        = $.trim($('#nombre_contacto_cont').val());
        var cargo_contacto_cont         = $.trim($('#cargo_contacto_cont').val());
        var email_contacto_cont         = $.trim($('#email_contacto_cont').val());
        var telefono_contacto_cont      = $.trim($('#telefono_contacto_cont').val());
        // RESPONSABLE DE MARKETING
        var nombre_contacto_mkt         = $.trim($('#nombre_contacto_mkt').val());
        var cargo_contacto_mkt          = $.trim($('#cargo_contacto_mkt').val());
        var email_contacto_mkt          = $.trim($('#email_contacto_mkt').val());
        var nombre_agencia_externa      = $.trim($('#nombre_agencia_externa').val());
        var link_oficial_proyecto       = $.trim($('#link_oficial_proyecto').val());

        // SALA DE VENTAS
        var fecha_imp_sala_venta = null;
        var fecha_cap_sala_venta = null;
        var fecha_ret_sala_venta = null;

        if(sala_venta_contrato === 'SI'){
            fecha_imp_sala_venta = $.trim($('#fecha_imp_sala_venta').val());
            fecha_cap_sala_venta = $.trim($('#fecha_cap_sala_venta').val());
            fecha_ret_sala_venta = $.trim($('#fecha_ret_sala_venta').val());
            if(fecha_imp_sala_venta === '' && fecha_cap_sala_venta === '' && fecha_ret_sala_venta === ''){
                datos_sala_ventas = 'por definir';
            }
            if(stand_sala_venta === 'SI'){
                //Comprobar si lleva o no domotización
                if(domotizacion_stand === 'SI'){
                    domotizacion_stand = 'SI';
                } else {
                    domotizacion_stand = 'NO';
                    arrayInventarioSalaVenta = [];
                }
            } else {
                stand_sala_venta = 'NO';
                //vaciar array de sala venta
                arrayInventarioSalaVenta = [];
            }
        } else {
            sala_venta_contrato  = 'NO';
            fecha_imp_sala_venta = null;
            fecha_cap_sala_venta = null;
            fecha_ret_sala_venta = null;
            stand_sala_venta     = null;
            arrayInventarioSalaVenta = [];
        }

        // PILOTOS
        comuna_piloto       = null;
        direccion_piloto    = $.trim($('#direccion_piloto').val());
        cantidad_piloto     = $.trim($('#cantidad_piloto').val());
        observacion_piloto  = $.trim($('#observacion_piloto').val());

        if(piloto_contrato === 'SI'){
        	if(direccion_piloto === '' && cantidad_piloto === '' && observacion_piloto === ''){
        		datos_piloto = 'por definir';
        	} else if(arrayAllPilotos.length < cantidad_piloto || cantidad_piloto === ''){
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error - Falta ingresar inventario del o los pilotos especificados: '+cantidad_piloto);
                return;
            }
        } else if(piloto_contrato === 'NO'){
            comuna_piloto = null;
            direccion_piloto = null;
            cantidad_piloto = null;
            observacion_piloto = null;
            arrayAllPilotos = [];
        } else {
            piloto_contrato = 'NO';
            comuna_piloto = null;
            direccion_piloto = null;
            cantidad_piloto = null;
            observacion_piloto = null;
            arrayAllPilotos = [];
        }

        // VALIDAR CAMPOS OBLIGATORIOS
        if(proyecto_id == ''){
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Debe seleccionar un proyecto');
            return;
        } else {
            // Enviar datos
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'contrato.create/',
                type: 'GET',
                dataType: "JSON",
                data: {
                    "inmobiliaria_id": inmobiliaria_id,
                    "proyecto_id": proyecto_id,
                    "nombre_proyecto": nombre_proyecto,
                    "total_viviendas_proyectos": total_viviendas_proyectos,
                    "estado_proyecto": estado_proyecto,
                    "comuna_id": comuna_id,
                    "nombre_comuna": nombre_comuna,
                    "direccion_proyecto": direccion_proyecto,
                    "mandante_proyecto": mandante_proyecto,
                    "rut_mandante_proyecto": rut_mandante_proyecto,
                    "rep_legal_proyecto": rep_legal_proyecto,
                    "rut_rep_legal": rut_rep_legal,
                    "ins_personeria_juridica": ins_personeria_juridica,
                    "notario_inscripcion": notario_inscripcion,
                    "nombre_inmobiliaria": nombre_inmobiliaria,
                    "mes_confeccion_contrato": mes_confeccion_contrato,
                    "numero_contrato": numero_contrato,
                    "comuna_rep_legal": comuna_rep_legal,
                    "region_rep_legal": region_rep_legal,
                    "direccion_rep_legal": direccion_rep_legal,
                    "num_oficina_rep_legal": num_oficina_rep_legal,
                    "razon_social_factura": razon_social_factura,
                    "giro_factura": giro_factura,
                    "rut_factura": rut_factura,
                    "direccion_factura": direccion_factura,
                    "encargado_finanzas": encargado_finanzas,
                    "email_encargado_finanzas": email_encargado_finanzas,
                    "email_dte": email_dte,
                    "email_pdf": email_pdf,
                    "fecha_esc_personeria": fecha_esc_personeria,
                    "notaria_esc_personeria": notaria_esc_personeria,
                    "nom_notario_publico": nom_notario_publico,
                    "pago1_fecha": pago1_fecha,
                    "pago2_fecha": pago2_fecha,
                    "pago3_fecha": pago3_fecha,
                    "pago4_fecha": pago4_fecha,
                    "pago5_fecha": pago5_fecha,
                    "monto_contrato": monto_contrato,
                    "nombre_contacto_cont": nombre_contacto_cont,
                    "cargo_contacto_cont": cargo_contacto_cont,
                    "email_contacto_cont": email_contacto_cont,
                    "telefono_contacto_cont": telefono_contacto_cont,
                    "nombre_contacto_mkt": nombre_contacto_mkt,
                    "cargo_contacto_mkt": cargo_contacto_mkt,
                    "email_contacto_mkt": email_contacto_mkt,
                    "nombre_agencia_externa": nombre_agencia_externa,
                    "link_oficial_proyecto": link_oficial_proyecto,
                    "sala_venta_contrato": sala_venta_contrato,
                    "stand_sala_venta": stand_sala_venta,
                    "domotizacion_stand": domotizacion_stand,
                    "fecha_imp_sala_venta": fecha_imp_sala_venta,
                    "fecha_cap_sala_venta": fecha_cap_sala_venta,
                    "fecha_ret_sala_venta": fecha_ret_sala_venta,
                    "piloto_contrato": piloto_contrato,
                    "comuna_piloto": comuna_piloto,
                    "direccion_piloto": direccion_piloto,
                    "cantidad_piloto": cantidad_piloto,
                    "observacion_piloto": observacion_piloto,
                    "arrayInventarioSalaVenta": arrayInventarioSalaVenta,
                    "arrayAllPilotos": arrayAllPilotos,
                    "fecha_inicio_instalacion": fecha_inicio_instalacion,
                    "datos_sala_ventas": datos_sala_ventas,
                    "datos_piloto": datos_piloto
                },
                success: function(data){
                    console.log(data);
                    //console.log(data.resultado);
                    if(data.resultado == 0){
                        //Limpiar datos de sala de ventas
                        $('#inventario_stand_collapse').collapse('hide');
                        table_sala_ventas.$('input[type="checkbox"]:checked').each(function(){
                            $(this).prop('checked', false);
                            $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val('');
                        });
                        arrayInventarioSalaVenta = [];
                        //Limpiar datos piloto
                        $('#piloto_collapse').collapse('hide');
                        $('#inventario_piloto_collapse').collapse('hide');
                        $('#form_inventario_piloto').empty();
                        table_piloto.$('input[type="checkbox"]:checked').each(function(){
                            $(this).prop('checked', false);
                            $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val('');
                        });
                        arrayAllPilotos = [];
                        //Limpiar formulario
                        $("#form_contrato")[0].reset();
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Contrato agregado');
                        return;
                    } else {
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.error('Error - No se pudo agregar el contrato: '+data);
                        return;
                    }
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                },
            });
        }

    });// Fin Agregar Contrato

});// Fin Document Ready
</script>

<script type="text/javascript">
    //Abrir modal de tabla pilotos
    function modal_agregar_inventario_piloto(numero_piloto){
        $('#numero_piloto').empty().val(numero_piloto);

        $("#tabla_inventario_piloto").dataTable().fnDestroy();

        var table_piloto = $('#tabla_inventario_piloto').dataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [],
        });

        //Vaciar la tabla
        table_piloto.$('input[type="checkbox"]:checked').each(function(){
            $(this).prop('checked', false);
            $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val('');
        });

        $('#modalAgregarInventarioPiloto').modal('show');
    }
</script>

<script>
//Validar RUT
var Fn = {
    // Valida el rut con su cadena completa "XXXXXXXX-X"
    validaRut : function (rutCompleto) {
        rutCompleto = rutCompleto.replace("‐","-");
        if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
            return false;
        var tmp     = rutCompleto.split('-');
        var digv    = tmp[1];
        var rut     = tmp[0];
        if ( digv == 'K' ) digv = 'k' ;

        return (Fn.dv(rut) == digv );
    },
    dv : function(T){
        var M=0,S=1;
        for(;T;T=Math.floor(T/10))
            S=(S+T%10*(9-M++%6))%11;
        return S?S-1:'k';
    }
}

$("#rut_mandante_proyecto").on('change', function(){
    if (Fn.validaRut($("#rut_mandante_proyecto").val())){
        //$("#msgerror").html("El rut ingresado es válido");
        $('#addClassErrorRutMandante').removeClass('has-error has-feedback');
    } else {
        //$("#msgerror").html("El Rut no es válido :'( ");
        //$('#addClassErrorRutMandante').addClass('has-error has-feedback');
        //alert('RUT ingresado no es valido');
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-top-center",
            "closeButton": true,
            "toastClass": "animated fadeInDown",
        };
        //toastr.error('Error - RUT ingresado no es valido');
    }
});

$("#rut_rep_legal").on('change', function(){
    if (Fn.validaRut($("#rut_rep_legal").val())){
        //$("#msgerror").html("El rut ingresado es válido");
        $('#addClassErrorRutRepLegal').removeClass('has-error has-feedback');
    } else {
        //$("#msgerror").html("El Rut no es válido :'( ");
        //$('#addClassErrorRutRepLegal').addClass('has-error has-feedback');
        //alert('RUT ingresado no es valido');
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-top-center",
            "closeButton": true,
            "toastClass": "animated fadeInDown",
        };
        //toastr.error('Error - RUT ingresado no es valido');
    }
});

$("#rut_factura").on('change', function(){
    if (Fn.validaRut($("#rut_factura").val())){
        //$("#msgerror").html("El rut ingresado es válido");
        $('#addClassErrorRutFactura').removeClass('has-error has-feedback');
    } else {
        //$("#msgerror").html("El Rut no es válido :'( ");
        //alert('RUT ingresado no es valido');
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-top-center",
            "closeButton": true,
            "toastClass": "animated fadeInDown",
        };
        toastr.error('Error - RUT ingresado no es valido');
        $('#addClassErrorRutFactura').addClass('has-error has-feedback');
    }
});
</script>

<script>
$(document).ready(function(){
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
});
</script>

</body>
</html>
