          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Establecimientos</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablapr" name="tablae"  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Establecimiento</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <?php
                    foreach ($tmpestablecimiento as $row):
                        ?>
                          <tbody>
                            <tr>
                              <td><?php echo $row->idestablecimiento; ?></td>
                              <td><?php echo $row->establecimiento; ?></td>
                              <td><a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="bpractica('<?php echo $row->idestablecimiento; ?>','<?php echo $row->idpersonal; ?>');">Borrar</a></td>
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