<form id="formulario" name="formulario">
<div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                    <div id="cont_estados">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>              
                          <select name="estados" id="estados"  class="form-control select2" onchange="pestablecimientos();">
                          <option value="0">SELECCIONE ESTADO</option>
                          <?php echo $estados; ?>

                          </select>
                      </div>
                    </div>
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-xs-12">
                    <div id="cont_establecimiento">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>              
                          <select name="establecimiento" id="establecimiento"  class="form-control select2" onchange="preparar();">
                          <option value="0">SELECCIONE ESTABLECIMIENTO</option>
                          <?php echo $establecimientos; ?>

                          </select>
                      </div>
                    </div>
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-xs-12">
                    <div id="cont_servicios">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-medkit"></i></span>               
                          <select name="servicio" id="servicio"  class="form-control select2">
                          <option value="0">SELECCIONE SERVICIO</option>  </select>
                      </div>
                    </div>
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-xs-12">
<a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="generar();">Generar</a>
                  </div><!-- /.col -->
                </div><!-- /.row -->                                   
</div><!-- /.box -->                       
<input type="hidden" id="fechai" name="fechai" value="<?php echo $fechai; ?>" />      
<input type="hidden" id="fechaf" name="fechaf" value="<?php echo $fechaf; ?>" />      
<input type="hidden" id="estudio" name="estudio" value="<?php echo $estudio; ?>" />
<div id="cont_validado">
</div>        
</form>