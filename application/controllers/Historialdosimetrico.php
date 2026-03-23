<?php
class Historialdosimetrico extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Personal_model');
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
			$idcontrolador=$this->Controladores_model->get_id('Historialdosimetrico');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$data['listado']=$this->Personal_model->listado();
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Historialdosimetrico');
			$this->add_view('historialdosimetrico/historialdosimetrico_inicial_view',$data);
		}
	}
    public function historial(){
    	$ff=time();
    	$dd = strftime("%d",$ff);
		$mes=strftime("%m",$ff);
    	$anio=strftime("%Y",$ff);
    	$fecha=$dd.'-'.$mes.'-'.$anio;
    	$yy=0;
		$xx=0;
		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');
		$this->load->model('Historialdosimetrico_model');
		$this->load->model('Servicios_model');	
		$this->load->model('Personal_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Historialdosimetrico');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 18,$idsesion);		
		$idpersona=$this->input->get('id');
		$datospersona=$this->Personal_model->registro($idpersona);
		foreach ($datospersona as $frow)
			{
				$pnombre=$frow->nombre;
				$papellido=$frow->apellido1; 
				$sapellido=$frow->apellido2; 
				$cedula=$frow->cedula; 
				$sexo=$frow->sexo; 
				$snombre=$frow->nombre2; 
			}		
		$dj=time();
		$dd=strftime("%d",$dj);
		$mes=strftime("%M",$dj);
		$anio=strftime("%Y",$dj);     
	   	$fechadeemision=$dd.'/'.$mes.'/'.$anio;  	
	   	$this->load->library('pdf');		
		$id=$this->input->get('id');
		$this->pdf=new PDF_MC_Table('L');
		$anios=$this->Historialdosimetrico_model->get_anios($idpersona);
		foreach ($anios as $arow):
		$x=5;
		$y=5;		 
		$this->pdf->SetX($x);			
		$this->pdf->SetY($y);		          
		$this->pdf->AddPage();
		$this->pdf->Image('./assets/img/membrete-oficial_landscape.png',$x,$y,280,20);
		$y=$y+20;
		$this->pdf->SetY($y);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(280,10,'Laboratorio Nacional De Dosimetria Personal Externa',0,1,'C');
		$y=$this->pdf->GetY();
		$y=$y-5;
		$this->pdf->SetY($y);						
		$this->pdf->SetFont('Arial','B',12);
		$this->pdf->Cell(280,10,'Historial Dosimetrico',0,1,'C');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);						
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->Cell(280,10,'Fecha de Emision: '.$fechadeemision,0,1,'C');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);						
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->Cell(100,10,'Codigo Personal: '.$idpersona,0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);						
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->Cell(100,10,utf8_decode('Nombres y Apellidos: '.$pnombre.' '.$snombre.', '.$papellido.' '.$sapellido),0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);						
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->Cell(100,10,'Sexo: '.$sexo,0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);						
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->Cell(100,10,'Cedula de Identidad: '.$cedula,0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;								
		$this->pdf->SetY($y);						
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->Cell(100,10,'Cargo: ',0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);						
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->Cell(100,10,utf8_decode('Año: '.$arow->nanio),0,1,'L');		
		$y=$this->pdf->GetY();
		$this->pdf->Line($x, $y, $x + 280, $y);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(20,10,'Dosimetro',0,0,'L');		
		$this->pdf->Cell(30,10,'Fecha inicio',0,0,'L');
		$this->pdf->Cell(30,10,'Fecha fin',0,0,'L');
		$this->pdf->Cell(20,10,'Dosis',0,0,'L');
		$this->pdf->Cell(50,10,'Control Dosimetrico',0,0,'L');
		$this->pdf->Cell(90,10,'Establecimiento',0,0,'L');
		$this->pdf->Cell(50,10,'Servicio',0,1,'L');
		$y=$this->pdf->GetY();		
		$this->pdf->Line($x, $y, $x + 280, $y);
		$listado=$this->Historialdosimetrico_model->get_historial($idpersona,$arow->nanio);
		foreach ($listado as $lrow):
		$this->pdf->SetY($y);			
			$this->pdf->SetFont('Arial','',10);
			$this->pdf->Cell(20,10,$lrow->ndosimetro,0,0,'L');		
			$this->pdf->Cell(30,10,$lrow->nfechai,0,0,'L');
			$this->pdf->Cell(30,10,$lrow->nfechafin,0,0,'L');
			$this->pdf->Cell(20,10,$lrow->ndosis,0,0,'L');
			$this->pdf->Cell(50,10,utf8_decode($lrow->nestudio),0,0,'L');
			$this->pdf->Cell(90,10,utf8_decode($lrow->nestablecimiento),0,0,'L');
			$this->pdf->Cell(50,10,utf8_decode($lrow->nservicio),0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;			
		endforeach;
		$y=$this->pdf->GetY();
		$this->pdf->Line($x, $y, $x + 280, $y);
        endforeach;	
		$this->pdf->Output();
/*		$rutacompleta='/var/www/html/sispoe/assets/uploads/reportedosis/reporte'.$idreporte.'.pdf';		  
		$this->pdf->Output($rutacompleta,'F');
		$this->load->model('Usuario_model');
		$login= $this->session->userdata('username');
		$idusuario=$this->Usuario_model->idusuario_login($login);		
		$tamanio=filesize ($rutacompleta);
		$tipo=filetype ($rutacompleta);
		$archivo=pg_escape_bytea($rutacompleta); 
		$nombre='reporte'.$idreporte.'.pdf';
		 $data=$this->Reportedosis_model->ireportedosis( $idreporte ,$idusuario ,$nombre ,$tamanio ,$tipo ,$archivo );  
		if (file_exists($rutacompleta)) {
		    unlink($rutacompleta);
		} */		 	
    } 		    		
}