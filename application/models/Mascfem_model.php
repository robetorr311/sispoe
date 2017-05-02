<?php
class Mascfem_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_tmp.tmp_preval');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    } 
    public function sex_general()
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.fmascfem_general(1);");
        $salida=$query->result();
        return $salida;         
    }       
    public function gresex_general($id)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.fprevalencia_general($id);");
        $salida=$query->result();
        return $salida;         
    }
    public function gresex_cargo($id,$cargo)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.fprevalencia_general_cargo($id,$cargo);");
        $salida=$query->result();
        return $salida;         
    } 
    public function gresex_estado($id,$estado)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.fprevalencia_general_estado($id,$estado);");
        $salida=$query->result();
        return $salida;         
    }
    public function gresex_establecimiento_servicio($id,$establecimiento,$servicio)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.fprevalencia_general_establecimiento_servicio($id,$establecimiento,$servicio);");
        $salida=$query->result();
        return $salida;         
    }    
    public function gresex_estado_servicio($id,$estado,$servicio)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.fprevalencia_general_estado_servicio($id,$estado,$servicio);");
        $salida=$query->result();
        return $salida;         
    }     
    public function gresex_establecimiento_cargo($id,$establecimiento,$cargo)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.fprevalencia_general_establecimiento_cargo($id,$establecimiento,$cargo);");
        $salida=$query->result();
        return $salida;         
    }    
    public function gresex_estado_cargo($id,$estado,$cargo)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.fprevalencia_general_estado_cargo($id,$estado,$cargo);");
        $salida=$query->result();
        return $salida;         
    }    
    public function gresex_establecimiento($id,$establecimiento)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.fprevalencia_general_establecimiento($id,$establecimiento);");
        $salida=$query->result();
        return $salida;         
    }
    public function gresex_servicio($id,$servicio)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.fprevalencia_general_servicio($id,$servicio);");
        $salida=$query->result();
        return $salida;         
    }                   
    public function select_cargo_estadof($estado)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fcargos_estado($estado);");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->nidcargo."\">".$row->ncargo."</option>";
            }
        return $salida;         
    } 
    public function select_cargo_estabf($establecimiento)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fcargos_establecimiento($establecimiento);");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->nidcargo."\">".$row->ncargo."</option>";
            }
        return $salida;         
    } 
    public function select_fservicios_estado($estado)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fservicios_estado($estado);");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->nidservicio."\">".$row->nservicio."</option>";
            }
        return $salida;         
    }
}
