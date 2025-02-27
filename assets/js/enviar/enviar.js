function stipo() {
  var tipo=$('#tipo').val();
  if(!comprueba(tipo)){
      error_tipo(); 
  }
  else {
    if(tipo=="1"){
      $.ajax({
        url:  base_url + '/Enviar/preparartodo',
        type: 'POST',
        async: true,
        data: { },
        success: function(respuesta) {
          $('#container').html((respuesta));
          $("#formulario").submit(function() {
              return false;
          });  
        }  
      });
    } 
    else {
      $.ajax({
        url:  base_url + '/Enviar/establecimiento',
        type: 'POST',
        async: true,
        data: { },
        success: function(respuesta) {
          $('#container').html((respuesta));
          $("#formulario").submit(function() {
              return false;
          });  
        }  
      });
    }  
  }
}
function preparar(id) {
    $.ajax({
      url:  base_url + '/Enviar/preparar',
      type: 'POST',
      async: true,
      data: { establecimiento: id },
      success: function(respuesta) {
        $('#container').html((respuesta));
        $("#formulario").submit(function() {
            return false;
        });  
      }  
    });
}
function error_establecimiento() {
  $.ajax({
    url:  base_url + '/Enviar/error_establecimiento',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_establecimiento').html((respuesta));
    }  
  });    
}
function comprueba(obj){
  if (obj=='0'){
    return false;
  }
  else {
    return true;
  }
} 


