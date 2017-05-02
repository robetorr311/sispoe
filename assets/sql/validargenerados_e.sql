CREATE OR REPLACE FUNCTION sys_poe.validargenerados_e(
    in_idestado bigint,
    in_idtipodosimetro bigint,
    in_fechainicio date,
    in_fechafin date)
  RETURNS bigint AS
$BODY$  
DECLARE 
contador bigint;
suma bigint;
reg record;
BEGIN
  suma=0;
  FOR reg IN SELECT * FROM sys_poe.establecimientos where idestado=in_idestado  LOOP
  select count(*) from sys_poe.dosimetropersona where idestablecimiento=reg.id and fechainicio=in_fechainicio and fechafin=in_fechafin and idtipodosimetro=in_idtipodosimetro into contador;
  if (dontador is null) then
  contador=0;
  end if;
  suma=suma+contador;
  END LOOP;
RETURN suma;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.validargenerados_e(bigint,bigint, date, date)
  OWNER TO postgres;
CREATE OR REPLACE VIEW sys_poe.vdosimetrospreparados AS 
 SELECT dosimetropersona.id,
    dosimetropersona.idtarjeta,
    dosimetropersona.idpersona,
    dosimetropersona.iddocumento,
    dosimetropersona.numero,
    dosimetropersona.estatus,
    dosimetropersona.idestablecimiento,
    documento.fecha,
    sys_poe.establecimientonombre(dosimetropersona.idestablecimiento) AS establecimiento,
    sys_poe.personalnombre(dosimetropersona.idpersona) AS personal,
    sys_poe.fbpersonalservicio(dosimetropersona.idpersona, dosimetropersona.idestablecimiento) AS servicio,
    dosimetropersona.fechainicio,
    dosimetropersona.fechafin,
    sys_poe.tipodosimetronombre(dosimetropersona.idtipodosimetro) as tipo
   FROM sys_poe.dosimetropersona,
    sys_poe.documento
  WHERE dosimetropersona.iddocumento = documento.id AND dosimetropersona.estatus = 1
  ORDER BY dosimetropersona.id;

ALTER TABLE sys_poe.vdosimetrospreparados
  OWNER TO postgres;
ALTER TABLE sys_poe.documento ADD COLUMN idtipogenerado bigint;
CREATE TABLE sys_poe.tipogenerado
(
  id bigserial NOT NULL,
  nombre text,
  CONSTRAINT tipogenerado_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE sys_poe.tipogenerado
  OWNER TO postgres;

insert into sys_poe.tipogenerado (id,nombre) values (1,'TODO EL PERSONAL');
insert into sys_poe.tipogenerado (id,nombre) values (2,'PARA UN ESTABLECIMIENTO');
insert into sys_poe.tipogenerado (id,nombre) values (3,'PARA UN ESTADO');
CREATE OR REPLACE FUNCTION sys_poe.destinonombre(in_destino bigint,in_tipogen bigint)
  RETURNS text AS
$BODY$  
DECLARE 
salida text;
BEGIN
  CASE in_tipogen
      WHEN 1 THEN
        salida='TODO EL PERSONAL';
      WHEN 2 THEN
        select nombre FROM sys_poe.establecimientos WHERE id=in_destino into salida;                       
      WHEN 3 THEN
        select nombre FROM comun.estados WHERE id=in_destino into salida;
  ELSE
  END CASE;
  RETURN salida;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.destinonombre(bigint,bigint)
  OWNER TO postgres;
CREATE OR REPLACE FUNCTION sys_poe.establecimientoestado(in_idestablecimiento bigint)
  RETURNS bigint AS
$BODY$  
DECLARE 
in_idestado bigint;
BEGIN
  select idestado FROM sys_poe.establecimientos WHERE id=in_idestablecimiento into in_idestado;        
  RETURN in_idestado;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.establecimientoestado(bigint)
  OWNER TO postgres;

CREATE OR REPLACE VIEW sys_poe.vdosimetrospreparados AS 
 SELECT dosimetropersona.id,
    dosimetropersona.idtarjeta,
    dosimetropersona.idpersona,
    dosimetropersona.iddocumento,
    dosimetropersona.numero,
    dosimetropersona.estatus,
    dosimetropersona.idestablecimiento,
    documento.fecha,
    sys_poe.establecimientonombre(dosimetropersona.idestablecimiento) AS establecimiento,
    sys_poe.personalnombre(dosimetropersona.idpersona) AS personal,
    sys_poe.fbpersonalservicio(dosimetropersona.idpersona, dosimetropersona.idestablecimiento) AS servicio,
    dosimetropersona.fechainicio,
    dosimetropersona.fechafin,
    sys_poe.tipodosimetronombre(dosimetropersona.idtipodosimetro) AS tipo,
    sys_poe.establecimientoestado(dosimetropersona.idestablecimiento) as idestado
   FROM sys_poe.dosimetropersona,
    sys_poe.documento
  WHERE dosimetropersona.iddocumento = documento.id AND dosimetropersona.estatus = 1
  ORDER BY dosimetropersona.id;

ALTER TABLE sys_poe.vdosimetrospreparados
  OWNER TO postgres;
CREATE OR REPLACE FUNCTION sys_poe.generar(
    in_idtipodocumento bigint,
    in_fechai date,
    in_fechaf date,
    in_tipo bigint,
    in_idusuario bigint)
  RETURNS bigint AS
$BODY$  
DECLARE 
iddoc bigint;
conteo bigint;
txtdoc text;
txtorigen text;
txtdestino text;
txttipo text;
txtnumero text;
reg record;
BEGIN
SELECT nextval('sys_poe.documento_id_seq') into iddoc;
SELECT cast(iddoc as text) into txtdoc;
txtdestino='0';
txtnumero = '1' || '1' || txtdestino || txtdoc;
insert into sys_poe.documento(id,
  numero ,
  origen ,
  destino ,
  estatus ,
  fecha ,
  tipodocumento , 
  idusuario,
  idtipogenerado)
  values (iddoc,
  txtnumero ,
  1 ,
  0 ,
  8 ,
  now() ,
  1 ,
  in_idusuario,
  1);
  FOR reg IN SELECT * from sys_poe.establecimientos  LOOP
  PERFORM * from sys_poe.generar_est(iddoc,reg.id, in_idtipodocumento, in_fechai , in_fechaf, in_tipo , in_idusuario);
  END LOOP;  
RETURN iddoc;      
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.generar(bigint, date, date, bigint, bigint)
  OWNER TO postgres;
CREATE OR REPLACE FUNCTION sys_poe.generar_esti(
    in_idestablecimiento bigint,
    in_idtipodocumento bigint,
    in_fechai date,
    in_fechaf date,
    in_tipo bigint,
    in_idusuario bigint)
  RETURNS bigint AS
$BODY$  
DECLARE 
iddoc bigint;
conteo bigint;
txtdoc text;
txtorigen text;
txtdestino text;
txttipo text;
txtnumero text;
reg record;
BEGIN
SELECT nextval('sys_poe.documento_id_seq') into iddoc;
SELECT cast(iddoc as text) into txtdoc;
SELECT cast(in_idestablecimiento as text) into txtdestino;
txtnumero = '1' || '1' || txtdestino || txtdoc;
insert into sys_poe.documento(id,
  numero ,
  origen ,
  destino ,
  estatus ,
  fecha ,
  tipodocumento , 
  idusuario,
  idtipogenerado)
  values (iddoc,
  txtnumero ,
  1 ,
  in_idestablecimiento ,
  8 ,
  now() ,
  1 ,
  in_idusuario,
  2);
  FOR reg IN SELECT * from sys_poe.fpersonal_establecimiento(in_idestablecimiento)  LOOP
  PERFORM * from sys_poe.idosimetropersona(reg.nidpersonal , iddoc , in_fechai , in_fechaf , in_tipo , txtnumero,in_idestablecimiento);
  END LOOP;  
RETURN iddoc;      
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.generar_esti(bigint, bigint, date, date, bigint, bigint)
  OWNER TO postgres;
CREATE OR REPLACE FUNCTION sys_poe.generar_esti_s(
    in_idestablecimiento bigint,
    in_idtipodocumento bigint,
    in_fechai date,
    in_fechaf date,
    in_tipo bigint,
    in_idusuario bigint,
    in_idservicio bigint)
  RETURNS bigint AS
$BODY$  
DECLARE 
iddoc bigint;
conteo bigint;
txtdoc text;
txtorigen text;
txtdestino text;
txttipo text;
txtnumero text;
reg record;
BEGIN
SELECT nextval('sys_poe.documento_id_seq') into iddoc;
SELECT cast(iddoc as text) into txtdoc;
SELECT cast(in_idestablecimiento as text) into txtdestino;
txtnumero = '1' || '1' || txtdestino || txtdoc;
insert into sys_poe.documento(id,
  numero ,
  origen ,
  destino ,
  estatus ,
  fecha ,
  tipodocumento , 
  idusuario,
  idtipogenerado)
  values (iddoc,
  txtnumero ,
  1 ,
  in_idestablecimiento ,
  8 ,
  now() ,
  1 ,
  in_idusuario,
  2);
  FOR reg IN SELECT * from sys_poe.fpersonal_establecimiento_s(in_idestablecimiento,in_idservicio)  LOOP
  PERFORM * from sys_poe.idosimetropersona(reg.nidpersonal , iddoc , in_fechai , in_fechaf , in_tipo , txtnumero,in_idestablecimiento,in_idservicio);
  END LOOP;  
RETURN iddoc;      
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.generar_esti_s(bigint, bigint, date, date, bigint, bigint, bigint)
  OWNER TO postgres;
CREATE OR REPLACE FUNCTION sys_poe.generarxestado(
    in_idestado bigint,
    in_idtipodocumento bigint,
    in_fechai date,
    in_fechaf date,
    in_tipo bigint,
    in_idusuario bigint)
  RETURNS bigint AS
$BODY$  
DECLARE 
iddoc bigint;
conteo bigint;
txtdoc text;
txtorigen text;
txtdestino text;
txttipo text;
txtnumero text;
reg record;
BEGIN
SELECT nextval('sys_poe.documento_id_seq') into iddoc;
SELECT cast(iddoc as text) into txtdoc;
txtdestino='0';
txtnumero = '1' || '1' || txtdestino || txtdoc;
insert into sys_poe.documento(id,
  numero ,
  origen ,
  destino ,
  estatus ,
  fecha ,
  tipodocumento , 
  idusuario,
  idtipogenerado)
  values (iddoc,
  txtnumero ,
  1 ,
  in_idestado ,
  8 ,
  now() ,
  1 ,
  in_idusuario,
  3);
  FOR reg IN SELECT * from sys_poe.establecimientos where idestado=in_idestado  LOOP
  PERFORM * from sys_poe.generar_est(iddoc,reg.id, in_idtipodocumento, in_fechai , in_fechaf, in_tipo , in_idusuario);
  END LOOP;  
RETURN iddoc;      
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.generarxestado(bigint, bigint, date, date, bigint, bigint)
  OWNER TO postgres;
CREATE OR REPLACE VIEW sys_poe.vpreparados AS 
 SELECT documento.id,
    documento.numero,
    documento.origen AS horigen,
    documento.destino AS hdestino,
    documento.estatus AS hestatus,
    documento.fecha,
    documento.tipodocumento AS htipodocumento,
    documento.idusuario,
    sys_poe.establecimientonombre(documento.origen) AS origen,
    sys_poe.destinonombre(documento.destino,documento.idtipogenerado) AS destino,
    sys_poe.usuarionombre(documento.idusuario) AS usuario,
    sys_poe.tipodocumentonombre(documento.tipodocumento) AS tipodocumento,
    sys_poe.estatusdocumento(documento.estatus) AS estatus,
    documento.idtipogenerado
   FROM sys_poe.documento
  WHERE documento.tipodocumento = 1 AND documento.estatus = 8
  ORDER BY documento.id;

ALTER TABLE sys_poe.vpreparados
  OWNER TO postgres;  
DROP VIEW sys_poe.vrecibidos;
CREATE OR REPLACE VIEW sys_poe.vrecibidos AS 
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
    sys_poe.estatusnombre(documento.estatus) AS estatus
   FROM sys_poe.documento
  WHERE documento.tipodocumento = 1 AND documento.estatus = 10
  ORDER BY documento.id;

ALTER TABLE sys_poe.vrecibidos
  OWNER TO postgres;
CREATE OR REPLACE VIEW sys_poe.venvios AS 
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
  WHERE documento.tipodocumento = 1 AND documento.estatus = 9
  ORDER BY documento.id;

ALTER TABLE sys_poe.venvios
  OWNER TO postgres;

