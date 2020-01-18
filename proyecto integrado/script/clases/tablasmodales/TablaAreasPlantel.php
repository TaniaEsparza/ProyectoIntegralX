
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
				Agregar nueva área
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			
		</caption>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover table-bordered ">
				<thead class="thead-light">
					<tr>
						<th>Id</th>
						<th>Nombre/Área</th>
						<th>Edificio</th>
						<th>Estatus</th>
						<th>Editar</th>
					</tr>
				</thead>

				<?php 
				if(isset($_SESSION['ConsultaAP'])){
					if($_SESSION['ConsultaAP'] > 0){
						$IdAreaPlantel=$_SESSION['ConsultaAP'];
						$Consulta = "SELECT * FROM `AreasPlantel` WHERE AreasPlantel.idAreasPlantel = '$IdAreaPlantel' ";

					}else{
						$Consulta = "SELECT * FROM `AreasPlantel`;";
					}
				}else{
					$Consulta = "SELECT * FROM `AreasPlantel` ";
				}
				$Resultado = $Mysql->Consulta($Consulta);
				while($ver=mysqli_fetch_row($Resultado)){ 

					$datosAP=$ver[0]."||".
					$ver[1]."||".
					$ver[2]."||".
					$ver[3];
					?>

					<tr>
						<td><?php echo $ver[0] ?></td>
						<td><?php echo $ver[1] ?></td>
						<td><?php echo $ver[2] ?></td>	
						<td><?php if($ver[3] == 1){ echo "Activo"; } else { echo "Inactivo";} ?></td>	
						<td>
							<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="VerAreasPlantel('<?php echo $datosAP ?>')">
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