<?php
class Procesados extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Procesados_model');
		$data['listado']=$this->Procesados_model->listado();
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Procesados');
		$this->add_view('procesados/procesados_inicial_view',$data);				
	}
	
}	