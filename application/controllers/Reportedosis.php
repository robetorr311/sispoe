<?php
class Reportedosis extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Reportedosis_model');
		$this->load->model('Ubicacion_model');
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
			$idcontrolador=$this->Controladores_model->get_id('Reportedosis');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$data['estados']=$this->Ubicacion_model->select_estados();
			$data['estudio']=$this->Generar_model->select_estudio();		
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Reportedosis');
			$this->add_view('reportedosis/reportedosis_inicial_view',$data);
		}
	}
	public function pservicios()
	{
		$this->load->model('Reportedosis_model');
		$establecimiento=$this->input->post('id');
		$servicios=$this->Reportedosis_model->fservicio_establecimiento($establecimiento);
		$data['servicios']=$servicios;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Reportedosis');
		$this->load->view('reportedosis/servicios_ok',$data);				
	}
	public function pestablecimientos()
	{
		$this->load->model('Generar_model');
		$estado=$this->input->post('estado');
		$establecimientos=$this->Generar_model->select_establecimiento($estado);
		$data['establecimientos']=$establecimientos;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$this->load->view('reportedosis/establecimientos',$data);				
	}	
	public function button_pdf()
	{
		$this->load->model('Reportedosis_model');
		$data['idreporte']=$this->Reportedosis_model->get_id();
		$data['ruta']=$this->input->post('ruta');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Reportedosis');
		$this->load->view('reportedosis/button_pdf',$data);				
	}
    public function error_fechai(){
       $this->load->view('reportedosis/error_fechai');
    } 
    public function error_fechaf(){
       $this->load->view('reportedosis/error_fechaf');
    }
    public function error_establecimientos_no(){
       $this->load->view('reportedosis/error_establecimientos_no');
    }
    public function error_establecimientos(){
		$this->load->model('Generar_model');
		$estado=$this->input->post('estado');
		$establecimientos=$this->Generar_model->select_establecimiento($estado);
		$data['establecimientos']=$establecimientos;
       $this->load->view('reportedosis/error_establecimientos',$data);
    }          
    public function error_estados(){
		$this->load->model('Ubicacion_model');
		$estados=$this->Ubicacion_model->select_estados();
		$data['estados']=$estados;
       $this->load->view('reportedosis/error_estados',$data);
    }  
    public function error_servicio_no(){
       $this->load->view('reportedosis/error_servicio_no');
    }       
    public function error_servicio(){
		$this->load->model('Generar_model');
		$establecimiento=$this->input->post('establecimiento');
		$servicios=$this->Generar_model->fservicio_establecimiento($establecimiento);
		$data['servicios']=$servicios;

       $this->load->view('reportedosis/error_servicio',$data);
    }    
    public function error_estudio(){
		$this->load->model('Generar_model');
		$data['estudio']=$this->Generar_model->select_estudio();    	
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
	    $this->load->view('reportedosis/error_estudio',$data);
    }				
    public function generar(){
    	$ff=time();
    	$dd = strftime("%d",$ff);
		$mes=strftime("%m",$ff);
    	$anio=strftime("%Y",$ff);
    	$fecha=$dd.'-'.$mes.'-'.$anio;
    	$yy=0;
		$xx=0;
		$x=5;
		$y=5;

		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');
		$this->load->model('Reportedosis_model');
		$this->load->model('Servicios_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Asignar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 20,$idsesion);			
		$idestado=$this->input->get('estado');
		$idestablecimiento=$this->input->get('establecimiento');  
		$idestudio=$this->input->get('estudio');  
		$idservicio=$this->input->get('servicio'); 
		$fechai=$this->input->get('fechai');
		$fechaf=$this->input->get('fechaf');
		$idreporte=$this->input->get('idreporte');
		$estado=$this->Ubicacion_model->estado($idestado);
		$servicio=$this->Servicios_model->nombreserv($idservicio);
		$establecimiento=$this->Establecimientos_model->get_nombre($idestablecimiento);
		$estudio=$this->Reportedosis_model->get_estudio($idestudio);
		$datosreporte=$this->Reportedosis_model->freportedosis($idestablecimiento,$idservicio,$idestudio,$fechai,$fechaf);
		$k=0;
		$paginas=0;
		foreach ($datosreporte as $row):           
			$k++;
        endforeach;
        if ($k<10){
        	$paginas=1;
        }
        else {
        	$p=$k/10;
			$paginas=round($p, 0);
		}
		$dj=time();
		$dd=strftime("%d",$dj);
		$mes=strftime("%M",$dj);
		$anio=strftime("%Y",$dj);     
	   	$fechadeemision=$dd.'/'.$mes.'/'.$anio;
	   	$this->load->library('pdf');		
		$id=$this->input->get('id');
		$this->pdf=new PDF_MC_Table();
		if ($paginas==1){
		$this->pdf->AddPage();
		$this->pdf->Image('./assets/img/membrete-oficial.png',$x,$y,200,20);
		$y=$y+20;
		$this->pdf->SetY($y);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(200,10,'Laboratorio Nacional De Dosimetria Personal Externa',0,1,'C');
		$y=$this->pdf->GetY();
		$y=$y-5;
		$this->pdf->SetY($y);		
		$this->pdf->SetFont('Arial','',8);
		$this->pdf->Cell(200,10,'Certificado No.:399-457-2-10-22-2-2017',0,1,'C');
		$y=$this->pdf->GetY();
		$y=$y-5;
		$this->pdf->SetY($y);						
		$this->pdf->SetFont('Arial','B',12);
		$this->pdf->Cell(200,10,'Reporte de Dosis Equivalente Personal HP(10)',0,1,'C');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(25,10,'Institucion:',0,0,'L');
		$this->pdf->SetFont('Arial','',10);		
		$this->pdf->Cell(100,10,$establecimiento.' ('.$idestablecimiento.')',0,0,'L');
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(25,10,'Estado:',0,0,'L');					
		$this->pdf->SetFont('Arial','',10);		
		$this->pdf->Cell(50,10,$estado,0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(25,10,'Direccion:',0,0,'L');
		$this->pdf->SetFont('Arial','',10);		
		$this->pdf->Cell(100,10,'',0,0,'L');
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(25,10,'Fecha de Evaluacion:',0,0,'L');		
		$this->pdf->SetFont('Arial','',10);		
		$this->pdf->Cell(50,10,'',0,1,'L');							
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(25,10,'Servicio:',0,0,'L');
		$this->pdf->SetFont('Arial','',10);		
		$this->pdf->Cell(100,10,utf8_decode($servicio),0,0,'L');
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(25,10,'Incertidumbre:',0,0,'L');		
		$this->pdf->SetFont('Arial','',10);		
		$this->pdf->Cell(50,10,'20%',0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,10,'Control Dosimetrico:',0,0,'L');
		$this->pdf->SetFont('Arial','',10);		
		$this->pdf->Cell(100,10,utf8_decode($estudio),0,1,'L');		
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,10,'Periodo de utilizacion:',0,0,'L');
		$this->pdf->SetFont('Arial','',10);		
		$this->pdf->Cell(100,10,$fechai.' - '.$fechaf,0,1,'L');			
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,10,'Fecha de recepcion:',0,0,'L');
		$this->pdf->SetFont('Arial','',10);		
		$this->pdf->Cell(100,10,'',0,1,'L');
		$y=$this->pdf->GetY();
		$this->pdf->Line($x, $y, $x + 200, $y);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(10,10,'No',0,0,'L');
		$this->pdf->Cell(40,10,'Codigo',0,0,'L');
		$this->pdf->Cell(70,10,'Nombres y Apellidos',0,0,'L');
		$this->pdf->Cell(40,10,'Dosis (mSv)',0,0,'L');
		$this->pdf->Cell(40,10,'Dosis Anual (*)',0,1,'L');
		$this->pdf->Line($x, $y, $x + 200, $y);
    	$y=$this->pdf->GetY();
    	$this->pdf->Line($x, $y, $x + 200, $y);	
    	$nro=0;		
		foreach ($datosreporte as $row2):           
			$nro++;
			$idpersona=$row2->nidpersona; 
			$personal=$row2->nnombre;
			$dosis=$row2->ndosis; 
			$acum=$row2->nacumulada;
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->Cell(10,10,$nro,0,0,'L');
		$this->pdf->Cell(40,10,$idpersona,0,0,'L');
		$this->pdf->Cell(70,10,$personal,0,0,'L');
		$this->pdf->Cell(40,10,$dosis,0,0,'L');
		$this->pdf->Cell(40,10,$acum,0,1,'L');	 
        endforeach;
		$y=$this->pdf->GetY();
		$this->pdf->Line($x, $y, $x + 200, $y);
		$this->pdf->SetFont('Arial','',8);		
		$this->pdf->Cell(100,10,utf8_decode('Código de las observaciones:'),0,0,'L');
		$this->pdf->Cell(100,10,utf8_decode('Método de ensayo basado en ICRU Report 47 (1992)'),0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);			
		$this->pdf->Cell(100,10,utf8_decode('DD: Dosímetro Dañado. NU: Dosímetro no utilizado NR: Dosimetro no Recepcionado DP: Dosímetro Perdido <LD: Dosis menor al límite inferior de detección'),0,1,'L');
		$y=$this->pdf->GetY();
		$this->pdf->Line($x, $y, $x + 200, $y);							
		$this->pdf->Cell(60,10,utf8_decode('Aprobado por: Edwars Martinez'),0,0,'L');
		$this->pdf->Cell(40,10,utf8_decode('Firma:'),0,0,'L');
		$this->pdf->Cell(40,10,utf8_decode('Cargo: Jefe de Servicio'),0,0,'L');
		$this->pdf->Cell(40,10,utf8_decode('Fecha de Emisión: '.$fechadeemision ),0,1,'L');
		$y=$this->pdf->GetY();
		$this->pdf->Line($x, $y, $x + 200, $y);	
		$this->pdf->SetFont('Arial','B',8);
		$this->pdf->Cell(100,10,utf8_decode('Se prohibe la reproducción total o parcial de este certificado sin la aprobación del Laboratorio que lo emite.'),0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);
		$this->pdf->SetFont('Arial','',8);		
		$this->pdf->Cell(100,10,utf8_decode('NOTA: Este reporte de Dosis incluye solo los dosómetros devueltos por el establecimiento según la fecha de recepción'),0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);
		$this->pdf->SetFont('Arial','B',8);		
		$this->pdf->Cell(100,10,utf8_decode('Dirección postal:'),0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);
		$this->pdf->SetFont('Arial','',8);		
		$this->pdf->Cell(100,10,utf8_decode('Dirección Genearal de Salud Ambiental, Galpón 10 Las Delicias Maracay - Venezuela'),0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);
		$this->pdf->SetFont('Arial','B',8);		
		$this->pdf->Cell(100,10,utf8_decode('Telef: 0243-2428707 Fax: 0243-2428707'),0,1,'L');
		}
		else {			
		$n=0;
		$nro=0;
		$limite=0;
		$pag=0;
		for ($n=0; $n<$paginas; $n++){
			$datosreporte_p=$this->Reportedosis_model->freportedosis_p($limite,$idestablecimiento,$idservicio,$idestudio,$fechai,$fechaf);
			$this->pdf->AddPage();
			$x=5;
			$y=5;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);								
			$this->pdf->Image('./assets/img/membrete-oficial.png',$x,$y,200,20);
			$y=$y+20;
			$this->pdf->SetY($y);
			$this->pdf->SetFont('Arial','B',10);	
			$this->pdf->Cell(200,10,'Laboratorio Nacional De Dosimetria Personal Externa',0,1,'C');
			$y=$this->pdf->GetY();
			$y=$y-5;
			$this->pdf->SetY($y);		
			$this->pdf->SetFont('Arial','',8);
			$this->pdf->Cell(200,10,'Certificado No.:399-457-2-10-22-2-2017',0,1,'C');
			$y=$this->pdf->GetY();
			$y=$y-5;
			$this->pdf->SetY($y);						
			$this->pdf->SetFont('Arial','B',12);
			$this->pdf->Cell(200,10,'Reporte de Dosis Equivalente Personal HP(10)',0,1,'C');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);		
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(25,10,'Institucion:',0,0,'L');
			$this->pdf->SetFont('Arial','',10);		
			$this->pdf->Cell(100,10,$establecimiento.' ('.$idestablecimiento.')',0,0,'L');
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(25,10,'Estado:',0,0,'L');					
			$this->pdf->SetFont('Arial','',10);		
			$this->pdf->Cell(50,10,$estado,0,1,'L');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);		
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(25,10,'Direccion:',0,0,'L');
			$this->pdf->SetFont('Arial','',10);		
			$this->pdf->Cell(100,10,'',0,0,'L');
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(25,10,'Fecha de Evaluacion:',0,0,'L');		
			$this->pdf->SetFont('Arial','',10);		
			$this->pdf->Cell(50,10,'',0,1,'L');							
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);		
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(25,10,'Servicio:',0,0,'L');
			$this->pdf->SetFont('Arial','',10);		
			$this->pdf->Cell(100,10,utf8_decode($servicio),0,0,'L');
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(25,10,'Incertidumbre:',0,0,'L');		
			$this->pdf->SetFont('Arial','',10);		
			$this->pdf->Cell(50,10,'20%',0,1,'L');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);		
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(40,10,'Control Dosimetrico:',0,0,'L');
			$this->pdf->SetFont('Arial','',10);		
			$this->pdf->Cell(100,10,utf8_decode($estudio),0,1,'L');		
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);		
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(40,10,'Periodo de utilizacion:',0,0,'L');
			$this->pdf->SetFont('Arial','',10);		
			$this->pdf->Cell(100,10,$fechai.' - '.$fechaf,0,1,'L');			
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);
			$pag++;		
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(100,10,'Fecha de recepcion:',0,0,'L');
			$this->pdf->SetFont('Arial','',10);		
			$this->pdf->Cell(100,10,'Pagina'.$pag.'/'.$paginas ,0,1,'L');
			$y=$this->pdf->GetY();
			$this->pdf->Line($x, $y, $x + 200, $y);
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(10,10,'No',0,0,'L');
			$this->pdf->Cell(40,10,'Codigo',0,0,'L');
			$this->pdf->Cell(70,10,'Nombres y Apellidos',0,0,'L');
			$this->pdf->Cell(40,10,'Dosis (mSv)',0,0,'L');
			$this->pdf->Cell(40,10,'Dosis Anual (*)',0,1,'L');
			$this->pdf->Line($x, $y, $x + 200, $y);
	    	$y=$this->pdf->GetY();
	    	$this->pdf->Line($x, $y, $x + 200, $y);	
			foreach ($datosreporte_p as $row2):           
				$nro++;
				$idpersona=$row2->nidpersona; 
				$personal=$row2->nnombre;
				$dosis=$row2->ndosis; 
				$acum=$row2->nacumulada;
			$this->pdf->SetFont('Arial','',10);
			$this->pdf->Cell(10,10,$nro,0,0,'L');
			$this->pdf->Cell(40,10,$idpersona,0,0,'L');
			$this->pdf->Cell(70,10,$personal,0,0,'L');
			$this->pdf->Cell(40,10,$dosis,0,0,'L');
			$this->pdf->Cell(40,10,$acum,0,1,'L');	 
	        endforeach;
			$y=$this->pdf->GetY();
			$this->pdf->Line($x, $y, $x + 200, $y);
			$this->pdf->SetFont('Arial','',8);		
			$this->pdf->Cell(100,10,utf8_decode('Código de las observaciones:'),0,0,'L');
			$this->pdf->Cell(100,10,utf8_decode('Método de ensayo basado en ICRU Report 47 (1992)'),0,1,'L');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);			
			$this->pdf->Cell(100,10,utf8_decode('DD: Dosímetro Dañado. NU: Dosímetro no utilizado NR: Dosimetro no Recepcionado DP: Dosímetro Perdido <LD: Dosis menor al límite inferior de detección'),0,1,'L');
			$y=$this->pdf->GetY();
			$this->pdf->Line($x, $y, $x + 200, $y);							
			$this->pdf->Cell(60,10,utf8_decode('Aprobado por: Edwars Martinez'),0,0,'L');
			$this->pdf->Cell(40,10,utf8_decode('Firma:'),0,0,'L');
			$this->pdf->Cell(40,10,utf8_decode('Cargo: Jefe de Servicio'),0,0,'L');
			$this->pdf->Cell(40,10,utf8_decode('Fecha de Emisión: '.$fechadeemision ),0,1,'L');
			$y=$this->pdf->GetY();
			$this->pdf->Line($x, $y, $x + 200, $y);	
			$this->pdf->SetFont('Arial','B',8);
			$this->pdf->Cell(100,10,utf8_decode('Se prohibe la reproducción total o parcial de este certificado sin la aprobación del Laboratorio que lo emite.'),0,1,'L');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);
			$this->pdf->SetFont('Arial','',8);		
			$this->pdf->Cell(100,10,utf8_decode('NOTA: Este reporte de Dosis incluye solo los dosómetros devueltos por el establecimiento según la fecha de recepción'),0,1,'L');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);
			$this->pdf->SetFont('Arial','B',8);		
			$this->pdf->Cell(100,10,utf8_decode('Dirección postal:'),0,1,'L');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);
			$this->pdf->SetFont('Arial','',8);		
			$this->pdf->Cell(100,10,utf8_decode('Dirección Genearal de Salud Ambiental, Galpón 10 Las Delicias Maracay - Venezuela'),0,1,'L');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);
			$this->pdf->SetFont('Arial','B',8);		
			$this->pdf->Cell(100,10,utf8_decode('Telef: 0243-2428707 Fax: 0243-2428707'),0,1,'L');
			$limite=$limite+10;
		}	
		}
		$this->pdf->Output();
		$rutacompleta='/var/www/html/sispoe/assets/uploads/reportedosis/reporte'.$idreporte.'.pdf';		  
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
		} 		 	
    } 		    		
}