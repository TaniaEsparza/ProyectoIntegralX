<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdPersonal=$_GET['Valor'];
	$_SESSION['ConsultaPer']=$IdPersonal;
	echo $IdPersonal;
 ?>