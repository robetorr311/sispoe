          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Establecimientos</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablae" name="tablaestab"  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <?php
                    foreach ($tmpestable as $rowe):
                        ?>
                          <tbody>
                            <tr>
                              <td><?php echo $rowe->idestablecimiento; ?></td>
                              <td><?php echo $rowe->establecimiento; ?></td>
                              <td><a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="bestablecimiento('<?php echo $rowe->idestablecimiento; ?>','<?php echo $rowe->idpersonal; ?>');">Borrar</a></td>
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
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Establecimientos, Servicios y Cargos</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablac" name="tablaestab"  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>
                        <th>Cargo</th>                        
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <?php
                    foreach ($tmppersp as $rowc):
                        ?>
                          <tbody>
                            <tr>
                              <td><?php echo $rowc->idestablecimiento; ?></td>
                              <td><?php echo $rowc->establecimiento; ?></td>
                              <td><?php echo $rowc->servicio; ?></td>
                              <td><?php echo $rowc->cargo; ?></td>
                              <td><a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="bcargo('<?php echo $rowc->id; ?>','<?php echo $rowc->idpersonal; ?>');">Borrar</a></td>
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
