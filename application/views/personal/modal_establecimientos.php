                                  <div class="box box-default">
                                    <div class="box-header with-border <?php echo $color; ?>">
                                      <h3 class="box-title">
                                      Establecimientos          
                                      </h3>
                                    </div><!-- /.box-header --> 
                                    <div class="box-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                      <div id="cont_estable">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                                          <input type="hidden" name="idpersonale" id="idpersonale" value="<?php if(!empty($codigo)) { echo $codigo; } ?>">
                                            <select name="establecimientos" id="establecimientos">
                                            <?php
echo $establecimientos;
                                            ?></select>
                                            <button type="button"   class="btn <?php echo $color; ?>" <?php if(!empty($disabled)) { echo $disabled; } ?> onclick="guardar_establecimiento();">Agregar</button>
                                        </div>
                                      </div>
                                      </div>                                  
                                    </div><!-- /.row -->
                                    <div id="tble">
<?php
if (!empty($tmpestable)){
if (empty($tabla)){ $tabla=""; }
$tabla.="<div class=\"row\"><div class=\"col-xs-12\"><div class=\"box\"><div class=\"box-header $color\"><h3 class=\"box-title\">Listado de Establecimientos</h3></div><div class=\"box-body table-responsive\"><table id=\"tablaestab\" name=\"tablaestab\"  class=\"table table-bordered table-striped\"><thead><tr><th>Id</th><th>Nombre</th><th>Controles</th></tr></thead>";
foreach ($tmpestable as $row):
  $ide=$row->idestablecimiento;
  $estab=$row->establecimiento;
  $idp=$row->idpersonal;
  $tabla.="<tbody><tr><td>$ide</td><td>$estab</td><td><a type=\"button\" class=\"btn btn-block <?php echo $color; ?> btn-xs\" onclick=\"bestablecimiento('$ide','$idp');\">Borrar</a></td></tr></tbody>";
endforeach;
$tabla.="</table></div></div></div></div>";
echo $tabla;
}
?>
                                    </div>
                                    </div><!-- /.box -->                  
                                  </div><!-- /.box -->