<?php
class Recepcion extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Recepcion_model');
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
			$idcontrolador=$this->Controladores_model->get_id('Recepcion');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$data['listado']=$this->Recepcion_model->listado();
			$data['pendientes']=$this->Recepcion_model->pendientes();
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Recepcion');
			$this->add_view('recepcion/recepcion_inicial_view',$data);	
		}
	}
	public function listadorecibidos()
	{
		$this->load->model('Recepcion_model');
		$data['listado']=$this->Recepcion_model->listado();
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Recepcion');
		$this->load->view('recepcion/recibidos',$data);				
	}	
	public function actualizar()
	{
		$this->load->model('Recepcion_model');
		$data['pendientes']=$this->Recepcion_model->pendientes();
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Recepcion');
		$this->load->view('recepcion/listadopendiente',$data);				
	}	
	public function preparar()
	{
		$this->load->model('Recepcion_model');
		$id=$this->input->post('id');
		$data['vdosimetros']=$this->Recepcion_model->vdosimetrosasignados($id);
		$data['numerotar']=$this->Recepcion_model->contar_pendientes($id);
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Recepcion');
		$this->load->view('recepcion/recepcion_dosim_view',$data);				
	}
	public function comprueba_dosimetro()
	{
		$this->load->model('Recepcion_model');
		$dosimetro=$this->input->post('dosimetro');
		$estatus=$this->Recepcion_model->get_estatus($dosimetro);
		if (empty($estatus)) { $estatus=0; }
		$this->load->model('Menu_model');
		$data['estatus']=$estatus;
		$data['color']=$this->Menu_model->get_color('Recepcion');
		$this->load->view('recepcion/compruebadosimetro',$data);	
	}
	public function newrecepcion()
	{
		$this->load->model('Recepcion_model');
		$iddocumento=$this->input->post('id');
		$data['iddocumento']=$iddocumento; 
		$data['d']=0; 
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Recepcion');
		$this->load->view('recepcion/dosimetro',$data);
	}		
	public function frecepcion()
	{
		$this->load->model('Recepcion_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Recepcion');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 10,$idsesion);		
		$dosimetro=$this->input->post('dosimetro');
		$iddocumento=$this->Recepcion_model->get_iddocumento($dosimetro);		
		$htarjeta=$this->Recepcion_model->get_idtarjeta($dosimetro,$iddocumento);	
		$this->Recepcion_model->recibir($iddocumento, $dosimetro , $htarjeta);
		$pendientes=$this->Recepcion_model->contar_pendientes($iddocumento);
		$registro=$this->Recepcion_model->registro_ind($dosimetro);
		if (!empty($registro)){
			foreach ($registro as $row):           
				$idpersona=$row->idpersona; 
				$numero=$row->numero; 
				$estatus=$row->estatus; 
				$idestablecimiento=$row->idestablecimiento; 
				$fecha=$row->fecha; 
				$establecimiento=$row->establecimiento; 
				$personal=$row->personal;
				$servicio=$row->servicio;
				$fechai=$row->fechainicio; 
				$fechaf=$row->fechafin;		 
	        endforeach;
	    }		
		if ($pendientes>0) {
				$data['pendientes']=$pendientes;
				$data['preparados']=$this->Recepcion_model->contar_preparados($iddocumento);        
				$data['dosimetro']=$dosimetro; 
				$data['idpersona']=$idpersona; 
				$data['iddocumento']=$iddocumento; 
				$data['numero']=$numero; 
				$data['estatus']=$estatus; 
				$data['idestablecimiento']=$idestablecimiento; 
				$data['fecha']=$fecha; 
				$data['establecimiento']=$establecimiento; 
				$data['personal']=$personal;
				$data['servicio']=$servicio;        
				$data['fechai']=$fechai; 
				$data['fechaf']=$fechaf;
				$this->load->model('Menu_model');
				$data['color']=$this->Menu_model->get_color('Recepcion');
				$this->load->view('recepcion/dosimetro_recibido',$data);
		}
		else {
				$data['preparados']=$this->Recepcion_model->contar_preparados($iddocumento); 
				$this->load->model('Menu_model');
				$data['color']=$this->Menu_model->get_color('Recepcion');
				$this->load->view('recepcion/recepcion_final',$data);	
			}
	}
	public function frecibido()
	{
		$this->load->model('Recepcion_model');
		$dosimetro=$this->input->post('dosimetro');
		$iddocumento=$this->Recepcion_model->get_iddocumento($dosimetro);		
		$c=substr_count($dosimetro, '0');
		$ceros=str_repeat ( '0', $c );
		$hdosimetro=str_replace($ceros, "", $dosimetro);		
		$registro=$this->Recepcion_model->registro_ind($hdosimetro);
		if (!empty($registro)){
			foreach ($registro as $row):           
				$idpersona=$row->idpersona; 
				$numero=$row->numero; 
				$estatus=$row->estatus; 
				$idestablecimiento=$row->idestablecimiento; 
				$fecha=$row->fecha; 
				$establecimiento=$row->establecimiento; 
				$personal=$row->personal;
				$servicio=$row->servicio;
				$fechai=$row->fechainicio; 
				$fechaf=$row->fechafin;		 
	        endforeach;
			$pendientes=$this->Recepcion_model->contar_pendientes($iddocumento);
			if ($pendientes>0) {
				$data['pendientes']=$pendientes;
				$data['preparados']=$this->Recepcion_model->contar_preparados($iddocumento);        
				$data['dosimetro']=$hdosimetro; 
				$data['idpersona']=$idpersona; 
				$data['iddocumento']=$iddocumento; 
				$data['numero']=$numero; 
				$data['estatus']=$estatus; 
				$data['idestablecimiento']=$idestablecimiento; 
				$data['fecha']=$fecha; 
				$data['establecimiento']=$establecimiento; 
				$data['personal']=$personal;
				$data['servicio']=$servicio;        
				$data['fechai']=$fechai; 
				$data['fechaf']=$fechaf;
				$this->load->model('Menu_model');
				$data['color']=$this->Menu_model->get_color('Recepcion');
				$this->load->view('recepcion/dosimetro_recibido',$data);
			}
			else {
				$data['preparados']=$this->Recepcion_model->contar_preparados($iddocumento); 
				$this->load->model('Menu_model');
				$data['color']=$this->Menu_model->get_color('Recepcion');
				$this->load->view('recepcion/recepcion_final',$data);				
			}
		}
	}
	public function datosdosimetro()
	{
		$this->load->model('Recepcion_model');
		$id=$this->input->get('id');
		$registro=$this->Recepcion_model->drecibido($id);
		foreach ($registro as $row):           
			$id=$row->id; 
			$tarjeta=$row->tarjeta; 
			$idpersona=$row->idpersona; 
			$iddocumento=$row->iddocumento; 
			$numero=$row->numero; 
			$estatus=$row->estatus; 
			$idestablecimiento=$row->idestablecimiento; 
			$fecha=$row->fecha; 
			$establecimiento=$row->establecimiento; 
			$personal=$row->personal;
			$servicio=$row->servicio; 
			$fechai=$row->fechainicio;
			$fechaf=$row->fechafin;
        endforeach;
		$data['dosimetro']=$id;
		$data['tarjeta']=$tarjeta;
		$data['idpersona']=$idpersona; 
		$data['iddocumento']=$iddocumento; 
		$data['numero']=$numero; 
		$data['estatus']=$estatus; 
		$data['idestablecimiento']=$idestablecimiento; 
		$data['fecha']=$fecha;
		$data['fechai']=$fechai;
		$data['fechaf']=$fechaf; 
		$data['establecimiento']=$establecimiento; 
		$data['personal']=$personal;
		$data['servicio']=$servicio;  
		$data['d']=1;      
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Recepcion');
		$this->load->view('recepcion/verdosimetro',$data);		
	}				
	public function dosimetro()
	{
		$this->load->model('Recepcion_model');
		$id=$this->input->get('id');
		$registro=$this->Recepcion_model->registro($id);
		foreach ($registro as $row):           
			$id=$row->id; 
			$tarjeta=$row->tarjeta; 
			$idpersona=$row->idpersona; 
			$iddocumento=$row->iddocumento; 
			$numero=$row->numero; 
			$estatus=$row->estatus; 
			$idestablecimiento=$row->idestablecimiento; 
			$fecha=$row->fecha; 
			$establecimiento=$row->establecimiento; 
			$personal=$row->personal;
			$servicio=$row->servicio; 
        endforeach;
		$data['dosimetro']=$id;
		$data['tarjeta']=$tarjeta;
		$data['idpersona']=$idpersona; 
		$data['iddocumento']=$iddocumento; 
		$data['numero']=$numero; 
		$data['estatus']=$estatus; 
		$data['idestablecimiento']=$idestablecimiento; 
		$data['fecha']=$fecha; 
		$data['establecimiento']=$establecimiento; 
		$data['personal']=$personal;
		$data['servicio']=$servicio;  
		$data['d']=1;      
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Recepcion');
		$this->load->view('recepcion/dosimetro',$data);		
	}		
	public function registro()
	{
		$this->load->model('Recepcion_model');
		$tarjeta=$this->input->get('tarjeta');
		$id=$this->Recepcion_model->get_id($tarjeta);
		$registro=$this->Recepcion_model->registro($id);
		foreach ($registro as $row):           
			$id=$row->id; 
			$tarjeta=$row->tarjeta; 
			$idpersona=$row->idpersona; 
			$iddocumento=$row->iddocumento; 
			$numero=$row->numero; 
			$estatus=$row->estatus; 
			$idestablecimiento=$row->idestablecimiento; 
			$fecha=$row->fecha; 
			$establecimiento=$row->establecimiento; 
			$personal=$row->personal;
			$servicio=$row->servicio; 
        endforeach;
		$data['dosimetro']=$id;
		$data['tarjeta']=$tarjeta; 
		$data['idpersona']=$idpersona; 
		$data['iddocumento']=$iddocumento; 
		$data['numero']=$numero; 
		$data['estatus']=$estatus; 
		$data['idestablecimiento']=$idestablecimiento; 
		$data['fecha']=$fecha; 
		$data['establecimiento']=$establecimiento; 
		$data['personal']=$personal;
		$data['servicio']=$servicio;        
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Recepcion');
		$this->load->view('recepcion/dosimetro',$data);

	}
    public function ok_tarjeta(){

    	$tarjeta=$this->input->post('tarjeta');
    	$data['tarjeta']=$tarjeta; 
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Recepcion');
       	$this->load->view('recepcion/ok_tarjeta',$data);
    } 		
    public function error_dosimetro(){
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Recepcion');
       $this->load->view('recepcion/error_dosimetro',$data);
    }
    public function constancia(){
		$this->load->model('Recepcion_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Recepcion');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 15,$idsesion);		
    	$this->load->library('pdf');		
		$id=$this->input->get('id');
		$this->pdf=new PDF_MC_Table();				
		$destino=$this->Generar_model->destino($id);
		if ($destino==0){
			$tbl=$this->Generar_model->vgdosimetrospersona();
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
			            $iddosimetro=$row->iddosimetro; 
			            $idpersona=$row->idpersona; 
			            $iddocumento=$row->iddocumento; 
			            $numero=$row->numero; 
			            $estatus=$row->estatus; 
			            $isestablecimiento=$row->idestablecimiento; 
			            $fechan=$row->fecha; 
			            $establecimiento=$row->establecimiento; 
			            $personal=$row->personal; 
			            $servicio=$row->servicio;
		                $fec=explode('-',$fechan);
		                if(strlen($fec[0])==4){
		                      $fecha=$fec[2].'-'.$fec[1].'-'.$fec[0];
		                }	            
						$this->pdf->SetDrawColor(0,0,0);
						$this->pdf->SetFillColor(255,255,255);
						$this->pdf->Polygon(array($x,$y,$x+30,$y,$x+35,$y+5,$x+35,$y+49,$x,$y+49),'FD');
						$this->pdf->SetFont('Arial','B',7);				
						$this->pdf->SetXY($x,$y);
						$this->pdf->drawTextBox('00000'.$dosimetro, $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetFont('Arial','B',7);
						$this->pdf->SetXY($x,$y+7);
						$this->pdf->drawTextBox(utf8_decode($establecimiento), $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetXY($x,$y+14);		
						$this->pdf->drawTextBox($idpersona.' '.utf8_decode($personal), $ancho, $alto, 'L', 'M',false);		
						$this->pdf->Code39($x+2, $y+22, $dosimetro,0.9,6);
						$this->pdf->SetXY($x,$y+25);
						$this->pdf->SetFont('Arial','',6);		
						$this->pdf->drawTextBox($fecha.' Estab:'.$idestablecimiento, $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetFont('Arial','B',8);
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
			            $iddosimetro=$row->iddosimetro; 
			            $idpersona=$row->idpersona; 
			            $iddocumento=$row->iddocumento; 
			            $numero=$row->numero; 
			            $estatus=$row->estatus; 
			            $idestablecimiento=$row->idestablecimiento; 
			            $fechan=$row->fecha; 
			            $establecimiento=$row->establecimiento; 
			            $personal=$row->personal; 
			            $servicio=$row->servicio;
		                $fec=explode('-',$fechan);
		                if(strlen($fec[0])==4){
		                      $fecha=$fec[2].'-'.$fec[1].'-'.$fec[0];
		                }	            
						$this->pdf->SetDrawColor(0,0,0);
						$this->pdf->SetFillColor(255,255,255);
						$this->pdf->Polygon(array($x,$y,$x+30,$y,$x+35,$y+5,$x+35,$y+49,$x,$y+49),'FD');
						$this->pdf->SetFont('Arial','B',7);				
						$this->pdf->SetXY($x,$y);
						$this->pdf->drawTextBox('00000'.$dosimetro, $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetFont('Arial','B',7);
						$this->pdf->SetXY($x,$y+7);
						$this->pdf->drawTextBox(utf8_decode($establecimiento), $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetXY($x,$y+14);		
						$this->pdf->drawTextBox($idpersona.' '.utf8_decode($personal), $ancho, $alto, 'L', 'M',false);		
						$this->pdf->Code39($x+2, $y+22, $dosimetro,0.9,6);
						$this->pdf->SetXY($x,$y+25);
						$this->pdf->SetFont('Arial','',6);		
						$this->pdf->drawTextBox($fecha.' Estab:'.$idestablecimiento, $ancho, $alto, 'L', 'M',false);
						$this->pdf->SetFont('Arial','B',8);
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

		}
		else {
	    	$reg=$this->Generar_model->contar_tarjetas($id);
			$this->pdf->AddPage();
			$this->pdf->SetFont('Arial','',15);
			$yy=0;
			$xx=0;
			if($reg<=5){
				$listado=$this->Generar_model->tarjetas($id);
	            foreach ($listado as $row):
		            $dosimetro=$row->idpractica; 
		            $iddosimetro=$row->iddosimetro; 
		            $idpersona=$row->idpersona; 
		            $iddocumento=$row->iddocumento; 
		            $numero=$row->numero; 
		            $estatus=$row->estatus; 
		            $isestablecimiento=$row->idestablecimiento; 
		            $fechan=$row->fecha; 
		            $establecimiento=$row->establecimiento; 
		            $personal=$row->personal; 
		            $servicio=$row->servicio;
	                $fec=explode('-',$fechan);
	                if(strlen($fec[0])==4){
	                      $fecha=$fec[2].'-'.$fec[1].'-'.$fec[0];
	                }	            
					$this->pdf->SetDrawColor(0,0,0);
					$this->pdf->SetFillColor(255,255,255);
					$this->pdf->Polygon(array($x,$y,$x+30,$y,$x+35,$y+5,$x+35,$y+49,$x,$y+49),'FD');
					$this->pdf->SetFont('Arial','B',7);				
					$this->pdf->SetXY($x,$y);
					$this->pdf->drawTextBox('00000'.$dosimetro, $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetFont('Arial','B',7);
					$this->pdf->SetXY($x,$y+7);
					$this->pdf->drawTextBox(utf8_decode($establecimiento), $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetXY($x,$y+14);		
					$this->pdf->drawTextBox($idpersona.' '.utf8_decode($personal), $ancho, $alto, 'L', 'M',false);		
					$this->pdf->Code39($x+2, $y+22, $dosimetro,0.9,6);
					$this->pdf->SetXY($x,$y+25);
					$this->pdf->SetFont('Arial','',6);		
					$this->pdf->drawTextBox($fecha.' Estab:'.$idestablecimiento, $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetFont('Arial','B',8);
					$this->pdf->SetXY($x,$y+30);		
					$this->pdf->drawTextBox(utf8_decode($servicio), $ancho, $alto, 'L', 'M',false);
					$x=$x+40;             
	            endforeach;			

			}
			else {
				$listado=$this->Generar_model->tarjetas($id);
	            foreach ($listado as $row):
		            $dosimetro=$row->id; 
		            $iddosimetro=$row->iddosimetro; 
		            $idpersona=$row->idpersona; 
		            $iddocumento=$row->iddocumento; 
		            $numero=$row->numero; 
		            $estatus=$row->estatus; 
		            $idestablecimiento=$row->idestablecimiento; 
		            $fechan=$row->fecha; 
		            $establecimiento=$row->establecimiento; 
		            $personal=$row->personal; 
		            $servicio=$row->servicio;
	                $fec=explode('-',$fechan);
	                if(strlen($fec[0])==4){
	                      $fecha=$fec[2].'-'.$fec[1].'-'.$fec[0];
	                }	            
					$this->pdf->SetDrawColor(0,0,0);
					$this->pdf->SetFillColor(255,255,255);
					$this->pdf->Polygon(array($x,$y,$x+30,$y,$x+35,$y+5,$x+35,$y+49,$x,$y+49),'FD');
					$this->pdf->SetFont('Arial','B',7);				
					$this->pdf->SetXY($x,$y);
					$this->pdf->drawTextBox('00000'.$dosimetro, $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetFont('Arial','B',7);
					$this->pdf->SetXY($x,$y+7);
					$this->pdf->drawTextBox(utf8_decode($establecimiento), $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetXY($x,$y+14);		
					$this->pdf->drawTextBox($idpersona.' '.utf8_decode($personal), $ancho, $alto, 'L', 'M',false);		
					$this->pdf->Code39($x+2, $y+22, $dosimetro,0.9,6);
					$this->pdf->SetXY($x,$y+25);
					$this->pdf->SetFont('Arial','',6);		
					$this->pdf->drawTextBox($fecha.' Estab:'.$idestablecimiento, $ancho, $alto, 'L', 'M',false);
					$this->pdf->SetFont('Arial','B',8);
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
		}	


		$this->pdf->Output();    	
    } 		
}	