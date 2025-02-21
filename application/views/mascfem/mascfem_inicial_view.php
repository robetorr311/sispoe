    <script src="<?php echo base_url(); ?>assets/js/mascfem/mascfem.js"></script>     
<section class="content">
         <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Reporte de Grupos de Edad y Sexo          
              </h3>
            </div><!-- /.box-header -->
              <form>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                  <div id="cont_tipo">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <select name="tipo" id="tipo" onchange="stipo();" class="form-control">
                        <option value="0">SELECCIONE TIPO DE CRUCE</option>
                        <option value="1">TOTAL GENERAL TODOS LOS REGISTROS SIN CRUCE</option>
                        <option value="2">TOTAL GENERAL SEGUN CADA ESTADO</option>
                        <option value="3">TOTAL GENERAL SEGUN CADA ESTABLECIMIENTO</option>
                        <option value="4">TOTAL GENERAL SEGUN CADA SERVICIO</option>
                        <option value="5">TOTAL GENERAL SEGUN CADA CARGO</option>
                        <option value="6">TOTAL SEGUN SERVICIO DE UN ESTADO</option>
                        <option value="7">TOTAL SEGUN SERVICIO DE UN ESTABLECIMIENTO</option>
                        <option value="8">TOTAL POR CARGOS SEGUN EL ESTADO</option>                      
                        <option value="9">TOTAL POR CARGOS SEGUN EL ESTABLECIMIENTO</option>
                        </select>
                    </div>
                  </div>  
                  </div><!-- /.col -->                
                </div><!-- /.row -->              
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_estado">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <select name="estados" id="estados" disabled onchange="pestablecimientos(); pservicios(); pcargos();" class="form-control" 
                        >
                        <option value="0">SELECCIONE ESTADO</option>
                        <option value="99">TOTAL GENERAL (TODOS)</option>
                        <?php echo $estados; ?>
                        </select>
                    </div>
                  </div>  
                  </div><!-- /.col --> 
                  <div class="col-md-6">
                  <div id="cont_establecimiento">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                        <select name="establecimientos" id="establecimientos" disabled class="form-control" 
                        onchange="pservicios(); pcargos();">
                        <option value="0">SELECCIONE ESTABLECIMIENTO</option>                    
                        </select>
                    </div>
                  </div>  
                  </div><!-- /.col -->                  
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_servicio">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                        <select name="servicios" disabled id="servicios" class="form-control" onchange="comprobar();"
                        >
                        <option value="0">SELECCIONE SERVICIO</option>
                        </select>
                    </div>
                  </div>  
                  </div><!-- /.col -->                
                  <div class="col-md-6">
                  <div id="cont_cargo">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                        <select name="cargos" disabled id="cargos" class="form-control"
                         onchange="comprobar();">
                        <option value="0">SELECCIONE CARGO</option>
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
</section>
<div id="cont_grafico">
</div>

