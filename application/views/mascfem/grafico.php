<input type="hidden" name="codigo" id="codigo" value="<?php echo $id; ?>">
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
                        <th><h5>Sexo</h5></th>
                        <th><h5>Cantidad</h5></th>
                      </tr>
                    </thead>
                  <tbody>
                  <?php $arr=explode(',', $filas); ?>
                  <tr><td><h6>M</h6></td><td><h6><?php echo $arr[0]; ?></h6></td></tr>
                  <tr><td><h6>F</h6></td><td><h6><?php echo $arr[1]; ?></h6></td></tr>
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
                    <canvas id="myChartPie" width="200" height="200"></canvas>
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
  var codigo=$('#codigo').val(); 
  respuesta="<?php echo $filas; ?>";
  var cant = respuesta.split(','); 
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

});

</script>

