<?php 
if (!isset($_SESSION)) { session_start(); }

$_SESSION['idInventario'] = $_GET['idInventario'];
//echo "La session tiene el numero".$_SESSION['idInventario'];
echo "<SCRIPT>window.location='ModificacionInventario.php';</SCRIPT>";

?>