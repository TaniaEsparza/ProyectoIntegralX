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
  $sql = "INSERT INTO egresos 
	(nombre, detalle, costo, fecha_egreso)
	VALUES ('$_POST[nombre]', '$_POST[detalle]', '$_POST[costo]', '$_POST[fecha_egreso]')";

  if ($conexion->query($sql) === TRUE) {
    echo "<h1>Operacion Exitosa!<h1>";
    echo "<script> setTimeout(function () { window.location.href='index.php'; },3000); </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }
//ACTUALIZA REGISTRO EN LA BASE DE DATOS
}else if(isset($_POST['nombre']) AND $_POST['id'] != null) {
  $sql = "UPDATE egresos SET nombre = '$_POST[nombre]', detalle = '$_POST[detalle]', costo = '$_POST[costo]', fecha_egreso = '$_POST[fecha_egreso]'
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
    $sql = "SELECT * FROM egresos WHERE id = $_GET[id]";
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
                $('#detalle').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
               
                //Para escribir solo numeros    
                $('#valor').validCampoFranz('0123456789');    
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
          <center>
            <h2 class="page-header text-center">EGRESOS </h2>
          </center>
          <div class="card border-success">
            <div class="card-body">
              <form action="./GuardarEgreso.php" method="POST">
                <form novalidate>
                <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : null ?>">
                <div class="row">
                  <div class="col-xl-12">
                    <label>Nombre de egreso: </label>
                    <input type="text" class="form-control uppercase" placeholder="Digite egreso" name="nombre" value="<?php echo isset($row['nombre']) ? $row['nombre'] : "" ?>"required>
                  </div>
                  <div class="col-xl-12">
                    <label>Detalle egreso: </label>
                    <input type="text" class="form-control uppercase" placeholder="Digite detalle" name="detalle" value="<?php echo isset($row['detalle']) ? $row['detalle'] : "" ?>"required>
                  </div>
                  <div class="col-sm-6">
                    <label>Valor $: </label>
                    <input type="text" class="form-control uppercase" name="costo" id="valor" value="<?php echo isset($row['costo']) ? $row['costo'] : "" ?>"required>
                  </div>
                  <div class="col-sm-6">
                    <label>Fecha: </label>
                    <input class="form-control" type="date"  name="fecha_egreso" value="<?php echo isset($row['fecha_egreso']) ? $row['fecha_egreso'] : "" ?>"required>
                  </div>
                </div>
                <br>
                <button href="egresos.php" type="submit" name="agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
              </form>
            </form>
            </div>
          </div>
        </div>
      </div>
  </body>
  </html>
  <?php } ?>