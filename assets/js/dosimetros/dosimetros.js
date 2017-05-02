function editar(id) {
  $.ajax({
    url:  base_url + '/Dosimetros/editar',
    type: 'POST',
    async: true,
    data: { id: id },
    success: function(respuesta) {
      $('#container').html((respuesta));
      $("#formulario").submit(function() {
          return false;
      });         
    }  
  });
}
function registro(id) {
  $.ajax({
    url:  base_url + '/Dosimetros/registro',
    type: 'POST',
    async: true,
    data: { id: id },
    success: function(respuesta) {
      $('#container').html((respuesta));
      $("#formulario").submit(function() {
          return false;
      });         
    }  
  });
}

function guardar() {
  var codigo=$('#codigo').val(); 
  var nombre=$('#nombre').val(); 
  var estatus=$('#estatus').val(); 
  var med=0;
  var r=0;
  if(!codigo) med=1;
  if(!nombre) med=1;
  if(!comprueba(estatus)) med=1;
  if(med==1){
      if(!codigo) error_codigo(); 
      if(!nombre) error_nombre(); 
      if(!comprueba(estatus)) error_estatus(); 
  }
  else {
          $.ajax({
            url:  base_url + '/Dosimetros/guardar',
            type: 'POST',
            async: true,    
            data: {
              codigo:codigo, 
              nombre:nombre, 
              estatus:estatus   
            },
          success: function(respuesta) {
            $('#container').html((respuesta));
            $("#formulario").submit(function() {
                return false;
            });               
          }  
    });          
  }  
}
function nuevo() {
  $.ajax({
    url:  base_url + '/Dosimetros/nuevo',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#container').html((respuesta));
      $("#formulario").submit(function() {
          return false;
      });      
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
  function error_estatus() {
  $.ajax({
    url:  base_url + '/Dosimetros/error_estatus',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_estatus').html((respuesta));
    }  
  });    
  }
  function error_codigo() {
  $.ajax({
    url:  base_url + '/Dosimetros/error_codigo',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_codigo').html((respuesta));
    }  
  });    
  }
  function error_nombre() {
  $.ajax({
    url:  base_url + '/Dosimetros/error_nombre',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_nombre').html((respuesta));
    }  
  });    
  }



