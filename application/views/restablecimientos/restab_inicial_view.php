    <script src="<?php echo base_url(); ?>assets/js/restablecimientos/restablecimientos.js"></script>     
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Reporte de Establecimientos          
              </h3>
            </div><!-- /.box-header -->
              <form>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div id="cont_tipo">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <select name="tipo" id="tipo" onchange="stipo();" class="form-control" 
                        >
                        <option value="0">SELECCIONE TIPO DE REPORTE</option>
                        <option value="1">LISTADO GENERAL</option>
                        <option value="2">ESTABLECIMIENTO POR ESTADOS</option>
                        <option value="3">PERSONAL ADSCRITO</option>
                        </select>
                      </div>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_estado">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                        <select name="estados" id="estados" onchange="pestablecimientos();" class="form-control" 
                        >
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
                      <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                        <select name="establecimientos" id="establecimientos" class="form-control" 
                        >
                        <option value="0">SELECCIONE ESTABLECIMIENTO</option>
                        </select>
                    </div>
                  </div>  
                  </div><!-- /.col -->
                </div><!-- /.row -->             
              </div>         
              </div>              
             <div class="box-footer">
             <div id="button_pdf">
                  <button type="button" id="generar" name="generar" disabled class="btn <?php echo $color; ?>" onclick="sgenerar();">Generar</button>
              </div>
              </div>            
              </form>
        <!-- Modal -->         
          </div><!-- /.box -->                
        </section>

