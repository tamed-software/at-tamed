@extends('inmobiliarias.ileben.layouts.app')

  @section('content')

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard | {{ Auth::guard('userinmobiliarios')->user()->inmobiliaria->nombre }}</h1>
            <a href="{{ url('ileben/reporte') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
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
                  <h6 class="m-0 font-weight-bold text-primary">Reflex</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('ileben/reporte_reflex') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="reflex" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <a href="{{ url('ileben/reflex') }}" class="btn btn-info btn-block">
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
                  <h6 class="m-0 font-weight-bold text-primary">Choice</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('ileben/reporte_choice') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="choice" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('ileben/choice') }}" class="btn btn-info btn-block">
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
                  <h6 class="m-0 font-weight-bold text-primary">Bloom</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('ileben/reporte_bloom') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="bloom" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('ileben/bloom') }}" class="btn btn-info btn-block">
                      <i class="fas fa-fw fa-table"></i> Ver detalle
                    </a>
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
                  <h6 class="m-0 font-weight-bold text-primary">Parque la Huasa</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('ileben/reporte_parque_la_huasa') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="parque_la_huasa" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('ileben/parque_la_huasa') }}" class="btn btn-info btn-block">
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
                  <h6 class="m-0 font-weight-bold text-primary">Open Concept</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('ileben/reporte_open_concept') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="open_concept" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('ileben/open_concept') }}" class="btn btn-info btn-block">
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
                  <h6 class="m-0 font-weight-bold text-primary">Jazz Life - Etapa 1</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('ileben/reporte_jazz_life_1') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="jazz_life_1" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('ileben/jazz_life_1') }}" class="btn btn-info btn-block">
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
                  <h6 class="m-0 font-weight-bold text-primary">Jazz Life - Etapa 2</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('ileben/reporte_jazz_life_2') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="jazz_life_2" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('ileben/jazz_life_2') }}" class="btn btn-info btn-block">
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
                  <h6 class="m-0 font-weight-bold text-primary">Jazz Life - Etapa 3</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Generar Reporte:</div>
                      <!--a class="dropdown-item" href="#">Action</a-->
                      <!--a class="dropdown-item" href="#">Another action</a-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('ileben/reporte_jazz_life_3') }}">Descargar PDF</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pb-1">
                    <div id="jazz_life_3" style="height: 300px;"></div>
                  </div>
                  <div class="mt-4 text-center small">
                    <div class="mt-4 text-center small">
                    <a href="{{ url('ileben/jazz_life_3') }}" class="btn btn-info btn-block">
                      <i class="fas fa-fw fa-table"></i> Ver detalle
                    </a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>          

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- reflex -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN - Reflex'],
          ['Sin información', <?php echo $reflex_sin; ?> ],
          ['No contactados', <?php echo $reflex_noCon; ?> ],
          ['Contactados', <?php echo $reflex_con; ?>  ],
          ['Agendados', <?php echo $reflex_agen; ?> ],
          ['Instalados', <?php echo $reflex_ins; ?> ],
          ['Con observación', <?php echo $reflex_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $reflex_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('reflex'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart1();
    });
</script>

  <!-- choice -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN - Choice'],
          ['Sin información', <?php echo $choice_sin; ?> ],
          ['No contactados', <?php echo $choice_noCon; ?> ],
          ['Contactados', <?php echo $choice_con; ?>  ],
          ['Agendados', <?php echo $choice_agen; ?> ],
          ['Instalados', <?php echo $choice_ins; ?> ],
          ['Con observación', <?php echo $choice_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $choice_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('choice'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart2();
    });
</script>

  <!-- choice -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN - Bloom'],
          ['Sin información', <?php echo $bloom_sin; ?> ],
          ['No contactados', <?php echo $bloom_noCon; ?> ],
          ['Contactados', <?php echo $bloom_con; ?>  ],
          ['Agendados', <?php echo $bloom_agen; ?> ],
          ['Instalados', <?php echo $bloom_ins; ?> ],
          ['Con observación', <?php echo $bloom_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $bloom_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('bloom'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart3();
    });
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart4);

      function drawChart4() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN - Parque La Huasa'],
          ['Sin información', <?php echo $parque_la_huasa_sin; ?> ],
          ['No contactados', <?php echo $parque_la_huasa_noCon; ?> ],
          ['Contactados', <?php echo $parque_la_huasa_con; ?>  ],
          ['Agendados', <?php echo $parque_la_huasa_agen; ?> ],
          ['Instalados', <?php echo $parque_la_huasa_ins; ?> ],
          ['Con observación', <?php echo $parque_la_huasa_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $parque_la_huasa_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('parque_la_huasa'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart4();
    });
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart5);

      function drawChart5() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN - Open Concept'],
          ['Sin información', <?php echo $open_concept_sin; ?> ],
          ['No contactados', <?php echo $open_concept_noCon; ?> ],
          ['Contactados', <?php echo $open_concept_con; ?>  ],
          ['Agendados', <?php echo $open_concept_agen; ?> ],
          ['Instalados', <?php echo $open_concept_ins; ?> ],
          ['Con observación', <?php echo $open_concept_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $open_concept_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('open_concept'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart5();
    });
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart6);

      function drawChart6() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN - Jazz Life - Etapa 1'],
          ['Sin información', <?php echo $jazz_life_1_sin; ?> ],
          ['No contactados', <?php echo $jazz_life_1_noCon; ?> ],
          ['Contactados', <?php echo $jazz_life_1_con; ?>  ],
          ['Agendados', <?php echo $jazz_life_1_agen; ?> ],
          ['Instalados', <?php echo $jazz_life_1_ins; ?> ],
          ['Con observación', <?php echo $jazz_life_1_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $jazz_life_1_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('jazz_life_1'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart6();
    });
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart7);

      function drawChart7() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN - Jazz Life - Etapa 1'],
          ['Sin información', <?php echo $jazz_life_2_sin; ?> ],
          ['No contactados', <?php echo $jazz_life_2_noCon; ?> ],
          ['Contactados', <?php echo $jazz_life_2_con; ?>  ],
          ['Agendados', <?php echo $jazz_life_2_agen; ?> ],
          ['Instalados', <?php echo $jazz_life_2_ins; ?> ],
          ['Con observación', <?php echo $jazz_life_2_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $jazz_life_2_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('jazz_life_2'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart7();
    });
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart8);

      function drawChart8() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'ILEBEN - Jazz Life - Etapa 3'],
          ['Sin información', <?php echo $jazz_life_3_sin; ?> ],
          ['No contactados', <?php echo $jazz_life_3_noCon; ?> ],
          ['Contactados', <?php echo $jazz_life_3_con; ?>  ],
          ['Agendados', <?php echo $jazz_life_3_agen; ?> ],
          ['Instalados', <?php echo $jazz_life_3_ins; ?> ],
          ['Con observación', <?php echo $jazz_life_3_pendiente; ?>],
          ['Instalados y capacitados', <?php echo $jazz_life_3_ins_cap; ?> ]
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

        var chart = new google.visualization.PieChart(document.getElementById('jazz_life_3'));

        chart.draw(data, options);
    }

    $(window).resize(function(){
        drawChart8();
    });
</script>

@endsection