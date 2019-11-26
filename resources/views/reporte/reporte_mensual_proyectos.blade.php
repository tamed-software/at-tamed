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
                        <li><a href="{{ url('reporteMensualProyectos') }}">Proyectos</a></li>
                        <li class="active">
                            <span>Reporte mensual</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Reporte mensual proyectos
                </h2>
                <small>Reporte mensual cantidad de viviendas por proyectos</small>
            </div>
        </div>
    </div>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel" id="filtrarGraficos">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    Proyectos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                            <h3 class="font-light m-b-xs text-center text-info">
                                Crear gráfico por fecha y estado
                            </h3>
                            <!-- br>
                            <p>Filtrar contrato con las siguientes opciones:</p>
                            <li>Desde una fecha determinada</li>
                            <li>Hasta una fecha determinada</li>
                            <li>Desde y hasta una fecha determinada donde la fecha desde no puede ser mayor a la fecha hasta</li>
                            <hr style="border-color: #FFF;" -->
                        </div>
                        <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                            <form id="form_grafico">
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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label">Selecione un estado</label>
                                            <select class="form-control" id="estado_cliente">
                                                <option value="">-- Seleccione un estado --</option>
                                                @foreach($estados as $estado)
                                                    @if($estado->id !== 6 && $estado->id !== 7 && $estado->id !== 9 && $estado->id !== 11)
                                                    <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <hr style="border-color: #FFF;">
                                    <button type="button" class="btn btn-lg btn-info btn-block" id="btnCrearGrafico">Crear gráfico por estados</button>
                                    <hr style="border-color: #FFF;">
                                </div>
                                @if(Auth::user()->perfil == 1 || Auth::user()->perfil == 2)
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <hr style="border-color: #FFF;">
                                    <button type="button" class="btn btn-lg btn-info btn-block" id="btnCrearGraficoProyecciones">Crear gráfico proyección instalaciones</button>
                                    <hr style="border-color: #FFF;">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" id="chart_div_fechas" style="height: 550px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 collapse" id="collapse_reporte">
                            <button type="button" class="btn btn-info btn-block" id="btnDetalleGrafico">Ver detalle</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" id="chart_div" style="height: 550px;">
                        </div>
                    </div>
             	</div>
            </div>
        </div>
    	<div>
			<div class="panel-body" id="graficos"></div>
		</div>
    </div>

</div>

<!-- Modal Vel listado PDF Protocolo -->
<div class="text-center">
    <div class="modal fade" id="modalReporteGrafico" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg2">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header text-center">
                    <h4 class="modal-title">Reporte gráfico</h4>
                    <small class="font-bold">Detalle del reporte filtrado.</small>
                </div>
                <div class="modal-body">
                    <form>
                        <table class="table" id="tabla_reporte">
                            <thead>
                                <tr>
                                    <th>Inmobiliaria</th>
                                    <th>Proyecto</th>
                                    <th>Fecha <br> Inicio Instalación <br> Contrato</th>
                                    <th>Estado</th>
                                    <th>Vivienda</th>
                                    <th>Fecha <br> Instalación cliente</th>
                                </tr>
                            </thead>
                            <tbody id="tabla_listado_reporte">
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

<!--Modal detalle-->
<div class="text-center">
    <div class="modal fade" id="modalReporteGraficoDetallado" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg2">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header text-center">
                    <h4 class="modal-title">Reporte gráfico</h4>
                    <small class="font-bold">Detalle del reporte filtrado.</small>
                </div>
                <div class="modal-body">
                    <form>
                        <table class="table" id="tabla_reporte_detallado">
                            <thead>
                                <tr>
                                    <th>Inmobiliaria</th>
                                    <th>Proyecto</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Vivienda</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Estado</th>
                                    <th>Fecha <br> Inicio Instalación <br> Contrato</th>
                                    <th>Fecha <br> Instalación cliente</th>
                                </tr>
                            </thead>
                            <tbody id="tabla_listado_reporte_detallado">
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

<!--Modal detalle-->
<div class="text-center">
    <div class="modal fade" id="modalReporteGraficoDetalladoProyectos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg2">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header text-center">
                    <h4 class="modal-title">Reporte gráfico</h4>
                    <small class="font-bold">Detalle del reporte filtrado.</small>
                </div>
                <div class="modal-body">
                    <form>
                        <table class="table" id="tabla_reporte_detallado_proyectos">
                            <thead>
                                <tr>
                                    <th>Inmobiliaria</th>
                                    <th>Proyecto</th>
                                    <th>Cant. <br> viviendas </th>
                                    <th>Fecha <br> Inicio Instalación <br>Por Contrato </th>
                                </tr>
                            </thead>
                            <tbody id="tabla_listado_reporte_detallado_proyectos">
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


<!--Modal detalle proyeccion-->
<div class="text-center">
    <div class="modal fade" id="modalReporteGraficoDetalladoProyeccion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg2">
            <div class="modal-content">
                <div class="color-line"></div>
                <div class="modal-header text-center">
                    <h4 class="modal-title">Reporte gráfico Proyección Instalaciones</h4>
                    <small class="font-bold">Detalle del reporte de proyección.</small>
                </div>
                <div class="modal-body">
                    <form>
                        <table class="table" id="tabla_reporte_detallado_proyeccion">
                            <thead>
                                <tr>
                                    <th>Inmobiliaria</th>
                                    <th>Proyecto</th>
                                    <th>Producto</th>
                                    <th>Cantidad Necesaria</th>
                                    <th>Personalizado</th>
                                </tr>
                            </thead>
                            <tbody id="tabla_listado_reporte_proyeccion">
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

<!-- Api Chart google -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
$(document).ready(function(){
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
});
</script>

<script>
$(function(){
    $('#datetimepicker1').datepicker();
    $('#datetimepicker2').datepicker();
});
</script>

<script>
//Gráficos por fecha de inicio y fin mas estado
$(document).ready(function(){
    $('#btnCrearGrafico').on('click', function(e){
        e.preventDefault();
        var fecha_desde = $('#fecha_desde').val();
        var fecha_hasta = $('#fecha_hasta').val();
        var fecha_min = $('#fecha_desde').datepicker('getDate');
        var fecha_max = $('#fecha_hasta').datepicker('getDate');
        var estado_cliente = $('#estado_cliente').find(":selected").val();
        var data_google = [];

        if(fecha_desde == "" && fecha_hasta == "" && estado_cliente == ""){
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Debe seleccionar fechas y un estado');
            return;
        } else if(fecha_desde == "" && fecha_hasta == ""){
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Debe seleccionar fechas');
            return;
        } else if(fecha_desde != "" && fecha_hasta == ""){
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Debe seleccionar fecha termino');
            return;
        } else if(fecha_desde == "" && fecha_hasta != "") {
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Debe seleccionar fecha inicio');
            return;
        } else if(fecha_min >= fecha_max) {
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Fecha de inicio no puede ser mayor a la fecha termino');
            return;
        } else {

            var ruta_base = '{{url("/")}}';
            $('#tabla_reporte').dataTable().fnDestroy();

            $.ajax({
                url: "crear_grafico_fecha_estado/",
                type: "GET",
                dataType: 'json',
                data: {
                    "fecha_inicio": fecha_desde,
                    "fecha_termino": fecha_hasta,
                    "estado_cliente": estado_cliente
                },
                success: function(data){
                    //console.log(data);
                    //console.log(data[0].reporte);
                    var estado = "";
                    $("#form_grafico")[0].reset();
                    $('#chart_div_fechas').empty();
                    $('#tabla_listado_reporte').empty();
                    $('#collapse_reporte').collapse('show');

                    $.each(data, function(index, value){
                        //console.log(value.reporte)
                        $.each(value.reporte, function(i,v){
                            //console.log(v.nombre_inmobiliaria);
                            if(v.estado_id === 8){
                                var estado_cliente = 'Instalado y capacitado';
                            } else if(v.estado_id === 1){
                                var estado_cliente = 'Contactado';
                            } else if(v.estado_id === 2){
                                var estado_cliente = 'No contactado';
                            } else if(v.estado_id === 3){
                                var estado_cliente = 'Instalado';
                            } else if(v.estado_id === 4){
                                var estado_cliente = 'Agendado';
                            } else if(v.estado_id === 5){
                                var estado_cliente = 'Sin información';
                            } else if(v.estado_id === 10){
                                var estado_cliente = 'Con observación';
                            }
                            estado = estado_cliente;
                            /*
                            if(v.pdf_protocolo === null){
                                v.pdf_protocolo = 'Sin protocolo';
                            } else {
                                v.pdf_protocolo = '<h2><a href='+ruta_base+v.pdf_protocolo+' target="_blank"><i class="fa fa-file-pdf-o text-danger"></i></a></h2>';
                            }
                            */
                            $('#tabla_listado_reporte').append(
                            '<tr>'+
                                '<td>'+v.nombre_inmobiliaria+'</td>'+
                                '<td>'+v.nombre_proyecto+'</td>'+
                                '<td>'+v.fecha_probable_entrega+'</td>'+
                                '<td>'+estado_cliente+'</td>'+
                                '<td>'+v.vivienda+'</td>'+
                                '<td>'+v.fecha_instalacion+'</td>'+
                            '</tr>'
                            );
                        });
                    });
                    $(function(){
                    $.fn.dataTable.ext.errMode = 'throw';
                        $('#tabla_reporte').dataTable({
                            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                            //"lengthMenu": [ [ -1,10, 25, 50], [10, 25, 50, "All"] ],
                            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                            buttons: [
                            {extend: 'copy',className: 'btn-sm'},
                            {extend: 'csv',title: 'Reporte', className: 'btn-sm'},
                            {extend: 'pdf', title: 'Reporte <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
                            ]
                        });
                    });

                    //for (var i=0;i<data.length;i++){
                        //console.log(data[i].reporte);
                    //}

                        data_google = [];
                        $.each(data, function(index, value){
                            data_google.push(
                                [
                                    value.anio_mes,
                                    value.cantidad_viviendas_fecha,
                                    value.cantidad_viviendas_estado
                                ],
                            );
                        });

                        //console.log(data_google);
                        //console.log(data_google.length);

                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(graficoPOrFechas);

                        function graficoPOrFechas(){

    						var data = new google.visualization.DataTable();

						        data.addColumn('string', 'Mes');
								data.addColumn('number', 'Cantidad');
								data.addColumn('number', estado);
								for (var i = 0; i < data_google.length; i++){
									data.addRows([
										[data_google[i][0], parseInt(data_google[i][1]), data_google[i][2]],
									]);
								}

                            var options = {
                                title : 'Cantidad de viviendas de proyectos por fechas',
                                vAxis: {title: 'Cantidad'},
                                hAxis: {title: 'Meses'},
                                seriesType: 'bars',
                                bar: {groupWidth: "80%"},
                                chartArea: {
                                    width: '90%',
                                    height:'60%'
                                },
                                legend: { position: "none" },
                                hAxis: {
                                    slantedText: true,
                                    slantedTextAngle: 90
                                }
                            };

                            var chart = new google.visualization.ComboChart(document.getElementById('chart_div_fechas'));

							function selectHandler() {

								var selection = chart.getSelection();
								for (var i = 0; i < selection.length; i++) {

									var item = selection[i];

									var fecha = data.getValue(chart.getSelection()[0].row, 0)
									var columna = item.column;
									var prueba = fecha +" "+columna+" "+estado_cliente;


									if(columna == 2){

										$.ajax({
              							 	url: "reporteMensualProyectosDetallado/",
              							 	type: "GET",
              							 	dataType: 'json',
              							 	data: {
              							 	    "fecha": fecha,
              							 	    "estado_id": estado_cliente,
                                                "columna": columna
              							 	},
              							 	success: function(data){

                                                $('#tabla_reporte_detallado').dataTable().fnDestroy();

							   					$('#tabla_listado_reporte_detallado').empty();

              							 		$.each(data, function(index, value){
                                                    if(value.nombre_cliente === null){
                                                        value.nombre_cliente = '';
                                                    }

                                                    if(value.cliente_apellido === null){
                                                        value.cliente_apellido = '';
                                                    }
                                                    if(value.viviendas === null){
                                                        value.viviendas = '';
                                                    }
                                                    if(value.telefono === null){
                                                        value.telefono = '';
                                                    }
                                                    if(value.correo === null){
                                                        value.correo = '';
                                                    }
                                                    if(value.fecha_instalacion === null){
                                                        value.fecha_instalacion = 'Sin información';
                                                    }
                                                    if(value.fecha_probable_entrega === null){
                                                        value.fecha_probable_entrega = 'Sin información';
                                                    }

                   								    $('#tabla_listado_reporte_detallado').append('<tr>'+
                   								    												    '<td>'+value.inmobiliaria+'</td>'+
                   								    												    '<td>'+value.proyecto+'</td>'+
                   								    												    '<td>'+value.nombre_cliente+'</td>'+
                   								    												    '<td>'+value.cliente_apellido+'</td>'+
                   								    												    '<td>'+value.viviendas+'</td>'+
                   								    												    '<td>'+value.telefono+'</td>'+
                   								    												    '<td>'+value.correo+'</td>'+
                   								    												    '<td>'+value.estado+'</td>'+
                   								    												    '<td>'+value.fecha_probable_entrega+'</td>'+
                                                                                                        '<td>'+value.fecha_instalacion+'</td>'+
                   								    												'</tr>'
                   								    );

                   								 });
                                                 $(function(){
                                                    $.fn.dataTable.ext.errMode = 'throw';
                                                    $('#tabla_reporte_detallado').dataTable({
                                                        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                                                        //"lengthMenu": [ [ -1,10, 25, 50], [10, 25, 50, "All"] ],
                                                        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                                                        buttons: [
                                                        {extend: 'copy',className: 'btn-sm'},
                                                        {extend: 'csv',title: 'Reporte', className: 'btn-sm'},
                                                        {extend: 'pdf', title: 'Reporte <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
                                                        ]
                                                    });
                                                });
							  				$('#modalReporteGraficoDetallado').modal('show');
              							 	},
              							 	error:function(xhr){
              							 		console.log(xhr.responseText);
              							 	}
										});

									}else if(columna == 1){
                                        $.ajax({
                                            url: "reporteMensualProyectosDetallado/",
                                            type: "GET",
                                            dataType: 'json',
                                            data: {
                                                "fecha": fecha,
                                                "estado_id": estado_cliente,
                                                "columna": columna
                                            },
                                            success: function(data){

                                                $('#tabla_reporte_detallado_proyectos').dataTable().fnDestroy();

                                                $('#tabla_listado_reporte_detallado_proyectos').empty();

                                                $.each(data, function(index, value){

                                                    $('#tabla_listado_reporte_detallado_proyectos').append('<tr>'+
                                                                                                    '<td>'+value.nombre_inmobiliaria+'</td>'+
                                                                                                    '<td>'+value.nombre_proyecto+'</td>'+
                                                                                                    '<td>'+value.total_viviendas_proyecto+'</td>'+
                                                                                                    '<td>'+value.fecha_probable_entrega+'</td>'+
                                                                                                '</tr>'
                                                    );

                                                });
                                                $('#modalReporteGraficoDetalladoProyectos').modal('show');

                                                 $(function(){
                                                    $.fn.dataTable.ext.errMode = 'throw';
                                                    $('#tabla_reporte_detallado_proyectos').dataTable({
                                                        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                                                        //"lengthMenu": [ [ -1,10, 25, 50], [10, 25, 50, "All"] ],
                                                        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                                                        buttons: [
                                                        {extend: 'copy',className: 'btn-sm'},
                                                        {extend: 'csv',title: 'Reporte', className: 'btn-sm'},
                                                        {extend: 'pdf', title: 'Reporte <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
                                                        ]
                                                    });
                                                });

                                            },
                                            error:function(xhr){
                                                console.log(xhr.responseText);
                                            }
                                        });
                                    }


								}


							}


       						google.visualization.events.addListener(chart, 'select', selectHandler);

                            chart.draw(data, options);
                        }//FIn funcion google

                    $(window).resize(function(){
                        graficoPOrFechas();
                    });

                },//Fin success
                error: function(xhr)
                {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    //Abrir modal reporte grafico
    $('#btnDetalleGrafico').on('click', function(e){
        e.preventDefault();
        $('#modalReporteGrafico').modal('show');
    });


    $('#btnCrearGraficoProyecciones').on('click', function(e){

        var fecha_desde = $('#fecha_desde').val();
        var fecha_hasta = $('#fecha_hasta').val();
        var fecha_min = $('#fecha_desde').datepicker('getDate');
        var fecha_max = $('#fecha_hasta').datepicker('getDate');
        var data_google = [];

        if(fecha_desde == "" && fecha_hasta == ""){
              toastr.options = {
                  "debug": false,
                  "newestOnTop": false,
                  "positionClass": "toast-top-center",
                  "closeButton": true,
                  "toastClass": "animated fadeInDown",
              };
              toastr.error('Error - Debe seleccionar fechas');
              return;
          } else if(fecha_desde != "" && fecha_hasta == ""){
              toastr.options = {
                  "debug": false,
                  "newestOnTop": false,
                  "positionClass": "toast-top-center",
                  "closeButton": true,
                  "toastClass": "animated fadeInDown",
              };
              toastr.error('Error - Debe seleccionar fecha termino');
              return;
          } else if(fecha_desde == "" && fecha_hasta != "") {
              toastr.options = {
                  "debug": false,
                  "newestOnTop": false,
                  "positionClass": "toast-top-center",
                  "closeButton": true,
                  "toastClass": "animated fadeInDown",
              };
              toastr.error('Error - Debe seleccionar fecha inicio');
              return;
          } else if(fecha_min >= fecha_max) {
              toastr.options = {
                  "debug": false,
                  "newestOnTop": false,
                  "positionClass": "toast-top-center",
                  "closeButton": true,
                  "toastClass": "animated fadeInDown",
              };
              toastr.error('Error - Fecha de inicio no puede ser mayor a la fecha termino');
              return;
          }else{

            $.ajax({
                url: "crear_grafico_proyeccion_instalaciones/",
                type: "GET",
                dataType: 'json',
                data: {
                    "fecha_inicio": fecha_desde,
                    "fecha_termino": fecha_hasta
                },
                success: function(data){
                    //console.log(data);
                    //console.log(data[0].reporte);
                    var estado = "";
                    console.log(data);
                    $("#form_grafico")[0].reset();
                    $('#chart_div_fechas').empty();
                    $('#tabla_listado_reporte').empty();
                    $('#collapse_reporte').collapse('show');


                        data_google = [];
                        $.each(data, function(index, value){
                            $equipos = value.suma;

                            data_google.push(
                                [
                                    value.fecha,
                                    value.sum,
                                    Math.round(value.division)
                                ],
                            );
                            console.log(value.division);
                        });
                        
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(graficoProyeccion);

                        function graficoProyeccion(){

                            var data = new google.visualization.DataTable();

                                data.addColumn('string', 'Mes');
                                data.addColumn('number', 'Cantidad');
                                data.addColumn({type: 'string', role: 'tooltip','p': {'html': true}});
                                for (var i = 0; i < data_google.length; i++){
                                    data.addRows([
                                        [data_google[i][0], parseInt(data_google[i][1]),createCustomHTMLContent(parseInt(data_google[i][1]), data_google[i][2])],
                                    ]);
                                }
                                //createCustomHTMLContent(parseInt(data_google[i][1]), data_google[i][2])
                            var options = {
                                title : 'Proyección instalaciones',
                                vAxis: {title: 'Cantidad'},
                                hAxis: {title: 'Meses'},
                                seriesType: 'bars',
                                bar: {groupWidth: "80%"},
                                chartArea: {
                                    width: '90%',
                                    height:'60%'
                                },
                                legend: { position: "none" },
                                hAxis: {
                                    slantedText: true,
                                    slantedTextAngle: 90
                                },
                                // Use an HTML tooltip.
                                tooltip: { isHtml: true }
                            };

                            var chart = new google.visualization.ComboChart(document.getElementById('chart_div_fechas'));
                            chart.draw(data, options);

                           function createCustomHTMLContent(totalSilver, totalBronze) {
                             return '<div style="padding:5px 5px 5px 5px;">' +
                                 '<td><p>Cantidad Instalaciones: '+totalSilver+'</p></td>' +
                                 '<td><p>Equipos recomendados: '+totalBronze+'</p></td>' +'</div>';
                           }

                            function selectHandler2() {

                                var selection = chart.getSelection();
                                for (var i = 0; i < selection.length; i++) {

                                    var item = selection[i];

                                    var fecha = data.getValue(chart.getSelection()[0].row, 0)

                                    $.ajax({
                                        url: "reporteProyeccionDetallado/"+fecha,
                                        type: "GET",
                                        dataType: 'json',
                                        data: {
                                        },
                                        success: function(data){


                                            console.log(data);

                                           $('#tabla_reporte_detallado_proyeccion').dataTable().fnDestroy();

                                           $('#tabla_listado_reporte_proyeccion').empty();

                                           $.each(data, function(index, value){

                                               $('#tabla_listado_reporte_proyeccion').append('<tr>'+
                                                                                               '<td>'+value.inmobiliaria+'</td>'+
                                                                                               '<td>'+value.nombre_proyecto+'</td>'+
                                                                                               '<td>'+value.producto+'</td>'+
                                                                                               '<td>'+value.cantidad+'</td>'+
                                                                                               '<td>'+value.personalizado+'</td>'+
                                                                                           '</tr>'
                                               );

                                           });
                                           $('#modalReporteGraficoDetalladoProyeccion').modal('show');

                                            $(function(){
                                               $.fn.dataTable.ext.errMode = 'throw';
                                               $('#tabla_reporte_detallado_proyeccion').dataTable({
                                                   dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                                                   //"lengthMenu": [ [ -1,10, 25, 50], [10, 25, 50, "All"] ],
                                                   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                                                   buttons: [
                                                   {extend: 'copy',className: 'btn-sm'},
                                                   {extend: 'csv',title: 'Reporte', className: 'btn-sm'},
                                                   {extend: 'pdf', title: 'Reporte <?php //echo date("d-m-Y"); ?>', className: 'btn-sm'}
                                                   ]
                                               });
                                           });

                                        },
                                        error:function(xhr){
                                            console.log(xhr.responseText);
                                        }
                                    });

                                }


                            }                            
                            google.visualization.events.addListener(chart, 'select', selectHandler2);
                            chart.draw(data, options);
                        }//FIn funcion google

                    $(window).resize(function(){
                        graficoProyeccion();
                    });

                },//Fin success
                error: function(xhr)
                {
                    console.log(xhr.responseText);
                }
            });

          }
    });
});
</script>

<script type="text/javascript">
    //Resumen gráficos año 2019
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {

        var data = google.visualization.arrayToDataTable([
            ['Month', 'Cantidad', 'Instalados y capacitados'],
            ['Enero',  <?php echo $cantidad_viviendas_enero_2019; ?>, <?php echo $instaladosCapacitados_enero_2019; ?>],
            ['Febrero',  <?php echo $cantidad_viviendas_febrero_2019; ?>, <?php echo $instaladosCapacitados_febrero_2019; ?>],
            ['Marzo',  <?php echo $cantidad_viviendas_marzo_2019; ?>, <?php echo $instaladosCapacitados_marzo_2019; ?>],
            ['Abril',  <?php echo $cantidad_viviendas_abril_2019; ?>, <?php echo $instaladosCapacitados_abril_2019; ?>],
            ['Mayo',  <?php echo $cantidad_viviendas_mayo_2019; ?>, <?php echo $instaladosCapacitados_mayo_2019; ?>],
            ['Junio',  <?php echo $cantidad_viviendas_junio_2019; ?>, <?php echo $instaladosCapacitados_junio_2019; ?>],
            ['Julio',  <?php echo $cantidad_viviendas_julio_2019; ?>, <?php echo $instaladosCapacitados_julio_2019; ?>],
            ['Agosto',  <?php echo $cantidad_viviendas_agosto_2019; ?>, <?php echo $instaladosCapacitados_agosto_2019; ?>],
            ['Septiembre',  <?php echo $cantidad_viviendas_septiembre_2019; ?>, <?php echo $instaladosCapacitados_septiembre_2019; ?>],
            ['Octubre',  <?php echo $cantidad_viviendas_octubre_2019; ?>, <?php echo $instaladosCapacitados_octubre_2019; ?>],
            ['Noviembre',  <?php echo $cantidad_viviendas_noviembre_2019; ?>, <?php echo $instaladosCapacitados_noviembre_2019; ?>],
            ['Diciembre',  <?php echo $cantidad_viviendas_diciembre_2019; ?>, <?php echo $instaladosCapacitados_diciembre_2019; ?>]
        ]);

        var options = {
            title : 'Cantidad de viviendas de proyectos año 2019: <?php echo $cantidad_viviendas_2019; ?>, instalados y capacitados <?php echo $instaladosCapacitados_2019; ?>',
            //colors: ['blue', 'green'],
            vAxis: {title: 'Cantidad'},
            hAxis: {title: 'Meses del año 2019'},
            seriesType: 'bars',
            bar: {groupWidth: "80%"},
            //series: {1: {type: 'line'}},
            chartArea: {
                width: '90%',
                height:'60%'
            },
            legend: { position: "none" },
            hAxis: {
                slantedText: true,
                slantedTextAngle: 90
            }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawVisualization();
    });
</script>

</body>
</html>
