<?php
	if(empty($salidafuma)) { $salidafuma=""; }   
	if(empty($disabled)) { $disabled=""; }    
    $salidafuma="2.2 Fuma?<input type=\"checkbox\" name=\"fumasi\" id=\"fumasi\" value=\"SI\"  onclick=\"sifuma();\" $disabled checked=\"\">SI <input type=\"checkbox\"  name=\"fumano\" id=\"fumano\" value=\"NO\" onclick=\"nofuma();\" $disabled>NO <br><div id=\"cont_cuantos\"><input type=\"hidden\" name=\"cuantos\" id=\"cuantos\" value=\"0\" /></div>";
    echo $salidafuma;
?>
