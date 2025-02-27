CREATE OR REPLACE FUNCTION sys_poe.compruebadosimetro(in_dosimetro text)
  RETURNS bigint AS
$BODY$  
DECLARE 
hdosimetro bigint;
contador bigint;
BEGIN
select id from sys_poe.dosimetros where codigobarra=in_dosimetro into hdosimetro;
if (hdosimetro is null)
then
  contador=9999999999;
else
  select count(id) FROM sys_poe.vdosimetrosasignados WHERE iddosimetro=hdosimetro into contador;
  if (contador is null) 
  then
    contador=0;
  end if;
  if (contador>0)
    then
      contador=hdosimetro;
    else
      contador=0;
  end if;
end if;
RETURN contador;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_poe.compruebadosimetro(text)
  OWNER TO postgres;
