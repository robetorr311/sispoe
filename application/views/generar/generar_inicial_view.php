    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">      
    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/plugins/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/generar/generar.js"></script>
<script type="text/javascript">
$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);  
</script>
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Generar Dosimetros para personal ocupacionalmente expuesto a radiaciones            
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
              <form id="formulario" name="formulario">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div id="cont_fechai">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control pull-right" id="fechai" name="fechai" placeholder="Inicio de Control -- dd/mm/yyyy --">
                        <script type="text/javascript">
                        $("#fechai").datepicker();
                        </script>                          
                      </div>
                    </div>  
                  </div><!-- /.col -->
                  <div class="col-md-6">
                    <div id="cont_fechaf">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control pull-right" id="fechaf" name="fechaf" placeholder="Fin de Control -- dd/mm/yyyy --">
                          <script type="text/javascript">
                          $("#fechaf").datepicker();
                          </script>                          
                      </div>
                    </div>  
                  </div><!-- /.col -->                   
                </div><!-- /.row --> 
                <div class="row">
                  <div class="col-xs-12">
                    <div id="cont_estudio">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
                            <select name="estudio" id="estudio"  class="form-control select2">
                            <option value="0">SELECCIONE TIPO DE LECTURA</option>
                            <?php echo $estudio; ?>                       
                            </select>
                      </div>
                    </div>
                  </div><!-- /.col -->
                </div><!-- /.row -->                              
                <div class="row">
                  <div class="col-xs-12">
                    <div id="cont_tipo">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                            <select name="tipo" id="tipo"  class="form-control select2">
                            <option value="0">SELECCIONE OPCION</option>
                            <option value="1">GENERAR PARA TODO EL PERSONAL</option>
                            <option value="2">GENERAR PARA PERSONAL ADSCRITO A UN ESTABLECIMIENTO</option>
                            <option value="3">GENERAR PARA PERSONAL ADSCRITO A UN ESTADO</option>                                                        
                            </select>
                      </div>
                    </div>
                  </div><!-- /.col -->
                </div><!-- /.row -->                                               
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <button type="button"  class="btn <?php echo $color; ?>" onclick="stipo();">Continuar</button>
              </div> 
              <div id="cont_validado">
              </div>           
              </form>
            </div><!-- /.container -->
        <!-- Modal -->         
          </div><!-- /.box -->                
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Envios Realizados</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tablae" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Numero</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Numero</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Controles</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($listado as $row): ?>            
            <tr>
                        <td><?php echo $row->numero; ?></td>
                        <td><?php echo $row->origen; ?></td>
                        <td><?php echo $row->destino; ?></td>
                        <td><?php 
                $fechan=$row->fecha;
                $fec=explode('-',$fechan);
                if(strlen($fec[0])==4){
                      $fecha=$fec[2].'-'.$fec[1].'-'.$fec[0];
                }
                echo $fecha;
                ?></td>
                        <td><?php echo $row->estatus; ?></td>
                <td><a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="anular('<?php echo $row->id; ?>');">Anular</a>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Generar/tarjetas?id=<?php echo $row->id; ?>" target="blank" class="btn btn-block <?php echo $color; ?> btn-xs">Imprimir</a>

                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>

                </table>
                <script type="text/javascript">    
                  $(document).ready(function(){
                  $('#tablae').DataTable({
                    "oPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false,
                    "lengthMenu":[[10,25,50,100,200,-1],[10,25,50,100,200,"All"]]   
                  });
                });
                </script>                  
                </div><!-- /.box-body -->
                </div>
              </div><!-- /.box -->  
            </div><!-- /.col -->
          </div><!-- /.row -->
                         
  </section><!-- /.content --> 


    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>

    
      <!-- Javascripts - Jquerys -->
    <!-- DataTables -->
       
