              <form id="formulario" name="formulario">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group has-success">
                      <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                      <input type="text" value="<?php echo $codigo; ?>" name="codigo" id="codigo" class="form-control" disabled placeholder="CODIGO">
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                    <div class="input-group has-success">
                      <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                      <input type="text" value="<?php echo $nombre; ?>" name="nombre" id="nombre" class="form-control" disabled placeholder="NOMBRE">
                    </div>
                  </div><!-- /.col --> 
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group has-success">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="padres" id="padres" disabled class="form-control select2">
                        <?php echo $padres; ?>
                        </select>
                    </div><!-- /.form-group --<!-- /.col -->
                  </div>                                  
                </div><!-- /.row -->                         
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <span class="input-group-addon has-success">SERVICIO GUARDADO</span> 
                  <a type="button" href="<?php echo base_url(); ?>index.php/Servicios/index" class="btn <?php echo $color; ?>">Finalizar</a>
                  
              </div>            
              </form>
       
