//window.setInterval("newrecepcion(" + iddocumento + ")", 2000);
function listadorecibidos() {
      $.ajax({
        url:  base_url + '/Recepcion/listadorecibidos',
        type: 'POST',
        async: true,
        data: { },
        success: function(respuesta) {
          $('#dosim_recib').html((respuesta));
        }  
      });
} 
function actualizar() {
      $.ajax({
        url:  base_url + '/Recepcion/actualizar',
        type: 'POST',
        async: true,
        data: { },
        success: function(respuesta) {
          $('#container').html((respuesta));
        }  
      });
} 
function datosdosimetro(id){
  $('.modal-body').load(base_url + '/Recepcion/datosdosimetro?id='+ id,function(result){
      $('#modaldosimetro').modal({show:true});
  }); 
}
function dosimetro(id){
  $('#modaldosimetro').on('hidden.bs.modal', function () {
    var id=$('#iddoc').val();
      actualizar();
      listadorecibidos();      
  });  
  $('.modal-body').load(base_url + '/Recepcion/dosimetro?id='+ id,function(result){
      $('#modaldosimetro').modal({show:true});
  }); 
}
function recibir() { 
    var iddocumento=$('#iddocumento').val();
    var dosimetro=$('#dosimetro').val();
    var tarjeta=$('#tarjeta').val(); 
  if(!tarjeta){
      error_tarjeta(); 
  }
  else {       
      $.ajax({
        url:  base_url + '/Recepcion/frecepcion',
        type: 'POST',
        async: true,
        data: { iddocumento: iddocumento,
                dosimetro: dosimetro,
                tarjeta: tarjeta
         },
        success: function(respuesta) {
          $('#cont_dosim').html((respuesta));
          setTimeout(function () { newrecepcion(iddocumento); }, 2000);           
        }  
      });
  }
}
function newrecepcion(iddocumento) { 
      $.ajax({
        url:  base_url + '/Recepcion/newrecepcion',
        type: 'POST',
        async: true,
        data: { id: iddocumento },
        success: function(respuesta) {
          $('#cont_dosim').html((respuesta));
        }  
      });
}
  function error_tarjeta() {
  $.ajax({
    url:  base_url + '/Recepcion/error_tarjeta',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_tarjeta').html((respuesta));
    }  
  });    
  } 
  function control(){    
    var dosimetro=$('#dosimetro').val();
    controldosimetro(dosimetro, function(resultado){
    r = resultado;
    switch (r){
      case '0':
        $.ajax({
          url:  base_url + '/Recepcion/error_dosimetro',
          type: 'POST',
          async: true,    
          data: { },
          success: function(respuesta) {
              $('#cont_numero').html((respuesta));    
          }  
        });          
      break;
      case '2':
        $.ajax({
          url:  base_url + '/Recepcion/frecepcion',
          type: 'POST',
          async: true,    
          data: { dosimetro: dosimetro },
          success: function(respuesta) {
              $('#cont_dosimetro').html((respuesta)); 
              setTimeout(function () { newrecepcion(); }, 2000);                  
              
          }  
        });
      break;
      case '14':
        $.ajax({
          url:  base_url + '/Recepcion/frecibido',
          type: 'POST',
          async: true,    
          data: { dosimetro: dosimetro },
          success: function(respuesta) {
              $('#cont_dosimetro').html((respuesta)); 
              setTimeout(function () { newrecepcion(); }, 2000);                  
          }  
        });
      break;
      default:
        $.ajax({
          url:  base_url + '/Recepcion/error_dosimetro',
          type: 'POST',
          async: true,    
          data: { },
          success: function(respuesta) {
              $('#cont_numero').html((respuesta));    
          }  
        }); 
      }
    });
  }                                          
  function controldosimetro(dosimetro, callback) {
    $.ajax({
        url:  base_url + '/Recepcion/comprueba_dosimetro',
        type: 'POST',
        async: true,
        data: { dosimetro: dosimetro  },
        success: function(respuesta) {
            var resp=respuesta;     
            callback(respuesta);      
          }
        });    
  }
