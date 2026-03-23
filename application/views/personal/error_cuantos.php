<?php
if(empty($salidacuantos)) { $salidacuantos=""; }
if(empty($disabled)) { $disabled=""; }
$salidacuantos="Cuantos?<input type=\"checkbox\" $disabled name=\"cuantosuno\" id=\"cuantosuno\" value=\"1\" onclick=\"vcuantosuno();\"> menos de 10 <input type=\"checkbox\" $disabled name=\"cuantosdos\" id=\"cuantosdos\" value=\"2\" onclick=\"vcuantosdos();\"> 10 a 20<input type=\"checkbox\" $disabled name=\"cuantostres\" id=\"cuantostres\" value=\"3\"  checked onclick=\"vcuantostres();\"> 20 o + <br><input type=\"hidden\" name=\"cuantos\" id=\"cuantos\" value=\"1\" />";
echo $salidacuantos;

?>
