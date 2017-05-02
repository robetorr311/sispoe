    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.css">    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   

    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js"></script>    
    <script src="<?php echo base_url(); ?>assets/js/dosimetros/dosimetros.js"></script>    
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Registro de Tarjetas           
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
              <form id="formulario" name="formulario">
              <div class="box-body">
                <div class="row">
                        <input type="hidden" name="codigo" id="codigo">
                  <div class="col-md-6">
                  <div id="cont_nombre">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                      <input type="text" name="nombre" id="nombre" class="form-control" disabled placeholder="CODIGO DE BARRA">
                    </div>
                  </div>  
                  </div><!-- /.col --> 
                  <div class="col-md-6">
                  <div id="cont_dosimetros">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="estatus" id="estatus" disabled class="form-control select2">
                      <option value="0">SELECCIONE ESTATUS</option>
                        <?php echo $padres; ?>
                        </select>
                    </div>
                  </div>
                  </div>                                  
                </div><!-- /.row -->                                 
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <button type="button"  class="btn <?php echo $color; ?>" onclick="nuevo();">Agregar Nuevo</button>
                  <button type="submit" disabled class="btn <?php echo $color; ?>">Guardar</button>
              </div>            
              </form>
            </div><!-- /.container -->
        <!-- Modal -->         
          </div><!-- /.box -->                
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Tarjetas Registradas en el Sistema</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablae" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                      <th>Codigo de Barra</th>
                        <th>Estatus</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Codigo de Barra</th>
                        <th>Estatus</th>
                        <th>Controles</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($listado as $row): ?>            
            <tr>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->estatus; ?></td>
                <td><button class="btn btn-block <?php echo $color; ?> btn-xs" onclick="registro('<?php echo $row->id; ?>');">Ver Registro</button></td>
            </tr>
          <?php endforeach; ?>
        </tbody>

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->  
            </div><!-- /.col -->
          </div><!-- /.row -->
                         
  </section><!-- /.content --> 
<script type="text/javascript">  
  $(document).ready(function(){
  $('#tablae').DataTable({
    "oPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "lengthMenu":[[10,25,50,100,200,-1],[10,25,50,100,200,"All"]]   
  });
  $("[data-mask]").inputmask();
});
</script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>

    
      <!-- Javascripts - Jquerys -->
    <!-- DataTables -->
       
