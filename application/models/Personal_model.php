<?php
class Personal_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }
    public function get_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.get_id_persona();");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->get_id_persona;
        }        
        return $salida;              
    }
    public function buscacedula($cedula)
    {
        if (empty($salida)) { $salida=""; }    
        $query = $this->db->query("select * from sys_poe.personal where cedula='$cedula' order by id;");
        $salida=$query->num_rows();
        return $salida;         
    }    
    public function get_tmp_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_tmp.tmp_id_seq');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    }
    public function controlcodigo($codigo)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select count(id) from sys_poe.personal where id=$codigo;");
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->count;
        }        
        return $salida;              
    }        
    public function nombrecargo($id)
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
    public function nombrepais($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select nombre from sys_poe.paises where id=$id;");
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nombre;
        }        
        return $salida;              
    }
    public function nombreprofesion($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select nombre from sys_poe.profesion where id=$id;");
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nombre;
        }        
        return $salida;              
    }    
    public function nombrenacionalidad($id)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select nombre from sys_poe.nacionalidad where id=$id;");
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nombre;
        }        
        return $salida;              
    }    
    public function nombreestablecimiento($id)
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

    public function listado()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vpersonal order by codigo;");
        $salida=$query->result();
        return $salida;         
    }
    public function listado_concat()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.fpersonal();");
        $salida=$query->result();
        return $salida;         
    }    
    
    public function ipersonal($id , $nombre , $apellido1 , $apellido2 , $cedula , $telefono , $fechadenacimiento , $sexo , $nombre2 , $pais , $direccion , $correo , $profesion , $especialidad , $nacionalidad , $lugar, $activo )
    {       
        $query = $this->db->query("select * from sys_poe.ipersonal($id , '$nombre' , '$apellido1' , '$apellido2' , '$cedula' , '$telefono' , '$fechadenacimiento' , '$sexo' , '$nombre2' , '$pais' , '$direccion' , '$correo' , '$profesion' , '$especialidad' , '$nacionalidad' , '$lugar', $activo);");   
        $salida=$query->result();      
    }    
    public function registro($codigo)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.vpersonal where codigo=$codigo order by codigo;");   
        $salida=$query->result();
        return $salida;         
    }
    public function antecedentes($codigo)
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.antecedentes where idpersonal=$codigo order by id;");   
        $salida=$query->result();
        return $salida;         
    } 
    public function select_establecimientos()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.establecimientos order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;         
    }       
    public function select_cargos()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_poe.cargos order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;         
    }
    public function select_pais()
    {
        if (empty($salida)) { $salida=""; }          
        $query = $this->db->query("select * from sys_poe.paises order by nombre;"); 
        $salida="<option value=\"232\">Venezuela</option>";  
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->nombre."\">".$row->nombre."</option>";
            }
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
    public function select_nacionalidad()
    {
        if (empty($salida)) { $salida=""; }          
        $query = $this->db->query("select * from sys_poe.nacionalidad order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;         
    }     
    public function select_profesion()
    {
        if (empty($salida)) { $salida=""; }          
        $query = $this->db->query("select * from sys_poe.profesion order by nombre;");   
        foreach ($query->result() as $row)
            {
                $salida.="<option value=\"".$row->id."\">".$row->nombre."</option>";
            }
        return $salida;         
    }      
    public function get_estab($idpersonal){
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_poe.vpersonalestablecimiento where idpersonal=$idpersonal order by idpersonal;");
        $salida=$query->result();
        return $salida;              
    }      
    public function get_tmp_estab($idpersonal){
        if (empty($salida)) { $salida=""; } 
        $tabla='sys_tmp.tmp_estab'.$idpersonal;
         
        $query = $this->db->query("select * from $tabla order by idpersonal;");
        $salida=$query->result();
        return $salida;              
    }      
    public function val_tmp_estab($idpersonal){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_tmp.get_tmp_estab($idpersonal);");
        foreach ($query->result() as $row)
            {
                $salida=$row->get_tmp_estab;
            } 
        return $salida;         
    } 
    public function count_tmp_estab($idpersonal){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select count (idpersonal) from sys_tmp.tmp_estab".$idpersonal.";");
        foreach ($query->result() as $row)
            {
                $salida=$row->count;
            } 
        return $salida;         
    }  
    public function crear_tmp_estab($idpersonal){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_tmp.set_tmp_estab($idpersonal);");
        foreach ($query->result() as $row)
            {
                $salida=$row->set_tmp_estab;
            } 
        return $salida;         
    }   
    public function ins_tmp_estab($idestablecimiento,$idpersonal,$idcargo,$idservicio){
         
        $sql="select * from sys_tmp.itmp_estab($idpersonal, $idestablecimiento,$idservicio,$idcargo);";
        $query = $this->db->query($sql);
        $salida=$query->result();
        return $sql;
    }
    public function del_tmp_estab($idestablecimiento,$codigo){
        $this->db->where('idestablecimiento', $idestablecimiento);
        $this->db->delete('sys_tmp.tmp_estab'.$codigo); 
    } 
    public function e_tmp_estab($id,$codigo){
        $this->db->where('idpersonal', $id);
        $this->db->delete('sys_tmp.tmp_estab'.$codigo); 
    } 
    public function get_ant($idpersonal){
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_poe.antecedentes where idpersonal=$idpersonal order by idpersonal;");
        $salida=$query->result();
        return $salida;              
    }       
    public function get_tmp_ant($idpersonal){
        if (empty($salida)) { $salida=""; } 
        $tabla='sys_tmp.tmp_ant'.$idpersonal;
         
        $query = $this->db->query("select * from $tabla order by idpersonal;");
        $salida=$query->result();
        return $salida;              
    }      
    public function val_tmp_ant($idpersonal){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_tmp.get_tmp_ant($idpersonal);");
        foreach ($query->result() as $row)
            {
                $salida=$row->get_tmp_ant;
            } 
        return $salida;         
    }

    public function count_tmp_ant($idpersonal){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select count (idpersonal) from sys_tmp.tmp_ant".$idpersonal.";");
        foreach ($query->result() as $row)
            {
                $salida=$row->count;
            } 
        return $salida;         
    }  
    public function crear_tmp_ant($idpersonal){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_tmp.set_tmp_ant($idpersonal);");
        foreach ($query->result() as $row)
            {
                $salida=$row->set_tmp_ant;
            } 
        return $salida;         
    }   
    public function ins_tmp_ant($id,$fuma,$frequenciaf,$hemorragias,$manchas,$cansancio,$nauseas,$cabello,$cataratas,$pielroja,$esterilidad,$cambios,$dosimetro,$cancer,$tipocancer,$cronicas,$otros_antecedentes,$idpersonal,$organo,$laboratorio){
        if (empty($frequenciaf)) { $frequenciaf='null'; }
        $sql="select * from sys_tmp.itmp_ant( $id ,'$fuma' ,$frequenciaf ,'$hemorragias' ,'$cansancio' ,'$nauseas' ,'$cabello' ,'$cataratas' ,'$pielroja' ,'$esterilidad' ,'$cambios' ,'$dosimetro' ,'$cancer' ,'$tipocancer' ,'$cronicas' ,'$otros_antecedentes' ,$id ,'$manchas' ,'$organo' ,'$laboratorio' );";
        $query = $this->db->query($sql);
        $salida=$query->result();
        return $sql;       
    }
    public function del_tmp_ant($idpersonal,$codigo){
        $this->db->where('idpersonal', $idpersonal);
        $this->db->delete('sys_tmp.tmp_ant'.$codigo); 
    } 
    public function e_tmp_ant($id,$codigo){
        $this->db->where('idpersonal', $id);
        $this->db->delete('sys_tmp.tmp_ant'.$codigo); 
    }
    public function get_persp($idpersonal){
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_poe.vcargoestablecimiento where idpersonal=$idpersonal order by idpersonal;");
        $salida=$query->result();
        return $salida;              
    }      
    public function get_tmp_persp($idpersonal){
        if (empty($salida)) { $salida=""; } 
        $tabla='sys_tmp.tmp_persp'.$idpersonal;
         
        $query = $this->db->query("select * from $tabla order by idpersonal;");
        $salida=$query->result();
        return $salida;              
    }      
    public function val_tmp_persp($idpersonal){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_tmp.get_tmp_persp($idpersonal);");
        foreach ($query->result() as $row)
            {
                $salida=$row->get_tmp_persp;
            } 
        return $salida;         
    } 
    public function count_tmp_persp($idpersonal){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select count (idpersonal) from sys_tmp.tmp_persp".$idpersonal.";");
        foreach ($query->result() as $row)
            {
                $salida=$row->count;
            } 
        return $salida;         
    }  
    public function crear_tmp_persp($idpersonal){
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from sys_tmp.set_tmp_persp($idpersonal);");
        foreach ($query->result() as $row)
            {
                $salida=$row->set_tmp_persp;
            } 
        return $salida;         
    }   
    public function ins_tmp_persp($idpersonal ,  $idestablecimiento ,  $idcargo, $idservicio ){

        $sql="select * from sys_tmp.itmp_persp($idpersonal , $idestablecimiento , $idcargo, $idservicio );";
        $query = $this->db->query($sql);
        $salida=$query->result();
        return $sql;
    }
    public function del_tmp_perspe($idestablecimiento,$codigo){
        $this->db->where('idestablecimiento', $idestablecimiento);
        $this->db->delete('sys_tmp.tmp_persp'.$codigo); 
    }      
    public function del_tmp_persp($idtemp,$codigo){
        $this->db->where('id', $idtemp);
        $this->db->delete('sys_tmp.tmp_persp'.$codigo); 
    }
    public function drop_tmp_persp($codigo){
        $sql="select * from sys_tmp.drop_tmp_persp($codigo);";
        $query = $this->db->query($sql);
    } 
    public function drop_tmp_estab($codigo){
        $sql="select * from sys_tmp.drop_tmp_estab($codigo);";
        $query = $this->db->query($sql);
    } 
    public function drop_tmp_ant($codigo){
        $sql="select * from sys_tmp.drop_tmp_ant($codigo);";
        $query = $this->db->query($sql);
    }     
}
