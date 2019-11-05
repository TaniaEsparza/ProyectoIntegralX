<?php 

	$Concepto=$_GET['Concepto'];
	$Monto=$_GET['Monto'];
	$LetraMonto = $_GET['LetraMonto'];

	include_once "../ConceptosdePago.php";
	include_once "../SQLControlador.php";

	$ConceptosdePago = new ConceptosdePago();
	$ConceptosdePago->setNombreConcepto($Concepto);
	$ConceptosdePago->setMonto($Monto);
	$ConceptosdePago->setLetraMonto($LetraMonto);

	$SQLControlador = new SQLControlador();
	echo $SQLControlador->AgregarConceptosPago($ConceptosdePago);
	
	//$Consulta = "INSERT INTO ConceptosdePago (idConceptosdePago, Clave, Nombre, AreaEspecialidad) VALUES (null,'$c','$n','$a');";
	//echo $Resultado = $Mysql->Consulta($Consulta);

 ?>