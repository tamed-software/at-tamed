<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
  <style type="text/css">
    .container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

.table-bordered {
    border: 1px solid #ddd;
}

 td {
    border: 1px solid #ddd;
}
    
  .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
    border: 1px solid #ddd;
  }

  .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
  }

 table {
    border-spacing: 0;
    border-collapse: collapse;
  }
  table {
      border-collapse: separate;
      border-spacing: 2px;
  }
  body {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
  }

  html {
    font-size: 10px;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
html {
    font-family: sans-serif;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
table {
-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
font-size: 14px;
line-height: 1.42857143;
color: #333;
box-sizing: border-box;
border-spacing: 0;
border-collapse: collapse;
background-color: transparent;
width: 100%;
max-width: 100%;
margin-bottom: 20px;
}

thead {
    display: table-header-group;
    vertical-align: middle;
}

.table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > td {
    border-top: 0;
}
.bg-primary {
    color: #fff;
    background-color: #337ab7;
}
.text-center {
    text-align: center;
}

th {
    display: table-cell;
    font-weight: bold;
    text-align: -internal-center;
}

.hr{
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #f6f6f6;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}



  </style>
  <title>Protocolo N° {{ $numeroProtocoloCliente }}</title>
</head>
<body>
  <div class="container-fluid">

    <table class="table table-sm table-bordered">
      <tr>
        <td style="width: 150px;">
          <img src='/images/logo_tamed_protocolo.png'>
        </td>
        <td><center><p>PROTOCOLO DE INSTALACIÓN</p></center></td>
        <td>
          <center>
          <small>Código: REG-AT-INST-03</small><br>
          <small>Fecha: <?php echo date('d-m-Y'); ?></small>
          </center>
        </td>
      </tr>
    </table>

    <table class="table table-sm table-bordered">
      <tr>
        <td>
          <small>1. FECHA: <?php echo date('d-m-Y'); ?></small>
        </td>
        <td>
          <small>Hora Inicio: {{ $hora_inicio_protocolo }}</small>
        </td>
        <td>
          <small>Hora Término: {{ $hora_termino_protocolo }}</small>
        </td>
        <td>
          <small>N°: {{ $numeroProtocoloCliente }}</small>
        </td>
      </tr>
    </table>

    <table class="table table-sm table-bordered">
      <tr>
        <td>
          <small>2. Lugar de instalación: {{ $direccion_cliente }}</small>
        </td>
        <td>
          <small>Instalación:</small>
        </td>
        <td>
          <small>Capacitación:</small>
        </td>
      </tr>
    </table>
    
    <table class="table table-sm table-bordered">
      <tr>
        <td>
          <p>3. INSTALADOR</p>
          @foreach($datos_tecnico as $tecnico)
            <?php
              $id_tecnico = $tecnico->id;
              $firma_tecnico = $tecnico->signature;
              $nombre_tecnico = $tecnico->name;
              $apellido_tecnico = $tecnico->lastname;
            ?>
            <small>Nombre: {{ $tecnico->name }}</small><br>
            <small>Apellido: {{ $tecnico->lastname }}</small><br>
            <small>EMail: {{ $tecnico->email }}</small><br>
            <small>Teléfono: {{ $tecnico->telefono }}</small><br>
            <small>Empresa: {{ $tecnico->enterprise->enterprise }}</small>
          @endforeach
        </td>
        <td>
          <p>4. DATOS DEL CLIENTE</p>
          @foreach($get_cliente as $cliente)
            <?php
              $id_cliente = $cliente["id"];
              $nombre_cliente = $cliente["nombres"];
              $apellido_cliente = $cliente["apellidos"];
            ?>
            <small>Nombre: {{ $cliente["nombres"] }}</small><br>
            <small>Apellido: {{ $cliente["apellidos"] }}</small><br>
            <small>EMail: {{ $cliente["email"] }}</small><br>
            <small>Teléfono: {{ $cliente["telefono"] }}</small>
          @endforeach
        </td>
      </tr>
    </table>

    <small>5. Lista de dispositivos instalados (denominación, nombre del dispositivo, número de serie, ID del dispositivo y función)</small>
    <br>
    <br>

    <table class="table table-sm table-striped">
      <thead>
        <tr>
          <th class="bg-primary text-white text-center" scope="col">
            <small><strong>Nombre</strong></small>      
          </th>
          <th class="bg-primary text-white text-center" scope="col">
            <small><strong>Tipo</strong></small>
          </th>
          <th class="bg-primary text-white text-center" scope="col">
            <small><strong>ID</strong></small>
          </th>
          <th class="bg-primary text-white text-center" scope="col">
            <small><strong>Estado</strong></small>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($data_device_hc as $dev) {
            if(isset($dev->properties->configured) && isset($dev->properties->dead) && $dev->roomID != 0){

              if($dev->properties->dead == "false"){
                $dev->properties->dead = "Activo";
              }else if($dev->properties->dead == "true"){
                $dev->properties->dead = "inactivo";
              }
              $data = "<tr>";
              $data .= "<td>$dev->name</td>";
              $data .= "<td>$dev->type</td>";
              $data .= "<td>".$dev->id."</td>";
              $data .= "<td>".$dev->properties->dead."</td>";
              $data .= "</tr>";
              echo $data;
            }
          }
        ?>
      </tbody>
    </table>

    <small>6. Registro de conformidad: instalación, conficuración, pruebas operacionales y capacitación de sistema FIBARO.</small>

    
    <br>
    <br>

    @foreach($preguntas as $pre)
      <?php 
        if($pre->id === 1){
          $pregunta1 = $pre->pregunta;
        }
        if($pre->id === 2){
          $pregunta2 = $pre->pregunta;
        }
        if($pre->id === 3){
          $pregunta3 = $pre->pregunta;
        }
        if($pre->id === 4){
          $pregunta4 = $pre->pregunta;
        }
        if($pre->id === 5){
          $pregunta5 = $pre->pregunta;
        }
        if($pre->id === 6){
          $pregunta6 = $pre->pregunta;
        }
        if($pre->id === 7){
          $pregunta7 = $pre->pregunta;
        }
        if($pre->id === 8){
          $pregunta8 = $pre->pregunta;
        }
        if($pre->id === 9){
          $pregunta9 = $pre->pregunta;
        }
        if($pre->id === 10){
          $pregunta10 = $pre->pregunta;
        }
        if($pre->id === 11){
          $pregunta11 = $pre->pregunta;
        }
        if($pre->id === 12){
          $pregunta12 = $pre->pregunta;
        }
        if($pre->id === 13){
          $pregunta13 = $pre->pregunta;
        }
        if($pre->id === 14){
          $pregunta14 = $pre->pregunta;
        }
        if($pre->id === 15){
          $pregunta15 = $pre->pregunta;
        }
        if($pre->id === 16){
          $pregunta16 = $pre->pregunta;
        }
        if($pre->id === 17){
          $pregunta17 = $pre->pregunta;
        }
      ?>
    @endforeach

    <table class="table table-sm table-bordered">
      <tr>
        <td><small><?php echo $pregunta1; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta1 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta4; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta4 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta7; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta7 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
      </tr>
      <tr>
        <td><small><?php echo $pregunta2; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta2 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta5; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta5 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta8; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta8 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
      </tr>
      <tr>
        <td><small><?php echo $pregunta3; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta3 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta6; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta6 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta9; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta9 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/icons/check_error.png'>";
            }
          ?>
        </td>
      </tr>
    </table>

    <br>
    <br>

    <p>Capacitación:</p>

    <table class="table table-sm table-bordered">
      <tr>
        <td><small><?php echo $pregunta10; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta10 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta12; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta12 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta14; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta14 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta16; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta16 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
      </tr>
      <tr>
        <td><small><?php echo $pregunta11; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta11 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta13; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta13 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta15; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta15 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
        <td><small><?php echo $pregunta17; ?></small></td>
        <td style="width: 35px;">
          <?php 
            if($contPregunta17 === 2){
              echo "<img src='/images/check_ok.png'>";
            } else {
              echo "<img src='/images/check_error.png'>";
            }
          ?>
        </td>
      </tr>
    </table>

    <small class="text-justify">Una vez finalizada la instalación, al usuario se le recomienda cambiar la contraseña de administrador de su Home Center por seguridad. Se sugiere que la contraseña contenga letras mayúsculas, minúsculas, números y caracteres especiales, con un largo mínimo de 6 caracteres. Se informa que una vez hecha esta modificación, TAMED no tendrá acceso a la nueva contraseña, por lo que en caso de asistencia remota es necesario volver a las contraseñas de este producto. Lo anterior por políticas de privacidad y seguridad vigentes.</small>

    <br>
    <br>

    <small class="text-justify">Confirmo la correcta instalación, configuración, revisión y correctas pruebas operacionales y capacitación de hasta 2 horas en la gestión básica del Sistema.</small>

   <br>
   <br>

    <small><strong>Nota:</strong> Para Soporte y Garantía comunicarse al fono: 02 28486547 y mail: soporte@tamed.global</small>

    <br>
    <br>

    <p>Observaciones:</p>

    <div class="form-group">
      <p class="form-control">{{ $comentarioProtocoloCliente }}</p>
    </div>

    <br>
    <br>


    <table class="table table-sm table-bordered">
      <tr>
        <td>
          <center>
          <small class="text-center">Firma del instalador</small><br>
          <img style="width: 300px;" src="<?php echo 'data:image/png;base64,'.$firma_tecnico; ?>">
          <p> {{ $nombre_tecnico }} {{ $apellido_tecnico }} </p>
          </center>
        </td>
        <td>
          <center>
          <small class="text-center">Firma del Cliente</small><br>
          <img style="width: 300px;" src="<?php echo 'data:image/png;base64,'.$firma_cl; ?>">
            <p> {{ $nombre_cliente }} {{ $apellido_cliente }} </p>
            <p>  {{$rut_cliente}} </p>
          </center>
        </td>
      </tr>
    </table>
  
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  </body>
</html>