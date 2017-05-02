    <section class="content">
        <?php echo $boxes; ?>
        <div id="mod"></div>    
          <div class="row">
            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header">
                  <h3 class="box-title text-danger">Personal Activo</h3>
                </div><!-- /.box-header -->
                <div class="box-body text-center">
                  <div class="chart">
                    <canvas id="myChartPie" width="50" height="50"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-6">            
              <div class="box box-solid">
                <div class="box-header">
                  <h3 class="box-title text-danger">Dosimetros Enviados y Recibidos</h3>
                </div><!-- /.box-header -->
                <div class="box-body text-center">
                  <div class="chart">
                    <canvas id="myChartline" width="50" height="50"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->            
    </section><!-- /.content --> 
    <script src="<?php echo base_url(); ?>assets/js/Chart.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/utils.js"></script>               
    <script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>      
<script>
$(function () {
  respuesta="<?php echo $mascfem; ?>";
  enviados="<?php echo $enviados; ?>";
  recibidos="<?php echo $recibidos; ?>";  
  var cant = respuesta.split(','); 
  var env=enviados.split(',');
  var rec=recibidos.split(','); 
  var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    cant[1],
                    cant[0],
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.blue,
                ],
                label: 'Personal'
            }],
            labels: [
                "Femenino",
                "Masculino"
            ]
        },
        options: {
            responsive: true
        }
    };
      var ctx = $("#myChartPie").get(0).getContext("2d");
      var myNewChart = new Chart(ctx, config);

        var MONTHS = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"];
        var config2 = {
            type: 'line',
            data: {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                datasets: [{
                    label: "Enviados",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [env[0], 
                        env[1], 
                        env[2], 
                        env[3], 
                        env[4], 
                        env[5],
                        env[6], 
                        env[7], 
                        env[8],  
                        env[9], 
                        env[10], 
                        env[11]],
                    fill: false,
                }, {
                    label: "Recibidos",
                    fill: false,
                    backgroundColor: window.chartColors.green,
                    borderColor: window.chartColors.green,
                    data: [rec[0], 
                        rec[1], 
                        rec[2], 
                        rec[3], 
                        rec[4], 
                        rec[5],
                        rec[6], 
                        rec[7], 
                        rec[8],  
                        rec[9], 
                        rec[10], 
                        rec[11]
                    ],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Dosimetros Enviados y Recibidos Año 2017'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Meses'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Dosimetros'
                        }
                    }]
                }
            }
        };
           var ctx2 = $("#myChartline").get(0).getContext("2d");
           var myNewLine = new Chart(ctx2, config2);
});

</script>