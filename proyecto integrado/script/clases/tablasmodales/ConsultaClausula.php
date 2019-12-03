<?php
$idClausula = $_GET['idClausula'];

include_once "../../clases/MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
$Consulta2 = "SELECT Asunto, Documentacion  FROM `Clausulas` WHERE Clausulas.idClausulas = '".$idClausula."';";
$Resultado2 = $Mysql->Consulta($Consulta2);
echo json_encode($fila2 = mysqli_fetch_array($Resultado2));

?>