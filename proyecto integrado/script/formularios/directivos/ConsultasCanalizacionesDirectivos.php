<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinDirectivo']) && !isset ($_SESSION['IdDirectivo']) && !isset ($_SESSION['IdAlumnoDirectivo']))
{
 echo "<script language='javascript'>window.location='LoginDocenteTutor.php'</script>";
}
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
</head>

<body>
  <!--Inicio contenedor Cabecera-->
  <div class="container">
   <br>
   <?php include "../menus/MenuDirectivo.php";
   MenuAlumnoDirectivo();?>
 </div>
 <!--Fin contenedor Cabecera-->

 <!--Inicio Contenedor medio-->
 <div class="container">
  <!--Poner titulo o nombre -->
  <br><center><h2> Tabla Canalizaciones </h2></center>
  <!--Poner titulo o nombre -->

  <div class="row">
    <!--Inicio de menu izquierdo-->
    <div class="col-sm-3">

      <?php include '../menus/MenuIzquierdoAlumnoDirectivo.php';
      ?>
      
      <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
      <!--Fin inicio menu izquierdo-->
    </div>
    <!--Inicio Contenido central-->
    <div class="col-sm-9">
     <!--Inicio de contenido de caja de texto-->
     <br>
     <div id="buscador"></div>
     <div class="col-md-12" id="tabla"></div>
     <br><br><br><br><br><br>

     
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
    $('#tabla').load('../../clases/tablasmodales/TablaCanalizacionesDirectivos.php');
    $('#buscador').load('../../clases/tablasmodales/BuscadorCanalizacionesDirectivos.php');
      //ValidarTutorJustificantesRegistro();
         //ValidarTutorJustificantesModificacion();
       });
     </script>