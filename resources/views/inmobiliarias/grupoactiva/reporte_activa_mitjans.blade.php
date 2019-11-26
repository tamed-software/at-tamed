<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <style type="text/css">
		body {
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
			color: #343a40;
		}
		table, tr, td {
			border: 1px solid #ddd;
			border-spacing: 0;
		}
		th {
			background-color: #17a2b8;
			color: #fff;
		}
		hr {
			color: #fff;
			size: 1px;
		}
	</style>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $title }}</title>
  </head>
  <body>
  	
  <h3 style="text-align: center;">{{ $activaMitjans }}</h3>
  <hr>

  <table style="width: 100%;">
    <tr>
      <th><small>Estado</small></th>
      <th><small>Dirección</small></th>
      <th><small>Nombre</small></th>
      <th><small>Apellido</small></th>
      <th><small>Teléfono</small></th>
      <th><small>Correo</small></th>
      <th><small>Fecha instalación</small></th>
      <th><small>Fecha agendamiento</small></th>
    </tr>
    @foreach($pdf_activa_mitjans as $mitjans)
    <tr>
      <td><small>{{ $mitjans->nombre_estado }}</small></td>
      <td><small>{{ $mitjans->vivienda }}</small></td>
      <td><small>{{ $mitjans->nombre }}</small></td>
      <td><small>{{ $mitjans->apellido }}</small></td>
      <td><small>{{ $mitjans->telefono1 }}</small></td>
      <td><small>{{ $mitjans->correo }}</small></td>
      <td style="width: 100px;"><small>{{ $mitjans->fecha_instalacion }}</small></td>
       <td style="width: 100px;"><small>{{ $mitjans->fecha_emision_protocolo }}</small></td>
    </tr>
    @endforeach
  </table>

	
  </body>
</html>


