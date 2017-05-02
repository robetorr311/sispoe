function guardar_establecimiento() {                
      var ide=$('#establecimientos').val();
      var ids=$('#servicios').val(); 
      var idc=$('#cargos').val();           
      var idpersonale=$('#idpersonale').val();    
      var med=0;
      if(!ide) med=1;
      if(!comprueba(ide)) med=1;
      if(!ids) med=1;
      if(!comprueba(ids)) med=1;
      if(!idc) med=1;
      if(!comprueba(idc)) med=1;            
      if(med==1){
          if(!ide) error_establecimiento();
          if(!comprueba(ide)) error_establecimiento();  
          if(!ids) error_servicio(); 
          if(!comprueba(ids)) error_servicio();
          if(!idc) error_cargo();  
          if(!comprueba(idc)) error_cargo();                                   
      }
      else {
            $.ajax({
                url:  base_url + '/Personal/gestablecimiento',
                type: 'POST',
                async: true,   
                data: {  codigo:$('#codigo').val(), 
                         idestablecimiento: $('#establecimientos').val(),
                         idservicio: $('#servicios').val(),
                         idcargo: $('#cargos').val(),
                 }, 
              success: function(respuesta) {
                $('#tble').html((respuesta));
              }  
        });           
      }
}

function bestablecimiento(id, codigo) {
  $.ajax({
    url:  base_url + '/Personal/bestablecimientos',
    type: 'POST',
    async: true,
    data: { codigo: codigo, establecimiento: id },
    success: function(respuesta) {
      $('#tble').html((respuesta));
    }  
  });
}
function bcargo(id, codigo) {
  $.ajax({
    url:  base_url + '/Personal/bcargo',
    type: 'POST',
    async: true,
    data: { codigo: codigo, idtemp: id },
    success: function(respuesta) {
      $('#tble').html((respuesta));
    }  
  });
}
function error_establecimiento() {
  $.ajax({
    url:  base_url + '/Personal/error_establecimiento',
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