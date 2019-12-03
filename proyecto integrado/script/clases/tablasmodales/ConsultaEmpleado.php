<?php
$idPersonal = $_GET['idPersonal'];

include_once "../../clases/MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
$Consulta2 = "SELECT Puesto, NoEmpleado  FROM `Personal` WHERE Personal.idPersonal = '".$idPersonal."';";
$Resultado2 = $Mysql->Consulta($Consulta2);
echo json_encode($fila2 = mysqli_fetch_array($Resultado2));

?>