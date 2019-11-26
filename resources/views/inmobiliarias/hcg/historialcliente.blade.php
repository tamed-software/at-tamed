@extends('inmobiliarias.hcg.layouts.app')

  @section('content')

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Historial clientes</h1>
     <p class="mb-4">Historial cambio de contraseña clientes</p>   
       <!-- DataTales Example -->
     <div class="card shadow mb-4">
       <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Clientes HCG</h6>
       </div>
       <div class="card-body">
         <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>
               <tr>
                 <th>Nº</th>
                 <th>Administrador</th>
                 <th>Nombre</th>
                 <th>Correo</th>
                 <th>Fecha modificacion <br> contraseña</th>
               </tr>
             </thead>
             <tbody>
               
             </tbody>
           </table>
         </div>
       </div>
     </div>


@endsection
