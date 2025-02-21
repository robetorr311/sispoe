<?php
class Lecturas_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function listado()
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.archivos order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function descarga($id){
            $download="./assets/download/";
            $this->db->select('*');
            $this->db->from('sys_poe.archivos');            
            $this->db->where('id', $id); 
            $consulta = $this->db->get();
            if($consulta->num_rows() > 0)
            {
                foreach ($consulta->result_array() as $registro)
                {
                    $archivo=$registro['archivo'];
                    $tipo=$registro['tipo'];
                    $size=$registro['size'];
                    $data=$registro['archivo'];
                }
            }
            $rutacompleta=$download.$archivo;
            if (file_exists($rutacompleta)) {
                unlink($download.$archivo);
            }                       
            $data=pg_unescape_bytea($data);
            $i=fopen($rutacompleta, 'x+') or die ("imposible crear archivo\n");
            fwrite($i, $data) or die ("imposible escribir contenido de la imagen\n");
            fclose($i);
            return $rutacompleta;
    }    
    public function iarchivos($id,  $nombre,  $size,  $tipo,  $archivo)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.iarchivos($id,'$nombre' , '$size' , '$tipo' , '$archivo');");
        $salida=$query->result();
        return $salida;         
    }
    public function get_lecturas($archivo)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vlecturasdosimetro where archivo='$archivo' order by hpersonal;");
        $salida=$query->result();  
        return $salida;     
    }        
    public function ilecturas($hdosimetro , $hpersonal , $fecha , $dosis , $iddocumento, $archivo )
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.ilecturas($hdosimetro , $hpersonal , '$fecha' , $dosis , $iddocumento, '$archivo' );");
        $salida=$query->result();       
    }
    public function registro($iddosimetro)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.dosimetropersona where idtarjeta=$iddosimetro and estatus=14 order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function comprueba($tarjeta)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.compruebarecibidos('$tarjeta');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->compruebarecibidos;
        }        
        return $salida;              
    }     
    public function get_idtarjeta($tarjeta)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.tarjetas where sinceros='$tarjeta';");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->id;
        }        
        return $salida;              
    }
    public function get_idarchivo()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_poe.archivos_id_seq');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    }
    public function get_dosimetro($id)
    {
        $query = $this->db->query("SELECT sys_poe.dosimetropersona.id as iddosimetro, sys_poe.dosimetropersona.idpersona as idpersona, sys_poe.dosimetropersona.idtarjeta as idtarjeta, sys_poe.establecimientonombre(sys_poe.dosimetropersona.idestablecimiento) as establecimiento, sys_poe.personalnombre(sys_poe.dosimetropersona.idpersona) as nombrepersona, sys_poe.servicionombre(sys_poe.dosimetropersona.idservicio) as servicio, sys_poe.tipodosimetronombre(sys_poe.dosimetropersona.idtipodosimetro) as tipo, sys_poe.codigotatjera(sys_poe.dosimetropersona.idtarjeta) as tarjeta FROM  sys_poe.dosimetropersona WHERE sys_poe.dosimetropersona.id=$id ORDER BY sys_poe.dosimetropersona.id;");   
        return $query->result();              
    }
    public function get_lectura($id)
    {
        $query = $this->db->query("SELECT sys_poe.dosimetropersona.id as iddosimetro, sys_poe.lecturas.dosis as dosis FROM  sys_poe.dosimetropersona, sys_poe.lecturas WHERE sys_poe.dosimetropersona.id = sys_poe.lecturas.iddosimetro AND sys_poe.dosimetropersona.id=$id ORDER BY sys_poe.dosimetropersona.id;");   
        return $query->result();              
    }
    public function ilecturas_new($dosimetro,$idtarjeta,$idpersonal,$dosis){ 
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.ilecturas_new($dosimetro , $idtarjeta , $idpersonal , $dosis );");
        $salida=$query->result();
        return "select * from sys_poe.ilecturas_new($dosimetro , $idtarjeta , $idpersonal , $dosis );";          
    }
 
}
