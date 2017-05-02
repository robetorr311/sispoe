    <!-- DataTables -->

  
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css"> 
    <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.phone.extensions.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.extensions.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/historialdosimetrico/historialdosimetrico.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/moment.min.js"></script>
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
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de personal</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablae" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Sexo</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Codigo</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Sexo</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Controles</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($listado as $row): ?>            
            <tr>
                <td><?php echo $row->codigo; ?></td>
                <td><?php echo $row->cedula; ?></td>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->apellido1; ?></td>
                <td><?php echo $row->sexo; ?></td>
                <td><?php 
                $fecha=$row->fechadenacimiento;
                $fec=explode('-',$fecha);
                if(strlen($fec[0])==4){
                    if($fec[0]=='1900'){
                      $fecha='Sin informacion';
                    }
                    else {
                      $fecha=$fec[2].'-'.$fec[1].'-'.$fec[0];
                    }
                }
                else {
                  if($fecha=='01-01-1900') { $fecha='Sin informacion'; }
                }
                echo $fecha;
                ?></td>

                <td><a type="button" href="<?php echo base_url(); ?>index.php/Historialdosimetrico/historial?id=<?php echo $row->codigo; ?>" target="blank" class="btn <?php echo $color; ?>">Ver Historial</a></td>
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
});

</script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.phone.extensions.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.extensions.js"></script>

