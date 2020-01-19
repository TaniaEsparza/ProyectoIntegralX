<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdAreaPlantel=$_GET['Valor'];
	$_SESSION['ConsultaAIA']=$IdAreaPlantel;
	echo $IdAreaPlantel;
 ?>