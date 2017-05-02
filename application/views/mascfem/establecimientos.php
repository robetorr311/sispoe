                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>              
                          <select name="establecimientos" id="establecimientos"  class="form-control select2"  onchange="pservicios(); pcargos();">
                          <option value="0">SELECCIONE ESTABLECIMIENTO</option>
                        <option value="99">TOTAL GENERAL (TODOS)</option>
                        
                          <?php echo $establecimientos; ?>

                          </select>
                      </div>