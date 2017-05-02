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
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                  <input type="text" name="codigo" id="codigo" disabled class="form-control" value="<?php echo $codigo; ?>" placeholder="CODIGO">
                                </div>
                              </div>
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_pnombre">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="pnombre" id="pnombre" class="form-control"  placeholder="P. NOMBRE">
                              </div>
                            </div>  
                            </div><!-- /.col --> 

                          <div class="col-md-6">
                            <div id="cont_snombre">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="snombre" id="snombre" class="form-control"  placeholder="S. NOMBRE">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_papellido">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="papellido" id="papellido" class="form-control"  placeholder="P. APELLIDO">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          <div class="col-md-6">
                            <div id="cont_sapellido">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="sapellido" id="sapellido" class="form-control"  placeholder="S. APELLIDO">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_cedula">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                <input type="text" name="cedula" id="cedula" class="form-control"  placeholder="CEDULA">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          <div class="col-md-6">
                            <div id="cont_sexo">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-intersex"></i></span>
                                <select name="sexo" id="sexo" class="form-control"  >
                                <option selected value="0">SEXO</option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                                </select>
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-xs-12">
                            <div id="cont_fecha">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="fecha" id="fecha" class="form-control"  placeholder="FECHA DE NACIMIENTO -- dd/mm/yyyy --">
                                <script type="text/javascript">
                                $("#fecha").datepicker({
                                yearRange: "1916:2026",
                                changeMonth: true,
                                changeYear: true });
                                </script> 
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_correo">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                  <input type="text" name="correo" id="correo" class="form-control"  placeholder="CORREO">
                                </div>                             
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_telefono">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                  <input type="text" name="telefono" id="telefono" class="form-control"  placeholder="TELEFONO">
                                <script type="text/javascript">
                                  $("#telefono").inputmask({"mask": "(999) 999-9999"});
                                </script>                                      
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
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                  <select name="nacionalidad" id="nacionalidad" class="form-control" >
                                  <option selected value="0">NACIONALIDAD</option>
                                  <option selected value="V">VENEZOLANO</option>
                                  <option selected value="E">EXTRANJERO</option>
                                  </select>
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_pais">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                  <select name="pais" id="pais" class="form-control"  >
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
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                  <input type="text" name="lugar" id="lugar" class="form-control"  placeholder="LUGAR DE NACIMIENTO">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_profesion">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                  <input type="text" name="profesion" id="profesion" class="form-control" placeholder="PROFESION" >
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_especialidad">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                  <input type="text" name="especialidad" id="especialidad" class="form-control" placeholder="ESPECIALIDAD">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                            <div id="cont_direccion">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                <textarea class="form-control"  name="direccion" id="direccion" placeholder="DIRECCION"></textarea>
                              </div>
                            </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                        </div><!-- /.box body datos complementarios -->
                        </div><!-- /.box datos complementarios -->                    
                    </div><!-- col-md-6 lado derecho-->            
                  </div><!-- row -->
                  <div class="box box-default">
                  <div class="box-header with-border <?php echo $color; ?>">
                  <h3 class="box-title">
                    Establecimiento y Servicio al que esta adscrito           
                  </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-group">
                        <div id="cont_estable">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                            <select name="establecimientos" id="establecimientos" class="form-control" onchange="fservicios();">
                            <option value="0">SELECCIONE ESTABLECIMIENTO</option> <?php echo $establecimientos; ?> 
                            </select>

                          </div>
                        </div>
                      </div>                 
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                        <div id="cont_servicios">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                            <div id="serv"><select name="servicios" id="servicios" class="form-control">
                            <option value="0">SELECCIONE SERVICIO</option>
                            <?php echo $servicios; ?>
                            </select></div>
                          </div>
                        </div>
                      </div>                 
                    </div>
                  </div>
                  <div class="row">                    
                    <div class="col-md-6">
                      <div class="input-group">
                        <div id="cont_cargos">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-files-o"></i></span>
                            <select name="cargos" id="cargos" class="form-control">
                            <option value="0">SELECCIONE CARGO</option>
                            <?php echo $cargos; ?>
                            </select>
                          </div>
                        </div>
                      </div>                 
                    </div>
                    <div class="col-md-6">                                     
                            <button type="button" class="btn <?php echo $color; ?>" onclick="guardar_establecimiento();">Agregar</button>
                    </div>                                        
                  </div>
                  <div id="tble">
                  </div>  
                  </div>
                  </div>                   
                  <div class="row">
                    <div class="col-xs-12">
                    <div class="input-group">
                        <a type="button" class="btn <?php echo $color; ?>" onclick="modalantecedentes('<?php if(!empty($codigo)) { echo $codigo; } ?>','2');" class="btn btn-block btn-warning btn-xs">Antecedentes</a>             
                    </div>
                    </div>                    
                  </div> 
                  <div id="resp"></div>                                 
                  <div class="box-footer">
                    <button type="button" class="btn <?php echo $color; ?>" onclick="guardar();">Guardar</button>
                    <button type="button" class="btn <?php echo $color; ?>" onclick="cancelar();">Cancelar</button>                    
                  </div>
<div id="container_antecedentes">                  
<!-- Modal Antecedentes content-->
<div id="antecedentes" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">FORMULARIO ANTECEDENTES</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn <?php echo $color; ?>" data-dismiss="modal">Cerrar</button>
        </div>
      </div> 
  </div>
</div>    <!-- /.Modal Antecedentes content-->
</div>         
</form>
            