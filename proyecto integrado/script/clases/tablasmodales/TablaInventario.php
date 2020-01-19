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
			<a class="btn btn-success" href='../administrativo/AltaInventario.php'>
				Nuevo Articulo a Inventario
				<span class="glyphicon glyphicon-plus"></span>
			</a>
			
		</caption>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover table-bordered ">
				<thead class="thead-light">
					<tr>
						<th>idArticulo</th>
						<th>Articulo</th>
						<th>Descripcion</th>
						<th>Precio Unitario</th>
						<th>Cantidad</th>
						<th>Proveedores</th>
						<th>Origenes</th>
						<th>No. Serie</th>
						<th>Fecha Ingreso CECyTe</th>
						<th>Tipo de inventario</th>
						<th>Fecha de Registro Zac</th>
						<th>Estatus</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Imagen</th>
						<th>Mes</th>
						<th>Anyo</th>
						<th>Categoria</th>
						<th>Estado Fisico</th> 
						<th>Area</th>
						<th>Ubicacion</th>
						<th>Empleado</th>
						<th>Operaciones</th>
						<th>Ver</th>
					</tr>
				</thead>

				<?php 
				if(isset($_SESSION['ConsultaAIA'])){
					if($_SESSION['ConsultaAIA'] > 0){
						$IdAreasPlantel=$_SESSION['ConsultaAIA'];
						$Consulta = "SELECT inventario.idInventario, inventario.Articulo, inventario.Descripcion, inventario.Precio, inventario.Cantidad, inventario.Proveedores, inventario.Origenes, inventario.NoSerie, inventario.FechaIngreso, inventario.Tipo, inventario.FechaRegistro, inventario.Estatus, inventario.Marca, inventario.Modelo, inventario.Mes, inventario.Anyo, inventario.Imagen, inventario.Categorias, inventario.Estado, inventario.Area, inventario.Ubicacion, inventario.Empleado, personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM, areasplantel.idAreasPlantel, areasplantel.NombreArea, areasplantel.Edificio, areasplantel.Estatus FROM personal, inventario, areasplantel WHERE inventario.Empleado = personal.idPersonal  AND inventario.Area = areasplantel.idAreasPlantel AND inventario.Area = '$IdAreasPlantel';";

					}else{
						$Consulta = "SELECT inventario.idInventario, inventario.Articulo, inventario.Descripcion, inventario.Precio, inventario.Cantidad, inventario.Proveedores, inventario.Origenes, inventario.NoSerie, inventario.FechaIngreso, inventario.Tipo, inventario.FechaRegistro, inventario.Estatus, inventario.Marca, inventario.Modelo, inventario.Mes, inventario.Anyo, inventario.Imagen, inventario.Categorias, inventario.Estado, inventario.Area, inventario.Ubicacion, inventario.Empleado, personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM, areasplantel.idAreasPlantel, areasplantel.NombreArea, areasplantel.Edificio, areasplantel.Estatus FROM personal, inventario, areasplantel WHERE inventario.Empleado = personal.idPersonal AND inventario.Area = areasplantel.idAreasPlantel;";
					}
				}else{
					$Consulta = "SELECT inventario.idInventario, inventario.Articulo, inventario.Descripcion, inventario.Precio, inventario.Cantidad, inventario.Proveedores, inventario.Origenes, inventario.NoSerie, inventario.FechaIngreso, inventario.Tipo, inventario.FechaRegistro, inventario.Estatus, inventario.Marca, inventario.Modelo, inventario.Mes, inventario.Anyo, inventario.Imagen, inventario.Categorias, inventario.Estado, inventario.Area, inventario.Ubicacion, inventario.Empleado, personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM, areasplantel.idAreasPlantel, areasplantel.NombreArea, areasplantel.Edificio, areasplantel.Estatus FROM personal, inventario, areasplantel WHERE inventario.Empleado = personal.idPersonal AND inventario.Area = areasplantel.idAreasPlantel;";
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
					$ver[9]."||".
					$ver[10]."||".
					$ver[11]."||".
					$ver[12]."||".
					$ver[13]."||".
					$ver[14]."||".
					$ver[15]."||".
					$ver[16]."||".
					$ver[17]."||".
					$ver[18]."||".
					$ver[19]."||".
					$ver[20]."||".
					$ver[21];
					?>

					<tr>
						<td><?php echo $ver[0];?></td>
						<td><?php echo $ver[1]?></td>
						<td><?php echo $ver[2]?></td>	
						<td><?php echo $ver[3]?></td>	
						<td><?php echo $ver[4]?></td>	
						<td><?php echo $ver[5]?></td>
						<td><?php echo $ver[6]?></td>
						<td><?php echo $ver[7]?></td>
						<td><?php echo $ver[8]?></td>
						<td><?php echo $ver[9]?></td>
						<td><?php echo $ver[10]?></td>
						<td><?php echo $ver[11]?></td>
						<td><?php echo $ver[12]?></td>
						<td><?php echo $ver[13]?></td>
						<td><?php echo "<img width='150' height='150' src='data:imagen/jpeg;base64,".base64_encode($ver[16])."' />";?></td>
						<td><?php echo $ver[14]?></td>
						<td><?php echo $ver[15]?></td>
						<td><?php echo $ver[17]?></td>
						<td><?php echo $ver[18]?></td>
						<td><?php echo $ver[27]?></td>
						<td><?php echo $ver[20]?></td>
						<td><?php echo $ver[23].' '.$ver[24].' '.$ver[25]?></td>	
						
						<?php echo"<td><a href=\"../../formularios/administrativo/CrearSessionDirectivoInventario.php?idInventario=".$ver[0]."\" ><button class=\"btn btn-success glyphicon glyphicon-pencil\">Modificar</button></a></td>"?>
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