<?php 


	$idPersonal=$_GET['idPersonal'];
	$Privilegio=$_GET['Privilegio'];

	include_once "../Privilegios.php";
	include_once "../SQLControlador.php";

	$Privilegios = new Privilegios();
	$Privilegios->setUsuarios_idUsuariosÍndice($idPersonal);
	$Privilegios->setTipoPrivilegio($Privilegio);

	$SQLControlador = new SQLControlador();
	echo $SQLControlador->AgregarAsignacionPrivilegio($Privilegios);
	
	//$Consulta = "INSERT INTO Privilegios (idPrivilegios, Clave, Nombre, AreaEspecialidad) VALUES (null,'$c','$n','$a');";
	//echo $Resultado = $Mysql->Consulta($Consulta);

 ?>