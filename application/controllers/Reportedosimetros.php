<?php
class Reportedosimetros extends MY_Controller {
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
		$this->load->model('Dosimetros_model');
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
			$data['estatus']=$this->Dosimetros_model->select_estatus_dosimetro();		
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Reportedosis');
			$this->add_view('reportedosimetros/reportedosimetros_inicial_view',$data);
		}
	}
	public function servicios()
	{
		$this->load->model('Reportedosis_model');
		$idestablecimiento=$this->input->post('idestablecimiento');
		$servicios=$this->Reportedosis_model->getservicio_establecimiento($idestablecimiento);
		$data['servicios']=$servicios;
        $data['status'] = 'ok';
		return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
				
	}	
	public function establecimientos()
	{
		$this->load->model('Generar_model');
		$idestado=$this->input->post('idestado');
		$establecimientos=$this->Generar_model->get_establecimientos_new($idestado);
		$data['establecimientos']=$establecimientos;
        $data['status'] = 'ok';
		return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
	}
    public function ver(){
    	$ff=time();
    	$dd = date("%d",$ff);
		$mes=date("%m",$ff);
    	$anio=date("%Y",$ff);
    	$fecha=$dd.'-'.$mes.'-'.$anio;
		$this->load->model('Establecimientos_model');
		$this->load->model('Ubicacion_model');
		$this->load->model('Dosimetros_model');
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
		$idestado=$this->input->post('idestado');
		$idestablecimiento=$this->input->post('idestablecimiento');  
		$idestudio=$this->input->post('idestudio');  
		$idservicio=$this->input->post('idservicio'); 
		$estatus=$this->input->post('estatus');
		$data['status'] = 'ok';
		$data['dosimetros']=$this->Dosimetros_model->freportedosimetros($idestado,$idestablecimiento,$idservicio,$idestudio,$estatus);
		return $this->output->set_content_type('application/json')->set_status_header('200')->set_output(json_encode($data));
    }
	public function export_estados()
	{
		$time=time();
    	$dd = date("d",$time);
		$mes=date("m",$time);
    	$anio=date("Y",$time);
    	$fecha=$dd.'-'.$mes.'-'.$anio;
		$this->load->library('excel');
		$this->load->model('Ubicacion_model');
		$this->load->model('Establecimientos_model');
		$estados=$this->Ubicacion_model->get_estados();
		$i=0;
        foreach ($estados as $row) {
        	if($i>0){
                $this->excel->createSheet();
        	}
         	$this->excel->setActiveSheetIndex($i);
            $this->excel->getActiveSheet($i)->setTitle($row->nombre);
            $establecimientos=$this->Establecimientos_model->get_from_estado($row->id);
            $this->excel->getActiveSheet($i)->setCellValue('A1','Codigo');
            $this->excel->getActiveSheet($i)->setCellValue('B1','Nombre');
            $this->excel->getActiveSheet($i)->setCellValue('C1','Enviados');
            $this->excel->getActiveSheet($i)->setCellValue('D1','Recibidos');
            $this->excel->getActiveSheet($i)->getStyle('A1')->getFont()->setSize(12);
            $this->excel->getActiveSheet($i)->getStyle('B1')->getFont()->setSize(12);
            $this->excel->getActiveSheet($i)->getStyle('C1')->getFont()->setSize(12);
            $this->excel->getActiveSheet($i)->getStyle('D1')->getFont()->setSize(12);
            $this->excel->getActiveSheet($i)->getStyle('A1')->getFont()->setBold(true);
            $this->excel->getActiveSheet($i)->getStyle('B1')->getFont()->setBold(true);
            $this->excel->getActiveSheet($i)->getStyle('C1')->getFont()->setBold(true);
            $this->excel->getActiveSheet($i)->getStyle('D1')->getFont()->setBold(true);
            $k=2;
            foreach ($establecimientos as $key) {
                $this->excel->getActiveSheet($i)->setCellValue('A'.$k,$key->id);
                $this->excel->getActiveSheet($i)->setCellValue('B'.$k,$key->nombre);
                $this->excel->getActiveSheet($i)->setCellValue('C'.$k,$this->Establecimientos_model->count_enviados($key->id));
                $this->excel->getActiveSheet($i)->setCellValue('D'.$k,$this->Establecimientos_model->count_recibidos($key->id));
                $k++;
            }            
            $i++;
        } 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="dosimetros_enviados_recibidos_al_'.$fecha.'.xls"');
        header('Cache-Control: max-age=0');
        $objwriter= PHPExcel_IOFactory::createWriter($this->excel,'Excel5');
        $objwriter->save('php://output');
	}
}