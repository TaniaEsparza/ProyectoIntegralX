<?php
    include_once "../SQLControlador.php";
    include_once "../Personal.php";

    $Mysql = new MySQLConector();
    $Mysql->Conectar();

    $salida = "";

       // $query = "SELECT * FROM jugadores WHERE Name NOT LIKE '' ORDER By Id_no LIMIT 25";
    $Consulta = "SELECT personal.idPersonal,NoEmpleado,CONCAT(personal.Nombre,' ',personal.ApellidoP,' ',personal.ApellidoM) AS NombreCompleto FROM personal WHERE personal.Nombre not LIKE '' ORDER by personal.idPersonal LIMIT 25;";

    if (isset($_POST['consulta'])) {
        $q = $_POST['consulta'];
        $Consulta = "SELECT personal.idPersonal,NoEmpleado,CONCAT(personal.Nombre,' ',personal.ApellidoP,' ',personal.ApellidoM) AS NombreCompleto FROM personal WHERE  CONCAT(personal.Nombre,' ',personal.ApellidoP,' ',personal.ApellidoM) LIKE '%$q%' or personal.NoEmpleado LIKE '%$q%' or personal.idPersonal LIKE '%$q%';";
    }

    $Resultado = $Mysql->Consulta($Consulta);

    if ($Resultado->num_rows>0) {
       $salida.="<div class='table-responsive'>
                    <div class='table table-hover table-bordered'>
                        <table border=1 class='tabla_datos'>
                           <thead class='thead-light'>
                           <tr id='titulo'>
                           <th>ID</td>
                           <th>NoEmpleado</td>
                           <th>Nombre</td>                        
                           <th></td>
                           </tr>
                           </thead>

                          <tbody>";
                          while ($fila = $Resultado->fetch_assoc()) {
                          $salida.="<tr>
                                <td class='table-light'>".$fila['idPersonal']."</td>
                                <td>".$fila['NoEmpleado']."</td>
                                <td>".$fila['NombreCompleto']."</td>
                                <td><form action='../../formularios/administrador(root)/RestablecerContrasenaPersonal.php?idPersonal=".$fila['idPersonal']."' method='post'><button class='btn btn-success'>Restablecer Contraseña</button></a></form></td>
                            </tr>";
                            }
                    $salida.="</tbody></table></div></div><br><br>";
                  }else{
                     $salida.="NO HAY DATOS :(";
                  }

                  echo $salida;
$Mysql->CerrarConexion();
?>