    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   
      
    <script src="<?php echo base_url(); ?>assets/js/asignar/asignar.js"></script>
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Asignar dosimetros para personal ocupacionalmente expuesto a radiaciones por favor seleccione un documento de la lista:             
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
              <form id="formulario" name="formulario">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Grupos de Dosimetros Pendientes por Asignar</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tablapend" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Numero</th>
                        <th>Codigo TOE</th>
                        <th>Personal</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>
                        <th>Periodo</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Numero</th>
                        <th>Codigo TOE</th>
                        <th>Personal</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>
                        <th>Periodo</th>
                        <th>Controles</th>                        
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($pendientes as $row): ?>            
            <tr>
                        <td><h6><?php echo $row->id; ?></h6></td>
                        <td><h6><?php echo $row->idpersona; ?></h6></td>
                        <td><h6><?php echo $row->personal; ?></h6></td>
                        <td><h6><?php echo $row->establecimiento; ?></h6></td>
                        <td><h6><?php echo $row->servicio; ?></h6></td>
                        <td><h6><?php 
                $fechain=$row->fechainicio;
                $feci=explode('-',$fechain);
                if(strlen($feci[0])==4){
                      $fechai=$feci[2].'-'.$feci[1].'-'.$feci[0];
                }
                $fechafn=$row->fechafin;
                $fecf=explode('-',$fechafn);
                if(strlen($fecf[0])==4){
                      $fechaf=$fecf[2].'-'.$fecf[1].'-'.$fecf[0];
                }
                echo 'de '.$fechai.' al '.$fechaf;
                ?></h6></td>
                <td><h6><!--<a type="button" class="btn btn-block btn-warning btn-xs" onclick="preparar('<?php echo $row->id; ?>');">Preparar</a>-->
                    <a type="button" onclick="fdosimetro();" class="btn btn-block btn-warning btn-xs">Asignar</a>                
                </h6></td>
            </tr>
          <?php endforeach; ?>
        </tbody>

                </table>
                <script type="text/javascript">    
                  $(document).ready(function(){
                  $('#tablapend').DataTable({
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
              </form>
            </div><!-- /.container -->
        <!-- Modal -->         
          </div><!-- /.box -->                
        </section>
          <div id="container_dosimetro" >
          <!-- Modal Establecimientos content-->
            <div id="modaldosimetro" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Asignar Dosimetro</h4>
                  </div>
                  <div class="modal-body">

                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning"  data-dismiss="modal" >Cerrar</button>
                </div>              
                  </div>
                </div>    <!-- /.Modal Establecimientos content-->  
            </div>
          </div>
        <!-- Main content -->
        <div id="lista">
        <section class="content">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Grupos de Dosimetros Asignados</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tablae" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Nro.</th>
                        <th>Cod. TOE</th>
                        <th>Personal</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>
                        <th>Periodo</th>
                        <th>Tarjeta</th>                      
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nro.</th>
                        <th>Cod. TOE</th>
                        <th>Personal</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>
                        <th>Periodo</th>
                        <th>Tarjeta</th> 
                        <th>Controles</th>                        
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($listado as $row): ?>            
            <tr>
                        <td><h6><?php echo $row->id; ?></h6></td>
                        <td><h6><?php echo $row->idpersona; ?></h6></td>
                        <td><h6><?php echo $row->personal; ?></h6></td>
                        <td><h6><?php echo $row->establecimiento; ?></h6></td>
                        <td><h6><?php echo $row->servicio; ?></h6></td>
                        <td><h6><?php 
                $fechain=$row->fechainicio;
                $feci=explode('-',$fechain);
                if(strlen($feci[0])==4){
                      $fechai=$feci[2].'-'.$feci[1].'-'.$feci[0];
                }
                $fechafn=$row->fechafin;
                $fecf=explode('-',$fechafn);
                if(strlen($fecf[0])==4){
                      $fechaf=$fecf[2].'-'.$fecf[1].'-'.$fecf[0];
                }
                echo 'de '.$fechai.' al '.$fechaf;
                ?></h6></td>
                        <td><h6><?php echo $row->tarjeta; ?></h6></td>
                <td><h6>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Asignar/acta?id=<?php echo $row->iddocumento; ?>" target="blank" class="btn btn-block btn-warning btn-xs">Acta de Entrega</a>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Asignar/constancia?id=<?php echo $row->iddocumento; ?>" target="blank" class="btn btn-block btn-warning btn-xs">Constancia de Entrega</a> 
                </h6></td>
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
  </div>

    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>

    
      <!-- Javascripts - Jquerys -->
    <!-- DataTables -->
       
