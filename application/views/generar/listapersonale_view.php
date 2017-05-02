        <!-- Main content -->
        <input type="hidden" id="establecimiento" name="establecimiento" value="<?php echo $establecimiento; ?>" ></input>
          <div class="row">
            <div class="col-xs-12">          
              <div class="box">
                <div class="box-header  <?php echo $color; ?>">
                  <h3 class="box-title">Se han generado <?php echo $conteo; ?> dosimetros para ser entregados a las siguientes personas:</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablap" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($tabla as $row): ?>            
                        <tr>
<?php
       $idpersona=$row->idpersona;
       if($idpersona==0) {
?>
       <td>0</td><td>TESTIGO</td>
<?php  }
        else {
?>
<td><?php echo $idpersona; ?></td><td><?php echo $row->personal; ?></td>
  <?php    }     ?>

                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->  
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row">
            <div class="col-xs-12">          
                  <a type="button" href="<?php echo base_url(); ?>index.php/Generar/index" class="btn <?php echo $color; ?>">Finalizar</a>
                  
            </div>
          </div>             
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
