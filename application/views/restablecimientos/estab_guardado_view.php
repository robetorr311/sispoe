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
                      <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                      <input type="text" value="<?php echo $telefono; ?>" class="form-control" disabled name="telefono" id="telefono" placeholder="TELEFONO" data-inputmask='"mask": "(999) 9999999"' data-mask>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                    <div class="input-group has-success">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" value="<?php echo $correo; ?>" class="form-control" disabled name="correo" id="correo" placeholder="CORREO">
                    </div>
                  </div><!-- /.col --> 
                </div><!-- /.row --> 
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group has-success">
                      <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                      <input type="text" value="<?php echo $director; ?>" name="director"  id="director" class="form-control" disabled placeholder="DIRECTOR">
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                    <div class="input-group has-success">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="practica" id="practica" disabled class="form-control select2">
                      <option value="0">SELECCIONE SERVICIO</option>
                        <?php echo $servicios; ?>
                        </select>
                        <button type="button" disabled  class="btn btn-primary" onclick="spractica();">Agregar</button>
                    </div><!-- /.form-group --<!-- /.col -->
                  </div>                                  
                </div><!-- /.row -->
                  <div id="tablapractica">
                  
                  </div>          
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group has-success">
                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                      <textarea class="form-control" disabled name="direccion" id="direccion" placeholder="DIRECCION"><?php echo $direccion; ?></textarea>
                    </div>
                  </div><!-- /.col -->                  
                  <div class="col-md-6">
                    <div class="input-group has-success">
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                      <select name="estados" id="estados" disabled class="form-control select2" style="width: 100%;" onchange="smunicipios();">
                      <option value="0">SELECCIONE ESTADO</option>
                        <?php echo $estados; ?>
                      </select>
                    </div><!-- /.form-group --<!-- /.col -->
                  </div>
                </div><!-- /.row --> 
                <div class="row">
                  <div class="col-md-6">
                    <div id="muni">
                        <div class="input-group has-success">
                          <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                          <select name="municipios" disabled id="municipios" class="form-control select2" style="width: 100%;" onchange="sparroquias();">
                          <option value="0">SELECCIONE MUNICIPIO</option>
                          <?php echo $municipios; ?>
                          </select>
                        </div><!-- /.form-group --<!-- /.col -->
                    </div>
                  </div>                
                  <div class="col-md-6">
                      <div id="parr">                  
                        <div class="input-group has-success">
                          <span class="input-group-addon"><i class="fa fa-globe"></i></span>                      
                          <select name="parroquias" id="parroquias" disabled class="form-control select2" style="width: 100%;">
                          <option value="0">SELECCIONE PARROQUIA</option>
                          <?php echo $parroquias; ?>
                          </select>
                        </div>
                      </div><!-- /.form-group --<!-- /.col -->
                  </div>             
                </div><!-- /.row -->                               
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <span class="input-group-addon has-success">ESTABLECIMIENTO GUARDADO</span> 
                  <a type="button" href="<?php echo base_url(); ?>index.php/Establecimientos/index" class="btn btn-primary">Finalizar</a>
                  
              </div>            
              </form>
       
