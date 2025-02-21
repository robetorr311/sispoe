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
                  <div id="cont_telefono">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                      <input type="text" class="form-control"  name="telefono" id="telefono" placeholder="TELEFONO" data-inputmask='"mask": "(999) 9999999"' data-mask>
                    </div>
                  </div>  
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_correo">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" class="form-control"  name="correo" id="correo" placeholder="CORREO">
                    </div>
                  </div>
                  </div><!-- /.col --> 
                </div><!-- /.row --> 
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_director">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                      <input type="text" name="director"  id="director" class="form-control"  placeholder="DIRECTOR">
                    </div>
                  </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_servicios">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="practica" id="practica"  class="form-control select2">
                      <option value="0">SELECCIONE SERVICIO</option>
                        <?php echo $servicios; ?>
                        </select>
                        <button type="button"   class="btn btn-primary" onclick="spractica();">Agregar</button>
                    </div>
                  </div>
                  </div>                                  
                </div><!-- /.row -->
                  <div id="tablapractica">
                  </div>         
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_direccion">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                      <textarea class="form-control"  name="direccion" id="direccion" placeholder="DIRECCION"></textarea>
                    </div>
                  </div>
                  </div><!-- /.col -->                  
                  <div class="col-md-6">
                  <div id="cont_estados">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                      <select name="estados" id="estados"  class="form-control select2" style="width: 100%;" onchange="smunicipios();">
                      <option value="0">SELECCIONE ESTADO</option>
                        <?php echo $estados; ?>
                      </select>
                    </div><!-- /.form-group --<!-- /.col -->
                  </div>
                  </div>
                </div><!-- /.row --> 
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_municipios">
                    <div id="muni">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                          <select name="municipios"  id="municipios" class="form-control select2" style="width: 100%;" onchange="sparroquias();">
                          <option value="0">SELECCIONE MUNICIPIO</option>
                          </select>
                        </div><!-- /.form-group --<!-- /.col -->
                    </div>
                  </div>
                  </div>                
                  <div class="col-md-6">
                  <div id="cont_parroquias">
                      <div id="parr">                  
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-globe"></i></span>                      
                          <select name="parroquias" id="parroquias"  class="form-control select2" style="width: 100%;">
                          <option value="0">SELECCIONE PARROQUIA</option>
                          </select>
                        </div>
                      </div><!-- /.form-group --<!-- /.col -->
                  </div>
                  </div>                                                        
              </div><!-- /.box-body -->
              </div>
              <div class="box-footer">
                  <button type="button" onclick="guardar();" class="btn btn-primary" >Guardar</button>
              </div>        
              </form>