<?php
class Accesos extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Accesos');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);
		$data['listado']=$this->Usuario_model->listado();
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Accesos');
		$this->add_view('accesos/acceso_inicial_view',$data);
	}

}	