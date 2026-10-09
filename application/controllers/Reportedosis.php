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
    	$dd = date("%d",$ff);
		$mes=date("%m",$ff);
    	$anio=date("%Y",$ff);
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
		$direccionestablecimiento=$this->Establecimientos_model->get_direccion($idestablecimiento);
		$estudio=$this->Reportedosis_model->get_estudio($idestudio);
		$datosreporte=$this->Reportedosis_model->freportedosis($idestablecimiento,$idservicio,$idestudio,$fechai,$fechaf);
		$k=0;
		$paginas=0;
		foreach ($datosreporte as $row):           
			$k++;
        endforeach;
        if ($k<15){
        	$paginas=1;
        }
        else {
        	$p=$k/15;
			$paginas=round($p, 1);
		}
		$dj=time();
		$dd=date("d",$dj);
		$mes=date("M",$dj);
		$anio=date("Y",$dj);     
	   	$fechadeemision=$dd.'/'.$mes.'/'.$anio;
		/*$establecimiento=mb_convert_encoding($establecimiento,'ISO-8859-1', 'UTF-8');
        $direccionestablecimiento=mb_convert_encoding($direccionestablecimiento,'ISO-8859-1', 'UTF-8');
        $servicio=mb_convert_encoding($servicio,'ISO-8859-1', 'UTF-8');
        $estudio=mb_convert_encoding($estudio,'ISO-8859-1', 'UTF-8');
        $codigo_obs=mb_convert_encoding('Código de las observaciones:','ISO-8859-1', 'UTF-8').phpversion();
        $metodo=mb_convert_encoding('Método de ensayo basado en ICRU Report 47 (1992)','ISO-8859-1', 'UTF-8');
        $leyenda=mb_convert_encoding('DD: Dosímetro Dañado. NU: Dosímetro no utilizado NR: Dosimetro no Recepcionado DP: Dosímetro Perdido <LD: Dosis menor al límite inferior de detección','ISO-8859-1', 'UTF-8');
        $aprobado_por=mb_convert_encoding('Aprobado por: Gloria Escobar','ISO-8859-1', 'UTF-8');
        $fecha_d_emision=mb_convert_encoding('Fecha de Emisión: '.$fechadeemision,'ISO-8859-1', 'UTF-8' );
        $se_prohibe=mb_convert_encoding('Se prohibe la reproducción total o parcial de este certificado sin la aprobación del Laboratorio que lo emite.','ISO-8859-1', 'UTF-8');
        $nota=mb_convert_encoding('NOTA: Este reporte de Dosis incluye solo los dosímetros devueltos por el establecimiento según la fecha de recepción','ISO-8859-1', 'UTF-8');
        $direccion_postal=mb_convert_encoding('Dirección postal:','ISO-8859-1', 'UTF-8');
        $direccion_general=mb_convert_encoding('Dirección Genearal de Salud Ambiental, Galpón 10 Las Delicias Maracay - Venezuela','ISO-8859-1', 'UTF-8');
        $telef=mb_convert_encoding('Telef: 0243-2428707 Fax: 0243-2428707','ISO-8859-1', 'UTF-8');*/

		$establecimiento=utf8_decode($establecimiento);
        $direccionestablecimiento=utf8_decode($direccionestablecimiento);
        $servicio=utf8_decode($servicio);
        $estudio=utf8_decode($estudio);
        $codigo_obs=utf8_decode('Código de las observaciones: ');
        $metodo=utf8_decode('Método de ensayo basado en ICRU Report 47 (1992)');
        $leyenda=utf8_decode('DD: Dosímetro Dañado. NU: Dosímetro no utilizado NR: Dosimetro no Recepcionado DP: Dosímetro Perdido <LD: Dosis menor al límite inferior de detección');
        $aprobado_por=utf8_decode('Aprobado por: Edward Martinez');
        $fecha_d_emision=utf8_decode('Fecha de Emisión:').$fechadeemision;
        $se_prohibe=utf8_decode('Se prohibe la reproducción total o parcial de este certificado sin la aprobación del Laboratorio que lo emite.');
        $nota=utf8_decode('NOTA: Este reporte de Dosis incluye solo los dosímetros devueltos por el establecimiento según la fecha de recepción');
        $direccion_postal=utf8_decode('Dirección postal:');
        $direccion_general=utf8_decode('Dirección Genearal de Salud Ambiental, Galpón 10 Las Delicias Maracay - Venezuela');
        $telef=utf8_decode('Telef: 0243-2428707 Fax: 0243-2428707');

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
		$this->pdf->Cell(200,10,'Certificado No.:399-'.$idestablecimiento.'-'.$idestudio.'-'.$idservicio.'-'.str_replace('/', '-', $fechaf),0,1,'C');
		$y=$this->pdf->GetY();
		$y=$y-5;
		$this->pdf->SetY($y);						
		$this->pdf->SetFont('Arial','B',12);
		$this->pdf->Cell(200,10,'Reporte de Dosis Equivalente Personal HP(10)',0,1,'C');
		$y=$this->pdf->GetY();
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);		
		$this->pdf->SetFont('Arial','B',10);
	    $this->pdf->SetFontsMC(array('B','','B',''));
	    $this->pdf->SetWidths(array(25,100,25,50));
	    $this->pdf->SetHeight(5);
		$this->pdf->SetX($x);	
		$this->pdf->Row(array('Institucion:',$establecimiento.' ('.$idestablecimiento.')','Estado:',$estado));
	    $this->pdf->SetFontsMC(array('B','','B',''));
	    $this->pdf->SetX($x);
	    $this->pdf->SetWidths(array(25,100,45,30));
		$this->pdf->Row(array('Direccion:',$direccionestablecimiento,'Fecha de Evaluacion:',''));
		if(strlen($establecimiento)>45){
			$y=$y+10;
		}
		if(strlen($direccionestablecimiento)>45){
			$y=$y+10;
		}
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(25,10,'Servicio:',0,0,'L');
		$this->pdf->SetFont('Arial','',10);		
		$this->pdf->Cell(100,10,$servicio,0,0,'L');
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
		$this->pdf->Cell(100,10,$estudio,0,1,'L');		
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
		$this->pdf->Line($x, $y, $x + 200, $y);
    	$y=$this->pdf->GetY();
	    $this->pdf->Line($x, $y+7, $x + 200, $y+7);
    	$nro=0;	
    	$this->pdf->SetFontsMC(array('','','','',''));
    	$this->pdf->SetWidths(array(10,30,80,40,40));
    	$this->pdf->SetHeight(8);
		$this->pdf->Row(array('No','Codigo','Nombres y Apellidos','Dosis (mSv)','Dosis Anual (*)'));	
		foreach ($datosreporte as $row2):           
			$nro++;
			$idpersona=$row2->nidpersona; 
			$personal=$row2->nnombre;
			$dosis=$row2->ndosis; 
			$acum=$row2->nacumulada;
            if($idpersona==0){
		        $this->pdf->SetFont('Arial','',10);
                $this->pdf->Row(array($nro,$idpersona,'TESTIGO',$dosis,'-'));
		    }
		    else{
		        $this->pdf->SetFont('Arial','',10);
		        //$this->pdf->Row(array($nro,$idpersona,mb_convert_encoding($personal,'ISO-8859-1', 'UTF-8'),$dosis,$acum));
		        $this->pdf->Row(array($nro,$idpersona,utf8_decode($personal),round($dosis,2),round($acum,2)));
		    }
        endforeach;
		$y=$this->pdf->GetY();
		$this->pdf->Line($x, $y, $x + 200, $y);
		$this->pdf->SetFont('Arial','',8);		
		$this->pdf->Cell(100,10,$codigo_obs,0,0,'L');
		$this->pdf->Cell(100,10,$metodo,0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);			
		$this->pdf->Cell(100,10,$leyenda,0,1,'L');
		$y=$this->pdf->GetY();
		$this->pdf->Line($x, $y, $x + 200, $y);							
		$this->pdf->Cell(60,10,$aprobado_por,0,0,'L');
		$this->pdf->Cell(40,10,'Firma:',0,0,'L');
		$this->pdf->Cell(40,10,'Cargo: Jefe de Servicio',0,0,'L');
		$this->pdf->Cell(40,10,$fecha_d_emision,0,1,'L');
		$y=$this->pdf->GetY();
		$this->pdf->Line($x, $y, $x + 200, $y);	
		$this->pdf->SetFont('Arial','B',8);
		$this->pdf->Cell(100,10,$se_prohibe,0,1,'L');
		$old_x=$x;
		$old_y=$y;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);								
		//$this->pdf->Image('./assets/img/sello.png',$x+70,$y+15,50,50);
		//$this->pdf->Image('./assets/img/firma.png',$x+60,$y+15,80,50);
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);
		$this->pdf->SetFont('Arial','',8);		
		$this->pdf->Cell(100,10,$nota,0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);
		$this->pdf->SetFont('Arial','B',8);		
		$this->pdf->Cell(100,10,$direccion_postal,0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);
		$this->pdf->SetFont('Arial','',8);		
		$this->pdf->Cell(100,10,$direccion_general,0,1,'L');
		$y=$this->pdf->GetY();
		$y=$y-4;
		$this->pdf->SetY($y);
		$this->pdf->SetX($x);
		$this->pdf->SetFont('Arial','B',8);		
		$this->pdf->Cell(100,10,$telef,0,1,'L');
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
            $this->pdf->Cell(200,10,'Certificado No.:399-'.$idestablecimiento.'-'.$idestudio.'-'.$idservicio.'-'.str_replace('/', '-', $fechaf),0,1,'C');
			$y=$this->pdf->GetY();
			$y=$y-5;
			$this->pdf->SetY($y);						
			$this->pdf->SetFont('Arial','B',12);
			$this->pdf->Cell(200,10,'Reporte de Dosis Equivalente Personal HP(10)',0,1,'C');
			$y=$this->pdf->GetY();
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);		
			$this->pdf->SetFont('Arial','B',10);
	        $this->pdf->SetFontsMC(array('B','','B',''));
	        $this->pdf->SetWidths(array(25,100,25,50));
	        $this->pdf->SetHeight(5);
		    $this->pdf->Row(array('Institucion:',$establecimiento.' ('.$idestablecimiento.')','Estado:',$estado));
		    $this->pdf->SetX($x);
	        $this->pdf->SetFontsMC(array('B','','B',''));
	        $this->pdf->SetWidths(array(25,100,45,30));
		    $this->pdf->Row(array('Direccion:',$direccionestablecimiento,'Fecha de Evaluacion:',''));
			$y=$this->pdf->GetY();
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);		
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(25,10,'Servicio:',0,0,'L');
			$this->pdf->SetFont('Arial','',10);		
			$this->pdf->Cell(100,10,$servicio,0,0,'L');
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
			$this->pdf->Cell(100,10,$estudio,0,1,'L');		
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
			$this->pdf->Line($x, $y, $x + 200, $y);
	    	$y=$this->pdf->GetY();
	    	$this->pdf->Line($x, $y+7, $x + 200, $y+7);	
	    	$this->pdf->SetFontsMC(array('','','','',''));
	    	$this->pdf->SetWidths(array(10,30,80,40,40));
	    	$this->pdf->SetHeight(8);
		    $this->pdf->Row(array('No','Codigo','Nombres y Apellidos','Dosis (mSv)','Dosis Anual (*)'));
			foreach ($datosreporte_p as $row2): 
                $nro++;
                $idpersona=$row2->nidpersona; 
                $personal=$row2->nnombre;
                $dosis=$row2->ndosis; 
                $acum=$row2->nacumulada;
                if($idpersona==0){
                	$this->pdf->Row(array($nro,$idpersona,'TESTIGO',round($dosis,2),'-'));
                }
                else{
                    $this->pdf->SetFont('Arial','',10);
                    //$this->pdf->Row(array($nro,$idpersona,mb_convert_encoding($personal,'ISO-8859-1', 'UTF-8'),$dosis,$acum));
                    $this->pdf->Row(array($nro,$idpersona,utf8_decode($personal),round($dosis,2),round($acum,2)));
                }			          
	        endforeach;
			$y=$this->pdf->GetY();
			$this->pdf->Line($x, $y, $x + 200, $y);
			$this->pdf->SetFont('Arial','',8);		
			$this->pdf->Cell(100,10,$codigo_obs,0,0,'L');
			$this->pdf->Cell(100,10,$metodo,0,1,'L');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);			
			$this->pdf->Cell(100,10,$leyenda,0,1,'L');
			$y=$this->pdf->GetY();
			$this->pdf->Line($x, $y, $x + 200, $y);							
			$this->pdf->Cell(60,10,$aprobado_por,0,0,'L');
			$this->pdf->Cell(40,10,'Firma:',0,0,'L');
			$this->pdf->Cell(40,10,'Cargo: Jefe de Servicio',0,0,'L');
			$this->pdf->Cell(40,10,$fecha_d_emision,0,1,'L');
			$y=$this->pdf->GetY();
			$this->pdf->Line($x, $y, $x + 200, $y);	
			$this->pdf->SetFont('Arial','B',8);
			$this->pdf->Cell(100,10,$se_prohibe,0,1,'L');
			$old_x=$x;
			$old_y=$y;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);								
			//$this->pdf->Image('./assets/img/sello.png',$x+70,$y+15,50,50);
		   // $this->pdf->Image('./assets/img/firma.png',$x+60,$y+15,80,50);
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);
			$this->pdf->SetFont('Arial','',8);		
			$this->pdf->Cell(100,10,$nota,0,1,'L');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);
			$this->pdf->SetFont('Arial','B',8);		
			$this->pdf->Cell(100,10,$direccion_postal,0,1,'L');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);
			$this->pdf->SetFont('Arial','',8);		
			$this->pdf->Cell(100,10,$direccion_general,0,1,'L');
			$y=$this->pdf->GetY();
			$y=$y-4;
			$this->pdf->SetY($y);
			$this->pdf->SetX($x);
			$this->pdf->SetFont('Arial','B',8);		
			$this->pdf->Cell(100,10,$telef,0,1,'L');
			$limite=$limite+15;
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