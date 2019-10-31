
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
				Agregar nueva cláusula
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			
		</caption>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover table-bordered ">
				<thead class="thead-light">
					<tr>
						<th>Cláusula/Número</th>
						<th>Asunto</th>
						<th>En caso de</th>
						<th>Documentación</th>
						<th>Estatus</th>
						<th>Editar</th>
					</tr>
				</thead>

				<?php 
				if(isset($_SESSION['ConsultaCla'])){
					if($_SESSION['ConsultaCla'] > 0){
						$IdClausulas=$_SESSION['ConsultaCla'];
						$Consulta = "SELECT * FROM `clausulas` WHERE clausulas.idClausulas = '$IdClausulas' ";

					}else{
						$Consulta = "SELECT * FROM `clausulas`;";
					}
				}else{
					$Consulta = "SELECT * FROM `clausulas` ";
				}
				$Resultado = $Mysql->Consulta($Consulta);
				while($ver=mysqli_fetch_row($Resultado)){ 

					$datosC=$ver[0]."||".
					$ver[1]."||".
					$ver[2]."||".
					$ver[3]."||".
					$ver[4]."||".
					$ver[5];
				//echo $datosM;
					?>

					<tr>
						<td><?php echo $ver[1] ?></td>
						<td><?php echo $ver[2] ?></td>	
						<td><?php echo $ver[3] ?></td>	
						<td><?php echo $ver[4] ?></td>	
						<td><?php if($ver[5] == 1){ echo "Activo"; } else { echo "Inactivo";} ?></td>	
						<td>
							<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="VerClausulas('<?php echo $datosC ?>')">
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