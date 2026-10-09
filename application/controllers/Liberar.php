<?php
class Liberar extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Liberar_model');
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
			$idcontrolador=$this->Controladores_model->get_id('Liberar');
			$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 5,$idsesion);		
			$this->load->model('Menu_model');
			$data['color']=$this->Menu_model->get_color('Liberar');
			$this->add_view('liberar/liberar_inicial_view',$data);	
		}			
	}
	public function liberar()
	{
		$this->load->model('Liberar_model');
		$this->load->model('Controladores_model');
		$this->load->model('Sesion_model');
		$this->load->model('Usuario_model');
		$this->load->library('session');
		$login= $this->session->userdata('username');
		$idsesion= $this->session->userdata('idsesion');
		$idusuario=$this->Usuario_model->idusuario_login($login);
		$idcontrolador=$this->Controladores_model->get_id('Liberar');
		$this->Sesion_model->actividad($idcontrolador,$idusuario , 1 , 19,$idsesion);
		if (empty($_FILES['archivo']['name']))
		{
			$data['error'] = "Falto seleccionar el archivo";
			$data['e']=1;
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Liberar');
			$this->add_view('liberar/liberar_inicial_view',$data);
		}
		else 
		{
			$dir_subida = './assets/uploads/';
			$nombrearchivo1=$_FILES['archivo']['name'];
			$fichero_subido = $dir_subida .basename($_FILES['archivo']['name']);
			if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
					$size=$_FILES['archivo']['size'];
					$tipo=$_FILES['archivo']['type'];
					$filebytea= file_get_contents($fichero_subido);
					$escaped = pg_escape_bytea($filebytea);
					$lineas = file($fichero_subido);
					$c=0;
					foreach ($lineas as $linea_num => $linea)
					{
						$tarjeta = trim($linea);
						$data['tarjetas'][] = $tarjeta;
						$this->Liberar_model->liberar($tarjeta);	
					}
		            $this->load->model('Menu_model');
                    $data['mensaje']="<div class='box box-default'>
                        <div class='box-header with-border bg-yellow'>
                          <h3 class='box-title'>
                            Tarjetas liberadas             
                          </h3>
                        </div><!-- /.box-header --> 
                        <div class='box-body'>
                        Proceso finalizado!!!!
                        </div>
                      </div>";
		            $data['color']=$this->Menu_model->get_color('Liberar');
					$this->add_view('liberar/liberar_inicial_view',$data);		
				} 			
		}						
	}
  				
}	