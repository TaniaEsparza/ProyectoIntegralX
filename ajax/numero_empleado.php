<?php
require('../conexion.php');
$id_empleado = $_POST['id_empleado'];
$sql="SELECT numero_empleado FROM docentes WHERE id = '$id_empleado'";
$result = $conexion->query($sql)->fetch_assoc()['numero_empleado'];
echo $result;
?>