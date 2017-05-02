              <form id="formulario" name="formulario">
              <div class="box-body">
                <div class="row">
                        <input type="hidden" name="codigo" value="<?php echo $codigo; ?>" id="codigo">
                  <div class="col-md-6">
                  <div id="cont_nombre">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="NUMERO DE TARJETA">
                    </div>
                  </div>  
                  </div><!-- /.col --> 
                  <div class="col-md-6">
                  <div id="cont_padres">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="estatus" id="estatus"  class="form-control select2">
                        <?php echo $estatus; ?>
                        </select>
                    </div>
                  </div>
                  </div>                                  
                </div><!-- /.row -->
              </div>
              <div class="box-footer">
                  <button type="button" onclick="guardar();" class="btn <?php echo $color; ?>" >Guardar</button>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Dosimetros/index" class="btn <?php echo $color; ?>">Cancelar</a>                    

              </div>        
              </form>