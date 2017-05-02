CREATE OR REPLACE FUNCTION sys_poe.ipersonal(
    in_id bigint,
    in_nombre text,
    in_apellido1 text,
    in_apellido2 text,
    in_cedula text,
    in_telefono text,
    in_fechadenacimiento date,
    in_sexo character,
    in_nombre2 text,
    in_pais text,
    in_direccion text,
    in_correo text,
    in_profesion text,
    in_especialidad text,
    in_nacionalidad character,
    in_lugar text)
  RETURNS void AS
$BODY$  
DECLARE 
conteo bigint;
txtquery1 text;
txtquery2 text;
txtquery3 text;
txtquery4 text;
txtquery5 text;
txtquerycargo text;
txtqueryant text;
txtqueryestab text;
txtfuma character(2);
bgnfrequenciaf bigint;
txthemorragias character(2);
txtdesidratacion character(2);
txtcansancio character(2);
txtnauseas character(2);
txtcabello character(2);
txtcataratas character(2);
txtpielroja character(2);
txtesterilidad character(2);
txtcambios character(2);
txtdosimetro character(2);
txtcancer character(2);
txttipocancer text;
txtcronicas text;
txtidpersonal text;
txtotros_antecedentes text;
BEGIN
    SELECT CAST( in_id AS text ) into txtidpersonal;
    SELECT count(id) from sys_poe.personal where id=in_id into conteo;
    IF (conteo IS NULL)
    THEN
      conteo=0;
    END IF;
    IF (conteo>0)
    THEN
      DELETE FROM sys_poe.personalestablecimiento WHERE idpersonal=in_id;
      txtqueryestab = 'SELECT sys_poe.ipersonalestablecimiento(idpersonal,idestablecimiento ) FROM sys_tmp.tmp_estab' || txtidpersonal || ';'; 
      EXECUTE txtqueryestab;
      DELETE FROM sys_poe.cargoestablecimiento WHERE idpersonal=in_id;
      txtquerycargo = 'SELECT sys_poe.icargoestablecimiento(idpersonal , idestablecimiento , idcargo,idservicio ) FROM sys_tmp.tmp_persp' || txtidpersonal || ';'; 
      EXECUTE txtquerycargo;
      txtqueryant = 'SELECT sys_poe.iantecedentes(  fuma ,  frequenciaf ,  hemorragias ,  manchas ,  cansancio ,  nauseas ,  cabello ,  cataratas ,  pielroja ,  esterilidad ,  cambios ,  dosimetro ,  cancer ,  tipocancer ,  cronicas ,  otros_antecedentes ,  idpersonal, organo, laboratorio ) FROM sys_tmp.tmp_ant' || txtidpersonal || ';'; 
      EXECUTE txtqueryant;       
      UPDATE sys_poe.personal SET
      nombre=upper(in_nombre), 
      apellido1=upper(in_apellido1),
      apellido2=upper(in_apellido2),
      cedula=in_cedula,
      telefono=in_telefono,
      fechadenacimiento=in_fechadenacimiento,
      sexo=in_sexo,
      nombre2=upper(in_nombre2),
      pais=in_pais,
      direccion=upper(in_direccion),
      correo=upper(in_correo),
      profesion=upper(in_profesion),
      especialidad=upper(in_especialidad),
      nacionalidad=upper(in_nacionalidad),
      lugar=upper(in_lugar)
      WHERE id=in_id;     
      txtquery1 = 'DROP TABLE sys_tmp.tmp_ant' || txtidpersonal || ';'; 
      txtquery2 = 'DROP TABLE sys_tmp.tmp_estab' || txtidpersonal || ';';
      txtquery3 = 'DROP TABLE sys_tmp.tmp_persp' || txtidpersonal || ';';
      txtquery4 = 'DROP SEQUENCE sys_tmp.tmpe_' || txtidpersonal || ';';
      txtquery5 = 'DROP SEQUENCE sys_tmp.tmpc_' || txtidpersonal || ';';
      EXECUTE txtquery1;
      EXECUTE txtquery2;
      EXECUTE txtquery3;
      EXECUTE txtquery4;
      EXECUTE txtquery5;      
    ELSE
      txtqueryestab = 'SELECT sys_poe.ipersonalestablecimiento(idpersonal,idestablecimiento ) FROM sys_tmp.tmp_estab' || txtidpersonal || ';'; 
      EXECUTE txtqueryestab;
      txtquerycargo = 'SELECT sys_poe.icargoestablecimiento(idpersonal , idestablecimiento , idcargo,idservicio ) FROM sys_tmp.tmp_persp' || txtidpersonal || ';'; 
      EXECUTE txtquerycargo;
      txtqueryant = 'SELECT sys_poe.iantecedentes(  fuma ,  frequenciaf ,  hemorragias ,  manchas ,  cansancio ,  nauseas ,  cabello ,  cataratas ,  pielroja ,  esterilidad ,  cambios ,  dosimetro ,  cancer ,  tipocancer ,  cronicas ,  otros_antecedentes ,  idpersonal, organo, laboratorio ) FROM sys_tmp.tmp_ant' || txtidpersonal || ';'; 
      EXECUTE txtqueryant;      
      insert into sys_poe.personal   (id ,  nombre ,  apellido1 ,  apellido2 ,  cedula ,  telefono ,  fechadenacimiento ,  sexo ,  nombre2 ,  pais ,  direccion ,  correo ,  profesion ,  especialidad ,  nacionalidad ,  lugar )
        values (in_id ,upper(in_nombre) ,upper(in_apellido1) ,upper(in_apellido2) ,in_cedula ,in_telefono ,in_fechadenacimiento ,in_sexo ,upper(in_nombre2) ,in_pais ,upper(in_direccion) ,upper(in_correo) ,upper(in_profesion) ,upper(in_especialidad) ,in_nacionalidad ,upper(in_lugar)); 

      txtquery1 = 'DROP TABLE sys_tmp.tmp_ant' || txtidpersonal || ';'; 
      txtquery2 = 'DROP TABLE sys_tmp.tmp_estab' || txtidpersonal || ';';
      txtquery3 = 'DROP TABLE sys_tmp.tmp_persp' || txtidpersonal || ';';
      txtquery4 = 'DROP SEQUENCE sys_tmp.tmpe_' || txtidpersonal || ';';
      txtquery5 = 'DROP SEQUENCE sys_tmp.tmpc_' || txtidpersonal || ';';      
      EXECUTE txtquery1;
      EXECUTE txtquery2;
      EXECUTE txtquery3;
      EXECUTE txtquery4;
      EXECUTE txtquery5;
    END IF;           
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.ipersonal(bigint, text, text, text, text, text, date, character, text, text, text, text, text, text, character, text)
  OWNER TO postgres;
