              <form id="formulario" name="formulario">
              <div class="box-body">
                <div class="row">
                      <input type="hidden" value="<?php echo $codigo; ?>" name="codigo" id="codigo">
                  <div class="col-md-6">
                    <div class="input-group has-success">
                      <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                      <input type="text" value="<?php echo $nombre; ?>" name="nombre" id="nombre" class="form-control" disabled placeholder="NUMERO DE TARJETA">
                    </div>
                  </div><!-- /.col --> 
                  <div class="col-md-6">
                    <div class="input-group has-success">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="estatus" id="estatus" disabled class="form-control select2">
                        <?php echo $estatus; ?>
                        </select>
                    </div><!-- /.form-group --<!-- /.col -->
                  </div>                                  
                </div><!-- /.row -->                         
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <span class="input-group-addon has-success">TARJETA GUARDADA</span> 
                  <a type="button" href="<?php echo base_url(); ?>index.php/Dosimetros/index" class="btn <?php echo $color; ?>">Finalizar</a>
                  
              </div>            
              </form>
       
