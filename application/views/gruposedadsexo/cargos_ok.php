                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                          <select name="cargos" id="cargos"  class="form-control select2" onchange="comprobar();">
                          <option value="0">SELECCIONE CARGO</option>
                        <option value="99">TOTAL GENERAL (TODOS)</option>
 
                          <?php echo $cargos; ?>                       
                          </select>
                      </div>