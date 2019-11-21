<?php
require('../conexion.php');

if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $sql = "SELECT * FROM incidencias JOIN docentes ON incidencias.id = docentes.id
    WHERE fecha_incidencia <= '$fecha_fin' AND fecha_incidencia >= '$fecha_inicio'";
}else if(isset($_POST['busqueda'])){
    $sql = "SELECT * FROM incidencias JOIN docentes ON incidencias.id = docentes.id 
    WHERE nombre LIKE '%$_POST[busqueda]%' OR asunto LIKE '%$_POST[busqueda]%' OR numero_empleado LIKE '%$_POST[busqueda]%'";
} 
$result = $conexion->query($sql);

echo "<tr>
    <th>No. Empleado</th>
    <th>Nombre Empleado</th>
    <th>Puesto</th>
    <th>Asunto</th>
    <th>Clausula</th>
    <th>Operaciones</th>
</tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>$row[numero_empleado]</td>";
        echo "<td>$row[nombre] $row[apellido_paterno] $row[apellido_materno]</td>";
        echo "<td>$row[puesto]</td>";
        echo "<td>$row[asunto]</td>";
        echo "<td>$row[clausula]</td>";
        echo "<td>
        <!-- <a type='button' class='btn btn-sm btn-success' href='GuardarEgreso.php?id=$row[id]'>Modificar</a> -->
        <a type='button' class='btn btn-sm btn-success' href='ImprimirIncidencia.php?id=$row[id]'>Imprimir</a>
        <a type='button' class='btn btn-sm btn-success' href='BorrarRegistro.php?id=$row[id]&tabla=incidencias'>Borrar</a>
        </td>";
        echo "</tr>";
    }
}
?>