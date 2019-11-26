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

    <div class="normalheader small-header">
        <div class="hpanel">
            <div class="panel-body">
                <a class="small-header-action" href="">
                    <div class="clip-header">
                        <i class="fa fa-arrow-down"></i>
                    </div>
                </a>

                <div id="hbreadcrumb" class="pull-right m-t-lg">
                    <ol class="hbreadcrumb breadcrumb">
                        <li><a href="{{ url('importar') }}">Importar cliente</a></li>
                        <li class="active">
                            <span>Importar</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Importar clientes
                </h2>
                <small>Importar clientes desde Excel</small>
            </div>
        </div>
    </div>

    <div class="normalheader">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Descargar plantilla para importar clientes
            </div>
            <div class="panel-body">
                <div class="col-md-3">
                    <div class="hpanel">
                        <div class="panel-body file-body">
                            <i class="fa fa-file-excel-o text-success"></i>
                        </div>
                        <div class="panel-footer">
                            <a href="/documento_excel/Plantilla_para_importar_clientes.xlsx" class="text-center" data-toggle="tooltip" data-placement="bottom" title="Descargar aqui la plantilla Excel para importación masiva de clientes">Descargar plantilla para importar clientes aqui</a>
                        </div>
                    </div>
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
                        <label for="inmobiliaria">Inmobiliarias</label>
                        <select class="form-control" id="inmobiliaria" name="inmobiliaria">
                            @foreach($inmobiliarias as $inmobiliaria)
                                <option value="{{$inmobiliaria->id}}">{{$inmobiliaria->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="">
                        <label for="proyectos">Proyectos</label>
                        <select class="form-control" id="proyectos" name="proyectos">
                            <option value=""></option>
                        </select>
                    </div>
                    <br>
                    <div id="demo" class="collapse">
                        <div class="row">
                            <div class="col-md-6">
                            <form class="form-inline" method="post" action="{{route('cliente.import')}}" enctype="multipart/form-data" id="importarExcel">
                                @csrf
                                <div class="form-group mb-2">
                                    <span>Importar Clientes desde Excel</span>
                                    <label for="cliente" class="sr-only">Importar datos desde excel</label>
                                    <input type="file" class="form-control-file" name="cliente" id="cliente" data-toggle="tooltip" data-placement="bottom" title="Seleccione el archivo excel">
                                    <span id="idProyecto">

                                    </span>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2" data-toggle="tooltip" data-placement="bottom" title="Se cargaran los datos del archivo excel adjunto">Importar Clientes</button>
                        </form>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary mb-2" id="btnModalAgregarCliente" data-toggle="modal" data-tooltip="tooltip" data-target="#modalAgregarCliente" data-placement="bottom" title="Esta opción es para agregar un cliente a través de un formulario">Agregar cliente desde formulario</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    Resultado
                </div>
            </div-->
        </div>

    </div>

</div>

<div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title text-center">Formulario para agregar cliente</h4>
            </div>
            <div class="modal-body" id="agregarCliente">

                <form class="form-horizontal" id="formAgregarCliente">
                    @csrf
                    <input type="hidden" id="form_proyecto_id" name="form_proyecto_id">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label class="col-sm-2 control-label" for="form_direccion">Dirección</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="form_direccion" name="form_direccion" maxlength="100">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="col-sm-2 control-label" for="form_num_documento">Número documento</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="form_num_documento" name="form_num_documento" maxlength="60">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label class="col-sm-2 control-label" for="form_nombre">Nombres</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="form_nombre" name="form_nombre" maxlength="100">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="col-sm-2 control-label" for="form_apellido">Apellidos</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="form_apellido" name="form_apellido" maxlength="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label class="col-sm-2 control-label" for="form_contacto">Contacto</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="form_contacto" name="form_contacto" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="col-sm-2 control-label" for="form_correo">Correo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="form_correo" name="form_correo">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label class="col-sm-2 control-label" for="form_telefono1">Télefono 1</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="form_telefono1" name="form_telefono1" maxlength="20">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="col-sm-2 control-label" for="form_telefono2">Télefono 2</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="form_telefono2" name="form_telefono2" maxlength="20">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label class="col-sm-2 control-label" for="form_estado">Estado</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="form_estado" name="form_estado">
                                        <option value="1">Contactado</option>
                                        <option value="2">No Contactado</option>
                                        <option value="3">Instalado</option>
                                        <option value="4">Agendado</option>
                                        <option value="5">Sin Información</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="col-sm-2 control-label" for="form_capacitacion">Capacitación</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="form_capacitacion" name="form_capacitacion">
                                        <option value="CAPACITADO">Capacitado</option>
                                        <option value="NO CAPACITADO">No Capacitado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="form_fecha_instalacion">Fecha instalación</label>
                            <div class="input-group date" id="datetimepicker1">
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                                <input type="text" class="form-control" id="form_fecha_instalacion" name="form_fecha_instalacion">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="form_fecha_emision_protocolo">Fecha emisión protocolo</label>
                            <div class="input-group date" id="datetimepicker2">
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                                <input type="text" class="form-control" id="form_fecha_emision_protocolo" name="form_fecha_emision_protocolo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="form_fecha_capacitacion">Fecha capacitación</label>
                            <div class="input-group date" id="datetimepicker3">
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                                <input type="text" class="form-control" id="form_fecha_capacitacion" name="form_fecha_capacitacion">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnFormAgregarCliente">Guardar cambios</button>
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
$(function(){
    $('#datetimepicker1').datepicker();
    $('#datetimepicker2').datepicker();
    $('#datetimepicker3').datepicker();
});
</script>

<script>
$(document).ready(function(){
    $('#inmobiliaria').on('change', function(e){
        console.log(e);
        var inm_id = e.target.value;
        //ajax
        $.get('/ajax-proyectos?inm_id=' + inm_id, function(data){
            //success data
            console.log(data);
            $('#proyectos').empty();
            $.each(data, function(home, proyectosObj){
                $('#proyectos').append('<option value="'+proyectosObj.id+'">'+proyectosObj.nombre+'</option>');
            });
            var id_proyecto = $('#proyectos').find(":selected").val();
            $('#idProyecto').empty();
            $("#idProyecto").append('<input type="hidden" name="id_proyecto" value="'+id_proyecto+'">');
        });
        $('#demo').collapse();
    });
    $('#proyectos').on('change', function(){
        //e.preventDefault();
        var id_proyecto = $('#proyectos').find(":selected").val();
        $('#idProyecto').empty();
        $("#idProyecto").append('<input type="hidden" name="id_proyecto" value="'+id_proyecto+'">');
    });
    // Modal
    $('#btnModalAgregarCliente').on('click', function(){
        //id_proyecto_form = $('#id_proyecto').val();
        var id_proyecto_form = $('#proyectos').find(":selected").val();
        $('#form_proyecto_id').val(id_proyecto_form);
    });
    // Enviar datos al servidor
    $('#btnFormAgregarCliente').on('click', function(e){

        e.preventDefault();

        var form_proyecto       = $('#form_proyecto_id').val();
        var form_direccion      = $('#form_direccion').val();
        var form_num_documento  = $('#form_num_documento').val();
        var form_nombre         = $('#form_nombre').val();
        var form_apellido       = $('#form_apellido').val();
        var form_contacto       = $('#form_contacto').val();
        var form_correo         = $('#form_correo').val();
        var form_telefono1      = $('#form_telefono1').val();
        var form_telefono2      = $('#form_telefono2').val();
        var form_estado         = $('#form_estado').val();
        var form_capacitacion   = $('#form_capacitacion').val();
        var form_fecha_instalacion          = $('#form_fecha_instalacion').val();
        var form_fecha_emision_protocolo    = $('#form_fecha_emision_protocolo').val();
        var form_fecha_capacitacion         = $('#form_fecha_capacitacion').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/api/agregar_cliente/",
            type: "GET",
            dataType: 'json',
            data: {
                _token : $('meta[name="csrf-token"]').attr('content'),
                'form_proyecto'     : form_proyecto,
                'form_direccion'    : form_direccion,
                'form_num_documento': form_num_documento,
                'form_nombre'       : form_nombre,
                'form_apellido'     : form_apellido,
                'form_contacto'     : form_contacto,
                'form_correo'       : form_correo,
                'form_telefono1'    : form_telefono1,
                'form_telefono2'    : form_telefono2,
                'form_estado'       : form_estado,
                'form_capacitacion' : form_capacitacion,
                'form_fecha_instalacion' : form_fecha_instalacion,
                'form_fecha_emision_protocolo' : form_fecha_emision_protocolo,
                'form_fecha_capacitacion' : form_fecha_capacitacion
            },
            success: function(data){
                console.log(data);
                $('#formAgregarCliente')[0].reset();
                $('#modalAgregarCliente').modal('hide');
                $("#resultado").empty().append('<div class="alert alert-success" role="alert"><strong>'+data.Mensaje+'</strong></div>').fadeOut(8000).hide(600);
            }
        });

    });
});
</script>

<script>
$(document).ready(function(){
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-tooltip="tooltip"]').tooltip();
    });
});
</script>

</body>
</html>
