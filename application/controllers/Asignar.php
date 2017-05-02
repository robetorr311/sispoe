<?php
class Asignar extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Asignar_model');
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
			$idcontrolador=$this->Controladores_model->get_id('Asignar');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);
			$data['listado']=$this->Asignar_model->listado();
			$data['pendientes']=$this->Asignar_model->pendientes();
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Asignar');
			$this->add_view('asignar/asignar_inicial_view',$data);
		}
	}
	public function actualizar()
	{
		$this->load->model('Asignar_model');
		$data['pendientes']=$this->Asignar_model->pendientes();
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Asignar');
		$this->load->view('asignar/listadopendiente',$data);		
	}
	public function procesados()
	{
		$this->load->model('Asignar_model');
		$data['listado']=$this->Asignar_model->listado();
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Asignar');
		$this->load->view('asignar/listadoprocesado',$data);				
	}		
	public function preparar()
	{
		$this->load->model('Asignar_model');
		$id=$this->input->post('id');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Asignar');
		$data['iddoc']=$id;
		$data['vdosimetros']=$this->Asignar_model->vdosimetrospreparados($id);
		$data['numerotar']=$this->Asignar_model->contar_pendientes($id);
		$this->load->view('asignar/asignar_dosim_view',$data);				
	}
	public function comprueba_dosimetro()
	{
		$this->load->model('Asignar_model');
		$iddosimetro=$this->input->post('iddosimetro');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Asignar');
		$data['conteo']=$this->Asignar_model->compruebadosimetro($iddosimetro);
		$this->load->view('asignar/compruebadosimetro',$data);				
	}	
	public function comprueba_tarjeta()
	{
		$this->load->model('Asignar_model');
		$tarjeta=$this->input->post('tarjeta');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Asignar');
		$data['idtarjeta']=$this->Asignar_model->compruebatarjeta($tarjeta);
		$this->load->view('asignar/compruebatarjeta',$data);				
	}	
	public function fasignar()
	{
		$this->load->model('Asignar_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Asignar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 11,$idsesion);
		$hdosimetro=$this->input->post('dosimetro');
		$tarjeta=$this->input->post('tarjeta');
		$iddocumento=$this->Asignar_model->get_iddocumento($hdosimetro);
		$htarjeta=$this->Asignar_model->get_idtarjeta($tarjeta);	
		$this->Asignar_model->asignar($iddocumento, $hdosimetro , $htarjeta);
		$pendientes=$this->Asignar_model->contar_pendientes($iddocumento);
		if ($pendientes>0){
			$data['pendientes']=$this->Asignar_model->contar_pendientes($iddocumento);
			$data['preparados']=$this->Asignar_model->contar_preparados($iddocumento);        
			$data['iddocumento']=$iddocumento; 
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Asignar');
			$this->load->view('asignar/modal_dosimetro',$data);
		}
		else{
			$data['preparados']=$this->Asignar_model->contar_preparados($iddocumento); 
			$this->load->model('Menu_model');			
			$data['color']=$this->Menu_model->get_color('Asignar');
			$this->load->view('asignar/registro_fin',$data);
		}
								
	}
	public function modal_asignacion()
	{
		$this->load->model('Asignar_model');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Asignar');
		$this->load->view('asignar/modal_dosimetro',$data);		
	}		
	public function registro()
	{
		$this->load->model('Asignar_model');
		$dosimetro=$this->input->post('dosimetro');
		$registro=$this->Asignar_model->registro_ind($dosimetro);
		foreach ($registro as $row):           
			$iddosimetro=$row->id; 
			$idtarjeta=$row->idtarjeta; 
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
			$tipo=$row->tipo; 			 
        endforeach;
		$data['pendientes']=$this->Asignar_model->contar_pendientes($iddocumento);
		$data['preparados']=$this->Asignar_model->contar_preparados($iddocumento);        
		$data['dosimetro']=$iddosimetro; 
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
		$data['tipo']=$tipo;        
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Asignar');
		$this->load->view('asignar/datos_dosimetro',$data);
	}
    public function ok_tarjeta(){

    	$tarjeta=$this->input->post('tarjeta');
    	$data['tarjeta']=$tarjeta; 
       	$this->load->view('asignar/ok_tarjeta',$data);
    } 		
    public function error_tarjeta(){
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Asignar');    	
       $this->load->view('asignar/error_tarjeta',$data);
    }
    public function error_dosimetro(){
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Asignar');    	
       $this->load->view('asignar/error_dosimetro',$data);
    }
    public function ok_dosimetro(){
    	$iddosimetro=$this->input->post('iddosimetro');
    	$data['iddosimetro']=$iddosimetro; 
       	$this->load->view('asignar/ok_dosimetro',$data);
    }         
    public function acta(){
    	$ff=time();
    	$dd = strftime("%d",$ff);
		$mes=strftime("%m",$ff);
    	$anio=strftime("%Y",$ff);
    	$fecha=$dd.'-'.$mes.'-'.$anio;
    	$yy=0;
		$xx=0;
		$x=5;
		$y=5;
		$this->load->model('Asignar_model');
		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Asignar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 14,$idsesion);		
		$id=$this->input->get('id');
		$registro_doc=$this->Asignar_model->registro_doc($id);
		foreach ($registro_doc as $row):           
			$id=$row->id; 
			$numero=$row->numero; 
			$hdestino=$row->hdestino; 
			$fechad=$row->date;
			$idtipogenerado=$row->idtipogenerado;  
        endforeach;
        switch ($idtipogenerado) {
        	case 1:
        		$establecimiento="TODOS LOS ESTABLECIMIENTOS";
        		$estado="TODOS LOS ESTADOS DEL PAIS";
        		break;
        	case 2:
				$estado=$this->Ubicacion_model->estado($hdestino);
				$establecimiento=$this->Establecimientos_model->get_nombre($hdestino);
        		break;
        	case 3:
				$estado=$this->Ubicacion_model->estado($hdestino);
				$establecimiento="TODOS LOS ESTABLECIMIENTOS DEL ESTADO ".$estado;
        		break;
        }
        $fed=explode('-',$fechad);
        if(strlen($fed[0])==4){
            $fechadoc=$fed[2].'-'.$fed[1].'-'.$fed[0];
        }        
        $rec_dosim=$this->Asignar_model->vdosimetrosasignados($id);
		foreach ($rec_dosim as $row2):           
			$dosimetro=$row2->id; 
			$servicio=$row2->servicio; 
			$fechai=$row2->fechainicio; 
			$fechaf=$row2->fechafin;
			$estudio=$row2->estudio;			 
        endforeach;
        $fei=explode('-',$fechai);
        if(strlen($fei[0])==4){
            $fechainicio=$fei[2].'-'.$fei[1].'-'.$fei[0];
        }
        $fef=explode('-',$fechaf);
        if(strlen($fef[0])==4){
            $fechafin=$fef[2].'-'.$fef[1].'-'.$fef[0];
        }
        $cantidad=$this->Asignar_model->contar_asignados($id);        
	   	$this->load->library('pdf');		
		$id=$this->input->get('id');
		$this->pdf=new PDF_MC_Table();
		$this->pdf->AddPage();
		$this->pdf->Image('./assets/img/membrete-oficial.png',$x,$y,200,20);
		$y=$y+20;
		$this->pdf->SetY($y);
		$this->pdf->SetFont('Arial','B',12);
		$this->pdf->Cell(200,10,'ACTA DE ENTREGA',0,1,'C');
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->Cell(200,10,'Fecha de Emision: '.$fecha,0,1,'C');
		$this->pdf->Cell(200,10,'Institucion: '.utf8_decode($establecimiento),0,1,'L');
		$this->pdf->Cell(200,10,'Estado: '.utf8_decode($estado),0,1,'L');
		$y=$this->pdf->GetY();
		$this->pdf->SetWidths(array(40,30,50,45,30));
		$this->pdf->Line($x, $y, $x + 200, $y);		
    	$this->pdf->Row(array('Servicios','Preparados','Periodo de Control','Control Dosimetrico','Cant. de Dosimetros'));
    	$this->pdf->Line($x, $y+10, $x + 200, $y+10);
    	$this->pdf->Line($x, $y+20, $x + 200, $y+20);    		
    	$this->pdf->Row(array(utf8_decode($servicio),$fechadoc,$fechainicio.' - '.$fechafin,utf8_decode($estudio),$cantidad)); 
    	$this->pdf->SetY($y+40); 
    	$this->pdf->Line($x+40, $y+50, $x + 90, $y+50);
    	$this->pdf->Line($x+140, $y+50, $x + 190, $y+50);    	
    	$this->pdf->Line($x+40, $y+60, $x + 90, $y+60);
    	$this->pdf->Line($x+140, $y+60, $x + 190, $y+60);
    	$this->pdf->Line($x+40, $y+70, $x + 90, $y+70);
    	$this->pdf->Line($x+140, $y+70, $x + 190, $y+70);    	     	    	
		$this->pdf->Cell(100,10,'Entregado por: ',0,0,'L');
		$this->pdf->Cell(100,10,'Recibido por: ',0,1,'L');
		$this->pdf->Cell(100,10,'Fecha: ',0,0,'L');
		$this->pdf->Cell(100,10,'Fecha: ',0,1,'L');		
		$this->pdf->Cell(100,10,'Firma: ',0,0,'L');
		$this->pdf->Cell(100,10,'Firma: ',0,1,'L');		
		$this->pdf->Output();    	
    } 
    public function constancia(){
    	$ff=time();
    	$dd = strftime("%d",$ff);
		$mes=strftime("%m",$ff);
    	$anio=strftime("%Y",$ff);
    	$fecha=$dd.'-'.$mes.'-'.$anio;
    	$yy=0;
		$xx=0;
		$x=5;
		$y=5;
		$this->load->model('Asignar_model');
		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Asignar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 15,$idsesion);				
		$id=$this->input->get('id');
		$registro_doc=$this->Asignar_model->registro_doc($id);
		foreach ($registro_doc as $row):           
			$id=$row->id; 
			$numero=$row->numero; 
			$hdestino=$row->hdestino; 
			$fechad=$row->date;
			$idtipogenerado=$row->idtipogenerado;  
        endforeach;
        switch ($idtipogenerado) {
        	case 1:
        		$establecimiento="TODOS LOS ESTABLECIMIENTOS";
        		$estado="TODOS LOS ESTADOS DEL PAIS";
        		break;
        	case 2:
				$estado=$this->Ubicacion_model->estado($hdestino);
				$establecimiento=$this->Establecimientos_model->get_nombre($hdestino);
        		break;
        	case 3:
				$estado=$this->Ubicacion_model->estado($hdestino);
				$establecimiento="TODOS LOS ESTABLECIMIENTOS DEL ESTADO ".$estado;
        		break;
        }        
        $fed=explode('-',$fechad);
        if(strlen($fed[0])==4){
            $fechadoc=$fed[2].'-'.$fed[1].'-'.$fed[0];
        }        
        $rec_dosim=$this->Asignar_model->vdosimetrosasignados($id);
		foreach ($rec_dosim as $row2):           
			$dosimetro=$row2->id; 
			$servicio=$row2->servicio; 
			$fechai=$row2->fechainicio; 
			$fechaf=$row2->fechafin;
			$estudio=$row2->estudio;			 
        endforeach;
        $fei=explode('-',$fechai);
        if(strlen($fei[0])==4){
            $fechainicio=$fei[2].'-'.$fei[1].'-'.$fei[0];
        }
        $fef=explode('-',$fechaf);
        if(strlen($fef[0])==4){
            $fechafin=$fef[2].'-'.$fef[1].'-'.$fef[0];
        }
        $cantidad=$this->Asignar_model->contar_asignados($id);        
	   	$this->load->library('pdf');		
		$id=$this->input->get('id');
		$this->pdf=new PDF_MC_Table();
		$this->pdf->AddPage();
		$this->pdf->Image('./assets/img/membrete-oficial.png',$x,$y,200,20);
		$y=$y+20;
		$this->pdf->SetY($y);
		$this->pdf->SetFont('Arial','B',12);
		$this->pdf->Cell(200,10,'CONSTANCIA DE ENTREGA UTILIZACION Y DEVOLUCION DE DOSIMETROS',0,1,'C');
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->Cell(200,10,'Fecha de Emision: '.$fecha,0,1,'C');
		$this->pdf->Cell(140,10,'Institucion: '.utf8_decode($establecimiento),0,0,'L');
		$this->pdf->Cell(50,10,'Estudio: '.$estudio,0,1,'L');
		$this->pdf->Cell(140,10,'Servicio: '.utf8_decode($servicio),0,0,'L');
		$this->pdf->Cell(50,10,'Periodo: '.$fechainicio.' - '.$fechafin,0,1,'L');
		$this->pdf->Cell(200,10,'Estado: '.utf8_decode($estado),0,1,'L');
		$y=$this->pdf->GetY();
		$this->pdf->SetWidths(array(10,30,100,30,30));
		$this->pdf->Line($x, $y, $x + 200, $y);	
    	$this->pdf->Row(array('No.','Codigo Personal','Nombre','Dosimetro','Observaciones'));
    	$y=$this->pdf->GetY();
    	$this->pdf->Line($x, $y, $x + 200, $y);	
    	$n=0;		
		foreach ($rec_dosim as $row2):           
			$n++;
			$dosimetro=$row2->id; 
			$idpersona=$row2->idpersona; 
			$personal=$row2->personal; 
    	$this->pdf->Row(array($n,$idpersona,utf8_decode($personal),$dosimetro,'')); 	 
        endforeach;			

		$this->pdf->Output();    	
    } 		    		
}	