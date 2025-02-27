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
                  <div id="cont_telefono">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                      <input type="text" value="<?php echo $telefono; ?>" class="form-control"  name="telefono" id="telefono" placeholder="TELEFONO" data-inputmask='"mask": "(999) 9999999"' data-mask>
                    </div>
                  <script type="text/javascript">
                    $("#telefono").inputmask({"mask": "(999) 999-9999"});
                  </script>                     
                  </div>  
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_correo">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" value="<?php echo $correo; ?>" class="form-control"  name="correo" id="correo" placeholder="CORREO">
                    </div>
                  </div>  
                  </div><!-- /.col --> 
                </div><!-- /.row --> 
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_director">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                      <input type="text" value="<?php echo $director; ?>" name="director"  id="director" class="form-control"  placeholder="DIRECTOR">
                    </div>
                  </div>  
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_servicio">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="practica" id="practica"  class="form-control select2">
                      <option value="0">SELECCIONE SERVICIO</option>
                        <?php echo $servicios; ?>
                        </select>
                        <button type="button"   class="btn <?php echo $color; ?>" onclick="spractica();">Agregar</button>
                    </div><!-- /.form-group --<!-- /.col -->
                  </div>
                  </div>                                  
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_rif">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                      <input type="text" name="rif"  id="rif" class="form-control" value <?php if(!empty($rif)) { echo $rif; } ?> placeholder="RIF">
                    </div>
                  </div>
                  </div><!-- /.col -->                               
                </div><!-- /.row -->                 
                  <div id="tablapractica">
                  <?php if(!empty($tmppractica)){ ?>
                    <div class="row">
                      <div class="col-xs-12">          
                        <div class="box">
                          <div class="box-header  bg-aqua">
                            <h3 class="box-title">Listado de Servicios</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body table-responsive">
                            <table id="tablapr" name="tablae"  class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Practica</th>
                                  <th>Controles</th>
                                </tr>
                              </thead>
                              <?php
                              foreach ($tmppractica as $row):
                                  ?>
                                    <tbody>
                                      <tr>
                                        <td><?php echo $row->idpractica; ?></td>
                                        <td><?php echo $row->practica; ?></td>
                                        <td><a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="bpractica('<?php echo $row->idpractica; ?>','<?php echo $row->idestablecimiento; ?>');">Borrar</a></td>
                                      </tr>
                                    </tbody>                        
                                  <?php
                                  endforeach;
                                  ?>
                            </table>
                          </div><!-- /.box-body -->
                        </div><!-- /.box -->  
                      </div><!-- /.col -->
                    </div><!-- /.row --> 
                    <?php } ?>                  
                  </div>          
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_direccion">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                      <textarea class="form-control"  name="direccion" id="direccion" placeholder="DIRECCION"><?php echo $direccion; ?></textarea>
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
                          <?php echo $municipios; ?>
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
                          <?php echo $parroquias; ?>
                          </select>
                        </div>
                      </div><!-- /.form-group --<!-- /.col -->
                  </div>
                  </div>             
                </div><!-- /.row -->                               
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <button type="button" onclick="guardar();" class="btn <?php echo $color; ?>">Guardar</button>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Establecimientos/index" class="btn <?php echo $color; ?>">Cancelar</a>                    
              </div>            
              </form>