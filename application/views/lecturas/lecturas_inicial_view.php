    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dm-uploader.min.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.dm-uploader.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lecturas/lecturas.js"></script>
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Lectura de Dosimetros             
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
              <form name="formulario" id="formulario">
                <div class="row">
                  <div class="col-xs-12">          
                    <div class="box">
                      <div class="box-header  <?php echo $color; ?>">
                        <h3 class="box-title">Importar datos provenientes de archivos de extension (.asc)</h3>
                      </div>
                      <div class="box-body">
                <div class="row">
                  <div class="col-xs-12">
                    <div id="cont_fecha">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control pull-right" id="fecha" name="fecha" placeholder="Fecha de lectura -- dd/mm/yyyy --">
                        <script type="text/javascript">
                        $("#fecha").datepicker();
                        </script>                          
                      </div>
                    </div>  
                  </div><!-- /.col -->
                </div><!-- /.row --> 
                <input type="hidden" id="archivo_asc" name="archivo_asc"></input>
                <input type="hidden" id="ids" name="ids"></input>
                <div id="file_asc">
                <div class="row">
                    <div class="col-md-12">
                        <div id="drag-and-drop-zone1" class="dm-uploader">
                            <h3 class="mb-5 mt-5 text-muted">Cargar Archivo (.asc) aqui...</h3>
                            <div class="btn btn-primary btn-block mb-5 bg-yellow">
                                <span>Seleccionar/Cargar Archivo</span>
                                <input type="file" name="asc" title='Click to add Files' />
                            </div>
                        </div><!-- /uploader -->
                    </div>
                </div>
                </div>                 
            </div><!-- /.box-header -->
                      <div class="box-footer">
                          <button type="button" id="verificar_dosimetros" class="btn <?php echo $color; ?>">Verificar Archivo de Lectura </button>
                      </div>                       
                    </div><!-- /.box -->  
                  </div><!-- /.col -->
                </div><!-- /.row -->      
              </form>
            </div><!-- /.container -->
        <!-- Modal -->         
          </div><!-- /.box -->                
        </section>

<div id="tabla_norecibidos">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de dosimetros que aun no han sido recibidos</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tabladosimetros_norec" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>ID</th>
                        <th>POE</th>
                        <th>Nombre</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Servicio</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>POE</th>
                        <th>Nombre</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Servicio</th>
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
</div>










        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Archivos Guardados en Sistema</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tablae" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Nombre de Archivo</th>
                        <th>Tipo</th>
                        <th>Tamaño</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nombre de Archivo</th>
                        <th>Tipo</th>
                        <th>Tamaño</th>
                        <th>Controles</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($listado as $row): ?>            
            <tr>
                        <td><?php echo $row->nombre; ?></td>
                        <td><?php echo $row->tipo; ?></td>
                        <td><?php echo $row->size; ?></td>
                <td><a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="download('<?php echo $row->id; ?>');">Descargar</a>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Lecturas/dosis?archivo=<?php echo $row->nombre; ?>" target="blank" class="btn btn-block <?php echo $color; ?> btn-xs">Valores</a>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>

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
       
