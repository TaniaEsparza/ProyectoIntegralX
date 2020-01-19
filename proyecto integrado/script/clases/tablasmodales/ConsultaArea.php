<?php
$idArea = $_GET['idArea'];

include_once "../../clases/MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
$Consulta2 = "SELECT edificio FROM `areasplantel` WHERE areasplantel.idAreasPlantel = '".$idArea."';";
$Resultado2 = $Mysql->Consulta($Consulta2);
echo json_encode($fila2 = mysqli_fetch_array($Resultado2));

?>