    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">       
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">Lectura de Dosimetros           
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
             <form>
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Resultado de lectura de dosimetros</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tablal" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>Tarjeta</th>
                        <th>Personal</th>
                        <th>Dosis</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Fecha</th>
                        <th>Tarjeta</th>
                        <th>Personal</th>
                        <th>Dosis</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($lectura as $row): ?>            
            <tr>
                        <td><?php echo $row->fecha; ?></td>
                        <td><?php echo $row->tarjeta; ?></td>
                        <td><?php echo $row->personal; ?></td>
                        <td><?php echo $row->dosis; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>

                </table>
                <script type="text/javascript">    
                  $(document).ready(function(){
                  $('#tablal').DataTable({
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
          <div class="row">
            <div class="col-xs-12">          
                  <a type="button" href="<?php echo base_url(); ?>index.php/Lecturas/index" class="btn <?php echo $color; ?>">Finalizar</a>
                  
            </div>
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
                  <h3 class="box-title">Listado de Grupos de Dosimetros Asignados</h3>
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
       
