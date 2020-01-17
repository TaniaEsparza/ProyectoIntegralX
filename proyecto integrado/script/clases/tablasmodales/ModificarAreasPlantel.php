<?php 
	$Id=$_GET['id'];
	$NombreArea=$_GET['NombreArea'];
	$Edificio = $_GET['Edificio'];
	$Estatus = $_GET['Estatus'];

	include_once "../AreasPlantel.php";
	include_once "../SQLControlador.php";

	$AreasPlantel = new AreasPlantel();
	$AreasPlantel->setidAreasPlantel($Id);
	$AreasPlantel->setNombreArea($NombreArea);
	$AreasPlantel->setEdificio($Edificio);
	$AreasPlantel->setEstatus($Estatus);

	$SQLControlador = new SQLControlador();
	echo $SQLControlador->ModificarAreaPlantel($AreasPlantel);

 ?>