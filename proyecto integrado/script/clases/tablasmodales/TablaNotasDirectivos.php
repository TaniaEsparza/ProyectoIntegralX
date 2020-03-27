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
				<a class="btn btn-success" href='../directivos/AltaNotas.php'>
					Agregar Nueva Nota
					<span class="glyphicon glyphicon-plus"></span>
				</a>
			</caption>
			<br>
			<br>
			<div class="table-responsive">
				<table class="table table-hover table-bordered ">
					<thead class="thead-light">
						<tr>
							<th>Id.Nota</th>
							<th>Asunto</th>
							<th>Fecha</th>
							<th>Operaciones</th>
							<th>Ver</th>
						</tr>
					</thead>

					<?php 
					if(isset($_SESSION['ConsultaNT'])){
						if($_SESSION['ConsultaNT'] > 0){
							$idAlumno=$_SESSION['ConsultaNT'];

							$Consulta = "SELECT ingresos.Folio, ingresos.Fecha, ingresos.idAlumno, ingresos.idConceptodePago, alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, conceptodepago.NombreConcepto, ingresos.idIngresos FROM ingresos, alumno, conceptodepago WHERE ingresos.idConceptodePago = conceptodepago.idConceptoDePago AND ingresos.idAlumno = alumno.idAlumno AND ingresos.idAlumno = '$idAlumno' ";

						}else{
							$Consulta = "SELECT * FROM notas where notas.Alumno_idAlumno = 1; ";
						}
					}else{
						$Consulta = "SELECT * FROM notas where notas.Alumno_idAlumno = 1; ";
					}
					$Resultado = $Mysql->Consulta($Consulta);
					while($ver=mysqli_fetch_row($Resultado)){ 

						$datosN=$ver[0]."||".
						$ver[1]."||".
						$ver[2]."||".
						$ver[3]."||".
						$ver[4]."||".
						$ver[5];
						?>

						<tr>
							<td><?php echo $ver[0]; ?></td>
							<td><?php echo $ver[2]; ?></td>
							<td><?php echo $ver[3]; ?></td>
							<?php echo"<td><a href=\"../../formularios/directivos/CrearSessionDirectivoNota.php?idNota=".$ver[0]."\" ><button class=\"btn btn-success glyphicon glyphicon-pencil\">Modificar</button></a></td>"?>
							<td>
							<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="VerNota('<?php echo $datosN ?>')">
								Mostrar
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