<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
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

    <title></title>
  </head>
<body>
  <div class="container-fluid">

    <table class="table table-sm table-bordered" style="border: solid 1px #000000; ">
      <tr>
        <td style="width: 150px;">
          <img src="images/logo_tamed_protocolo.png">
        </td>
        <td><center><p>INFORME DE CONTACTABILIDAD - CLIENTES INMOBILIARIA {{ $inmobiliaria }} </p></center></td>
        <td>
          <center>
            <small>Código: REG-O-05</small><br>
            <small>10 Septiembre de 2018</small>
          </center>
        </td>
      </tr>
    </table>
    <div class="row">
      <div class="col-md-12">
        <p>Fecha: <?php echo date('d-m-Y'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Informe realizado por: <?php echo Auth::user()->name; ?></p>
      </div>
    </div>
  </div>
</body>
</html>