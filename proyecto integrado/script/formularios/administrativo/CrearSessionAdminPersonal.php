<?php 
if (!isset($_SESSION)) { session_start(); }

$_SESSION['idPersonal'] = $_GET['idPersonal'];
//echo "La session tiene el numero".$_SESSION['idInventario'];
echo "<SCRIPT>window.location='ModificacionPersonal.php';</SCRIPT>";

?>