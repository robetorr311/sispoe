function stipo() {
  var tipo=$('#tipo').val();
  var med=0;
  if(!comprueba(tipo)) med=1; 
  if(med==1){
    if(!comprueba(tipo)) error_tipo(); 
  }
  else {
    if(tipo=="1"){
      $('#establecimientos').attr('disabled' , true);
      $('#estados').attr('disabled' , true); 
      $('#generar').attr('disabled' , false);      
    } 
    else {
      if (tipo=="2"){
        $.ajax({
          url:  base_url + '/Rpersonal/pestados',
          type: 'POST',
          async: true,
          data: { },
          success: function(respuesta) {
            $('#cont_estado').html((respuesta));
          }  
        });        
        $('#establecimientos').attr('disabled' , true);
        $('#estados').attr('disabled' , false);
        $('#generar').attr('disabled' , false);

      }
      else {
        $.ajax({
          url:  base_url + '/Rpersonal/estadosp',
          type: 'POST',
          async: true,
          data: { },
          success: function(respuesta) {
            $('#cont_estado').html((respuesta));
          }  
        });        
        $('#establecimientos').attr('disabled' , false);
        $('#estados').attr('disabled' , false);
        $('#generar').attr('disabled' , false);         
      }
    }  
  }
}
function pestablecimientos(){
  var id=$('#estados').val();
    $.ajax({
      url:  base_url + '/Rpersonal/pestablecimientos',
      type: 'POST',
      async: true,
      data: { estado: id },
      success: function(respuesta) {
        $('#cont_establecimiento').html((respuesta));
      }  
    });
}
function sgenerar() {
  var tipo=$('#tipo').val();
  var med=0;
  if(!comprueba(tipo)) med=1; 
  if(med==1){
    if(!comprueba(tipo)) error_tipo(); 
  }
  else {
    if(tipo=="1"){
        var ruta= base_url + '/Rpersonal/generar?tipo=1';    
        $.ajax({
          url:  base_url + '/Rpersonal/button_pdf',
          type: 'POST',
          async: true,
          data: { ruta: ruta },
          success: function(respuesta) {
            $('#button_pdf').html((respuesta));
          }  
        });    
    } 
    else {
      if (tipo=="2"){
        var estado=$('#estados').val();
        if(!comprueba(estado)) { 
          error_estado(); 
        } 
        else{
        var ruta= base_url + '/Rpersonal/generar?tipo=2&estado='+ estado;    
        $.ajax({
          url:  base_url + '/Rpersonal/button_pdf',
          type: 'POST',
          async: true,
          data: { ruta: ruta },
          success: function(respuesta) {
            $('#button_pdf').html((respuesta));
          }  
        });
        } 
      }
      else {
        var establecimiento=$('#establecimientos').val();
        var estado=$('#estados').val();                
        if((!comprueba(estado)) || (!comprueba(establecimiento))) { 
          if (!comprueba(estado)) error_estado();
          if (!comprueba(establecimiento)) error_establecimiento();           
        } 
        else{
        var ruta= base_url + '/Rpersonal/generar?tipo=3&estado='+ estado + '&establecimiento=' + establecimiento;    
        $.ajax({
          url:  base_url + '/Rpersonal/button_pdf',
          type: 'POST',
          async: true,
          data: { ruta: ruta },
          success: function(respuesta) {
            $('#button_pdf').html((respuesta));
          }  
        });
        }             
      }
    }  
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
function error_estado() {
  $.ajax({
    url:  base_url + '/Rpersonal/error_estado',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_estados').html((respuesta));
    }  
  });    
}
function error_establecimiento() {
  var estado=$('#estados').val();
  $.ajax({
    url:  base_url + '/Rpersonal/error_establecimiento',
    type: 'POST',
    async: true,
    data: { estado: estado },
    success: function(respuesta) {
      $('#cont_establecimientos').html((respuesta));
    }  
  });    
}