<?php
class Genviadosestado_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function preparados_enviados_estados($fechai,$fechaf)
    {
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_poe.preparados_enviados_estados('$fechai','$fechaf');");   
        $salida=$query->result();                
    } 
    public function listado()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_tmp.tmp_generados_enviados_estado;");
        $salida=$query->result();
        return $salida;         
    }
}
