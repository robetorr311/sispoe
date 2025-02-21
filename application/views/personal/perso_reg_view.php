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
                                  <input type="text" name="codigo" id="codigo" class="form-control" disabled value="<?php echo $codigo; ?>" placeholder="CODIGO">
                                </div>
                              </div>
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_pnombre">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="pnombre" id="pnombre" class="form-control" disabled value="<?php echo $pnombre; ?>" placeholder="P. NOMBRE">
                              </div>
                            </div>  
                            </div><!-- /.col --> 

                          <div class="col-md-6">
                            <div id="cont_snombre">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="snombre" id="snombre" class="form-control" disabled value="<?php echo $snombre; ?>" placeholder="S. NOMBRE">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_papellido">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="papellido" id="papellido" class="form-control" disabled value="<?php echo $papellido; ?>" placeholder="P. APELLIDO">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          <div class="col-md-6">
                            <div id="cont_sapellido">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="sapellido" id="sapellido" class="form-control" disabled value="<?php echo $sapellido; ?>" placeholder="S. APELLIDO">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_cedula">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                <input type="text" name="cedula" id="cedula" class="form-control" disabled value="<?php echo $cedula; ?>" placeholder="CEDULA">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          <div class="col-md-6">
                            <div id="cont_sexo">
                              <div class="input-group">
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
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="fecha" id="fecha" class="form-control" disabled value="<?php echo $fecha; ?>" placeholder="FECHA DE NACIMIENTO -- dd/mm/yyyy --">
                                <script type="text/javascript">
                                $("#fecha").datepicker();
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
                                  <input type="text" name="correo" id="correo" class="form-control" disabled value="<?php echo $correo; ?>" placeholder="CORREO">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_telefono">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                  <input type="text" name="telefono" id="telefono" class="form-control" disabled value="<?php echo $telefono; ?>" placeholder="TELEFONO">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->  
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_activo">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <?php if($estatus==20){
                                  ?>
                                  <input type="radio" name="activo" id="activo" value="20" disabled checked> Activo
                                  <input type="radio" name="activo" id="inactivo" value="21" disabled > No Activo
<?php
                                  } else { ?>
                                  <input type="radio" name="activo" id="activo" value="20" disabled > Activo
                                  <input type="radio" name="activo" id="inactivo" value="21" disabled checked> No Activo
<?php } ?>                                
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
                                  <input type="text" name="nacionalidad" id="nacionalidad" class="form-control" disabled placeholder="NACIONALIDAD" value="<?php if(!empty($nacionalidad)) { echo $nacionalidad; } else { echo "VENEZOLANO"; } ?>">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_pais">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                  <input type="text" name="pais" id="pais" class="form-control" disabled placeholder="PAIS DE NACIMIENTO"  value="<?php if(!empty($pais)) { echo $pais; } else { echo "VENEZUELA"; } ?>">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_lugar">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                  <input type="text" name="lugar" id="lugar" class="form-control" disabled value="<?php echo $lugar; ?>" placeholder="LUGAR DE NACIMIENTO">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_profesion">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                  <input type="text" name="profesion" id="profesion" class="form-control" disabled value="<?php echo $profesion; ?>" placeholder="PROFESION">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_especialidad">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                  <input type="text" name="especialidad" id="especialidad" class="form-control" disabled value="<?php echo $especialidad; ?>"placeholder="ESPECIALIDAD" >
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                            <div id="cont_direccion">
                              <div class="input-group">
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
                            <select name="establecimientos" disabled id="establecimientos" class="form-control">
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
                            <select name="servicios" disabled id="servicios" class="form-control">
                            <option value="0">SELECCIONE SERVICIO</option>
                            <?php echo $servicios; ?>
                            </select>
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
                            <select name="cargos" id="cargos" disabled class="form-control">
                            <option value="0">SELECCIONE CARGO</option>
                            <?php echo $cargos; ?>
                            </select>
                          </div>
                        </div>
                      </div>                 
                    </div>
                    <div class="col-md-6">                                     
                            <button type="button" class="btn disabled <?php echo $color; ?>" onclick="guardar_establecimiento();">Agregar</button>
                    </div>                                        
                  </div>
                  <div id="tble">
<?php if(!empty($tmpestable)){ ?>
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Establecimientos</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablae" name="tablaestab"  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <?php
                    foreach ($tmpestable as $rowe):
                        ?>
                          <tbody>
                            <tr>
                              <td><?php echo $rowe->idestablecimiento; ?></td>
                              <td><?php echo $rowe->establecimiento; ?></td>
                              <td><a type="button" disabled class="btn btn-block <?php echo $color; ?> btn-xs" onclick="bestablecimiento('<?php echo $rowe->idestablecimiento; ?>','<?php echo $rowe->idpersonal; ?>');">Borrar</a></td>
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
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Establecimientos, Servicios y Cargos</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablac" name="tablaestab"  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>
                        <th>Cargo</th>                        
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <?php
                    foreach ($tmppersp as $rowc):
                        ?>
                          <tbody>
                            <tr>
                              <td><?php echo $rowc->idestablecimiento; ?></td>
                              <td><?php echo $rowc->establecimiento; ?></td>
                              <td><?php echo $rowc->servicio; ?></td>
                              <td><?php echo $rowc->cargo; ?></td>
                              <td><a type="button" disabled class="btn btn-block <?php echo $color; ?> btn-xs" onclick="bcargo('<?php echo $rowc->id; ?>','<?php echo $rowc->idpersonal; ?>');">Borrar</a></td>
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
                  </div>
                  </div>                     
                  <div class="row">
                    <div class="col-xs-12">
                    <div class="input-group">
                        <a type="button" class="btn <?php echo $color; ?>" onclick="modalantecedentes('<?php if(!empty($codigo)) { echo $codigo; } ?>','3');" class="btn btn-block btn-warning btn-xs">Antecedentes</a>               
                    </div>
                    </div>                    
                  </div>                 
                  <div id="resp"></div>                            
                  <div class="box-footer">
                    <button type="button" class="btn <?php echo $color; ?>" onclick="editar('<?php echo $codigo; ?>');">Modificar</button>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Personal/index" class="btn <?php echo $color; ?>">Cancelar</a>
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
</form> <!-- /.Cierre de Formulario -->
