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