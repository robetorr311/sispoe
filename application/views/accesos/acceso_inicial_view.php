    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   
      
    <script src="<?php echo base_url(); ?>assets/js/asignar/asignar.js"></script>
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Lista de Usuarios del Sistema             
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
              <form>
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Permisos de Usuarios</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div id="cont_codigo">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <select name="usuario" id="usuario" onchange="modulos();">
                        <option value=0>SELECCIONE UN USUARIO</option>
                      </div>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                    <div id="cont_codigo">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" name="codigo" id="codigo" class="form-control" disabled placeholder="CODIGO">
                      </div>
                    </div>
                  </div><!-- /.col -->
                </div>                 
                </div><!-- /.box-body -->
                </div>
              </div><!-- /.box -->  
            </div><!-- /.col -->
          </div><!-- /.row -->      
              </form>
            </div><!-- /.container -->
        <!-- Modal -->         
          </div><!-- /.box -->                
        </section>
