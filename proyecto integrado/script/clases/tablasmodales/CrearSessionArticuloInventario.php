<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdArticulo=$_GET['Valor'];
	$_SESSION['ConsultaAI']=$IdArticulo;
	echo $IdArticulo;
 ?>