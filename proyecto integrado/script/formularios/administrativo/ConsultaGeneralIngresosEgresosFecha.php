<?php
if (!isset($_SESSION)) { session_start(); }
/*if (!isset ($_SESSION['LoggedinDocenteTutor']) && !isset ($_SESSION['IdDocenteTutor']) && !isset ($_SESSION['IdAlumnoDocenteTutor']))
{
 echo "<script language='javascript'>window.location='Consu.php'</script>";
}*/
unset($_SESSION['consulta']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!--  meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="./../../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./../../../css/select2.css">


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="./../../../js/jquery-3.3.1.js"></script>
	<script src="../../js/funciones.js"></script>
	<script src="./../../../js/jquery-3.3.1.min.js"></script>
	<script src="./../../../js/popper.min.js"></script>
	<script src="./../../../js/bootstrap.min.js"></script>
	<script src="./../../../js/select2.js"></script>


	<!--Icono en pestaña-->
	<link rel="icon" type="image/vnd.microsoft.icon" href="../../imagenes/Mapa.ico">

	<!--STYLOS-->
	<link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
	<link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">
	<link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuIzquierdoAlumno.css">

	<!--Iconos-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script language="javascript" type="text/javascript">
    function validar() {
              //obteniendo el valor que se puso en el campo text del formulario
              txtFecha = document.getElementById('FechaInicial').value;
              if(!isNaN(txtFecha)){
                alert('Seleccione o introduzca la Fecha de Inicio!');
                return false;
              }

              txtFecha = document.getElementById('FechaFinal').value;
              if(!isNaN(txtFecha)){
                alert('Seleccione o introduzca la Fecha de Fin!');
                return false;
              }

              txtFechaI = document.getElementById('FechaInicial').value;
              txtFechaF = document.getElementById('FechaFinal').value;

              if(txtFechaI>txtFechaF){
                alert('Selecione fechas validas! No puede seleccionar la Fecha de Inicio Mayor a la de Fin');
                return false;
              }

              txtFechaI = document.getElementById('FechaInicial').value;
              fechaOriginal = new Date();
              dd = fechaOriginal.getDate();
              mm = (fechaOriginal.getMonth()+1);
              if(mm < 10){
                mm = "0" + mm;
              }else{
                mm = mm;
              }
              
              YYYY = fechaOriginal.getFullYear();
              fechaactual =  ( YYYY + "-" + mm + "-" + dd );

              if(fechaactual < txtFechaI){
                alert('Selecione fechas validas! No puede seleccionar fecha de inicio mayor a la actual');
                return false;
              }

              txtFechaF = document.getElementById('FechaFinal').value;
              fechaOriginal = new Date();
              dd = fechaOriginal.getDate();
              mm = (fechaOriginal.getMonth()+1);
              if(mm < 10){
                mm = "0" + mm;
              }else{
                mm = mm;
              }

              YYYY = fechaOriginal.getFullYear();
              fechaactual =  ( YYYY + "-" + mm + "-" + dd );

              if(fechaactual < txtFechaF){
                alert('Selecione fechas validas! No puede seleccionar fecha de fin mayor a la actual');
                return false;
              }

              return true;
            }
          </script>

        </head>

        <body>
         <!--Inicio contenedor Cabecera-->
         <div class="container">
          <br>
          <?php include "../menus/MenuDocenteTutor.php";
          MenuAlumnoDocenteTutor();?>
        </div>
        <!--Fin contenedor Cabecera-->

        <!--Inicio Contenedor medio-->
        <div class="container">
          <!--Poner titulo o nombre -->
          <br><center><h2> Reporte de Ingresos y Egresos por Fecha
          </h2></center>
          <!--Poner titulo o nombre -->

          <div class="row">
           <!--Inicio de menu izquierdo-->
           <div class="col-sm-3">

      <?php //include '../menus/MenuIzquierdoAlumnoDocenteTutor.php';
      ?>
      
      <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
      <!--Fin inicio menu izquierdo-->
    </div>
    <!--Inicio Contenido central-->
    <div class="col-sm-9">
     <!--Inicio de contenido de caja de texto-->
     <br>
     <div class="container">
      <?php
      if(!isset($_POST['FechaInicial'])){ 
        ?>
        <form action="./ConsultaGeneralIngresosEgresosFecha.php" method="POST" onsubmit="return validar()">
          <div class="row">
           <div class="col-md-6" id="buscadorD">
            <b>Fecha inicial: </b>
            <input type="date" class="form-control input-sm" name="FechaInicial" id="FechaInicial">

          </div>
          <div class="col-md-6" id="buscadorI">
            <b>Fecha final: </b>
            <input type="date" class="form-control input-sm" name="FechaFinal" id="FechaFinal">
          </div>
        </div>
        <br>

        <button type="submit" name="agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Generar Reporte</button>
        <br><br><br>

  		<!--<div class="row">
  			<div class="col-md-12" id="tabla"></div>
  		</div>-->
  		<br><br><br>
    </form>
    <?php 
  }else{
    $FechaInicial = $_POST['FechaInicial'];
    $FechaFinal = $_POST['FechaFinal'];

    include_once "../../clases/tablasmodales/CrearReporteIngresosEgresosXFecha.php";

    $IngresosEgresosGeneral = new CrearReporteIngresosEgresosXFecha();

    $IngresosEgresosGeneral->CrearReporte($FechaInicial, $FechaFinal);            


  } 
  ?>
</div>


<!--Fin de contenido de caja de texto--> 
</div>
<!--Fin Contenido central-->
<!--Inicio de pie de pagina-->


<?php include '../menus/PiePagina.php';?>

<!--fin de pie de pagina-->
</div>
<!--Fin Contenedor medio-->
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('../../clases/tablasmodales/TablaIngresosEgresosGeneral.php');
      //ValidarTutorJustificantesRegistro();
         //ValidarTutorJustificantesModificacion();
       });
</script>