@extends('inmobiliarias.hcg.layouts.app')


@section('content')

    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                Descargar plantilla para importar clientes
            </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <i class="fa fa-file-excel-o text-success"></i>
                    </div>
                    <div style="width: auto;">
                        <a href="/documento_excel/Plantilla_para_importar_clientes.xlsx" class="text-center" data-toggle="tooltip" data-placement="bottom" title="Descargar aqui la plantilla Excel para importación masiva de clientes">Descargar plantilla para importar clientes aqui</a>
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

    <div class="row">
        <div class="col-lg-12">
             <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    Seleccionar Proyecto
                </div>
                 <div class="card-body">
                    <div class="">
                        <label for="proyectos">Proyectos</label>
                        <select class="form-control" id="proyectos" name="proyectos">
                        		<option value="--">----- Seleccione Proyecto -----</option>
                            @foreach($proyectos as $proyecto)
                                <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div id="demo" class="collapse">
                        <div class="row">
                            <div class="col-md-6">
                        		<form class="form-inline" method="post" action="" enctype="multipart/form-data" id="importarExcel">
                        		    @csrf
                        		    <div class="col-lg-8">
                        		        <span>Importar Clientes desde Excel</span>
                        		        <input type="file" class="form-control-file" name="cliente" id="cliente" data-toggle="tooltip" data-placement="bottom">
                        		    </div>
                        		    <span> </span>
                        		    <button type="submit" class="btn btn-primary mb-2" data-toggle="tooltip" data-placement="bottom" title="Se cargaran los datos del archivo excel adjunto">Importar Clientes</button>
                        		</form>
                            </div>
                            <div class="col-lg-4">
                            	<span> </span>
                                <button type="button" class="btn btn-primary mb-2" id="btnModalAgregarCliente" data-toggle="modal" data-tooltip="tooltip" data-target="#modalAgregarCliente" data-placement="bottom" title="Esta opción es para agregar un cliente a través de un formulario">Agregar cliente desde formulario</button>
                            </div>
                        </div>
                    </div>
                </div>
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
            <div id="alerta"></div>
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
                                <input type="date" class="form-control" id="form_fecha_instalacion" name="form_fecha_instalacion">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="form_fecha_emision_protocolo">Fecha emisión protocolo</label>
                            <div class="input-group date" id="datetimepicker2">
                                <input type="date" class="form-control" id="form_fecha_emision_protocolo" name="form_fecha_emision_protocolo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="form_fecha_capacitacion">Fecha capacitación</label>
                            <div class="input-group date" id="datetimepicker3">
                                <input type="date" class="form-control" id="form_fecha_capacitacion" name="form_fecha_capacitacion">
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


@endsection

<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>


<script>
$(document).ready(function(){

	$('#proyectos').on('change', function(e){
		
		$('#demo').collapse();

	});

    $('#btnFormAgregarCliente').on('click', function(e){

        e.preventDefault();

        var form_proyecto       = $('#proyectos').val();
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
            $('#alerta').append('<div class="alert alert-danger alert-dismissible">'+
                                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                                '<strong>Error!</strong> Verifique que todos los campos estén completos.'+
                                '</div>'
                            );

        } else {

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url: "/api/cliente",
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

                    if(data == 1){

                        $('#alerta').append('<div class="alert alert-danger alert-dismissible">'+
                        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                        '<strong>Error!</strong>, al intentar agregar este cliente supera la cantidad de viviendas ingesadas al proyecto.'+
                        '</div>'
                        );

                    }else if(data == 0){

                        $('#alerta').append('<div class="alert alert-danger alert-dismissible">'+
                        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                        '<strong>Error!</strong>, La dirección ingresada ya está registrada.'+
                        '</div>'
                        );      

                    }else{

                        $('#formAgregarCliente')[0].reset();
                        $('#alerta').append('<div class="alert alert-success alert-dismissible">'+
                        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                        '<strong>Cliente agregado correctamente.</strong>'+
                        '</div>'
                        );
                         
                     }
                }
            });
        }
    });
});
</script>


