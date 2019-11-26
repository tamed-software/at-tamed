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

  <h3 style="text-align: center;">{{ $altoRauquen }}</h3>
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
    @foreach($pdf_alto_rauquen_colonial as $colonial)
    <tr>
      <td><small>{{ $colonial->nombre_estado }}</small></td>
      <td><small>{{ $colonial->vivienda }}</small></td>
      <td><small>{{ $colonial->nombre }}</small></td>
      <td><small>{{ $colonial->apellido }}</small></td>
      <td><small>{{ $colonial->telefono1 }}</small></td>
      <td><small>{{ $colonial->correo }}</small></td>
      <td style="width: 100px;"><small>{{ $colonial->fecha_instalacion }}</small></td>
      <td style="width: 100px;"><small>{{ $colonial->fecha_emision_protocolo }}</small></td>
    </tr>
    @endforeach
	</table>

  <hr>
  <h3 style="text-align: center;">{{ $clarosRauquen }}</h3>
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
    @foreach($pdf_claros_rauquen_curico as $curico)
    <tr>
      <td><small>{{ $curico->nombre_estado }}</small></td>
      <td><small>{{ $curico->vivienda }}</small></td>
      <td><small>{{ $curico->nombre }}</small></td>
      <td><small>{{ $curico->apellido }}</small></td>
      <td><small>{{ $curico->telefono1 }}</small></td>
      <td><small>{{ $curico->correo }}</small></td>
      <td style="width: 100px;"><small>{{ $curico->fecha_instalacion }}</small></td>
      <td style="width: 100px;"><small>{{ $curico->fecha_emision_protocolo }}</small></td>
    </tr>
    @endforeach
  </table>

  <hr>
  <h3 style="text-align: center;">{{ $maitenBoldo }}</h3>
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
    @foreach($pdf_altos_maiten_boldo as $boldo)
    <tr>
      <td><small>{{ $boldo->nombre_estado }}</small></td>
      <td><small>{{ $boldo->vivienda }}</small></td>
      <td><small>{{ $boldo->nombre }}</small></td>
      <td><small>{{ $boldo->apellido }}</small></td>
      <td><small>{{ $boldo->telefono1 }}</small></td>
      <td><small>{{ $boldo->correo }}</small></td>
      <td style="width: 100px;"><small>{{ $boldo->fecha_instalacion }}</small></td>
      <td style="width: 100px;"><small>{{ $boldo->fecha_emision_protocolo }}</small></td>
    </tr>
    @endforeach
  </table>

  <hr>
  <h3 style="text-align: center;">{{ $maitenLaurel }}</h3>
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
    @foreach($pdf_altos_maiten_laurel as $laurel)
    <tr>
      <td><small>{{ $laurel->nombre_estado }}</small></td>
      <td><small>{{ $laurel->vivienda }}</small></td>
      <td><small>{{ $laurel->nombre }}</small></td>
      <td><small>{{ $laurel->apellido }}</small></td>
      <td><small>{{ $laurel->telefono1 }}</small></td>
      <td><small>{{ $laurel->correo }}</small></td>
      <td style="width: 100px;"><small>{{ $laurel->fecha_instalacion }}</small></td>
      <td style="width: 100px;"><small>{{ $laurel->fecha_emision_protocolo }}</small></td>
    </tr>
    @endforeach
  </table>

  <hr>
  <h3 style="text-align: center;">{{ $lomasBosque }}</h3>
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
    @foreach($pdf_lomas_bosque as $bosque)
    <tr>
      <td><small>{{ $bosque->nombre_estado }}</small></td>
      <td><small>{{ $bosque->vivienda }}</small></td>
      <td><small>{{ $bosque->nombre }}</small></td>
      <td><small>{{ $bosque->apellido }}</small></td>
      <td><small>{{ $bosque->telefono1 }}</small></td>
      <td><small>{{ $bosque->correo }}</small></td>
      <td style="width: 100px;"><small>{{ $bosque->fecha_instalacion }}</small></td>
      <td style="width: 100px;"><small>{{ $bosque->fecha_emision_protocolo }}</small></td>
    </tr>
    @endforeach
  </table>
	
  </body>
</html>


