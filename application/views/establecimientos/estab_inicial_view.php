    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/select2/select2.min.css">    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">   
    <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.phone.extensions.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.extensions.js"></script>
  
    <script src="<?php echo base_url(); ?>assets/js/establecimientos/establecimientos.js"></script>    
   

  
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Formulario Establecimientos           
              </h3>
            </div><!-- /.box-header -->
            <div id="container">
              <form id="formulario" name="formulario">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div id="cont_codigo">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" name="codigo" id="codigo" class="form-control" disabled placeholder="CODIGO">
                      </div>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_nombre">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                      <input type="text" name="nombre" id="nombre" class="form-control" disabled placeholder="NOMBRE">
                    </div>
                  </div>  
                  </div><!-- /.col --> 
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_telefono">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                      <input type="text" class="form-control" disabled name="telefono" id="telefono" placeholder="TELEFONO" data-inputmask='"mask": "(999) 9999999"' data-mask>
                    </div>
                  </div>  
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_correo">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" class="form-control" disabled name="correo" id="correo" placeholder="CORREO">
                    </div>
                  </div>
                  </div><!-- /.col --> 
                </div><!-- /.row --> 
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_director">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                      <input type="text" name="director"  id="director" class="form-control" disabled placeholder="DIRECTOR">
                    </div>
                  </div>
                  </div><!-- /.col -->
                  <div class="col-md-6">
                  <div id="cont_servicios">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="practica" id="practica" disabled class="form-control select2">
                      <option value="0">SELECCIONE SERVICIO</option>
                        <?php echo $servicios; ?>
                        </select>
                        <button type="button" disabled  class="btn <?php echo $color; ?>" onclick="spractica();">Agregar</button>
                    </div>
                  </div>
                  </div>                                  
                </div><!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_rif">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                      <input type="text" name="rif"  id="rif" class="form-control" disabled placeholder="RIF">
                    </div>
                  </div>
                  </div><!-- /.col -->                               
                </div><!-- /.row -->                
                  <div id="tablapractica">
                  </div>          
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_direccion">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                      <textarea class="form-control" disabled name="direccion" id="direccion" placeholder="DIRECCION"></textarea>
                    </div>
                  </div>
                  </div><!-- /.col -->                  
                  <div class="col-md-6">
                  <div id="cont_estados">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                      <select name="estados" id="estados" disabled class="form-control select2" style="width: 100%;" onchange="smunicipios();">
                      <option value="0">SELECCIONE ESTADO</option>
                        <?php echo $estados; ?>
                      </select>
                    </div><!-- /.form-group --<!-- /.col -->
                  </div>
                  </div>
                </div><!-- /.row --> 
                <div class="row">
                  <div class="col-md-6">
                  <div id="cont_municipios">
                    <div id="muni">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                          <select name="municipios" disabled id="municipios" class="form-control select2" style="width: 100%;" onchange="sparroquias();">
                          <option value="0">SELECCIONE MUNICIPIO</option>
                          </select>
                        </div><!-- /.form-group --<!-- /.col -->
                    </div>
                  </div>
                  </div>                
                  <div class="col-md-6">
                  <div id="cont_parroquias">
                      <div id="parr">                  
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-globe"></i></span>                      
                          <select name="parroquias" id="parroquias" disabled class="form-control select2" style="width: 100%;">
                          <option value="0">SELECCIONE PARROQUIA</option>
                          </select>
                        </div>
                      </div><!-- /.form-group --<!-- /.col -->
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
                  <h3 class="box-title">Listado de Establecimientos</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="tablae" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Municipio</th>
                        <th>Parroquia</th>
                        <th>Controles</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Municipio</th>
                        <th>Parroquia</th>
                        <th>Controles</th>
                      </tr>
                    </tfoot>

        <tbody>
            <?php foreach ($listado as $row): ?>            
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->estado; ?></td>
                <td><?php echo $row->municipio; ?></td>
                <td><?php echo $row->parroquia; ?></td>
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
    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js"></script>      
    
