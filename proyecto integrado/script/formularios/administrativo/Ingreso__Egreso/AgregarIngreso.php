<?php
if (isset($_POST['nombre'])){

	require('conexion.php');

	$sql = "INSERT INTO ingresos 
	(apellido_paterno, apellido_materno, nombre, fecha_ingreso, grado, grupo, semestre, carrera, concepto, costo)
	VALUES ('$_POST[apellido_paterno]', '$_POST[apellido_materno]', '$_POST[nombre]', '$_POST[fecha_ingreso]', 
	'$_POST[grado]', '$_POST[grupo]', '$_POST[semestre]', '$_POST[carrera]', '$_POST[concepto]', '$_POST[costo]')";

	if ($conexion->query($sql) === TRUE){
		echo "<h1>Operacion Exitosa!<h1>";
		echo "<script> setTimeout(function () { window.location.href='index.php'; },3000); </script>";
	} else {
		echo "Error: ".$sql."<br>".$conexion->error;
	}

}else{
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>

	<link rel="icon" type="image/vnd.microsoft.icon" href="imagenes/Mapa.ico">

	<link rel="stylesheet" type="text/css" href="css/style_menu_alumno.css">
	<link rel="stylesheet" type="text/css" href="css/style_menu_izquierdo_alumno.css">
	<link rel="stylesheet" type="text/css" href="css/style_pie_pagina.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	 
</head>

<body>
	<div class="container">
		<br>
		<?php include "MenuSuperior.php"; ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<?php include 'MenuLateral.php' ?>
			</div>
			<div class="col-sm-9">

				<br>
				<br>

				<center>
					<h2 class="card-title">INGRESOS</h2>
				</center>
				<div class="card border-success">
					<div class="card-body">
						<form action="./AgregarIngreso.php" method="POST">
							<div class="row">
								<div class="col-md-4">
									<STRONG>Apellido Paterno: </STRONG><br><br>
									<input type="text" class="form-control uppercase" placeholder="Ingresa apellido Paterno" name="apellido_paterno">
								</div>
								
			</div>
			</form>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		getConceptosIngresos();
		$('#concepto').change(function(){
			getConceptosIngresos();
		})
	})
</script>
<script type="text/javascript">
	function getConceptosIngresos(){
		$.ajax({
			type:"POST",
			url:"./ajax/conceptos_ingreso.php",
			data:"id_concepto="+$('#concepto').val(),
			success:function(r){
				document.getElementById('costo').value = r;
			}
		})
	}
</script>

<?php } ?>