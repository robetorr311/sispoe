
function editar(id) {
  $.ajax({
    url:  base_url + '/Servicios/editar',
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
    url:  base_url + '/Servicios/registro',
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
  var padres=$('#padres').val(); 
  var med=0;
  var r=0;
  if(!codigo) med=1;
  if(!nombre) med=1;
  if(!comprueba(padres)) med=1;
  if(med==1){
      if(!codigo) error_codigo(); 
      if(!nombre) error_nombre(); 
      if(!comprueba(padres)) error_padres(); 
  }
  else {
          $.ajax({
            url:  base_url + '/Servicios/guardar',
            type: 'POST',
            async: true,    
            data: {
              codigo:codigo, 
              nombre:nombre, 
              padres:padres   
            },
          success: function(respuesta) {
            $('#container').html((respuesta));
          }  
    });          
  }  
}
function nuevo() {
  $.ajax({
    url:  base_url + '/Servicios/nuevo',
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
  function error_padres() {
  $.ajax({
    url:  base_url + '/Servicios/error_padres',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_padres').html((respuesta));
    }  
  });    
  }
  function error_codigo() {
  $.ajax({
    url:  base_url + '/Servicios/error_codigo',
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
    url:  base_url + '/Servicios/error_nombre',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_nombre').html((respuesta));
    }  
  });    
  }



