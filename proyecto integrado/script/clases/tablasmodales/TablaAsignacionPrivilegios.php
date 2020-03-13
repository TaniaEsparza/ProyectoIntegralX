
<?php 
if (!isset($_SESSION)) { session_start(); }


	//require_once "../php/conexion.php";
	//$conexion=conexion();

include_once "../SQLControlador.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();

?>

<div class="row">
	<div class="col-sm-12">
		<!--<h2>Tabla de carreras</h2>-->
		<br>
		<caption>
			<button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo">
				Agregar nueva asignación
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			
		</caption>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover table-bordered ">
				<thead class="thead-light">
					<tr>
						<th>id Personal</th>
						<th>No. Empleado</th>
						<th>Nombre</th>
						<th>Privilegio</th>
						<th>Editar</th>
					</tr>
				</thead>

				<?php 
				if(isset($_SESSION['ConsultaAsiPriv'])){
					if($_SESSION['ConsultaAsiPriv'] > 0){
						$AsiPriv=$_SESSION['ConsultaAsiPriv'];
						$Consulta = "SELECT personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM, personal.NoEmpleado, privilegios.Usuarios_idUsuarios, privilegios.TipoPrivilegio, privilegios.idPrivilegios FROM personal, privilegios WHERE personal.idPersonal = privilegios.Usuarios_idUsuarios and privilegios.Usuarios_idUsuarios = $AsiPriv";

					}else{
						$Consulta = "SELECT personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM, personal.NoEmpleado, privilegios.Usuarios_idUsuarios, privilegios.TipoPrivilegio, privilegios.idPrivilegios FROM personal, privilegios WHERE personal.idPersonal = privilegios.Usuarios_idUsuarios ;";
					}
				}else{
					$Consulta = "SELECT personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM, personal.NoEmpleado, privilegios.Usuarios_idUsuarios, privilegios.TipoPrivilegio, privilegios.idPrivilegios FROM personal, privilegios WHERE personal.idPersonal = privilegios.Usuarios_idUsuarios  ";
				}
				$Resultado = $Mysql->Consulta($Consulta);
				while($ver=mysqli_fetch_row($Resultado)){ 

					$datosC=$ver[0]."||".
					$ver[1]."||".
					$ver[2]."||".
					$ver[3]."||".
					$ver[4]."||".
					$ver[5]."||".
					$ver[6]."||".
					$ver[7];
				//echo $datosM;
					?>

					<tr>
						<td><?php echo $ver[0] ?></td>
						<td><?php echo $ver[4] ?></td>	
						<td><?php echo $ver[1]. ' ' . $ver[2]. ' ' .$ver[3] ?></td>	
						<td><?php if($ver[6] == 1){echo "Directivo";}elseif($ver[6] == 2){echo "Capturista";}elseif ($ver[6] == 3) { echo "Docente Tutor";}elseif ($ver[6] == 4) {echo "Docente";}elseif ($ver[6]==5) { echo "Alumno";}elseif ($ver[6] == 6) {echo "Administrativo";}elseif ($ver[6] == 7) {echo "Super Usuario";} ?></td>	
						<!--<td><?php //if($ver[5] == 1){ echo "Activo"; } else { echo "Inactivo";} ?></td>-->	
						<td>
							<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="VerAsignacionPrivilegio('<?php echo $datosC ?>')">
								Modificar
							</button>
						</td>
					</tr>
					<?php 
				}
				?>
			</table>
			<br><br>
		</div>
	</div>
</div>