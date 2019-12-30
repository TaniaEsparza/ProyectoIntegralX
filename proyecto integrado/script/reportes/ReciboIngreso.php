<?php
session_start();
$idIngreso = $_GET['idIngreso'];

// Include the main TCPDF library (search for installation path).
require_once('../../TCPDF/TCPDF-master/tcpdf.php');
include_once "../Clases/mysqlconector.php";

$Mysql = new mysqlconector();
$Mysql->Conectar();

$Consulta5 = "SELECT * FROM `personal` WHERE personal.idPersonal = '5'";
$Resultado5 = $Mysql->Consulta($Consulta5);
while ($fila5 = mysqli_fetch_array($Resultado5)){ 
  $NombreDirector = strtoupper($fila5['Nombre'] ." ". $fila5['ApellidoP'] ." ". $fila5['ApellidoM']);
}



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
		$this->Ln();
		$this->Ln(5);
		$this->Cell(0, 10, ''.$NombrePlantel.'', 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Ln(8);
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
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Recibo de Pago');
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
$pdf->SetMargins(20, 52, 20);
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

include_once "../Clases/mysqlconector.php";

$Mysql = new mysqlconector();
$Mysql->Conectar();
$Consulta3 = "SELECT ingresos.idIngresos, ingresos.idConceptodePago, ingresos.idAlumno, ingresos.Fecha, ingresos.Observacion, ingresos.Monto, ingresos.MontoLetra,ingresos.Folio, ingresos.idGrupo, alumno.idAlumno, alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, conceptodepago.idConceptoDePago, conceptodepago.NombreConcepto, grupos.idGrupos, grupos.Grado, grupos.Grupo, grupos.Carreras_idCarreras, carreras.idCarreras, carreras.Nombre AS NombreCarrera FROM alumno, ingresos, conceptodepago, grupos, carreras WHERE ingresos.idIngresos = '$idIngreso' AND ingresos.idAlumno = alumno.idAlumno AND ingresos.idConceptodePago = conceptodepago.idConceptoDePago and ingresos.idGrupo = grupos.idGrupos AND grupos.Carreras_idCarreras = carreras.idCarreras;";
$Resultado3 = $Mysql->Consulta($Consulta3);
while ($fila3 = $Resultado3->fetch_assoc()) {

// create some HTML content
	$html = '<h2 align="center">RECIBO DE PAGO</h2>
	<table  nobr="true">
	<tr>
	<td><b>Folio: </b></td>
	<td colspan="3">'.$fila3['Folio'].'</td>
	</tr>
	<tr>
	<td><b>Recibí de: </b></td>
	<td colspan="3">'.$fila3['Nombre'].' '.$fila3['ApellidoP'].' '.$fila3['ApellidoM'].'</td>
	</tr>
	<tr>
	<td><b>Del grupo del: </b></td>
	<td colspan="3">'.$fila3['Grado'].'-'.$fila3['Grupo'].' '.$fila3['NombreCarrera'].'</td>
	</tr>
	<tr>
	<td><b>La cantidad de: </b></td>
	<td colspan="3">$ '.$fila3['Monto'].' '. $fila3['MontoLetra'].'</td>
	</tr>
	<tr>
	<td><b>Por concepto: </b></td>
	<td colspan="3">'.$fila3['NombreConcepto'].'</td>
	</tr>
	<tr>
	<td colspan="4" align="center"></td>
	</tr>
	<tr>
	<td colspan="4" align="center"><b>Recibe</b></td>
	</tr>
	<tr>
	<td colspan="4" align="center"></td>
	</tr>
	<tr>
	<td colspan="4" align="center">'.$NombreDirector.'</td>
	</tr>
	</table>
	';
}

$pdf->SetFont('helvetica', '', 11);
$pdf->writeHTML($html, true, false, true, false, '');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('ReciboPago.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+