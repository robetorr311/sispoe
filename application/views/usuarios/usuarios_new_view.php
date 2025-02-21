              <form>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div id="cont_codigo">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" name="codigo" value="<?php echo $codigo; ?>" id="codigo" class="form-control"  placeholder="CODIGO">
                      </div>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_nombre">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                      <input type="text" name="nombre" id="nombre" class="form-control"  placeholder="NOMBRE">
                    </div>
                  </div>  
                  </div><!-- /.col --> 
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                    <div id="cont_login">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="login" id="login" class="form-control"  placeholder="LOGIN">
                      </div>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_password">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
                      <input type="text" name="password" id="password" class="form-control"  placeholder="PASSWORD">
                    </div>
                  </div>  
                  </div><!-- /.col --> 
                </div><!-- /.row -->                
              </div>
              <div class="box-footer">
                  <button type="button" onclick="guardar();" class="btn <?php echo $color; ?>" >Guardar</button>
              </div>        
              </form>