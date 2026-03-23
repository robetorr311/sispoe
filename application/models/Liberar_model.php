<?php
class Liberar_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function liberar($tarjeta)
    {
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_poe.liberar_tarjeta('$tarjeta');");
        $salida=$query->result();  
        return $salida;     
    }        
}
