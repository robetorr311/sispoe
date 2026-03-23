<?php
class Electuras extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Dosimetros_model');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Electuras');
		$this->add_view('electuras/electuras_inicial_view',$data);				
	}
	public function modal_electuras(){
		$this->load->model('Lecturas_model');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Electuras');		
        $codigo=$this->input->get('codigo');
        $dosimetros=$this->Lecturas_model->get_dosimetro($codigo);
        foreach($dosimetros as $row):
        	$data['idtarjeta']=$row->idtarjeta;
        	$data['nombrepersona']=$row->nombrepersona;
        	$data['idpersona']=$row->idpersona;
        	$data['establecimiento']=$row->establecimiento;
        	$data['servicio']=$row->servicio;
        	$data['tarjeta']=$row->tarjeta;
        	$data['tipo']=$row->tipo;
        endforeach;
        $dosis=$this->Lecturas_model->get_lectura($codigo);
        if(!empty($dosis)):
        foreach($dosis as $row2):
        	$data['dosis']=$row->dosis;
        endforeach;
        else:
        	$data['dosis']="0.0";
        endif;
        $data['codigo']=$codigo;
        $this->load->view('electuras/modal_dosimetro',$data);	
	}
	public function guardar(){
		$this->load->model('Lecturas_model');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Electuras');		
        $dosimetro=$this->input->post('dosimetro');
        $idtarjeta=$this->input->post('idtarjeta');
        $idpersonal=$this->input->post('idpersonal');
        $dosis=$this->input->post('dosis'); 
        $salida=$this->Lecturas_model->ilecturas_new($dosimetro,$idtarjeta,$idpersonal,$dosis);
        $data['Success']='Success';
        echo $salida;
    }	
}	