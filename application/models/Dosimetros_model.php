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
    public function buscartarjeta($nombre)
    {
        if (empty($salida)) { $salida=""; }    
        $query = $this->db->query("select * from sys_poe.tarjetas where codigobarra='$nombre' order by id;");
        $salida=$query->num_rows();
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
    public function idosimetros($id , $nombre , $estatus, $tipo )
    {       
        $sinceros=ltrim($nombre,'0');
        $query = $this->db->query("select * from sys_poe.itarjetas($id , '$nombre' , $estatus,'$sinceros', $tipo);");   
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
    public function get_tipo()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.tipo_dosimetro;");   
        //$salida=$query->result();
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;              
    }
    public function get_nombre($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.tipo_dosimetro where id=$id;");   
        //$salida=$query->result();
        foreach ($query->result() as $row)
            {
                $salida=$row->nombre;
            }
        return $salida;              
    }
    public function registro_doc($id)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.vactas where id=$id order  by id;");
        $salida=$query->result();
        return $salida;         
    } 
    public function vdosimetros($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetros where iddocumento=$id order  by id;");
        $salida=$query->result();
        return $salida;         
    }  
    public function contar_asignados($iddoc)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetros where iddocumento=$iddoc;");   
        $salida=$query->num_rows();  
        return $salida;               
    }
    public function listado_doc()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdocu order  by iddocumento;");
        $salida=$query->result();
        return $salida;         
    }
}
