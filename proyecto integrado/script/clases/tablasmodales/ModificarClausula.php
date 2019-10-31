<?php 
	$Id=$_GET['id'];
	$Numero=$_GET['Numero'];
	$Asunto = $_GET['Asunto'];
	$Motivo = $_GET['Motivo'];
	$Documentacion = $_GET['Documentacion'];
	$Estatus = $_GET['Estatus'];

	include_once "../Clausulas.php";
	include_once "../SQLControlador.php";

	$Clausulas = new Clausulas();
	$Clausulas->setidClausulas($Id);
	$Clausulas->setNumero($Numero);
	$Clausulas->setAsunto($Asunto);
	$Clausulas->setMotivo($Motivo);
	$Clausulas->setDocumentacion($Documentacion);
	$Clausulas->setEstatus($Estatus);

	$SQLControlador = new SQLControlador();
	echo $SQLControlador->ModificarClausula($Clausulas);

 ?>