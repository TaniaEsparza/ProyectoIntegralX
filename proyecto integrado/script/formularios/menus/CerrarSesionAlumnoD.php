<?php

	if (!isset($_SESSION)) { session_start(); }
	if(file_exists('../docentetutor/graficastest/grafica'.$_SESSION['IdAlumnoDirectivo'].'.png')){
		unlink('../docentetutor/graficastest/grafica'.$_SESSION['IdAlumnoDirectivo'].'.png');
	} else {

	}	
	
	unset($_SESSION['IdAlumnoDirectivo']);

	echo "<script language='javascript'>window.location='../directivos/BusquedaTodosAlumnos.php'</script>";
?>