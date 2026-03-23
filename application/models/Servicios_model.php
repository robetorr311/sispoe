<?php
class Servicios_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_poe.servicios_id_seq');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    }
    public function nombreserv($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select nombre from sys_poe.servicios where id=$id;");
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nombre;
        }        
        return $salida;              
    }     
    public function listado()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vservicios where hpadre is not null order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function iservicios($id , $nombre , $hpadre )
    {       
        $query = $this->db->query("select * from sys_poe.iservicios($id , '$nombre' , $hpadre);");   
        $salida=$query->result();      
    }    
    public function registro($codigo)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vservicios where id=$codigo order by id;");   
        $salida=$query->result();
        return $salida;         
    }
    public function eliminar($id){
        $this->db->where('id', $id);
        $this->db->delete('sys_poe.servicios'); 
    }
    public function select_padres()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.servicios where hpadre is null order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;         
    }               
}
