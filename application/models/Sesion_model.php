<?php
class Sesion_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

    public function get_id()
    {
        if (empty($salida)) { $salida=""; } 
         
        $query = $this->db->query("select * from nextval('sys_auditorias.sesion_id_seq');");   
        $salida=$query->result();
        foreach ($query->result() as $row)
        {
                $salida=$row->nextval;
        }        
        return $salida;              
    }    
    public function ObtenerIP()
    {
       $ip = "";
       if(isset($_SERVER))
       {
           if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
           {
               $ip=$_SERVER['HTTP_CLIENT_IP'];
            }
            elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else
            {
                $ip=$_SERVER['REMOTE_ADDR'];
            }
       }
       else
       {
            if ( getenv( 'HTTP_CLIENT_IP' ) )
            {
                $ip = getenv( 'HTTP_CLIENT_IP' );
            }
            elseif( getenv( 'HTTP_X_FORWARDED_FOR' ) )
            {
                $ip = getenv( 'HTTP_X_FORWARDED_FOR' );
            }
            else
            {
                $ip = getenv( 'REMOTE_ADDR' );
            }
       }  
        // En algunos casos muy raros la ip es devuelta repetida dos veces separada por coma 
       if(strstr($ip,','))
       {
            $ip = array_shift(explode(',',$ip));
       }
       return $ip;
    }
    public function esesion($idusuario , $idsistema , $ip,$idsesion)
    {
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_auditorias.esesion($idusuario ,$idsistema ,'$ip',$idsesion);");
    $salida=$query->result();           
    }
    public function ssesion($idusuario , $idsistema , $ip, $idsesion)
    {
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_auditorias.ssesion($idusuario ,$idsistema ,'$ip',$idsesion);");
    $salida=$query->result();           
    }
    public function actividad($idcontrolador,$idusuario , $idsistema , $actividad,$idsesion)
    {
        if (empty($salida)) { $salida=""; } 
        $query = $this->db->query("select * from sys_auditorias.actividad($idcontrolador , $idsistema,
    $idusuario,
    $actividad,$idsesion);");
    $salida=$query->result();           
    }        

}
