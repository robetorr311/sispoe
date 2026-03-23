<?php
class Recepcion_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_iddocumento($iddosimetro)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select iddocumento from sys_poe.dosimetropersona where id=$iddosimetro;");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->iddocumento;
        }        
        return $salida;              
    }     
    public function pendientes()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrosasignados order  by id;");
        $salida=$query->result();
        return $salida;         
    }    
    public function listado()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrosrecibidos order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function get_estatus($dosimetro)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select estatus from sys_poe.dosimetropersona where id=$dosimetro;");
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->estatus;
        }               
        return $salida;         
    }     
    public function get_id($tarjeta)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrosasignados where tarjeta='$tarjeta' order  by id;");
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->id;
        }               
        return $salida;         
    }    
    public function vdosimetrosasignados($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrosasignados where iddocumento=$id order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function registro_ind($id)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.vdosimetrosrecibidos where id=$id order  by id;");
        $salida=$query->result();
        return $salida;         
    }    
    public function drecibido($id)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.vdosimetrosrecibidos where id=$id order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function registro($id)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.vdosimetrosasignados where id=$id order  by id;");
        $salida=$query->result();
        return $salida;         
    }    
    public function contar_preparados($iddoc)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.dosimetropersona where iddocumento=$iddoc;");   
        $salida=$query->num_rows();  
        return $salida;               
    }    
    public function contar_pendientes($iddoc)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrosasignados where iddocumento=$iddoc;");   
        $salida=$query->num_rows();  
        return $salida;               
    }             
    public function compruebatarjeta($tarjeta)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.compruebatarjeta('$tarjeta');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->compruebatarjeta;
        }        
        return $salida;               
    }
    public function get_idtarjeta($dosimetro, $documento)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select idtarjeta from sys_poe.dosimetropersona where id=$dosimetro and iddocumento=$documento;");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->idtarjeta;
        }        
        return $salida;              
    }      
    public function recibir($iddoc, $hdosimetro , $htarjeta)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.recibir($iddoc, $hdosimetro , $htarjeta);");
        $salida=$query->result();
        return $salida;         
    }             
}
