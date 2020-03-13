<?php
$idAlumno = $_POST['idAlumno'];

include_once "../../clases/MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
$Consulta2 = "SELECT idAlumno, Grupos_idGrupos  FROM `alumno` WHERE alumno.idAlumno = '".$idAlumno."';";
$Resultado2 = $Mysql->Consulta($Consulta2);
echo json_encode($fila2 = mysqli_fetch_array($Resultado2));

?>