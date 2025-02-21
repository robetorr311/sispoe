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
            <?php foreach ($listado as $row): ?>            
            <tr>
                        <td><?php echo $row->numero; ?></td>
                        <td><?php echo $row->origen; ?></td>
                        <td><?php echo $row->destino; ?></td>
                        <td><?php 
                $fechan=$row->fecha;
                $fec=explode('-',$fechan);
                if(strlen($fec[0])==4){
                      $fecha=$fec[2].'-'.$fec[1].'-'.$fec[0];
                }
                echo $fecha;
                ?></td>
                        <td><?php echo $row->estatus; ?></td>
                <td><a type="button" class="btn btn-block <?php echo $color; ?> btn-xs" onclick="anular('<?php echo $row->id; ?>');">Anular</a>
                  <a type="button" href="<?php echo base_url(); ?>index.php/Generar/tarjetas?id=<?php echo $row->id; ?>" target="blank" class="btn btn-block <?php echo $color; ?> btn-xs">Imprimir</a>

                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>

                </table>
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
                </div><!-- /.box-body -->