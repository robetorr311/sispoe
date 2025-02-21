                      <div id="cont_dosim">
                      <div class="box box-default">
                        <div class="box-header with-border <?php echo $color; ?>">
                          <h3 class="box-title">
                            Recepcion de Dosimetro          
                          </h3>
                        </div><!-- /.box-header --> 
                        <div class="box-body">
                          <input type="hidden" id="iddocumento" name="iddocumento" value="<?php echo $iddocumento; ?>">
                          <div class="row">
                            <div class="col-md-6">
                              <div id="cont_numero">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                          <?php
                          if ($d>0){
                          ?>
                            <input type="text" class="form-control" id="dosimetro" name="dosimetro" disabled placeholder="NUMERO DE DOSIMETRO" value="<?php if(!empty($dosimetro)) { echo $dosimetro; } ?>">
                          <?php
                        }
                        else {
                        ?> 
                            <input type="text" class="form-control" id="dosimetro" name="dosimetro" onchange="control();" placeholder="NUMERO DE DOSIMETRO" value="<?php if(!empty($dosimetro)) { echo $dosimetro; } ?>">
                        <?php
                        }
                        ?>                                               
                                    
                                </div>
                              </div>  
                            </div><!-- /.col -->
                            <div class="col-md-6">
                              <div id="cont_numero">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" disabled class="form-control" id="tarjeta" name="tarjeta"  placeholder="NUMERO DE TARJETA" value="<?php if(!empty($tarjeta)) { echo $tarjeta; } ?>">
                                </div>
                              </div>  
                            </div><!-- /.col -->                            
                                        
                        </div>
                      </div>
                      </div>
                      <div id="cont_dosimetro">
                      <div class="box box-default">
                        <div class="box-header with-border <?php echo $color; ?>">
                          <h3 class="box-title">
                            Datos de Dosimetro Nro: <?php if (!empty($dosimetro)) { echo $dosimetro; } ?>            
                          </h3>
                        </div><!-- /.box-header --> 
                        <div class="box-body">
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_personal">
                                <div class="input-group">
                                <span class="input-group-addon">
                                <label for="personal" class="col-sm-2 control-label"><i class="fa fa-user"></i> Nombre de Persona:</label></span>
                                <!--<span class="input-group-addon"><i class="fa fa-user"></i></span>-->
                                    <input type="text" class="form-control" id="personal" name="personal" value="<?php if(!empty($personal)) {  echo $personal; } ?>" disabled placeholder="PERSONAL">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div>
                          <div class="row">                           
                            <div class="col-xs-12">
                              <div id="cont_servicio">
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="servicio" class="col-sm-2 control-label"><i class="fa fa-medkit"></i> Servicio: </label></span>
                                    <input type="text" class="form-control" id="servicio" name="servicio" placeholder="SERVICIO" disabled value="<?php if(!empty($servicio)) {  echo $servicio; } ?>">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_establecimiento">
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="establecimiento" class="col-sm-2 control-label"><i class="fa fa-building-o"></i> Establecimiento: </label></span>
                                    <input type="text" class="form-control" id="establecimiento" name="establecimiento" placeholder="ESTABLECIMIENTO" disabled value="<?php if(!empty($establecimiento)) {  echo $establecimiento; } ?>">
                                </div>
                              </div>  
                            </div><!-- /.col --> 
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_tipo">
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="tipo" class="col-sm-2 control-label"><i class="fa fa-heartbeat"></i> Tipo dosimetro:</label></span>
                                    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="TIPO ESTUDIO" disabled value="<?php if(!empty($tipo)) {  echo $tipo; } ?>">
                                </div>
                              </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">                       
                                  <span class="input-group-addon"><label for="cont_fechas"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i> Peridodo de estudio</label></span>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">                       
                                    <div class="input-group">
                                    <span class="input-group-addon"><label for="fechai"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i> Inicio</label></span>
                            
                                    <input type="text" class="form-control" id="fechai" name="fechai" disabled value="<?php if(!empty($fechai)) {  echo $fechai; } ?>">
                                    
                                    </div>
                          </div>
                            <div class="col-md-6">                        
                                   <div class="input-group">
                                    <span class="input-group-addon"><label for="fechaf"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i>  Fin</label></span>
                                    <input type="text" class="form-control" id="fechaf" name="fechaf"  disabled value="<?php if(!empty($fechaf)) {  echo $fechaf; } ?>">
                                    </div>                                
                              </div>                   
                          </div><!-- /.row -->
                          <?php

                          if ($d>0){
                          ?>
                          <div class="row">                           
                            <div class="col-xs-12">
                              <div id="cont_recibir">
                                <input type="button" id="recibir" name="recibir" onclick="recibir();" class="btn <?php echo $color; ?>" value="Recibir">
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->

                          </div>
                          <?php
                        }
                        ?>
                    </div>  
                    </div>
                    </div>                    
