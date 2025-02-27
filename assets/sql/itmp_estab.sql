CREATE OR REPLACE FUNCTION sys_tmp.itmp_estab(
    in_idpersonal bigint,
    in_idestablecimiento bigint,
    in_idservicio bigint,
    in_idcargo bigint
    )
  RETURNS void AS
$BODY$  
DECLARE 
conteo bigint;
conteoe bigint;
conteop bigint;
conteose bigint;
conteosp bigint;
tmpid bigint;
txtid text;
txte text;
txts text;
txtc text;
secuenciae text;
secuenciac text;
seqe text;
seqc text;
BEGIN
select nextval('sys_tmp.tmp_id_seq') into conteo;
select nombre from sys_poe.establecimientos where id=in_idestablecimiento into txte;
select nombre from sys_poe.cargos where id=in_idcargo into txtc;
select nombre from sys_poe.servicios where id=in_idservicio into txts;
select cast(in_idpersonal as text) into txtid;
secuenciae='tmpe_' || txtid;
secuenciac='tmpc_' || txtid;
EXECUTE 'SELECT count(*) FROM information_schema.sequences where sequence_name=$1' 
INTO conteose
   USING secuenciae;
   if (conteose is null)
   then
   conteose=0;
   end if;
   if (conteose=0) 
   then
    EXECUTE 'CREATE SEQUENCE sys_tmp.tmpe_' || txtid || '
    INCREMENT 1
    MINVALUE 1
    MAXVALUE 99999999999999
    START 1
    CACHE 1
    CYCLE';
      seqe='sys_tmp.tmpe_' || txtid; 
      EXECUTE 'SELECT nextval($1)' into conteoe using seqe;
   else
      seqe='sys_tmp.tmpe_' || txtid; 
      EXECUTE 'SELECT nextval($1)' into conteoe using seqe;   
   end if;

EXECUTE 'SELECT count(*) FROM information_schema.sequences where sequence_name=$1' 
INTO conteosp
   USING secuenciac;
   if (conteosp is null)
   then
   conteosp=0;
   end if;
   if (conteosp=0) 
   then
    EXECUTE 'CREATE SEQUENCE sys_tmp.tmpc_' || txtid || '
    INCREMENT 1
    MINVALUE 1
    MAXVALUE 99999999999999
    START 1
    CACHE 1
    CYCLE';
      seqc='sys_tmp.tmpc_' || txtid; 
      EXECUTE 'SELECT nextval($1)' into conteop using seqc;
   else
      seqc='sys_tmp.tmpc_' || txtid; 
      EXECUTE 'SELECT nextval($1)' into conteop using seqc;   
   end if;
EXECUTE 'SELECT count(*) FROM sys_tmp.tmp_estab' || txtid || ' WHERE idestablecimiento = $1' 
INTO conteo
   USING in_idestablecimiento;
   if (conteo is null)
   then
   conteo=0;
   end if;
   if (conteo>0)
   then
    EXECUTE 'SELECT count(*) FROM sys_tmp.tmp_persp' || txtid || ' WHERE idestablecimiento = $1 AND idcargo=$2 AND idpersonal=$3 AND idservicio=$4' 
    INTO conteo
    USING in_idestablecimiento, in_idcargo, in_idpersonal, in_idservicio;
    if (conteo is null)
    then
      conteo=0;
    end if;
      if (conteo=0) 
    then
      EXECUTE format('INSERT INTO sys_tmp.tmp_persp'|| txtid ||'(id ,  idpersonal ,  idestablecimiento ,  idcargo , idservicio, establecimiento, cargo, servicio) VALUES($1,$2,$3,$4,$5,$6,$7,$8);') using conteop , in_idpersonal ,in_idestablecimiento ,in_idcargo, in_idservicio, txte,txtc,txts;
    end if;
   else
      EXECUTE format('INSERT INTO sys_tmp.tmp_estab'|| txtid ||'(id ,  idpersonal ,idestablecimiento , establecimiento) VALUES($1,$2,$3,$4);') using conteoe ,in_idpersonal ,in_idestablecimiento ,txte;
      EXECUTE 'SELECT count(*) FROM sys_tmp.tmp_persp' || txtid || ' WHERE idestablecimiento = $1 AND idcargo=$2 AND idpersonal=$3 AND idservicio=$4' 
      INTO conteo
     USING in_idestablecimiento, in_idcargo, in_idpersonal, in_idservicio;
     if (conteo is null)
     then
      conteo=0;
     end if;
      if (conteo=0) 
     then
      EXECUTE format('INSERT INTO sys_tmp.tmp_persp'|| txtid ||'(id ,  idpersonal ,  idestablecimiento ,  idcargo , idservicio, establecimiento, cargo, servicio) VALUES($1,$2,$3,$4,$5,$6,$7,$8);') using conteop , in_idpersonal ,in_idestablecimiento ,in_idcargo, in_idservicio, txte,txtc,txts;
     end if;
   end if;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_tmp.itmp_estab(bigint,bigint,bigint,bigint)
  OWNER TO postgres;
