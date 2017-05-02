              <form>
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
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" value="<?php echo $login; ?>" name="login" id="login" class="form-control" disabled placeholder="LOGIN">
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                    <div class="input-group has-success">
                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
                      <input type="text" value="<?php echo $password; ?>" name="password" id="password" class="form-control" disabled placeholder="password">
                    </div>
                  </div><!-- /.col --> 
                </div><!-- /.row -->
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <span class="input-group-addon has-success">USUARIO GUARDADO</span> 
                  <a type="button" href="<?php echo base_url(); ?>index.php/Usuarios/index" class="btn <?php echo $color; ?>">Finalizar</a>
                  
              </div>            
              </form>
       
