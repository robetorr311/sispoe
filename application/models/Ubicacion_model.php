<?php
class Ubicacion_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

    public function select_estados()
    {
        if (empty($salida)) { $salida=""; } 
        //$this->load->database(); 
        $query = $this->db->query("select * from comun.estados order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;         
    }
    public function select_servicio($idservicio)
    {
        if (empty($salida)) { $salida=""; } 
        //$this->load->database(); 
        $query = $this->db->query("select * from sys_poe.servicios where id=$idservicio order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida=$row->nombre;
            }
        return $salida;         
    }       
    public function select_municipios($idestado)
    {
        if (empty($salida)) { $salida=""; } 
        //$this->load->database(); 
        $query = $this->db->query("select * from comun.municipios where idestado=$idestado order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;         
    }    
    public function select_parroquias($idmunicipio)
    {
        if (empty($salida)) { $salida=""; } 
        //$this->load->database(); 
        $query = $this->db->query("select * from comun.parroquias where idmunicipio=$idmunicipio order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;         
    }
    public function estado($id)
    {
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from comun.estados where id=$id order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida=$row->nombre;
            }
        return $salida;         
    }    
    public function parroquia($id)
    {
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from comun.parroquias where id=$id order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida=$row->nombre;
            }
        return $salida;         
    }         
    public function municipio($id)
    {
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from comun.municipios where id=$id order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida=$row->nombre;
            }
        return $salida;         
    }  
}
