<?php 


	$Numero=$_GET['Numero'];
	$Asunto=$_GET['Asunto'];
	$Motivo=$_GET['Motivo'];
	$Documentacion=$_GET['Documentacion'];

	include_once "../Clausulas.php";
	include_once "../SQLControlador.php";

	$Clausulas = new Clausulas();
	$Clausulas->setNumero($Numero);
	$Clausulas->setAsunto($Asunto);
	$Clausulas->setMotivo($Motivo);
	$Clausulas->setDocumentacion($Documentacion);

	$SQLControlador = new SQLControlador();
	echo $SQLControlador->AgregarClausula($Clausulas);
	
	//$Consulta = "INSERT INTO Clausulas (idClausulas, Clave, Nombre, AreaEspecialidad) VALUES (null,'$c','$n','$a');";
	//echo $Resultado = $Mysql->Consulta($Consulta);

 ?>