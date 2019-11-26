@extends('inmobiliarias.ileben.layouts.app')

  @section('content')


                    <!-- Modal Ver listado PDF Protocolo -->
          <div class="text-center">
              <div class="modal fade" id="modalListadoPdfProtocolo" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="color-line"></div>
                          <div class="modal-header text-center">
                              <h4 class="modal-title">Listado PDF Protocolo Cliente</h4>
                          </div>
                          <div class="modal-body">
                              <form>
                                  <table class="table">
                                      <thead>
                                          <tr>
                                              <!--th>PDF</th-->
                                              <th>Nombre</th>
                                              <th>Acción</th>
                                          </tr>
                                      </thead>
                                      <tbody id="tabla_listado_pdf_cliente">
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


          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Datos de los clientes</h1>
          <p class="mb-4">Estado de los clientes en el proyecto</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jazz Life - Etapa 2</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Estado</th>
                      <th>Dirección</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Teléfono</th>
                      <th>Correo</th>
                      <th>Fecha instalación</th>
                      <th>Fecha agendamiento</th>
                      <th>PDF</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($jazz_life_2 as $data)
                    <tr>
                      <td>{{ $data->nombre_estado }}</td>
                      <td>{{ $data->vivienda }}</td>
                      <td>{{ $data->nombre }}</td>
                      <td>{{ $data->apellido }}</td>
                      <td>{{ $data->telefono1 }}</td>
                      <td>{{ $data->correo }}</td>
                      <td>{{ $data->fecha_instalacion }}</td>
                      <td>{{ $data->fecha_emision_protocolo }}</td>
                      
                        @if($data->pdf_protocolo)

                        <td><button class="btn btn-primary" onclick="verListadoPdf({{$data->id}})">Ver Pdf</button></td>

                        @else
                        <td> Sin protocolo</td> 
                        @endif
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection


<script>
//Ver listado de PDF Protocolo del cliente
function verListadoPdf($id){

   var id = $id;
   var ruta_base = '{{url("/")}}';
   var contadorPdf = 0;

   $.ajax({
       url: 'listado_pdf/'+id,
       type: 'GET',
       success: function(data){

           $('#tabla_listado_pdf_cliente').empty();
           $.each(data, function(index, value){
               $('#tabla_listado_pdf_cliente').append(
               '<tr>'+
                  '<td><h4 class="text-left">'+value.nombre_pdf+'</h4></td>'+
                  '<td><a href="'+ruta_base+value.pdf_protocolo+'" target="_blank"><span style="font-size: 35px; color: red;"><center><i class="fas fa-file-pdf"></i></center></span></a></td>'+
               '</tr>'   
               );
           });
         $('#modalListadoPdfProtocolo').modal('show');
       },
       error: function(xhr){
           console.log(xhr.responseText);
       },
   });
}
</script>