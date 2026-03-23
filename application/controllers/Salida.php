<?php
class Salida extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->library('session');
		$this->load->model('Usuario_model');
		$this->load->model('Sesion_model');
		$dir_ip=$this->Sesion_model->ObtenerIP();
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$this->Sesion_model->ssesion($idusuario , 1 , $dir_ip,$idsesion);		
		$this->session->sess_destroy();		
		redirect('/Inicio/index/');

	}
}
