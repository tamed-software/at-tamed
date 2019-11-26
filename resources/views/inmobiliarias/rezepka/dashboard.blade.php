@extends('inmobiliarias.rezepka.layouts.app')

  @section('content')

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard | {{ Auth::guard('userinmobiliarios')->user()->inmobiliaria->nombre }}</h1>
            <a href="{{ url('rezepka/reporte') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
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
                  <h6 class="m-0 font-weight-bold text-primary">Back+Office Business Park - Etapa 1</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('rezepka/reporte_etapa1') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="backoffice1" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <a href="{{ url('rezepka/backoffice1') }}" class="btn btn-info btn-block">
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
                  <h6 class="m-0 font-weight-bold text-primary">Back+Office Business Park - Etapa 2</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('rezepka/reporte_etapa2') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="backoffice2" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('rezepka/backoffice2') }}" class="btn btn-info btn-block">
                      <i class="fas fa-fw fa-table"></i> Ver detalle
                    </a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- REZEPKA - Back+Office Business Park - Etapa 1 -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'REZEPKA - Back+Office Business Park - Etapa 1'],
          ['Sin información', <?php echo $etapa1_sin; ?> ],
          ['No contactados', <?php echo $etapa1_noCon; ?> ],
          ['Contactados', <?php echo $etapa1_con; ?>  ],
          ['Agendados', <?php echo $etapa1_agen; ?> ],
          ['Instalados', <?php echo $etapa1_ins; ?> ],
          ['Con observación', <?php echo $etapa1_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $etapa1_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('backoffice1'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart1();
    });
</script>

  <!-- REZEPKA - Back+Office Business Park - Etapa 2 -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'REZEPKA - Back+Office Business Park - Etapa 1'],
          ['Sin información', <?php echo $etapa2_sin; ?> ],
          ['No contactados', <?php echo $etapa2_noCon; ?> ],
          ['Contactados', <?php echo $etapa2_con; ?>  ],
          ['Agendados', <?php echo $etapa2_agen; ?> ],
          ['Instalados', <?php echo $etapa2_ins; ?> ],
          ['Con observación', <?php echo $etapa2_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $etapa2_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('backoffice2'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart2();
    });
</script>

@endsection