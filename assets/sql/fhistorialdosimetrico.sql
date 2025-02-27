CREATE OR REPLACE FUNCTION sys_poe.fhistorialdosimetrico(
    IN in_idpersonal bigint)
  RETURNS TABLE(ndosimetro bigint, nfechai date, nfechafin date,ndosis double precision, nestudio text, nestablecimiento text, nservicio text) AS
$BODY$  
DECLARE 
BEGIN
RETURN QUERY select lecturas.hpersonal as nidpersona,
    sys_poe.personalnombre(lecturas.hpersonal) as nnombre,
    lecturas.dosis as ndosis,
    sys_poe.dosis_acum(lecturas.hpersonal) as nacumulada    
    from sys_poe.lecturas, sys_poe.dosimetropersona where 
    sys_poe.lecturas.iddosimetro=sys_poe.dosimetropersona.id and
    sys_poe.dosimetropersona.idservicio=in_servicio and
    sys_poe.dosimetropersona.idestablecimiento=in_idestablecimiento and
    sys_poe.dosimetropersona.idtipodosimetro=in_estudio and
    sys_poe.dosimetropersona.fechainicio=in_fechai and
    sys_poe.dosimetropersona.fechafin=in_fechaf;  
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION sys_poe.freportedosis(bigint, bigint, bigint, date, date)
  OWNER TO postgres;
