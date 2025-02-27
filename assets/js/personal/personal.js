function cambiar() {
  var codigo=$('#codigo').val();
  $.ajax({
    url:  base_url + '/Personal/cambiar',
    type: 'POST',
    async: true,
    data: { codigo: codigo },
    success: function(respuesta) {
      $('#cont_codigo').html((respuesta));
      $("#personal").submit(function() {
          return false;
      });  
    }  
  });
}
function validacedula() {
  var cedula=$('#cedula').val();
    buscarcedula(cedula, function(resultado){ 
        r = resultado;
        if(resultado>0){
          $('#imp_cedula').attr('class','input-group has-error');
          alert ('Se ha detectado duplicado de cedula!!');         
        }
        else {
          $('#imp_cedula').attr('class','input-group');
          $('#error-msg').html('OK!!');
       }
    });
}
function editar(id) {
  $.ajax({
    url:  base_url + '/Personal/editar',
    type: 'POST',
    async: true,
    data: { id: id },
    success: function(respuesta) {
      $('#container').html((respuesta));
      $("#personal").submit(function() {
          return false;
      });  
    }  
  });
}
function modalantecedentes(id,form){
  $('.modal-body').load(base_url + '/Personal/antecedentes?id='+ id + '&form=' + form,function(result){
      $('#antecedentes').modal({show:true});
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
      $("#personal").submit(function() {
          return false;
      });  
    }  
  });
}
function cancelar(){
  var codigo=$('#codigo').val();
  $.ajax({
    url:  base_url + '/Personal/cancelar',
    type: 'POST',
    async: true,    
    data: {
        codigo: codigo,
        },
        success: function(respuesta) {
        $(location).attr('href',base_url + '/Personal/index');
      }
    });  
}
function guardar() {
  var codigo=$('#codigo').val();
  var pnombre=$('#pnombre').val();
  var papellido=$('#papellido').val();
  var sapellido=$('#sapellido').val();
  var cedula=$('#cedula').val();
  var telefono=$('#telefono').val();
  var fecha=$('#fecha').val();
  var sexo=$('#sexo').val();
  var snombre=$('#snombre').val();
  var pais=$('#pais').val();
  var direccion=$('#direccion').val();
  var correo=$('#correo').val();
  var profesion=$('#profesion').val();
  var especialidad=$('#especialidad').val();
  var nacionalidad=$('#nacionalidad').val();
  var lugar=$('#lugar').val();
  var activo=20;
  if ($("#inactivo").is(':checked')){
    activo='21';
  }  
  var med=0;
  var r=0;
  if(!codigo) med=1;
  if(!pnombre) med=1;
  if(!papellido) med=1;
  if(!cedula) med=1;
  if(!telefono) med=1;
  if(!fecha) med=1;
  if(sexo=='0') med=1;
  if(!pais) med=1;
  if(!direccion) med=1;
  if(!correo) med=1;
  if(!profesion) med=1;
  if(!especialidad) med=1;
  if(!nacionalidad) med=1;
  if(!lugar) med=1;
  if(med==1){
      if(!codigo) error_codigo();
      if(!pnombre) error_pnombre();
      if(!papellido) error_papellido();
      if(!cedula) error_cedula();
      if(!telefono) error_telefono();
      if(!fecha) error_fecha();
      if(sexo=='0') alert('Falto seleccionar sexo');
      if(!pais) error_pais();
      if(!direccion) error_direccion();
      if(!correo) error_correo();
      if(!profesion) error_profesion();
      if(!especialidad) error_especialidad();
      if(!nacionalidad) error_nacionalidad();
      if(!lugar) error_lugar(); 
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
                codigo: codigo,
                pnombre: pnombre,
                papellido: papellido,
                sapellido: sapellido,
                cedula: cedula,
                telefono: telefono,
                fecha: fecha,
                sexo: sexo,
                snombre: snombre,
                pais: pais,
                direccion: direccion,
                correo: correo,
                profesion: profesion,
                especialidad: especialidad,
                nacionalidad: nacionalidad,
                lugar: lugar,
                activo: activo      
            },
          success: function(respuesta) {
            $('#container').html((respuesta));
          }  
          });          
        }
        else {
          error_tablas();
        }
      });

  }  
}
function fservicios() {
  $.ajax({
    url:  base_url + '/Personal/fservicios',
    type: 'POST',
    async: true,
    data: { id: $('#establecimientos').val() },
    success: function(respuesta) {
      $('#serv').html((respuesta));
    }  
  });
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
      $("#personal").submit(function() {
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
  function error_tablas() {
  $.ajax({
    url:  base_url + '/Personal/error_tablas',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_tablas').html((respuesta));
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
  function error_pnombre() {
  $.ajax({
    url:  base_url + '/Personal/error_pnombre',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_pnombre').html((respuesta));
    }  
  });    
  }
  function error_snombre() {
  $.ajax({
    url:  base_url + '/Personal/error_snombre',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_snombre').html((respuesta));
    }  
  });    
  }
  function error_papellido() {
  $.ajax({
    url:  base_url + '/Personal/error_papellido',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_papellido').html((respuesta));
    }  
  });    
  }
  function error_sapellido() {
  $.ajax({
    url:  base_url + '/Personal/error_sapellido',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_sapellido').html((respuesta));
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
  function error_sexo() {
  $.ajax({
    url:  base_url + '/Personal/error_sexo',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_sexo').html((respuesta));
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

  function error_cedula() {
  $.ajax({
    url:  base_url + '/Personal/error_cedula',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_cedula').html((respuesta));
    }  
  });    
  }
  function error_nacionalidad() {
  $.ajax({
    url:  base_url + '/Personal/error_nacionalidad',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_nacionalidad').html((respuesta));
    }  
  });    
  }
  function error_lugar() {
  $.ajax({
    url:  base_url + '/Personal/error_lugar',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_lugar').html((respuesta));
    }  
  });    
  }
  function error_profesion() {
  $.ajax({
    url:  base_url + '/Personal/error_profesion',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_profesion').html((respuesta));
    }  
  });    
  }
  function error_especialidad() {
  $.ajax({
    url:  base_url + '/Personal/error_especialidad',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_especialidad').html((respuesta));
    }  
  });    
  }    
  function error_fecha() {
  $.ajax({
    url:  base_url + '/Personal/error_fecha',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_fecha').html((respuesta));
    }  
  });    
  }
  function error_pais() {
  $.ajax({
    url:  base_url + '/Personal/error_pais',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_pais').html((respuesta));
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
function verificarcodigo() {
  var codigo=$('#codigo').val();
      controlcodigo(codigo, function(resultado){ 
        r = resultado;
        if(resultado>0){
          error_codigo();         
        }
        else {
          $.ajax({
            url:  base_url + '/Personal/codigocambiado',
            type: 'POST',
            async: true,    
            data: {
                codigo: codigo,   
            },
          success: function(respuesta) {
            $('#container').html((respuesta));
          }  
          }); 
        }
      });
}
  function controlcodigo(codigo, callback) {
  $.ajax({
    url:  base_url + '/Personal/controlcodigo',
    type: 'POST',
    async: true,
    data: { codigo:codigo  },
    success: function(respuesta) {
      var resp=respuesta;
      if(resp=='1'){
        resultado = 1;
      }
      else{
        resultado = 0;
      }
      callback(resultado);      
    }
  });    
  }
  function buscarcedula(cedula, callback) {
  $.ajax({
    url:  base_url + '/Personal/buscarcedula',
    type: 'POST',
    async: true,
    data: { cedula:cedula  },
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