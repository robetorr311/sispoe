                    <div class="input-group has-error">
                      <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                      <select name="practica" id="practica"  class="form-control select2">
                      <option value="0">SELECCIONE SERVICIO</option>
                        <?php echo $servicios; ?>
                        </select>
                        <button type="button"   class="btn <?php echo $color; ?>" onclick="spractica();">Agregar</button>
                    </div>