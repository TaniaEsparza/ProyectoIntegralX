<?php 
	$idPrivilegio = $_GET['idPrivilegio'];
	$idPersonal=$_GET['idPersonal'];
	$Privilegio=$_GET['Privilegio'];

	include_once "../Privilegios.php";
	include_once "../SQLControlador.php";

	$Privilegios = new Privilegios();
	$Privilegios->setidPrivilegiosPrimaria($idPrivilegio);
	$Privilegios->setUsuarios_idUsuariosÍndice($idPersonal);
	$Privilegios->setTipoPrivilegio($Privilegio);

	$SQLControlador = new SQLControlador();
	echo $SQLControlador->ModificarAsignacionPrivilegio($Privilegios);

 ?>