<?php
        if(!empty($array_norecibidos)){
?>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de dosimetros no recibidos</h3>
                </div><!-- /.box-header -->
                <div id="cont_tabla">
                <div class="box-body table-responsive">
                  <table id="tabladosimetros" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>ID</th>
                        <th>POE</th>
                        <th>Servicio</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>POE</th>
                        <th>Servicio</th>
                        <th>Controles</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($array_norecibidos as $row): ?>            
            <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->idpersonal; ?></td>
                        <td><?php echo $row->idservicio; ?></td>
                <td><button type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="recepcionar('<?php echo $row->id; ?>','<?php echo $documento; ?>');">Recepcionar</button>
                  <button type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="pendiente('<?php echo $row->id; ?>','<?php echo $documento; ?>');">Dejar pendiente</button>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>

                </table>
                <script type="text/javascript">    
                  $(document).ready(function(){
                  $('#tabladosimetros').DataTable({
                    "oPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false,
                    "lengthMenu":[[10,25,50,100,200,-1],[10,25,50,100,200,"All"]]   
                  });
                });
function recepcionar(id,documento) {
      $.ajax({
        url:  base_url + '/Lecturas/recepcionar',
        type: 'POST',
        async: true,
        data: { id :  id , documento : documento },
        success: function(respuesta) {
          $('#tabla_norecibidos').html((respuesta));
        }  
      });
} 
function pendiente(id,documento) {
      $.ajax({
        url:  base_url + '/Lecturas/pendiente',
        type: 'POST',
        async: true,
        data: { id :  id , documento : documento },
        success: function(respuesta) {
          $('#tabla_norecibidos').html((respuesta));
        }  
      });
}
                </script>                  
                </div><!-- /.box-body -->
                </div>
              </div><!-- /.box -->  
            </div><!-- /.col -->
          </div><!-- /.row -->
                         
  </section><!-- /.content --> 
<?php
      }
?>