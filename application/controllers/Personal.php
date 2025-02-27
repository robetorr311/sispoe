<?php
class Personal extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Personal_model');
		$data['listado']=$this->Personal_model->listado();
		$this->load->model('Menu_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');		
		if(empty($idsesion)){
			redirect('/Inicio/index/');
		}
		else {
			$this->load->model('Usuario_model');
			$this->load->library('session');
			$idusuario=$this->Usuario_model->idusuario_login($login);
			$idcontrolador=$this->Controladores_model->get_id('Personal');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$data['color']=$this->Menu_model->get_color('Personal');
			$this->add_view('personal/perso_inicial_view',$data);		
		}		
	}
	public function antecedentes()
	{
		$this->load->model('Personal_model');
		$codigo=$this->input->get('id');
		$form=$this->input->get('form');
		switch($form){
			case 1:
				$data['disabled']='disabled';
				break;
			case 2:
				$data['disabled']='';
				$data['codigo']=$codigo;
				$rega=$this->Personal_model->val_tmp_ant($codigo);
				if($rega==0){
					$va=$this->Personal_model->crear_tmp_ant($codigo);
				}
				else {
					$vdata=$this->Personal_model->count_tmp_ant($codigo);
					if ($vdata>0) {
						$personal=$this->Personal_model->get_tmp_ant($codigo);
						foreach ($personal as $row)
						{
							$fuma=$row->fuma; 
							$cuantos=$row->frequenciaf; 
							$hemorragias=$row->hemorragias; 
							$manchas=$row->manchas; 
							$cansancio=$row->cansancio; 
							$nauseas=$row->nauseas; 
							$cabello=$row->cabello; 
							$cataratas=$row->cataratas; 
							$pielroja=$row->pielroja; 
							$esterilidad=$row->esterilidad; 
							$cambios=$row->cambios; 
							$dosimetro=$row->dosimetro; 
							$cancer=$row->cancer; 
							$tipocancer=$row->tipocancer; 
							$cronicas=$row->cronicas; 
							$laborales=$row->otros_antecedentes;
							$organo=$row->organo;	
							$laboratorio=$row->laboratorio;				
						}
					}
					else {
						if(empty($fuma)) { $fuma=""; } 
						if(empty($cuantos)) { $cuantos=""; } 
						if(empty($hemorragias)) { $hemorragias=""; } 
						if(empty($manchas)) { $manchas=""; } 
						if(empty($cansancio)) { $cansancio=""; } 
						if(empty($nauseas)) { $nauseas=""; } 
						if(empty($cabello)) { $cabello=""; } 
						if(empty($cataratas)) { $cataratas=""; } 
						if(empty($pielroja)) { $pielroja=""; } 
						if(empty($esterilidad)) { $esterilidad=""; } 
						if(empty($cambios)) { $cambios=""; } 
						if(empty($dosimetro)) { $dosimetro=""; } 
						if(empty($cancer)) { $cancer=""; } 
						if(empty($tipocancer)) { $tipocancer=""; } 
						if(empty($cronicas)) { $cronicas=""; } 
						if(empty($laborales)) { $laborales=""; }	
						if(empty($organo)) { $organo=""; }		
						if(empty($laboratorio)) { $laboratorio=""; }
					}
					$data['fuma']=$fuma; 
					$data['cuantos']=$cuantos; 
					$data['hemorragias']=$hemorragias; 
					$data['manchas']=$manchas; 
					$data['cansancio']=$cansancio; 
					$data['nauseas']=$nauseas; 
					$data['cabello']=$cabello; 
					$data['cataratas']=$cataratas; 
					$data['pielroja']=$pielroja; 
					$data['esterilidad']=$esterilidad; 
					$data['cambios']=$cambios; 
					$data['dosimetro']=$dosimetro; 
					$data['cancer']=$cancer; 
					$data['tipocancer']=$tipocancer; 
					$data['cronicas']=$cronicas; 
					$data['laborales']=$laborales;	
					$data['organo']=$organo;								
					$data['laboratorio']=$laboratorio;
				}				
				break;
			case 3:
				$data['disabled']='disabled';
				$data['codigo']=$codigo;
				$personal=$this->Personal_model->registro($codigo);
				foreach ($personal as $row)
				{
					$codigo=$row->codigo;
					$fuma=$row->fuma; 
					$cuantos=$row->frequenciaf; 
					$hemorragias=$row->hemorragias; 
					$manchas=$row->manchas; 
					$cansancio=$row->cansancio; 
					$nauseas=$row->nauseas; 
					$cabello=$row->cabello; 
					$cataratas=$row->cataratas; 
					$pielroja=$row->pielroja; 
					$esterilidad=$row->esterilidad; 
					$cambios=$row->cambios; 
					$dosimetro=$row->dosimetro; 
					$cancer=$row->cancer; 
					$tipocancer=$row->tipocancer; 
					$cronicas=$row->cronicas; 
					$laborales=$row->otros_antecedentes;
					$organo=$row->organo;	
					$laboratorio=$row->laboratorio;				
				} 
				$data['codigo']=$codigo;
				$data['fuma']=$fuma; 
				$data['cuantos']=$cuantos; 
				$data['hemorragias']=$hemorragias; 
				$data['manchas']=$manchas; 
				$data['cansancio']=$cansancio; 
				$data['nauseas']=$nauseas; 
				$data['cabello']=$cabello; 
				$data['cataratas']=$cataratas; 
				$data['pielroja']=$pielroja; 
				$data['esterilidad']=$esterilidad; 
				$data['cambios']=$cambios; 
				$data['dosimetro']=$dosimetro; 
				$data['cancer']=$cancer; 
				$data['tipocancer']=$tipocancer; 
				$data['cronicas']=$cronicas; 
				$data['laborales']=$laborales;	
				$data['organo']=$organo;								
				$data['laboratorio']=$laboratorio;								
				break;
			case 4:
				$data['codigo']=$codigo;
				$personal=$this->Personal_model->get_tmp_ant($codigo);	
				$rega=$this->Personal_model->val_tmp_ant($codigo);
				if($rega==0){
					$va=$this->Personal_model->crear_tmp_ant($codigo);
				}
				foreach ($personal as $row)
				{
					$codigo=$row->id;
					$fuma=$row->fuma; 
					$cuantos=$row->frequenciaf; 
					$hemorragias=$row->hemorragias; 
					$manchas=$row->manchas; 
					$cansancio=$row->cansancio; 
					$nauseas=$row->nauseas; 
					$cabello=$row->cabello; 
					$cataratas=$row->cataratas; 
					$pielroja=$row->pielroja; 
					$esterilidad=$row->esterilidad; 
					$cambios=$row->cambios; 
					$dosimetro=$row->dosimetro; 
					$cancer=$row->cancer; 
					$tipocancer=$row->tipocancer; 
					$cronicas=$row->cronicas; 
					$laborales=$row->otros_antecedentes;
					$organo=$row->organo;					
					$laboratorio=$row->laboratorio;
				}
				$data['codigo']=$codigo;
				$data['fuma']=$fuma; 
				$data['cuantos']=$cuantos; 
				$data['hemorragias']=$hemorragias; 
				$data['manchas']=$manchas; 
				$data['cansancio']=$cansancio; 
				$data['nauseas']=$nauseas; 
				$data['cabello']=$cabello; 
				$data['cataratas']=$cataratas; 
				$data['pielroja']=$pielroja; 
				$data['esterilidad']=$esterilidad; 
				$data['cambios']=$cambios; 
				$data['dosimetro']=$dosimetro; 
				$data['cancer']=$cancer; 
				$data['tipocancer']=$tipocancer; 
				$data['cronicas']=$cronicas; 
				$data['laborales']=$laborales;				
				$data['organo']=$organo;
				$data['laboratorio']=$laboratorio;								
				break;
		}
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('personal/modal_antecedentes',$data);				
	}
	public function gantecedentes()
	{
		$this->load->model('Personal_model');	
		$codigo=$this->input->get('codigo');
		$hemorragias=$this->input->get('hemorragias');
		$manchas=$this->input->get('manchas');
		$cansancio=$this->input->get('cansancio');
		$nauseas=$this->input->get('nauseas');
		$cabello=$this->input->get('cabello');
		$cataratas=$this->input->get('cataratas');
		$pielroja=$this->input->get('pielroja');
		$esterilidad=$this->input->get('esterilidad');
		$cambios=$this->input->get('cambios');
		$fuma=$this->input->get('fuma');
		$cuantos=$this->input->get('cuantos');
		$cancer=$this->input->get('cancer');
		$dosimetro=$this->input->get('dosimetro');
		$laborales=$this->input->get('laborales');
		$cronicas=$this->input->get('cronicas');
		$tipocancer=$this->input->get('tipocancer');
		$organo=$this->input->get('organo');
		$laboratorio=$this->input->get('laboratorio');
		if($hemorragias=='on'){ $hemorragias='SI'; }
		if($manchas=='on'){ $manchas='SI'; }
		if($cansancio=='on'){ $cansancio='SI'; }
		if($nauseas=='on'){ $nauseas='SI'; }
		if($cabello=='on'){ $cabello='SI'; }
		if($cataratas=='on'){ $cataratas='SI'; }
		if($pielroja=='on'){ $pielroja='SI'; }
		if($esterilidad=='on'){ $esterilidad='SI'; }
		if($cambios=='on'){ $cambios='SI'; }
		if($hemorragias==''){ $hemorragias='NO'; }
		if($manchas==''){ $manchas='NO'; }
		if($cansancio==''){ $cansancio='NO'; }
		if($nauseas==''){ $nauseas='NO'; }
		if($cabello==''){ $cabello='NO'; }
		if($cataratas==''){ $cataratas='NO'; }
		if($pielroja==''){ $pielroja='NO'; }
		if($esterilidad==''){ $esterilidad='NO'; }
		if($cambios==''){ $cambios='NO'; }				
		$sql=$this->Personal_model->ins_tmp_ant($codigo,$fuma,$cuantos,$hemorragias,$manchas,$cansancio,$nauseas,$cabello,$cataratas,$pielroja,$esterilidad,$cambios,$dosimetro,$cancer,$tipocancer,$cronicas,$laborales,$codigo,$organo,$laboratorio);
			$data['codigo']=$codigo;
			$data['hemorragias']=$hemorragias;
			$data['manchas']=$manchas;
			$data['cansancio']=$cansancio;
			$data['nauseas']=$nauseas;
			$data['cabello']=$cabello;
			$data['cataratas']=$cataratas;
			$data['pielroja']=$pielroja;	
			$data['esterilidad']=$esterilidad;
			$data['cambios']=$cambios;
			$data['fuma']=$fuma;
			$data['cuantos']=$cuantos;
			$data['cancer']=$cancer;
			$data['dosimetro']=$dosimetro;
			$data['laborales']=$laborales;
			$data['cronicas']=$cronicas;
			$data['tipocancer']=$tipocancer;
			$data['organo']=$organo;
			$data['laboratorio']=$laboratorio;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('personal/antecedentes',$data);
	}	
	public function gestablecimiento()
	{
		$this->load->model('Personal_model');
		$this->load->model('Establecimientos_model');	
		$codigo=$this->input->post('codigo');
		$idestablecimiento=$this->input->post('idestablecimiento');
		$idservicio=$this->input->post('idservicio');
		$idcargo=$this->input->post('idcargo');
		$sql=$this->Personal_model->ins_tmp_estab($idestablecimiento,$codigo,$idcargo,$idservicio);
		$data['codigo']=$codigo;
		$data['tmpestable']=$this->Personal_model->get_tmp_estab($codigo);
		$data['tmppersp']=$this->Personal_model->get_tmp_persp($codigo);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
			$this->load->view('personal/tablaestablecimientos',$data);
	}
	public function bestablecimientos()
	{
		$this->load->model('Personal_model');
		$establecimiento=$this->input->post('establecimiento');
		$codigo=$this->input->post('codigo');
		$data['codigo']=$codigo;
		$this->Personal_model->del_tmp_estab($establecimiento,$codigo);
		$this->Personal_model->del_tmp_perspe($establecimiento,$codigo);
		$data['tmpestable']=$this->Personal_model->get_tmp_estab($codigo);
		$data['tmppersp']=$this->Personal_model->get_tmp_persp($codigo);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('personal/tablaestablecimientos',$data);				
	}
	public function bcargo()
	{
		$this->load->model('Personal_model');
		$idtemp=$this->input->post('idtemp');
		$codigo=$this->input->post('codigo');
		$idestablecimiento=$this->input->post('establecimiento');		
		$data['codigo']=$codigo;
		$this->Personal_model->del_tmp_persp($idtemp,$codigo);
		$data['tmpestable']=$this->Personal_model->get_tmp_estab($codigo);		
		$data['tmppersp']=$this->Personal_model->get_tmp_persp($codigo);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('personal/tablaestablecimientos',$data);			
	}
	public function fservicios()
	{
		$id=$this->input->post('id');
		$this->load->model('Establecimientos_model');
		$data['servicios']=$this->Establecimientos_model->fservicios($id);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('personal/fservicios',$data);				
	}		
	public function sservicios()
	{
		$id=$this->input->post('id');
		$this->load->model('Establecimientos_model');
		$data['tablaservicios']=$this->Establecimientos_model->tablaservicios($id);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('personal/sservicios',$data);				
	}					
	public function parroquias()
	{
		$municipios=$this->input->post('id');
		$this->load->model('Ubicacion_model');
		$data['parroquias']=$this->Ubicacion_model->select_parroquias($municipios);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('parroquias',$data);				
	}
	public function nuevo()
	{
		$this->load->model('Personal_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Personal');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 6,$idsesion);		
		$codigo=$this->Personal_model->get_id();
		$data['codigo']=$codigo;
		$paises=$this->Personal_model->select_pais();
		$data['paises']=$paises;
		$nacionalidad=$this->Personal_model->select_nacionalidad();
		$data['nacionalidad']=$nacionalidad;
		$establecimientos=$this->Personal_model->select_establecimientos();
		$data['establecimientos']=$establecimientos;
		$servicios=$this->Personal_model->select_servicios();
		$data['servicios']=$servicios;
		$cargos=$this->Personal_model->select_cargos();
		$data['cargos']=$cargos;				
		$rega=$this->Personal_model->val_tmp_ant($codigo);
		if($rega==0){
			$va=$this->Personal_model->crear_tmp_ant($codigo);
		}
		$rege=$this->Personal_model->val_tmp_estab($codigo);
		if($rege==0){
			$ve=$this->Personal_model->crear_tmp_estab($codigo);
		}
		$regp=$this->Personal_model->val_tmp_persp($codigo);
		if($regp==0){
			$vp=$this->Personal_model->crear_tmp_persp($codigo);
		}						
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('personal/perso_new_view',$data);				
	}		
	public function registro()
	{
		$id=$this->input->post('id');
		$this->load->model('Personal_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Personal');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 7,$idsesion);		
		$personal=$this->Personal_model->registro($id);
		foreach ($personal as $row)
			{
				$codigo=$row->codigo;
				$pnombre=$row->nombre;
				$papellido=$row->apellido1; 
				$sapellido=$row->apellido2; 
				$cedula=$row->cedula; 
				$telefono=$row->telefono; 
				$fecha=$row->fechadenacimiento; 
				$sexo=$row->sexo; 
				$snombre=$row->nombre2; 
				$pais=$row->pais; 
				$direccion=$row->direccion; 
				$correo=$row->correo; 
				$profesion=$row->profesion; 
				$especialidad=$row->especialidad; 
				$nacionalidad=$row->nacionalidad; 
				$lugar=$row->lugar; 
				$fuma=$row->fuma; 
				$cuantos=$row->frequenciaf; 
				$hemorragias=$row->hemorragias; 
				$manchas=$row->manchas; 
				$cansancio=$row->cansancio; 
				$nauseas=$row->nauseas; 
				$cabello=$row->cabello; 
				$cataratas=$row->cataratas; 
				$pielroja=$row->pielroja; 
				$esterilidad=$row->esterilidad; 
				$cambios=$row->cambios; 
				$dosimetro=$row->dosimetro; 
				$cancer=$row->cancer; 
				$tipocancer=$row->tipocancer; 
				$cronicas=$row->cronicas; 
				$organo=$row->organo; 
				$laboratorio=$row->laboratorio;
				$laborales=$row->otros_antecedentes;
				$estatus = $row->estatus;
			}
				$fec=explode('-',$fecha);
				if(strlen($fec[0])==4){
					if($fec[0]=='1900'){
					  $fecha='';
					}
					else {
					  $fecha=$fec[2].'-'.$fec[1].'-'.$fec[0];
					}
				}
				else {
				  if($fecha=='01-01-1900') { $fecha=''; }
				}
			$opcpaises="<option selected value=\"".$pais."\">".$pais."</option>";
			$paises=$opcpaises.$this->Personal_model->select_pais();
			$establecimientos=$this->Personal_model->select_establecimientos();
			$data['establecimientos']=$establecimientos;
			$servicios=$this->Personal_model->select_servicios();
			$data['servicios']=$servicios;
			$cargos=$this->Personal_model->select_cargos();
			$data['cargos']=$cargos;			
			$data['tmpestable']=$this->Personal_model->get_estab($codigo);		
			$data['tmppersp']=$this->Personal_model->get_persp($codigo);	      
			$data['codigo']=$codigo;
			$data['pnombre']=$pnombre;
			$data['papellido']=$papellido; 
			$data['sapellido']=$sapellido; 
			$data['cedula']=$cedula; 
			$data['telefono']=$telefono; 
			$data['fecha']=$fecha; 
			$data['sexo']=$sexo; 
			$data['snombre']=$snombre; 
			$data['paises']=$paises; 
			$data['direccion']=$direccion; 
			$data['correo']=$correo; 
			$data['profesion']=$profesion; 
			$data['especialidad']=$especialidad; 
			$data['nacionalidad']=$nacionalidad; 
			$data['lugar']=$lugar; 
			$data['fuma']=$fuma; 
			$data['cuantos']=$cuantos; 
			$data['hemorragias']=$hemorragias; 
			$data['manchas']=$manchas; 
			$data['cansancio']=$cansancio; 
			$data['nauseas']=$nauseas; 
			$data['cabello']=$cabello; 
			$data['cataratas']=$cataratas; 
			$data['pielroja']=$pielroja; 
			$data['esterilidad']=$esterilidad; 
			$data['cambios']=$cambios; 
			$data['dosimetro']=$dosimetro; 
			$data['cancer']=$cancer; 
			$data['tipocancer']=$tipocancer; 
			$data['cronicas']=$cronicas; 
			$data['laborales']=$laborales;    		
			$data['organo']=$organo; 
			$data['laboratorio']=$laboratorio; 
			$data['estatus']=$estatus;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('personal/perso_reg_view',$data);				
	}
	public function editar()
	{
		$id=$this->input->post('id');
		$this->load->model('Personal_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Personal');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 8,$idsesion);		
		$personal=$this->Personal_model->registro($id);
		foreach ($personal as $row)
			{
				$codigo=$row->codigo;
				$pnombre=$row->nombre;
				$papellido=$row->apellido1; 
				$sapellido=$row->apellido2; 
				$cedula=$row->cedula; 
				$telefono=$row->telefono; 
				$fecha=$row->fechadenacimiento; 
				$sexo=$row->sexo; 
				$snombre=$row->nombre2; 
				$pais=$row->pais; 
				$direccion=$row->direccion; 
				$correo=$row->correo; 
				$profesion=$row->profesion; 
				$especialidad=$row->especialidad; 
				$nacionalidad=$row->nacionalidad; 
				$lugar=$row->lugar; 
				$fuma=$row->fuma; 
				$cuantos=$row->frequenciaf; 
				$hemorragias=$row->hemorragias; 
				$manchas=$row->manchas; 
				$cansancio=$row->cansancio; 
				$nauseas=$row->nauseas; 
				$cabello=$row->cabello; 
				$cataratas=$row->cataratas; 
				$pielroja=$row->pielroja; 
				$esterilidad=$row->esterilidad; 
				$cambios=$row->cambios; 
				$dosimetro=$row->dosimetro; 
				$cancer=$row->cancer; 
				$tipocancer=$row->tipocancer; 
				$cronicas=$row->cronicas; 
				$laborales=$row->otros_antecedentes;
				$laboratorio=$row->laboratorio;
				$estatus=$row->estatus;				
			}
				$fec=explode('-',$fecha);
				if(strlen($fec[0])==4){
					if($fec[0]=='1900'){
					  $fecha='';
					}
					else {
					  $fecha=$fec[2].'-'.$fec[1].'-'.$fec[0];
					}
				}
				else {
				  if($fecha=='01-01-1900') { $fecha=''; }
				} 
			$rega=$this->Personal_model->val_tmp_ant($codigo);
			if($rega==0){
				$va=$this->Personal_model->crear_tmp_ant($codigo);
			}
			$tablaa=$this->Personal_model->get_ant($codigo); 
			foreach ($tablaa as $rowa){
				$sql=$this->Personal_model->ins_tmp_ant($codigo,$rowa->fuma,$rowa->frequenciaf,$rowa->hemorragias,$rowa->manchas,$rowa->cansancio,$rowa->nauseas,$rowa->cabello,$rowa->cataratas,$rowa->pielroja,$rowa->esterilidad,$rowa->cambios,$rowa->dosimetro,$rowa->cancer,$rowa->tipocancer,$rowa->cronicas,$rowa->otros_antecedentes,$codigo,$rowa->organo,$rowa->laboratorio);				
			}			
			$regea=$this->Personal_model->val_tmp_estab($codigo);
			if($regea==0){
				$ve=$this->Personal_model->crear_tmp_estab($codigo);
			}		
			$regp=$this->Personal_model->val_tmp_persp($codigo);
			if($regp==0){
				$vp=$this->Personal_model->crear_tmp_persp($codigo);
			}
			$tablap=$this->Personal_model->get_persp($codigo); 
			foreach ($tablap as $rowp){
				$sql=$this->Personal_model->ins_tmp_estab($rowp->idestablecimiento,$rowp->idpersonal,$rowp->idcargo,$rowp->idservicio);	
			}			                           
			$opcpaises="<option selected value=\"".$pais."\">".$pais."</option>";
			$paises=$opcpaises.$this->Personal_model->select_pais();
			$establecimientos=$this->Personal_model->select_establecimientos();
			$data['establecimientos']=$establecimientos;
			$servicios=$this->Personal_model->select_servicios();
			$data['servicios']=$servicios;
			$cargos=$this->Personal_model->select_cargos();
			$data['cargos']=$cargos;			
			$data['tmpestable']=$this->Personal_model->get_tmp_estab($codigo);	
			$data['tmppersp']=$this->Personal_model->get_tmp_persp($codigo);	
			$data['codigo']=$codigo;
			$data['pnombre']=$pnombre;
			$data['papellido']=$papellido; 
			$data['sapellido']=$sapellido; 
			$data['cedula']=$cedula; 
			$data['telefono']=$telefono; 
			$data['fecha']=$fecha; 
			$data['sexo']=$sexo; 
			$data['snombre']=$snombre; 
			$data['paises']=$paises; 
			$data['direccion']=$direccion; 
			$data['correo']=$correo; 
			$data['profesion']=$profesion; 
			$data['especialidad']=$especialidad; 
			$data['nacionalidad']=$nacionalidad; 
			$data['lugar']=$lugar; 
			$data['fuma']=$fuma; 
			$data['cuantos']=$cuantos; 
			$data['hemorragias']=$hemorragias; 
			$data['manchas']=$manchas; 
			$data['cansancio']=$cansancio; 
			$data['nauseas']=$nauseas; 
			$data['cabello']=$cabello; 
			$data['cataratas']=$cataratas; 
			$data['pielroja']=$pielroja; 
			$data['esterilidad']=$esterilidad; 
			$data['cambios']=$cambios; 
			$data['dosimetro']=$dosimetro; 
			$data['cancer']=$cancer; 
			$data['tipocancer']=$tipocancer; 
			$data['cronicas']=$cronicas; 
			$data['laborales']=$laborales;
			$data['laboratorio']=$laboratorio; 
			$data['estatus']=$estatus;					
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('personal/perso_edit_view',$data);							
	}	
	public function guardar()
	{
		$this->load->model('Personal_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Personal');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 16,$idsesion);		
		$codigo=$this->input->post('codigo');
		$pnombre=$this->input->post('pnombre');
		$papellido=$this->input->post('papellido');
		$sapellido=$this->input->post('sapellido');
		$cedula=$this->input->post('cedula');
		$telefono=$this->input->post('telefono');
		$fecha=$this->input->post('fecha');
		$sexo=$this->input->post('sexo');
		$snombre=$this->input->post('snombre');
		$pais=$this->input->post('pais');
		$direccion=$this->input->post('direccion');
		$correo=$this->input->post('correo');
		$profesion=$this->input->post('profesion');
		$especialidad=$this->input->post('especialidad');
		$nacionalidad=$this->input->post('nacionalidad');
		$lugar=$this->input->post('lugar');
		$activo=$this->input->post('activo'); 
		$this->Personal_model->ipersonal($codigo , $pnombre , $papellido , $sapellido , $cedula , $telefono , $fecha , $sexo , $snombre , $pais , $direccion , $correo , $profesion , $especialidad , $nacionalidad , $lugar, $activo );
			$data['codigo']=$codigo;
			$data['pnombre']=$pnombre;
			$data['papellido']=$papellido;
			$data['sapellido']=$sapellido;
			$data['cedula']=$cedula;
			$data['telefono']=$telefono;
			$data['fecha']=$fecha;
			$data['sexo']=$sexo;
			$data['snombre']=$snombre;
			$data['pais']=$pais;
			$data['direccion']=$direccion;
			$data['correo']=$correo;
			$data['profesion']=$profesion;
			$data['especialidad']=$especialidad;
			$data['nacionalidad']=$nacionalidad;
			$data['lugar']=$lugar;
			$data['activo']=$activo;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
			$this->load->view('personal/perso_guardado_view',$data);
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
		$this->load->model('Personal_model');		
		$reg=$this->Personal_model->val_tmppractica($codigo);
		if($reg==0){
			return true;
		}			
		else {
			$conteo=$this->Personal_model->count_tmppractica($codigo);
			if ($conteo>0) {
				return true;
			}
			else {
				return false;
			}
		}
	}
	public function buscarcedula()
	{
		$this->load->model('Personal_model');		
		$cedula=$this->input->post('cedula');
		$reg=$this->Personal_model->buscacedula($cedula);
		if($reg==0){
			$data['reg']=0;
		}			
		else {
			$data['reg']=1;
		}
		$this->load->view('personal/buscacedula',$data);
	}	
	public function tablatemporal(){
		$codigo=$this->input->post('id');
		$this->load->model('Personal_model');
		$rege=$this->Personal_model->val_tmp_estab($codigo);
		$rega=$this->Personal_model->val_tmp_ant($codigo);
		$regp=$this->Personal_model->val_tmp_persp($codigo);
		if(($rege==0)||($rega==0)||($regp==0)) {
			$data['reg']=0;
		}				
		else {
			$data['reg']=$this->Personal_model->count_tmp_estab($codigo);    	 
		}
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('personal/error_tablatemporal',$data);
	}
	public function error_servicios(){  
		$id=$this->input->post('id');
		$this->load->model('Establecimientos_model');
		if (empty($id)){
			$this->load->view('personal/error_servicios');
		}
		else {
			$data['tablaservicios']=$this->Establecimientos_model->tablaservicios($id);
			$this->load->view('personal/error_servicios',$data);
		}    
	}
	public function cambiar(){ 
	 	$codigo=$this->input->post('codigo');
		$data['codigo']=$codigo;
		$this->load->view('personal/cambiocodigo',$data);   
	}
	public function codigocambiado(){ 
	 	$codigo=$this->input->post('codigo');
		$data['codigo']=$codigo;
		$this->load->view('personal/codigook',$data);   
	}
	public function controlcodigo(){
		$codigo=$this->input->post('codigo');
		$this->load->model('Personal_model');
		$r=$this->Personal_model->controlcodigo($codigo);
		$data['r']=$r;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Personal');
		$this->load->view('personal/controlcodigo',$data);
	}			     
	public function error_codigo(){  
		$this->load->view('personal/error_codigo');    
	} 
	public function error_pnombre(){  
		$this->load->view('personal/error_pnombre');    
	} 
	public function error_papellido(){  
		$this->load->view('personal/error_papellido'); 
	}    
	public function error_sapellido(){  
		$this->load->view('personal/error_sapellido');    
	} 
	public function error_cedula(){  
		$this->load->view('personal/error_cedula');
	} 
	public function error_telefono(){  
		$this->load->view('personal/error_telefono');    
	} 
	public function error_fecha(){  
		$this->load->view('personal/error_fecha');    
	} 
	public function error_sexo(){  
		$this->load->view('personal/error_sexo');    
	} 
	public function error_snombre(){  
		$this->load->view('personal/error_snombre');   
	} 
	public function error_pais(){  
		$this->load->view('personal/error_pais');    
	} 
	public function error_direccion(){  
		$this->load->view('personal/error_direccion');    
	} 
	public function error_correo(){  
		$this->load->view('personal/error_correo');    
	} 
	public function error_profesion(){  
		$this->load->view('personal/error_profesion');
	}	     
	public function error_especialidad(){  
		$this->load->view('personal/error_especialidad');    
	} 
	public function error_nacionalidad(){  
		$this->load->view('personal/error_nacionalidad');    
	} 
	public function error_lugar(){  
		$this->load->view('personal/error_lugar');    
	}  
	public function error_fuma(){
	   $this->load->view('personal/error_fuma');
	}       
	public function error_cuantos(){
	   $this->load->view('personal/error_cuantos');
	} 
	public function error_cancer(){
	  $this->load->view('personal/error_cancer');
	} 
	public function error_dosimetro(){
	   $this->load->view('personal/error_dosimetro');
	} 
	public function error_laborales(){
		$this->load->view('personal/error_laborales');
	}
	public function error_cronicas(){
	   $this->load->view('personal/error_cronicas');
	} 
	public function organo_checked(){
	   $this->load->view('personal/organo_checked');
	}  
	public function organo_unchecked(){
	   $this->load->view('personal/organo_unchecked');
	} 
	public function dosimetro_checked(){
	   $this->load->view('personal/dosimetro_si');
	}  
	public function dosimetro_unchecked(){
	   $this->load->view('personal/dosimetro_no');
	}
	public function cancer_checked(){
	   $this->load->view('personal/tipo_cancer');
	}  
	public function cancer_unchecked(){
	   $this->load->view('personal/tipo_cancer_no');
	}
	public function fuma(){
	   $this->load->view('personal/cuantos');
	}  
	public function nofuma(){
	   $this->load->view('personal/nocuantos');
	}     
	public function cancelar(){
		$this->load->model('Personal_model');
		$codigo=$this->input->post('codigo');
		$this->Personal_model->drop_tmp_persp($codigo);
		$this->Personal_model->drop_tmp_estab($codigo);
		$this->Personal_model->drop_tmp_ant($codigo);
	   	$this->load->view('personal/cancelado');
	} 	                    	
}	