    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   
      
    <script src="<?php echo base_url(); ?>assets/js/liberar/liberar.js"></script>
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Liberar Tarjetas             
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
              <form name="formulario" id="formulario" enctype='multipart/form-data' method="post" action="<?php echo base_url(); ?>index.php/Liberar/liberar">
                <div class="row">
                  <div class="col-xs-12">          
                    <div class="box">
                      <div class="box-header  <?php echo $color; ?>">
                        <h3 class="box-title">Liberar tarjetas con archivo (.txt)</h3>
                      </div>
                      <div class="box-body">
                      <div class="row">
                        <div class="col-xs-12">
                        <?php 
                        if (empty($e)){
                        ?>
                          <div id="cont_file">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input type="file" name="archivo" > 
                            </div>
                          </div>
<?php
                        }
                        else{
?>
                          <div id="cont_file">
                            <div class="input-group has-error">
                              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                              <input type="file" name="archivo" > 
                              <?php if(!empty($error)) { echo $error; } ?>
                            </div>
                          </div>
<?php
                        }
?>
  
                        </div><!-- /.col -->
                        </div>                  
                      </div><!-- /.box-header -->
                      <div class="box-footer">
                          <input type="submit"  class="btn <?php echo $color; ?>" value="Continuar">
                      </div>                       
                    </div><!-- /.box -->  
                  </div><!-- /.col -->
                </div><!-- /.row -->      
              </form>
            </div><!-- /.container -->
        <!-- Modal -->         
          </div><!-- /.box -->  
          <?php 
             if(!empty($mensaje)) { echo $mensaje; }
          ?>              
        </section>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>

    
      <!-- Javascripts - Jquerys -->
    <!-- DataTables -->
       
