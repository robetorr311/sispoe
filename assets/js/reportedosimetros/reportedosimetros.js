$(document).ready(function(){
  $('#tabladosimetros').DataTable({
    "oPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "lengthMenu":[[10,25,50,100,200,-1],[10,25,50,100,200,"All"]],
        "columns": [
          { data: 'id'},
          { data: 'idpersona'},
          { data: 'personal'},
          { data: 'establecimiento'},
          { data: 'servicio'},
          { data: 'id', 
              render: function(data,type,row){
              return 'del '+ row.fechainicio +' al '+ row.fechafin;
              }
          },
          { data: 'tarjeta'},
          { data: 'id', 
              render: function(data,type,row){
              return '';
              }
          }
        ]
  });  
$('#ver').on('click',function(){
    let estado=$('#estados').val();
    let establecimiento=$('#establecimiento').val();  
    let estudio=$('#estudio').val();
    let servicio=$('#servicios').val();  
    let estatus=$('#estatus').val();

    $.ajax({
        url: base_url + '/Reportedosimetros/ver',
        type: 'POST',
        async: true,
        dataType: "json",
        data: { idestado: estado, idestablecimiento: establecimiento, idestudio: estudio, idservicio: servicio, estatus: estatus },
        success: function(response){
          if(response.status=='ok'){
            $('#tabladosimetros').DataTable().clear();
            $('#tabladosimetros').DataTable().rows.add(response.dosimetros);
            $('#tabladosimetros').DataTable().draw();
              /*$('#tabladosimetros').DataTable().clear();
              $('#tabladosimetros').DataTable({
                 data : response.dosimetros,
                "oPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false,
                "lengthMenu":[[10,25,50,100,200,-1],[10,25,50,100,200,"All"]],
                "columns": [
                    { data: 'id'},
                    { data: 'idpersona'},
                    { data: 'personal'},
                    { data: 'establecimiento'},
                    { data: 'servicio'},
                    { data: 'periodo'},
                    { data: 'tarjeta'},
                    { data: 'id', 
                        render: function(data,type,row){
                          return '<button type="button" class="btn btn-block bg-yellow btn-xs" onclick="recepcionar('+ data +');">Recepcionar</button>'+
                                        '<button type="button" class="btn btn-block bg-yellow btn-xs" onclick="pendiente('+ data + ');">Dejar pendiente</button>';
                        }
                    }
                    ]
              });
              $('#tabladosimetros').DataTable().draw();*/
          }
        }
    });
});
});
function establecimientos() {
  let estado=$('#estados').val();
  if(estado>0){
    $.ajax({
      url:  base_url + '/Reportedosimetros/establecimientos',
      type: 'POST',
      async: true,
      data: { idestado : estado },
      success: function(respuesta) {
        $('#establecimiento').each(function(){
          $(this).find('option').remove();
        });
        $('#establecimiento').append('<option value="0">TODOS LOS ESTABLECIMIENTOS</option>');
        let establecimientos=respuesta.establecimientos;
        $.each(establecimientos, function(i,v){
            $('#establecimiento').append('<option value="'+v.nid+'">'+v.nnombre+'</option>');
        });
        $('#establecimiento').val(0);
        $('#establecimiento').trigger("change");
      }  
    });       
  }
}
function get_servicios(){
  let establecimiento=$('#establecimiento').val();
  if(establecimiento>0){
    $.ajax({
      url:  base_url + '/Reportedosimetros/servicios',
      type: 'POST',
      async: true,
      data: { idestablecimiento : establecimiento },
      success: function(respuesta) {
        console.log(respuesta);
        $('#servicios').each(function(){
          $(this).find('option').remove();
        });
        $('#servicios').append('<option value="0">TODOS LOS SERVICIOS</option>');
        let servicios=respuesta.servicios;
        $.each(servicios, function(i,v){
            $('#servicios').append('<option value="'+v.nidservicio+'">'+v.nservicio+'</option>');
        });
        $('#servicios').val(0);
        $('#servicios').trigger("change");
      }  
    });       
  }
}

