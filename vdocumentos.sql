CREATE OR REPLACE VIEW sys_poe.vdocumentos
 AS
 SELECT documento.id,
    documento.numero,
    documento.origen AS horigen,
    documento.destino AS hdestino,
    documento.estatus AS hestatus,
    documento.fecha AS date,
    documento.tipodocumento AS htipodocumento,
    documento.idusuario,
    sys_poe.establecimientonombre(documento.origen) AS origen,
    sys_poe.destinonombre(documento.destino, documento.idtipogenerado) AS destino,
    sys_poe.usuarionombre(documento.idusuario) AS usuario,
    sys_poe.tipodocumentonombre(documento.tipodocumento) AS tipodocumento,
    sys_poe.estatusnombre(documento.estatus) AS estatus,
    documento.idtipogenerado
   FROM sys_poe.documento
  WHERE documento.tipodocumento = 1 AND
  documento.estatus not in (11,13,15,16)
  ORDER BY documento.fecha DESC;

ALTER TABLE sys_poe.vdocumentos

CREATE OR REPLACE FUNCTION sys_poe.anular_dosimetros(
   in_id bigint)
    RETURNS void
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
AS $BODY$
  
DECLARE 
txtestatus text;
IN_idtarjeta bigint;
BEGIN   
     SELECT idtarjeta FROM sys_poe.dosimetropersona where id=in_id INTO IN_idtarjeta;
     UPDATE sys_poe.tarjetas set estatus=17 WHERE id=IN_idtarjeta;
     UPDATE sys_poe.dosimetropersona set estatus=7 where id=in_id;
     
END
$BODY$;

ALTER FUNCTION sys_poe.anular_dosimetros(bigint)
    OWNER TO postgres;