function buscartarjeta() {
  var nombre=$('#nombre').val();
    btarjeta(nombre, function(resultado){ 
        r = resultado;
        if(resultado>0){
          $('#imp_nombre').attr('class','input-group has-error');
          alert ('Se ha detectado duplicado de tarjeta!!');         
        }
        else {
          $('#imp_nombre').attr('class','input-group');
       }
    });
}
function btarjeta(nombre, callback) {
  $.ajax({
    url:  base_url + '/Dosimetros/buscartarjeta',
    type: 'POST',
    async: true,
    data: { nombre:nombre  },
    success: function(respuesta) {
      var resp=respuesta;
      if(resp=='0'){
        resultado = 0;
      }
      else{
        resultado = 1;
      }
      callback(resultado);      
    }
  });    
  }
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
  var tipo=$('#tipo').val(); 
  var med=0;
  var r=0;
  if(!codigo) med=1;
  if(!nombre) med=1;
  if(!tipo) med=1;
  if(!comprueba(estatus)) med=1;
  if(med==1){
      if(!codigo) error_codigo(); 
      if(!nombre) error_nombre();
      if(!tipo) error_tipo(); 
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
              estatus:estatus,
              tipo:tipo   
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
  function error_tipo() {
  $.ajax({
    url:  base_url + '/Dosimetros/error_tipo',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_tipo').html((respuesta));
    }  
  });    
  }  



