
                                <div class="input-group has-error">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control" id="tarjeta" name="tarjeta" onblur="control();" placeholder="NUMERO DE TARJETA"><button type="button" id="recibd" name="recibd"  class="btn <?php echo $color; ?>" disabled onclick="dosimetro();">Recibir</button>                                       
                                </div>
                                    <?php
                                    if(!empty($idtarjeta)){
                                      if($idtarjeta>0){
                                        echo "LA TARJETA YA FUE ASIGNADA!!";
                                      }
                                    }
                                    ?>                                