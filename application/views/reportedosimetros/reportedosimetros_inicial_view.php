    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">      
    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/plugins/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/reportedosimetros/reportedosimetros.js"></script>
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Reporte de Dosimetros            
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
              <form id="form1">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div id="cont_estado">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                      <select name="estados" id="estados"  class="form-control select2" style="width: 100%;" onchange="establecimientos();">
                      <option value="0">SELECCIONE ESTADO</option>
                        <?php echo $estados; ?>
                      </select>
                      </div>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>              
                          <select name="establecimiento" id="establecimiento"  class="form-control select2" onchange="get_servicios()">
                          <option value="0">TODOS LOS ESTABLECIMIENTOS</option>
                          </select>
                      </div>
                  </div><!-- /.col -->                   
                </div><!-- /.row --> 
                <div class="row">
                  <div class="col-md-6">
                    <div id="cont_servicio">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                            <select name="servicios" id="servicios" class="form-control select2">
                            <option value="0">TODOS LOS SERVICIOS</option>
                            </select>
                      </div>
                    </div>
                  </div><!-- /.col -->                  
                  <div class="col-md-6">
                    <div id="cont_estudio">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
                            <select name="estudio" id="estudio"  class="form-control select2">
                            <option value="0">TODOS LOS ESTUDIOS</option>
                            <?php echo $estudio; ?>                
                            </select>
                      </div>
                    </div>
                  </div><!-- /.col -->               
                </div><!-- /.row -->                              
                <div class="row">
                  <div class="col-md-12">
                    <div id="cont_estatus">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                            <select name="estatus" id="estatus"  class="form-control select2">
                            <option value="0">TODOS LOS DOSIMETROS</option>
                            <option value="1">GENERADOS</option>
                            <option value="2">ASIGNADOS / ENVIADOS</option>
                            <option value="3">RECIBIDOS</option>
                            <option value="4">LEIDOS</option>
                            </select>
                      </div>
                    </div>
                  </div><!-- /.col -->                  
                </div><!-- /.row -->  
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <button type="button" id="ver" class="btn <?php echo $color; ?>">Continuar</button>
              </div> 
              <div id="cont_validado">
              </div>           
              </form>
            </div><!-- /.container -->
        <!-- Modal -->           
          </div><!-- /.box -->                
        </section>
          <div class="box box-default">
              <div class="box-body">
                 <a type="button" id="ver" class="btn <?php echo $color; ?> btn-xs" href="<?php echo base_url(); ?>index.php/Reportedosimetros/export_estados" target="blank">Reporte por Estados</a>
              </div><!-- /.box-body -->
          </div><!-- /.box -->                
        <section class="content">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Dosimetros</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tabladosimetros" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Nro.</th>
                        <th>Cod. TOE</th>
                        <th>Personal</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>
                        <th>Periodo</th>
                        <th>Tarjeta</th>                      
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Nro.</th>
                        <th>Cod. TOE</th>
                        <th>Personal</th>
                        <th>Establecimiento</th>
                        <th>Servicio</th>
                        <th>Periodo</th>
                        <th>Tarjeta</th> 
                        <th>Controles</th>                        
                      </tr>
                    </tfoot>
                </table>
                </div><!-- /.box-body -->
                </div>
              </div><!-- /.box -->  
            </div><!-- /.col -->
          </div><!-- /.row -->
                         
  </section><!-- /.content -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>

    
      <!-- Javascripts - Jquerys -->
    <!-- DataTables -->