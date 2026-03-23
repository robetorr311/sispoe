<?php
class Generar_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_poe.documento_id_seq');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    }     
    public function get_establecimientos()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vestablecimientod order by establecimiento;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->establecimiento."</option>";
            }
        return $salida;         
    }
    public function select_establecimiento($estado)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fgrupo_establecimiento_estado($estado);");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->nid."\">".$row->nnombre."</option>";
            }
        return $salida;         
    }         
    public function select_estudio()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.tipotarjeta_tarjetas order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;         
    } 
    public function validardtodos( $fechai , $fechaf, $tipo)
    {
        if (empty($salida)) { $salida=""; }  
        $query = $this->db->query("select * from sys_poe.validardtodos($tipo,'$fechai','$fechaf');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->validardtodos;
        }        
        return $salida;              
    }  
    public function validargenerados_e($idestado , $fechai , $fechaf, $tipo)
    {
        if (empty($salida)) { $salida=""; }  
        $query = $this->db->query("select * from sys_poe.validargenerados_e($idestado,$tipo,'$fechai','$fechaf');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->validargenerados_e;
        }        
        return $salida;              
    }           
    public function validargenerados($idestablecimiento , $fechai , $fechaf, $tipo)
    {
        if (empty($salida)) { $salida=""; }  
        $query = $this->db->query("select * from sys_poe.validargenerados($idestablecimiento,$tipo,'$fechai','$fechaf');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->validargenerados;
        }        
        return $salida;              
    }
    public function validargeneradosxserv($idestablecimiento , $fechai , $fechaf, $tipo, $servicio)
    {
        if (empty($salida)) { $salida=""; }  
        $query = $this->db->query("select * from sys_poe.validargenerados_s($idestablecimiento,$tipo,'$fechai','$fechaf',$servicio);");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->validargenerados;
        }        
        return $salida;              
    }       
    public function generarxestado($estado,$idtipodocumento , $fechai , $fechaf, $tipo ,$idusuario )
    {
        if (empty($salida)) { $salida=""; }  
        $query = $this->db->query("select * from sys_poe.generarxestado($estado,$idtipodocumento , '$fechai' , '$fechaf', $tipo ,$idusuario );");   
        $salida=$query->result();          
    }     
    public function generar($idtipodocumento , $fechai , $fechaf, $tipo ,$idusuario )
    {
        if (empty($salida)) { $salida=""; }  
        $query = $this->db->query("select * from sys_poe.generar($idtipodocumento , '$fechai' , '$fechaf', $tipo ,$idusuario );");   
        $salida=$query->result();           
    }
    public function generar_est_s($idestablecimiento , $idtipodocumento , $fechai , $fechaf, $tipo ,$idusuario,$idservicio )
    {
        if (empty($salida)) { $salida=""; }  
        $query = $this->db->query("select * from sys_poe.generar_est_s($idtipodocumento ,$idestablecimiento, '$fechai' , '$fechaf', $tipo ,$idusuario, $idservicio );");   
        $salida=$query->result();
    }
    public function generar_est($idestablecimiento , $idtipodocumento , $fechai , $fechaf, $tipo ,$idusuario )
    {
        if (empty($salida)) { $salida=""; }  
        $query = $this->db->query("select * from sys_poe.generar_est($idtipodocumento, $idestablecimiento ,  '$fechai' , '$fechaf', $tipo ,$idusuario );");   
        $salida=$query->result();           
    }

    public function get_tipogenerado($iddoc)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vpreparados where id=$iddoc order  by id;");
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->idtipogenerado;
        }        
        return $salida;         
    }
    public function listado()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vpreparados order  by id;");
        $salida=$query->result();
        return $salida;         
    }
    public function contar_tarjetas_e($id,$ide)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where iddocumento=$id and idestablecimiento=$ide order  by id;");
         $salida=$query->num_rows();
        return $salida;         
    }    
    public function anular_generados($iddoc)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.anular_generados($iddoc);");
        $salida=$query->result();     
    }        
    public function contar_tarjetas($id)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where iddocumento=$id order  by id;");
         $salida=$query->num_rows();
        return $salida;         
    }
    public function tarjetas_inicial($id)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where iddocumento=$id order  by id limit 5;");
        $salida=$query->result();
        return $salida;         
    }
    public function tarjetas_pag($inicio,$id)
    {
        if (empty($salida)) { $salida=""; }        
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where iddocumento=$id order  by id offset $inicio limit 5;");
        $salida=$query->result();
        return $salida;         
    }
    public function count_tarjetas($id)
    {
        if (empty($salida)) { $salida=""; }    
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where iddocumento=$id order  by id;");
        $salida=$query->num_rows();
        return $salida;         
    }
    public function all_tarjetas($id,$idestablecimiento)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where iddocumento=$id and idestablecimiento=$idestablecimiento order by id;");
        $salida=$query->result();
        return $salida;         
    }           
    public function tarjetas($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where iddocumento=$id order by servicio;");
        $salida=$query->result();
        return $salida;         
    }
    public function vgdosimetrospersona($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vgdosimetrospersona where iddocumento=$id;");
        $salida=$query->result();
        return $salida;         
    }           
    public function fpersonal_establecimiento($idestablecimiento)
    {       
        $query = $this->db->query("select * from sys_poe.fpersonal_establecimiento($idestablecimiento);");   
        $salida=$query->result();
        return $salida;      
    }
    public function festado_establecimiento($idestado)
    {       
        $query = $this->db->query("select * from sys_poe.festado_establecimiento($idestado);");   
        $salida=$query->result();
        return $salida;      
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
    public function fpersonal_establecimiento_s($idestablecimiento,$servicio)
    {       
        $query = $this->db->query("select * from sys_poe.fpersonal_establecimiento_s($idestablecimiento,$servicio);");   
        $salida=$query->result();
        return $salida;      
    } 
    public function cestado_establecimiento($idestado)
    {       
        $query = $this->db->query("select * from sys_poe.festado_establecimiento($idestado);");   
        $salida=$query->num_rows();
        return $salida;      
    }       
    public function cpersonal_establecimiento($idestablecimiento)
    {       
        $query = $this->db->query("select * from sys_poe.fpersonal_establecimiento($idestablecimiento);");   
        $salida=$query->num_rows();
        return $salida;      
    }    
    public function cpersonal_establecimiento_s($idestablecimiento,$idservicio)
    {       
        $query = $this->db->query("select * from sys_poe.fpersonal_establecimiento_s($idestablecimiento,$idservicio);");   
        $salida=$query->num_rows();
        return $salida;      
    }      
    public function registro($codigo)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vcargos where id=$codigo order by id;");   
        $salida=$query->result();
        return $salida;         
    }
    public function eliminar($id){
        $this->db->where('id', $id);
        $this->db->delete('sys_poe.Cargos'); 
    }
    public function paginado($iddocumento,$idestablecimiento,$inicio)
    {
        if (empty($salida)) { $salida=""; }     
        $query = $this->db->query("select * from sys_poe.vdosimetrospreparados where iddocumento=$iddocumento and idestablecimiento=$idestablecimiento limit 5 offset $inicio;");   
        $salida=$query->result();
        return $salida;         
    }    
             
}
