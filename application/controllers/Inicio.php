<?php
class Inicio extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->library('session');
		$logged_in = $this->session->userdata('logged_in');
		if ($logged_in == TRUE)
		{
		     redirect('/Inicio/menu');
		}
		else {		
			$this->load->view('login');
		}
	}
	public function acceso()
	{
		$this->load->library('session');
		$this->load->model('Usuario_model');
		$this->load->model('Menu_model');
		$this->load->model('Sesion_model');
		$dir_ip=$this->Sesion_model->ObtenerIP();
		$idsesion=$this->Sesion_model->get_id();
		$login=$this->input->post('login'); 
		$password=$this->input->post('password'); 		
		$r=$this->Usuario_model->login($login,$password);
		if($r>0){
			$newdata = array('username'  => $login,
							 'idsesion'	=> $idsesion,	
							 'logged_in' => TRUE
							 );
			$this->session->set_userdata($newdata);
			$idusuario=$this->Usuario_model->idusuario_login($login);
			$this->Sesion_model->esesion($idusuario , 1 , $dir_ip,$idsesion);
			redirect('/Inicio/menu/');
		}
		else {
		    redirect('/Inicio/index/');
		}		

	}	
	public function menu(){
		$this->add_view('contenido');
	}
	public function submenu(){
		$hpadre=$this->input->post('hpadre');
		$this->load->model('Menu_model');
		$this->load->model('Usuario_model');
		$login= $this->session->userdata('username');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$data['submenu']=$this->Menu_model->get_submenu($idusuario,$hpadre,1);
		$this->load->view('submenu',$data);
	}	
}
