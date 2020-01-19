<?php
session_start();
$idArea = $_GET['idArea'];

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
		$this->Image('@'.$LogoSeduzac, 230, 10, 50, 15, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->SetFont('helvetica', 'B', 11);
		$this->Ln();
		$this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Ln();
		$this->Ln(5);
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
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Artículos Inventario Area');
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
$pdf->SetMargins(20, 48, 20);
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

$html = '<h2 align="center">ARTÍCULOS DE INVENTARIO</h2>';
include_once "../Clases/mysqlconector.php";

$Mysql = new mysqlconector();
$Mysql->Conectar();
$Consulta3 = "SELECT * FROM areasplantel WHERE areasplantel.idAreasPlantel = '$idArea';";
$Resultado3 = $Mysql->Consulta($Consulta3);
while ($fila3 = $Resultado3->fetch_assoc()) {
 $html .= '<h2 align="center">'.$fila3['NombreArea'].'</h2>';
}

$html.='<table border="1" cellpadding="4" cellspacing="4" nobr="true">
<tr align="center" style="background-color:#E7E4E4;"> 
<th>Articulo</th>
<th>Descripcion</th>
<th>Precio</th>
<th>Cantidad</th>
</tr>';


include_once "../Clases/mysqlconector.php";

$Mysql = new mysqlconector();
$Mysql->Conectar();
$Consulta4 = "SELECT * FROM inventario, personal, areasplantel WHERE inventario.Empleado = personal.idPersonal AND inventario.Area = areasplantel.idAreasPlantel AND inventario.Area = '$idArea';";
$Resultado4 = $Mysql->Consulta($Consulta4);
while ($fila4 = $Resultado4->fetch_assoc()) {
 
 $html.='
	<tr align="center">
	<td>'.$fila4['Articulo'].'</td>
	<td>'.$fila4['Descripcion'].'</td>
	<td> $'.$fila4['Precio'].'.00 </td>
	<td>'.$fila4['Cantidad'].'</td>
	</tr>
 ';
	
	
	
	
}

$html.='</table>
';
$pdf->SetFont('helvetica', '', 11);
$pdf->writeHTML($html, true, false, true, false, '');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('ArticulosInventarioArea.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+