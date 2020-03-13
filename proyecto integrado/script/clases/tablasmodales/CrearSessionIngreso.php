<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdIngreso=$_GET['Valor'];
	$_SESSION['ConsultaIng']=$IdIngreso;
	echo $IdIngreso;
 ?>