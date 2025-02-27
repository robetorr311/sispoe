        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Listado de Personal</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablap" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Servicio</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Servicio</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($personal as $row): ?>            
            <tr>
                <td><?php echo $row->nidpersonal; ?></td>
                <td><?php echo $row->nnombre; ?></td>
                <td><?php echo $row->nservicio; ?></td>
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
  $('#tablap').DataTable({
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