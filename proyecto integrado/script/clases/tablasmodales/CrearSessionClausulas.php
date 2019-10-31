<?php 
	if (!isset($_SESSION)) { session_start(); }
	$IdClausula=$_GET['Valor'];
	$_SESSION['ConsultaCla']=$IdClausula;
	echo $IdClausula;
 ?>