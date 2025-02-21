                <form id="personal" name="personal">
                  <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                      <div class="box box-default">
                        <div class="box-header with-border <?php echo $color; ?>">
                          <h3 class="box-title">
                          Datos Basicos           
                          </h3>
                        </div><!-- /.box-header -->                    
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div id="cont_codigo">
                                <div class="input-group has-success">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                  <input type="text" name="codigo" id="codigo" class="form-control" disabled value="<?php echo $codigo; ?>" placeholder="CODIGO">
                                </div>
                              </div>
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_pnombre">
                              <div class="input-group has-success">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="pnombre" id="pnombre" class="form-control" disabled value="<?php echo $pnombre; ?>" placeholder="P. NOMBRE">
                              </div>
                            </div>  
                            </div><!-- /.col --> 

                          <div class="col-md-6">
                            <div id="cont_snombre">
                              <div class="input-group has-success">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="snombre" id="snombre" class="form-control" disabled value="<?php echo $snombre; ?>" placeholder="S. NOMBRE">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_papellido">
                              <div class="input-group has-success">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="papellido" id="papellido" class="form-control" disabled value="<?php echo $papellido; ?>" placeholder="P. APELLIDO">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          <div class="col-md-6">
                            <div id="cont_sapellido">
                              <div class="input-group has-success">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="sapellido" id="sapellido" class="form-control" disabled value="<?php echo $sapellido; ?>" placeholder="S. APELLIDO">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_cedula">
                              <div class="input-group has-success">
                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                <input type="text" name="cedula" id="cedula" class="form-control" disabled value="<?php echo $cedula; ?>" placeholder="CEDULA">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          <div class="col-md-6">
                            <div id="cont_sexo">
                              <div class="input-group has-success">
                                <span class="input-group-addon"><i class="fa fa-intersex"></i></span>
                                <select name="sexo" id="sexo" class="form-control" disabled>
                                <?php
                                if($sexo=='M'){ 
                                ?>
                                <option selected value="M">MASCULINO</option>
                                <?php
                              }
                              else {
                              ?>
                                <option selected value="F">FEMENINO</option>
                              <?php
                            }
                              ?>
                              <option value="M">MASCULINO</option>
                              <option value="F">FEMENINO</option>
                                </select>
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-xs-12">
                            <div id="cont_fecha">
                              <div class="input-group has-success">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="fecha" id="fecha" class="form-control" disabled value="<?php echo $fecha; ?>" placeholder="FECHA DE NACIMIENTO -- dd/mm/yyyy --">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_correo">
                                <div class="input-group has-success">
                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                  <input type="text" name="correo" id="correo" class="form-control" disabled value="<?php echo $correo; ?>" placeholder="CORREO">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_telefono">
                                <div class="input-group has-success">
                                  <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                  <input type="text" name="telefono" id="telefono" class="form-control" disabled value="<?php echo $telefono; ?>" placeholder="TELEFONO">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row --> 
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_activo">
                                <div class="input-group has-success">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <input type="radio" name="activo" id="activo" class="form-control" value="20" disabled checked> Activo
                                  <input type="radio" name="activo" id="activo" class="form-control" value="21" disabled > No Activo
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->                                                    
                        </div><!-- /.box body datos personales -->
                      </div><!-- /.box datos personales -->
                    </div><!-- col-md-6 lado izquierdo-->
                    <div class="col-md-6">
                      <div class="box box-default">
                        <div class="box-header with-border <?php echo $color; ?>">
                          <h3 class="box-title">
                          Datos Complementarios           
                          </h3>
                        </div><!-- /.box-header -->                    
                        <div class="box-body">
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_nacionalidad">
                                <div class="input-group has-success">
                                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                  <select name="nacionalidad" id="nacionalidad" class="form-control" disabled value="<?php echo $codigo; ?>">
                                  <option selected value="0">NACIONALIDAD</option>
                                <?php
                                if($nacionalidad=='V'){ 
                                ?>
                                <option selected value="V">VENEZOLANO(A)</option>
                                <?php
                              }
                              else {
                              ?>
                                <option selected value="E">EXTRANJERO(A)</option>
                              <?php
                            }
                              ?>
                              <option selected value="V">VENEZOLANO(A)</option>
                              <option selected value="E">EXTRANJERO(A)</option>
                                </select>                                  
                                  </select>
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_pais">
                                <div class="input-group has-success">
                                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                  <select name="pais" id="pais" class="form-control" disabled>
                                  <option selected value="0">PAIS DE NACIMIENTO</option>
                                  <?php echo $paises; ?>
                                  </select>
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_lugar">
                                <div class="input-group has-success">
                                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                  <input type="text" name="lugar" id="lugar" class="form-control" disabled value="<?php echo $lugar; ?>" placeholder="LUGAR DE NACIMIENTO">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_profesion">
                                <div class="input-group has-success">
                                  <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                  <input type="text" name="profesion" id="profesion" class="form-control" disabled value="<?php echo $profesion; ?>">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_especialidad">
                                <div class="input-group has-success">
                                  <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                  <input type="text" name="especialidad" id="especialidad" class="form-control" disabled value="<?php echo $especialidad; ?>">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                            <div id="cont_direccion">
                              <div class="input-group has-success">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                <textarea class="form-control" disabled name="direccion" id="direccion" placeholder="DIRECCION"><?php echo $direccion; ?></textarea>
                              </div>
                            </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                        </div><!-- /.box body datos complementarios -->
                        </div><!-- /.box datos complementarios -->                    
                    </div><!-- col-md-6 lado derecho-->            
                  </div><!-- row -->                          
              <div class="box-footer">
                  <span class="input-group-addon has-success">PERSONAL GUARDADO</span> 
                  <a type="button" href="<?php echo base_url(); ?>index.php/Personal/index" class="btn <?php echo $color; ?>">Finalizar</a>
                  
              </div>  
                </form> <!-- /.Cierre de Formulario -->
