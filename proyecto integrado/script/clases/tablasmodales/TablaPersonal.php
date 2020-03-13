
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
			<a class="btn btn-success" href='../administrativo/AltaPersonal.php'>
				Nuevo Personal
				<span class="glyphicon glyphicon-plus"></span>
			</a>
			
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
						<th>Editar</th>
						<th>Ver</th>
					</tr>
				</thead>

				<?php 
				if(isset($_SESSION['ConsultaPer'])){
					if($_SESSION['ConsultaPer'] > 0){
						$idPer=$_SESSION['ConsultaPer'];
						$Consulta = "SELECT personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM, personal.NoEmpleado FROM personal WHERE personal.idPersonal = $idPer";

					}else{
						$Consulta = "SELECT personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM, personal.NoEmpleado FROM personal;";
					}
				}else{
					$Consulta = "SELECT personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM, personal.NoEmpleado FROM personal; ";
				}
				$Resultado = $Mysql->Consulta($Consulta);
				while($ver=mysqli_fetch_row($Resultado)){ 

					$datosC=$ver[0]."||".
					$ver[1]."||".
					$ver[2]."||".
					$ver[3]."||".
					$ver[4];
				//echo $datosM;
					?>

					<tr>
						<td><?php echo $ver[0] ?></td>
						<td><?php echo $ver[4] ?></td>	
						<td><?php echo $ver[1]. ' ' . $ver[2]. ' ' .$ver[3] ?></td>	
							<?php echo"<td><a href=\"../../formularios/administrativo/CrearSessionAdminPersonal.php?idPersonal=".$ver[0]."\" ><button class=\"btn btn-success glyphicon glyphicon-pencil\">Modificar</button></a></td>"?>
							<?php echo"<td><a href=\"../../reportes/CedulaPersonal.php?idPersonal=".$ver[0]."\" target=\"_blank\" ><button class=\"btn btn-success glyphicon glyphicon-pencil\">Mostrar</button></a></td>"?>
					</tr>
					<?php 
				}
				?>
			</table>
			<br><br>
		</div>
	</div>
</div>