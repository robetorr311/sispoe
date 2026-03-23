<?php
class Cargos extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Cargos_model');
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
			$idcontrolador=$this->Controladores_model->get_id('Cargos');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);
			$data['listado']=$this->Cargos_model->listado();		
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Cargos');
			$this->add_view('cargos/cargo_inicial_view',$data);	
		}			
	}
	public function nuevo()
	{
		$this->load->model('Cargos_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Cargos');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 6,$idsesion);		
		$codigo=$this->Cargos_model->get_id();
		$data['codigo']=$codigo;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Cargos');
		$this->load->view('cargos/cargo_new_view',$data);				
	}		
	public function registro()
	{
		$id=$this->input->post('id');
		$this->load->model('Cargos_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Cargos');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 7,$idsesion);		
		$servicio=$this->Cargos_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
            }
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Cargos');
		$this->load->view('cargos/cargo_reg_view',$data);				
	}
	public function editar()
	{
		$id=$this->input->post('id');
		$this->load->model('Cargos_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Cargos');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 8,$idsesion);		
		$servicio=$this->Cargos_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
            }
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Cargos');
		$this->load->view('cargos/cargo_edit_view',$data);							
	}	
	public function guardar()
	{
		$this->load->model('Cargos_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Cargos');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 16,$idsesion);		
		$codigo=$this->input->post('codigo'); 
		$nombre=$this->input->post('nombre'); 
		$this->Cargos_model->icargos($codigo , $nombre );
        	$data['codigo']=$codigo; 
			$data['nombre']=$nombre; 
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Cargos');
			$this->load->view('cargos/cargo_guardado_view',$data);
	}
    public function error_codigo(){
       $this->load->view('cargos/error_codigo');
    } 
    public function error_nombre(){
       $this->load->view('cargos/error_nombre');
    } 
}	