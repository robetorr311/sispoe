<?php
class Procesados_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function listado()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vprocesados order  by id;");
        $salida=$query->result();
        return $salida;         
    }
  
}
