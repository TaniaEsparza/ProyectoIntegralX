<?php
require('../conexion.php');
$id_empleado = $_POST['id_empleado'];
$sql="SELECT puesto FROM docentes WHERE id = '$id_empleado'";
$result = $conexion->query($sql)->fetch_assoc()['puesto'];
echo $result;
?>