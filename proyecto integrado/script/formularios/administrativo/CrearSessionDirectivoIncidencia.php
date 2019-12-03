<?php 
if (!isset($_SESSION)) { session_start(); }

$_SESSION['idIncidencia'] = $_GET['idIncidencia'];
echo "La session tiene el numero".$_SESSION['idIncidencia'];
echo "<SCRIPT>window.location='ModificacionIncidencia.php';</SCRIPT>";

?>