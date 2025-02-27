<?php
class Restablecimientos extends MY_Controller {
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
			$idcontrolador=$this->Controladores_model->get_id('Restablecimientos');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$data['estados']=$this->Ubicacion_model->select_estados();
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Restablecimientos');
			$this->add_view('restablecimientos/restab_inicial_view',$data);
		}				
	}
	public function pestados()
	{
		$this->load->model('Ubicacion_model');
		$data['estados']=$this->Ubicacion_model->select_estados();
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Restablecimientos');
		$this->load->view('restablecimientos/estados',$data);				
	}
	public function estadosp()
	{
		$this->load->model('Ubicacion_model');
		$data['estados']=$this->Ubicacion_model->select_estados();
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Restablecimientos');
		$this->load->view('restablecimientos/estadosp',$data);				
	}		
	public function pestablecimientos()
	{
		$this->load->model('Generar_model');
		$estado=$this->input->post('estado');
		$establecimientos=$this->Generar_model->select_establecimiento($estado);
		$data['establecimientos']=$establecimientos;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Restablecimientos');
		$this->load->view('restablecimientos/establecimientos',$data);				
	}	
	public function button_pdf()
	{
		$this->load->model('Restablecimientos_model');
		$data['idreporte']=$this->Restablecimientos_model->get_id();
		$data['ruta']=$this->input->post('ruta');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Restablecimientos');
		$this->load->view('restablecimientos/button_pdf',$data);				
	}
    public function error_estado(){
		$this->load->model('Ubicacion_model');
		$estados=$this->Ubicacion_model->select_estados();
		$data['estados']=$estados;
       $this->load->view('restablecimientos/error_estados',$data);
    }    
    public function error_establecimiento(){
    	$estado=$this->input->post('estado'); 
		$this->load->model('Generar_model');
		if (!empty($estado)) { $estado=0; }
		if ($estado>0){
		$establecimientos=$this->Generar_model->select_establecimiento($estado);
		}
		else {
			$data['establecimientos']='';
		}
       $this->load->view('restablecimientos/error_establecimiento',$data);
    }   
    public function generar(){
    	$ff=time();
    	$dd = strftime("%d",$ff);
		$mes=strftime("%m",$ff);
    	$anio=strftime("%Y",$ff);
    	$fecha=$dd.'-'.$mes.'-'.$anio;
    	$yy=0;
		$xx=0;
		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');
		$this->load->model('Restablecimientos_model');
		$this->load->model('Servicios_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Restablecimientos');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 21,$idsesion);		
		$tipo=$this->input->get('tipo');  
		$idreporte=$this->input->get('idreporte');
		$inicio=0;
		$this->load->library('pdf');			   	
		$this->pdf=new PDF_MC_Table('L');			
		switch ($tipo) {
			case 1:
				$dj=time();
				$dd=strftime("%d",$dj);
				$mes=strftime("%M",$dj);
				$anio=strftime("%Y",$dj);     
			   	$fechadeemision=$dd.'/'.$mes.'/'.$anio;	   			
				$listado=$this->Establecimientos_model->listado();
				$p=0;
				foreach ($listado as $row2):           
					$p++;
		        endforeach;
		        if ($p>7) {
		        	$pg=round($p/7);
		        	$pag=0;
		        	for ($pag ; $pag<$pg; $pag++){
						$x=5;
						$y=5;
						$id=$this->input->get('id');
						$this->pdf->AddPage();						
						$this->pdf->SetY($y);
						$this->pdf->SetX($x);						
						$this->pdf->Image('./assets/img/membrete-oficial_landscape.png',$x,$y,280,20);
						$y=$y+20;
						$this->pdf->SetY($y);
						$this->pdf->SetFont('Arial','B',10);
						$this->pdf->Cell(280,10,'Laboratorio Nacional De Dosimetria Personal Externa',0,1,'C');
						$y=$this->pdf->GetY();
						$y=$y-5;
						$this->pdf->SetY($y);		
						$this->pdf->SetFont('Arial','',8);
						$this->pdf->Cell(280,10,'Listado de Establecimientos Registrados',0,1,'C');
						$y=$this->pdf->GetY();
						$y=$y-5;
						$y=$this->pdf->GetY();
						$this->pdf->Line($x, $y, $x + 200, $y);
						$this->pdf->SetFont('Arial','B',10);
						$this->pdf->SetWidths(array(25,40,70,20,30,30,40,40));			
			    		$this->pdf->Row(array('Codigo','Nombre','Direccion','Director','Telefono','Estado','Municipio','Parroquia'));			

						$this->pdf->Line($x, $y, $x + 280, $y);
				    	$y=$this->pdf->GetY();
				    	$this->pdf->Line($x, $y, $x + 280, $y);
				    	$listadop=$this->Restablecimientos_model->listado_p($inicio);	
						foreach ($listadop as $row2):           
							$codigo=$row2->id; 
							$establecimiento=$row2->nombre; 
							$direccion=$row2->direccion;
							$director=$row2->director; 
							$telefono=$row2->telefono;
							$estado=$row2->estado;
							$municipio=$row2->municipio; 
							$parroquia=$row2->parroquia;
							$this->pdf->SetFont('Arial','',10);
				    		$this->pdf->Row(array($codigo,utf8_decode($establecimiento),utf8_decode($direccion),utf8_decode($director),$telefono,utf8_decode($estado),utf8_decode($municipio),utf8_decode($parroquia)));
				        endforeach;
						$y=$this->pdf->GetY();
						$this->pdf->Line($x, $y, $x + 280, $y);	
						$inicio=$inicio+7;
					}	        	
				}
				else {
					$id=$this->input->get('id');
					$this->pdf->AddPage();
					$this->pdf->Image('./assets/img/membrete-oficial_landscape.png',$x,$y,280,20);
					$y=$y+20;
					$this->pdf->SetY($y);
					$this->pdf->SetFont('Arial','B',10);
					$this->pdf->Cell(280,10,'Laboratorio Nacional De Dosimetria Personal Externa',0,1,'C');
					$y=$this->pdf->GetY();
					$y=$y-5;
					$this->pdf->SetY($y);		
					$this->pdf->SetFont('Arial','',8);
					$this->pdf->Cell(280,10,'Listado de Establecimientos Registrados',0,1,'C');
					$y=$this->pdf->GetY();
					$y=$y-5;
					$y=$this->pdf->GetY();
					$this->pdf->Line($x, $y, $x + 200, $y);
					$this->pdf->SetFont('Arial','B',10);
					$this->pdf->SetWidths(array(25,40,70,20,30,30,40,40));			
		    		$this->pdf->Row(array('Codigo','Nombre','Direccion','Director','Telefono','Estado','Municipio','Parroquia'));			

					$this->pdf->Line($x, $y, $x + 280, $y);
			    	$y=$this->pdf->GetY();
			    	$this->pdf->Line($x, $y, $x + 280, $y);	
					foreach ($listado as $row2):           
						$codigo=$row2->id; 
						$establecimiento=$row2->nombre; 
						$direccion=$row2->direccion;
						$director=$row2->director; 
						$telefono=$row2->telefono;
						$estado=$row2->estado;
						$municipio=$row2->municipio; 
						$parroquia=$row2->parroquia;
						$this->pdf->SetFont('Arial','',10);
			    		$this->pdf->Row(array($codigo,utf8_decode($establecimiento),utf8_decode($direccion),utf8_decode($director),$telefono,utf8_decode($estado),utf8_decode($municipio),utf8_decode($parroquia)));
			        endforeach;
					$y=$this->pdf->GetY();
					$this->pdf->Line($x, $y, $x + 280, $y);	
				}
				break;
			case 2:
				$idestado=$this->input->get('estado');
				$id=$this->input->get('id');				
				$listado=$this->Restablecimientos_model->listado_e($idestado);
				$dj=time();
				$dd=strftime("%d",$dj);
				$mes=strftime("%M",$dj);
				$anio=strftime("%Y",$dj);     
			   	$fechadeemision=$dd.'/'.$mes.'/'.$anio;			
				$p=0;
				foreach ($listado as $row2):           
					$p++;
		        endforeach;
		        if ($p>7) {
		        	$pg=round($p/7);
		        	for ($pag=0 ; $pag<$pg; $pag++){
						$x=5;
						$y=5;
						$id=$this->input->get('id');
						$this->pdf->AddPage();						
						$this->pdf->SetY($y);
						$this->pdf->SetX($x);						
						$this->pdf->Image('./assets/img/membrete-oficial_landscape.png',$x,$y,280,20);
						$y=$y+20;
						$this->pdf->SetY($y);
						$this->pdf->SetFont('Arial','B',10);
						$this->pdf->Cell(280,10,'Laboratorio Nacional De Dosimetria Personal Externa',0,1,'C');
						$y=$this->pdf->GetY();
						$y=$y-5;
						$this->pdf->SetY($y);		
						$this->pdf->SetFont('Arial','',8);
						$this->pdf->Cell(280,10,'Listado de Establecimientos Registrados',0,1,'C');
						$y=$this->pdf->GetY();
						$y=$y-5;
						$y=$this->pdf->GetY();
						$this->pdf->Line($x, $y, $x + 200, $y);
						$this->pdf->SetFont('Arial','B',10);
						$this->pdf->SetWidths(array(25,40,70,20,30,30,40,40));			
			    		$this->pdf->Row(array('Codigo','Nombre','Direccion','Director','Telefono','Estado','Municipio','Parroquia'));			

						$this->pdf->Line($x, $y, $x + 280, $y);
				    	$y=$this->pdf->GetY();
				    	$this->pdf->Line($x, $y, $x + 280, $y);
				    	$listadoep=$this->Restablecimientos_model->listado_ep($inicio,$idestado);	
						foreach ($listadoep as $row2):           
							$codigo=$row2->id; 
							$establecimiento=$row2->nombre; 
							$direccion=$row2->direccion;
							$director=$row2->director; 
							$telefono=$row2->telefono;
							$estado=$row2->estado;
							$municipio=$row2->municipio; 
							$parroquia=$row2->parroquia;
							$this->pdf->SetFont('Arial','',10);
				    		$this->pdf->Row(array($codigo,utf8_decode($establecimiento),utf8_decode($direccion),utf8_decode($director),$telefono,utf8_decode($estado),utf8_decode($municipio),utf8_decode($parroquia)));
				        endforeach;
						$y=$this->pdf->GetY();
						$this->pdf->Line($x, $y, $x + 280, $y);	
						$inicio=$inicio+7;
					}	        	
				}
				else {
					$id=$this->input->get('id');
					$this->pdf->AddPage();
					$this->pdf->Image('./assets/img/membrete-oficial_landscape.png',$x,$y,280,20);
					$y=$y+20;
					$this->pdf->SetY($y);
					$this->pdf->SetFont('Arial','B',10);
					$this->pdf->Cell(280,10,'Laboratorio Nacional De Dosimetria Personal Externa',0,1,'C');
					$y=$this->pdf->GetY();
					$y=$y-5;
					$this->pdf->SetY($y);		
					$this->pdf->SetFont('Arial','',8);
					$this->pdf->Cell(280,10,'Listado de Establecimientos Registrados',0,1,'C');
					$y=$this->pdf->GetY();
					$y=$y-5;
					$y=$this->pdf->GetY();
					$this->pdf->Line($x, $y, $x + 200, $y);
					$this->pdf->SetFont('Arial','B',10);
					$this->pdf->SetWidths(array(25,40,70,20,30,30,40,40));			
		    		$this->pdf->Row(array('Codigo','Nombre','Direccion','Director','Telefono','Estado','Municipio','Parroquia'));			

					$this->pdf->Line($x, $y, $x + 280, $y);
			    	$y=$this->pdf->GetY();
			    	$this->pdf->Line($x, $y, $x + 280, $y);	
					foreach ($listado as $row2):           
						$codigo=$row2->id; 
						$establecimiento=$row2->nombre; 
						$direccion=$row2->direccion;
						$director=$row2->director; 
						$telefono=$row2->telefono;
						$estado=$row2->estado;
						$municipio=$row2->municipio; 
						$parroquia=$row2->parroquia;
						$this->pdf->SetFont('Arial','',10);
			    		$this->pdf->Row(array($codigo,utf8_decode($establecimiento),utf8_decode($direccion),utf8_decode($director),$telefono,utf8_decode($estado),utf8_decode($municipio),utf8_decode($parroquia)));
			        endforeach;
					$y=$this->pdf->GetY();
					$this->pdf->Line($x, $y, $x + 280, $y);	
				}
				break;
			case 3:
				$idestablecimiento=$this->input->get('establecimiento');				
				$id=$this->input->get('id');				
				$listado=$this->Restablecimientos_model->fpersonal_establecimiento_servicios($idestablecimiento);
				$dj=time();
				$dd=strftime("%d",$dj);
				$mes=strftime("%M",$dj);
				$anio=strftime("%Y",$dj);     
			   	$fechadeemision=$dd.'/'.$mes.'/'.$anio;			
				$p=0;
				foreach ($listado as $row2):           
					$p++;
		        endforeach;
		        if ($p>10) {
		        	$pg=round($p/10);
		        	for ($pag=0 ; $pag<$pg; $pag++){
						$x=5;
						$y=5;
						$id=$this->input->get('id');
						$this->pdf->AddPage();						
						$this->pdf->SetY($y);
						$this->pdf->SetX($x);						
						$this->pdf->Image('./assets/img/membrete-oficial_landscape.png',$x,$y,280,20);
						$y=$y+20;
						$this->pdf->SetY($y);
						$this->pdf->SetFont('Arial','B',10);
						$this->pdf->Cell(280,10,'Laboratorio Nacional De Dosimetria Personal Externa',0,1,'C');
						$y=$this->pdf->GetY();
						$y=$y-5;
					$txtestablecimiento=$this->Establecimientos_model-> get_nombre($idestablecimiento);
					$this->pdf->SetY($y);		
					$this->pdf->SetFont('Arial','',8);
					$this->pdf->Cell(280,10,'Listado de Personal Ocupacionalmente Expuesto a Radiaciones Establecimiento:'.utf8_decode($txtestablecimiento),0,1,'C');
						$y=$this->pdf->GetY();
						$y=$y-5;
						$y=$this->pdf->GetY();
						$this->pdf->Line($x, $y, $x + 200, $y);
						$this->pdf->SetFont('Arial','B',10);
						$this->pdf->SetWidths(array(25,40,20,20,40,40,70,40));			
			    		$this->pdf->Row(array('Codigo','Nombre','Cedula','Sexo','Cargo','Servicio','Direccion','Telefono'));			

						$this->pdf->Line($x, $y, $x + 280, $y);
				    	$y=$this->pdf->GetY();
				    	$this->pdf->Line($x, $y, $x + 280, $y);
				    	$listadopp=$this->Restablecimientos_model->fpersonal_establecimiento_serviciosp($inicio,$idestablecimiento);	
						foreach ($listadopp as $row2):           
							$codigo=$row2->nidpersonal; 
							$nombre=$row2->nnombre; 
							$direccion=$row2->direccion;
							$sexo=$row2->sexo; 
							$telefono=$row2->telefono;
							$cargo=$row2->cargo;
							$cedula=$row2->cedula; 
							$servicio=$row2->nservicio;
							$this->pdf->SetFont('Arial','',10);
				    		$this->pdf->Row(array($codigo,utf8_decode($nombre),utf8_decode($cedula),$sexo,utf8_decode($cargo),utf8_decode($servicio),utf8_decode($direccion),utf8_decode($telefono)));
				        endforeach;
						$y=$this->pdf->GetY();
						$this->pdf->Line($x, $y, $x + 280, $y);	
						$inicio=$inicio+10;
					}	        	
				}
				else {
					$id=$this->input->get('id');
					$this->pdf->AddPage();
					$this->pdf->Image('./assets/img/membrete-oficial_landscape.png',$x,$y,280,20);
					$y=$y+20;
					$this->pdf->SetY($y);
					$this->pdf->SetFont('Arial','B',10);
					$this->pdf->Cell(280,10,'Laboratorio Nacional De Dosimetria Personal Externa',0,1,'C');
					$y=$this->pdf->GetY();
					$y=$y-5;
					$txtestablecimiento=$this->Establecimientos_model-> get_nombre($idestablecimiento);
					$this->pdf->SetY($y);		
					$this->pdf->SetFont('Arial','',8);
					$this->pdf->Cell(280,10,'Listado de Personal Ocupacionalmente Expuesto a Radiaciones Establecimiento:'.utf8_decode($txtestablecimiento),0,1,'C');
					$y=$this->pdf->GetY();
					$y=$y-5;
					$y=$this->pdf->GetY();
					$this->pdf->Line($x, $y, $x + 200, $y);
					$this->pdf->SetFont('Arial','B',10);
					$this->pdf->SetWidths(array(25,40,20,20,40,40,70,40));			
			    	$this->pdf->Row(array('Codigo','Nombre','Cedula','Sexo','Cargo','Servicio','Direccion','Telefono'));			

					$this->pdf->Line($x, $y, $x + 280, $y);
				    $y=$this->pdf->GetY();
				    $this->pdf->Line($x, $y, $x + 280, $y);
				    $listado=$this->Restablecimientos_model->fpersonal_establecimiento_serviciosp($inicio,$idestablecimiento);	
					foreach ($listadoep as $row2):           
						$codigo=$row2->nidpersonal; 
						$nombre=$row2->nnombre; 
						$direccion=$row2->direccion;
						$sexo=$row2->sexo; 
						$telefono=$row2->telefono;
						$cargo=$row2->cargo;
						$cedula=$row2->cedula; 
						$servicio=$row2->nservicio;
						$this->pdf->SetFont('Arial','',10);
				    	$this->pdf->Row(array($codigo,utf8_decode($nombre),utf8_decode($cedula),$sexo,utf8_decode($cargo),utf8_decode($servicio),utf8_decode($direccion),utf8_decode($telefono)));
				    endforeach;
					$y=$this->pdf->GetY();
					$this->pdf->Line($x, $y, $x + 280, $y);	
				}
			default:
				# code...
				break;
		}

		$this->pdf->Output();
		$rutacompleta='/var/www/html/sispoe/assets/uploads/reporteestablecimientos/reporte'.$idreporte.'.pdf';		  
		$this->pdf->Output($rutacompleta,'F');
		$this->load->model('Usuario_model');
		$login= $this->session->userdata('username');
		$idusuario=$this->Usuario_model->idusuario_login($login);		
		$tamanio=filesize ($rutacompleta);
		$tipo=filetype ($rutacompleta);
		$archivo=pg_escape_bytea($rutacompleta); 
		$nombre='reporte'.$idreporte.'.pdf';
		 $data=$this->Restablecimientos_model->ireporteestablecimiento( $idreporte ,$idusuario ,$nombre ,$tamanio ,$tipo ,$archivo );  
		if (file_exists($rutacompleta)) {
		    unlink($rutacompleta);
		} 		 	
    }		

}	