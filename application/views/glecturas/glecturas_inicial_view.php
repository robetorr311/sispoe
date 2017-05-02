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
                        <th><h5>Lecturas Realizadas</h5></th>
                      </tr>
                    </thead>
                  <tbody>
                  <?php 
                  $lec=explode(',', $lecturas);
                   ?>
                  <tr><td><h6>Enero</h6></td><td><h6><?php echo $lec[0]; ?></h6></td></tr>
                  <tr><td><h6>Febrero</h6></td><td><h6><?php echo $lec[1]; ?></h6></td></tr>                  
                  <tr><td><h6>Marzo</h6></td><td><h6><?php echo $lec[2]; ?></h6></td></tr>
                  <tr><td><h6>Abril</h6></td><td><h6><?php echo $lec[3]; ?></h6></td></tr>
                  <tr><td><h6>Mayo</h6></td><td><h6><?php echo $lec[4]; ?></h6></td></tr>                  
                  <tr><td><h6>Junio</h6></td><td><h6><?php echo $lec[5]; ?></h6></td></tr>
                  <tr><td><h6>Julio</h6></td><td><h6><?php echo $lec[6]; ?></h6></td></tr>
                  <tr><td><h6>Agosto</h6></td><td><h6><?php echo $lec[7]; ?></h6></td></tr>                  
                  <tr><td><h6>Septiembre</h6></td><td><h6><?php echo $lec[8]; ?></h6></td></tr>
                  <tr><td><h6>Ocrubre</h6></td><td><h6><?php echo $lec[9]; ?></h6></td></tr>
                  <tr><td><h6>Noviembre</h6></td><td><h6><?php echo $lec[10]; ?></h6></td></tr>                  
                  <tr><td><h6>Diciembre</h6></td><td><h6><?php echo $lec[11]; ?></h6></td></tr>                                  
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
  lecturas="<?php echo $lecturas; ?>";
  var lec=lecturas.split(',');
        var MONTHS = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"];
        var config2 = {
            type: 'line',
            data: {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                datasets: [{
                    label: "Lecturas",
                    backgroundColor: window.chartColors.yellow,
                    borderColor: window.chartColors.yellow,
                    data: [lec[0], 
                        lec[1], 
                        lec[2], 
                        lec[3], 
                        lec[4], 
                        lec[5],
                        lec[6], 
                        lec[7], 
                        lec[8],  
                        lec[9], 
                        lec[10], 
                        lec[11]],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Dosimetros Leidos Año 2017'
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