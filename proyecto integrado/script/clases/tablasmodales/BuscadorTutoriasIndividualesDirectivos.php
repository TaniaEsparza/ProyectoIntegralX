<?php 
session_start();

	include_once "../MySQLConector.php";
    $Mysql = new MySQLConector();
    $Mysql->Conectar();

	$Consulta ="SELECT * FROM `tutoriaindividual` WHERE tutoriaindividual.Alumno_idAlumno = '".$_SESSION['IdAlumnoDirectivo']."';";
	
	$Resultado = $Mysql->Consulta($Consulta);

 ?>

 <div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label ><b>Buscador</b></label>
		<select id="buscadorvivo">
			<option value="0">Seleciona uno</option>
			<?php while($fila = $Resultado->fetch_assoc()){ ?>
				<option value="<?php echo $fila['idTutoriaIndividual'] ?>">
					<?php echo $fila['FechaTutoria']." ".$fila['Horario'] ?>
				</option>
			<?php }?> 
		</select>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#buscadorvivo').val(),
					url:'../../clases/tablasmodales/CrearSessionTutoriaIndividualDirectivos.php',
					success:function(r){
						$('#tabla').load('../../clases/tablasmodales/TablaTutoriasIndividualesdirectivos.php');
					}
				});
			});
		});
	</script>