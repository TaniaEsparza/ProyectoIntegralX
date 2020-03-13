<?php 

$Id=$_GET['idPersonal'];

  include_once "../../Clases/MySQLConector.php";

 $Mysql = new MySQLConector();
    $Mysql->Conectar();

    $Consulta = "SELECT personal.idPersonal,personal.ApellidoP, personal.NoEmpleado FROM personal WHERE personal.idPersonal = '".$Id."';";

    $Resultado = $Mysql->Consulta($Consulta);


    while ($fila = $Resultado-> fetch_assoc()) {
      $Contrasena = $fila['ApellidoP'];
      $NoEmpleado= $fila['NoEmpleado'];
    }

    $ContrasenaNew = md5(strtolower($Contrasena));

    include_once "../../Clases/Usuarios.php";
    include_once "../../Clases/SQLControlador.php";

    $UsuariosPersonal = new Usuarios();
    $UsuariosPersonal-> setPersonal_idPersonal($Id);
    $UsuariosPersonal-> setContrasena($ContrasenaNew);

    $SQLControlador = new SQLControlador();

    $resul =  $SQLControlador->RestablecerContrasenaPersonal($UsuariosPersonal);

    if ($resul == 1) {
      echo "<script language = 'javascript'> alert('El usuario es:".$NoEmpleado."\\nLa Contraseña es: ".strtolower($Contrasena)."') </script>";
      echo "<script language = 'javascript'> window.location = '../administrador(root)/ConsultaTodosPersonal.php'</script>";
    }else{
      echo"<script language = 'javascript'> alert('no se pudo restablecer contraseña')</script>";
      echo "<script language = 'javascript'> window.location = '../administrador(root)/ConsultaTodosPersonal.php'</script>";
    }


 ?>
