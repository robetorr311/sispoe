<?php
class Genviadosestado extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->model('Genviadosestado_model');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Genviadosestado');
		$this->add_view('genviadosestado/genviadosestado_inicial_view',$data);				
	}
	public function button_pdf()
	{
		$this->load->model('Genviadosestado_model');
		$data['ruta']=$this->input->post('ruta');
		$this->load->model('Menu_model');
		$data['color']=$this->Menu_model->get_color('Genviadosestado');
		$this->load->view('genviadosestado/button_pdf',$data);				
	}
    public function genviadosestado(){
		$this->load->model('Genviadosestado_model');
		$this->load->library('session');
		$fechai=$this->input->get('fechai');
		$fechaf=$this->input->get('fechaf');
		$x=5;
		$y=5;
		$this->Genviadosestado_model->preparados_enviados_estados($fechai,$fechaf);
		$datosreporte=$this->Genviadosestado_model->listado();
	   	$this->load->library('pdf');		
		$this->pdf=new PDF_MC_Table();
		$this->pdf->AddPage();
		$this->pdf->Image('./assets/img/membrete-oficial.png',$x,$y,200,20);
		$x=25;
		$y=$y+20;
		$this->pdf->SetY($y);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(200,10,'Laboratorio Nacional De Dosimetria Personal Externa',0,1,'C');
		$y=$this->pdf->GetY();
		$y=$y-5;
		$this->pdf->SetY($y);
		$this->pdf->SetFont('Arial','',12);
		$this->pdf->Cell(200,10,'Listado de dosimetros generados y enviados por estado del '.$fechai.' al '.$fechaf,0,1,'C');
		$y=$this->pdf->GetY();
		$y=$y+5;
		$this->pdf->SetY($y);
		$this->pdf->Line($x, $y, $x + 150, $y);
		$this->pdf->Line($x, $y+7, $x + 150, $y+7);						
    	$this->pdf->SetX(25);
    	$this->pdf->Cell(100,8,'Estado',0,0,'L');
        $this->pdf->Cell(50,8,'Cantidad',0,1,'L');
		$total=0;
		foreach ($datosreporte as $row2):
		    $this->pdf->SetX(25);           
			$estado=$row2->estado; 
			$cantidad=$row2->cantidad;
			$total=$total+$cantidad;
	        $this->pdf->SetFont('Arial','',10);
	        $this->pdf->Cell(100,8,$estado,0,0,'L');
            $this->pdf->Cell(50,8,$cantidad,0,1,'L');
        endforeach;
        $y=$this->pdf->GetY();
		$this->pdf->Line($x, $y, $x + 150, $y);
		$this->pdf->Line($x, $y+7, $x + 150, $y+7);
		$this->pdf->SetX(25);	
		$this->pdf->SetFont('Arial','B',10);
	    $this->pdf->Cell(100,8,'Total',0,0,'L');
        $this->pdf->Cell(50,8,$total,0,1,'L');
		$this->pdf->Output();
		$time=time();
		$rutacompleta='/var/www/html/sispoe/assets/uploads/genviadosestado/genviadosestado_'.$time.'.pdf';		  
		$this->pdf->Output($rutacompleta,'F');
    }
}	