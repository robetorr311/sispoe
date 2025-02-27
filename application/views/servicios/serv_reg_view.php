              <form id="formulario" name="formulario">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_codigo">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                      <input type="text" disabled value="<?php echo $codigo; ?>"  name="codigo" id="codigo" class="form-control"  placeholder="CODIGO">
                    </div>
                  </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_nombre">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                      <input type="text" disabled value="<?php echo $nombre; ?>" name="nombre" id="nombre" class="form-control"  placeholder="NOMBRE">
                    </div>
                  </div>
                  </div><!-- /.col --> 
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_padres">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="padres" id="padres" disabled class="form-control select2">
                      <option value="0">SELECCIONE PADRE</option>
                        <?php echo $padres; ?>
                        </select>
                    </div><!-- /.form-group --<!-- /.col -->
                  </div>
                  </div>                                  
                </div><!-- /.row -->                       
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <button type="button" class="btn <?php echo $color; ?>" onclick="editar('<?php echo $codigo; ?>');">Modificar</button>
                  <button type="submit" class="btn <?php echo $color; ?>" disabled >Guardar</button>                  
              </div>
              </form>







