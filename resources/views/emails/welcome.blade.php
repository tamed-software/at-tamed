<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>

<p>Estimado(a) Sr.(a)</p>
<p>Se informa que se ha realizado la siguiente instalación de cliente:</p>
<br>
<table id="customers">
	<tr>
		<th>Inmobiliaria</th>
		<th>Proyecto</th>
    	<th>Dirección</th>
		<th>Número de Documento</th>
	    <th>Nombre</th>
	    <th>Apellido</th>
	    <th>Fecha de Nacimiento</th>
	    <th>Télefono 1</th>
	    <th>Télefono 2</th>
	    <th>Correo</th>
	    <th>Estado</th>
	    <th>Capacitación</th>
	    <th>Fecha instalación</th>
	    <th>Fecha emisión protocolo</th>
	    <th>Fecha capacitacion</th>
  	</tr>
  	<tr>
  		<td>{!!$nombreInmobiliaria!!}</td>
  		<td>{!!$nombreProyecto!!}</td>
		<td>{!!$vivienda!!}</td>
	    <td>{!!$num_documento!!}</td>
	    <td>{!!$nombre!!}</td>
	    <td>{!!$apellido!!}</td>
	    <td>{!!$fecha_nacimiento!!}</td>
	    <td>{!!$telefono1!!}</td>
	    <td>{!!$telefono2!!}</td>
	    <td>{!!$correo!!}</td>
	    @if ($estado_id == 1)
	    	<td>Contactado</td>
	    @elseif ($estado_id == 2)
	       	<td>No Contactado</td>
	    @elseif ($estado_id == 3)
	      	<td>Instalado</td>
	    @elseif ($estado_id == 4)
	      	<td>Agendado</td>
	    @elseif ($estado_id == 5)
	       	<td>Sin información</td>
	    @else
	    	<td></td>
	    @endif
	    <td>{!!$capacitacion!!}</td>
	    <td>{!!$fecha_instalacion!!}</td>
	    <td>{!!$fecha_emision_protocolo!!}</td>
	    <td>{!!$fecha_capacitacion!!}</td>
	</tr>
</table>

</body>
</html>

