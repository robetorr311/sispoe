    <!-- DataTables -->

  
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css"> 
    <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.phone.extensions.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.extensions.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/personal/personal.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/personal/antecedentes.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/personal/establecimientos.js"></script>
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
            <section class="content">
          <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Formulario Personal           
              </h3>
            </div><!-- /.box-header -->        
            <div class="box-body">
              <div id="container">
                <form id="personal" name="personal">
                  <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                      <div class="box box-default">
                        <div class="box-header with-border <?php echo $color; ?>">
                          <h3 class="box-title">
                          Datos Basicos           
                          </h3>
                        </div><!-- /.box-header -->                    
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
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_pnombre">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="pnombre" id="pnombre" class="form-control" disabled placeholder="P. NOMBRE">
                              </div>
                            </div>  
                            </div><!-- /.col --> 

                          <div class="col-md-6">
                            <div id="cont_snombre">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="snombre" id="snombre" class="form-control" disabled placeholder="S. NOMBRE">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_papellido">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="papellido" id="papellido" class="form-control" disabled placeholder="P. APELLIDO">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          <div class="col-md-6">
                            <div id="cont_sapellido">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="sapellido" id="sapellido" class="form-control" disabled placeholder="S. APELLIDO">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-md-6">
                            <div id="cont_cedula">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                <input type="text" name="cedula" id="cedula" class="form-control" disabled placeholder="CEDULA">
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          <div class="col-md-6">
                            <div id="cont_sexo">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-intersex"></i></span>
                                <select name="sexo" id="sexo" class="form-control" disabled >
                                <option selected value="0">SEXO</option>
                                </select>
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                          <div class="col-xs-12">
                            <div id="cont_fecha">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" disabled="" name="fecha" id="fecha" class="form-control"  placeholder="FECHA DE NACIMIENTO -- dd/mm/yyyy --">
                                <script type="text/javascript">
                                $("#fecha").datepicker({
                                yearRange: "1916:2026",
                                changeMonth: true,
                                changeYear: true });
                                </script> 
                              </div>
                            </div>  
                            </div><!-- /.col --> 
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_correo">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                  <input type="text" name="correo" id="correo" class="form-control" disabled placeholder="CORREO">
                                </div>                            
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_telefono">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                  <input type="text" name="telefono" id="telefono" class="form-control" disabled placeholder="TELEFONO">
                                </div>
                                <script type="text/javascript">
                                  $("#telefono").inputmask({"mask": "(999) 999-9999"});
                                </script>                                 
                                
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->                          
                        </div><!-- /.box body datos personales -->
                      </div><!-- /.box datos personales -->
                    </div><!-- col-md-6 lado izquierdo-->
                    <div class="col-md-6">
                      <div class="box box-default">
                        <div class="box-header with-border <?php echo $color; ?>">
                          <h3 class="box-title">
                          Datos Complementarios           
                          </h3>
                        </div><!-- /.box-header -->                    
                        <div class="box-body">
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_nacionalidad">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                  <select name="nacionalidad" id="nacionalidad" class="form-control" disabled>
                                  <option selected value="0">NACIONALIDAD</option>
                                  </select>
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div>
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_pais">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                  <select name="pais" id="pais" class="form-control" disabled >
                                  <option selected value="0">PAIS DE NACIMIENTO</option>
                                  </select>
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_lugar">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                  <input type="text" name="lugar" id="lugar" class="form-control" disabled placeholder="LUGAR DE NACIMIENTO">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_profesion">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                  <input type="text" name="profesion" id="profesion" class="form-control" disabled placeholder="PROFESION">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                              <div id="cont_especialidad">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                  <input type="text" name="especialidad" id="especialidad" class="form-control" disabled placeholder="ESPECIALIDAD">
                                </div>
                              </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                          <div class="row">
                            <div class="col-xs-12">
                            <div id="cont_direccion">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                <textarea class="form-control" disabled name="direccion" id="direccion" placeholder="DIRECCION"></textarea>
                              </div>
                            </div>  
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                        </div><!-- /.box body datos complementarios -->
                        </div><!-- /.box datos complementarios -->                    
                    </div><!-- col-md-6 lado derecho-->            
                  </div><!-- row -->
                  <div class="box box-default">
                  <div class="box-header with-border <?php echo $color; ?>">
                  <h3 class="box-title">
                    Establecimiento y Servicio al que esta adscrito           
                  </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-group">
                        <div id="cont_estable">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                            <select name="establecimientos" id="establecimientos" disabled class="form-control">
                            <option value="0">SELECCIONE ESTABLECIMIENTO</option>  
                            </select>

                          </div>
                        </div>
                      </div>                 
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                        <div id="cont_servicios">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                            <select name="servicios" id="servicios" disabled class="form-control">
                            <option value="0">SELECCIONE SERVICIO</option>
                            </select>
                          </div>
                        </div>
                      </div>                 
                    </div>
                  </div>
                  <div class="row">                    
                    <div class="col-md-6">
                      <div class="input-group">
                        <div id="cont_cargos">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-files-o"></i></span>
                            <select name="cargos" id="cargos" disabled class="form-control">
                            <option value="0">SELECCIONE CARGO</option>
                            </select>
                          </div>
                        </div>
                      </div>                 
                    </div>
                    <div class="col-md-6">                                     
                            <button type="button" class="btn <?php echo $color; ?>" disabled >Agregar</button>
                    </div>                                        
                  </div>
                  <div id="tble">
                  </div>  
                  </div>
                  </div>                                                 
                  <div class="row">
                    <div class="col-xs-12">
                    <div class="input-group">
                        <a type="button" class="btn <?php echo $color; ?>" onclick="modalantecedentes('0','1');" class="btn btn-block btn-warning btn-xs">Antecedentes</a>           
                    </div>
                    </div>                    
                  </div>  
                <div id="resp"></div>                            
                  <div class="box-footer">
                    <button type="button" class="btn <?php echo $color; ?>" onclick="nuevo();">Nuevo</button>
                  </div>
<div id="container_antecedentes">                  
<!-- Modal Antecedentes content-->
<div id="antecedentes" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">FORMULARIO ANTECEDENTES</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn <?php echo $color; ?>" data-dismiss="modal">Cerrar</button>
        </div>
      </div> 
  </div>
</div>    <!-- /.Modal Antecedentes content-->
</div>               
</form> <!-- /.Cierre de Formulario -->
</div><!-- container -->
</div><!-- box body -->
</div><!-- box box-default -->
</section><!-- section -->
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

                <td><button class="btn btn-block <?php echo $color; ?> btn-xs" onclick="registro('<?php echo $row->codigo; ?>');">Ver Registro</button></td>
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

