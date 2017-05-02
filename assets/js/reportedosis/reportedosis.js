function pestablecimientos(){
  var id=$('#estados').val();
    $.ajax({
      url:  base_url + '/Reportedosis/pestablecimientos',
      type: 'POST',
      async: true,
      data: { estado: id },
      success: function(respuesta) {
        $('#cont_establecimiento').html((respuesta));
      }  
    });
}
function pservicios(){
  var id=$('#establecimiento').val();
    $.ajax({
      url:  base_url + '/Reportedosis/pservicios',
      type: 'POST',
      async: true,
      data: { id: id },
      success: function(respuesta) {
        $('#cont_servicio').html((respuesta));
      }  
    });
}
function generar() {
  var estado=$('#estados').val();
  var establecimiento=$('#establecimiento').val();  
  var estudio=$('#estudio').val();
  var servicio=$('#servicios').val();  
  var fechai=$('#fechai').val();
  var fechaf=$('#fechaf').val();
  var med=0;
  if(!fechai) med=1;  
  if(!fechaf) med=1;
  if(!comprueba(estado)) med=1;
  if(!comprueba(servicio)) med=1;        
  if(!comprueba(estudio)) med=1;
  if(!comprueba(establecimiento)) med=1;  
  if(!vRangodeFechas()) med=1;
  if(med==1){
    if(!vRangodeFechas()) { 
      error_fechai();
      error_fechaf();
    }

    if(!fechai) error_fechai();
    if(!fechaf) error_fechaf();
    if(!comprueba(servicio)) error_servicios();    
    if(!comprueba(estado)) error_estados();
    if(!comprueba(estudio)) error_estudio();
    if(!comprueba(establecimiento)) error_establecimientos();      
  }
  else {
        var ruta= base_url + '/Reportedosis/generar?estado='+ estado + '&servicio=' + servicio + '&establecimiento=' + establecimiento + '&estudio=' + estudio + '&fechai=' + fechai + '&fechaf=' + fechaf;
    $.ajax({
      url:  base_url + '/Reportedosis/button_pdf',
      type: 'POST',
      async: true,
      data: { ruta: ruta },
      success: function(respuesta) {
        $('#button_pdf').html((respuesta));
      }  
    });   
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
function error_estados() {
  $.ajax({
    url:  base_url + '/Reportedosis/error_estados',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_estado').html((respuesta));
    }  
  });    
}
function error_establecimientos() {
  var estado=$('#estados').val();
  if(!comprueba(estado)) med=1;
  if(med==1){ 
    if(!comprueba(estado)) error_estados();
    $.ajax({
      url:  base_url + '/Reportedosis/error_establecimientos_no',
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
      url:  base_url + '/Reportedosis/error_establecimientos',
      type: 'POST',
      async: true,
      data: { estado: estado },
      success: function(respuesta) {
        $('#cont_establecimiento').html((respuesta));
      }  
    });
  }    
}
function error_establecimientos_no() {
  $.ajax({
    url:  base_url + '/Reportedosis/error_establecimientos_no',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_establecimiento').html((respuesta));
    }  
  });    
}
function error_servicios_no() {
  $.ajax({
    url:  base_url + '/Reportedosis/error_servicio_no',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_servicio').html((respuesta));
    }  
  });    
}
function error_estudio() {
  $.ajax({
    url:  base_url + '/Reportedosis/error_estudio',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_estudio').html((respuesta));
    }  
  });    
}
function error_servicios() {
  var establecimiento=$('#establecimiento').val();  
  var med=0;
  if(!comprueba(establecimiento)) med=1;  
  if(med==1){
    if(!comprueba(establecimiento)) error_establecimientos_no();
    $.ajax({
      url:  base_url + '/Reportedosis/error_servicio_no',
      type: 'POST',
      async: true,
      data: {  },
      success: function(respuesta) {
        $('#cont_servicio').html((respuesta));
      }  
    });          
  }
  else {  
  $.ajax({
    url:  base_url + '/Reportedosis/error_servicios',
    type: 'POST',
    async: true,
    data: { establecimiento: establecimiento },
    success: function(respuesta) {
      $('#cont_servicio').html((respuesta));
    }  
  });    
  }
}
function error_fechai() {
  $.ajax({
    url:  base_url + '/Reportedosis/error_fechai',
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
    url:  base_url + '/Reportedosis/error_fechaf',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_fechaf').html((respuesta));
    }  
  });    
}