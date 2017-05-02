<?php
class MY_Controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	function add_view($view, $data = array())
	{
		//$this->load->library('session');
		$this->load->model('Usuario_model');
		$this->load->model('Menu_model');
		$this->load->model('Gruposedadsexo_model');
		$this->load->model('Dosimetros_model');				
		$logged_in = $this->session->userdata('logged_in');
		if ($logged_in == TRUE)
		{
			$login= $this->session->userdata('username');
			$idusuario=$this->Usuario_model->idusuario_login($login);
			$data['idusuario']=$idusuario;
			$data['boxes']=$this->Menu_model->get_boxes($idusuario,1);
			$data['menuhtml']=$this->Menu_model->menuhtml($idusuario,1);
			$idmf=$this->Gruposedadsexo_model->get_id();
			if (empty($mascfem)) { $mascfem=''; }
			if (empty($enviados)) { $enviados=''; }
			if (empty($recibidos)) { $recibidos=''; }			
			$tablamf=$this->Gruposedadsexo_model->sex_general($idmf);
			foreach ($tablamf as $registromf):
				$cantidad=$registromf->ncantidad;
				$mascfem.=$cantidad.',';
			endforeach;
			$data['mascfem']=$mascfem;
			$tablaer=$this->Dosimetros_model->fenviados_recibidos();
			foreach ($tablaer as $registroer):
				$env=$registroer->nenviados;
				$rec=$registroer->nrecibidos;
				$enviados.=$env.',';
				$recibidos.=$rec.',';
			endforeach;
			$data['enviados']=$enviados;
			$data['recibidos']=$recibidos;						
	    	$data['contenido']=$this->load->view($view,$data,true);	
			$this->load->view('admin_lte',$data);
		}
		else {		
			$this->load->view('login');
		}
		
	}
}
?>
