<?php
if (isset($_POST['nombre'])) {

  require('conexion.php');

  $sql = "INSERT INTO egresos 
	(nombre, detalle, costo, fecha_egreso)
	VALUES ('$_POST[nombre]', '$_POST[detalle]', '$_POST[costo]', '$_POST[fecha_egreso]')";

  if ($conexion->query($sql) === TRUE) {
    echo "<h1>Operacion Exitosa!<h1>";
    echo "<script> setTimeout(function () { window.location.href='index.php'; },3000); </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }
} else {
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
              <form action="./AgregarEgreso.php" method="POST">
                <div class="row">
                  <div class="col-xl-12">
                    <label>Nombre de egreso: </label>
                    <input type="text" class="form-control uppercase" placeholder="Digite egreso" name="nombre">
                  </div>
                  <div class="col-xl-12">
                    <label>Detalle egreso: </label>
                    <input type="text" class="form-control uppercase" placeholder="Digite detalle" name="detalle">
                  </div>
                  <div class="col-sm-6">
                    <label>Valor $: </label>
                    <input type="text" class="form-control uppercase" id="valor" name="costo">
                  </div>
                  <div class="col-sm-6">
                    <label>Fecha: </label>
                    <input class="form-control" type="date"  name="fecha_egreso">
                  </div>
                </div>
                <br>
                <button href="egresos.php" type="submit" name="agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </body>
  </html>
  <?php } ?>