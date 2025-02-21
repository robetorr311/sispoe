<?php
class Rpersonal_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_auditorias.id_reportepersonal');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    }
    public function fpersonal_general()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select nidpersonal,nnombre,nservicio,nestablecimiento, sys_poe.cedulapersonal(nidpersonal) as cedula,sys_poe.sexopersonal(nidpersonal) as sexo, sys_poe.cargopersonal(nidpersonal) as cargo, sys_poe.direccionpersonal(nidpersonal) as direccion, sys_poe.telefonopersonal(nidpersonal) as telefono from sys_poe.fpersonal_general();");
        $salida=$query->result();
        return $salida;         
    }    
    public function fpersonal_generalp($inicio)
    {
        if (empty($salida)) { $salida=""; } 
        if ($inicio==0){
        $query = $this->db->query("select nidpersonal,nnombre,nservicio,nestablecimiento, sys_poe.cedulapersonal(nidpersonal) as cedula,sys_poe.sexopersonal(nidpersonal) as sexo, sys_poe.cargopersonal(nidpersonal) as cargo, sys_poe.direccionpersonal(nidpersonal) as direccion, sys_poe.telefonopersonal(nidpersonal) as telefono from sys_poe.fpersonal_general() limit 10;");
        }
        else {
            $query = $this->db->query("select nidpersonal,nnombre,nservicio,nestablecimiento, sys_poe.cedulapersonal(nidpersonal) as cedula,sys_poe.sexopersonal(nidpersonal) as sexo, sys_poe.cargopersonal(nidpersonal) as cargo, sys_poe.direccionpersonal(nidpersonal) as direccion, sys_poe.telefonopersonal(nidpersonal) as telefono from sys_poe.fpersonal_general() limit 10 offset $inicio;");            
        }
        $salida=$query->result();
        return $salida;         
    }  
    public function fpersonal_estado_servicios($estado)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select nidpersonal,nnombre,nservicio,nestablecimiento,sys_poe.cedulapersonal(nidpersonal) as cedula,sys_poe.sexopersonal(nidpersonal) as sexo, sys_poe.cargopersonal(nidpersonal) as cargo, sys_poe.direccionpersonal(nidpersonal) as direccion, sys_poe.telefonopersonal(nidpersonal) as telefono from sys_poe.fpersonal_estado_servicios($estado);");
        $salida=$query->result();
        return $salida;         
    }    
    public function fpersonal_estado_serviciosp($inicio,$estado)
    {
        if (empty($salida)) { $salida=""; } 
        if ($inicio==0){
        $query = $this->db->query("select nidpersonal,nnombre,nservicio,nestablecimiento,sys_poe.cedulapersonal(nidpersonal) as cedula,sys_poe.sexopersonal(nidpersonal) as sexo, sys_poe.cargopersonal(nidpersonal) as cargo, sys_poe.direccionpersonal(nidpersonal) as direccion, sys_poe.telefonopersonal(nidpersonal) as telefono from sys_poe.fpersonal_estado_servicios($estado) limit 10;");
        }
        else {
            $query = $this->db->query("select nidpersonal,nnombre,nservicio,nestablecimiento,sys_poe.cedulapersonal(nidpersonal) as cedula,sys_poe.sexopersonal(nidpersonal) as sexo, sys_poe.cargopersonal(nidpersonal) as cargo, sys_poe.direccionpersonal(nidpersonal) as direccion, sys_poe.telefonopersonal(nidpersonal) as telefono from sys_poe.fpersonal_estado_servicios($estado) limit 10 offset $inicio;");            
        }
        $salida=$query->result();
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
    public function ireportepersonal( $id ,$idusuario ,$archivo ,$tam ,$tipo ,$datos ){
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_auditorias.ireportepersonal( $id ,$idusuario ,'$archivo' ,'$tam' ,'$tipo' ,'$datos' );");
        $salida=$query->result();       
    }    
    public function listado_e($estado)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vpersonal where idestado=$estado order by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function listado_p($inicio)
    {
        if (empty($salida)) { $salida=""; } 
        if ($inicio==0){
            $query = $this->db->query("select * from sys_poe.vpersonal order by codigo limit 7;");
        }
        else {
            $query = $this->db->query("select * from sys_poe.vpersonal order by codigo limit 7 offset $inicio;");               
        } 
        $salida=$query->result();
        return $salida;         
    }         
    public function listado_ep($inicio,$estado)
    {
        if (empty($salida)) { $salida=""; } 
        if ($inicio==0){
            $query = $this->db->query("select * from sys_poe.vpersonal where idestado=$estado order by codigo limit 7;");
        }
        else {
            $query = $this->db->query("select * from sys_poe.vpersonal where idestado=$estado  order by codigo limit 7 offset $inicio;");
        }         
        $salida=$query->result();
        return $salida;         
    }
}
?>