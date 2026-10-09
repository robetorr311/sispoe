    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">      
    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/plugins/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/genviadosestado/genviadosestado.js"></script>
<script type="text/javascript">
$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);  
</script>
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Reporte de Dosimetros generados por estado           
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
              <form id="form1">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div id="cont_fechai">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control pull-right" id="fechai" name="fechai" placeholder="Desde -- dd/mm/yyyy --">
                        <script type="text/javascript">
                        $("#fechai").datepicker();
                        </script>                          
                      </div>
                    </div>  
                  </div><!-- /.col -->
                  <div class="col-md-6">
                    <div id="cont_fechaf">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control pull-right" id="fechaf" name="fechaf" placeholder="Hasta -- dd/mm/yyyy --">
                          <script type="text/javascript">
                          $("#fechaf").datepicker();
                          </script>                          
                      </div>
                    </div>  
                  </div><!-- /.col -->                   
                </div><!-- /.row -->                                                
              </div><!-- /.box-body -->
              <div class="box-footer">
                <div id="button_pdf">
                  <button type="button"  class="btn <?php echo $color; ?>" onclick="generar();">Continuar</button>
                </div>
              </div> 
              <div id="cont_validado">
              </div>           
              </form>
            </div><!-- /.container -->
        <!-- Modal -->           
          </div><!-- /.box -->                
        </section>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>