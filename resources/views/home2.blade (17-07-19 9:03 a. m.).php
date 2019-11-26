<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page title -->
    <title>TAMED | Inmobiliarias</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory --> 
    <link rel="shortcut icon" type="image/ico" href="icons/favicon.png" />

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/metisMenu/dist/metisMenu.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke/css/helper.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">

</head>
<body class="fixed-navbar sidebar-scroll">

<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            <img src="icons/logo_tamed_login.png" class="img-responsive">
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">HOMER APP</span>
        </div>
        <form role="search" class="navbar-form-custom" method="post" action="#">
            <div class="form-group">
                <input type="text" placeholder="Buscas algo en especial" class="form-control" name="search">
            </div>
        </form>
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li class="dropdown">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="left" title="Cerrar sesión">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
           <!-- <a href="{{ url('home2') }}">
                <img src="images/perfilChanchita.JPG" class="img-circle m-b" alt="logo">
            </a>-->

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">{{ Auth::user()->name }}</span>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted">Menú usuario <b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated flipInX m-t-xs">
                       <!-- <li><a href="#">Contactos</a></li>
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Reportes</a></li>
                        <li class="divider"></li>-->
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Cerrar sesión') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav" id="side-menu">
            <li>
                <a href="#"><span class="nav-label">Proyectos</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('home2') }}">Proyectos</a></li>
                    <li><a href="{{ url('reporteProyectos') }}">Reportes</a></li>
                    <li><a href="{{ url('reporteMensualProyectos') }}">Reportes mensuales</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('cliente') }}"> <span class="nav-label">Buscar proyectos</span></a>
            </li>
            <li>
                <a href="{{ url('importar') }}"> <span class="nav-label">Importar proyectos</span></a>
            </li>
            <li>
                <a href="#"><span class="nav-label">Contrato</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('contrato.index') }}">Crear</a></li>
                    <li><a href="{{ url('contrato.listado') }}">Ver contratos</a></li>
                    <li><a href="{{ url('contrato.finanza') }}">Finanzas</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Adm inmobiliaria</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('adminmobiliariaproyecto') }}">Crear</a></li>
                    <li><a href="{{ url('listar_inmobiliaria_proyecto') }}">Listar</a></li>
                </ul>
            </li>
            <li>
                <a href="#"> <span class="nav-label">Productos</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('producto.index') }}">Crear</a></li>
                    <li><a href="{{ url('producto.listar') }}">Ver productos</a></li>
                </ul>
            </li>
            <li>
                <a href="#"> <span class="nav-label">Inventario de Proyectos</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('inventario') }}">Crear</a></li>
                    <li><a href="{{ url('inventario.listar') }}">Ver inventarios</a></li>
                    <li><a href="{{ url('inventario.editar') }}">Editar inventarios</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="normalheader ">
        <div class="hpanel">
            <div class="panel-body">
                <a class="small-header-action" href="">
                    <div class="clip-header">
                        <i class="fa fa-arrow-up"></i>
                    </div>
                </a>

                <div id="hbreadcrumb" class="pull-right m-t-lg">
                    <ol class="hbreadcrumb breadcrumb">
                        <li><a href="{{ url('home2') }}">Dashboard</a></li>
                        <li class="active">
                            <span>Gráficos </span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Gráficos
                </h2>
                <small>Gráficos inmobiliaria</small>
            </div>
        </div>
    </div>

<div class="content">

    <!-- INICIO FILTRAR PROYECTO -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                </div>
                Estados de los clientes
                <div class="panel-body">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php
                            if($totalCapacitados <= 2){
                                $totalCapacitados = 0;
                            } else {
                                $totalCapacitados;
                            }
                            $sumaEstados = $totalSinInformacion+$totalNoContactados+$totalContactados+$totalAgendados+$totalInstalados+$totalCapacitados+$totalPendientes+$totalInstaladosCapacitados;

                            $sumaEstadosOtros = $totalSinInformacion+$totalNoContactados+$totalContactados+$totalAgendados+$totalInstalados+$totalCapacitados+$totalPendientes;

                            $porcentarje = $totalInstaladosCapacitados * 100;
                            $porcentarje_div = $porcentarje / $sumaEstados;
                            $resultado_estados = number_format((float)$porcentarje_div, 1, '.', '');

                            $porcentaje_otros_estados = $sumaEstadosOtros * 100;
                            $porcentarje_div_otros = $porcentaje_otros_estados / $sumaEstados;
                            $result_otros_estados = number_format((float)$porcentarje_div_otros,1,'.','');

                            $porcentaje_totalSinInformacion = $totalSinInformacion * 100;
                            $porcentaje_totalSinInformacion_div = $porcentaje_totalSinInformacion / $sumaEstados;
                            $porcentaje_totalSinInformacion_final = number_format((float)$porcentaje_totalSinInformacion_div, 1, '.', '');

                            $porcentaje_totalNoContactados = $totalNoContactados * 100;
                            $porcentaje_totalNoContactados_div = $porcentaje_totalNoContactados / $sumaEstados;
                            $porcentaje_totalNoContactados_final = number_format((float)$porcentaje_totalNoContactados_div, 1, '.', '');

                            $porcentaje_totalContactados = $totalContactados * 100;
                            $porcentaje_totalContactado_div = $porcentaje_totalContactados / $sumaEstados;
                            $porcentaje_totalContactado_final = number_format((float)$porcentaje_totalContactado_div, 1, '.', '');

                            $porcentaje_totalAgendados = $totalAgendados * 100;
                            $porcentaje_totalAgendados_div = $porcentaje_totalAgendados / $sumaEstados;
                            $porcentaje_totalAgendados_final = number_format((float)$porcentaje_totalAgendados_div, 1, '.', '');

                            $porcentaje_totalInstalados = $totalInstalados * 100;
                            $porcentaje_totalInstalados_div = $porcentaje_totalInstalados / $sumaEstados;
                            $porcentaje_totalInstalados_final = number_format((float)$porcentaje_totalInstalados_div, 1, '.', '');

                            $porcentaje_totalCapacitados = $totalCapacitados * 100;
                            $porcentaje_totalCapacitados_div = $porcentaje_totalCapacitados / $sumaEstados;
                            $porcentaje_totalCapacitados_final = number_format((float)$porcentaje_totalCapacitados_div, 1, '.', '');

                            $porcentaje_totalPendientes = $totalPendientes * 100;
                            $porcentaje_totalPendientes_div = $porcentaje_totalPendientes / $sumaEstados;
                            $porcentaje_totalPendientes_final = number_format((float)$porcentaje_totalPendientes_div, 1, '.', '');

                            $porcentaje_totalInstaladosCapacitados = $totalInstaladosCapacitados * 100;
                            $porcentaje_totalInstaladosCapacitados_div = $porcentaje_totalInstaladosCapacitados / $sumaEstados;
                            $porcentaje_totalInstaladosCapacitados_final = number_format((float)$porcentaje_totalInstaladosCapacitados_div, 1, '.', '');
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <h2>Total Clientes: {{ $sumaEstados }} </h2>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12" style="float:right; text-align:right;">
                                    <h2>Total Proyectos: {{ $total_proyectos }} </h2>
                                </div>
                            </div>
                        </div>
                        <br> 
                        <div class="table-responsive">
                            <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sin información</th>
                                    <th>No contactados</th>
                                    <th>Contactados</th>
                                    <th>Agendados</th>
                                    <th>Instalados</th>
                                    <!--th>Capacitados</th-->
                                    <th>Con observación</th>
                                    <th>Instalados y<br> capacitados</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $totalSinInformacion }} <?php echo '('.$porcentaje_totalSinInformacion_final.'%)'; ?></td>
                                    <td>{{ $totalNoContactados }} <?php echo '('.$porcentaje_totalNoContactados_final.'%)'; ?></td>
                                    <td>{{ $totalContactados }} <?php echo '('.$porcentaje_totalContactado_final.'%)'; ?></td>
                                    <td>{{ $totalAgendados }} <?php echo '('.$porcentaje_totalAgendados_final.'%)'; ?></td>
                                    <td>{{ $totalInstalados }} <?php echo '('.$porcentaje_totalInstalados_final.'%)'; ?></td>
                                    <!--td><?php //echo ($totalCapacitados <= 2) ? '0 ('.$porcentaje_totalCapacitados_final.'%)' : $totalCapacitados.' ('.$porcentaje_totalCapacitados_final.'%)'; ?></td-->
                                    <td>{{ $totalPendientes }} <?php echo '('.$porcentaje_totalPendientes_final.'%)'; ?></td>
                                    <td>{{ $totalInstaladosCapacitados }} <?php echo '('.$porcentaje_totalInstaladosCapacitados_final.'%)'; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12" id="test_grafico" style="width: 100%; height: 800px; min-height: 550px;"> 
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Instalado y capacitado</th>
                                    <th>Otros estados</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $totalInstaladosCapacitados.' ('.$resultado_estados.'%)'; ?></td>
                                    <td><?php echo $sumaEstadosOtros.' ('.$result_otros_estados.'%)'; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-info btn-lg btn-block" id="informe_total_proyectos">Ver detalles</button>
                    </div> 
                </div>
            </div>
        </div> 
    </div>
    
    <div class="row">
      <div class="col-lg-12">
          <div class="hpanel">
              <div class="panel-heading">
                  <div class="panel-tools">
                      <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                  </div>
                  Proyectos activos
              </div>
              <div class="panel-body">
                    <!-- INICIO INMOBILIARIA ACTUAL -->
                    <div class="row">
                        <h2 class="text-info">ACTUAL</h2>
                        <hr>
                        <center>
                            <?php
                            $sum_total_palermo = $proyecto_palermo_con+$proyecto_palermo_noCon+$proyecto_palermo_ins+$proyecto_palermo_agen+$proyecto_palermo_sin+$proyecto_palermo_cap+$proyecto_palermo_ins_cap+$proyecto_palermo_pendiente;
                            if($sum_total_palermo == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }
                            ?>
                            <!--div class="col-md-4 col-sm-12 col-xs-12"-->
                                <div id="palermo" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    if($sum_total_palermo != 0){

                                                        $porcentaje_palermo = $proyecto_palermo_ins_cap * 100;
                                                        $div_palermo = $porcentaje_palermo / $sum_total_palermo;
                                                        $resul_palermo = number_format((float)$div_palermo, 1, '.', '');
                                                        
                                                        echo $proyecto_palermo_ins_cap.' ('.$resul_palermo.'%)';

                                                    }else{

                                                    
                                                    }    
                                                    ?>
                                                    
                                                </td>
                                                <td>
                                                    <?php 
                                                    if($sum_total_palermo != 0){

                                                        $sum_pro_palermo = $proyecto_palermo_con+$proyecto_palermo_noCon+$proyecto_palermo_ins+$proyecto_palermo_agen+$proyecto_palermo_sin+$proyecto_palermo_cap+$proyecto_palermo_pendiente;

                                                        $porcentaje_palermo_otros = $sum_pro_palermo * 100;
                                                        $div_palermo_otros = $porcentaje_palermo_otros / $sum_total_palermo;
                                                        $resul_palermo_otros = number_format((float)$div_palermo_otros, 1, '.', '');

                                                        echo $sum_pro_palermo.' ('.$resul_palermo_otros.'%)';
                                                    }else{
                                                    

                                                    }    
                                                    ?>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(73)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php
                            $sum_total_seminario = $proyecto_seminario_con+$proyecto_seminario_noCon+$proyecto_seminario_ins+$proyecto_seminario_agen+$proyecto_seminario_sin+$proyecto_seminario_cap+$proyecto_seminario_ins_cap+$proyecto_seminario_pendiente;

                            if($sum_total_seminario == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }
                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="seminario" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_total_seminario != 0){

                                                        $porcentaje_seminario = $proyecto_seminario_ins_cap * 100;
                                                        $div_seminario = $porcentaje_seminario / $sum_total_seminario;
                                                        $resul_seminario = number_format((float)$div_seminario, 1, '.', '');
                                                        
                                                        echo $proyecto_seminario_ins_cap.' ('.$resul_seminario.'%)';

                                                        }else{


                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 

                                                    if($sum_total_seminario != 0 ){

                                                         $sum_pro_seminario = $proyecto_seminario_con+$proyecto_seminario_noCon+$proyecto_seminario_ins+$proyecto_seminario_agen+$proyecto_seminario_sin+$proyecto_seminario_cap+$proyecto_seminario_pendiente;

                                                        $porcentaje_seminario_otros = $sum_pro_seminario * 100;
                                                        $div_seminario_otros = $porcentaje_seminario_otros / $sum_total_seminario;
                                                        $resul_seminario_otros = number_format((float)$div_seminario_otros, 1, '.', '');

                                                        echo $sum_pro_seminario.' ('.$resul_seminario_otros.'%)';

                                                    }else{

                                                    }

                                                       
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(72)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php
                            $sum_lasVioletas = $lasVioletas_sin+$lasVioletas_noCon+$lasVioletas_con+$lasVioletas_agen+$lasVioletas_ins+$lasVioletas_cap+$lasVioletas_ins_cap+$lasVioletas_pendiente;

                            if($sum_lasVioletas == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                                <div id="lasVioletas" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_lasVioletas != 0 ){
                                                            $porcentaje_lasVioletas = $lasVioletas_ins_cap * 100;
                                                            $div_lasVioletas= $porcentaje_lasVioletas / $sum_lasVioletas;
                                                            $resut_lasVioletas = number_format((float)$div_lasVioletas,1,'.','');
                                                            echo $lasVioletas_ins_cap.' ('.$resut_lasVioletas.'%)';
                                                        } else {

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_lasVioletas != 0 ){
                                                            $sumOtros_lasVioletas = $lasVioletas_sin+$lasVioletas_noCon+$lasVioletas_con+$lasVioletas_agen+$lasVioletas_ins+$lasVioletas_cap+$lasVioletas_pendiente;
                                                            $porcentajeOtros_lasVioletas = $sumOtros_lasVioletas * 100;
                                                            $divOtros_lasVioletas = $porcentajeOtros_lasVioletas / $sum_lasVioletas;
                                                            $resutOtros_lasVioletas = number_format((float)$divOtros_lasVioletas,1,'.','');
                                                            echo $sumOtros_lasVioletas.' ('.$resutOtros_lasVioletas.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(32)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA ACTUAL -->
                    <!-- INICIO INMOBILIARIA ARDAC -->
                    <div class="row">
                        <h2 class="text-info">ARDAC</h2>
                        <hr>
                        <center>
                            <?php

                            $sum_total_maderos_de_abedules = $proyecto_maderos_de_abedules_con+$proyecto_maderos_de_abedules_noCon+$proyecto_maderos_de_abedules_ins+$proyecto_maderos_de_abedules_agen+$proyecto_maderos_de_abedules_sin+$proyecto_maderos_de_abedules_cap+$proyecto_maderos_de_abedules_ins_cap+$proyecto_maderos_de_abedules_pendiente;

                            if($sum_total_maderos_de_abedules == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }
                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="maderos_de_abedules" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_total_maderos_de_abedules != 0){

                                                        $porcentaje_maderos_de_abedules = $proyecto_maderos_de_abedules_ins_cap * 100;
                                                        $div_maderos_de_abedules = $porcentaje_maderos_de_abedules / $sum_total_maderos_de_abedules;
                                                        $resul_maderos_de_abedules = number_format((float)$div_maderos_de_abedules, 1, '.', '');
                                                        
                                                        echo $proyecto_maderos_de_abedules_ins_cap.' ('.$resul_maderos_de_abedules.'%)';

                                                        }else{

                                                        }

                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                   <?php 

                                                   if($sum_total_maderos_de_abedules != 0){

                                                        $sum_pro_maderos_de_abedules = $proyecto_maderos_de_abedules_con+$proyecto_maderos_de_abedules_noCon+$proyecto_maderos_de_abedules_ins+$proyecto_maderos_de_abedules_agen+$proyecto_maderos_de_abedules_sin+$proyecto_maderos_de_abedules_cap+$proyecto_maderos_de_abedules_pendiente;

                                                        $porcentaje_maderos_de_abedules_otros = $sum_pro_maderos_de_abedules * 100;
                                                        $div_maderos_de_abedules_otros = $porcentaje_maderos_de_abedules_otros / $sum_total_maderos_de_abedules;
                                                        $resul_maderos_de_abedules_otros = number_format((float)$div_maderos_de_abedules_otros, 1, '.', '');

                                                        echo $sum_pro_maderos_de_abedules.' ('.$resul_maderos_de_abedules_otros.'%)';

                                                    }else{

                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(23)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA ARDAC -->
                    <!-- INICIO INMOBILIARIA BELTEC -->
                    <div class="row">
                        <h2 class="text-info">BELTEC</h2>
                        <hr>
                        <center>

                            <?php

                            $sum_total_bosque_real = $proyecto_bosque_real_con+$proyecto_bosque_real_noCon+$proyecto_bosque_real_ins+$proyecto_bosque_real_agen+$proyecto_bosque_real_sin+$proyecto_bosque_real_cap+$proyecto_bosque_real_ins_cap+$proyecto_bosque_real_pendiente;

                            if($sum_total_bosque_real == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="proyecto_varas_gallardo" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_total_bosque_real != 0){

                                                        $porcentaje_bosque_real = $proyecto_bosque_real_ins_cap * 100;
                                                        $div_bosque_real = $porcentaje_bosque_real / $sum_total_bosque_real;
                                                        $resul_bosque_real = number_format((float)$div_bosque_real, 1, '.', '');
                                                        
                                                        echo $proyecto_bosque_real_ins_cap.' ('.$resul_bosque_real.'%)';

                                                        }else{

                                                        }

                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 

                                                    if($sum_total_bosque_real != 0){

                                                        $sum_pro_bosque_real = $proyecto_bosque_real_con+$proyecto_bosque_real_noCon+$proyecto_bosque_real_ins+$proyecto_bosque_real_agen+$proyecto_bosque_real_sin+$proyecto_bosque_real_cap+$proyecto_bosque_real_pendiente;

                                                        $porcentaje_bosque_real_otros = $sum_pro_bosque_real * 100;
                                                        $div_bosque_real_otros = $porcentaje_bosque_real_otros / $sum_total_bosque_real;
                                                        $resul_bosque_real_otros = number_format((float)$div_bosque_real_otros, 1, '.', '');

                                                        echo $sum_pro_bosque_real.' ('.$resul_bosque_real_otros.'%)';

                                                    }else{

                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(17)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>

                            <?php

                            $sumEstCondominioRincon = $proyecto_condominio_elrincon_sin+$proyecto_condominio_elrincon_noCon+$proyecto_condominio_elrincon_con+$proyecto_condominio_elrincon_agen+$proyecto_condominio_elrincon_ins+$proyecto_condominio_elrincon_cap+$proyecto_condominio_elrincon_ins_cap+$proyecto_condominio_elrincon_pendiente;

                            if($sumEstCondominioRincon == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="proyecto_varas_gallardo2" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumEstCondominioRincon != 0){

                                                        $porcentajeCondominioRincon = $proyecto_condominio_elrincon_ins_cap * 100;
                                                        $divCondominioRincon = $porcentajeCondominioRincon / $sumEstCondominioRincon;
                                                        $resulCondominioRincon = number_format((float)$divCondominioRincon, 1, '.', '');

                                                        echo $proyecto_condominio_elrincon_ins_cap.' ('.$resulCondominioRincon.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>    
                                                </td>
                                                <td>
                                                    <?php

                                                    if($sumEstCondominioRincon != 0){

                                                        $otrosEstCondominioRincon = $proyecto_condominio_elrincon_sin+$proyecto_condominio_elrincon_noCon+$proyecto_condominio_elrincon_con+$proyecto_condominio_elrincon_agen+$proyecto_condominio_elrincon_ins+$proyecto_condominio_elrincon_cap+$proyecto_condominio_elrincon_pendiente;

                                                        $porcentajeCondominioRinconOtros = $otrosEstCondominioRincon * 100;
                                                        $divCondominioRinconOtros = $porcentajeCondominioRinconOtros / $sumEstCondominioRincon;
                                                        $resulCondominioRinconOtros = number_format((float)$divCondominioRinconOtros, 1, '.', '');
                                                        
                                                        echo $otrosEstCondominioRincon.' ('.$resulCondominioRinconOtros.'%)';

                                                    }else{

                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(16)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA BELTEC -->
                    <!-- INICIO INMOBILIARIA BEZANILLA -->
                    <div class="row">
                    <h2 class="text-info">BEZANILLA</h2>
                    <hr>
                        <center>

                            <?php

                            $sum_total_bordemar = $proyecto_bordemar_con+$proyecto_bordemar_noCon+$proyecto_bordemar_ins+$proyecto_bordemar_agen+$proyecto_bordemar_sin+$proyecto_bordemar_cap+$proyecto_bordemar_ins_cap+$proyecto_bordemar_pendiente;

                            if($sum_total_bordemar == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="bordemar" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_total_bordemar != 0){

                                                            $porcentaje_bordemar = $proyecto_bordemar_ins_cap * 100;
                                                        $div_bordemar = $porcentaje_bordemar / $sum_total_bordemar;
                                                        $resul_bordemar = number_format((float)$div_bordemar, 1, '.', '');
                                                        
                                                        echo $proyecto_bordemar_ins_cap.' ('.$resul_bordemar.'%)';

                                                        }else{

                                                        }

                                                    ?>

                                                </td>
                                                <td>
                                                    <?php 

                                                    if($sum_total_bordemar != 0){

                                                        $sum_pro_bordemar = $proyecto_bordemar_con+$proyecto_bordemar_noCon+$proyecto_bordemar_ins+$proyecto_bordemar_agen+$proyecto_bordemar_sin+$proyecto_bordemar_cap+$proyecto_bordemar_pendiente;

                                                        $porcentaje_bordemar_otros = $sum_pro_bordemar * 100;
                                                        $div_bordemar_otros = $porcentaje_bordemar_otros / $sum_total_bordemar;
                                                        $resul_bordemar_otros = number_format((float)$div_bordemar_otros, 1, '.', '');

                                                        echo $sum_pro_bordemar.' ('.$resul_bordemar_otros.'%)';

                                                    }else{

                                                    }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(2)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA BEZANILLA -->
                    <!-- INICIO INMOBILIARIA BUROTTO -->
                    <div class="row">
                        <h2 class="text-info">BUROTTO</h2>
                        <hr>
                        <center>

                            <?php

                            $sum_mitte_vitacura = $proyecto_mitte_vitacura_sin+$proyecto_mitte_vitacura_noCon+$proyecto_mitte_vitacura_con+$proyecto_mitte_vitacura_agen+$proyecto_mitte_vitacura_ins+$proyecto_mitte_vitacura_cap+$proyecto_mitte_vitacura_ins_cap+$proyecto_mitte_vitacura_pendiente;

                            if($sum_mitte_vitacura == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="mitte_vitacura" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    if($sum_mitte_vitacura != 0 ){

                                                        $porcentaje_mitte_vitacura = $proyecto_mitte_vitacura_ins_cap * 100;
                                                        $div_mitte_vitacura = $porcentaje_mitte_vitacura / $sum_mitte_vitacura;
                                                        $resut_mitte_vitacura = number_format((float)$div_mitte_vitacura,1,'.','');

                                                        echo $proyecto_mitte_vitacura_ins_cap.' ('.$resut_mitte_vitacura.'%)';

                                                    }else{


                                                   }                                   
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                    if($sum_mitte_vitacura != 0){

                                                        $sumOtros_mitte_vitacura = $proyecto_mitte_vitacura_sin+$proyecto_mitte_vitacura_noCon+$proyecto_mitte_vitacura_con+$proyecto_mitte_vitacura_agen+$proyecto_mitte_vitacura_ins+$proyecto_mitte_vitacura_cap+$proyecto_mitte_vitacura_pendiente;
                                                        $porcentajeOtros_mitte_vitacura = $sumOtros_mitte_vitacura * 100;
                                                        $divOtros_mitte_vitacura = $porcentajeOtros_mitte_vitacura / $sum_mitte_vitacura;
                                                        $resutOtros_mitte_vitacura = number_format((float)$divOtros_mitte_vitacura,1,'.','');
                                                        echo $sumOtros_mitte_vitacura.' ('.$resutOtros_mitte_vitacura.'%)';

                                                    }else{
                                                        
                                                    }

                                                    ?>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(46)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA BUROTTO -->
                    <!-- INICIO INMOBILIARIA CISS -->
                    <div class="row">
                        <h2 class="text-info">CISS</h2>
                        <hr>
                        <center>

                            <?php

                            $sum_andalhue = $proyecto_andalhue_sin+$proyecto_andalhue_noCon+$proyecto_andalhue_con+$proyecto_andalhue_agen+$proyecto_andalhue_ins+$proyecto_andalhue_cap+$proyecto_andalhue_ins_cap+$proyecto_andalhue_pendiente;

                            if($sum_andalhue == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="andalhue" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_andalhue != 0 ){

                                                        $porcentaje_andalhue = $proyecto_andalhue_ins_cap * 100;
                                                        $div_andalhue = $porcentaje_andalhue / $sum_andalhue;
                                                        $resut_andalhue = number_format((float)$div_andalhue,1,'.','');

                                                        echo $proyecto_andalhue_ins_cap.' ('.$resut_andalhue.'%)';

                                                        }else{

                                                        }
                                                        
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($sum_andalhue != 0 ){

                                                        $sumOtros_andalhue = $proyecto_andalhue_sin+$proyecto_andalhue_noCon+$proyecto_andalhue_con+$proyecto_andalhue_agen+$proyecto_andalhue_ins+$proyecto_andalhue_cap+$proyecto_andalhue_pendiente;
                                                        $porcentajeOtros_andalhue = $sumOtros_andalhue * 100;
                                                        $divOtros_andalhue = $porcentajeOtros_andalhue / $sum_andalhue;
                                                        $resutOtros_andalhue = number_format((float)$divOtros_andalhue,1,'.','');
                                                        echo $sumOtros_andalhue.' ('.$resutOtros_andalhue.'%)';

                                                    }else{

                                                    }
                                                        
                                                    ?>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(33)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIAIRIA CISS -->
                    <!-- INICIO INMOBILIARIA FAI -->
					<div class="row">
                        <h2 class="text-info">FAI</h2>
                        <hr>
                        <!-- 
                        <center>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div id="alfred_nobel" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                     <?php
                                                    
                                                      
                                                        
                                                    ?>

                                                </td>
                                                <td>
                                                    <?php 
                                                    
                                                        
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </center>
                    -->
                        <center>

                            <?php

                            $sum_buenaVista = $proyecto_buenaVista_sin+$proyecto_buenaVista_noCon+$proyecto_buenaVista_con+$proyecto_buenaVista_agen+$proyecto_buenaVista_ins+$proyecto_buenaVista_cap+$proyecto_buenaVista_ins_cap+$proyecto_buenaVista_pendiente;

                            if($sum_buenaVista == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="buenaVista" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_buenaVista != 0 ){

                                                        $porcentaje_buenaVista = $proyecto_buenaVista_ins_cap * 100;
                                                        $div_buenaVista = $porcentaje_buenaVista / $sum_buenaVista;
                                                        $resut_buenaVista = number_format((float)$div_buenaVista,1,'.','');
                                                        
                                                        echo $proyecto_buenaVista_ins_cap.' ('.$resut_buenaVista.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sum_buenaVista != 0 ){
                                                        $sumOtros_buenaVista = $proyecto_buenaVista_sin+$proyecto_buenaVista_noCon+$proyecto_buenaVista_con+$proyecto_buenaVista_agen+$proyecto_buenaVista_ins+$proyecto_buenaVista_cap+$proyecto_buenaVista_pendiente;

                                                        $porcentajeOtros_buenaVista = $sumOtros_buenaVista * 100;
                                                        $divOtros_buenaVista = $porcentajeOtros_buenaVista / $sum_buenaVista;
                                                        $resutOtros_buenaVista = number_format((float)$divOtros_buenaVista,1,'.','');

                                                        echo $sumOtros_buenaVista.' ('.$resutOtros_buenaVista.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(19)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA FAI -->
                    <!-- INICIO GRUPO ACTIVA -->
                    <div class="row">
                        <h2 class="text-info">GRUPOACTIVA</h2>
                        <hr>
                        <center>
                            <?php
                            $sum_gralSaavedra = $proyecto_gralSaavedra_sin+$proyecto_gralSaavedra_noCon+$proyecto_gralSaavedra_con+$proyecto_gralSaavedra_agen+$proyecto_gralSaavedra_ins+$proyecto_gralSaavedra_cap+$proyecto_gralSaavedra_ins_cap+$proyecto_gralSaavedra_pendiente;

                            if($sum_gralSaavedra == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                                <div id="gralSaavedra" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_gralSaavedra != 0 ){
                                                            $porcentaje_gralSaavedra = $proyecto_gralSaavedra_ins_cap * 100;
                                                            $div_gralSaavedra = $porcentaje_gralSaavedra / $sum_gralSaavedra;
                                                            $resut_gralSaavedra = number_format((float)$div_gralSaavedra,1,'.','');
                                                            echo $proyecto_gralSaavedra_ins_cap.' ('.$resut_gralSaavedra.'%)';
                                                        } else {

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_gralSaavedra != 0 ){
                                                            $sumOtros_gralSaavedra = $proyecto_gralSaavedra_sin+$proyecto_gralSaavedra_noCon+$proyecto_gralSaavedra_con+$proyecto_gralSaavedra_agen+$proyecto_gralSaavedra_ins+$proyecto_gralSaavedra_cap+$proyecto_gralSaavedra_pendiente;
                                                            $porcentajeOtros_gralSaavedra = $sumOtros_gralSaavedra * 100;
                                                            $divOtros_gralSaavedra = $porcentajeOtros_gralSaavedra / $sum_gralSaavedra;
                                                            $resutOtros_gralSaavedra = number_format((float)$divOtros_gralSaavedra,1,'.','');
                                                            echo $sumOtros_gralSaavedra.' ('.$resutOtros_gralSaavedra.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(114)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php
                            $sum_activaEntreCerros = $proyecto_activaEntreCerros_sin+$proyecto_activaEntreCerros_noCon+$proyecto_activaEntreCerros_con+$proyecto_activaEntreCerros_agen+$proyecto_activaEntreCerros_ins+$proyecto_activaEntreCerros_cap+$proyecto_activaEntreCerros_ins_cap+$proyecto_activaEntreCerros_pendiente;

                            if($sum_activaEntreCerros == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                                <div id="activaEntreCerros" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_activaEntreCerros != 0 ){
                                                            $porcentaje_activaEntreCerros = $proyecto_activaEntreCerros_ins_cap * 100;
                                                            $div_activaEntreCerros = $porcentaje_activaEntreCerros / $sum_activaEntreCerros;
                                                            $resut_activaEntreCerros = number_format((float)$div_activaEntreCerros,1,'.','');
                                                            echo $proyecto_activaEntreCerros_ins_cap.' ('.$resut_activaEntreCerros.'%)';
                                                        } else {

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_activaEntreCerros != 0 ){
                                                            $sumOtros_activaEntreCerros = $proyecto_activaEntreCerros_sin+$proyecto_activaEntreCerros_noCon+$proyecto_activaEntreCerros_con+$proyecto_activaEntreCerros_agen+$proyecto_activaEntreCerros_ins+$proyecto_activaEntreCerros_cap+$proyecto_activaEntreCerros_pendiente;
                                                            $porcentajeOtros_activaEntreCerros = $sumOtros_activaEntreCerros * 100;
                                                            $divOtros_activaEntreCerros = $porcentajeOtros_activaEntreCerros / $sum_activaEntreCerros;
                                                            $resutOtros_activaEntreCerros = number_format((float)$divOtros_activaEntreCerros,1,'.','');
                                                            echo $sumOtros_activaEntreCerros.' ('.$resutOtros_activaEntreCerros.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(81)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN GRUPO ACTIVA -->   
                    <!-- INICIO INMOBILIARIA HCG-->
					<div class="row">
						<h2 class="text-info">HCG</h2>
                        <hr>
						<center>

                            <?php

                            $sumLosAlerces = $proyecto_los_alerces_sin+$proyecto_los_alerces_noCon+$proyecto_los_alerces_con+$proyecto_los_alerces_agen+$proyecto_los_alerces_ins+$proyecto_los_alerces_cap+$proyecto_los_alerces_ins_cap+$proyecto_los_alerces_pendiente;

                            if($sumLosAlerces == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="los_alerces" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumLosAlerces != 0 ){

                                                        $porcentajeLosAlerces = $proyecto_los_alerces_ins_cap * 100;
                                                        $divLosAlerces = $porcentajeLosAlerces / $sumLosAlerces;
                                                        $resulLosAlerces = number_format((float)$divLosAlerces,1,'.',''); 
                                                        
                                                        echo $proyecto_los_alerces_ins_cap.' ('.$resulLosAlerces.'%)'; 

                                                        }else{

                                                        }
                                                       
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumLosAlerces != 0){

                                                        $otrosEstLosAlerces = $proyecto_los_alerces_sin+$proyecto_los_alerces_noCon+$proyecto_los_alerces_con+$proyecto_los_alerces_agen+$proyecto_los_alerces_ins+$proyecto_los_alerces_cap+$proyecto_los_alerces_pendiente;
                                                        $porcentajeLosAlercesOtros = $otrosEstLosAlerces * 100;
                                                        $divLosAlercesOtros = $porcentajeLosAlercesOtros / $sumLosAlerces;
                                                        $resulLosAlercesOtros = number_format((float)$divLosAlercesOtros,1,'.','');

                                                        echo $otrosEstLosAlerces.' ('.$resulLosAlercesOtros.'%)';

                                                        }else{

                                                        }
                                                       
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(15)">Ver detalles</button>
                                </div>          
                            </div>
                        </center>
                       <center>

                           <?php

                            $sumParqueGarciaHuerta = $proyecto_parque_garcia_huerta_sin+$proyecto_parque_garcia_huerta_noCon+$proyecto_parque_garcia_huerta_con+$proyecto_parque_garcia_huerta_agen+$proyecto_parque_garcia_huerta_ins+$proyecto_parque_garcia_huerta_cap+$proyecto_parque_garcia_huerta_ins_cap+$proyecto_parque_garcia_huerta_pendiente;

                            if($sumParqueGarciaHuerta == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->

                                <div id="parque_garcia_huerta" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumParqueGarciaHuerta != 0 ){

                                                        $porcentajeParqueGarciaHuerta = $proyecto_parque_garcia_huerta_ins_cap * 100;
                                                        $divParqueGarciaHuerta = $porcentajeParqueGarciaHuerta / $sumParqueGarciaHuerta;
                                                        $resulParqueGarciaHuerta = number_format((float)$divParqueGarciaHuerta,1,'.','');
                                                        
                                                        echo $proyecto_parque_garcia_huerta_ins_cap.' ('.$resulParqueGarciaHuerta.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumParqueGarciaHuerta != 0 ){

                                                        $otrosEstParqueGarciaHuerta = $proyecto_parque_garcia_huerta_sin+$proyecto_parque_garcia_huerta_noCon+$proyecto_parque_garcia_huerta_con+$proyecto_parque_garcia_huerta_agen+$proyecto_parque_garcia_huerta_ins+$proyecto_parque_garcia_huerta_cap+$proyecto_parque_garcia_huerta_pendiente;
                                                        
                                                        $porcentajeParqueGarciaHuertaOtros = $otrosEstParqueGarciaHuerta * 100;
                                                        $divParqueGarciaHuertaOtros = $porcentajeParqueGarciaHuertaOtros / $sumParqueGarciaHuerta;
                                                        $resulParqueGarciaHuertaOtros = number_format((float)$divParqueGarciaHuertaOtros,1,'.','');
                                                        
                                                        echo $otrosEstParqueGarciaHuerta.' ('.$resulParqueGarciaHuertaOtros.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(11)">Ver detalles</button>
                                </div>         
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA HCG-->
                    <!-- INICIO INMOBILIARIA IANDES -->
                    <div class="row">
                        <h2 class="text-info">IANDES</h2>
                        <hr>
                        <center>
                            <?php 

                            $sum_andes_laDehesa = $proyecto_andes_laDehesa_sin+$proyecto_andes_laDehesa_noCon+$proyecto_andes_laDehesa_con+$proyecto_andes_laDehesa_agen+$proyecto_andes_laDehesa_ins+$proyecto_andes_laDehesa_cap+$proyecto_andes_laDehesa_ins_cap+$proyecto_andes_laDehesa_pendiente;

                            if($sum_andes_laDehesa == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                                <div id="andes_laDehesa" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_andes_laDehesa != 0 ){
                                                            $porcentaje_andes_laDehesa = $proyecto_andes_laDehesa_ins_cap * 100;
                                                            $div_andes_laDehesa = $porcentaje_andes_laDehesa / $sum_andes_laDehesa;
                                                            $resut_andes_laDehesa = number_format((float)$div_andes_laDehesa,1,'.','');
                                                            echo $proyecto_andes_laDehesa_ins_cap.' ('.$resut_andes_laDehesa.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_andes_laDehesa != 0){
                                                            $sumOtros_andes_laDehesa = $proyecto_andes_laDehesa_sin+$proyecto_andes_laDehesa_noCon+$proyecto_andes_laDehesa_con+$proyecto_andes_laDehesa_agen+$proyecto_andes_laDehesa_ins+$proyecto_andes_laDehesa_cap+$proyecto_andes_laDehesa_pendiente;
                                                            $porcentajeOtros_andes_laDehesa = $sumOtros_andes_laDehesa * 100;
                                                            $divOtros_andes_laDehesa = $porcentajeOtros_andes_laDehesa / $sum_andes_laDehesa;
                                                            $resutOtros_andes_laDehesa = number_format((float)$divOtros_andes_laDehesa,1,'.','');
                                                            echo $sumOtros_andes_laDehesa.' ('.$resutOtros_andes_laDehesa.'%)';
                                                        } else {

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(18)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php 
                                $sum_andesTorreSur = $proyecto_andesTorreSur_con+$proyecto_andesTorreSur_noCon+$proyecto_andesTorreSur_ins+$proyecto_andesTorreSur_agen+$proyecto_andesTorreSur_sin+$proyecto_andesTorreSur_cap+$proyecto_andesTorreSur_ins_cap+$proyecto_andesTorreSur_pendiente;

                            if($sum_andesTorreSur == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }
                            ?>
                                <div id="andesTorreSur" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_andesTorreSur != 0 ){
                                                            $porcentaje_andesTorreSur = $proyecto_andesTorreSur_ins_cap * 100;
                                                            $div_andesTorreSur = $porcentaje_andesTorreSur / $sum_andesTorreSur;
                                                            $resut_andesTorreSur = number_format((float)$div_andesTorreSur,1,'.','');
                                                            echo $proyecto_andesTorreSur_ins_cap.' ('.$resut_andesTorreSur.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_andesTorreSur != 0){
                                                            $sumOtros_andesTorreSur = $proyecto_andesTorreSur_sin+$proyecto_andesTorreSur_noCon+$proyecto_andesTorreSur_con+$proyecto_andesTorreSur_agen+$proyecto_andesTorreSur_ins+$proyecto_andesTorreSur_cap+$proyecto_andesTorreSur_pendiente;
                                                            $porcentajeOtros_andesTorreSur = $sumOtros_andesTorreSur * 100;
                                                            $divOtros_andesTorreSur = $porcentajeOtros_andesTorreSur / $sum_andesTorreSur;
                                                            $resutOtros_andesTorreSur = number_format((float)$divOtros_andesTorreSur,1,'.','');
                                                            echo $sumOtros_andesTorreSur.' ('.$resutOtros_andesTorreSur.'%)';
                                                        } else {

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(86)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php 
                                $sum_andesAB2NortePoniente = $proyecto_andesAB2NortePoniente_con+$proyecto_andesAB2NortePoniente_noCon+$proyecto_andesAB2NortePoniente_ins+$proyecto_andesAB2NortePoniente_agen+$proyecto_andesAB2NortePoniente_sin+$proyecto_andesAB2NortePoniente_cap+$proyecto_andesAB2NortePoniente_ins_cap+$proyecto_andesAB2NortePoniente_pendiente;

                            if($sum_andesAB2NortePoniente == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }
                            ?>
                                <div id="andesAB2NortePoniente" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_andesAB2NortePoniente != 0 ){
                                                            $porcentaje_andesAB2NortePoniente = $proyecto_andesAB2NortePoniente_ins_cap * 100;
                                                            $div_andesAB2NortePoniente = $porcentaje_andesAB2NortePoniente / $sum_andesAB2NortePoniente;
                                                            $resut_andesAB2NortePoniente = number_format((float)$div_andesAB2NortePoniente,1,'.','');
                                                            echo $proyecto_andesAB2NortePoniente_ins_cap.' ('.$resut_andesAB2NortePoniente.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_andesAB2NortePoniente != 0){
                                                            $sumOtros_andesAB2NortePoniente = $proyecto_andesAB2NortePoniente_sin+$proyecto_andesAB2NortePoniente_noCon+$proyecto_andesAB2NortePoniente_con+$proyecto_andesAB2NortePoniente_agen+$proyecto_andesAB2NortePoniente_ins+$proyecto_andesAB2NortePoniente_cap+$proyecto_andesAB2NortePoniente_pendiente;
                                                            $porcentajeOtros_andesAB2NortePoniente = $sumOtros_andesAB2NortePoniente * 100;
                                                            $divOtros_andesAB2NortePoniente = $porcentajeOtros_andesAB2NortePoniente / $sum_andesAB2NortePoniente;
                                                            $resutOtros_andesAB2NortePoniente = number_format((float)$divOtros_andesAB2NortePoniente,1,'.','');
                                                            echo $sumOtros_andesAB2NortePoniente.' ('.$resutOtros_andesAB2NortePoniente.'%)';
                                                        } else {

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(87)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="row">
                        <center>
                            <?php
                                $sum_andesAB2TorreSur = $proyecto_andesAB2TorreSur_con+$proyecto_andesAB2TorreSur_noCon+$proyecto_andesAB2TorreSur_ins+$proyecto_andesAB2TorreSur_agen+$proyecto_andesAB2TorreSur_sin+$proyecto_andesAB2TorreSur_cap+$proyecto_andesAB2TorreSur_ins_cap+$proyecto_andesAB2TorreSur_pendiente;
                                
                                if($sum_andesAB2TorreSur == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="andesAB2TorreSur" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_andesAB2TorreSur != 0 ){
                                                            $porcentaje_andesAB2TorreSur = $proyecto_andesAB2TorreSur_ins_cap * 100;
                                                            $div_andesAB2TorreSur = $porcentaje_andesAB2TorreSur / $sum_andesAB2TorreSur;
                                                            $resut_andesAB2TorreSur = number_format((float)$div_andesAB2TorreSur,1,'.','');
                                                            echo $proyecto_andesAB2TorreSur_ins_cap.' ('.$resut_andesAB2TorreSur.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_andesAB2TorreSur != 0){
                                                            $sumOtros_andesAB2TorreSur = $proyecto_andesAB2TorreSur_sin+$proyecto_andesAB2TorreSur_noCon+$proyecto_andesAB2TorreSur_con+$proyecto_andesAB2TorreSur_agen+$proyecto_andesAB2TorreSur_ins+$proyecto_andesAB2TorreSur_cap+$proyecto_andesAB2TorreSur_pendiente;
                                                            $porcentajeOtros_andesAB2TorreSur = $sumOtros_andesAB2TorreSur * 100;
                                                            $divOtros_andesAB2TorreSur = $porcentajeOtros_andesAB2TorreSur / $sum_andesAB2TorreSur;
                                                            $resutOtros_andesAB2TorreSur = number_format((float)$divOtros_andesAB2TorreSur,1,'.','');
                                                            echo $sumOtros_andesAB2TorreSur.' ('.$resutOtros_andesAB2TorreSur.'%)';
                                                        } else {

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(88)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php
                                $sum_andesCD2TorreNorPon = $proyecto_andesCD2TorreNorPon_con+$proyecto_andesCD2TorreNorPon_noCon+$proyecto_andesCD2TorreNorPon_ins+$proyecto_andesCD2TorreNorPon_agen+$proyecto_andesCD2TorreNorPon_sin+$proyecto_andesCD2TorreNorPon_cap+$proyecto_andesCD2TorreNorPon_ins_cap+$proyecto_andesCD2TorreNorPon_pendiente;
                                
                                if($sum_andesCD2TorreNorPon == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="andesCD2TorreNorPon" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_andesCD2TorreNorPon != 0 ){
                                                            $porcentaje_andesCD2TorreNorPon = $proyecto_andesCD2TorreNorPon_ins_cap * 100;
                                                            $div_andesCD2TorreNorPon = $porcentaje_andesCD2TorreNorPon / $sum_andesCD2TorreNorPon;
                                                            $resut_andesCD2TorreNorPon = number_format((float)$div_andesCD2TorreNorPon,1,'.','');
                                                            echo $proyecto_andesCD2TorreNorPon_ins_cap.' ('.$resut_andesCD2TorreNorPon.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_andesCD2TorreNorPon != 0){
                                                            $sumOtros_andesCD2TorreNorPon = $proyecto_andesCD2TorreNorPon_sin+$proyecto_andesCD2TorreNorPon_noCon+$proyecto_andesCD2TorreNorPon_con+$proyecto_andesCD2TorreNorPon_agen+$proyecto_andesCD2TorreNorPon_ins+$proyecto_andesCD2TorreNorPon_cap+$proyecto_andesCD2TorreNorPon_pendiente;
                                                            $porcentajeOtros_andesCD2TorreNorPon = $sumOtros_andesCD2TorreNorPon * 100;
                                                            $divOtros_andesCD2TorreNorPon = $porcentajeOtros_andesCD2TorreNorPon / $sum_andesCD2TorreNorPon;
                                                            $resutOtros_andesCD2TorreNorPon = number_format((float)$divOtros_andesCD2TorreNorPon,1,'.','');
                                                            echo $sumOtros_andesCD2TorreNorPon.' ('.$resutOtros_andesCD2TorreNorPon.'%)';
                                                        } else {

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(89)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php
                                $sum_andesCD2TorreSur = $proyecto_andesCD2TorreSur_con+$proyecto_andesCD2TorreSur_noCon+$proyecto_andesCD2TorreSur_ins+$proyecto_andesCD2TorreSur_agen+$proyecto_andesCD2TorreSur_sin+$proyecto_andesCD2TorreSur_cap+$proyecto_andesCD2TorreSur_ins_cap+$proyecto_andesCD2TorreSur_pendiente;
                                
                                if($sum_andesCD2TorreSur == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="andesCD2TorreSur" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_andesCD2TorreSur != 0 ){
                                                            $porcentaje_andesCD2TorreSur = $proyecto_andesCD2TorreSur_ins_cap * 100;
                                                            $div_andesCD2TorreSur = $porcentaje_andesCD2TorreSur / $sum_andesCD2TorreSur;
                                                            $resut_andesCD2TorreSur = number_format((float)$div_andesCD2TorreSur,1,'.','');
                                                            echo $proyecto_andesCD2TorreSur_ins_cap.' ('.$resut_andesCD2TorreSur.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_andesCD2TorreSur != 0){
                                                            $sumOtros_andesCD2TorreSur = $proyecto_andesCD2TorreSur_sin+$proyecto_andesCD2TorreSur_noCon+$proyecto_andesCD2TorreSur_con+$proyecto_andesCD2TorreSur_agen+$proyecto_andesCD2TorreSur_ins+$proyecto_andesCD2TorreSur_cap+$proyecto_andesCD2TorreSur_pendiente;
                                                            $porcentajeOtros_andesCD2TorreSur = $sumOtros_andesCD2TorreSur * 100;
                                                            $divOtros_andesCD2TorreSur = $porcentajeOtros_andesCD2TorreSur / $sum_andesCD2TorreSur;
                                                            $resutOtros_andesCD2TorreSur = number_format((float)$divOtros_andesCD2TorreSur,1,'.','');
                                                            echo $sumOtros_andesCD2TorreSur.' ('.$resutOtros_andesCD2TorreSur.'%)';
                                                        } else {

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(90)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="row">
                        <center>
                            <?php
                                $sum_andesE2NorPon = $proyecto_andesE2NorPon_con+$proyecto_andesE2NorPon_noCon+$proyecto_andesE2NorPon_ins+$proyecto_andesE2NorPon_agen+$proyecto_andesE2NorPon_sin+$proyecto_andesE2NorPon_cap+$proyecto_andesE2NorPon_ins_cap+$proyecto_andesE2NorPon_pendiente;
                                
                                if($sum_andesE2NorPon == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="andesE2NorPon" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_andesE2NorPon != 0 ){
                                                            $porcentaje_andesE2NorPon = $proyecto_andesE2NorPon_ins_cap * 100;
                                                            $div_andesE2NorPon = $porcentaje_andesE2NorPon / $sum_andesE2NorPon;
                                                            $resut_andesE2NorPon = number_format((float)$div_andesE2NorPon,1,'.','');
                                                            echo $proyecto_andesE2NorPon_ins_cap.' ('.$resut_andesE2NorPon.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_andesE2NorPon != 0){
                                                            $sumOtros_andesE2NorPon = $proyecto_andesE2NorPon_sin+$proyecto_andesE2NorPon_noCon+$proyecto_andesE2NorPon_con+$proyecto_andesE2NorPon_agen+$proyecto_andesE2NorPon_ins+$proyecto_andesE2NorPon_cap+$proyecto_andesE2NorPon_pendiente;
                                                            $porcentajeOtros_andesE2NorPon = $sumOtros_andesE2NorPon * 100;
                                                            $divOtros_andesE2NorPon = $porcentajeOtros_andesE2NorPon / $sum_andesE2NorPon;
                                                            $resutOtros_andesE2NorPon = number_format((float)$divOtros_andesE2NorPon,1,'.','');
                                                            echo $sumOtros_andesE2NorPon.' ('.$resutOtros_andesE2NorPon.'%)';
                                                        } else {

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(91)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA IANDES--> 
                    <!-- INICIO INMOBILIARIA ICTINOS-->   
                    <div class="row">
                        <h2 class="text-info">ICTINOS</h2>
                        <hr>
                        <center>
                           <?php 
                            $sumPlazaElRoble = $proyecto_plazaElRoble_sin+$proyecto_plazaElRoble_noCon+$proyecto_plazaElRoble_con+$proyecto_plazaElRoble_agen+$proyecto_plazaElRoble_ins+$proyecto_plazaElRoble_cap+$proyecto_plazaElRoble_ins_cap+$proyecto_plazaElRoble_pendiente;

                            if($sumPlazaElRoble == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                        
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->

                                <div id="condominioPlazaElRoble" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                                                                       
                                                        if($sumPlazaElRoble != 0 ){

                                                        $porcentajePlazaElRoble = $proyecto_plazaElRoble_ins_cap * 100;
                                                        $divPlazaElRoble = $porcentajePlazaElRoble/ $sumPlazaElRoble;
                                                        $resulPlazaElRoble= number_format((float)$divPlazaElRoble,1,'.','');

                                                        echo $proyecto_plazaElRoble_ins_cap.' ('.$resulPlazaElRoble.'%)';

                                                        }else{

                                                        }                                      
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    
                                                        
                                                        if($sumPlazaElRoble != 0 ){

                                                        $otrosEstadosPlazaElRoble = $proyecto_plazaElRoble_sin+$proyecto_plazaElRoble_noCon+$proyecto_plazaElRoble_con+$proyecto_plazaElRoble_agen+$proyecto_plazaElRoble_ins+$proyecto_plazaElRoble_cap+$proyecto_plazaElRoble_pendiente;
                                                        $porcentajePlazaElRobleOtros = $otrosEstadosPlazaElRoble * 100;
                                                        $divPlazaElRobleOtros = $porcentajePlazaElRobleOtros / $sumPlazaElRoble;
                                                        $resulPlazaElRobleOtros = number_format((float)$divPlazaElRobleOtros,1,'.','');
                                                        echo $otrosEstadosPlazaElRoble.' ('.$resulPlazaElRobleOtros.'%)'; 

                                                        }else{

                                                        }
                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(4)">Ver detalles</button>
                                </div>        
                            </div>
                        </center>
                        <center>
                            <?php
                            $sumProVarasGallardo = $proyecto_varas_gallardo_sin+$proyecto_varas_gallardo_noCon+$proyecto_varas_gallardo_con+$proyecto_varas_gallardo_agen+$proyecto_varas_gallardo_ins+$proyecto_varas_gallardo_cap+$proyecto_varas_gallardo_ins_cap+$proyecto_varas_gallardo_pendiente;

                            if($sumProVarasGallardo == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->

                                <div id="proyecto_varas_gallardo3" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumProVarasGallardo != 0 ){

                                                          $porcentajeVarasGallardo = $proyecto_varas_gallardo_ins_cap * 100;
                                                        $divVarasGallardo = $porcentajeVarasGallardo / $sumProVarasGallardo;
                                                        $resulVarasGallardo = number_format((float)$divVarasGallardo,1,'.','');

                                                        echo $proyecto_varas_gallardo_ins_cap.' ('.$resulVarasGallardo.'%)';  

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                    if($sumProVarasGallardo != 0 ){

                                                         $otrosEstadosProVarasGallardo = $proyecto_varas_gallardo_sin+$proyecto_varas_gallardo_noCon+$proyecto_varas_gallardo_con+$proyecto_varas_gallardo_agen+$proyecto_varas_gallardo_ins+$proyecto_varas_gallardo_cap+$proyecto_varas_gallardo_pendiente;
                                                        $porcentajeVarasGallardoOtros = $otrosEstadosProVarasGallardo * 100;
                                                        $divVarasGallardoOtros = $porcentajeVarasGallardoOtros / $sumProVarasGallardo;
                                                        $resulVarasGallardoOtros = number_format((float)$divVarasGallardoOtros,1,'.','');
                                                        echo $otrosEstadosProVarasGallardo.' ('.$resulVarasGallardoOtros.'%)'; 

                                                    }else{

                                                    }
                                                       
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(5)">Ver detalles</button>
                                </div>        
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA ICTINOS-->
                    <!-- INICIO INMOBILIARIA ILEBEN-->
                    <div class="row">
                        <h2 class="text-info">ILEBEN</h2>
                        <hr>
                        <center>
                            <?php 
                            $sum_bloom = $proyecto_bloom_sin+$proyecto_bloom_noCon+$proyecto_bloom_con+$proyecto_bloom_agen+$proyecto_bloom_ins+$proyecto_bloom_cap+$proyecto_bloom_ins_cap+$proyecto_bloom_pendiente;

                            if($sum_bloom == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="bloom" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php

                                                        if($sum_bloom != 0 ){

                                                        $porcentaje_bloom = $proyecto_bloom_ins_cap * 100;
                                                        $div_bloom = $porcentaje_bloom / $sum_bloom;
                                                        $resut_bloom = number_format((float)$div_bloom,1,'.','');
                                                        echo $proyecto_bloom_ins_cap.' ('.$resut_bloom.'%)';

                                                        }else{

                                                        }
                                                                                                                
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sum_bloom != 0 ){

                                                        $sumOtros_bloom = $proyecto_bloom_sin+$proyecto_bloom_noCon+$proyecto_bloom_con+$proyecto_bloom_agen+$proyecto_bloom_ins+$proyecto_bloom_cap+$proyecto_bloom_pendiente;
                                                        $porcentajeOtros_bloom = $sumOtros_bloom * 100;
                                                        $divOtros_bloom = $porcentajeOtros_bloom / $sum_bloom;
                                                        $resutOtros_bloom = number_format((float)$divOtros_bloom,1,'.','');
                                                        echo $sumOtros_bloom.' ('.$resutOtros_bloom.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(37)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php 
                            $sum_choice = $proyecto_choice_sin+$proyecto_choice_noCon+$proyecto_choice_con+$proyecto_choice_agen+$proyecto_choice_ins+$proyecto_choice_cap+$proyecto_choice_ins_cap+$proyecto_choice_pendiente;

                            if($sum_choice == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="choice" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_choice != 0 ){

                                                        $porcentaje_choice = $proyecto_choice_ins_cap * 100;
                                                        $div_choice = $porcentaje_choice / $sum_choice;
                                                        $resut_choice = number_format((float)$div_choice,1,'.','');
                                                        echo $proyecto_choice_ins_cap.' ('.$resut_choice.'%)';

                                                        }else{

                                                        }
                                                                                                            
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sum_choice != 0 ){

                                                        $sumOtros_choice = $proyecto_choice_sin+$proyecto_choice_noCon+$proyecto_choice_con+$proyecto_choice_agen+$proyecto_choice_ins+$proyecto_choice_cap+$proyecto_choice_pendiente;
                                                        $porcentajeOtros_choice = $sumOtros_choice * 100;
                                                        $divOtros_choice = $porcentajeOtros_choice / $sum_choice;
                                                        $resutOtros_choice = number_format((float)$divOtros_choice,1,'.','');
                                                        echo $sumOtros_choice.' ('.$resutOtros_choice.'%)';

                                                        }else{

                                                        }
                                                                                                                                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(36)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php 
                            $sum_openConcept = $proyecto_openConcept_sin+$proyecto_openConcept_noCon+$proyecto_openConcept_con+$proyecto_openConcept_agen+$proyecto_openConcept_ins+$proyecto_openConcept_cap+$proyecto_openConcept_ins_cap+$proyecto_openConcept_pendiente;

                            if($sum_openConcept == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="openConcept" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_openConcept != 0 ){

                                                        $porcentaje_openConcept = $proyecto_openConcept_ins_cap * 100;
                                                        $div_openConcept = $porcentaje_openConcept / $sum_openConcept;
                                                        $resut_openConcept = number_format((float)$div_openConcept,1,'.','');
                                                        echo $proyecto_openConcept_ins_cap.' ('.$resut_openConcept.'%)';

                                                        }else{

                                                        }
                                                                                                                                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sum_openConcept != 0 ){

                                                        $sumOtros_openConcept = $proyecto_openConcept_sin+$proyecto_openConcept_noCon+$proyecto_openConcept_con+$proyecto_openConcept_agen+$proyecto_openConcept_ins+$proyecto_openConcept_cap+$proyecto_openConcept_pendiente;
                                                        $porcentajeOtros_openConcept = $sumOtros_openConcept * 100;
                                                        $divOtros_openConcept = $porcentaje_openConcept / $sum_openConcept;
                                                        $resutOtros_openConcept = number_format((float)$divOtros_openConcept,1,'.','');
                                                        echo $sumOtros_openConcept.' ('.$resutOtros_openConcept.'%)';

                                                        }else{

                                                        }
                                                                                                                                                                    
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(39)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- Segunda fila ILEBEN -->
                    <div class="row">
                        <center>

                            <?php 

                            $sum_jazzLifeEtapa1 = $proyecto_jazzLifeEtapa1_sin+$proyecto_jazzLifeEtapa1_noCon+$proyecto_jazzLifeEtapa1_con+$proyecto_jazzLifeEtapa1_agen+$proyecto_jazzLifeEtapa1_ins+$proyecto_jazzLifeEtapa1_cap+$proyecto_jazzLifeEtapa1_ins_cap+$proyecto_jazzLifeEtapa1_pendiente;

                            if($sum_jazzLifeEtapa1 == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="jazzLifeEtapa1" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_jazzLifeEtapa1 != 0){

                                                        $porcentaje_jazzLifeEtapa1 = $proyecto_jazzLifeEtapa1_ins_cap * 100;
                                                        $div_jazzLifeEtapa1 = $porcentaje_jazzLifeEtapa1 / $sum_jazzLifeEtapa1;
                                                        $resut_jazzLifeEtapa1 = number_format((float)$div_jazzLifeEtapa1,1,'.','');
                                                        echo $proyecto_jazzLifeEtapa1_ins_cap.' ('.$resut_jazzLifeEtapa1.'%)';

                                                        }
                                                        
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_jazzLifeEtapa1 != 0){

                                                        $sumOtros_jazzLifeEtapa1 = $proyecto_jazzLifeEtapa1_sin+$proyecto_jazzLifeEtapa1_noCon+$proyecto_jazzLifeEtapa1_con+$proyecto_jazzLifeEtapa1_agen+$proyecto_jazzLifeEtapa1_ins+$proyecto_jazzLifeEtapa1_cap+$proyecto_jazzLifeEtapa1_pendiente;
                                                        $porcentajeOtros_jazzLifeEtapa1 = $sumOtros_jazzLifeEtapa1 * 100;
                                                        $divOtros_jazzLifeEtapa1 = $porcentajeOtros_jazzLifeEtapa1 / $sum_jazzLifeEtapa1;
                                                        $resutOtros_jazzLifeEtapa1 = number_format((float)$divOtros_jazzLifeEtapa1,1,'.','');
                                                        echo $sumOtros_jazzLifeEtapa1.' ('.$resutOtros_jazzLifeEtapa1.'%)';

                                                        }
                                                        
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(40)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php 
                                $sum_jazzLifeEtapa2 = $proyecto_jazzLifeEtapa2_sin+$proyecto_jazzLifeEtapa2_noCon+$proyecto_jazzLifeEtapa2_con+$proyecto_jazzLifeEtapa2_agen+$proyecto_jazzLifeEtapa2_ins+$proyecto_jazzLifeEtapa2_cap+$proyecto_jazzLifeEtapa2_ins_cap+$proyecto_jazzLifeEtapa2_pendiente;

                                if($sum_jazzLifeEtapa2 == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="jazzLifeEtapa2" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                       if($sum_jazzLifeEtapa2 != 0){
                                                            $porcentaje_jazzLifeEtapa2 = $proyecto_jazzLifeEtapa2_ins_cap * 100;
                                                            $div_jazzLifeEtapa2 = $porcentaje_jazzLifeEtapa2 / $sum_jazzLifeEtapa2;
                                                            $resut_jazzLifeEtapa2 = number_format((float)$div_jazzLifeEtapa2,1,'.','');
                                                            echo $proyecto_jazzLifeEtapa2_ins_cap.' ('.$resut_jazzLifeEtapa2.'%)';
                                                       }else{

                                                       }                                           
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($sum_jazzLifeEtapa2 != 0){
                                                        $sumOtros_jazzLifeEtapa2 = $proyecto_jazzLifeEtapa2_sin+$proyecto_jazzLifeEtapa2_noCon+$proyecto_jazzLifeEtapa2_con+$proyecto_jazzLifeEtapa2_agen+$proyecto_jazzLifeEtapa2_ins+$proyecto_jazzLifeEtapa2_cap+$proyecto_jazzLifeEtapa2_pendiente;
                                                        $porcentajeOtros_jazzLifeEtapa2 = $sumOtros_jazzLifeEtapa2 * 100;
                                                        $divOtros_jazzLifeEtapa2 = $porcentajeOtros_jazzLifeEtapa2 / $sum_jazzLifeEtapa2;
                                                        $resutOtros_jazzLifeEtapa2 = number_format((float)$divOtros_jazzLifeEtapa2,1,'.','');
                                                        echo $sumOtros_jazzLifeEtapa2.' ('.$resutOtros_jazzLifeEtapa2.'%)';

                                                    }else{

                                                    }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(124)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php 
                                $sum_jazzLifeEtapa3 = $proyecto_jazzLifeEtapa3_sin+$proyecto_jazzLifeEtapa3_noCon+$proyecto_jazzLifeEtapa3_con+$proyecto_jazzLifeEtapa3_agen+$proyecto_jazzLifeEtapa3_ins+$proyecto_jazzLifeEtapa3_cap+$proyecto_jazzLifeEtapa3_ins_cap+$proyecto_jazzLifeEtapa3_pendiente;
                                if($sum_jazzLifeEtapa3 == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="jazzLifeEtapa3" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_jazzLifeEtapa3 != 0 ){
                                                            $porcentaje_jazzLifeEtapa3 = $proyecto_jazzLifeEtapa3_ins_cap * 100;
                                                            $div_jazzLifeEtapa3 = $porcentaje_jazzLifeEtapa3 / $sum_jazzLifeEtapa3;
                                                            $resut_jazzLifeEtapa3 = number_format((float)$div_jazzLifeEtapa3,1,'.','');
                                                            echo $proyecto_jazzLifeEtapa3_ins_cap.' ('.$resut_jazzLifeEtapa3.'%)';
                                                        }else{

                                                        }                                                    
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_jazzLifeEtapa3 != 0 ){
                                                            $sumOtros_jazzLifeEtapa3 = $proyecto_jazzLifeEtapa3_sin+$proyecto_jazzLifeEtapa3_noCon+$proyecto_jazzLifeEtapa3_con+$proyecto_jazzLifeEtapa3_agen+$proyecto_jazzLifeEtapa3_ins+$proyecto_jazzLifeEtapa3_cap+$proyecto_jazzLifeEtapa3_pendiente;
                                                            $porcentajeOtros_jazzLifeEtapa3 = $sumOtros_jazzLifeEtapa3 * 100;
                                                            $divOtros_jazzLifeEtapa3 = $porcentajeOtros_jazzLifeEtapa3 / $sum_jazzLifeEtapa3;
                                                            $resutOtros_jazzLifeEtapa3 = number_format((float)$divOtros_jazzLifeEtapa3,1,'.','');
                                                            echo $sumOtros_jazzLifeEtapa3.' ('.$resutOtros_jazzLifeEtapa3.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(125)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="row">
                        <center>

                            <?php 

                            $sum_parqueLaHuasa = $proyecto_parqueLaHuasa_sin+$proyecto_parqueLaHuasa_noCon+$proyecto_parqueLaHuasa_con+$proyecto_parqueLaHuasa_agen+$proyecto_parqueLaHuasa_ins+$proyecto_parqueLaHuasa_cap+$proyecto_parqueLaHuasa_ins_cap+$proyecto_parqueLaHuasa_pendiente;

                            if($sum_parqueLaHuasa == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="parqueLaHuasa" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                       
                                                       if($sum_parqueLaHuasa != 0){

                                                        $porcentaje_parqueLaHuasa = $proyecto_parqueLaHuasa_ins_cap * 100;
                                                        $div_parqueLaHuasa = $porcentaje_parqueLaHuasa / $sum_parqueLaHuasa;
                                                        $resut_parqueLaHuasa = number_format((float)$div_parqueLaHuasa,1,'.','');
                                                        echo $proyecto_parqueLaHuasa_ins_cap.' ('.$resut_parqueLaHuasa.'%)';

                                                       }else{


                                                       }
                                                                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        
                                                    if($sum_parqueLaHuasa != 0){

                                                        $sumOtros_parqueLaHuasa = $proyecto_parqueLaHuasa_sin+$proyecto_parqueLaHuasa_noCon+$proyecto_parqueLaHuasa_con+$proyecto_parqueLaHuasa_agen+$proyecto_parqueLaHuasa_ins+$proyecto_parqueLaHuasa_cap+$proyecto_parqueLaHuasa_pendiente;
                                                        $porcentajeOtros_parqueLaHuasa = $sumOtros_parqueLaHuasa * 100;
                                                        $divOtros_parqueLaHuasa = $porcentajeOtros_parqueLaHuasa / $sum_parqueLaHuasa;
                                                        $resutOtros_parqueLaHuasa = number_format((float)$divOtros_parqueLaHuasa,1,'.','');
                                                        echo $sumOtros_parqueLaHuasa.' ('.$resutOtros_parqueLaHuasa.'%)';

                                                    }else{

                                                    }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(38)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php 

                            $sum_reflex = $proyecto_reflex_sin+$proyecto_reflex_noCon+$proyecto_reflex_con+$proyecto_reflex_agen+$proyecto_reflex_ins+$proyecto_reflex_cap+$proyecto_reflex_ins_cap+$proyecto_reflex_pendiente;

                            if($sum_reflex == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="reflex" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_reflex != 0 ){

                                                        $porcentaje_reflex = $proyecto_reflex_ins_cap * 100;
                                                        $div_reflex = $porcentaje_reflex / $sum_reflex;
                                                        $resut_reflex = number_format((float)$div_reflex,1,'.','');
                                                        echo $proyecto_reflex_ins_cap.' ('.$resut_reflex.'%)';

                                                        }else{

                                                        }
                                                                                                            
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_reflex != 0 ){

                                                        $sumOtros_reflex = $proyecto_reflex_sin+$proyecto_reflex_noCon+$proyecto_reflex_con+$proyecto_reflex_agen+$proyecto_reflex_ins+$proyecto_reflex_cap+$proyecto_reflex_pendiente;
                                                        $porcentajeOtros_reflex = $sumOtros_reflex * 100;
                                                        $divOtros_reflex = $porcentajeOtros_reflex / $sum_reflex;
                                                        $resutOtros_reflex = number_format((float)$divOtros_reflex,1,'.','');
                                                        echo $sumOtros_reflex.' ('.$resutOtros_reflex.'%)';

                                                        }else{

                                                        }
                                                                                                               
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(35)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA ILEBEN -->
                    <!-- INICIO INMOBILIARIA INDESA -->
                    <div class="row">
                        <h2 class="text-info">INDESA</h2>
                        <hr>
                        <center>
                            <?php
                                $sum_vinaChicureoCountry = $proyecto_vinaChicureoCountry_sin+$proyecto_vinaChicureoCountry_noCon+$proyecto_vinaChicureoCountry_con+$proyecto_vinaChicureoCountry_agen+$proyecto_vinaChicureoCountry_ins+$proyecto_vinaChicureoCountry_cap+$proyecto_vinaChicureoCountry_ins_cap+$proyecto_vinaChicureoCountry_pendiente;
                                if($sum_vinaChicureoCountry == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                            <div id="vinaChicureoCountry" style="height: 300px;"></div>
                            <div>
                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><small>Instalado y capacitado</small></th>
                                            <th><small>Otros estados</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php      
                                                    if($sum_vinaChicureoCountry != 0 ){
                                                        $porcentaje_vinaChicureoCountry = $proyecto_vinaChicureoCountry_ins_cap * 100;
                                                        $div_vinaChicureoCountry = $porcentaje_vinaChicureoCountry / $sum_vinaChicureoCountry;
                                                        $resut_vinaChicureoCountry = number_format((float)$div_vinaChicureoCountry,1,'.','');
                                                        echo $proyecto_vinaChicureoCountry_ins_cap.' ('.$resut_vinaChicureoCountry.'%)';
                                                    }else{

                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($sum_vinaChicureoCountry != 0 ){
                                                        $sumOtros_vinaChicureoCountry = $proyecto_vinaChicureoCountry_sin+$proyecto_vinaChicureoCountry_noCon+$proyecto_vinaChicureoCountry_con+$proyecto_vinaChicureoCountry_agen+$proyecto_vinaChicureoCountry_ins+$proyecto_vinaChicureoCountry_cap+$proyecto_vinaChicureoCountry_pendiente;
                                                        $porcentajeOtros_vinaChicureoCountry = $sumOtros_vinaChicureoCountry * 100;
                                                        $divOtros_vinaChicureoCountry = $porcentajeOtros_vinaChicureoCountry / $sum_vinaChicureoCountry;
                                                        $resutOtros_vinaChicureoCountry = number_format((float)$divOtros_vinaChicureoCountry,1,'.','');
                                                        echo $sumOtros_vinaChicureoCountry.' ('.$resutOtros_vinaChicureoCountry.'%)'; 
                                                    }else{

                                                    }    
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(139)">Ver detalles</button>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA INDESA -->
                    <!-- INICIO INMOBILIARIA GUZMAN -->
                    <div class="row">
                        <h2 class="text-info">INMOBILIARIA GUZMAN</h2>
                        <hr>
                        <center>
                            <?php
                                $sumBalanche = $proyecto_balanche_sin+$proyecto_balanche_noCon+$proyecto_balanche_con+$proyecto_balanche_agen+$proyecto_balanche_ins+$proyecto_balanche_cap+$proyecto_balanche_ins_cap+$proyecto_balanche_pendiente;
                                if($sumBalanche == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                            <div id="balanche" style="height: 300px;"></div>
                            <div>
                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><small>Instalado y capacitado</small></th>
                                            <th><small>Otros estados</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php     
                                                    if($sumBalanche != 0 ){
                                                        $porcentajeBalanche = $proyecto_balanche_ins_cap * 100;
                                                        $divBalanche = $porcentajeBalanche / $sumBalanche;
                                                        $resulBalanche = number_format((float)$divBalanche,1,'.','');
                                                        echo $proyecto_balanche_ins_cap.' ('.$resulBalanche.'%)';
                                                    }else{

                                                    }    
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($sumBalanche != 0 ){
                                                        $otrosEstBalanche = $proyecto_balanche_sin+$proyecto_balanche_noCon+$proyecto_balanche_con+$proyecto_balanche_agen+$proyecto_balanche_ins+$proyecto_balanche_cap+$proyecto_balanche_pendiente;
                                                        $porcentajeBalancheOtros = $otrosEstBalanche * 100;
                                                        $divBalancheOtros = $porcentajeBalancheOtros / $sumBalanche;
                                                        $resulBalancheOtros = number_format((float)$divBalancheOtros,1,'.','');
                                                        echo $otrosEstBalanche.' ('.$resulBalancheOtros.'%)';
                                                    }else{

                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(26)">Ver detalles</button>
                            </div>
                        </center>   
                    </div>
                    <!-- FIN INMOBILIARIA GUZMAN -->
                    <!-- INICIO INMOBILIARIA IPL -->
                    <div class="row">
                        <h2 class="text-info">IPL</h2>
                        <hr>
                        <center>
                            <?php
                                $sum_patagoniaPS = $proyecto_patagoniaPS_sin+$proyecto_patagoniaPS_noCon+$proyecto_patagoniaPS_con+$proyecto_patagoniaPS_agen+$proyecto_patagoniaPS_ins+$proyecto_patagoniaPS_cap+$proyecto_patagoniaPS_ins_cap+$proyecto_patagoniaPS_pendiente;
                                if($sum_patagoniaPS == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                            <div id="patagoniaPS" style="height: 300px;"></div>
                            <div>
                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><small>Instalado y capacitado</small></th>
                                            <th><small>Otros estados</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php      
                                                    if($sum_patagoniaPS != 0 ){
                                                        $porcentaje_patagoniaPS = $proyecto_patagoniaPS_ins_cap * 100;
                                                        $div_patagoniaPS = $porcentaje_patagoniaPS / $sum_patagoniaPS;
                                                        $resut_patagoniaPS = number_format((float)$div_patagoniaPS,1,'.','');
                                                        echo $proyecto_patagoniaPS_ins_cap.' ('.$resut_patagoniaPS.'%)';
                                                    }else{

                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($sum_patagoniaPS != 0 ){
                                                        $sumOtros_patagoniaPS = $proyecto_patagoniaPS_sin+$proyecto_patagoniaPS_noCon+$proyecto_patagoniaPS_con+$proyecto_patagoniaPS_agen+$proyecto_patagoniaPS_ins+$proyecto_patagoniaPS_cap+$proyecto_patagoniaPS_pendiente;
                                                        $porcentajeOtros_patagoniaPS = $sumOtros_patagoniaPS * 100;
                                                        $divOtros_patagoniaPS = $porcentajeOtros_patagoniaPS / $sum_patagoniaPS;
                                                        $resutOtros_patagoniaPS = number_format((float)$divOtros_patagoniaPS,1,'.','');
                                                        echo $sumOtros_patagoniaPS.' ('.$resutOtros_patagoniaPS.'%)'; 
                                                    }else{

                                                    }    
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(8)">Ver detalles</button>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA IPL -->
                    <!-- INICIO ISA PINZÓN -->
                    <div class="row">
                        <h2 class="text-info">ISA</h2>
                        <hr>
                        <center>
                            <?php
                                $sum_isaPinzon = $proyecto_isaPinzon_sin+$proyecto_isaPinzon_noCon+$proyecto_isaPinzon_con+$proyecto_isaPinzon_agen+$proyecto_isaPinzon_ins+$proyecto_isaPinzon_cap+$proyecto_isaPinzon_ins_cap+$proyecto_isaPinzon_pendiente;
                                if($sum_isaPinzon == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                            <div id="isaPinzon" style="height: 300px;"></div>
                            <div>
                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><small>Instalado y capacitado</small></th>
                                            <th><small>Otros estados</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php      
                                                    if($sum_isaPinzon != 0 ){
                                                        $porcentaje_isaPinzon = $proyecto_isaPinzon_ins_cap * 100;
                                                        $div_isaPinzon = $porcentaje_isaPinzon / $sum_isaPinzon;
                                                        $resut_isaPinzon = number_format((float)$div_isaPinzon,1,'.','');
                                                        echo $proyecto_isaPinzon_ins_cap.' ('.$resut_isaPinzon.'%)';
                                                    }else{

                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($sum_isaPinzon != 0 ){
                                                        $sumOtros_isaPinzon = $proyecto_isaPinzon_sin+$proyecto_isaPinzon_noCon+$proyecto_isaPinzon_con+$proyecto_isaPinzon_agen+$proyecto_isaPinzon_ins+$proyecto_isaPinzon_cap+$proyecto_isaPinzon_pendiente;
                                                        $porcentajeOtros_isaPinzon = $sumOtros_isaPinzon * 100;
                                                        $divOtros_isaPinzon = $porcentajeOtros_isaPinzon / $sum_isaPinzon;
                                                        $resutOtros_isaPinzon = number_format((float)$divOtros_isaPinzon,1,'.','');
                                                        echo $sumOtros_isaPinzon.' ('.$resutOtros_isaPinzon.'%)'; 
                                                    }else{

                                                    }    
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(122)">Ver detalles</button>
                            </div>
                        </center>
                    </div>
                    <!-- FIN ISA PINZÓN -->
                    <!-- INICIO INMOBILIARIA LOGA-->
                    <div class="row">
                        <h2 class="text-info">LOGA</h2>
                        <hr>
                        <center>
                            <?php
                                $sum_boulevardDelMar = $proyecto_boulevardDelMar_sin+$proyecto_boulevardDelMar_noCon+$proyecto_boulevardDelMar_con+$proyecto_boulevardDelMar_agen+$proyecto_boulevardDelMar_ins+$proyecto_boulevardDelMar_cap+$proyecto_boulevardDelMar_ins_cap+$proyecto_boulevardDelMar_pendiente;
                                if($sum_boulevardDelMar == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                            <!--div class="col-md-4 col-sm-12 col-xs-12"-->
                                <div id="boulevardDelMar" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_boulevardDelMar != 0 ){
                                                            $porcentaje_boulevardDelMar = $proyecto_boulevardDelMar_ins_cap * 100;
                                                            $div_boulevardDelMar = $porcentaje_boulevardDelMar / $sum_boulevardDelMar;
                                                            $resut_boulevardDelMar = number_format((float)$div_boulevardDelMar,1,'.','');
                                                            echo $proyecto_boulevardDelMar_ins_cap.' ('.$resut_boulevardDelMar.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_boulevardDelMar != 0 ){
                                                            $sumOtros_boulevardDelMar = $proyecto_boulevardDelMar_sin+$proyecto_boulevardDelMar_noCon+$proyecto_boulevardDelMar_con+$proyecto_boulevardDelMar_agen+$proyecto_boulevardDelMar_ins+$proyecto_boulevardDelMar_cap+$proyecto_boulevardDelMar_pendiente;
                                                            $porcentajeOtros_boulevardDelMar = $sumOtros_boulevardDelMar * 100;
                                                            $divOtros_boulevardDelMar = $porcentajeOtros_boulevardDelMar / $sum_boulevardDelMar;
                                                            $resutOtros_boulevardDelMar = number_format((float)$divOtros_boulevardDelMar,1,'.','');
                                                            echo $sumOtros_boulevardDelMar.' ('.$resutOtros_boulevardDelMar.'%)'; 
                                                        }else{

                                                        } 
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(7)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA LOGA-->
                    <!-- INICIO INMOBILIARIA MALPO-->
                    <div class="row">
                    	<h2 class="text-info">MALPO</h2>
                    	<hr>
                        <center>                    
                            <?php
                            $sum_altosMaiten_melipilla = $proyecto_altosMaiten_melipilla_sin+$proyecto_altosMaiten_melipilla_noCon+$proyecto_altosMaiten_melipilla_con+$proyecto_altosMaiten_melipilla_agen+$proyecto_altosMaiten_melipilla_ins+$proyecto_altosMaiten_melipilla_cap+$proyecto_altosMaiten_melipilla_ins_cap+$proyecto_altosMaiten_melipilla_pendiente;

                            if($sum_altosMaiten_melipilla == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="altosMaiten_melipilla" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_altosMaiten_melipilla != 0){

                                                        $porcentaje_altosMaiten_melipilla = $proyecto_altosMaiten_melipilla_ins_cap * 100;
                                                        $div_altosMaiten_melipilla = $porcentaje_altosMaiten_melipilla / $sum_altosMaiten_melipilla;
                                                        $resut_altosMaiten_melipilla = number_format((float)$div_altosMaiten_melipilla,1,'.','');
                                                        
                                                        echo $proyecto_altosMaiten_melipilla_ins_cap.' ('.$resut_altosMaiten_melipilla.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sum_altosMaiten_melipilla != 0){

                                                        $sumOtros_altosMaiten_melipilla = $proyecto_altosMaiten_melipilla_sin+$proyecto_altosMaiten_melipilla_noCon+$proyecto_altosMaiten_melipilla_con+$proyecto_altosMaiten_melipilla_agen+$proyecto_altosMaiten_melipilla_ins+$proyecto_altosMaiten_melipilla_cap+$proyecto_altosMaiten_melipilla_pendiente;

                                                        $porcentajeOtros_altosMaiten_melipilla = $sumOtros_altosMaiten_melipilla * 100;
                                                        $divOtros_altosMaiten_melipilla = $porcentajeOtros_altosMaiten_melipilla / $sum_altosMaiten_melipilla;
                                                        $resutOtros_altosMaiten_melipilla = number_format((float)$divOtros_altosMaiten_melipilla,1,'.','');

                                                        echo $sumOtros_altosMaiten_melipilla.' ('.$resutOtros_altosMaiten_melipilla.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(50)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>

                            <?php
                            $sum_altoRucahue_colonial = $proyecto_altoRucahue_colonial_sin+$proyecto_altoRucahue_colonial_noCon+$proyecto_altoRucahue_colonial_con+$proyecto_altoRucahue_colonial_agen+$proyecto_altoRucahue_colonial_ins+$proyecto_altoRucahue_colonial_cap+$proyecto_altoRucahue_colonial_ins_cap+$proyecto_altoRucahue_colonial_pendiente;

                            if($sum_altoRucahue_colonial == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="altoRucahue_colonial" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                     <?php
                                                        
                                                        if($sum_altoRucahue_colonial != 0){

                                                          $porcentaje_altoRucahue_colonial = $proyecto_altoRucahue_colonial_ins_cap * 100;
                                                        $div_altoRucahue_colonial = $porcentaje_altoRucahue_colonial / $sum_altoRucahue_colonial;
                                                        $resut_altoRucahue_colonial = number_format((float)$div_altoRucahue_colonial,1,'.','');
                                                        
                                                        echo $proyecto_altoRucahue_colonial_ins_cap.' ('.$resut_altoRucahue_colonial.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_altoRucahue_colonial != 0){

                                                        $sumOtros_altoRucahue_colonial = $proyecto_altoRucahue_colonial_sin+$proyecto_altoRucahue_colonial_noCon+$proyecto_altoRucahue_colonial_con+$proyecto_altoRucahue_colonial_agen+$proyecto_altoRucahue_colonial_ins+$proyecto_altoRucahue_colonial_cap+$proyecto_altoRucahue_colonial_pendiente;

                                                        $porcentajeOtros_altoRucahue_colonial = $sumOtros_altoRucahue_colonial * 100;
                                                        $divOtros_altoRucahue_colonial = $porcentajeOtros_altoRucahue_colonial / $sum_altoRucahue_colonial;
                                                        $resutOtros_altoRucahue_colonial = number_format((float)$divOtros_altoRucahue_colonial,1,'.','');

                                                        echo $sumOtros_altoRucahue_colonial.' ('.$resutOtros_altoRucahue_colonial.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(1)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
  						<center>
                            <?php
                            $sumClarosRauquen = $proyecto_claros_rauquen_sin+$proyecto_claros_rauquen_noCon+$proyecto_claros_rauquen_con+$proyecto_claros_rauquen_agen+$proyecto_claros_rauquen_ins+$proyecto_claros_rauquen_cap+$proyecto_claros_rauquen_ins_cap+$proyecto_claros_rauquen_pendiente;

                            if($sumClarosRauquen == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="claros_rauquen" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumClarosRauquen != 0){

                                                        $porcentajeClarosRauquen = $proyecto_claros_rauquen_ins_cap * 100;
                                                        $divClarosRauquen = $porcentajeClarosRauquen / $sumClarosRauquen;
                                                        $resulClarosRauquen = number_format((float)$divClarosRauquen,1,'.','');
                                                        
                                                        echo $proyecto_claros_rauquen_ins_cap.' ('.$resulClarosRauquen.'%)'; 

                                                        }else{

                                                        }
                                                                                                            
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumClarosRauquen != 0){

                                                        $otrosEstClarosRauquen = $proyecto_claros_rauquen_sin+$proyecto_claros_rauquen_noCon+$proyecto_claros_rauquen_con+$proyecto_claros_rauquen_agen+$proyecto_claros_rauquen_ins+$proyecto_claros_rauquen_cap+$proyecto_claros_rauquen_pendiente;
                                                        
                                                        $porcentajeClarosRauquenOtros = $otrosEstClarosRauquen * 100;
                                                        $divClarosRauquenOtros = $porcentajeClarosRauquenOtros / $sumClarosRauquen;
                                                        $resulClarosRauquenOtros = number_format((float)$divClarosRauquenOtros,1,'.','');
                                                        
                                                        echo $otrosEstClarosRauquen.' ('.$resulClarosRauquenOtros.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(49)">Ver detalles</button>
                                </div> 
                            </div>
                        </center>
                    </div>
                    <div class="row"> 
                        <center>
                            <?php
                                $sum_laurelMelipilla = $proyecto_laurelMelipilla_sin+$proyecto_laurelMelipilla_noCon+$proyecto_laurelMelipilla_con+$proyecto_laurelMelipilla_agen+$proyecto_laurelMelipilla_ins+$proyecto_laurelMelipilla_cap+$proyecto_laurelMelipilla_ins_cap+$proyecto_laurelMelipilla_pendiente;
                            if($sum_laurelMelipilla == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }
                            ?>
                                <div id="laurelMelipilla" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_laurelMelipilla != 0){
                                                            $porcentaje_laurelMelipilla = $proyecto_laurelMelipilla_ins_cap * 100;
                                                            $div_laurelMelipilla = $porcentaje_laurelMelipilla / $sum_laurelMelipilla;
                                                            $resul_laurelMelipilla = number_format((float)$div_laurelMelipilla,1,'.','');
                                                            echo $proyecto_laurelMelipilla_ins_cap.' ('.$resul_laurelMelipilla.'%)'; 
                                                        }else{

                                                        }                                                
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_laurelMelipilla != 0){
                                                            $otros_laurelMelipilla = $proyecto_laurelMelipilla_sin+$proyecto_laurelMelipilla_noCon+$proyecto_laurelMelipilla_con+$proyecto_laurelMelipilla_agen+$proyecto_laurelMelipilla_ins+$proyecto_laurelMelipilla_cap+$proyecto_laurelMelipilla_pendiente;
                                                            $porcentaje_laurelMelipilla_Otros = $otros_laurelMelipilla * 100;
                                                            $div_laurelMelipilla_Otros = $porcentaje_laurelMelipilla_Otros / $sum_laurelMelipilla;
                                                            $resul_laurelMelipilla_Otros = number_format((float)$div_laurelMelipilla_Otros,1,'.','');
                                                            echo $otros_laurelMelipilla.' ('.$resul_laurelMelipilla_Otros.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(141)">Ver detalles</button>
                                </div> 
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA MALPO-->
                    <!-- INICIO INMOBILIARIA MASTERPLAN -->
					<div class="row">
                        <h2 class="text-info">MASTERPLAN</h2>
                        <hr>
						<center>

                            <?php
                            $sumCubicaMarbella = $proyecto_cubica_marbella_sin+$proyecto_cubica_marbella_noCon+$proyecto_cubica_marbella_con+$proyecto_cubica_marbella_agen+$proyecto_cubica_marbella_ins+$proyecto_cubica_marbella_cap+$proyecto_cubica_marbella_ins_cap+$proyecto_cubica_marbella_pendiente;

                            if($sumCubicaMarbella == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="cubica_marbella" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumCubicaMarbella != 0){

                                                        $porcentajeCubicaMarbella = $proyecto_cubica_marbella_ins_cap * 100;
                                                        $divCubicaMarbella = $porcentajeCubicaMarbella / $sumCubicaMarbella;
                                                        $sumCubicaMarbella = number_format((float)$divCubicaMarbella,1,'.','');
                                                        
                                                        echo $proyecto_cubica_marbella_ins_cap.' ('.$sumCubicaMarbella.'%)'; 

                                                        }else{

                                                        }
                                                                                                                
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumCubicaMarbella != 0){

                                                            $otrosEstCubicaMarbella = $proyecto_cubica_marbella_sin+$proyecto_cubica_marbella_noCon+$proyecto_cubica_marbella_con+$proyecto_cubica_marbella_agen+$proyecto_cubica_marbella_ins+$proyecto_cubica_marbella_cap+$proyecto_cubica_marbella_pendiente;
                                                        
                                                        $porcentajeCubicaMarbellaOtros = $otrosEstCubicaMarbella * 100;
                                                        $divCubicaMarbellaOtros = $porcentajeCubicaMarbellaOtros / $sumCubicaMarbella;
                                                        $resulCubicaMarbellaOtros = number_format((float)$divCubicaMarbellaOtros,1,'.','');

                                                        echo $otrosEstCubicaMarbella.' ('.$resulCubicaMarbellaOtros.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(43)">Ver detalles</button>
                                </div> 
                            </div>
                        </center>
                        <center>

                            <?php
                            $sumlasPircas = $proyecto_lasPircas_sin+$proyecto_lasPircas_noCon+$proyecto_lasPircas_con+$proyecto_lasPircas_agen+$proyecto_lasPircas_ins+$proyecto_lasPircas_cap+$proyecto_lasPircas_ins_cap+$proyecto_lasPircas_pendiente;

                            if($sumlasPircas == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                                <div id="lasPircas" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    
                                                        if($sumlasPircas != 0){

                                                        $porcentajelasPircas = $proyecto_lasPircas_ins_cap * 100;
                                                        $divlasPircas = $porcentajelasPircas / $sumlasPircas;
                                                        $resullasPircas = number_format((float)$divlasPircas,1,'.','');
                                                        
                                                        echo $proyecto_lasPircas_ins_cap.' ('.$resullasPircas.'%)'; 

                                                        }else{

                                                        }
                                                                                                                                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    
                                                        if($sumlasPircas != 0){

                                                        $otrosEstlasPircas = $proyecto_lasPircas_sin+$proyecto_lasPircas_noCon+$proyecto_lasPircas_con+$proyecto_lasPircas_agen+$proyecto_lasPircas_ins+$proyecto_lasPircas_cap+$proyecto_lasPircas_pendiente;
                                                        
                                                        $porcentajelasPircasOtros = $otrosEstlasPircas * 100;
                                                        $divlasPircasOtros = $porcentajelasPircasOtros / $sumlasPircas;
                                                        $resullasPircasOtros = number_format((float)$divlasPircasOtros,1,'.','');

                                                        echo $otrosEstlasPircas.' ('.$resullasPircasOtros.'%)';

                                                        }else{

                                                        }
                                                                                                                
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(42)">Ver detalles</button>
                                </div> 
                            </div>
                        </center>
                        <center>
                            <?php
                                $sum_cubicaMontemar = $proyecto_cubicaMontemar_sin+$proyecto_cubicaMontemar_noCon+$proyecto_cubicaMontemar_con+$proyecto_cubicaMontemar_agen+$proyecto_cubicaMontemar_ins+$proyecto_cubicaMontemar_cap+$proyecto_cubicaMontemar_ins_cap+$proyecto_cubicaMontemar_pendiente;
                                if($sum_cubicaMontemar == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                                ?>
                                <div id="cubicaMontemar" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_cubicaMontemar != 0){
                                                            $porcentaje_cubicaMontemar = $proyecto_cubicaMontemar_ins_cap * 100;
                                                            $div_cubicaMontemar = $porcentaje_cubicaMontemar / $sum_cubicaMontemar;
                                                            $resul_cubicaMontemar = number_format((float)$div_cubicaMontemar,1,'.','');
                                                            echo $proyecto_cubicaMontemar_ins_cap.' ('.$resul_cubicaMontemar.'%)'; 
                                                        }else{

                                                        }      
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_cubicaMontemar != 0){
                                                            $otros_cubicaMontemar = $proyecto_cubicaMontemar_sin+$proyecto_cubicaMontemar_noCon+$proyecto_cubicaMontemar_con+$proyecto_cubicaMontemar_agen+$proyecto_cubicaMontemar_ins+$proyecto_cubicaMontemar_cap+$proyecto_cubicaMontemar_pendiente;
                                                            $porcentaje_cubicaMontemar_Otros = $otros_cubicaMontemar * 100;
                                                            $div_cubicaMontemar_Otros = $porcentaje_cubicaMontemar_Otros / $sum_cubicaMontemar;
                                                            $resul_cubicaMontemar_Otros = number_format((float)$div_cubicaMontemar_Otros,1,'.','');
                                                            echo $otrosEstlasPircas.' ('.$resullasPircasOtros.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(44)">Ver detalles</button>
                                </div> 
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA MASTERPLAN -->    
                    <!-- INICIO INMOBILIARIA PATAGONLAND-->
                    <div class="row">
                        <h2 class="text-info">PATAGONLAND</h2>
                        <hr>
                        <center>

                            <?php
                            $sumCandil = $proyecto_portal_candil_sin+$proyecto_portal_candil_noCon+$proyecto_portal_candil_con+$proyecto_portal_candil_agen+$proyecto_portal_candil_ins+$proyecto_portal_candil_cap+$proyecto_portal_candil_ins_cap+$proyecto_portal_candil_pendiente;

                            if($sumCandil == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="portal_candil" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumCandil != 0 ){

                                                        $porcentajeCandil = $proyecto_portal_candil_ins_cap * 100;
                                                        $divCandil = $porcentajeCandil / $sumCandil;
                                                        $resulCandil = number_format((float)$divCandil,1,'.','');
                                                        
                                                        echo $proyecto_portal_candil_ins_cap.' ('.$resulCandil.'%)'; 

                                                        }else{

                                                        }
                                                                                                                
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumCandil != 0 ){

                                                        $otrosEstPortalCandil = $proyecto_portal_candil_sin+$proyecto_portal_candil_noCon+$proyecto_portal_candil_con+$proyecto_portal_candil_agen+$proyecto_portal_candil_ins+$proyecto_portal_candil_cap+$proyecto_portal_candil_pendiente;
                                                        
                                                        $porcentajeCandilOtros = $otrosEstPortalCandil * 100;
                                                        $divCandilOtros = $porcentajeCandilOtros / $sumCandil;
                                                        $resulCandilOtros = number_format((float)$divCandilOtros,1,'.','');
                                                        
                                                        echo $otrosEstPortalCandil.' ('.$resulCandilOtros.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(45)">Ver detalles</button>
                                </div>   
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA PATAGONLAND-->
                    <!-- INICIO INMOBILIARIA PENTA -->
                    <div class="row">
                        <h2 class="text-info">PENTA</h2>
                        <hr>
                        <center>

                            <?php
                            $sumJardinA = $proyecto_jardinA_sin+$proyecto_jardinA_noCon+$proyecto_jardinA_con+$proyecto_jardinA_agen+$proyecto_jardinA_ins+$proyecto_jardinA_cap+$proyecto_jardinA_ins_cap+$proyecto_jardinA_pendiente;

                            if($sumJardinA == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="jardinA" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumJardinA != 0 ){

                                                        $porcentajeJardinA = $proyecto_jardinA_ins_cap * 100;
                                                        $divJardinA = $porcentajeJardinA / $sumJardinA;
                                                        $resulJardinA = number_format((float)$divJardinA,1,'.','');
                                                        
                                                        echo $proyecto_jardinA_ins_cap.' ('.$resulJardinA.'%)'; 

                                                        }else{

                                                        }
                                                                                                                
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumJardinA != 0 ){

                                                        $otroEstJardinA = $proyecto_jardinA_sin+$proyecto_jardinA_noCon+$proyecto_jardinA_con+$proyecto_jardinA_agen+$proyecto_jardinA_ins+$proyecto_jardinA_cap+$proyecto_jardinA_pendiente;
                                                        
                                                        $porcentajeJardinAOtro = $otroEstJardinA * 100;
                                                        $divJardinAOtro = $porcentajeJardinAOtro / $sumJardinA;
                                                        $resulJardinAOtro = number_format((float)$divJardinAOtro,1,'.','');
                                                        
                                                        echo $otroEstJardinA.' ('.$resulJardinAOtro.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(53)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>

                            <?php
                            $sumJardinB = $proyecto_jardinB_sin+$proyecto_jardinB_noCon+$proyecto_jardinB_con+$proyecto_jardinB_agen+$proyecto_jardinB_ins+$proyecto_jardinB_cap+$proyecto_jardinB_ins_cap+$proyecto_jardinB_pendiente;

                            if($sumJardinB == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="jardinB" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumJardinB != 0){

                                                        $porcentajeJardinB = $proyecto_jardinB_ins_cap * 100;
                                                        $divJardinB = $porcentajeJardinB / $sumJardinB;
                                                        $resulJardinB = number_format((float)$divJardinB,1,'.','');
                                                        
                                                        echo $proyecto_jardinB_ins_cap.' ('.$resulJardinB.'%)'; 

                                                        }else{

                                                        }
                                                                                                                
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumJardinB != 0 ){

                                                        $otroEstJardinB = $proyecto_jardinB_sin+$proyecto_jardinB_noCon+$proyecto_jardinB_con+$proyecto_jardinB_agen+$proyecto_jardinB_ins+$proyecto_jardinB_cap+$proyecto_jardinB_pendiente;
                                                        
                                                        $porcentajeJardinBOtro = $otroEstJardinB * 100;
                                                        $divJardinBOtro = $porcentajeJardinBOtro / $sumJardinB;
                                                        $resulJardinBOtro = number_format((float)$divJardinBOtro,1,'.','');
                                                        
                                                        echo $otroEstJardinB.' ('.$resulJardinBOtro.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(69)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA PENTA -->
                    <!-- INICIO INMOBILIARIA PIQUEN -->
                    <div class="row">
                        <h2 class="text-info">PIUQUEN</h2>
                        <hr>
                        <center>

                             <?php
                            $sumTownhouse = $proyecto_townhouse_sin+$proyecto_townhouse_noCon+$proyecto_townhouse_con+$proyecto_townhouse_agen+$proyecto_townhouse_ins+$proyecto_townhouse_cap+$proyecto_townhouse_ins_cap+$proyecto_townhouse_pendiente;

                            if($sumTownhouse == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="townhouse" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumTownhouse != 0){

                                                        $porcentajeTownhouse = $proyecto_townhouse_ins_cap * 100;
                                                        $divTownhouse = $porcentajeTownhouse / $sumTownhouse;
                                                        $resulTownhouse = number_format((float)$divTownhouse,1,'.','');
                                                        
                                                        echo $proyecto_townhouse_ins_cap.' ('.$resulTownhouse.'%)'; 

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumTownhouse != 0){

                                                        $otrosEstTownhouse = $proyecto_townhouse_sin+$proyecto_townhouse_noCon+$proyecto_townhouse_con+$proyecto_townhouse_agen+$proyecto_townhouse_ins+$proyecto_townhouse_cap+$proyecto_townhouse_pendiente;
                                                        
                                                        $porcentajeTownhouseOtros = $otrosEstTownhouse * 100;
                                                        $divTownhouseOtros = $porcentajeTownhouseOtros / $sumTownhouse;
                                                        $resulTownhouseOtros = number_format((float)$divTownhouseOtros,1,'.','');
                                                        
                                                        echo $otrosEstTownhouse.' ('.$resulTownhouseOtros.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(30)">Ver detalles</button>
                                </div>   
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA PIQUEN -->
                    <!-- INICIO INMOBILIARIA PLAN -->
                    <div class="row">
                        <h2 class="text-info">PLAN</h2>
                        <hr>
                        <center>

                            <?php
                            $sumLasPerdices = $proyecto_lasPerdices_sin+$proyecto_lasPerdices_noCon+$proyecto_lasPerdices_con+$proyecto_lasPerdices_agen+$proyecto_lasPerdices_ins+$proyecto_lasPerdices_cap+$proyecto_lasPerdices_ins_cap+$proyecto_lasPerdices_pendiente;

                            if($sumLasPerdices == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="lasPerdices" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumLasPerdices != 0){

                                                        $porcentajeLasPerdices = $proyecto_lasPerdices_ins_cap * 100;
                                                        $divLasPerdices = $porcentajeLasPerdices / $sumLasPerdices;
                                                        $resulLasPerdices = number_format((float)$divLasPerdices,1,'.','');
                                                        
                                                        echo $proyecto_lasPerdices_ins_cap.' ('.$resulLasPerdices.'%)'; 

                                                        }else{

                                                        }
                                                                                                                
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumLasPerdices != 0){

                                                        $otrosEstLasPerdices = $proyecto_lasPerdices_sin+$proyecto_lasPerdices_noCon+$proyecto_lasPerdices_con+$proyecto_lasPerdices_agen+$proyecto_lasPerdices_ins+$proyecto_lasPerdices_cap+$proyecto_lasPerdices_pendiente;
                                                        
                                                        $porcentajeLasPerdicesOtros = $otrosEstLasPerdices * 100;
                                                        $divLasPerdicesOtros = $porcentajeLasPerdicesOtros / $sumLasPerdices;
                                                        $resulLasPerdicesOtros = number_format((float)$divLasPerdicesOtros,1,'.','');
                                                        
                                                        echo $otrosEstLasPerdices.' ('.$resulLasPerdicesOtros.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(47)">Ver detalles</button>
                                </div>   
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA PLAN --> 
                    <!-- INICIO INMOBILIARIA PORTA -->
                    <div class="row">
                        <h2 class="text-info">PORTA</h2>
                        <hr>
                        <center>

                            <?php
                            $sumLatadia = $proyecto_porta_latadia_sin+$proyecto_porta_latadia_noCon+$proyecto_porta_latadia_con+$proyecto_porta_latadia_agen+$proyecto_porta_latadia_ins+$proyecto_porta_latadia_cap+$proyecto_porta_latadia_ins_cap+$proyecto_porta_latadia_pendiente;

                            if($sumLatadia == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="porta_latadia" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumLatadia != 0 ){

                                                        $porcentajeLatadia = $proyecto_porta_latadia_ins_cap * 100;
                                                        $divLatadia = $porcentajeLatadia / $sumLatadia;
                                                        $resulLatadia = number_format((float)$divLatadia,1,'.','');
                                                        
                                                        echo $proyecto_porta_latadia_ins_cap.' ('.$resulLatadia.'%)'; 

                                                        }else{

                                                        }
                                                                                                                
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumLatadia != 0 ){

                                                        $otrosEstPortaLatadia = $proyecto_porta_latadia_sin+$proyecto_porta_latadia_noCon+$proyecto_porta_latadia_con+$proyecto_porta_latadia_agen+$proyecto_porta_latadia_ins+$proyecto_porta_latadia_cap+$proyecto_porta_latadia_pendiente;
                                                        
                                                        $porcentajeLatadiaOtro = $otrosEstPortaLatadia * 100;
                                                        $divLatadiaOtro = $porcentajeLatadiaOtro / $sumLatadia;
                                                        $resulLatadiaOtro = number_format((float)$divLatadiaOtro,1,'.','');
                                                        
                                                        echo $otrosEstPortaLatadia.' ('.$resulLatadiaOtro.'%)'; 

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(31)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA PORTA -->
                    <!-- INICIO INMOBILIARIA QUEYLEN-->
                    <div class="row">
                    	<h2 class="text-info">QUEYLEN</h2>
                        <hr>
                        <center>

                            <?php
                            $sum_altos_raco = $proyecto_altos_raco_sin+$proyecto_altos_raco_noCon+$proyecto_altos_raco_con+$proyecto_altos_raco_agen+$proyecto_altos_raco_ins+$proyecto_altos_raco_cap+$proyecto_altos_raco_ins_cap+$proyecto_altos_raco_pendiente;

                            if($sum_altos_raco == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="altos_raco" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_altos_raco != 0 ){

                                                        $porcentaje_altos_raco = $proyecto_altos_raco_ins_cap * 100;
                                                        $div_altos_raco = $porcentaje_altos_raco / $sum_altos_raco;
                                                        $resut_altos_raco = number_format((float)$div_altos_raco,1,'.','');
                                                        
                                                        echo $proyecto_altos_raco_ins_cap.' ('.$resut_altos_raco.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sum_altos_raco != 0 ){

                                                        $sumOtros_altos_raco = $proyecto_altos_raco_sin+$proyecto_altos_raco_noCon+$proyecto_altos_raco_con+$proyecto_altos_raco_agen+$proyecto_altos_raco_ins+$proyecto_altos_raco_cap+$proyecto_altos_raco_pendiente;

                                                        $porcentajeOtros_altos_raco = $sumOtros_altos_raco * 100;
                                                        $divOtros_altos_raco = $porcentajeOtros_altos_raco / $sum_altos_raco;
                                                        $resutOtros_altos_raco = number_format((float)$divOtros_altos_raco,1,'.','');

                                                        echo $sumOtros_altos_raco.' ('.$resutOtros_altos_raco.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(9)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php
                                $sum_altosRacoEtapa9 = $proyecto_altosRacoEtapa9_sin+$proyecto_altosRacoEtapa9_noCon+$proyecto_altosRacoEtapa9_con+$proyecto_altosRacoEtapa9_agen+$proyecto_altosRacoEtapa9_ins+$proyecto_altosRacoEtapa9_cap+$proyecto_altosRacoEtapa9_ins_cap+$proyecto_altosRacoEtapa9_pendiente;
                                if($sum_altosRacoEtapa9 == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="altosRacoEtapa9" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_altosRacoEtapa9 != 0 ){
                                                            $porcentaje_altosRacoEtapa9 = $proyecto_altosRacoEtapa9_ins_cap * 100;
                                                            $div_altosRacoEtapa9 = $porcentaje_altosRacoEtapa9 / $sum_altosRacoEtapa9;
                                                            $resut_altosRacoEtapa9 = number_format((float)$div_altosRacoEtapa9,1,'.','');
                                                            echo $proyecto_altosRacoEtapa9_ins_cap.' ('.$resut_altosRacoEtapa9.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_altosRacoEtapa9 != 0 ){
                                                            $sumOtros_altosRacoEtapa9 = $proyecto_altosRacoEtapa9_sin+$proyecto_altosRacoEtapa9_noCon+$proyecto_altosRacoEtapa9_con+$proyecto_altosRacoEtapa9_agen+$proyecto_altosRacoEtapa9_ins+$proyecto_altosRacoEtapa9_cap+$proyecto_altosRacoEtapa9_pendiente;
                                                            $porcentajeOtros_altosRacoEtapa9 = $sumOtros_altosRacoEtapa9 * 100;
                                                            $divOtros_altosRacoEtapa9 = $porcentajeOtros_altosRacoEtapa9 / $sum_altosRacoEtapa9;
                                                            $resutOtros_altosRacoEtapa9 = number_format((float)$divOtros_altosRacoEtapa9,1,'.','');
                                                            echo $sumOtros_altosRacoEtapa9.' ('.$resutOtros_altosRacoEtapa9.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(79)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA QUEYLEN -->
                    <!--  INICIO INMOBILIARIA REINA LAS PERDICES -->
                    <div class="row">
                        <h2 class="text-info">REINA LAS PERDICES</h2>
                        <hr>
                        <center>

                            <?php
                            $sumCondLasPerdices = $proyecto_condLasPerdices_sin+$proyecto_condLasPerdices_noCon+$proyecto_condLasPerdices_con+$proyecto_condLasPerdices_agen+$proyecto_condLasPerdices_ins+$proyecto_condLasPerdices_cap+$proyecto_condLasPerdices_ins_cap+$proyecto_condLasPerdices_pendiente;

                            if($sumCondLasPerdices == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="condLasPerdices" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumCondLasPerdices != 0){

                                                        $porcentajeCondLasPerdices = $proyecto_condLasPerdices_ins_cap * 100;
                                                        $divCondLasPerdices = $porcentajeCondLasPerdices / $sumCondLasPerdices;
                                                        $resulCondLasPerdices = number_format((float)$divCondLasPerdices,1,'.','');
                                                        
                                                        echo $proyecto_condLasPerdices_ins_cap.' ('.$resulCondLasPerdices.'%)'; 

                                                        }else{

                                                        }                                                        
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sumCondLasPerdices != 0 ){
                                                        $otrosEst_condLasPerdices = $proyecto_condLasPerdices_sin+$proyecto_condLasPerdices_noCon+$proyecto_condLasPerdices_con+$proyecto_condLasPerdices_agen+$proyecto_condLasPerdices_ins+$proyecto_condLasPerdices_cap+$proyecto_condLasPerdices_pendiente;
                                                        
                                                        $porcentaje_condLasPerdices_Otros = $otrosEst_condLasPerdices * 100;
                                                        $div_condLasPerdices_Otros = $porcentaje_condLasPerdices_Otros / $sumCondLasPerdices;
                                                        $resul_condLasPerdices_Otros = number_format((float)$div_condLasPerdices_Otros,1,'.','');
                                                        
                                                        echo $otrosEst_condLasPerdices.' ('.$resul_condLasPerdices_Otros.'%)';

                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(47)">Ver detalles</button>
                                </div>   
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA REINA LAS PERDICES --> 
                    <!-- INICIO INMOBILIARIA REZEPKA-->
                    <div class="row">
                    	<h2 class="text-info">REZEPKA</h2>
                        <hr>
                        <center>

                            <?php
                            $sumBackOffice = $proyecto_back_office_sin+$proyecto_back_office_noCon+$proyecto_back_office_con+$proyecto_back_office_agen+$proyecto_back_office_ins+$proyecto_back_office_cap+$proyecto_back_office_ins_cap+$proyecto_back_office_pendiente;

                            if($sumBackOffice == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="back_office" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumBackOffice != 0 ){

                                                        $porcentajeBackOffice = $proyecto_back_office_ins_cap * 100;
                                                        $divBackOffice = $porcentajeBackOffice / $sumBackOffice;
                                                        $resulBackOffice = number_format((float)$divBackOffice,1,'.','');
                                                        
                                                        echo $proyecto_back_office_ins_cap.' ('.$resulBackOffice.'%)';  

                                                        }else{

                                                        }
                                                                                                                
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumBackOffice != 0 ){

                                                        $otroEstBackOffice = $proyecto_back_office_sin+$proyecto_back_office_noCon+$proyecto_back_office_con+$proyecto_back_office_agen+$proyecto_back_office_ins+$proyecto_back_office_cap+$proyecto_back_office_pendiente;
                                                        
                                                        $porcentajeBackOfficeOtro = $otroEstBackOffice * 100;
                                                        $divBackOfficeOtro = $porcentajeBackOfficeOtro / $sumBackOffice;
                                                        $resulBackOfficeOtro = number_format((float)$divBackOfficeOtro,1,'.','');
                                                        
                                                        echo $otroEstBackOffice.' ('.$resulBackOfficeOtro.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(27)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php

                            $sumBackOfficeEtapa2 = $proyecto_back_office_etapa_2_sin+$proyecto_back_office_etapa_2_noCon+$proyecto_back_office_etapa_2_con+$proyecto_back_office_etapa_2_agen+$proyecto_back_office_etapa_2_ins+$proyecto_back_office_etapa_2_cap+$proyecto_back_office_etapa_2_ins_cap+$proyecto_back_office_etapa_2_pendiente;

                            if($sumBackOfficeEtapa2 == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="back_office_etapa_2" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    
                                                        if($sumBackOfficeEtapa2 != 0 ){

                                                        $porcentajeBackOfficeEtapa2 = $proyecto_back_office_etapa_2_ins_cap * 100;
                                                        $divBackOfficeEtapa2 = $porcentajeBackOfficeEtapa2 / $sumBackOfficeEtapa2;
                                                        $resulBackOfficeEtapa2 = number_format((float)$divBackOfficeEtapa2,1,'.','');
                                                        
                                                        echo $proyecto_back_office_etapa_2_ins_cap.' ('.$resulBackOfficeEtapa2.'%)'; 

                                                        }else{

                                                        }
                                                                                                               
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumBackOfficeEtapa2 != 0 ){

                                                        $otroEstBackOfficeEtapa2 = $proyecto_back_office_etapa_2_sin+$proyecto_back_office_etapa_2_noCon+$proyecto_back_office_etapa_2_con+$proyecto_back_office_etapa_2_agen+$proyecto_back_office_etapa_2_ins+$proyecto_back_office_etapa_2_cap+$proyecto_back_office_etapa_2_pendiente;
                                                        
                                                        $porcentajeBackOfficeEtapa2Otro = $otroEstBackOfficeEtapa2 * 100;
                                                        $divBackOfficeEtapa2Otro = $porcentajeBackOfficeEtapa2Otro / $sumBackOfficeEtapa2;
                                                        $resulBackOfficeEtapa2Otro = number_format((float)$divBackOfficeEtapa2Otro,1,'.','');
                                                        
                                                        echo $otroEstBackOfficeEtapa2.' ('.$resulBackOfficeEtapa2Otro.'%)';

                                                        }else{

                                                        }
                                                                                                                                                                    
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(78)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA REZEPKA-->
                    <!-- INICIO INMOBILIARIA SAN ISIDRO-->
                    <div class="row">
                        <h2 class="text-info">SAN ISIDRO</h2>
                        <hr>
                        <center>
                            
                            <?php

                            $sum_edificioItalia = $proyecto_edItalia_sin+$proyecto_edItalia_noCon+$proyecto_edItalia_con+$proyecto_edItalia_agen+$proyecto_edItalia_ins+$proyecto_edItalia_cap+$proyecto_edItalia_ins_cap+$proyecto_edItalia_pendiente;

                            if($sum_edificioItalia == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="edificioItalia" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_edificioItalia != 0){

                                                        $porcentaje_edificioItalia = $proyecto_edItalia_ins_cap * 100;
                                                        $div_edificioItalia = $porcentaje_edificioItalia / $sum_edificioItalia;
                                                        $result_edificioItalia = number_format((float)$div_edificioItalia,1,'.','');
                                                        echo $proyecto_edItalia_ins_cap.' ('.$result_edificioItalia.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sum_edificioItalia != 0){

                                                        $sumOtros_edificioItalia = $proyecto_edItalia_sin+$proyecto_edItalia_noCon+$proyecto_edItalia_con+$proyecto_edItalia_agen+$proyecto_edItalia_ins+$proyecto_edItalia_cap+$proyecto_edItalia_pendiente;
                                                        $porcentajeOtros_edificioItalia = $sumOtros_edificioItalia * 100;
                                                        $divOtros_edificioItalia = $porcentajeOtros_edificioItalia / $sum_edificioItalia;
                                                        $resultOtros_edificioItalia = number_format((float)$divOtros_edificioItalia,1,'.','');
                                                        echo $sumOtros_edificioItalia.' ('.$resultOtros_edificioItalia.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(68)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARA SAN ISIDRO-->
                    <!-- INICIO INMOBILIARIA SECURTY -->
                    <div class="row">
                    	<h2 class="text-info">SECURITY</h2>
                        <hr>
                       <center>

                            <?php

                            $sumSanDamian = $proyecto_jardines_sanDamian_sin+$proyecto_jardines_sanDamian_noCon+$proyecto_jardines_sanDamian_con+$proyecto_jardines_sanDamian_agen+$proyecto_jardines_sanDamian_ins+$proyecto_jardines_sanDamian_cap+$proyecto_jardines_sanDamian_ins_cap+$proyecto_jardines_sanDamian_pendiente;

                            if($sumSanDamian == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="jardines_san_damian" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumSanDamian != 0){

                                                        $porcentajeSanDamian = $proyecto_jardines_sanDamian_ins_cap * 100;
                                                        $divSanDamian = $porcentajeSanDamian / $sumSanDamian;
                                                        $resulSanDamian = number_format((float)$divSanDamian,1,'.','');
                                                        
                                                        echo $proyecto_jardines_sanDamian_ins_cap.' ('.$resulSanDamian.'%)'; 

                                                        }else{

                                                        }
                                                     
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumSanDamian != 0){

                                                        $otroEstJardinesSanDamian = $proyecto_jardines_sanDamian_sin+$proyecto_jardines_sanDamian_noCon+$proyecto_jardines_sanDamian_con+$proyecto_jardines_sanDamian_agen+$proyecto_jardines_sanDamian_ins+$proyecto_jardines_sanDamian_cap+$proyecto_jardines_sanDamian_pendiente;
                                                        
                                                        $porcentajeSanDamianOtro = $otroEstJardinesSanDamian * 100;
                                                        $divSanDamianOtro = $porcentajeSanDamianOtro / $sumSanDamian;
                                                        $resulSanDamianOtro = number_format((float)$divSanDamianOtro,1,'.','');
                                                        
                                                        echo $otroEstJardinesSanDamian.' ('.$resulSanDamianOtro.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(12)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php
                                $sum_sanDamianEtapa2 = $proyecto_sanDamianEtapa2_sin+$proyecto_sanDamianEtapa2_noCon+$proyecto_sanDamianEtapa2_con+$proyecto_sanDamianEtapa2_agen+$proyecto_sanDamianEtapa2_ins+$proyecto_sanDamianEtapa2_cap+$proyecto_sanDamianEtapa2_ins_cap+$proyecto_sanDamianEtapa2_pendiente;
                            if($sum_sanDamianEtapa2 == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                                <div id="sanDamianEtapa2" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_sanDamianEtapa2 != 0){
                                                            $porcentaje_sanDamianEtapa2 = $proyecto_sanDamianEtapa2_ins_cap * 100;
                                                            $div_sanDamianEtapa2 = $porcentaje_sanDamianEtapa2 / $sum_sanDamianEtapa2;
                                                            $resul_sanDamianEtapa2 = number_format((float)$div_sanDamianEtapa2,1,'.','');
                                                            echo $proyecto_sanDamianEtapa2_ins_cap.' ('.$resul_sanDamianEtapa2.'%)'; 
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_sanDamianEtapa2 != 0){
                                                            $otroEst_sanDamianEtapa2 = $proyecto_sanDamianEtapa2_sin+$proyecto_sanDamianEtapa2_noCon+$proyecto_sanDamianEtapa2_con+$proyecto_sanDamianEtapa2_agen+$proyecto_sanDamianEtapa2_ins+$proyecto_sanDamianEtapa2_cap+$proyecto_sanDamianEtapa2_pendiente;
                                                            $porcentaje_sanDamianEtapa2_Otro = $otroEst_sanDamianEtapa2 * 100;
                                                            $div_sanDamianEtapa2_Otro = $porcentaje_sanDamianEtapa2_Otro / $sum_sanDamianEtapa2;
                                                            $resul_sanDamianEtapa2_Otro = number_format((float)$div_sanDamianEtapa2_Otro,1,'.','');
                                                            echo $otroEst_sanDamianEtapa2.' ('.$resul_sanDamianEtapa2_Otro.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(123)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>

                            <?php

                            $sumLaderasDelValle = $proyecto_laderas_del_valle_1_sin+$proyecto_laderas_del_valle_1_noCon+$proyecto_laderas_del_valle_1_con+$proyecto_laderas_del_valle_1_agen+$proyecto_laderas_del_valle_1_ins+$proyecto_laderas_del_valle_1_cap+$proyecto_laderas_del_valle_1_ins_cap+$proyecto_laderas_del_valle_1_pendiente;

                            if($sumLaderasDelValle == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="laderas_del_valle_1" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    
                                                        
                                                        if($sumLaderasDelValle != 0){

                                                        $porcentajeLaderasDelValle = $proyecto_laderas_del_valle_1_ins_cap * 100;
                                                        $divLaderasDelValle = $porcentajeLaderasDelValle / $sumLaderasDelValle;
                                                        $resulLaderasDelValle = number_format((float)$divLaderasDelValle,1,'.','');
                                                        
                                                        echo $proyecto_laderas_del_valle_1_ins_cap.' ('.$resulLaderasDelValle.'%)'; 

                                                        }else{

                                                        }
                                                                                                                
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumLaderasDelValle != 0 ){

                                                        $otroEstLaderasDelValle = $proyecto_laderas_del_valle_1_sin+$proyecto_laderas_del_valle_1_noCon+$proyecto_laderas_del_valle_1_con+$proyecto_laderas_del_valle_1_agen+$proyecto_laderas_del_valle_1_ins+$proyecto_laderas_del_valle_1_cap+$proyecto_laderas_del_valle_1_pendiente;
                                                        
                                                        $porcentajeLaderasDelValleOtro = $otroEstLaderasDelValle * 100;
                                                        $divLaderasDelValleOtro = $porcentajeLaderasDelValleOtro / $sumLaderasDelValle;
                                                        $resulLaderasDelValleOtro = number_format((float)$divLaderasDelValleOtro,1,'.','');
                                                        
                                                        echo $otroEstLaderasDelValle.' ('.$resulLaderasDelValleOtro.'%)';

                                                        }else{

                                                        }                                                        
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(70)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                     </div>
                    <!-- FIN INMOBILIARIA SECURITY -->
                    <!-- INICIO INMOBILIARIA SGPROYECTA-->   
                    <div class="row">      
                    <h2 class="text-info">SGPROYECTA</h2>
                        <hr>                            
                        <center>

                            <?php

                            $sumPumalal = $proyecto_mirador_pumalal_sin+$proyecto_mirador_pumalal_noCon+$proyecto_mirador_pumalal_con+$proyecto_mirador_pumalal_agen+$proyecto_mirador_pumalal_ins+$proyecto_mirador_pumalal_cap+$proyecto_mirador_pumalal_ins_cap+$proyecto_mirador_pumalal_pendiente;

                            if($sumPumalal == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="mirador_de_pumalal" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sumPumalal != 0){

                                                        $pocentajePumalal = $proyecto_mirador_pumalal_ins_cap * 100;
                                                        $divPumalal = $pocentajePumalal / $sumPumalal;
                                                        $resulPumalal = number_format((float)$divPumalal,1,'.',''); 
                                                        
                                                        echo $proyecto_mirador_pumalal_ins_cap.' ('.$resulPumalal.'%)';

                                                        }else{

                                                        }
                                                                                                                 
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                    if($sumPumalal != 0 ){

                                                        $otrosEstMiradorPumalal = $proyecto_mirador_pumalal_sin+$proyecto_mirador_pumalal_noCon+$proyecto_mirador_pumalal_con+$proyecto_mirador_pumalal_agen+$proyecto_mirador_pumalal_ins+$proyecto_mirador_pumalal_cap+$proyecto_mirador_pumalal_pendiente;
                                                        
                                                        $pocentajePumalalOtro = $otrosEstMiradorPumalal * 100;
                                                        $divPumalalOtro = $pocentajePumalalOtro / $sumPumalal;
                                                        $resulPumalalOtro = number_format((float)$divPumalalOtro,1,'.','');
                                                        
                                                        echo $otrosEstMiradorPumalal.' ('.$resulPumalalOtro.'%)';

                                                    }else{

                                                    }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(13)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA SGPROYECTA-->
                    <!-- INICIO SINERGIA -->
                    <div class="row">      
                    <h2 class="text-info">SINERGIA</h2>
                        <hr>                            
                        <center>
                            <?php
                                $sum_jardinesAntonioVaras = $proyecto_jardinesAntonioVaras_sin+$proyecto_jardinesAntonioVaras_noCon+$proyecto_jardinesAntonioVaras_con+$proyecto_jardinesAntonioVaras_agen+$proyecto_jardinesAntonioVaras_ins+$proyecto_jardinesAntonioVaras_cap+$proyecto_jardinesAntonioVaras_ins_cap+$proyecto_jardinesAntonioVaras_pendiente;
                                if($sum_jardinesAntonioVaras == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="jardinesAntonioVaras" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVaras != 0){
                                                            $pocentaje_jardinesAntonioVaras = $proyecto_jardinesAntonioVaras_ins_cap * 100;
                                                            $div_jardinesAntonioVaras = $pocentaje_jardinesAntonioVaras / $sum_jardinesAntonioVaras;
                                                            $resul_jardinesAntonioVaras = number_format((float)$div_jardinesAntonioVaras,1,'.',''); 
                                                            echo $proyecto_jardinesAntonioVaras_ins_cap.' ('.$resul_jardinesAntonioVaras.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVaras != 0 ){
                                                            $otrosEst_jardinesAntonioVaras = $proyecto_jardinesAntonioVaras_sin+$proyecto_jardinesAntonioVaras_noCon+$proyecto_jardinesAntonioVaras_con+$proyecto_jardinesAntonioVaras_agen+$proyecto_jardinesAntonioVaras_ins+$proyecto_jardinesAntonioVaras_cap+$proyecto_jardinesAntonioVaras_pendiente;
                                                            $pocentaje_jardinesAntonioVaras_Otro = $otrosEst_jardinesAntonioVaras * 100;
                                                            $div_jardinesAntonioVaras_Otro = $pocentaje_jardinesAntonioVaras_Otro / $sum_jardinesAntonioVaras;
                                                            $resul_jardinesAntonioVaras_Otro = number_format((float)$div_jardinesAntonioVaras_Otro,1,'.','');
                                                            echo $otrosEst_jardinesAntonioVaras.' ('.$resul_jardinesAntonioVaras_Otro.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(64)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php
                                $sum_jardinesAntonioVarasC = $proyecto_jardinesAntonioVarasC_sin+$proyecto_jardinesAntonioVarasC_noCon+$proyecto_jardinesAntonioVarasC_con+$proyecto_jardinesAntonioVarasC_agen+$proyecto_jardinesAntonioVarasC_ins+$proyecto_jardinesAntonioVarasC_cap+$proyecto_jardinesAntonioVarasC_ins_cap+$proyecto_jardinesAntonioVarasC_pendiente;
                                if($sum_jardinesAntonioVarasC == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="jardinesAntonioVarasC" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVarasC != 0){
                                                            $pocentaje_jardinesAntonioVarasC = $proyecto_jardinesAntonioVarasC_ins_cap * 100;
                                                            $div_jardinesAntonioVarasC = $pocentaje_jardinesAntonioVarasC / $sum_jardinesAntonioVarasC;
                                                            $resul_jardinesAntonioVarasC = number_format((float)$div_jardinesAntonioVarasC,1,'.',''); 
                                                            echo $proyecto_jardinesAntonioVarasC_ins_cap.' ('.$resul_jardinesAntonioVarasC.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVarasC != 0 ){
                                                            $otrosEst_jardinesAntonioVarasC = $proyecto_jardinesAntonioVarasC_sin+$proyecto_jardinesAntonioVarasC_noCon+$proyecto_jardinesAntonioVarasC_con+$proyecto_jardinesAntonioVarasC_agen+$proyecto_jardinesAntonioVarasC_ins+$proyecto_jardinesAntonioVarasC_cap+$proyecto_jardinesAntonioVarasC_pendiente;
                                                            $pocentaje_jardinesAntonioVarasC_Otro = $otrosEst_jardinesAntonioVarasC * 100;
                                                            $div_jardinesAntonioVarasC_Otro = $pocentaje_jardinesAntonioVarasC_Otro / $sum_jardinesAntonioVarasC;
                                                            $resul_jardinesAntonioVarasC_Otro = number_format((float)$div_jardinesAntonioVarasC_Otro,1,'.','');
                                                            echo $otrosEst_jardinesAntonioVarasC.' ('.$resul_jardinesAntonioVarasC_Otro.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(156)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php
                                $sum_jardinesAntonioVarasD = $proyecto_jardinesAntonioVarasD_sin+$proyecto_jardinesAntonioVarasD_noCon+$proyecto_jardinesAntonioVarasD_con+$proyecto_jardinesAntonioVarasD_agen+$proyecto_jardinesAntonioVarasD_ins+$proyecto_jardinesAntonioVarasD_cap+$proyecto_jardinesAntonioVarasD_ins_cap+$proyecto_jardinesAntonioVarasD_pendiente;
                                if($sum_jardinesAntonioVarasD == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="jardinesAntonioVarasD" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVarasD != 0){
                                                            $pocentaje_jardinesAntonioVarasD = $proyecto_jardinesAntonioVarasD_ins_cap * 100;
                                                            $div_jardinesAntonioVarasD = $pocentaje_jardinesAntonioVarasD / $sum_jardinesAntonioVarasD;
                                                            $resul_jardinesAntonioVarasD = number_format((float)$div_jardinesAntonioVarasD,1,'.',''); 
                                                            echo $proyecto_jardinesAntonioVarasD_ins_cap.' ('.$resul_jardinesAntonioVarasD.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVarasD != 0 ){
                                                            $otrosEst_jardinesAntonioVarasD = $proyecto_jardinesAntonioVarasD_sin+$proyecto_jardinesAntonioVarasD_noCon+$proyecto_jardinesAntonioVarasD_con+$proyecto_jardinesAntonioVarasD_agen+$proyecto_jardinesAntonioVarasD_ins+$proyecto_jardinesAntonioVarasD_cap+$proyecto_jardinesAntonioVarasD_pendiente;
                                                            $pocentaje_jardinesAntonioVarasD_Otro = $otrosEst_jardinesAntonioVarasD * 100;
                                                            $div_jardinesAntonioVarasD_Otro = $pocentaje_jardinesAntonioVarasD_Otro / $sum_jardinesAntonioVarasD;
                                                            $resul_jardinesAntonioVarasD_Otro = number_format((float)$div_jardinesAntonioVarasD_Otro,1,'.','');
                                                            echo $otrosEst_jardinesAntonioVarasD.' ('.$resul_jardinesAntonioVarasD_Otro.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(156)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="row">
                        <center>
                            <?php
                                $sum_jardinesAntonioVarasAB = $proyecto_jardinesAntonioVarasAB_sin+$proyecto_jardinesAntonioVarasAB_noCon+$proyecto_jardinesAntonioVarasAB_con+$proyecto_jardinesAntonioVarasAB_agen+$proyecto_jardinesAntonioVarasAB_ins+$proyecto_jardinesAntonioVarasAB_cap+$proyecto_jardinesAntonioVarasAB_ins_cap+$proyecto_jardinesAntonioVarasAB_pendiente;
                                if($sum_jardinesAntonioVarasAB == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="jardinesAntonioVarasAB" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVarasAB != 0){
                                                            $pocentaje_jardinesAntonioVarasAB = $proyecto_jardinesAntonioVarasAB_ins_cap * 100;
                                                            $div_jardinesAntonioVarasAB = $pocentaje_jardinesAntonioVarasAB / $sum_jardinesAntonioVarasAB;
                                                            $resul_jardinesAntonioVarasAB = number_format((float)$div_jardinesAntonioVarasAB,1,'.',''); 
                                                            echo $proyecto_jardinesAntonioVarasAB_ins_cap.' ('.$resul_jardinesAntonioVarasAB.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVarasAB != 0 ){
                                                            $otrosEst_jardinesAntonioVarasAB = $proyecto_jardinesAntonioVarasAB_sin+$proyecto_jardinesAntonioVarasAB_noCon+$proyecto_jardinesAntonioVarasAB_con+$proyecto_jardinesAntonioVarasAB_agen+$proyecto_jardinesAntonioVarasAB_ins+$proyecto_jardinesAntonioVarasAB_cap+$proyecto_jardinesAntonioVarasAB_pendiente;
                                                            $pocentaje_jardinesAntonioVarasAB_Otro = $otrosEst_jardinesAntonioVarasAB * 100;
                                                            $div_jardinesAntonioVarasAB_Otro = $pocentaje_jardinesAntonioVarasAB_Otro / $sum_jardinesAntonioVarasAB;
                                                            $resul_jardinesAntonioVarasAB_Otro = number_format((float)$div_jardinesAntonioVarasAB_Otro,1,'.','');
                                                            echo $otrosEst_jardinesAntonioVarasAB.' ('.$resul_jardinesAntonioVarasAB_Otro.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(156)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php
                                $sum_jardinesAntonioVarasG = $proyecto_jardinesAntonioVarasG_sin+$proyecto_jardinesAntonioVarasG_noCon+$proyecto_jardinesAntonioVarasG_con+$proyecto_jardinesAntonioVarasG_agen+$proyecto_jardinesAntonioVarasG_ins+$proyecto_jardinesAntonioVarasG_cap+$proyecto_jardinesAntonioVarasG_ins_cap+$proyecto_jardinesAntonioVarasG_pendiente;
                                if($sum_jardinesAntonioVarasG == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="jardinesAntonioVarasG" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVarasG != 0){
                                                            $pocentaje_jardinesAntonioVarasG = $proyecto_jardinesAntonioVarasG_ins_cap * 100;
                                                            $div_jardinesAntonioVarasG = $pocentaje_jardinesAntonioVarasG / $sum_jardinesAntonioVarasG;
                                                            $resul_jardinesAntonioVarasG = number_format((float)$div_jardinesAntonioVarasG,1,'.',''); 
                                                            echo $proyecto_jardinesAntonioVarasG_ins_cap.' ('.$resul_jardinesAntonioVarasG.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVarasG != 0 ){
                                                            $otrosEst_jardinesAntonioVarasG = $proyecto_jardinesAntonioVarasG_sin+$proyecto_jardinesAntonioVarasG_noCon+$proyecto_jardinesAntonioVarasG_con+$proyecto_jardinesAntonioVarasG_agen+$proyecto_jardinesAntonioVarasG_ins+$proyecto_jardinesAntonioVarasG_cap+$proyecto_jardinesAntonioVarasG_pendiente;
                                                            $pocentaje_jardinesAntonioVarasG_Otro = $otrosEst_jardinesAntonioVarasG * 100;
                                                            $div_jardinesAntonioVarasG_Otro = $pocentaje_jardinesAntonioVarasG_Otro / $sum_jardinesAntonioVarasG;
                                                            $resul_jardinesAntonioVarasG_Otro = number_format((float)$div_jardinesAntonioVarasG_Otro,1,'.','');
                                                            echo $otrosEst_jardinesAntonioVarasG.' ('.$resul_jardinesAntonioVarasG_Otro.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(156)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>
                            <?php
                                $sum_jardinesAntonioVarasEF = $proyecto_jardinesAntonioVarasEF_sin+$proyecto_jardinesAntonioVarasEF_noCon+$proyecto_jardinesAntonioVarasEF_con+$proyecto_jardinesAntonioVarasEF_agen+$proyecto_jardinesAntonioVarasEF_ins+$proyecto_jardinesAntonioVarasEF_cap+$proyecto_jardinesAntonioVarasEF_ins_cap+$proyecto_jardinesAntonioVarasEF_pendiente;
                                if($sum_jardinesAntonioVarasEF == 0){
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                                } else {
                                    echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                                }
                            ?>
                                <div id="jardinesAntonioVarasEF" style="height: 300px;"></div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVarasEF != 0){
                                                            $pocentaje_jardinesAntonioVarasEF = $proyecto_jardinesAntonioVarasEF_ins_cap * 100;
                                                            $div_jardinesAntonioVarasEF = $pocentaje_jardinesAntonioVarasEF / $sum_jardinesAntonioVarasEF;
                                                            $resul_jardinesAntonioVarasEF = number_format((float)$div_jardinesAntonioVarasEF,1,'.',''); 
                                                            echo $proyecto_jardinesAntonioVarasEF_ins_cap.' ('.$resul_jardinesAntonioVarasEF.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($sum_jardinesAntonioVarasEF != 0 ){
                                                            $otrosEst_jardinesAntonioVarasEF = $proyecto_jardinesAntonioVarasEF_sin+$proyecto_jardinesAntonioVarasEF_noCon+$proyecto_jardinesAntonioVarasEF_con+$proyecto_jardinesAntonioVarasEF_agen+$proyecto_jardinesAntonioVarasEF_ins+$proyecto_jardinesAntonioVarasEF_cap+$proyecto_jardinesAntonioVarasEF_pendiente;
                                                            $pocentaje_jardinesAntonioVarasEF_Otro = $otrosEst_jardinesAntonioVarasEF * 100;
                                                            $div_jardinesAntonioVarasEF_Otro = $pocentaje_jardinesAntonioVarasEF_Otro / $sum_jardinesAntonioVarasEF;
                                                            $resul_jardinesAntonioVarasEF_Otro = number_format((float)$div_jardinesAntonioVarasEF_Otro,1,'.','');
                                                            echo $otrosEst_jardinesAntonioVarasEF.' ('.$resul_jardinesAntonioVarasEF_Otro.'%)';
                                                        }else{

                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(156)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN SINERGIA -->
                    <!-- INICIO INMOBILIARIA TOWNHOUSE -->
                    <div class="row">
                        <h2 class="text-info">TOWNHOUSE</h2>
                        <hr>
                        <center>
                            <?php

                             $sum_losAcacios = $proyecto_losAcacios_sin+$proyecto_losAcacios_noCon+$proyecto_losAcacios_con+$proyecto_losAcacios_agen+$proyecto_losAcacios_ins+$proyecto_losAcacios_cap+$proyecto_losAcacios_ins_cap+$proyecto_losAcacios_pendiente;

                            if($sum_losAcacios == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="losAcacios" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                       
                                                        if($sum_losAcacios != 0){

                                                        $porcentaje_losAcacios = $proyecto_losAcacios_ins_cap * 100;
                                                        $div_losAcacios = $porcentaje_losAcacios / $sum_losAcacios;
                                                        $resut_losAcacios = number_format((float)$div_losAcacios,1,'.','');
                                                        
                                                        echo $proyecto_losAcacios_ins_cap.' ('.$resut_losAcacios.'%)'; 

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sum_losAcacios != 0 ){

                                                        $sumOtros_losAcacios = $proyecto_losAcacios_sin+$proyecto_losAcacios_noCon+$proyecto_losAcacios_con+$proyecto_losAcacios_agen+$proyecto_losAcacios_ins+$proyecto_losAcacios_cap+$proyecto_losAcacios_pendiente;

                                                        $porcentajeOtros_losAcacios = $sumOtros_losAcacios * 100;
                                                        $divOtros_losAcacios = $porcentajeOtros_losAcacios / $sum_losAcacios;
                                                        $resutOtros_losAcacios = number_format((float)$divOtros_losAcacios,1,'.','');

                                                        echo $sumOtros_losAcacios.' ('.$resutOtros_losAcacios.'%)'; 

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(25)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                        <center>

                            <?php

                             $sum_quillay = $proyecto_quillay_sin+$proyecto_quillay_noCon+$proyecto_quillay_con+$proyecto_quillay_agen+$proyecto_quillay_ins+$proyecto_quillay_cap+$proyecto_quillay_ins_cap+$proyecto_quillay_pendiente;

                            if($sum_quillay == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="quillay" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_quillay != 0 ){

                                                        $porcentaje_quillay = $proyecto_quillay_ins_cap * 100;
                                                        $div_quillay = $porcentaje_quillay / $sum_quillay;
                                                        $resut_quillay = number_format((float)$div_quillay,1,'.','');
                                                        
                                                        echo $proyecto_quillay_ins_cap.' ('.$resut_quillay.'%)';

                                                        }else{

                                                        }
                                                       
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sum_quillay != 0){

                                                        $sumOtros_quillay = $proyecto_quillay_sin+$proyecto_quillay_noCon+$proyecto_quillay_con+$proyecto_quillay_agen+$proyecto_quillay_ins+$proyecto_quillay_cap+$proyecto_quillay_pendiente;

                                                        $porcentajeOtros_quillay = $sumOtros_quillay * 100;
                                                        $divOtros_quillay = $porcentajeOtros_quillay / $sum_quillay;
                                                        $resutOtros_quillay = number_format((float)$divOtros_quillay,1,'.','');

                                                        echo $sumOtros_quillay.' ('.$resutOtros_quillay.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(24)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA TOWNHOUSE -->
                    <!-- INICIO INMOBILIARIA URBES -->
                    <div class="row">
                    	<h2 class="text-info">URBES</h2>
                        <hr>  
                        <center>
                            <?php

                             $sumUrbes = $proyecto_urbes_viena_sin+$proyecto_urbes_viena_noCon+$proyecto_urbes_viena_con+$proyecto_urbes_viena_agen+$proyecto_urbes_viena_ins+$proyecto_urbes_viena_cap+$proyecto_urbes_viena_ins_cap+$proyecto_urbes_viena_pendiente;

                            if($sumUrbes == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="urbes_viena" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                    if($sumUrbes != 0){

                                                        $porcentajeUrbes = $proyecto_urbes_viena_ins_cap * 100;
                                                        $divUrbes = $porcentajeUrbes / $sumUrbes;
                                                        $resulUrbes = number_format((float)$divUrbes,1,'.','');
                                                        echo $proyecto_urbes_viena_ins_cap.' ('.$resulUrbes.'%)';

                                                    }else{

                                                    }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sumUrbes != 0 ){

                                                        $otrosEstUrbesViena = $proyecto_urbes_viena_sin+$proyecto_urbes_viena_noCon+$proyecto_urbes_viena_con+$proyecto_urbes_viena_agen+$proyecto_urbes_viena_ins+$proyecto_urbes_viena_cap+$proyecto_urbes_viena_pendiente;
                                                        $porcentajeUrbesOtro = $otrosEstUrbesViena * 100;
                                                        $divUrbesOtro = $porcentajeUrbesOtro / $sumUrbes;
                                                        $resulUrbesOtro = number_format((float)$divUrbesOtro,1,'.','');
                                                        echo $otrosEstUrbesViena.' ('.$resulUrbesOtro.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(14)">Ver detalles</button>
                                </div>
                            </div>
                        </center>                       
                    </div>
                    <!-- FIN INMOBILIARIA URBES-->
                    <!-- INICIO INMOBILIARIA VIVIENDAS 2000 -->
                    <div class="row">
                        <h2 class="text-info">VIVIENDAS 2000</h2>
                        <hr>
                        <center>
                            <?php

                             $sum_elTirol = $proyecto_elTirol_sin+$proyecto_elTirol_noCon+$proyecto_elTirol_con+$proyecto_elTirol_agen+$proyecto_elTirol_ins+$proyecto_elTirol_cap+$proyecto_elTirol_ins_cap+$proyecto_elTirol_pendiente;

                            if($sum_elTirol == 0){
                                echo '<div class="col-md-4 col-sm-12 col-xs-12" style="display: none;">';
                            } else {
                                echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            }

                            ?>
                            <!-- <div class="col-md-4 col-sm-12 col-xs-12"> -->
                                <div id="elTirol" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                        if($sum_elTirol != 0 ){

                                                        $porcentaje_elTirol = $proyecto_elTirol_ins_cap * 100;
                                                        $div_elTirol = $porcentaje_elTirol / $sum_elTirol;
                                                        $resut_elTirol = number_format((float)$div_elTirol,1,'.','');
                                                        
                                                        echo $proyecto_elTirol_ins_cap.' ('.$resut_elTirol.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                        if($sum_elTirol != 0 ){

                                                        $sumOtros_elTirol = $proyecto_elTirol_sin+$proyecto_elTirol_noCon+$proyecto_elTirol_con+$proyecto_elTirol_agen+$proyecto_elTirol_ins+$proyecto_elTirol_cap+$proyecto_elTirol_pendiente;

                                                        $porcentajeOtros_elTirol = $sumOtros_elTirol * 100;
                                                        $divOtros_elTirol = $porcentajeOtros_elTirol / $sum_elTirol;
                                                        $resutOtros_elTirol = number_format((float)$divOtros_elTirol,1,'.','');

                                                        echo $sumOtros_elTirol.' ('.$resutOtros_elTirol.'%)';

                                                        }else{

                                                        }
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto(10)">Ver detalles</button>
                                </div>
                            </div>
                        </center>
                    </div>
                    <!-- FIN INMOBILIARIA VIVIENDAS 2000 -->
              </div>
          </div>
      </div>  
    </div>


                    <!-- Inicio Ejemplo DIV Graficos -->
                    <!--div class="row">
                        <center>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div id="" style="height: 300px;">
                                </div>
                                <div>
                                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><small>Instalado y capacitado</small></th>
                                                <th><small>Otros estados</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </center>
                    </div-->
                    <!-- Fin Ejemplo DIV Graficos -->

    <!--div>
                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><small>Instalado y capacitado</small></th>
                                            <th><small>Otros estados</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div-->

    <!-- FIN FILTRAR PROYECTO -->


<!-- INICIO MODAL INFORME TOTAL PROYECTOS -->
<div class="modal fade" id="modal_informe_total_proyectos" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg2">
        <div class="modal-content">
            <div class="color-line"></div>
                <div class="modal-header">
                    <h2 class="modal-title">Informe total proyectos.</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>Por contrato:</h4><br>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Total de viviendas ingresadas:</strong></p>        
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="">{{ $suma_total_viviendas }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Menor fecha real inicio instalacion / Proyecto:</strong></p>        
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="">
                                        {{ $fecha_minima }} / @foreach($proyecto_fecha_minima as $p)
                                                                {{ $p->nombre }}
                                        @endforeach</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Mayor fecha real inicio instalacion / Proyecto:</strong></p>        
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="">{{ $fecha_maxima }} / @foreach($proyecto_fecha_maxima as $p)
                                                                {{ $p->nombre }}
                                        @endforeach</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>Seguimiento:</h4><br>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Total clientes instalados:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="">{{ $clientes_ins }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Total clientes instalados y capacitados:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="">{{ $clientes_ins_cap }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Total de clientes capacitados y/o instalados:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="">{{ $total_clientes_ins_cap }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Menor fecha Cliente instalado:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="">{{ $fecha_minima_instalacion_cliente }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Mayor fecha Cliente instalado:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="">{{ $fecha_mayor_instalacion_cliente }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h4>Listado de productos</h4>
                            <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="tabla_informe_total_proyectos">
                                <thead>
                                    <tr>
                                        <th>Inmobiliaria</th>
                                        <th>Proyecto</th>
                                        <th>Fecha inicio<br> instalación</th>
                                        <th>Fecha termino<br> instalación</th>
                                        <th>Cantidad viviendas</th>
                                        <th>Total clientes<br> instalados y capacitados</th>
                                        <th>Cantidad inventario</th>
                                        <th>Producto</th>
                                        <th>Cantidad de productos</th>
                                        <th>Productos restantes<br> por instalar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                	$suma = 0;
                                	$suma_productos = 0;
                                	foreach ($datos_inventario_proyecto as $data){
                                		$suma = $suma + $data['resto_productos_por_instalar'];
                                		$suma_productos = $suma_productos + $data['cantidad_producto'];
                                	}
                                 ?>                        	
                                @foreach($datos_inventario_proyecto as $data)
                                    <tr>
                                        <td>{{ $data['nombre_inmobiliaria'] }}</td>
                                        <td>{{ $data['nombre_proyecto'] }}</td>
                                        <td>{{ $data['fecha_inicio_instalacion'] }}</td>
                                        <td>{{ $data['fecha_termino_instalacion'] }}</td>
                                        <td>{{ $data['cantidad_viviendas'] }}</td>
                                        <td>{{ $data['total_clientes'] }}</td>
                                        <td>{{ $data['count_inventario_proyecto'] }}</td>
                                        <td>{{ $data['nombre_producto'] }}</td>
                                        <td>{{ $data['cantidad_producto'] }}</td>
                                        <td>{{ $data['resto_productos_por_instalar'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <p class="pull-right"><strong>Viviendas por instalar:  </strong>{{ $suma_total_viviendas - $total_clientes_ins_cap }}<span id=""></span></p>     	
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <p class="pull-right"><strong>Total productos por instalar:  </strong><?php echo $suma ?><span id=""></span></p>
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <p class="pull-right"><strong>Cantidad total productos:  </strong><?php echo $suma_productos ?><span id=""></span></p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>
<!-- FIN MODAL INFORME TOTAL PROYECTOS -->

<!-- INICIO MODAL INFORME POR PROYECTOS -->
<div class="modal fade" id="modalInformeProyecto" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg3">
        <div class="modal-content">
            <div class="color-line"></div>
                <div class="modal-header">
                    <h4 class="modal-title" id="titulo_informe"></h4>
                        <small class="font-bold">Resumen de informes por proyectos.</small>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>Por contrato:</h4><br>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Fecha inicio de instalación:</strong></p>    
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="fecha_inicio_instalacion"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Fecha termino de instalación:</strong></p>        
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="fecha_termino_instalacion"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Cantidad de viviendas por contrato:</strong></p>        
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="cantidad_viviendas"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>Seguimiento:</h4><br>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Total instalados y capacitados:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="cantidad_ins_cap"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Fecha real de instalación:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="fecha_real_instalacion"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Fecha real termino de instalación:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="fecha_real_termino"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p><strong>Restantes por instalar:</strong></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p id="cantidad_restantes"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h4>Listado de productos</h4>
                            <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped table-hover" id="datatable_informe_proyectos">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Tiempo de instalación<br> en horas</th>
                                        <th>Tiempo de configuración<br> en horas</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla_informe_proyectos">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <p class="pull-right"><strong>Cantidad de productos: </strong><span id="cantidad_productos"></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <p class="pull-right"><strong>Total: </strong><span id="suma_total"></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>
<!-- INICIO MODAL INFORME POR PROYECTOS -->

</div>

    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            TAMED GLOBAL
        </span>
        2018 Copyright
    </footer>

</div>

<!-- Vendor scripts .-->
<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/metisMenu/dist/metisMenu.min.js') }}"></script>
<script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('vendor/sparkline/index.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- DataTables buttons scripts -->
<script src="{{ asset('vendor/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendor/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<!-- App scripts -->
<script src="{{ asset('scripts/homer.js') }}"></script>

<!-- Api Chart google -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
$(document).ready(function(){
    $(function(){
        $.fn.dataTable.ext.errMode = 'throw';
        $('#tabla_informe_total_proyectos').dataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            //"lengthMenu": [ [ -1,10, 25, 50], ["All",10, 25, 50] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'Informe de proyectos', className: 'btn-sm'},
                {extend: 'pdf', title: 'Informe de proyectos <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
                //{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}.
                //{extend: 'print',className: 'btn-sm'}
            ]
        });
    });

    var table_informe_por_proyecto = $('#datatable_informe_proyectos').dataTable({
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            //"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            "lengthMenu": [ [ -1,10, 25, 50], ["All",10, 25, 50] ],
            buttons: [
                //{extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'Informe de proyectos', className: 'btn-sm'},
                {extend: 'pdf', title: 'Informe de proyectos <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
                //{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}.
                //{extend: 'print',className: 'btn-sm'}
            ]
        });

    // Informe total
    $('#informe_total_proyectos').on('click', function(e){
        e.preventDefault();
        $('#modal_informe_total_proyectos').modal('show');
    });

});
</script>

<script type="text/javascript">
    function ver_detalle_proyecto(id){
        //alert(id);
        $("#datatable_informe_proyectos").dataTable().fnDestroy();

        $('#cantidad_ins_cap').empty();
        $('#titulo_informe').empty();
        $('#fecha_inicio_instalacion').empty();
        $('#fecha_termino_instalacion').empty();
        $('#fecha_real_instalacion').empty();
        $('#fecha_real_termino').empty();
        $('#modalInformeProyecto').modal('show');
        
        $.get('informe_proyecto/'+id, function(data){
            //console.log(data);
            
            var nombre_inmobiliaria = data['datos_inmobiliaria_proyecto'][0].nombre_inmobiliaria;
            var nombre_proyecto = data['datos_inmobiliaria_proyecto'][0].nombre_proyecto;  
            var fecha_inicio_instalacion = data['datos_inmobiliaria_proyecto'][0].fecha_inicio_instalacion;
            var fecha_termino_instalacion = data['datos_inmobiliaria_proyecto'][0].fecha_termino_instalacion;
            var cantidad_viviendas = data['datos_inmobiliaria_proyecto'][0].cantidad;
            var cantidad_ins_cap = data['get_clientes_ins_cap'];
            var fecha_real_instalacion = data['get_fecha_minima_instalacion'];
            var fecha_real_instalacion_ins = data['get_fecha_real_termino_ins'];

            if(cantidad_viviendas === null){
                $('#cantidad_viviendas').empty().append('no definida');
                $('#cantidad_restantes').empty().append('');
            } else {
                var cantidad_restantes = cantidad_viviendas - cantidad_ins_cap;
                $('#cantidad_restantes').empty().append(cantidad_restantes);
                $('#cantidad_viviendas').empty().append(cantidad_viviendas);
            }
 
            $('#cantidad_ins_cap').append(cantidad_ins_cap);
            $('#titulo_informe').append(nombre_inmobiliaria+' - '+nombre_proyecto);

            if(fecha_inicio_instalacion !== null || fecha_termino_instalacion !== null){
                $('#fecha_inicio_instalacion').append(fecha_inicio_instalacion.split("-").reverse().join("-"));
                $('#fecha_termino_instalacion').append(fecha_termino_instalacion.split("-").reverse().join("-"));
            } else {
                $('#fecha_inicio_instalacion').append('no definida');
                $('#fecha_termino_instalacion').append('no definida');
            } 
            
            if(fecha_real_instalacion !== null && fecha_real_instalacion_ins !== null){
                $('#fecha_real_instalacion').append(fecha_real_instalacion.split("-").reverse().join("-"));
                $('#fecha_real_termino').append(fecha_real_instalacion_ins.split("-").reverse().join("-"));
            } else {
                $('#fecha_real_instalacion').append('no definida');
                $('#fecha_real_termino').append('no definida');
            }

            var cantidad_productos = 0;
            var suma_total = 0;

            $('#tabla_informe_proyectos').empty();
            $.each(data['get_inventario'], function(index, value){
                cantidad_productos = value.cantidad + cantidad_productos;
                suma_total = value.total + suma_total;
                $('#tabla_informe_proyectos').append(
                    '<tr>'+
                        '<td>'+value.codigo+'</td>'+
                        '<td>'+value.producto+'</td>'+
                        '<td>'+value.cantidad+'</td>'+
                        '<td>'+value.tiempo_instalacion_hora+'</td>'+
                        '<td>'+value.tiempo_configuracion_hora+'</td>'+
                        '<td>'+value.total+'</td>'+
                    '</tr>'
                );
            });
            $('#cantidad_productos').empty().append(cantidad_productos);
            $('#suma_total').empty().append(Number(suma_total.toFixed(2)));
            /*
            $(function(){
                $.fn.dataTable.ext.errMode = 'throw';
                $('#datatable_informe_proyectos').dataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    //"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                    "lengthMenu": [ [ -1,10, 25, 50], ["All",10, 25, 50] ],
                    buttons: [
                        {extend: 'copy',className: 'btn-sm'},
                        {extend: 'csv',title: 'listadoProductos', className: 'btn-sm'},
                        {extend: 'pdf', title: 'Listado de productos <?php //echo date("d-m-Y"); ?>', className: 'btn-sm'}
                        //{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}.
                        //{extend: 'print',className: 'btn-sm'}
                    ]
                });
            });
            */
            var table_informe_por_proyecto_nueva = $('#datatable_informe_proyectos').dataTable({
                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                //"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                "lengthMenu": [ [ -1,10, 25, 50], ["All",10, 25, 50] ],
                buttons: [
                    //{extend: 'copy',className: 'btn-sm'},
                    {extend: 'csv',title: 'Informe de proyectos', className: 'btn-sm'},
                    {extend: 'pdf', title: 'Informe de proyectos <?php echo date("d-m-Y"); ?>', className: 'btn-sm'}
                    //{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'}.
                    //{extend: 'print',className: 'btn-sm'}
                ]
            });
        });
    }
</script>

<!-- Grafico completo -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Estado de clientes inmobiliarios'],
          ['Sin información', <?php echo $totalSinInformacion; ?> ],
          ['No contactados', <?php echo $totalNoContactados; ?> ],
          ['Contactados',    <?php echo $totalContactados; ?> ],
          ['Agendados', <?php echo $totalAgendados; ?> ],
          ['Instalados',  <?php echo $totalInstalados; ?> ],
          ['Capacitados',  <?php echo ($totalCapacitados <= 2) ? 0 : $totalCapacitados; ?> ],
          ['Con observación',  <?php echo $totalPendientes; ?> ],
          ['Instalados y capacitados',  <?php echo $totalInstaladosCapacitados; ?> ]
        ]);

        var options = {
          title: 'Estado de clientes inmobiliarios',
          is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: {
            position: "top",
            textStyle: {
                fontSize: 15
            }
          }
        };

        var chart = new google.visualization.PieChart(document.getElementById('test_grafico'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart1();
    });
</script>

<!-- Grafico proyecto el bosque real IV | BELTEC -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'BELTEC - Bosque Real IV'],
          ['Sin información', <?php echo $proyecto_bosque_real_sin; ?> ],
          ['No contactados', <?php echo $proyecto_bosque_real_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_bosque_real_con; ?>  ],
          ['Agendados', <?php echo $proyecto_bosque_real_agen; ?> ],
          ['Instalados', <?php echo $proyecto_bosque_real_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_bosque_real_cap; ?> ],
          ['Con observación', <?php echo $proyecto_bosque_real_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_bosque_real_ins_cap; ?> ]
        ]);

        var options = {
          title: 'BELTEC - Bosque Real IV',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('proyecto_varas_gallardo'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart2();
    });
</script>

<!-- Grafico proyecto Condominio el Rincon | BELTEC -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Condominio El Rincón - BELTEC'],
          ['Sin información', <?php echo $proyecto_condominio_elrincon_sin; ?> ],
          ['No contactados', <?php echo $proyecto_condominio_elrincon_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_condominio_elrincon_con; ?>  ],
          ['Agendados', <?php echo $proyecto_condominio_elrincon_agen; ?> ],
          ['Instalados', <?php echo $proyecto_condominio_elrincon_ins; ?> ],
          ['Capacitado', <?php echo $proyecto_condominio_elrincon_cap; ?> ],
          ['Con observación', <?php echo $proyecto_condominio_elrincon_pendiente; ?>],
          ['Instalado y capacitados', <?php echo $proyecto_condominio_elrincon_ins_cap; ?> ]
        ]);

        var options = {
          title: 'BELTEC - Condominio El Rincón',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('proyecto_varas_gallardo2'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart3();
    });
</script>

<!-- Proyecto Varas Gallardo | ICTINOS-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart4);

      function drawChart4() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Varas Gallardo'],
          ['Sin información', <?php echo $proyecto_varas_gallardo_sin; ?> ],
          ['No contactados', <?php echo $proyecto_varas_gallardo_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_varas_gallardo_con; ?>  ],
          ['Agendados', <?php echo $proyecto_varas_gallardo_agen; ?> ],
          ['Instalados', <?php echo $proyecto_varas_gallardo_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_varas_gallardo_cap; ?> ],
          ['Con observación', <?php echo $proyecto_varas_gallardo_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_varas_gallardo_ins_cap; ?>]    
        ]);

        var options = {
          title: 'ICTINOS - Varas Gallardo',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#6f42c1', '#6ac826'],
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('proyecto_varas_gallardo3'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart4();
    });
</script>

<!-- Proyecto parque garcia huerta | HCG -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart5);

      function drawChart5() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Parque García de la Huerta - HCG'],
          ['Sin información', <?php echo $proyecto_parque_garcia_huerta_sin; ?> ],
          ['No contactados', <?php echo $proyecto_parque_garcia_huerta_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_parque_garcia_huerta_con; ?>  ],
          ['Agendados', <?php echo $proyecto_parque_garcia_huerta_agen; ?> ],
          ['Instalados', <?php echo $proyecto_parque_garcia_huerta_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_parque_garcia_huerta_cap; ?> ],
          ['Con observación', <?php echo $proyecto_parque_garcia_huerta_pendiente ?>],
          ['Instalados y capacitados', <?php echo $proyecto_parque_garcia_huerta_ins_cap; ?> ]
        ]);

        var options = {
          title: 'HCG - Parque García de la Huerta',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('parque_garcia_huerta'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart5();
    });
</script>

<!-- Proyecto los alerces y jazmines | HCG -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart6);

      function drawChart6() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Los Alerces y los Jazmines - HCG'],
          ['Sin información', <?php echo $proyecto_los_alerces_sin; ?> ],
          ['No contactados', <?php echo $proyecto_los_alerces_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_los_alerces_con; ?>  ],
          ['Agendados', <?php echo $proyecto_los_alerces_agen; ?> ],
          ['Instalados', <?php echo $proyecto_los_alerces_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_los_alerces_cap; ?> ],
          ['Con observación', <?php echo $proyecto_los_alerces_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_los_alerces_ins_cap ?> ]
        ]);

        var options = {
          title: 'HCG - Los Alerces y los Jazmines',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('los_alerces'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart6();
    });
</script>

<!-- Claros de Rauquén, Curico | MALPO -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart7);

      function drawChart7() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Claros de Rauquén. Curico - MALPO'],
          ['Sin información', <?php echo $proyecto_claros_rauquen_sin; ?> ],
          ['No contactados', <?php echo $proyecto_claros_rauquen_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_claros_rauquen_con; ?>  ],
          ['Agendados', <?php echo $proyecto_claros_rauquen_agen; ?> ],
          ['Instalados', <?php echo $proyecto_claros_rauquen_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_claros_rauquen_cap; ?> ],
          ['Con observación', <?php echo $proyecto_claros_rauquen_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_claros_rauquen_ins_cap; ?> ]
        ]);

        var options = {
          title: 'MALPO - Claros de Rauquén. Curico',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('claros_rauquen'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart7();
    });
</script>

<!-- Cubica Marbella | MASTERPLAN -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart8);

      function drawChart8() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Cubica Marbella - MASTERPLAN'],
          ['Sin información', <?php echo $proyecto_cubica_marbella_sin; ?> ],
          ['No contactados', <?php echo $proyecto_cubica_marbella_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_cubica_marbella_con; ?>  ],
          ['Agendados', <?php echo $proyecto_cubica_marbella_agen; ?> ],
          ['Instalados', <?php echo $proyecto_cubica_marbella_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_cubica_marbella_cap; ?> ],
          ['Con observación', <?php echo $proyecto_cubica_marbella_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_cubica_marbella_ins_cap; ?> ]
        ]);

        var options = {
          title: 'MASTERPLAN - Cubica Marbella',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('cubica_marbella'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart8();
    });
</script>

<!-- Portal el Candíl | PATAGONLAND -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart9);

      function drawChart9() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Portal el Candíl - PATAGONLAND'],
          ['Sin información', <?php echo $proyecto_portal_candil_sin; ?> ],
          ['No contactados', <?php echo $proyecto_portal_candil_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_portal_candil_con; ?>  ],
          ['Agendados', <?php echo $proyecto_portal_candil_agen; ?> ],
          ['Instalados', <?php echo $proyecto_portal_candil_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_portal_candil_cap; ?> ],
          ['Con observación', <?php echo $proyecto_portal_candil_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_portal_candil_ins_cap; ?> ]
        ]);

        var options = {
          title: 'PATAGONLAND - Portal el Candíl',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('portal_candil'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart9();
    });
</script>

<!-- Porta Latadía | PORTA -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart10);

      function drawChart10() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'PORTA - Edificio Porta Latadía'],
          ['Sin información', <?php echo $proyecto_porta_latadia_sin; ?> ],
          ['No contactados', <?php echo $proyecto_porta_latadia_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_porta_latadia_con; ?>  ],
          ['Agendados', <?php echo $proyecto_porta_latadia_agen; ?> ],
          ['Instalados', <?php echo $proyecto_porta_latadia_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_porta_latadia_cap; ?> ],
          ['Con observación', <?php echo $proyecto_porta_latadia_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_porta_latadia_ins_cap; ?> ]
        ]);

        var options = {
          title: 'PORTA - Edificio Porta Latadía',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('porta_latadia'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart10();
    });
</script>

<!-- Back+Office Bussiness Park | REZEPKA -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart70);

      function drawChart70() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'REZEPKA - Back+Office Business Park - Etapa 1'],
          ['Sin información', <?php echo $proyecto_back_office_sin; ?> ],
          ['No contactados', <?php echo $proyecto_back_office_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_back_office_con; ?>  ],
          ['Agendados', <?php echo $proyecto_back_office_agen; ?> ],
          ['Instalados', <?php echo $proyecto_back_office_ins; ?> ],
          ['Instalados', <?php echo $proyecto_back_office_cap; ?> ],
          ['Con observación', <?php echo $proyecto_back_office_pendiente; ?>],
          ['Capacitados', <?php echo  $proyecto_back_office_ins_cap; ?> ]
        ]);

        var options = {
          title: 'REZEPKA - Back+Office Business Park - Etapa 1',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('back_office'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart70();
    });
</script>

<!-- Jardines San Damián Etapa 1 | SECURITY -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart12);

      function drawChart12() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'SECURITY - Jardines San Damián Etapa 1'],
          ['Sin información', <?php echo $proyecto_jardines_sanDamian_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jardines_sanDamian_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jardines_sanDamian_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jardines_sanDamian_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jardines_sanDamian_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jardines_sanDamian_cap; ?> ],
          ['Con observación', <?php echo $proyecto_jardines_sanDamian_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_jardines_sanDamian_ins_cap; ?> ]
        ]);

        var options = {
          title: 'SECURITY - Jardines San Damián Etapa 1',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jardines_san_damian'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart12();
    });
</script>

<!-- Mirador de Pumalal | SGPROYECTA -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart13);

      function drawChart13() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGPROYECTA - Mirador de Pumalal - Primera Etapa'],
          ['Sin información', <?php echo $proyecto_mirador_pumalal_sin; ?> ],
          ['No contactados', <?php echo $proyecto_mirador_pumalal_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_mirador_pumalal_con; ?>  ],
          ['Agendados', <?php echo $proyecto_mirador_pumalal_agen; ?> ],
          ['Instalados', <?php echo $proyecto_mirador_pumalal_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_mirador_pumalal_cap; ?> ],
          ['Con observación', <?php echo $proyecto_mirador_pumalal_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_mirador_pumalal_ins_cap; ?> ]
        ]);

        var options = {
          title: 'SGPROYECTA - Mirador de Pumalal - Primera Etapa',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('mirador_de_pumalal'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart13();
    });
</script>

<!-- Viena | URBES -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart14);

      function drawChart14() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Viena - URBES'],
          ['Sin información', <?php echo $proyecto_urbes_viena_sin; ?> ],
          ['No contactados', <?php echo $proyecto_urbes_viena_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_urbes_viena_con; ?>  ],
          ['Agendados', <?php echo $proyecto_urbes_viena_agen; ?> ],
          ['Instalados', <?php echo $proyecto_urbes_viena_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_urbes_viena_cap; ?> ],
          ['Con observación', <?php echo $proyecto_urbes_viena_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_urbes_viena_ins_cap; ?> ]
        ]);

        var options = {
          title: 'URBES - Viena',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('urbes_viena'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart14();
    });
</script>

<!-- FAI | Alfred Nobel -->
<script type="text/javascript">
    /**
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart15);

      function drawChart15() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'FAI - Alfred Nobel'],
          ['Sin información', <?php //echo $proyecto_alfred_nobel_sin; ?> ],
          ['No contactados', <?php //echo $proyecto_alfred_nobel_noCon; ?> ],
          ['Contactados', <?php //echo $proyecto_alfred_nobel_con; ?>  ],
          ['Agendados', <?php //echo $proyecto_alfred_nobel_agen; ?> ],
          ['Instalados', <?php //echo $proyecto_alfred_nobel_ins; ?> ],
          ['Capacitados', <?php //echo $proyecto_alfred_nobel_cap; ?> ],
          ['Instalados y capacitados', <?php //echo $proyecto_alfred_nobel_ins_cap; ?> ]
        ]);

        var options = {
          title: 'FAI - Alfred Nobel',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#6f42c1', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('alfred_nobel'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart15();
    });
    */
</script>

<!-- MALPO | Alto Rucahue Colonial -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart16);

      function drawChart16() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'MALPO - Alto Rucahue Colonial'],
          ['Sin información', <?php echo $proyecto_altoRucahue_colonial_sin; ?> ],
          ['No contactados', <?php echo $proyecto_altoRucahue_colonial_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_altoRucahue_colonial_con; ?>  ],
          ['Agendados', <?php echo $proyecto_altoRucahue_colonial_agen; ?> ],
          ['Instalados', <?php echo $proyecto_altoRucahue_colonial_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_altoRucahue_colonial_cap; ?> ],
          ['Con observación', <?php echo $proyecto_altoRucahue_colonial_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_altoRucahue_colonial_ins_cap; ?> ]
        ]);

        var options = {
          title: 'MALPO - Alto Rucahue Colonial',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('altoRucahue_colonial'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart16();
    });
</script>

<!-- MALPO | Altos del Maitén. Boldo Melipilla -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart17);

      function drawChart17() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'MALPO - Altos del Maitén. Boldo Melipilla'],
          ['Sin información', <?php echo $proyecto_altosMaiten_melipilla_sin; ?> ],
          ['No contactados', <?php echo $proyecto_altosMaiten_melipilla_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_altosMaiten_melipilla_con; ?>  ],
          ['Agendados', <?php echo $proyecto_altosMaiten_melipilla_agen; ?> ],
          ['Instalados', <?php echo $proyecto_altosMaiten_melipilla_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_altosMaiten_melipilla_cap; ?> ],
          ['Con observación', <?php echo $proyecto_altosMaiten_melipilla_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_altosMaiten_melipilla_ins_cap; ?> ]
        ]);

        var options = {
          title: 'MALPO - Altos del Maitén. Boldo Melipilla',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('altosMaiten_melipilla'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart17();
    });
</script>

<!-- QUEYLEN | Altos del Raco -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart18);

      function drawChart18() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'QUEYLEN - Altos del Raco Etapa 8'],
          ['Sin información', <?php echo $proyecto_altos_raco_sin; ?> ],
          ['No contactados', <?php echo $proyecto_altos_raco_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_altos_raco_con; ?>  ],
          ['Agendados', <?php echo $proyecto_altos_raco_agen; ?> ],
          ['Instalados', <?php echo $proyecto_altos_raco_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_altos_raco_cap; ?> ],
          ['Con observación', <?php echo $proyecto_altos_raco_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_altos_raco_ins_cap; ?> ]
        ]);

        var options = {
          title: 'QUEYLEN - Altos del Raco Etapa 8',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('altos_raco'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart18();
    });
</script>

<!-- IANDES | Andes La Dehesa -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart19);

      function drawChart19() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'IANDES - Andes La Dehesa(3º piso, Torre Norte y Poniente)'],
          ['Sin información', <?php echo $proyecto_andes_laDehesa_sin; ?> ],
          ['No contactados', <?php echo $proyecto_andes_laDehesa_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_andes_laDehesa_con; ?>  ],
          ['Agendados', <?php echo $proyecto_andes_laDehesa_agen; ?> ],
          ['Instalados', <?php echo $proyecto_andes_laDehesa_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_andes_laDehesa_cap; ?> ],
          ['Con observación', <?php echo $proyecto_andes_laDehesa_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_andes_laDehesa_ins_cap; ?> ]
        ]);

        var options = {
          title: 'IANDES - Andes La Dehesa(3º piso, Torre Norte y Poniente)',
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('andes_laDehesa'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart19();
    });
</script>

<!-- ILEBEN | Bloom -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart20);

      function drawChart20() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN - Bloom'],
          ['Sin información', <?php echo $proyecto_bloom_sin; ?> ],
          ['No contactados', <?php echo $proyecto_bloom_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_bloom_con; ?>  ],
          ['Agendados', <?php echo $proyecto_bloom_agen; ?> ],
          ['Instalados', <?php echo $proyecto_bloom_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_bloom_cap; ?> ],
          ['Con observación', <?php echo $proyecto_bloom_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_bloom_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ILEBEN - Bloom',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('bloom'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart20();
    });
</script>

<!-- BEZANILLA | Bordemar -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart21);

      function drawChart21() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'BEZANILLA - Bordemar'],
          ['Sin información', <?php echo $proyecto_bordemar_sin; ?> ],
          ['No contactados', <?php echo $proyecto_bordemar_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_bordemar_con; ?>  ],
          ['Agendados', <?php echo $proyecto_bordemar_agen; ?> ],
          ['Instalados', <?php echo $proyecto_bordemar_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_bordemar_cap; ?> ],
          ['Con observación', <?php echo $proyecto_bordemar_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_bordemar_ins_cap; ?> ]
        ]);

        var options = {
          title: 'BEZANILLA - Bordemar',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('bordemar'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart21();
    });
</script>

<!-- LOGA | Boulevard del Mar -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart22);

      function drawChart22() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'LOGA - Boulevard del Mar'],
          ['Sin información', <?php echo $proyecto_boulevardDelMar_sin; ?> ],
          ['No contactados', <?php echo $proyecto_boulevardDelMar_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_boulevardDelMar_con; ?>  ],
          ['Agendados', <?php echo $proyecto_boulevardDelMar_agen; ?> ],
          ['Instalados', <?php echo $proyecto_boulevardDelMar_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_boulevardDelMar_cap; ?> ],
          ['Con observación', <?php echo $proyecto_boulevardDelMar_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_boulevardDelMar_ins_cap; ?> ]
        ]);

        var options = {
          title: 'LOGA - Boulevard del Mar',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('boulevardDelMar'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart22();
    });
</script>

<!-- FAI | Buena Vista -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart23);

      function drawChart23() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'FAI - Buena Vista'],
          ['Sin información', <?php echo $proyecto_buenaVista_sin; ?> ],
          ['No contactados', <?php echo $proyecto_buenaVista_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_buenaVista_con; ?>  ],
          ['Agendados', <?php echo $proyecto_buenaVista_agen; ?> ],
          ['Instalados', <?php echo $proyecto_buenaVista_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_buenaVista_cap; ?> ],
          ['Con observación', <?php echo $proyecto_buenaVista_pendiente; ?> ], 
          ['Instalados y capacitados', <?php echo $proyecto_buenaVista_ins_cap; ?> ]
        ]);

        var options = {
          title: 'FAI - Buena Vista',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('buenaVista'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart23();
    });
</script>

<!-- SAN ISIDRO | Edificio Italia -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart24);

      function drawChart24() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'SAN ISIDRO - EDIFICIO ITALIA'],
          ['Sin información', <?php echo $proyecto_edItalia_sin; ?> ],
          ['No contactados', <?php echo $proyecto_edItalia_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_edItalia_con; ?>  ],
          ['Agendados', <?php echo $proyecto_edItalia_agen; ?> ],
          ['Instalados', <?php echo $proyecto_edItalia_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_edItalia_cap; ?> ],
          ['Con observación', <?php echo $proyecto_edItalia_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_edItalia_ins_cap; ?> ]
        ]);

        var options = {
          title: 'SAN ISIDRO - EDIFICIO ITALIA',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('edificioItalia'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart24();
    });
</script>

<!-- ICTINOS | Condominio Plaza El Roble -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart25);

      function drawChart25() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ICTINOS - Condominio Plaza El Roble'],
          ['Sin información', <?php echo $proyecto_plazaElRoble_sin; ?> ],
          ['No contactados', <?php echo $proyecto_plazaElRoble_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_plazaElRoble_con; ?>  ],
          ['Agendados', <?php echo $proyecto_plazaElRoble_agen; ?> ],
          ['Instalados', <?php echo $proyecto_plazaElRoble_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_plazaElRoble_cap; ?> ],
          ['Con observación', <?php echo $proyecto_plazaElRoble_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_plazaElRoble_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ICTINOS - Condominio Plaza El Roble',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('condominioPlazaElRoble'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart25();
    });
</script>

<!-- ILEBEN | Choice -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart26);

      function drawChart26() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN - Choice'],
          ['Sin información', <?php echo $proyecto_choice_sin; ?> ],
          ['No contactados', <?php echo $proyecto_choice_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_choice_con; ?>  ],
          ['Agendados', <?php echo $proyecto_choice_agen; ?> ],
          ['Instalados', <?php echo $proyecto_choice_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_choice_cap; ?> ],
          ['Con observación', <?php echo $proyecto_choice_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_choice_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ILEBEN - Choice',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('choice'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart26();
    });
</script>

<!-- Jazz life etapa 1 | ILEBEN -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart27);

      function drawChart27() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN | Jazz Life Etapa 1'],
          ['Sin información', <?php echo $proyecto_jazzLifeEtapa1_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jazzLifeEtapa1_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jazzLifeEtapa1_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jazzLifeEtapa1_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jazzLifeEtapa1_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jazzLifeEtapa1_cap; ?> ],
          ['Con observación', <?php echo $proyecto_jazzLifeEtapa1_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_jazzLifeEtapa1_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ILEBEN - Jazz Life Etapa 1',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jazzLifeEtapa1'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart27();
    });
</script>

<!-- Open concept | ILEBEN -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart28);

      function drawChart28() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN | Open Concept'],
          ['Sin información', <?php echo $proyecto_openConcept_sin; ?> ],
          ['No contactados', <?php echo $proyecto_openConcept_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_openConcept_con; ?>  ],
          ['Agendados', <?php echo $proyecto_openConcept_agen; ?> ],
          ['Instalados', <?php echo $proyecto_openConcept_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_openConcept_cap; ?> ],
          ['Con observación', <?php echo $proyecto_openConcept_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $proyecto_openConcept_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ILEBEN - Open Concept',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('openConcept'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart28();
    });
</script>

<!-- ILEBEN | Parque La Huasa -->

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart29);

      function drawChart29() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN | Parque La Huasa'],
          ['Sin información', <?php echo $proyecto_parqueLaHuasa_sin; ?> ],
          ['No contactados', <?php echo $proyecto_parqueLaHuasa_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_parqueLaHuasa_con; ?>  ],
          ['Agendados', <?php echo $proyecto_parqueLaHuasa_agen; ?> ],
          ['Instalados', <?php echo $proyecto_parqueLaHuasa_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_parqueLaHuasa_cap; ?> ],
          ['Con observación', <?php echo $proyecto_parqueLaHuasa_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_parqueLaHuasa_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ILEBEN - Parque La Huasa',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('parqueLaHuasa'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart29();
    });
</script>


<!-- ILEBEN | Reflex -->

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart30);

      function drawChart30() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN | Relfex'],
          ['Sin información', <?php echo $proyecto_reflex_sin; ?> ],
          ['No contactados', <?php echo $proyecto_reflex_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_reflex_con; ?>  ],
          ['Agendados', <?php echo $proyecto_reflex_agen; ?> ],
          ['Instalados', <?php echo $proyecto_reflex_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_reflex_cap; ?> ],
          ['Con observación', <?php echo $proyecto_reflex_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_reflex_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ILEBEN - Reflex',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('reflex'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart30();
    });
</script>

<!-- lasPircas -->
<!-- MASTERPLAN | Las Pircas -->

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart31);

      function drawChart31() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'MASTERPLAN | Townhouse Las Pircas'],
          ['Sin información', <?php echo $proyecto_lasPircas_sin; ?> ],
          ['No contactados', <?php echo $proyecto_lasPircas_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_lasPircas_con; ?>  ],
          ['Agendados', <?php echo $proyecto_lasPircas_agen; ?> ],
          ['Instalados', <?php echo $proyecto_lasPircas_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_lasPircas_cap; ?> ],
          ['Con observación', <?php echo $proyecto_lasPircas_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_lasPircas_ins_cap; ?> ]
        ]);

        var options = {
          title: 'MASTERPLAN - Townhouse Las Pircas',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('lasPircas'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart31();
    });
</script>

<!-- back_office_etapa_2 -->
<!-- REZEPKA | BACK OFFICE ETAPA 2 -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart32);

      function drawChart32() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'REZEPKA - Back+Office Business Park - Etapa 2'],
          ['Sin información', <?php echo $proyecto_back_office_etapa_2_sin; ?> ],
          ['No contactados', <?php echo $proyecto_back_office_etapa_2_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_back_office_etapa_2_con; ?>  ],
          ['Agendados', <?php echo $proyecto_back_office_etapa_2_agen; ?> ],
          ['Instalados', <?php echo $proyecto_back_office_etapa_2_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_back_office_etapa_2_cap; ?> ],
          ['Con observación', <?php echo $proyecto_back_office_etapa_2_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_back_office_etapa_2_ins_cap; ?> ]
        ]);

        var options = {
          title: 'REZEPKA - Back+Office Business Park - Etapa 2',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('back_office_etapa_2'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart32();
    });
</script>


<!-- SECURITY | Laderas del valle etapa uno -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart33);

      function drawChart33() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'SECURITY - Laderas del Valle Etapa 1'],
          ['Sin información', <?php echo $proyecto_laderas_del_valle_1_sin; ?> ],
          ['No contactados', <?php echo $proyecto_laderas_del_valle_1_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_laderas_del_valle_1_con; ?>  ],
          ['Agendados', <?php echo $proyecto_laderas_del_valle_1_agen; ?> ],
          ['Instalados', <?php echo $proyecto_laderas_del_valle_1_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_laderas_del_valle_1_cap; ?> ],
          ['Con observación', <?php echo $proyecto_laderas_del_valle_1_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_laderas_del_valle_1_ins_cap; ?> ]
        ]);

        var options = {
          title: 'SECURITY - Laderas del Valle Etapa 1',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('laderas_del_valle_1'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart33();
    });
</script>

<!-- ACTUAL | Palermo -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart34);

      function drawChart34() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ACTUAL | Palermo'],
          ['Sin información', <?php echo $proyecto_palermo_sin; ?> ],
          ['No contactados', <?php echo $proyecto_palermo_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_palermo_con; ?>  ],
          ['Agendados', <?php echo $proyecto_palermo_agen; ?> ],
          ['Instalados', <?php echo $proyecto_palermo_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_palermo_cap; ?> ],
          ['Con observación', <?php echo $proyecto_palermo_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_palermo_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ACTUAL | Palermo',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('palermo'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart34();
    });
</script>

<!-- ACTUAL | Seminario -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart35);

      function drawChart35() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ACTUAL | Seminario'],
          ['Sin información', <?php echo $proyecto_seminario_sin; ?> ],
          ['No contactados', <?php echo $proyecto_seminario_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_seminario_con; ?>  ],
          ['Agendados', <?php echo $proyecto_seminario_agen; ?> ],
          ['Instalados', <?php echo $proyecto_seminario_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_seminario_cap; ?> ],
          ['Con observación', <?php echo $proyecto_seminario_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_seminario_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ACTUAL | Seminario',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('seminario'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart35();
    });
</script>

<!-- ARDAC | Maderos de abedules -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart36);

      function drawChart36() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ARDAC | Maderos de abedules'],
          ['Sin información', <?php echo $proyecto_maderos_de_abedules_sin; ?> ],
          ['No contactados', <?php echo $proyecto_maderos_de_abedules_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_maderos_de_abedules_con; ?>  ],
          ['Agendados', <?php echo $proyecto_maderos_de_abedules_agen; ?> ],
          ['Instalados', <?php echo $proyecto_maderos_de_abedules_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_maderos_de_abedules_cap; ?> ],
          ['Con observación', <?php echo $proyecto_maderos_de_abedules_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_maderos_de_abedules_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ARDAC | Maderos de abedules',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('maderos_de_abedules'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart36();
    });
</script>

<!-- BUROTTO | Mitte Vitacura -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart37);

      function drawChart37() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'BUROTTO | Mitte Vitacura'],
          ['Sin información', <?php echo $proyecto_mitte_vitacura_sin; ?> ],
          ['No contactados', <?php echo $proyecto_mitte_vitacura_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_mitte_vitacura_con; ?>  ],
          ['Agendados', <?php echo $proyecto_mitte_vitacura_agen; ?> ],
          ['Instalados', <?php echo $proyecto_mitte_vitacura_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_mitte_vitacura_cap; ?> ],
          ['Con observación', <?php echo $proyecto_mitte_vitacura_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_mitte_vitacura_ins_cap; ?> ]
        ]);

        var options = {
          title: 'BUROTTO | Mitte Vitacura',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('mitte_vitacura'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart37();
    });
</script>

<!-- CISS | Concepto andalhue -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart38);

      function drawChart38() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'CISS | Concepto andalhué'],
          ['Sin información', <?php echo $proyecto_andalhue_sin; ?> ],
          ['No contactados', <?php echo $proyecto_andalhue_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_andalhue_con; ?>  ],
          ['Agendados', <?php echo $proyecto_andalhue_agen; ?> ],
          ['Instalados', <?php echo $proyecto_andalhue_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_andalhue_cap; ?> ],
          ['Con observación', <?php echo $proyecto_andalhue_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_andalhue_ins_cap; ?> ]
        ]);

        var options = {
          title: 'CISS | Concepto andalhué',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('andalhue'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart38();
    });
</script>

<!-- INMOBILIARIA GUZMAN | Edificio Balanche 2698 -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart39);

      function drawChart39() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'INMOBILIARIA GUZMAN | Edificio Balanche 2698'],
          ['Sin información', <?php echo $proyecto_balanche_sin; ?> ],
          ['No contactados', <?php echo $proyecto_balanche_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_balanche_con; ?>  ],
          ['Agendados', <?php echo $proyecto_balanche_agen; ?> ],
          ['Instalados', <?php echo $proyecto_balanche_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_balanche_cap; ?> ],
          ['Con observación', <?php echo $proyecto_balanche_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_balanche_ins_cap; ?> ]
        ]);

        var options = {
          title: 'INMOBILIARIA GUZMAN | Edificio Balanche 2698',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('balanche'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart39();
    });
</script>

<!-- IPL | Patagonia plaza y SPA -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart40);

      function drawChart40() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'IPL | Patagonia plaza y SPA'],
          ['Sin información', <?php echo $proyecto_patagoniaPS_sin; ?> ],
          ['No contactados', <?php echo $proyecto_patagoniaPS_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_patagoniaPS_con; ?>  ],
          ['Agendados', <?php echo $proyecto_patagoniaPS_agen; ?> ],
          ['Instalados', <?php echo $proyecto_patagoniaPS_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_patagoniaPS_cap; ?> ],
          ['Con observación', <?php echo $proyecto_patagoniaPS_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_patagoniaPS_ins_cap; ?> ]
        ]);

        var options = {
          title: 'IPL | Patagonia plaza y SPA',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('patagoniaPS'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart40();
    });
</script>

<!-- PENTA | Jardin Costanera A -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart41);

      function drawChart41() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'PENTA - Jardin Costanera A'],
          ['Sin información', <?php echo $proyecto_jardinA_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jardinA_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jardinA_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jardinA_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jardinA_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jardinA_cap; ?> ],
          ['Con observación', <?php echo $proyecto_jardinA_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_jardinA_ins_cap; ?> ]
        ]);

        var options = {
          title: 'PENTA - Jardin Costanera A',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jardinA'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart41();
    });
</script>

<!-- PENTA | Jardin Costanera B -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart42);

      function drawChart42() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'PENTA - Jardin Costanera B'],
          ['Sin información', <?php echo $proyecto_jardinB_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jardinB_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jardinB_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jardinB_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jardinB_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jardinB_cap; ?> ],
          ['Con observación', <?php echo $proyecto_jardinB_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_jardinB_ins_cap; ?> ]
        ]);

        var options = {
          title: 'PENTA - Jardin Costanera B',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jardinB'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart42();
    });
</script>

<!-- IPL | Patagonia plaza y SPA -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart43);

      function drawChart43() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'IPL | Patagonia plaza y SPA'],
          ['Sin información', <?php echo $proyecto_patagoniaPS_sin; ?> ],
          ['No contactados', <?php echo $proyecto_patagoniaPS_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_patagoniaPS_con; ?>  ],
          ['Agendados', <?php echo $proyecto_patagoniaPS_agen; ?> ],
          ['Instalados', <?php echo $proyecto_patagoniaPS_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_patagoniaPS_cap; ?> ],
          ['Con observación', <?php echo $proyecto_patagoniaPS_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_patagoniaPS_ins_cap; ?> ]
        ]);

        var options = {
          title: 'IPL | Patagonia plaza y SPA',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('patagoniaPS'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart43();
    });
</script>

<!-- PIQUEN | Chicureo Townhouse -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart44);

      function drawChart44() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'PIUQUEN - Chicureo Townhouse'],
          ['Sin información', <?php echo $proyecto_townhouse_sin; ?> ],
          ['No contactados', <?php echo $proyecto_townhouse_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_townhouse_con; ?>  ],
          ['Agendados', <?php echo $proyecto_townhouse_agen; ?> ],
          ['Instalados', <?php echo $proyecto_townhouse_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_townhouse_cap; ?> ],
          ['Con observación', <?php echo $proyecto_townhouse_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_townhouse_ins_cap; ?> ]
        ]);

        var options = {
          title: 'PIUQUEN - Chicureo Townhouse',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('townhouse'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart44();
    });
</script>

<!-- PLAN | Condominio reina las perdices -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart45);

      function drawChart45() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'PLAN - Condominio reina las perdices'],
          ['Sin información', <?php echo $proyecto_lasPerdices_sin; ?> ],
          ['No contactados', <?php echo $proyecto_lasPerdices_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_lasPerdices_con; ?>  ],
          ['Agendados', <?php echo $proyecto_lasPerdices_agen; ?> ],
          ['Instalados', <?php echo $proyecto_lasPerdices_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_lasPerdices_cap; ?> ],
          ['Con observación', <?php echo $proyecto_lasPerdices_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_lasPerdices_ins_cap; ?> ]
        ]);

        var options = {
          title: 'PLAN - Condominio reina las perdices',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('lasPerdices'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart45();
    });
</script>

<!-- REINA LAS PERDICES | Condominio reina las perdices -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart46);

      function drawChart46() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'REINA LAS PERDICES - Condominio reina las perdices'],
          ['Sin información', <?php echo $proyecto_condLasPerdices_sin; ?> ],
          ['No contactados', <?php echo $proyecto_condLasPerdices_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_condLasPerdices_con; ?>  ],
          ['Agendados', <?php echo $proyecto_condLasPerdices_agen; ?> ],
          ['Instalados', <?php echo $proyecto_condLasPerdices_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_condLasPerdices_cap; ?> ],
          ['Con observación', <?php echo $proyecto_condLasPerdices_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_condLasPerdices_ins_cap; ?> ]
        ]);

        var options = {
          title: 'REINA LAS PERDICES - Condominio reina las perdices',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('condLasPerdices'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart46();
    });
</script>

<!-- TOWNHOUSE | Los acacios -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart47);

      function drawChart47() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'TOWNHOUSE - Los acacios'],
          ['Sin información', <?php echo $proyecto_losAcacios_sin; ?> ],
          ['No contactados', <?php echo $proyecto_losAcacios_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_losAcacios_con; ?>  ],
          ['Agendados', <?php echo $proyecto_losAcacios_agen; ?> ],
          ['Instalados', <?php echo $proyecto_losAcacios_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_losAcacios_cap; ?> ],
          ['Con observación', <?php echo $proyecto_losAcacios_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_losAcacios_ins_cap; ?> ]
        ]);

        var options = {
          title: 'TOWNHOUSE - Los acacios',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('losAcacios'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart47();
    });
</script>

<!-- TOWNHOUSE | Quillay -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart48);

      function drawChart48() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'TOWNHOUSE - Quillay'],
          ['Sin información', <?php echo $proyecto_quillay_sin; ?> ],
          ['No contactados', <?php echo $proyecto_quillay_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_quillay_con; ?>  ],
          ['Agendados', <?php echo $proyecto_quillay_agen; ?> ],
          ['Instalados', <?php echo $proyecto_quillay_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_quillay_cap; ?> ],
          ['Con observación', <?php echo $proyecto_quillay_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_quillay_ins_cap; ?> ]
        ]);

        var options = {
          title: 'TOWNHOUSE - Quillay',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('quillay'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart48();
    });
</script>

<!-- VIVIENDAS 2000 | El tirol -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart49);

      function drawChart49() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'VIVIENDAS 2000 - El tirol'],
          ['Sin información', <?php echo $proyecto_elTirol_sin; ?> ],
          ['No contactados', <?php echo $proyecto_elTirol_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_elTirol_con; ?>  ],
          ['Agendados', <?php echo $proyecto_elTirol_agen; ?> ],
          ['Instalados', <?php echo $proyecto_elTirol_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_elTirol_cap; ?> ],
          ['Con observación',<?php echo $proyecto_elTirol_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_elTirol_ins_cap; ?> ]
        ]);

        var options = {
          title: 'VIVIENDAS 2000 - El tirol',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('elTirol'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart49();
    });
</script>

<!-- VIVIENDAS 2000 | IANDES -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart50);

      function drawChart50() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Andes La Dehesa(>3º piso, TorreSur) | IANDES'],
          ['Sin información', <?php echo $proyecto_andesTorreSur_sin; ?> ],
          ['No contactados', <?php echo $proyecto_andesTorreSur_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_andesTorreSur_con; ?>  ],
          ['Agendados', <?php echo $proyecto_andesTorreSur_agen; ?> ],
          ['Instalados', <?php echo $proyecto_andesTorreSur_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_andesTorreSur_cap; ?> ],
          ['Con observación',<?php echo $proyecto_andesTorreSur_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_andesTorreSur_ins_cap; ?> ]
        ]);

        var options = {
          title: 'IANDES - Andes La Dehesa(>3º piso, TorreSur)',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('andesTorreSur'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart50();
    });
</script>

<!-- IANDES | Andes La Dehesa(A y B piso 2, Torre Norte y Poniente) -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart51);

      function drawChart51() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Andes La Dehesa(A y B piso 2, Torre Norte y Poniente)'],
          ['Sin información', <?php echo $proyecto_andesAB2NortePoniente_sin; ?> ],
          ['No contactados', <?php echo $proyecto_andesAB2NortePoniente_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_andesAB2NortePoniente_con; ?>  ],
          ['Agendados', <?php echo $proyecto_andesAB2NortePoniente_agen; ?> ],
          ['Instalados', <?php echo $proyecto_andesAB2NortePoniente_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_andesAB2NortePoniente_cap; ?> ],
          ['Con observación',<?php echo $proyecto_andesAB2NortePoniente_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_andesAB2NortePoniente_ins_cap; ?> ]
        ]);

        var options = {
          title: 'IANDES - Andes La Dehesa(A y B piso 2, Torre Norte y Poniente)',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('andesAB2NortePoniente'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart51();
    });
</script>

<!-- IANDES | Andes LA Dehesa (A y B piso 2, Torre Sur) -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart52);

      function drawChart52() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'IANDES | Andes LA Dehesa (A y B piso 2, Torre Sur)'],
          ['Sin información', <?php echo $proyecto_andesAB2TorreSur_sin; ?> ],
          ['No contactados', <?php echo $proyecto_andesAB2TorreSur_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_andesAB2TorreSur_con; ?>  ],
          ['Agendados', <?php echo $proyecto_andesAB2TorreSur_agen; ?> ],
          ['Instalados', <?php echo $proyecto_andesAB2TorreSur_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_andesAB2TorreSur_cap; ?> ],
          ['Con observación',<?php echo $proyecto_andesAB2TorreSur_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_andesAB2TorreSur_ins_cap; ?> ]
        ]);

        var options = {
          title: 'IANDES - Andes LA Dehesa (A y B piso 2, Torre Sur)',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('andesAB2TorreSur'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart52();
    });
</script>

<!-- IANDES | Andes La Dehesa (C y D piso 2, Torre Norte y Poniente) -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart53);

      function drawChart53() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'IANDES - Andes La Dehesa (C y D piso 2, Torre Norte y Poniente) '],
          ['Sin información', <?php echo $proyecto_andesCD2TorreNorPon_sin; ?> ],
          ['No contactados', <?php echo $proyecto_andesCD2TorreNorPon_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_andesCD2TorreNorPon_con; ?>  ],
          ['Agendados', <?php echo $proyecto_andesCD2TorreNorPon_agen; ?> ],
          ['Instalados', <?php echo $proyecto_andesCD2TorreNorPon_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_andesCD2TorreNorPon_cap; ?> ],
          ['Con observación',<?php echo $proyecto_andesCD2TorreNorPon_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_andesCD2TorreNorPon_ins_cap; ?> ]
        ]);

        var options = {
          title: 'IANDES - Andes La Dehesa (C y D piso 2, Torre Norte y Poniente) ',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('andesCD2TorreNorPon'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart53();
    });
</script>

<!-- IANDES | Andes La Dehesa (C y D piso 2, Torre Sur) -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart54);

      function drawChart54() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'IANDES - Andes La Dehesa (C y D piso 2, Torre Sur) '],
          ['Sin información', <?php echo $proyecto_andesCD2TorreSur_sin; ?> ],
          ['No contactados', <?php echo $proyecto_andesCD2TorreSur_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_andesCD2TorreSur_con; ?>  ],
          ['Agendados', <?php echo $proyecto_andesCD2TorreSur_agen; ?> ],
          ['Instalados', <?php echo $proyecto_andesCD2TorreSur_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_andesCD2TorreSur_cap; ?> ],
          ['Con observación',<?php echo $proyecto_andesCD2TorreSur_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_andesCD2TorreSur_ins_cap; ?> ]
        ]);

        var options = {
          title: 'IANDES - Andes La Dehesa (C y D piso 2, Torre Sur) ',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('andesCD2TorreSur'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart54();
    });
</script>

<!-- IANDES | Andes La Dehesa (E piso 2, Torre Norte y Poniente) -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart55);

      function drawChart55() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'IANDES - Andes La Dehesa (E piso 2, Torre Norte y Poniente) '],
          ['Sin información', <?php echo $proyecto_andesE2NorPon_sin; ?> ],
          ['No contactados', <?php echo $proyecto_andesE2NorPon_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_andesE2NorPon_con; ?>  ],
          ['Agendados', <?php echo $proyecto_andesE2NorPon_agen; ?> ],
          ['Instalados', <?php echo $proyecto_andesE2NorPon_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_andesE2NorPon_cap; ?> ],
          ['Con observación',<?php echo $proyecto_andesE2NorPon_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_andesE2NorPon_ins_cap; ?> ]
        ]);

        var options = {
          title: 'IANDES - Andes La Dehesa (E piso 2, Torre Norte y Poniente) ',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('andesE2NorPon'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart55();
    });
</script>

<!-- ILEBEN | Jazz Life Etapa 2 -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart56);

      function drawChart56() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'IANDES - Jazz Life Etapa 2'],
          ['Sin información', <?php echo $proyecto_jazzLifeEtapa2_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jazzLifeEtapa2_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jazzLifeEtapa2_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jazzLifeEtapa2_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jazzLifeEtapa2_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jazzLifeEtapa2_cap; ?> ],
          ['Con observación',<?php echo $proyecto_jazzLifeEtapa2_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_jazzLifeEtapa2_ins_cap; ?> ]
        ]);

        var options = {
          title: 'IANDES - Jazz Life Etapa 2',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jazzLifeEtapa2'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart56();
    });
</script>

<!-- ILEBEN | Jazz Life Etapa 3 -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart68);

      function drawChart68() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'IANDES - Jazz Life Etapa 3'],
          ['Sin información', <?php echo $proyecto_jazzLifeEtapa3_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jazzLifeEtapa3_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jazzLifeEtapa3_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jazzLifeEtapa3_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jazzLifeEtapa3_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jazzLifeEtapa3_cap; ?> ],
          ['Con observación',<?php echo $proyecto_jazzLifeEtapa3_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_jazzLifeEtapa3_ins_cap; ?> ]
        ]);

        var options = {
          title: 'IANDES - Jazz Life Etapa 3',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jazzLifeEtapa3'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart68();
    });
</script>

<!-- INDESA | Viñas de Chicureo Country -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart57);

      function drawChart57() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'INDESA - Viñas de Chicureo Country'],
          ['Sin información', <?php echo $proyecto_vinaChicureoCountry_sin; ?> ],
          ['No contactados', <?php echo $proyecto_vinaChicureoCountry_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_vinaChicureoCountry_con; ?>  ],
          ['Agendados', <?php echo $proyecto_vinaChicureoCountry_agen; ?> ],
          ['Instalados', <?php echo $proyecto_vinaChicureoCountry_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_vinaChicureoCountry_cap; ?> ],
          ['Con observación',<?php echo $proyecto_vinaChicureoCountry_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_vinaChicureoCountry_ins_cap; ?> ]
        ]);

        var options = {
          title: 'INDESA - Viñas de Chicureo Country',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('vinaChicureoCountry'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart57();
    });
</script>

<!-- ISA | Isa Pinzón -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart58);

      function drawChart58() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ISA - Isa Pinzón'],
          ['Sin información', <?php echo $proyecto_isaPinzon_sin; ?> ],
          ['No contactados', <?php echo $proyecto_isaPinzon_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_isaPinzon_con; ?>  ],
          ['Agendados', <?php echo $proyecto_isaPinzon_agen; ?> ],
          ['Instalados', <?php echo $proyecto_isaPinzon_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_isaPinzon_cap; ?> ],
          ['Con observación',<?php echo $proyecto_isaPinzon_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_isaPinzon_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ISA - Isa Pinzón',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('isaPinzon'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart58();
    });
</script>

<!-- MALPO | Altos del Maitén, Laurel Melipilla -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart59);

      function drawChart59() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'MALPO - Altos del Maitén, Laurel Melipilla'],
          ['Sin información', <?php echo $proyecto_laurelMelipilla_sin; ?> ],
          ['No contactados', <?php echo $proyecto_laurelMelipilla_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_laurelMelipilla_con; ?>  ],
          ['Agendados', <?php echo $proyecto_laurelMelipilla_agen; ?> ],
          ['Instalados', <?php echo $proyecto_laurelMelipilla_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_laurelMelipilla_cap; ?> ],
          ['Con observación',<?php echo $proyecto_laurelMelipilla_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_laurelMelipilla_ins_cap; ?> ]
        ]);

        var options = {
          title: 'MALPO - Altos del Maitén, Laurel Melipilla',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('laurelMelipilla'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart59();
    });
</script>

<!-- MASTERPLAN | Cubica Marbella -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart60);

      function drawChart60() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'MASTERPLAN - Cubica Marbella'],
          ['Sin información', <?php echo $proyecto_cubicaMontemar_sin; ?> ],
          ['No contactados', <?php echo $proyecto_cubicaMontemar_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_cubicaMontemar_con; ?>  ],
          ['Agendados', <?php echo $proyecto_cubicaMontemar_agen; ?> ],
          ['Instalados', <?php echo $proyecto_cubicaMontemar_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_cubicaMontemar_cap; ?> ],
          ['Con observación',<?php echo $proyecto_cubicaMontemar_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_cubicaMontemar_ins_cap; ?> ]
        ]);

        var options = {
          title: 'MASTERPLAN - Cubica Marbella',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('cubicaMontemar'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart60();
    });
</script>

<!-- QUEYLEN | Altos del Raco Etapa 9 -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart61);

      function drawChart61() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'QUEYLEN - Altos del Raco Etapa 9'],
          ['Sin información', <?php echo $proyecto_altosRacoEtapa9_sin; ?> ],
          ['No contactados', <?php echo $proyecto_altosRacoEtapa9_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_altosRacoEtapa9_con; ?>  ],
          ['Agendados', <?php echo $proyecto_altosRacoEtapa9_agen; ?> ],
          ['Instalados', <?php echo $proyecto_altosRacoEtapa9_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_altosRacoEtapa9_cap; ?> ],
          ['Con observación',<?php echo $proyecto_altosRacoEtapa9_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_altosRacoEtapa9_ins_cap; ?> ]
        ]);

        var options = {
          title: 'QUEYLEN - Altos del Raco Etapa 9',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('altosRacoEtapa9'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart61();
    });
</script>

<!-- SECURITY | Jardines San Damián Etapa 2 -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart62);

      function drawChart62() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'SECURITY - Jardines San Damián Etapa 2'],
          ['Sin información', <?php echo $proyecto_sanDamianEtapa2_sin; ?> ],
          ['No contactados', <?php echo $proyecto_sanDamianEtapa2_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_sanDamianEtapa2_con; ?>  ],
          ['Agendados', <?php echo $proyecto_sanDamianEtapa2_agen; ?> ],
          ['Instalados', <?php echo $proyecto_sanDamianEtapa2_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_sanDamianEtapa2_cap; ?> ],
          ['Con observación',<?php echo $proyecto_sanDamianEtapa2_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_sanDamianEtapa2_ins_cap; ?> ]
        ]);

        var options = {
          title: 'SECURITY - Jardines San Damián Etapa 2',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('sanDamianEtapa2'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart62();
    });
</script>

<!-- SINERGIA | JARDINES DE ANTONIO VARAS -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart63);

      function drawChart63() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'SINERGIA - JARDINES DE ANTONIO VARAS H'],
          ['Sin información', <?php echo $proyecto_jardinesAntonioVaras_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jardinesAntonioVaras_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jardinesAntonioVaras_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jardinesAntonioVaras_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jardinesAntonioVaras_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jardinesAntonioVaras_cap; ?> ],
          ['Con observación',<?php echo $proyecto_jardinesAntonioVaras_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_jardinesAntonioVaras_ins_cap; ?> ]
        ]);

        var options = {
          title: 'SINERGIA - JARDINES DE ANTONIO VARAS H',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jardinesAntonioVaras'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart63();
    });
</script>

<!-- SINERGIA | JARDINES DE ANTONIO VARAS C -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart71);

      function drawChart71() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'SINERGIA - JARDINES DE ANTONIO VARAS C'],
          ['Sin información', <?php echo $proyecto_jardinesAntonioVarasC_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jardinesAntonioVarasC_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jardinesAntonioVarasC_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jardinesAntonioVarasC_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jardinesAntonioVarasC_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jardinesAntonioVarasC_cap; ?> ],
          ['Con observación',<?php echo $proyecto_jardinesAntonioVarasC_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_jardinesAntonioVarasC_ins_cap; ?> ]
        ]);

        var options = {
          title: 'SINERGIA - JARDINES DE ANTONIO VARAS C',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jardinesAntonioVarasC'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart71();
    });
</script>

<!-- SINERGIA | JARDINES DE ANTONIO VARAS D -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart72);

      function drawChart72() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'SINERGIA - JARDINES DE ANTONIO VARAS D'],
          ['Sin información', <?php echo $proyecto_jardinesAntonioVarasD_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jardinesAntonioVarasD_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jardinesAntonioVarasD_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jardinesAntonioVarasD_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jardinesAntonioVarasD_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jardinesAntonioVarasD_cap; ?> ],
          ['Con observación',<?php echo $proyecto_jardinesAntonioVarasD_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_jardinesAntonioVarasD_ins_cap; ?> ]
        ]);

        var options = {
          title: 'SINERGIA - JARDINES DE ANTONIO VARAS D',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jardinesAntonioVarasD'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart72();
    });
</script>

<!-- SINERGIA | JARDINES DE ANTONIO VARAS A/B -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart73);

      function drawChart73() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'SINERGIA - JARDINES DE ANTONIO VARAS A/B'],
          ['Sin información', <?php echo $proyecto_jardinesAntonioVarasAB_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jardinesAntonioVarasAB_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jardinesAntonioVarasAB_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jardinesAntonioVarasAB_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jardinesAntonioVarasAB_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jardinesAntonioVarasAB_cap; ?> ],
          ['Con observación',<?php echo $proyecto_jardinesAntonioVarasAB_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_jardinesAntonioVarasAB_ins_cap; ?> ]
        ]);

        var options = {
          title: 'SINERGIA - JARDINES DE ANTONIO VARAS A/B',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jardinesAntonioVarasAB'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart73();
    });
</script>

<!-- SINERGIA | JARDINES DE ANTONIO VARAS G -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart74);

      function drawChart74() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'SINERGIA - JARDINES DE ANTONIO VARAS G'],
          ['Sin información', <?php echo $proyecto_jardinesAntonioVarasG_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jardinesAntonioVarasG_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jardinesAntonioVarasG_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jardinesAntonioVarasG_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jardinesAntonioVarasG_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jardinesAntonioVarasG_cap; ?> ],
          ['Con observación',<?php echo $proyecto_jardinesAntonioVarasG_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_jardinesAntonioVarasG_ins_cap; ?> ]
        ]);

        var options = {
          title: 'SINERGIA - JARDINES DE ANTONIO VARAS G',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jardinesAntonioVarasG'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart74();
    });
</script>

<!-- SINERGIA | JARDINES DE ANTONIO VARAS E/F -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart75);

      function drawChart75() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'SINERGIA - JARDINES DE ANTONIO VARAS E/F'],
          ['Sin información', <?php echo $proyecto_jardinesAntonioVarasEF_sin; ?> ],
          ['No contactados', <?php echo $proyecto_jardinesAntonioVarasEF_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_jardinesAntonioVarasEF_con; ?>  ],
          ['Agendados', <?php echo $proyecto_jardinesAntonioVarasEF_agen; ?> ],
          ['Instalados', <?php echo $proyecto_jardinesAntonioVarasEF_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_jardinesAntonioVarasEF_cap; ?> ],
          ['Con observación',<?php echo $proyecto_jardinesAntonioVarasEF_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_jardinesAntonioVarasEF_ins_cap; ?> ]
        ]);

        var options = {
          title: 'SINERGIA - JARDINES DE ANTONIO VARAS E/F',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('jardinesAntonioVarasEF'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart75();
    });
</script>

<!-- GRUPOACTIVA | General Saavedra -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart64);

      function drawChart64() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'GRUPOACTIVA - General Saavedra'],
          ['Sin información', <?php echo $proyecto_gralSaavedra_sin; ?> ],
          ['No contactados', <?php echo $proyecto_gralSaavedra_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_gralSaavedra_con; ?>  ],
          ['Agendados', <?php echo $proyecto_gralSaavedra_agen; ?> ],
          ['Instalados', <?php echo $proyecto_gralSaavedra_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_gralSaavedra_cap; ?> ],
          ['Con observación',<?php echo $proyecto_gralSaavedra_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_gralSaavedra_ins_cap; ?> ]
        ]);

        var options = {
          title: 'GRUPOACTIVA - General Saavedra',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('gralSaavedra'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart64();
    });
</script>

<!-- GRUPOACTIVA | Activa Entre Cerros -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart65);

      function drawChart65() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'GRUPOACTIVA - Activa Entre Cerros'],
          ['Sin información', <?php echo $proyecto_activaEntreCerros_sin; ?> ],
          ['No contactados', <?php echo $proyecto_activaEntreCerros_noCon; ?> ],
          ['Contactados', <?php echo $proyecto_activaEntreCerros_con; ?>  ],
          ['Agendados', <?php echo $proyecto_activaEntreCerros_agen; ?> ],
          ['Instalados', <?php echo $proyecto_activaEntreCerros_ins; ?> ],
          ['Capacitados', <?php echo $proyecto_activaEntreCerros_cap; ?> ],
          ['Con observación',<?php echo $proyecto_activaEntreCerros_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $proyecto_activaEntreCerros_ins_cap; ?> ]
        ]);

        var options = {
          title: 'GRUPOACTIVA - Activa Entre Cerros',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('activaEntreCerros'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart65();
    });
</script>

<!-- GRUPOACTIVA | las violetas I y II -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart69);

      function drawChart69() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ACTUAL - Las Violetas I y II'],
          ['Sin información', <?php echo $lasVioletas_sin; ?> ],
          ['No contactados', <?php echo $lasVioletas_noCon; ?> ],
          ['Contactados', <?php echo $lasVioletas_con; ?>  ],
          ['Agendados', <?php echo $lasVioletas_agen; ?> ],
          ['Instalados', <?php echo $lasVioletas_ins; ?> ],
          ['Capacitados', <?php echo $lasVioletas_cap; ?> ],
          ['Con observación',<?php echo $lasVioletas_pendiente; ?> ],
          ['Instalados y capacitados', <?php echo $lasVioletas_ins_cap; ?> ]
        ]);

        var options = {
          title: 'ACTUAL - Las Violetas I y II',
          //is3D: true,
          pieSliceText: 'value-and-percentage',
          //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('lasVioletas'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart69();
    });
</script>


<!-- Esta Si funciona -->
<script>

    $(document).ready(function(){

        $('#inmobiliaria').on('change', function(e){
        var inm_id = e.target.value;

            $.get('/ajax-proyectos?inm_id=' + inm_id, function(data){
                
                $('#proyectos').empty();
                $.each(data, function(home, proyectosObj){
                $('#proyectos').append('<option value="'+proyectosObj.id+'">'+proyectosObj.nombre+'</option>');
                });
            });
        $('#demo').collapse();
        });

        $('#buscarProyecto').on('click', function(e){
        e.preventDefault();
        var proyecto_id = $('#proyectos').find(":selected").val();
        var inmobiliaria_id = $('#inmobiliaria').find(":selected").val();
        

            $.get('/mostrarEstadosClientes?proyecto_id=' + proyecto_id, function(data) {
        
                $('#graficos').empty();

                    var contactados         = data.countContactados;
                    var no_contactados      = data.countNoContactados;
                    var instalados          = data.countInstalados;
                    var agendados           = data.countAgendados;
                    var sin_informacion     = data.countSinInformacion;
                    var ins_cap             = data.countInsCap;
                    var countCapacitados    = data.countCapacitados;
                    var conObservacion      = data.countObservacion;
                    var capacitados         = data.clienteCapacitado;
                    var no_capacitados      = data.clienteNoCapacitado;
                    var nombreInmobiliaria  = $("#inmobiliaria").find(":selected").text();
                    var nombreProyecto      = $("#proyectos").find(":selected").text();
                    var draw = 'drawChart66';


                    $sumaEstadosdinamico = sin_informacion+no_contactados+agendados+instalados+countCapacitados+ins_cap+contactados+conObservacion;

                    if ($sumaEstadosdinamico != 0){

                    //calculo Instalados y capacitados 
                    $porcentaje = ins_cap * 100;
                    $div = $porcentaje / $sumaEstadosdinamico;
                    $resulEstadosDinamico = $div.toFixed(1);
                    $resultado = ins_cap+' ('+$resulEstadosDinamico +'%)'; 

                    //calculo otros estados
                    $otrosEstados = sin_informacion + no_contactados + contactados + agendados + instalados + countCapacitados+conObservacion;
                    $porcentajeOtros = $otrosEstados * 100;
                    $divOtro = $porcentajeOtros / $sumaEstadosdinamico;
                    $resultadoOtros = $divOtro.toFixed(1);
                    $resultadoOrtosEstados = $otrosEstados+' ('+$resultadoOtros+'%)';

                    }else{

                    $resultado = 0;
                   	$resultadoOrtosEstados = 0;

                    }
                    
        
                $('#graficos').append( 	'<center>'+         
                           					'<div class="col-lg-15">'+
                                           		'<div class="hpanel">'+
                                                	'<div class="panel-heading">'+
                                                   		'<div class="panel-tools">'+
                                                       		'<a class="showhide"><i class="fa fa-chevron-up"></i></a>'+
                                                    	'</div>'+
                                                        	'Graficos'+
                                               		'</div>'+
                                                	'<div class="panel-body" id="" >'+
   	                                                	'<div  id="grafico_estados" style="width: 100%; height: 400px;"></div>'+
                                   							'<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">'+
                                   					  			'<thead>'+
                                   					     				'<tr>'+
                                   					         				'<th><small>Instalado y capacitado</small></th>'+
                                   					         				'<th><small>Otros estados</small></th>'+
                                   					     				'</tr>'+
                                   					  			'</thead>'+
                                   					  			'<tbody>'+
                                   					     				'<tr>'+
                                   					         				'<td>' +$resultado+ '</td>'+
                                   					     					'<td>' +$resultadoOrtosEstados+ '</td>'+
                                   					   					'</tr>'+
                                   								'</tbody>'+
                                   							'</table>'+
                                    					'<button type="button" class="btn btn-info btn-small btn-block" onclick="ver_detalle_proyecto('+proyecto_id+')">Ver detalles</button>'+
                                    				'</div>'+
                               					'</div>'+
                           			 		'</div>'+
                       				 	'</center>');

                                                

                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart66);

                function drawChart66(){

                var data = google.visualization.arrayToDataTable([
                   ['Task', 'hours per day'],
                   ['Sin información', sin_informacion ],
                   ['No contactados', no_contactados ],
                   ['Contactados', contactados ],
                   ['Agendados', agendados ],
                   ['Instalados', instalados ],
                   ['Capacitados', countCapacitados ],
                   ['Con observación', conObservacion ],
                   ['Instalados y capacitados', ins_cap ]
                 ]);

                var options = {
                    title: nombreInmobiliaria+' / '+nombreProyecto,
                    pieSliceText: 'value-and-percentage',
                    //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
                    colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
                    chartArea: {
                     width: '90%',
                     height:'85%'
                    },
                    legend: 'none'
                    };

                var chart = new google.visualization.PieChart(document.getElementById('grafico_estados'));
                chart.draw(data, options);

                }

                $(window).resize(function(){
                drawChart66();
                 });

            });

        });

    });

</script>

<!--*********** Graficos por inmobiliaria **************-->
<!--script>
    $(document).ready(function(){

        $('#inmobiliaria').on('change', function(e){
        console.log(e);
        var inm_id = e.target.value;

            $.get('/ajax-proyectos?inm_id=' + inm_id, function(data){
                console.log(data);
                $('#proyectos').empty();
                $.each(data, function(home, proyectosObj){
                $('#proyectos').append('<option value="'+proyectosObj.id+'">'+proyectosObj.nombre+'</option>');
                });
            });
        $('#demo').collapse();
        });

        $('#buscarProyecto').on('click', function(e){

        e.preventDefault();
        var inmobiliaria_id = $('#inmobiliaria').val();
        console.log(inmobiliaria_id);

        $('#graficos').empty();

            $.get('api/inmobiliariaProyecto/' + inmobiliaria_id, function(data) {
        
                $.each(data,function(home, id_proyecto){

                    $.get('api/datosProyecto/'+id_proyecto.id, function(data){



                    var contactados         = data.countContactados;
                    var no_contactados      = data.countNoContactados;
                    var instalados          = data.countInstalados;
                    var agendados           = data.countAgendados;
                    var sin_informacion     = data.countSinInformacion;
                    var ins_cap             = data.countInsCap;
                    var countCapacitados    = data.countCapacitados;
                    var conObservacion      = data.countObservacion;
                    var inmobiliariaId      = data.inmobiliariaId;
                    var proyectoNombre      = data.proyectoNombre;
                    var nombreInmobiliaria  = $("#inmobiliaria").find(":selected").text();
                    //var nombreProyecto      = $("#proyectos").find(":selected").text();

                    

                    $('#graficos').append( '<div class="col-lg-12">'+
                                               '<div class="hpanel">'+
                                                    '<div class="panel-heading">'+
                                                        '<div class="panel-tools">'+
                                                            '<a class="showhide"><i class="fa fa-chevron-up"></i></a>'+
                                                        '</div>'+
                                                        'Graficos'+
                                                    '</div>'+
                                                 '<div class="panel-body" id="grafico_estados'+id_proyecto.id+'" style="width: 100%; height: 400px;">'+
                                                 '</div>'+
                                                '</div>'+
                                            '</div>'
                            );

                   



                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(func);

                    var name = "drawChart"+inmobiliariaId+id_proyecto.id;

                    console.log(proyectoNombre);

                    var customAction = function() {

                    var data = google.visualization.arrayToDataTable([
                   ['Task', 'hours per day'],
                   ['Sin información', sin_informacion ],
                   ['No contactados', no_contactados ],
                   ['Contactados', contactados ],
                   ['Agendados', agendados ],
                   ['Instalados', instalados ],
                   ['Capacitados', countCapacitados ],
                   ['Con observación', conObservacion ],
                   ['Instalados y capacitados', ins_cap ]
                    ]);

                     var options = {
                    title: nombreInmobiliaria+' / '+proyectoNombre,
                    pieSliceText: 'value-and-percentage',
                    //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
                    colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
                    chartArea: {
                     width: '90%',
                     height:'85%'
                    },
                    legend: 'none'
                    };

                    

                    var chart = new google.visualization.PieChart(document.getElementById('grafico_estados'+id_proyecto.id));
                chart.draw(data, options);

                }
                var func = new Function("action", "return function " + name + "(){ action() };")(customAction);

                    func();
                    //test it 
                    $(window).resize(function(){
                    func();
                    });

                    });

                });


            });

        });

    });
</script-->
                        
<!--script >

    $(document).ready(function(){

        $('#inmobiliaria').on('change', function(e){
        console.log(e);
        var inm_id = e.target.value;

            $.get('/ajax-proyectos?inm_id=' + inm_id, function(data){
                console.log(data);
                $('#proyectos').empty();
                $.each(data, function(home, proyectosObj){
                $('#proyectos').append('<option value="'+proyectosObj.id+'">'+proyectosObj.nombre+'</option>');
                });
            });
        $('#demo').collapse();
        });

        $('#buscarProyecto').on('click', function(e){

        e.preventDefault();
        var proyecto_id = $('#proyectos').find(":selected").val();
        var inmobiliaria_id = $('#inmobiliaria').find(":selected").val();
        console.log(inmobiliaria_id);

            $.get('/mostrarEstadosClientes?proyecto_id=' + proyecto_id, function(data) {
        
                $('#graficos').empty();

                    var contactados         = data.countContactados;
                    var no_contactados      = data.countNoContactados;
                    var instalados          = data.countInstalados;
                    var agendados           = data.countAgendados;
                    var sin_informacion     = data.countSinInformacion;
                    var ins_cap             = data.countInsCap;
                    var countCapacitados    = data.countCapacitados;
                    var conObservacion      = data.countObservacion;
                    var capacitados         = data.clienteCapacitado;
                    var no_capacitados      = data.clienteNoCapacitado;
                    var nombreInmobiliaria  = $("#inmobiliaria").find(":selected").text();
                    var nombreProyecto      = $("#proyectos").find(":selected").text();
                    var draw = 'drawChart66';
                    
        
                $('#graficos').append( '<div class="col-lg-12">'+
                                               '<div class="hpanel">'+
                                                    '<div class="panel-heading">'+
                                                        '<div class="panel-tools">'+
                                                            '<a class="showhide"><i class="fa fa-chevron-up"></i></a>'+
                                                        '</div>'+
                                                    '</div>'+
                                                 '<div class="panel-body" id="grafico_estados" style="width: 100%; height: 400px;">'+
                                                 '</div>'+
                                                '</div>'+
                                            '</div>');

                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(func);

                var name = "drawChart66";

                var customAction = function() {

                    var data = google.visualization.arrayToDataTable([
                   ['Task', 'hours per day'],
                   ['Sin información', sin_informacion ],
                   ['No contactados', no_contactados ],
                   ['Contactados', contactados ],
                   ['Agendados', agendados ],
                   ['Instalados', instalados ],
                   ['Capacitados', countCapacitados ],
                   ['Con observación', conObservacion ],
                   ['Instalados y capacitados', ins_cap ]
                 ]);

                var options = {
                    title: nombreInmobiliaria+' / '+nombreProyecto,
                    pieSliceText: 'value-and-percentage',
                    //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
                    colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
                    chartArea: {
                     width: '90%',
                     height:'85%'
                    },
                    legend: 'none'
                    };

                var chart = new google.visualization.PieChart(document.getElementById('grafico_estados'));
                chart.draw(data, options);

                }
                //implement it 
                var func = new Function("action", "return function " + name + "(){ action() };")(customAction);

                func();
                //test it 
                $(window).resize(function(){
                func();
                });

            });

        });

    });

</script-->


<!--script>
$(document).ready(function(){

    $('#inmobiliaria').on('change', function(e){
        console.log(e);
        var inm_id = e.target.value;

        $.get('/ajax-proyectos?inm_id=' + inm_id, function(data){
            console.log(data);
            $('#proyectos').empty();
            $.each(data, function(home, proyectosObj){
                $('#proyectos').append('<option value="'+proyectosObj.id+'">'+proyectosObj.nombre+'</option>');
            });
        });
        $('#demo').collapse();
    });

    $('#buscarProyecto').on('click', function(e){
        e.preventDefault();
        var proyecto_id = $('#proyectos').find(":selected").val();
        console.log(proyecto_id);

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart66);

        function drawChart66(){
            // Api graficos por proyecto
            $.get('/mostrarEstadosClientes?proyecto_id=' + proyecto_id, function(data) {

                console.log(data);
                var contactados         = data.countContactados;
                var no_contactados      = data.countNoContactados;
                var instalados          = data.countInstalados;
                var agendados           = data.countAgendados;
                var sin_informacion     = data.countSinInformacion;
                var ins_cap             = data.countInsCap;
                var countCapacitados    = data.countCapacitados;
                var conObservacion      = data.countObservacion;
                var capacitados         = data.clienteCapacitado;
                var no_capacitados      = data.clienteNoCapacitado;
                var nombreInmobiliaria  = $("#inmobiliaria").find(":selected").text();
                var nombreProyecto      = $("#proyectos").find(":selected").text();
                
                /****************************************************
                Gráfico de estados clientes seleccionado
                ****************************************************/
                var data = google.visualization.arrayToDataTable([
                   ['Task', 'hours per day'],
                   ['Sin información', sin_informacion ],
                   ['No contactados', no_contactados ],
                   ['Contactados', contactados ],
                   ['Agendados', agendados ],
                   ['Instalados', instalados ],
                   ['Capacitados', countCapacitados ],
                   ['Con observación', conObservacion ],
                   ['Instalados y capacitados', ins_cap ]
                 ]);

                var options = {
                    title: nombreInmobiliaria+' / '+nombreProyecto,
                    pieSliceText: 'value-and-percentage',
                    //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
                    colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
                    chartArea: {
                     width: '90%',
                     height:'85%'
                    },
                    legend: 'none'
                    };

                var chart = new google.visualization.PieChart(document.getElementById('grafico_estados'));
                chart.draw(data, options);
                /****************************************************
                Gráfico de clientes capacitados o no capacitados 
                seleccionado
                ****************************************************/
                /*
                var data_capacitados = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Capacitados', capacitados],
                    ['No capacitados', no_capacitados]
                ]);

                var chart_capacitados = new google.visualization.PieChart(document.getElementById('grafico_capacitados'));
                chart_capacitados.draw(data_capacitados, options);
                */
            });//graficos por proyecto
            
            // Api graficos totales
            /*
            $.get('/totalGraficosClientes', function(data) {
                console.log(data);

                var total_contactados     = data.totalClientesContactados;
                var total_no_contactados  = data.totalClientesNoContactados;
                var total_instalados      = data.totalClientesInstalados;
                var total_agendados       = data.totalClientesAgendados;
                var total_sin_informacion = data.totalClientesSinInformacion;
                var total_capacitados     = data.totalClientesCapacitados;
                var total_no_capacitados  = data.totalClientesNoCapacitados;
    
                /****************************************************
                    Gráfico total estados
                ****************************************************
                var data_total_estados = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Contactados', total_contactados],
                    ['No contactados', total_no_contactados],
                    ['Instalados', total_instalados],
                    ['Agendados', total_agendados],
                    ['Sin información', total_sin_informacion]
                ]);

                var options_total_estados = {
                    title: 'Estados totales'
                };

                var chart = new google.visualization.PieChart(document.getElementById('grafico_totales_estados'));
                chart.draw(data_total_estados, options_total_estados);

                /****************************************************
                    Gráfico total capacitados
                ****************************************************
                var data_total_capacitados = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Capacitados', total_capacitados],
                    ['No capacitados', total_no_capacitados]
                ]);

                var options_total_capacitados = {
                    title: 'Capacitados totales'
                };

                var chart = new google.visualization.PieChart(document.getElementById('grafico_totales_capacitados'));
                chart.draw(data_total_capacitados, options_total_capacitados);
            });//graficosTotales
            */
        }//drawchart
        $(window).resize(function(){
            drawChart66();
        });
    });//onclick
});//function
</script>

<script>

    $('#buscarProyecto').on('click', function(e){
        e.preventDefault();
        var proyecto_id = $('#proyectos').find(":selected").val();
        console.log(proyecto_id);

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart67);

        function drawChart67(){
            // Api graficos por proyecto
            $.get('/mostrarEstadosClientes?proyecto_id=' + proyecto_id, function(data) {

                console.log(data);
                var contactados         = data.countContactados;
                var no_contactados      = data.countNoContactados;
                var instalados          = data.countInstalados;
                var agendados           = data.countAgendados;
                var sin_informacion     = data.countSinInformacion;
                var ins_cap             = data.countInsCap;
                var countCapacitados    = data.countCapacitados;//no mostrar 
                var conObservacion      = data.countObservacion;
                var capacitados         = data.clienteCapacitado;
                var no_capacitados      = data.clienteNoCapacitado;
                var nombreInmobiliaria  = $("#inmobiliaria").find(":selected").text();
                var nombreProyecto      = $("#proyectos").find(":selected").text();
                
                /****************************************************
                Gráfico de clientes capacitados o no capacitados 
                seleccionado
                **************************************************/
                
                var data_capacitados = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Capacitados', capacitados],
                    ['No capacitados', no_capacitados]
                ]);

                var options = {
                    title: nombreInmobiliaria+' / '+nombreProyecto,
                    pieSliceText: 'value-and-percentage',
                    //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
                    colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
                    chartArea: {
                     width: '90%',
                     height:'85%'
                    },
                    legend: 'none'
                    };

                var chart_capacitados = new google.visualization.PieChart(document.getElementById('grafico_capacitados'));
                chart_capacitados.draw(data_capacitados, options);
                
            });//graficos por proyecto

        }//drawchart
        $(window).resize(function(){
            drawChart67();
        });
    });//onclick

</script>

<script>

    $('#buscarProyecto').on('click', function(e){
        e.preventDefault();
        var proyecto_id = $('#proyectos').find(":selected").val();
        console.log(proyecto_id);

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart68);

        function drawChart68(){
            
            // Api graficos totales
            $.get('/totalGraficosClientes', function(data) {
                console.log(data);

                var total_contactados     = data.totalClientesContactados;
                var total_no_contactados  = data.totalClientesNoContactados;
                var total_instalados      = data.totalClientesInstalados;
                var total_agendados       = data.totalClientesAgendados;
                var total_sin_informacion = data.totalClientesSinInformacion;
                var total_capacitados     = data.totalClientesCapacitados;
                var total_no_capacitados  = data.totalClientesNoCapacitados;
                var total_InsYCap         = data.totalClientesInsYCap
                var total_Cap             = data.totalClientesCap    
                var total_conObs           = data.totalClientesConObs 
    
                /****************************************************
                    Gráfico total estados
                ****************************************************/
                var data_total_estados = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Sin información', total_sin_informacion],
                    ['No contactados', total_no_contactados],
                    ['Contactados', total_contactados],
                    ['Agendados', total_agendados],
                    ['Instalados', total_instalados],                    
                    ['Capacitados', total_Cap],
                    ['Con observación', total_conObs],
                    ['Instalados y capacitados', total_InsYCap],
                    
                ]);

                var options_total_estados = {
                    title: 'Estados totales',
                    pieSliceText: 'value-and-percentage',
                    //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
                    colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
                    chartArea: {
                     width: '90%',
                     height:'85%'
                    },
                    legend: 'none'
                };

                var chart = new google.visualization.PieChart(document.getElementById('grafico_totales_estados'));
                chart.draw(data_total_estados, options_total_estados);

            });//graficosTotales
            
        }//drawchart
        $(window).resize(function(){
            drawChart68();
        });
    });//onclick

</script>

<script>

    $('#buscarProyecto').on('click', function(e){
        e.preventDefault();
        var proyecto_id = $('#proyectos').find(":selected").val();
        console.log(proyecto_id);

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart69);

        function drawChart69(){
            
            // Api graficos totales
            $.get('/totalGraficosClientes', function(data) {
                console.log(data);

                var total_contactados     = data.totalClientesContactados;
                var total_no_contactados  = data.totalClientesNoContactados;
                var total_instalados      = data.totalClientesInstalados;
                var total_agendados       = data.totalClientesAgendados;
                var total_sin_informacion = data.totalClientesSinInformacion;
                var total_capacitados     = data.totalClientesCapacitados;
                var total_no_capacitados  = data.totalClientesNoCapacitados;
                var total_InsYCap         = data.totalClientesInsYCap
                var total_Cap             = data.totalClientesCap    
                var total_conObs          = data.totalClientesConObs 
    
                
                /****************************************************
                    Gráfico total capacitados
                ****************************************************/
                var data_total_capacitados = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Capacitados', total_capacitados],
                    ['No capacitados', total_no_capacitados]
                ]);

                var options_total_capacitados = {
                    title: 'Capacitados totales',
                    pieSliceText: 'value-and-percentage',
                    //colors: ['#d3ecbd', '#da223d', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#6f42c1', '#6ac826'],
                    colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#78712D', '#da223d', '#6ac826'],
                    chartArea: {
                     width: '90%',
                     height:'85%'
                    },
                    legend: 'none'
                };

                var chart = new google.visualization.PieChart(document.getElementById('grafico_totales_capacitados'));
                chart.draw(data_total_capacitados, options_total_capacitados);
                
            });//graficosTotales
            
        }//drawchart
        $(window).resize(function(){
            drawChart69();
        });
    });//onclick

</script-->

<script>
$(document).ready(function(){
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
});
</script>

</body>
</html>
