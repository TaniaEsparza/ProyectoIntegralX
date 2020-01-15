<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdIncidencias=$_GET['Valor'];
	$_SESSION['ConsultaInci']=$IdIncidencias;
	echo $IdIncidencias;
 ?>