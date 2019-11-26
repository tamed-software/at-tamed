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
    <link rel="shortcut icon" type="image/ico" href="icons/favicon.png" />

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/metisMenu/dist/metisMenu.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/lib/sweet-alert.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fooTable/css/footable.core.min.css') }}" />
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
            <img src="icons/logo_tamed_login.png" class="img-responsive">
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
                <a href="#"><span class="nav-label">Proyectos</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('home2') }}">Resumen general</a></li>
                    <li><a href="{{ url('reporteProyectos') }}">Reportes</a></li>
                    <li><a href="{{ url('reporteMensualProyectos') }}">Reportes mensuales</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('cliente') }}"> <span class="nav-label">Buscar proyectos</span></a>
            </li>
            <li>
                <a href="{{ url('importar') }}"> <span class="nav-label">Importar proyectos</span></a>
            </li>
            <li>
                <a href="#"><span class="nav-label">Contrato</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('contrato.index') }}">Crear</a></li>
                    <li><a href="{{ url('contrato.listado') }}">Ver</a></li>
                    <li><a href="{{ url('contrato.finanza') }}">Finanzas</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Adm inmobiliaria</span><span class="fa arrow"></span> </a>
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
                    <li><a href="{{ url('producto.editar') }}">Editar productos</a></li>
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
                        <li><a href="{{ url('producto.editar') }}">Productos</a></li>
                        <li class="active">
                            <span>Listado de productos</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Productos
                </h2>
                <small>Listado de productos TAMED</small>
                <button id="btnVolverACargar" style="display: none"></button>
            </div>
        </div>
    </div>
    
<div class="content">
    <div class="hpanel">
        <div class="panel-heading">
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
            </div>
            Listado de Productos
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="text" class="form-control input-sm m-b-md" id="filter" placeholder="Search in table">
                    <table id="example2" class="footable table table-stripped toggle-arrow-tiny" data-page-size="50" data-filter=#filter>
                        <thead>
                            <tr>
                                <th data-toggle="true">Acción</th>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Tiempo instalación en hora</th>
                                <th>Tiempo capacitación en hora</th>
                                <th data-hide="all">Código</th>
                                <th data-hide="all">Producto</th>
                                <th data-hide="all">Tiempo instalación en hora</th>
                                <th data-hide="all">Tiempo configuración en hora</th>
                                <th data-hide="all">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="datos_productos">
                            @foreach($productos as $producto)
                            <tr>
                                <td bgcolor="#ffb606" style="color: #FFF;">Editar</td>
                                <td>{{ $producto->codigo }}</td>
                                <td>{{ $producto->producto }}</td>
                                <td>{{ $producto->tiempo_instalacion_hora }}</td>
                                <td>{{ $producto->tiempo_configuracion_hora }}</td>
                                <td>
                                    <span class="pie">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="codigo{{$producto->id}}" name="codigo{{$producto->id}}" value="{{ $producto->codigo }}">
                                        </div>
                                    </span>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="producto{{$producto->id}}" name="producto{{$producto->id}}" value="{{ $producto->producto }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tiempo_ins_{{$producto->id}}" name="tiempo_ins_{{$producto->id}}" value="{{ $producto->tiempo_instalacion_hora }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tiempo_con_{{$producto->id}}" name="tiempo_con_{{$producto->id}}" value="{{ $producto->tiempo_configuracion_hora }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-info" onclick="editar_producto({{ $producto->id }})">Guardar</button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="eliminar_producto({{ $producto->id }})">Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
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
            <div class="modal-body">
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

<!-- App scripts -->
<script src="{{ asset('scripts/homer.js') }}"></script>

<script>
$(function(){
    //$('#example1').footable();
    $('#example2').footable();
});
</script>

<!--script>
<?php
    //foreach($nuevoproyectos as $n){
    ?>
    $(function(){
        $('#datetimepicker_ini<?php //echo $n->id; ?>').datepicker();
        $('#datetimepicker_ter<?php //echo $n->id; ?>').datepicker();
    });
    <?php
    //}                   
?>
</script-->

<script>
$(document).ready(function(){
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
});
</script>

<script>
$(document).ready(function(){   

});
</script>

<script>
function editar_producto(id){
    //alert(id);

    var codigo_producto             = $("#codigo"+id+"").val();
    var nombre_producto             = $("#producto"+id+"").val();
    var tiempo_instalacion_hora     = $("#tiempo_ins_"+id+"").val();
    var tiempo_configuracion_hora   = $("#tiempo_con_"+id+"").val();

    console.log(id);
    console.log(codigo_producto);
    console.log(nombre_producto);
    console.log(tiempo_instalacion_hora);
    console.log(tiempo_configuracion_hora);

    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "producto/"+id, 
        type: "PUT",
        dataType: 'json',
        data: {
            "codigo_producto": codigo_producto,
            "nombre_producto": nombre_producto,
            "tiempo_instalacion_hora": tiempo_instalacion_hora,  
            "tiempo_configuracion_hora": tiempo_configuracion_hora
        },
        success: function(data){
            console.log(data);
            if(data.resultado === 0){
                $('#datos_productos').empty();
                $.each(data.productos, function(index, value){
                    $('table tbody').append(
                    '<tr>'+
                        '<td bgcolor="#ffb606" style="color: #FFF;">Editar</td>'+
                        '<td>'+value.codigo+'</td>'+
                        '<td>'+value.producto+'</td>'+
                        '<td>'+value.tiempo_instalacion_hora+'</td>'+
                        '<td>'+value.tiempo_configuracion_hora+'</td>'+
                        '<td>'+
                            '<span class="pie">'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" id="codigo'+value.id+'" name="codigo'+value.id+'" value="'+value.codigo+'">'+
                                '</div>'+
                            '</span>'+
                        '</td>'+
                        '<td>'+
                            '<div class="form-group">'+
                                '<input type="text" class="form-control" id="producto'+value.id+'" name="producto'+value.id+'" value="'+value.producto+'">'+
                            '</div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="form-group">'+
                                '<input type="text" class="form-control" id="tiempo_ins_'+value.id+'" name="tiempo_ins_'+value.id+'" value="'+value.tiempo_instalacion_hora+'">'+
                            '</div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="form-group">'+
                                '<input type="text" class="form-control" id="tiempo_con_'+value.id+'" name="tiempo_con_'+value.id+'" value="'+value.tiempo_configuracion_hora+'">'+
                            '</div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="form-group">'+
                                '<button type="button" style="margin-right: 5px;" class="btn btn-sm btn-info" onclick="editar_producto('+value.id+')">Guardar</button>'+
                                '<button type="button" class="btn btn-sm btn-danger" onclick="eliminar_producto('+value.id+')">Eliminar</button>'+
                            '</div>'+
                        '</td>'+
                    '</tr>'
                    ).trigger('footable_redraw');
                });
                $(function(){
                    $('#example2').footable();
                });
                toastr.options = {
                    "debug": true,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.success('Producto actualizado');
            } else {
                toastr.options = {
                    "debug": true,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error en actualizar el producto');  
            }
        }
    });
    
    /*

    var num_doc = $('#'+id+'doc').val();
    var nom = $('#'+id+'nom').val();
    var dir = $('#'+id+'dir').val();
    var ini = $('#'+id+'ini').val();
    var ter = $('#'+id+'ter').val();
    var can = $('#'+id+'can').val();
    
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "producto/"+id, 
        type: "PUT",
        dataType: 'json',
        data: {
            "documento": num_doc,
            "nombre": nom,
            "direccion": dir,  
            "fecha_inicio": ini,    
            "fecha_termino": ter,
            "cantidad": can
        },
        success: function(data){
            console.log(data);
            if(data.resultado === 0){
                $('#datos_tabla_productos').empty();
                $.each(data.nuevoproyectos, function(index, value){
                    $('table tbody').append(
                        '<tr>'+
                            '<td bgcolor="#ffb606" style="color: #FFF;">Editar</td>'+
                            '<td>'+value.num_documento+'</td>'+
                            '<td>'+value.nombre+'</td>'+
                            '<td>'+value.direccion+'</td>'+
                            '<td>'+value.fecha_inicio_instalacion+'</td>'+
                            '<td>'+value.fecha_termino_instalacion+'</td>'+
                            '<td>'+value.cantidad+'</td>'+
                            '<td>'+
                                '<span class="pie">'+
                                    '<div class="form-group">'+
                                        '<input type="text" class="form-control" id="'+value.id+'doc" name="'+value.id+'doc" value="'+value.num_documento+'">'+
                                    '</div>'+
                                '</span>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" id="'+value.id+'nom" name="'+value.id+'nom" value="'+value.nombre+'">'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" id="'+value.id+'dir" name="'+value.id+'dir" value="'+value.direccion+'">'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<div class="input-group date" id="datetimepicker_ini'+value.id+'">'+
                                        '<span class="input-group-addon">'+
                                            '<span class="fa fa-calendar"></span>'+
                                        '</span>'+
                                        '<input type="text" class="form-control" id="'+value.id+'ini" name="'+value.id+'ini" value="'+value.fecha_inicio_instalacion+'">'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<div class="input-group date" id="datetimepicker_ter'+value.id+'">'+
                                        '<span class="input-group-addon">'+
                                            '<span class="fa fa-calendar"></span>'+
                                        '</span>'+
                                        '<input type="text" class="form-control" id="'+value.id+'ter" name="'+value.id+'ter" value="'+value.fecha_termino_instalacion+'">'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" id="'+value.id+'can" name="'+value.id+'can" value="'+value.cantidad+'">'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<button type="button" style="margin-right: 5px;" class="btn btn-sm btn-info" onclick="editar_producto('+value.id+')">Guardar</button>'+
                                    '<button type="button" class="btn btn-sm btn-danger" onclick="eliminar_producto('+value.id+')">Eliminar</button>'+
                                '</div>'+
                            '</td>'+
                        '</tr>'
                    ).trigger('footable_redraw');
                    $(function(){
                        $("#datetimepicker_ini"+value.id+"").datepicker();
                        $("#datetimepicker_ter"+value.id+"").datepicker();
                    });
                });
                $(function(){
                    $('#example1').footable();
                });
                toastr.options = {
                    "debug": true,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.success('Producto actualizado');  
            } else {
                toastr.options = {
                    "debug": true,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error en actualizar producto');  
            }
        },
    });
    */
}
</script>

<script>
function eliminar_producto(id){
    alert(id);
    /*
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "producto/"+id, 
        type: "delete",
        dataType: 'json',
        success: function(data){
            console.log(data);
            if(data.resultado === 0){
                $('#datos_tabla_productos').empty();
                $.each(data.nuevoproyectos, function(index, value){
                    $('table tbody').append(
                        '<tr>'+
                            '<td bgcolor="#ffb606" style="color: #FFF;">Editar</td>'+
                            '<td>'+value.num_documento+'</td>'+
                            '<td>'+value.nombre+'</td>'+
                            '<td>'+value.direccion+'</td>'+
                            '<td>'+value.fecha_inicio_instalacion+'</td>'+
                            '<td>'+value.fecha_termino_instalacion+'</td>'+
                            '<td>'+value.cantidad+'</td>'+
                            '<td>'+
                                '<span class="pie">'+
                                    '<div class="form-group">'+
                                        '<input type="text" class="form-control" id="'+value.id+'doc" name="'+value.id+'doc" value="'+value.num_documento+'">'+
                                    '</div>'+
                                '</span>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" id="'+value.id+'nom" name="'+value.id+'nom" value="'+value.nombre+'">'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" id="'+value.id+'dir" name="'+value.id+'dir" value="'+value.direccion+'">'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<div class="input-group date" id="datetimepicker_ini'+value.id+'">'+
                                        '<span class="input-group-addon">'+
                                            '<span class="fa fa-calendar"></span>'+
                                        '</span>'+
                                        '<input type="text" class="form-control" id="'+value.id+'ini" name="'+value.id+'ini" value="'+value.fecha_inicio_instalacion+'">'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<div class="input-group date" id="datetimepicker_ter'+value.id+'">'+
                                        '<span class="input-group-addon">'+
                                            '<span class="fa fa-calendar"></span>'+
                                        '</span>'+
                                        '<input type="text" class="form-control" id="'+value.id+'ter" name="'+value.id+'ter" value="'+value.fecha_termino_instalacion+'">'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" id="'+value.id+'can" name="'+value.id+'can" value="'+value.cantidad+'">'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<button type="button" style="margin-right: 5px;" class="btn btn-sm btn-info" onclick="editar_producto('+value.id+')">Guardar</button>'+
                                    '<button type="button" class="btn btn-sm btn-danger" onclick="eliminar_producto('+value.id+')">Eliminar</button>'+
                                '</div>'+
                            '</td>'+
                        '</tr>'
                    ).trigger('footable_redraw');
                    $(function(){
                        $("#datetimepicker_ini"+value.id+"").datepicker();
                        $("#datetimepicker_ter"+value.id+"").datepicker();
                    });
                });
                $(function(){
                    $('#example1').footable();
                });
                toastr.options = {
                    "debug": true,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.success('Producto eliminado');
            } else {
                toastr.options = {
                    "debug": true,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error en eliminar el Producto');  
            }
        },
    });
    */
}
</script>

<!--script>
$(document).ready(function(){
  /*
    $('.footable').footable().bind({
        'footable_row_collapsed' : function(e) {
            console.log('cerrado');
        },

        'footable_row_expanded' : function(e) {
            console.log('abierto');
        },
    });
    */
    $(function(){
        $.fn.dataTable.ext.errMode = 'throw';
        $('#tabla_productos_pendientes').dataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            //"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            "lengthMenu": [ [ -1,10, 25, 50], ["All",10, 25, 50] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'listadoProductos', className: 'btn-sm'},
                {extend: 'pdf', title: 'Listado de productos <?php //echo date("d-m-Y"); ?>', className: 'btn-sm'}
            ]
        });
    });
});
</script-->

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

<!--script>
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
});
</script-->

<!--script>
function editar_producto(id){
    var id                  = $('#id_producto').val();
    var codigo              = $.trim($('#codigo_producto').val());
    var producto            = $('#nombre_producto').val();
    var tiempo_instalacion  = $.trim($('#tiempo_instalacion').val());
    var tiempo_configuracion = $.trim($('#tiempo_configuracion').val());
    var tiempo_in_nuevo     = null;
    var tiempo_cap_nuevo    = null;
    var total               = null;
    var unidad              = null;
    var cantidad            = null;

    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
    $.ajax({
        url: "producto/"+id, 
        type: "PUT",
        dataType: 'json',
        data: {
            "id": id,
            "codigo": codigo,
            "producto": producto,  
            "tiempo_instalacion_hora": tiempo_instalacion,    
            "tiempo_configuracion_hora": tiempo_configuracion,
            "tiempo_instalacion_hora_nuevo": tiempo_in_nuevo,
            "tiempo_configuracion_hora_nuevo": tiempo_cap_nuevo,
            "cantidad": cantidad,
            "total": total,
            "unidad": unidad 
        },
        success: function(data){
            if(data != 0){ 
                $('#listadoProductos').find('tbody').empty();
                $('#modal_producto').modal('hide');
                toastr.options = {
                    "debug": true,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.success('Producto actualizado');  
                $('#btnVolverACargar').click();
                } else {
                    console.log('Error al actualizar');
                }
            },
    });//Fin ajax
}
</script-->

<!--script>
$(document).ready(function(){
    $('#listarProductos').append(
        
    );
	$(function(){
	   $.fn.dataTable.ext.errMode = 'throw';
	   $('#listadoProductos').dataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'listadoProductos', className: 'btn-sm'},
                {extend: 'pdf', title: 'Listado de productos <?php //echo date("d-m-Y"); ?>', className: 'btn-sm'}
            ]
        });
	});  	
});
</script-->

<!--script>
// OJO ESTO DEBERIA ESTAR DENTRO DE DOCUMENT READY
$('#btnVolverACargar').unbind('click').click(function(e){
    e.preventDefault();
    $('#listadoProductos').find('tbody').append(
	   '<tr>'+
		  '<td><p>hola</p></td>'+
		  '<td><p>hola</p></td>'+
		  '<td><p>hola</p></td>'+
		  '<td><p>hola</p></td>'+
		  '<td><p>hola</p></td>'+
		'</tr>'
	);
});
</script-->

<!--script> 
function eliminar_producto(id){
    swal({
        title: "¿Estas seguro de eliminar este producto?",
        text: "Se eliminará el producto seleccionado.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: true,
    },
    function (isConfirm) {
        if (isConfirm) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'producto/'+id,
                type: 'delete',
                dataType: "JSON",
                data: {
                    "id": id
                },
                success: function (data){
                    console.log(data);
                    if (data === 0) {
                        $("#listadoProductos").load("http://18.236.97.163:8001/producto.listar #listadoProductos");
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Producto eliminado!');
                    } else {
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.error('Error - No se eliminó el producto');
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
function cargar_producto(id){    
    $.get('/producto/'+id+'/edit/', function(data){
        $.each(data, function(index, value){
            $('#id_producto').val(value.id);
            $('#codigo_producto').val(value.codigo);
            $('#nombre_producto').val(value.producto);
            $('#tiempo_instalacion').val(value.tiempo_instalacion_hora);
            $('#tiempo_configuracion').val(value.tiempo_configuracion_hora);
        });
    });
}
</script-->

<!--script>
function ver_contrato(id){
    $.get('contrato/'+id, function(data){
        console.log(data);
        $.each(data, function(index, obj){
            console.log(obj.nombre_proyecto);
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
    
    $('#btnActualizarContrato').on('click', function(e){
        e.preventDefault();
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
        });
    });
});
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
