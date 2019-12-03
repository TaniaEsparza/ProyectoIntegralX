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
			<a class="btn btn-success" href='../administrativo/AltaIncidencia.php'>
				Nueva Incidencia
				<span class="glyphicon glyphicon-plus"></span>
			</a>
		</caption>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover table-bordered ">
				<thead class="thead-light">
					<tr>
						<th>idIncidencia</th>
						<th>Empleado</th>
						<th>Asunto/Clausula</th>
						<th>Fecha</th>
						<th>Operaciones</th>
						<th>Ver</th>
					</tr>
				</thead>

				<?php 
				if(isset($_SESSION['ConsultaCla'])){
					if($_SESSION['ConsultaCla'] > 0){
						$IdClausulas=$_SESSION['ConsultaCla'];
						$Consulta = "SELECT * FROM `clausulas` WHERE clausulas.idClausulas = '$IdClausulas' ";

					}else{
						$Consulta = "SELECT incidencias.idIncidencias, incidencias.idEmpleado, incidencias.idClausulas, incidencias.Fecha, clausulas.idClausulas, clausulas.Asunto, personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM FROM incidencias, clausulas, personal WHERE incidencias.idEmpleado = personal.idPersonal and incidencias.idClausulas = clausulas.idClausulas;";
					}
				}else{
					$Consulta = "SELECT incidencias.idIncidencias, incidencias.idEmpleado, incidencias.idClausulas, incidencias.Fecha, clausulas.idClausulas, clausulas.Asunto, personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM FROM incidencias, clausulas, personal WHERE incidencias.idEmpleado = personal.idPersonal and incidencias.idClausulas = clausulas.idClausulas; ";
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
					$ver[7]."||".
					$ver[8]."||".
					$ver[9];
					?>

					<tr>
						<td><?php echo $ver[0];?></td>
						<td><?php echo $ver[7].' '.$ver[8].' '.$ver[9]?></td>
						<td><?php echo $ver[5]?></td>	
						<td><?php echo $ver[3]?></td>	
		
						<?php echo"<td><a href=\"../../formularios/administrativo/CrearSessionDirectivoIncidencia.php?idIncidencia=".$ver[0]."\" ><button class=\"btn btn-success glyphicon glyphicon-pencil\">Modificar</button></a></td>"?>
						<?php echo"<td><a href=\"../../reportes/ArticuloInventario.php?idInventario=".$ver[0]."\" target=\"_blank\" ><button class=\"btn btn-success glyphicon glyphicon-pencil\">Mostrar</button></a></td>"?>		
					</tr>
					<?php 
				}
				?>
			</table>
			<br><br>
		</div>
	</div>
</div>