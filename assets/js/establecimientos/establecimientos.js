function editar(id) {
  $.ajax({
    url:  base_url + '/Establecimientos/editar',
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
function personal(id){
  $('.modal-body').load(base_url + '/Establecimientos/personal?id='+ id,function(result){
      $('#modalpersonal').modal({show:true});
  });  
}

function registro(id) {
  $.ajax({
    url:  base_url + '/Establecimientos/registro',
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
  var direccion=$('#direccion').val(); 
  var correo=$('#correo').val(); 
  var telefono=$('#telefono').val(); 
  var estados=$('#estados').val(); 
  var municipios=$('#municipios').val(); 
  var parroquias=$('#parroquias').val(); 
  var director=$('#director').val();
  var rif=$('#rif').val();
  var med=0;
  var r=0;
  if(!codigo) med=1;
  if(!nombre) med=1;
  if(!direccion) med=1;
  if(!director) med=1;
  if(!correo) med=1;
  if(!telefono) med=1;
  if(!rif) med=1;
  if(!comprueba(estados)) med=1;
  if(!comprueba(municipios)) med=1;
  if(!comprueba(parroquias)) med=1;
  if(med==1){
      if(!codigo) error_codigo(); 
      if(!nombre) error_nombre(); 
      if(!direccion) error_direccion(); 
      if(!correo) error_correo(); 
      if(!telefono) error_telefono();
      if(!rif) error_rif(); 
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
            url:  base_url + '/Establecimientos/guardar',
            type: 'POST',
            async: true,    
            data: {
              codigo:codigo, 
              nombre:nombre, 
              direccion:direccion, 
              correo:correo, 
              telefono:telefono, 
              rif:rif,
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
    url:  base_url + '/Establecimientos/municipios',
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
    url:  base_url + '/Establecimientos/servicios',
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
    url:  base_url + '/Establecimientos/bservicios',
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
    url:  base_url + '/Establecimientos/parroquias',
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
    url:  base_url + '/Establecimientos/nuevo',
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
function tablatemporal(id) {
  var resp='NULL';
  $.ajax({
    url:  base_url + '/Establecimientos/tablatemporal',
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
    url:  base_url + '/Establecimientos/error_servicios',
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
    url:  base_url + '/Establecimientos/error_codigo',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_codigo').html((respuesta));
    }  
  });    
  }
  function error_rif() {
  $.ajax({
    url:  base_url + '/Establecimientos/error_rif',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_rif').html((respuesta));
    }  
  });    
  }  
  function error_nombre() {
  $.ajax({
    url:  base_url + '/Establecimientos/error_nombre',
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
    url:  base_url + '/Establecimientos/error_direccion',
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
    url:  base_url + '/Establecimientos/error_director',
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
    url:  base_url + '/Establecimientos/error_correo',
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
    url:  base_url + '/Establecimientos/error_telefono',
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
    url:  base_url + '/Establecimientos/error_estados',
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
    url:  base_url + '/Establecimientos/error_municipios',
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
    url:  base_url + '/Establecimientos/error_parroquias',
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
    url:  base_url + '/Establecimientos/tablatemporal',
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



