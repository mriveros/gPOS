<?php

class PDF extends FPDF
{
//Cabecera de pgina
function Header()
{
 
    //Logo
    //$this->Image('./logo/logo.jpg',20,8,150);
    //$this->Ln(5);	
}

//Pie de pgina
function Footer()
{
  /*  
    $this->SetFont('Arial','',6);
	$this->SetY(-21);
	$this->Cell(0,10,'gPOS - RUC 0-00000000',0,0,'C');
	$this->SetY(-18);
	$this->Cell(0,10,html_entity_decode('Inscrita en el Registro Mercantil de XXXXXX Tomo 000. Folio 00. Hoja XX-00000. Inscripci&oacute;n 1&deg;'),0,0,'C');
	$this->SetY(-15);
	$this->Cell(0,10,html_entity_decode('Codeka, inscrita con el n&uacute;mero X 00000000 ante la Oficina Espa&ntilde;ola de Patentes y Marcas.'),0,0,'C');
	$this->SetY(-12);
  */
  /*    $this->Cell(0,10,'___________________',0,0,'C');	
	  $this->Ln(4);	
    $this->Cell(0,10,"Administrador",0,0,'C');	
	  $this->Ln(4);	
    $this->SetFont('Arial','',6);
  $fecha=implota($fechahoy=date("Y-m-d"));
    $this->Cell(0,10,'Fecha de impresion '. $fecha. '.',0,0,'C');	
  */
}

}
?>