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
                        <li class="active">
                            <span>Administración inmobiliarias proyectos</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Administración de Inmobiliarias y Proyectos
                </h2>
                <small>Administración de Inmobiliarias y Proyectos</small>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Administración de Inmobiliarias y Proyectos
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form id="form_inmobiliaria">
                            <h3 class="text-info text-center">Agregar inmobiliaria</h3>
                            <hr style="border-color: #FFF;">
                            <div class="form-group">
                                <label class="control-label" for="nombre_inmobiliaria">Nombre inmobiliaria <small><em>(requerido)</em></small></label>
                                <input type="text" class="form-control" id="nombre_inmobiliaria" name="nombre_inmobiliaria" maxlength="100" placeholder="Ingrese nombre de inmobiliaria">
                            </div>
                            <div class="form-group" id="addClassErrorNumDocInm">
                                <label class="control-label" for="num_doc_inmobiliaria">Número de documento</label>
                                <input type="text" class="form-control" id="num_doc_inmobiliaria" name="num_doc_inmobiliaria" maxlength="50" placeholder="Ingrese número de documento">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="estado_inmobiliaria">Estado <small><em>(requerido)</em></small></label>
                                <select class="form-control" id="estado_inmobiliaria" name="estado_inmobiliaria">
                                    <option value="">-- Seleccione un estado --</option>
                                    @foreach($estados as $estado)
                                        @if($estado->id === 6 || $estado->id === 7)
                                            <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <hr style="border-color: #FFF;">
                                <button type="button" class="btn btn-primary" id="btnAgregarInmobiliaria">Agregar inmobiliaria</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <form id="form_proyecto">
                            <hr style="border-color: #FFF;">
                            <h3 class="text-info text-center">Agregar proyecto</h3>
                            <hr style="border-color: #FFF;">
                            <div class="form-group">
                                <label class="control-label" for="inmobiliaria">Nombre inmobiliaria <small><em>(requerido)</em></small></label>
                                <select class="form-control" id="inmobiliaria" name="inmobiliaria">
                                    <!--option value=""></option-->
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="nombre_proyecto">Nombre del proyecto <small><em>(requerido)</em></small></label>
                                <input type="text" class="form-control" id="nombre_proyecto" name="nombre_proyecto" maxlength="100" placeholder="Ingrese nombre de proyecto">
                            </div>
                            <div class="form-group" id="addClassErrorNumDocPro">
                                <label class="control-label" for="num_doc_proyecto">Número documento</label>
                                <input type="text" class="form-control" id="num_doc_proyecto" name="num_doc_proyecto" maxlength="50" placeholder="Ingerse número de documento">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="direccion_proyecto">Dirección</label>
                                <input type="text" class="form-control" id="direccion_proyecto" name="direccion_proyecto" maxlength="200" placeholder="Dirección del proyecto">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="fecha_inicio_instalacion">Fecha inicio instalación</label>
                                <div class="input-group date" id="datetimepicker1">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                    <input type="text" class="form-control" id="fecha_inicio_instalacion" name="fecha_inicio_instalacion">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="fecha_termino_instalacion">Fecha termino instalación</label>
                                <div class="input-group date" id="datetimepicker2">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                    <input type="text" class="form-control" id="fecha_termino_instalacion" name="fecha_termino_instalacion">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="estado_proyecto">Estado <small><em>(requerido)</em></small></label>
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
                                <label class="control-label">Cantidad de viviendas</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese cantidad de viviendas del proyecto">
                            </div>
                            <div class="form-group">
                                <hr style="border-color: #FFF;">
                                <button type="button" class="btn btn-primary" id="btnAgregarProyecto">Agregar proyecto</button>
                            </div>
                        </form>
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
$(function(){
    $('#datetimepicker1').datepicker();
    $('#datetimepicker2').datepicker();
});
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

$("#num_doc_inmobiliaria").on('change', function(){
    if (Fn.validaRut($("#num_doc_inmobiliaria").val())){
        //$("#msgerror").html("El rut ingresado es válido");
        $('#addClassErrorNumDocInm').removeClass('has-error has-feedback');
    } else {
        //$("#msgerror").html("El Rut no es válido :'( ");
        $('#addClassErrorNumDocInm').addClass('has-error has-feedback');
        alert('RUT ingresado no es valido');
    }
});

$("#num_doc_proyecto").on('change', function(){
    if (Fn.validaRut($("#num_doc_proyecto").val())){
        //$("#msgerror").html("El rut ingresado es válido");
        $('#addClassErrorNumDocPro').removeClass('has-error has-feedback');
    } else {
        //$("#msgerror").html("El Rut no es válido :'( ");
        $('#addClassErrorNumDocPro').addClass('has-error has-feedback');
        alert('RUT ingresado no es valido');
    }
});
</script>

<script>
$(window).load(function(){
    $.get('/api/inmobiliaria', function(data){
        //console.log(data);
        $('#inmobiliaria').empty();
        $('#inmobiliaria').append('<option value="">-- Seleccione inmobiliaria --</option>');
        $.each(data, function(index, inmobiliaria){
            //console.log(inmobiliaria.id+' '+inmobiliaria.nombre);
            $('#inmobiliaria').append('<option value="'+inmobiliaria.id+'">'+inmobiliaria.nombre+'</option>');
        });
    });
});
</script>

<!-- Función sumar 90 días al setear fecha de instalacion -->
<script>
$(document).ready(function(){
    $('#fecha_inicio_instalacion').on('change', function(e){
        e.preventDefault();
        var fecha_termino = $('#fecha_inicio_instalacion').datepicker('getDate');
        fecha_termino.setDate(fecha_termino.getDate() + 90);
        $('#fecha_termino_instalacion').datepicker('setDate', fecha_termino);
    });
});
</script>

<script>
$(document).ready(function(){
    // Quitar puntos
    $('#num_doc_inmobiliaria').keyup(function(){
        var quitarPunto = $(this).val();
        var rutSinPuntos = quitarPunto.replace(".", "");
        $('#num_doc_inmobiliaria').val(rutSinPuntos);
    });
    // Quitar espacios
    $('#num_doc_inmobiliaria').keyup(function(){
        var quitarEspacio = $(this).val();
        var rutSinEspacio = quitarEspacio.replace(" ", "");
        $('#num_doc_inmobiliaria').val(rutSinEspacio);
    });
    // Quitar puntos
    $('#num_doc_proyecto').keyup(function(){
        var quitarPunto = $(this).val();
        var rutSinPuntos = quitarPunto.replace(".", "");
        $('#num_doc_proyecto').val(rutSinPuntos);
    });
    // Quitar espacios
    $('#num_doc_proyecto').keyup(function(){
        var quitarEspacio = $(this).val();
        var rutSinEspacio = quitarEspacio.replace(" ", "");
        $('#num_doc_proyecto').val(rutSinEspacio);
    });

    // Agregar inmobiliaria
    $('#btnAgregarInmobiliaria').on('click', function(){

        var nombre_inmobiliaria  = $.trim($('#nombre_inmobiliaria').val());
        var num_doc_inmobiliaria = $.trim($('#num_doc_inmobiliaria').val());
        var estado_inmobiliaria  = $('#estado_inmobiliaria').find(':selected').val();

        if(nombre_inmobiliaria == ''){
            //alert('Nom vacio');
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Por favor ingrese un nombre de inmobiliaria');
        } else {
            //alert('OK');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'agregarinmobiliariaproyecto/',
                type: 'GET',
                dataType: "JSON",
                data: {
                    'nombre_inmobiliaria': nombre_inmobiliaria,
                    'num_doc_inmobiliaria': num_doc_inmobiliaria,
                    'estado_inmobiliaria': estado_inmobiliaria
                },
                success: function(data){
                    console.log(data);

                    if(data == 0 ){
                        toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Error, ya existe una inmobiliaria con el nombre: '+ nombre_inmobiliaria.toUpperCase());
                    }else{

                     $.get('/api/inmobiliaria', function(data){
                     console.log(data);
                     $('#inmobiliaria').empty();
                     $('#inmobiliaria').append('<option value="">-- Seleccione inmobiliaria --</option>');
                     $.each(data, function(index, inmobiliaria){
                         console.log(inmobiliaria.id+' '+inmobiliaria.nombre);
                         $('#inmobiliaria').append('<option value="'+inmobiliaria.id+'">'+inmobiliaria.nombre+'</option>');
                     });
                    });

                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Inmobiliaria agregada');
                    if($('#addClassErrorNumDocInm').is('.has-error.has-feedback')){
                        $('#addClassErrorNumDocInm').removeClass('has-error has-feedback');
                    }
                    $("#form_inmobiliaria")[0].reset();

                    }

                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }//Fin else
    });// Fin agregar inmobiliaria

    //Agregar proyecto
    $('#btnAgregarProyecto').on('click', function(){

        var inmobiliaria        = $('#inmobiliaria').find(':selected').val();
        var estado_proyecto     = $('#estado_proyecto').find(':selected').val();
        var nombre_proyecto     = $.trim($('#nombre_proyecto').val());
        var num_doc_proyecto    = $.trim($('#num_doc_proyecto').val());
        var direccion_proyecto  = $.trim($('#direccion_proyecto').val());
        var fecha_inicio_instalacion = $('#fecha_inicio_instalacion').val();
        var fecha_termino_instalacion = $('#fecha_termino_instalacion').val();
        var cantidad_viviendas = $.trim($('#cantidad').val());

        if(inmobiliaria == '' || estado_proyecto == '' || nombre_proyecto == ''){
            //alert('mal');
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Por favor seleccione una inmobiliaria, un estado e ingrese un nombre');
        } else {
            //alert('ok');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'agregar_proyecto/',
                type: 'GET',
                dataType: "JSON",
                data: {
                    'inmobiliaria': inmobiliaria,
                    'estado_proyecto': estado_proyecto,
                    'nombre_proyecto': nombre_proyecto,
                    'num_doc_proyecto': num_doc_proyecto,
                    'direccion_proyecto': direccion_proyecto,
                    'fecha_inicio_instalacion': fecha_inicio_instalacion,
                    'fecha_termino_instalacion': fecha_termino_instalacion,
                    'cantidad_viviendas': cantidad_viviendas
                },
                success: function(data){
                    console.log(data);
                    if(data == 0){
                        toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                     toastr.success('Error, ya existe un proyecto con el nombre: '+nombre_proyecto);
                    }else{
                        toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Proyecto agregado');
                    if($('#addClassErrorNumDocPro').is('.has-error.has-feedback')){
                        $('#addClassErrorNumDocPro').removeClass('has-error has-feedback');
                    }
                    $("#form_proyecto")[0].reset();
                    }

                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }
    });
});
</script>

<!--script>
$(function(){
    $('#datetimepicker1').datepicker();
    $('#datetimepicker2').datepicker();
    $('#datetimepicker3').datepicker();
});
</script-->

<!--script>
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

        if (form_proyecto == '' || form_direccion == '' || form_num_documento == '') {
            swal({
                title: "Faltan datos",
                text: "Por favor completar los datos del formulario."
            });
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/api/cliente/",
                type: "POST",
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
        }
    });
});
</script-->

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
