<?php
class Menu_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

     public function menuhtml($idusuario,$sistema)
    {
        //$this->load->database(); 
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from comun.menu_html($idusuario,$sistema);");

        foreach ($query->result() as $row)
        {
                $salida=$row->menu_html;
        }        
        return $salida;         
    }
     public function get_boxes($idusuario,$sistema)
    {
        //$this->load->database(); 
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from comun.gadgets_root_html($idusuario, $sistema);");

        foreach ($query->result() as $row)
        {
                $salida=$row->gadgets_root_html;
        }        
        return $salida;         
    }
    public function get_color($controler)
    {
        //$this->load->database(); 
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from comun.get_color('$controler');");

        foreach ($query->result() as $row)
        {
                $salida=$row->get_color;
        }        
        return $salida;         
    } 
    public function get_submenu($idusuario,$hpadre,$sistema)
    {
        //$this->load->database(); 
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from comun.sub_gadgets_html($idusuario, $hpadre, $sistema);");

        foreach ($query->result() as $row)
        {
                $salida=$row->sub_gadgets_html;
        }        
        return $salida;         
    }       
}
