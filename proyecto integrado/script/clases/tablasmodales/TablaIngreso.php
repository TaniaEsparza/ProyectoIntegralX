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
			<a class="btn btn-success" href='../administrativo/AltaIngreso.php'>
				Agregar Nuevo Pago
				<span class="glyphicon glyphicon-plus"></span>
			</a>
		</caption>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover table-bordered ">
				<thead class="thead-light">
					<tr>
						<th>No. Pago</th>
						<th>Nombre</th>
						<th>Folio</th>
						<th>Concepto</th>
						<th>Fecha</th>
						<th>Operaciones</th>
						<th>Ver</th>
					</tr>
				</thead>

				<?php 
				if(isset($_SESSION['ConsultaIng'])){
					if($_SESSION['ConsultaIng'] > 0){
						$idAlumno=$_SESSION['ConsultaIng'];

						$Consulta = "SELECT ingresos.Folio, ingresos.Fecha, ingresos.idAlumno, ingresos.idConceptodePago, alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, conceptodepago.NombreConcepto, ingresos.idIngresos FROM ingresos, alumno, conceptodepago WHERE ingresos.idConceptodePago = conceptodepago.idConceptoDePago AND ingresos.idAlumno = alumno.idAlumno AND ingresos.idAlumno = '$idAlumno' ";

					}else{
						$Consulta = "SELECT ingresos.Folio, ingresos.Fecha, ingresos.idAlumno, ingresos.idConceptodePago, alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, conceptodepago.NombreConcepto, ingresos.idIngresos FROM ingresos, alumno, conceptodepago WHERE ingresos.idConceptodePago = conceptodepago.idConceptoDePago AND ingresos.idAlumno = alumno.idAlumno ";
					}
				}else{
					$Consulta = "SELECT ingresos.Folio, ingresos.Fecha, ingresos.idAlumno, ingresos.idConceptodePago, alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, conceptodepago.NombreConcepto, ingresos.idIngresos FROM ingresos, alumno, conceptodepago WHERE ingresos.idConceptodePago = conceptodepago.idConceptoDePago AND ingresos.idAlumno = alumno.idAlumno  ";
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
					$ver[8];
					?>

					<tr>
						<td><?php echo $ver[8]; ?></td>
						<td><?php echo $ver[4].' '.$ver[5].' '.$ver[6]?></td>
						<td><?php echo $ver[0];?></td>
						<td><?php echo $ver[7]?></td>	
						<td><?php echo $ver[1]?></td>	
						
						<?php echo"<td><a href=\"../../formularios/administrativo/CrearSessionDirectivoIngreso.php?idIngreso=".$ver[8]."\" ><button class=\"btn btn-success glyphicon glyphicon-pencil\">Modificar</button></a></td>"?>
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