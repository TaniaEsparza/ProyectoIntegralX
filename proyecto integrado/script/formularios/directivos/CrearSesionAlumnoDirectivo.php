<?php
	if (!isset($_SESSION)) { session_start(); }
	
	$_SESSION['IdAlumnoDirectivo'] = $_GET['idalumno'];
	// echo "La sesion tiene el numero ".$_SESSION['IdAlumnoDocenteTutor'];
	echo "<script language='javascript'>window.location = 'InicioAlumnoIndividualD.php'</script>";
?>