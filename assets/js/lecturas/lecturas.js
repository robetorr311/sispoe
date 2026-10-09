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
    $("#tabla_norecibidos").hide(); 
    $("#verificar_dosimetros").prop("disabled",true);
    $('#verificar_dosimetros').on("click",function(){
        let archivo_asc=$("#archivo_asc").val();
        $.ajax({
            url: base_url + '/Lecturas/verificar_archivo',
            type: 'POST',
            async: true,
            dataType: "json",
            data: { archivo_asc: archivo_asc },
            success: function(response){
              if(response.status=='pendiente'){
                  $('#tabladosimetros_norec').DataTable({
                    data : response.norecibidos,
                    "oPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false,
                    "lengthMenu":[[10,25,50,100,200,-1],[10,25,50,100,200,"All"]],
                    "columns": [
                    { data: 'id'},
                    { data: 'idpersona'},
                    { data: 'personalnombre'},
                    { data: 'fechainicio'},
                    { data: 'fechafin'},
                    { data: 'servicionombre'},
                    { data: 'id', 
                        render: function(data,type,row){
                          return '<button type="button" class="btn btn-block bg-yellow btn-xs" onclick="recepcionar('+ data +');">Recepcionar</button>'+
                                        '<button type="button" class="btn btn-block bg-yellow btn-xs" onclick="pendiente('+ data + ');">Dejar pendiente</button>';
                        }
                    }
                    ]
                  });
                  $("#ids").val(response.ids);
                  $("#tabla_norecibidos").show();

              }
              else{
                  let output = '<div class="row"><div class="col-md-12"><div class="box-header with-border bg-yellow"><h3 class="box-title">'+response.message+'</h3></div></div></div>';
                  output = output + '<div class="row"><div class="col-md-12 text-center"><button type="button" class="btn btn-block bg-yellow btn-xs" onclick="leer_archivo();">Guardar Lectura</button></div></div>';
                  $("#tabla_norecibidos").html(output);
                  $("#tabla_norecibidos").show();
              }
              
            }
        });
    });
  });
  $(function(){
      $('#drag-and-drop-zone1').dmUploader({ //
          url: base_url + '/Lecturas/cargar_asc',
          maxFileSize: 3000000, // 3 Megs
          multiple: true,
          //allowedTypes: "text/plain",
          extFilter: ["asc", "txt"],
          dataType: "json", 
          onComplete: function(){
          // All files in the queue are processed (success or error)
          //ui_add_log('All pending tranfers finished');
          },
          onUploadSuccess: function(id,data){
              if(data.status=='ok'){
                  let ruta=data.path;
                  let path=ruta.replace('./assets/uploads/','/var/www/html/sispoe/assets/uploads/')
                  $("#archivo_asc").val(path);
                  let output = '<div class="row"><div class="col-md-12"><div class="box-header with-border bg-yellow"><h3 class="box-title">Archivo cargado: '+path+'</h3></div></div></div>';
                  $("#file_asc").html(output);
                  let fecha=$("#fecha").val();
                  if(!fecha){
                      $("#verificar_dosimetros").prop("disabled",true);
                  }
                  else{
                      $("#verificar_dosimetros").prop("disabled",false);
                  }
              }
              else{
                  $("#success-asc").html('<div class="alert alert-danger" role="alert">'+data.message+'<div>');
                  $("#verificar_dosimetros").prop("disabled",true);
              }
          }
      });
  });
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
function recepcionar(id) {
  let archivo_asc=$("#archivo_asc").val();
  let ids=$("#ids").val();
      $.ajax({
        url:  base_url + '/Lecturas/recepcionar',
        type: 'POST',
        async: true,
        data: { id :  id , archivo_asc: archivo_asc, ids : ids },
        success: function(respuesta) {
          if(respuesta.status=='pendiente'){
            $('#tabladosimetros_norec').DataTable().clear();
            $('#tabladosimetros_norec').DataTable().rows.add(respuesta.norecibidos);
            $('#tabladosimetros_norec').DataTable().draw();
          }
          else{
            let output = '<div class="row"><div class="col-md-12"><div class="box-header with-border bg-yellow"><h3 class="box-title">'+respuesta.message+'</h3></div></div></div>';
            output = output + '<div class="row"><div class="col-md-12 text-center"><button type="button" class="btn btn-block bg-yellow btn-xs" onclick="leer_archivo();">Guardar Lectura</button></div></div>';
            $("#tabla_norecibidos").html(output);
          }
        }  
      });
} 
function pendiente(id) {
  let archivo_asc=$("#archivo_asc").val();
  let ids=$("#ids").val();
      $.ajax({
        url:  base_url + '/Lecturas/pendiente',
        type: 'POST',
        async: true,
        data: { id :  id , archivo_asc: archivo_asc, ids : ids  },
        success: function(respuesta) {
          if(respuesta.status=='pendiente'){
            $('#tabladosimetros_norec').DataTable().clear();
            $('#tabladosimetros_norec').DataTable().rows.add(respuesta.norecibidos);
            $('#tabladosimetros_norec').DataTable().draw();
          }
          else{

              $("#tabla_norecibidos").hide();
          }
        }  
      });
}
function leer_archivo(){
  let archivo_asc=$("#archivo_asc").val();
  let fecha=$("#fecha").val();
  $.ajax({
    url:  base_url + '/Lecturas/lectura',
    type: 'POST',
    async: true,
    data: { fecha :  fecha , archivo_asc: archivo_asc },
    success: function(respuesta) {
      let output = '<div class="row"><div class="col-md-12"><div class="box-header with-border bg-yellow"><h3 class="box-title">Se guardo la lectura de todos las tarjetas.</h3></div></div></div>';
      output = output + '<div class="row"><div class="col-md-12 text-center"><button type="button" class="btn btn-block bg-yellow btn-xs" onclick="location.reload();">Finalizar</button></div></div>';
      $("#tabla_norecibidos").html(output);
    }  
  });
}
