<?php
class Restablecimientos_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_auditorias.id_reporteestablecimientos');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    }
    public function fpersonal_establecimiento_servicios($establecimiento)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select nidpersonal,nnombre,nservicio,sys_poe.cedulapersonal(nidpersonal) as cedula,sys_poe.sexopersonal(nidpersonal) as sexo, sys_poe.cargopersonal(nidpersonal) as cargo, sys_poe.direccionpersonal(nidpersonal) as direccion, sys_poe.telefonopersonal(nidpersonal) as telefono from sys_poe.fpersonal_establecimiento_servicios($establecimiento);");
        $salida=$query->result();
        return $salida;         
    }    
    public function fpersonal_establecimiento_serviciosp($inicio,$establecimiento)
    {
        if (empty($salida)) { $salida=""; } 
        if ($inicio==0){
        $query = $this->db->query("select nidpersonal,nnombre,nservicio,sys_poe.cedulapersonal(nidpersonal) as cedula,sys_poe.sexopersonal(nidpersonal) as sexo, sys_poe.cargopersonal(nidpersonal) as cargo, sys_poe.direccionpersonal(nidpersonal) as direccion, sys_poe.telefonopersonal(nidpersonal) as telefono from sys_poe.fpersonal_establecimiento_servicios($establecimiento) limit 10;");
        }
        else {
            $query = $this->db->query("select nidpersonal,nnombre,nservicio,sys_poe.cedulapersonal(nidpersonal) as cedula,sys_poe.sexopersonal(nidpersonal) as sexo, sys_poe.cargopersonal(nidpersonal) as cargo, sys_poe.direccionpersonal(nidpersonal) as direccion, sys_poe.telefonopersonal(nidpersonal) as telefono from sys_poe.fpersonal_establecimiento_servicios($establecimiento) limit 10 offset $inicio;");            
        }
        $salida=$query->result();
        return $salida;         
    }  
    public function ireporteestablecimiento( $id ,$idusuario ,$archivo ,$tam ,$tipo ,$datos ){
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_auditorias.ireporteestablecimiento( $id ,$idusuario ,'$archivo' ,'$tam' ,'$tipo' ,'$datos' );");
        $salida=$query->result();       
    }    
    public function listado_e($estado)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vestablecimientos where idestado=$estado order by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function listado_p($inicio)
    {
        if (empty($salida)) { $salida=""; } 
        if ($inicio==0){
            $query = $this->db->query("select * from sys_poe.vestablecimientos order by id limit 7;");
        }
        else {
            $query = $this->db->query("select * from sys_poe.vestablecimientos order by id limit 7 offset $inicio;");               
        } 
        $salida=$query->result();
        return $salida;         
    }         
    public function listado_ep($inicio,$estado)
    {
        if (empty($salida)) { $salida=""; } 
        if ($inicio==0){
            $query = $this->db->query("select * from sys_poe.vestablecimientos where idestado=$estado order by id limit 7;");
        }
        else {
            $query = $this->db->query("select * from sys_poe.vestablecimientos where idestado=$estado  order by id limit 7 offset $inicio;");
        }         
        $salida=$query->result();
        return $salida;         
    }
}
