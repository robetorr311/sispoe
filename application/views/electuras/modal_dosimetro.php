                      <div id="cont_d"> 
                      <div class="box box-default">
                        <div class="box-header with-border <?php echo $color; ?>">
                        EDITAR DOSIMETRO
                        </div><!-- /.box-header --> 
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div id="cont_dosimetro">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control" id="dosimetro" name="dosimetro"  placeholder="NUMERO DE DOSIMETRO" value="<?php echo $codigo; ?>">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                            <div class="col-md-6">
                              <div id="cont_tarjeta">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control" id="tarjeta" name="tarjeta" placeholder="NUMERO DE TARJETA" value="<?php if(!empty($tarjeta)){ echo $tarjeta; } ?>"> 
                                    <input type="hidden" id="idtarjeta" name="idtarjeta" value="<?php if(!empty($idtarjeta)){ echo $idtarjeta; } ?>">  
                                </div>
                              </div>  
                            </div><!-- /.col -->                          
                          </div><!-- /.row -->
                        </div>
                      </div>
                      <div id="cont_dosim">  
                      <div class="box box-default">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_personal">
                                <div class="input-group">
                                <span class="input-group-addon">
                                <label for="personal" class="col-sm-2 control-label"><i class="fa fa-user"></i> Nombre de Persona:</label></span>
                                <!--<span class="input-group-addon"><i class="fa fa-user"></i></span>-->
                                    <input type="text" class="form-control" id="personal" name="personal" disabled placeholder="PERSONAL" value="<?php if(!empty($nombrepersona)){ echo $nombrepersona; } ?>">
                                    <input type="hidden" id="idpersonal" name="idpersonal" value="<?php if(!empty($idpersona)){ echo $idpersona; } ?>">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div>
                          <div class="row">                           
                            <div class="col-xs-12">
                              <div id="cont_servicio">
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="servicio" class="col-sm-2 control-label"><i class="fa fa-medkit"></i> Servicio: </label></span>
                                    <input type="text" class="form-control" id="servicio" name="servicio" placeholder="SERVICIO" disabled value="<?php if(!empty($servicio)){ echo $servicio; } ?>">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_establecimiento">
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="establecimiento" class="col-sm-2 control-label"><i class="fa fa-building-o"></i> Establecimiento: </label></span>
                                    <input type="text" class="form-control" id="establecimiento" name="establecimiento" placeholder="ESTABLECIMIENTO" disabled value="<?php if(!empty($establecimiento)){ echo $establecimiento; } ?>">
                                </div>
                              </div>  
                            </div><!-- /.col --> 
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_tipo">
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="tipo" class="col-sm-2 control-label"><i class="fa fa-heartbeat"></i> Tipo dosimetro:</label></span>
                                    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="TIPO ESTUDIO" disabled value="<?php if(!empty($tipo)){ echo $tipo; } ?>">
                                </div>
                              </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="cont_valores"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i> Valores</label></span>
                                  <div id="cont_valores" class="col-xs-12" >
                                    <div class="input-group">
                                    <span class="input-group-addon"><label for="valora"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i> Valor Anterior</label></span>
                            
                                    <input type="text" class="form-control" id="valora" name="valora" disabled value="<?php if(!empty($dosis)){ echo $dosis; } ?>">
                                    
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon"><label for="valor_nuevo"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i>Valor nuevo</label></span>
                                    <input type="text" class="form-control" id="dosis" name="dosis" >
                                    </div>                                
                                  </div>
                                </div>  
                            </div><!-- /.col -->                       
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <button type="button" id="guardar" class="btn <?php echo $color; ?>" onclick="guardardosis();">Guardar</button>
                              <div id="mensaje"></div> 
                            </div><!-- /.col --> 
                          </div><!-- /.row -->                                                      
                          </div>
                    </div>
                    </div>
                    </div>
