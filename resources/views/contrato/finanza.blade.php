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
                        <li><a href="{{ url('contrato.finanza') }}">Contrato Finanzas</a></li>
                        <li class="active">
                            <span>Finanzas</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Contratos
                </h2>
                <small>Finanzas</small>
            </div>
        </div>
    </div>

<div class="content">
    <div class="hpanel">
        <div class="panel-heading">
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
            </div>
            Finanzas
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                    <h3 class="font-light m-b-xs text-center text-info">
                        Estado de pago contratos
                    </h3>
                    <hr style="border-color: #FFF;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="tabla_finanzas">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Inmobiliaria</th>
                                    <th>Proyecto</th>
                                    <th>Fecha<br>Instalación</th>
                                    <th>Fecha1</th>
                                    <th>Pago1</th>
                                    <th>Fecha2</th>
                                    <th>Monto2</th>
                                    <th>Fecha3</th>
                                    <th>Monto3</th>
                                    <th>Fecha4</th>
                                    <th>Monto4</th>
                                    <th>Fecha5</th>
                                    <th>Monto5</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                        	<tbody>
                            <?php
                                $numero = 1;
                                $total_pago1 = 0;
                                $total_pago2 = 0;
                                $total_pago3 = 0;
                                $total_pago4 = 0;
                                $total_pago5 = 0;
                                $total_pagos = 0;
                            ?>
                        	@foreach($contratos as $contrato)
                        		<tr>
                                    <?php
                                        $total_pago1 = $total_pago1 + $contrato->monto_pago1;
                                        $total_pago2 = $total_pago2 + $contrato->monto_pago2;
                                        $total_pago3 = $total_pago3 + $contrato->monto_pago3;
                                        $total_pago4 = $total_pago4 + $contrato->monto_pago4;
                                        $total_pago5 = $total_pago5 + $contrato->monto_pago5;
                                        $total_pagos = $total_pagos + $contrato->monto_contrato;
                                    ?>
                                    <td><?php echo $numero++; ?></td>
                        			<td>{{ $contrato->nombre_inmobiliaria }}</td>
                        			<td>{{ $contrato->nombre_proyecto }}</td>
                                    @if($contrato->fecha_inicio_instalacion === null)
                                    <td>no registra</td>
                                    @else
                                    <td>{{ date('d/m/Y', strtotime($contrato->fecha_inicio_instalacion)) }}</td>
                                    @endif
                                    @if($contrato->pago1_fecha === null)
                                    <td>no registra</td>
                                    @else
                                    <td>{{ date('d/m/Y', strtotime($contrato->pago1_fecha)) }}</td>
                                    @endif
                        			<td>{{ 'UF '.number_format($contrato->monto_pago1, 2, ',', '.') }}</td>
                        			@if($contrato->pago2_fecha === null)
                                    <td>no registra</td>
                                    @else
                                    <td>{{ date('d/m/Y', strtotime($contrato->pago2_fecha)) }}</td>
                                    @endif
                        			<td>{{ 'UF '.number_format($contrato->monto_pago2, 2, ',', '.') }}</td>
                        			@if($contrato->pago3_fecha === null)
                                    <td>no registra</td>
                                    @else
                                    <td>{{ date('d/m/Y', strtotime($contrato->pago3_fecha)) }}</td>
                                    @endif
                        			<td>{{ 'UF '.number_format($contrato->monto_pago3, 2, ',', '.') }}</td>
                        			@if($contrato->pago4_fecha === null)
                                    <td>no registra</td>
                                    @else
                                    <td>{{ date('d/m/Y', strtotime($contrato->pago4_fecha)) }}</td>
                                    @endif
                        			<td>{{ 'UF '.number_format($contrato->monto_pago4, 2, ',', '.') }}</td>
                        			@if($contrato->pago5_fecha === null)
                                    <td>no registra</td>
                                    @else
                                    <td>{{ date('d/m/Y', strtotime($contrato->pago5_fecha)) }}</td>
                                    @endif
                        			<td>{{ 'UF '.number_format($contrato->monto_pago5, 2, ',', '.') }}</td>
                        			<td>{{ 'UF '.number_format($contrato->monto_contrato, 2, ',', '.') }}</td>
                        		</tr>
                        	@endforeach
                        	</tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-4">
                    <p><strong>Total Pago 1:</strong></p>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-4">
                    <p><strong><?php echo '$'.number_format($total_pago1, 2, ',', '.'); ?></strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-4">
                    <p><strong>Total Pago 2:</strong></p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <p><strong><?php echo '$'.number_format($total_pago2, 2, ',', '.'); ?></strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-4">
                    <p><strong>Total Pago 3:</strong></p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <p><strong><?php echo '$'.number_format($total_pago3, 2, ',', '.'); ?></strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-4">
                    <p><strong>Total Pago 4:</strong></p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <p><strong><?php echo '$'.number_format($total_pago4, 2, ',', '.'); ?></strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-4">
                    <p><strong>Total Pago 5:</strong></p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <p><strong><?php echo '$'.number_format($total_pago5, 2, ',', '.'); ?></strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-4">
                    <p><strong>Total Pagos:</strong></p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <p><strong><?php echo '$'.number_format($total_pagos, 2, ',', '.'); ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="hpanel">
        <div class="panel-heading">
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
            </div>
            Finanzas por fechas
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                    <h3 class="font-light m-b-xs text-center text-info">
                        Estado de pago contratos por fecha
                    </h3>
                    <br>
                    <p>Filtrar contrato con las siguientes opciones:</p>
                    <li>Desde una fecha determinada</li>
                    <li>Hasta una fecha determinada</li>
                    <li>Desde y hasta una fecha determinada donde la fecha desde no puede ser mayor a la fecha hasta</li>
                    <hr style="border-color: #FFF;">
                </div>
                <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                    <form id="fechas_contrato">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="fecha_desde">Desde</label>
                                    <div class="input-group date" id="datetimepicker1">
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                        <input type="text" class="form-control" id="fecha_desde" name="fecha_desde">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label" for="fecha_hasta">Hasta</label>
                                    <div class="input-group date" id="datetimepicker2">
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                        <input type="text" class="form-control" id="fecha_hasta" name="fecha_hasta">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <hr style="border-color: #FFF;">
                            <button type="button" class="btn btn-lg btn-info btn-block" id="btnBuscarContratoPorFecha">Buscar</button>
                            <hr style="border-color: #FFF;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapse_contrato_fechas">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="tabla_finanzas_fecha">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Inmobiliaria <br> pago 1</th>
                                        <th>Proyecto <br> pago 1 </th>
                                        <th>Fecha<br> pago 1 </th>
                                        <th>Monto <br> pago 1 <span style="color: #FFF;"></span></th>
                                        <th></th>
                                        <th>Inmobiliaria <br> pago 2<span style="color: #FFF;"></span></th>
                                        <th>Proyecto <br> pago 2 </th>
                                        <th>Fecha <br> pago 2<span style="color: #FFF;"></span></th>
                                        <th>Monto <br> pago 2</th>
                                        <th></th>
                                        <th>Inmobiliaria <br> pago 3</th>
                                        <th>Proyecto <br> pago 3<span style="color: #FFF;"></span></th>
                                        <th>Fecha <br> pago 3</th>
                                        <th>Monto <br> pago 3</th>
                                        <th></th>
                                        <th>Inmobiliaria <br> pago 4</th>
                                        <th>Proyecto <br> pago 4<span style="color: #FFF;"></span></th>
                                        <th>Fecha <br> pago 4</th>
                                        <th>Monto <br> pago 4<span style="color: #FFF;"></span></th>
                                        <th></th>
                                        <th>Inmobiliaria <br> pago 5<span style="color: #FFF;"></span></th>
                                        <th>Proyecto <br> pago 5</th>
                                        <th>Fecha <br> pago 5</th>
                                        <th>Monto <br> pago 5</th>
                                    </tr>
                                </thead>
                            <tbody id="datos_tabla_contrato_fecha">

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div id="reporte_total_fechas">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="hpanel">
        <div class="panel-heading">
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
            </div>
            Finanzas por contrato
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                    <h3 class="font-light m-b-xs text-center text-info">
                        Seleccionar Contrato
                    </h3>
                    <hr style="border-color: #FFF;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                    <form id="form_contrato">
                        <div class="form-group">
                            <!--label class="control-label" for="contrato">Contrato</label-->
                            <select class="form-control" id="contrato" name="contrato">
                                <option value="">-- Seleccione un contrato --</option>
                                @foreach($contratos as $contrato)
                                <option value="{{ $contrato->id }}">{{ $contrato->nombre_proyecto }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="collapse" id="collapse_contrato">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <hr>
                                <h3 class="font-light m-b-xs text-center text-info">
                                    Estado de pago del Contrato
                                </h3>
                                <h3 class="font-light m-b-xs text-center text-info" id="inmobiliaria_proyecto"></h3>
                                <hr style="border-color: #FFF;">
                            </div>
                        </div>
                        <div id="estado_pagos_fechas">
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <p class="pull-right"><strong>Total:</strong></p>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <p id="suma_total_pago"></p>
                            </div>
                        </div>
                    </div>
                </div>
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

<script>
$(document).ready(function(){
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
});
</script>

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
    //$('#datetimepicker3').datepicker();
    //$('#datetimepicker4').datepicker();
    //$('#datetimepicker5').datepicker();
    //$('#datetimepicker6').datepicker();
    //$('#datetimepicker7').datepicker();
    //$('#datetimepicker8').datepicker();
    //$('#datetimepicker9').datepicker();
    //$('#datetimepicker10').datepicker();
});
</script>

<script>
	$(function(){
        $.fn.dataTable.ext.errMode = 'throw';
        $('#tabla_finanzas').dataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ListadoClientes', className: 'btn-sm'},
                {extend: 'pdf', title: 'Contratos <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
            ]
        });
    });
    $(function(){
        $.fn.dataTable.ext.errMode = 'throw';
        $('#tabla_finanzas_fecha').dataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ListadoClientes', className: 'btn-sm'},
                {extend: 'pdf', title: 'Contratos <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
            ]
        });
    });
</script>

<script>
$(document).ready(function(){

    $('#contrato').on('change', function(){
        var contrato_id = $(this).find(":selected").val();
        //alert(contrato_id);

        if(contrato_id == ""){
            $('#collapse_contrato').collapse('hide');
        } else {
            var datos_fecha_pago = new Array();
            var monto_total_pagos = '';
            var total_pagos = '';
            $('#collapse_contrato').collapse('show');
            $.get('pago_contrato/'+contrato_id, function(data){
                console.log(data);
                if(data.respuesta === 0){
                    console.log('OK');
                    $('#estado_pagos_fechas').empty();
                    $.each(data.contrato, function(index, value){
                    $('#inmobiliaria_proyecto').empty().append(data.nombre_inmobiliaria+' | '+value.nombre_proyecto);


                        // Si la cantidad es 3
                        if(data.cantidad_fechas === 3){
                            for(var i=1; i<=data.cantidad_fechas; i++){
                                if(i == 1){
                                    item = {}
                                    item ["fecha_pago"] = value.pago1_fecha;
                                    item ["monto_pago"] = value.monto_pago1;
                                    datos_fecha_pago.push(item);
                                }
                                if(i == 2){
                                    item = {}
                                    item ["fecha_pago"] = value.pago2_fecha;
                                    item ["monto_pago"] = value.monto_pago2;
                                    datos_fecha_pago.push(item);
                                }
                                if(i == 3){
                                    item = {}
                                    item ["fecha_pago"] = value.pago3_fecha;
                                    item ["monto_pago"] = value.monto_pago3;
                                    datos_fecha_pago.push(item);
                                }
                            }
                        }
                        // Si la cantidad es 5
                        if(data.cantidad_fechas === 5){
                            for(var i=1; i<=data.cantidad_fechas; i++){
                                if(i == 1){
                                    item = {}
                                    item ["fecha_pago"] = value.pago1_fecha;
                                    item ["monto_pago"] = value.monto_pago1;
                                    datos_fecha_pago.push(item);
                                }
                                if(i == 2){
                                    item = {}
                                    item ["fecha_pago"] = value.pago2_fecha;
                                    item ["monto_pago"] = value.monto_pago2;
                                    datos_fecha_pago.push(item);
                                }
                                if(i == 3){
                                    item = {}
                                    item ["fecha_pago"] = value.pago3_fecha;
                                    item ["monto_pago"] = value.monto_pago3;
                                    datos_fecha_pago.push(item);
                                }
                                if(i == 4){
                                    item = {}
                                    item ["fecha_pago"] = value.pago4_fecha;
                                    item ["monto_pago"] = value.monto_pago4;
                                    datos_fecha_pago.push(item);
                                }
                                if(i == 5){
                                    item = {}
                                    item ["fecha_pago"] = value.pago5_fecha;
                                    item ["monto_pago"] = value.monto_pago5;
                                    datos_fecha_pago.push(item);
                                }
                            }
                        }
                    });//Fin each
                    console.log(datos_fecha_pago);
                    console.log(datos_fecha_pago[0+1]["fecha_pago"]);
                    console.log(datos_fecha_pago[0+1]["monto_pago"]);
                    total_pagos = '';
                    for(var j=1; j<=data.cantidad_fechas; j++){
                        //total_pagos = total_pagos + datos_fecha_pago[j-1]["monto_pago"];
                        $('#estado_pagos_fechas').append(
                            '<div class="row">'+
                                '<div class="col-md-6 col-sm-12 col-xs-12">'+
                                    '<div class="form-group">'+
                                        '<label class="control-label">Fecha pago '+j+'</label>'+
                                        '<div class="input-group m-b">'+
                                            '<span class="input-group-addon"><i class="fa fa-calendar"></i></span>'+
                                            '<input type="text" class="form-control" id="" name="" readonly value="'+datos_fecha_pago[j-1]["fecha_pago"].split("-").reverse().join("-")+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-6 col-sm-12 col-xs-12">'+
                                    '<div class="form-group">'+
                                        '<label class="control-label">Monto pago '+j+'</label>'+
                                        '<div class="input-group m-b">'+
                                            '<span class="input-group-addon">$</span>'+
                                            '<input type="number" class="form-control" id="" name="" readonly value="'+datos_fecha_pago[j-1]["monto_pago"]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                    }// Fin FOR
                    //$('#suma_total_pago').empty().append(total_pagos);
                    $('#suma_total_pago').empty().append('<strong>$ '+data.monto_contrato.replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong>');
                } else {
                    alert('Error en contrato');
                }
            });//GET
        }// Fin primer else
    });//Fin Buscar Por Contrato

    $('#btnBuscarContratoPorFecha').on('click', function(e){
        e.preventDefault();

        var cont = 0;
        var total_pago1 = 0;
        var total_pago2 = 0;
        var total_pago3 = 0;
        var total_pago4 = 0;
        var total_pago5 = 0;
        var total_pagos = 0;
        var fecha_desde = $('#fecha_desde').val();
        var fecha_hasta = $('#fecha_hasta').val();
        var fecha_min = $('#fecha_desde').datepicker('getDate');
        var fecha_max = $('#fecha_hasta').datepicker('getDate');

        if(fecha_desde == "" && fecha_hasta == ""){
            $('#collapse_contrato_fechas').collapse('hide');
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Debe seleccionar fechas');
        } else if(fecha_desde != "" && fecha_hasta == ""){
            $('#collapse_contrato_fechas').collapse('show');
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Filtrar por fechas mayores a: '+fecha_desde.split("-").reverse().join("-"));
            $.ajax({
                url: "buscar_contrato_por_fecha",
                type: "GET",
                dataType: 'json',
                data: {
                    "fecha_desde": fecha_desde,
                    "fecha_hasta": fecha_hasta
                },
                success: function(data)
                {
                    console.log(data);
                    $("#fechas_contrato")[0].reset();
                    $('#tabla_finanzas_fecha').dataTable().fnDestroy();
                    cont = 0;
                    $('#datos_tabla_contrato_fecha').empty();

                        maximo = 0;
                        arrayCounts = [];
                        arrayCounts = data.counts;
                        cont = 0;
                        total_pago1 = 0;
                        total_pago2 = 0;
                        total_pago3 = 0;
                        total_pago4 = 0;
                        total_pago5 = 0;

                        $.each(data.counts, function(index, value){

                            arrayCounts.push(value);

                        });

                        for(var i=0,len=arrayCounts.length;i<len;i++){
                            if(maximo < arrayCounts [i]){
                                maximo = arrayCounts [i];
                            }
                        }

                        for (e = 1; e <= maximo ; e++) {

                          $('#datos_tabla_contrato_fecha').append(

                            '<tr id="datos'+e+'">'+
                                '<td>'+e+'</td>'+
                                '<td id="inmobiliariaPago1valor'+e+'"></td>'+
                                '<td id="proyectoPago1valor'+e+'"></td>'+
                                '<td id="fecha1valor'+e+'"></td>'+
                                '<td id="monto1valor'+e+'"></td>'+
                                '<td></td>'+
                                '<td id="inmobiliariaPago2valor'+e+'"></td>'+
                                '<td id="proyectoPago2valor'+e+'"></td>'+
                                '<td id="fecha2valor'+e+'"></td>'+
                                '<td id="monto2valor'+e+'"></td>'+
                                '<td></td>'+
                                '<td id="inmobiliariaPago3valor'+e+'"></td>'+
                                '<td id="proyectoPago3valor'+e+'"></td>'+
                                '<td id="fecha3valor'+e+'"></td>'+
                                '<td id="monto3valor'+e+'"></td>'+
                                '<td></td>'+
                                '<td id="inmobiliariaPago4valor'+e+'"></td>'+
                                '<td id="proyectoPago4valor'+e+'"></td>'+
                                '<td id="fecha4valor'+e+'"></td>'+
                                '<td id="monto4valor'+e+'"></td>'+
                                '<td></td>'+
                                '<td id="inmobiliariaPago5valor'+e+'"></td>'+
                                '<td id="proyectoPago5valor'+e+'"></td>'+
                                '<td id="fecha5valor'+e+'"></td>'+
                                '<td id="monto5valor'+e+'"></td>'+
                            '</tr>'

                            );
                        }
                        $.each(data.fechapago1, function(index, value){
                           if(value.fecha_pago === null){
                               value.fecha_pago = 'no registra';
                           }
                           if(value.monto_pago === null){
                               value.monto_pago = '0.00';
                           }
                           cont++;
                           total_pago1 = total_pago1 + parseFloat(value.monto_pago);
                           //total_pago2 = total_pago2 + parseFloat(value.monto_pago2);
                           //total_pago3 = total_pago3 + parseFloat(value.monto_pago3);
                           //total_pago4 = total_pago4 + parseFloat(value.monto_pago4);
                           //total_pago5 = total_pago5 + parseFloat(value.monto_pago5);
                           //total_pagos = total_pagos + parseFloat(value.monto_contrato);
                          // $('#datos'+cont).append(
                          //         '<td>'+value.nombre_inmobiliaria+'</td>'+
                          //         '<td>'+value.nombre_proyecto+'</td>'+
                          //         //'<td>'+value.fecha_inicio_instalacion.split("-").reverse().join("-")+'</td>'+
                          //         '<td>'+value.fecha_pago.split("-").reverse().join("-")+'</td>'+
                          //         '<td>$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'
                          //         //'<td>'+value.pago2_fecha.split("-").reverse().join("-")+'</td>'+
                          //         //'<td>$'+parseFloat(value.monto_pago2).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                          //         //'<td>'+value.pago3_fecha.split("-").reverse().join("-")+'</td>'+
                          //         //'<td>$'+parseFloat(value.monto_pago3).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                          //         //'<td>'+value.pago4_fecha.split("-").reverse().join("-")+'</td>'+
                          //         //'<td>$'+parseFloat(value.monto_pago4).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                          //         //'<td>'+value.pago5_fecha.split("-").reverse().join("-")+'</td>'+
                          //         //'<td>$'+parseFloat(value.monto_pago5).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                          //         //'<td>$'+parseFloat(value.monto_contrato).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                          //
                          // );
                           $('#inmobiliariaPago1valor'+cont).text(value.nombre_inmobiliaria);
                           $('#proyectoPago1valor'+cont).text(value.nombre_proyecto);
                           $('#fecha1valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));

                           $('#monto1valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
                       });
                        cont = 0;
                       $.each(data.fechapago2, function(index, value){
                            if(value.fecha_pago === null){
                               value.fecha_pago = 'no registra';
                            }
                            if(value.monto_pago === null){
                                value.monto_pago = '0.00';
                            }
                           cont++;
                           total_pago2 = total_pago2 + parseFloat(value.monto_pago);

                           $('#inmobiliariaPago2valor'+cont).text(value.nombre_inmobiliaria);
                           $('#proyectoPago2valor'+cont).text(value.nombre_proyecto);
                           $('#fecha2valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));

                           $('#monto2valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));

                       });
                        cont = 0;
                       $.each(data.fechapago3, function(index, value){

                            if(value.fecha_pago === null){
                               value.fecha_pago = 'no registra';
                            }
                            if(value.monto_pago === null){
                                value.monto_pago = '0.00';
                            }

                            cont++;
                            total_pago3 = total_pago3 + parseFloat(value.monto_pago);

                            $('#inmobiliariaPago3valor'+cont).text(value.nombre_inmobiliaria);
                            $('#proyectoPago3valor'+cont).text(value.nombre_proyecto);
                            $('#fecha3valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));
                            $('#monto3valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));

                       });
                       cont = 0;
                       $.each(data.fechapago4, function(index, value){
                            if(value.fecha_pago === null){
                               value.fecha_pago = 'no registra';
                            }
                            if(value.monto_pago === null){
                                value.monto_pago = '0.00';
                            }
                            cont++;
                            total_pago4 = total_pago4 + parseFloat(value.monto_pago);

                            $('#inmobiliariaPago4valor'+cont).text(value.nombre_inmobiliaria);
                            $('#proyectoPago4valor'+cont).text(value.nombre_proyecto);
                            $('#fecha4valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));
                            $('#monto4valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));

                       });
                       cont = 0;
                       $.each(data.fechapago5, function(index, value){
                            if(value.fecha_pago === null){
                               value.fecha_pago = 'no registra';
                            }
                            if(value.monto_pago === null){
                                value.monto_pago = '0.00';
                            }
                            cont++;
                            total_pago5 = total_pago5 + parseFloat(value.monto_pago);

                            $('#inmobiliariaPago5valor'+cont).text(value.nombre_inmobiliaria);
                            $('#proyectoPago5valor'+cont).text(value.nombre_proyecto);
                            $('#fecha5valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));
                            $('#monto5valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));

                       });

                       total_pagos = 0;

                       total_pagos = total_pago1+total_pago2+total_pago3+total_pago4+total_pago5;

                    $('#reporte_total_fechas').empty().append(
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pago 1:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-4 col-xs-4">'+
                                '<p><strong>$'+total_pago1.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pago 2:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                '<p><strong>$'+total_pago2.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pago 3:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                '<p><strong>$'+total_pago3.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pago 4:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                '<p><strong>$'+total_pago4.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pago 5:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                '<p><strong>$'+total_pago5.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pagos:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                '<p><strong>$'+total_pagos.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'
                    );
                    ////
                    $(function(){
                        $.fn.dataTable.ext.errMode = 'throw';
                        $('#tabla_finanzas_fecha').dataTable({
                            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                            buttons: [
                                {extend: 'copy',className: 'btn-sm'},
                                {extend: 'csv',title: 'ListadoClientes', className: 'btn-sm'},
                                {extend: 'pdf', title: 'Contratos por fecha <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
                            ]
                        });
                    });
                },
                error: function(xhr)
                {
                    console.log(xhr.responseText);
                }
            });//Fin ajax
        } else if(fecha_desde == "" && fecha_hasta != ""){
            $('#collapse_contrato_fechas').collapse('show');
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Filtrar por fechas menores a: '+fecha_hasta.split("-").reverse().join("-"));
            $.ajax({
                url: "buscar_contrato_por_fecha",
                type: "GET",
                dataType: 'json',
                data: {
                    "fecha_desde": fecha_desde,
                    "fecha_hasta": fecha_hasta
                },
                success: function(data)
                {
                //
                    console.log(data);
                    $("#fechas_contrato")[0].reset();
                    $('#tabla_finanzas_fecha').dataTable().fnDestroy();
                    cont = 0;
                    arrayCounts = [];
                    arrayCounts = data.counts;
                    maximo = 0;
                    total_pago1 = 0;
                    total_pago2 = 0;
                    total_pago3 = 0;
                    total_pago4 = 0;
                    total_pago5 = 0;
                    $('#datos_tabla_contrato_fecha').empty();

                    $.each(data.counts, function(index, value){

                        arrayCounts.push(value);

                    });

                    for(var i=0,len=arrayCounts.length;i<len;i++){
                        if(maximo < arrayCounts [i]){
                            maximo = arrayCounts [i];
                        }
                    }

                    for (e = 1; e <= maximo ; e++) {

                      $('#datos_tabla_contrato_fecha').append(

                        '<tr id="datos'+e+'">'+
                            '<td>'+e+'</td>'+
                            '<td id="inmobiliariaPago1valor'+e+'"></td>'+
                            '<td id="proyectoPago1valor'+e+'"></td>'+
                            '<td id="fecha1valor'+e+'"></td>'+
                            '<td id="monto1valor'+e+'"></td>'+
                            '<td></td>'+
                            '<td id="inmobiliariaPago2valor'+e+'"></td>'+
                            '<td id="proyectoPago2valor'+e+'"></td>'+
                            '<td id="fecha2valor'+e+'"></td>'+
                            '<td id="monto2valor'+e+'"></td>'+
                            '<td></td>'+
                            '<td id="inmobiliariaPago3valor'+e+'"></td>'+
                            '<td id="proyectoPago3valor'+e+'"></td>'+
                            '<td id="fecha3valor'+e+'"></td>'+
                            '<td id="monto3valor'+e+'"></td>'+
                            '<td></td>'+
                            '<td id="inmobiliariaPago4valor'+e+'"></td>'+
                            '<td id="proyectoPago4valor'+e+'"></td>'+
                            '<td id="fecha4valor'+e+'"></td>'+
                            '<td id="monto4valor'+e+'"></td>'+
                            '<td></td>'+
                            '<td id="inmobiliariaPago5valor'+e+'"></td>'+
                            '<td id="proyectoPago5valor'+e+'"></td>'+
                            '<td id="fecha5valor'+e+'"></td>'+
                            '<td id="monto5valor'+e+'"></td>'+
                        '</tr>'

                        );
                    }
                    //$.each(data.contratos, function(index, value){
                    //    if(value.pago1_fecha === null){
                    //        value.pago1_fecha = 'no registra';
                    //    }
                    //    if(value.monto_pago1 === null){
                    //        value.monto_pago1 = '0.00';
                    //    }
                    //    if(value.pago2_fecha === null){
                    //        value.pago2_fecha = 'no registra';
                    //    }
                    //    if(value.monto_pago2 === null){
                    //         value.monto_pago2 = '0.00';
                    //    }
                    //    if(value.pago3_fecha === null){
                    //        value.pago3_fecha = 'no registra';
                    //    }
                    //    if(value.monto_pago3 === null){
                    //        value.monto_pago3 = '0.00';
                    //    }
                    //    if(value.pago4_fecha === null){
                    //        value.pago4_fecha = 'no registra';
                    //    }
                    //    if(value.monto_pago4 === null){
                    //        value.monto_pago4 = '0.00';
                    //    }
                    //    if(value.pago5_fecha === null){
                    //        value.pago5_fecha = 'no registra';
                    //    }
                    //    if(value.monto_pago5 === null){
                    //        value.monto_pago5 = '0.00';
                    //    }
                    //    cont++;
                    //    total_pago1 = total_pago1 + parseFloat(value.monto_pago1);
                    //    total_pago2 = total_pago2 + parseFloat(value.monto_pago2);
                    //    total_pago3 = total_pago3 + parseFloat(value.monto_pago3);
                    //    total_pago4 = total_pago4 + parseFloat(value.monto_pago4);
                    //    total_pago5 = total_pago5 + parseFloat(value.monto_pago5);
                    //    total_pagos = total_pagos + parseFloat(value.monto_contrato);
                    //    $('#datos_tabla_contrato_fecha').append(
                    //        '<tr>'+
                    //            '<td>'+cont+'</td>'+
                    //            '<td>'+value.nombre_inmobiliaria+'</td>'+
                    //            '<td>'+value.nombre_proyecto+'</td>'+
                    //            '<td>'+value.fecha_inicio_instalacion.split("-").reverse().join("-")+'</td>'+
                    //            '<td>'+value.pago1_fecha.split("-").reverse().join("-")+'</td>'+
                    //            '<td>$'+parseFloat(value.monto_pago1).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                    //            '<td>'+value.pago2_fecha.split("-").reverse().join("-")+'</td>'+
                    //            '<td>$'+parseFloat(value.monto_pago2).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                    //            '<td>'+value.pago3_fecha.split("-").reverse().join("-")+'</td>'+
                    //            '<td>$'+parseFloat(value.monto_pago3).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                    //            '<td>'+value.pago4_fecha.split("-").reverse().join("-")+'</td>'+
                    //            '<td>$'+parseFloat(value.monto_pago4).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                    //            '<td>'+value.pago5_fecha.split("-").reverse().join("-")+'</td>'+
                    //            '<td>$'+parseFloat(value.monto_pago5).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                    //            '<td>$'+parseFloat(value.monto_contrato).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                    //        '</tr>'
                    //    );
                    //});
                    //
                    $.each(data.fechapago1, function(index, value){
                        if(value.fecha_pago === null){
                            value.fecha_pago = 'no registra';
                        }
                        if(value.monto_pago === null){
                            value.monto_pago = '0.00';
                        }
                        cont++;
                        total_pago1 = total_pago1 + parseFloat(value.monto_pago);

                        $('#inmobiliariaPago1valor'+cont).text(value.nombre_inmobiliaria);
                        $('#proyectoPago1valor'+cont).text(value.nombre_proyecto);
                        $('#fecha1valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));

                        $('#monto1valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
                    });
                    cont = 0;
                    $.each(data.fechapago2, function(index, value){
                        if(value.fecha_pago === null){
                           value.fecha_pago = 'no registra';
                        }
                        if(value.monto_pago === null){
                            value.monto_pago = '0.00';
                        }
                        cont++;
                        total_pago2 = total_pago2 + parseFloat(value.monto_pago);

                        $('#inmobiliariaPago2valor'+cont).text(value.nombre_inmobiliaria);
                        $('#proyectoPago2valor'+cont).text(value.nombre_proyecto);
                        $('#fecha2valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));

                        $('#monto2valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));

                    });
                    cont = 0;
                    $.each(data.fechapago3, function(index, value){

                        if(value.fecha_pago === null){
                           value.fecha_pago = 'no registra';
                        }
                        if(value.monto_pago === null){
                            value.monto_pago = '0.00';
                        }

                        cont++;
                        total_pago3 = total_pago3 + parseFloat(value.monto_pago);

                        $('#inmobiliariaPago3valor'+cont).text(value.nombre_inmobiliaria);
                        $('#proyectoPago3valor'+cont).text(value.nombre_proyecto);
                        $('#fecha3valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));
                        $('#monto3valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));

                    });
                    cont = 0;
                    $.each(data.fechapago4, function(index, value){
                        if(value.fecha_pago === null){
                           value.fecha_pago = 'no registra';
                        }
                        if(value.monto_pago === null){
                            value.monto_pago = '0.00';
                        }
                        cont++;
                        total_pago4 = total_pago4 + parseFloat(value.monto_pago);

                        $('#inmobiliariaPago4valor'+cont).text(value.nombre_inmobiliaria);
                        $('#proyectoPago4valor'+cont).text(value.nombre_proyecto);
                        $('#fecha4valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));
                        $('#monto4valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));

                    });
                    cont = 0;
                    $.each(data.fechapago5, function(index, value){
                        if(value.fecha_pago === null){
                           value.fecha_pago = 'no registra';
                        }
                        if(value.monto_pago === null){
                            value.monto_pago = '0.00';
                        }
                        cont++;
                        total_pago5 = total_pago5 + parseFloat(value.monto_pago);

                        $('#inmobiliariaPago5valor'+cont).text(value.nombre_inmobiliaria);
                        $('#proyectoPago5valor'+cont).text(value.nombre_proyecto);
                        $('#fecha5valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));
                        $('#monto5valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));

                    });

                       total_pagos = 0;

                       total_pagos = total_pago1+total_pago2+total_pago3+total_pago4+total_pago5;
                    $('#reporte_total_fechas').empty().append(
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pago 1:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-4 col-xs-4">'+
                                '<p><strong>$'+total_pago1.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pago 2:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                '<p><strong>$'+total_pago2.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pago 3:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                '<p><strong>$'+total_pago3.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pago 4:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                '<p><strong>$'+total_pago4.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pago 5:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                '<p><strong>$'+total_pago5.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                '<p><strong>Total Pagos:</strong></p>'+
                            '</div>'+
                            '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                '<p><strong>$'+total_pagos.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                            '</div>'+
                        '</div>'
                    );
                    //
                    $(function(){
                        $.fn.dataTable.ext.errMode = 'throw';
                        $('#tabla_finanzas_fecha').dataTable({
                            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                            buttons: [
                                {extend: 'copy',className: 'btn-sm'},
                                {extend: 'csv',title: 'ListadoClientes', className: 'btn-sm'},
                                {extend: 'pdf', title: 'Contratos por fecha <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
                            ]
                        });
                    });
                //
                },
                error: function(xhr)
                {
                    console.log(xhr.responseText);
                }
            });//Fin ajax
        } else {
            if(fecha_min >= fecha_max){
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error - Desde no puede ser mayor o igual a Hasta');
            } else {
                //Buscar por ambas fechas
                $('#collapse_contrato_fechas').collapse('show');
                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.success('Filtrar por fechas mayores a: '+fecha_desde.split("-").reverse().join("-")+' y menores a: '+fecha_hasta.split("-").reverse().join("-"));

               $.ajax({
                    url: "buscar_contrato_por_fecha",
                    type: "GET",
                    dataType: 'json',
                    data: {
                        "fecha_desde": fecha_desde,
                        "fecha_hasta": fecha_hasta
                    },
                    success: function(data)
                    {
                        console.log(data);
                        $("#fechas_contrato")[0].reset();
                        $('#tabla_finanzas_fecha').dataTable().fnDestroy();
                        cont = 0;
                        total_pago1 = 0;
                        total_pago2 = 0;
                        total_pago3 = 0;
                        total_pago4 = 0;
                        total_pago5 = 0;


                        $('#datos_tabla_contrato_fecha').empty();

                        maximo = 0;
                        arrayCounts = [];
                        arrayCounts = data.counts;

                        $.each(data.counts, function(index, value){

                            arrayCounts.push(value);

                        });

                        for(var i=0,len=arrayCounts.length;i<len;i++){
                            if(maximo < arrayCounts [i]){
                                maximo = arrayCounts [i];
                            }
                        }

                        for (e = 1; e <= maximo ; e++) {

                          $('#datos_tabla_contrato_fecha').append(

                            '<tr id="datos'+e+'">'+
                                '<td>'+e+'</td>'+
                                '<td id="inmobiliariaPago1valor'+e+'"></td>'+
                                '<td id="proyectoPago1valor'+e+'"></td>'+
                                '<td id="fecha1valor'+e+'"></td>'+
                                '<td id="monto1valor'+e+'"></td>'+
                                '<td></td>'+
                                '<td id="inmobiliariaPago2valor'+e+'"></td>'+
                                '<td id="proyectoPago2valor'+e+'"></td>'+
                                '<td id="fecha2valor'+e+'"></td>'+
                                '<td id="monto2valor'+e+'"></td>'+
                                '<td></td>'+
                                '<td id="inmobiliariaPago3valor'+e+'"></td>'+
                                '<td id="proyectoPago3valor'+e+'"></td>'+
                                '<td id="fecha3valor'+e+'"></td>'+
                                '<td id="monto3valor'+e+'"></td>'+
                                '<td></td>'+
                                '<td id="inmobiliariaPago4valor'+e+'"></td>'+
                                '<td id="proyectoPago4valor'+e+'"></td>'+
                                '<td id="fecha4valor'+e+'"></td>'+
                                '<td id="monto4valor'+e+'"></td>'+
                                '<td></td>'+
                                '<td id="inmobiliariaPago5valor'+e+'"></td>'+
                                '<td id="proyectoPago5valor'+e+'"></td>'+
                                '<td id="fecha5valor'+e+'"></td>'+
                                '<td id="monto5valor'+e+'"></td>'+
                            '</tr>'

                            );
                        }

                       $.each(data.fechapago1, function(index, value){
                           if(value.fecha_pago === null){
                               value.fecha_pago = 'no registra';
                           }
                           if(value.monto_pago === null){
                               value.monto_pago = '0.00';
                           }
                           cont++;
                           total_pago1 = total_pago1 + parseFloat(value.monto_pago);
                           //total_pago2 = total_pago2 + parseFloat(value.monto_pago2);
                           //total_pago3 = total_pago3 + parseFloat(value.monto_pago3);
                           //total_pago4 = total_pago4 + parseFloat(value.monto_pago4);
                           //total_pago5 = total_pago5 + parseFloat(value.monto_pago5);
                           //total_pagos = total_pagos + parseFloat(value.monto_contrato);
                          // $('#datos'+cont).append(
                          //         '<td>'+value.nombre_inmobiliaria+'</td>'+
                          //         '<td>'+value.nombre_proyecto+'</td>'+
                          //         //'<td>'+value.fecha_inicio_instalacion.split("-").reverse().join("-")+'</td>'+
                          //         '<td>'+value.fecha_pago.split("-").reverse().join("-")+'</td>'+
                          //         '<td>$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'
                          //         //'<td>'+value.pago2_fecha.split("-").reverse().join("-")+'</td>'+
                          //         //'<td>$'+parseFloat(value.monto_pago2).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                          //         //'<td>'+value.pago3_fecha.split("-").reverse().join("-")+'</td>'+
                          //         //'<td>$'+parseFloat(value.monto_pago3).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                          //         //'<td>'+value.pago4_fecha.split("-").reverse().join("-")+'</td>'+
                          //         //'<td>$'+parseFloat(value.monto_pago4).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                          //         //'<td>'+value.pago5_fecha.split("-").reverse().join("-")+'</td>'+
                          //         //'<td>$'+parseFloat(value.monto_pago5).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                          //         //'<td>$'+parseFloat(value.monto_contrato).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                          //
                          // );
                           $('#inmobiliariaPago1valor'+cont).text(value.nombre_inmobiliaria);
                           $('#proyectoPago1valor'+cont).text(value.nombre_proyecto);
                           $('#fecha1valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));

                           $('#monto1valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
                       });
                       cont = 0;
                       $.each(data.fechapago2, function(index, value){
                            if(value.fecha_pago === null){
                               value.fecha_pago = 'no registra';
                            }
                            if(value.monto_pago === null){
                                value.monto_pago = '0.00';
                            }
                           cont++;
                           total_pago2 = total_pago2 + parseFloat(value.monto_pago);

                           $('#inmobiliariaPago2valor'+cont).text(value.nombre_inmobiliaria);
                           $('#proyectoPago2valor'+cont).text(value.nombre_proyecto);
                           $('#fecha2valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));

                           $('#monto2valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));

                       //    $('#datos'+cont).append(

                       //            //'<td>'+cont+'</td>'+
                       //            '<td>'+value.nombre_inmobiliaria+'</td>'+
                       //            '<td>'+value.nombre_proyecto+'</td>'+
                       //            //'<td>'+value.fecha_inicio_instalacion.split("-").reverse().join("-")+'</td>'+
                       //            '<td>'+value.fecha_pago.split("-").reverse().join("-")+'</td>'+
                       //            '<td>$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'
                       //            //'<td>'+value.pago2_fecha.split("-").reverse().join("-")+'</td>'+
                       //            //'<td>$'+parseFloat(value.monto_pago2).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                       //            //'<td>'+value.pago3_fecha.split("-").reverse().join("-")+'</td>'+
                       //            //'<td>$'+parseFloat(value.monto_pago3).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                       //            //'<td>'+value.pago4_fecha.split("-").reverse().join("-")+'</td>'+
                       //            //'<td>$'+parseFloat(value.monto_pago4).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                       //            //'<td>'+value.pago5_fecha.split("-").reverse().join("-")+'</td>'+
                       //            //'<td>$'+parseFloat(value.monto_pago5).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+
                       //            //'<td>$'+parseFloat(value.monto_contrato).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</td>'+

                       //        );

                       });

                       cont = 0;
                       $.each(data.fechapago3, function(index, value){

                        if(value.fecha_pago === null){
                           value.fecha_pago = 'no registra';
                        }
                        if(value.monto_pago === null){
                            value.monto_pago = '0.00';
                        }

                        cont++;
                        total_pago3 = total_pago3 + parseFloat(value.monto_pago);

                        $('#inmobiliariaPago3valor'+cont).text(value.nombre_inmobiliaria);
                        $('#proyectoPago3valor'+cont).text(value.nombre_proyecto);
                        $('#fecha3valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));
                        $('#monto3valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));


                       });
                       cont = 0;
                       $.each(data.fechapago4, function(index, value){
                        if(value.fecha_pago === null){
                           value.fecha_pago = 'no registra';
                        }
                        if(value.monto_pago === null){
                            value.monto_pago = '0.00';
                        }
                        cont++;
                        total_pago4 = total_pago4 + parseFloat(value.monto_pago);

                        $('#inmobiliariaPago4valor'+cont).text(value.nombre_inmobiliaria);
                        $('#proyectoPago4valor'+cont).text(value.nombre_proyecto);
                        $('#fecha4valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));
                        $('#monto4valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));


                       });
                       cont = 0;
                       $.each(data.fechapago5, function(index, value){
                        if(value.fecha_pago === null){
                           value.fecha_pago = 'no registra';
                        }
                        if(value.monto_pago === null){
                            value.monto_pago = '0.00';
                        }
                        cont++;
                        total_pago5 = total_pago5 + parseFloat(value.monto_pago);

                        $('#inmobiliariaPago5valor'+cont).text(value.nombre_inmobiliaria);
                        $('#proyectoPago5valor'+cont).text(value.nombre_proyecto);
                        $('#fecha5valor'+cont).text(value.fecha_pago.split("-").reverse().join("-"));
                        $('#monto5valor'+cont).text('$'+parseFloat(value.monto_pago).toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));


                       });

                       total_pagos = 0;

                       total_pagos = total_pago1+total_pago2+total_pago3+total_pago4+total_pago5;
                        //
                       $('#reporte_total_fechas').empty().append(
                           '<div class="row">'+
                               '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                   '<p><strong>Total Pago 1:</strong></p>'+
                               '</div>'+
                               '<div class="col-md-3 col-sm-4 col-xs-4">'+
                                   '<p><strong>$'+total_pago1.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                               '</div>'+
                           '</div>'+
                           '<div class="row">'+
                               '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                   '<p><strong>Total Pago 2:</strong></p>'+
                               '</div>'+
                               '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                   '<p><strong>$'+total_pago2.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                               '</div>'+
                           '</div>'+
                           '<div class="row">'+
                               '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                   '<p><strong>Total Pago 3:</strong></p>'+
                               '</div>'+
                               '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                   '<p><strong>$'+total_pago3.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                               '</div>'+
                           '</div>'+
                           '<div class="row">'+
                               '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                   '<p><strong>Total Pago 4:</strong></p>'+
                               '</div>'+
                               '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                   '<p><strong>$'+total_pago4.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                               '</div>'+
                           '</div>'+
                           '<div class="row">'+
                               '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                   '<p><strong>Total Pago 5:</strong></p>'+
                               '</div>'+
                               '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                   '<p><strong>$'+total_pago5.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                               '</div>'+
                           '</div>'+
                           '<div class="row">'+
                               '<div class="col-md-2 col-sm-3 col-xs-4">'+
                                   '<p><strong>Total Pagos:</strong></p>'+
                               '</div>'+
                               '<div class="col-md-3 col-sm-3 col-xs-3">'+
                                   '<p><strong>$'+total_pagos.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')+'</strong></p>'+
                               '</div>'+
                           '</div>'
                       );
                        //
                       $(function(){
                           $.fn.dataTable.ext.errMode = 'throw';
                           $('#tabla_finanzas_fecha').dataTable({
                               dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                               "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                               buttons: [
                                   {extend: 'copy',className: 'btn-sm'},
                                   {extend: 'csv',title: 'ListadoClientes', className: 'btn-sm'},
                                   {extend: 'pdf', title: 'Contratos por fecha <?php //echo date("d-m-Y"); ?>', className: 'btn-sm'}
                               ]
                           });
                       });
                        //

                    },
                    error: function(xhr)
                    {
                        console.log(xhr.responseText);
                    }
                });//Fin ajax
            }
        }
        /*
         if(fecha_hasta == ""){
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Debe seleccionar fecha hasta');
        }

        if(fecha_min >= fecha_max) {
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Fecha desde no puede ser mayor');
        } else {
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.success('Fechas correctas');
        }
        */
    });


    /*

//$('#fecha_inicio_instalacion_inventario').append(fecha_inicio_instalacion.split("-").reverse().join("-"));


    */
    /*
    $('#btnVerContrato').on('click', function(e){
        e.preventDefault();

        contrato_id = $('#contrato').find(":selected").val();

        if(contrato_id == ""){
            $('#collapse_contrato').collapse('hide');
        } else {
            var datos_fecha_pago = new Array();
            var monto_total_pagos = '';
            alert(contrato_id);
        }
    });
    */
});//Fin document ready
</script>

<script>

</script>

<!--script>
function ver_contrato(id){
    $.get('contrato/'+id, function(data){
        console.log(data);
        $.each(data, function(index, obj){
            console.log(obj.nombre_proyecto);
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
            $('#modalContrato').modal('show');
            $('#listado_contrato').empty().append(
                '<div class="row">'+
                    '<div class="col-md-4">'+
                        '<h4 class="text-center text-info">DATOS DEL PROYECTO</h4>'+
                        '<hr style="border-color: #FFF;">'+
                        '<table cellpadding="1" cellspacing="1" class="table">'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td><strong>Nombre del proyecto:</strong></td>'+
                                    '<td>'+obj.nombre_proyecto+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Cantidad total de viviendas del proyecto:</strong></td>'+
                                    '<td>'+obj.total_viviendas_proyecto+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Dirección del proyecto:</strong></td>'+
                                    '<td>'+obj.direccion_proyecto+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Comuna del proyecto:</strong></td>'+
                                    '<td>'+obj.comuna_proyecto+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Fecha probable de entrega:</strong></td>'+
                                    '<td>'+obj.fecha_probable_entrega+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Sala de ventas:</strong></td>'+
                                    '<td>'+obj.sala_ventas+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Vivienda piloto:</strong></td>'+
                                    '<td>'+obj.vivienda_piloto+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Comuna piloto:</strong></td>'+
                                    '<td>'+obj.comuna_piloto+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Mandante:</strong></td>'+
                                    '<td>'+obj.mandante_proyecto+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Rut mandante</strong></td>'+
                                    '<td>'+obj.rut_mandante_proyecto+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Representante legal:</strong></td>'+
                                    '<td>'+obj.representante_legal_proyecto+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Rut representante legal:</strong></td>'+
                                    '<td>'+obj.rut_rep_legal+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Inscripción de personería jurídica:</strong></td>'+
                                    '<td>'+obj.ins_personeria_juridica+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Notario de inscripción:</strong></td>'+
                                    '<td>'+obj.notario_ins_proyecto+'</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
                    '<div class="col-md-4">'+
                        '<h4 class="text-center text-info">DATOS PARA FACTURA</h4>'+
                        '<hr style="border-color: #FFF;">'+
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
                                    '<td><strong>Encargado de finanzas:</strong></td>'+
                                    '<td>'+obj.encargado_finanzas+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Email encargado de finanzas:</strong></td>'+
                                    '<td>'+obj.email_encargado_finanzas+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Email DTE</strong></td>'+
                                    '<td>'+obj.email_dte+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Email PDF</strong></td>'+
                                    '<td>'+obj.email_pdf+'</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
                    '<div class="col-md-4">'+
                        '<h4 class="text-center text-info">DATOS RESPONSABLE DEL CONTRATO</h4>'+
                        '<hr style="border-color: #FFF;">'+
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
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
                '</div>'+
                '<hr>'+
                '<div class="row">'+
                    '<div class="col-md-4">'+
                        '<h4 class="text-center text-info">DATOS RESPONSABLE DE MARKETING</h4>'+
                        '<hr style="border-color: #FFF;">'+
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
                                    '<td><strong>Nombre de agencia externa:</strong></td>'+
                                    '<td>'+obj.nombre_agencia_externa+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Link oficial del proyecto:</strong></td>'+
                                    '<td>'+obj.url_oficial_proyecto+'</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
                    '<div class="col-md-4">'+
                        '<h4 class="text-center text-info">DATOS RESPONSABLE DE MARKETING</h4>'+
                        '<hr style="border-color: #FFF;">'+
                        '<table cellpadding="1" cellspacing="1" class="table">'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td><strong>Dirección representante legal:</strong></td>'+
                                    '<td>'+obj.direccion_representante_legal+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>N° Oficina Rep. legal:</strong></td>'+
                                    '<td>'+obj.oficina_representante_legal+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Comuna Rep. legal:</strong></td>'+
                                    '<td>'+obj.comuna_representante_legal+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Región Rep. legal:</strong></td>'+
                                    '<td>'+obj.region_representante_legal+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Nombre de la inmobiliaria:</strong></td>'+
                                    '<td>'+obj.nombre_inmobiliaria+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Fecha escritura personería:</strong></td>'+
                                    '<td>'+obj.fecha_escritura_personeria+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Notaría escritura personería:</strong></td>'+
                                    '<td>'+obj.notaria_escritura_personeria+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Nombre notario público:</strong></td>'+
                                    '<td>'+obj.nombre_notario_publico+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Número de contrato:</strong></td>'+
                                    '<td>'+obj.numero_contrato+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Mes:</strong></td>'+
                                    '<td>'+obj.mes_confeccion_contrato+'</td>'+
                                '</tr>'+
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
                                    '<td><strong>Instalación piloto:</strong></td>'+
                                    '<td>'+obj.instalacion_piloto+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Fecha capacitación personal ventas:</strong></td>'+
                                    '<td>'+obj.capacitacion_personal_ventas+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Monto contrato:</strong></td>'+
                                    '<td>'+obj.monto_contrato+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Fecha convenida:</strong></td>'+
                                    '<td>'+obj.fecha_convenida+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><strong>Fecha real:</strong></td>'+
                                    '<td>'+obj.fecha_real+'</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
                '</div>'
            );
        });
    });
}
</script-->

<!--script>
function editar_contrato(id){
    $.get('contrato/'+id, function(data){
        console.log(data);
        $('#modalEditarContrato').modal('show');
        $.each(data, function(index, value){
            $('#id_contrato').val(value.id);

            $('#proyecto_id').append('<option value="'+value.proyecto_id+'">'+value.nombre_proyecto+'</option>')

            if(value.estado_id == 6){
                var nombre_estado = 'activo';
            } else {
                var nombre_estado = 'inactivo';
            }
            $('#estado_proyecto2').val(value.estado_id);
            $('#estado_proyecto2').text('actual: '+nombre_estado);

            if(value.etapa_id == 1){
                var nombre_etapa = 'etapa1';
            } else {
                var nombre_etapa = 'etapa2';
            }
            $('#etapa_proyecto2').val(value.etapa_id);
            $('#etapa_proyecto2').text('actual: '+nombre_etapa);

            $('#total_viviendas_proyectos').val(value.total_viviendas_proyecto);

            $('#direccion_proyecto').val(value.direccion_proyecto);

            $('#comuna_proyecto').val(value.comuna_proyecto);

            $('#fecha_probable_entrega').val(value.fecha_probable_entrega);

            $('#sala_ventas').val(value.sala_ventas);

            $('#vivienda_piloto').val(value.vivienda_piloto);

            $('#comuna_piloto').val(value.comuna_piloto);

            $('#mandante_proyecto').val(value.mandante_proyecto);

            $('#rut_mandante_proyecto').val(value.rut_mandante_proyecto);

            $('#rep_legal_proyecto').val(value.representante_legal_proyecto);

            $('#rut_rep_legal').val(value.rut_rep_legal);

            $('#ins_personeria_juridica').val(value.ins_personeria_juridica);

            $('#notario_ins').val(value.notario_ins_proyecto);

            $('#razon_social_factura').val(value.razon_social);

            $('#giro_factura').val(value.giro_factura);

            $('#rut_factura').val(value.rut_factura);

            $('#direccion_factura').val(value.direccion_factura);

            $('#encargado_finanzas').val(value.encargado_finanzas);

            $('#email_encargado_finanzas').val(value.email_encargado_finanzas);

            $('#email_dte').val(value.email_dte);

            $('#email_pdf').val(value.email_pdf);

            $('#nombre_contacto_cont').val(value.nombre_responsable);

            $('#cargo_contacto_cont').val(value.cargo_responsable);

            $('#email_contacto_cont').val(value.email_responsable);

            $('#telefono_contacto_cont').val(value.telefono_responsable);

            $('#nombre_contacto_mkt').val(value.nombre_contacto_mkt);

            $('#cargo_contacto_mkt').val(value.cargo_contacto_mkt);

            $('#email_contacto_mkt').val(value.email_contacto_mkt);

            $('#nombre_agencia_externa').val(value.nombre_agencia_externa);

            $('#link_oficial_proyecto').val(value.url_oficial_proyecto);

            $('#direccion_rep_legal').val(value.direccion_representante_legal);

            $('#num_oficina_rep_legal').val(value.oficina_representante_legal);

            $('#comuna_rep_legal').val(value.comuna_representante_legal);

            $('#region_rep_legal').val(value.region_representante_legal);

            $('#nombre_inmobiliaria').val(value.nombre_inmobiliaria);

            $('#fecha_esc_personeria').val(value.fecha_escritura_personeria);

            $('#notaria_esc_personeria').val(value.notaria_escritura_personeria);

            $('#nom_notario_publico').val(value.nombre_notario_publico);

            $('#numero_contrato').val(value.numero_contrato);

            $('#mes_confeccion_contrato').val(value.mes_confeccion_contrato);

            $('#pago1_fecha').val(value.pago1_fecha);

            $('#pago2_fecha').val(value.pago2_fecha);

            $('#pago3_fecha').val(value.pago3_fecha);

            $('#fecha_instalacion_piloto').val(value.instalacion_piloto);

            $('#fecha_cap_personal_ventas').val(value.capacitacion_personal_ventas);

            $('#monto_contrato').val(value.monto_contrato);

            $('#fecha_convenida').val(value.fecha_convenida);

            $('#fecha_real').val(value.fecha_real);
        });
    });
}
</script-->

<!--script>
$(document).ready(function(){
    //Quitar puntos al digitar RUT
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

    //Quitar espacios al digitar RUT
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

    //Actualizar contrato
    $('#btnActualizarContrato').on('click', function(e){
        e.preventDefault();
        //alert('Update contrato');
        var id_contrato                 = $('#id_contrato').val();
        var estado_proyecto             = $('#estado_proyecto').find(':selected').val();
        var etapa_proyecto              = $('#etapa_proyecto').find(':selected').val();
        var proyecto_id                 = $('#proyecto_id').find(':selected').val();
        var nombre_proyecto             = $('#proyecto_id').find(':selected').text();
        var total_viviendas_proyectos   = $.trim($('#total_viviendas_proyectos').val());
        var direccion_proyecto          = $.trim($('#direccion_proyecto').val());
        var comuna_proyecto             = $.trim($('#comuna_proyecto').val());
        var fecha_probable_entrega      = $('#fecha_probable_entrega').val();
        var sala_ventas                 = $.trim($('#sala_ventas').val());
        var vivienda_piloto             = $.trim($('#vivienda_piloto').val());
        var comuna_piloto               = $.trim($('#comuna_piloto').val());
        var mandante_proyecto           = $.trim($('#mandante_proyecto').val());
        var rut_mandante_proyecto       = $.trim($('#rut_mandante_proyecto').val());
        var rep_legal_proyecto          = $.trim($('#rep_legal_proyecto').val());
        var rut_rep_legal               = $.trim($('#rut_rep_legal').val());
        var ins_personeria_juridica     = $.trim($('#ins_personeria_juridica').val());
        var notario_ins                 = $.trim($('#notario_ins').val());
        var razon_social_factura        = $.trim($('#razon_social_factura').val());
        var giro_factura                = $.trim($('#giro_factura').val());
        var rut_factura                 = $.trim($('#rut_factura').val());
        var direccion_factura           = $.trim($('#direccion_factura').val());
        var encargado_finanzas          = $.trim($('#encargado_finanzas').val());
        var email_encargado_finanzas    = $.trim($('#email_encargado_finanzas').val());
        var email_dte                   = $.trim($('#email_dte').val());
        var email_pdf                   = $.trim($('#email_pdf').val());
        var nombre_contacto_cont        = $.trim($('#nombre_contacto_cont').val());
        var cargo_contacto_cont         = $.trim($('#cargo_contacto_cont').val());
        var email_contacto_cont         = $.trim($('#email_contacto_cont').val());
        var telefono_contacto_cont      = $.trim($('#telefono_contacto_cont').val());
        var nombre_contacto_mkt         = $.trim($('#nombre_contacto_mkt').val());
        var cargo_contacto_mkt          = $.trim($('#cargo_contacto_mkt').val());
        var email_contacto_mkt          = $.trim($('#email_contacto_mkt').val());
        var nombre_agencia_externa      = $.trim($('#nombre_agencia_externa').val());
        var link_oficial_proyecto       = $.trim($('#link_oficial_proyecto').val());
        var direccion_rep_legal         = $.trim($('#direccion_rep_legal').val());
        var num_oficina_rep_legal       = $.trim($('#num_oficina_rep_legal').val());
        var comuna_rep_legal            = $.trim($('#comuna_rep_legal').val());
        var region_rep_legal            = $.trim($('#region_rep_legal').val());
        var nombre_inmobiliaria         = $('#nombre_inmobiliaria').val();
        var fecha_esc_personeria        = $('#fecha_esc_personeria').val();
        var notaria_esc_personeria      = $.trim($('#notaria_esc_personeria').val());
        var nom_notario_publico         = $.trim($('#nom_notario_publico').val());
        var numero_contrato             = $.trim($('#numero_contrato').val());
        var mes_confeccion_contrato     = $.trim($('#mes_confeccion_contrato').val());
        var pago1_fecha                 = $('#pago1_fecha').val();
        var pago2_fecha                 = $('#pago2_fecha').val();
        var pago3_fecha                 = $('#pago3_fecha').val();
        var fecha_instalacion_piloto    = $('#fecha_instalacion_piloto').val();
        var fecha_cap_personal_ventas   = $('#fecha_cap_personal_ventas').val();
        var monto_contrato              = $.trim($('#monto_contrato').val());
        var fecha_convenida             = $('#fecha_convenida').val();
        var fecha_real                  = $('#fecha_real').val();

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
                "estado_proyecto": estado_proyecto,
                "etapa_proyecto": etapa_proyecto,
                "proyecto_id": proyecto_id,
                "nombre_proyecto": nombre_proyecto,
                "total_viviendas_proyectos": total_viviendas_proyectos,
                "direccion_proyecto": direccion_proyecto,
                "comuna_proyecto": comuna_proyecto,
                "fecha_probable_entrega": fecha_probable_entrega,
                "sala_ventas": sala_ventas,
                "vivienda_piloto": vivienda_piloto,
                "comuna_piloto": comuna_piloto,
                "mandante_proyecto": mandante_proyecto,
                "rut_mandante_proyecto": rut_mandante_proyecto,
                "rep_legal_proyecto": rep_legal_proyecto,
                "rut_rep_legal": rut_rep_legal,
                "ins_personeria_juridica": ins_personeria_juridica,
                "notario_ins": notario_ins,
                "razon_social_factura": razon_social_factura,
                "giro_factura": giro_factura,
                "rut_factura": rut_factura,
                "direccion_factura": direccion_factura,
                "encargado_finanzas": encargado_finanzas,
                "email_encargado_finanzas": email_encargado_finanzas,
                "email_dte": email_dte,
                "email_pdf": email_pdf,
                "nombre_contacto_cont": nombre_contacto_cont,
                "cargo_contacto_cont": cargo_contacto_cont,
                "email_contacto_cont": email_contacto_cont,
                "telefono_contacto_cont": telefono_contacto_cont,
                "nombre_contacto_mkt": nombre_contacto_mkt,
                "cargo_contacto_mkt": cargo_contacto_mkt,
                "email_contacto_mkt": email_contacto_mkt,
                "nombre_agencia_externa": nombre_agencia_externa,
                "link_oficial_proyecto": link_oficial_proyecto,
                "direccion_rep_legal": direccion_rep_legal,
                "num_oficina_rep_legal": num_oficina_rep_legal,
                "comuna_rep_legal": comuna_rep_legal,
                "region_rep_legal": region_rep_legal,
                "nombre_inmobiliaria": nombre_inmobiliaria,
                "fecha_esc_personeria": fecha_esc_personeria,
                "notaria_esc_personeria": notaria_esc_personeria,
                "nom_notario_publico": nom_notario_publico,
                "numero_contrato": numero_contrato,
                "mes_confeccion_contrato": mes_confeccion_contrato,
                "pago1_fecha": pago1_fecha,
                "pago2_fecha": pago2_fecha,
                "pago3_fecha": pago3_fecha,
                "fecha_instalacion_piloto": fecha_instalacion_piloto,
                "fecha_cap_personal_ventas": fecha_cap_personal_ventas,
                "monto_contrato": monto_contrato,
                "fecha_convenida": fecha_convenida,
                "fecha_real": fecha_real
            },
            success: function(data)
            {
                console.log(data);
                if(data.resultado == 0){
                    $('#modalEditarContrato').modal('hide');
                    $("#listadoContratos").load("http://18.236.97.163:8001/contrato.listado #listadoContratos");
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
    });//Fin onClick
});//Fin DcReady
</script-->

<!--script>
function eliminar_contrato(id){
	swal({
    	title: "Estas seguro de eliminar el contrato ?",
    	text: "Se eliminará el contrato seleccionado.",
    	type: "warning",
    	showCancelButton: true,
    	confirmButtonColor: "#DD6B55",
    	confirmButtonText: "Si, eliminar!",
    	cancelButtonText: "Cancelar",
    	closeOnConfirm: false,
    },
    function (isConfirm) {
    	if (isConfirm) {
            $.ajaxSetup({
        		headers: {
            		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        		}
    		});
		    $.ajax({
		        url: 'contrato/'+id,
		        type: 'delete',
		        dataType: "JSON",
		        data: {
		            "id": id
		        },
		        success: function (data)
		        {
		            console.log(data);
		            if (data === 0) {
                    	$("#listadoContratos").load("http://18.236.97.163:8001/contrato.listado #listadoContratos");
                    	toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Contrato eliminado!');
		            } else {
		            	toastr.options = {
                			"debug": false,
                			"newestOnTop": false,
                			"positionClass": "toast-top-center",
                			"closeButton": true,
                			"toastClass": "animated fadeInDown",
            			};
            			toastr.error('Error - No se eliminó el contrato');
		            }
		        },
		        error: function(xhr) {
		         console.log(xhr.responseText);
		       }
		    });
        }
    });
}
</script-->

<!--script>
$(document).ready(function(){
	$('#datetimepicker1').datepicker();
   	$('#datetimepicker2').datepicker();
   	$('#listadoContratos').dataTable();
});
</script-->

<!--script>
function editarContrato(id) {
    $.ajax({
    	url: '/contrato.edit/'+id,
    	method: 'GET',
    	success: function(data){
    		console.log(data);
    		$('#modalEditarContrato').modal('show');
    		$.each(JSON.parse(data), function(index, contrato){
    			$('#idContrato').val(contrato.id);

    			$('#tipoProyectoUpdate').val(contrato.tipo_contrato);
    			$('#tipoProyectoUpdate').text(contrato.tipo_contrato);

    			$('#planUpdate').val(contrato.plan);
    			$('#planUpdate').text(contrato.plan);

    			$('#inmobiliaria_actual').val(contrato.inmobiliaria_id);
    			$('#inmobiliaria_actual').text(contrato.nombre_inmobiliaria);

    			$('#proyecto_actual').val(contrato.proyecto);
    			$('#proyecto_actual').text(contrato.proyecto);

    			$('#descuentoUpdate').val(contrato.descuento);
    			$('#descuentoUpdate').text(contrato.descuento);

    			$('#fecha_inicioUpdate').val(contrato.fecha_inicio);
    			$('#fecha_inicioUpdate').text(contrato.fecha_inicio);

    			$('#fecha_finUpdate').val(contrato.fecha_fin);
    			$('#fecha_finUpdate').text(contrato.fecha_fin);
    		});
    	},
    });

}
</script-->

<!--script>
function eliminarContrato(id) {
	swal({
    	title: "Estas seguro de eliminar el contrato ?",
    	text: "Se eliminará el contrato seleccionado.",
    	type: "warning",
    	showCancelButton: true,
    	confirmButtonColor: "#DD6B55",
    	confirmButtonText: "Si, eliminar!",
    	cancelButtonText: "Cancelar",
    	closeOnConfirm: false,
    },
    function (isConfirm) {
    	if (isConfirm) {
            $.ajaxSetup({
        		headers: {
            		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        		}
    		});
		    $.ajax({
		        url: '/contrato/'+id,
		        type: 'delete',
		        dataType: "JSON",
		        data: {
		            "id": id
		        },
		        success: function (data)
		        {
		            console.log(data);
		            if (data == 1) {
		            	$('#modalEditarContrato').modal('hide');
                    	swal("Contrato eliminado!");
                    	$("#listadoContratos").load("http://18.236.97.163:8001/contrato.listado #listadoContratos");
		            }
		        },
		        error: function(xhr) {
		         console.log(xhr.responseText);
		       }
		    });
        }
    });
}
</script-->

<!--script>
$(document).ready(function(){
    $('#inmobiliariaUpdate').on('change', function() {
        var inmobiliariaID = $(this).val();
        if(inmobiliariaID) {
            $.ajax({
                url: '/proyecto/'+inmobiliariaID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('#proyectoUpdate').empty();
                    $.each(data, function(index, proyecto) {
                        $('#proyectoUpdate').append('<option value="'+ proyecto.nombre +'">'+ proyecto.nombre +'</option>');
                    });
                }
            });
        } else {
            $('#proyectoUpdate').empty();
        }
    });
});
</script-->

<!--script>
$(document).ready(function(){
	$.ajaxSetup({
    	headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$('#btnActualizarContrato').on('click', function(){
		var id = $('#idContrato').val();
		$.ajax({
			url: "/contrato/"+id,
            type: "PUT",
            dataType: 'json',
            data: {
            	'tipoProyecto':$('#tipoProyectoUpdate').val(),
            	'plan':$('#planUpdate').val(),
            	'inmobiliaria':$('#inmobiliaria_actual').val(),
            	'proyecto':$('#proyectoUpdate').val(),
            	'descuento':$('#descuentoUpdate').val(),
            	'fecha_inicio':$('#fecha_inicioUpdate').val(),
            	'fecha_fin':$('#fecha_finUpdate').val()
            },
            success: function(data){
            	console.log(data);
            	$('#modalEditarContrato').modal('hide');
            	$("#listadoContratos").load("http://18.236.97.163:8001/contrato.listado #listadoContratos");
            }
		});
	});
});
</script-->

</body>
</html>
