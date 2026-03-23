<?php
if ($numerotar>0){
?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css"> 
          <form>
          <input type="hidden" name="iddoc" id="iddoc" value="<?php echo $iddoc; ?>"/> 
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Dosimetros Pendientes por Asignar</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tabladosim" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>                
                      <tr>
                        <th>Dosimetro</th>
                        <th>Establecimiento</th>
                        <th>Personal</th>
                        <th>Servicio</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Dosimetro</th>
                        <th>Establecimiento</th>
                        <th>Personal</th>
                        <th>Servicio</th>
                        <th>Controles</th>
                      </tr>
                    </tfoot>

                  <tbody>
                  <?php foreach ($vdosimetros as $row):
                  $doc = $row->iddocumento;

                  ?>            
                    <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->establecimiento; ?></td>
                            <td><?php echo $row->personal; ?></td>
                            <td><?php echo $row->servicio; ?></td>
                    <td>
                    <a type="button" onclick="dosimetro('<?php echo $row->id; ?>');" class="btn btn-block btn-warning btn-xs">Asignar</a>
                    </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
                <script type="text/javascript">    
                  $(document).ready(function(){
                  $('#tabladosim').DataTable({
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
                <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>                                 
                </div><!-- /.box-body -->
                </div>
              </div><!-- /.box -->  
            </div><!-- /.col -->
          </div><!-- /.row --> 
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
   <!-- /.Modal Establecimientos content-->  
          </form>
<?php
}
else
{
?>
          <form>
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <div class="row">
                  <div class="col-xs-12">                
                  <h3 class="box-title">No Existen Dosimetros Pendientes por Asignar</h3>
                  </div>
                  </div>
                  <div class="box-body">
                  <div class="row">
                  <div class="col-xs-12">
                  <a type="button"  href="<?php echo base_url(); ?>index.php/Asignar/index" class="btn btn-block btn-warning btn-xs">Finalizar</a>
                  </div>
                  </div>
                  </div>
                </div><!-- /.box-header -->
              
              </div>
            </div>
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

          </form>  
<?php
}
?>          