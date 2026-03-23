                      <div id="cont_d"> 
                      <div class="box box-default">
                        <div class="box-header with-border <?php echo $color; ?>">
                        ASIGNAR DOSIMETRO
                        </div><!-- /.box-header --> 
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div id="cont_dosimetro">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control" id="dosimetro" name="dosimetro"  placeholder="NUMERO DE DOSIMETRO" onblur="verdosimetro();">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                            <div class="col-md-6">
                              <div id="cont_tarjeta">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control" id="tarjeta" name="tarjeta" onblur="control();" placeholder="NUMERO DE TARJETA">  
                                </div>
                              </div>  
                            </div><!-- /.col -->                          
                          </div><!-- /.row -->
                        </div>
                      </div>
                      <div id="cont_dosim">  
                      <input type="hidden" id="iddocumento" name="iddocumento" value="<?php if(!empty($iddocumento)) echo $iddocumento; ?>">                   
                      <div class="box box-default">
                        <div class="box-header with-border <?php echo $color; ?>">
                           <h3 class="box-title">
                            Restan por asignar: <?php if(empty($pendientes)) { echo "?"; } ?> dosimetros de <?php if(empty($preparados)) { echo "?"; } ?> en total <br>            
                   
                            Datos de Dosimetro Nro: ? pendiente por asignar           
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
                                    <input type="text" class="form-control" id="personal" name="personal" disabled placeholder="PERSONAL">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div>
                          <div class="row">                           
                            <div class="col-xs-12">
                              <div id="cont_servicio">
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="servicio" class="col-sm-2 control-label"><i class="fa fa-medkit"></i> Servicio: </label></span>
                                    <input type="text" class="form-control" id="servicio" name="servicio" placeholder="SERVICIO" disabled >
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_establecimiento">
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="establecimiento" class="col-sm-2 control-label"><i class="fa fa-building-o"></i> Establecimiento: </label></span>
                                    <input type="text" class="form-control" id="establecimiento" name="establecimiento" placeholder="ESTABLECIMIENTO" disabled >
                                </div>
                              </div>  
                            </div><!-- /.col --> 
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_tipo">
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="tipo" class="col-sm-2 control-label"><i class="fa fa-heartbeat"></i> Tipo dosimetro:</label></span>
                                    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="TIPO ESTUDIO" disabled >
                                </div>
                              </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="cont_fechas"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i> Peridodo de estudio</label></span>
                                  <div id="cont_fechas" class="col-xs-12" >
                                    <div class="input-group">
                                    <span class="input-group-addon"><label for="fechai"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i> Inicio</label></span>
                            
                                    <input type="text" class="form-control" id="fechai" name="fechai" disabled >
                                    
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon"><label for="fechaf"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i>  Fin</label></span>
                                    <input type="text" class="form-control" id="fechaf" name="fechaf"  disabled >
                                    </div>                                
                                  </div>
                              </div>  
                            </div><!-- /.col -->                       
                          </div><!-- /.row -->                            
                          </div>
                    </div>
                    </div>
                    </div>
