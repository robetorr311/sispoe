<section class="content">
         <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Datos y Grafico          
              </h3>
            </div><!-- /.box-header -->
              <div class="box-body">         
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_tabla">
                    <div class="box box-default">
                      <div class="box-header with-border <?php echo $color; ?> ">
                        <h3 class="box-title">Datos Obtenidos</h3>
                      </div>
                    <div class="box-body table-responsive">
                  <table id="tablae" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th><h5>Meses</h5></th>
                        <th><h5>Enviados</h5></th>
                        <th><h5>Recibidos</h5></th>
                      </tr>
                    </thead>
                  <tbody>
                  <?php 
                  $env=explode(',', $enviados);
                  $rec=explode(',', $recibidos);
                   ?>
                  <tr><td><h6>Enero</h6></td><td><h6><?php echo $env[0]; ?></h6></td><td><h6><?php echo $rec[0]; ?></h6></td></tr>
                  <tr><td><h6>Febrero</h6></td><td><h6><?php echo $env[1]; ?></h6></td><td><h6><?php echo $rec[1]; ?></h6></td></tr>                  
                  <tr><td><h6>Marzo</h6></td><td><h6><?php echo $env[2]; ?></h6></td><td><h6><?php echo $rec[2]; ?></h6></td></tr>
                  <tr><td><h6>Abril</h6></td><td><h6><?php echo $env[3]; ?></h6></td><td><h6><?php echo $rec[3]; ?></h6></td></tr>
                  <tr><td><h6>Mayo</h6></td><td><h6><?php echo $env[4]; ?></h6></td><td><h6><?php echo $rec[4]; ?></h6></td></tr>                  
                  <tr><td><h6>Junio</h6></td><td><h6><?php echo $env[5]; ?></h6></td><td><h6><?php echo $rec[5]; ?></h6></td></tr>
                  <tr><td><h6>Julio</h6></td><td><h6><?php echo $env[6]; ?></h6></td><td><h6><?php echo $rec[6]; ?></h6></td></tr>
                  <tr><td><h6>Agosto</h6></td><td><h6><?php echo $env[7]; ?></h6></td><td><h6><?php echo $rec[7]; ?></h6></td></tr>                  
                  <tr><td><h6>Septiembre</h6></td><td><h6><?php echo $env[8]; ?></h6></td><td><h6><?php echo $rec[8]; ?></h6></td></tr>
                  <tr><td><h6>Ocrubre</h6></td><td><h6><?php echo $env[9]; ?></h6></td><td><h6><?php echo $rec[9]; ?></h6></td></tr>
                  <tr><td><h6>Noviembre</h6></td><td><h6><?php echo $env[10]; ?></h6></td><td><h6><?php echo $rec[10]; ?></h6></td></tr>                  
                  <tr><td><h6>Diciembre</h6></td><td><h6><?php echo $env[11]; ?></h6></td><td><h6><?php echo $rec[11]; ?></h6></td></tr>                                  
                  </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
                  </div>  
                  </div><!-- /.col --> 
                  <div class="col-md-6">
                  <div id="cont_grafico">
                    <div class="box box-default">
                      <div class="box-header with-border <?php echo $color; ?> ">
                        <h3 class="box-title">Grafico</h3>
                      </div>
                    <div class="box-body">                  
                  <div class="chart">
                    <canvas id="myChartline" width="200" height="200"></canvas>
                  </div>
                </div><!-- /.box-body -->
                </div><!-- /.box -->                  
                  </div>  
                  </div><!-- /.col -->                  
                </div><!-- /.row -->         
              </div>         
              </div>              
             <div class="box-footer">
             <div id="button_pdf">

              </div>
              </div>                       
</section>
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url(); ?>assets/js/Chart.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/utils.js"></script>   
<script>
$(function () {
  enviados="<?php echo $enviados; ?>";
  recibidos="<?php echo $recibidos; ?>";  
  var env=enviados.split(',');
  var rec=recibidos.split(',');   
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