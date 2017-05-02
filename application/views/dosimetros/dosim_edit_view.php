              <form id="formulario" name="formulario">
              <div class="box-body">
                <div class="row">              
                      <input type="hidden" value="<?php echo $codigo; ?>" name="codigo" id="codigo">
                  <div class="col-md-6">
                  <div id="cont_nombre">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                      <input type="text" value="<?php echo $nombre; ?>" name="nombre" id="nombre" class="form-control"  placeholder="NUMERO DE TARJETA">
                    </div>
                  </div>  
                  </div><!-- /.col --> 
                  <div class="col-md-6">
                  <div id="cont_estatus">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="estatus" id="estatus"  class="form-control select2">
                        <?php echo $estatus; ?>
                        </select>
                    </div><!-- /.form-group --<!-- /.col -->
                  </div>
                  </div>                                  
                </div><!-- /.row -->                 
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <button type="button" onclick="guardar();" class="btn <?php echo $color; ?>">Guardar</button>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Dosimetros/index" class="btn <?php echo $color; ?>">Cancelar</a>                    

              </div>            
              </form>