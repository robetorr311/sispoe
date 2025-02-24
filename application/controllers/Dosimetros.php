<?php
class Dosimetros extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Dosimetros_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		if(empty($idsesion)){
			redirect('/Inicio/index/');
		}
		else {
			$idusuario=$this->Usuario_model->idusuario_login($login);
			$idcontrolador=$this->Controladores_model->get_id('Dosimetros');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$data['listado']=$this->Dosimetros_model->listado();
			$data['tipos']=$this->Dosimetros_model->get_tipo();		
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Dosimetros');
			$this->add_view('dosimetros/dosim_inicial_view',$data);
		}				
	}
	public function nuevo()
	{
		$this->load->model('Dosimetros_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Dosimetros');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 6,$idsesion);		
		$data['estatus']=$this->Dosimetros_model->select_estatus();
		$data['tipos']=$this->Dosimetros_model->get_tipo();		
		$codigo=$this->Dosimetros_model->get_id();
		$data['codigo']=$codigo;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Dosimetros');
		$this->load->view('dosimetros/dosim_new_view',$data);				
	}		
	public function registro()
	{
		$id=$this->input->post('id');
		$this->load->model('Dosimetros_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Dosimetros');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 7,$idsesion);		
		$servicio=$this->Dosimetros_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
				$estatus=$row->estatus; 
				$idtipo=$row->idtipotarjeta;
				$idestatus=$row->idestatus; 
            }
            $tipo=$this->Dosimetros_model->get_nombre($idtipo);
            $opctipo="<option selected value=\"".$idtipo."\">".$tipo."</option>";
            $tipos=$opctipo.$this->Dosimetros_model->get_tipo();
            $opcestatus="<option selected value=\"".$idestatus."\">".$estatus."</option>";
            $estatus=$opcestatus.$this->Dosimetros_model->select_estatus();
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
			$data['estatus']=$estatus;
			$data['tipos']=$tipos;    		
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Dosimetros');
		$this->load->view('dosimetros/dosim_reg_view',$data);				
	}
	public function editar()
	{
		$id=$this->input->post('id');
		$this->load->model('Dosimetros_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Dosimetros');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 8,$idsesion);		
		$servicio=$this->Dosimetros_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
				$estatus=$row->estatus; 
				$idestatus=$row->idestatus;
				$idtipo=$row->idtipotarjeta; 
            }
            $tipo=$this->Dosimetros_model->get_nombre($idtipo);
            $opctipo="<option selected value=\"".$idtipo."\">".$tipo."</option>";
            $tipos=$opctipo.$this->Dosimetros_model->get_tipo();            
            $opcestatus="<option selected value=\"".$idestatus."\">".$estatus."</option>";
            $estatus=$opcestatus.$this->Dosimetros_model->select_estatus();
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
			$data['estatus']=$estatus;
			$data['tipos']=$tipos;    		
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Dosimetros');
		$this->load->view('dosimetros/dosim_edit_view',$data);							
	}	
	public function guardar()
	{
		$this->load->model('Dosimetros_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Dosimetros');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 16,$idsesion);	
		$codigo=$this->input->post('codigo'); 
		$nombre=$this->input->post('nombre'); 
		$estatus=$this->input->post('estatus');
		$tipo=$this->input->post('tipo'); 
		$this->Dosimetros_model->idosimetros($codigo , $nombre , $estatus, $tipo );
            $ntipo=$this->Dosimetros_model->get_nombre($tipo);
            $opctipo="<option selected value=\"".$tipo."\">".$ntipo."</option>";
            $tipos=$opctipo.$this->Dosimetros_model->get_tipo();   		
            $opcestatus="<option selected value=\"".$estatus."\">".$this->Dosimetros_model->nombreestatus($estatus)."</option>";
            $estatus=$opcestatus.$this->Dosimetros_model->select_estatus();
        	$data['codigo']=$codigo; 
			$data['nombre']=$nombre; 
			$data['estatus']=$estatus; 
			$data['tipos']=$tipos;   
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Dosimetros');
			$this->load->view('dosimetros/dosim_guardado_view',$data);
	}
    public function error_codigo(){
       $this->load->view('dosimetros/error_codigo');
    } 
    public function error_nombre(){
       $this->load->view('dosimetros/error_nombre');
    } 

	public function buscartarjeta()
	{
		$this->load->model('Dosimetros_model');		
		$nombre=$this->input->post('nombre');
		$reg=$this->Dosimetros_model->buscartarjeta($nombre);
		if($reg==0){
			$data['reg']=0;
		}			
		else {
			$data['reg']=1;
		}
		$this->load->view('dosimetros/buscartajetas',$data);
	}
	public function buscar_actas()
	{
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$this->load->model('Dosimetros_model');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$nombre=$this->input->post('nombre');
		$documentos=$this->Dosimetros_model->ver_documentos();
      $data['documentos']=$documentos;
		$this->add_view('documento/documento_inicial_view',$data);
	}   
	public function get_dosimetros()
	{
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$this->load->model('Dosimetros_model');
		$this->load->model('Menu_model');
		$id=$this->input->post('id');
		$data['color']=$this->Menu_model->get_color('Generar');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$nombre=$this->input->post('nombre');
		$dosimetros=$this->Dosimetros_model->get_dosimetros($id);
      $data['dosimetros']=$dosimetros;
		$this->load->view('documento/modal_dosimetros',$data);
	} 
	public function anular()
	{
		$this->load->model('Dosimetros_model');
		$id=$this->input->post('id');
		$dosimetros=$this->Dosimetros_model->anular($id);
      $data['mensaje']='Dosimetros seleccionados anulados, tarjetas liberadas';
		$this->load->view('documento/mensaje',$data);
	} }	