function guardar_antecedentes() {

      var idpersonala=$('#idpersonala').val();
      var fuma=$('#fuma').val();
      var cuantos=$('#cuantos').val();
      var cancer=$('#cancer').val();
      var tipocancer=$('#tipocancer').val();
      var laboratorio=$('#laboratorio').val();                
      var dosimetro=$('#dosimetro').val();
      var laborales=$('#laborales').val();
      var cronicas=$('#cronicas').val();
      var organo=$('#organo').val(); 
      var hemorragias='NO';
      var manchas='NO';
      var cansancio='NO';
      var nauseas='NO';
      var cabello='NO';
      var cataratas='NO';
      var pielroja='NO';
      var esterilidad='NO';
      var cambios='NO';
      var snfuma='NO';
      var sncuantos='0';
      var sncancer='NO';
      var sndosimetro='NO';
        if ($("#fumasi").is(':checked')){
            snfuma='SI';
        }
        if ($("#fumano").is(':checked')){
            snfuma='NO';
        }
        if ($("#cancersi").is(':checked')){
            sncancer='SI';
        }
        if ($("#cancerno").is(':checked')){
            sncancer='NO';
        }
        if ($("#dosimetrosi").is(':checked')){
            sndosimetro='SI';
        }
        if ($("#dosimetrono").is(':checked')){
            sndosimetro='NO';
        }                                     
        if ($("#cuantosuno").is(':checked')){
            sncuantos='1';
        }
        if ($("#cuantosdos").is(':checked')){
            sncuantos='2';
        }
        if ($("#cuantostres").is(':checked')){
            sncuantos='3';
        }               
        if (cuantos=='0') {
            sncuantos='0';
        }             
        if ($("#hemorragias").is(':checked')) {
            hemorragias='SI';
        } else {
            hemorragias='NO';
        }
        if ($("#manchas").is(':checked')) {
            manchas='SI';
        } else {
            manchas='NO';
        }
        if ($("#cansancio").is(':checked')) {
            cansancio='SI';
        } else {
            cansancio='NO';
        }
        if ($("#nauseas").is(':checked')) {
            nauseas='SI';
        } else {
            nauseas='NO';
        }
        if ($("#cabello").is(':checked')) {
            cabello='SI';
        } else {
            cabello='NO';
        }
        if ($("#cataratas").is(':checked')) {
            cataratas='SI';
        } else {
            cataratas='NO';
        }
        if ($("#pielroja").is(':checked')) {
            pielroja='SI';
        } else {
            pielroja='NO';
        }
        if ($("#esterilidad").is(':checked')) {
            esterilidad='SI';
        } else {
            esterilidad='NO';
        }
        if ($("#cambios").is(':checked')) {
            cambios='SI';
        } else {
            cambios='NO';
        }                                   
      var med=0;
      var r=0;
      if(!snfuma) med=1;
      if(!sncuantos) med=1;
      if(!sncancer) med=1;
      if(!sndosimetro) med=1;
      if(!cronicas) cronicas='SIN INFORMACION';
      if(!laborales) laborales='SIN INFORMACION';      
      if(med==1){
          if(!snfuma) error_fuma(); 
          if(!sncuantos) error_cuantos(); 
          if(!sncancer) error_cancer(); 
          if(!sndosimetro) error_dosimetro(); 
      }
      else {
            //$("#antecedentes").modal("hide");
            $.ajax({
                url:  base_url + '/Personal/gantecedentes?codigo=' + idpersonala + 
                '&hemorragias=' + hemorragias + 
                '&manchas=' + manchas + 
                '&cansancio=' + cansancio + 
                '&nauseas=' + nauseas + 
                '&cabello=' + cabello + 
                '&cataratas=' + cataratas + 
                '&pielroja=' + pielroja + 
                '&esterilidad=' + esterilidad + 
                '&cambios=' + cambios + 
                '&fuma=' + snfuma + 
                '&cuantos=' + sncuantos + 
                '&cancer=' + sncancer + 
                '&dosimetro=' + sndosimetro + 
                '&laborales=' + laborales + 
                '&cronicas=' + cronicas + 
                '&tipocancer=' + tipocancer + 
                '&organo=' + organo + 
                '&laboratorio=' + laboratorio ,
                type: 'get',
                async: true,    
              success: function(respuesta) {
                $('#re_ant').html((respuesta));
              }  
              });           
      }
}
  function sicambios() {
    if ($("#cambios").is(':checked')) {
      $.ajax({
        url:  base_url + '/Personal/organo_checked',
        type: 'POST',
        async: true,
        data: {  },
        success: function(respuesta) {
          $('#cont_organo').html((respuesta));
        }  
      }); 

    } else {
      $.ajax({
        url:  base_url + '/Personal/organo_unchecked',
        type: 'POST',
        async: true,
        data: {  },
        success: function(respuesta) {
          $('#cont_organo').html((respuesta));
        }  
      });       
    }    
  }
  function sifuma() {
      $.ajax({
        url:  base_url + '/Personal/fuma',
        type: 'POST',
        async: true,
        data: {  },
        success: function(respuesta) {
          $('#fumano').prop("checked",false); 
          $('#cont_cuantos').html((respuesta));
        }  
      }); 

  }   
  function nofuma() {
      $.ajax({
        url:  base_url + '/Personal/nofuma',
        type: 'POST',
        async: true,
        data: {  },
        success: function(respuesta) {
          $('#fumasi').prop("checked",false);
          $('#cont_cuantos').html((respuesta));
        }  
      });       
}  
  function laboratoriosi() {
      $.ajax({
        url:  base_url + '/Personal/dosimetro_checked',
        type: 'POST',
        async: true,
        data: {  },
        success: function(respuesta) {
          $('#dosimetrono').prop("checked",false);
          $('#dosim').html((respuesta));
        }  
      }); 

  }   
  function laboratoriono() {
      $.ajax({
        url:  base_url + '/Personal/dosimetro_unchecked',
        type: 'POST',
        async: true,
        data: {  },
        success: function(respuesta) {
          $('#dosimetrosi').prop("checked",false);
          $('#dosim').html((respuesta));
        }  
      });       
}  
function vcuantosuno() {
            $('#cuantosuno').prop("checked",true);
            $('#cuantosdos').prop("checked",false);
            $('#cuantostres').prop("checked",false);

                
}
function vcuantosdos() {
            $('#cuantosdos').prop("checked",true);
            $('#cuantosuno').prop("checked",false);
            $('#cuantostres').prop("checked",false);           
}
function vcuantostres() {
            $('#cuantostres').prop("checked",true);
            $('#cuantosdos').prop("checked",false);
            $('#cuantosuno').prop("checked",false);           
}
function vtipocancersi() {
      $.ajax({
        url:  base_url + '/Personal/cancer_checked',
        type: 'POST',
        async: true,
        data: {  },
        success: function(respuesta) {
          $('#cancerno').prop("checked",false);
          $('#antfam').html((respuesta));
        }  
      });       
}
function vtipocancerno() {
      $.ajax({
        url:  base_url + '/Personal/cancer_unchecked',
        type: 'POST',
        async: true,
        data: {  },
        success: function(respuesta) {
          $('#cancersi').prop("checked",false);
          $('#antfam').html((respuesta));
        }  
      });       
}
function error_fuma() {
  $.ajax({
    url:  base_url + '/Personal/error_fuma',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_fuma').html((respuesta));
    }  
  });    
  }
  function error_cuantos() {
  $.ajax({
    url:  base_url + '/Personal/error_cuantos',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_cuantos').html((respuesta));
    }  
  });    
  }
  function error_cancer() {
  $.ajax({
    url:  base_url + '/Personal/error_cancer',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_cancer').html((respuesta));
    }  
  });    
  }
  function error_dosimetro() {
  $.ajax({
    url:  base_url + '/Personal/error_dosimetro',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_dosimetro').html((respuesta));
    }  
  });    
  }
  function error_laborales() {
  $.ajax({
    url:  base_url + '/Personal/error_laborales',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_laborales').html((respuesta));
    }  
  });    
  }
  function error_cronicas() {
  $.ajax({
    url:  base_url + '/Personal/error_cronicas',
    type: 'POST',
    async: true,
    data: {  },
    success: function(respuesta) {
      $('#cont_cronicas').html((respuesta));
    }  
  });    
  }