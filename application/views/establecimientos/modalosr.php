<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css"> 
<script src="<?php echo base_url(); ?>assets/js/plugins/moment.min.js"></script>
<script type="text/javascript">
$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']); 
</script>
                      <div id="cont_d"> 
                      <div class="box box-default">
                        <div class="box-header with-border <?php echo $color; ?>">
                        ASIGNAR OSR
                        </div><!-- /.box-header --> 
                        <form id="form-osr">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div id="cont_dosimetro">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                                    <input type="hidden" id="idosr" name="idosr" value="<?php if(!empty($idosr)){ echo $idosr; }  ?>">
                                    <input type="hidden" id="idestablecimento" name="idestablecimento" value="<?php if(!empty($idestablecimento)){ echo $idestablecimento; }  ?>">
                                    <input type="text" class="form-control" id="nombreosr" name="nombreosr" placeholder="NOMBRE" value="<?php if(!empty($result)){ echo $result[0]->nombre; }  ?>">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div id="cont_tarjeta">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  <input type="text" class="form-control pull-right" id="fechaosr" name="fechaosr" placeholder="Fecha de nacimiento -- dd/mm/yyyy --" value="<?php if(!empty($result)){ echo $result[0]->fecha; }  ?>">
                        <script type="text/javascript">
                        $("#fechaosr").datepicker();
                        </script>
                                    
                                </div>
                              </div>  
                            </div><!-- /.col -->                          
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-md-12">
                              <div id="cont_tarjeta">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control" id="cedulaosr" name="cedulaosr" placeholder="CEDULA" value="<?php if(!empty($result)){ echo $result[0]->cedula; }  ?>">  
                                </div>
                              </div>  
                            </div><!-- /.col -->                          
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-md-12">
                              <div id="cont_tarjeta">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" id="correoosr" name="correoosr" placeholder="CORREO" value="<?php if(!empty($result)){ echo $result[0]->correo; }  ?>">  
                                </div>
                              </div>  
                            </div><!-- /.col -->                          
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-md-12">
                              <div id="cont_tarjeta">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                    <input type="text" class="form-control" id="telefonoosr" name="telefonoosr" placeholder="TELEFONO" value="<?php if(!empty($result)){ echo $result[0]->telefono; }  ?>">  
                                </div>
                              </div>  
                            </div><!-- /.col -->                          
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-md-12">
                              <button type="button" class="btn <?php echo $color; ?>" onclick="guardar_osr()">Guardar</button>
                            </div><!-- /.col -->                          
                          </div><!-- /.row -->
                        </div>
                        <div id="mensajeosr"></div>
                        </form>

                      </div>
                    </div>
                    <script type="text/javascript">
 $("#telefonoosr").inputmask({"mask": "(9999) 999-9999"});
                    </script>
