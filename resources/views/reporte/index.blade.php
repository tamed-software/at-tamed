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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" type="text/css">

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
                        <li><a id="btnPorInmobiliaria">Filtrar por inmobiliaria</a></li>
                        <li><a id="btnPorProyecto">Filtrar por proyecto</a></li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Reporte estado clientes
                </h2>
                <small>Ver reportes</small>
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
                    Seleccionar inmobiliaria
                </div>
                <div class="panel-body">
                    <div class="col-xs-8 col-sm-8 col-md-8">
             	        <label for="inmobiliaria">Inmobiliaria</label>
                        <select class="form-control" id="inmobiliaria" name="inmobiliaria">
                            <option value="">--- Inmobiliairia ---</option>
                            @foreach($inmobiliarias as $inmobiliaria)
                               	<option value="{{$inmobiliaria->id}}">{{$inmobiliaria->nombre}}</option>
                            @endforeach
               		    </select>
             	    </div>
             	    <div class="collapse" id="modal_por_proyecto">
                        <br>
             	        <div class="input-group reporte" id="btnFiltrar">
                        	<a class="btn btn-primary" id="filtrarPorProyecto" style="width: auto;">Filtrar por proyecto</a>
             	        </div>
             	    </div>
             	    <div class="collapse" id="modal_por_inmobiliairia">
             	    	<div class="col-xs-8 col-sm-8 col-md-8">
                    		<br>
                    		<a class="btn btn-primary" id="buscarPorInmobiliaria" style="width: auto;">Ver grafico</a>
                    	</div>
    				</div>
                	<div class="" id="sala_ventas_collapse">
                        <div class="row">
                          <div class="col-md-12">
                                <select id="proyectos" name="proyectos" multiple="multiple">
                                    <option value=""></option>
                                </select>

                            <label class="mdb-main-label">Label example</label>
                            <button class="btn-save btn btn-primary btn-sm" onclick="descargar()">Save</button>
                          </div>
                        </div>
    				</div>
             	</div>
            </div>
        </div>
    	<div>
			<div class="panel-body" id="graficos"></div>
		</div>
    </div>

    <!--div class="modal fade" id="modalInformeProyecto" tabindex="-1" role="dialog"  aria-hidden="true">
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
	                                    <p id="fecha_inicio_instalacion"></p>
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
	                            <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="	datatable_informe_proyectos">
	                                <thead>
	                                    <tr>
	                                        <th>Código</th>
	                                        <th>Producto</th>
	                                        <th>Cantidad</th>
	                                        <th>Tiempo de instalación<br> en horas</th>
	                                        <th>Tiempo de configuración<br> en horas</th>
	                                        <th>Total</th>
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
	</div-->
<!--FIN MODAL DETALLE POR PROYECTO-->
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>




<!-- App scripts -->
<script src="{{ asset('scripts/homer.js') }}"></script>

<!-- Api Chart google -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#proyectos').multiselect();
    });
</script>


<script >

    $(document).ready(function() {

        $('#inmobiliaria').on('change', function(e){

            
            var inm_id = e.target.value;
            
            //ajax
            $.get('/ajax-proyectos?inm_id=' + inm_id, function(data){
                //success data
                console.log(data);
                $('#proyectos').empty();
                $.each(data, function(home, proyectosObj){

                    $('#proyectos').append('<option value="'+proyectosObj.id+'">'+proyectosObj.nombre+'</option>');
                    $('#proyectos').multiselect('rebuild');


                });
                //$('.collapse').collapse();
            });
        });
    });
    

</script>

<script type="text/javascript">
    
    function descargar(){
        var selectedValues = $('#proyectos').val();
        var url = "";
        var url2;

       selectedValues.forEach(function(element) {

           url2 = "idProyectos%5B%5D="+element+"&";
           url = url+url2;
           
       });

       console.log(url);
        //window.open("https://atv2.tamed.global/generarReporte?"+url+"idInmo=2&verificarSoloInmo=2", '_blank');

        
    $.ajax({
        url: 'generarReporte/',
        type: 'GET',
        dataType: 'json',
        data:{
            "idProyectos": selectedValues,
            "idInmo" : 2,
            "verificarSoloInmo" : 2
        },
        success: function(data){

            console.log(this.url)

        },
        error: function(xhr){
            console.log(xhr.responseText);
        },
    });

    }
</script>
<!--script>
$(document).ready(function(){

	$('#modal_por_inmobiliairia').collapse('show');

    $('#modal_por_proyecto').collapse('show');

	$('#filtrarPorProyecto').on('click', function(){

	   $('#modal_por_inmobiliairia').collapse('hide');

       $('#modal_por_proyecto').collapse('hide');

       $('#sala_ventas_collapse').collapse('show');

       $('#inmobiliaria').on('change', function(e){
        var inm_id = e.target.value;

            $.get('/ajax-proyectos?inm_id=' + inm_id, function(data){

                $('#proyectos').empty();
                $.each(data, function(home, proyectosObj){
                $('#proyectos').append('<option value="'+proyectosObj.id+'">'+proyectosObj.nombre+'</option>');
                });
            });
        $('#demo').collapse();
        });

       $('#buscarPorProyecto').on('click', function(e){
        e.preventDefault();
        var proyecto_id = $('#proyectos').find(":selected").val();
        var inmobiliaria_id = $('#inmobiliaria').find(":selected").val();


            $.get('/mostrarEstadosClientes?proyecto_id=' + proyecto_id, function(data) {

                $('#graficos').empty();

                    var contactados         = data.countContactados;
                    var no_contactados      = data.countNoContactados;
                    var instalados          = data.countInstalados;
                    var agendados           = data.countAgendados;
                    var sin_informacion     = data.countSinInformacion;
                    var ins_cap             = data.countInsCap;
                    var countCapacitados    = data.countCapacitados;
                    var conObservacion      = data.countObservacion;
                    var capacitados         = data.clienteCapacitado;
                    var no_capacitados      = data.clienteNoCapacitado;
                    var nombreInmobiliaria  = $("#inmobiliaria").find(":selected").text();
                    var nombreProyecto      = $("#proyectos").find(":selected").text();
                    var draw = 'drawChart66';


                    $sumaEstadosdinamico = sin_informacion+no_contactados+agendados+instalados+countCapacitados+ins_cap+contactados+conObservacion;

                    if ($sumaEstadosdinamico != 0){

                    //calculo Instalados y capacitados
                    $porcentaje = ins_cap * 100;
                    $div = $porcentaje / $sumaEstadosdinamico;
                    $resulEstadosDinamico = $div.toFixed(1);
                    $resultado = ins_cap+' ('+$resulEstadosDinamico +'%)';

                    //calculo otros estados
                    $otrosEstados = sin_informacion + no_contactados + contactados + agendados + instalados + countCapacitados+conObservacion;
                    $porcentajeOtros = $otrosEstados * 100;
                    $divOtro = $porcentajeOtros / $sumaEstadosdinamico;
                    $resultadoOtros = $divOtro.toFixed(1);
                    $resultadoOrtosEstados = $otrosEstados+' ('+$resultadoOtros+'%)';

                    }else{

                    $resultado = 0;
                   	$resultadoOrtosEstados = 0;

                    }


                $('#graficos').append( 	'<center>'+
                           					'<div class="col-lg-15">'+
                                           		'<div class="hpanel">'+
                                                	'<div class="panel-heading">'+
                                                   		'<div class="panel-tools">'+
                                                       		'<a class="showhide"><i class="fa fa-chevron-up"></i></a>'+
                                                    	'</div>'+
                                                        	'Grafico'+
                                               		'</div>'+
                                                	'<div class="panel-body" id="" >'+
   	                                                	'<div  id="grafico_estados" style="width: 100%; height: 400px;"></div>'+
                                   							'<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">'+
                                   					  			'<thead>'+
                                   					     				'<tr>'+
                                   					         				'<th><small>Instalado y capacitado</small></th>'+
                                   					         				'<th><small>Otros estados</small></th>'+
                                   					     				'</tr>'+
                                   					  			'</thead>'+
                                   					  			'<tbody>'+
                                   					     				'<tr>'+
                                   					         				'<td>' +$resultado+ '</td>'+
                                   					     					'<td>' +$resultadoOrtosEstados+ '</td>'+
                                   					   					'</tr>'+
                                   								'</tbody>'+
                                   							'</table>'+
                                    					'<button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto('+proyecto_id+')">Ver detalles</button>'+
                                    				'</div>'+
                               					'</div>'+
                           			 		'</div>'+
                       				 	'</center>');



                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart1);

                function drawChart1(){

                var data = google.visualization.arrayToDataTable([
                   ['Task', 'hours per day'],
                   ['Sin información', sin_informacion ],
                   ['No contactados', no_contactados ],
                   ['Contactados', contactados ],
                   ['Agendados', agendados ],
                   ['Instalados', instalados ],
                   ['Capacitados', countCapacitados ],
                   ['Con observación', conObservacion ],
                   ['Instalados y capacitados', ins_cap ]
                 ]);

                var options = {
                    title: nombreInmobiliaria+' / '+nombreProyecto,
                    pieSliceText: 'value-and-percentage',
                    //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
                    colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
                    chartArea: {
                     width: '90%',
                     height:'85%'
                    },
                    legend: 'none'
                    };

                var chart = new google.visualization.PieChart(document.getElementById('grafico_estados'));
                chart.draw(data, options);

                }

                $(window).resize(function(){
                drawChart1();
                 });

            });

        });
    });

    $('#filtrarPorInmobiliaria').on('click',function(){
    	$('#sala_ventas_collapse').collapse('hide');
    	$('#modal_por_inmobiliairia').collapse('show');
        $('#modal_por_proyecto').collapse('show');

    });

   	$('#buscarPorInmobiliaria').on('click', function(e){
        e.preventDefault();
        var inmobiliaria_id = $('#inmobiliaria').find(":selected").val();

        $.get('/datos_proyecto/'+inmobiliaria_id, function(data) {

            $('#graficos').empty();

            $('#graficos').append('<center>'+
                           					'<div class="col-lg-15">'+
                                           		'<div class="hpanel">'+
                                                	'<div class="panel-heading">'+
                                                   		'<div class="panel-tools">'+
                                                       		'<a class="showhide"><i class="fa fa-chevron-up"></i></a>'+
                                                    	'</div>'+
                                                        	'Grafico General Inmobiliaria'+
                                               		'</div>'+
                                                	'<div class="panel-body" id="" >'+
   	                                                	'<div  id="grafico_estados" style="width: 100%; height: 400px;"></div>'+
                                    				'</div>'+
                               					'</div>'+
                           			 		'</div>'+
                       				 	'</center>');

            var cabecera = ['Proyecto','Sin información','No contactados','Contactados','Agendados','Instalados','Capacitados','Con observación','Instalados y capacitados'];
            var datosGrafico = [];
            datosGrafico.push(cabecera);
            var inmobiliaria = $('#inmobiliaria').find(":selected").text();

            $.each(data,function(data, value){

                var contactados         = value.contactados;
                var no_contactados      = value.no_contactados;
                var instalados          = value.instalados;
                var agendados           = value.agendados;
                var sin_informacion     = value.sinInformacion;
                var ins_cap             = value.instaladosCapacitados;
                var conObservacion      = value.conObservacion;
                var capacitados         = value.capacitados;
                var nombreInmobiliaria  = value.nombre_inmobiliaria
                var nombreProyecto      = value.nombre_proyecto


                var datos = [nombreProyecto,sin_informacion,no_contactados,contactados,agendados,instalados,capacitados,conObservacion,ins_cap];
                datosGrafico.push(datos);


           	});
           	google.charts.load('current', {'packages':['bar']});
     		google.charts.setOnLoadCallback(drawChart2);
      		function drawChart2() {
      			var data = google.visualization.arrayToDataTable(
      				datosGrafico
      				);

      			var options = {

      			  	title: inmobiliaria,
      			  	legend: {position: 'none'},
      			  	hAxis: {
   					     title: 'Proyectos',
   					     titleTextStyle: {color: 'black'},
   					     count: -1,
   					     viewWindowMode: 'pretty',
   					     slantedText: true
   					},
   					colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826']

      			};
      			var chart = new google.charts.Bar(document.getElementById('grafico_estados'));
      			chart.draw(data, google.charts.Bar.convertOptions(options));
      		}
      		$(window).resize(function(){
                drawChart2();
            });

        });
    });

});
</script-->
<!--script type="text/javascript">
    /*
    function ver_detalle_proyecto(id){
        //alert(id);
        $("#datatable_informe_proyectos").dataTable().fnDestroy();

        $('#cantidad_ins_cap').empty();
        $('#titulo_informe').empty();
        $('#fecha_inicio_instalacion').empty();
        $('#fecha_termino_instalacion').empty();
        $('#fecha_real_instalacion').empty();
        $('#fecha_real_termino').empty();
        $('#modalInformeProyecto').modal('show');

        $.get('informe_proyecto/'+id, function(data){
            //console.log(data);

            var nombre_inmobiliaria = data['datos_inmobiliaria_proyecto'][0].nombre_inmobiliaria;
            var nombre_proyecto = data['datos_inmobiliaria_proyecto'][0].nombre_proyecto;
            var fecha_inicio_instalacion = data['datos_inmobiliaria_proyecto'][0].fecha_inicio_instalacion;
            var fecha_termino_instalacion = data['datos_inmobiliaria_proyecto'][0].fecha_termino_instalacion;
            var cantidad_viviendas = data['datos_inmobiliaria_proyecto'][0].cantidad;
            var cantidad_ins_cap = data['get_clientes_ins_cap'];
            var fecha_real_instalacion = data['get_fecha_minima_instalacion'];
            var fecha_real_instalacion_ins = data['get_fecha_real_termino_ins'];

            if(cantidad_viviendas === null){
                $('#cantidad_viviendas').empty().append('no definida');
                $('#cantidad_restantes').empty().append('');
            } else {
                var cantidad_restantes = cantidad_viviendas - cantidad_ins_cap;
                $('#cantidad_restantes').empty().append(cantidad_restantes);
                $('#cantidad_viviendas').empty().append(cantidad_viviendas);
            }

            $('#cantidad_ins_cap').append(cantidad_ins_cap);
            $('#titulo_informe').append(nombre_inmobiliaria+' - '+nombre_proyecto);

            if(fecha_inicio_instalacion !== null || fecha_termino_instalacion !== null){
                $('#fecha_inicio_instalacion').append(fecha_inicio_instalacion.split("-").reverse().join("-"));
                $('#fecha_termino_instalacion').append(fecha_termino_instalacion.split("-").reverse().join("-"));
            } else {
                $('#fecha_inicio_instalacion').append('no definida');
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
                $('#tabla_informe_proyectos').append(
                    '<tr>'+
                        '<td>'+value.codigo+'</td>'+
                        '<td>'+value.producto+'</td>'+
                        '<td>'+value.cantidad+'</td>'+
                        '<td>'+value.tiempo_instalacion_hora+'</td>'+
                        '<td>'+value.tiempo_configuracion_hora+'</td>'+
                        '<td>'+value.total+'</td>'+
                    '</tr>'
                );
            });
            $('#cantidad_productos').empty().append(cantidad_productos);
            $('#suma_total').empty().append(Number(suma_total.toFixed(2)));
            /*
            $(function(){
                $.fn.dataTable.ext.errMode = 'throw';
                $('#datatable_informe_proyectos').dataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    //"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                    "lengthMenu": [ [ -1,10, 25, 50], ["All",10, 25, 50] ],
                    buttons: [
                        {extend: 'copy',className: 'btn-sm'},
                        {extend: 'csv',title: 'listadoProductos', className: 'btn-sm'},
                        {extend: 'pdf', title: 'Listado de productos <?php //echo date("d-m-Y"); ?>', className: 'btn-sm'}
                        //{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}.
                        //{extend: 'print',className: 'btn-sm'}
                    ]
                });
            });
            
            var table_informe_por_proyecto_nueva = $('#datatable_informe_proyectos').dataTable({
                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                //"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                "lengthMenu": [ [ -1,10, 25, 50], ["All",10, 25, 50] ],
                buttons: [
                    //{extend: 'copy',className: 'btn-sm'},
                    {extend: 'csv',title: 'Informe de proyectos', className: 'btn-sm'},
                    {extend: 'pdf', title: 'Informe de proyectos <?php //echo date("d-m-Y"); ?>', className: 'btn-sm'}
                    //{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}.
                    //{extend: 'print',className: 'btn-sm'}
                ]
            });
        });
    }
    */
</script-->

</body>
</html>
