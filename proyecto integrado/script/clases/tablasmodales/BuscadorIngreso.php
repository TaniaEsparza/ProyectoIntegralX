<?php 
	//require_once "../php/conexion.php";


	include_once "../SQLControlador.php";
    $Mysql = new MySQLConector();
    $Mysql->Conectar();
    $Consulta = "SELECT alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, alumno.idAlumno, ingresos.idIngresos, ingresos.idAlumno FROM alumno, ingresos WHERE ingresos.idAlumno = alumno.idAlumno;";
    $Resultado = $Mysql->Consulta($Consulta);

 ?>

<div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label style="font-weight: bold;">Buscador por nombre:</label>
		<select id="buscadorvivo" class="form-control input-sm">
			<option value="0">Seleciona uno</option>
			<?php
				while($ver=mysqli_fetch_row($Resultado)): 
			 ?>
				<option value="<?php echo $ver[3] ?>">
					<?php echo $ver[0]." ".$ver[1] ." ".$ver[2]?>
				</option>

			<?php endwhile; ?>

		</select>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"GET",
					data:'Valor=' + $('#buscadorvivo').val(),
					url:'./../../../script/clases/tablasmodales/CrearSessionIngreso.php',
					success:function(r){
						$('#tabla').load('./../../../script/clases/tablasmodales/TablaIngreso.php');
					}
				});
			});
		});
	</script>