
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
				Agregar nuevo concepto de pago
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			
		</caption>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover table-bordered ">
				<thead class="thead-light">
					<tr>
						<th>Concepto</th>
						<th>Costo/Monto</th>
						<th>Estatus</th>
						<th>Editar</th>
					</tr>
				</thead>

				<?php 
				if(isset($_SESSION['ConsultaCP'])){
					if($_SESSION['ConsultaCP'] > 0){
						$idConcepto=$_SESSION['ConsultaCP'];
						$Consulta = "SELECT * FROM `conceptodepago` where conceptodepago.idConceptoDePago = '".$idConcepto."' ";

					}else{
						$Consulta = "SELECT * FROM `conceptodepago`;";
					}
				}else{
					$Consulta = "SELECT * FROM `conceptodepago`; ";
				}
				$Resultado = $Mysql->Consulta($Consulta);
				while($ver=mysqli_fetch_row($Resultado)){ 

					$datosC=$ver[0]."||".
					$ver[2]."||".
					$ver[1]."||".
					$ver[3]."||".
					$ver[4];
				//echo $datosM;
					?>

					<tr>
						<td><?php echo $ver[2] ?></td>
						<td><?php echo "$". $ver[1] ?></td>	
						<td><?php if($ver[4] == 1){ echo "Activo"; } else { echo "Inactivo";} ?></td>	
						<td>
							<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="VerConceptosPago('<?php echo $datosC ?>')">
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