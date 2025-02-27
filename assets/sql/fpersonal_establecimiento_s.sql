CREATE OR REPLACE FUNCTION sys_poe.generar_est_s(
    in_iddoc bigint,
    in_idestablecimiento bigint,
    in_idtipodocumento bigint,
    in_fechai date,
    in_fechaf date,
    in_tipo bigint,
    in_idusuario bigint,
    in_idservicio bigint)
  RETURNS void AS
$BODY$  
DECLARE 
conteo bigint;
txtdoc text;
txtorigen text;
txtdestino text;
txttipo text;
txtnumero text;
reg record;
BEGIN
SELECT cast(in_iddoc as text) into txtdoc;
SELECT cast(in_idestablecimiento as text) into txtdestino;
txtnumero = '1' || '1' || txtdestino || txtdoc;

  FOR reg IN SELECT * from sys_poe.fpersonal_establecimiento_s(in_idestablecimiento,in_idservicio)  LOOP
  PERFORM * from sys_poe.idosimetropersona(reg.nidpersonal , in_iddoc , in_fechai , in_fechaf , in_tipo , txtnumero,in_idestablecimiento, in_idservicio);
  END LOOP;     
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.generar_est_s(bigint, bigint, bigint, date, date, bigint, bigint, bigint)
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
  idusuario)
  values (iddoc,
  txtnumero ,
  1 ,
  in_idestablecimiento ,
  8 ,
  now() ,
  1 ,
  in_idusuario);
  FOR reg IN SELECT * from sys_poe.fpersonal_establecimiento_s(in_idestablecimiento,in_idservicio)  LOOP
  PERFORM * from sys_poe.idosimetropersona(reg.nidpersonal , iddoc , in_fechai , in_fechaf , in_tipo , txtnumero,in_idestablecimiento,in_idservicio);
  END LOOP;  
RETURN iddoc;      
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.generar_esti_s(bigint, bigint, date, date, bigint, bigint,bigint)
  OWNER TO postgres;
ALTER TABLE sys_poe.dosimetropersona ADD COLUMN idservicio bigint; 
CREATE OR REPLACE FUNCTION sys_poe.idosimetropersona(
    in_idpersona bigint,
    in_iddocumento bigint,
    in_fechai date,
    in_fechaf date,
    in_tipo bigint,
    in_numero text,
    in_idestablecimiento bigint,
    in_idservicio bigint)
  RETURNS void AS
$BODY$  
DECLARE 
conteo bigint;
BEGIN
INSERT INTO sys_poe.dosimetropersona
( idpersona ,
  iddocumento ,
  numero ,
  estatus ,
  fechainicio ,
  fechafin ,
  idtipodosimetro,
  idestablecimiento,
  idservicio )
      VALUES
  (in_idpersona ,
  in_iddocumento ,
  in_numero ,
  1 ,
  in_fechai ,
  in_fechaf ,
  in_tipo,
  in_idestablecimiento,
  in_idservicio);
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.idosimetropersona(bigint, bigint, date, date, bigint, text, bigint,bigint)
  OWNER TO postgres;
CREATE OR REPLACE FUNCTION sys_poe.validargenerados(
in_idestablecimiento bigint, 
in_idtipodosimetro bigint,
in_fechainicio date,
in_fechafin date)
  RETURNS bigint AS
$BODY$  
DECLARE 
contador bigint;
BEGIN
select count(*) from sys_poe.dosimetropersona where idestablecimiento=in_idestablecimiento and idtipodosimetro=in_idtipodosimetro
and fechainicio=in_fechainicio and fechafin=in_fechafin and estatus<4 into contador;
if (contador is null)
then
  contador=0;
end if;
RETURN contador;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.validargenerados(bigint, bigint, date,date)
  OWNER TO postgres;  
CREATE OR REPLACE FUNCTION sys_poe.validardtodos(
    in_idtipodosimetro bigint,
    in_fechainicio date,
    in_fechafin date)
  RETURNS bigint AS
$BODY$  
DECLARE 
contador bigint;
BEGIN
select count(*) from sys_poe.dosimetropersona where idtipodosimetro=in_idtipodosimetro
and fechainicio=in_fechainicio and fechafin=in_fechafin and estatus<4 into contador;
if (contador is null)
then
  contador=0;
end if;
RETURN contador;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.validardtodos(bigint, date, date)
  OWNER TO postgres;
CREATE OR REPLACE VIEW sys_poe.vpersonalestablecimiento_e AS 
 SELECT personalestablecimiento.id,
    personalestablecimiento.idpersonal,
    personalestablecimiento.idestablecimiento,
    establecimientos.nombre AS establecimiento,
    establecimientos.idestado
   FROM sys_poe.personalestablecimiento,
    sys_poe.establecimientos
  WHERE personalestablecimiento.idestablecimiento = establecimientos.id
  ORDER BY personalestablecimiento.id;

ALTER TABLE sys_poe.vpersonalestablecimiento_e
  OWNER TO postgres;
CREATE OR REPLACE FUNCTION sys_poe.festado_establecimiento(IN in_idestado bigint)
  RETURNS TABLE(nidpersonal bigint, nnombre text) AS
$BODY$  
DECLARE 
BEGIN
RETURN QUERY select idpersonal as nidpersonal,sys_poe.personalnombre(idpersonal) as nnombre from sys_poe.vpersonalestablecimiento_e where idestado=in_idestado order by idpersonal;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION sys_poe.festado_establecimiento(bigint)
  OWNER TO postgres;
CREATE OR REPLACE FUNCTION sys_poe.generarxestado(in_idestado bigint,
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
  idusuario)
  values (iddoc,
  txtnumero ,
  1 ,
  0 ,
  8 ,
  now() ,
  1 ,
  in_idusuario);
  FOR reg IN SELECT * from sys_poe.establecimientos where idestado=in_idestado  LOOP
  PERFORM * from sys_poe.generar_est(iddoc,reg.id, in_idtipodocumento, in_fechai , in_fechaf, in_tipo , in_idusuario);
  END LOOP;  
RETURN iddoc;      
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.generarxestado(bigint,bigint, date, date, bigint, bigint)
  OWNER TO postgres;