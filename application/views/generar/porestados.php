<form id="formulario" name="formulario">
<div class="box-body">
  <div class="row">
    <div class="col-xs-12">          
      <div class="box">
        <div class="box-header  <?php echo $color; ?>">
          <h3 class="box-title">Generar segun establecimientos pertenecientes a un estado </h3>
        </div><!-- /.box-header -->
                <div class="row">
                  <div class="col-xs-12">
                    <div id="cont_estados">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>               
                          <select name="estados" id="estados"  class="form-control select2">
                          <option value="0">SELECCIONE UN ESTADO</option>  
                          <?php echo $estados; ?>
                          </select>
                      </div>
                    </div>
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-xs-12">
<a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="generarxestado();">Generar</a>
                  </div><!-- /.col -->
                </div><!-- /.row -->                                   
              </div><!-- /.box -->  
            </div><!-- /.col -->
          </div><!-- /.row -->
                         
  </section><!-- /.content -->      
              </div><!-- /.box-body -->  
              <input type="hidden" id="fechai" name="fechai" value="<?php echo $fechai; ?>" />      
              <input type="hidden" id="fechaf" name="fechaf" value="<?php echo $fechaf; ?>" />      
              <input type="hidden" id="estudio" name="estudio" value="<?php echo $estudio; ?>" />
              <div id="cont_validado">
              </div>        
              </form>