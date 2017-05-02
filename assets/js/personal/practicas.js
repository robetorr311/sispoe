
function editar(id) {
  $.ajax({
    url:  base_url + '/Personal/editar',
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
    url:  base_url + '/Personal/registro',
    type: 'POST',
    async: true,
    data: { id: id },
    success: function(respuesta) {
      $('#container').html((respuesta));
    }  
  });
}

function guardar() {
  var codigo=$('#codigo').val(); 
  var nombre=$('#nombre').val(); 
  var direccion=$('#direccion').val(); 
  var correo=$('#correo').val(); 
  var telefono=$('#telefono').val(); 
  var estados=$('#estados').val(); 
  var municipios=$('#municipios').val(); 
  var parroquias=$('#parroquias').val(); 
  var director=$('#director').val();
  var med=0;
  var r=0;
  if(!codigo) med=1;
  if(!nombre) med=1;
  if(!direccion) med=1;
  if(!director) med=1;
  if(!correo) med=1;
  if(!telefono) med=1;
  if(!comprueba(estados)) med=1;
  if(!comprueba(municipios)) med=1;
  if(!comprueba(parroquias)) med=1;
  if(med==1){
      if(!codigo) error_codigo(); 
      if(!nombre) error_nombre(); 
      if(!direccion) error_direccion(); 
      if(!correo) error_correo(); 
      if(!telefono) error_telefono(); 
      if(!director) error_director();       
      if(!comprueba(estados)) error_estados(); 
      if(!comprueba(municipios)) error_municipios(); 
      if(!comprueba(parroquias)) error_parroquias(); 
  }
  else {
      controltablas(codigo, function(resultado){ 
        r = resultado;
        if(resultado>0){
          $.ajax({
            url:  base_url + '/Personal/guardar',
            type: 'POST',
            async: true,    
            data: {
              codigo:codigo, 
              nombre:nombre, 
              direccion:direccion, 
              correo:correo, 
              telefono:telefono, 
              estados:estados, 
              municipios:municipios, 
              parroquias:parroquias, 
              director:director       
            },
          success: function(respuesta) {
            $('#container').html((respuesta));
          }  
          });          
        }
        else {
          error_servicios();
        }
      });

  }  
}
function smunicipios() {
  $.ajax({
    url:  base_url + '/Personal/municipios',
    type: 'POST',
    async: true,
    data: { id: $('#estados').val() },
    success: function(respuesta) {
      $('#muni').html((respuesta));
    }  
  });
}
function spractica() {
  $.ajax({
    url:  base_url + '/Personal/servicios',
    type: 'POST',
    async: true,
    data: { codigo:$('#codigo').val(), id: $('#practica').val(), nombre: $('#practica option:selected').text() },
    success: function(respuesta) {
      $('#tablapractica').html((respuesta));
    }  
  });
}
function bpractica(id, codigo) {
  $.ajax({
    url:  base_url + '/Personal/bservicios',
    type: 'POST',
    async: true,
    data: { codigo: codigo, id: id },
    success: function(respuesta) {
      $('#tablapractica').html((respuesta));
    }  
  });
}
function sparroquias() {
  $.ajax({
    url:  base_url + '/Personal/parroquias',
    type: 'POST',
    async: true,
    data: { id: $('#municipios').val() },
    success: function(respuesta) {
      $('#parr').html((respuesta));
    }  
  });
}
function nuevo() {
  $.ajax({
    url:  base_url + '/Personal/nuevo',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#container').html((respuesta));
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
function tablatemporal(id) {
  var resp='NULL';
  $.ajax({
    url:  base_url + '/Personal/tablatemporal',
    type: 'POST',
    async: true,
    data: { id:id },
    success: function(respuesta) {
      resp=respuesta.responseText;
    }  
  });
  var n = resp.search("OK");
  alert(n);
  if (n==0){
    return true;
  }
  else {
    return false;
  }    
}
  function error_servicios() {
  $.ajax({
    url:  base_url + '/Personal/error_servicios',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_servicios').html((respuesta));
    }  
  });    
  }
  function error_codigo() {
  $.ajax({
    url:  base_url + '/Personal/error_codigo',
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
    url:  base_url + '/Personal/error_nombre',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_nombre').html((respuesta));
    }  
  });    
  }
  function error_direccion() {
  $.ajax({
    url:  base_url + '/Personal/error_direccion',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_direccion').html((respuesta));
    }  
  });    
  }
  function error_director() {
  $.ajax({
    url:  base_url + '/Personal/error_director',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_director').html((respuesta));
    }  
  });    
  }
  function error_correo() {
  $.ajax({
    url:  base_url + '/Personal/error_correo',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_correo').html((respuesta));
    }  
  });    
  }
  function error_telefono() {
  $.ajax({
    url:  base_url + '/Personal/error_telefono',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_telefono').html((respuesta));
    }  
  });    
  }
  function error_estados() {
  $.ajax({
    url:  base_url + '/Personal/error_estados',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_estados').html((respuesta));
    }  
  });    
  }
  function error_municipios() {
  $.ajax({
    url:  base_url + '/Personal/error_municipios',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_municipios').html((respuesta));
    }  
  });    
  }
  function error_parroquias() {
  $.ajax({
    url:  base_url + '/Personal/error_parroquias',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_parroquias').html((respuesta));
    }  
  });    
  }
  function controltablas(id, callback) {
  $.ajax({
    url:  base_url + '/Personal/tablatemporal',
    type: 'POST',
    async: true,
    data: { id:id  },
    success: function(respuesta) {
      var resp=respuesta;
      if(resp=='NULL'){
        resultado = 0;
      }
      else{
        resultado = 1;
      }
      callback(resultado);      
    }
  });    
  }  
