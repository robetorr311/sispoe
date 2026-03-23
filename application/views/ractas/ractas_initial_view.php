    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   
      
    <script src="<?php echo base_url(); ?>assets/js/ractas/ractas.js"></script>
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
                        <th>Establecimiento</th>
                        <th>Periodo</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nro.</th>
                        <th>Establecimiento</th>
                        <th>Periodo</th>
                        <th>Controles</th>                        
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($listado as $row): ?>            
            <tr>
                        <td><h6><?php echo $row->iddocumento; ?></h6></td>
                        <td><h6><?php echo $row->establecimiento; ?></h6></td>
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
                <td><h6>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Ractas/acta?id=<?php echo $row->iddocumento; ?>" target="blank" class="btn btn-block <?php echo $color; ?> btn-xs">Acta de Entrega</a>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Ractas/constancia?id=<?php echo $row->iddocumento; ?>" target="blank" class="btn btn-block <?php echo $color; ?> btn-xs">Constancia de Entrega</a> 
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
       
