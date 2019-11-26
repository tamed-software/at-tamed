@extends('inmobiliarias.grupoactiva.layouts.app')

  @section('content')

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard | {{ Auth::guard('userinmobiliarios')->user()->inmobiliaria->nombre }}</h1>
            <a href="{{ url('grupoactiva/reporte') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
          </div>



          <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
              <div class="card-body">
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle" style="color: #d3ecbd;"></i> Sin información
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle" style="color: #6f42c1;"></i> No contactados
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle" style="color: #f0ad4e;"></i> Contactados
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle" style="color: #f3fa5b;"></i> Agendados
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle" style="color: #0275d8;"></i> Instalados
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle" style="color: #da223d;"></i> Con observación
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle" style="color: #6ac826;"></i> Instalados y capacitados
                    </span>
                  </div>
                </div>
            </div>
          </div>

          <div class="row">

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Activa Entre Cerros</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('grupoactiva/reporte_activa_entre_cerros') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="activa_entre_cerros" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <a href="{{ url('grupoactiva/activa_entre_cerros') }}" class="btn btn-info btn-block">
                      <i class="fas fa-fw fa-table"></i> Ver detalle
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">General Saavedra</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('grupoactiva/reporte_gral_saavedra') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="gral_saavedra" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('grupoactiva/gral_saavedra') }}" class="btn btn-info btn-block">
                      <i class="fas fa-fw fa-table"></i> Ver detalle
                    </a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Activa Blanco</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('grupoactiva/reporte_activa_blanco') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="activa_blanco" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <a href="{{ url('grupoactiva/activa_blanco') }}" class="btn btn-info btn-block">
                      <i class="fas fa-fw fa-table"></i> Ver detalle
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Activa Mitjans</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('grupoactiva/reporte_activa_mitjans') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="activa_mitjans" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('grupoactiva/activa_mitjans') }}" class="btn btn-info btn-block">
                      <i class="fas fa-fw fa-table"></i> Ver detalle
                    </a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Activa Nataniel</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('grupoactiva/reporte_activa_nataniel') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="activa_nataniel" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('grupoactiva/activa_nataniel') }}" class="btn btn-info btn-block">
                      <i class="fas fa-fw fa-table"></i> Ver detalle
                    </a>
                  </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Walker Martínez</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('grupoactiva/reporte_walker_martinez') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="walker_martinez" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('grupoactiva/walker_martinez') }}" class="btn btn-info btn-block">
                      <i class="fas fa-fw fa-table"></i> Ver detalle
                    </a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Pie Chart -->
          <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Hipódromo</h6>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Generar Reporte:</div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('grupoactiva/reporte_hipodromo') }}">Descargar PDF</a>
                  </div>
                </div>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="pb-1">
                  <div id="hipodromo" style="height: 300px;"></div>
                </div>
                <div class="mt-4 text-center small">
                  <div class="mt-4 text-center small">
                  <a href="{{ url('grupoactiva/hipodromo') }}" class="btn btn-info btn-block">
                    <i class="fas fa-fw fa-table"></i> Ver detalle
                  </a>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- GRUPOACTIVA - activa_entre_cerros -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'GRUPOACTIVA - Activa entre Cerros'],
          ['Sin información', <?php echo $activa_entre_cerros_sin; ?> ],
          ['No contactados', <?php echo $activa_entre_cerros_noCon; ?> ],
          ['Contactados', <?php echo $activa_entre_cerros_con; ?>  ],
          ['Agendados', <?php echo $activa_entre_cerros_agen; ?> ],
          ['Instalados', <?php echo $activa_entre_cerros_ins; ?> ],
          ['Con observación', <?php echo $activa_entre_cerros_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $activa_entre_cerros_ins_cap; ?> ]
        ]);

        var options = {
          pieSliceText: 'value-and-percentage',
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('activa_entre_cerros'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart1();
    });
</script>

<!-- MALPO - Claros Rauquen -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'GRUPOACTIVA - Activa entre Cerros'],
          ['Sin información', <?php echo $gral_saavedra_sin; ?> ],
          ['No contactados', <?php echo $gral_saavedra_noCon; ?> ],
          ['Contactados', <?php echo $gral_saavedra_con; ?>  ],
          ['Agendados', <?php echo $gral_saavedra_agen; ?> ],
          ['Instalados', <?php echo $gral_saavedra_ins; ?> ],
          ['Con observación', <?php echo $gral_saavedra_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $gral_saavedra_ins_cap; ?> ]
        ]);

        var options = {
          pieSliceText: 'value-and-percentage',
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('gral_saavedra'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart2();
    });
</script>

<!-- ACTIVA - Activa Mitjans -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart4);

      function drawChart4() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'GRUPOACTIVA - Activa Mitjans'],
          ['Sin información', <?php echo $activa_mitjans_sin; ?> ],
          ['No contactados', <?php echo $activa_mitjans_noCon; ?> ],
          ['Contactados', <?php echo $activa_mitjans_con; ?>  ],
          ['Agendados', <?php echo $activa_mitjans_agen; ?> ],
          ['Instalados', <?php echo $activa_mitjans_ins; ?> ],
          ['Con observación', <?php echo $activa_mitjans_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $activa_mitjans_ins_cap; ?> ]
        ]);

        var options = {
          //title: 'REZEPKA - Back+Office Business Park - Etapa 2',
          pieSliceText: 'value-and-percentage',
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('activa_mitjans'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart4();
    });
</script>

<!-- ACTIVA - Activa Blanco -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'GRUPOACTIVA - Acitva Blanco'],
          ['Sin información', <?php echo $activa_blanco_sin; ?> ],
          ['No contactados', <?php echo $activa_blanco_noCon; ?> ],
          ['Contactados', <?php echo $activa_blanco_con; ?>  ],
          ['Agendados', <?php echo $activa_blanco_agen; ?> ],
          ['Instalados', <?php echo $activa_blanco_ins; ?> ],
          ['Con observación', <?php echo $activa_blanco_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $activa_blanco_ins_cap; ?> ]
        ]);

        var options = {
          //title: 'REZEPKA - Back+Office Business Park - Etapa 2',
          pieSliceText: 'value-and-percentage',
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('activa_blanco'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart3();
    });
</script>

<!-- ACTIVA - Activa Nataniel -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart5);

      function drawChart5() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'GRUPOACTIVA - Activa Nataniel'],
          ['Sin información', <?php echo $activa_nataniel_sin; ?> ],
          ['No contactados', <?php echo $activa_nataniel_noCon; ?> ],
          ['Contactados', <?php echo $activa_nataniel_con; ?>  ],
          ['Agendados', <?php echo $activa_nataniel_agen; ?> ],
          ['Instalados', <?php echo $activa_nataniel_ins; ?> ],
          ['Con observación', <?php echo $activa_nataniel_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $activa_nataniel_ins_cap; ?> ]
        ]);

        var options = {
          //title: 'REZEPKA - Back+Office Business Park - Etapa 2',
          pieSliceText: 'value-and-percentage',
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('activa_nataniel'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart5();
    });
</script>

<!-- ACTIVA - Walker Martinez -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart6);

      function drawChart6() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'GRUPOACTIVA - Walker Martinez'],
          ['Sin información', <?php echo $walker_martinez_sin; ?> ],
          ['No contactados', <?php echo $walker_martinez_noCon; ?> ],
          ['Contactados', <?php echo $walker_martinez_con; ?>  ],
          ['Agendados', <?php echo $walker_martinez_agen; ?> ],
          ['Instalados', <?php echo $walker_martinez_ins; ?> ],
          ['Con observación', <?php echo $walker_martinez_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $walker_martinez_ins_cap; ?> ]
        ]);

        var options = {
          //title: 'REZEPKA - Back+Office Business Park - Etapa 2',
          pieSliceText: 'value-and-percentage',
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('walker_martinez'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart6();
    });
</script>

<!-- ACTIVA - hipodromo -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart7);

      function drawChart7() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'GRUPOACTIVA - Walker Martinez'],
          ['Sin información', <?php echo $hipodromo_sin; ?> ],
          ['No contactados', <?php echo $hipodromo_noCon; ?> ],
          ['Contactados', <?php echo $hipodromo_con; ?>  ],
          ['Agendados', <?php echo $hipodromo_agen; ?> ],
          ['Instalados', <?php echo $hipodromo_ins; ?> ],
          ['Con observación', <?php echo $hipodromo_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $hipodromo_ins_cap; ?> ]
        ]);

        var options = {
          //title: 'REZEPKA - Back+Office Business Park - Etapa 2',
          pieSliceText: 'value-and-percentage',
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('hipodromo'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart7();
    });
</script>

@endsection
