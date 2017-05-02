<?php
class Dosimetros_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_poe.tarjeta_id_seq');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    }
    public function nombreestatus($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select nombre from sys_poe.estatus where id=$id;");
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
         
        $query = $this->db->query("select * from sys_poe.vtarjetas order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function fenviados_recibidos()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fenviados_recibidos();");
        $salida=$query->result();
        return $salida;         
    }
    public function fglecturas()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fglecturas();");
        $salida=$query->result();
        return $salida;         
    }    
    public function select_estatus()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.estatus where idtipoestatus=3 order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;         
    }    
    public function idosimetros($id , $nombre , $estatus )
    {       
        $query = $this->db->query("select * from sys_poe.itarjetas($id , '$nombre' , $estatus);");   
        $salida=$query->result();      
    }    
    public function registro($codigo)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vtarjetas where id=$codigo order by id;");   
        $salida=$query->result();
        return $salida;         
    }
    public function eliminar($id){
        $this->db->where('id', $id);
        $this->db->delete('sys_poe.tarjetas'); 
    }
             
}
