<section class="content">
        <div class="box box-default">
            <div class="box-header with-border <?php echo $color; ?>">
              <h3 class="box-title">
              Agregar / Editar Valores de Lectura en Dosimetros          
              </h3>
            </div><!-- /.box-header -->
              <div class="box-body">         
                <div class="row">
                    <div class="col-md-6">
                      <div id="cont_tabla">
                        <div id="cont_codigo">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                            <input type="text" name="codigo" id="codigo" class="form-control" placeholder="INGRESE NUMERO DE DOSIMETRO">
                          </div>
                          <button type="button" id="modal" class="btn <?php echo $color; ?>" >Continuar</button>
                        </div>
                      </div><!-- /.box -->
                    </div><!-- /.col -->  
                </div><!-- /.row --> 
              </div><!-- /.box box-body -->        
              <div class="box-footer">
              </div>
        </div> <!-- /.box box-default -->                       
</section>
<div id="container_dosimetro" >
<!-- Modal content-->
<div id="modaldosimetro" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">EDITAR DOSIMETRO</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning"  data-dismiss="modal" >Cerrar</button>
      </div>              
    </div>
  </div>    <!-- /.Modal content-->  
</div>
</div>
<!-- jQuery 2.1.4 -->
<script type="text/javascript">
$( document ).ready(function() {
   $("#modal").click(function(){
     var codigo = $("#codigo").val();
     fdosimetro(codigo);
   });
});
function fdosimetro(codigo){
  $('#modaldosimetro').on('hidden.bs.modal', function () {
    location.reload();
  });
  $('.modal-body').load(base_url + '/Electuras/modal_electuras?codigo=' + codigo,function(result){
    $('#modaldosimetro').modal({show:true});
  });
  } 
function guardardosis(){

    var dosimetro=$("#dosimetro").val();
    var idtarjeta=$("#idtarjeta").val();
    var idpersonal=$("#idpersonal").val();
    var dosis=$("#dosis").val();
      $.ajax({
        url:  base_url + '/Electuras/guardar',
        type: 'POST',
        async: true,
        data: { 
            dosimetro: dosimetro,
            idtarjeta: idtarjeta,
            idpersonal: idpersonal,
            dosis: dosis,
        },
        success: function(respuesta) {
          $('#mensaje').html(('<div class="alert alert-warning">Se han guardado los cambios</div>'));
        }  
      });
} 
</script>