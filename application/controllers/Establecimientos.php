<?php
class Establecimientos extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');
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
			$idcontrolador=$this->Controladores_model->get_id('Establecimientos');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$data['estados']=$this->Ubicacion_model->select_estados();
			$data['servicios']=$this->Establecimientos_model->select_servicios();
			$data['listado']=$this->Establecimientos_model->listado();
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Establecimientos');
			$this->add_view('establecimientos/estab_inicial_view',$data);
		}			
	}
	public function personal()
	{
		$id=$this->input->get('id');
		$this->load->model('Establecimientos_model');
		$data['personal']=$this->Establecimientos_model->personal_serv($id);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Establecimientos');
		$this->load->view('establecimientos/personal',$data);				
	}	
	public function municipios()
	{
		$estados=$this->input->post('id');
		$this->load->model('Ubicacion_model');
		$data['municipios']=$this->Ubicacion_model->select_municipios($estados);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Establecimientos');
		$this->load->view('municipios',$data);				
	}
	public function servicios()
	{
		$this->load->model('Establecimientos_model');
		$idpractica=$this->input->post('id');
		$nombre=$this->input->post('nombre');
		$codigo=$this->input->post('codigo');
		$data['idestablecimiento']=$codigo;
		$this->Establecimientos_model->ins_tmp_practica($idpractica,$nombre,$codigo);
		$data['tmppractica']=$this->Establecimientos_model->get_tmppractica($codigo);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Establecimientos');
		$this->load->view('establecimientos/tablaserv',$data);				
	}
	public function bservicios()
	{
		$this->load->model('Establecimientos_model');
		$idpractica=$this->input->post('id');
		$nombre=$this->input->post('nombre');
		$codigo=$this->input->post('codigo');
		$data['idestablecimiento']=$codigo;
		$this->Establecimientos_model->eliminar($idpractica,$codigo);
		$data['tmppractica']=$this->Establecimientos_model->get_tmppractica($codigo);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Establecimientos');
		$this->load->view('establecimientos/tablaserv',$data);				
	}		
	public function parroquias()
	{
		$municipios=$this->input->post('id');
		$this->load->model('Ubicacion_model');
		$data['parroquias']=$this->Ubicacion_model->select_parroquias($municipios);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Establecimientos');
		$this->load->view('parroquias',$data);				
	}
	public function nuevo()
	{
		$municipios=$this->input->post('id');
		$this->load->model('Establecimientos_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Establecimientos');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 6,$idsesion);		
		$codigo=$this->Establecimientos_model->get_id();
		$data['codigo']=$codigo;
		$reg=$this->Establecimientos_model->val_tmppractica($codigo);
		if($reg==0){
			$v=$this->Establecimientos_model->crear_tmppractica($codigo);
		}
		$data['servicios']=$this->Establecimientos_model->select_servicios();		
		$this->load->model('Ubicacion_model');
		$data['estados']=$this->Ubicacion_model->select_estados();		
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Establecimientos');
		$this->load->view('establecimientos/estab_new_view',$data);				
	}		
	public function registro()
	{
		$id=$this->input->post('id');
		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Establecimientos');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 7,$idsesion);				
		$data['servicios']=$this->Establecimientos_model->select_servicios();
		$establecimiento=$this->Establecimientos_model->registro($id);
        foreach ($establecimiento as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
				$direccion=$row->direccion; 
				$correo=$row->correo; 
				$telefono=$row->telefono; 
				$idestado=$row->idestado; 
				$idmunicipio=$row->idmunicipio; 
				$idparroquia=$row->idparroquia; 
				$estado=$row->estado; 
				$municipio=$row->municipio; 
				$parroquia=$row->parroquia; 
				$director=$row->director; 
				$rif=$row->rif;
            }
            $opcestado="<option selected value=\"".$idestado."\">".$estado."</option>";
            $estados=$opcestado.$this->Ubicacion_model->select_estados();
            $opcmunicipio="<option selected value=\"".$idmunicipio."\">".$municipio."</option>";
            $municipios=$opcmunicipio.$this->Ubicacion_model->select_municipios($idestado);
            $opcparroquia="<option selected value=\"".$idparroquia."\">".$parroquia."</option>";
            $parroquias=$opcparroquia.$this->Ubicacion_model->select_parroquias($idmunicipio);
            $data['tmppractica']=$this->Establecimientos_model->get_practica($codigo);
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
			$data['direccion']=$direccion; 
			$data['correo']=$correo; 
			$data['telefono']=$telefono; 
			$data['idestado']=$idestado; 
			$data['idmunicipio']=$idmunicipio; 
			$data['idparroquia']=$idparroquia; 
			$data['estados']=$estados; 
			$data['municipios']=$municipios; 
			$data['parroquias']=$parroquias; 
			$data['director']=$director;     		
			$data['rif']=$rif;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Establecimientos');
		$this->load->view('establecimientos/estab_reg_view',$data);				
	}
	public function editar()
	{
		$id=$this->input->post('id');
		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Establecimientos');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 8,$idsesion);
		$data['servicios']=$this->Establecimientos_model->select_servicios();
		$establecimiento=$this->Establecimientos_model->registro($id);
        foreach ($establecimiento as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
				$direccion=$row->direccion; 
				$correo=$row->correo; 
				$telefono=$row->telefono; 
				$idestado=$row->idestado; 
				$idmunicipio=$row->idmunicipio; 
				$idparroquia=$row->idparroquia; 
				$estado=$row->estado; 
				$municipio=$row->municipio; 
				$parroquia=$row->parroquia; 
				$director=$row->director; 
				$rif=$row->rif; 
            }
			$reg=$this->Establecimientos_model->val_tmppractica($id);
			if($reg==0){
				$v=$this->Establecimientos_model->crear_tmppractica($id);
			}
			$tabla=$this->Establecimientos_model->get_practica($id); 
			foreach ($tabla as $row){
				$this->Establecimientos_model->ins_tmp_practica($row->idpractica,$row->practica,$id);
			}
			$data['tmppractica']=$this->Establecimientos_model->get_tmppractica($id);
			$opcestado="<option selected value=\"".$idestado."\">".$estado."</option>";
            $estados=$opcestado.$this->Ubicacion_model->select_estados();
            $opcmunicipio="<option selected value=\"".$idmunicipio."\">".$municipio."</option>";
            $municipios=$opcmunicipio.$this->Ubicacion_model->select_municipios($idestado);
            $opcparroquia="<option selected value=\"".$idparroquia."\">".$parroquia."</option>";
            $parroquias=$opcparroquia.$this->Ubicacion_model->select_parroquias($idmunicipio);
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
			$data['direccion']=$direccion; 
			$data['correo']=$correo; 
			$data['telefono']=$telefono; 
			$data['idestado']=$idestado; 
			$data['idmunicipio']=$idmunicipio; 
			$data['idparroquia']=$idparroquia; 
			$data['estados']=$estados; 
			$data['municipios']=$municipios; 
			$data['parroquias']=$parroquias; 
			$data['director']=$director;     		
			$data['rif']=$rif;     		
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Establecimientos');
		$this->load->view('establecimientos/estab_edit_view',$data);							
	}	
	public function guardar()
	{
		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Establecimientos');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 16,$idsesion);				
		$codigo=$this->input->post('codigo'); 
		$nombre=$this->input->post('nombre'); 
		$direccion=$this->input->post('direccion'); 
		$correo=$this->input->post('correo'); 
		$telefono=$this->input->post('telefono'); 
		$estado=$this->input->post('estados'); 
		$municipio=$this->input->post('municipios'); 
		$parroquia=$this->input->post('parroquias'); 
		$director=$this->input->post('director');
		$rif=$this->input->post('rif');
		$this->Establecimientos_model->iestablecimientos($codigo , $nombre , $direccion , $director , $estado , $municipio , $parroquia , $telefono , $correo, $rif );
			$estados=$this->Ubicacion_model->estado($estado);
			$municipios=$this->Ubicacion_model->municipio($municipio);
			$parroquias=$this->Ubicacion_model->parroquia($parroquia);
			$opcestado="<option selected value=\"".$estado."\">".$estados."</option>";
            $estados=$opcestado.$this->Ubicacion_model->select_estados();
            $opcmunicipio="<option selected value=\"".$municipio."\">".$municipios."</option>";
            $municipios=$opcmunicipio.$this->Ubicacion_model->select_municipios($estado);
            $opcparroquia="<option selected value=\"".$parroquia."\">".$parroquias."</option>";
            $parroquias=$opcparroquia.$this->Ubicacion_model->select_parroquias($municipio);			
			$data['codigo']=$codigo; 
			$data['nombre']=$nombre; 
			$data['direccion']=$direccion; 
			$data['correo']=$correo; 
			$data['telefono']=$telefono; 
			$data['estados']=$estados; 
			$data['municipios']=$municipios; 
			$data['parroquias']=$parroquias; 
			$data['director']=$director;
			$data['rif']=$rif;
			$data['servicios']=$this->Establecimientos_model->select_servicios();		
			$data['tmppractica']=$this->Establecimientos_model->get_practica($codigo);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Establecimientos');
			$this->load->view('establecimientos/estab_guardado_view',$data);
	}
	public function chkselect($value)
	{
		if ($value == 0) {
			return false;
		} 
		else {
			return true;
		}			
	}
	public function chkpractica($codigo)
	{
		$this->load->model('Establecimientos_model');		
		$reg=$this->Establecimientos_model->val_tmppractica($codigo);
		if($reg==0){
			return true;
		}			
		else {
			$conteo=$this->Establecimientos_model->count_tmppractica($codigo);
			if ($conteo>0) {
				return true;
			}
			else {
				return false;
			}
		}
	}
    public function tablatemporal(){
    	$codigo=$this->input->post('id');
		$this->load->model('Establecimientos_model');
		$reg=$this->Establecimientos_model->val_tmppractica($codigo);
		if($reg==0){
			$data['reg']=0;
		}				
		else {
			$data['reg']=$this->Establecimientos_model->count_tmppractica($codigo);    	 
       	}
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Establecimientos');
       	$this->load->view('establecimientos/error_tablatemporal',$data);
    } 	
    public function error_codigo(){
       $this->load->view('establecimientos/error_codigo');
    } 
    public function error_nombre(){
       $this->load->view('establecimientos/error_nombre');
    } 
    public function error_direccion(){
       $this->load->view('establecimientos/error_direccion');
    } 
    public function error_correo(){
      $this->load->view('establecimientos/error_correo');
    } 
    public function error_telefono(){
      $this->load->view('establecimientos/error_telefono');
    } 
     public function error_rif(){
       $this->load->view('establecimientos/error_rif');
    }   
    public function error_director(){
       $this->load->view('establecimientos/error_director');
    }       
    public function error_estados(){
		$this->load->model('Ubicacion_model');
		$data['estados']=$this->Ubicacion_model->select_estados(); 	
       $this->load->view('establecimientos/error_estados',$data);
    } 
    public function error_municipios(){
      $this->load->view('establecimientos/error_municipios');
    } 
    public function error_parroquias(){
       $this->load->view('establecimientos/error_parroquias');
    } 
    public function error_servicios(){
		$this->load->model('Establecimientos_model');
		$data['servicios']=$this->Establecimientos_model->select_servicios();    	
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Establecimientos');
       	$this->load->view('establecimientos/error_servicios',$data);
    } 	
}	