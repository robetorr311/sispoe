<?php
class Asignar_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function pendientes()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados order  by id;");
        $salida=$query->result();
        return $salida;         
    }

    public function compruebadosimetro($id)
    {
        if (empty($salida)) { $salida=""; } 
        if (empty($id)) {
            $salida=0;
        }
        else {
          $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where id=$id order  by id;");
        $salida=$query->num_rows();
        }  
        return $salida;     
    }  

    public function listado()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrosasignados order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function vdosimetrospreparados($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where iddocumento=$id order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function vdosimetrosasignados($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrosasignados where iddocumento=$id order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function registro_ind($dosimetro)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where id=$dosimetro order by id;");
        $salida=$query->result();
        return $salida;         
    }        
    public function registro($id)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where id=$id order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function registro_doc($id)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.venvios where id=$id order  by id;");
        $salida=$query->result();
        return $salida;         
    }   
    public function contar_asignados($iddoc)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrosasignados where iddocumento=$iddoc;");   
        $salida=$query->num_rows();  
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
         
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where iddocumento=$iddoc;");   
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
    public function get_idtarjeta($tarjeta)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.tarjetas where codigobarra='$tarjeta';");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->id;
        }        
        return $salida;              
    }      
    public function asignar($iddoc, $hdosimetro , $htarjeta)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.asignar($iddoc, $hdosimetro , $htarjeta);");
        $salida=$query->result();
        return $salida;         
    }             
}
