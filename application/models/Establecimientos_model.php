<?php
class Establecimientos_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_poe.establecimiento_id_seq');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    }
    public function get_nombre($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select nombre from sys_poe.establecimientos where id=$id;");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nombre;
        }        
        return $salida;              
    }
    public function get_estado($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select estado from sys_poe.vestablecimientos where id=$id;");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->estado;
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
         
        $query = $this->db->query("select * from sys_poe.vestablecimientos order by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function personal_serv($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fpersonal_establecimiento_servicios($id)");
        $salida=$query->result();
        return $salida;         
    }    
    public function personal($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fpersonal_establecimiento($id)");
        $salida=$query->result();
        return $salida;         
    }
    public function tablaservicios($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fservicios_establecimiento($id)");
        $salida=$query->result();
        return $salida;         
    }
    public function fservicios($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fservicios_establecimiento($id)");
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->nidservicio."\">".$row->nservicio."</option>";
            }
        return $salida;                
    }             
    public function iestablecimientos($id , $nombre , $direccion , $director , $idestado , $idmunicipio , $idparroquia , $telefono , $correo, $rif )
    {       
        $query = $this->db->query("select * from sys_poe.iestablecimientos($id , '$nombre' , '$direccion' , '$director' , $idestado , $idmunicipio , $idparroquia , '$telefono' , '$correo', '$rif' );");   
        $salida=$query->result();      
    }    
    public function registro($codigo)
    {
        if (empty($salida)) { $salida=""; }          
        $query = $this->db->query("select * from sys_poe.vestablecimientos where id=$codigo order by id;");   
        $salida=$query->result();
        return $salida;         
    }
    public function select_servicios()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.servicios order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;         
    }
    public function get_practica($idestablecimiento){
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_poe.vserviciosestablecimiento where idestablecimiento=$idestablecimiento order by idpractica;");
        $salida=$query->result();
        return $salida;              
    }      
    public function get_tmppractica($idestablecimiento){
        if (empty($salida)) { $salida=""; } 
        $tabla='sys_tmp.tmp_pract'.$idestablecimiento;
         
        $query = $this->db->query("select * from $tabla order by idpractica;");
        $salida=$query->result();
        return $salida;              
    }      
    public function val_tmppractica($idestablecimiento){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_tmp.get_tmp_pract($idestablecimiento);");
        foreach ($query->result() as $row)
            {
                $salida=$row->get_tmp_pract;
            } 
        return $salida;         
    } 
    public function count_tmppractica($idestablecimiento){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select count (idpractica) from sys_tmp.tmp_pract".$idestablecimiento.";");
        foreach ($query->result() as $row)
            {
                $salida=$row->count;
            } 
        return $salida;         
    }  
    public function crear_tmppractica($idestablecimiento){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_tmp.set_tmp_pract($idestablecimiento);");
        foreach ($query->result() as $row)
            {
                $salida=$row->set_tmp_pract;
            } 
        return $salida;         
    }   
    public function ins_tmp_practica($idpractica,$practica,$idestablecimiento){
         
        $data = array(
                'idpractica' => $idpractica,
                'practica' => $practica,
                'idestablecimiento' => $idestablecimiento
        );
        $this->db->insert('sys_tmp.tmp_pract'.$idestablecimiento, $data);
    }
    public function del_tmp_practica($idpractica,$codigo){
        $this->db->where('idpractica', $idpractica);
        $this->db->delete('sys_tmp.tmp_pract'.$codigo); 
    } 
    public function eliminar($id,$codigo){
        $this->db->where('idpractica', $id);
        $this->db->delete('sys_tmp.tmp_pract'.$codigo); 
    }     

}
