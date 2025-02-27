CREATE OR REPLACE FUNCTION sys_poe.fgrupos_edad_sexo(in_tipo bigint,
	in_idestado bigint,
	in_idestablecimiento bigint,
	in_idservicio bigint,
	in_cargo bigint)
  RETURNS TABLE(nid bigint,  nrango text,  nsexo character (1),  ncantidad bigint) AS
$BODY$  
DECLARE 
mr25 bigint;
mr2529 bigint;
mr3034 bigint;
mr3539 bigint;
mr4044 bigint;
mr4549 bigint;
mr5054 bigint;
mr5559 bigint;
mr6064 bigint;
mr65 bigint;
mrdesc bigint;
fr25 bigint;
fr2529 bigint;
fr3034 bigint;
fr3539 bigint;
fr4044 bigint;
fr4549 bigint;
fr5054 bigint;
fr5559 bigint;
fr6064 bigint;
fr65 bigint;
tmp bigint;
txttmp text;
frdesc bigint;
conteo bigint;
BEGIN
  CASE in_tipo
      WHEN 1 THEN
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='M' and edad < 25 into mr25;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='M' and edad BETWEEN 25 AND 29 into mr2529;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='M' and edad BETWEEN 30 AND 34 into mr3034;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='M' and edad BETWEEN 35 AND 39 into mr3539;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='M' and edad BETWEEN 40 AND 44 into mr4044;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='M' and edad BETWEEN 45 AND 49 into mr4549;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='M' and edad BETWEEN 50 AND 54 into mr5054;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='M' and edad BETWEEN 55 AND 59 into mr5559;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='M' and edad BETWEEN 60 AND 64 into mr6064;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='M' and edad BETWEEN 65 AND 100 into mr65;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='M' and edad=117 into mrdesc;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='F' and edad < 25 into fr25;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='F' and edad BETWEEN 25 AND 29 into fr2529;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='F' and edad BETWEEN 30 AND 34 into fr3034;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='F' and edad BETWEEN 35 AND 39 into fr3539;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='F' and edad BETWEEN 40 AND 44 into fr4044;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='F' and edad BETWEEN 45 AND 49 into fr4549;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='F' and edad BETWEEN 50 AND 54 into fr5054;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='F' and edad BETWEEN 55 AND 59 into fr5559;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='F' and edad BETWEEN 60 AND 64 into fr6064;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='F' and edad BETWEEN 65 AND 100 into fr65;
		SELECT count(codigo) from sys_poe.vcargoestablecimiento_e where sexo='F' and edad=117 into frdesc;
		select nextval('sys_tmp.tmp_preval') into tmp;
		SELECT CAST(tmp AS text) into txttmp;
		SELECT * from sys_tmp.set_tmp_preval(tmp) into conteo;
		PERFORM * from sys_tmp.itmp_preval(tmp, 1,' < 25 ', 'M', mr25);
		PERFORM * from sys_tmp.itmp_preval(tmp, 2,' 25 - 29 ', 'M', mr2529);
		PERFORM * from sys_tmp.itmp_preval(tmp, 3,' 30 - 34 ', 'M', mr3034);
		PERFORM * from sys_tmp.itmp_preval(tmp, 4,' 35 - 39 ', 'M', mr3539);
		PERFORM * from sys_tmp.itmp_preval(tmp, 5,' 40 - 44 ', 'M', mr4044);
		PERFORM * from sys_tmp.itmp_preval(tmp, 6,' 45 - 49 ', 'M', mr4549);
		PERFORM * from sys_tmp.itmp_preval(tmp, 7,' 50 - 54 ', 'M', mr5054);
		PERFORM * from sys_tmp.itmp_preval(tmp, 8,' 55 - 59 ', 'M', mr5559);
		PERFORM * from sys_tmp.itmp_preval(tmp, 9,' 60 - 64 ', 'M', mr6064);
		PERFORM * from sys_tmp.itmp_preval(tmp, 10,' > 65 ', 'M', mr65);
		PERFORM * from sys_tmp.itmp_preval(tmp, 11,'DESCONOCIDA', 'M', mrdesc);
		PERFORM * from sys_tmp.itmp_preval(tmp, 12,' < 25 ', 'F', fr25);
		PERFORM * from sys_tmp.itmp_preval(tmp, 13,' 25 - 29 ', 'F', fr2529);
		PERFORM * from sys_tmp.itmp_preval(tmp, 14,' 30 - 34 ', 'F', fr3034);
		PERFORM * from sys_tmp.itmp_preval(tmp, 15,' 35 - 39 ', 'F', fr3539);
		PERFORM * from sys_tmp.itmp_preval(tmp, 16,' 40 - 44 ', 'F', fr4044);
		PERFORM * from sys_tmp.itmp_preval(tmp, 17,' 45 - 49 ', 'F', fr4549);
		PERFORM * from sys_tmp.itmp_preval(tmp, 18,' 50 - 54 ', 'F', fr5054);
		PERFORM * from sys_tmp.itmp_preval(tmp, 19,' 55 - 59 ', 'F', fr5559);
		PERFORM * from sys_tmp.itmp_preval(tmp, 20,' 60 - 64 ', 'F', fr6064);
		PERFORM * from sys_tmp.itmp_preval(tmp, 21,' > 65 ', 'F', fr65);
		PERFORM * from sys_tmp.itmp_preval(tmp, 22,'DESCONOCIDA', 'F', frdesc);
		RETURN QUERY EXECUTE 'select id as nid,rango as nrango, sexo as nsexo, cantidad as ncantidad from sys_tmp.tmp_preval' || txttmp || ' order by id;'; 
		EXECUTE 'drop table sys_tmp.tmp_preval' || txttmp || ';';      	

      WHEN 2 THEN

  ELSE
  END CASE;      

END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;
ALTER FUNCTION sys_poe.fprevalencia_general(bigint)
  OWNER TO postgres;