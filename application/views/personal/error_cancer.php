<?php
if(empty($salidacancer)) { $salidacancer=""; } 
if(empty($disabled)) { $disabled=""; }
$salidacancer.="2.3 Antededentes familiares con cancer? <input type=\"checkbox\"  $disabled name=\"cancersi\" id=\"cancersi\" value=\"SI\" onclick=\"vtipocancersi();\" >SI <input type=\"checkbox\" $disabled name=\"cancerno\" id=\"cancerno\" value=\"NO\"   onclick=\"vtipocancerno();\">NO <br><div id=\"antfam\"><input type=\"hidden\" name=\"tipocancer\" id=\"tipocancer\" value=\"NINGUNO\"/><div>";
echo $salidacancer;
?>