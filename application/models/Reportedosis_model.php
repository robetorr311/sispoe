<?php
class Reportedosis_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_estudio($idestudio)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select nombre from sys_poe.tipo_dosimetro where id=$idestudio;");
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nombre;
        }               
        return $salida;         
    }   
    public function get_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_auditorias.id_reportedosis');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    }     
    public function freportedosis($in_idestablecimiento,$in_servicio,$in_estudio,$in_fechai,$in_fechaf)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.freportedosis($in_idestablecimiento,$in_servicio,$in_estudio,'$in_fechai','$in_fechaf');");
        $salida=$query->result();            
        return $salida;         
    }
    public function ireportedosis( $id ,$idusuario ,$archivo ,$tam ,$tipo ,$datos ){
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_auditorias.ireportedosis( $id ,$idusuario ,'$archivo' ,'$tam' ,'$tipo' ,'$datos' );");
        $salida=$query->result();       
    }
    public function fservicio_establecimiento($idestablecimiento)
    {       
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_poe.fservicios_establecimiento($idestablecimiento);");
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->nidservicio."\">".$row->nservicio."</option>";
            }
        return $salida;                
    }
    public function freportedosis_p($inicio,$in_idestablecimiento,$in_servicio,$in_estudio,$in_fechai,$in_fechaf)
    {
        if (empty($salida)) { $salida=""; }
        if ($inicio==0){
            $query = $this->db->query("select * from sys_poe.freportedosis($in_idestablecimiento,$in_servicio,$in_estudio,'$in_fechai','$in_fechaf') limit 10;");
        }
        else {
            $query = $this->db->query("select * from sys_poe.freportedosis($in_idestablecimiento,$in_servicio,$in_estudio,'$in_fechai','$in_fechaf') limit 10 offset $inicio;");
        }        
        $salida=$query->result();            
        return $salida;         
    }    
    //select * from sys_poe.freportedosis(400,3,2,'01/05/2015','31/05/2015') limit 15 offset 15;          
}
