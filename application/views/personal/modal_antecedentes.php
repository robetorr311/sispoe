<?php 
if(empty($disabled)) { $disabled=""; } 
if(empty($codigo)) { $codigo=""; } 
if(empty($fuma)) { $fuma=""; } 
if(empty($cuantos)) { $cuantos=""; } 
if(empty($hemorragias)) { $hemorragias=""; } 
if(empty($manchas)) { $manchas=""; } 
if(empty($cansancio)) { $cansancio=""; } 
if(empty($nauseas)) { $nauseas=""; } 
if(empty($cabello)) { $cabello=""; } 
if(empty($cataratas)) { $cataratas=""; } 
if(empty($pielroja)) { $pielroja=""; } 
if(empty($esterilidad)) { $esterilidad=""; } 
if(empty($cambios)) { $cambios=""; } 
if(empty($salidafuma)) { $salidafuma=""; } 
if(empty($salidacuantos)) { $salidacuantos=""; }
if(empty($salidahemorragias)) { $salidahemorragias=""; } 
if(empty($salidamanchas)) { $salidamanchas=""; } 
if(empty($salidacansancio)) { $salidacansancio=""; } 
if(empty($salidanauseas)) { $salidanauseas=""; } 
if(empty($salidacabello)) { $salidacabello=""; } 
if(empty($salidacataratas)) { $salidacataratas=""; } 
if(empty($salidapielroja)) { $salidapielroja=""; } 
if(empty($salidaesterilidad)) { $salidaesterilidad=""; } 
if(empty($salidacambios)) { $salidacambios=""; }
if(empty($dosimetro)) { $dosimetro=""; } 
if(empty($cancer)) { $cancer=""; }  
if(empty($salidadosimetro)) { $salidadosimetro=""; } 
if(empty($salidacancer)) { $salidacancer=""; } 
if(empty($tipocancer)) { $tipocancer=""; } 
if(empty($cronicas)) { $cronicas=""; } 
if(empty($laborales)) { $laborales=""; }  
if(empty($organo)) { $organo=""; }                                            
if(empty($laboratorio)) { $laboratorio=""; }
?>
<div class="box box-default">
  <div class="box-header with-border <?php echo $color; ?>">
    <h3 class="box-title">
      Antecedentes          
    </h3>
  </div><!-- /.box-header --> 
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
      2.1.- En condición de Personal Ocupacionalmente Expuesto a Radiaciones Ionizantes, ha padecido signos o síntomas en conjunto (2 ó más) como los señalados<br>
<input type="hidden" name="idpersonala" id="idpersonala" value="<?php echo $codigo; ?>" />
<!-- INICIO HEMORRAGIAS -->
<?php 
if($hemorragias=='SI'){ 
   $salidahemorragias.="<input type=\"checkbox\" $disabled name=\"hemorragias\" id=\"hemorragias\" checked >2.1.a.- Hemorragias <br>";
}
else {
   $salidahemorragias.="<input type=\"checkbox\" $disabled name=\"hemorragias\" id=\"hemorragias\" >2.1.a.- Hemorragias <br>";   
}
echo $salidahemorragias;   
?>
<!-- FIN HEMORRAGIAS -->   
<!-- INICIO MANCHAS -->
<?php 
if($manchas=='SI'){ 
   $salidamanchas.="<input type=\"checkbox\" $disabled name=\"manchas\" id=\"manchas\" checked >2.1.b.- Manchas o cambios en la coloracion de la piel <br>";
}
else {
   $salidamanchas.="<input type=\"checkbox\" $disabled name=\"manchas\" id=\"manchas\" >2.1.b.- Manchas o cambios en la coloracion de la piel <br>";   
}
echo $salidamanchas;   
?>
<!-- FIN MANCHAS --> 
<!-- INICIO CANSANCIO --> 
<?php 
if($cansancio=='SI'){ 
   $salidacansancio.="<input type=\"checkbox\" $disabled name=\"cansancio\" id=\"cansancio\" checked >2.1.c.- Cansancio intenso <br>";
}
else {
   $salidacansancio.="<input type=\"checkbox\" $disabled name=\"cansancio\" id=\"cansancio\" >2.1.c.- Cansancio intenso <br>";   
}
echo $salidacansancio;   
?>
<!-- FIN CANSANCIO -->
<!-- INICIO NAUSEAS -->
<?php 
if($nauseas=='SI'){ 
   $salidanauseas.="<input type=\"checkbox\" $disabled name=\"nauseas\" id=\"nauseas\" checked >2.1.d.- Nauseas y Diarreas <br>";
}
else {
   $salidanauseas.="<input type=\"checkbox\" $disabled name=\"nauseas\" id=\"nauseas\" >2.1.d.- Nauseas y Diarreas <br>";   
}
echo $salidanauseas;    
?>
<!-- FIN NAUSEAS -->
<!-- INICIO CABELLO -->
<?php 
if($cabello=='SI'){ 
   $salidacabello.="<input type=\"checkbox\" $disabled name=\"cabello\" id=\"cabello\" checked >2.1.e.- Perdida del Cabello o del Vello Corporal  <br>";
}
else {
   $salidacabello.="<input type=\"checkbox\" $disabled name=\"cabello\" id=\"cabello\" >2.1.e.- Perdida del Cabello o del Vello Corporal  <br>";   
}
echo $salidacabello;    
?>
<!-- FIN CABELLO -->
<!-- INICIO CATARATAS -->
<?php 
if($cataratas=='SI'){ 
   $salidacataratas.="<input type=\"checkbox\" $disabled name=\"cataratas\" id=\"cataratas\" checked >2.1.f.- Disminicuion de Agudeza Visual o Cataratas <br>";
}
else {
   $salidacataratas.="<input type=\"checkbox\" $disabled name=\"cataratas\" id=\"cataratas\" >2.1.f.- Disminicuion de Agudeza Visual o Cataratas <br>";   
}
echo $salidacataratas;    
?>
<!-- FIN CATARATAS -->
<!-- INICIO PIELROJA -->
<?php 
if($pielroja=='SI'){ 
   $salidapielroja.="<input type=\"checkbox\" $disabled name=\"pielroja\" id=\"pielroja\" checked >2.1.g.- Enrojecimiento de la Piel  <br>";
}
else {
   $salidapielroja.="<input type=\"checkbox\" $disabled name=\"pielroja\" id=\"pielroja\" >2.1.g.- Enrojecimiento de la Piel  <br>";   
}
echo $salidapielroja;    
?>
<!-- FIN PIELROJA -->
<!-- INICIO ESTERILIDAD -->
<?php 
if($esterilidad=='SI'){ 
   $salidaesterilidad.="<input type=\"checkbox\" $disabled name=\"esterilidad\" id=\"esterilidad\" checked >2.1.h.-Dificultad para Procrear o Esterilidad <br>";
}
else {
   $salidaesterilidad.="<input type=\"checkbox\" $disabled name=\"esterilidad\" id=\"esterilidad\" >2.1.h.-Dificultad para Procrear o Esterilidad <br>";   
}
echo $salidaesterilidad;    
?>
<!-- FIN ESTERILIDAD -->
<!-- INICIO CAMBIOS -->
<?php 
if($cambios=='SI'){ 
   $salidacambios.="<input type=\"checkbox\" name=\"cambios\" id=\"cambios\" onclick=\"sicambios()\" checked $disabled > 2.1.i.-Cambios Celulares por citologia o biopsia; si es afirmativo indique que tipo y organo.-<br><div id=\"cont_organo\"><input type=\"text\" id=\"organo\" name=\"organo\" value=\"$organo\" /></div>";
}
else {
   $salidacambios.="<input type=\"checkbox\" name=\"cambios\" id=\"cambios\" onclick=\"sicambios()\" $disabled > 2.1.i.-Cambios Celulares por citologia o biopsia; si es afirmativo indique que tipo y organo.-<br><div id=\"cont_organo\"><input type=\"hidden\" id=\"organo\" name=\"organo\" value=\"NO ESPECIFICADO\" /></div>";   
}
echo $salidacambios;
?>  
<!-- FIN CAMBIOS -->
</div><!-- /.col -->
<div class="col-md-6">
<!-- INICIO FUMA Y CUANTOS -->                            
<?php 
$salidafuma.="<div id=\"cont_fuma\">2.2 Fuma?";
if($fuma=="SI") {
      $salidafuma.="<input type=\"checkbox\" name=\"fumasi\" id=\"fumasi\" value=\"SI\"  onclick=\"sifuma();\" $disabled checked=\"\">SI <input type=\"checkbox\"  name=\"fumano\" id=\"fumano\" value=\"NO\" onclick=\"nofuma();\" $disabled>NO <br>";
         switch ($cuantos) {
            case  1:
               $salidacuantos="<div id=\"cont_cuantos\">Cuantos?<input type=\"checkbox\" $disabled name=\"cuantosuno\" id=\"cuantosuno\"  value=\"1\" checked onclick=\"vcuantosuno();\"> menos de 10<input type=\"checkbox\" $disabled name=\"cuantosdos\" id=\"cuantosdos\" value=\"2\" onclick=\"vcuantosdos();\"> 10 a 20 <input type=\"checkbox\" $disabled name=\"cuantostres\" id=\"cuantostres\" value=\"3\" onclick=\"vcuantostres();\"> 20 o + <br><input type=\"hidden\" name=\"cuantos\" id=\"cuantos\" value=\"1\" /></div>";
               break;
            case  2:
               $salidacuantos="<div id=\"cont_cuantos\">Cuantos?<input type=\"checkbox\" $disabled name=\"cuantosuno\" id=\"cuantosuno\"  value=\"1\" onclick=\"vcuantosuno();\"> menos de 10 <input type=\"checkbox\" $disabled  name=\"cuantosdos\" id=\"cuantosdos\" value=\"2\" checked onclick=\"vcuantosdos();\"> 10 a 20<input type=\"checkbox\" $disabled name=\"cuantostres\" id=\"cuantostres\" value=\"3\" onclick=\"vcuantostres();\"> 20 o + <br><input type=\"hidden\" name=\"cuantos\" id=\"cuantos\" value=\"1\" /></div>";
               break;
            case  3:
               $salidacuantos="<div id=\"cont_cuantos\">Cuantos?<input type=\"checkbox\" $disabled name=\"cuantosuno\" id=\"cuantosuno\" value=\"1\" onclick=\"vcuantosuno();\"> menos de 10 <input type=\"checkbox\" $disabled name=\"cuantosdos\" id=\"cuantosdos\" value=\"2\" onclick=\"vcuantosdos();\"> 10 a 20<input type=\"checkbox\" $disabled name=\"cuantostres\" id=\"cuantostres\" value=\"3\"  checked onclick=\"vcuantostres();\"> 20 o + <br><input type=\"hidden\" name=\"cuantos\" id=\"cuantos\" value=\"1\" /></div>";
               break;
            }
      }
      else {
         $salidafuma.="<input type=\"checkbox\" name=\"fumasi\" id=\"fumasi\" value=\"SI\"  onclick=\"sifuma();\" $disabled >SI <input type=\"checkbox\"  name=\"fumano\" id=\"fumano\" value=\"NO\"  onclick=\"nofuma();\" $disabled >NO <br>";
         $salidafuma.="<div id=\"cont_cuantos\"><input type=\"hidden\" name=\"cuantos\" id=\"cuantos\" value=\"0\" /></div></div>";         
      }
echo $salidafuma.$salidacuantos;
?>
</div>
<!-- FIN FUMA Y CUANTOS-->                    
<!-- INICIO CANCER -->
<?php
$salidacancer.="<div id=\"cont_cancer\">";
if($cancer=="SI")
{
   $salidacancer.="2.3 Antededentes familiares con cancer? <input type=\"checkbox\"  $disabled name=\"cancersi\" id=\"cancersi\" value=\"SI\" onclick=\"vtipocancersi();\" checked>SI <input type=\"checkbox\" $disabled name=\"cancerno\" id=\"cancerno\" value=\"NO\"  onclick=\"vtipocancerno();\">NO <br><div id=\"antfam\"><textarea class=\"form-control\" $disabled name=\"tipocancer\" id=\"tipocancer\" placeholder=\"TIPO DE CANCER\">$tipocancer</textarea></div></div>";
}
else {
   $salidacancer.="2.3 Antededentes familiares con cancer? <input type=\"checkbox\"  $disabled name=\"cancersi\" id=\"cancersi\" value=\"SI\" onclick=\"vtipocancersi();\" >SI <input type=\"checkbox\" $disabled name=\"cancerno\" id=\"cancerno\" value=\"NO\"   onclick=\"vtipocancerno();\" checked >NO <br><div id=\"antfam\"><input type=\"hidden\" name=\"tipocancer\" id=\"tipocancer\" value=\"NINGUNO\"/></div></div>";   
}
echo $salidacancer;
?>
<!-- FIN CANCER -->                              
<!-- INICIO DOSIMETRO -->
<?php
$salidadosimetro="<div id=\"cont_dosimetro\">";
if($dosimetro=="SI"){
   $salidadosimetro.="2.4 Uso anterior de dosimetro?<input type=\"checkbox\" $disabled name=\"dosimetrosi\" id=\"dosimetrosi\"  onclick=\"laboratoriosi();\" value=\"SI\" checked>SI <input type=\"checkbox\" $disabled name=\"dosimetrono\" id=\"dosimetrono\" onclick=\"laboratoriono();\" value=\"NO\" >NO <div id=\"dosim\"><textarea class=\"form-control\" $disabled name=\"laboratorio\" id=\"laboratorio\" placeholder=\"LABORATORIO\">$laboratorio</textarea></div></div>";
}
else {
   $salidadosimetro.="2.4 Uso anterior de dosimetro?<input type=\"checkbox\" $disabled name=\"dosimetrosi\" id=\"dosimetrosi\" onclick=\"laboratoriosi();\" value=\"SI\">SI <input type=\"checkbox\" $disabled name=\"dosimetrono\" id=\"dosimetrono\" onclick=\"laboratoriono();\" value=\"NO\" checked >NO <div id=\"dosim\"><input type=\"hidden\" name=\"laboratorio\" id=\"laboratorio\" value=\"NINGUNO\" /></div></div>";
}
echo $salidadosimetro;
?>
<!-- FIN DOSIMETRO -->
<div id="cont_ant">2.5.- Antecedentes laborales con exposición a Radiaciones Ionizantique brevemente tiempo que  tiene laborando con radiaciones ionizantes, tipos de servicio y equipos, diga fechas al menos aproximadas <br>
<textarea class="form-control" <?php echo $disabled; ?> name="laborales" id="laborales" placeholder="ANTECEDENTES LABORALES"><?php echo $laborales; ?></textarea> 
</div>
<div id="cont_cron">
2.6 Si padece una o más enfermedades crónicas, señale: <br>
<textarea class="form-control" <?php echo $disabled; ?> name="cronicas" id="cronicas" placeholder="ENFERMEDADES CRONICAS"><?php echo $cronicas; ?></textarea>
  </div>
  </div><!-- /.col -->                            
  </div><!-- /.row -->
</div>                                    
<div class="box-footer">
<button type="button" <?php echo $disabled; ?> class="btn <?php echo $color; ?>" onclick="guardar_antecedentes()">Guardar</button> 
</div>
</div>
<div id="re_ant" ></div>