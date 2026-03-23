                    <div class="input-group has-error">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="servicio" id="servicio"  class="form-control select2">
                              <option value="0">SELECCIONE SERVICIO</option>
                              <?php
                              if (!empty($tablaservicios)){
                                	foreach ($tablaservicios as $row):
                              ?>
                                  <option value="<?php echo $row->nidservicio; ?>"><?php echo $row->nservicio; ?></option> 
                              <?php
                                	endforeach;
                            	}
                              ?>                      
                        </select>
                    </div>