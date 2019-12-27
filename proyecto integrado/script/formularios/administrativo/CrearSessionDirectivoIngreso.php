<?php 
if (!isset($_SESSION)) { session_start(); }

$_SESSION['idIngreso'] = $_GET['idIngreso'];
//echo "La session tiene el numero".$_SESSION['idIncidencia'];
echo "<SCRIPT>window.location='ModificacionIngreso.php';</SCRIPT>";

?>