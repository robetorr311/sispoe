              <form id="formulario" name="formulario">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_codigo">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                      <input type="text" value="<?php echo $codigo; ?>" disabled name="codigo" id="codigo" class="form-control"  placeholder="CODIGO">
                    </div>
                  </div>  
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_nombre">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                      <input type="text" value="<?php echo $nombre; ?>" name="nombre" id="nombre" class="form-control"  placeholder="NOMBRE">
                    </div>
                  </div>  
                  </div><!-- /.col --> 
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_servicio">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="padres" id="padres"  class="form-control select2">
                        <?php echo $padres; ?>
                        </select>
                    </div><!-- /.form-group --<!-- /.col -->
                  </div>
                  </div>                                  
                </div><!-- /.row -->                 
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <button type="button" onclick="guardar();" class="btn <?php echo $color; ?>">Guardar</button>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Servicios/index" class="btn <?php echo $color; ?>">Cancelar</a>                    
                    
              </div>            
              </form>