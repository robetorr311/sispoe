          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Cargos por Establecimiento</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablapersp" name="tablapersp"  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Cargo</th>
                        <th>Establecimiento</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <?php
                    foreach ($tmppersp as $row):
                        ?>
                          <tbody>
                            <tr>
                              <td><?php echo $row->idcargo; ?></td>
                              <td><?php echo $row->cargo; ?></td>
                              <td><?php echo $row->establecimiento; ?></td>
                              <td><a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="bcargo('<?php echo $row->idcargo; ?>','<?php echo $row->idpersonal; ?>');">Borrar</a></td>
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