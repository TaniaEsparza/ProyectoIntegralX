<?php
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

    }else{
        echo "<h1>Por Favor Inicia Sesión<h1>";
        echo "<script> setTimeout(function () { window.location.href='Login.php'; },3000); </script>";
        exit;
    }
?>
<?php
require('conexion.php');
//REGISTRO NUEVO EN LA BASE DE DATOS
if (isset($_POST['nombre']) AND $_POST['id'] == null) {
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
}else if(isset($_POST['nombre']) AND $_POST['id'] != null) {
	$sql = "UPDATE ingresos SET 
	apellido_paterno = '$_POST[apellido_paterno]', 
	apellido_materno = '$_POST[apellido_materno]', 
	nombre = '$_POST[nombre]', 
	fecha_ingreso = '$_POST[fecha_ingreso]',
	grado = '$_POST[grado]',
	grupo = '$_POST[grupo]',
	semestre = '$_POST[semestre]',
	carrera = '$_POST[carrera]',
	concepto = '$_POST[concepto]',
	costo = '$_POST[costo]'
	WHERE id = $_POST[id]";
  
	if ($conexion->query($sql) === TRUE) {
	  echo "<h1>Operacion Exitosa!<h1>";
	  echo "<script> setTimeout(function () { window.location.href='index.php'; },3000); </script>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conexion->error;
	}
  //MUESTRA EL FORMULARIO Y EN CASO DE TENER ID MUESTRA LOS DATOS DEL REGISTRO
  } else {
	if (isset($_GET['id'])) {
	  $sql = "SELECT * FROM ingresos WHERE id = $_GET[id]";
	  $result = $conexion->query($sql);
	  $row = $result->fetch_assoc();
	}
	
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

	    
     <script src="js/validCampoFranz.js"></script>
       <script type="text/javascript">
            $(function(){
                //Para escribir solo letras
                $('#apaterno').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#amaterno').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#nombre1').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#group').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');

                //Para escribir solo numeros    
                $('#grado').validCampoFranz('0123456789');    
            });
        </script>        

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
						<form action="./GuardarIngreso.php" method="POST">
							  <form novalidate>
						<input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : null ?>">
							<div class="row">
								<div class="col-md-4">
									<STRONG>Apellido Paterno: </STRONG><br><br>
									<input type="text" class="form-control uppercase" placeholder="Ingresa apellido Paterno" name="apellido_paterno" id="apaterno" value="<?php echo isset($row['apellido_paterno']) ? $row['apellido_paterno'] : "" ?>"required>
								</div>
								<div class="col-md-4">
									<STRONG>Apellido Materno: </STRONG><br><br>
									<input type="text" class="form-control uppercase" placeholder="Ingresa apellido Materno" name="apellido_materno" id="amaterno" value="<?php echo isset($row['apellido_materno']) ? $row['apellido_materno'] : "" ?>"required>
								</div>
								<div class="col-md-4">
									<STRONG>Nombre(s):</STRONG><br><br>
									<input type="text" class="form-control uppercase" placeholder="Ingresa Nombre" name="nombre" id="nombre1" value="<?php echo isset($row['nombre']) ? $row['nombre'] : "" ?>"required>
								</div>
							</div>
							<br>
							<br>
							<div class="row">
								<div class="col-sm-4">
									<STRONG>Fecha:</STRONG><br><br>
									<input class="form-control" type="date" name="fecha_ingreso" value="<?php echo isset($row['fecha_ingreso']) ? $row['fecha_ingreso'] : "" ?>"required>
								</div>
								<div class="col-sm-4">
									<STRONG>Grado:</STRONG><br><br>
									<input class="form-control" type="grado" class="form-control" placeholder="Grado" id="grado" name="grado" value="<?php echo isset($row['grado']) ? $row['grado'] : "" ?>"required>
								</div>
								<div class="col-sm-4">
									<STRONG>Grupo:</STRONG><br><br>
									<input class="form-control" type="grupo" placeholder="Grupo" name="grupo" id="group" value="<?php echo isset($row['grupo']) ? $row['grupo'] : "" ?>"required>
								</div>
							</div>
							<br>
							<br>
							<div class="row">
								<div class="col-md-6">
									<STRONG>semestre:</STRONG>
									<select class="form-control" name="semestre"required>
										<option></option>
										<option <?php if(isset($row['semestre']) && $row['semestre'] == "Febrero-Julio"){ echo "selected"; } ?>>Febrero-Julio</option>
										<option <?php if(isset($row['semestre']) && $row['semestre'] == "Agosto-Diciembre"){ echo "selected"; } ?>>Agosto-Diciembre</option>
									</select name=concepto>
								</div>
								<div class="col-md-6">
									<STRONG>Carrera:</STRONG>
									<select class="form-control" name="carrera"required>
										<option></option>
										<option <?php if(isset($row['carrera']) && $row['carrera'] == "Soporte y Matenimiento al Equipo de Computo"){ echo "selected"; } ?>>Soporte y Matenimiento al Equipo de Computo</option>
										<option <?php if(isset($row['carrera']) && $row['carrera'] == "Enfermeria General"){ echo "selected"; } ?>>Enfermeria General</option>
										<option <?php if(isset($row['carrera']) && $row['carrera'] == "Proceso de Gestión Administrativa"){ echo "selected"; } ?>>Proceso de Gestión Administrativa</option>
									</select>
								</div>
							</div>
							<br>
							<br>
							</select name=concepto>
							<div class="row">
								<div class="col-md-6">
									<STRONG>Concepto:</STRONG>
									<select id="concepto" class="form-control" name="concepto">
<?php
require('conexion.php');

$sql = "SELECT * FROM ingresos_conceptos";
$result = $conexion->query($sql);

if($result->num_rows > 0){
	while($row2 = $result->fetch_assoc()){
		if(isset($row['concepto']) && $row['concepto'] == $row2['id']){
			echo "<option value='$row2[id]' selected> $row2[concepto] </option>";
		}else{
			echo "<option value='$row2[id]'> $row2[concepto] </option>";
		}
	
	}
}
?>
									</select name=concepto>
								</div>
								<div class="col-md-6">
									<STRONG>Valor $:</STRONG>
									<input id="costo" class="form-control" name="costo" value="<?php echo isset($row['costo']) ? $row['costo'] : 0 ?>"><br>
								</div>
							</div>
							<div class="col-md-6">
								<button href="Historial_Ingresos/index.php" type="submit" name="agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
							</div>

					</div>
				</div>
			</div>
			</form>
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