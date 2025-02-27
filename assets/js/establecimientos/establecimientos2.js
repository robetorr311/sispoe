  function nuevoAjax(){ 
  var xmlhttp=false; 
  try 
  { 
    // No IE
    xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
  }
  catch(e)
  { 
    try
    { 
      // IE 
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    catch(E) { xmlhttp=false; }
  }
  if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); } 
  return xmlhttp; 
}
function controltablas(id){
  var ajax=nuevoAjax();
  ajax.open("POST", base_url + "/Establecimientos/tablatemporal", true);
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  ajax.send("id="+id);
  ajax.onreadystatechange=function()
  {
    if (ajax.readyState==4)
    {
      var respuesta=ajax.responseText;
      if (respuesta=='NULL'){
        return 1;
      }
      else {
        return 0;
      }
    }
  }
} 