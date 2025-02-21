<?php
class Glecturas extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Dosimetros_model');
		if(empty($lecturas)) { $lecturas=''; }
		$tablaer=$this->Dosimetros_model->fglecturas();
			foreach ($tablaer as $registroer):
				$lect=$registroer->nlecturas;
				$lecturas.=$lect.',';
			endforeach;
			$data['lecturas']=$lecturas;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Envrecib');
		$this->add_view('glecturas/glecturas_inicial_view',$data);				
	}
	
}	