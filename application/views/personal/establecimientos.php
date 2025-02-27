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
                              <td><a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="bpractica('<?php echo $row->idestablecimiento; ?>','<?php echo $codigo; ?>');">Borrar</a></td>
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
            <div class="col-md-6">
              <div id="cont_cedula">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                    <select name="cargestab" id="cargestab" class="form-control" disabled >
                      <option value="0">ESTABLECIMIENTOS</option>
                        <?php
                        foreach ($tmpestablecimiento as $row):
                        ?>
                          <option value="<?php echo $row->idestablecimiento; ?>"><?php echo $row->establecimiento; ?></option>                
                        <?php
                        endforeach;
                        ?>                      
                    </select>
                </div>
              </div>  
            </div><!-- /.col --> 
            <div class="col-md-6">
              <div id="cont_sexo">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-intersex"></i></span>
                    <select name="cargo" id="cargo" class="form-control" disabled >
                    <option selected value="0">CARGOS</option>
                      <?php echo $cargos; ?>
                    </select>
                    <button type="button" disabled  class="btn <?php echo $color; ?>" onclick="gcargo();">Agregar</button>                    
                </div>
              </div>  
            </div><!-- /.col --> 
          </div><!-- /.row --> 
          <div id="tablacargo">
          </div>        