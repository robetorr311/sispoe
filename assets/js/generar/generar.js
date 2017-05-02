function stipo() {
  var fechai=$('#fechai').val();
  var fechaf=$('#fechaf').val();
  var estudio=$('#estudio').val();
  var tipo=$('#tipo').val();
  var med=0;
  if(!fechai) med=1;  
  if(!fechaf) med=1;  
  if(!comprueba(tipo)) med=1; 
  if(!comprueba(estudio)) med=1;
  if(!vRangodeFechas()) med=1;
  if(med==1){
    if(!vRangodeFechas()) { 
      error_fechai();
      error_fechaf();
    }
    if(!fechai) error_fechai();
    if(!fechaf) error_fechaf(); 
    if(!comprueba(tipo)) error_tipo(); 
    if(!comprueba(estudio)) error_estudio();  
  }
  else {
    if(tipo=="1"){
          $.ajax({
          url:  base_url + '/Generar/preparartodo',
          type: 'POST',
          async: true,
          data: { fechai: fechai,
                  fechaf: fechaf,
                  estudio: estudio 
                },
          success: function(respuesta) {
            $('#container').html((respuesta));
            $("#formulario").submit(function() {
                return false;
            });  
          }  
          });
    } 
    else {
      if (tipo=="2"){
        $.ajax({
          url:  base_url + '/Generar/establecimiento',
          type: 'POST',
          async: true,
          data: { fechai: fechai,
                  fechaf: fechaf,
                  estudio: estudio
                },
          success: function(respuesta) {
            $('#container').html((respuesta));
            $("#formulario").submit(function() {
                return false;
            });  
          }  
        });
      }
      else {
        $.ajax({
          url:  base_url + '/Generar/porestado',
          type: 'POST',
          async: true,
          data: { fechai: fechai,
                  fechaf: fechaf,
                  estudio: estudio
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
  }
}
function pestablecimientos(){
  var id=$('#estados').val();
    $.ajax({
      url:  base_url + '/Generar/pestablecimientos',
      type: 'POST',
      async: true,
      data: { estado: id },
      success: function(respuesta) {
        $('#cont_establecimiento').html((respuesta));
      }  
    });
}
function preparar(){
  var id=$('#establecimiento').val();
    $.ajax({
      url:  base_url + '/Generar/preparar',
      type: 'POST',
      async: true,
      data: { establecimiento: id },
      success: function(respuesta) {
        $('#cont_servicios').html((respuesta));
      }  
    });
}
function generar() {
  var med=0;
  var id=$('#establecimiento').val();  
  var fechai=$('#fechai').val();
  var fechaf=$('#fechaf').val();
  var estudio=$('#estudio').val();
  var servicio=$('#servicio').val(); 
  if(!servicio) med=1;  
  if(!comprueba(servicio)) med=1;
  if(med==1){
    if(!servicio) error_fechai();
    if(!comprueba(servicio)) error_servicios(id); 
  }
  else {

      controldosim(id,estudio,fechai,fechaf, function(resultado){ 
        r = resultado;
        if(resultado>0){
          error_validado();
        }
        else {
          $.ajax({
            url:  base_url + '/Generar/gen_dosim',
            type: 'POST',
            async: true,
            data: { establecimiento: id,
                    fechai: fechai,
                    fechaf: fechaf,
                    estudio: estudio,
                    servicio: servicio
                  },
            success: function(respuesta) {
              $('#container').html((respuesta));
              $("#formulario").submit(function() {
                  return false;
              });  
            }  
          });
        }
      });
 }
}
function generarxestado() {
  var med=0;
  var estado=$('#estados').val();  
  var fechai=$('#fechai').val();
  var fechaf=$('#fechaf').val();
  var estudio=$('#estudio').val();
  if(!estado) med=1;  
  if(!comprueba(estado)) med=1;
  if(med==1){
    if(!estado) error_estado();
    if(!comprueba(estado)) error_estado(); 
  }
  else {
          $.ajax({
            url:  base_url + '/Generar/genxestado',
            type: 'POST',
            async: true,
            data: { estado: estado,
                    fechai: fechai,
                    fechaf: fechaf,
                    estudio: estudio
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
function actualizar(id) {
  $.ajax({
    url:  base_url + '/Generar/actualizar',
    type: 'POST',
    async: true,
    data: { id: id },
    success: function(respuesta) {
      $('#cont_tabla').html((respuesta));
    }  
  });    
}
function anular(id) {
  $.ajax({
    url:  base_url + '/Generar/anular',
    type: 'POST',
    async: true,
    data: { id: id },
    success: function(respuesta) {
      $('#cont_tabla').html((respuesta));
    }  
  });    
}
function error_validado() {
  $.ajax({
    url:  base_url + '/Generar/error_validado',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_validado').html((respuesta));
    }  
  });    
}
function error_estudio() {
  $.ajax({
    url:  base_url + '/Generar/error_estudio',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_estudio').html((respuesta));
    }  
  });    
}
function error_fechai() {
  $.ajax({
    url:  base_url + '/Generar/error_fechai',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_fechai').html((respuesta));
    }  
  });    
}
function error_fechaf() {
  $.ajax({
    url:  base_url + '/Generar/error_fechaf',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_fechaf').html((respuesta));
    }  
  });    
}
function error_estado() {
  $.ajax({
    url:  base_url + '/Generar/error_estado',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_estados').html((respuesta));
    }  
  });    
}
function error_tipo() {
  $.ajax({
    url:  base_url + '/Generar/error_tipo',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_tipo').html((respuesta));
    }  
  });    
}
function error_servicios(id) {
  $.ajax({
    url:  base_url + '/Generar/error_servicios',
    type: 'POST',
    async: true,
    data: { establecimiento: id  },
    success: function(respuesta) {
      $('#cont_servicios').html((respuesta));
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
function vRangodeFechas() {
   // Parse the entries
    var fechai=$("#fechai").val();
    var fechaf=$("#fechaf").val();
    var sdia1=fechai.substring(0, 2);
    var smes1=fechai.substring(3, 5);
    var sanio1=fechai.substring(6, 10);
    var sdia2=fechaf.substring(0, 2);
    var smes2=fechaf.substring(3, 5);
    var sanio2=fechaf.substring(6, 10);    
    var dd1 = parseInt(sdia1);
    var mm1 = parseInt(smes1);
    var yyyy1 = parseInt(sanio1);
    var dd2= parseInt(sdia2);
    var mm2 = parseInt(smes2);
    var yyyy2 = parseInt(sanio2);
  if(yyyy1>yyyy2){
    return false;
  }
  else {
    if(yyyy1==yyyy2){
      if(mm1>mm2){
        return false;
      }
      else {
        if(mm1==mm2){   
          if(dd1>dd2){
            return false;
          }
          else {
            if(dd1>1){
              return false;
            }
            else {
              var mml=true;
              switch (mm2) {
                  case 1:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 2:
                      if(dd2<28){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 3:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 4:
                      if(dd2<30){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 5:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 6:
                      if(dd2<30){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 7:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 8:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 9:
                      if(dd2<30){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 10:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 11:
                      if(dd2<30){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 12:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
              }
              return mml;              
            }
          }
        }
        if(mm1<mm2){         
              var mml=true;
              switch (mm2) {
                  case 1:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 2:
                      if(dd2<28){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 3:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 4:
                      if(dd2<30){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 5:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 6:
                      if(dd2<30){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 7:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 8:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 9:
                      if(dd2<30){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 10:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 11:
                      if(dd2<30){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
                  case 12:
                      if(dd2<31){
                        mml=false;
                      }
                      else {
                        mml=true;
                      }
                      break;
              }
              return mml;
        }
      }
    if (yyyy1<yyyy2){
      return true;
    }
    
  }
}
}
function controldosim(id,tipo,fechai,fechaf, callback) {
  $.ajax({
    url:  base_url + '/Generar/validardosim',
    type: 'POST',
    async: true,
    data: { id:id, tipo:tipo,fechai:fechai,fechaf:fechaf  },
    success: function(respuesta) {
      var resp=respuesta;
      if(resp=='NULL'){
        resultado = 0;
      }
      else{
        resultado = resp;
      }
      callback(resultado);      
    }
  });    
} 
function controldtodo(tipo,fechai,fechaf, callback) {
  $.ajax({
    url:  base_url + '/Generar/validardtodo',
    type: 'POST',
    async: true,
    data: { tipo:tipo,fechai:fechai,fechaf:fechaf  },
    success: function(respuesta) {
      var resp=respuesta;
      if(resp=='NULL'){
        resultado = 0;
      }
      else{
        resultado = resp;
      }
      callback(resultado);      
    }
  });    
}
function controldestados(estado,tipo,fechai,fechaf, callback) {
  $.ajax({
    url:  base_url + '/Generar/validarestado',
    type: 'POST',
    async: true,
    data: { estado:estado,tipo:tipo,fechai:fechai,fechaf:fechaf  },
    success: function(respuesta) {
      var resp=respuesta;
      if(resp=='NULL'){
        resultado = 0;
      }
      else{
        resultado = resp;
      }
      callback(resultado);      
    }
  });    
}