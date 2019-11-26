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
                        <li><a href="{{ url('inventario.listar') }}">Listado de inventarios de proyecto</a></li>
                        <li class="active">
                            <span>Inventario</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Listar Inventario de Proyectos
                </h2>
                <small>Listar inventarios</small>
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
                    Listar inventarios de proyectos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!--hr-->
                            <h3 class="text-info">Listado de inventario por proyecto</h3>
                            <hr style="border-color: #FFF;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="inmobiliarias">Inmobiliarias</label>
                                <select class="form-control" id="inmobiliarias">
                                    <option value="">-- Seleccione una Inmobiliaria --</option>
                                    @foreach($inmobiliarias as $inmobiliaria)
                                        @if($inmobiliaria->estado_id == 6)
                                            <option value="{{ $inmobiliaria->id }}">{{ $inmobiliaria->nombre }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="proyectos">Proyectos</label>
                                <select class="form-control" id="proyectos">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div id="collapseInventario" class="collapse">
                                <button type="button" class="btn btn-primary" id="btnVerInventario">Ver Inventario</button>
                            </div>
                        </div>
                    </div>
                    <div id="collapseInventarioPorProyecto" class="collapse">
                        <hr style="border-color: #FFF;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="tabla_listado_inventario_por_proyecto">
                                    <thead>
                                        <tr>
                                            <th style="display: none;">id</th>
                                            <th>Inmobiliaria</th>
                                            <th>Proyecto</th>
                                            <th>Código</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Tiempo de instalación<br> en horas</th>
                                            <th>Tiempo de configuración<br> en horas</th>
                                            <th>Total</th>
                                            <th>Cantidad<br> de viviendas</th>
                                            <th>Fecha<br> inicio de instalación</th>
                                            <th>Productos faltantes<br> por instalar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data_inventario_por_cliente">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Inicio All Data -->
                    <hr>
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#collapse_inventarios">Ver todos los inventarios de los proyectos</button>
                    <div id="collapse_inventarios" class="collapse">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <hr style="border-color: #FFF;">
                            <h3 class="text-info">Listado de inventarios de proyectos</h3>
                            <hr style="border-color: #FFF;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="tabla_listado_inventario">
                                <thead>
                                    <tr>
                                        <th style="display: none;">id</th>
                                        <th style="display: none;">proyecto_id</th>
                                        <th>Inmobiliaria</th>
                                        <th>Proyecto</th>
                                        <th>Código</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Tiempo de instalación<br> en horas</th>
                                        <th>Tiempo de configuración<br> en horas</th>
                                        <th>Total</th>
                                        <th>Cantidad<br> de viviendas</th>
                                        <th>Fecha<br> inicio de instalación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inventarios as $inventario)
                                    <tr id="datos_listado_inventario">
                                        <td style="display: none;">{{ $inventario->id }}</td>
                                        <td style="display: none;">{{ $inventario->id_proyecto }}</td>
                                        <td>{{ $inventario->nombre_inmobiliaria }}</td>
                                        <td>{{ $inventario->nombre }}</td>
                                        <td>{{ $inventario->codigo }}</td>
                                        <td>{{ $inventario->producto }}</td>
                                        <td>{{ $inventario->cantidad_producto }}</td>
                                        <td>{{ $inventario->tiempo_instalacion_hora }}</td>
                                        <td>{{ $inventario->tiempo_configuracion_hora }}</td>
                                        <td>{{ $inventario->total }}</td>
                                        <td>{{ $inventario->cantidad }}</td>
                                        <td>{{ $inventario->fecha_inicio_instalacion }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                    <!-- Fin All Data -->
                </div>
            </div>
        </div>
    </div>

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

<script>
$(document).ready(function(){
    $(function(){
        $.fn.dataTable.ext.errMode = 'throw';
        $('#tabla_listado_inventario').dataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ListadoClientes', className: 'btn-sm'},
                {extend: 'pdf', title: 'Inventario de productos de los proyectos <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
            ]
        });
    });
    //Dropdown inmobiliaria - proyecto
    $('#inmobiliarias').on('change', function(e){
        console.log(e);
        var inm_id = e.target.value;
        if(e.target.value == ''){
            $('#collapseInventario').collapse('hide');
            $('#collapseInventarioPorProyecto').collapse('hide');
            $('#proyectos').empty().append('<option value=""></option>');
        } else {
            //ajax proyecto por id inmobiliaria
            $.get('/ajax-proyectos?inm_id=' + inm_id, function(data){
                //success data
                console.log(data);
                $('#proyectos').empty();
                $.each(data, function(home, proyectosObj){
                    $('#proyectos').append('<option value="'+proyectosObj.id+'">'+proyectosObj.nombre+'</option>');
                });
            });
            $('#collapseInventario').collapse('show');
        }
    });

    //Ver tabla de inventario por proyecto seleccionado
    $('#btnVerInventario').on('click', function(){
        $('#tabla_listado_inventario').dataTable().fnDestroy();
        $('#collapseInventarioPorProyecto').collapse('show');
        var proyecto_id = $('#proyectos').find(':selected').val();
        var nombre_proyecto = $('#proyectos').find(':selected').text();
        var cantidad_clientes_ins_cap = '';
        var get_resto_por_instalar = '';
        var resto_por_instalar = '';
        $.get('count_clientes_ins_cap/'+proyecto_id, function(data){
            //console.log('cant clientes ins cap: '+data);
            cantidad_clientes_ins_cap = data;
            console.log(cantidad_clientes_ins_cap);
        });
        $.get('listado_tabla_por_proyecto/'+proyecto_id, function(data){
            //console.log(data);
            $('#data_inventario_por_cliente').empty();
            $.each(data, function(index, value){
                console.log(value);
                get_resto_por_instalar = value.cantidad - cantidad_clientes_ins_cap;
                resto_por_instalar = get_resto_por_instalar * value.cantidad_producto;
                $('#data_inventario_por_cliente').append(
                    '<tr>'+
                        '<td style="display: none;">'+value.id+'</td>'+
                        '<td>'+value.nombre_inmobiliaria+'</td>'+
                        '<td>'+value.nombre+'</td>'+
                        '<td>'+value.codigo+'</td>'+
                        '<td>'+value.producto+'</td>'+
                        '<td>'+value.cantidad_producto+'</td>'+
                        '<td>'+value.tiempo_instalacion_hora+'</td>'+
                        '<td>'+value.tiempo_configuracion_hora+'</td>'+
                        '<td>'+value.total+'</td>'+
                        '<td>'+value.cantidad+'</td>'+
                        '<td>'+value.fecha_inicio_instalacion+'</td>'+
                        '<td>'+resto_por_instalar+'</td>'+
                    '</tr>'
                );
            });
            $(function(){
                $.fn.dataTable.ext.errMode = 'throw';
                $('#tabla_listado_inventario_por_proyecto').dataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                    buttons: [
                        {extend: 'copy',className: 'btn-sm'},
                        {extend: 'csv',title: 'ListadoClientes', className: 'btn-sm'},
                        {extend: 'pdf', title: 'Inventario de productos del proyecto '+nombre_proyecto+' '+' <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
                    ]
                });
            });
        });
    });
});
</script>


<!--script>
$(window).load(function(){
    $.get('producto.listar/', function(data){
        console.log(data);
        $('#listado_productos').empty();
        var suma_total = 0;
        $.each(data, function(index, value){
            console.log(value.codigo);
            $('#listado_productos').append(
                '<tr>'+
                    '<td style="display: none;">'+value.id+'</td>'+
                    '<td>'+value.codigo+'</td>'+
                    '<td>'+value.producto+'</td>'+
                    '<td style="width: 200px;">'+
                        '<center>'+
                            "<button type='button' onclick='decrementarProducto("+value.id+","+value.cantidad+")' class='btn-danger btn-sm btn-circle btn-outline'><i class='fa fa-minus'></i></button>"+
                                '<span> '+value.cantidad+' </span>'+
                            "<button type='button' onclick='incrementarProducto("+value.id+","+value.cantidad+")' class='btn-success btn-sm btn-circle btn-outline'><i class='fa fa-plus'></i></button>"+
                        '</center>'+
                    '</td>'+
                    '<td>'+value.tiempo_instalacion_hora_nuevo+'</td>'+
                    '<td>'+value.tiempo_configuracion_hora_nuevo+'</td>'+
                    '<td>'+value.total+'</td>'+
                '</tr>'
            );
            suma_total = suma_total + value.total;
        });
        $('#suma_total').empty().append(Number(suma_total.toFixed(2)));
    });
});
</script-->

<!--script>
$(window).load(function(){
    $.get('producto.cantidad/', function(data){
        console.log(data);
        $('#listado_productos_cant').empty();
        var suma_total_cant = 0;
        $.each(data, function(index, value){
            console.log(value.equipo);
            $('#listado_productos_cant').append(
                '<tr>'+
                    '<td style="display: none;">'+value.id+'</td>'+
                    '<td>'+value.codigo+'</td>'+
                    '<td>'+value.producto+'</td>'+
                    '<td>'+value.cantidad+'</td>'+
                    '<td>'+value.tiempo_instalacion_hora_nuevo+'</td>'+
                    '<td>'+value.tiempo_configuracion_hora_nuevo+'</td>'+
                    '<td>'+value.total+'</td>'+
                '</tr>'
            );
            suma_total_cant = suma_total_cant + value.total;
        });
        $('#suma_total_cant').empty().append(Number(suma_total_cant.toFixed(2)));
    });
});
</script-->

<!--script>
function incrementarProducto(id,cantidad){
    //alert(id+' '+cantidad);
    var cant = cantidad + 1;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'incrementar_cantidad/'+id,
        type: 'PUT',
        dataType: "JSON",
        data: {
            "cantidad":cant,
        },
        success: function(data){
            console.log(data);
            $('#actualizarTablaProductos').click();
            //$('#actualizarTablaProductosCantidad').click();
        },
        error: function(xhr){
            console.log(xhr.responseText);
        }
    });
}
</script-->

<!--script>
function decrementarProducto(id,cantidad){
    //alert(id+' '+cantidad);
    //var cantidad = 0;
    var cant = cantidad - 1;

    if(cant < 0){
        //alert('La cantidad no puede ser menor a 0');
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-top-center",
            "closeButton": true,
            "toastClass": "animated fadeInDown",
        };
        toastr.error('Error - La cantidad no puede ser menor a 0');
    } else {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'decrementa_cantidad/'+id,
            type: 'PUT',
            dataType: "JSON",
            data: {
                "cantidad":cant,
            },
            success: function(data){
                console.log(data);
                $('#actualizarTablaProductos').click();
                //$('#actualizarTablaProductosCantidad').click();
            },
            error: function(xhr){
                console.log(xhr.responseText);
            }
        });
    }
}
</script-->

<!--script>
$(document).ready(function(){
    //Abrir modal
    $('#modalProducto').on('click', function(e){
        e.preventDefault();
        $('#modalAgregarProducto').modal('show');
    });

    //Agregar producto
    $('#btnAgregarProducto').on('click', function(e){
        e.preventDefault();

        var codigo       = $.trim($('#codigo').val());
        var producto     = $.trim($('#producto').val());
        var cantidad     = $.trim($('#cantidad').val());
        var tiempo_instalacion_hora   = $.trim($('#tiempo_instalacion_hora').val());
        var tiempo_configuracion_hora = $.trim($('#tiempo_configuracion_hora').val());

        if(codigo == '' || producto == '' || tiempo_instalacion_hora == ''){
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Faltan datos por completar');
        } else if(codigo == '' || !$.isNumeric(tiempo_instalacion_hora) || !$.isNumeric(tiempo_configuracion_hora)){
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Los valores de tiempo de instalación o tiempo de configuración no son númericos');
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'producto/',
                type: 'POST',
                dataType: "JSON",
                data: {
                    "codigo":codigo,
                    "producto":producto,
                    "cantidad":cantidad,
                    "tiempo_instalacion_hora":tiempo_instalacion_hora,
                    "tiempo_configuracion_hora":tiempo_configuracion_hora
                },
                success: function(data){
                    console.log(data);
                    if(data.respuesta === 0){
                        console.log(data);
                        //console.log(data.productos.cantidad);
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Producto agregado');
                        $("#form_producto")[0].reset();
                        $('#modalAgregarProducto').modal('hide');
                        $('#actualizarTablaProductos').click();
                    } else {
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.error('Error - No se pudo agregar el producto');
                    }
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }
    });//Fin agregar producto

    //Actualizar tabla productos
    $('#actualizarTablaProductos').unbind('click').click(function(){
        //e.preventDefault();
        //Actualizar tabla productos
        $.get('producto.listar/', function(data){
            console.log(data);
            $('#listado_productos').empty();
            var suma_total = 0;
            $.each(data, function(index, value){
                console.log(value.codigo);
                $('#listado_productos').append(
                    '<tr>'+
                        '<td style="display: none;">'+value.id+'</td>'+
                        '<td>'+value.codigo+'</td>'+
                        '<td>'+value.producto+'</td>'+
                        '<td style="width: 200px;">'+
                            '<center>'+
                                "<button type='button' onclick='decrementarProducto("+value.id+","+value.cantidad+")' class='btn-danger btn-sm btn-circle btn-outline'><i class='fa fa-minus'></i></button>"+
                                '<span> '+value.cantidad+' </span>'+
                                "<button type='button' onclick='incrementarProducto("+value.id+","+value.cantidad+")' class='btn-success btn-sm btn-circle btn-outline'><i class='fa fa-plus'></i></button>"+
                            '</center>'+
                        '</td>'+
                        '<td>'+value.tiempo_instalacion_hora_nuevo+'</td>'+
                        '<td>'+value.tiempo_configuracion_hora_nuevo+'</td>'+
                        '<td>'+value.total+'</td>'+
                    '</tr>'
                );
                suma_total = suma_total + value.total;
            });
            $('#suma_total').empty().append(Number(suma_total.toFixed(2)));
        });//Fin actualizar tabla productos

        $.get('producto.cantidad/', function(data){
            console.log(data);
            $('#listado_productos_cant').empty();
            var suma_total_cant = 0;
            $.each(data, function(index, value){
                console.log(value.codigo);
                $('#listado_productos_cant').append(
                    '<tr>'+
                        '<td style="display: none;">'+value.id+'</td>'+
                        '<td>'+value.codigo+'</td>'+
                        '<td>'+value.producto+'</td>'+
                        '<td>'+value.cantidad+'</td>'+
                        '<td>'+value.tiempo_instalacion_hora_nuevo+'</td>'+
                        '<td>'+value.tiempo_configuracion_hora_nuevo+'</td>'+
                        '<td>'+value.total+'</td>'+
                    '</tr>'
                );
                suma_total_cant = suma_total_cant + value.total;
            });//Fin each
            $('#suma_total_cant').empty().append(Number(suma_total_cant.toFixed(2)));
        });//Fin get tabla cantidad
    });//Fin boton actualizar tablas
});
</script-->

<!--script>
    $(function(){
        $.fn.dataTable.ext.errMode = 'throw';
        $('#tabla_productos_cant').dataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ListadoProductos', className: 'btn-sm'},
                {extend: 'pdf', title: 'Listado de productos <?php //echo date("d-m-Y"); ?>', className: 'btn-sm'}
                //{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}.
                //{extend: 'print',className: 'btn-sm'}
            ]
        });
    });
</script-->

<script>
$(document).ready(function(){
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
});
</script>

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
var Fn = {
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
        $('#addClassErrorRutMandante').addClass('has-error has-feedback');
        alert('RUT ingresado no es valido');
    }
});

$("#rut_rep_legal").on('change', function(){
    if (Fn.validaRut($("#rut_rep_legal").val())){
        //$("#msgerror").html("El rut ingresado es válido");
        $('#addClassErrorRutRepLegal').removeClass('has-error has-feedback');
    } else {
        //$("#msgerror").html("El Rut no es válido :'( ");
        $('#addClassErrorRutRepLegal').addClass('has-error has-feedback');
        alert('RUT ingresado no es valido');
    }
});

$("#rut_factura").on('change', function(){
    if (Fn.validaRut($("#rut_factura").val())){
        //$("#msgerror").html("El rut ingresado es válido");
        $('#addClassErrorRutFactura').removeClass('has-error has-feedback');
    } else {
        //$("#msgerror").html("El Rut no es válido :'( ");
        alert('RUT ingresado no es valido');
        $('#addClassErrorRutFactura').addClass('has-error has-feedback');
    }
});
</script-->

<!--script>
$(document).ready(function(){
    //Quitar puntos
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

    //Quitar espacios
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

    // Agregar contrato
    $('#btnAgregarContrato').on('click', function(){
        //alert('btn add contrato');
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

        if(estado_proyecto == '' || etapa_proyecto == '' || proyecto_id == ''){
            //alert('proyecto vacio');
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "positionClass": "toast-top-center",
                "closeButton": true,
                "toastClass": "animated fadeInDown",
            };
            toastr.error('Error - Por favor seleccione un estado, etapa y proyecto');
        } else {
            //alert('OK');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'contrato/',
                type: 'POST',
                dataType: "JSON",
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
                success: function(data){
                    console.log(data);
                    console.log(data.resultado);
                    if(data.resultado == 0){
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.success('Contrato agregado');
                        $("#form_contrato")[0].reset();
                    } else {
                        toastr.options = {
                            "debug": false,
                            "newestOnTop": false,
                            "positionClass": "toast-top-center",
                            "closeButton": true,
                            "toastClass": "animated fadeInDown",
                        };
                        toastr.error('Error - No se pudo agregar el contrato');
                    }
                },
                error: function(xhr){
                 console.log(xhr.responseText);
               }
            });
        }
    });
});
</script-->

<!--script>
$(document).ready(function(){
    $('#inmobiliaria').on('change', function() {
        var inmobiliariaID = $(this).val();
        if(inmobiliariaID) {
            $.ajax({
                url: '/proyecto/'+inmobiliariaID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('#proyecto').empty();
                    $.each(data, function(index, proyecto) {
                        $('#proyecto').append('<option value="'+ proyecto.nombre +'">'+ proyecto.nombre +'</option>');
                    });
                }
            });
        } else {
            $('#proyecto').empty();
        }
    });
});
</script-->

</body>
</html>
