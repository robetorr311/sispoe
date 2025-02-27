function editar(id) {
  $.ajax({
    url:  base_url + '/Usuarios/editar',
    type: 'POST',
    async: true,
    data: { id: id },
    success: function(respuesta) {
      $('#container').html((respuesta));
    }  
  });
}
function registro(id) {
  $.ajax({
    url:  base_url + '/Usuarios/registro',
    type: 'POST',
    async: true,
    data: { id:id },
    success: function(respuesta) {
      $('#container').html((respuesta));
    }  
  });
}

function guardar() {
  var codigo=$('#codigo').val(); 
  var nombre=$('#nombre').val(); 
  var login=$('#login').val(); 
  var password=$('#password').val(); 
  var med=0;
  var r=0;
  if(!codigo) med=1;
  if(!nombre) med=1;
  if(med==1){
      if(!codigo) error_codigo(); 
      if(!nombre) error_nombre(); 
      if(!login) error_login(); 
      if(!password) error_password(); 
  }
  else {
          $.ajax({
            url:  base_url + '/Usuarios/guardar',
            type: 'POST',
            async: true,    
            data: {
              codigo:codigo, 
              nombre:nombre, 
              login:login, 
              password:password 
            },
          success: function(respuesta) {
            $('#container').html((respuesta));
          }  
    });          
  }  
}
function nuevo() {
  $.ajax({
    url:  base_url + '/Usuarios/nuevo',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#container').html((respuesta));
    }  
  });
}
  function error_codigo() {
  $.ajax({
    url:  base_url + '/Usuarios/error_codigo',
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
    url:  base_url + '/Usuarios/error_nombre',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_nombre').html((respuesta));
    }  
  });    
  }
  function error_login() {
  $.ajax({
    url:  base_url + '/Usuarios/error_login',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_login').html((respuesta));
    }  
  });    
  }
  function error_password() {
  $.ajax({
    url:  base_url + '/Usuarios/error_password',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_password').html((respuesta));
    }  
  });    
  }


