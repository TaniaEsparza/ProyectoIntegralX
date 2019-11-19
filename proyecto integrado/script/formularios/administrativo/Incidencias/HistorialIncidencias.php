<?php
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

    }else{
        echo "<h1>Por Favor Inicia Sesión<h1>";
        echo "<script> setTimeout(function () { window.location.href='Login.php'; },3000); </script>";
        exit;
    }
?>
<!doctype html>
<html lang="en">

<head>
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
        <div class="row">
          <div class="col-sm-12">
            <h2>Historial Incidencias</h2>
            <br><br>
            <a button type="button" class="btn btn-success" href="GuardarIncidencia.php">
              Agregar Incidencia
              <span class="glyphicon glyphicon-plus"></span>
              </button></a>
              <br>
              <!-- Fecha Inicio:
            <input class="form-control" type="date" value="" id="fecha_inicio" name="fecha_inicio">
            Fecha Fin:
            <input class="form-control" type="date" value="" id="fecha_fin" name="fecha_fin"> -->
            Busqueda:
            <input type="text" type="text" id="busqueda" name="busqueda" class="form-control">
            <table id="historial_incidencias" class="table table-sm table-bordered">
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<script type="text/javascript">
	$(document).ready(function(){
    /*getHistorialIncidenciasFecha();
		$('#fecha_inicio').change(function(){
			getHistorialIncidenciasFecha();
		});
    $('#fecha_fin').change(function(){
      getHistorialIncidenciasFecha();
    });*/
    $('#busqueda').keypress(function(){
      getHistorialIncidenciasBusqueda();
    })
	})
</script>
<script type="text/javascript">
	function getHistorialIncidenciasFecha(){
		$.ajax({
			type:"POST",
			url:"./ajax/historial_incidencias.php",
			data: {
        "fecha_inicio":$('#fecha_inicio').val(),
        "fecha_fin":$('#fecha_fin').val()
      },
			success:function(r){
				$('#historial_incidencias').html(r);
			}
		})
	}
  function getHistorialIncidenciasBusqueda(){
		$.ajax({
			type:"POST",
			url:"./ajax/historial_incidencias.php",
			data: {
        "busqueda":$('#busqueda').val(),
      },
			success:function(r){
				$('#historial_incidencias').html(r);
			}
		})
	}
</script>