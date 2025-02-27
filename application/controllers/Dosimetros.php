<?php
class Dosimetros extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Dosimetros_model');
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
			$idcontrolador=$this->Controladores_model->get_id('Dosimetros');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$data['listado']=$this->Dosimetros_model->listado();
			$data['tipos']=$this->Dosimetros_model->get_tipo();		
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Dosimetros');
			$this->add_view('dosimetros/dosim_inicial_view',$data);
		}				
	}
	public function nuevo()
	{
		$this->load->model('Dosimetros_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Dosimetros');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 6,$idsesion);		
		$data['estatus']=$this->Dosimetros_model->select_estatus();
		$data['tipos']=$this->Dosimetros_model->get_tipo();		
		$codigo=$this->Dosimetros_model->get_id();
		$data['codigo']=$codigo;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Dosimetros');
		$this->load->view('dosimetros/dosim_new_view',$data);				
	}		
	public function registro()
	{
		$id=$this->input->post('id');
		$this->load->model('Dosimetros_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Dosimetros');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 7,$idsesion);		
		$servicio=$this->Dosimetros_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
				$estatus=$row->estatus; 
				$idtipo=$row->idtipotarjeta;
				$idestatus=$row->idestatus; 
            }
            $tipo=$this->Dosimetros_model->get_nombre($idtipo);
            $opctipo="<option selected value=\"".$idtipo."\">".$tipo."</option>";
            $tipos=$opctipo.$this->Dosimetros_model->get_tipo();
            $opcestatus="<option selected value=\"".$idestatus."\">".$estatus."</option>";
            $estatus=$opcestatus.$this->Dosimetros_model->select_estatus();
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
			$data['estatus']=$estatus;
			$data['tipos']=$tipos;    		
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Dosimetros');
		$this->load->view('dosimetros/dosim_reg_view',$data);				
	}
	public function editar()
	{
		$id=$this->input->post('id');
		$this->load->model('Dosimetros_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Dosimetros');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 8,$idsesion);		
		$servicio=$this->Dosimetros_model->registro($id);
        foreach ($servicio as $row)
            {
				$codigo=$row->id; 
				$nombre=$row->nombre; 
				$estatus=$row->estatus; 
				$idestatus=$row->idestatus;
				$idtipo=$row->idtipotarjeta; 
            }
            $tipo=$this->Dosimetros_model->get_nombre($idtipo);
            $opctipo="<option selected value=\"".$idtipo."\">".$tipo."</option>";
            $tipos=$opctipo.$this->Dosimetros_model->get_tipo();            
            $opcestatus="<option selected value=\"".$idestatus."\">".$estatus."</option>";
            $estatus=$opcestatus.$this->Dosimetros_model->select_estatus();
        	$data['codigo']=$id; 
			$data['nombre']=$nombre; 
			$data['estatus']=$estatus;
			$data['tipos']=$tipos;    		
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Dosimetros');
		$this->load->view('dosimetros/dosim_edit_view',$data);							
	}	
	public function guardar()
	{
		$this->load->model('Dosimetros_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Dosimetros');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 16,$idsesion);	
		$codigo=$this->input->post('codigo'); 
		$nombre=$this->input->post('nombre'); 
		$estatus=$this->input->post('estatus');
		$tipo=$this->input->post('tipo'); 
		$this->Dosimetros_model->idosimetros($codigo , $nombre , $estatus, $tipo );
            $ntipo=$this->Dosimetros_model->get_nombre($tipo);
            $opctipo="<option selected value=\"".$tipo."\">".$ntipo."</option>";
            $tipos=$opctipo.$this->Dosimetros_model->get_tipo();   		
            $opcestatus="<option selected value=\"".$estatus."\">".$this->Dosimetros_model->nombreestatus($estatus)."</option>";
            $estatus=$opcestatus.$this->Dosimetros_model->select_estatus();
        	$data['codigo']=$codigo; 
			$data['nombre']=$nombre; 
			$data['estatus']=$estatus; 
			$data['tipos']=$tipos;   
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Dosimetros');
			$this->load->view('dosimetros/dosim_guardado_view',$data);
	}
    public function error_codigo(){
       $this->load->view('dosimetros/error_codigo');
    } 
    public function error_nombre(){
       $this->load->view('dosimetros/error_nombre');
    } 

	public function buscartarjeta()
	{
		$this->load->model('Dosimetros_model');		
		$nombre=$this->input->post('nombre');
		$reg=$this->Dosimetros_model->buscartarjeta($nombre);
		if($reg==0){
			$data['reg']=0;
		}			
		else {
			$data['reg']=1;
		}
		$this->load->view('dosimetros/buscartajetas',$data);
	}
	public function buscar_actas()
	{
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$this->load->model('Dosimetros_model');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Generar');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$nombre=$this->input->post('nombre');
		$documentos=$this->Dosimetros_model->ver_documentos();
      $data['documentos']=$documentos;
		$this->add_view('documento/documento_inicial_view',$data);
	}   
	public function get_dosimetros()
	{
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$this->load->model('Dosimetros_model');
		$this->load->model('Menu_model');
		$id=$this->input->post('id');
		$data['color']=$this->Menu_model->get_color('Generar');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$nombre=$this->input->post('nombre');
		$dosimetros=$this->Dosimetros_model->get_dosimetros($id);
      $data['dosimetros']=$dosimetros;
		$this->load->view('documento/modal_dosimetros',$data);
	} 
	public function anular()
	{
		$this->load->model('Dosimetros_model');
		$id=$this->input->post('id');
		$dosimetros=$this->Dosimetros_model->anular($id);
      $data['mensaje']='Dosimetros seleccionados anulados, tarjetas liberadas';
		$this->load->view('documento/mensaje',$data);
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
		$this->load->model('Dosimetros_model');
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
		$registro_doc=$this->Dosimetros_model->registro_doc($id);
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
        $rec_dosim=$this->Dosimetros_model->get_dosimetros($id);
		foreach ($rec_dosim as $row2):           
			$dosimetro=$row2->id; 
			$servicio=$row2->servicio; 
			$fechai=$row2->fechainicio; 
			$fechaf=$row2->fechafin;
			$estudio=$row2->estudio;
			$estado=$row2->estado;			 
        endforeach;
        $fei=explode('-',$fechai);
        if(strlen($fei[0])==4){
            $fechainicio=$fei[2].'-'.$fei[1].'-'.$fei[0];
        }
        $fef=explode('-',$fechaf);
        if(strlen($fef[0])==4){
            $fechafin=$fef[2].'-'.$fef[1].'-'.$fef[0];
        }
        $cantidad=$this->Dosimetros_model->contar_asignados($id);        
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
		$this->load->model('Dosimetros_model');
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
		$registro_doc=$this->Dosimetros_model->registro_doc($id);
		foreach ($registro_doc as $row):           
			$id=$row->id; 
			$numero=$row->numero; 
			$hdestino=$row->hdestino; 
			$fechad=$row->date;
			$idtipogenerado=$row->idtipogenerado; 
			$estado=$this->Ubicacion_model->estado($hdestino); 
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
        $rec_dosim=$this->Dosimetros_model->get_dosimetros($id);
		foreach ($rec_dosim as $row2):           
			$dosimetro=$row2->id; 
			$servicio=$row2->servicio; 
			$fechai=$row2->fechainicio; 
			$fechaf=$row2->fechafin;
			$estudio=$row2->estudio;
			$estado=$row2->estado; 			 
        endforeach;
        $fei=explode('-',$fechai);
        if(strlen($fei[0])==4){
            $fechainicio=$fei[2].'-'.$fei[1].'-'.$fei[0];
        }
        $fef=explode('-',$fechaf);
        if(strlen($fef[0])==4){
            $fechafin=$fef[2].'-'.$fef[1].'-'.$fef[0];
        }
        $cantidad=$this->Dosimetros_model->contar_asignados($id);        
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
		$this->pdf->SetWidths(array(10,30,70,30,30,30));
		$this->pdf->Line($x, $y, $x + 200, $y);	
    	$this->pdf->Row(array('No.','Codigo Personal','Nombre','Dosimetro','Tarjeta','Observaciones'));
    	$y=$this->pdf->GetY();
    	$this->pdf->Line($x, $y, $x + 200, $y);	
    	$n=0;		
		foreach ($rec_dosim as $row2):           
			$n++;
			$dosimetro=$row2->id; 
			$idpersona=$row2->idpersona; 
			$personal=$row2->personal;
			$tarjeta=$row2->tarjeta; 
    	    $this->pdf->Row(array($n,$idpersona,utf8_decode($personal),$dosimetro,$tarjeta,'')); 
        endforeach;
        $y=$this->pdf->GetY();
        $k=$n*10;
        if($y<250){		
		$this->pdf->SetY($y);    	
    	$this->pdf->Line($x+30, $y+9 , $x + 70, $y+9);
    	$this->pdf->Line($x+90, $y+9 , $x + 120, $y+9);    	
    	$this->pdf->Line($x+140, $y+9 , $x + 190, $y+9);
    	$this->pdf->Line($x+30, $y+19, $x + 70, $y+19);
    	$this->pdf->Line($x+90, $y+19, $x + 120, $y+19);    	
    	$this->pdf->Line($x+140, $y +19, $x + 190, $y +19);
    	$this->pdf->Line($x, $y+29, $x + 190, $y+29);
    	$this->pdf->SetY($y); 
		$this->pdf->Cell(70,10,'Entregado por: ',0,0,'L');
		$this->pdf->Cell(50,10,'Fecha: ',0,0,'L');
		$this->pdf->Cell(50,10,'Firma: ',0,1,'L');
		$this->pdf->Cell(70,10,'Recibido por: ',0,0,'L');
		$this->pdf->Cell(50,10,'Fecha: ',0,0,'L');
		$this->pdf->Cell(50,10,'Firma: ',0,1,'L');
		$this->pdf->Cell(50,10,' ',0,1,'L');
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(200,10,utf8_decode('SE PROHIBE LA REPRODUCCIÓN TOTAL O PARCIAL DE ESTE CERTIFICADO SIN LA APROBACIÓN'),0,1,'C');
		$this->pdf->Cell(200,10,'DEL LABORATORIO QUE LO EMITE',0,1,'C');    	    	
    	}
    	else{
    		$this->pdf->AddPage();
    		$y=$this->pdf->GetY();
		$this->pdf->SetY($y);    	
    	$this->pdf->Line($x+30, $y+9 , $x + 70, $y+9);
    	$this->pdf->Line($x+90, $y+9 , $x + 120, $y+9);    	
    	$this->pdf->Line($x+140, $y+9 , $x + 190, $y+9);
    	$this->pdf->Line($x+30, $y+19, $x + 70, $y+19);
    	$this->pdf->Line($x+90, $y+19, $x + 120, $y+19);    	
    	$this->pdf->Line($x+140, $y +19, $x + 190, $y +19);
    	$this->pdf->Line($x, $y+29, $x + 190, $y+29);
    	$this->pdf->SetY($y); 
		$this->pdf->Cell(70,10,'Entregado por: ',0,0,'L');
		$this->pdf->Cell(50,10,'Fecha: ',0,0,'L');
		$this->pdf->Cell(50,10,'Firma: ',0,1,'L');
		$this->pdf->Cell(70,10,'Recibido por: ',0,0,'L');
		$this->pdf->Cell(50,10,'Fecha: ',0,0,'L');
		$this->pdf->Cell(50,10,'Firma: ',0,1,'L');
		$this->pdf->Cell(50,10,' ',0,1,'L');
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(200,10,utf8_decode('SE PROHIBE LA REPRODUCCIÓN TOTAL O PARCIAL DE ESTE CERTIFICADO SIN LA APROBACIÓN'),0,1,'C');
		$this->pdf->Cell(200,10,'DEL LABORATORIO QUE LO EMITE',0,1,'C');
    	}

		$this->pdf->Output();    	
    } 		    		
}	
	