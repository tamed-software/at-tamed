@extends('inmobiliarias.hcg.layouts.app')

  @section('content')

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Datos de los clientes</h1>
          <p class="mb-4">Estado de los clientes en el proyecto</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Parque García de la huerta</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>nombre</th>
                      <th>telefono</th>
                      <th>correo</th>
                      </tr>
                  </thead>
                  <tbody>
                     @foreach($parque_garcia_huerta as $data)
                    <tr>
                      <td>{{ $data->id }}</td>
                      <td>{{ $data->nombre }}</td>
                      <td>{{ $data->telefono }}</td>
                      <td>{{ $data->correo }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>


@endsection


