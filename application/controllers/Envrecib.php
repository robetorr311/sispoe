<?php
class Envrecib extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Dosimetros_model');
		if(empty($enviados)) { $enviados=''; }
		if(empty($recibidos)) { $recibidos=''; }
		$tablaer=$this->Dosimetros_model->fenviados_recibidos();
			foreach ($tablaer as $registroer):
				$env=$registroer->nenviados;
				$rec=$registroer->nrecibidos;
				$enviados.=$env.',';
				$recibidos.=$rec.',';
			endforeach;
			$data['enviados']=$enviados;
			$data['recibidos']=$recibidos;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Envrecib');
		$this->add_view('envrecib/envrecib_inicial_view',$data);				
	}
	
}	