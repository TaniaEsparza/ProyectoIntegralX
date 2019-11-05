
<?php
require('../conexion.php');

if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $sql = "SELECT * FROM inventario WHERE fecha_ingreso <= '$fecha_fin' AND fecha_ingreso >= '$fecha_inicio'";
}else if(isset($_POST['busqueda'])){
    $sql = "SELECT * FROM inventario WHERE articulo LIKE '%$_POST[busqueda]%' OR descripcion LIKE '%$_POST[busqueda]%'";
} 
$result = $conexion->query($sql);

echo "<tr>
    <th>Articulo</th>
    <th>Descripcion</th>
    <th>Precio</th>
    <th>piezas</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>Imagen</th>
    <th>Operaciones</th>
</tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>$row[articulo]</td>";
        echo "<td>$row[descripcion]</td>";
        echo "<td>$row[precio]</td>";
        echo "<td>$row[cantidad]</td>";
        echo "<td>";
        switch($row['estado']){
            case 1:
                echo "BUENO";
                break;
            case 2:
                echo "REGULAR";
                break;
            case 3:
                echo "MALO";
                break;
            default:
                echo $row['estado'];
                break;
        }
        echo "</td>";
        echo "<td>$row[fecha_ingreso]</td>";
        echo "<td>"."<img src='./imagenes/inventario/$row[imagen]' class='img-thumbnail'>"."</td>";
        echo "<td>
        <a type='button' class='btn btn-sm btn-success' href='GuardarInventario.php?id=$row[id]'>Modificar</a>
        <a type='button' class='btn btn-sm btn-success' href='ImprimirInventario.php?id=$row[id]'>Imprimir</a>
        <a type='button' class='btn btn-sm btn-success' href='BorrarRegistro.php?id=$row[id]&tabla=inventario'>Borrar</a>
        </td>";
        echo "</tr>";


    }
}

?>
