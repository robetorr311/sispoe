CREATE OR REPLACE FUNCTION sys_tmp.drop_tmp_personal(in_id bigint)
  RETURNS void AS
$BODY$  
DECLARE 
txttmp_ant text;
txttmp_estab text;
txttmp_persp text;
txtdropant text;
txtdropest text;
txtdroppersp text;
txtid text;
conteoa bigint;
conteoe bigint;
conteoc bigint;
conteose bigint;
conteosc bigint;
txtseqe text;
txtseqc text;
txtdropseqe text;
txtdropseqc text;
BEGIN
SELECT CAST( in_id AS text ) into txtid;
txtseqe= 'tmpe_' || txtid;
SELECT count(*) FROM information_schema.sequences WHERE sequence_name = txtseqe into conteose;
  IF (conteose IS NULL)
  THEN
    conteose=0;
  END IF;
  IF (conteose>0)
  THEN
    txtdropseqe = 'DROP SEQUENCE sys_tmp.' ||  txtseqe; 
    EXECUTE txtdropseqe;
  END IF; 
txtseqc= 'tmpc_' || txtid;
SELECT count(*) FROM information_schema.sequences WHERE sequence_name = txtseqc into conteosc;
  IF (conteosc IS NULL)
  THEN
    conteosc=0;
  END IF;
  IF (conteosc>0)
  THEN
    txtdropseqc = 'DROP SEQUENCE sys_tmp.' ||  txtseqc; 
    EXECUTE txtdropseqc;
  END IF; 
txttmp_ant= 'tmp_ant' || txtid;
SELECT count(table_name) FROM information_schema.tables WHERE table_name = txttmp_ant into conteoa;
  IF (conteoa IS NULL)
  THEN
    conteoa=0;
  END IF;
  IF (conteoa>0)
  THEN
    txtdropant = 'DROP TABLE sys_tmp.' ||  txttmp_ant; 
    EXECUTE txtdropant;
  END IF; 
txttmp_estab= 'tmp_estab' || txtid;
SELECT count(table_name) FROM information_schema.tables WHERE table_name = txttmp_estab into conteoe;
  IF (conteoe IS NULL)
  THEN
    conteoe=0;
  END IF;
  IF (conteoe>0)
  THEN
    txtdropest = 'DROP TABLE sys_tmp.' ||  txttmp_estab; 
    EXECUTE txtdropest;
  END IF;
txttmp_persp= 'tmp_persp' || txtid;
SELECT count(table_name) FROM information_schema.tables WHERE table_name = txttmp_persp into conteoc;
  IF (conteoc IS NULL)
  THEN
    conteoc=0;
  END IF;
  IF (conteoc>0)
  THEN
    txtdroppersp = 'DROP TABLE sys_tmp.' ||  txttmp_persp; 
    EXECUTE txtdroppersp;
  END IF;     
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION sys_tmp.drop_tmp_personal(bigint)
  OWNER TO postgres;
