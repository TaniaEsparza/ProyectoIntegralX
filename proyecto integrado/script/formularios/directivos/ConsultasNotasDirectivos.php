<?php
if (!isset($_SESSION)) { session_start(); }
/*if (!isset ($_SESSION['LoggedinDirectivo']) && !isset ($_SESSION['IdDirectivo']) && !isset ($_SESSION['IdAlumnoDirectivo']))
{
 echo "<script language='javascript'>window.location='LoginDocenteTutor.php'</script>";
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
  <br><center><h2> Tabla Notas/Observaciones </h2></center>
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

     <!--Modal modificar datos-->
     <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Vizualización de nota</h4>
            <button type="button" class="close" data-dismiss="modal" id="CerrarRegistroU" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <input type="text" hidden="idAreaPlantel" id="idAreaPlantel" name="">
            <div class=" row">
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
              </div>
              <div class="col-md-4" >
                <label><b>Fecha:</b></label> <input type="text" name="Fecha" id="Fecha" class="form-control input-sm"  readonly>
              </div>
            </div>
            <label>Asunto:</label>
            <input type="text" name="Asunto" id="Asunto" class="form-control input-sm" readonly>
      <!--<label>Documentación que debera anexar:</label>
        <input type="text" name="documentacionu" id="documentacionu" class="form-control input-sm" onkeypress="return soloLetras(event);">-->
        <label>Observacion:</label>
        <textarea  name="Observacion" id="Observacion" class="form-control input-sm" rows="2" readonly></textarea>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger"  id="CerrarRegistroAU"  data-dismiss="modal"  >
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </div> 
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
    $('#tabla').load('../../clases/tablasmodales/TablaNotasDirectivos.php');
    $('#buscador').load('../../clases/tablasmodales/BuscadorNotasDirectivos.php');
      //ValidarTutorJustificantesRegistro();
         //ValidarTutorJustificantesModificacion();
       });
     </script>
