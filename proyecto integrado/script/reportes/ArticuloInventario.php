<?php
session_start();
$idArticulo = $_GET['idInventario'];

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
$pdf->SetTitle('Artículo Inventario');
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
$Consulta3 = "SELECT * FROM inventario, personal WHERE inventario.Empleado = personal.idPersonal AND inventario.idInventario = ".$idArticulo.";";
$Resultado3 = $Mysql->Consulta($Consulta3);
while ($fila3 = $Resultado3->fetch_assoc()) {

// create some HTML content
	$html = '<h2 align="center">ARTÍCULO INVENTARIO</h2>
	<table  border="1" cellpadding="3" cellspacing="2" nobr="true">
	<tr> 
	<th align="center"><b>Artículo</b></th>
	<th align="center"><b>Descripción</b></th>
	<th align="center"><b>Precio Unitario</b></th>
	<th align="center"><b>Cantidad</b></th>
	</tr>
	<tr align="center">
	<td>'. $fila3['Articulo'] .'</td>
	<td>'. $fila3['Descripcion'] .'</td>
	<td>$ '. $fila3['Precio'].'.00 </td>
	<td>'. $fila3['Cantidad'].'</td>
	</tr>
	<tr> 
	<th align="center"><b>Proveedores</b></th>
	<th align="center"><b>Origenes</b></th>
	<th align="center"><b>No. Serie</b></th>
	<th align="center"><b>Tipo de inventario</b></th>
	</tr>
	<tr align="center">
	<td>'. $fila3['Proveedores'] .'</td>
	<td>'. $fila3['Origenes'] .'</td>
	<td>'. $fila3['NoSerie'].'</td>
	<td>'. $fila3['Tipo'].'</td>
	</tr>
	<tr > 
	<th align="center"><b>Fecha de Ingreso CECyTE</b></th>
	<th align="center"><b>Fecha de Registro Zacatecas</b></th>
	<th align="center"><b>ID Estatus</b></th>
	<th align="center"><b>Marca</b></th>
	</tr>
	<tr align="center">
	<td>'. $fila3['FechaIngreso'] .'</td>
	<td>'. $fila3['FechaRegistro'] .'</td>
	<td>'. $fila3['Estatus'].'</td>
	<td>'. $fila3['Marca'].'</td>
	</tr>

	<tr > 
	<th align="center"><b>Modelo</b></th>
	<th align="center"><b>Mes</b></th>
	<th align="center"><b>Año</b></th>
	<th align="center"><b>Categoría</b></th>
	</tr>

	<tr align="center">
	<td>'. $fila3['Modelo'] .'</td>
	<td>'. $fila3['Mes'] .'</td>
	<td>'. $fila3['Anyo'].'</td>
	<td>'. $fila3['Categorias'].'</td>
	</tr>

	<tr> 
	<th align="center"><b>Area</b></th>
	<th align="center"><b>Ubicación</b></th>
	<th align="center"><b>Empleado</b></th>
	<th align="center"><b>Imagen</b></th>
	</tr>

	<tr align="center">
	<td>'. $fila3['Area'] .'</td>
	<td>'. $fila3['Ubicacion'] .'</td>
	<td>'. $fila3['Nombre'].' '.$fila3['ApellidoP'].' '.$fila3['ApellidoM'] .'</td>';
	$C = $fila3["Imagen"];
	//echo $C;
	$base64 = 'data:imagen/jpeg;base64,"'.base64_encode($C).'"';
	$html .='<td><img width="50" height="50" src="'.$base64.'"/></td>
	</tr>
	</table>
	';
}

$pdf->SetFont('helvetica', '', 11);
$pdf->writeHTML($html, true, false, true, false, '');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('ArticuloInventario.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+