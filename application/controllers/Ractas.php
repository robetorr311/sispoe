<?php
class Ractas extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{		
        $this->load->model('Dosimetros_model');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Ractas');
        $data['listado']=$this->Dosimetros_model->listado_doc();
		$this->add_view('ractas/ractas_initial_view',$data);				
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
        $rec_dosim=$this->Dosimetros_model->vdosimetros($id);
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
        $rec_dosim=$this->Dosimetros_model->vdosimetros($id);
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
