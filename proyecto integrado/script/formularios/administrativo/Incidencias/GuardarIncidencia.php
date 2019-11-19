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
if (isset($_POST['id_empleado'])) {

  require('conexion.php');

  $sql = "INSERT INTO incidencias
	(id_empleado, fecha_incidencia, clausula, asunto, documentacion, motivos)
	VALUES ('$_POST[id_empleado]', '$_POST[fecha_incidencia]', '$_POST[clausula]', '$_POST[asunto]', '$_POST[documentacion]', '$_POST[motivos]')";

  if ($conexion->query($sql) === TRUE) {
    echo "<h1>Operacion Exitosa!<h1>";
    echo "<script> setTimeout(function () { window.location.href='index.php'; },3000); </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }
} else {
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
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
                $('#asunto').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#documentos').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#motivo').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
               


                //Para escribir solo numeros    
                $('#clausula').validCampoFranz('0123456789');
          
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
          <h2 class="card-title">CEDULA DE CONTROL DE INCIDENCIAS</h2>
        </center><br><br>
        <form action="./GuardarIncidencia.php" method="POST">
          <form novalidate>
        <div class="row">
          <div class="col-md">
            <div class="card border-success">
              <div class="card-body">
                <center>
                  <h3 class="card-title">DATOS DEL TRABAJADOR</h3>
                </center>

                <div class="row">
                  <div class="col-xl-8">
                    <STRONG>Nombre del empleado:</STRONG><br><br>
                    <select id="id_empleado" class="form-control" name="id_empleado"required>
                      <option>SELECCIONE EMPLEADO</option>
<?php
require('conexion.php');

$sql = "SELECT id, apellido_paterno, apellido_materno, nombre FROM docentes";
$result = $conexion->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo "<option value='$row[id]'> $row[nombre] $row[apellido_paterno] $row[apellido_materno] </option>";
	}
}
?>
									</select name=concepto>
                  </div>

                  <div class="col-xl-4">
                    <STRONG>Solicitud de fecha:</STRONG><br><br>
                    <input class="form-control" placeholder="Ingrese fecha" name="fecha_incidencia"required><br>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xl-8">
                    <STRONG>Puesto:</STRONG><br><br>
                    <input type="text" class="form-control uppercase" placeholder="Digite Puesto" id="puesto" required disabled><br>
                  </div>
                  <div class="col-xl-4">
                    <STRONG>No.empleado:</STRONG><br><br>
                    <input type="text" class="form-control uppercase" placeholder="Digite No.Emp" id="numero_empleado" required disabled><br>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <br>

            <div class="row">
              <div class="col-md">
                <div class="card border-success">
                  <div class="card-body">
                    <center>
                      <h3 class="card-title">SOLICITUD</h3>
                    </center>

                    <div class="row">
                      <div class="col-xl-4">
                        <STRONG>Cláusula CCT:</STRONG><br><br>
                        <input type="text" class="form-control uppercase" id="clausula" placeholder="Digite Cláusula" name="clausula"required><br>
                      </div>

                      <div class="col-xl-8">
                        <STRONG>Asunto:</STRONG><br><br>
                        <input type="text" class="form-control uppercase" id="asunto" placeholder="Digite Asunto" name="asunto"required><br>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xl-4">
                        <STRONG>Documentacion que se anexa:</STRONG><br><br>
                        <input type="text" class="form-control uppercase" placeholder="Digite documentación" id="documentos" name="documentacion"required><br>
                        <button type="submit" name="agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                      </div>

                      <div class="col-xl-8">
                        <STRONG>Lo anterior por los siguientes motivos:</STRONG><br><br>
                        <textarea class="form-control" placeholder="Digite Motivos" rows="3" id="motivo" name="motivos"required></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            </form>

</body>

</html>
<script type="text/javascript">
	$(document).ready(function(){
		getDatosEmpleado();
		$('#id_empleado').change(function(){
			getDatosEmpleado();
		})
	})
</script>
<script type="text/javascript">
	function getDatosEmpleado(){
		$.ajax({
			type:"POST",
			url:"./ajax/puesto_empleado.php",
			data:"id_empleado="+$('#id_empleado').val(),
			success:function(r){
				document.getElementById('puesto').value = r;
			}
		});
    $.ajax({
			type:"POST",
			url:"./ajax/numero_empleado.php",
			data:"id_empleado="+$('#id_empleado').val(),
			success:function(r){
				document.getElementById('numero_empleado').value = r;
			}
		});
	}
</script>
<?php } ?>