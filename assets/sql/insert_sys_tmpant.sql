CREATE OR REPLACE FUNCTION sys_tmp.itmp_ant(in_id bigint, in_fuma character, in_frequenciaf bigint, in_hemorragias character, in_manchas character, in_cansancio character, in_nauseas character, in_cabello character, in_cataratas character, in_pielroja character, in_esterilidad character, in_cambios character, in_dosimetro character, in_cancer character, in_tipocancer text, in_cronicas text, in_otros_antecedentes text, in_idpersonal bigint, in_organo text, in_laboratorio text)
  RETURNS void AS
$BODY$  
DECLARE 
conteo bigint;
txtid text;
BEGIN
select cast(in_idpersonal as text) into txtid;
EXECUTE format('INSERT INTO sys_tmp.tmp_ant'|| txtid ||'(id ,  fuma ,  frequenciaf ,  hemorragias ,  manchas ,  cansancio ,  nauseas ,  cabello ,  cataratas ,  pielroja ,  esterilidad ,  cambios ,  dosimetro ,  cancer ,
  tipocancer ,  cronicas ,  otros_antecedentes ,  idpersonal, organo, laboratorio)
                VALUES($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13,$14,$15,$16,$17,$18,$19,$20);') using in_id ,in_fuma ,in_frequenciaf ,in_hemorragias ,in_manchas ,in_cansancio ,in_nauseas ,in_cabello ,in_cataratas ,in_pielroja ,in_esterilidad ,in_cambios ,in_dosimetro ,in_cancer ,in_tipocancer ,in_cronicas ,in_otros_antecedentes ,in_idpersonal,in_organo,in_laboratorio ;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_tmp.itmp_ant(bigint, character, bigint, character, character, character, character, character, character, character, character, character, character, character, text, text, text, bigint, text, text)
  OWNER TO postgres;
