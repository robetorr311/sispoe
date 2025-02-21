<?php
class Lecturas extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Lecturas_model');
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
			$idcontrolador=$this->Controladores_model->get_id('Lecturas');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$data['listado']=$this->Lecturas_model->listado();
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Lecturas');
			$this->add_view('lecturas/lecturas_inicial_view',$data);	
		}			
	}
	public function lectura()
	{
		$this->load->model('Lecturas_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Lecturas');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 19,$idsesion);
		if (empty($_FILES['archivo']['name']))
		{
			$data['error'] = "Falto seleccionar el archivo";
			$data['e']=1;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Lecturas');
			$this->add_view('lecturas/lecturas_inicial_view',$data);
		}
		else 
		{
			$dir_subida = './assets/uploads/';
			$nombrearchivo1=$_FILES['archivo']['name'];
			$fichero_subido = $dir_subida .basename($_FILES['archivo']['name']);
			$idarchivo=$this->Lecturas_model->get_idarchivo();
			if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
					$size=$_FILES['archivo']['size'];
					$tipo=$_FILES['archivo']['type'];
					$filebytea= file_get_contents($fichero_subido);
					$escaped = pg_escape_bytea($filebytea);
					$lineas = file($fichero_subido);
					$c=0;
					foreach ($lineas as $linea_num => $linea)
					{
						$rec = explode(",",$linea);			 
						$fec = trim($rec[11]);
						$year=substr($fec, 0,4);
						$mes=substr($fec, 4,2);
						$dia=substr($fec, 6,2);
		                $fecha=$dia.'-'.$mes.'-'.$year;
						$tarjeta = trim($rec[13]);
						$dosis = trim($rec[21]);
						$excluir = trim($rec[28]);
						$pos = strpos($excluir, "nC");
						$comp=$this->Lecturas_model->comprueba($tarjeta);
						if ($comp>0){
							$c=1;
							if ($pos === false) {
							$this->Lecturas_model->iarchivos($idarchivo, $nombrearchivo1,  $size,  $tipo,  $escaped);	
							$iddosimetro=$this->Lecturas_model->get_idtarjeta($tarjeta);
							$registro=$this->Lecturas_model->registro($iddosimetro);
							foreach ($registro as $row) {
								$iddocumento=$row->iddocumento;
								$idpersonal=$row->idpersona;
							}
							$this->Lecturas_model->ilecturas($iddosimetro , $idpersonal , $fecha , $dosis , $iddocumento, $nombrearchivo1 );
							}							
						}  
					}
					$data['listado']=$this->Lecturas_model->listado();					
					$data['lectura']=$this->Lecturas_model->get_lecturas($nombrearchivo1);	        
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Lecturas');
			        $this->add_view('lecturas/lecturas_guardada_view',$data);					
				}
				else {
					$data['error'] = "Falto seleccionar el archivo";
					$data['e']=1;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Lecturas');
					$this->add_view('lecturas/lecturas_inicial_view',$data);		
				} 			
		}						
	}
	public function listado()
	{
		$this->load->model('Lecturas_model');

	}
	public function download()
	{
		$this->load->model('Lecturas_model');

	}	
    public function dosis(){
    	$ff=time();
    	$dd = strftime("%d",$ff);
		$mes=strftime("%m",$ff);
    	$anio=strftime("%Y",$ff);
    	$fecha=$dd.'-'.$mes.'-'.$anio;
    	$yy=0;
		$xx=0;
		$x=5;
		$y=5;
		$this->load->model('Lecturas_model');
		$this->load->model('Establecimientos_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Lecturas');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 20,$idsesion);		
		$archivo=$this->input->get('archivo');  
	   	$this->load->library('pdf');		
		$this->pdf=new PDF_MC_Table();
		$this->pdf->AddPage();
		$this->pdf->Image('./assets/img/membrete-oficial.png',$x,$y,200,20);
		$y=$y+20;
		$this->pdf->SetY($y);
		$this->pdf->SetFont('Arial','B',12);
		$this->pdf->Cell(200,10,'LABORATORIO NACIONAL DE DOSIMETRIA PERSONAL HP',0,1,'C');
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->Cell(200,10,'Fecha de Emision: '.$fecha,0,1,'C');
		$y=$this->pdf->GetY();
		$this->pdf->SetWidths(array(10,10,60,43,35,20,20));
		$this->pdf->Line($x, $y, $x + 200, $y);	
    	$this->pdf->Row(array('No.','POE','Nombre','Periodo','Lectura', 'Dosis','Acumulada'));
    	$y=$this->pdf->GetY();
    	$this->pdf->Line($x, $y, $x + 200, $y);	
    	$n=0;		
		$registro_doc=$this->Lecturas_model->get_lecturas($archivo);
		foreach ($registro_doc as $row):    
			$n++;       
			$id=$row->id; 
			$idpersonal=$row->hpersonal; 
			$personal=$row->personal; 
			$dosis=$row->dosis;
			$acumulada=$row->acumulada;
			$fechainicio=$row->fechainicio; 
			$fechafin=$row->fechafin;
			$establecimiento=$row->establecimiento; 
			$estudio=$row->estudio;
                $fechai=$row->fechainicio;
                $feci=explode('-',$fechai);
                if(strlen($feci[0])==4){
                    if($feci[0]=='1900'){
                      $fechainicio='Sin informacion';
                    }
                    else {
                      $fechainicio=$feci[2].'-'.$feci[1].'-'.$feci[0];
                    }
                }
                $fechaf=$row->fechafin;
                $fecf=explode('-',$fechaf);
                if(strlen($fecf[0])==4){
                    if($fecf[0]=='1900'){
                      $fechafin='Sin informacion';
                    }
                    else {
                      $fechafin=$fecf[2].'-'.$fecf[1].'-'.$fecf[0];
                    }
                }                

    	$this->pdf->Row(array($n,$idpersonal,utf8_decode($personal),$fechainicio.' al '.$fechafin,$estudio,$dosis,$acumulada)); 	 
        endforeach;			
		$y=$this->pdf->GetY();
    	$this->pdf->Line($x, $y, $x + 200, $y);
		$this->pdf->Output();    	
    } 		    				
}	