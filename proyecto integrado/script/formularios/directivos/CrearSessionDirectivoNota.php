<?php
	if (!isset($_SESSION)) { session_start(); }
	
	$_SESSION['IdAlumnoDirectivoNota'] = $_GET['idNota'];
	// echo "La sesion tiene el numero ".$_SESSION['IdAlumnoDocenteTutor'];
	echo "<script language='javascript'>window.location = 'ModificarNotas.php'</script>";
?>