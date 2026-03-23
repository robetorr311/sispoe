
                                <div class="input-group has-error">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control" id="tarjeta" name="tarjeta" onblur="control();" placeholder="NUMERO DE TARJETA">                                       
                                </div>
<?php
    echo "<div class=\"alert $color alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button><h4><i class=\"icon fa fa-warning\"></i> Error!</h4>LA TARJETA YA FUE ASIGNADA!!</div>";
?>                                
                                    