                  <div class="box box-default">
                    <div class="box-header with-border <?php echo $color; ?>">
                      <h3 class="box-title">
                        Cargos por Establecimiento          
                      </h3>
                    </div><!-- /.box-header --> 
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div id="cont_estable">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                              <input type="hidden" name="idpersonalc" id="idpersonalc" value="<?php if(!empty($codigo)) { echo $codigo; } ?>">
                              <select name="establecimientoc" id="establecimientoc"  class="form-control select2" <?php if(!empty($disabled)) { echo $disabled; } ?> onchange="sservicios();">
                              <option value="0">SELECCIONE ESTABLECIMIENTO</option>
                              <?php
                              if(!empty($tmpestable)) {
                                foreach ($tmpestable as $row2):
                                ?>
                                  <option value="<?php echo $row2->idestablecimiento; ?>"><?php echo $row2->establecimiento; ?></option> 
                              <?php
                                endforeach;
                              }
                              ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div id="cont_servicio">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                              <select name="servicio" id="servicio" <?php if(!empty($disabled)) { echo $disabled; } ?>  class="form-control select2">
                              <option value="0">SELECCIONE SERVICIO</option>
                              <?php if(!empty($servicios)) { echo $servicios; } ?>
                              </select>
                            </div>
                          </div>
                        </div>                                                           
                      </div><!-- /.row -->
                      <div class="row">
                        <div class="col-md-6">
                          <div id="cont_cargos">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                              <select name="cargo" <?php if(!empty($disabled)) { echo $disabled; } ?> id="cargo"  class="form-control select2">
                              <option value="0">SELECCIONE CARGO</option>
                            <?php
                              if(!empty($cargos)){ echo $cargos; }
                            ?>
                              </select>
                              <button type="button" <?php if(!empty($disabled)) { echo $disabled; } ?>  class="btn <?php echo $color; ?>" onclick="guardar_cargo();">Agregar</button>
                          </div>
                        </div>
                      </div>                                  
                    </div><!-- /.row -->
                    <div id="tablacargo">
                    <?php
                      if(!empty($tmppersp)){
                    ?>
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
                                        <td><a type="button" <?php if(!empty($disabled)) { echo $disabled; } ?> class="btn btn-block <?php echo $color; ?> btn-xs" onclick="bcargo('<?php echo $row->idcargo; ?>','<?php echo $row->idpersonal; ?>');">Borrar</a></td>
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

                    <?php
                      }
                    ?>

                    </div>                             
                  </div><!-- /.box -->                  
                </div><!-- /.box -->  