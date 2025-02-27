function pestablecimientos(){
  var tipo=$('#tipo').val();
  if(!comprueba(tipo)) {
    error_tipo();
  }
  else {
    if ((tipo=='2')||(tipo=='6')||(tipo=='8')){
      $('#generar').attr('disabled' , false);
    }
    else {
      $('#generar').attr('disabled' , true);
      var id=$('#estados').val();
      if (id=="99"){
        $.ajax({
          url:  base_url + '/Gruposedadsexo/pestablecimientosg',
          type: 'POST',
          async: true,
          data: { },
          success: function(respuesta) {
            $('#cont_establecimiento').html((respuesta));
          }  
        });
      }
      else {
        $.ajax({
          url:  base_url + '/Gruposedadsexo/pestablecimientosf',
          type: 'POST',
          async: true,
          data: { estado: id },
          success: function(respuesta) {
            $('#cont_establecimiento').html((respuesta));
          }  
        });
      }      
    }
  }
  comprobar();  
}
function pservicios(){
  var tipo=$('#tipo').val();
  if(!comprueba(tipo)) {
    error_tipo();
  }
  else {
    if ((tipo=='2')||(tipo=='3')||(tipo=='5')||(tipo=='8')||(tipo=='9')){
      $('#generar').attr('disabled' , false);
    }
    else {
      $('#generar').attr('disabled' , true);      
        switch (tipo){
          case '4':
              $.ajax({
                url:  base_url + '/Gruposedadsexo/pserviciosg',
                type: 'POST',
                async: true,
                data: { },
                 success: function(respuesta) {
                $('#cont_servicio').html((respuesta));
                }  
              }); 
          break;          
          case '6':
            var id=$('#estados').val();
            $.ajax({
              url:  base_url + '/Gruposedadsexo/pservicios_estado',
              type: 'POST',
              async: true,
              data: { estado: id },
              success: function(respuesta) {
                $('#cont_servicio').html((respuesta));
              }  
            }); 
          break;
          case '7':
            var establecimientos=$('#establecimientos').val();         
            $.ajax({
              url:  base_url + '/Gruposedadsexo/pserviciosf',
              type: 'POST',
              async: true,
              data: { idestablecimiento: establecimientos },
              success: function(respuesta) {
                $('#cont_servicio').html((respuesta));
              }  
            });
          break;
          default:
      }     
    }  

  }
  comprobar();  
}
function pcargos(){
  var tipo=$('#tipo').val();
  if(!comprueba(tipo)) {
    error_tipo();
  }
  else {
    if ((tipo=='2')||(tipo=='3')||(tipo=='4')||(tipo=='6')||(tipo=='7')){
      $('#generar').attr('disabled' , false);
    }
    else {
      $('#generar').attr('disabled' , true);      
        switch (tipo){
          case '5':
            $.ajax({
              url:  base_url + '/Gruposedadsexo/pcargosg',
              type: 'POST',
              async: true,
              data: { },
              success: function(respuesta) {
                $('#cont_cargo').html((respuesta));
              }  
            }); 
          break;          
          case '8':
            var estados=$('#estados').val();
          $.ajax({
            url:  base_url + '/Gruposedadsexo/pcargosestadof',
            type: 'POST',
            async: true,
            data: { estados: estados },
            success: function(respuesta) {
              $('#cont_cargo').html((respuesta));
            }  
          }); 
          break;
          case '9':
            var establecimientos=$('#establecimientos').val();         
            $.ajax({
              url:  base_url + '/Gruposedadsexo/pcargosestablecimientof',
              type: 'POST',
              async: true,
              data: { establecimientos: establecimientos },
              success: function(respuesta) {
                $('#cont_cargo').html((respuesta));
              }  
            }); 
          break;
          default:
      } 
    }

  }
  comprobar();  
}
function comprobar(){
  var establecimientos=$('#establecimientos').val();
  var estados=$('#estados').val();
  var servicios=$('#servicios').val();
  var cargos=$('#cargos').val();
  var med=0;
  var tipo=$('#tipo').val();
  if(!comprueba(tipo)) {
    error_tipo();
  }
  else {
    switch (tipo){
      case '1':
        $('#generar').attr('disabled' , false);      
      break;
      case '2':
        if(!comprueba(estados)) med=1;
        if(med==1){
          $('#generar').attr('disabled' , true);
        }
        else {
          $('#generar').attr('disabled' , false);
        }      
      break;
      case '3':
        if(!comprueba(establecimientos)) med=1;
        if(med==1){
          $('#generar').attr('disabled' , true);
        }
        else {
          $('#generar').attr('disabled' , false);
        } 
      break;
      case '4':
        if(!comprueba(servicios)) med=1;
        if(med==1){
          $('#generar').attr('disabled' , true);
        }
        else {
          $('#generar').attr('disabled' , false);
        }       
      break;
      case '5':
        if(!comprueba(cargos)) med=1;
        if(med==1){
          $('#generar').attr('disabled' , true);
        }
        else {
          $('#generar').attr('disabled' , false);
        } 
      break;
      case '6':
        if(!comprueba(estados)) med=1;
        if(!comprueba(servicios)) med=1;
        if(med==1){
          $('#generar').attr('disabled' , true);
        }
        else {
          $('#generar').attr('disabled' , false);
        }       
      break;   
      case '7':
        if(!comprueba(establecimientos)) med=1;
        if(!comprueba(servicios)) med=1;
        if(med==1){
          $('#generar').attr('disabled' , true);
        }
        else {
          $('#generar').attr('disabled' , false);
        } 
      break;
      case '8':
        if(!comprueba(estados)) med=1;
        if(!comprueba(cargos)) med=1;
        if(med==1){
          $('#generar').attr('disabled' , true);
        }
        else {
          $('#generar').attr('disabled' , false);
        }  
      break; 
      case '9':
        if(!comprueba(establecimientos)) med=1;
        if(!comprueba(cargos)) med=1;
        if(med==1){
          $('#generar').attr('disabled' , true);
        }
        else {
          $('#generar').attr('disabled' , false);
        }  
      break;             
      default:
    }
  }
}
function stipo() {
  var tipo=$('#tipo').val();
  if(!comprueba(tipo)) {
    error_tipo();
  }
  else {
    switch (tipo){
      case '1':
        $('#estados').attr('disabled' , true);
        $('#establecimientos').attr('disabled' , true);
        $('#servicios').attr('disabled' , true);
        $('#cargos').attr('disabled' , true);
        $('#generar').attr('disabled' , true);       
      break;
      case '2':
        $('#estados').attr('disabled' , false);
        $('#establecimientos').attr('disabled' , true);
        $('#servicios').attr('disabled' , true);
        $('#cargos').attr('disabled' , true);
        $('#generar').attr('disabled' , true); 
      break;
      case '3':
        $('#estados').attr('disabled' , false);
        $('#establecimientos').attr('disabled' , false);
        $('#servicios').attr('disabled' , true);
        $('#cargos').attr('disabled' , true);
        $('#generar').attr('disabled' , true); 
      break;
      case '4':
        $.ajax({
          url:  base_url + '/Gruposedadsexo/pserviciosg',
          type: 'POST',
          async: true,
          data: {  },
          success: function(respuesta) {
            $('#cont_servicio').html((respuesta));
          }  
        });      
        $('#estados').attr('disabled' , true);
        $('#establecimientos').attr('disabled' , true);
        $('#servicios').attr('disabled' , false);
        $('#cargos').attr('disabled' , true);
        $('#generar').attr('disabled' , true); 
      break;
      case '5':
        $.ajax({
          url:  base_url + '/Gruposedadsexo/pcargosg',
          type: 'POST',
          async: true,
          data: { },
          success: function(respuesta) {
            $('#cont_cargo').html((respuesta));
          }  
        });      
        $('#estados').attr('disabled' , true);
        $('#establecimientos').attr('disabled' , true);
        $('#servicios').attr('disabled' , true);
        $('#cargos').attr('disabled' , false);
        $('#generar').attr('disabled' , true); 
      break;
      case '6':
        $('#estados').attr('disabled' , false);
        $('#establecimientos').attr('disabled' , true);
        $('#servicios').attr('disabled' , true);
        $('#cargos').attr('disabled' , true);
        $('#generar').attr('disabled' , false); 
      break;   
      case '7':
        $('#estados').attr('disabled' , false);
        $('#establecimientos').attr('disabled' , true);
        $('#servicios').attr('disabled' , true);
        $('#cargos').attr('disabled' , true);
        $('#generar').attr('disabled' , true); 
      break;
      case '8':
        $('#estados').attr('disabled' , false);
        $('#establecimientos').attr('disabled' , true);
        $('#servicios').attr('disabled' , true);
        $('#cargos').attr('disabled' , true);
        $('#generar').attr('disabled' , true); 
      break; 
      case '9':
        $('#estados').attr('disabled' , false);
        $('#establecimientos').attr('disabled' , true);
        $('#servicios').attr('disabled' , true);
        $('#cargos').attr('disabled' , true);
        $('#generar').attr('disabled' , true); 
      break;             
      default:
  }
}
comprobar();
}
function sgenerar() {
  var med=0;
  var tipo=$('#tipo').val();
  var establecimientos=$('#establecimientos').val();
  var estados=$('#estados').val();
  var servicios=$('#servicios').val();
  var cargos=$('#cargos').val();
  var tipo=$('#tipo').val();
  if(!comprueba(tipo)) {
    error_tipo();
  }
  else {
    switch (tipo){
      case '1':
            $.ajax({
              url:  base_url + '/Gruposedadsexo/gresex_general',
              type: 'POST',
              async: true,
              data: { },
              success: function(respuesta) {
                $('#cont_grafico').html((respuesta));
              }  
            });              
      break;
      case '2':
            $.ajax({
              url:  base_url + '/Gruposedadsexo/gresex_general_estado',
              type: 'POST',
              async: true,
              data: { estado: estados },
              success: function(respuesta) {
                $('#cont_grafico').html((respuesta));
              }  
            });
      break;
      case '3':
            $.ajax({
              url:  base_url + '/Gruposedadsexo/gresex_general_establecimiento',
              type: 'POST',
              async: true,
              data: { establecimiento: establecimientos },
              success: function(respuesta) {
                $('#cont_grafico').html((respuesta));
              }  
            });
      break;
      case '4':
            $.ajax({
              url:  base_url + '/Gruposedadsexo/gresex_general_servicios',
              type: 'POST',
              async: true,
              data: { servicio: servicios },
              success: function(respuesta) {

                $('#cont_grafico').html((respuesta));
              }  
            });  
      break;
      case '5':
       $.ajax({
              url:  base_url + '/Gruposedadsexo/gresex_general_cargos',
              type: 'POST',
              async: true,
              data: { cargo: cargos },
              success: function(respuesta) {
                $('#cont_grafico').html((respuesta));
              }  
            });
      break;
      case '6':
         $.ajax({
                  url:  base_url + '/Gruposedadsexo/gresex_servicios_estado',
                  type: 'POST',
                  async: true,
                  data: { estado: estados, servicio: servicios },
                  success: function(respuesta) {
                    $('#cont_grafico').html((respuesta));
                  }  
                });   
      break;   
      case '7':
         $.ajax({
                  url:  base_url + '/Gruposedadsexo/gresex_servicios_establecimiento',
                  type: 'POST',
                  async: true,
                  data: { establecimiento: establecimientos, servicio: servicios },
                  success: function(respuesta) {
                    $('#cont_grafico').html((respuesta));
                  }  
                });
      break;
      case '8':
         $.ajax({
                  url:  base_url + '/Gruposedadsexo/gresex_cargos_estado',
                  type: 'POST',
                  async: true,
                  data: { establecimiento: establecimientos,cargo:cargos },
                  success: function(respuesta) {
                    $('#cont_grafico').html((respuesta));
                  }  
                });
      break; 
      case '9':
         $.ajax({
                  url:  base_url + '/Gruposedadsexo/gresex_cargos_establecimiento',
                  type: 'POST',
                  async: true,
                  data: { establecimiento: establecimientos,cargo:cargos },
                  success: function(respuesta) {
                    $('#cont_grafico').html((respuesta));
                  }  
                });
      break;             
      default:
    }
}
}
function comprueba(obj){
  if (obj=='0'){
    return false;
  }
  else {
    return true;
  }
} 
function error_tipo() {
  $.ajax({
    url:  base_url + '/Gruposedadsexo/error_tipo',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_tipo').html((respuesta));
    }  
  });    
}
function error_estado() {
  $.ajax({
    url:  base_url + '/Gruposedadsexo/error_estado',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_estados').html((respuesta));
    }  
  });    
}
function error_establecimiento() {
  var estado=$('#estados').val();
  $.ajax({
    url:  base_url + '/Gruposedadsexo/error_establecimiento',
    type: 'POST',
    async: true,
    data: { estado: estado },
    success: function(respuesta) {
      $('#cont_establecimientos').html((respuesta));
    }  
  });    
}
function error_cargo() {
  var estado=$('#estados').val();
  $.ajax({
    url:  base_url + '/Gruposedadsexo/error_cargo',
    type: 'POST',
    async: true,
    data: { estado: estado },
    success: function(respuesta) {
      $('#cont_cargo').html((respuesta));
    }  
  });    
}
function error_servicios() {
  var establecimientos=$('#establecimientos').val();
  $.ajax({
    url:  base_url + '/Gruposedadsexo/error_servicios',
    type: 'POST',
    async: true,
    data: { estado: estado },
    success: function(respuesta) {
      $('#cont_cargo').html((respuesta));
    }  
  });    
}