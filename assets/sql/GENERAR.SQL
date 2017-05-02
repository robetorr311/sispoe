CREATE OR REPLACE FUNCTION sys_poe.ilecturas(
    in_idtarjeta bigint,
    in_hpersonal bigint,
    in_fecha date,
    in_dosis double precision,
    in_iddocumento bigint,
    in_archivo text)
  RETURNS void AS
$BODY$  
DECLARE
in_iddosimetro bigint; 
txtestatus text;
BEGIN
      select id from sys_poe.dosimetropersona where idtarjeta=in_idtarjeta and iddocumento=in_iddocumento into in_iddosimetro;
      insert into sys_poe.lecturas( idtarjeta ,  hpersonal ,  fecha ,  dosis , iddocumento,archivo,iddosimetro )  values (in_idtarjeta ,in_hpersonal ,in_fecha ,in_dosis,in_iddocumento,in_archivo,in_iddosimetro);
      UPDATE sys_poe.tarjetas set estatus=17 where id=in_idtarjeta;
      UPDATE sys_poe.dosimetropersona set estatus=3, iddocumento=in_iddocumento where idtarjeta=in_idtarjeta and iddocumento=in_iddocumento;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.ilecturas(bigint, bigint, date, double precision, bigint, text)
  OWNER TO postgres;




  CREATE OR REPLACE FUNCTION sys_poe.dosis_testigo()
  RETURNS trigger AS
$BODY$
DECLARE
in_iddocumento bigint;
in_iddosimetro bigint;
in_idtarjeta bigint;
in_testigo bigint;
in_dosis double precision;
reg record;
regajuste bigint;
regidtarjeta bigint;
regdosis double precision;
nuevadosis double precision;
tarjetatestigo bigint;
in_idestablecimiento bigint;
dosistestigo double precision;
conteo bigint;
rec bigint;
BEGIN
in_iddosimetro=NEW.iddosimetro;
in_iddocumento=NEW.iddocumento;
in_idtarjeta=NEW.idtarjeta;
in_testigo=NEW.testigo;
in_dosis=NEW.dosis;
IF (in_testigo is null)
THEN
  in_testigo=0;
END IF;
IF (in_testigo>0) 
THEN
  SELECT idestablecimiento FROM sys_poe.dosimetropersona WHERE id=in_iddosimetro INTO in_idestablecimiento;
  SELECT count(*) FROM sys_poe.vlecturas_establecimiento WHERE iddocumento=in_iddocumento and idestablecimiento=in_idestablecimiento INTO rec;
  IF (rec IS NULL)
  THEN
    rec=0;
  END IF;
  IF (rec>0)
  THEN
  FOR reg IN SELECT idtarjeta,dosis,ajuste FROM sys_poe.vlecturas_establecimiento WHERE iddocumento=in_iddocumento and idestablecimiento=in_idestablecimiento LOOP
    regajuste=reg.ajuste;
    regidtarjeta=reg.idtarjeta;
    regdosis=reg.dosis;
    IF (regajuste=0)
    THEN
      nuevadosis=regdosis-in_dosis;
      UPDATE sys_poe.lecturas SET dosis=nuevadosis, ajuste=1 WHERE idtarjeta=regidtarjeta AND iddocumento=in_iddocumento;
    END IF;  
  END LOOP;
  END IF;  
ELSE
  SELECT idestablecimiento FROM sys_poe.dosimetropersona WHERE id=in_iddosimetro INTO in_idestablecimiento;
  SELECT idtarjeta FROM sys_poe.dosimetropersona WHERE iddocumento=in_iddocumento AND testigo=1 AND idestablecimiento=in_idestablecimiento into tarjetatestigo;  
  SELECT count(id) FROM sys_poe.lecturas WHERE idtarjeta=tarjetatestigo AND iddocumento=in_iddocumento INTO conteo;
  IF (conteo IS NULL)
  THEN
    conteo=0;
  END IF;
  IF (conteo>0)
  THEN
    SELECT dosis FROM sys_poe.lecturas WHERE idtarjeta=tarjetatestigo INTO dosistestigo;
    SELECT count(*) FROM sys_poe.vlecturas_establecimiento WHERE iddocumento=in_iddocumento and idestablecimiento=in_idestablecimiento INTO rec;
    IF (rec IS NULL)
    THEN
      rec=0;
    END IF;
    IF (rec>0)
    THEN    
    FOR reg IN SELECT idtarjeta,dosis,ajuste FROM sys_poe.vlecturas_establecimiento WHERE iddocumento=in_iddocumento AND idestablecimiento=in_idestablecimiento LOOP
      regajuste=reg.ajuste;
      regidtarjeta=reg.idtarjeta;
      regdosis=reg.dosis;
      IF (regajuste=0)
      THEN
        nuevadosis=regdosis-dosistestigo;
        UPDATE sys_poe.lecturas SET dosis=nuevadosis, ajuste=1 WHERE idtarjeta=regidtarjeta AND iddocumento=in_iddocumento;
      END IF;  
    END LOOP;
    END IF;
  END IF;
END IF;
RETURN NULL;
END;

$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.dosis_testigo()
  OWNER TO postgres;

CREATE TRIGGER trg_dosis_testigo
  AFTER INSERT
  ON sys_poe.lecturas
  FOR EACH ROW
  EXECUTE PROCEDURE sys_poe.dosis_testigo();
