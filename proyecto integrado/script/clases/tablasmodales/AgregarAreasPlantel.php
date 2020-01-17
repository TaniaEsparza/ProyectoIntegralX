<?php 


	$NombreArea=$_GET['NombreArea'];
	$Edificio=$_GET['Edificio'];

	include_once "../AreasPlantel.php";
	include_once "../SQLControlador.php";

	$AreasPlantel = new AreasPlantel();
	$AreasPlantel->setNombreArea($NombreArea);
	$AreasPlantel->setEdificio($Edificio);

	$SQLControlador = new SQLControlador();
	echo $SQLControlador->AgregarAreaPlantel($AreasPlantel);
	
	//$Consulta = "INSERT INTO AreasPlantel (idAreasPlantel, Clave, Nombre, AreaEspecialidad) VALUES (null,'$c','$n','$a');";
	//echo $Resultado = $Mysql->Consulta($Consulta);

 ?>