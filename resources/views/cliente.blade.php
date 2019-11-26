<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page title -->
    <title>TAMED | Inmobiliarias</title>
    <!-- CSRF Token -->
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
                        <li><a href="{{ url('cliente') }}">Buscar cliente</a></li>
                        <li class="active">
                            <span>Clientes</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Información de clientes
                </h2>
                <small>Buscar proyectos de clientes</small>
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
                    Seleccionar inmobiliaria
                </div>
                <div class="panel-body">
                    <div class="">
                        <label for="inmobiliaria">Nombre inmobiliaria</label>
                        <select class="form-control" id="inmobiliaria" name="inmobiliaria">
                            <option value="">-- Seleccione inmobiliaria --</option>
                            @foreach($inmobiliarias as $inmobiliaria)
                                @if($inmobiliaria->estado_id == 6)
                                    <option value="{{$inmobiliaria->id}}">{{$inmobiliaria->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="">
                        <label for="proyectos">Nombre proyecto</label>
                        <select class="form-control" id="proyectos" name="proyectos">
                            <option value=""></option>
                        </select>
                    </div>
                    <br>
                    <div class="">
                        <label for="nombreCliente">Buscar por nombre cliente</label>
                        <input type="text" name="nombreCliente" id="nombreCliente" class="form-control">
                    </div>
                    <br>
                    <div>
                        <!--a href="" class="btn btn-primary" id="buscarProyecto">Buscar Proyectos.</a-->
                        <button type="button" class="btn btn-primary" id="buscarProyecto">Buscar</button>
                    </div>
                    <div class="col-md-6">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            <p class="text-center"><strong>{{ session('success') }}</strong></p>
                        </div>
                    @elseif (session('errors'))
                        <div class="alert alert-danger" role="alert">
                            <p class="text-center"><strong>{{ session('errors') }}</strong></p>
                        </div>
                    @endif
                	</div>
                </div>
            </div>

            <div class="hpanel" id="div1" hidden="true">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    <span class="text-dark"><strong>Listado de clientes</strong></span> <br> <span class="text-dark"><strong>Cantidad de viviendas: </strong><strong class="text-danger" id="totalClientes"></strong></span> | <span class="text-dark"><strong>Fecha inicio de instalación: </strong><strong class="text-danger" id="fecha_inicio_instalacion"></strong></span> | <span class="text-dark"><strong>total de clientes: </strong></span><span><strong class="text-danger" id="totalClientesCap"></strong></span> | <span class="text-dark"><strong>total instalados y capacitados: </strong></span><span><strong class="text-danger" id="totalClientesInsCap"></strong></span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered">
                            <div id="demo2" class="collapse">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?php
                                            foreach($estados as $estado){
                                                if($estado->id === 0 || $estado->id === 1 || $estado->id === 2 || $estado->id === 3 || $estado->id === 4 || $estado->id === 5 || $estado->id === 8 || $estado->id === 9 || $estado->id === 10){
                                                    $estadoSinId = 5;
                                                    $estadoSinNombre = 'Sin Información';
                                                    $estadoNoConId = 2;
                                                    $estadoNoConNombre = 'No Contactado';
                                                    $estadoConId = 1;
                                                    $estadoConNombre = 'Contactado';
                                                    $estadoAgId = 4;
                                                    $estadoAgNombre = 'Agendado';
                                                    $estadoInsId = 3;
                                                    $estadoInsNombre = 'Instalado';
                                                    $estadoCapId = 9;
                                                    $estadoCapNombre = 'Capacitado';
                                                    $estadoPenId = 10;
                                                    $estadoPenNombre = 'Con observación';
                                                    $estadoInsCapId = 8;
                                                    $estadoInsCapNombre = 'Instalado y Capacitado';
                                                }
                                            }
                                        ?>
                                        <select class="form-control" id="estado" name="estado">
                                            <option value="0" selected>Todos</option>
                                            <option value="<?php echo $estadoSinId; ?>"><?php echo $estadoSinNombre; ?></option>
                                            <option value="<?php echo $estadoNoConId; ?>"><?php echo $estadoNoConNombre; ?></option>
                                            <option value="<?php echo $estadoConId; ?>"><?php echo $estadoConNombre; ?></option>
                                            <option value="<?php echo $estadoAgId; ?>"><?php echo $estadoAgNombre; ?></option>
                                            <option value="<?php echo $estadoInsId; ?>"><?php echo $estadoInsNombre; ?></option>
                                            <!--option value="<?php //echo $estadoCapId; ?>"><?php //echo $estadoCapNombre; ?></option-->
                                            <option value="<?php echo $estadoPenId; ?>"><?php echo $estadoPenNombre; ?></option>
                                            <option value="<?php echo $estadoInsCapId; ?>"><?php echo $estadoInsCapNombre; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-sm btn-success" id="filtrar">Filtrar Busqueda</button>
                                        <button class="btn btn-sm btn-info" id="verInventario">Ver Inventario</button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <thead>
				                <tr>
                                    <th>Acción</th>
				                    <th>Dirección</th>
				                    <th>Nombre</th>
				                    <th>Teléfono1</th>
				                    <th>EMail</th>
				                    <th>Estado</th>
                                    <th>Observación</th>
                                    <th>Agregar PDF</th>
                                    <th>Ver PDF</th>
                                    <th>Orden de <br> Trabajo</th>
                                    <th>Visitas</th>
				                </tr>
                			</thead>
                			<tbody id="listadoProyectos">
                			</tbody>
                		</table>
                	</div>
                </div>
            </div>

            <div class="hpanel" id="div2" hidden="true">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Appellido</th>
                                    <th>Inmobiliaria</th>
                                    <th>Proyecto</th>
                                    <th>Dirección</th>
                                    <th>Teléfono1</th>
                                    <th>EMail</th>
                                    <th>Observación</th>
                                    <th>Protocolo</th>
                                </tr>
                            </thead>
                            <tbody id="listadoClientes">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-md-6" id="columnchart_material" style="width: 50%; height: 400px;">
        </div>
        <div class="col-md-6" id="columnchart_material2" style="width: 50%; height: 400px;">

        </div>
    </div>

<div class="modal fade" id="" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">Seleccionar Protocolo</h4>
            </div>
            <div class="modal-body" id="protocoloPdf">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div><!-- Fin Modal Editar -->

<div class="text-center">
    <div class="modal fade" id="modalProtocolo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header text-center">
                    <h4 class="modal-title">Subir PDF Protocolo</h4>
                    <small class="font-bold">Adjunte el archivo PDF Protocolo del cliente para subir.</small>
                    <center><img id="loading_pdf" style="display: none;" src="images/loading_pdf.gif" class="img-responsive"></center>
                </div>
                <div class="modal-body">
                    <form id="form_pdf_protocolo" enctype="multipart/form-data">
                        <input type="hidden" id="idPdfProtocolo" name="idPdfProtocolo">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group m-b">
                                    <span class="input-group-addon"><i class="pe-7s-paperclip"></i></span>
                                    <input type="file" class="form-control" id="inputPdfProtocolo" name="inputPdfProtocolo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-info btn-block btn-lg" id="subirPdfProtocolo"><i class="fa fa-upload"></i> <span class="bold">Subir PDF Protocolo</span></button>
                                    <!--input type="submit" class="btn btn-info btn-block btn-lg" id="subirPdfProtocolo"><i class="fa fa-upload"></i> <span class="bold">Subir PDF Protocolo</span-->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Generar orden trabajo -->
<div class="modal fade" id="modalCrearOrdenTrabajo" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg3">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <center>
                    <h4 class="modal-title">ORDEN DE TRABAJO</h4>
                </center>
            </div>
            <div class="modal-body" id="">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <form id="form_contrato">
                                <div class="col-md-10 col-md-offset-1">
                                    <h4 class="text-info">1. Datos Generales</h4>
                                    <input class="form-control" name="txtClienteIdOrden" id="txtClienteIdOrden" placeholder="" type="hidden">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="txtFechaOrden">Fecha</label>
                                                <div class="input-group date" id="datetimepicker4">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                    <input type="text" class="form-control" id="txtFechaOrden" name="txtFechaOrden">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="txtHoraPautadaOrden">Hora Pautada</label>
                                                <input type="time" class="form-control" name="txtHoraPautadaOrden" id="txtHoraPautadaOrden" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="cmbResponsableAsignadoOrden">Responsable Asignado</label>
                                                <select class="form-control" id="cmbResponsableAsignadoOrden" name="cmbResponsableAsignadoOrden">
                                                    <option value="">-- Seleccione Instalador --</option>
                                                    @foreach($instaladores as $instalador)
                                                        <option value="{{$instalador->id}}">{{$instalador->nombre_instalador}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-md-9">
                                    		<div class="form-group">
                                    		    <label class="control-label" for="cmbTipoOrden">Tipo de Orden</label>
                                    		    <select class="form-control" id="cmbTipoOrden" name="cmbTipoOrden">
                                    		        <option value="Instalacion">Instalación</option>
                                    		        <option value="Soporte">Soporte</option>
                                    		        <option value="Levantamiento">Levantamiento</option>
                                    		        <option value="capacitacion">Capacitación</option>
                                    		    </select>
                                    		</div>
                                    	</div>
                                    	<div class="col-md-3">
                                    		<div class="form-group">
                                                <label class="control-label" for="txtNroOrden">Nro. </label>
                                                <input type="text" class="form-control" name="txtNroOrden" id="txtNroOrden" placeholder="" readonly="true">
                                    		</div>
                                    	</div>
                                    </div>
                                    <hr style="border-color: #FFF;">
                                    <h4 class="text-info">2. Antecedentes del Cliente</h4>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="control-label" for="txtNombreClienteOrden">Nombre Cliente</label>
                                                <input type="text" class="form-control" name="txtNombreClienteOrden" id="txtNombreClienteOrden" placeholder="" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="txtConteoVisitasOrden">Visitas Anteriores</label>
                                                <input type="number" class="form-control" name="txtConteoVisitasOrden" id="txtConteoVisitasOrden" placeholder="" readonly="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="txtDireccionClienteOrden">Dirección</label>
                                        <input type="text" class="form-control" name="txtDireccionClienteOrden" id="txtDireccionClienteOrden" placeholder="" readonly="true">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="cmbResponsableUltimaVisita">Responsable Ultima Visita</label>
                                                <select class="form-control" id="cmbResponsableUltimaVisita" name="cmbResponsableUltimaVisita">
                                                    <option value="">-- Seleccione Instalador --</option>
                                                    @foreach($instaladores as $instalador)
                                                        <option value="{{$instalador->id}}">{{$instalador->nombre_instalador}}</option>
                                                    @endforeach
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="cmbCodigoInterno">Código Interno</label>
                                                <select class="form-control" id="cmbCodigoInterno" name="cmbCodigoInterno">
                                                    <option value="A1">A1</option>
                                                    <option value="A2">A2</option>
                                                    <option value="A3">A3</option>
                                                    <option value="A4">A4</option>
                                                    <option value="A5">A5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="control-label">Condición de Instalación</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="checkbox" name="chkObraGrueza" id="chkObraGrueza"> Obra Gruesa<br>
                                            <input type="checkbox" name="chkMudanza" id="chkMudanza"> Mudanza<br>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="chkTerminacionesMenores" id="chkTerminacionesMenores"> Terminaciones Menores<br>
                                            <input type="checkbox" name="chkHabitada" id="chkHabitada">Habitada<br>
                                        </div>
                                    </div>
                                    <div class="row">
                    				    <div class="col-md-6">
                                    		<hr style="border-color: #FFF;">
                                    		<h4 class="text-info">3. Materiales a Utilizar</h4>
                    				    </div>
                    				    <div class="col-md-6" style="text-align: right;">
                    				    	<hr style="border-color: #FFF;">
                    				        <button type="button" class="btn btn-success" id="btnNuevoMaterial">Nuevo</button>
                    				    </div>
                    				</div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            	<hr style="border-color: #FFF;">
                                                <label class="control-label" for="txtDescripcionMaterial1">Descripción</label>
                                                <input type="text" class="form-control" name="txtDescripcionMaterial1" id="txtDescripcionMaterial1" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            	<hr style="border-color: #FFF;">
                                                <label class="control-label" for="cmbUnidadMaterial">Unidad</label>
                                                <select class="form-control" id="cmbUnidadMaterial" name="cmbUnidadMaterial">
                                                    <option value=""></option>
                                                    <option value="metros">Metros</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            	<hr style="border-color: #FFF;">
                                                <label class="control-label" for="txtCantidadMaterial1">Cantidades</label>
                                                <input type="number" class="form-control" name="txtCantidadMaterial1" id="txtCantidadMaterial1" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="nuevos_materiales" class="row"></div>
                                    <hr style="border-color: #FFF;">
                                    <h4 class="text-info">4. Descripción de Actividades</h4>
                                    <div class="form-group">
                                    	<label calss="form-control" for="txtObservacionesVisitasAnteriores">Observaciones Visitas Anteriores</label>
                                    	<textarea rows="5" cols="108" wrap="soft" id="txtObservacionesVisitasAnteriores" name="txtObservacionesVisitasAnteriores" style="resize:none;"></textarea>
                                    	<hr style="border-color: #FFF;">
                                    </div>
                                     <div class="row">
                    				    <div class="col-md-6">
                                    		<h4>Actividades a Realizar</h4>
                    				    </div>
                    				    <div class="col-md-6" style="text-align: right;">
                       				        <button type="button" class="btn btn-success" id="btnNuevaActividad">Nueva</button>
                    				    </div>
                    				</div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            	<hr style="border-color: #FFF;">
                                                <label class="control-label" for="txtActividad1">Actividad</label>
                                                <textarea rows="3" cols="108" wrap="soft" id="txtActividad1" name="txtActividad1" style="resize:none;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="nuevas_actividades"></div>
                                </div><!-- Fin Offset inputs -->
                            </form><!-- Fin Formulario Contrato -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info" id="btnGuardarOrden" >Guardar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>


<!-- Modal Ver orden trabajo -->
<div class="modal fade" id="modalVerOrden" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg3">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <center>
                    <h4 class="modal-title">ORDEN DE TRABAJO</h4>
                </center>
            </div>
            <div class="modal-body" id="">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <form id="form_contrato">
                                <div class="col-md-10 col-md-offset-1">
                                    <input type="hidden" id="idOrdenVer" name="idOrdenVer">
                                    <h4 class="text-info">1. Datos Generales</h4>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="txtFechaOrdenVer">Fecha</label>
                                                <input type="text" class="form-control" id="txtFechaOrdenVer" name="txtFechaOrdenVer">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="txtHoraPautadaOrdenVer">Hora Pautada</label>
                                                <input type="time" class="form-control" name="txtHoraPautadaOrdenVer" id="txtHoraPautadaOrdenVer">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="cmbResponsableAsignadoOrdenVer">Responsable Asignado</label>
                                                <select class="form-control" id="cmbResponsableAsignadoOrdenVer" name="cmbResponsableAsignadoOrdenVer">
                                                    <option value="" id="opcionResponsableAsignadoOrdenVer"></option>
                                                    @foreach($instaladores as $instalador)
                                                        <option value="{{$instalador->id}}">{{$instalador->nombre_instalador}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="control-label" for="cmdTipoOrdenVer">Tipo de Orden</label>
                                                <select class="form-control" id="cmdTipoOrdenVer" name="cmdTipoOrdenVer">
                                                    <option value="" id="opcionTipoOrdenVer"></option>
                                                    <option value="Instalacion">Instalación</option>
                                                    <option value="Soporte">Soporte</option>
                                                    <option value="Levantamiento">Levantamiento</option>
                                                    <option value="Capacitacion">Capacitación</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="txtNroOrdenVer">Nro. </label>
                                                <input type="text" class="form-control" name="txtNroOrdenVer" id="txtNroOrdenVer" placeholder="" readonly="true">
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="border-color: #FFF;">
                                    <h4 class="text-info">2. Antecedentes del Cliente</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="txtNombreClienteOrdenVer">Nombre Cliente</label>
                                                <input type="text" class="form-control" name="txtNombreClienteOrdenVer" id="txtNombreClienteOrdenVer" placeholder="" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="txtDireccionClienteOrdenVer">Dirección</label>
                                                <input type="text" class="form-control" name="txtDireccionClienteOrdenVer" id="txtDireccionClienteOrdenVer" placeholder="" readonly="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="cmbResponsableUltimaVisitaVer">Responsable Ultima Visita</label>
                                                <select class="form-control" id="cmbResponsableUltimaVisitaVer" name="cmbResponsableUltimaVisitaVer">
                                                    <option value="" id="opcionResponsableUltimaOrdenVer"></option>
                                                    @foreach($instaladores as $instalador)
                                                        <option value="{{$instalador->id}}">{{$instalador->nombre_instalador}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="cmbCodigoInternoVer">Código Interno</label>
                                                <select class="form-control" id="cmbCodigoInternoVer" name="cmbCodigoInternoVer">
                                                    <option value="" id="opcionCodigoInternoVer"></option>
                                                    <option value="A1">A1</option>
                                                    <option value="A2">A2</option>
                                                    <option value="A3">A3</option>
                                                    <option value="A4">A4</option>
                                                    <option value="A5">A5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="control-label">Condición de Instalación</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="checkbox" name="chkObraGruezaVer" id="chkObraGruezaVer"> Obra Gruesa<br>
                                            <input type="checkbox" name="chkMudanzaVer" id="chkMudanzaVer"> Mudanza<br>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="chkTerminacionesMenoresVer" id="chkTerminacionesMenoresVer"> Terminaciones Menores<br>
                                            <input type="checkbox" name="chkHabitadaVer" id="chkHabitadaVer">Habitada<br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <hr style="border-color: #FFF;">
                                            <h4 class="text-info">3. Materiales a Utilizar</h4>
                                            <br>
                                        </div>
                                        <div class="col-md-6" style="text-align: right;">
                                            <hr style="border-color: #FFF;">
                                            <button type="button" class="btn btn-success" id="btnNuevoMaterialVer">Nuevo</button>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row" id="materialesUtilizarVer">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="">
                                                    <thead>
                                                        <tr>
                                                            <th>Material</th>
                                                            <th>Unidad</th>
                                                            <th>Cantidad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbMateriales">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="nuevos_materiales_ver" class="row"></div>
                                    <hr style="border-color: #FFF;">
                                    <h4 class="text-info">4. Descripción de Actividades</h4>
                                    <div class="form-group">
                                        <label calss="form-control" for="txtObservacionesVisitasAnterioresVer">Observaciones Visitas Anteriores</label>
                                        <textarea rows="5" cols="108" wrap="soft" id="txtObservacionesVisitasAnterioresVer" name="txtObservacionesVisitasAnterioresVer" style="resize:none;" readonly="true"></textarea>
                                        <hr style="border-color: #FFF;">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Actividades a Realizar</h4>
                                            <br>
                                        </div>
                                        <div class="col-md-6" style="text-align: right;">
                                            <button type="button" class="btn btn-success" id="btnNuevaActividadVer">Nueva</button>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="">
                                                    <thead>
                                                        <tr>
                                                            <th>Actividad</th>
                                                            <th>Observacion</th>
                                                            <th>Ejecutado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbActividades">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="nuevas_actividades_ver"></div>
                                    <div class="row">
                                       <hr style="border-color: #FFF;">
                                       <div class="col-md-6">
                                           <h4 class="text-info">5. Reporte de Fallas</h4>
                                       </div>
                                    </div>
                                    <div class="row" id="nuevoReporteFallaVer">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="">
                                                    <thead>
                                                        <tr>
                                                            <th>Producto/Servicio Falla</th>
                                                            <th>Descripcion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbFallas"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Fin Offset inputs -->
                            </form><!-- Fin Formulario Contrato -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-default" id="btnEditarOrden">Guardar Cambios</button>
        </div>
    </div>
</div>

<!-- Modal Acciones Orden -->
<div class="text-center">
    <div class="modal fade" id="modalListadoOrden" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header text-center">
                    <h4 class="modal-title">Acciones Orden de Trabajo</h4>
                    <small class="font-bold">Acciones Orden de Trabajo.</small>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="txtIdClienteAccionOrden">
                    <form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Fecha Pautada</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody id="tabla_listado_ordenes_cliente"></tbody>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ver listado PDF Protocolo -->
<div class="text-center">
    <div class="modal fade" id="modalListadoPdfProtocolo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header text-center">
                    <h4 class="modal-title">Listado PDF Protocolo Cliente</h4>
                    <small class="font-bold">Listado de los PDF protocolos del cliente.</small>
                </div>
                <div class="modal-body">
                    <form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>PDF</th>
                                    <th>Nombre</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody id="tabla_listado_pdf_cliente">
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
            	<h4 class="modal-title">Editar datos de cliente</h4>
               	<small class="font-bold">Formulario para editar datos de cliente.</small>
            </div>
            <div class="modal-body" id="listadoCliente">
           	</div>
            <div class="modal-footer">
           		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnActualizarCliente">Guardar cambios</button>
           	</div>
        </div>
    </div>
</div><!-- Fin Modal Editar -->


<!-- INICIO MODAL INFORME POR PROYECTOS -->
<div class="modal fade" id="modalInformeProyecto" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg3">
        <div class="modal-content">
            <div class="color-line"></div>
                <div class="modal-header">
                    <h4 class="modal-title" id="titulo_informe"></h4>
                        <small class="font-bold">Resumen de informes por proyectos.</small>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>Por contrato:</h4><br>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Fecha inicio de instalación:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="fecha_inicio_instalacion_inventario"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Fecha termino de instalación:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="fecha_termino_instalacion"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Cantidad de viviendas por contrato:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="cantidad_viviendas"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>Seguimiento:</h4><br>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Total instalados:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="cantidad_clientes_ins"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Total instalados y capacitados:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="cantidad_ins_cap"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Fecha real de instalación:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="fecha_real_instalacion"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Fecha real termino de instalación:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="fecha_real_termino"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Restantes por instalar:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="cantidad_restantes"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h4>Listado de productos</h4>
                            <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="tabla_inventario_productos_proyecto">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Tiempo de instalación<br> en horas</th>
                                        <th>Tiempo de configuración<br> en horas</th>
                                        <th>Total</th>
                                        <th>Productos faltantes<br> por instalar</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla_informe_proyectos">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <p class="pull-right"><strong>Cantidad de productos: </strong><span id="cantidad_productos"></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <p class="pull-right"><strong>Total: </strong><span id="suma_total"></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>
<!-- INICIO MODAL INFORME POR PROYECTOS -->

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
<!-- DataTables -->
<script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- DateSpicker -->
<script src="{{ asset('vendor/moment/moment.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/toastr/build/toastr.min.js') }}"></script>
<!-- DataTables buttons scripts -->
<script src="{{ asset('vendor/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendor/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<!-- App scripts -->
<script src="{{ asset('scripts/homer.js') }}"></script>

<!-- Ver Inventario -->
<script>
$(document).ready(function(){



	$('#datetimepicker4').datepicker();
	var contadorMateriales = 1;
	var contadorActividades = 1;
	var contadorReporteFallo = 1;
	var contadorMaterialesVer = 0;
	var contadorActividadesVer = 0;
	var arrayMaterialesUtilizados = new Array();
	var arrayActividades = new Array();
	var arrayReporteFalla = new Array();
	var arrayNuevasActividades = new Array();
	var arrayNuevosMateriales = new Array();
	var comprobarReportes = "";
	var comprobarActividades = "";
	var comprobarActividadesPendientes = 0;
	var comprobarMateriales = "";
	var comprobarCamposVaciosActividades = "";
	var comprobarCamposVaciosFallas = "";

	function limpiarCamposOrdenTrabajo(){

		$('#txtFechaOrden').val("");
		$('#txtHoraPautadaOrden').val("");
		var myDDL = $('#cmbResponsableAsignadoOrden');
		myDDL[0].selectedIndex = 0;
		var myDDL2 = $('#cmbTipoOrden');
		myDDL2[0].selectedIndex = 0;
		var myDDL3 = $('#cmbResponsableUltimaVisita');
		myDDL3[0].selectedIndex = 0;
   	 	var myDDL4 = $('#cmbCodigoInterno');
		myDDL4[0].selectedIndex = 0;

		var chkHabitadadesactivar = document.getElementById('chkHabitada');
		chkHabitadadesactivar.checked = false;
		var chkObragruesadesactivar = document.getElementById('chkObraGrueza');
		chkObragruesadesactivar.checked = false;
		var chkTMdesactivar = document.getElementById('chkTerminacionesMenores');
		chkTMdesactivar.checked = false;
		var chkMudanzadesactivar = document.getElementById('chkMudanza');
		chkMudanzadesactivar.checked = false;


		$('#txtDescripcionMaterial1').val("");
		$('#txtUnidadMaterial1').val("");
		$('#txtCantidadMaterial1').val("");
		$('#txtObservacionesVisitasAnteriores').val("");
		$('#txtActividad1').val("");
		$('#txtObservacionActividad1').val("");
		$('#chkEjecutadoActividad1').cheked = false;
		$('#txtActividadPendiente1').val("");
		$('#txtMotivoPendiente1').val("");
		$('#txtproductoServicioFalla1').val("");
		$('#txtDescripcionFalla1').val("");
		//$('#txtRequerimientosAdicionales').val("");
		$('#nuevos_materiales').empty();
		$('#nuevas_actividades').empty();
		$('#nuevo_reporte_falla').empty();
		contadorActividades = 1;
		contadorReporteFallo = 1;
		contadorMateriales = 1;
		comprobarActividades = "";
		comprobarMateriales = "";
		comprobarActividadesPendientes = 0;

	}

	$('#btnNuevoMaterial').on('click',function(e){

		contadorMateriales = contadorMateriales + 1;

		$('#nuevos_materiales').append( '<div class="col-md-6">'+
                                            '<div class="form-group">'+
                                                '<input type="text" class="form-control" name="txtDescripcionMaterial'+contadorMateriales+'" id="txtDescripcionMaterial'+contadorMateriales+'" placeholder="">'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-3">'+
                                            '<div class="form-group">'+
                                                '<select class="form-control" id="cmbUnidadMaterial'+contadorMateriales+'" name="cmbUnidadMaterial'+contadorMateriales+'">'+
                                                    '<option value=""></option>'+
                                                    '<option value="metros">Metros</option>'+
                                                '</select>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-3">'+
                                            '<div class="form-group">'+
                                                '<input type="number" class="form-control" name="txtCantidadMaterial'+contadorMateriales+'" id="txtCantidadMaterial'+contadorMateriales+'" placeholder="">'+
                                            '</div>'+
                                        '</div>'
                                        );

	});

	$('#btnNuevaActividad').on('click',function(e){

		contadorActividades = contadorActividades + 1;

		$('#nuevas_actividades').append('<div class="col-md-12">'+
                                            '<div class="form-group">'+
                                                '<textarea rows="3" cols="108" wrap="soft" id="txtActividad'+contadorActividades+'" name="txtActividad'+contadorActividades+'" style="resize:none;"></textarea>'+
                                            '</div>'+
                                        '</div>');

	});


	$('#modalCrearOrdenTrabajo').on('hidden.bs.modal', function (e) {

        limpiarCamposOrdenTrabajo();

    });

    $('#modalListadoOrden').on('hidden.bs.modal', function (e) {

        $('#modalVerOrden').modal('show');


    });

    $('#modalVerOrden').on('hidden.bs.modal', function (e) {

        $('#tbTipo').empty();
        $('#tbFallas').empty();
        $('#tbActividades').empty();
        $('#tbMateriales').empty();
        $('#nuevos_materiales_ver').empty();
        $('#nuevas_actividades_ver').empty();
        contadorMaterialesVer = 0;
		contadorActividadesVer = 0;


    });

	$('#btnGuardarOrden').on('click', function(e){

		arrayMaterialesUtilizados = [];
		var i;


		if(arrayMaterialesUtilizados.length < 1 ){

			for (i = 1; i <= contadorMateriales; i++) {



	            item = {}
	            item ["descripcion"] = $.trim($('#txtDescripcionMaterial'+i).val());
	            item ["unidades"] = $('#cmbUnidadMaterial'+i).find(':selected').text();
	            item ["cantidades"] = $.trim($('#txtCantidadMaterial'+i).val());
	            arrayMaterialesUtilizados.push(item);

			}

		}else {

			console.log('no se pudo guardar materiales');

        }//Fin else

        if(arrayMaterialesUtilizados[0].descripcion == "" && arrayMaterialesUtilizados[0].unidades == "" && arrayMaterialesUtilizados[0].cantidades == ""){
        	comprobarMateriales = "no"
        }

        arrayActividades = [];
        comprobarActividadesPendientes = 0;
        comprobarActividades = "";
        comprobarCamposVaciosActividades = "";
        var m;
        var obs;
        var act;
        var act2;
        var eje;

        if(arrayActividades.length < 1 ){

			for (m = 1; m <= contadorActividades; m++) {

					item1 = {}
	           		item1 ["actividad"] = $.trim($('#txtActividad'+m).val());
	           		item1 ["observacion"] = null;//$.trim($('#txtObservacionActividad'+m).val());
	           		item1 ["ejecutado"] = "NO"//"SI";
	           		arrayActividades.push(item1);

			}

	   		if(arrayActividades[0].actividad == "" && arrayActividades[0].observacion == null && arrayActividades[0].ejecutado == null){
       			comprobarActividades = "no"
       		}

		}else {

			console.log('no se pudo guardar actividades');

        }//Fin else

        var fechaPautada = $.trim($('#txtFechaOrden').val());
        var horaPautada = $.trim($('#txtHoraPautadaOrden').val());
        var responsableAsignado = $('#cmbResponsableAsignadoOrden').find(':selected').val();
        var tipoOrden = $('#cmbTipoOrden').find(':selected').text();
        var nombreCliente = $.trim($('#txtNombreClienteOrden').val());
        var direccionClienteOrden = $.trim($('#txtDireccionClienteOrden').val());
        var responsableUltimaVisita = $('#cmbResponsableUltimaVisita').find(':selected').val();
        var codigoInterno = $('#cmbCodigoInterno').find(':selected').val();

		var chkHabitada 			= document.getElementById('chkHabitada');
		var chkObraGrueza			= document.getElementById('chkObraGrueza');
		var chkMudanza	 		    = document.getElementById('chkMudanza');
		var chkTerminacionesMenores = document.getElementById('chkTerminacionesMenores');


		var chkHabitadaEstado 	= "";
		var chkObraGruezaEstado	= "";
		var chkMudanzaEstado	= "";
		var chkTerminacionesMenoresEstado = "";

		if(chkHabitada.checked){

			chkHabitadaEstado = "SI";

		}else{

			chkHabitadaEstado = "NO";

		}
		if(chkObraGrueza.checked){

			chkObraGruezaEstado = "SI";

		}else{

			chkObraGruezaEstado = "NO";

		}
		if(chkMudanza.checked){

			chkMudanzaEstado = "SI";

		}else{

			chkMudanzaEstado = "NO";

		}
		if(chkTerminacionesMenores.checked){

			chkTerminacionesMenoresEstado = "SI";

		}else{

			chkTerminacionesMenoresEstado = "NO";

		}
        var observacionesVisitaAnterior = $.trim($('#txtObservacionesVisitasAnteriores').val());
        //var requerimientosAdicionales = $.trim($('#txtRequerimientosAdicionales').val());
        var numero_orden = $.trim($('#txtNroOrden').val());
        var cliente_id_orden = $.trim($('#txtClienteIdOrden').val());



        $.ajax({
            url: "agregar_orden",
            type: "POST",
            dataType: 'json',
            data: {

                "fecha_pautada": fechaPautada,
                "hora_pautada": horaPautada,
                "tipo_trabajo": tipoOrden,
                "responsable_asignado" : responsableAsignado,
                "numero_orden" : numero_orden,
                "nombre_cliente" : nombreCliente,
                "direccion_cliente" : direccionClienteOrden,
                "responsable_ultima_visita" : responsableUltimaVisita,
                "codigo_interno" : codigoInterno,
                "obra_gruesa" : chkObraGruezaEstado,
                "mudanza" : chkMudanzaEstado,
                "terminaciones_menores" : chkTerminacionesMenoresEstado,
                "habitada" : chkHabitadaEstado,
                "observacion_visita_anterior" : observacionesVisitaAnterior,
                "cliente_id" : cliente_id_orden,
                "comprobarReportes" : comprobarReportes,
                "comprobarActividades" : comprobarActividades,
                "comprobarMateriales" : comprobarMateriales,
                "arrayActividades" : arrayActividades,
                //"arrayReporteFalla" : arrayReporteFalla,
                "arrayMaterialesUtilizados" : arrayMaterialesUtilizados

            },
            success: function(data)
            {
              if(data== 1){
                $('#modalCrearOrdenTrabajo').modal('hide');
                  toastr.options = {
                      "debug": false,
                      "newestOnTop": false,
                      "positionClass": "toast-top-center",
                      "closeButton": true,
                      "toastClass": "animated fadeInDown",
                  };
                  toastr.success('Orden generada correctamente.');

              }
              console.log(data);
            },
            error: function(xhr)
            {
                console.log(xhr.responseText);
            }
        });//Fin ajax
        //}

	});

	//TODAS LAS FUNCIONES MODAL EDITAR
	$('#btnNuevoMaterialVer').on('click',function(e){

			contadorMaterialesVer = contadorMaterialesVer + 1;

			if(contadorMaterialesVer == 1){

				$('#nuevos_materiales_ver').append( '<div class="col-md-6">'+
   	                       							     '<div class="form-group">'+
   	                       							     	 '<label class="control-label" for="txtDescripcionMaterialVer1">Descripción</label>'+
   	                       							         '<input type="text" class="form-control" name="txtDescripcionMaterialVer'+contadorMaterialesVer+'" id="txtDescripcionMaterialVer'+contadorMaterialesVer+'" placeholder="">'+
   	                       							      '</div>'+
   	                       							  '</div>'+
   	                       							  '<div class="col-md-3">'+
   	                       							      '<div class="form-group">'+
   	                       							      	  '<label class="control-label" for="cmbUnidadMaterialVer1">Unidad</label>'+
   	                       							          '<select class="form-control" id="cmbUnidadMaterialVer'+contadorMaterialesVer+'" name="cmbUnidadMaterialVer'+contadorMaterialesVer+'">'+
   	                       							              '<option value=""></option>'+
   	                       							              '<option value="metros">Metros</option>'+
   	                       							          '</select>'+
   	                       							      '</div>'+
   	                       							  '</div>'+
   	                       							  '<div class="col-md-3">'+
   	                       							      '<div class="form-group">'+
   	                       							      	  '<label class="control-label" for="txtCantidadMaterialVer1">Cantidad</label>'+
   	                       							          '<input type="number" class="form-control" name="txtCantidadMaterialVer'+contadorMaterialesVer+'" id="txtCantidadMaterialVer'+contadorMaterialesVer+'" placeholder="">'+
                           							     '</div>'+
                           							 '</div>'
                             );

			}else{

				$('#nuevos_materiales_ver').append( '<div class="col-md-6">'+
   	                       							     '<div class="form-group">'+
   	                       							         '<input type="text" class="form-control" name="txtDescripcionMaterialVer'+contadorMaterialesVer+'" id="txtDescripcionMaterialVer'+contadorMaterialesVer+'" placeholder="">'+
   	                       							      '</div>'+
   	                       							  '</div>'+
   	                       							  '<div class="col-md-3">'+
   	                       							      '<div class="form-group">'+
   	                       							          '<select class="form-control" id="cmbUnidadMaterialVer'+contadorMaterialesVer+'" name="cmbUnidadMaterialVer'+contadorMaterialesVer+'">'+
   	                       							              '<option value=""></option>'+
   	                       							              '<option value="metros">Metros</option>'+
   	                       							          '</select>'+
   	                       							      '</div>'+
   	                       							  '</div>'+
   	                       							  '<div class="col-md-3">'+
   	                       							      '<div class="form-group">'+
   	                       							          '<input type="number" class="form-control" name="txtCantidadMaterialVer'+contadorMaterialesVer+'" id="txtCantidadMaterialVer'+contadorMaterialesVer+'" placeholder="">'+
                           							     '</div>'+
                           							 '</div>'
                             );


			}



		});

	$('#btnNuevaActividadVer').on('click',function(e){

		contadorActividadesVer = contadorActividadesVer + 1;

		if(contadorActividadesVer == 1){

			$('#nuevas_actividades_ver').append('<div class="col-md-12">'+
    		                                	    '<div class="form-group">'+
   	                       							    '<label class="control-label" for="txtActividad1">Actividad</label>'+
    		                                	        '<textarea rows="3" cols="108" wrap="soft" id="txtActividadVer'+contadorActividadesVer+'" name="txtActividadVer'+contadorActividadesVer+'" style="resize:none;"></textarea>'+
    		                                	    '</div>'+
    		                                	'</div>');

		}else{


			$('#nuevas_actividades_ver').append('<div class="col-md-12">'+
    		                                	    '<div class="form-group">'+
    		                                	        '<textarea rows="3" cols="108" wrap="soft" id="txtActividadVer'+contadorActividadesVer+'" name="txtActividadVer'+contadorActividadesVer+'" style="resize:none;"></textarea>'+
    		                                	    '</div>'+
    		                                	'</div>');

		}

	});

	$('#btnEditarOrden').on('click', function(e){

		var nuevaFechaOrden = $.trim($('#txtFechaOrdenVer').val());
		var nuevaHoraOrden = $.trim($('#txtHoraPautadaOrdenVer').val());
		var nuevoResponableAsignado = $('#cmbResponsableAsignadoOrdenVer').find(':selected').val();
		var nuevoTipoOrden = $('#cmdTipoOrdenVer').find(':selected').val();
		var nuevoResponsableUltimaVisita = $('#cmbResponsableUltimaVisitaVer').find(':selected').val();
		var nuevoCodigoInterno = $('#cmbCodigoInternoVer').find(':selected').val();
		var id_orden = $.trim($('#idOrdenVer').val());

		if(chkTerminacionesMenoresVer.checked){

			var nuevaCondicionInstalacionTM = "SI";

		}else{

			var nuevaCondicionInstalacionTM = "NO";

		}
		if(chkObraGruezaVer.checked){

			var nuevaCondicionInstalacionOG = "SI";

		}else{

			var nuevaCondicionInstalacionOG = "NO";

		}
		if(chkMudanzaVer.checked){

			var nuevaCondicionInstalacionM = "SI";

		}else{

			var nuevaCondicionInstalacionM = "NO";

		}
		if(chkHabitadaVer.checked){

			var nuevaCondicionInstalacionH = "SI";

		}else{

			var nuevaCondicionInstalacionH = "NO";

		}


		arrayNuevasActividades = [];
        comprobarActividadesPendientes = 0;
        comprobarCamposVaciosActividades = "";
        var m;

        if(contadorActividadesVer > 0){

       		if(arrayNuevasActividades.length < 1 ){

				for (m = 1; m <= contadorActividadesVer; m++) {

						item1 = {}
	    	       		item1 ["actividad"] = $.trim($('#txtActividadVer'+m).val());
	    	       		item1 ["observacion"] = null;//$.trim($('#txtObservacionActividad'+m).val());
	    	       		item1 ["ejecutado"] = "NO"//"SI";
	    	       		arrayNuevasActividades.push(item1);

				}

			}else {

				console.log('no se pudo guardar actividades');

        	}//Fin else

        }

        arrayNuevosMateriales = [];
        var l;

        if(contadorMaterialesVer > 0){

       		if(arrayNuevosMateriales.length < 1 ){

				for (l = 1; l <= contadorMaterialesVer; l++) {

	           		item = {}
	           		item ["descripcion"] = $.trim($('#txtDescripcionMaterialVer'+l).val());
	           		item ["unidades"] = $('#cmbUnidadMaterialVer'+l).find(':selected').text();
	           		item ["cantidades"] = $.trim($('#txtCantidadMaterialVer'+l).val());
	           		arrayNuevosMateriales.push(item);

				}

			}else {

				console.log('no se pudo guardar actividades');

        	}//Fin else

        }

        $.ajax({
            url: "editar_orden/"+id_orden,
            type: "GET",
            dataType: 'json',
            data: {

                "nuevaFechaOrden": nuevaFechaOrden,
                "nuevaHoraOrden": nuevaHoraOrden,
                "nuevoResponableAsignado": nuevoResponableAsignado,
                "nuevoTipoOrden" : nuevoTipoOrden,
                "nuevoResponsableUltimaVisita" : nuevoResponsableUltimaVisita,
                "nuevoCodigoInterno" : nuevoCodigoInterno,
                "nuevaCondicionInstalacionOG" : nuevaCondicionInstalacionOG,
                "nuevaCondicionInstalacionTM" : nuevaCondicionInstalacionTM,
                "nuevaCondicionInstalacionM" : nuevaCondicionInstalacionM,
                "nuevaCondicionInstalacionH" : nuevaCondicionInstalacionH,
                "arrayNuevasActividades" : arrayNuevasActividades,
                //"arrayReporteFalla" : arrayReporteFalla,
                "arrayNuevosMateriales" : arrayNuevosMateriales

            },
            success: function(data)
            {
             if(data== 1){
               $('#modalVerOrden').modal('hide');
                 toastr.options = {
                     "debug": false,
                     "newestOnTop": false,
                     "positionClass": "toast-top-center",
                     "closeButton": true,
                     "toastClass": "animated fadeInDown",
                 };
                 toastr.success('Orden actualizada correctamente.');

             }
              console.log(data);
            },
            error: function(xhr)
            {
                console.log(xhr.responseText);
            }
        });//Fin ajax

	});



    $('#verInventario').on('click', function(e){
        e.preventDefault();
        var id_proyecto = $('#proyectos').find(":selected").val();
        //alert(id_proyecto);

        $('#cantidad_ins_cap').empty();
        $('#cantidad_clientes_ins').empty();
        $('#titulo_informe').empty();
        $('#fecha_inicio_instalacion_inventario').empty();
        $('#fecha_termino_instalacion').empty();
        $('#fecha_real_instalacion').empty();
        $('#fecha_real_termino').empty();
        $('#modalInformeProyecto').modal('show');
        var cantidad_clientes_ins_cap = '';
        var cantidad_clientes_ins = '';
        var get_resto_por_instalar = '';
        var resto_por_instalar = '';

        $.get('informe_proyecto/'+id_proyecto, function(data){
            console.log(data);

            var nombre_inmobiliaria = data['datos_inmobiliaria_proyecto'][0].nombre_inmobiliaria;
            var nombre_proyecto = data['datos_inmobiliaria_proyecto'][0].nombre_proyecto;
            var fecha_inicio_instalacion = data['datos_inmobiliaria_proyecto'][0].fecha_inicio_instalacion;
            var fecha_termino_instalacion = data['datos_inmobiliaria_proyecto'][0].fecha_termino_instalacion;
            var cantidad_viviendas = data['datos_inmobiliaria_proyecto'][0].cantidad;
            var cantidad_ins_cap = data['get_clientes_ins_cap'];
            var fecha_real_instalacion = data['get_fecha_minima_instalacion'];
            var fecha_real_instalacion_ins = data['get_fecha_real_termino_ins'];
            cantidad_clientes_ins_cap = data["cantidad_clientes_ins_cap"];
            cantidad_clientes_ins = data['get_clientes_ins'];

            if(cantidad_viviendas === null){
                $('#cantidad_viviendas').empty().append('no definida');
                $('#cantidad_restantes').empty().append('');
            } else {
                var cantidad_restantes = cantidad_viviendas - (cantidad_ins_cap + cantidad_clientes_ins);
                $('#cantidad_restantes').empty().append(cantidad_restantes);
                $('#cantidad_viviendas').empty().append(cantidad_viviendas);
            }

            $('#cantidad_ins_cap').append(cantidad_ins_cap);
            $('#cantidad_clientes_ins').append(cantidad_clientes_ins);
            $('#titulo_informe').append(nombre_inmobiliaria+' - '+nombre_proyecto);

            if(fecha_inicio_instalacion !== null || fecha_termino_instalacion !== null){
                $('#fecha_inicio_instalacion_inventario').append(fecha_inicio_instalacion.split("-").reverse().join("-"));
                $('#fecha_termino_instalacion').append(fecha_termino_instalacion.split("-").reverse().join("-"));
            } else {
                $('#fecha_inicio_instalacion_inventario').append('no definida');
                $('#fecha_termino_instalacion').append('no definida');
            }

            if(fecha_real_instalacion !== null && fecha_real_instalacion_ins !== null){
                $('#fecha_real_instalacion').append(fecha_real_instalacion.split("-").reverse().join("-"));
                $('#fecha_real_termino').append(fecha_real_instalacion_ins.split("-").reverse().join("-"));
            } else {
                $('#fecha_real_instalacion').append('no definida');
                $('#fecha_real_termino').append('no definida');
            }

            var cantidad_productos = 0;
            var suma_total = 0;

            $('#tabla_informe_proyectos').empty();
            $.each(data['get_inventario'], function(index, value){
                cantidad_productos = value.cantidad + cantidad_productos;
                suma_total = value.total + suma_total;

                get_resto_por_instalar = cantidad_viviendas - (cantidad_clientes_ins_cap + cantidad_clientes_ins);
                resto_por_instalar = get_resto_por_instalar * value.cantidad;

                $('#tabla_informe_proyectos').append(
                    '<tr>'+
                        '<td>'+value.codigo+'</td>'+
                        '<td>'+value.producto+'</td>'+
                        '<td>'+value.cantidad+'</td>'+
                        '<td>'+value.tiempo_instalacion_hora+'</td>'+
                        '<td>'+value.tiempo_configuracion_hora+'</td>'+
                        '<td>'+value.total+'</td>'+
                        '<td>'+resto_por_instalar+'</td>'+
                    '</tr>'
                );
            });
            $(function(){
                $.fn.dataTable.ext.errMode = 'throw';
                $('#tabla_inventario_productos_proyecto').dataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                    buttons: [
                        {extend: 'copy',className: 'btn-sm'},
                        {extend: 'csv',title: 'ListadoClientes', className: 'btn-sm'},
                        {extend: 'pdf', title: 'Inventario de productos del proyecto '+nombre_proyecto+' '+' <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
                    ]
                });
            });
            $('#cantidad_productos').empty().append(cantidad_productos);
            $('#suma_total').empty().append(Number(suma_total.toFixed(2)));
        });
    });
});
</script>

<script>
$(document).ready(function(){
    $('#inmobiliaria').on('change', function(e){

        $('#nombreCliente').val('');
        var inm_id = e.target.value;
        //ajax
        $.get('/ajax-proyectos?inm_id=' + inm_id, function(data){
            //success data
            console.log(data);
            $('#proyectos').empty();
            $.each(data, function(home, proyectosObj){
                $('#proyectos').append('<option value="'+proyectosObj.id+'">'+proyectosObj.nombre+'</option>');
            });
            //$('.collapse').collapse();
        });
    });

    $('#nombreCliente').on('input', function(e){

        $('#proyectos').empty();
        var myDDL = $('#inmobiliaria');
        myDDL[0].selectedIndex = 0;


    })

    //Buscar proyecto
    $('#buscarProyecto, #filtrar').unbind('click').click(function(e){

        var nombre = $.trim($('#nombreCliente').val());

        if(nombre == ""){

            e.preventDefault();
            $('#example2').dataTable().fnDestroy();
            //$("#example2").load("http://18.236.97.163:8001/cliente #example2");
            //$('#listadoProyectos').empty();
            //$('#example2').dataTable().fnDestroy();
            var id_proyecto = $('#proyectos').find(":selected").val();
            var estado_id = $('#estado').find(":selected").val();
            if (id_proyecto == ''){
                alert('Por favor seleccione un proyecto');
            } else {
                $('#demo2').collapse();
                //alert(id_proyecto);
                $.get('/mostrarClientes?id_proyecto=' + id_proyecto + '&estado_id=' + estado_id, function(data){
                    //console.log(data);
                    //console.log(data.length);
                    var cant_estado_capacitado = 0;
                    var cant_estado_instalado_capacitado = 0;
                    $.each(data, function(i,v){
                        if(v.estado_id == 9){
                            cant_estado_capacitado = cant_estado_capacitado + 1;
                        }
                        if(v.estado_id == 8){
                            cant_estado_instalado_capacitado = cant_estado_instalado_capacitado + 1;
                        }
                    });
                    //$('#totalClientes').empty().append(data.length);
                    $('#totalClientesInsCap').empty().append(cant_estado_instalado_capacitado);

                    //Mostrar fecha de inicio de instalación del proyecto
                    $.get('/mostrar_fechas_proyecto?id_proyecto=' + id_proyecto, function(data){
                        //console.log('fecha inicio de instalación: ' + data);
                        $.each(data, function(i,v){
                            //console.log('fecha inicio de instalacion: '+v.fecha_inicio_instalacion);
                            //console.log('total clientes: '+v.cantidad);
                            if(v.cantidad === null){
                                $('#totalClientes').empty().append("0");
                            } else {
                                $('#totalClientes').empty().append(v.cantidad);
                            }
                            if(v.fecha_inicio_instalacion === null){
                                $('#fecha_inicio_instalacion').empty().append("sin fecha");
                            } else {
                                $('#fecha_inicio_instalacion').empty().append(v.fecha_inicio_instalacion.split("-").reverse().join("-"));
                            }
                        });
                    });
                    $('#listadoProyectos').empty();
                    //$('#listadoProyectos').empty();
                    // Mostrar datos de clientes en tabla
                    var clientes_totales = 0;
                    var divPorProyecto = document.getElementById('div1');
                    divPorProyecto.hidden = false;
                    var divPorNombre = document.getElementById('div2');
                    divPorNombre.hidden = true;
                    $.each(data, function(home, listadoProyectosObj){

                        clientes_totales = clientes_totales + 1;
                        if (listadoProyectosObj.vivienda == null) {
                            listadoProyectosObj.vivienda = '';
                        }
                        if (listadoProyectosObj.num_documento == null) {
                            listadoProyectosObj.num_documento = '';
                        }
                        if (listadoProyectosObj.nombre == null) {
                            listadoProyectosObj.nombre = '';
                        }
                        if (listadoProyectosObj.apellido == null) {
                            listadoProyectosObj.apellido = '';
                        }
                        if (listadoProyectosObj.fecha_nacimiento == null) {
                            listadoProyectosObj.fecha_nacimiento = '';
                        }
                        if (listadoProyectosObj.telefono1 == null) {
                            listadoProyectosObj.telefono1 = '';
                        }
                        if (listadoProyectosObj.telefono2 == null) {
                            listadoProyectosObj.telefono2 = '';
                        }
                        if (listadoProyectosObj.correo == null) {
                            listadoProyectosObj.correo = '';
                        }
                        if (listadoProyectosObj.pregunta1 == null) {
                            listadoProyectosObj.pregunta1 = '';
                        }
                        if (listadoProyectosObj.respuesta1 == null) {
                            listadoProyectosObj.respuesta1 = '';
                        }
                        if (listadoProyectosObj.pregunta2 == null) {
                            listadoProyectosObj.pregunta2 = '';
                        }
                        if (listadoProyectosObj.respuesta2 == null) {
                            listadoProyectosObj.respuesta2 = '';
                        }
                        if (listadoProyectosObj.pregunta3 == null) {
                            listadoProyectosObj.pregunta3 = '';
                        }
                        if (listadoProyectosObj.respuesta3 == null) {
                            listadoProyectosObj.respuesta3 = '';
                        }
                        if (listadoProyectosObj.email == null) {
                            listadoProyectosObj.email = '';
                        }
                        if (listadoProyectosObj.resp_email == null) {
                            listadoProyectosObj.resp_email = '';
                        }
                        if (listadoProyectosObj.updated_at == null) {
                            listadoProyectosObj.updated_at = '';
                        }
                        if (listadoProyectosObj.capacitacion == null) {
                            listadoProyectosObj.capacitacion = '';
                        }
                        if (listadoProyectosObj.fecha_instalacion == null) {
                            listadoProyectosObj.fecha_instalacion = '';
                        }
                        if (listadoProyectosObj.fecha_emision_protocolo == null) {
                            listadoProyectosObj.fecha_emision_protocolo = '';
                        }
                        if (listadoProyectosObj.fecha_capacitacion == null) {
                            listadoProyectosObj.fecha_capacitacion = '';
                        }
                        if (listadoProyectosObj.observacion == null) {
                            listadoProyectosObj.observacion = '';
                        }
                        if (listadoProyectosObj.estado_id == 1) {
                            listadoProyectosObj.estado_id = 'contactado';
                        } else if (listadoProyectosObj.estado_id == 2) {
                            listadoProyectosObj.estado_id = 'no contactado';
                        } else if (listadoProyectosObj.estado_id == 3) {
                            listadoProyectosObj.estado_id = 'instalado';
                        } else if (listadoProyectosObj.estado_id == 4) {
                            listadoProyectosObj.estado_id = 'agendado';
                        } else if (listadoProyectosObj.estado_id == 5) {
                            listadoProyectosObj.estado_id = 'sin información';
                        } else if (listadoProyectosObj.estado_id == 8) {
                            listadoProyectosObj.estado_id = 'instalado y capacitado';
                        } else if (listadoProyectosObj.estado_id == 9) {
                            listadoProyectosObj.estado_id = 'capacitado';
                        } else if (listadoProyectosObj.estado_id == 10) {
                            listadoProyectosObj.estado_id = 'Con observación';
                        }


                        if(listadoProyectosObj.estado_id == 'instalado y capacitado' && listadoProyectosObj.pdf_protocolo == null) {
                            $('#listadoProyectos').append(
                                '<tr bgcolor="success" style="color: #FFF;">'+
                                    "<td><button class='btn btn-warning btn-sm' onclick='editarProyecto("+listadoProyectosObj.id+")' id='' type='submit'>Editar</button></td>"+
                                    '<td>'+listadoProyectosObj.vivienda+'</td>'+
                                    '<td>'+listadoProyectosObj.nombre+'<br>'+listadoProyectosObj.apellido+'</td>'+
                                    ////'<td>'+listadoProyectosObj.apellido+'</td>'+
                                    '<td>'+listadoProyectosObj.telefono1+'</td>'+
                                    '<td>'+listadoProyectosObj.correo+'</td>'+
                                    '<td>'+listadoProyectosObj.estado_id+'</td>'+
                                    '<td title="'+listadoProyectosObj.observacion+'">'+listadoProyectosObj.observacion+'</td>'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='agregarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Agregar </button></td>"+
                                    '<td></td>'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='modalOrdenTrabajo("+listadoProyectosObj.id+")' id='' type='submit'>Generar </button></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='verOrdenes("+listadoProyectosObj.id+")' id='' type='submit'>Ver</button> <br>"+ listadoProyectosObj.countOrdenes +"    Visitas</td>"+
                                '</tr>'
                            );
                        } else if(listadoProyectosObj.estado_id == 'instalado y capacitado'){
                            $('#listadoProyectos').append(
                                '<tr bgcolor="success" style="color: #FFF;">'+
                                    "<td><button class='btn btn-warning btn-sm' onclick='editarProyecto("+listadoProyectosObj.id+")' id='' type='submit'>Editar</button></td>"+
                                    '<td>'+listadoProyectosObj.vivienda+'</td>'+
                                    '<td>'+listadoProyectosObj.nombre+'<br>'+listadoProyectosObj.apellido+'</td>'+
                                    ////'<td>'+listadoProyectosObj.apellido+'</td>'+
                                    '<td>'+listadoProyectosObj.telefono1+'</td>'+
                                    '<td>'+listadoProyectosObj.correo+'</td>'+
                                    '<td>'+listadoProyectosObj.estado_id+'</td>'+
                                    '<td title="'+listadoProyectosObj.observacion+'">'+listadoProyectosObj.observacion+'</td>'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='agregarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Agregar </button></td>"+
                                    //'<td><h2 class="text-center"><a href="{{url("/")}}'+listadoProyectosObj.pdf_protocolo+'" target="_blank" title="'+listadoProyectosObj.pdf_protocolo+'"><i class="fa   fa-file-pdf-o text-danger"></i></a></h2></td>'+
                                    '<td><h2 class="text-center" style="cursor: pointer" onclick="verListadoPdf('+listadoProyectosObj.id+')"><i class="fa fa-file-pdf-o text-danger"></i></h2></td>'+
                                    //verListadoPdf"<td><button class='btn btn-danger btn-sm' onclick='eliminarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Eliminar <br> protocolo</button></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='modalOrdenTrabajo("+listadoProyectosObj.id+")' id='' type='submit'>Generar </button></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='verOrdenes("+listadoProyectosObj.id+")' id='' type='submit'>Ver</button><br> "+ listadoProyectosObj.countOrdenes +"    Visitas</td>"+
                                '</tr>'
                            );
                        } else if(listadoProyectosObj.estado_id == 'sin información' && listadoProyectosObj.pdf_protocolo == null){
                            $('#listadoProyectos').append(
                                '<tr bgcolor="#ffc107" style="color: #FFF;">'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='editarProyecto("+listadoProyectosObj.id+")' id='' type='submit'>Editar</button></td>"+
                                    '<td>'+listadoProyectosObj.vivienda+'</td>'+
                                    '<td>'+listadoProyectosObj.nombre+'<br>'+listadoProyectosObj.apellido+'</td>'+
                                    ////'<td>'+listadoProyectosObj.apellido+'</td>'+
                                    '<td>'+listadoProyectosObj.telefono1+'</td>'+
                                    '<td>'+listadoProyectosObj.correo+'</td>'+
                                    '<td>'+listadoProyectosObj.estado_id+'</td>'+
                                    '<td title="'+listadoProyectosObj.observacion+'">'+listadoProyectosObj.observacion+'</td>'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='agregarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Agregar</button></td>"+
                                    "<td></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='modalOrdenTrabajo("+listadoProyectosObj.id+")' id='' type='submit'>Generar</button></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='verOrdenes("+listadoProyectosObj.id+")' id='' type='submit'>Ver</button> <br>"+ listadoProyectosObj.countOrdenes +"    Visitas</td>"+
                                '</tr>'
                            );
                        } else if(listadoProyectosObj.estado_id == 'sin información'){
                            $('#listadoProyectos').append(
                                '<tr bgcolor="#ffc107" style="color: #FFF;">'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='editarProyecto("+listadoProyectosObj.id+")' id='' type='submit'>Editar</button></td>"+
                                    '<td>'+listadoProyectosObj.vivienda+'</td>'+
                                    '<td>'+listadoProyectosObj.nombre+'<br>'+listadoProyectosObj.apellido+'</td>'+
                                    //'<td>'+listadoProyectosObj.apellido+'</td>'+
                                    '<td>'+listadoProyectosObj.telefono1+'</td>'+
                                    '<td>'+listadoProyectosObj.correo+'</td>'+
                                    '<td>'+listadoProyectosObj.estado_id+'</td>'+
                                    '<td title="'+listadoProyectosObj.observacion+'">'+listadoProyectosObj.observacion+'</td>'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='agregarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Agregar </button></td>"+
                                    //'<td><h2 class="text-center"><a href="{{url("/")}}'+listadoProyectosObj.pdf_protocolo+'" target="_blank" title="'+listadoProyectosObj.pdf_protocolo+'"><i class="fa   fa-file-pdf-o text-danger"></i></a></h2></td>'+
                                    '<td><h2 class="text-center" style="cursor: pointer" onclick="verListadoPdf('+listadoProyectosObj.id+')"><i class="fa fa-file-pdf-o text-danger"></i></h2></td>'+
                                    //"<td><button class='btn btn-danger btn-sm' onclick='eliminarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Eliminar <br> protocolo</button></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='modalOrdenTrabajo("+listadoProyectosObj.id+")' id='' type='submit'>Generar </button></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='verOrdenes("+listadoProyectosObj.id+")' id='' type='submit'>Ver</button><br> "+ listadoProyectosObj.countOrdenes +"    Visitas</td>"+
                                '</tr>'
                            );
                        } else if(listadoProyectosObj.estado_id == 'Con observación' && listadoProyectosObj.pdf_protocolo == null){
                            $('#listadoProyectos').append(
                                '<tr bgcolor="#d9534f" style="color: #FFF;">'+
                                    "<td><button class='btn btn-warning btn-sm' onclick='editarProyecto("+listadoProyectosObj.id+")' id='' type='submit'>Editar</button></td>"+
                                    '<td>'+listadoProyectosObj.vivienda+'</td>'+
                                    '<td>'+listadoProyectosObj.nombre+'<br>'+listadoProyectosObj.apellido+'</td>'+
                                    //'<td>'+listadoProyectosObj.apellido+'</td>'+
                                    '<td>'+listadoProyectosObj.telefono1+'</td>'+
                                    '<td>'+listadoProyectosObj.correo+'</td>'+
                                    '<td>'+listadoProyectosObj.estado_id+'</td>'+
                                    '<td title="'+listadoProyectosObj.observacion+'">'+listadoProyectosObj.observacion+'</td>'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='agregarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Agregar</button></td>"+
                                    "<td></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='modalOrdenTrabajo("+listadoProyectosObj.id+")' id='' type='submit'>Generar </button></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='verOrdenes("+listadoProyectosObj.id+")' id='' type='submit'>Ver</button> <br>"+ listadoProyectosObj.countOrdenes +"    Visitas</td>"+
                                '</tr>'
                            );
                        } else if(listadoProyectosObj.estado_id == 'Con observación'){
                            $('#listadoProyectos').append(
                                '<tr bgcolor="#d9534f" style="color: #FFF;">'+
                                    "<td><button class='btn btn-warning btn-sm' onclick='editarProyecto("+listadoProyectosObj.id+")' id='' type='submit'>Editar</button></td>"+
                                    '<td>'+listadoProyectosObj.vivienda+'</td>'+
                                    '<td>'+listadoProyectosObj.nombre+'<br>'+listadoProyectosObj.apellido+'</td>'+
                                    //'<td>'+listadoProyectosObj.apellido+'</td>'+
                                    '<td>'+listadoProyectosObj.telefono1+'</td>'+
                                    '<td>'+listadoProyectosObj.correo+'</td>'+
                                    '<td>'+listadoProyectosObj.estado_id+'</td>'+
                                    '<td title="'+listadoProyectosObj.observacion+'">'+listadoProyectosObj.observacion+'</td>'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='agregarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Agregar </button></td>"+
                                    //'<td><h2 class="text-center"><a href="{{url("/")}}'+listadoProyectosObj.pdf_protocolo+'" target="_blank" title="'+listadoProyectosObj.pdf_protocolo+'"><i class="fa   fa-file-pdf-o text-danger"></i></a></h2></td>'+
                                    '<td><h2 class="text-center" style="cursor: pointer" onclick="verListadoPdf('+listadoProyectosObj.id+')"><i class="fa fa-file-pdf-o text-danger"></i></h2></td>'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='modalOrdenTrabajo("+listadoProyectosObj.id+")' id='' type='submit'>Generar </button></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='verOrdenes("+listadoProyectosObj.id+")' id='' type='submit'>Ver</button> <br>"+ listadoProyectosObj.countOrdenes +"    Visitas</td>"+
                                    //"<td><button class='btn btn-danger btn-sm' onclick='eliminarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Eliminar <br> protocolo</button></td>"+
                                '</tr>'
                            );
                        } else if(listadoProyectosObj.pdf_protocolo == null){
                            $('#listadoProyectos').append(
                                '<tr>'+
                                    "<td><button class='btn btn-warning btn-sm' onclick='editarProyecto("+listadoProyectosObj.id+")' id='' type='submit'>Editar</button></td>"+
                                    '<td>'+listadoProyectosObj.vivienda+'</td>'+
                                    '<td>'+listadoProyectosObj.nombre+'<br>'+listadoProyectosObj.apellido+'</td>'+
                                    //'<td>'+listadoProyectosObj.apellido+'</td>'+
                                    '<td>'+listadoProyectosObj.telefono1+'</td>'+
                                    '<td>'+listadoProyectosObj.correo+'</td>'+
                                    '<td>'+listadoProyectosObj.estado_id+'</td>'+
                                    '<td title="'+listadoProyectosObj.observacion+'">'+listadoProyectosObj.observacion+'</td>'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='agregarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Agregar</button></td>"+
                                    "<td></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='modalOrdenTrabajo("+listadoProyectosObj.id+")' id='' type='submit'>Generar </button></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='verOrdenes("+listadoProyectosObj.id+")' id='' type='submit'>Ver</button><br> "+ listadoProyectosObj.countOrdenes +"    Visitas</td>"+
                                '</tr>'
                            );
                        } else {
                            $('#listadoProyectos').append(
                                '<tr>'+
                                    "<td><button class='btn btn-warning btn-sm' onclick='editarProyecto("+listadoProyectosObj.id+")' id='' type='submit'>Editar</button></td>"+
                                    '<td>'+listadoProyectosObj.vivienda+'</td>'+
                                    '<td>'+listadoProyectosObj.nombre+'<br>'+listadoProyectosObj.apellido+'</td>'+
                                    //'<td>'+listadoProyectosObj.apellido+'</td>'+
                                    '<td>'+listadoProyectosObj.telefono1+'</td>'+
                                    '<td>'+listadoProyectosObj.correo+'</td>'+
                                    '<td>'+listadoProyectosObj.estado_id+'</td>'+
                                    '<td title="'+listadoProyectosObj.observacion+'">'+listadoProyectosObj.observacion+'</td>'+
                                    "<td><button class='btn btn-primary btn-sm' onclick='agregarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Agregar </button></td>"+
                                    //'<td><h2 class="text-center"><a href="{{url("/")}}'+listadoProyectosObj.pdf_protocolo+'" target="_blank" title="'+listadoProyectosObj.pdf_protocolo+'"><i class="fa   fa-file-pdf-o text-danger"></i></a></h2></td>'+
                                    '<td><h2 class="text-center" style="cursor: pointer" onclick="verListadoPdf('+listadoProyectosObj.id+')"><i class="fa fa-file-pdf-o text-danger"></i></h2></td>'+
                                    //"<td><button class='btn btn-danger btn-sm' onclick='eliminarProtocolo("+listadoProyectosObj.id+")' id='' type='submit'>Eliminar <br> protocolo</button></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='modalOrdenTrabajo("+listadoProyectosObj.id+")' id='' type='submit'>Generar </button></td>"+
                                    "<td><button class='btn btn-primary btn-sm' onclick='verOrdenes("+listadoProyectosObj.id+")' id='' type='submit'>Ver</button><br> "+ listadoProyectosObj.countOrdenes +"    Visitas</td>"+
                                '</tr>'
                            );
                        }

                    });
                    $('#totalClientesCap').empty().append(clientes_totales);
                    $(function(){
                        $.fn.dataTable.ext.errMode = 'throw';
                        $('#example2').dataTable({
                            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                            "lengthMenu": [ [ -1,10, 25, 50], ["All",10, 25, 50] ],
                            buttons: [
                            {extend: 'copy',className: 'btn-sm'},
                            {extend: 'csv',title: 'ListadoClientes', className: 'btn-sm'},
                            {extend: 'pdf', title: 'Listado de clientes <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
                            ]
                        });
                    });
                });
            }
            //$('#example2').dataTable().fnDestroy();
            return false;

        }else{

            $.ajax({
                url: "/buscar_cliente_por_nombre",
                type: "GET",
                dataType: 'json',
                data:{
                    "nombre_cliente": nombre
                },
                success:function(data){


                    $('#example3').dataTable().fnDestroy();
                    $('#listadoClientes').empty();
                    var divPorNombre = document.getElementById('div2');
                    divPorNombre.hidden = false;
                    var divPorProyecto = document.getElementById('div1');
                    divPorProyecto.hidden = true;
                    $.each(data, function(home, obj){

                        if(obj.pdf == null){

                            $('#listadoClientes').append('<tr>'+
                                                                "<td>"+obj.nombre+"</td>"+
                                                                '<td>'+obj.apellido+'</td>'+
                                                                '<td>'+obj.inmobiliaria+'</td>'+
                                                                '<td>'+obj.proyecto+'</td>'+
                                                                '<td>'+obj.direccion+'</td>'+
                                                                '<td>'+obj.telefono+'</td>'+
                                                                '<td>'+obj.email+'</td>'+
                                                                '<td>'+obj.observacion+'</td>'+
                                                                '<td></td>'+
                                                            '</tr>'
                                                        );

                        }else{

                            $('#listadoClientes').append('<tr>'+
                                                                "<td>"+obj.nombre+"</td>"+
                                                                '<td>'+obj.apellido+'</td>'+
                                                                '<td>'+obj.inmobiliaria+'</td>'+
                                                                '<td>'+obj.proyecto+'</td>'+
                                                                '<td>'+obj.direccion+'</td>'+
                                                                '<td>'+obj.telefono+'</td>'+
                                                                '<td>'+obj.email+'</td>'+
                                                                '<td>'+obj.observacion+'</td>'+
                                                                '<td><h2 class="text-center" style="cursor: pointer" onclick="verListadoPdf('+obj.id+')"><i class="fa fa-file-pdf-o text-danger"></i></h2></td>'+
                                                            '</tr>'
                                                        );

                        }

                    });

                    $(function(){
                        $.fn.dataTable.ext.errMode = 'throw';
                        $('#example3').dataTable({
                            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                            "lengthMenu": [ [ -1,10, 25, 50], ["All",10, 25, 50] ],
                            buttons: []
                        });
                    });

                },
            });

        }


    });
    //Subir PDF Protocolo
    $('#subirPdfProtocolo').on('click', function(e){
        e.preventDefault();

        var pdf = $('#inputPdfProtocolo').val();
        var idPdfProtocolo = $('#idPdfProtocolo').val();
        var extension = pdf.substring(pdf.lastIndexOf("."));
        var archivo_pdf = $('input[name="inputPdfProtocolo"]')[0].files[0];

        var formData = new FormData();
        formData.append('archivo_pdf', archivo_pdf);
        formData.append('cliente_id', idPdfProtocolo);

        if(pdf == ''){
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Falta adjuntar PDF');
        } else {
            if(extension != '.pdf' && extension != '.PDF'){
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('El tipo de archivo no es pdf: '+extension);
            } else {
                $('#loading_pdf').css("display", "block");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/subir_pdf_Protocolo',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(data){
                        console.log(data);
                        console.log(data.respuesta);
                        if(data.respuesta === 0){
                            $("#form_pdf_protocolo")[0].reset();
                            $('#loading_pdf').css("display", "none");
                            $('#modalProtocolo').modal('hide');
                            toastr.options = {
                                "debug": false,
                                "newestOnTop": false,
                                "positionClass": "toast-top-center",
                                "closeButton": true,
                                "toastClass": "animated fadeInDown",
                            };
                            toastr.success('PDF Protocolo cargado');
                            $("#buscarProyecto").click();
                        } else {
                            $('#loading_pdf').css("display", "none");
                            toastr.options = {
                                "debug": false,
                                "newestOnTop": false,
                                "positionClass": "toast-top-center",
                                "closeButton": true,
                                "toastClass": "animated fadeInDown",
                            };
                            toastr.error('Error en cargar PDF');
                        }
                    },
                    error: function(xhr){
                        console.log(xhr.responseText);
                        $('#loading_pdf').css("display", "none");
                    },
                });
            }
        }
    });
});
// Editar datos de cliente seleccionado
function editarProyecto(id){
  $.ajax({
    url : "/editarClientes?id="+id,
    method : 'GET',
    success : function(data){
        console.log(data);
        $('#modalEditarCliente').modal('show');
            $.each(data, function(home, obj){
                var instalado = 0;
                if (obj.vivienda == null) {
                    obj.vivienda = '';
                }
                if (obj.num_documento == null) {
                    obj.num_documento = '';
                }
                if (obj.nombre == null) {
                    obj.nombre = '';
                }
                if (obj.apellido == null) {
                    obj.apellido = '';
                }
                if (obj.fecha_nacimiento == null) {
                    obj.fecha_nacimiento = '';
                }
                if (obj.telefono1 == null) {
                    obj.telefono1 = '';
                }
                if (obj.telefono2 == null) {
                    obj.telefono2 = '';
                }
                if (obj.correo == null) {
                    obj.correo = '';
                }
                if (obj.pregunta1 == null) {
                    obj.pregunta1 = '';
                }
                if (obj.respuesta1 == null) {
                    obj.respuesta1 = '';
                }
                if (obj.pregunta2 == null) {
                    obj.pregunta2 = '';
                }
                if (obj.respuesta2 == null) {
                    obj.respuesta2 = '';
                }
                if (obj.pregunta3 == null) {
                    obj.pregunta3 = '';
                }
                if (obj.respuesta3 == null) {
                    obj.respuesta3 = '';
                }
                if (obj.email == null) {
                    obj.email = '';
                }
                if (obj.resp_email == null) {
                    obj.resp_email = '';
                }
                if (obj.capacitacion == null) {
                    obj.capacitacion = '';
                } else if (obj.capacitacion == 'CAPACITADO') {
                    instalado = 1;
                }
                if (obj.fecha_instalacion == null) {
                    obj.fecha_instalacion = '';
                }
                if (obj.fecha_emision_protocolo == null) {
                    obj.fecha_emision_protocolo = '';
                }
                if (obj.fecha_capacitacion == null) {
                    obj.fecha_capacitacion = '';
                }
                if (obj.observacion == null) {
                    obj.observacion = '';
                }
                if (obj.estado_id == 1) {
                    obj.estado_id = 'Contactado';
                } else if (obj.estado_id == 2) {
                    obj.estado_id = 'No Contactado';
                } else if (obj.estado_id == 3) {
                    obj.estado_id = 'Instalado';
                    //instalado = 1;
                } else if (obj.estado_id == 4) {
                    obj.estado_id = 'Agendado';
                } else if (obj.estado_id == 5) {
                    obj.estado_id = 'Sin Información';
                //} else if (obj.estado_id == 9) {
                  //  obj.estado_id = 'Capacitado';
                }else if (obj.estado_id == 10) {
                    obj.estado_id = 'Con observación';
                } else if (obj.estado_id == 8) {
                    obj.estado_id = 'Instalado y Capacitado';
                }
                // Mostrar formulario con los datos del cliente para editar
                //$('#formActualizarCliente')[0].reset();
                $('#listadoCliente').empty().append(
                    '<form id="formActualizarCliente" enctype="multipart/form-data">'+
                    '@csrf'+
                    '<input type="hidden" id="id" name="id" value="'+obj.id+'">'+
                        '<div class="row">'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="vivienda">Dirección</label>'+
                                '<input type="text" class="form-control" id="vivienda" name="vivienda" value="'+obj.vivienda+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="num_documento">Número documento</label>'+
                                '<input type="text" class="form-control" id="num_documento" name="num_documento" value="'+obj.num_documento+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="nombre">Nombre</label>'+
                                '<input type="text" class="form-control" id="nombre" name="nombre" value="'+obj.nombre+'">'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="apellido">Apellido</label>'+
                                '<input type="text" class="form-control" id="apellido" name="apellido" value="'+obj.apellido+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="fecha_nacimiento">Fecha de nacimiento</label>'+
                                '<input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="'+obj.fecha_nacimiento+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="telefono1">Télefono 1</label>'+
                                '<input type="text" class="form-control" id="telefono1" name="telefono1" value="'+obj.telefono1+'">'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="telefono2">Télefono 2</label>'+
                                '<input type="text" class="form-control" id="telefono2" name="telefono2" value="'+obj.telefono2+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="correo">Correo</label>'+
                                '<input type="text" class="form-control" id="correo" name="correo" value="'+obj.correo+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="pregunta1">Pregunta 1</label>'+
                                '<input type="text" class="form-control" id="pregunta1" name="pregunta1" value="'+obj.pregunta1+'">'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="respuesta1">Respuesta 1</label>'+
                                '<input type="text" class="form-control" id="respuesta1" name="respuesta1" value="'+obj.respuesta1+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="pregunta2">Pregunta 2</label>'+
                                '<input type="text" class="form-control" id="pregunta2" name="pregunta2" value="'+obj.pregunta2+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="respuesta2">Respuesta 2</label>'+
                                '<input type="text" class="form-control" id="respuesta2" name="respuesta2" value="'+obj.respuesta2+'">'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="pregunta3">Pregunta 3</label>'+
                                '<input type="text" class="form-control" id="pregunta3" name="pregunta3" value="'+obj.pregunta3+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="respuesta3">Respuesta 3</label>'+
                                '<input type="text" class="form-control" id="respuesta3" name="respuesta3" value="'+obj.respuesta3+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="email">EMail</label>'+
                                '<input type="text" class="form-control" id="email" name="email" value="'+obj.email+'">'+
                            '</div>'+
                        '</div>'+

                        '<div class="row">'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="fecha_instalacion">Fecha instalación</label>'+
                                '<div class="input-group date" id="datetimepicker1">'+
                                    '<span class="input-group-addon">'+
                                        '<span class="fa fa-calendar"></span>'+
                                    '</span>'+
                                    '<input type="text" class="form-control" id="fecha_instalacion" name="fecha_instalacion" value="'+obj.fecha_instalacion+'">'+
                                '</div>'+
                                //'<input type="text" class="form-control" id="fecha_instalacion" name="fecha_instalacion" value="'+obj.fecha_instalacion+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="fecha_emision_protocolo">Fecha Agendamiento</label>'+
                                '<div class="input-group date" id="datetimepicker2">'+
                                    '<span class="input-group-addon">'+
                                        '<span class="fa fa-calendar"></span>'+
                                    '</span>'+
                                    '<input type="text" class="form-control" id="fecha_emision_protocolo" name="fecha_emision_protocolo" value="'+obj.fecha_emision_protocolo+'">'+
                                '</div>'+
                                //'<input type="text" class="form-control" id="fecha_emision_protocolo" name="fecha_emision_protocolo" value="'+obj.fecha_emision_protocolo+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="fecha_capacitacion">Fecha capacitación</label>'+
                                '<div class="input-group date" id="datetimepicker3">'+
                                    '<span class="input-group-addon">'+
                                        '<span class="fa fa-calendar"></span>'+
                                    '</span>'+
                                    '<input type="text" class="form-control" id="fecha_capacitacion" name="fecha_capacitacion" value="'+obj.fecha_capacitacion+'">'+
                                '</div>'+
                                //'<input type="text" class="form-control" id="fecha_capacitacion" name="fecha_capacitacion" value="'+obj.fecha_capacitacion+'">'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="form-group col-lg-12">'+
                                '<label for="resp_email">Observación</label>'+
                                '<textarea class="form-control" id="observacion" rows="3">'+obj.observacion+'</textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="resp_email">Respuesta EMail</label>'+
                                '<input type="text" class="form-control" id="resp_email" name="resp_email" value="'+obj.resp_email+'">'+
                            '</div>'+
                            '<div class="form-group col-lg-4">'+
                                '<label for="estado_id">Estado</label>'+
                                '<select class="form-control" id="estado_id" name="estado_id">'+
                                    '<option value="0">Actual: '+obj.estado_id+'</option>'+
                                    '<option value="1">Contactado</option>'+
                                    '<option value="2">No Contactado</option>'+
                                    '<option value="3">Instalado</option>'+
                                    '<option value="4">Agendado</option>'+
                                    '<option value="5">Sin Información</option>'+
                                    //'<option value="9">Capacitado</option>'+
                                    '<option value="10">Con observación</option>'+
                                    '<option value="8">Instalado y Capacitado</option>'+
                                '</select>'+
                            '</div>'+
                            '<input type="hidden" id="instalado" name"instalado" value="'+instalado+'">'+
                            '<div class="form-group col-lg-4" style="display: none;">'+
                                '<label for="capacitacion">Capacitación</label>'+
                                '<select class="form-control" id="capacitacion" name="capacitacion">'+
                                    '<option value="ACTUAL">Actual: '+obj.capacitacion+'</option>'+
                                    '<option value="CAPACITADO">Capacitado</option>'+
                                    '<option value="NO CAPACITADO">No Capacitado</option>'+
                            '</div>'+
                        '</div>'+
                    '</form>'
                );
                // DateSpicker para los input tipo fecha
                $('#datetimepicker1').datepicker();
                $('#datetimepicker2').datepicker();
                $('#datetimepicker3').datepicker();
                // Actualizar cliente seleccionado desde la tabla
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#btnActualizarCliente').unbind('click').click(function(e){
                    e.preventDefault();
                    var nombreInmobiliaria = $("#inmobiliaria").find(":selected").text();
                    var nombreProyecto = $("#proyectos").find(":selected").text();
                    console.log(nombreInmobiliaria);
                    console.log(nombreProyecto);
                    var token = $('#_token').val();
                    $.ajax({
                        url: "/clientes/"+obj.id,
                        type: "PUT",
                        dataType: 'json',
                        data:{
                            'id':$('#id').val(),
                            'vivienda':$('#vivienda').val(),
                            'num_documento':$('#num_documento').val(),
                            'nombre':$('#nombre').val(),
                            'apellido':$('#apellido').val(),
                            'fecha_nacimiento':$('#fecha_nacimiento').val(),
                            'telefono1':$('#telefono1').val(),
                            'telefono2':$('#telefono2').val(),
                            'correo':$('#correo').val(),
                            'pregunta1':$('#pregunta1').val(),
                            'respuesta1':$('#respuesta1').val(),
                            'pregunta2':$('#pregunta2').val(),
                            'respuesta2':$('#respuesta2').val(),
                            'pregunta3':$('#pregunta3').val(),
                            'respuesta3':$('#respuesta3').val(),
                            'email':$('#email').val(),
                            'resp_email':$('#resp_email').val(),
                            'estado_id':$('#estado_id').val(),
                            'capacitacion':$('#capacitacion').val(),
                            'fecha_instalacion':$('#fecha_instalacion').val(),
                            'fecha_emision_protocolo':$('#fecha_emision_protocolo').val(),
                            'fecha_capacitacion':$('#fecha_capacitacion').val(),
                            'nombreInmobiliaria':nombreInmobiliaria,
                            'nombreProyecto':nombreProyecto,
                            'instalado':$('#instalado').val(),
                            'observacion':$('#observacion').val()
                        },
                        success:function(data){
                            console.log(data);
                            //$("#formActualizarCliente")[0].reset();
                            //$('#listadoCliente').empty();
                            $('#modalEditarCliente').modal('hide');
                            //$("#formActualizarCliente")empty();
                            //$("#example2").load("http://18.236.97.163:8001/cliente #example2");
                            //$("#example2").empty();
                            //$("#buscarProyecto").off();
                            $("#buscarProyecto").click();
                            //$("#buscarProyecto").trigger("click");
                        },
                    });
                    return false;
                });
            }); // fin each
        }  // fin primer success
    }); // Fin primer AJAX editar cliente
}
</script>

<script>
//Recibir id del proyecto
function agregarProtocolo($id){
    var id = $id;
    $("#form_pdf_protocolo")[0].reset();
    $('#loading_pdf').css("display", "none");
    $('#idPdfProtocolo').val(id);
    $('#modalProtocolo').modal('show');
}
</script>

<script>
//Ver listado de PDF Protocolo del cliente
function verListadoPdf($id){

    var id = $id;
    var ruta_base = '{{url("/")}}';
    var contadorPdf = 0;

    $.ajax({
        url: 'listado_pdf_protocolo_cliente/'+id,
        type: 'GET',
        success: function(data){

            $('#tabla_listado_pdf_cliente').empty();
            $.each(data, function(index, value){
                $('#tabla_listado_pdf_cliente').append(
                '<tr>'+
                    '<td><h2 class="text-center"><a href="'+ruta_base+value.pdf_protocolo+'" target="_blank"><i class="fa fa-file-pdf-o text-danger"></i></a></h2></td>'+
                    '<td><h4 class="text-left">'+value.nombre_pdf+'</h4></td>'+
                    "<td><button class='btn btn-danger btn-sm' type='button' onclick='eliminarProtocolo("+value.id +"," + id +")'>Eliminar <br> protocolo</button></td>"+
                '</tr>'
                );
            });
            $('#modalListadoPdfProtocolo').modal('show');
        },
        error: function(xhr){
            console.log(xhr.responseText);
        },
    });
}
</script>

<script>
    function eliminarProtocolo(id, id_cliente){

     	$.ajaxSetup({
     	    headers: {
     	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     	    }
     	});

     	$.ajax({
     	    url: "/eliminar_protocolo/"+id,
     	    type: "GET",
     	    dataType: 'json',
     	    data:{
     	        'id_protocolo': id,
     	        'id_cliente': id_cliente

     	    },
     	    success:function(data){

     	    	console.log(data);

     	        $("#buscarProyecto").click();
            	$('#modalListadoPdfProtocolo').modal('hide');

     	        toastr.options = {
     	            "debug": false,
     	            "newestOnTop": false,
     	            "positionClass": "toast-top-center",
     	            "closeButton": true,
     	            "toastClass": "animated fadeInDown",
     	        };
     	        toastr.success('Protocolo eliminado');

     	    },
     	   		error: function(xhr){
            		console.log(xhr.responseText);
        	},
     	});

    }
</script>

<script>

    function modalOrdenTrabajo(id){

       // $('#txtIdClienteAccionOrden').val(id);
       // $('#modalAccionesOrden').modal('show');

                $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
                });
                $.ajax({
                   url: "datos_modal/"+id,
                   type: "GET",
                   dataType: 'json',
                   success: function(data)
                   {

                       var nro_orden;

                       if(data.count_ordenes <= 9){
                           nro_orden = "0000"+data.count_ordenes;
                       }else if( data.count_ordenes >= 10 && data.count_ordenes <= 99){
                       nro_orden = "000"+data.count_ordenes;
                       }else if( data.count_ordenes >= 100 && data.count_ordenes <= 999){
                           nro_orden = "00"+data.count_ordenes;
                       }else if( data.count_ordenes >= 1000 && data.count_ordenes <= 9999){
                           nro_orden = "0"+data.count_ordenes;
                       }else if( data.count_ordenes >= 10000 && data.count_ordenes < 100000){
                           nro_orden = data.count_ordenes;
                       }

                       $('#txtClienteIdOrden').val(id);
                       $('#txtNombreClienteOrden').val(data.nombre_cliente);
                       $('#txtDireccionClienteOrden').val(data.direccion_cliente);
                       $('#txtConteoVisitasOrden').val(data.visitas_anteriores);
                       $('#txtNroOrden').val(nro_orden);
                       $('#txtObservacionesVisitasAnteriores').val(data.comentario_visita_anterior);



                   },
                   error: function(xhr)
                   {
                       console.log(xhr.responseText);
                   }
                });//Fin ajax

         $('#modalCrearOrdenTrabajo').modal('show');
    }

</script>

<script>

    function verOrdenes(id){

        $('#modalListadoOrden').modal('show');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
           url: "listado_ordenes/"+id,
           type: "GET",
           dataType: 'json',
           success: function(data)
           {

                var nro_orden;
                $('#tabla_listado_ordenes_cliente').empty();
                $.each(data, function(index, value){

                    if(value.numero_orden < 10){
                        nro_orden = "0000"+value.numero_orden;
                    }else if( value.numero_orden >= 10 && value.numero_orden < 100){
                    nro_orden = "000"+value.numero_orden;
                    }else if( value.numero_orden >= 100 && value.numero_orden < 1000){
                        nro_orden = "00"+value.numero_orden;
                    }else if( value.numero_orden >= 1000 && value.numero_orden < 10000){
                        nro_orden = "0"+value.numero_orden;
                    }else if( value.numero_orden >= 10000 && value.numero_orden < 100000){
                        nro_orden = value.numero_orden;
                    }


                    $('#tabla_listado_ordenes_cliente').append(
                    '<tr>'+
                        '<td><h2 class="text-left">'+nro_orden+'</h2></td>'+
                        '<td><h2 class="text-left">'+value.fecha_pautada+'</h2></td>'+
                        "<td><button class='btn btn-info btn-sm' type='button' onclick='verOrden(" + value.id +")'>Ver Orden</button></td>"+
                    '</tr>'
                    );
                });

           },
           error: function(xhr)
           {
               console.log(xhr.responseText);
           }
        });//Fin ajax

    }

</script>

<script>

    function verOrden(id){

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "ver_orden/"+id,
                type: "GET",
                dataType: 'json',
                success: function(data)
                {
                    $('#modalListadoOrden').modal('hide');
                    //console.log(data.instalador);
                    var orden = data.orden;
                    var actividades = data.actividades;
                    var materiales = data.materiales;
                    var fallos = data.fallos;
                    var contadorActividades = 0;
                    var contadorMateriales = 0;
                    var nro_orden;
                    var id_instalador;

                    if(orden.numero_orden < 10){
                        nro_orden = "0000"+orden.numero_orden;
                    }else if( orden.numero_orden >= 10 && orden.numero_orden > 100){
                    nro_orden = "000"+orden.numero_orden;
                    }else if( orden.numero_orden >= 100 && orden.numero_orden > 1000){
                        nro_orden = "00"+orden.numero_orden;
                    }else if( orden.numero_orden >= 1000 && orden.numero_orden > 10000){
                        nro_orden = "0"+orden.numero_orden;
                    }else if( orden.numero_orden >= 10000 && orden.numero_orden > 100000){
                        nro_orden = orden.numero_orden;
                    }

                    $('#idOrdenVer').val(orden.id);
                    $('#txtFechaOrdenVer').val(orden.fecha_pautada);
                    $('#txtHoraPautadaOrdenVer').val(orden.hora_pautada);
                    $('#opcionResponsableAsignadoOrdenVer').text(data.instalador);
					$('#opcionResponsableAsignadoOrdenVer').val(data.instalador_id);
                    $('#opcionTipoOrdenVer').text(orden.tipo_trabajo);
                    $('#txtNroOrdenVer').val(nro_orden);
                    $('#txtNombreClienteOrdenVer').val(orden.nombre_cliente);
                    $('#txtDireccionClienteOrdenVer').val(orden.direccion_cliente);
                    $('#opcionResponsableUltimaOrdenVer').text(data.responsable_visita_anterior);
                    $('#opcionResponsableUltimaOrdenVer').val(data.instalador_visita_anterior_id);
                    $('#txtObservacionesVisitasAnterioresVer').val(orden.observaciones_visita_anterior);
                    $('#opcionCodigoInternoVer').text(orden.codigo_interno);
                    $('#opcionCodigoInternoVer').val(orden.codigo_interno);

                    $.each(materiales, function(index, obj){

                        contadorMateriales = contadorMateriales + 1;


                        $('#tbMateriales').append('<tr>'+
                                                      '<td><strong>'+obj.descripcion+'</strong></td>'+
                                                      '<td>'+obj.unidad+'</td>'+
                                                      '<td>'+obj.cantidades+'</td>'+
                                                  '</tr>');

                    });

                    $.each(actividades, function(index, obj){

                        contadorActividades = contadorActividades + 1;

                        if(obj.observacion == null){
                            obj.observacion = "";
                        }

                        $('#tbActividades').append('<tr>'+
                                                      '<td><strong>'+obj.actividad+'</strong></td>'+
                                                      '<td>'+obj.observacion+'</td>'+
                                                      '<td>'+obj.ejecutado+'</td>'+
                                                  '</tr>');



                    });

                    $.each(fallos, function(index, obj){

                        $('#tbFallas').append('<tr>'+
                                                  '<td><strong>'+obj.producto_servicio_falla+'</strong></td>'+
                                                  '<td>'+obj.descripcion_falla+'</td>'+
                                              '</tr>');

                    });


                    if(orden.obra_gruesa == "SI"){


                        var chkObragruesaactivar = document.getElementById('chkObraGruezaVer');
                        chkObragruesaactivar.checked = true;

                    }
                    if(orden.mudanza == "SI"){

                        var chkMudanzaactivar = document.getElementById('chkMudanzaVer');
                        chkMudanzaactivar.checked = true;

                    }
                    if(orden.terminaciones_menores == "SI"){


                        var chkTMactivar = document.getElementById('chkTerminacionesMenoresVer');
                        chkTMactivar.checked = true;


                    }
                    if(orden.habitada == "SI"){

                        var chkHabitadaactivar = document.getElementById('chkHabitadaVer');
                        chkHabitadaactivar.checked = true;


                    }

                },
                error: function(xhr)
                {
                    console.log(xhr.responseText);
                }
            });//Fin ajax

    }

</script>

<script type="text/javascript">

    function editarOrden(){

    	console.log(contadorMaterialesVer);

    }

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
