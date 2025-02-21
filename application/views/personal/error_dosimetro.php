<?php
if(empty($salidadosimetro)) { $salidadosimetro=""; } 
if(empty($disabled)) { $disabled=""; }
$salidadosimetro.="2.4 Uso anterior de dosimetro?<input type=\"checkbox\" $disabled name=\"dosimetro\" id=\"dosimetro\" onclick=\"laboratoriosi();\" value=\"SI\">SI <input type=\"checkbox\" $disabled name=\"dosimetro\" id=\"dosimetro\" onclick=\"laboratoriono();\" value=\"NO\"  >NO <div id=\"dosim\"><input type=\"hidden\" name=\"laboratorio\" id=\"laboratorio\" value=\"NINGUNO\" /></div>";
echo $salidadosimetro;
?>       