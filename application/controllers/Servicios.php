<?php
class Servicios extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Servicios_model');
		$data['listado']=$this->Servicios_model->listado();		
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Servicios');
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
			$idcontrolador=$this->Controladores_model->get_id('Servicios');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$this->add_view('servicios/serv_inicial_view',$data);	
		}
				
	}
	public function nuevo()
	{
		$this->load->model('Servicios_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Servicios');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 6,$idsesion);		
		$data['padres']=$this->Servicios_model->select_padres();		
		$codigo=$this->Servicios_model->get_id();
		$data['codigo']=$codigo;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Servicios');
		$this->load->view('servicios/serv_new_view',$data);				
	}		
	public function registro()
	{
		$id=$this->input->post('id');
		$this->load->model('Servicios_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Servicios');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 7,$idsesion);		
		$servicio=$this->Servicios_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
				$padre=$row->padre; 
				$hpadre=$row->hpadre; 
            }
            $opcpadre="<option selected value=\"".$hpadre."\">".$padre."</option>";
            $padres=$opcpadre.$this->Servicios_model->select_padres();
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
			$data['padres']=$padres;    		
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Servicios');
		$this->load->view('servicios/serv_reg_view',$data);				
	}
	public function editar()
	{
		$id=$this->input->post('id');
		$this->load->model('Servicios_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Servicios');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 8,$idsesion);		
		$servicio=$this->Servicios_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
				$padre=$row->padre; 
				$hpadre=$row->hpadre; 
            }
            $opcpadre="<option selected value=\"".$hpadre."\">".$padre."</option>";
            $padres=$opcpadre.$this->Servicios_model->select_padres();
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
			$data['padres']=$padres;    		
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Servicios');
		$this->load->view('servicios/serv_edit_view',$data);							
	}	
	public function guardar()
	{
		$this->load->model('Servicios_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Servicios');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 16,$idsesion);	
		$codigo=$this->input->post('codigo'); 
		$nombre=$this->input->post('nombre'); 
		$padre=$this->input->post('padres'); 

		$this->Servicios_model->iservicios($codigo , $nombre , $padre );
            $opcpadre="<option selected value=\"".$padre."\">".$this->Servicios_model->nombreserv($padre)."</option>";
            $padres=$opcpadre.$this->Servicios_model->select_padres();
        	$data['codigo']=$codigo; 
			$data['nombre']=$nombre; 
			$data['padres']=$padres;   
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Servicios');
			$this->load->view('servicios/serv_guardado_view',$data);
	}
    public function error_codigo(){
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Servicios');
       $this->load->view('servicios/error_codigo');
    } 
    public function error_nombre(){
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Servicios');
       $this->load->view('servicios/error_nombre');
    } 
}	