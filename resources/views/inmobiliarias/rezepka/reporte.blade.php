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

  <h3 style="text-align: center;">{{ $etapa1 }}</h3>
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
    @foreach($reporte_rezepka_etapa1 as $etapa1)
    <tr>
      <td><small>{{ $etapa1->nombre_estado }}</small></td>
      <td><small>{{ $etapa1->vivienda }}</small></td>
      <td><small>{{ $etapa1->nombre }}</small></td>
      <td><small>{{ $etapa1->apellido }}</small></td>
      <td><small>{{ $etapa1->telefono1 }}</small></td>
      <td><small>{{ $etapa1->correo }}</small></td>
      <td><small>{{ $etapa1->fecha_instalacion }}</small></td>
      <td><small>{{ $etapa1->fecha_emision_protocolo }}</small></td>
    </tr>
    @endforeach
	</table>

  <hr>
  <h3 style="text-align: center;">{{ $etapa2 }}</h3>
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
    @foreach($reporte_rezepka_etapa2 as $etapa2)
    <tr>
      <td><small>{{ $etapa2->nombre_estado }}</small></td>
      <td><small>{{ $etapa2->vivienda }}</small></td>
      <td><small>{{ $etapa2->nombre }}</small></td>
      <td><small>{{ $etapa2->apellido }}</small></td>
      <td><small>{{ $etapa2->telefono1 }}</small></td>
      <td><small>{{ $etapa2->correo }}</small></td>
      <td style="width: 100px;"><small>{{ $etapa2->fecha_instalacion }}</small></td>
      <td style="width: 100px;"><small>{{ $etapa2->fecha_emision_protocolo }}</small></td>
    </tr>
    @endforeach
  </table>

	
  </body>
</html>


