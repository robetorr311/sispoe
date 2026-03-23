<?php
class Controladores_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_id($nombre)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select id from comun.controladores where nombre='$nombre';");
        foreach ($query->result() as $row)
        {
                $salida=$row->id;
        }        
        return $salida;            
    }

}
?>