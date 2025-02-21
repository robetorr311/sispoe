              <form>
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
                  <div id="cont_login">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" disabled value="<?php echo $login; ?>"  name="login" id="login" class="form-control"  placeholder="LOGIN">
                    </div>
                  </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_password">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
                      <input type="text" disabled value="<?php echo $password; ?>" name="password" id="password" class="form-control"  placeholder="PASSWORD">
                    </div>
                  </div>
                  </div><!-- /.col --> 
                </div><!-- /.row -->
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <button type="button" class="btn <?php echo $color; ?>" onclick="editar('<?php echo $codigo; ?>');">Modificar</button>
                  <button type="submit" class="btn <?php echo $color; ?>" disabled >Guardar</button>                  
              </div>
              </form>







