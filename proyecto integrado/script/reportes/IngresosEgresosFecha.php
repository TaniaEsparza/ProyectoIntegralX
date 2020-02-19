<?php
session_start();
$FechaInicial = $_GET['FechaInicial'];
$FechaFinal = $_GET['FechaFinal'];

// Include the main TCPDF library (search for installation path).
require_once('../../TCPDF/TCPDF-master/tcpdf.php');
include_once "../Clases/mysqlconector.php";


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {

		include_once "../Clases/mysqlconector.php";
		$Mysql = new mysqlconector();
		$Mysql->Conectar();
		$Consulta2 = "SELECT * FROM `plantel` WHERE 1;";
		$Resultado2 = $Mysql->Consulta($Consulta2);
		while ($fila2 = $Resultado2->fetch_assoc()) {
			$Lugar = $fila2['Ciudad'] .", ". $fila2['Estado'];
			$NombrePlantel = strtoupper($fila2['Nombre']);
			$Plantel =  strtoupper($fila2['Ciudad']);
			$Clave = $fila2['Clave'];
			$LogoCECyTERioGrandeZac = $fila2['LogoCECyTERioGrandeZac'];
			$LogoSeduzac = $fila2['LogoSeduzac'];
		}

		// Logo Seduzac
		$this->Image('@'.$LogoCECyTERioGrandeZac, 20, 10, 50, 15, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// LogoCECyTE
		$this->Image('@'.$LogoSeduzac, 140, 10, 50, 15, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->SetFont('helvetica', 'B', 11);
		$this->Ln();
		$this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Ln(13);
		$this->Cell(0, 10, ''.$NombrePlantel.'', 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Ln(7);
		$this->Cell(0, 10, ' PLANTEL: '.$Plantel.' '.$Clave.'', 0, false, 'C', 0, '', 0, false, 'T', 'M');

	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 9, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ERTA');
$pdf->SetTitle('Reporte General de Ingreso y Egresos por Fechas');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(20, 45, 20);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
// add a page
$pdf->AddPage();

$NewFechaInicial = date("d/m/Y", strtotime($FechaInicial));
$NewFechaFinal = date("d/m/Y", strtotime($FechaFinal));

$html = '<h2 align="center">REPORTE DE INGRESOS Y EGRESOS <br> --'.$NewFechaInicial.' al '.$NewFechaFinal.'--</h2>
<table border="1" nobr="true">
<tr align="center" style="background-color:#E7E4E4;">
<td>Ingresos</td> 
<td>Egresos</td> 
</tr>';

$html.='<tr align="center">
		<td>';

include_once "../Clases/mysqlconector.php";

$Mysql = new mysqlconector();
$Mysql->Conectar();
$Consulta4 = " SELECT SUM(ingresos.Monto) AS SumIngresos, conceptodepago.NombreConcepto from ingresos, conceptodepago WHERE ((ingresos.Fecha >= '$FechaInicial' ) AND (ingresos.Fecha <= '$FechaFinal'))AND conceptodepago.idConceptoDePago = ingresos.idConceptodePago GROUP BY ingresos.idConceptodePago  ";
$Resultado4 = $Mysql->Consulta($Consulta4);
while ($fila4 = $Resultado4->fetch_assoc()) {
	
	$html .=''. $fila4['NombreConcepto'] .' $ '.$fila4['SumIngresos'].' <br>';
}

$html .='</td>
<td>';

include_once "../Clases/mysqlconector.php";

$Mysql = new mysqlconector();
$Mysql->Conectar();
$Consulta5 = " SELECT SUM(egresos.Monto) AS SumEgresos, egresos.NombreEgreso from egresos WHERE ((egresos.Fecha >= '$FechaInicial' ) AND (egresos.Fecha <= '$FechaFinal')) ";
$Resultado5 = $Mysql->Consulta($Consulta5);
while ($fila5 = $Resultado5->fetch_assoc()) {
	
	$html .=''. $fila5['NombreEgreso'] .' $ '.$fila5['SumEgresos'].' <br>';
}

$html .='</td>
</tr>';

include_once "../Clases/mysqlconector.php";

$Mysql = new mysqlconector();
$Mysql->Conectar();
$Consulta5 = "SELECT SUM(ingresos.Monto) AS SumIngresos from ingresos WHERE ((ingresos.Fecha >= '$FechaInicial' ) AND (ingresos.Fecha <= '$FechaFinal'))";
$Resultado5 = $Mysql->Consulta($Consulta5);
while ($fila5 = $Resultado5->fetch_assoc()) {
	
	$html.='
	<tr align="center">
	<td> <b>TOTAL:</b> $ '.$fila5['SumIngresos'].'</td>';
		
}

include_once "../Clases/mysqlconector.php";

$Mysql = new mysqlconector();
$Mysql->Conectar();
$Consulta6 = "SELECT SUM(egresos.Monto) AS SumEgresos from egresos WHERE ((egresos.Fecha >= '$FechaInicial' ) AND (egresos.Fecha <= '$FechaFinal'))";
$Resultado6 = $Mysql->Consulta($Consulta6);
while ($fila6 = $Resultado6->fetch_assoc()) {
	
	$html.='
	<td> <b>TOTAL:</b> $ '.$fila6['SumEgresos'].'</td>
	</tr>';
		
}


$html .='</table>

';

$pdf->SetFont('helvetica', '', 11);
$pdf->writeHTML($html, true, false, true, false, '');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('ReporteIngresosEgresosPorFecha.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+