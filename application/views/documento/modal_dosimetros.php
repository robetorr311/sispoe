        <section class="content">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Dosimetros</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablae" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Numero</th>
                        <th>Tarjeta</th>
                        <th>Nombre</th>
                        <th>Servicio</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Numero</th>
                        <th>Tarjeta</th>
                        <th>Nombre</th>
                        <th>Servicio</th>
                        <th>Controles</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($dosimetros as $row): ?>            
            <tr class="dosimetropersona">
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->tarjeta; ?></td>
                <td><?php echo $row->personal; ?></td>
                <td><?php echo $row->servicio; ?></td>
                <td><input type="checkbox" class="check_box" data-id="<?php echo $row->id; ?>" name="dosimetropersona" id="dosimetropersona"></td>
            </tr>
          <?php endforeach; ?>
        </tbody>

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->  
            </div><!-- /.col -->
          </div><!-- /.row -->
                         
  </section><!-- /.content --> 