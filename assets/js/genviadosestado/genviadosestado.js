function generar() {
  var fechai=$('#fechai').val();
  var fechaf=$('#fechaf').val();
  var med=0;
  if(!fechai) med=1;  
  if(!fechaf) med=1;
  if(med==1){
    if(!fechai) error_fechai();
    if(!fechaf) error_fechaf();
  }
  else {
    var ruta= base_url + '/Genviadosestado/genviadosestado?fechai=' + fechai + '&fechaf=' + fechaf;
    $.ajax({
      url:  base_url + '/Genviadosestado/button_pdf',
      type: 'POST',
      async: true,
      data: { ruta: ruta },
      success: function(respuesta) {
        $('#button_pdf').html((respuesta));
      }  
    });   
  }   
}
function comprueba(obj){
  if (obj=='0'){
    return false;
  }
  else {
    return true;
  }
} 

function error_fechai() {
  $.ajax({
    url:  base_url + '/Reportedosis/error_fechai',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_fechai').html((respuesta));
    }  
  });    
}
function error_fechaf() {
  $.ajax({
    url:  base_url + '/Reportedosis/error_fechaf',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_fechaf').html((respuesta));
    }  
  });    
}