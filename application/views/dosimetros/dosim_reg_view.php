              <form id="formulario" name="formulario">
              <div class="box-body">
                <div class="row">
                      <input type="hidden"  value="<?php echo $codigo; ?>"  name="codigo" id="codigo">
                  <div class="col-md-6">
                  <div id="cont_nombre">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                      <input type="text" disabled value="<?php echo $nombre; ?>" name="nombre" id="nombre" class="form-control"  placeholder="NUMERO DE TARJETA">
                    </div>
                  </div>
                  </div><!-- /.col --> 
                  <div class="col-md-6">
                  <div id="cont_padres">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-warning"></i></span>
                      <select name="estatus" id="estatus" disabled class="form-control select2">
                      <option value="0">SELECCIONE ESTATUS</option>
                        <?php echo $estatus; ?>
                        </select>
                    </div><!-- /.form-group --<!-- /.col -->
                  </div>
                  </div>                                  
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_tipo">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="tipo" id="tipo" disabled class="form-control select2">
                        <?php echo $tipos; ?>
                      </select>
                    </div>
                  </div>
                  </div>                                  
                </div><!-- /.row -->                                         
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <button type="button" class="btn <?php echo $color; ?>" onclick="editar('<?php echo $codigo; ?>');">Modificar</button>
                  <button type="submit" class="btn <?php echo $color; ?>" disabled >Guardar</button>                  
              </div>
              </form>







