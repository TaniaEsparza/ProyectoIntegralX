<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdConcepto=$_GET['Valor'];
	$_SESSION['ConsultaCP']=$IdConcepto;
	echo $IdConcepto;
 ?>