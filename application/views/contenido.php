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
                  <select id="estado_er" class="form-select">
                     <option value="0">Seleccione un estado</option>
                     <option value="19">Amazonas</option>
                     <option value="5">Anzoategui</option>
                     <option value="17">Apure</option>
                     <option value="1">Aragua</option>
                     <option value="9">Barinas</option>
                     <option value="3">Bolivar</option>
                     <option value="2">Carabobo</option>
                     <option value="22">Cojedes</option>
                     <option value="23">Delta Amacuro</option>
                     <option value="10">Distrito Capital</option>
                     <option value="12">Falcon</option>
                     <option value="13">Guarico</option>
                     <option value="6">Lara</option>
                     <option value="24">La Guaira</option>
                     <option value="20">Miranda</option>
                     <option value="18">Merida</option>
                     <option value="4">Monagas</option>
                     <option value="21">Nueva Esparta</option>
                     <option value="7">Portuguesa</option>
                     <option value="11">Sucre</option>
                     <option value="16">Tachira</option>
                     <option value="8">Trujillo</option>
                     <option value="14">Yaracuy</option>
                     <option value="15">Zulia</option>
                  </select> 
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
                    text:'Dosimetros Enviados y Recibidos Año <?php echo date("Y",time()) ?>'
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
    $("#estado_er").on("change",function(){
        let estado_er=$(this).val();
        if(estado_er>0){
            $.ajax({
                url:  base_url + '/Dosimetros/EnvRecib',
                type: 'POST',
                async: true,
                data: { estado: estado_er },
                success: function(respuesta) {
                    console.log(respuesta);
                    let enviados= respuesta.enviados;
                    let recibidos=respuesta.recibidos;
                    let env=enviados.split(',');
                    let rec=recibidos.split(','); 
                    let MONTHS = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"];
                    let config3 = {
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
                         text:'Dosimetros Enviados y Recibidos Año <?php echo date("Y",time()) ?>'
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
                myNewLine.destroy();
                myNewLine = new Chart(ctx2, config3);
            }  
            });
        }
    });
});
$(document).ready(function(){

});
</script>