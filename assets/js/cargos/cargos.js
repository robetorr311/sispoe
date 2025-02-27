
function editar(id) {
  $.ajax({
    url:  base_url + '/Cargos/editar',
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
    url:  base_url + '/Cargos/registro',
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
  var med=0;
  var r=0;
  if(!codigo) med=1;
  if(!nombre) med=1;
  if(med==1){
      if(!codigo) error_codigo(); 
      if(!nombre) error_nombre(); 
  }
  else {
          $.ajax({
            url:  base_url + '/Cargos/guardar',
            type: 'POST',
            async: true,    
            data: {
              codigo:codigo, 
              nombre:nombre 
            },
          success: function(respuesta) {
            $('#container').html((respuesta));
          }  
    });          
  }  
}
function nuevo() {
  $.ajax({
    url:  base_url + '/Cargos/nuevo',
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
  function error_codigo() {
  $.ajax({
    url:  base_url + '/Cargos/error_codigo',
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
    url:  base_url + '/Cargos/error_nombre',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_nombre').html((respuesta));
    }  
  });    
  }



