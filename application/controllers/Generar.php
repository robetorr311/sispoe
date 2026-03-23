<?php
class Generar extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Generar_model');
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
			$idcontrolador=$this->Controladores_model->get_id('Generar');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$data['listado']=$this->Generar_model->listado();
			$data['estudio']=$this->Generar_model->select_estudio();		
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Generar');
			$this->add_view('generar/generar_inicial_view',$data);		
		}		
	}
	public function preparartodo()
	{
		$this->load->model('Personal_model');
		$this->load->model('Generar_model');
		$this->load->model('Usuario_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Generar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 9,$idsesion);		
		$logged_in = $this->session->userdata('logged_in');
		if ($logged_in == TRUE)
		{
			$login= $this->session->userdata('username');
			$idusuario=$this->Usuario_model->idusuario_login($login);
		}			
		$establecimiento=$this->input->post('establecimiento');
		$fechai=$this->input->post('fechai');		
		$fechaf=$this->input->post('fechaf');
		$estudio=$this->input->post('estudio');
		$iddoc=$this->Generar_model->get_id();
		$this->Generar_model->generar($iddoc , $fechai , $fechaf, $estudio ,$idusuario );		
		
		$conteo=$this->Generar_model->count_tarjetas($iddoc);
		$tabla=$this->Generar_model->tarjetas($iddoc);

		$data['conteo']=$conteo;
		$data['tabla']=$tabla;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/listapersonal_view',$data);				
	}
	public function establecimiento()
	{
		$this->load->model('Generar_model');
		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');		
		$fechai=$this->input->post('fechai');		
		$fechaf=$this->input->post('fechaf');
		$estudio=$this->input->post('estudio');
		$estados=$this->Ubicacion_model->select_estados();
		$servicios=$this->Establecimientos_model->select_servicios();
		$establecimientos=$this->Generar_model->get_establecimientos();	
		$data['establecimientos']=$establecimientos;
		$data['fechai']=$fechai;				
		$data['fechaf']=$fechaf;
		$data['estudio']=$estudio;
		$data['servicios']=$servicios;
		$data['estados']=$estados;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/generar_estab_view',$data);				
	}
	public function porestado()
	{
		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');		
		$fechai=$this->input->post('fechai');		
		$fechaf=$this->input->post('fechaf');
		$estudio=$this->input->post('estudio');
		$estados=$this->Ubicacion_model->select_estados();
		$data['estados']=$estados;
		$data['fechai']=$fechai;				
		$data['fechaf']=$fechaf;
		$data['estudio']=$estudio;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/porestados',$data);				
	}
	public function validarestado()
	{
		$this->load->model('Generar_model');
		$idestado=$this->input->post('estado');
		$fechai=$this->input->post('fechai');		
		$fechaf=$this->input->post('fechaf');
		$tipo=$this->input->post('tipo');		
		$data['validacion']=$this->Generar_model->validargenerados_e($idestado,$fechai , $fechaf, $tipo);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/validacion',$data);				
	}		
	public function validardtodo()
	{
		$this->load->model('Generar_model');
		$fechai=$this->input->post('fechai');		
		$fechaf=$this->input->post('fechaf');
		$tipo=$this->input->post('tipo');		
		$data['validacion']=$this->Generar_model->validardtodos($fechai , $fechaf, $tipo);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/validacion',$data);				
	}	
	public function validardosim()
	{
		$this->load->model('Generar_model');
		$establecimiento=$this->input->post('id');
		$fechai=$this->input->post('fechai');		
		$fechaf=$this->input->post('fechaf');
		$tipo=$this->input->post('tipo');		
		$data['validacion']=$this->Generar_model->validargenerados($establecimiento , $fechai , $fechaf, $tipo);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/validacion',$data);				
	}
	public function validardosimxserv()
	{
		$this->load->model('Generar_model');
		$establecimiento=$this->input->post('id');
		$fechai=$this->input->post('fechai');		
		$fechaf=$this->input->post('fechaf');
		$tipo=$this->input->post('tipo');
		$servicio=$this->input->post('servicio');		
		$data['validacion']=$this->Generar_model->validargeneradosxserv($establecimiento , $fechai , $fechaf, $tipo,$servicio);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/validacion',$data);				
	}

	public function pestablecimientos()
	{
		$this->load->model('Generar_model');
		$estado=$this->input->post('estado');
		$establecimientos=$this->Generar_model->select_establecimiento($estado);
		$data['establecimientos']=$establecimientos;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/establecimientos',$data);				
	}			
	public function preparar()
	{
		$this->load->model('Generar_model');
		$establecimiento=$this->input->post('establecimiento');
		$servicios=$this->Generar_model->fservicio_establecimiento($establecimiento);
		$data['servicios']=$servicios;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/servicios_ok',$data);				
	}
	public function genxestado()
	{
		$this->load->model('Ubicacion_model');		
		$this->load->model('Personal_model');
		$this->load->model('Generar_model');
		$this->load->model('Usuario_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Generar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 9,$idsesion);		
		$logged_in = $this->session->userdata('logged_in');
		if ($logged_in == TRUE)
		{
			$login= $this->session->userdata('username');
			$idusuario=$this->Usuario_model->idusuario_login($login);
		}			
		$estado=$this->input->post('estado');
		$fechai=$this->input->post('fechai');		
		$fechaf=$this->input->post('fechaf');
		$estudio=$this->input->post('estudio');
		$servicio=$this->input->post('servicio');
		$nombre=$this->Ubicacion_model->estado($estado);
		$iddoc=$this->Generar_model->get_id();
		$this->Generar_model->generarxestado($estado , $iddoc , $fechai , $fechaf, $estudio ,$idusuario);	
		$tabla=$this->Generar_model->tarjetas($iddoc);
		$conteo=$this->Generar_model->count_tarjetas($iddoc);
		$data['conteo']=$conteo;
		$data['estado']=$nombre;
		$data['tabla']=$tabla;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/listaestado_view',$data);				
	}	
	public function gen_dosim()
	{
		$this->load->model('Personal_model');
		$this->load->model('Generar_model');
		$this->load->model('Usuario_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Generar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 9,$idsesion);		
		$logged_in = $this->session->userdata('logged_in');
		if ($logged_in == TRUE)
		{
			$login= $this->session->userdata('username');
			$idusuario=$this->Usuario_model->idusuario_login($login);
		}			
		$establecimiento=$this->input->post('establecimiento');
		$fechai=$this->input->post('fechai');		
		$fechaf=$this->input->post('fechaf');
		$estudio=$this->input->post('estudio');
		$servicio=$this->input->post('servicio');
		if ($servicio=='999'){
			$nombre=$this->Personal_model->nombreestablecimiento($establecimiento);
			$iddoc=$this->Generar_model->get_id();
			$this->Generar_model->generar_est($establecimiento , $iddoc , $fechai , $fechaf, $estudio ,$idusuario );	
			$tabla=$this->Generar_model->tarjetas($iddoc);
			$conteo=$this->Generar_model->count_tarjetas($iddoc);					
		}
		else {
			$nombre=$this->Personal_model->nombreestablecimiento($establecimiento);
			$iddoc=$this->Generar_model->get_id();			
			$salida=$this->Generar_model->generar_est_s($establecimiento , $iddoc , $fechai , $fechaf, $estudio ,$idusuario,$servicio );
			$tabla=$this->Generar_model->tarjetas($iddoc);
			$conteo=$this->Generar_model->count_tarjetas($iddoc);						
		}		
		$data['conteo']=$conteo;
		$data['establecimiento']=$nombre;
		$data['tabla']=$tabla;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/listapersonale_view',$data);				
	}	
	public function anular()
	{
		$id=$this->input->post('id');
		$this->load->model('Generar_model');
		$this->Generar_model->anular_generados($id);
		$data['listado']=$this->Generar_model->listado();
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/tablapreparados',$data);				
	}			
	public function registro()
	{
		$id=$this->input->post('id');
		$this->load->model('Generar_model');
		$servicio=$this->Generar_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
            }
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/cargo_reg_view',$data);				
	}
	public function editar()
	{
		$id=$this->input->post('id');
		$this->load->model('Generar_model');
		$servicio=$this->Generar_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
            }
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('generar/cargo_edit_view',$data);							
	}	
	public function guardar()
	{
		$this->load->model('Generar_model');
		$codigo=$this->input->post('codigo'); 
		$nombre=$this->input->post('nombre'); 
		$this->Generar_model->iGenerar($codigo , $nombre );
        	$data['codigo']=$codigo; 
			$data['nombre']=$nombre; 
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
			$this->load->view('generar/cargo_guardado_view',$data);
	}
    public function error_fechai(){
       $this->load->view('generar/error_fechai');
    } 
    public function error_validado(){
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar'); 
       	$this->load->view('generar/error_validado',$data);
    }    
    public function error_fechaf(){
       $this->load->view('generar/error_fechaf');
    }
    public function error_estado(){
		$this->load->model('Ubicacion_model');
		$estados=$this->Ubicacion_model->select_estados();
		$data['estados']=$estados;

       $this->load->view('generar/error_estados',$data);
    }    
    public function error_servicio(){
		$this->load->model('Generar_model');
		$establecimiento=$this->input->post('establecimiento');
		$servicios=$this->Generar_model->fservicio_establecimiento($establecimiento);
		$data['servicios']=$servicios;

       $this->load->view('generar/error_servicio',$data);
    }    
    public function error_estudio(){
		$this->load->model('Generar_model');
		$data['estudio']=$this->Generar_model->select_estudio();    	
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
	    $this->load->view('generar/error_estudio',$data);
    } 
    public function error_tipo(){
       $this->load->view('generar/error_tipo');
    }
	public function tarjetas()
	{
		$x=5;
		$y=5;
		$ancho=32;
		$alto=10;
		$this->load->model('Establecimientos_model');
		$this->load->model('Generar_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Generar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 17,$idsesion);		
    	$this->load->library('pdf');		
		$id=$this->input->get('id');
		$this->pdf=new PDF_MC_Table();				
		$tipogenerado=$this->Generar_model->get_tipogenerado($id);
		switch ($tipogenerado) {
			case 1:
				$tbl=$this->Generar_model->vgdosimetrospersona($id);
				foreach ($tbl as $rowtbl):
					$idestablecimiento=$rowtbl->idestablecimiento;
			    	$reg=$this->Generar_model->contar_tarjetas_e($id,$idestablecimiento);
					$this->pdf->AddPage();
					$this->pdf->SetFont('Arial','',15);
					$yy=0;
					$xx=0;
					$x=5;
					$y=5;				
					if($reg<=5){
						if ($reg>0){
						$listado=$this->Generar_model->all_tarjetas($id,$idestablecimiento);
			            foreach ($listado as $row):
				            $dosimetro=$row->id; 
				            $iddosimetro=$row->idtarjeta; 
				            $idpersona=$row->idpersona; 
				            $iddocumento=$row->iddocumento; 
				            $numero=$row->numero; 
				            $estatus=$row->estatus; 
				            $isestablecimiento=$row->idestablecimiento; 
				            $establecimiento=$row->establecimiento; 
				            $personal=$row->personal; 
				            $servicio=$row->servicio;
				            $fechai=$row->fechainicio;
				            $fechaf=$row->fechafin;            
			                $feci=explode('-',$fechai);
			                if(strlen($feci[0])==4){
			                      $fechainicio=$feci[2].'-'.$feci[1].'-'.$feci[0];
			                }
			                $fecf=explode('-',$fechaf);
			                if(strlen($fecf[0])==4){
			                      $fechafin=$fecf[2].'-'.$fecf[1].'-'.$fecf[0];
			                }
			                $fecha=$fechainicio.'/'.$fechafin;			                
			                $nrodosimetro=$dosimetro;
			                $cntdosim=strlen($dosimetro);
			                $car=10;
			                $ceros=$car-$cntdosim;
			                if ($ceros>0){
			                	$c=str_repeat("0", $ceros);
			                	$nrodosimetro=$c.$dosimetro;
			                }
			                //substr_count($text, 'is');	
			                if ($idpersona==0) { $personal='TESTIGO'; }            
							$this->pdf->SetDrawColor(0,0,0);
							$this->pdf->SetFillColor(255,255,255);
							$this->pdf->Polygon(array($x,$y,$x+27,$y,$x+32,$y+5,$x+32,$y+45,$x,$y+45),'FD');
							$this->pdf->SetFont('Arial','B',5);				
							$this->pdf->SetXY($x,$y);
							$this->pdf->drawTextBox($nrodosimetro, $ancho, $alto, 'L', 'M',false);
							$this->pdf->SetFont('Arial','B',5);
							$this->pdf->SetXY($x,$y+7);
							$this->pdf->drawTextBox(utf8_decode($establecimiento), $ancho, $alto, 'L', 'M',false);
							$this->pdf->SetXY($x,$y+13);
							$this->pdf->SetFont('Arial','B',4);		
							$this->pdf->drawTextBox($idpersona.' '.utf8_decode($personal), $ancho, $alto, 'L', 'M',false);		
							$this->pdf->Code39($x+2, $y+19, $dosimetro,0.7,5);
							$this->pdf->SetXY($x,$y+20);
							$this->pdf->SetFont('Arial','B',5);
							$this->pdf->SetFont('Arial','',5);		
							$this->pdf->drawTextBox($fecha.' Estab:'.$idestablecimiento, $ancho, $alto, 'L', 'M',false);
							$this->pdf->SetFont('Arial','B',6);
							$this->pdf->SetXY($x,$y+30);		
							$this->pdf->drawTextBox(utf8_decode($servicio), $ancho, $alto, 'L', 'M',false);
							$x=$x+40;             
			            endforeach;			
			        	}
					}
					else {
						$listado=$this->Generar_model->all_tarjetas($id,$idestablecimiento);
			            foreach ($listado as $row):
				            $dosimetro=$row->id; 
				            $iddosimetro=$row->id; 
				            $idpersona=$row->idpersona; 
				            $iddocumento=$row->iddocumento; 
				            $numero=$row->numero; 
				            $estatus=$row->estatus; 
				            $idestablecimiento=$row->idestablecimiento; 
				            $establecimiento=$row->establecimiento; 
				            $personal=$row->personal; 
				            $servicio=$row->servicio;
				            $fechai=$row->fechainicio;
				            $fechaf=$row->fechafin; 
			                $feci=explode('-',$fechai);
			                if(strlen($feci[0])==4){
			                      $fechainicio=$feci[2].'-'.$feci[1].'-'.$feci[0];
			                }
			                $fecf=explode('-',$fechaf);
			                if(strlen($fecf[0])==4){
			                      $fechafin=$fecf[2].'-'.$fecf[1].'-'.$fecf[0];
			                }
			                $fecha=$fechainicio.'/'.$fechafin;		
			                $nrodosimetro=$dosimetro;
			                $cntdosim=strlen($dosimetro);
			                $car=10;
			                $ceros=$car-$cntdosim;
			                if ($ceros>0){
			                	$c=str_repeat("0", $ceros);
			                	$nrodosimetro=$c.$dosimetro;
			                }
			                if ($idpersona==0) { $personal='TESTIGO'; }                 	            
							$this->pdf->SetDrawColor(0,0,0);
							$this->pdf->SetFillColor(255,255,255);
							$this->pdf->Polygon(array($x,$y,$x+27,$y,$x+32,$y+5,$x+32,$y+45,$x,$y+45),'FD');
							$this->pdf->SetFont('Arial','B',5);				
							$this->pdf->SetXY($x,$y);
							$this->pdf->drawTextBox($nrodosimetro, $ancho, $alto, 'L', 'M',false);
							$this->pdf->SetFont('Arial','B',5);
							$this->pdf->SetXY($x,$y+7);
							$this->pdf->drawTextBox(utf8_decode($establecimiento), $ancho, $alto, 'L', 'M',false);
							$this->pdf->SetXY($x,$y+13);
							$this->pdf->SetFont('Arial','B',4);		
							$this->pdf->drawTextBox($idpersona.' '.utf8_decode($personal), $ancho, $alto, 'L', 'M',false);		
							$this->pdf->Code39($x+2, $y+19, $dosimetro,0.7,5);
							$this->pdf->SetXY($x,$y+20);
							$this->pdf->SetFont('Arial','B',5);
							$this->pdf->SetFont('Arial','',5);		
							$this->pdf->drawTextBox($fecha.' Estab:'.$idestablecimiento, $ancho, $alto, 'L', 'M',false);
							$this->pdf->SetFont('Arial','B',6);
							$this->pdf->SetXY($x,$y+30);		
							$this->pdf->drawTextBox(utf8_decode($servicio), $ancho, $alto, 'L', 'M',false);
							$x=$x+40;
							$xx++;
							if ($xx==5){
								$x=5;
								$y=$y+55;
								$xx=0;
								$yy++;
								if($yy==5){
									$this->pdf->AddPage();
									$x=5;
									$y=5;
									$yy=0;
								}
							}  
			            endforeach;	
					}
				endforeach;	
			break;
			case 2:
		    	$reg=$this->Generar_model->contar_tarjetas($id);
				$this->pdf->AddPage();
				$this->pdf->SetFont('Arial','',15);
				$yy=0;
				$xx=0;
				if($reg<=5){
					$listado=$this->Generar_model->tarjetas($id);
		            foreach ($listado as $row):
			            $dosimetro=$row->id; 
			            $idpersona=$row->idpersona; 
			            $iddocumento=$row->iddocumento; 
			            $numero=$row->numero; 
			            $estatus=$row->estatus; 
			            $idestablecimiento=$row->idestablecimiento; 
			            $establecimiento=$row->establecimiento; 
			            $personal=$row->personal; 
			            $servicio=$row->servicio;
		                if ($idpersona==0) { $personal='TESTIGO'; }
				            $fechai=$row->fechainicio;
				            $fechaf=$row->fechafin; 
			                $feci=explode('-',$fechai);
			                if(strlen($feci[0])==4){
			                      $fechainicio=$feci[2].'-'.$feci[1].'-'.$feci[0];
			                }
			                $fecf=explode('-',$fechaf);
			                if(strlen($fecf[0])==4){
			                      $fechafin=$fecf[2].'-'.$fecf[1].'-'.$fecf[0];
			                }
			                $fecha=$fechainicio.'/'.$fechafin;		
			                $nrodosimetro=$dosimetro;
			                $cntdosim=strlen($dosimetro);
			                $car=10;
			                $ceros=$car-$cntdosim;
			                if ($ceros>0){
			                	$c=str_repeat("0", $ceros);
			                	$nrodosimetro=$c.$dosimetro;
			                }		                	            
						$this->pdf->SetDrawColor(0,0,0);
						$this->pdf->SetFillColor(255,255,255);
						$this->pdf->Polygon(array($x,$y,$x+27,$y,$x+32,$y+5,$x+32,$y+45,$x,$y+45),'FD');
						$this->pdf->SetFont('Arial','B',5);				
						$this->pdf->SetXY($x,$y);
						$this->pdf->drawTextBox($nrodosimetro, $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetFont('Arial','B',5);
						$this->pdf->SetXY($x,$y+7);
						$this->pdf->drawTextBox(utf8_decode($establecimiento), $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetXY($x,$y+13);		
						$this->pdf->drawTextBox($idpersona.' '.utf8_decode($personal), $ancho, $alto, 'L', 'M',false);		
						$this->pdf->Code39($x+2, $y+19, $dosimetro,0.7,5);
						$this->pdf->SetXY($x,$y+20);
						$this->pdf->SetFont('Arial','',5);		
						$this->pdf->drawTextBox($fecha.' Estab:'.$idestablecimiento, $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetFont('Arial','B',6);
						$this->pdf->SetXY($x,$y+30);		
						$this->pdf->drawTextBox(utf8_decode($servicio), $ancho, $alto, 'L', 'M',false);
						$x=$x+40;             
		            endforeach;			

				}
				else {
					$listado=$this->Generar_model->tarjetas($id);
		            foreach ($listado as $row):
			            $dosimetro=$row->id; 
			            $idpersona=$row->idpersona; 
			            $iddocumento=$row->iddocumento; 
			            $numero=$row->numero; 
			            $estatus=$row->estatus; 
			            $idestablecimiento=$row->idestablecimiento; 
			            $establecimiento=$row->establecimiento; 
			            $personal=$row->personal; 
			            $servicio=$row->servicio;
			            if ($idpersona==0) { $personal='TESTIGO'; } 
				            $fechai=$row->fechainicio;
				            $fechaf=$row->fechafin; 
			                $feci=explode('-',$fechai);
			                if(strlen($feci[0])==4){
			                      $fechainicio=$feci[2].'-'.$feci[1].'-'.$feci[0];
			                }
			                $fecf=explode('-',$fechaf);
			                if(strlen($fecf[0])==4){
			                      $fechafin=$fecf[2].'-'.$fecf[1].'-'.$fecf[0];
			                }
			                $fecha=$fechainicio.'/'.$fechafin;		
			                $nrodosimetro=$dosimetro;
			                $cntdosim=strlen($dosimetro);
			                $car=10;
			                $ceros=$car-$cntdosim;
			                if ($ceros>0){
			                	$c=str_repeat("0", $ceros);
			                	$nrodosimetro=$c.$dosimetro;
			                }		                	            
						$this->pdf->SetDrawColor(0,0,0);
						$this->pdf->SetFillColor(255,255,255);
						$this->pdf->Polygon(array($x,$y,$x+27,$y,$x+32,$y+5,$x+32,$y+45,$x,$y+45),'FD');
						$this->pdf->SetFont('Arial','B',5);				
						$this->pdf->SetXY($x,$y);
						$this->pdf->drawTextBox($nrodosimetro, $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetFont('Arial','B',5);
						$this->pdf->SetXY($x,$y+7);
						$this->pdf->drawTextBox(utf8_decode($establecimiento), $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetXY($x,$y+13);		
						$this->pdf->drawTextBox($idpersona.' '.utf8_decode($personal), $ancho, $alto, 'L', 'M',false);		
						$this->pdf->Code39($x+2, $y+19, $dosimetro,0.7,5);
						$this->pdf->SetXY($x,$y+20);
						$this->pdf->SetFont('Arial','',5);		
						$this->pdf->drawTextBox($fecha.' Estab:'.$idestablecimiento, $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetFont('Arial','B',6);
						$this->pdf->SetXY($x,$y+30);		
						$this->pdf->drawTextBox(utf8_decode($servicio), $ancho, $alto, 'L', 'M',false);
						$x=$x+40;
						$xx++;

						if ($xx==5){
							$x=5;
							$y=$y+55;
							$xx=0;
							$yy++;
							if($yy==5){
								$this->pdf->AddPage();
								$x=5;
								$y=5;
								$yy=0;
							}
						}  
		            endforeach;	
				}
			break;
			case 3:
	    	$reg=$this->Generar_model->contar_tarjetas($id);
			$this->pdf->AddPage();
			$this->pdf->SetFont('Arial','',15);
			$yy=0;
			$xx=0;
			if($reg<=5){
				$listado=$this->Generar_model->tarjetas($id);
	            foreach ($listado as $row):
		            $dosimetro=$row->id; 
		            $idpersona=$row->idpersona; 
		            $iddocumento=$row->iddocumento; 
		            $numero=$row->numero; 
		            $estatus=$row->estatus; 
		            $idestablecimiento=$row->idestablecimiento; 
		            $establecimiento=$row->establecimiento; 
		            $personal=$row->personal; 
		            $servicio=$row->servicio;
	                if ($idpersona==0) { $personal='TESTIGO'; }
				            $fechai=$row->fechainicio;
				            $fechaf=$row->fechafin; 
			                $feci=explode('-',$fechai);
			                if(strlen($feci[0])==4){
			                      $fechainicio=$feci[2].'-'.$feci[1].'-'.$feci[0];
			                }
			                $fecf=explode('-',$fechaf);
			                if(strlen($fecf[0])==4){
			                      $fechafin=$fecf[2].'-'.$fecf[1].'-'.$fecf[0];
			                }
			                $fecha=$fechainicio.'/'.$fechafin;		
			                $nrodosimetro=$dosimetro;
			                $cntdosim=strlen($dosimetro);
			                $car=10;
			                $ceros=$car-$cntdosim;
			                if ($ceros>0){
			                	$c=str_repeat("0", $ceros);
			                	$nrodosimetro=$c.$dosimetro;
			                }	                	            
					$this->pdf->SetDrawColor(0,0,0);
					$this->pdf->SetFillColor(255,255,255);
					$this->pdf->Polygon(array($x,$y,$x+79,$y,$x+24,$y+5,$x+24,$y+58,$x,$y+58),'FD');
					$this->pdf->SetFont('Arial','B',5);				
					$this->pdf->SetXY($x,$y);
					$this->pdf->drawTextBox($nrodosimetro, $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetFont('Arial','B',5);
					$this->pdf->SetXY($x,$y+7);
					$this->pdf->drawTextBox(utf8_decode($establecimiento), $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetXY($x,$y+13);		
					$this->pdf->drawTextBox($idpersona.' '.utf8_decode($personal), $ancho, $alto, 'L', 'M',false);		
					$this->pdf->Code39($x+2, $y+19, $dosimetro,0.7,5);
					$this->pdf->SetXY($x,$y+20);
					$this->pdf->SetFont('Arial','',5);		
					$this->pdf->drawTextBox($fecha.' Estab:'.$idestablecimiento, $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetFont('Arial','B',6);
					$this->pdf->SetXY($x,$y+30);		
					$this->pdf->drawTextBox(utf8_decode($servicio), $ancho, $alto, 'L', 'M',false);
					$x=$x+40;             
	            endforeach;			

			}
			else {
				$listado=$this->Generar_model->tarjetas($id);
	            foreach ($listado as $row):
		            $dosimetro=$row->id; 
		            $iddosimetro=$row->idtarjeta; 
		            $idpersona=$row->idpersona; 
		            $iddocumento=$row->iddocumento; 
		            $numero=$row->numero; 
		            $estatus=$row->estatus; 
		            $idestablecimiento=$row->idestablecimiento; 
		            $establecimiento=$row->establecimiento; 
		            $personal=$row->personal; 
		            $servicio=$row->servicio;
			        if ($idpersona==0) { $personal='TESTIGO'; }
				            $fechai=$row->fechainicio;
				            $fechaf=$row->fechafin; 
			                $feci=explode('-',$fechai);
			                if(strlen($feci[0])==4){
			                      $fechainicio=$feci[2].'-'.$feci[1].'-'.$feci[0];
			                }
			                $fecf=explode('-',$fechaf);
			                if(strlen($fecf[0])==4){
			                      $fechafin=$fecf[2].'-'.$fecf[1].'-'.$fecf[0];
			                }
			                $fecha=$fechainicio.'/'.$fechafin;			            
			                $nrodosimetro=$dosimetro;
			                $cntdosim=strlen($dosimetro);
			                $car=10;
			                $ceros=$car-$cntdosim;
			                if ($ceros>0){
			                	$c=str_repeat("0", $ceros);
			                	$nrodosimetro=$c.$dosimetro;
			                }	                
					$this->pdf->SetDrawColor(0,0,0);
					$this->pdf->SetFillColor(255,255,255);
					$this->pdf->Polygon(array($x,$y,$x+79,$y,$x+24,$y+5,$x+24,$y+58,$x,$y+58),'FD');
					$this->pdf->SetFont('Arial','B',5);				
					$this->pdf->SetXY($x,$y);
					$this->pdf->drawTextBox($nrodosimetro, $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetFont('Arial','B',5);
					$this->pdf->SetXY($x,$y+7);
					$this->pdf->drawTextBox(utf8_decode($establecimiento), $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetXY($x,$y+13);		
					$this->pdf->drawTextBox($idpersona.' '.utf8_decode($personal), $ancho, $alto, 'L', 'M',false);		
					$this->pdf->Code39($x+2, $y+19, $dosimetro,0.7,5);
					$this->pdf->SetXY($x,$y+20);
					$this->pdf->SetFont('Arial','',5);		
					$this->pdf->drawTextBox($fecha.' Estab:'.$idestablecimiento, $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetFont('Arial','B',6);
					$this->pdf->SetXY($x,$y+30);		
					$this->pdf->drawTextBox(utf8_decode($servicio), $ancho, $alto, 'L', 'M',false);
					$x=$x+40;
					$xx++;

					if ($xx==5){
						$x=5;
						$y=$y+55;
						$xx=0;
						$yy++;
						if($yy==5){
							$this->pdf->AddPage();
							$x=5;
							$y=5;
							$yy=0;
						}
					}  
	            endforeach;	
			}
			break;			
		}	
		$this->pdf->Output();			
	}	             

}	