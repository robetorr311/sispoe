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
                        <th><h5>Rango</h5></th>
                        <th><h5>M</h5></th>
                        <th><h5>F</h5></th>
                      </tr>
                    </thead>
                  <tbody>
                  <?php $arr=explode(',', $filas); ?>
                  <tr><td><h6> < 25 </h6></td><td><h6><?php echo $arr[0]; ?></h6></td><td><h6><?php echo $arr[11]; ?></h6></td></tr>
                  <tr><td><h6> 25 - 29</h6></td><td><h6><?php echo $arr[1]; ?></h6></td><td><h6><?php echo $arr[12]; ?></h6></td></tr> 
                  <tr><td><h6> 30 - 34</h6></td><td><h6><?php echo $arr[2]; ?></h6></td><td><h6><?php echo $arr[13]; ?></h6></td></tr>
                  <tr><td><h6> 35 - 39</h6></td><td><h6><?php echo $arr[3]; ?></h6></td><td><h6><?php echo $arr[14]; ?></h6></td></tr>
                  <tr><td><h6> 40 - 44</h6></td><td><h6><?php echo $arr[4]; ?></h6></td><td><h6><?php echo $arr[15]; ?></h6></td></tr>
                  <tr><td><h6> 45 - 49</h6></td><td><h6><?php echo $arr[5]; ?></h6></td><td><h6><?php echo $arr[16]; ?></h6></td></tr>
                  <tr><td><h6> 50 - 54</h6></td><td><h6><?php echo $arr[6]; ?></h6></td><td><h6><?php echo $arr[17]; ?></h6></td></tr>
                  <tr><td><h6> 55 - 59</h6></td><td><h6><?php echo $arr[7]; ?></h6></td><td><h6><?php echo $arr[18]; ?></h6></td></tr> 
                  <tr><td><h6> 60 - 64</h6></td><td><h6><?php echo $arr[8]; ?></h6></td><td><h6><?php echo $arr[19]; ?></h6></td></tr> 
                  <tr><td><h6> > 65 </h6></td><td><h6><?php echo $arr[9]; ?></h6></td><td><h6><?php echo $arr[20]; ?></h6></td></tr>
                  <tr><td><h6>DESCONOCIDA</h6></td><td><h6><?php echo $arr[10]; ?></h6></td><td><h6><?php echo $arr[21]; ?></h6></td></tr>
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
                    <canvas id="myChart" width="200" height="200"></canvas>
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
      var ctx = $("#myChart").get(0).getContext("2d");
      var myNewChart = new Chart(ctx);
      var color = Chart.helpers.color;
       var data = {
          labels: ["< 25", "25 - 29", "30 - 34", "35 - 39", "40 - 44", "45 - 49", "50 - 54", "55 - 59","60 - 64", " > 65","Desconocida"],
          datasets: [
            {
              label: "Masculino",
              backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
              borderColor: window.chartColors.blue,
              borderWidth: 1,           
              data: [
              cant[0],
              cant[1],
              cant[2],
              cant[3],
              cant[4],
              cant[5],
              cant[6],
              cant[7],
              cant[8],
              cant[9],
              cant[10],
              cant[11]
              ]
            },
            {
              label: "Femenino",
              backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
              borderColor: window.chartColors.red,
              borderWidth: 1,            
              data: [cant[12],
              cant[13],
              cant[14],
              cant[15],
              cant[16],
              cant[17],
              cant[18],
              cant[19],
              cant[20],
              cant[21],
              cant[22]]
            }
          ]
        };
new Chart(ctx,{
                type: 'bar',
                data: data,
                options: {                
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grafico de Grupos de Edad y Sexo para el Personal Ocupacionalmente Expuesto a Radiaciones'
                    }
                }
            });
});

</script>

