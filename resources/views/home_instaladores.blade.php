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
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="   left" title="Cerrar sesión">
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
    
            <!--ul class="nav" id="side-menu">
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
            </ul-->
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
                        Ordenes de trabajo
                    </h2>
                    <small>Listados Ordenes</small>
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
    	                    <thead>
    	                        <tr>
    	                            <!--th>Nº</th-->
    	                            <th>Cliente</th>
    	                            <th>Dirección</th>
    	                            <th>Proyecto</th>
    	                            <th>Fecha<br>Pautada</th>
                                    <th>Hora<br>Pautada</th>
    	                            <th>Ver más</th>
    	                        </tr>
    	                    </thead>
    	                    <tbody id="tbContrato">
    	                    	@foreach($datos as $orden)
    	                    	<tr>
    	                            <td>{{ $orden->cliente }}</td>
    	                            <td>{{ $orden->direccion }}</td>
    	                            <td>{{ $orden->proyecto }}</td>
    	                            <td>{{ $orden->fecha }}</td>
                                    <td>{{ $orden->hora }}</td>
    	                            <td><center><button type="button" class="btn btn-primary" id="" onclick="modalEditarOrden({{$orden->id_orden}})">Más</button></center></td>
    	                        </tr>    
    	                        @endforeach
    	                    </tbody>
    	                </table>
    	            </div>
    	        </div>
    	    </div>


    	    <!-- Modal Generar orden trabajo -->
			<div class="modal fade" id="modalEditarOrden" tabindex="-1" role="dialog"  aria-hidden="true">
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
    			                                <input class="form-control" name="txtIdOrden" id="txtIdOrden" placeholder="" type="hidden" readonly="true">
    			                                <input class="form-control" name="txtCountActividades" id="txtCountActividades" placeholder="" type="hidden" readonly="true">
    			                                <div class="row">
    			                                    <div class="col-md-3">
    			                                        <div class="form-group">
    			                                            <label class="control-label" >Fecha</label>
    			                                            <input type="text" class="form-control" id="txtFechaOrden" name="txtFechaOrden" readonly="true">
    			                                        </div>
    			                                    </div>
    			                                    <div class="col-md-3">
    			                                        <div class="form-group">
    			                                            <label class="control-label">Hora Pautada</label>
    			                                            <input type="time" class="form-control" name="txtHoraPautadaOrden" id="txtHoraPautadaOrden" placeholder="" readonly="true">
    			                                        </div>
    			                                    </div>
    			                                    <div class="col-md-6">
    			                                        <div class="form-group">
    			                                            <label class="control-label" >Responsable Asignado</label>
    			                                            <input type="text" class="form-control" id="txtResponsableAsignado" name="txtResponsableAsignado" readonly="true">
    			                                        </div>
    			                                    </div>
    			                                </div>
    			                                <div class="row">
    			                                	<div class="col-md-9">
    			                                		<div class="form-group">
    			                                		    <label class="control-label">Tipo de Orden</label>
															<input type="text" class="form-control" id="txtTipoOrden" name="txtTipoOrden" readonly="true">
    			                                		</div>  
    			                                	</div>
    			                                	<!--div class="col-md-3">
    			                                		<div class="form-group">
    			                                            <label class="control-label" for="txtNroOrden">Nro. </label>
    			                                            <input type="text" class="form-control" name="txtNroOrden" id="txtNroOrden" placeholder="" readonly="true">
    			                                		</div>  
    			                                	</div-->                                     	
    			                                </div>                                
    			                                <hr style="border-color: #FFF;">
    			                                <h4 class="text-info">2. Antecedentes del Cliente</h4>
    			                                <div class="row">
    			                                    <div class="col-md-6">
    			                                        <div class="form-group">
    			                                            <label class="control-label">Nombre Cliente</label>
    			                                            <input type="text" class="form-control" name="txtNombreClienteOrden" id="txtNombreClienteOrden" placeholder="" readonly="true">
    			                                        </div>
    			                                    </div>
    			                                    <div class="col-md-6">
    			                                        <div class="form-group">
    			                                    		<label class="control-label" for="txtDireccionClienteOrden">Dirección</label>
    			                                    		<input type="text" class="form-control" name="txtDireccionClienteOrden" id="txtDireccionClienteOrden" placeholder="" readonly="true">   
    			                                        </div>
    			                                    </div>
    			                                </div>
    			                                <div calss="row">
    			                               		<label class="control-label">Condición de Instalación</label> 
    			                                	<div class="col-md-12">
    			                               			<div class="form-group">
    			                               				<div class="row" id="condicionInstalacion"> 
    	              											<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="tipo_trabajo_table">
    	              											    <tbody id="tbTipo">

    	              											    </tbody>
    	              											</table>
    			                               				</div>                                                                         
    			                               			</div>
    			                               		</div>
    			                               	</div>		
    			                                <div class="row">
    			                				    <div class="col-md-6">
    			                                		<hr style="border-color: #FFF;">
    			                                		<h4 class="text-info">3. Materiales a Utilizar</h4>
    			                				    </div>
    			                				</div>
    			                                <div class="row" id="materialesUtilizar">   
                                                                  
    			                                </div>
    			                                <hr style="border-color: #FFF;">
    			                                <h4 class="text-info">4. Descripción de Actividades</h4>
    			                                <div class="form-group">
    			                                	<label calss="form-control" for="txtObservacionesVisitasAnteriores">Observaciones Visitas Anteriores</label>
    			                                	<textarea rows="5" cols="108" wrap="soft" id="txtObservacionesVisitasAnteriores" name="txtObservacionesVisitasAnteriores" style="resize:none;" readonly="true"></textarea>
    			                                	<hr style="border-color: #FFF;">
    			                                </div>                                   
    			                                 <div class="row">
    			                				    <div class="col-md-6">
    			                                		<h4>Actividades a Realizar</h4>
    			                				    </div>
    			                				</div>
    			                                <div class="row" id="actividadesRealizar"></div>                              
    			                                <div class="form-group">
    			                                	<label class="control-label" for="txtRequerimientosAdicionales">Comentarios Adicionales</label>
    			                                    <textarea rows="4" cols="108" wrap="soft" id="txtRequerimientosAdicionales" name="txtRequerimientosAdicionales" style="resize:none;"></textarea>                                    	
    			                                </div>
    			                                 <div class="row">
    			                				    <hr style="border-color: #FFF;">
    			                				    <div class="col-md-6">
    			                				    	<h4 class="text-info">5. Reporte de Fallas</h4>
    			                				    </div>
    			                				    <div class="col-md-6" style="text-align: right;">
    			                   				        <button type="button" class="btn btn-success" id="btnNuevoReporteFalla">Nuevo</button>
    			                				    </div>
    			                				</div>
    			                                <div class="row">
    			                                	<div class="col-md-6">
    			                               			<div class="form-group">
    			                               				<label class="control-label" for="txtproductoServicioFalla1">Producto/Servicio con Falla</label>
    			                               			    <textarea rows="4" cols="50" wrap="soft" id="txtproductoServicioFalla1" name="txtproductoServicioFalla1" style="resize:none;"></textarea>                                    	
    			                               			</div>                                    		
    			                                	</div>
    			                                	<div class="col-md-6">
    			                                		<div class="form-group">
    			                                			<label class="control-label" for="txtDescripcionFalla1">Descripción de la Falla</label>
    			                                		    <textarea rows="4" cols="50" wrap="soft" id="txtDescripcionFalla1" name="txtDescripcionFalla1" style="resize:none;"></textarea>                                    	
    			                                		</div>                                    		
    			                                	</div>
    			                                </div> 
    			                                <div class="row" id="nuevo_reporte_falla"></div>                              
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

        </div>


<!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            TAMED GLOBAL
        </span>
        2018 Copyright
    </footer>

</div>

</body>



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

<script >
	
	$(document).ready(function(){

		var contadorReporteFallo = 1;
		var contadorActividades;
		$('#btnNuevoReporteFalla').on('click', function(e){

			contadorReporteFallo = contadorReporteFallo + 1;

			$('#nuevo_reporte_falla').append('<div class="col-md-6">'+
		                               			'<div class="form-group">'+
		                               			    '<textarea rows="4" cols="50" wrap="soft" id="txtproductoServicioFalla'+contadorReporteFallo+'" name="txtproductoServicioFalla'+contadorReporteFallo+'" style="resize:none;"></textarea>'+                                 	
		                               			'</div>'+                                  		
		                                	'</div>'+
		                                	'<div class="col-md-6">'+
		                                		'<div class="form-group">'+
		                                		    '<textarea rows="4" cols="50" wrap="soft" id="txtDescripcionFalla'+contadorReporteFallo+'" name="txtDescripcionFalla'+contadorReporteFallo+'" style="resize:none;"></textarea>'+                                    	
		                                		'</div>'+                                 		
		                                	'</div>');

		});

		$('#modalEditarOrden').on('hidden.bs.modal', function (e) {

   		    $('#arrayReporteFalla').empty();
   		    $('#nuevo_reporte_falla').empty();
   		    
   		    contadorReporteFallo = 1;

   		    $('#materialesUtilizar').empty();
   		    $('#tbTipo').empty();
   		    $('#actividadesRealizar').empty();
            $('#txtObservacionesVisitasAnteriores').empty();
            $('#txtRequerimientosAdicionales').empty();

   		});


		$('#btnGuardarOrden').on('click',function(e){
    	
			arrayReporteFalla = [];
			var s;
			comprobarReportes = "";
			comprobarCamposVaciosFallas = "";
			var producto;
			var falla;

			if(arrayReporteFalla.length < 1 ){

				for (s = 1; s <= contadorReporteFallo; s++) { 

			        item2 = {}
			        item2 ["productoServicioFalla"] = $.trim($('#txtproductoServicioFalla'+s).val());
			        item2 ["descripcionFalla"] = $.trim($('#txtDescripcionFalla'+s).val());
			        arrayReporteFalla.push(item2);

			        producto = $.trim($('#txtproductoServicioFalla'+s).val());
			        falla = $.trim($('#txtDescripcionFalla'+s).val())

			        if(producto != "" && falla == "" || falla != "" && producto == ""){
			        	comprobarCamposVaciosFallas = "verificar";
			        }


				}

			}else {

				console.log('no se pudo guardar reportes');

			}//Fin else

			if(arrayReporteFalla[0].productoServicioFalla == "" && arrayReporteFalla[0].descripcionFalla == ""){
				comprobarReportes = "no"
			}

			 arrayActividades = [];
			 var i;
			 var countActividades = $.trim($('#txtCountActividades').val());
             var comprobarActividadesPendientes;


			 if(arrayActividades.length < 1 ){

			 	for (i = 1; i <= countActividades; i++) { 

			 		var chkEjecutado = document.getElementById('chkEjecutadoActividad'+i);

			 		if(chkEjecutado.checked){

			 			item1 = {}
	   	     			item1 ["id"] = $.trim($('#txtIdActividad'+i).val());
	   	     			item1 ["observacion"] = $.trim($('#txtObservacionActividad'+i).val());
	   	     			item1 ["ejecutado"] = "SI";
	   	     			arrayActividades.push(item1);

			 		}else{

			 			obs = $.trim($('#txtObservacionActividad'+i).val());

			 			if(obs == ""){

			 				item1 = {}
	   	     				item1 ["id"] = "NO";
	   	     				item1 ["observacion"] = "NO";
	   	     				item1 ["ejecutado"] = "NO";
	   	     				arrayActividades.push(item1);	
			 				comprobarActividadesPendientes = 1;

			 			}else{

			 				item1 = {}
	   	     				item1 ["id"] = $.trim($('#txtIdActividad'+i).val());
	   	     				item1 ["observacion"] = $.trim($('#txtObservacionActividad'+i).val());
	   	     				item1 ["ejecutado"] = "NO";
	   	     				arrayActividades.push(item1);						

			 			}

			 		}



			 	}

			 }else {

			 	console.log('no se pudo guardar reportes');

			 }//Fin else

			var requerimientosAdicionales = $.trim($('#txtRequerimientosAdicionales').val());
            var id_orden = $.trim($('#txtIdOrden').val());

			if(comprobarActividadesPendientes == 1){

			    toastr.options = {
      		        "debug": false,
      		        "newestOnTop": false,
      		        "positionClass": "toast-top-center",
      		        "closeButton": true,
      		        "toastClass": "animated fadeInDown",
      		    };
      		    toastr.error('Hay actividades no realizadas sin observación, por favor completa este campo.');

			}else if(comprobarCamposVaciosFallas == "verificar"){

				toastr.options = {
      		        "debug": false,
      		        "newestOnTop": false,
      		        "positionClass": "toast-top-center",
      		        "closeButton": true,
      		        "toastClass": "animated fadeInDown",
      		    };
      		    toastr.error('Verifique que todos los campos estén completos en la sección "Reporte de Fallas".');

			}else{

				$.ajax({
       			    url: "actualizar_orden", 
       			    type: "PUT",
       			    dataType: 'json',
       			    data: {

       			       "arrayReporteFalla" : arrayReporteFalla,
                       "arrayActividades" : arrayActividades,
                       "requerimientosAdicionales" : requerimientosAdicionales,
                       "comprobarReportes" : comprobarReportes,
                       "id_orden" : id_orden

       			    },
       			    success: function(data)
       			    {
       			      if(data== 1){
       			        $('#modalEditarOrden').modal('hide');
       			          toastr.options = {
       			              "debug": false,
       			              "newestOnTop": false,
       			              "positionClass": "toast-top-center",
       			              "closeButton": true,
       			              "toastClass": "animated fadeInDown",
       			          };
       			          toastr.success('Datos guardados correctamente.');

       			      }else{
                          toastr.options = {
                              "debug": false,
                              "newestOnTop": false,
                              "positionClass": "toast-top-center",
                              "closeButton": true,
                              "toastClass": "animated fadeInDown",
                          };
                          toastr.error('Error al guardar datos.');
                      }
       			    },
       			    error: function(xhr)
       			    {
       			        console.log(xhr.responseText);
       			    }
       			});//Fin ajax

			}


			

		});


	});

</script>

<script>
	
	function modalEditarOrden(id){

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

       		    	//console.log(data.instalador);
       		    	var orden = data.orden;
       		    	var actividades = data.actividades;
       		    	var materiales = data.materiales;
       		    	var contadorActividades = 0;
                    var contadorMateriales =0;

       		    	$('#txtFechaOrden').val(orden.fecha_pautada);
       		    	$('#txtHoraPautadaOrden').val(orden.hora_pautada);
       		    	$('#txtResponsableAsignado').val(data.instalador);
       		    	$('#txtTipoOrden').val(orden.tipo_trabajo);
       		    	$('#txtNombreClienteOrden').val(orden.nombre_cliente);
       		    	$('#txtDireccionClienteOrden').val(orden.direccion_cliente);
       		    	$('#txtConteoVisitasOrden').val(data.visitas_anteriores);
       		    	$('#txtObservacionesVisitasAnteriores').val(orden.observaciones_visita_anterior)

       		    	$.each(materiales, function(index, obj){

                        contadorMateriales = contadorMateriales + 1;

                        if(contadorMateriales == 1){

                            $('#materialesUtilizar').append('<div class="col-md-6">'+
                                                                '<div class="form-group">'+
                                                                    '<hr style="border-color: #FFF;">'+
                                                                    '<label class="control-label" >Descripción</label>'+
                                                                    '<input type="text" class="form-control" name="txtDescripcionMaterial1" id="txtDescripcionMaterial1" placeholder="" readonly="true" value="'+obj.descripcion+'">'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="col-md-3">'+
                                                                '<div class="form-group">'+
                                                                    '<hr style="border-color: #FFF;">'+
                                                                    '<label class="control-label" for="">Unidad</label>'+
                                                                    '<input type="text" class="form-control" name="" id="" placeholder="" readonly="true" value="'+obj.unidad+'">'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="col-md-3">'+
                                                                '<div class="form-group">'+
                                                                    '<hr style="border-color: #FFF;">'+
                                                                    '<label class="control-label" for="">Cantidad</label>'+
                                                                    '<input type="text" class="form-control" name="" id="" placeholder="" readonly="true" value="'+obj.cantidades+'">'+
                                                                '</div>'+
                                                            '</div>');

                        }else{

                            $('#materialesUtilizar').append('<div class="col-md-6">'+
                                                                '<div class="form-group">'+
                                                                    '<hr style="border-color: #FFF;">'+
                                                                    '<input type="text" class="form-control" name="txtDescripcionMaterial1" id="txtDescripcionMaterial1" placeholder="" readonly="true" value="'+obj.descripcion+'">'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="col-md-3">'+
                                                                '<div class="form-group">'+
                                                                    '<hr style="border-color: #FFF;">'+
                                                                    '<input type="text" class="form-control" name="" id="" placeholder="" readonly="true" value="'+obj.unidad+'">'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="col-md-3">'+
                                                                '<div class="form-group">'+
                                                                    '<hr style="border-color: #FFF;">'+
                                                                    '<input type="text" class="form-control" name="" id="" placeholder="" readonly="true" value="'+obj.cantidades+'">'+
                                                                '</div>'+
                                                            '</div>');                          

                        }

       		    	});

       		    	$.each(actividades, function(index, obj){

       		    		contadorActividades = contadorActividades + 1;

                        if(obj.observacion == null){

                            var observacion = "";

                        }else{

                            var observacion = obj.observacion;
                        }

                            $('#actividadesRealizar').append('<div class="col-md-5">'+
                                                        '<div class="form-group">'+
                                                        '<input class="form-control" name="txtIdActividad'+contadorActividades+'" id="txtIdActividad'+contadorActividades+'" placeholder="" type="hidden" readonly="true" value="'+obj.id+'">'+
                                                            '<hr style="border-color: #FFF;">'+
                                                            '<label class="control-label" for="">Actividad</label>'+
                                                            '<textarea rows="3" cols="42" wrap="soft" style="resize:none;" readonly="true">'+obj.actividad+'</textarea>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="col-md-5">'+
                                                        '<div class="form-group">'+
                                                            '<hr style="border-color: #FFF;">'+
                                                            '<label class="control-label" for="txtObservacionActividad'+contadorActividades+'">Observaciones</label>'+
                                                            '<textarea rows="3" cols="42" wrap="soft" id="txtObservacionActividad'+contadorActividades+'" name="txtObservacionActividad'+contadorActividades+'" style="resize:none;">'+observacion+'</textarea>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="col-md-2">'+
                                                        '<hr style="border-color: #FFF;">'+
                                                        '<label class="control-label" for="chkEjecutadoActividad'+contadorActividades+'">Ejecutado</label>'+
                                                        '<div class="form-group">'+
                                                            '<center>'+
                                                                '<input type="checkbox" name="chkEjecutadoActividad'+contadorActividades+'" id="chkEjecutadoActividad'+contadorActividades+'">'+
                                                            '</center>'+
                                                        '</div>'+
                                                    '</div>' );                    

                            if(obj.ejecutado == 'SI'){

                                var chkEjecutado = "chkEjecutadoActividad"+contadorActividades;
                                var chkEjecutadoActividad = document.getElementById(chkEjecutado);
                                chkEjecutadoActividad.checked = true;

                            }


       		    	});

       		    	$('#txtCountActividades').val(contadorActividades);
                    $('#txtIdOrden').val(id);

       		    	if(orden.obra_gruesa == "SI"){

       		    		$('#tbTipo').append('<tr>'+
                               				    '<td><strong>Obra Gruesa</strong></td>'+
                               				    '<td>SI</td>'+
                               				'</tr>');

       		    	}
       		    	if(orden.mudanza == "SI"){

       		    		$('#tbTipo').append('<tr>'+
                               				    '<td><strong>Mudanza</strong></td>'+
                               				    '<td>SI</td>'+
                               				'</tr>');

       		    	}
       		    	if(orden.terminaciones_menores == "SI"){

       		    		$('#tbTipo').append('<tr>'+
                               				    '<td><strong>Terminaciones Menores</strong></td>'+
                               				    '<td>SI</td>'+
                               				'</tr>');

       		    	}
       		    	if(orden.habitada == "SI"){

       		    		$('#tbTipo').append('<tr>'+
                               				    '<td><strong>Habitada</strong></td>'+
                               				    '<td>SI</td>'+
                               				'</tr>');

       		    	}       		    	


       		    },
       		    error: function(xhr)
       		    {
       		        console.log(xhr.responseText);
       		    }
       		});//Fin ajax
		$('#modalEditarOrden').modal('show');
	}

</script>

</html>
