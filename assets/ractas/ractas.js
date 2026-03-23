function preparar(id) {
      $.ajax({
        url:  base_url + '/Asignar/preparar',
        type: 'POST',
        async: true,
        data: { id: id },
        success: function(respuesta) {
          $('#container').html((respuesta));
        }  
      });
} 
function actualizar() {
      $.ajax({
        url:  base_url + '/Asignar/actualizar',
        type: 'POST',
        async: true,
        data: { },
        success: function(respuesta) {
          $('#container').html((respuesta));
        }  
      });
} 
function listado() {
      $.ajax({
        url:  base_url + '/Asignar/procesados',
        type: 'POST',
        async: true,
        data: { },
        success: function(respuesta) {
          $('#lista').html((respuesta));
        }  
      });
} 
function fdosimetro(){
  $('#modaldosimetro').on('hidden.bs.modal', function () {
      actualizar();
      listado();
  }); 
  $('.modal-body').load(base_url + '/Asignar/modal_asignacion',function(result){
      $('#modaldosimetro').modal({show:true});
  });

}
function asignar() { 
  var iddocumento=$('#iddocumento').val();
  var dosimetro=$('#dosimetro').val();
  var tarjeta=$('#tarjeta').val(); 
  if(!tarjeta){
      error_tarjeta(); 
  }
  else {       
      $.ajax({
        url:  base_url + '/Asignar/fasignar',
        type: 'POST',
        async: true,
        data: { iddocumento: iddocumento,
                dosimetro: dosimetro,
                tarjeta: tarjeta
         },
        success: function(respuesta) {
          //$('#modaldosimetro').modal('hide');
          $('#container').html((respuesta));
        }  
      });
  }
}
function verdosimetro() { 
  var iddosimetro=$('#dosimetro').val();
  controldosimetro(iddosimetro, function(resultado){
    r = resultado;
    if(r>0){
        $.ajax({
          url:  base_url + '/Asignar/ok_dosimetro',
          type: 'POST',
          async: true,    
          data: { iddosimetro: iddosimetro },
          success: function(respuesta) {
              $('#cont_dosimetro').html((respuesta));
              $.ajax({
                url:  base_url + '/Asignar/registro',
                type: 'POST',
                async: true,
                data: { dosimetro: iddosimetro },
                success: function(respuesta) {
                  $('#cont_dosim').html((respuesta));
                }  
              });
          }
        });            
    }
    else {

      $.ajax({
        url:  base_url + '/Asignar/error_dosimetro',
        type: 'POST',
        async: true,    
        data: { },
        success: function(respuesta) {
            $('#cont_dosimetro').html((respuesta));       
        }  
      });     
    }
  });
}
  function error_tarjeta() {
  $.ajax({
    url:  base_url + '/Asignar/error_tarjeta',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_tarjeta').html((respuesta));
    }  
  });    
  } 
  function control(){    
    var tarjeta=$('#tarjeta').val();
    var dosimetro=$('#dosimetro').val();    
    controltarjetas(tarjeta, function(resultado){
    r = resultado;
    if(r>0){
      $.ajax({
        url:  base_url + '/Asignar/error_tarjeta',
        type: 'POST',
        async: true,    
        data: { },
        success: function(respuesta) {
            $('#cont_tarjeta').html((respuesta));       
        }  
      });          
    }
    else {
      $.ajax({
        url:  base_url + '/Asignar/ok_tarjeta',
        type: 'POST',
        async: true,    
        data: { tarjeta: tarjeta },
        success: function(respuesta) {
            $('#cont_tarjeta').html((respuesta));
              if(!tarjeta){
                  error_tarjeta(); 
              }
              else {       
                  $.ajax({
                    url:  base_url + '/Asignar/fasignar',
                    type: 'POST',
                    async: true,
                    data: { dosimetro: dosimetro,
                            tarjeta: tarjeta
                     },
                    success: function(respuesta) {               
                      $('#cont_d').html((respuesta));
                    }  
                  });
              }

        }  
      });       
    }
    });
  }                                          
  function controltarjetas(texto, callback) {
    $.ajax({
        url:  base_url + '/Asignar/comprueba_tarjeta',
        type: 'POST',
        async: true,
        data: { tarjeta: texto  },
        success: function(respuesta) {
            var resp=respuesta;
            if(resp=='OK'){
              resultado = 1;
            }
            else{
                resultado = 0;
            }
            callback(resultado);      
          }
      });    
  }
                         
  function controldosimetro(texto, callback) {
    $.ajax({
        url:  base_url + '/Asignar/comprueba_dosimetro',
        type: 'POST',
        async: true,
        data: { iddosimetro: texto  },
        success: function(respuesta) {
            var resp=respuesta;
            if(resp=='OK'){
              resultado = 1;
            }
            else{
                resultado = 0;
            }
            callback(resultado);      
          }
        });    
  }         