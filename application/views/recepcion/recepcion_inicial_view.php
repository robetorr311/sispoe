    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   
      
    <script src="<?php echo base_url(); ?>assets/js/recepcion/recepcion.js"></script>
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Recepcion de dosimetros por favor seleccione un documento de la lista:             
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
              <form>
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de dosimetros pendientes por recibir</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tablapend" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Numero</th>
                        <th>ID Personal</th>
                        <th>Nombre</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>                       
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Numero</th>
                        <th>ID Personal</th>
                        <th>Nombre</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>                       
                        <th>Controles</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($pendientes as $row): ?>            
            <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->idpersona; ?></td>
                        <td><?php echo $row->personal; ?></td>
                        <td><?php echo $row->establecimiento; ?></td>
                        <td><?php echo $row->servicio; ?></td>          
                <td>
                <a type="button" class="btn btn-block btn-warning btn-xs" onclick="dosimetro('<?php echo $row->id; ?>')">Recibir</a>
                </td>
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
            <div id="modaldosimetro" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Recibir Dosimetro</h4>
                  </div>
                  <div class="modal-body">

                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn <?php echo $color; ?>" data-dismiss="modal" >Cerrar</button>
                </div>              
                  </div>
                </div>    <!-- /.Modal Establecimientos content-->  
            </div>
        <!-- Main content -->

        <section class="content">
         <div id="dosim_recib">       
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Dosimetros Recibidos</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tablae" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Numero</th>
                        <th>ID Personal</th>
                        <th>Nombre</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>                 
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Numero</th>
                        <th>ID Personal</th>
                        <th>Nombre</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>                       
                        <th>Controles</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($listado as $row): ?>            
            <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->idpersona; ?></td>
                        <td><?php echo $row->personal; ?></td>
                        <td><?php echo $row->establecimiento; ?></td>
                        <td><?php echo $row->servicio; ?></td>
                <td>
                <a type="button" class="btn btn-block btn-warning btn-xs" onclick="datosdosimetro('<?php echo $row->id; ?>')">Ver Dosimetro</a>


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
          </div>                         
  </section><!-- /.content --> 


    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>

    
      <!-- Javascripts - Jquerys -->
    <!-- DataTables -->
       
