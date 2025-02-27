    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   
      
    <script src="<?php echo base_url(); ?>assets/js/lecturas/lecturas.js"></script>
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Lectura de Dosimetros             
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
              <form name="formulario" id="formulario" enctype='multipart/form-data' method="post" action="<?php echo base_url(); ?>index.php/Lecturas/lectura">
                <div class="row">
                  <div class="col-xs-12">          
                    <div class="box">
                      <div class="box-header  <?php echo $color; ?>">
                        <h3 class="box-title">Importar datos provenientes de archivos de extension (.asc)</h3>
                      </div>
                      <div class="box-body">
                      <div class="row">
                        <div class="col-xs-12">
                        <?php 
                        if (empty($e)){
                        ?>
                          <div id="cont_file">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input type="file" name="archivo" > 
                            </div>
                          </div>
<?php
                        }
                        else{
?>
                          <div id="cont_file">
                            <div class="input-group has-error">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input type="file" name="archivo" > 
                              <?php if(!empty($error)) { echo $error; } ?>
                            </div>
                          </div>
<?php
                        }
?>
  
                        </div><!-- /.col -->
                        </div>                  
                      </div><!-- /.box-header -->
                      <div class="box-footer">
                          <input type="submit"  class="btn <?php echo $color; ?>" value="Continuar">
                      </div>                       
                    </div><!-- /.box -->  
                  </div><!-- /.col -->
                </div><!-- /.row -->      
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
                  <h3 class="box-title">Listado de Archivos Guardados en Sistema</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tablae" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Nombre de Archivo</th>
                        <th>Tipo</th>
                        <th>Tamaño</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nombre de Archivo</th>
                        <th>Tipo</th>
                        <th>Tamaño</th>
                        <th>Controles</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($listado as $row): ?>            
            <tr>
                        <td><?php echo $row->nombre; ?></td>
                        <td><?php echo $row->tipo; ?></td>
                        <td><?php echo $row->size; ?></td>
                <td><a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="download('<?php echo $row->id; ?>');">Descargar</a>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Lecturas/dosis?archivo=<?php echo $row->nombre; ?>" target="blank" class="btn btn-block <?php echo $color; ?> btn-xs">Valores</a>
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
       
