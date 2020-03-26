<?php
session_start();

$idPersonal = $_GET['idPersonal'];
// Include the main TCPDF library (search for installation path).
require_once('../../TCPDF/TCPDF-master/tcpdf.php');
include_once "../Clases/mysqlconector.php";

$Mysql = new mysqlconector();
$Mysql->Conectar();
$Consulta2 = "SELECT * FROM `plantel` WHERE 1;";
$Resultado2 = $Mysql->Consulta($Consulta2);
while ($fila2 = $Resultado2->fetch_assoc()) {
	$Lugar = $fila2['Ciudad'] .", ". $fila2['Estado'];
	$NombrePlantel = strtoupper($fila2['Nombre']);
	$Plantel = $fila2['Ciudad'];

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
$pdf->SetAuthor('T&A');
$pdf->SetTitle('Cédula Personal');
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
$pdf->SetMargins(20, 49, 20);
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


					$Mysql = new MySQLConector();
					$Mysql->Conectar();

					$Consulta = "SELECT * FROM `personal` WHERE idPersonal = '".$idPersonal."' ;";
					$Resultado = $Mysql->Consulta($Consulta);
					$row = mysqli_fetch_array($Resultado);

					$idLN = $row['LugarNacimiento_idLugarNacimiento'];
					$idD=$row['Domicilio_idDomicilio'];
					$idIL = $row['InformacionLaboral_idInformacionLaboral'];
					$Nombre=$row["Nombre"];
					$ApellidoP=$row["ApellidoP"];
					$ApellidoM = $row['ApellidoM']; 
					$RFC = $row['RFC'];
					$CURP = $row['CURP'];
					$IMSS = $row['SS'];
					
					$TelefonoCelular = $row['TelefonoCel'];
					$Correo = $row['Correo'];
					$FechaNacimiento = $row['FechaNacimiento'];
					$TipoSangre = $row['TipoSangre'];
					$Sexo = $row['Sexo'];
					$EstadoCivil = $row['EstadoCivil'];
					
					
					$Consulta2 = "SELECT * FROM `lugarnacimiento` WHERE idLugarNacimiento = '".$idLN."'; ";
					$Resultado2 = $Mysql->Consulta($Consulta2);
					$row2 = mysqli_fetch_array($Resultado2);

					$PaisN = $row2['Pais'];
					$EstadoN = $row2['Estado'];
					$LocalidadN = $row2['Localidad'];
					$MunicipioN = $row2['Municipio'];

					

					$Consulta3 = "SELECT * FROM `domicilio` WHERE idDomicilio = '".$idD."'; ";
					$Resultado3 = $Mysql->Consulta($Consulta3);
					$row3 = mysqli_fetch_array($Resultado3);

					$CP = $row3['CP'];
					$Calle = $row3['Calle'];
					$Numero = $row3['Numero'];
					$Colonia = $row3['Colonia'];
					$Municipio = $row3['Municipio'];
					$Localidad = $row3['Localidad'];
					$Estado = $row3['Estado'];
					$TelCasa = $row3['TelefonoCasa'];

					$Consulta4 = "SELECT * FROM `esudiospersonal` WHERE Personal_idPersonal = '".$idPersonal."'; ";
					$Resultado4 = $Mysql->Consulta($Consulta4);
					$row4 = mysqli_fetch_array($Resultado4);
					$UltimoGrado = $row4['UltimoGrado'];
	            	$Carrera = $row4['Carrera'];
	            	$AreaConocimiento = $row4['AreaConocimiento'];
	            	$EntidadFederativa = $row4['EntidadFederativa'];
	            	$Institucion = $row4['Institucion'];
	            	$Estatus = $row4['Estatus'];
	            	$DocAcademico = $row4['DocAcademico'];
	            	$FechaExpedicion = $row4['FechaExpedicion'];
	            	$NoFolioDoc = $row4['NoFolioDoc'];


					$Consulta5 = "SELECT * FROM `informacionlaboral` WHERE idInformacionLaboral = '".$idIL."'; ";
					$Resultado5 = $Mysql->Consulta($Consulta5);
					$row5 = mysqli_fetch_array($Resultado5);
					$NoEmpleado = $row5['NoEmpleado']; 
					$FechaIngreso = $row5['FechaIngreso'];
					$Departamento = $row5['Departamento'];
					$Puesto = $row5['Puesto'];
					$Horas = $row5['Horas'];
					$Neto = $row5['Neto'];
					$Bruto = $row5['Bruto'];




	$html = "<h2 align=\"center\"> -- Cédula Básica -- </h2>
	<br>
	<table>
		
		<tbody>
			<tr>
				<td><h3>= Información Personal =</h3>
	<b>No. Empleado: </b> ".$NoEmpleado." <br>
	<b>Nombre: </b> ".$Nombre." ".$ApellidoP." ".$ApellidoM."<br>
	<b>RFC: </b> ".$RFC."<br>
	<b>CURP: </b> ".$CURP."<br>
	<b>No. IMSS: </b> ".$IMSS."<br>
	<b>Fecha Nac: </b> ".$FechaNacimiento."<br>
	<b>Tipo de Sangre: </b> ".$TipoSangre."<br>
	<b>Sexo: </b> ".$Sexo."<br>
	<b>Estado Civil: </b> ".$EstadoCivil."<br>
	<b>Telefono: </b> ".$TelefonoCelular."<br>
	<b>Correo: </b> ".$Correo."<br></td>
				<td><h3>= Lugar de Nacimiento =</h3>
	<b>Localidad: </b> ".$LocalidadN." <br>
	<b>Municipio: </b> ".$MunicipioN."<br>
	<b>Estado: </b> ".$EstadoN."<br>
	<b>Pais: </b> ".$PaisN."<br>
				</td>
			</tr>
			<tr>
				<td><h3>= Domicilo =</h3>
	<b>CP: </b> ".$CP." <br>
	<b>Calle: </b> ".$Calle."<br>
	<b>Número: </b> ".$Numero."<br>
	<b>Colonia: </b> ".$Colonia."<br>
	<b>Municipio: </b> ".$Municipio."<br>
	<b>Localidad: </b> ".$Localidad."<br>
	<b>Estado: </b> ".$Estado."<br>
	<b>Tel. Casa: </b> ".$TelCasa."<br>
				</td>
				<td>
	<h3>= Información Laboral =</h3>
	<b>Fecha de Ingreso: </b> ".$FechaIngreso." <br>
	<b>Departamento: </b> ".$Departamento."<br>
	<b>Puesto: </b> ".$Puesto."<br>
	<b>Horas: </b> ".$Horas."<br>
	<b>Bruto: $</b> ".$Bruto."<br>
	<b>Neto: $</b> ".$Neto."<br>
				</td>
			</tr>
			<tr>
			<td colspan=\"2\">
	<h3>= Información Academica =</h3>
	<b>Último Grado de estudios: </b> ".$UltimoGrado." <br>
	<b>Carrera o Especialidad: </b> ".$Carrera."<br>
	<b>Área de conocimientos: </b> ".$AreaConocimiento."<br>
	<b>Entidad Federativa dónde estudió: </b> ".$EntidadFederativa."<br>
	<b>Nombre de la Institución: </b> ".$Institucion."<br>
	<b>Estatus: </b> ".$Estatus."<br>
	<b>Nombre del documento académico: </b> ".$DocAcademico."<br>
	<b>Fecha de Expedición del documento: </b> ".$FechaExpedicion."<br>
	<b>No. De folio del documento académico: </b> ".$NoFolioDoc."<br></td>
				
			</tr>
		</tbody>
	</table>

	";

	$pdf->SetFont('helvetica', '', 11);
	$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
	$pdf->Output('Cedula Personal.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
