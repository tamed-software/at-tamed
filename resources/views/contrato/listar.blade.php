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
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/lib/sweet-alert.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/toastr/build/toastr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fooTable/css/footable.core.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fooTable/css/footable.core.min.css') }}" />



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
                        <li><a href="{{ url('contrato.listado') }}">Listado de contrato</a></li>
                        <li class="active">
                            <span>Listado de contratos</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Contratos
                </h2>
                <small>Listar contratos</small>
            </div>
        </div>
    </div>
<div class="content">
    <div class="hpanel">
        <div class="panel-heading">
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
            </div>
            Listado de contratos
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="listadoContratos">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" id="pais" name="pais">
                                <option value="0" selected>Todos</option>
                                <option value="1">Chile</option>
                                <option value="2">Perú</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-sm btn-success" id="filtrarContratos">Filtrar</button>
                        </div>
                    </div>
                    <hr>
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Nombre<br>Inmobiliaria</th>
                            <th>Proyecto</th>
                            <th>Contrato</th>
                            <th>Piloto</th>
                            <th>Sala de <br>ventas</th>
                            <th>MKT</th>
                            <th>Área<br>Tecnica</th>
                            <th>Finanzas</th>
                            <th>Comercial</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tbContrato">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- MODAL VER CONTRATO -->
<div class="modal fade hmodal-info" id="modalContrato" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Datos del contrato</h4>
                <small class="font-bold">Información completa del contrato.</small>
            </div>
            <div class="modal-body" id="listado_contrato">
            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-warning" onclick="ver_drive()">Ver en Drive</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL VER SALA VENTAS -->
<div class="modal fade hmodal-info" id="modalSalaVentas" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Detalles Sala de Ventas</h4>
                <small class="font-bold">Información completa de sala ventas.</small>
            </div>
            <div class="modal-body" id="salaVentasDetalle" style="justify-content: center;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDITAR SALA VENTAS -->
<div class="modal fade hmodal-warning" id="modalEditarSalaVentas" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg2">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Editar Sala de ventas</h4>
                <small class="font-bold">Editar Sala de ventas.</small>
            </div>
            <div class="modal-body">
                <div id="editar_sala_ventas"></div>
                 <div>
                    <div class="row" id="">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h3 class="text-info">Visitas a Sala Ventas</h3>
                            </div>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            <div class="form-group">
                                <button type="button" class="btn btn-info" id="btnAgregarVisitaSalaVenta">Nueva Visita</button>
                            </div>
                        </div>
                    </div>
                    <div id="visitaSalaVenta"></div>
                    <div class="collapse" id="modalBtnSalaVenta">
                        <div class="col-md-12">
                            <div class="form-group">
                                 <button type="button" class="btn btn-info" id="btnGuardarVisitaSalaVenta">Guardar Visita</button>
                                 <hr>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="collapse" id="inventario_stand_editar">
                            <div class="row" id="">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <h3 class="text-info">Esta sala ya posee inventario, elimina el inventario para agregar uno nuevo.</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-info" id="btnEliminarInventarioStand">Eliminar inventario</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="collapse" id="inventario_stand_collapse">
                        <div class="form-group">
                            <div class="col-md-12">
                            	<h3 class="text-info">Listado de productos</h3>
                            </div>
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
                </div>
            </div>
            <div class="modal-footer" id="">
                <div class="col-md-12">
                	<button type="button" class="btn btn-warning" data-dismiss="modal" id="limpiarVisitaPiloto">Cerrar</button>
                	<button type="button" class="btn btn-primary" id="btnActualizarSalaVenta">Guardar</button>
            	</div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDITAR PILOTO -->
<div class="modal fade hmodal-warning" id="modalEditarPiloto" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg2">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Editar Piloto</h4>
                <small class="font-bold">Editar Piloto.</small>
            </div>
            <div class="modal-body">
                <div id="editar_piloto">
                    <div class="row">
                        <form id="">
                            <h4 class="text-center text-warning">DATOS PILOTO</h4>
                            <input type="hidden" value="" class="form-control" id="id_salaVenta">
                                <hr style="border-color: #FFF;" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="fecha_implementacion_sala_ventas">Fecha implementación</label>
                                    <div class="input-group date" id="datetimepicker20">
                                       <span class="input-group-addon">
                                           <span class="fa fa-calendar"></span>
                                       </span>
                                       <input type="text" value="" class="form-control" id="fecha_implementacion_piloto" name="fecha_implementacion_piloto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="fecha_capacitacion_sala_ventas">Fecha Capacitacion</label>
                                    <div class="input-group date" id="datetimepicker21">
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                        <input type="text" class="form-control" value="" id="fecha_capacitacion_piloto" name="fecha_capacitacion_piloto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="fecha_retiro_sala_ventas">Fecha Retiro</label>
                                    <div class="input-group date" id="datetimepicker22">
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                        <input type="text" class="form-control" value="" id="fecha_retiro_piloto" name="fecha_retiro_piloto">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="stand_sala_ventas">Dirección</label>
                                    <input type="text" class="form-control" value="" id="direccion_piloto" name="direccion_piloto" >
                                </div>
                               <div class="form-group">
                                   <label class="control-label" for="descripcion_sala_ventas">Descripción</label>
                                   <input type="text" class="form-control" id="descripcion_piloto" name="descripcion_piloto" value="">
                               </div>
                                <div class="form-group">
                                    <label class="control-label" for="estado_piloto">Estado Piloto</label>
                                    <select class="form-control" id="estado_piloto" name="estado_piloto">
                                       <option id="opcion_estado_piloto" value=""></option>
                                       <option value="11">Listo</option>
                                       <option value="10">Con Observación</option>
                                    </select>
                                </div>
                               <div class="form-group">
                                   <input type="hidden" class="form-control" id="contrato_id" name="contrato_id" value="">
                               </div>
                               <div class="form-group">
                                   <input type="hidden" class="form-control" id="piloto_id" name="piloto_id" value="">
                               </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                   <label class="control-label" for="observacion_piloto">Oservaciones</label>
                                   <input type="text" class="form-control" value="" id="observacion_piloto" name="observacion_piloto">
                               </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div>
                    <div class="row" id="">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h3 class="text-info">Visitas a Piloto</h3>
                            </div>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            <div class="form-group">
                                <button type="button" class="btn btn-info" id="btnAgregarVisitaPiloto">Nueva Visita</button>
                            </div>
                        </div>
                    </div>
                    <div id="visitaPiloto"></div>
                    <div class="collapse" id="modalBtnPiloto">
                        <div class="col-md-12">
                            <div class="form-group">
                                 <button type="button" class="btn btn-info" id="btnGuardarVisitaPiloto">Guardar Visita</button>
                                 <hr>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="collapse" id="inventario_piloto_editar">
                            <div class="row" id="">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <h3 class="text-info">Este piloto ya posee inventario, elimina el inventario para agregar uno nuevo.</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-info" id="btnEliminarInventarioPiloto">Eliminar inventario</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="collapse" id="inventario_piloto_collapse">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h3 class="text-info">Listado de productos</h3>
                            </div>
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
                            <button type="button" class="btn btn-info" id="btnAgregarProductoInventarioPiloto">Agregar inventario Piloto</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="">
                <div class="col-md-12">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnActualizarPiloto">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PILOTO -->
<div class="modal fade hmodal-info" id="modalPiloto" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Detalles Piloto</h4>
                <small class="font-bold">Información completa Piloto.</small>
            </div>
            <div class="modal-body" id="pilotoDetalle">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!--MODAL MKT-->
<div class="modal fade hmodal-info" id="modalMkt" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Detalles Marketing</h4>
            </div>
            <div class="modal-body" id="mktDetalle">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDITAR MKT -->
<div class="modal fade hmodal-warning" id="modalEditarMkt" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg2">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Comentario Marketing</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="estado_observacion_mkt">Estado de observación</label>
                        <select class="form-control" id="estado_observacion_mkt" name="estado_observacion_mkt">
                            <option id="opcion_comentario_mkt" value=""></option>
                        @foreach($estados as $estado)
                            @if($estado->id === 10 || $estado->id === 11)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="contrato_id_mkt" name="contrato_id_mkt" value="">
                    </div>
                    <hr style="border-color: #FFF;">
                </div>
                 <div >
                    <div class="row" id="">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h3 class="text-warning">Comentarios Marketing</h3>
                                </div>
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <div class="form-group">
                                    <button type="button" class="btn btn-info" id="btnAgregarComentarioMkt">Nuevo Comentario</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="nuevoComentarioMkt" class="col-md-12"></div>
                    <div class="form-group">
                        <button type="button" class="btn btn-info" id="btnGuardarComentarioMkt">Guardar Comentario</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="">
                <div class="col-md-12">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnActualizarMkt">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--MODAL Área tecnica-->
<div class="modal fade hmodal-info" id="modalAreaTecnica" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Área Técnica</h4>
            </div>
            <div class="modal-body" id="areaTecnicaDetalle">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!--MODAL Finanzas-->
<div class="modal fade hmodal-info" id="modalFinanza" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Finanzas</h4>
            </div>
            <div class="modal-body" id="finanzasDetalles">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDITAR Finanza -->
<div class="modal fade hmodal-warning" id="modalEditarFinanza" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg2">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Comentario Finanza</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="estado_observacion_finanza">Estado de observación</label>
                        <select class="form-control" id="estado_observacion_finanza" name="estado_observacion_finanza">
                            <option id="opcion_comentario_finanza" value=""></option>
                        @foreach($estados as $estado)
                            @if($estado->id === 10 || $estado->id === 11)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="contrato_id_finanza" name="contrato_id_finanza" value="">
                    </div>
                    <hr style="border-color: #FFF;">
                </div>
                 <div >
                    <div class="row" id="">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h3 class="text-warning">Comentarios Finanza</h3>
                                </div>
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <div class="form-group">
                                    <button type="button" class="btn btn-info" id="btnAgregarComentarioFinanza">Nuevo Comentario</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="nuevoComentarioFinanza" class="col-md-12"></div>
                    <div class="form-group">
                        <button type="button" class="btn btn-info" id="btnGuardarComentarioFinanza">Guardar Comentario</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="">
                <div class="col-md-12">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnActualizarFinanza">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!--MODAL Finanzas-->
<div class="modal fade hmodal-info" id="modalComercial" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Área Comercial</h4>
            </div>
            <div class="modal-body" id="comercialDetalles">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDITAR Finanza -->
<div class="modal fade hmodal-warning" id="modalEditarComercial" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg2">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Comentario Área Comercial</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="estado_observacion_comercial">Estado de observación</label>
                        <select class="form-control" id="estado_observacion_comercial" name="estado_observacion_comercial">
                            <option id="opcion_comentario_comercial" value=""></option>
                        @foreach($estados as $estado)
                            @if($estado->id === 10 || $estado->id === 11)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="contrato_id_comercial" name="contrato_id_comercial" value="">
                    </div>
                    <hr style="border-color: #FFF;">
                </div>
                 <div>
                    <div class="row" id="">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h3 class="text-warning">Comentarios Área Comercial</h3>
                                </div>
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <div class="form-group">
                                    <button type="button" class="btn btn-info" id="btnAgregarComentarioComercial">Nuevo Comentario</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="nuevoComentarioComercial" class="col-md-12"></div>
                    <div class="form-group">
                        <button type="button" class="btn btn-info" id="btnGuardarComentarioComercial">Guardar Comentario</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="">
                <div class="col-md-12">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnActualizarComercial">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL EDITAR MKT -->
<div class="modal fade hmodal-warning" id="modalEditarAreaTecnica" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg2">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Comentario Área Técnica</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="estado_observacion_area_tecnica">Estado de observación</label>
                        <select class="form-control" id="estado_observacion_area_tecnica" name="estado_observacion_area_tecnica">
                            <option id="opcion_comentario_area_tecnica" value=""></option>
                        @foreach($estados as $estado)
                            @if($estado->id === 10 || $estado->id === 11)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="contrato_id_at" name="contrato_id_at" value="">
                    </div>
                    <hr style="border-color: #FFF;">
                </div>
                 <div >
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h3 class="text-warning">Comentarios Área Técnica</h3>
                                </div>
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <div class="form-group">
                                    <button type="button" class="btn btn-info" id="btnAgregarComentarioAreaTecnica">Nuevo Comentario</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="nuevoComentarioAreaTecnica" class="col-md-12"></div>
                </div>
                <div class="form-group">
                   	<button type="button" class="btn btn-info" id="btnGuardarComentarioAreaTecnica">Guardar Comentario</button>
                </div>
            </div>
            <div class="modal-footer" id="">
                <div class="col-md-12">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" id="">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnActualizarAreaTecnica">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL EDITAR CONTRATO -->
<div class="modal fade hmodal-warning" id="modalEditarContrato" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg2">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Editar contrato</h4>
                <small class="font-bold">Editar contrato.</small>
            </div>
            <div class="modal-body" id="editar_contrato">
                <!-- -->
                <div class="row">
                    <form id="">
                        <h4 class="text-center text-warning">DATOS DEL PROYECTO</h4>
                            <input type="hidden" id="id_contrato" name="id_contrato">
                            <hr style="border-color: #FFF;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="nombre_inmobiliaria">Inmobiliaria</label>
                                <!--AGREGAR INPUT EN APPEND-->
                                <input type="text" class="form-control" id="nombre_inmobiliaria" name="nombre_inmobiliaria" readonly="true">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="proyecto_id">Proyecto</label>
                                <select class="form-control" id="proyecto_id" name="proyecto_id">

                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="num_contrato">Nº Contrato</label>
                                <input type="text" class="form-control" id="num_contrato" name="num_contrato">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="total_viviendas_proyectos">Total de viviendas del proyecto</label>
                                <input type="number" class="form-control" name="total_viviendas_proyectos" id="total_viviendas_proyectos">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="estado_proyecto">Estado del contrato</label>
                                <select class="form-control" id="estado_proyecto" name="estado_proyecto">
                                    <option id="estado_proyecto2" value=""></option>
                                @foreach($estados as $estado)
                                    @if($estado->id === 6 || $estado->id === 7)
                                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="mesAñoConfeccion">Mes / Año confección contrato:</label>
                                <input type="text" class="form-control" id="mesAñoConfeccion" name="mesAñoConfeccion">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="pais_proyecto">País del proyecto</label>
                                 <select class="form-control" id="pais_proyecto" name="pais_proyecto">
                                    <option id="pais_proyecto2" value=""></option>
                                    <!--option id="proyecto_id2" value=""></option-->
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="region_proyecto">Regíon del proyecto</label>
                                 <select class="form-control" id="region_proyecto" name="region_proyecto">
                                    <option id="region_proyecto2" value=""></option>
                                    <!--option id="proyecto_id2" value=""></option-->
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="ciudad_proyecto">Ciudad del proyecto</label>
                                 <select class="form-control" id="ciudad_proyecto" name="ciudad_proyecto">
                                    <option id="ciudad_proyecto2" value=""></option>
                                    <!--option id="proyecto_id2" value=""></option-->
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="comuna_proyecto">Comuna del proyecto</label>
                                 <select class="form-control" id="comuna_proyecto" name="comuna_proyecto">
                                    <option id="comuna_proyecto2" value=""></option>
                                    <!--option id="proyecto_id2" value=""></option-->
                                </select>
                                <hr style="border-color: #FFF;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="direccion_proyecto">Dirección del proyecto</label>
                                <input type="text" class="form-control" id="direccion_proyecto" name="direccion_proyecto">
                            </div>
                            @if(Auth::user()->perfil == 1 || Auth::user()->perfil == 2)
                                <div class="col-md-8" style="padding-left: 0">
                                    <div class="form-group">
                                        <label class="control-label" for="fecha_inicio_instalacion">Fecha inicio instalación por contrato</label>
                                        <div class="input-group date" id="datetimepicker16">
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                            <input type="text" class="form-control" id="fecha_inicio_instalacion" name="fecha_inicio_instalacion">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <br>
                                        <button type="button" class="btn btn-primary btn-sm" id="btnPersonalizar">Personalizar</button>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            @else

                                <div class="form-group">
                                    <label class="control-label" for="fecha_inicio_instalacion">Fecha inicio instalación por contrato</label>
                                    <div class="input-group date" id="datetimepicker16">
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                        <input type="text" class="form-control" id="fecha_inicio_instalacion" name="fecha_inicio_instalacion">
                                    </div>
                                </div>

                            @endif
                            <div class="collapse" id="collapseInstalacionesPrsonalizadas">
                                <label class="control-label" for="">Fecha instalación personalizada</label>
                                <div class="col-md-12" style="padding-left: 0" id="fechas_personalizadas">

                                </div>
                            </div>
                            <div class="collapse" id="collapseInstalaciones">
                                <div class="col-md-5" style="padding-left: 0">
                                    <div class="form-group">
                                        <label class="control-label" for="fecha_inicio_instalacion_personalizado">Fecha Desde</label>
                                        <div class="input-group date" id="datetimepicker23">
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                            <input type="text" class="form-control" id="fecha_inicio_instalacion_personalizado" name="fecha_inicio_instalacion_personalizado">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style="padding-left: 0">
                                    <div class="form-group">
                                        <label class="control-label" for="fecha_fin_instalacion_personalizado">Fecha Hasta</label>
                                        <div class="input-group date" id="datetimepicker24">
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                            <input type="text" class="form-control" id="fecha_fin_instalacion_personalizado" name="fecha_fin_instalacion_personalizado">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2" style="padding-left: 0">
                                    <div class="form-group">
                                        <br>
                                        <center>
                                            <i class="fa fa-plus fa-2x text-warning" aria-hidden="true" style="width:6; height:6; cursor: pointer;" id="personalizarFechaInstalacion"></i>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapseInstalacionesPersonalizado">
                                <div class="col-md-5" style="padding-left: 0">
                                    <div class="form-group">
                                        <label class="control-label" for="fecha_personalizada1">Fecha</label>
                                        <div class="input-group date" id="datetimepicker25">
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                            <input type="text" class="form-control" id="fecha_personalizada1" name="fecha_personalizada1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label" for="cant_pesonalizada1">Cant. Viviendas</label>
                                        <input type="number" class="form-control" min="0" id="cant_pesonalizada1" name="">
                                    </div>
                                </div>
                                <div class="col-md-2" style="padding-left: 0">
                                    <div class="form-group">
                                        <br>
                                        <center>
                                            <i class="fa fa-plus fa-2x text-warning" aria-hidden="true" style="width:6; height:6; cursor: pointer;" id="agregarFechaInstalacion"></i>
                                        </center>
                                    </div>
                                </div>
                                <div id="divNuevaFechaInstalacion"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="sala_ventas">Sala de ventas</label>
                                <input type="text" class="form-control" id="sala_ventas" name="sala_ventas" readonly="true">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="vivienda_piloto">Vivienda piloto</label>
                                <input type="text" class="form-control" id="vivienda_piloto" name="vivienda_piloto" readonly="true">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="rep_legal_proyecto">Nombre representante legal 1</label>
                                <input type="text" class="form-control" id="rep_legal_proyecto" name="rep_legal_proyecto">
                            </div>
                            <div class="form-group" id="addClassErrorRutRepLegal">
                                <label class="control-label" for="rut_rep_legal">Rut representante legal 1</label>
                                <input type="text" class="form-control" id="rut_rep_legal" name="rut_rep_legal">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="rep_legal_proyecto2">Nombre representante legal 2</label>
                                <input type="text" class="form-control" id="rep_legal_proyecto2" name="rep_legal_proyecto2">
                            </div>
                            <div class="form-group" id="addClassErrorRutMandante">
                                <label class="control-label" for="rut_rep_legal2">Rut representante legal 2</label>
                                <input type="text" class="form-control" id="rut_rep_legal2" name="rut_rep_legal2" maxlength="20">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="ins_personeria_juridica">Fecha inscripción personería jurídica</label>
                                <div class="input-group date" id="datetimepicker2">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                    <input type="text" class="form-control" id="ins_personeria_juridica" name="ins_personeria_juridica">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="notario_ins">Nombre notario publico</label>
                                <input type="text" class="form-control" id="notario_ins" name="notario_ins">
                                <hr style="border-color: #FFF;">
                            </div>
                        </div>
                        <hr style="border-color: #FFF;">
                        <hr style="border-color: #FFF;">
                        <h4 class="text-center text-warning">OBSERVACIONES</h4>
                        <hr style="border-color: #FFF;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="observacion_contrato">Observación</label>
                                <input type="text" class="form-control" id="observacion_contrato" name="observacion_contrato">
                            </div>
                        <hr style="border-color: #FFF;">
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label class="control-label" for="estado_observacion_contrato">Estado de observación</label>
                                <select class="form-control" id="estado_observacion_contrato" name="estado_observacion_contrato">
                                    <option id="estado_observacion_contrato2" value=""></option>
                                @foreach($estados as $estado)
                                    @if($estado->id === 10 || $estado->id === 11)
                                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                            <hr style="border-color: #FFF;">
                        </div>
                        <hr style="border-color: #FFF;">
                        <hr style="border-color: #FFF;">
                        <h4 class="text-center text-warning">DATOS PARA LA FACTURA</h4>
                        <hr style="border-color: #FFF;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="razon_social_factura">Razón social</label>
                                <input type="text" class="form-control" id="razon_social_factura" name="razon_social_factura">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="giro_factura">Giro</label>
                                <input type="text" class="form-control" id="giro_factura" name="giro_factura">
                            </div>
                            <div class="form-group" id="addClassErrorRutFactura">
                                <label class="control-label" for="rut_factura">Rut</label>
                                <input type="text" class="form-control" id="rut_factura" name="rut_factura" maxlength="20">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="direccion_factura">Dirección</label>
                                <input type="text" class="form-control" id="direccion_factura" name="direccion_factura">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="encargado_finanzas">Encargado de finanzas</label>
                                <input type="text" class="form-control" id="encargado_finanzas" name="encargado_finanzas">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email_encargado_finanzas">Email encargado de finanzas</label>
                                <input type="email" class="form-control" id="email_encargado_finanzas" name="email_encargado_finanzas">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="email_dte">Email DTE</label>
                                <input type="email" class="form-control" id="email_dte" name="email_dte">
                            </div>
                            <div class="form-group" id="addClassErrorRutFactura">
                                <label class="control-label" for="monto_contrato">Monto contrato UF</label>
                                <input type="text" class="form-control" id="monto_contrato" name="monto_contrato" maxlength="20">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="fecha_pago_1">Fecha Pago 1</label>
                                <div class="input-group date" id="datetimepicker11">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                    <input type="text" class="form-control" id="fecha_pago_1" name="fecha_pago_1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="fecha_pago_2">Fecha Pago 2</label>
                                <div class="input-group date" id="datetimepicker12">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                    <input type="text" class="form-control" id="fecha_pago_2" name="fecha_pago_2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="fecha_pago_3">Fecha Pago 3</label>
                                <div class="input-group date" id="datetimepicker13">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                    <input type="text" class="form-control" id="fecha_pago_3" name="fecha_pago_3">
                                </div>
                            </div>
                            <div id="contenedor_fecha_pago"></div>
                        </div>
                        <div class="col-md-6">
                            <hr style="border-color: #FFF;">
                            <h4 class="text-center text-warning">DATOS RESPONSABLE DE CONTRATO</h4>
                            <hr style="border-color: #FFF;">
                            <div class="form-group">
                                <label class="control-label" for="nombre_rep_legal">Nombre de contacto</label>
                                <input type="text" class="form-control" id="nombre_rep_legal" name="nombre_rep_legal">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="cargo_rep_legal">Cargo Rep. Legal</label>
                                <input type="text" class="form-control" id="cargo_rep_legal" name="cargo_rep_legal">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email_rep_legal">Email Rep. Legal</label>
                                <input type="email" class="form-control" id="email_rep_legal" name="email_rep_legal">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="telefono_rep_legal">Teléfono Rep. Legal</label>
                                <input type="text" class="form-control" id="telefono_rep_legal" name="telefono_rep_legal">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <hr style="border-color: #FFF;">
                            <h4 class="text-center text-warning">DATOS RESPONSABLE DE MARKETING</h4>
                            <hr style="border-color: #FFF;">
                            <div class="form-group">
                                <label class="control-label" for="nombre_contacto_mkt">Nombre contacto MKT</label>
                                <input type="text" class="form-control" id="nombre_contacto_mkt" name="nombre_contacto_mkt">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="cargo_contacto_mkt">Cargo MKT</label>
                                <input type="text" class="form-control" id="cargo_contacto_mkt" name="cargo_contacto_mkt">
                            </div>
                            <div class="form-group">
                                <label class="control-label" form="email_contacto_mkt">Email MKT</label>
                                <input type="email" class="form-control" id="email_contacto_mkt" name="email_contacto_mkt">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="nombre_agencia_externa">Nombre agencia externa (si aplica)</label>
                                <input type="text" class="form-control" id="nombre_agencia_externa" name="nombre_agencia_externa">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="link_oficial_proyecto">Link oficial del proyecto</label>
                                <input type="text" class="form-control" id="link_oficial_proyecto" name="link_oficial_proyecto">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnActualizarContrato">Guardar</button>
            </div>
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
<script src="{{ asset('vendor/sweetalert/lib/sweet-alert.min.js') }}"></script>
<script src="{{ asset('vendor/moment/moment.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('vendor/toastr/build/toastr.min.js') }}"></script>
<script src="{{ asset('vendor/fooTable/dist/footable.all.min.js') }}"></script>
<script src="{{ asset('vendor/fooTable/dist/footable.all.min.js') }}"></script>
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

<!--script>
$(window).load(function(){
    $.get('/api/inmobiliaria', function(data){
        //console.log(data);
        $('#inmobiliaria').empty();
        $('#inmobiliaria').append('<option value=""> Seleccione inmobiliaria </option>');
        $.each(data, function(index, inmobiliaria){
            //console.log(inmobiliaria.id+' '+inmobiliaria.nombre);
            $('#inmobiliaria').append('<option value="'+inmobiliaria.id+'">'+inmobiliaria.nombre+'</option>');
        });
    });
});
</script-->

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
    $('#datetimepicker11').datepicker();
    $('#datetimepicker12').datepicker();
    $('#datetimepicker13').datepicker();
    $('#datetimepicker14').datepicker();
    $('#datetimepicker15').datepicker();
    $('#datetimepicker16').datepicker();
    $('#datetimepicker20').datepicker();
    $('#datetimepicker21').datepicker();
    $('#datetimepicker22').datepicker();
    $('#datetimepicker23').datepicker();
    $('#datetimepicker24').datepicker();
    $('#datetimepicker25').datepicker();

});
</script>
<script>
function cargar_tabla(){

        var pais = $('#pais').find(':selected').val();

        $.ajax({
            url: '/estados_contrato/'+ pais,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $contador = 1;
                $.each(data, function(index, contratos) {

                    if(contratos.direccion_proyecto == null){

                        contratos.direccion_proyecto = '';

                    }
                    // 11 "#5ED31B" 10 "#FE502D"
                    $('#tbContrato').append('<tr id="trPrincipal'+contratos.id_contrato+'" >'+
                                                '<td>'+$contador+'</td>'+
                                                '<td>'+contratos.nombre_inmobiliaria+'</td>'+
                                                '<td>'+contratos.nombre_proyecto+'</td>'+
                                                '<td id="tdContrato'+contratos.id_contrato+'"><center><input type="radio" name="testing" id="rbContrato'+ contratos.id_contrato +'" data-toggle="tooltip" data-placement="top" title="Contrato" /></center></td>'+
                                                '<td id="tdPiloto'+contratos.id_contrato+'"><center><input type="radio" name="testing" id="rbPiloto'+ contratos.id_contrato +'" data-toggle="tooltip" data-placement="top" title="Piloto"/></center></td>'+
                                                '<td id="tdSalaVenta'+contratos.id_contrato+'"><center><input type="radio" name="testing" id="rbSalaVenta'+ contratos.id_contrato +'" data-toggle="tooltip" data-placement="top" title="Sala Ventas"/></center></td>'+
                                                '<td id="tdMkt'+contratos.id_contrato+'"><center><input type="radio" name="testing" id="rbMkt'+ contratos.id_contrato +'" data-toggle="tooltip" data-placement="top" title="Marketing"/></center></td>'+
                                                '<td id="tdAreaTecnica'+contratos.id_contrato+'"><center><input type="radio" name="testing" id="rbAreaTecnica'+ contratos.id_contrato +'" data-toggle="tooltip" data-placement="top" title="Área Tecnica"/></center></td>'+
                                                '<td id="tdFinanza'+contratos.id_contrato+'"><center><input type="radio" name="testing" id="rbFinanza'+ contratos.id_contrato +'" data-toggle="tooltip" data-placement="top" title="Finanzas"/></center></td>'+
                                                '<td id="tdComercial'+contratos.id_contrato+'"><center><input type="radio" name="testing" id="rbComercial'+ contratos.id_contrato +'" data-toggle="tooltip" data-placement="top" title="Comercial"/></center></td>'+
                                                '<td id="tdVerMas'+contratos.id_contrato+'"><button type="button" class="btn btn-sm btn-warning" onclick="accionVer('+contratos.id_contrato+')">Ver más</button></td>'+
                                                '<td id="tdEditar'+contratos.id_contrato+'"><button type="button" class="btn btn-sm btn-info" onclick="accionEditar('+contratos.id_contrato+')">Editar</button></td>'+
                                            '</tr>');

                    if(contratos.sala_ventas == 'NO' && contratos.piloto == 'NO' || contratos.sala_ventas == 'NO' && contratos.piloto == null || contratos.piloto == 'NO' && contratos.sala_ventas == null){

                        if(contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == 11
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == null
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == null && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == null && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == null && contratos.estado_finanza == 11  && contratos.estado_comercial == 11
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == null && contratos.estado_finanza == 11  && contratos.estado_comercial == null
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == 11
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == null
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == 11 && contratos.estado_finanza == null && contratos.estado_comercial == 11
                        || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == 11 && contratos.estado_finanza == null && contratos.estado_comercial == null
                        ){

                            document.getElementById("trPrincipal" + contratos.id_contrato).style.backgroundColor = "#5ED31B";
                            document.getElementById("trPrincipal" + contratos.id_contrato).style.color = "#FFF";
                            document.getElementById("tdContrato" + contratos.id_contrato).style.border = "1px solid black";

                            if(contratos.estado_mkt == 11){

                                document.getElementById("tdMkt" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_at == 11){

                                document.getElementById("tdAreaTecnica" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_finanza){


                                document.getElementById("tdFinanza" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_comercial == 11 ){

                                document.getElementById("tdComercial" + contratos.id_contrato).style.border = "1px solid black";

                            }

                        }

                    }else if(contratos.sala_ventas == 'SI' && contratos.piloto == 'SI'){

                        if(contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == 11 && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            ||contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == 11 && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            ||contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == 11 && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            ||contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == 11 && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == null && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == null && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == null && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == null && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == null && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == null && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == null && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == null && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == null && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == null && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_at == null && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == 11 && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == 11 && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == 11 && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_at == 11 && contratos.estado_piloto == 11 && contratos.estado_sala == 11 && contratos.estado_finanza == null && contratos.estado_comercial == null){

                            document.getElementById("trPrincipal" + contratos.id_contrato).style.backgroundColor = "#5ED31B";
                            document.getElementById("trPrincipal" + contratos.id_contrato).style.color = "#FFF";
                            document.getElementById("tdContrato" + contratos.id_contrato).style.border = "1px solid black";
                            document.getElementById("tdPiloto" + contratos.id_contrato).style.border = "1px solid black";
                            document.getElementById("tdSalaVenta" + contratos.id_contrato).style.border = "1px solid black";

                            if(contratos.estado_mkt == 11){

                                document.getElementById("tdMkt" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_at == 11){

                                document.getElementById("tdAreaTecnica" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_finanza){


                                document.getElementById("tdFinanza" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_comercial){


                                document.getElementById("tdComercial" + contratos.id_contrato).style.border = "1px solid black";

                            }

                        }

                    }else if(contratos.sala_ventas == 'SI' || contratos.piloto == 'NO'){

                        if(contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_sala == 11 && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_sala == 11 && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            ||contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_sala == 11 && contratos.estado_at == 11 && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            ||contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_sala == 11 && contratos.estado_at == 11 && contratos.estado_finanza == null && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_sala == 11 && contratos.estado_at == null && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_sala == 11 && contratos.estado_at == null && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_sala == 11 && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_sala == 11 && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_sala == 11 && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_sala == 11 && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_sala == 11 && contratos.estado_at == 11 && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_sala == 11 && contratos.estado_at == 11 && contratos.estado_finanza == null && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_sala == 11 && contratos.estado_at == null && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_sala == 11 && contratos.estado_at == null && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_sala == 11 && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_sala == 11 && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == null){

                            document.getElementById("trPrincipal" + contratos.id_contrato).style.backgroundColor = "#5ED31B";
                            document.getElementById("trPrincipal" + contratos.id_contrato).style.color = "#FFF";
                            document.getElementById("tdContrato" + contratos.id_contrato).style.border = "1px solid black";
                            document.getElementById("tdSalaVenta" + contratos.id_contrato).style.border = "1px solid black";

                            if(contratos.estado_mkt == 11){

                                document.getElementById("tdMkt" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_at == 11){

                                document.getElementById("tdAreaTecnica" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_finanza){


                                document.getElementById("tdFinanza" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_comercial){


                                document.getElementById("tdComercial" + contratos.id_contrato).style.border = "1px solid black";

                            }

                        }

                    }else if(contratos.sala_ventas == 'NO' || contratos.piloto == 'SI'){

                        if(contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_piloto == 11 && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_piloto == 11 && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            ||contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_piloto == 11 && contratos.estado_at == 11 && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            ||contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_piloto == 11 && contratos.estado_at == 11 && contratos.estado_finanza == null && contratos.estado_comercial == null
                            ||contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_piloto == 11 && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            ||contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_piloto == 11 && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_piloto == 11 && contratos.estado_at == null && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_piloto == 11 && contratos.estado_at == null && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_piloto == 11 && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_piloto == 11 && contratos.estado_at == null && contratos.estado_finanza == null && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_piloto == 11 && contratos.estado_at == null && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == 11 && contratos.estado_piloto == 11 && contratos.estado_at == null && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_piloto == 11 && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_piloto == 11 && contratos.estado_at == 11 && contratos.estado_finanza == 11 && contratos.estado_comercial == null
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_piloto == 11 && contratos.estado_at == 11 && contratos.estado_finanza == null && contratos.estado_comercial == 11
                            || contratos.estado_contrato == 11 && contratos.estado_mkt == null && contratos.estado_piloto == 11 && contratos.estado_at == 11 && contratos.estado_finanza == null && contratos.estado_comercial == null){

                            document.getElementById("trPrincipal" + contratos.id_contrato).style.backgroundColor = "#5ED31B";
                            document.getElementById("trPrincipal" + contratos.id_contrato).style.color = "#FFF";
                            document.getElementById("tdContrato" + contratos.id_contrato).style.border = "1px solid black";
                            document.getElementById("tdPiloto" + contratos.id_contrato).style.border = "1px solid black";

                            if(contratos.estado_mkt == 11){

                                document.getElementById("tdMkt" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_at == 11){

                                document.getElementById("tdAreaTecnica" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_finanza){


                                document.getElementById("tdFinanza" + contratos.id_contrato).style.border = "1px solid black";

                            }else if(contratos.estado_comercial){


                                document.getElementById("tdComercial" + contratos.id_contrato).style.border = "1px solid black";

                            }

                        }

                    }

                        if(contratos.estado_contrato == 11){

                            document.getElementById("tdContrato" + contratos.id_contrato).style.backgroundColor = "#5ED31B";

                        }else{

                            document.getElementById("tdContrato" + contratos.id_contrato).style.backgroundColor = "#FE502D";

                        }

                        if(contratos.estado_sala == 11){

                            document.getElementById("tdSalaVenta" + contratos.id_contrato).style.backgroundColor = "#5ED31B";

                        }else if(contratos.estado_sala == 10 || contratos.sala_ventas == 'SI' && contratos.estado_sala == null){

                            document.getElementById("tdSalaVenta" + contratos.id_contrato).style.backgroundColor = "#FE502D";

                        }

                        if(contratos.estado_piloto == 11){

                            document.getElementById("tdPiloto" + contratos.id_contrato).style.backgroundColor = "#5ED31B";

                        }else if(contratos.estado_piloto == 10 || contratos.piloto == 'SI' && contratos.estado_piloto == null){

                            document.getElementById("tdPiloto" + contratos.id_contrato).style.backgroundColor = "#FE502D";

                        }

                        if(contratos.estado_mkt == 11){

                            document.getElementById("tdMkt" + contratos.id_contrato).style.backgroundColor = "#5ED31B";

                        }else if(contratos.estado_mkt == 10){

                            document.getElementById("tdMkt" + contratos.id_contrato).style.backgroundColor = "#FE502D";

                        }

                        if(contratos.estado_at == 11){

                            document.getElementById("tdAreaTecnica" + contratos.id_contrato).style.backgroundColor = "#5ED31B";

                        }else if(contratos.estado_at == 10){

                            document.getElementById("tdAreaTecnica" + contratos.id_contrato).style.backgroundColor = "#FE502D";

                        }
                        if(contratos.estado_finanza == 11){

                            document.getElementById("tdFinanza" + contratos.id_contrato).style.backgroundColor = "#5ED31B";

                        }else if(contratos.estado_finanza == 10){

                            document.getElementById("tdFinanza" + contratos.id_contrato).style.backgroundColor = "#FE502D";

                        }
                        if(contratos.estado_comercial == 11){

                            document.getElementById("tdComercial" + contratos.id_contrato).style.backgroundColor = "#5ED31B";

                        }else if(contratos.estado_comercial == 10){

                            document.getElementById("tdComercial" + contratos.id_contrato).style.backgroundColor = "#FE502D";

                        }


                    $contador = $contador + 1;

                });


                $(function(){
					$.fn.dataTable.ext.errMode = 'throw';
					$('#listadoContratos').dataTable({
            			"dom": "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                   	    "lengthMenu": [ [ -1, 10, 25, 50], ["All", 10, 25, 50] ],
                   	    "buttons":[]
        			});
				});

             }

        });
    }
</script>
<!--script>
$(function(){
    $('#example1').footable();

    listadoContratos
});
</script-->

<script>
$(document).ready(function(){

    var arrayInventarioSalaVenta = new Array();
    var arrayInventarioPiloto = new Array();
    var arrayVisitaSalaVenta = new Array();
    var arrayVisitaPiloto = new Array();
    var arrayComentarioMkt = new Array();
    var arrayComentarioAT = new Array();
    var arrayComentarioFinanza = new Array();
    var arrayComentarioComercial = new Array();

    var contadorComentarioComercial = 0;
    var contadorComentarioFinanza = 0;
    var contadorVisitaSala = 0;
    var contadorVisitaPiloto = 0;
    var contadorComentarioContrato = 0;
    var contadorComentarioMkt = 0;
    var contadorComentarioAT = 0;
    var contadorFechaInstalacion = 1;
    var verificarRangoPersonalizacion = "false";
    var verificarPersonalizacion = "false";

    $('#btnActualizarContrato').on('click', function(e){

      //Funcion que toma los datos del modal y los manda al controlador para actualizar el contrato
      //Se está usando el campo "mandante" y "rut_mandante" para hacer referencia a
      //los datos del posible segundo responsable de contrato, ademas se utiliza el campo "fecha_probable entrega"
      //para hacer referencia a la fecha de inicio de instalacion, estos son solo un cambio provisional
      //hasta que se pueda modificar la tabla y migrar.

          var id_contrato                 = $('#id_contrato').val();
          var estado_proyecto             = $('#estado_proyecto').find(':selected').val();
          var proyecto_id                 = $('#proyecto_id').find(':selected').val();
          var estado_observacion          = $('#estado_observacion_contrato').find(':selected').val();
          var observacion_contrato        = $.trim($('#observacion_contrato').val());
          var nombre_proyecto             = $('#proyecto_id').find(':selected').text();
          var total_viviendas_proyectos   = $.trim($('#total_viviendas_proyectos').val());
          var direccion_proyecto          = $.trim($('#direccion_proyecto').val());
          var comuna_proyecto_id          = $('#comuna_proyecto').find(':selected').val();
          var comuna_proyecto             = $('#comuna_proyecto').find(':selected').text();
          var numero_contrato             = $.trim($('#num_contrato').val());
          var nombre_inmobiliaria    		= $('#nombre_inmobiliaria').val();
          var mesAñoConfeccion			= $.trim($('#mesAñoConfeccion').val());
          var sala_ventas                 = $.trim($('#sala_ventas').val());
          var vivienda_piloto             = $.trim($('#vivienda_piloto').val());
          var rep_legal_proyecto 			= $.trim($('#rep_legal_proyecto').val());
          var rut_rep_legal               = $.trim($('#rut_rep_legal').val());
          var rep_legal_proyecto2 		= $.trim($('#rep_legal_proyecto2').val());
          var rut_rep_legal2				= $.trim($('#rut_rep_legal2').val());
          var razon_social_factura        = $.trim($('#razon_social_factura').val());
          var giro_factura                = $.trim($('#giro_factura').val());
          var rut_factura                 = $.trim($('#rut_factura').val());
          var direccion_factura           = $.trim($('#direccion_factura').val());
          var encargado_finanzas          = $.trim($('#encargado_finanzas').val());
          var email_encargado_finanzas    = $.trim($('#email_encargado_finanzas').val());
          var email_dte                   = $.trim($('#email_dte').val());
          var monto_contrato              = $.trim($('#monto_contrato').val());
          var fecha_pago_1                = $.trim($('#fecha_pago_1').val());
          var fecha_pago_2                = $.trim($('#fecha_pago_2').val());
          var fecha_pago_3                = $.trim($('#fecha_pago_3').val());
          var fecha_pago_4                = $.trim($('#fecha_pago_4').val());
          var fecha_pago_5                = $.trim($('#fecha_pago_5').val());
          var nombre_responsable 			= $.trim($('#nombre_rep_legal').val());
          var cargo_rep_legal 			= $.trim($('#cargo_rep_legal').val());
          var email_rep_legal				= $.trim($('#email_rep_legal').val());
          var telefono_rep_legal			= $.trim($('#telefono_rep_legal').val());
          var nombre_contacto_mkt 		= $.trim($('#nombre_contacto_mkt').val());
          var cargo_contacto_mkt			= $.trim($('#cargo_contacto_mkt').val());
          var email_contacto_mkt			= $.trim($('#email_contacto_mkt').val());
          var agencia_externa 			= $.trim($('#nombre_agencia_externa').val());
          var link_proyecto 				= $.trim($('#link_oficial_proyecto').val());
          var notario_publico             = $.trim($('#notario_ins').val());
          var ins_personeria_juridica     = $.trim($('#ins_personeria_juridica').val());
          var fecha_inicio_instalacion    = $.trim($('#fecha_inicio_instalacion').val());
          var fecha_desde_personalizado = $.trim($('#fecha_inicio_instalacion_personalizado').val());
          var fecha_hasta_personalizado = $.trim($('#fecha_fin_instalacion_personalizado').val());


          if(verificarPersonalizacion == "true"){

            var comprobarSumInstalaciones = 0;

            var sumInstalaciones = 0;

            for (s = 1; s <= contadorFechaInstalacion; s++) {

                sumInstalaciones = $.trim($('#cant_pesonalizada'+s).val());

                comprobarSumInstalaciones = parseInt(sumInstalaciones)+ parseInt(comprobarSumInstalaciones);

            }

            if(comprobarSumInstalaciones < total_viviendas_proyectos){

              toastr.options = {
                  "debug": false,
                  "newestOnTop": false,
                  "positionClass": "toast-top-center",
                  "closeButton": true,
                  "toastClass": "animated fadeInDown",
              };
              toastr.error('Aún quedan viviendas por instalar, verifique los datos ingresados.');

            }else if(comprobarSumInstalaciones > total_viviendas_proyectos){

              toastr.options = {
                  "debug": false,
                  "newestOnTop": false,
                  "positionClass": "toast-top-center",
                  "closeButton": true,
                  "toastClass": "animated fadeInDown",
              };
              toastr.error('Exedió la cantidad total de viviendas, verifique los datos ingresados.');

            }else if(comprobarSumInstalaciones == total_viviendas_proyectos){

              var arrayFechasInstalaciones= new Array();
              for (s = 1; s <= contadorFechaInstalacion; s++) {
                console.log(s);
                item = {}
                item ["proyecto_id"] = proyecto_id,
                item ["mes_annio_instalacion"] = $.trim($('#fecha_personalizada'+s).val());
                item ["cantidad_instalacion"] = $.trim($('#cant_pesonalizada'+s).val());
                arrayFechasInstalaciones.push(item);

              }

              $.ajaxSetup({
             	    headers: {
             	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             	    }
             	});

             	$.ajax({
             	    url: "contrato/"+id_contrato,
             	    type: "PUT",
             	    dataType: 'json',
             	    data: {
             	        "id_contrato": id_contrato,
             	        "estado_proyecto": estado_proyecto,
             	        "proyecto_id": proyecto_id,
             	        "nombre_proyecto": nombre_proyecto,
             	        "total_viviendas_proyectos": total_viviendas_proyectos,
             	        "direccion_proyecto": direccion_proyecto,
             	        "comuna_proyecto_id":comuna_proyecto_id,
             	        "comuna_proyecto": comuna_proyecto,
             	        "numero_contrato": numero_contrato,
             	        "nombre_inmobiliaria": nombre_inmobiliaria,
             	        "mesAñoConfeccion": mesAñoConfeccion,
             	        "sala_ventas": sala_ventas,
             	        "vivienda_piloto": vivienda_piloto,
             	        "rep_legal_proyecto": rep_legal_proyecto,
             	        "rut_rep_legal": rut_rep_legal,
             	        "rep_legal_proyecto2": rep_legal_proyecto2,
             	        "rut_rep_legal2": rut_rep_legal2,
             	        "razon_social_factura": razon_social_factura,
             	        "giro_factura": giro_factura,
             	        "rut_factura": rut_factura,
             	        "direccion_factura": direccion_factura,
             	        "encargado_finanzas": encargado_finanzas,
             	        "email_encargado_finanzas": email_encargado_finanzas,
             	        "email_dte": email_dte,
             	        "monto_contrato": monto_contrato,
             	        "fecha_pago_1": fecha_pago_1,
             	        "fecha_pago_2": fecha_pago_2,
             	        "fecha_pago_3": fecha_pago_3,
             	        "fecha_pago_4": fecha_pago_4,
             	        "fecha_pago_5": fecha_pago_5,
                      "estado_observacion"  : estado_observacion,
                      "observacion_contrato" : observacion_contrato,
             	        "nombre_responsable": nombre_responsable,
             	        "cargo_rep_legal": cargo_rep_legal,
             	        "email_rep_legal": email_rep_legal,
             	        "telefono_rep_legal": telefono_rep_legal,
             	        "nombre_contacto_mkt": nombre_contacto_mkt,
             	        "cargo_contacto_mkt": cargo_contacto_mkt,
             	        "email_contacto_mkt": email_contacto_mkt,
             	        "agencia_externa": agencia_externa,
             	        "link_proyecto": link_proyecto,
             	        "notario_publico": notario_publico,
             	        "ins_personeria_juridica": ins_personeria_juridica,
                      "fecha_inicio_instalacion": fecha_inicio_instalacion,
                      "verificarPersonalizacion" : verificarPersonalizacion,
                      "verificarRangoPersonalizacion" : verificarRangoPersonalizacion,
                      "arrayFechasInstalaciones" : arrayFechasInstalaciones,
                      "fecha_hasta_personalizado" : fecha_hasta_personalizado,
                      "fecha_desde_personalizado" : fecha_desde_personalizado

             	    },
             	    success: function(data)
             	    {
             	        console.log(data);
             	        if(data.resultado == 0){
             	        	$("#listadoContratos").dataTable().fnDestroy();
             	            $('#tbContrato').empty();
                          $('#modalEditarContrato').modal('hide');
                          cargar_tabla();
             	            toastr.options = {
             	                "debug": false,
             	                "newestOnTop": false,
             	                "positionClass": "toast-top-center",
             	                "closeButton": true,
             	                "toastClass": "animated fadeInDown",
             	            };
             	            toastr.success('Contrato actualizado');
             	        } else {
             	            console.log('Error al actualizar');
             	        }
             	    },
             	    error: function(xhr)
             	    {
             	        console.log(xhr.responseText);
             	    }
             	});//Fin ajax

            }

          }else{

              console.log(verificarPersonalizacion);
              console.log(verificarRangoPersonalizacion);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "contrato/"+id_contrato,
                type: "PUT",
                dataType: 'json',
                data: {
                    "id_contrato": id_contrato,
                    "estado_proyecto": estado_proyecto,
                    "proyecto_id": proyecto_id,
                    "nombre_proyecto": nombre_proyecto,
                    "total_viviendas_proyectos": total_viviendas_proyectos,
                    "direccion_proyecto": direccion_proyecto,
                    "comuna_proyecto_id":comuna_proyecto_id,
                    "comuna_proyecto": comuna_proyecto,
                    "numero_contrato": numero_contrato,
                    "nombre_inmobiliaria": nombre_inmobiliaria,
                    "mesAñoConfeccion": mesAñoConfeccion,
                    "sala_ventas": sala_ventas,
                    "vivienda_piloto": vivienda_piloto,
                    "rep_legal_proyecto": rep_legal_proyecto,
                    "rut_rep_legal": rut_rep_legal,
                    "rep_legal_proyecto2": rep_legal_proyecto2,
                    "rut_rep_legal2": rut_rep_legal2,
                    "razon_social_factura": razon_social_factura,
                    "giro_factura": giro_factura,
                    "rut_factura": rut_factura,
                    "direccion_factura": direccion_factura,
                    "encargado_finanzas": encargado_finanzas,
                    "email_encargado_finanzas": email_encargado_finanzas,
                    "email_dte": email_dte,
                    "monto_contrato": monto_contrato,
                    "fecha_pago_1": fecha_pago_1,
                    "fecha_pago_2": fecha_pago_2,
                    "fecha_pago_3": fecha_pago_3,
                    "fecha_pago_4": fecha_pago_4,
                    "fecha_pago_5": fecha_pago_5,
                    "estado_observacion"  : estado_observacion,
                    "observacion_contrato" : observacion_contrato,
                    "nombre_responsable": nombre_responsable,
                    "cargo_rep_legal": cargo_rep_legal,
                    "email_rep_legal": email_rep_legal,
                    "telefono_rep_legal": telefono_rep_legal,
                    "nombre_contacto_mkt": nombre_contacto_mkt,
                    "cargo_contacto_mkt": cargo_contacto_mkt,
                    "email_contacto_mkt": email_contacto_mkt,
                    "agencia_externa": agencia_externa,
                    "link_proyecto": link_proyecto,
                    "notario_publico": notario_publico,
                    "ins_personeria_juridica": ins_personeria_juridica,
                    "fecha_inicio_instalacion": fecha_inicio_instalacion,
                    "verificarPersonalizacion" : verificarPersonalizacion,
                    "verificarRangoPersonalizacion" : verificarRangoPersonalizacion,
                    "arrayFechasInstalaciones" : arrayFechasInstalaciones,
                    "fecha_hasta_personalizado" : fecha_hasta_personalizado,
                    "fecha_desde_personalizado" : fecha_desde_personalizado

                },
                success: function(data)
                {
                    console.log(data);
                    if(data.resultado == 0){
                      $("#listadoContratos").dataTable().fnDestroy();
                        $('#tbContrato').empty();
                        $('#modalEditarContrato').modal('hide');
                        cargar_tabla();
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Contrato actualizado');
                    } else {
                        console.log('Error al actualizar');
                    }
                },
                error: function(xhr)
                {
                    console.log(xhr.responseText);
                }
            });//Fin ajax

          }





    });



	$('#btnAgregarVisitaSalaVenta').on('click',function(e){
		contadorVisitaSala = contadorVisitaSala+1;
		$('#modalBtnSalaVenta').modal('show');


		$('#visitaSalaVenta').append('<div class="form-group">'+
										'<div class="col-md-6">'+
										'<h4 class="text-info">Visita '+contadorVisitaSala+'</h4>'+
											'<div class="col-md-6">'+
												'<label class="control-label" for="fechaVisitaSala'+contadorVisitaSala+'">Fecha Visita</label>'+
                                				'<div class="input-group date" id="datetimepicker3'+contadorVisitaSala+'">'+
                               					     '<span class="input-group-addon">'+
                               					         '<span class="fa fa-calendar"></span>'+
                               					     '</span>'+
                               					     '<input type="text" class="form-control" id="fechaVisitaSala'+contadorVisitaSala+'" name="fechaVisitaSala'+contadorVisitaSala+'">'+
                               					 '</div>'+
											'</div>'+
											'<div class="col-md-6">'+
												'<label class="control-label" for="responsableVisitaSala'+contadorVisitaSala+'">Responsable Visita</label>'+
                                				'<input type="text" class="form-control" id="responsableVisitaSala'+contadorVisitaSala+'" name="responsableVisitaSala'+contadorVisitaSala+'" value="">'+
											'</div>'+
											'<label class="control-label" for="observacionVisita'+contadorVisitaSala+'">Observación</label>'+
											'<div class="col-md-12">'+
                                				'<textarea rows="8" cols="70" wrap="soft" id="observacionVisita'+contadorVisitaSala+'" name="observacionVisita'+contadorVisitaSala+'" value="" value="" style="resize:none;"></textarea>'+
												'<br>'+
												'<br>'+
											'</div>'+
										'</div>'+
                            		'</div>');

		$('#datetimepicker3'+contadorVisitaSala).datepicker();

	});

	$('#modalEditarSalaVentas').on('hidden.bs.modal', function (e) {

		$('#modalBtnSalaVenta').modal('hide');
		$('#visitaSalaVenta').empty();
        arrayVisitaSalaVenta = [];

		contadorVisitaSala = 0;

	});

    $('#modalEditarPiloto').on('hidden.bs.modal', function (e) {

        $('#inventario_piloto_collapse').modal('hide');
        $('#inventario_piloto_editar').modal('hide');
        contadorVisitaPiloto = 0;

        arrayVisitaPiloto = [];

    });

	$('#btnGuardarVisitaSalaVenta').on('click', function(e){
		arrayVisitaSalaVenta = [];
		var i;


		if(arrayVisitaSalaVenta.length < 1 ){

		for (i = 1; i <= contadorVisitaSala; i++) {

            item = {}
            item ["fecha"] = $.trim($('#fechaVisitaSala'+i).val());
            item ["responsable"] = $.trim($('#responsableVisitaSala'+i).val());
            item ["observacion"] = $.trim($('#observacionVisita'+i).val());
            arrayVisitaSalaVenta.push(item);

		}

			toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Visitas guardadas');

		}else {
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error - No se pudieron guardar las visitas');
        }//Fin else


	});


	$('#btnAgregarVisitaPiloto').on('click',function(e){
		contadorVisitaPiloto = contadorVisitaPiloto+1;
		$('#modalBtnPiloto').modal('show');

            $('#visitaPiloto').append('<div class="form-group">'+
                                            '<div class="col-md-6">'+
                                                '<h4 class="text-info">Visita '+contadorVisitaPiloto+'</h4>'+
                                                '<div class="col-md-6">'+
                                                    '<label class="control-label" for="fechaVisitaSala'+contadorVisitaPiloto+'">Fecha Visita</label>'+
                                                    '<div class="input-group date" id="datetimepicker4'+contadorVisitaPiloto+'">'+
                                                         '<span class="input-group-addon">'+
                                                             '<span class="fa fa-calendar"></span>'+
                                                         '</span>'+
                                                         '<input type="text" class="form-control" id="fechaVisitaPiloto'+contadorVisitaPiloto+'" name="fechaVisitaSala'+contadorVisitaPiloto+'">'+
                                                     '</div>'+
                                                '</div>'+
                                                '<div class="col-md-6">'+
                                                    '<label class="control-label" for="responsableVisitaSala'+contadorVisitaPiloto+'">Responsable Visita</label>'+
                                                    '<input type="text" class="form-control" id="responsableVisitaPiloto'+contadorVisitaPiloto+'" name="responsableVisitaSala'+contadorVisitaPiloto+'" value="">'+
                                                '</div>'+

                                                    '<label class="control-label" for="observacionVisita'+contadorVisitaPiloto+'">Observación</label>'+
                                                '<div class="col-md-12">'+
                                                    	'<textarea rows="8" cols="70" wrap="soft" id="observacionVisitaPiloto'+contadorVisitaPiloto+'" name="observacionVisita'+contadorVisitaPiloto+'" value="" style="resize:none;"></textarea>'+
                                                    '<br>'+
                                                '</div>'+
                                           '</div>'+
                                        '</div>');


		$('#datetimepicker4'+contadorVisitaPiloto).datepicker();

	});


	$('#modalEditarPiloto').on('hidden.bs.modal', function (e) {

		$('#modalBtnPiloto').modal('hide');
		$('#visitaPiloto').empty();

		contadorVisitaPiloto = 0;

	});

	$('#btnGuardarVisitaPiloto').on('click', function(e){
		arrayVisitaPiloto = [];
		var i;


		if(arrayVisitaPiloto.length < 1 ){

		for (i = 1; i <= contadorVisitaPiloto; i++) {

            item = {}
            item ["fecha"] = $.trim($('#fechaVisitaPiloto'+i).val());
            item ["responsable"] = $.trim($('#responsableVisitaPiloto'+i).val());
            item ["observacion"] = $.trim($('#observacionVisitaPiloto'+i).val());
            arrayVisitaPiloto.push(item);

		}

			toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Visitas guardadas');

		}else {
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error - No se pudieron guardar las visitas');
            }//Fin else

	});


    $('#btnAgregarComentarioMkt').on('click',function(e){
        contadorComentarioMkt = contadorComentarioMkt+1;

        $('#nuevoComentarioMkt').append('<div class="form-group">'+
                                            '<div class="col-md-6">'+
                                            '<h4 class="text-info">Comentario '+contadorComentarioMkt+'</h4>'+
                                                '<div class="col-md-6">'+
                                                    '<label class="control-label" for="fechaComentarioMkt'+contadorComentarioMkt+'">Fecha observación</label>'+
                                                    '<div class="input-group date" id="datetimepicker5'+contadorComentarioMkt+'">'+
                                                         '<span class="input-group-addon">'+
                                                             '<span class="fa fa-calendar"></span>'+
                                                         '</span>'+
                                                         '<input type="text" class="form-control" id="fechaComentarioMkt'+contadorComentarioMkt+'" name="fechaComentarioMkt'+contadorComentarioMkt+'">'+
                                                     '</div>'+
                                                '</div>'+
                                                '<div class="col-md-6">'+
                                                    '<label class="control-label" for="responsableComentario'+contadorComentarioMkt+'">Responsable</label>'+
                                                    '<input type="text" class="form-control" id="responsableComentarioMkt'+contadorComentarioMkt+'" name="responsableComentario'+contadorComentarioMkt+'" value="">'+
                                                '</div>'+
                                                '<label class="control-label" for="observacionMkt'+contadorComentarioMkt+'">Observación</label>'+
                                                '<div class="col-md-12">'+
                                                    '<textarea rows="8" cols="70" wrap="soft" id="observacionMkt'+contadorComentarioMkt+'" name="observacionMkt'+contadorComentarioMkt+'" value="" value="" style="resize:none;"></textarea>'+
                                                    '<br>'+
                                                    '<br>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>');

        $('#datetimepicker5'+contadorComentarioMkt).datepicker();

    });

    $('#modalEditarMkt').on('hidden.bs.modal', function (e) {

        $('#nuevoComentarioMkt').empty();

        contadorComentarioMkt = 0;

        arrayComentarioMkt = [];

    });

    $('#btnGuardarComentarioMkt').on('click', function(e){
		arrayComentarioMkt = [];
		var i;


		if(arrayComentarioMkt.length < 1 ){

		for (i = 1; i <= contadorComentarioMkt; i++) {

            item = {}
            item ["fecha"] = $.trim($('#fechaComentarioMkt'+i).val());
            item ["responsable"] = $.trim($('#responsableComentarioMkt'+i).val());
            item ["observacion"] = $.trim($('#observacionMkt'+i).val());
            arrayComentarioMkt.push(item);

		}

			toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Comentario guardado');

            console.log(arrayComentarioMkt);

		}else {
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error - No se pudieron guardar los comentarios');
            }//Fin else

	});


    $('#btnAgregarComentarioAreaTecnica').on('click',function(e){
        contadorComentarioAT = contadorComentarioAT+1;

        $('#nuevoComentarioAreaTecnica').append('<div class="form-group">'+
                                            '<div class="col-md-6">'+
                                            '<h4 class="text-info">Comentario '+contadorComentarioAT+'</h4>'+
                                                '<div class="col-md-6">'+
                                                    '<label class="control-label" for="fechaComentarioAT'+contadorComentarioAT+'">Fecha observación</label>'+
                                                    '<div class="input-group date" id="datetimepicker6'+contadorComentarioAT+'">'+
                                                         '<span class="input-group-addon">'+
                                                             '<span class="fa fa-calendar"></span>'+
                                                         '</span>'+
                                                         '<input type="text" class="form-control" id="fechaComentarioAT'+contadorComentarioAT+'" name="fechaComentarioAT'+contadorComentarioAT+'">'+
                                                     '</div>'+
                                                '</div>'+
                                                '<div class="col-md-6">'+
                                                    '<label class="control-label" for="responsableComentarioAT'+contadorComentarioAT+'">Responsable</label>'+
                                                    '<input type="text" class="form-control" id="responsableComentarioAT'+contadorComentarioAT+'" name="responsableComentarioAT'+contadorComentarioAT+'" value="">'+
                                                '</div>'+
                                                '<label class="control-label" for="observacionAT'+contadorComentarioAT+'">Observación</label>'+
                                                '<div class="col-md-12">'+
                                                    '<textarea rows="8" cols="70" wrap="soft" id="observacionAT'+contadorComentarioAT+'" name="observacionAT'+contadorComentarioAT+'" value="" value="" style="resize:none;"></textarea>'+
                                                    '<br>'+
                                                    '<br>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>');

        $('#datetimepicker6'+contadorComentarioAT).datepicker();

    });

    $('#btnAgregarComentarioComercial').on('click',function(e){
        contadorComentarioComercial = contadorComentarioComercial+1;

        $('#nuevoComentarioComercial').append('<div class="form-group">'+
                                            '<div class="col-md-6">'+
                                            '<h4 class="text-info">Comentario '+contadorComentarioComercial+'</h4>'+
                                                '<div class="col-md-6">'+
                                                    '<label class="control-label" for="fechaComentarioComercial'+contadorComentarioComercial+'">Fecha observación</label>'+
                                                    '<div class="input-group date" id="datetimepicker7'+contadorComentarioComercial+'">'+
                                                         '<span class="input-group-addon">'+
                                                             '<span class="fa fa-calendar"></span>'+
                                                         '</span>'+
                                                         '<input type="text" class="form-control" id="fechaComentarioComercial'+contadorComentarioComercial+'" name="fechaComentarioComercial'+contadorComentarioComercial+'">'+
                                                     '</div>'+
                                                '</div>'+
                                                '<div class="col-md-6">'+
                                                    '<label class="control-label" for="responsableComentarioComercial'+contadorComentarioComercial+'">Responsable</label>'+
                                                    '<input type="text" class="form-control" id="responsableComentarioComercial'+contadorComentarioComercial+'" name="responsableComentarioComercial'+contadorComentarioComercial+'" value="">'+
                                                '</div>'+
                                                '<label class="control-label" for="observacionComercial'+contadorComentarioComercial+'">Observación</label>'+
                                                '<div class="col-md-12">'+
                                                    '<textarea rows="8" cols="70" wrap="soft" id="observacionComercial'+contadorComentarioComercial+'" name="observacionComercial'+contadorComentarioComercial+'" value="" value="" style="resize:none;"></textarea>'+
                                                    '<br>'+
                                                    '<br>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>');

        $('#datetimepicker7'+contadorComentarioComercial).datepicker();

    });

    $('#modalEditarComercial').on('hidden.bs.modal', function (e) {

        $('#nuevoComentarioComercial').empty();

        contadorComentarioComercial = 0;

        arrayComentarioComercial = [];

    });

    $('#modalEditarAreaTecnica').on('hidden.bs.modal', function (e) {

        $('#nuevoComentarioAreaTecnica').empty();

        contadorComentarioAT = 0;

        arrayComentarioAT = [];

    });

    $('#btnGuardarComentarioComercial').on('click', function(e){
		arrayComentarioComercial = [];
		var s;


		if(arrayComentarioComercial.length < 1 ){

		for (s = 1; s <= contadorComentarioComercial; s++) {

            item = {}
            item ["fecha"] = $.trim($('#fechaComentarioComercial'+s).val());
            item ["responsable"] = $.trim($('#responsableComentarioComercial'+s).val());
            item ["observacion"] = $.trim($('#observacionComercial'+s).val());
            arrayComentarioComercial.push(item);

		}

			toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Comentario guardado');

            console.log(arrayComentarioComercial);

		}else {
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error - No se pudieron guardar los comentarios');
            }//Fin else

	});

    $('#btnGuardarComentarioAreaTecnica').on('click', function(e){
		arrayComentarioAT = [];
		var i;


		if(arrayComentarioAT.length < 1 ){

		for (i = 1; i <= contadorComentarioAT; i++) {

            item = {}
            item ["fecha"] = $.trim($('#fechaComentarioAT'+i).val());
            item ["responsable"] = $.trim($('#responsableComentarioAT'+i).val());
            item ["observacion"] = $.trim($('#observacionAT'+i).val());
            arrayComentarioAT.push(item);

		}

			toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Comentario guardado');

            console.log(arrayComentarioAT);

		}else {
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error - No se pudieron guardar los comentarios');
            }//Fin else

	});


    $('#btnAgregarComentarioFinanza').on('click',function(e){
        contadorComentarioFinanza = contadorComentarioFinanza+1;

        $('#nuevoComentarioFinanza').append('<div class="form-group">'+
                                            '<div class="col-md-6">'+
                                            '<h4 class="text-info">Comentario '+contadorComentarioFinanza+'</h4>'+
                                                '<div class="col-md-6">'+
                                                    '<label class="control-label" for="fechaComentarioFinanza'+contadorComentarioFinanza+'">Fecha observación</label>'+
                                                    '<div class="input-group date" id="datetimepicker7'+contadorComentarioFinanza+'">'+
                                                         '<span class="input-group-addon">'+
                                                             '<span class="fa fa-calendar"></span>'+
                                                         '</span>'+
                                                         '<input type="text" class="form-control" id="fechaComentarioFinanza'+contadorComentarioFinanza+'" name="fechaComentarioFinanza'+contadorComentarioFinanza+'">'+
                                                     '</div>'+
                                                '</div>'+
                                                '<div class="col-md-6">'+
                                                    '<label class="control-label" for="responsableComentarioFinanza'+contadorComentarioFinanza+'">Responsable</label>'+
                                                    '<input type="text" class="form-control" id="responsableComentarioFinanza'+contadorComentarioFinanza+'" name="responsableComentarioFinanza'+contadorComentarioFinanza+'" value="">'+
                                                '</div>'+
                                                '<label class="control-label" for="observacionFinanza'+contadorComentarioFinanza+'">Observación</label>'+
                                                '<div class="col-md-12">'+
                                                    '<textarea rows="8" cols="70" wrap="soft" id="observacionFinanza'+contadorComentarioFinanza+'" name="observacionFinanza'+contadorComentarioFinanza+'" value="" value="" style="resize:none;"></textarea>'+
                                                    '<br>'+
                                                    '<br>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>');

        $('#datetimepicker7'+contadorComentarioFinanza).datepicker();

    });

    $('#modalEditarFinanza').on('hidden.bs.modal', function (e) {

        $('#nuevoComentarioFinanza').empty();

        contadorComentarioFinanza = 0;

        arrayComentarioFinanza = [];

    });

    $('#modalEditarContrato').on('hidden.bs.modal', function (e) {

        $('#collapseInstalaciones').collapse('hide');
        $('#collapseInstalacionesPersonalizado').collapse('hide');
        $('#divNuevaFechaInstalacion').empty();
        contadorFechaInstalacion = 1;
        verificarPersonalizacion = "false";
        verificarRangoPersonalizacion = "false";
        $('#fecha_inicio_instalacion_personalizado').val("");
        $('#fecha_fin_instalacion_personalizado').val("");

    });

    $('#btnGuardarComentarioFinanza').on('click', function(e){
		arrayComentarioFinanza = [];
		var i;

		if(arrayComentarioFinanza.length < 1 ){

		for (i = 1; i <= contadorComentarioFinanza; i++) {

            item = {}
            item ["fecha"] = $.trim($('#fechaComentarioFinanza'+i).val());
            item ["responsable"] = $.trim($('#responsableComentarioFinanza'+i).val());
            item ["observacion"] = $.trim($('#observacionFinanza'+i).val());
            arrayComentarioFinanza.push(item);

		}

			toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Comentario guardado');

            console.log(arrayComentarioFinanza);

		}else {
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error - No se pudieron guardar los comentarios');
            }//Fin else

	});

    $('#btnActualizarFinanza').on('click', function(e){

        var contrato_id = $.trim($('#contrato_id_finanza').val());
        var estado_id = $('#estado_observacion_finanza').find(':selected').val();


        $.ajaxSetup({
            headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                url: "agregar_comentario_finanza/"+contrato_id,
                type: "GET",
                dataType: 'json',
                data: {
                    "contrato_id": contrato_id,
                    "estado_id": estado_id,
                    "arrayComentarioFinanza": arrayComentarioFinanza
                },
                success: function(data)
                {
                    if(data == 0){
                        $("#listadoContratos").dataTable().fnDestroy();
                        $('#tbContrato').empty();
                        $('#modalEditarFinanza').modal('hide');
                        cargar_tabla();
                        arrayComentarioMkt = [];
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Estado Finanzas actualizado correctamente');

                    }else if(data == 1){
                        $("#listadoContratos").dataTable().fnDestroy();
                        $('#tbContrato').empty();
                        $('#modalEditarFinanza').modal('hide');
                        cargar_tabla();
                        arrayComentarioMkt = [];
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Finanzas actualizado correctamente');
                    }
            },
            error: function(xhr)
            {
                console.log(xhr.responseText);
            }
        });//Fin ajax

    });

    $('#btnActualizarComercial').on('click', function(e){

        var contrato_id = $.trim($('#contrato_id_comercial').val());
        var estado_id = $('#estado_observacion_comercial').find(':selected').val();


        $.ajaxSetup({
            headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                url: "agregar_comentario_comercial/"+contrato_id,
                type: "GET",
                dataType: 'json',
                data: {
                    "contrato_id": contrato_id,
                    "estado_id": estado_id,
                    "arrayComentarioComercial": arrayComentarioComercial
                },
                success: function(data)
                {
                    if(data == 0){
                        $("#listadoContratos").dataTable().fnDestroy();
                        $('#tbContrato').empty();
                        $('#modalEditarComercial').modal('hide');
                        cargar_tabla();
                        arrayComentarioComercial = [];
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Estado Área Comercial actualizada correctamente');

                    }else if(data == 1){
                        $("#listadoContratos").dataTable().fnDestroy();
                        $('#tbContrato').empty();
                        $('#modalEditarComercial').modal('hide');
                        cargar_tabla();
                        arrayComentarioMkt = [];
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Área comercial actualizado correctamente');
                    }
            },
            error: function(xhr)
            {
                console.log(xhr.responseText);
            }
        });//Fin ajax

    });


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

    cargar_tabla();


    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    //En el modal editar contrato si cambia el pais se reinician todos los select
    $('#pais_proyecto').on('change',function(e){
        var paisID = $(this).val();

        $('#ciudad_proyecto2').val("");

        $('#ciudad_proyecto2').text('--Seleccione ciudad--');

        $('#comuna_proyecto2').val("");

        $('#comuna_proyecto2').text('--Seleccione comuna--');

        $.ajax({
            url: '/listar_regiones/'+paisID,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('#region_proyecto').empty();

                $.each(data, function(index, region) {
                    $('#region_proyecto').append('<option value="'+ region.id +'">'+ region.nombre +'</option>');
                });

            }
        });
    });

    $('#region_proyecto').on('change',function(e){
        var regionID = $(this).val();

        $.ajax({
            url: '/listar_ciudades/'+regionID,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('#ciudad_proyecto').empty();

                $.each(data, function(index, ciudad) {
                    $('#ciudad_proyecto').append('<option value="'+ ciudad.id +'">'+ ciudad.nombre +'</option>');
                });

            }
        });
    });

    $('#ciudad_proyecto').on('change', function(e){
        var ciudadID = $(this).val();
        $.ajax({
            url: '/listar_comunas/'+ciudadID,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('#comuna_proyecto').empty();

                $.each(data, function(index, comuna) {
                    $('#comuna_proyecto').append('<option value="'+ comuna.id +'">'+ comuna.nombre +'</option>');
                });

            }
        });
    });

    // Crear inventario piloto
    $('#btnAgregarProductoInventarioPiloto').on('click', function(e){
        arrayInventarioPiloto = [];
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
            if(arrayInventarioPiloto.length < 1){
                table_piloto.$('input[type="checkbox"]:checked').each(function(){
                    if($(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val() <= 0){
                        console.log('La cantidad no puede ser 0');

                    } else {
                        item = {}
                        item ["id"] = $(this).val();
                        item ["cantidad"] = $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val();
                        arrayInventarioPiloto.push(item);

                    }

            });
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.success('Inventario de productos agregado a Piloto');
            } else {
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error - Solo se puede agregar un inventario a Piloto');
            }//Fin else
        }//Fin else
    });

    $('#btnActualizarMkt').on('click', function(e){

        var contrato_id = $.trim($('#contrato_id_mkt').val());
        var estado_id = $('#estado_observacion_mkt').find(':selected').val();


        $.ajaxSetup({
            headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                url: "agregar_comentario_mkt/"+contrato_id,
                type: "GET",
                dataType: 'json',
                data: {
                    "contrato_id": contrato_id,
                    "estado_id": estado_id,
                    "arrayComentarioMkt": arrayComentarioMkt
                },
                success: function(data)
                {
                    if(data == 0){
                    	$("#listadoContratos").dataTable().fnDestroy();
                        $('#tbContrato').empty();
                        $('#modalEditarMkt').modal('hide');
                        cargar_tabla();
                        arrayComentarioMkt = [];
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Estado Marketing actualizado correctamente');

                    }else if(data == 1){
                    	$("#listadoContratos").dataTable().fnDestroy();
                        $('#tbContrato').empty();
                        $('#modalEditarMkt').modal('hide');
                        cargar_tabla();
                        arrayComentarioMkt = [];
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Marketing actualizado correctamente');
                    }
            },
            error: function(xhr)
            {
                console.log(xhr.responseText);
            }
        });//Fin ajax

    });

    $('#btnActualizarAreaTecnica').on('click', function(e){

        var contrato_id = $.trim($('#contrato_id_at').val());
        var estado_id = $('#estado_observacion_area_tecnica').find(':selected').val();


        $.ajaxSetup({
            headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                url: "agregar_comentario_at/"+contrato_id,
                type: "GET",
                dataType: 'json',
                data: {
                    "contrato_id": contrato_id,
                    "estado_id": estado_id,
                    "arrayComentarioAT": arrayComentarioAT
                },
                success: function(data)
                {
                    if(data == 0){
                    	$("#listadoContratos").dataTable().fnDestroy();
                        $('#tbContrato').empty();
                        $('#modalEditarAreaTecnica').modal('hide');
                        cargar_tabla();
                        arrayComentarioMkt = [];
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Estado área tecnica actualizado correctamente');

                    }else if(data == 1){
                    	$("#listadoContratos").dataTable().fnDestroy();
                        $('#tbContrato').empty();
                        $('#modalEditarAreaTecnica').modal('hide');
                        cargar_tabla();
                        arrayComentarioMkt = [];
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('área tecnica actualizada correctamente');
                    }
            },
            error: function(xhr)
            {
                console.log(xhr.responseText);
            }
        });//Fin ajax

    });

    $('#filtrarContratos').on('click', function(e){

        $("#listadoContratos").dataTable().fnDestroy();
        $('#tbContrato').empty();
        cargar_tabla();

    });

    $('#btnActualizarPiloto').on('click', function(e){

        var fecha_implementacion_piloto     = $.trim($('#fecha_implementacion_piloto').val());
        var fecha_capacitacion_piloto       = $.trim($('#fecha_capacitacion_piloto').val());
        var fecha_retiro_piloto             = $.trim($('#fecha_retiro_piloto').val());
        var direccion_piloto                = $.trim($('#direccion_piloto').val());
        var descripcion_piloto              = $.trim($('#descripcion_piloto').val());
        var contrato_id                     = $.trim($('#contrato_id').val());
        var piloto_id                       = $.trim($('#piloto_id').val());
        var estado_piloto 					= $('#estado_piloto').find(':selected').val();
        var observacion_piloto 				= $.trim($('#observacion_piloto').val());

      		$.ajaxSetup({
      		    headers: {
      		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      		    }
      		});
      		$.ajax({
      		    url: "editar_piloto/"+contrato_id,
      		    type: "PUT",
      		    dataType: 'json',
      		    data: {
      		        "fecha_implementacion_piloto": fecha_implementacion_piloto,
      		        "fecha_capacitacion_piloto": fecha_capacitacion_piloto,
      		        "fecha_retiro_piloto": fecha_retiro_piloto,
      		        "direccion_piloto": direccion_piloto,
      		        "descripcion_piloto": descripcion_piloto,
      		        "contrato_id" : contrato_id,
      		        "piloto_id": piloto_id,
      		        "arrayInventarioPiloto" : arrayInventarioPiloto,
      		        "arrayVisitaPiloto" : arrayVisitaPiloto,
      		        "estado_piloto" : estado_piloto,
      		        "observacion_piloto" : observacion_piloto
      		    },
      		    success: function(data)
      		    {
      	      	if(data == 0){
                    table_piloto.$('input[type="checkbox"]:checked').each(function(){
                            $(this).prop('checked', false);
                            $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val('');
                        });
                    $("#listadoContratos").dataTable().fnDestroy();
      	      	    $('#tbContrato').empty();
      	      	    $('#modalEditarPiloto').modal('hide');
                    cargar_tabla();
      	      	    arrayInventarioPiloto = [];
      	      	    toastr.options = {
      	      	        "debug": false,
      	      	        "newestOnTop": false,
      	      	        "positionClass": "toast-top-center",
      	      	        "closeButton": true,
      	      	        "toastClass": "animated fadeInDown",
      	      	    };
      	      	    toastr.success('Piloto actualizado correctamente');

      	     	}
      	     	if(data == 2){

      	     	     table_piloto.$('input[type="checkbox"]:checked').each(function(){
      	     	            $(this).prop('checked', false);
      	     	            $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val('');
      	     	        });
      	     	    $("#listadoContratos").dataTable().fnDestroy();
                    $('#tbContrato').empty();
                    $('#modalEditarPiloto').modal('hide');
                    cargar_tabla();
      	     	    arrayInventarioPiloto = [];
      	     	    toastr.options = {
      	     	        "debug": false,
      	     	        "newestOnTop": false,
      	     	        "positionClass": "toast-top-center",
      	     	        "closeButton": true,
      	     	        "toastClass": "animated fadeInDown",
      	     	    };
      	     	    toastr.success('Piloto actualizado e inventario agregado');

      	     	}
      	     	if(data == 1){

      	      	    console.log('Error al actualizar');
      	      	    toastr.options = {
      	      	        "debug": false,
      	      	        "newestOnTop": false,
      	      	        "positionClass": "toast-top-center",
      	      	        "closeButton": true,
      	      	        "toastClass": "animated fadeInDown",
      	      	    };
      	      	    toastr.success('Error al actualizar');

      	      	}
      	   	},
      	   	error: function(xhr)
      	   	{
      	   	    console.log(xhr.responseText);
      	   	}
      	});//Fin ajax

    });

    $('#btnPersonalizar').on('click', function(e){

        $('#collapseInstalaciones').collapse('show');
        $('#collapseInstalacionesPrsonalizadas').collapse('hide');
        verificarRangoPersonalizacion = "true";
        $('#collapseInstalacionesPersonalizado').collapse('hide');
        $('#divNuevaFechaInstalacion').empty();
        contadorFechaInstalacion = 1;
        verificarPersonalizacion = "false";
        $('#fecha_inicio_instalacion_personalizado').val("");
        $('#fecha_fin_instalacion_personalizado').val("");
        console.log(verificarPersonalizacion);
        console.log(verificarRangoPersonalizacion);

    });

    $('#agregarFechaInstalacion').on('click',function(e){
        var cantViviendas = $.trim($('#total_viviendas_proyectos').val());

        var comprobarSumInstalaciones = 0;

        var sumInstalaciones = 0;

        for (s = 1; s <= contadorFechaInstalacion; s++) {

            sumInstalaciones = $.trim($('#cant_pesonalizada'+s).val());

            comprobarSumInstalaciones = parseInt(sumInstalaciones)+ parseInt(comprobarSumInstalaciones);

        }

        if(comprobarSumInstalaciones < cantViviendas){

            contadorFechaInstalacion = contadorFechaInstalacion + 1;

            $('#divNuevaFechaInstalacion').append('<div class="col-md-5" style="padding-left: 0">'+
                                                      '<div class="form-group">'+
                                                          '<div class="input-group date" id="datetimepicker8'+contadorFechaInstalacion+'">'+
                                                              '<span class="input-group-addon">'+
                                                                  '<span class="fa fa-calendar"></span>'+
                                                              '</span>'+
                                                              '<input type="text" class="form-control" id="fecha_personalizada'+contadorFechaInstalacion+'" name="fecha_personalizada'+contadorFechaInstalacion+'">'+
                                                          '</div>'+
                                                      '</div>'+
                                                  '</div>'+
                                                  '<div class="col-md-5">'+
                                                      '<div class="form-group">'+
                                                          '<input type="number" class="form-control" min="0" id="cant_pesonalizada'+contadorFechaInstalacion+'" name="">'+
                                                      '</div>'+
                                                  '</div>');

           var fecha_desde = $.trim($('#fecha_inicio_instalacion').val());
           fecha_desde = moment(fecha_desde).format('MM-YYYY');

            $('#datetimepicker8'+contadorFechaInstalacion).datepicker({
                format: "mm-yyyy",
                startView: "months",
                minViewMode: "months"
            });


        }else if(comprobarSumInstalaciones == cantViviendas){

            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Ya completó la cantidad total de viviendas.');

        }else if(comprobarSumInstalaciones > cantViviendas){

            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Exedió la cantidad total de viviendas, verifique los datos ingresados.');

        }

    });

    $('#personalizarFechaInstalacion').on('click', function(e){

        $('#collapseInstalaciones').collapse('hide');
        $('#collapseInstalacionesPersonalizado').collapse('show');
        verificarRangoPersonalizacion = "false";
        verificarPersonalizacion = "true";

        console.log(verificarPersonalizacion);
        console.log(verificarRangoPersonalizacion);

        var fecha_desde = $.trim($('#fecha_inicio_instalacion').val());
        fecha_desde = moment(fecha_desde).format('MM-YYYY');


        $('#datetimepicker25').datepicker("remove");

        $('#datetimepicker25').datepicker({
            format: "mm-yyyy",
            startView: "months",
            minViewMode: "months"
        });

        //$('#datetimepicker25').datepicker("refresh");

    });

    $('#btnEliminarInventarioStand').on('click',function(e){

        var id_sala   = $.trim($('#id_salaVenta').val());


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "eliminar_inventario_sala/"+id_sala,
            type: "GET",
            dataType: 'json',
            success: function(data)
            {
                if(data == 1){

                    $('#inventario_stand_collapse').collapse('show');
                    $('#inventario_stand_editar').collapse('hide');
                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Inventario eliminado');

                }
                if(data == 0){

                    console.log('Error al actualizar');
                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Error al actualizar');

                }

            },
            error: function(xhr)
            {
                console.log(xhr.responseText);
            }
        });//Fin ajax

    });

    $('#btnEliminarInventarioPiloto').on('click',function(e){

        var piloto_id       = $.trim($('#piloto_id').val());


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "eliminar_inventario_piloto/"+piloto_id,
            type: "GET",
            dataType: 'json',
            success: function(data)
            {
                console.log(data);
                if(data == 1){

                    $('#inventario_piloto_collapse').collapse('show');
                    $('#inventario_piloto_editar').collapse('hide');
                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Inventario eliminado');

                }
                if(data == 0){

                    console.log('Error al actualizar');
                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Error al actualizar');

                }

            },
            error: function(xhr)
            {
                console.log(xhr.responseText);
            }
        });//Fin ajax

    });

    // Crear inventario de sala de venta
    $('#btnAgregarProductoInventarioSalaVenta').on('click', function(e){
        arrayInventarioSalaVenta = [];
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

    $('#btnActualizarSalaVenta').on('click', function(e){

        var fecha_implementacion_sala_ventas      = $.trim($('#fecha_implementacion_sala_ventas').val());
        var fecha_capacitacion_sala_ventas        = $.trim($('#fecha_capacitacion_sala_ventas').val());
        var fecha_retiro_sala_ventas              = $.trim($('#fecha_retiro_sala_ventas').val());
        var stand_sala_ventas                     = $.trim($('#stand_sala_ventas').val());
        var descripcion                           = $.trim($('#descripcion').val());
        var id_sala                               = $.trim($('#id_salaVenta').val());
        var id_contrato 						  = $.trim($('#id_contrato').val());
        var estado_sala 						  = $('#estado_sala_ventas').find(':selected').val();
        var observacion_sala 					  = $.trim($('#observacion_sala').val());


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "sala_venta/"+id_sala,
            type: "PUT",
            dataType: 'json',
            data: {
                "fecha_implementacion_sala_ventas": fecha_implementacion_sala_ventas,
                "fecha_capacitacion_sala_ventas": fecha_capacitacion_sala_ventas,
                "fecha_retiro_sala_ventas": fecha_retiro_sala_ventas,
                "stand_sala_ventas": stand_sala_ventas,
                "descripcion": descripcion,
                "id_sala" : id_sala,
                "id_contrato" : id_contrato,
                "estado_sala" : estado_sala,
                "observacion_sala" : observacion_sala,
                "arrayInventarioSalaVenta" : arrayInventarioSalaVenta,
                "arrayVisitaSalaVenta" : arrayVisitaSalaVenta
            },
            success: function(data)
            {
                console.log(data);
                if(data == 0){
                	$("#listadoContratos").dataTable().fnDestroy();
                    $('#tbContrato').empty();
                    $('#modalEditarSalaVentas').modal('hide');
                    cargar_tabla();
                    arrayInventarioSalaVenta = [];
                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Sala de ventas actualizada');

                }
                if(data == 3){
                	$("#listadoContratos").dataTable().fnDestroy();
                    $('#tbContrato').empty();
                    $('#modalEditarSalaVentas').modal('hide');
                    cargar_tabla();fndes
                    arrayInventarioSalaVenta = [];
                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Sala de ventas agregada');

                }
                if(data == 2){

                     table_sala_ventas.$('input[type="checkbox"]:checked').each(function(){
                            $(this).prop('checked', false);
                            $(this).parent().parent().parent().next('td').next('td').next('td').children().eq(0).val('');
                        });
                    $("#listadoContratos").dataTable().fnDestroy();
                    $('#tbContrato').empty();
                    $('#modalEditarSalaVentas').modal('hide');
                    cargar_tabla();
                    arrayInventarioSalaVenta = [];
                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Sala de ventas actualizada e inventario agregado');

                }
                if(data == 1){

                    console.log('Error al actualizar');
                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Error al actualizar');

                }
            },
            error: function(xhr)
            {
                console.log(xhr.responseText);
            }
        });//Fin ajax

    });

	//Quitar puntos al digitar RUT
    $('#rut_rep_legal2').keyup(function(){
        var quitarPunto = $(this).val();
        var rutSinPuntos = quitarPunto.replace(".", "");
        $('#rut_rep_legal2').val(rutSinPuntos);
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

    //Quitar espacios al digitar RUT
    $('#rut_rep_legal2').keyup(function(){
        var quitarEspacio = $(this).val();
        var rutSinEspacios = quitarEspacio.replace(" ", "");
        $('#rut_rep_legal2').val(rutSinEspacios);
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

});
</script>

<script>
function ver_contrato(id){
    $.get('contrato/'+id, function(data){
        $.each(data, function(index, obj){

            if(obj.nombre_proyecto === null){
                obj.nombre_proyecto = '';
            }
            if(obj.total_viviendas_proyecto === null){
                obj.total_viviendas_proyecto = '';
            }
            if(obj.direccion_proyecto === null){
                obj.direccion_proyecto = '';
            }
            if(obj.comuna_proyecto === null){
                obj.comuna_proyecto = '';
            }
            if(obj.fecha_probable_entrega === null){
                obj.fecha_probable_entrega = '';
            }
            if(obj.sala_ventas === null){
                obj.sala_ventas = '';
            }
            if(obj.vivienda_piloto === null){
                obj.vivienda_piloto = '';
            }
            if(obj.comuna_piloto === null){
                obj.comuna_piloto = '';
            }
            if(obj.mandante_proyecto === null){
                obj.mandante_proyecto = '';
            }
            if(obj.mandante_proyecto === null){
                obj.mandante_proyecto = '';
            }
            if(obj.rut_mandante_proyecto === null){
                obj.rut_mandante_proyecto = '';
            }
            if(obj.representante_legal_proyecto === null){
                obj.representante_legal_proyecto = '';
            }
            if(obj.rut_rep_legal === null){
                obj.rut_rep_legal = '';
            }
            if(obj.ins_personeria_juridica === null){
                obj.ins_personeria_juridica = '';
            }
            if(obj.notario_ins_proyecto === null){
                obj.notario_ins_proyecto = '';
            }
            if(obj.razon_social === null){
                obj.razon_social = '';
            }
            if(obj.giro_factura === null){
                obj.giro_factura = '';
            }
            if(obj.rut_factura === null){
                obj.rut_factura = '';
            }
            if(obj.direccion_factura === null){
                obj.direccion_factura = '';
            }
            if(obj.encargado_finanzas === null){
                obj.encargado_finanzas = '';
            }
            if(obj.email_encargado_finanzas === null){
                obj.email_encargado_finanzas = '';
            }
            if(obj.email_dte === null){
                obj.email_dte = '';
            }
            if(obj.email_pdf === null){
                obj.email_pdf = '';
            }
            if(obj.nombre_responsable === null){
                obj.nombre_responsable = '';
            }
            if(obj.cargo_responsable === null){
                obj.cargo_responsable = '';
            }
            if(obj.email_responsable === null){
                obj.email_responsable = '';
            }
            if(obj.telefono_responsable === null){
                obj.telefono_responsable = '';
            }
            if(obj.nombre_contacto_mkt === null){
                obj.nombre_contacto_mkt = '';
            }
            if(obj.cargo_contacto_mkt === null){
                obj.cargo_contacto_mkt = '';
            }
            if(obj.email_contacto_mkt === null){
                obj.email_contacto_mkt = '';
            }
            if(obj.nombre_agencia_externa === null){
                obj.nombre_agencia_externa = '';
            }
            if(obj.url_oficial_proyecto === null){
                obj.url_oficial_proyecto = '';
            }
            if(obj.direccion_representante_legal === null){
                obj.direccion_representante_legal = '';
            }
            if(obj.oficina_representante_legal === null){
                obj.oficina_representante_legal = '';
            }
            if(obj.comuna_representante_legal === null){
                obj.comuna_representante_legal = '';
            }
            if(obj.region_representante_legal === null){
                obj.region_representante_legal = '';
            }
            if(obj.nombre_inmobiliaria === null){
                obj.nombre_inmobiliaria = '';
            }
            if(obj.fecha_escritura_personeria === null){
                obj.fecha_escritura_personeria = '';
            }
            if(obj.notaria_escritura_personeria === null){
                obj.notaria_escritura_personeria = '';
            }
            if(obj.nombre_notario_publico === null){
                obj.nombre_notario_publico = '';
            }
            if(obj.numero_contrato === null){
                obj.numero_contrato = '';
            }
            if(obj.mes_confeccion_contrato === null){
                obj.mes_confeccion_contrato = '';
            }
            if(obj.pago1_fecha === null){
                obj.pago1_fecha = '';
            }
            if(obj.pago2_fecha === null){
                obj.pago2_fecha = '';
            }
            if(obj.pago3_fecha === null){
                obj.pago3_fecha = '';
            }
            if(obj.instalacion_piloto === null){
                obj.instalacion_piloto = '';
            }
            if(obj.capacitacion_personal_ventas === null){
                obj.capacitacion_personal_ventas = '';
            }
            if(obj.monto_contrato === null){
                obj.monto_contrato = '';
            }
            if(obj.fecha_convenida === null){
                obj.fecha_convenida = '';
            }
            if(obj.fecha_real === null){
                obj.fecha_real = '';
            }
            if(obj.estado_id == 6){
                var estado = "Activo";
            }else if(obj.estado_id == 7){
                var estado = "Inactivo";
            }
            if(obj.pago4_fecha === null){
                obj.pago4_fecha = '';
            }
            if(obj.pago5_fecha === null){
                obj.pago5_fecha = '';
            }
            if(obj.nombre_agencia_externa===null){
                obj.nombre_agencia_externa = '';
            }
            if(obj.fecha_probable_entrega===null){
                obj.fecha_probable_entrega = '';
            }
            if(obj.observacion==null){
                obj.observacion='';
            }
            if(obj.estado_observacion == null){
                obj.estado_observacion='';
            }
            if(obj.url_drive == null){
                obj.url_drive='';
            }

            $('#modalContrato').modal('show');
            $('#listado_contrato').empty().append(
            '<h3 class="text-center text-info">DATOS DEL PROYECTO</h3>'+
                //'<hr style="border-color: #FFF;">'+
                '<div class="row">'+
                    '<div class="col-md-4">'+
                    '<h4 class="text-center text-info"></h4>'+
                       '<table cellpadding="1" cellspacing="1" class="table">'+
                           '<tbody>'+
                               '<tr>'+
                                   '<td><strong>Numero de contrato:</strong></td>'+
                                   '<td>'+obj.numero_contrato+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Nombre de la inmobiliaria:</strong></td>'+
                                   '<td>'+obj.nombre_inmobiliaria+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Nombre del proyecto:</strong></td>'+
                                   '<td>'+obj.nombre_proyecto+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Cantidad total de viviendas del proyecto:</strong></td>'+
                                   '<td>'+obj.total_viviendas_proyecto+'</td>'+
                               '</tr>'+
                                '<tr>'+
                                   '<td><strong>Estado Contrato:</strong></td>'+
                                   '<td>'+estado+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                    '<td><td>'+
                               '</tr>'+
                           '</tbody>'+
                        '</table>'+
                    '</div>'+
                    '<div class="col-md-4">'+
                       '<h4 class="text-center text-info"></h4>'+
                       //'<hr style="border-color: #FFF;">'+
                       '<table cellpadding="1" cellspacing="1" class="table">'+
                           '<tbody>'+
                                '<tr>'+
                                   '<td><strong>Mes / Año confección contrato:</strong></td>'+
                                   '<td>'+obj.mes_confeccion_contrato+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Comuna del proyecto:</strong></td>'+
                                   '<td>'+obj.comuna_proyecto+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Dirección del proyecto:</strong></td>'+
                                   '<td>'+obj.direccion_proyecto+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Sala de ventas:</strong></td>'+
                                   '<td>'+obj.sala_ventas+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Vivienda piloto:</strong></td>'+
                                   '<td>'+obj.piloto+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Fecha inicio instalación:</strong></td>'+
                                   '<td>'+obj.fecha_probable_entrega+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                    '<td><td>'+
                               '</tr>'+
                           '</tbody>'+
                        '</table>'+
                    '</div>'+
                    '<div class="col-md-4">'+
                       '<h4 class="text-center text-info"></h4>'+
                       //'<hr style="border-color: #FFF;">'+
                       '<table cellpadding="1" cellspacing="1" class="table">'+
                           '<tbody>'+
                               '<tr>'+
                                   '<td><strong>Nombre representante legal 1:</strong></td>'+
                                   '<td>'+obj.representante_legal_proyecto+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Rut representante legal 1:</strong></td>'+
                                   '<td>'+obj.rut_rep_legal+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Nombre representante legal 2:</strong></td>'+
                                   '<td>'+obj.mandante_proyecto+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Rut representante legal 2:</strong></td>'+
                                   '<td>'+obj.rut_mandante_proyecto+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Fecha inscripción de personería jurídica:</strong></td>'+
                                   '<td>'+obj.ins_personeria_juridica+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Nombre notario publico:</strong></td>'+
                                   '<td>'+obj.nombre_notario_publico+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                    '<td><td>'+
                               '</tr>'+
                           '</tbody>'+
                        '</table>'+
                    '</div>'+
                '</div>'+
                '<hr style="border-color: #FFF;">'+
                '<h3 class="text-center text-info">OBSERVACIONES</h3>'+

                '<div class="row">'+
                '<div class="col-md-2"></div>'+
                    '<div class="col-md-8">'+
                    '<h4 class="text-center text-info"></h4>'+
                       '<table cellpadding="1" cellspacing="1" class="table">'+
                           '<tbody>'+
                               '<tr>'+
                                   '<td><strong>Observaciones:</strong></td>'+
                                   '<td>'+obj.observacion+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                    '<td><td>'+
                               '</tr>'+
                           '</tbody>'+
                        '</table>'+
                    '</div>'+
                    '<div class="col-md-2"></div>'+
                '</div>'+

                '<hr style="border-color: #FFF;">'+
                '<h3 class="text-center text-info">DATOS DE FACTURA</h3>'+
                //'<hr style="border-color: #FFF;">'+
                '<div class="row">'+
                    '<div class="col-md-4">'+
                    '<h4 class="text-center text-info"></h4>'+
                       '<table cellpadding="1" cellspacing="1" class="table">'+
                           '<tbody>'+
                               '<tr>'+
                                   '<td><strong>Razón social:</strong></td>'+
                                   '<td>'+obj.razon_social+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Giro:</strong></td>'+
                                   '<td>'+obj.giro_factura+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Rut:</strong></td>'+
                                   '<td>'+obj.rut_factura+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Dirección:</strong></td>'+
                                   '<td>'+obj.direccion_factura+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                    '<td><td>'+
                               '</tr>'+
                           '</tbody>'+
                        '</table>'+
                    '</div>'+
                    '<div class="col-md-4">'+
                       '<h4 class="text-center text-info"></h4>'+
                       //'<hr style="border-color: #FFF;">'+
                       '<table cellpadding="1" cellspacing="1" class="table">'+
                           '<tbody>'+
                               '<tr>'+
                                   '<td><strong>Encargado de finanzas:</strong></td>'+
                                   '<td>'+obj.encargado_finanzas+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Email encargado de finanzas:</strong></td>'+
                                   '<td>'+obj.email_encargado_finanzas+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Email DTE:</strong></td>'+
                                   '<td>'+obj.email_dte+'</td>'+
                               '</tr>'+
                               '<tr>'+
                                   '<td><strong>Monto contrato:</strong></td>'+
                                   '<td>'+obj.monto_contrato+' UF</td>'+
                               '</tr>'+
                               '<tr>'+
                                    '<td><td>'+
                               '</tr>'+
                           '</tbody>'+
                        '</table>'+
                    '</div>'+
                '<div class="col-md-4">'+
                    '<h4 class="text-center text-info"></h4>'+
                       //'<hr style="border-color: #FFF;">'+
                       '<table cellpadding="1" cellspacing="1" class="table">'+
                           '<tbody>'+
                                '<tr>'+
                                    '<td><strong>Pago 1 fecha:</strong></td>'+
                                    '<td>'+obj.pago1_fecha+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Pago 2 fecha:</strong></td>'+
                                    '<td>'+obj.pago2_fecha+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Pago 3 fecha:</strong></td>'+
                                    '<td>'+obj.pago3_fecha+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Pago 4 fecha:</strong></td>'+
                                    '<td>'+obj.pago4_fecha+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Pago 5 fecha:</strong></td>'+
                                    '<td>'+obj.pago5_fecha+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><td>'+
                               '</tr>'+
                           '</tbody>'+
                        '</table>'+
                    '</div>'+
                '</div>'+
                //'<hr style="border-color: #FFF;">'+
                '<div class="row">'+
                    '<div class="col-md-6">'+
                    '<h3 class="text-center text-info">DATOS RESPONSABLE CONTRATO</h3>'+
                    '<h4 class="text-center text-info"></h4>'+
                       '<table cellpadding="1" cellspacing="1" class="table">'+
                           '<tbody>'+
                               '<tr>'+
                                    '<td><strong>Nombre de contacto:</strong></td>'+
                                    '<td>'+obj.nombre_responsable+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Cargo:</strong></td>'+
                                    '<td>'+obj.cargo_responsable+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Email:</strong></td>'+
                                    '<td>'+obj.email_responsable+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Teléfono:</strong></td>'+
                                    '<td>'+obj.telefono_responsable+'</td>'+
                                '</tr>'+
                               '<tr>'+
                                    '<td><td>'+
                               '</tr>'+
                           '</tbody>'+
                        '</table>'+
                '</div>'+
                '<div class="col-md-6">'+
                    '<h3 class="text-center text-info">DATOS RESPONSABLE MKT</h3>'+
                    '<h4 class="text-center text-info"></h4>'+
                       '<table cellpadding="1" cellspacing="1" class="table">'+
                           '<tbody>'+
                               '<tr>'+
                                    '<td><strong>Nombre de contacto:</strong></td>'+
                                    '<td>'+obj.nombre_contacto_mkt+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Cargo:</strong></td>'+
                                    '<td>'+obj.cargo_contacto_mkt+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Email:</strong></td>'+
                                    '<td>'+obj.email_contacto_mkt+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Agencia externa:</strong></td>'+
                                    '<td>'+obj.nombre_agencia_externa+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Link proyecto:</strong></td>'+
                                    '<td>'+obj.url_oficial_proyecto+'</td>'+
                                '</tr>'+
                               '<tr>'+
                                    '<td><input name="url_drive" value="'+ obj.url_drive +'" id="url_drive" placeholder="" type="hidden" readonly="true"><td>'+
                               '</tr>'+
                           '</tbody>'+
                        '</table>'+
                    '</div>'+
                '</div>'
            );
        });
    });
}
</script>

<script>

	function ver_sala_ventas($id){

		$('#salaVentasDetalle').empty();

		$.get('ver_sala_ventas/'+$id, function(data){

            if(data == 0 ){

                $('#salaVentasDetalle').append('<h4>Este proyecto no posee sala de ventas</h4>');

            }else{
                var contador = 0;


                $.each(data, function(index, obj){

                	var visitas = obj.visitas;
                	var inventario = obj.inventario_sala;
                	if (obj.fecha_implementacion == null){
                		var fecha_implementacion = "";
                	}else{
                		var fecha_implementacion = obj.fecha_implementacion;
                	}
                	if (obj.fecha_capacitacion == null){
                		var fecha_capacitacion = "";
                	}else{
                		var fecha_capacitacion = obj.fecha_capacitacion;
                	}
                	if (obj.fecha_retiro == null){
                		var fecha_retiro = "";
                	}else{
                		var fecha_retiro = obj.fecha_retiro;
                	}
                	if (obj.descripcion == null){
                		var descripcion = "";
                	}else{
                		var descripcion = obj.descripcion;
                	}
                	if (obj.observacion == null){
                		var observacion = "";
                	}else{
                		var observacion = obj.observacion;
                	}
                	var stand_sala = obj.stand_sala;
                	var id_sala = obj.id_sala

                	if(visitas[0].fecha_visita == 0){

                		if(inventario[0].producto_id == 0){

                 			$('#salaVentasDetalle').append('<div class="row">'+
                			                                      //'<div class="col-md-8">'+
                			                                      '<h3 class="text-center text-info">DETALLES SALA DE VENTAS</h3>'+
                			                                      '<h4 class="text-center text-info"></h4>'+
                			                                         '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;">'+
                			                                             '<tbody>'+
                			                                                 '<tr>'+
                			                                                      '<td><strong>Fecha Implementacion:</strong></td>'+
                			                                                      '<td>'+fecha_implementacion+'</td>'+
                			                                                  '</tr>'+
                			                                                  '<tr>'+
                			                                                      '<td><strong>Fecha Capacitación:</strong></td>'+
                			                                                      '<td>'+fecha_capacitacion+'</td>'+
                			                                                  '</tr>'+
                			                                                  '<tr>'+
                			                                                      '<td><strong>Fecha Retiro:</strong></td>'+
                			                                                      '<td>'+fecha_retiro+'</td>'+
                			                                                  '</tr>'+
                			                                                  '<tr>'+
                			                                                      '<td><strong>Stand:</strong></td>'+
                			                                                      '<td>'+stand_sala+'</td>'+
                			                                                  '</tr>'+
                			                                                  '<tr>'+
                			                                                      '<td><strong>Descripcion:</strong></td>'+
                			                                                      '<td>'+descripcion+'</td>'+
                			                                                  '</tr>'+
                			                                                  '<tr>'+
                			                                                      '<td><strong>Observación:</strong></td>'+
                			                                                      '<td>'+observacion+'</td>'+
                			                                                  '</tr>'+
                			                                                  '<tr>'+
                			                                                      '<td><strong>Contacto:</strong></td>'+
                			                                                      '<td>'+'</td>'+
                			                                                  '</tr>'+
                			                                                 '<tr>'+
                			                                                      '<td><td>'+
                			                                                 '</tr>'+
                			                                             '</tbody>'+
                			                                          '</table>'+
                			                                      //'</div>'+
                			                                  '</div>'+
                			                                  '<br>'+
                			                                  '<div id="noVisitas"></div>'+
                			                                  '<div id="noInventario"></div>');
                		}else{

                			$('#salaVentasDetalle').append('<div class="row">'+
                                                        //'<div class="col-md-8">'+
                                                        '<h3 class="text-center text-info">DETALLES SALA DE VENTAS</h3>'+
                                                        '<h4 class="text-center text-info"></h4>'+
                                                           '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;">'+
                                                               '<tbody>'+
                                                                   '<tr>'+
                                                                        '<td><strong>Fecha Implementacion:</strong></td>'+
                                                                        '<td>'+fecha_implementacion+'</td>'+
                                                                    '</tr>'+
                                                                    '<tr>'+
                                                                        '<td><strong>Fecha Capacitación:</strong></td>'+
                                                                        '<td>'+fecha_capacitacion+'</td>'+
                                                                    '</tr>'+
                                                                    '<tr>'+
                                                                        '<td><strong>Fecha Retiro:</strong></td>'+
                                                                        '<td>'+fecha_retiro+'</td>'+
                                                                    '</tr>'+
                                                                    '<tr>'+
                                                                        '<td><strong>Stand:</strong></td>'+
                                                                        '<td>'+stand_sala+'</td>'+
                                                                    '</tr>'+
                                                                    '<tr>'+
                                                                        '<td><strong>Descripcion:</strong></td>'+
                                                                        '<td>'+descripcion+'</td>'+
                                                                    '</tr>'+
                                                                    '<tr>'+
                                                                        '<td><strong>Observación:</strong></td>'+
                                                                        '<td>'+observacion+'</td>'+
                                                                    '</tr>'+
                			                                        '<tr>'+
                			                                            '<td><strong>Contacto:</strong></td>'+
                			                                            '<td>'+'</td>'+
                			                                        '</tr>'+
                                                                   '<tr>'+
                                                                        '<td><td>'+
                                                                   '</tr>'+
                                                               '</tbody>'+
                                                            '</table>'+
                                                        //'</div>'+
                                                    '</div>'+
                                                    '<br>'+
                                                    '<div id="noVisitas"></div>'+
                                                    '<br>'+
                                                    '<div class="row">'+
                                                        //'<div class="col-md-6">'+
                                                        '<h3 class="text-center text-info">Inventario Stand Domótico</h3>'+
                                                        '<h4 class="text-center text-info"></h4>'+
                                                           '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;" id="tablaInventario">'+
                                                                '<thead>'+
                                                                    '<th>tiempo instalacion</th>'+
                                                                    '<th>tiempo configuracion</th>'+
                                                                    '<th>cantidad</th>'+
                                                                    '<th>total</th>'+
                                                                    '<th>producto id</th>'+
                                                                '</thead>'+
                                                                '<tbody>'+
                                                                '</tbody>'+
                                                            '</table>'+
                                                        //'</div>'+
                                                    '</div>'

                            );

                		}


                	}else{

                		if(inventario[0].producto_id == 0){
                			$('#salaVentasDetalle').append('<div class="row">'+
                    		                                   //'<div class="col-md-8">'+
                    		                                   '<h3 class="text-center text-info">DETALLES SALA DE VENTAS</h3>'+
                    		                                   '<h4 class="text-center text-info"></h4>'+
                    		                                      '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;">'+
                    		                                          '<tbody>'+
                    		                                              '<tr>'+
                    		                                                   '<td><strong>Fecha Implementacion:</strong></td>'+
                    		                                                   '<td>'+fecha_implementacion+'</td>'+
                    		                                               '</tr>'+
                    		                                               '<tr>'+
                    		                                                   '<td><strong>Fecha Capacitación:</strong></td>'+
                    		                                                   '<td>'+fecha_capacitacion+'</td>'+
                    		                                               '</tr>'+
                    		                                               '<tr>'+
                    		                                                   '<td><strong>Fecha Retiro:</strong></td>'+
                    		                                                   '<td>'+fecha_retiro+'</td>'+
                    		                                               '</tr>'+
                    		                                               '<tr>'+
                    		                                                   '<td><strong>Stand:</strong></td>'+
                    		                                                   '<td>'+stand_sala+'</td>'+
                    		                                               '</tr>'+
                    		                                               '<tr>'+
                    		                                                   '<td><strong>Descripcion:</strong></td>'+
                    		                                                   '<td>'+descripcion+'</td>'+
                    		                                               '</tr>'+
                    		                                               '<tr>'+
                    		                                                   '<td><strong>Observación:</strong></td>'+
                    		                                                   '<td>'+observacion+'</td>'+
                    		                                               '</tr>'+
                			                                                '<tr>'+
                			                                                    '<td><strong>Contacto:</strong></td>'+
                			                                                    '<td>'+'</td>'+
                			                                                '</tr>'+
                    		                                              '<tr>'+
                    		                                                   '<td><td>'+
                    		                                              '</tr>'+
                    		                                          '</tbody>'+
                    		                                       '</table>'+
                    		                                   //'</div>'+
                    		                               '</div>'+
                    		                               '<br>'+
                    		                               '<div class="row">'+
                        	                                //'<div class="col-md-6">'+
                        	                                '<h3 class="text-center text-info">VISITAS</h3>'+
                        	                                '<h4 class="text-center text-info"></h4>'+
                        	                                   '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;" id="tablaVisitas">'+
                        	                                        '<thead>'+
                        	                                            '<th>Fecha Visita</th>'+
                        	                                            '<th>Observación</th>'+
                        	                                            '<th>Responsable</th>'+
                        	                                        '</thead>'+
                        	                                        '<tbody>'+
                        	                                        '</tbody>'+
                        	                                    '</table>'+
                        	                                //'</div>'+
                        	                            	'</div>'+
                        	                            	'<div id="noInventario"></div>');
                		}else{

                    		$('#salaVentasDetalle').append('<div class="row">'+
                    	                                   //'<div class="col-md-8">'+
                    	                                   '<h3 class="text-center text-info">DETALLES SALA DE VENTAS</h3>'+
                    	                                   '<h4 class="text-center text-info"></h4>'+
                    	                                      '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;">'+
                    	                                          '<tbody>'+
                    	                                              '<tr>'+
                    	                                                   '<td><strong>Fecha Implementacion:</strong></td>'+
                    	                                                   '<td>'+fecha_implementacion+'</td>'+
                    	                                               '</tr>'+
                    	                                               '<tr>'+
                    	                                                   '<td><strong>Fecha Capacitación:</strong></td>'+
                    	                                                   '<td>'+fecha_capacitacion+'</td>'+
                    	                                               '</tr>'+
                    	                                               '<tr>'+
                    	                                                   '<td><strong>Fecha Retiro:</strong></td>'+
                    	                                                   '<td>'+fecha_retiro+'</td>'+
                    	                                               '</tr>'+
                    	                                               '<tr>'+
                    	                                                   '<td><strong>Stand:</strong></td>'+
                    	                                                   '<td>'+stand_sala+'</td>'+
                    	                                               '</tr>'+
                    	                                               '<tr>'+
                    	                                                   '<td><strong>Descripcion:</strong></td>'+
                    	                                                   '<td>'+descripcion+'</td>'+
                    	                                               '</tr>'+
                    	                                               '<tr>'+
                    	                                                   '<td><strong>Observación:</strong></td>'+
                    	                                                   '<td>'+observacion+'</td>'+
                    	                                               '</tr>'+
                			                                            '<tr>'+
                			                                                '<td><strong>Contacto:</strong></td>'+
                			                                                '<td>'+'</td>'+
                			                                            '</tr>'+
                    	                                              '<tr>'+
                    	                                                   '<td><td>'+
                    	                                              '</tr>'+
                    	                                          '</tbody>'+
                    	                                       '</table>'+
                    	                                   //'</div>'+
                    	                               '</div>'+
                    	                               '<br>'+
                    	                               '<div class="row">'+
                                                        //'<div class="col-md-6">'+
                                                        '<h3 class="text-center text-info">VISITAS</h3>'+
                                                        '<h4 class="text-center text-info"></h4>'+
                                                           '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;" id="tablaVisitas">'+
                                                                '<thead>'+
                                                                    '<th>Fecha Visita</th>'+
                                                                    '<th>Observación</th>'+
                                                                    '<th>Responsable</th>'+
                                                                '</thead>'+
                                                                '<tbody>'+
                                                                '</tbody>'+
                                                            '</table>'+
                                                        //'</div>'+
                                                    	'</div>'+
                                                    	'<br>'+
                                                   		'<div class="row">'+
                                                   		    //'<div class="col-md-6">'+
                                                   		    '<h3 class="text-center text-info">Inventario Stand Domótico</h3>'+
                                                   		    '<h4 class="text-center text-info"></h4>'+
                                                   		       '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;" id="tablaInventario">'+
                                                   		            '<thead>'+
                                                   		                '<th>tiempo instalacion</th>'+
                                                   		                '<th>tiempo configuracion</th>'+
                                                   		                '<th>cantidad</th>'+
                                                   		                '<th>total</th>'+
                                                   		                '<th>producto id</th>'+
                                                   		            '</thead>'+
                                                   		            '<tbody>'+
                                                   		            '</tbody>'+
                                                   		        '</table>'+
                                                   		    //'</div>'+
                                                    	'</div>');

                		}

                	}

                	$.each(visitas, function(index, obj){

                		var fecha_visita = obj.fecha_visita;
                		var observacion = obj.observacion;
                		var responsable = obj.responsable;

                		var fecha_final;
                		var observacion_final;
                		var responsable_final;

                		if(fecha_visita == null){
                			fecha_final = "";
                		}else{
                			 fecha_final = fecha_visita;
                		}

                   		if(observacion == null){
                			 observacion_final = "";
                		}else{
                		     observacion_final = observacion;
                		}

                		if(responsable == null){
                			 responsable_final = "";
                		}else{
                			 responsable_final = responsable;
                		}

                		if(fecha_visita == 0){
                			$('#noVisitas').append('<div class="row">'+
                                                        //'<div class="col-md-6">'+
                                                        '<h3 class="text-center text-info">VISITAS</h3>'+
                                                        '<h4 class="text-center text-info"></h4>'+
                                                        '<h4 class="text-center text-info">No se han realizado visitas aún</h4>'+
                                                        //'</div>'+
                                                    '</div>');
                		}else{

                			$('#tablaVisitas').append('<tr>'+
                                                            '<td>'+fecha_final+'</td>'+
                                                            '<td>'+observacion_final+'</td>'+
                                                            '<td>'+responsable_final+'</td>'+
                                                        '</tr>'  );
                		}
                	});

                	$.each(inventario,function(index,obj){

                		var tiempo_instalacion_hora = obj.tiempo_instalacion_hora;
                		var tiempo_configuracion_hora = obj.tiempo_configuracion_hora;
                		var cantidad = obj.cantidad;
                		var total = obj.total;
                		var final = total * cantidad;
                		var producto = obj.producto_id;

                		if(producto == 0){

                			$('#noInventario').append('<div class="row">'+
                                                   			    //'<div class="col-md-6">'+
                                                    			'<br>'+
                                                   			    '<h3 class="text-center text-info">INVENTARIO STAND</h3>'+
                                                   			    '<h4 class="text-center text-info"></h4>'+
                                                   			    '<h4 class="text-center text-info">Esta sala de ventas no posee inventario</h4>'+
                                                   			    //'</div>'+
                                                   			'</div>');


                		}else{

                			$('#tablaInventario').append('<tr>'+
                											'<td>'+tiempo_instalacion_hora+' hrs.</td>'+
                											'<td>'+tiempo_configuracion_hora+' hrs.</td>'+
                											'<td>'+cantidad+'</td>'+
                											'<td>'+final+' hrs.</td>'+
                											'<td>'+producto+'</td>'+
                										 '</tr>')

                		}

                	});

                });//each
            }//else si tiene sala de ventas
		});//get
	}

</script>

<script>
    function ver_piloto($id){

        $('#pilotoDetalle').empty();

        $.get('listado_piloto/'+$id, function(data){

        	if (data == 0){

        		$('#pilotoDetalle').append('<h4>Este proyecto no posee piloto</h4>');

        	}else{

        		$.each(data, function(index, obj){

        			var datos_piloto = obj.datos;
        			var inventario_piloto = obj.inventario;
        			var visitas_piloto = obj.visitas;


        			if(visitas_piloto[0].fecha_visita == 0){

        				if(inventario_piloto[0].producto == 0){

        					$('#pilotoDetalle').append('<div class="row">'+
                			                                      //'<div class="col-md-8">'+
                			                                      '<h3 class="text-center text-info">DETALLES PILOTO</h3>'+
                			                                      '<h4 class="text-center text-info"></h4>'+
                			                                         '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;">'+
                			                                             '<tbody id="tabla_datos">'+
                			                                             '</tbody>'+
                			                                          '</table>'+
                			                                      //'</div>'+
                			                                  '</div>'+
                			                                  '<br>'+
                			                                  '<div id="noVisitas"></div>'+
                			                                  '<div id="noInventario"></div>');

        				}else{//else si tiene inventario

                			$('#pilotoDetalle').append('<div class="row">'+
                                                        //'<div class="col-md-8">'+
                                                        '<h3 class="text-center text-info">DETALLES PILOTO</h3>'+
                                                        '<h4 class="text-center text-info"></h4>'+
                                                           '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;">'+
                                                               '<tbody id="tabla_datos">'+
                                                               '</tbody>'+
                                                            '</table>'+
                                                        //'</div>'+
                                                    '</div>'+
                                                    '<br>'+
                                                    '<div id="noVisitas"></div>'+
                                                    '<br>'+
                                                    '<div class="row">'+
                                                        //'<div class="col-md-6">'+
                                                        '<h3 class="text-center text-info">Inventario PILOTO</h3>'+
                                                        '<h4 class="text-center text-info"></h4>'+
                                                           '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;" id="tablaInventario">'+
                                                                '<thead>'+
                                                                    '<th>tiempo instalacion</th>'+
                                                                    '<th>tiempo configuracion</th>'+
                                                                    '<th>cantidad</th>'+
                                                                    '<th>total</th>'+
                                                                    '<th>producto id</th>'+
                                                                '</thead>'+
                                                                '<tbody>'+
                                                                '</tbody>'+
                                                            '</table>'+
                                                        //'</div>'+
                                                    '</div>'

                            );

        				}

        			}else{//else si tiene visitas

        				if(inventario_piloto[0].producto == 0){

                			$('#pilotoDetalle').append('<div class="row">'+
                    		                                   //'<div class="col-md-8">'+
                    		                                   '<h3 class="text-center text-info">DETALLES PILOTO</h3>'+
                    		                                   '<h4 class="text-center text-info"></h4>'+
                    		                                      '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;">'+
                    		                                          '<tbody id="tabla_datos">'+
                    		                                          '</tbody>'+
                    		                                       '</table>'+
                    		                                   //'</div>'+
                    		                               '</div>'+
                    		                               '<br>'+
                    		                               '<div class="row">'+
                        	                                //'<div class="col-md-6">'+
                        	                                '<h3 class="text-center text-info">VISITAS</h3>'+
                        	                                '<h4 class="text-center text-info"></h4>'+
                        	                                   '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;" id="tablaVisitas">'+
                        	                                        '<thead>'+
                        	                                            '<th>Fecha Visita</th>'+
                        	                                            '<th>Observación</th>'+
                        	                                            '<th>Responsable</th>'+
                        	                                        '</thead>'+
                        	                                        '<tbody>'+
                        	                                        '</tbody>'+
                        	                                    '</table>'+
                        	                                //'</div>'+
                        	                            	'</div>'+
                        	                            	'<div id="noInventario"></div>');

        				}else{//else si tiene inventario

        					$('#pilotoDetalle').append('<div class="row">'+
                    	                                   //'<div class="col-md-8">'+
                    	                                   '<h3 class="text-center text-info">DETALLES PILOTO</h3>'+
                    	                                   '<h4 class="text-center text-info"></h4>'+
                    	                                      '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;">'+
                    	                                          '<tbody id="tabla_datos">'+
                    	                                          '</tbody>'+
                    	                                       '</table>'+
                    	                                   //'</div>'+
                    	                               '</div>'+
                    	                               '<br>'+
                    	                               '<div class="row">'+
                                                        //'<div class="col-md-6">'+
                                                        '<h3 class="text-center text-info">VISITAS</h3>'+
                                                        '<h4 class="text-center text-info"></h4>'+
                                                           '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;" id="tablaVisitas">'+
                                                                '<thead>'+
                                                                    '<th>Fecha Visita</th>'+
                                                                    '<th>Observación</th>'+
                                                                    '<th>Responsable</th>'+
                                                                '</thead>'+
                                                                '<tbody>'+
                                                                '</tbody>'+
                                                            '</table>'+
                                                        //'</div>'+
                                                    	'</div>'+
                                                    	'<br>'+
                                                   		'<div class="row">'+
                                                   		    //'<div class="col-md-6">'+
                                                   		    '<h3 class="text-center text-info">Inventario Piloto</h3>'+
                                                   		    '<h4 class="text-center text-info"></h4>'+
                                                   		       '<table cellpadding="1" cellspacing="1" class="table" style="width: 70%; margin: auto; text-align:left;" id="tablaInventario">'+
                                                   		            '<thead>'+
                                                   		                '<th>tiempo instalacion</th>'+
                                                   		                '<th>tiempo configuracion</th>'+
                                                   		                '<th>cantidad</th>'+
                                                   		                '<th>total</th>'+
                                                   		                '<th>producto id</th>'+
                                                   		            '</thead>'+
                                                   		            '<tbody>'+
                                                   		            '</tbody>'+
                                                   		        '</table>'+
                                                   		    //'</div>'+
                                                    	'</div>');

        				}

        			}

        			$.each(datos_piloto, function(index, obj){

        				if(obj.fecha_implementacion == null){

        					var fecha_implementacion = "";

        				}else{

        					var fecha_implementacion = obj.fecha_implementacion;

        				}
        				if(obj.fecha_capacitacion == null){

        					var fecha_capacitacion = "";

        				}else{

        					var fecha_capacitacion = obj.fecha_capacitacion;

        				}
        				if(obj.fecha_retiro == null){

        					var fecha_retiro = "";

        				}else{

        					var fecha_retiro = obj.fecha_retiro;

        				}
        				if(obj.direccion == null){

        					var direccion = "";

        				}else{

        					var direccion = obj.direccion;

        				}
        				if(obj.observacion == null){

        					var observacion = "";

        				}else{

        					var observacion = obj.observacion;

        				}
        				if(obj.descripcion == null){

        					var descripcion = "";

        				}else{

        					var descripcion = obj.descripcion;

        				}

                       	$('#tabla_datos').append('<tr>'+
                    	                             '<td><strong>Fecha Implementacion:</strong></td>'+
                    	                             '<td>'+fecha_implementacion+'</td>'+
                    	                         '</tr>'+
                    	                         '<tr>'+
                    	                             '<td><strong>Fecha Capacitación:</strong></td>'+
                    	                             '<td>'+fecha_capacitacion+'</td>'+
                    	                         '</tr>'+
                    	                         '<tr>'+
                    	                             '<td><strong>Fecha Retiro:</strong></td>'+
                    	                             '<td>'+fecha_retiro+'</td>'+
                    	                         '</tr>'+
                    	                         '<tr>'+
                    	                             '<td><strong>Dirección:</strong></td>'+
                    	                             '<td>'+direccion+'</td>'+
                    	                         '</tr>'+
                    	                         '<tr>'+
                    	                             '<td><strong>Descripcion:</strong></td>'+
                    	                             '<td>'+'</td>'+
                    	                         '</tr>'+
                    	                         '<tr>'+
                    	                             '<td><strong>Observación:</strong></td>'+
                    	                             '<td>'+observacion+'</td>'+
                    	                         '</tr>'+
                			                     '<tr>'+
                			                         '<td><strong>Contacto:</strong></td>'+
                			                         '<td>'+'</td>'+
                			                     '</tr>'+
                    	                         '<tr>'+
                    	                             '<td><td>'+
                    	                         '</tr>');

        			});

        			$.each(visitas_piloto, function(index, obj){

                		var fecha_visita = obj.fecha_visita;
                		var observacion = obj.observacion;
                		var responsable = obj.responsable;

                		var fecha_final;
                		var observacion_final;
                		var responsable_final;

                		if(fecha_visita == null){
                			fecha_final = "";
                		}else{
                			 fecha_final = fecha_visita;
                		}

                   		if(observacion == null){
                			 observacion_final = "";
                		}else{
                		     observacion_final = observacion;
                		}

                		if(responsable == null){
                			 responsable_final = "";
                		}else{
                			 responsable_final = responsable;
                		}



                		if(fecha_final == 0){
                			$('#noVisitas').append('<div class="row">'+
                                                        '<h3 class="text-center text-info">VISITAS</h3>'+
                                                        '<h4 class="text-center text-info"></h4>'+
                                                        '<h4 class="text-center text-info">No se han realizado visitas aún</h4>'+
                                                    '</div>');
                		}else{

                			$('#tablaVisitas').append('<tr>'+
                                                            '<td>'+fecha_final+'</td>'+
                                                            '<td>'+observacion_final+'</td>'+
                                                            '<td>'+responsable_final+'</td>'+
                                                        '</tr>'  );
                		}
                	});

                	$.each(inventario_piloto,function(index,obj){

                		var tiempo_instalacion_hora = obj.tiempo_instalacion_hora;
                		var tiempo_configuracion_hora = obj.tiempo_configuracion_hora;
                		var cantidad = obj.cantidad;
                		var total = obj.total;
                		var producto = obj.producto;

                		if(producto == 0){

                			$('#noInventario').append('<div class="row">'+
                                                   			    //'<div class="col-md-6">'+
                                                    			'<br>'+
                                                   			    '<h3 class="text-center text-info">INVENTARIO PILOTO</h3>'+
                                                   			    '<h4 class="text-center text-info"></h4>'+
                                                   			    '<h4 class="text-center text-info">Este Piloto no posee inventario</h4>'+
                                                   			    //'</div>'+
                                                   			'</div>');


                		}else{

                			$('#tablaInventario').append('<tr>'+
                											'<td>'+tiempo_instalacion_hora+' hrs.</td>'+
                											'<td>'+tiempo_configuracion_hora+' hrs.</td>'+
                											'<td>'+cantidad+'</td>'+
                											'<td>'+total+' hrs.</td>'+
                											'<td>'+producto+'</td>'+
                										 '</tr>');

                		}

                	});

        		});

        	}

        });

    }

</script>

<script>

    function ver_area_tecnica(id){

        $('#areaTecnicaDetalle').empty();
        $.get('listarcomentariosat/'+id, function(data){

            if(data == 0){

                $('#areaTecnicaDetalle').append('<div class="row">'+
                                                    //'<div class="col-md-6">'+
                                                    '<h3 class="text-center text-info">Comentarios</h3>'+
                                                    '<h4 class="text-center text-info"></h4>'+
                                                    '<h4 class="text-center text-info">No se han realizado observaciones aún</h4>'+
                                                    //'</div>'+
                                                '</div>');

            }else{

                $('#areaTecnicaDetalle').append('<div class="row">'+
                                                    '<div class="col-md-2"></div>'+
                                                    '<div class="col-md-8">'+
                                                    '<h4 class="text-center text-info"></h4>'+
                                                       '<table cellpadding="1" cellspacing="1" class="table">'+
                                                            '<thead>'+
                                                                '<th>Fecha</th>'+
                                                                '<th>Observación</th>'+
                                                                '<th>Responsable</th>'+
                                                            '</thead>'+
                                                            '<tbody id="comentariosAT">'+
                                                            '</tbody>'+
                                                        '</table>'+
                                                    '</div>'+
                                                    '<div class="col-md-2"></div>'+
                                                '</div>');

                $.each(data, function(index, value){


                	if(value.fecha_observacion == null){
                		var fecha_observacion = "";
                	}else{
                		var fecha_observacion = value.fecha_observacion;
                	}
                    if(value.observacion == null){
                		var observacion = "";
                	}else{
                		var observacion = value.observacion;
                	}
                	if(value.responsable == null){
                		var responsable = "";
                	}else{
                		var responsable = value.responsable;
                	}



                    $('#comentariosAT').append('<tr>'+
                                                   '<td>'+fecha_observacion+'</td>'+
                                                   '<td>'+observacion+' </td>'+
                                                   '<td>'+responsable+'</td>'+
                                                '</tr>');

                });

            }

        });

    }

</script>

<script>

    function ver_mkt(id){

        $('#mktDetalle').empty();
        $.get('listarcomentariosmkt/'+id, function(data){

            if(data == 0){

                $('#mktDetalle').append('<div class="row">'+
                            //'<div class="col-md-6">'+
                            '<h3 class="text-center text-info">Comentarios</h3>'+
                            '<h4 class="text-center text-info"></h4>'+
                            '<h4 class="text-center text-info">No se han realizado observaciones aún</h4>'+
                            //'</div>'+
                        '</div>');

            }else{

                $('#mktDetalle').append('<div class="row">'+
                                            '<div class="col-md-2"></div>'+
                                            '<div class="col-md-8">'+
                                            '<h4 class="text-center text-info"></h4>'+
                                               '<table cellpadding="1" cellspacing="1" class="table">'+
                                                    '<thead>'+
                                                        '<th>Fecha</th>'+
                                                        '<th>Observación</th>'+
                                                        '<th>Responsable</th>'+
                                                    '</thead>'+
                                                    '<tbody id="comentariosMkt">'+
                                                    '</tbody>'+
                                                '</table>'+
                                            '</div>'+
                                            '<div class="col-md-2"></div>'+
                                        '</div>');

                $.each(data, function(index, value){

                	if(value.fecha_observacion == null){
                		var fecha_observacion = "";
                	}else{
                		var fecha_observacion = value.fecha_observacion;
                	}
                    if(value.observacion == null){
                		var observacion = "";
                	}else{
                		var observacion = value.observacion;
                	}
                	if(value.responsable == null){
                		var responsable = "";
                	}else{
                		var responsable = value.responsable;
                	}



                    $('#comentariosMkt').append('<tr>'+
                                                   '<td>'+fecha_observacion+'</td>'+
                                                   '<td>'+observacion+' </td>'+
                                                   '<td>'+responsable+'</td>'+
                                                '</tr>');

                });

            }

        });
    }

</script>

<script>
    // abre modal editar contrato y carga los campos con los datos
    function modal_editar_contrato(id){

        $.get('contrato/'+id, function(data){

            $.each(data, function(index, value){

                $('#contenedor_fecha_pago').empty();

                $('#id_contrato').val(value.id);

                $('#nombre_inmobiliaria').val(value.nombre_inmobiliaria);

                $.ajax({
                    url: '/contrato_proyecto/'+value.nombre_inmobiliaria,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#proyecto_id').empty();

                            $('#proyecto_id').append('<option value="'+ value.proyecto_id +'">'+ value.nombre_proyecto +'</option>');
                        $.each(data, function(index, proyecto) {
                            $('#proyecto_id').append('<option value="'+ proyecto.id +'">'+ proyecto.nombre +'</option>');
                        });

                    }
                });

                $('#num_contrato').val(value.numero_contrato);

                $('#total_viviendas_proyectos').val(value.total_viviendas_proyecto);

                if(value.estado_id == 6){
                    var nombre_estado = 'activo';
                } else {
                    var nombre_estado = 'inactivo';
                }
                $('#estado_proyecto2').val(value.estado_id);

                $('#estado_proyecto2').text('actual: '+nombre_estado);

                $('#mesAñoConfeccion').val(value.mes_confeccion_contrato);

                $('#comuna_proyecto2').val(value.comuna_id)

                $('#comuna_proyecto2').text(value.comuna_proyecto)

                $.ajax({
                    url: '/listar_paises',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#pais_proyecto').empty();

                        $.each(data, function(index, pais) {
                            $('#pais_proyecto').append('<option value="'+ pais.id +'">'+ pais.nombre +'</option>');
                        });

                    }
                });

                $.ajax({
                    url: '/ubicacion_proyecto/'+ value.comuna_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                        $.each(data, function(index, ubicacion) {

                            $('#region_proyecto2').val(ubicacion.region_id);

                            $('#region_proyecto2').text('actual: '+ubicacion.region_nombre);

                            $('#ciudad_proyecto2').val(ubicacion.ciudad_id);

                            $('#ciudad_proyecto2').text('actual: '+ubicacion.ciudad_nombre);
                        });

                    }
                });
                $('#fechas_personalizadas').empty();

                $.ajax({
                    url: '/fechas_personalizadas/'+id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                       $.each(data, function(index, value) {

                           $('#fechas_personalizadas').append('<p> Mes instalacion: '+value.mes_annio_instalacion+' Cantidad: '+value.cantidad_instalacion+' viviendas.</p>')
                       });

                    }
                });

                $('#collapseInstalacionesPrsonalizadas').collapse('show');

                $('#direccion_proyecto').val(value.direccion_proyecto);

                $('#sala_ventas').val(value.sala_ventas);

                $('#vivienda_piloto').val(value.piloto);

                $('#rep_legal_proyecto').val(value.representante_legal_proyecto);

                $('#rut_rep_legal').val(value.rut_rep_legal);

                $('#rep_legal_proyecto2').val(value.mandante_proyecto);

                $('#rut_rep_legal2').val(value.rut_mandante_proyecto);

                $('#ins_personeria_juridica').val(value.ins_personeria_juridica);

                $('#notario_ins').val(value.nombre_notario_publico);

                $('#razon_social_factura').val(value.razon_social);

                $('#giro_factura').val(value.giro_factura);

                $('#rut_factura').val(value.rut_factura);

                $('#direccion_factura').val(value.direccion_factura);

                $('#encargado_finanzas').val(value.encargado_finanzas);

                $('#email_encargado_finanzas').val(value.email_encargado_finanzas);

                $('#email_dte').val(value.email_dte);

                $('#monto_contrato').val(value.monto_contrato);

                $('#fecha_pago_1').val(value.pago1_fecha);

                $('#fecha_pago_2').val(value.pago2_fecha);

                $('#fecha_pago_3').val(value.pago3_fecha);

                $('#fecha_inicio_instalacion').val(value.fecha_probable_entrega);

                $('#observacion_contrato').val(value.observacion);

                if(value.estado_observacion == null){

                    $('#estado_observacion_contrato2').val(10);

                    $('#estado_observacion_contrato2').text('actual: Con Observación');

                }else if(value.estado_observacion == 10 ){

                    $('#estado_observacion_contrato2').val(10);

                    $('#estado_observacion_contrato2').text('actual: Con Observación');

                }else{

                    $('#estado_observacion_contrato2').val(11);

                    $('#estado_observacion_contrato2').text('actual: Listo');

                }

                if(value.pago4_fecha != null){

                	$('#contenedor_fecha_pago').append('<div class="form-group">'+
                                							'<label class="control-label" for="fecha_pago_4">Fecha Pago 4</label>'+
                                							'<div class="input-group date" id="datetimepicker14">'+
                                    							'<span class="input-group-addon">'+
                                        							'<span class="fa fa-calendar"></span>'+
                                    							'</span>'+
                                    							'<input type="text" class="form-control" id="fecha_pago_4" name="fecha_pago_4">'+
                                							'</div>'+
                            							'</div>'+
                            							'<div class="form-group">'+
                                							'<label class="control-label" for="fecha_pago_5">Fecha Pago 5</label>'+
                                							'<div class="input-group date" id="datetimepicker15">'+
                                    							'<span class="input-group-addon">'+
                                        							'<span class="fa fa-calendar"></span>'+
                                    							'</span>'+
                                    							'<input type="text" class="form-control" id="fecha_pago_5" name="fecha_pago_5">'+
                                							'</div>'+
                            							'</div>'
                            							);

                	var fecha4 = document.getElementById('fecha_pago_4');

                	var fecha5 = document.getElementById('fecha_pago_5');

                	fecha4.readOnly=false;

                	fecha5.readOnly=false;

                	$('#fecha_pago_4').val(value.pago4_fecha);

                	$('#fecha_pago_5').val(value.pago5_fecha);

                }else{

                	$('#contenedor_fecha_pago').append('<div class="form-group">'+
                                							'<label class="control-label" for="fecha_pago_4">Fecha Pago 4</label>'+
                                							'<input type="text" class="form-control" id="fecha_pago_4" name="fecha_pago_4">'+
                            							'</div>'+
                            							'<div class="form-group">'+
                                							'<label class="control-label" for="fecha_pago_5">Fecha Pago 5</label>'+
                                							'<input type="text" class="form-control" id="fecha_pago_5" name="fecha_pago_5">'+
                           						 		'</div>'

                		);

                	var fecha4 = document.getElementById('fecha_pago_4');

                	var fecha5 = document.getElementById('fecha_pago_5');

                	fecha4.readOnly=true;

                	fecha5.readOnly=true;

                	$('#fecha_pago_4').val("");

                	$('#fecha_pago_5').val("");
                }

                $('#nombre_rep_legal').val(value.nombre_responsable);

                $('#cargo_rep_legal').val(value.cargo_responsable);

                $('#email_rep_legal').val(value.email_responsable);

                $('#telefono_responsable').val(value.telefono_responsable);

                $('#nombre_contacto_mkt').val(value.nombre_contacto_mkt);

                $('#cargo_contacto_mkt').val(value.cargo_contacto_mkt);

                $('#email_contacto_mkt').val(value.email_contacto_mkt);

                $('#nombre_agencia_externa').val(value.nombre_agencia_externa);

                $('#link_oficial_proyecto').val(value.url_oficial_proyecto);

            });
        });
    }
</script>


<script>
    //Abre modal editar sala ventas y carga los campos con los datos de la sala de ventas
    //validando si tiene sala de ventas o no.
    function modal_editar_sala_ventas(id){

    	$('#editar_sala_ventas').empty();

        $.get('ver_sala_ventas/'+id, function(data){

        	if(data == 0 ){

                var id_contrato = id;
                $('#editar_sala_ventas').empty();
                $('#editar_sala_ventas').append('<div class="row">'+
                                                    '<form id="">'+
                                                        '<h4 class="text-center text-warning">DATOS DE SALA DE VENTAS</h4>'+
                                                        '<input type="hidden" value="0" class="form-control" id="id_salaVenta">'+
                                                        '<input type="hidden" value="'+id_contrato+'" class="form-control" id="id_contrato">'+
                                                            '<hr style="border-color: #FFF;" >'+
                                                        '<div class="col-md-6">'+
                                                            '<div class="form-group">'+
                                                                '<label class="control-label" for="fecha_implementacion_sala_ventas">Fecha implementación</label>'+
                                                               	'<div class="input-group date" id="datetimepicker17">'+
                                                                   '<span class="input-group-addon">'+
                                                                       '<span class="fa fa-calendar"></span>'+
                                                                   '</span>'+
                                                                   '<input type="text" value="" class="form-control" id="fecha_implementacion_sala_ventas" name="fecha_implementacion_sala_ventas">'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="form-group">'+
                                                                '<label class="control-label" for="fecha_capacitacion_sala_ventas">Fecha Capacitacion</label>'+
                                                                '<div class="input-group date" id="datetimepicker18">'+
                                                                    '<span class="input-group-addon">'+
                                                                        '<span class="fa fa-calendar"></span>'+
                                                                    '</span>'+
                                                                    '<input type="text" class="form-control" value="" id="fecha_capacitacion_sala_ventas" name="fecha_capacitacion_sala_ventas">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="control-label" for="fecha_retiro_sala_ventas">Fecha Retiro</label>'+
                                                                    '<div class="input-group date" id="datetimepicker19">'+
                                                                        '<span class="input-group-addon">'+
                                                                            '<span class="fa fa-calendar"></span>'+
                                                                        '</span>'+
                                                                        '<input type="text" class="form-control" value="" id="fecha_retiro_sala_ventas" name="fecha_retiro_sala_ventas">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="col-md-6">'+
                                                                '<div class="form-group">'+
                                                                    '<label class="control-label" for="stand_sala_ventas">Stand</label>'+
                                                                    '<input type="text" class="form-control" value="" id="stand_sala_ventas" name="stand_sala_ventas">'+
                                                                '</div>'+
                                                               '<div class="form-group">'+
                                                                   '<label class="control-label" for="descripcion_sala_ventas">Descripción</label>'+
                                                                   '<input type="text" class="form-control" id="descripcion_sala_ventas" name="descripcion_sala_ventas" value="">'+
                                                               '</div>'+
                                                               '<div class="form-group">'+
                                                                    '<label class="control-label" for="estado_sala_ventas">Estado Sala Ventas</label>'+
                                                                    '<select class="form-control" id="estado_sala_ventas" name="estado_sala_ventas">'+
                                                                        '<option value=""></option>'+
                                                                        '<option value="11">Listo</option>'+
                                                                        '<option value="10">Con observacion</option>'+
                                                                    '</select>'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="col-md-12">'+
                                                                '<div class="form-group">'+
                                                                    '<label class="control-label" for="observacion_sala">Observaciones</label>'+
                                                                    '<input type="text" class="form-control" value="" id="observacion_sala" name="observacion_sala">'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</form>'+
                                                '</div>'+
                                                '<hr>');

                        $('#inventario_stand_collapse').collapse('show');
                        $('#inventario_stand_editar').collapse('hide');



                        $('#datetimepicker17').datepicker();
                        $('#datetimepicker18').datepicker();
                        $('#datetimepicker19').datepicker();

            }else{

            	$.each(data, function(index, obj){

            		var inventario = obj.inventario_sala;

            		var id_sala = obj.id_sala
                    var fecha_implementacion = obj.fecha_implementacion;
                    if(obj.fecha_capacitacion == null){
                        obj.fecha_capacitacion = " ";
                    }
                    var fecha_capacitacion = obj.fecha_capacitacion;

                    if(obj.fecha_retiro == null){
                        obj.fecha_retiro = " ";
                    }
                    var fecha_retiro = obj.fecha_retiro;
                    if(obj.stand_sala == null){
                        obj.stand_sala = " ";
                    }
                    var stand_sala = obj.stand_sala;
                    if(obj.descripcion == null){
                        obj.descripcion = " ";
                    }
                    var descripcion = obj.descripcion;
                    var contrato_id = obj.contrato_id;
                    if (obj.estado_sala == 11){

						var estado_sala = obj.estado_sala;
						var estado_sala_texto = "Listo";

                    }else if(obj.estado_sala == 10 || obj.estado_sala == null ){

						var estado_sala = 10;
						var estado_sala_texto = "Con Observación";

                    }
                    var observacion_sala = obj.observacion;
                    if(observacion_sala == null){
                        observacion_sala = " ";
                    }

                    $('#editar_sala_ventas').append('<div class="row">'+
                                                        '<form id="">'+
                                                            '<h4 class="text-center text-warning">DATOS DE SALA DE VENTAS</h4>'+
                                                            '<input type="hidden" value="'+id_sala+'" class="form-control" id="id_salaVenta">'+
                                                            '<input type="hidden" value="'+contrato_id+'" class="form-control" id="id_contrato">'+
                                                                '<hr style="border-color: #FFF;" >'+
                                                            '<div class="col-md-6">'+
                                                                '<div class="form-group">'+
                                                                    '<label class="control-label" for="fecha_implementacion_sala_ventas">Fecha implementación</label>'+
                                                                   '<div class="input-group date" id="datetimepicker17">'+
                                                                       '<span class="input-group-addon">'+
                                                                           '<span class="fa fa-calendar"></span>'+
                                                                       '</span>'+
                                                                       '<input type="text" value="'+fecha_implementacion+'" class="form-control" id="fecha_implementacion_sala_ventas" name="fecha_implementacion_sala_ventas">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="form-group">'+
                                                                    '<label class="control-label" for="fecha_capacitacion_sala_ventas">Fecha Capacitacion</label>'+
                                                                    '<div class="input-group date" id="datetimepicker18">'+
                                                                        '<span class="input-group-addon">'+
                                                                            '<span class="fa fa-calendar"></span>'+
                                                                        '</span>'+
                                                                        '<input type="text" class="form-control" value="'+fecha_capacitacion+'" id="fecha_capacitacion_sala_ventas" name="fecha_capacitacion_sala_ventas">'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                    '<div class="form-group">'+
                                                                        '<label class="control-label" for="fecha_retiro_sala_ventas">Fecha Retiro</label>'+
                                                                        '<div class="input-group date" id="datetimepicker19">'+
                                                                            '<span class="input-group-addon">'+
                                                                                '<span class="fa fa-calendar"></span>'+
                                                                            '</span>'+
                                                                            '<input type="text" class="form-control" value="'+fecha_retiro+'" id="fecha_retiro_sala_ventas" name="fecha_retiro_sala_ventas">'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="col-md-6">'+
                                                                    '<div class="form-group">'+
                                                                        '<label class="control-label" for="stand_sala_ventas">Stand</label>'+
                                                                        '<input type="text" class="form-control" value="'+stand_sala+'" id="stand_sala_ventas" name="stand_sala_ventas">'+
                                                                    '</div>'+
                                                                   '<div class="form-group">'+
                                                                       '<label class="control-label" for="descripcion_sala_ventas">Descripción</label>'+
                                                                       '<input type="text" class="form-control" id="descripcion_sala_ventas" name="descripcion_sala_ventas" value="'+descripcion+'">'+
                                                                   '</div>'+
                                                                   '<div class="form-group">'+
                                                                        '<label class="control-label" for="estado_sala_ventas">Estado Sala Ventas</label>'+
                                                                        '<select class="form-control" id="estado_sala_ventas" name="estado_sala_ventas">'+
                                                                            '<option value="'+estado_sala+'">Actual: '+estado_sala_texto+'</option>'+
                                                                        	'<option value="11">Listo</option>'+
                                                                        	'<option value="10">Con observacion</option>'+
                                                                        '</select>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="col-md-12">'+
                                                                    '<div class="form-group">'+
                                                                        '<label class="control-label" for="observacion_sala">Observaciones</label>'+
                                                                        '<input type="text" class="form-control" value="'+observacion_sala+'" id="observacion_sala" name="observacion_sala">'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</form>'+
                                                        '</div>'+
                                                        '<hr>');

                        $('#datetimepicker17').datepicker();
                        $('#datetimepicker18').datepicker();
                        $('#datetimepicker19').datepicker();


            		if(inventario[0].producto_id == 0){

					    $('#inventario_stand_collapse').collapse('show');
            		    $('#inventario_stand_editar').collapse('hide');


            		}else{

            			$('#inventario_stand_collapse').collapse('hide');
            		    $('#inventario_stand_editar').collapse('show');

            		}

            	});

            }


        });
    }
</script>


<script type="text/javascript">
    //Funcion que toma los datos del modal y los manda al controlador para actualizar el contrato
    //Se está usando el campo "mandante" y "rut_mandante" para hacer referencia a
    //los datos del posible segundo responsable de contrato, ademas se utiliza el campo "fecha_probable entrega"
    //para hacer referencia a la fecha de inicio de instalacion, estos son solo un cambio provisional
    //hasta que se pueda modificar la tabla y migrar.
	function editar_contrato(id){

		    var id_contrato                 = $('#id_contrato').val();
        var estado_proyecto             = $('#estado_proyecto').find(':selected').val();
        var proyecto_id                 = $('#proyecto_id').find(':selected').val();
        var estado_observacion          = $('#estado_observacion_contrato').find(':selected').val();
        var observacion_contrato        = $.trim($('#observacion_contrato').val());
        var nombre_proyecto             = $('#proyecto_id').find(':selected').text();
        var total_viviendas_proyectos   = $.trim($('#total_viviendas_proyectos').val());
		    var direccion_proyecto          = $.trim($('#direccion_proyecto').val());
        var comuna_proyecto_id          = $('#comuna_proyecto').find(':selected').val();
        var comuna_proyecto             = $('#comuna_proyecto').find(':selected').text();
        var numero_contrato             = $.trim($('#num_contrato').val());
        var nombre_inmobiliaria    		= $('#nombre_inmobiliaria').val();
        var mesAñoConfeccion			= $.trim($('#mesAñoConfeccion').val());
        var sala_ventas                 = $.trim($('#sala_ventas').val());
        var vivienda_piloto             = $.trim($('#vivienda_piloto').val());
        var rep_legal_proyecto 			= $.trim($('#rep_legal_proyecto').val());
        var rut_rep_legal               = $.trim($('#rut_rep_legal').val());
        var rep_legal_proyecto2 		= $.trim($('#rep_legal_proyecto2').val());
        var rut_rep_legal2				= $.trim($('#rut_rep_legal2').val());
        var razon_social_factura        = $.trim($('#razon_social_factura').val());
        var giro_factura                = $.trim($('#giro_factura').val());
        var rut_factura                 = $.trim($('#rut_factura').val());
        var direccion_factura           = $.trim($('#direccion_factura').val());
        var encargado_finanzas          = $.trim($('#encargado_finanzas').val());
        var email_encargado_finanzas    = $.trim($('#email_encargado_finanzas').val());
        var email_dte                   = $.trim($('#email_dte').val());
        var monto_contrato              = $.trim($('#monto_contrato').val());
        var fecha_pago_1                = $.trim($('#fecha_pago_1').val());
        var fecha_pago_2                = $.trim($('#fecha_pago_2').val());
        var fecha_pago_3                = $.trim($('#fecha_pago_3').val());
        var fecha_pago_4                = $.trim($('#fecha_pago_4').val());
        var fecha_pago_5                = $.trim($('#fecha_pago_5').val());
        var nombre_responsable 			= $.trim($('#nombre_rep_legal').val());
        var cargo_rep_legal 			= $.trim($('#cargo_rep_legal').val());
        var email_rep_legal				= $.trim($('#email_rep_legal').val());
        var telefono_rep_legal			= $.trim($('#telefono_rep_legal').val());
        var nombre_contacto_mkt 		= $.trim($('#nombre_contacto_mkt').val());
        var cargo_contacto_mkt			= $.trim($('#cargo_contacto_mkt').val());
        var email_contacto_mkt			= $.trim($('#email_contacto_mkt').val());
        var agencia_externa 			= $.trim($('#nombre_agencia_externa').val());
        var link_proyecto 				= $.trim($('#link_oficial_proyecto').val());
        var notario_publico             = $.trim($('#notario_ins').val());
        var ins_personeria_juridica     = $.trim($('#ins_personeria_juridica').val());
        var fecha_inicio_instalacion    = $.trim($('#fecha_inicio_instalacion').val());

       	$.ajaxSetup({
       	    headers: {
       	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       	    }
       	});

       	$.ajax({
       	    url: "contrato/"+id_contrato,
       	    type: "PUT",
       	    dataType: 'json',
       	    data: {
       	        "id_contrato": id_contrato,
       	        "estado_proyecto": estado_proyecto,
       	        "proyecto_id": proyecto_id,
       	        "nombre_proyecto": nombre_proyecto,
       	        "total_viviendas_proyectos": total_viviendas_proyectos,
       	        "direccion_proyecto": direccion_proyecto,
       	        "comuna_proyecto_id":comuna_proyecto_id,
       	        "comuna_proyecto": comuna_proyecto,
       	        "numero_contrato": numero_contrato,
       	        "nombre_inmobiliaria": nombre_inmobiliaria,
       	        "mesAñoConfeccion": mesAñoConfeccion,
       	        "sala_ventas": sala_ventas,
       	        "vivienda_piloto": vivienda_piloto,
       	        "rep_legal_proyecto": rep_legal_proyecto,
       	        "rut_rep_legal": rut_rep_legal,
       	        "rep_legal_proyecto2": rep_legal_proyecto2,
       	        "rut_rep_legal2": rut_rep_legal2,
       	        "razon_social_factura": razon_social_factura,
       	        "giro_factura": giro_factura,
       	        "rut_factura": rut_factura,
       	        "direccion_factura": direccion_factura,
       	        "encargado_finanzas": encargado_finanzas,
       	        "email_encargado_finanzas": email_encargado_finanzas,
       	        "email_dte": email_dte,
       	        "monto_contrato": monto_contrato,
       	        "fecha_pago_1": fecha_pago_1,
       	        "fecha_pago_2": fecha_pago_2,
       	        "fecha_pago_3": fecha_pago_3,
       	        "fecha_pago_4": fecha_pago_4,
       	        "fecha_pago_5": fecha_pago_5,
                "estado_observacion"  : estado_observacion,
                "observacion_contrato" : observacion_contrato,
       	        "nombre_responsable": nombre_responsable,
       	        "cargo_rep_legal": cargo_rep_legal,
       	        "email_rep_legal": email_rep_legal,
       	        "telefono_rep_legal": telefono_rep_legal,
       	        "nombre_contacto_mkt": nombre_contacto_mkt,
       	        "cargo_contacto_mkt": cargo_contacto_mkt,
       	        "email_contacto_mkt": email_contacto_mkt,
       	        "agencia_externa": agencia_externa,
       	        "link_proyecto": link_proyecto,
       	        "notario_publico": notario_publico,
       	        "ins_personeria_juridica": ins_personeria_juridica,
                "fecha_inicio_instalacion": fecha_inicio_instalacion
       	    },
       	    success: function(data)
       	    {
       	        console.log(data);
       	        if(data.resultado == 0){
       	        	$("#listadoContratos").dataTable().fnDestroy();
       	            $('#tbContrato').empty();
                    $('#modalEditarContrato').modal('hide');
                    cargar_tabla();
       	            toastr.options = {
       	                "debug": false,
       	                "newestOnTop": false,
       	                "positionClass": "toast-top-center",
       	                "closeButton": true,
       	                "toastClass": "animated fadeInDown",
       	            };
       	            toastr.success('Contrato actualizado');
       	        } else {
       	            console.log('Error al actualizar');
       	        }
       	    },
       	    error: function(xhr)
       	    {
       	        console.log(xhr.responseText);
       	    }
       	});//Fin ajax
	}
</script>

<script>
    //Abre modal editar sala ventas y carga los campos con los datos de la sala de ventas
    //validando si tiene sala de ventas o no.
    function modal_editar_piloto(id){
        $.get('listado_piloto/'+ id, function(data){


        	    if(data == 0){

            	   $('#fecha_implementacion_piloto').val("");
       		       $('#fecha_capacitacion_piloto').val("");
       		       $('#fecha_retiro_piloto').val("");
       		       $('#direccion_piloto').val("");
       		       $('#descripcion_piloto').val("");
       		       $('#contrato_id').val(id);
       		       $('#piloto_id').val(0);
       		       $('#observacion_piloto').val("");
       		       $('#opcion_estado_piloto').val(10);
       		       $('#opcion_estado_piloto').text("Actual: Con observación");
       		       $('#observacion_piloto').val("");

                   $('#inventario_piloto_editar').collapse('hide');
       		       $('#inventario_piloto_collapse').collapse('show');

            	}else{

            		$.each(data,function(index, obj){

            			var datos = obj.datos;
            			var inventario = obj.inventario;

            			$.each(datos, function(index, obj){

            				$('#fecha_implementacion_piloto').val(obj.fecha_implementacion);
       	           			$('#fecha_capacitacion_piloto').val(obj.fecha_capacitacion);
       	           			$('#fecha_retiro_piloto').val(obj.fecha_retiro);
       	           			$('#direccion_piloto').val(obj.direccion);
       	           			$('#descripcion_piloto').val(obj.descripcion);
       	           			$('#contrato_id').val(obj.id_contrato);
       	           			$('#piloto_id').val(obj.id_piloto);
       	           			$('#observacion_piloto').val(obj.observacion);



       	           			if(obj.estado == 10 || obj.estado == null){

       	           				$('#opcion_estado_piloto').val(10);
       		       				$('#opcion_estado_piloto').text("Actual: Con observación");

       	           			}else{

       	           				$('#opcion_estado_piloto').val(11);
       		       				$('#opcion_estado_piloto').text("Actual: Listo");

       	           			}


            			});


            			    if(inventario[0].total == 0){

            					$('#inventario_piloto_editar').collapse('hide');
       	            			$('#inventario_piloto_collapse').collapse('show');


            				}else{

            					$('#inventario_piloto_editar').collapse('show');
       	            			$('#inventario_piloto_collapse').collapse('hide');

            				}

            		});

            	}

       });
    }
</script>

<script>
    //se implementó esta funcion para poder limpiar la vista de tantos botones
    //valida que rb esta seleccionado y envia a la funcion ver requerida
    function accionVer(id){

    var id_contrato = "rbContrato"+id;
    var id_piloto = "rbPiloto"+id;
    var id_salaVenta = "rbSalaVenta"+id;
    var id_mkt = "rbMkt"+id;
    var id_areaTecnica = "rbAreaTecnica"+id;
    var id_finanzas = "rbFinanza" +id;
    var id_comercial = "rbComercial"+id;
    var rbComercial = document.getElementById(id_comercial);
    var rbContrato = document.getElementById(id_contrato);
    var rbPiloto = document.getElementById(id_piloto);
    var rbSalaVenta = document.getElementById(id_salaVenta);
    var rbMkt = document.getElementById(id_mkt);
    var rbAreaTecnica = document.getElementById(id_areaTecnica);
    var rbFinanza = document.getElementById(id_finanzas);

        if(rbContrato.checked == true){

            rbContrato.checked = false
            $('#modalContrato').modal('show');
            ver_contrato(id);

        }
        if(rbPiloto.checked == true){

            rbPiloto.checked = false;
            $('#modalPiloto').modal('show');
            ver_piloto(id);

        }
        if(rbSalaVenta.checked == true){

            rbSalaVenta.checked = false;
            $('#modalSalaVentas').modal('show');
            ver_sala_ventas(id);

        }
        if(rbMkt.checked == true){

            rbMkt.checked = false;
            $('#modalMkt').modal('show');
            ver_mkt(id);

        }
        if(rbAreaTecnica.checked == true){

            rbAreaTecnica.checked = false;
            $('#modalAreaTecnica').modal('show');
            ver_area_tecnica(id);

        }
        if(rbFinanza.checked == true){

            rbFinanza.checked = false;
            $('#modalFinanza').modal('show');
            //ver_area_tecnica(id);

        }
        if(rbComercial.checked == true){

            rbComercial.checked = false;
            $('#modalComercial').modal('show');
            //ver_area_tecnica(id);

        }
    }
</script>

<script>
    //se implementó esta funcion para poder limpiar la vista de tantos botones
    //valida que rb esta seleccionado y envia a la funcion editar requerida
    function accionEditar(id){

        var id_contrato = "rbContrato"+id;
        var id_piloto = "rbPiloto"+id;
        var id_salaVenta = "rbSalaVenta"+id;
        var id_mkt = "rbMkt"+id;
    	var id_areaTecnica = "rbAreaTecnica"+id;
    	var id_finanzas = "rbFinanza"+id;
    	var id_comercial = "rbComercial"+id;
    	var rbComercial = document.getElementById(id_comercial);
    	var rbFinanza = document.getElementById(id_finanzas);
        var rbContrato = document.getElementById(id_contrato);
        var rbPiloto = document.getElementById(id_piloto);
        var rbSalaVenta = document.getElementById(id_salaVenta);
        var rbMkt = document.getElementById(id_mkt);
    	var rbAreaTecnica = document.getElementById(id_areaTecnica);

        if(rbContrato.checked == true){

            rbContrato.checked = false;
            $('#modalEditarContrato').modal('show');
            modal_editar_contrato(id);

        }
        if(rbSalaVenta.checked == true){

            rbSalaVenta.checked = false;
            $('#modalEditarSalaVentas').modal('show');
            modal_editar_sala_ventas(id);

        }
        if(rbPiloto.checked == true){

            rbPiloto.checked = false;
            $('#modalEditarPiloto').modal('show');
            modal_editar_piloto(id);

        }
        if(rbMkt.checked == true){

            rbMkt.checked = false;
            $('#modalEditarMkt').modal('show');
            $('#contrato_id_mkt').val(id);

        }
        if(rbAreaTecnica.checked == true){

            rbAreaTecnica.checked = false;
            $('#modalEditarAreaTecnica').modal('show');
            $('#contrato_id_at').val(id);

        }
        if(rbFinanza.checked == true){

            rbFinanza.checked = false;
            $('#modalEditarFinanza').modal('show');
            $('#contrato_id_finanza').val(id);

        }
        if(rbComercial.checked == true){

            rbComercial.checked = false;
            $('#modalEditarComercial').modal('show');
            $('#contrato_id_comercial').val(id);

        }

    }
</script>

<script>

    function ver_drive(){
        var ruta = $('#url_drive').val();

      if(ruta == ''){

        toastr.options = {
          "debug": false,
          "newestOnTop": false,
          "positionClass": "toast-top-center",
          "closeButton": true,
          "toastClass": "animated fadeInDown",
      };
      toastr.error('Error - Proyecto no tiene contrato en Drive');

      }else{

        window.open(ruta, '_blank');
      }



    }

</script>

<script>

  function pruebaPersonalizar(){

    var fecha_desde_prueba = $.trim($('#fecha_inicio_instalacion_personalizado').val());
    var fecha_hasta_prueba = $.trim($('#fecha_fin_instalacion_personalizado').val());
    var viviendas = $.trim($('#total_viviendas_proyectos').val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "reporte_perzonalizado_prueba",
        type: "GET",
        dataType: 'json',
        data: {
            "fecha_inicio":fecha_desde_prueba,
            "fecha_fin":fecha_hasta_prueba,
            "viviendas":viviendas
        },
        success: function(data)
        {
            console.log(data);
        },
        error: function(xhr)
        {
            console.log(xhr.responseText);
        }
    });//Fin ajax

  }

</script>
</body>
</html>
