<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Incluimos el archivo fpdf
// require_once APPPATH."/third_party/fpdf/mc_pdf.php";
require_once 'application/third_party/fpdf/mc_pdf.php';

/**
 *  Librería para usar FPDF desde los controladores.
 *
 * */
class pdf_MCT extends PDF_MC_Table  {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Encabezado de los documentos PDF
	 * */
	public function Header() {	    
	    global $title;		
		

		/*
		$this->Cell(75,6);		
    	$this->Cell(30,5,$title,0,0,'C');
		$this->Ln(7);
		
		global $titulo;
		$this->SetXY(0,0);
		//$this->Image(base_url('assets/img/logo-pdf.png'));
		$this->SetXY(25,40);
		$this->SetTextColor(0,0,0);
		$this->SetFont('Arial','B',16);
		$this->Cell(0,5,$titulo,0,0,'L');
		$this->Ln(15);
        */
	}
	
	
  

	/**
	 * Pie de página de los documentos PDF
	 * */
	public function Footer()
	{
		/*
		$this->SetXY(0,250);
		//$this->Image('assets/img/fondo-pdf.png');
		 $this->SetFont('Arial','',9);
		// Go to 1.5 cm from bottom
		$this->SetY(-17);
		$this->Cell(0,10,"www.corposaludaragua.gob.ve",0,0,'C');
			
		$this->SetY(-15);
		// Print current and total page numbers
		$this->Cell(0,10,$this->PageNo().' de {nb}',0,0,'R');
		*/
	}
}
