<?php
class Historialdosimetrico_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_anios($idpersona)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select nanio from sys_poe.fhistorialdosimetrico($idpersona) group by nanio order by nanio DESC;");
        $salida=$query->result();           
        return $salida;         
    }   
    public function get_historial($idpersona,$anio)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fhistorialdosimetrico($idpersona) where nanio=$anio order by nfechai DESC;");   
        $salida=$query->result();  
        return $salida;              
    }          
}
