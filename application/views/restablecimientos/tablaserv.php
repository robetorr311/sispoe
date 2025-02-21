          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  bg-aqua">
                  <h3 class="box-title">Listado de Servicios</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablapr" name="tablae"  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Practica</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <?php
                    foreach ($tmppractica as $row):
                        ?>
                          <tbody>
                            <tr>
                              <td><?php echo $row->idpractica; ?></td>
                              <td><?php echo $row->practica; ?></td>
                              <td><a type="button" class="btn btn-block btn-primary btn-xs" onclick="bpractica('<?php echo $row->idpractica; ?>','<?php echo $row->idestablecimiento; ?>');">Borrar</a></td>
                            </tr>
                          </tbody>                        
                        <?php
                        endforeach;
                        ?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->  
            </div><!-- /.col -->
          </div><!-- /.row -->               