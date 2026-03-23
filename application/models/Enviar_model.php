<?php
class Enviar_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_poe.cargos_id_seq');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    } 
    public function listado()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.venvios order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function fpersonal_establecimiento($idestablecimiento)
    {       
        $query = $this->db->query("select * from sys_poe.fpersonal_establecimiento($idestablecimiento);");   
        $salida=$query->result();
        return $salida;      
    }    
    public function registro($codigo)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vcargos where id=$codigo order by id;");   
        $salida=$query->result();
        return $salida;         
    }
    public function eliminar($id){
        $this->db->where('id', $id);
        $this->db->delete('sys_poe.Cargos'); 
    }
             
}
