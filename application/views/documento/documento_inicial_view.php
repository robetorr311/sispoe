    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">      
    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/plugins/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/generar/generar.js"></script>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Actas Generadas</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tablae" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Numero</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Numero</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Controles</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($documentos as $row): ?>            
            <tr>
                        <td><?php echo $row->numero; ?></td>
                        <td><?php echo $row->origen; ?></td>
                        <td><?php echo $row->destino; ?></td>
                        <td><?php echo date("d-m-Y",strtotime($row->date)); ?></td>
                        <td><?php echo $row->estatus; ?></td>
                <td>
                  <?php if($row->hestatus!=8){ ?>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Asignar/acta?id=<?php echo $row->id; ?>" target="blank" class="btn btn-block btn-warning btn-xs">Acta de Entrega</a>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Asignar/constancia?id=<?php echo $row->id; ?>" target="blank" class="btn btn-block btn-warning btn-xs">Constancia de Entrega</a> 
                <?php } ?>
                  <a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="anular('<?php echo $row->id; ?>');">Anular</a>
                  <a type="button" onclick="fdosimetro(<?php echo $row->id; ?>);" class="btn btn-block btn-warning btn-xs">Ver Dosimetros</a> 

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
          <div id="container_documento" >
          <!-- Modal Establecimientos content-->
            <div id="modaldocumento" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Dosimetros</h4>
                  </div>
                  <div class="modal-body">
                    <div id="mensaje"></div>
                    <div id="listado_dosimetros"></div>
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-block btn-warning btn-xs" id="select_all"> Seleccionar todos</a>
                  <button type="button" class="btn btn-block btn-warning btn-xs" id="anular_selected"> Anular seleccionados</a>
                  <button type="button" class="btn btn-warning"  data-dismiss="modal" >Cerrar</button>
                </div>              
                  </div>
                </div>    <!-- /.Modal Establecimientos content-->  
            </div>
          </div>

    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
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
    $("#select_all").on('click',function(){
        $('.dosimetropersona').each(function(){
          var checkbox=$(this).find(".check_box");
          var id=checkbox.attr("data-id");
          checkbox.prop("checked",true);
          checkbox.trigger("change");
        });
    });
    $("#anular_selected").on('click',function(){
        $('.dosimetropersona').each(function(){
          var checkbox=$(this).find(".check_box");
          
          if (checkbox.is(':checked')){
            var id=checkbox.attr("data-id");
            anular(id);
          }
        });
    });    

});  
function fdosimetro(id){
  $.ajax({
    url:  base_url + '/Dosimetros/get_dosimetros',
    type: 'POST',
    async: true,    
    data: { 'id': id },
    success: function(respuesta) {
        $('#listado_dosimetros').html((respuesta));       
    }  
  }); 
  $('#modaldocumento').modal({show:true});
}
function anular(id){
  $.ajax({
    url:  base_url + '/Dosimetros/anular',
    type: 'POST',
    async: true,    
    data: { 'id': id },
    success: function(respuesta) {
        $('#mensaje').html((respuesta));       
    }  
  }); 
  $('#modaldocumento').modal({show:true});
}
</script>
    
      <!-- Javascripts - Jquerys -->
    <!-- DataTables -->
       
