<div class="alert <?php echo $color; ?> alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-warning"></i>Atencion! </h4>
Restan por recibir <?php echo $pendientes; ?> dosimetros de <?php $preparados; ?> en total 
</div>
                      <div class="box box-default">
                        <div class="box-header with-border <?php echo $color; ?>">
                          <h3 class="box-title">
                            Datos de Dosimetro Nro: <?php if (!empty($dosimetro)) { echo $dosimetro; } ?> que ha sido recibido           
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
                              
                                <div class="input-group">
                                  <span class="input-group-addon"><label for="cont_fechas"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i> Peridodo de estudio</label></span>
                                  <div id="cont_fechas" class="col-xs-12" >
                                    <div class="input-group">
                                    <span class="input-group-addon"><label for="fechai"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i> Inicio</label></span>
                            
                                    <input type="text" class="form-control" id="fechai" name="fechai" disabled value="<?php if(!empty($fechai)) {  echo $fechai; } ?>">
                                    
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon"><label for="fechaf"  class="col-sm-2 control-label"><i class="fa fa-calendar"></i>  Fin</label></span>
                                    <input type="text" class="form-control" id="fechaf" name="fechaf"  disabled value="<?php if(!empty($fechaf)) {  echo $fechaf; } ?>">
                                    </div>                                
                                  </div>
                              </div>  
                            </div><!-- /.col -->                       
                          </div><!-- /.row -->                            
                          </div>
                    </div>
