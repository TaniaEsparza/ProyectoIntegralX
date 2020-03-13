<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdPersonal=$_GET['Valor'];
	$_SESSION['ConsultaAsiPriv']=$IdPersonal;
	echo $IdPersonal;
 ?>