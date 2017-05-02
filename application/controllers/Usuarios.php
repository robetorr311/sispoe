<?php
class Usuarios extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Usuario_model');
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
			$idcontrolador=$this->Controladores_model->get_id('Usuarios');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$data['listado']=$this->Usuario_model->listado();
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Usuarios');
			$this->add_view('usuarios/usuarios_inicial_view',$data);	
		}


	}
	public function nuevo()
	{
		$this->load->model('Usuario_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Asignar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 6,$idsesion);		
		$codigo=$this->Usuario_model->get_id();
		$data['codigo']=$codigo;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Usuarios');
		$this->load->view('usuarios/usuarios_new_view',$data);				
	}		
	public function registro()
	{
		$id=$this->input->post('id');
		$this->load->model('Usuario_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Asignar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 7,$idsesion);		
		$servicio=$this->Usuario_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
				$login=$row->login; 
				$clave=$row->clave;				
            }
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
        	$data['login']=$login; 
			$data['password']=$clave; 
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Usuarios');
		$this->load->view('usuarios/usuarios_reg_view',$data);				
	}
	public function editar()
	{
		$id=$this->input->post('id');
		$this->load->model('Usuario_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Asignar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 8,$idsesion);		
		$servicio=$this->Usuario_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
				$login=$row->login; 
				$clave=$row->clave; 
            }
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
        	$data['login']=$login; 
			$data['password']=$clave; 			
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Usuarios');
		$this->load->view('usuarios/usuarios_edit_view',$data);							
	}	
	public function guardar()
	{
		$this->load->model('Usuario_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Asignar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 16,$idsesion);		
		$codigo=$this->input->post('codigo'); 
		$nombre=$this->input->post('nombre'); 
		$login=$this->input->post('login'); 
		$password=$this->input->post('password'); 
		$this->Usuario_model->iUsuarios($codigo , $nombre,$login,$password,1 );
        	$data['codigo']=$codigo; 
			$data['nombre']=$nombre; 
        	$data['login']=$login; 
			$data['password']=$pasword; 
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Usuarios');
			$this->load->view('usuarios/usuarios_guardado_view',$data);
	}
    public function error_codigo(){
       $this->load->view('usuarios/error_codigo');
    } 
    public function error_nombre(){
       $this->load->view('usuarios/error_nombre');
    } 
    public function error_login(){
       $this->load->view('usuarios/error_login');
    } 
    public function error_password(){
       $this->load->view('usuarios/error_password');
    }     	
}	