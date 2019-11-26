@extends('inmobiliarias.rezepka.layouts.app')

  @section('content')

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Datos de los clientes</h1>
          <p class="mb-4">Estado de los clientes en el proyecto</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Back+Office Business Park - Etapa 2</h6>
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
                    @foreach($backoffice_etapa2 as $data)
                    <tr>
                      <td>{{ $data->nombre_estado }}</td>
                      <td>{{ $data->vivienda }}</td>
                      <td>{{ $data->nombre }}</td>
                      <td>{{ $data->apellido }}</td>
                      <td>{{ $data->telefono1 }}</td>
                      <td>{{ $data->correo }}</td>
                      <td>{{ $data->fecha_instalacion }}</td>
                      <td>{{ $data->fecha_emision_protocolo }}</td>
                      <td>
                        @if($data->pdf_protocolo)
                        <a href="{{ $data->pdf_protocolo }}" target="_blank">Protocolo</a>
                        @else
                        Sin protocolo
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection