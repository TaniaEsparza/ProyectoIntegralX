	<?php 
		$Id=$_GET['idAlumno'];

		include_once "../../Clases/mysqlconector.php";

		$Mysql = new MySQLConector();
	    $Mysql->Conectar();

		$Consulta = "SELECT usuariosalumnos.Alumno_idAlumno, usuariosalumnos.NombreUsuario FROM usuariosalumnos WHERE usuariosalumnos.Alumno_idAlumno = '".$Id."';";

		$Resultado = $Mysql->Consulta($Consulta);

		while ($fila = $Resultado->fetch_assoc()) {
			$Contrasena = $fila['NombreUsuario'];
		}
		
		$ContrasenaNew = md5($Contrasena);

		include_once "../../Clases/UsuariosAlumnos.php";
		include_once "../../Clases/SQLControlador.php";

		$UsuariosAlumnos = new UsuariosAlumnos();
		$UsuariosAlumnos->setidUsuariosAlumnos($Id);
		$UsuariosAlumnos->setContrasena($ContrasenaNew);

		$SQLControlador = new SQLControlador();
		$Resul = $SQLControlador->RestablecerContrasenaAlumno($UsuariosAlumnos);

		if($Resul == 1){
			echo "<script language='javascript'> alert('Usuario: ".$Contrasena." \\nContraseña: ".$Contrasena."')</script>";
			echo "<script language='javascript'>window.location = '../administrador(root)/ConsultaTodosAlumnos.php'</script>";
		}else{
			echo "<script language = 'javascript'> alert('No se pudo restablecer contraseña')</script>";
			echo "<script language='javascript'>window.location = '../administrador(root)/ConsultaTodosAlumnos.php'</script>";
			
		}	
?>