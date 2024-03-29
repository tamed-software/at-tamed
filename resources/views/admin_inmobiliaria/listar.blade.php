<!DOCTYPE html>
<html>
<style type="text/css">

.modal-dialog{
    overflow-y: initial;
}
.modal-body{
    height: 350px;
    overflow-y: auto;
}
</style>
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
                        <li><a href="{{ url('listar_inmobiliaria_proyecto') }}">Inmobiliarias - Proyectos</a></li>
                        <li class="active">
                            <span>Inmobiliarias - Proyectos</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Inmobiliarias - Proyectos
                </h2>
                <small>Listado de inmobiliarias y proyectos</small>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Inmobiliarias
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control input-sm m-b-md" id="filter" placeholder="Search in table">
                        <table id="example1" class="footable table table-stripped toggle-arrow-tiny" data-page-size="10" data-filter=#filter>
                            <thead>
                                <tr>
                                    <th data-toggle="true">Acción</th>
                                    <th>Nombre</th>
                                    <th>N° Documento</th>
                                    <th>Estado</th>
                                    <th data-hide="all">Nombre</th>
                                    <th data-hide="all">N° Documento</th>
                                    <th data-hide="all">Estado</th>
                                    <th data-hide="all">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="datos_tabla_inmobiliaria">
                            @foreach($inmobiliarias as $inmobiliaria)
                                <tr>
                                    <td bgcolor="#ffb606" style="color: #FFF;">Editar</td>
                                    <td>{{ $inmobiliaria->nombre }}</td>
                                    <td>{{ $inmobiliaria->num_documento }}</td>
                                    <td>{{ $inmobiliaria->estado->nombre }}</td>
                                    <td>
                                        <span class="pie">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nombre{{$inmobiliaria->id}}" name="nombre{{$inmobiliaria->id}}" value="{{ $inmobiliaria->nombre }}">
                                            </div>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="pie">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="num_documento{{$inmobiliaria->id}}" name="num_documento{{$inmobiliaria->id}}" value="{{ $inmobiliaria->num_documento }}">
                                            </div>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="pie">
                                            <div class="form-group">
                                                <select class="form-control" id="estado{{$inmobiliaria->id}}" name="estado{{$inmobiliaria->id}}">
                                                    <option value="0">Actual: {{ $inmobiliaria->estado->nombre }}</option>
                                                    @foreach($estados as $estado)
                                                        @if($estado->id === 6 || $estado->id === 7)
                                                            <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-info" onclick="editar_inmobiliaria({{ $inmobiliaria->id }})">Guardar</button>
                                            <button type="button" class="btn btn-sm btn-danger" onclick="eliminar_inmobiliaria({{ $inmobiliaria->id }})">Eliminar</button>
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

</div><!-- Fin Main Wrapper -->


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

<script>
$(function(){
    $('#example1').footable();
});
</script>

<script>
$(document).ready(function(){
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
});
</script>

<script>
function editar_inmobiliaria(id){
    alert(id);

    var nombre          = $("#nombre"+id+"").val();
    var num_documento   = $("#num_documento"+id+"").val();
    var estado          = $("#estado"+id+"").val();

    console.log(id);
    console.log(nombre);
    console.log(num_documento);
    console.log(estado);

    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'adminmobiliariaproyecto/'+id,
        type: 'PUT',
        dataType: "JSON",
        data: {
            'nombre': nombre,
            'num_documento': num_documento,
            'estado': estado
        },
        success: function(data){
            console.log(data);
            if(data.resultado === 0){
                $('#datos_tabla_inmobiliaria').empty();
                $.each(data.inmobiliarias, function(index, value){
                    if(value.num_documento === null){
                        value.num_documento = '';
                    }
                    if(value.estado_id === 6){
                       value.estado_id = 'activo';
                    } else if(value.estado_id === 7){
                        value.estado_id = 'inactivo';
                    }
                    $('#datos_tabla_inmobiliaria').append(
                    '<tr>'+
                        '<td bgcolor="#ffb606" style="color: #FFF;">Editar</td>'+
                        '<td>'+value.nombre+'</td>'+
                        '<td>'+value.num_documento+'</td>'+
                        '<td>'+value.estado_id+'</td>'+
                        '<td>'+
                            '<span class="pie">'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" id="nombre'+value.id+'" name="nombre'+value.id+'" value="'+value.nombre+'">'+
                                '</div>'+
                            '</span>'+
                        '</td>'+
                        '<td>'+
                            '<div class="form-group">'+
                                '<input type="text" class="form-control" id="num_documento'+value.id+'" name="num_documento'+value.id+'" value="'+value.num_documento+'">'+
                            '</div>'+
                        '</td>'+

                        '<td>'+
                            '<span class="pie">'+
                                '<div class="form-group">'+
                                    '<select class="form-control" id="estado'+value.id+'" name="estado'+value.id+'">'+
                                        '<option value="0">Actual: '+value.estado_id+'</option>'+
                                        '<option value="6">activo</option>'+
                                        '<option value="7">inactivo</option>'+
                                    '</select>'+
                                '</div>'+
                            '</span>'+
                        '</td>'+

                        '<td>'+
                            '<div class="form-group">'+
                                '<button type="button" style="margin-right: 5px;" class="btn btn-sm btn-info" onclick="editar_inmobiliaria('+value.id+')">Guardar</button>'+
                                '<button type="button" class="btn btn-sm btn-danger" onclick="eliminar_inmobiliaria('+value.id+')">Eliminar</button>'+
                            '</div>'+
                        '</td>'+
                    '</tr>'
                    ).trigger('footable_redraw');
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
                toastr.success('Inmobiliaria actualizada');
            } else {
                toastr.options = {
                    "debug": true,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error en actualizar la inmobiliaria');
            }
        },
        error: function(xhr){
            console.log(xhr.responseText);
        }
    });
}
</script>

<script>
function eliminar_inmobiliaria(id){
    alert(id);
}
</script>

<!--script>
$(function(){
    $.fn.dataTable.ext.errMode = 'throw';
    $('#listadoInmobiliarias').dataTable({
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        buttons: [
            {extend: 'copy',className: 'btn-sm'},
            {extend: 'csv',title: 'ListadoInmobiliarias', className: 'btn-sm'},
            {extend: 'pdf', title: 'Listado de inmobiliarias <?php //echo date("d-m-Y"); ?>', className: 'btn-sm'}
            //{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}.
            //{extend: 'print',className: 'btn-sm'}
        ]
    });
});
</script-->

<!--script>
$(function(){
    $.fn.dataTable.ext.errMode = 'throw';
    $('#listadoProyecto').dataTable({
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        buttons: [
            {extend: 'copy',className: 'btn-sm'},
            {extend: 'csv',title: 'ListadoInmobiliarias', className: 'btn-sm'},
            {extend: 'pdf', title: 'Listado de inmobiliarias <?php //echo date("d-m-Y"); ?>', className: 'btn-sm'}
            //{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}.
            //{extend: 'print',className: 'btn-sm'}
        ]
    });
});
</script-->

<!--script>
function prueba_parents(){

    $("#btnEditar").parent().parent().next().collapse("show");
}
</script-->

<!--script>
function cargar_campos_editar_proyecto(id){
    $.ajax({
        url: '/nuevoproyecto/'+id+/edit/,
        method: 'GET',
        success: function(data){
            $.each(data, function(index, value){
        	   $('#nuevoid').val(value.id);
                $('#nuevaCantidad').val(value.cantidad);
                $('#nuevoNombre').val(value.nombre);
                $('#nuevoNumDoc').val(value.num_documento);
                $('#nuevaDireccion').val(value.direccion);
                $('#nuevaInmobiliaria').val(value.inmobiliaria_id);
                if(value.estado_id == 6){
                    var nombre_estado = 'activo';
                } else {
                    var nombre_estado = 'inactivo';
                }
                $('#estado_proyecto2').val(value.estado_id);
                $('#estado_proyecto2').text("actual: "+nombre_estado);
                $('#nuevaFechaInicio').val(value.fecha_inicio_instalacion);
                $('#nuevaFechaTermino').val(value.fecha_termino_instalacion);
                $('#nuevaCantidad').val(value.cantidad);
            });
        },
    });
}
</script-->

<!--script>
function limpiar_campos_editar_proyecto(){
    $('#modal_update').modal('hide');
    $('#nuevaCantidad').val("");
    $('#nuevoNombre').val("");
    $('#nuevoNumDoc').val("");
    $('#nuevaDireccion').val("");
    $('#nuevaInmobiliaria').val("");
    $('#nuevaFechaInicio').val("");
    $('#nuevaFechaTermino').val("");
    $('#estado_proyecto2').text("");
    $('#estado_proyecto2').val("");
}
</script-->

<!--script>
function editar_nuevos_proyectos(id){
	var id 					= $('#nuevoid').val();
    var num_documento       = $.trim($('#nuevoNumDoc').val());
    var nombre              = $.trim($('#nuevoNombre').val());
    var direccion           = $.trim($('#nuevaDireccion').val());
    var inmobiliaria        = $('#nuevaInmobiliaria').find(':selected').val();
    var estado              = $('#estado_proyecto').find(':selected').val();
    var fecha_inicio        = $('#nuevaFechaInicio').val();
    var fecha_fin           = $('#nuevaFechaTermino').val();
    var cantidad            = $('#nuevaCantidad').val();
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
    $.ajax({
        url: "nuevoproyecto/"+id,
        type: "PUT",
        dataType: 'json',
        data: {
        	"id": id,
            "num_documento": num_documento,
            "nombre": nombre,
            "direccion": direccion,
            "inmobiliaria_id": inmobiliaria,
            "estado_id": estado,
            "fecha_inicio_instalacion": fecha_inicio,
            "fecha_termino_instalacion": fecha_fin,
            "cantidad": cantidad
        },
        success: function(data)
        {
            console.log(data);
            if(data == 0){
                $("#example").load("http://18.236.97.163:8001/listar_inmobiliaria_proyecto #example");
                $('#modal_update').modal('hide');
                toastr.options = {
                    "debug": true,
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
    });
}
</script-->

<!--script>
function eliminar_nuevoProyecto(id){
	swal({
    	title: "¿Estas seguro de eliminar este proyecto?",
    	text: "Se eliminará el proyecto seleccionado.",
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
		        url: 'nuevoproyecto/'+id,
		        type: 'delete',
		        dataType: "JSON",
		        data: {
		            "id": id
		        },
		        success: function (data)
		        {
		            console.log(data);
		            if (data === 0) {
                    	$("#example").load("http://18.236.97.163:8001/listar_inmobiliaria_proyecto #example");
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
            			toastr.error('Error - No se eliminó el proyecto');
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
function ver_contrato(id){
    //alert(id);
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
	//alert(id);
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
		            	//$('#modalEditarContrato').modal('hide');
                    	//swal("Contrato eliminado!");
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
