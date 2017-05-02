                                <div class="input-group has-error">
                                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control" id="dosimetro" name="dosimetro"  placeholder="NUMERO DE DOSIMETRO" onblur="verdosimetro();">
                                </div>
                                <div class="alert <?php echo $color; ?> alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Error!</h4>
								Dosimetro no existe o ya fue asignado!
								</div>