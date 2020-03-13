<?php
$idConceptodePago = $_POST['idConceptodePago'];

include_once "../../clases/MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
$Consulta2 = "SELECT *  FROM `ConceptodePago` WHERE ConceptodePago.idConceptodePago = '".$idConceptodePago."';";
$Resultado2 = $Mysql->Consulta($Consulta2);
echo json_encode($fila2 = mysqli_fetch_array($Resultado2));

?>