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
        $conn = $this->db->conn_id;
        $this->load->model('Lecturas_model');
        $fecha=$this->input->post('fecha');
        $archivo_asc=$this->input->post('archivo_asc');
        $idarchivo=$this->Lecturas_model->get_idarchivo();
        $nombrearchivo1=str_replace('/var/www/html/sispoe/assets/uploads/', '', $archivo_asc);
        $tipo='asc';
        $size=0;        
        $filebytea=file_get_contents($archivo_asc);
        //$escaped = pg_escape_bytea($filebytea);
        $escaped = pg_escape_bytea($conn,$filebytea);
        $lineas = file($archivo_asc);
        $c=0;
        foreach ($lineas as $linea_num => $linea)
        {
            $rec = explode(",",$linea);			 
            $tarjeta = trim($rec[13]);
            $dosis = trim($rec[21]);
            $excluir = trim($rec[28]);
            $pos = strpos($excluir, "nC");
            $c=1;
            if ($pos === false) {
            	if($this->Lecturas_model->comprueba($tarjeta)>0){
                    $this->Lecturas_model->iarchivos($idarchivo, $nombrearchivo1,  $size,  $tipo,  $escaped);	
                    $iddosimetro=$this->Lecturas_model->get_idtarjeta($tarjeta);
                    $registro=$this->Lecturas_model->registro2($iddosimetro);
                    foreach ($registro as $row) {
                        $iddocumento=$row->iddocumento;
                        $idpersonal=$row->idpersona;
                    }
                    $this->Lecturas_model->ilecturas($iddosimetro , $idpersonal , $fecha , $dosis , $iddocumento, $nombrearchivo1 );
                }
            }
        }
        $data['status'] = 'ok';
        $data['message'] = "Se guardo la lectura de todos las tarjetas.";
        return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
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
    public function cargar_asc(){
        $dir_subida = './assets/uploads/';
        $nombrearchivo1=$_FILES['file']['name'];
        $archivo_cargado = $dir_subida .basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $archivo_cargado)) {
        	$data=['status' => 'ok','path' => $archivo_cargado];
        	return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
        } else {
            $data=['status' => 'error','message' => "Sorry, there was an error uploading your file."];
            return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
        }
    }
    public function verificar_archivo(){
		$this->load->model('Lecturas_model');
		$this->load->model('Controladores_model');
		$this->load->model('Usuario_model');
		$fecha=$this->input->post('fecha');
		$archivo_asc=$this->input->post('archivo_asc');
        $lineas = file($archivo_asc);
        $c=0;
        $data=[];
        $dosimetros=null;
        $ids=[];
        foreach ($lineas as $linea_num => $linea)
        {
            $rec = explode(",",$linea);			 
            $tarjeta = trim($rec[13]);
            $excluir = trim($rec[28]);
            $pos = strpos($excluir, "nC");
            if ($pos === false) {
                if($this->Lecturas_model->comprueba($tarjeta)==0){
                    $idtarjeta=$this->Lecturas_model->get_idtarjeta($tarjeta);
                    $dosimetros=$this->Lecturas_model->get_dosimetros_norecibidas($idtarjeta);
                }
            }
		}
        if(!empty($dosimetros)){
            foreach ($dosimetros as $row) {
                $ids[]=$row->id;
            }
        	$data['status'] = 'pendiente';
        	$data['path'] = $archivo_asc;
            $data['norecibidos']=$dosimetros;
            $data['ids']=implode(',', $ids);
            return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
        }
        else{
        	$data['status'] = 'ok';
        	$data['message'] = "Se verificaron todos los dosimetros.";
        	return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
        }
    }
    public function recepcionar(){
        $this->load->model('Lecturas_model');
        $this->load->model('Controladores_model');
        $this->load->model('Sesion_model');
        $this->load->model('Usuario_model');
        $this->load->library('session'); 
        $iddosimetro=$this->input->post('id'); 
        $ids=$this->input->post('ids');
        $archivo_asc=$this->input->post('archivo_asc');
        $this->Lecturas_model->recepcionar($iddosimetro);
        if(!empty($this->Lecturas_model->get_dosim_norecibidos($ids))){
            $data['status'] = 'pendiente';
            $data['path'] = $archivo_asc;
            $data['norecibidos']=$this->Lecturas_model->get_dosim_norecibidos($ids);
            return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
        }
        else{
            $data['status'] = 'ok';
            $data['message'] = "Se verificaron todos los dosimetros.";
            return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
        }
    }
    public function pendiente(){
        $this->load->model('Lecturas_model');
        $this->load->model('Controladores_model');
        $this->load->model('Sesion_model');
        $this->load->model('Usuario_model');
        $this->load->library('session'); 
        $iddosimetro=$this->input->post('id'); 
        $ids=$this->input->post('ids');
        $archivo_asc=$this->input->post('archivo_asc');
        $this->Lecturas_model->pendiente($iddosimetro);
        if(!empty($this->Lecturas_model->get_dosim_norecibidos($ids))){
            $data['status'] = 'pendiente';
            $data['path'] = $archivo_asc;
            $data['norecibidos']=$this->Lecturas_model->get_dosim_norecibidos($ids);
            return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
        }
        else{
            $data['status'] = 'ok';
            $data['message'] = "Se verificaron todos los dosimetros.";
            return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
        }
    }
}
	