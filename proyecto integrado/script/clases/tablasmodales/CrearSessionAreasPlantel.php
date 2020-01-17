<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdAreaPlantel=$_GET['Valor'];
	$_SESSION['ConsultaAP']=$IdAreaPlantel;
	echo $IdAreaPlantel;
 ?>