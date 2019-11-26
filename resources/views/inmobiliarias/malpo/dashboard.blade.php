@extends('inmobiliarias.malpo.layouts.app')

  @section('content')

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard | {{ Auth::guard('userinmobiliarios')->user()->inmobiliaria->nombre }}</h1>
            <a href="{{ url('malpo/reporte') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
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
                  <h6 class="m-0 font-weight-bold text-primary">Alto Rucahue Colonial</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('malpo/reporte_alto_rauquen_colonial') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="altos_racahue_colonial" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <a href="{{ url('malpo/altos_rucahue_colonial') }}" class="btn btn-info btn-block">
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
                  <h6 class="m-0 font-weight-bold text-primary">Claros de Rauquén, Curico</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('malpo/reporte_claros_rauquen') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="claros_rauquen" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('malpo/claros_rauquen') }}" class="btn btn-info btn-block">
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
                  <h6 class="m-0 font-weight-bold text-primary">Altos del Maitén, Boldo Melipilla</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('malpo/reporte_altos_maiten_boldo') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="altos_maiten_boldo" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <a href="{{ url('malpo/altos_maiten_boldo') }}" class="btn btn-info btn-block">
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
                  <h6 class="m-0 font-weight-bold text-primary">Altos del Maitén, Laurel Melipilla</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('malpo/reporte_altos_maiten_laurel') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="altos_maiten_laurel" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('malpo/altos_maiten_laurel') }}" class="btn btn-info btn-block">
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
                  <h6 class="m-0 font-weight-bold text-primary">Lomas del Bosque, Los Angeles</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('malpo/reporte_lomas_bosque') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="lomas_bosque" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('malpo/lomas_bosque') }}" class="btn btn-info btn-block">
                      <i class="fas fa-fw fa-table"></i> Ver detalle
                    </a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- MALPO - Alto Racahue Colonial -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'MALPO - Alto Racahue Colonial'],
          ['Sin información', <?php echo $altos_rucahue_colonial_sin; ?> ],
          ['No contactados', <?php echo $altos_rucahue_colonial_noCon; ?> ],
          ['Contactados', <?php echo $altos_rucahue_colonial_con; ?>  ],
          ['Agendados', <?php echo $altos_rucahue_colonial_agen; ?> ],
          ['Instalados', <?php echo $altos_rucahue_colonial_ins; ?> ],
          ['Con observación', <?php echo $altos_rucahue_colonial_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $altos_rucahue_colonial_ins_cap; ?> ]
        ]);

        var options = {
          //title: 'REZEPKA - Back+Office Business Park - Etapa 1',
          pieSliceText: 'value-and-percentage',
          colors: ['#d3ecbd', '#6f42c1', '#f0ad4e', '#f3fa5b', '#0275d8', '#da223d', '#6ac826'],
          chartArea: {
            width: '90%',
            height:'85%'
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('altos_racahue_colonial'));

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
          ['Task', 'MALPO - Claros de Rauquén'],
          ['Sin información', <?php echo $claros_rauquen_sin; ?> ],
          ['No contactados', <?php echo $claros_rauquen_noCon; ?> ],
          ['Contactados', <?php echo $claros_rauquen_con; ?>  ],
          ['Agendados', <?php echo $claros_rauquen_agen; ?> ],
          ['Instalados', <?php echo $claros_rauquen_ins; ?> ],
          ['Con observación', <?php echo $claros_rauquen_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $claros_rauquen_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('claros_rauquen'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart2();
    });
</script>

  <!-- MALPO - Altos del Maiten, Boldo Melipilla -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'MALPO - Altos del Maiten, Boldo'],
          ['Sin información', <?php echo $altos_maiten_boldo_sin; ?> ],
          ['No contactados', <?php echo $altos_maiten_boldo_noCon; ?> ],
          ['Contactados', <?php echo $altos_maiten_boldo_con; ?>  ],
          ['Agendados', <?php echo $altos_maiten_boldo_agen; ?> ],
          ['Instalados', <?php echo $altos_maiten_boldo_ins; ?> ],
          ['Con observación', <?php echo $altos_maiten_boldo_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $altos_maiten_boldo_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('altos_maiten_boldo'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart3();
    });
</script>

 <!-- MALPO - Altos del Maiten, Laurel Melipilla -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart4);

      function drawChart4() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'MALPO - Altos del Maiten, Laurel'],
          ['Sin información', <?php echo $altos_maiten_laurel_sin; ?> ],
          ['No contactados', <?php echo $altos_maiten_laurel_noCon; ?> ],
          ['Contactados', <?php echo $altos_maiten_laurel_con; ?>  ],
          ['Agendados', <?php echo $altos_maiten_laurel_agen; ?> ],
          ['Instalados', <?php echo $altos_maiten_laurel_ins; ?> ],
          ['Con observación', <?php echo $altos_maiten_laurel_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $altos_maiten_laurel_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('altos_maiten_laurel'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart4();
    });
</script>

 <!-- MALPO - Altos del Maiten, Laurel Melipilla -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart5);

      function drawChart5() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'MALPO - Lomas del Bosque'],
          ['Sin información', <?php echo $lomas_bosque_sin; ?> ],
          ['No contactados', <?php echo $lomas_bosque_noCon; ?> ],
          ['Contactados', <?php echo $lomas_bosque_con; ?>  ],
          ['Agendados', <?php echo $lomas_bosque_agen; ?> ],
          ['Instalados', <?php echo $lomas_bosque_ins; ?> ],
          ['Con observación', <?php echo $lomas_bosque_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $lomas_bosque_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('lomas_bosque'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart5();
    });
</script>

@endsection
