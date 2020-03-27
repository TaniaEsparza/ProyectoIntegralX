<?php 
if (!isset($_SESSION)) { session_start(); }
/*if (!isset ($_SESSION['LoggedinDirectivo']) && !isset ($_SESSION['IdDirectivo']) && !isset ($_SESSION['IdAlumnoDirectivo']))
{
 echo "<script language='javascript'>window.location='LoginDocenteTutor.php'</script>";
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="./../../../css/bootstrap.min.css">

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>  
  <script src="./../../../js/jquery-3.3.1.js"></script>
  <script src="./../../../js/jquery-3.3.1.min.js"></script>
  <script src="./../../../js/jquery-3.3.1.slim.min.js"></script>
  <script src="./../../../js/popper.min.js"></script>
  <script src="./../../../js/bootstrap.min.js"></script>


  <!--Icono en pestaña-->
  <link rel="icon" type="image/vnd.microsoft.icon" href="../../imagenes/Mapa.ico">
  
  <!--STYLOS-->
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">


  <!--Iconos-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <script>
    function myFunction(event) {
      var codigo=window.event.keyCode;
      var x = document.getElementById("ActividadesTareas");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
      x.value = document.getElementById("ActividadesTareas").value+"\n-";
    }
  }

</script>

<script language="javascript" type="text/javascript">
 function validar() {
  	//obteniendo el valor que se puso en el campo text del formulario
    txtFecha = document.getElementById('FechaNota').value;
    if(!isNaN(txtFecha)){
      alert('Seleccione o introduzca una fecha!');
      return false;
    }

    miCampoTexto = document.getElementById('Asunto').value;  
    if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
      alert('Establezca el asunto, el campo se encuentra vacio!');
      return false;
    }

    miCampoTexto = document.getElementById('Observacion').value;  
    if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
      alert('Establezca una observacion, el campo se encuentra vacio!');
      return false;
    }


    return true;
  }
</script>

<script type="text/javascript">
  function NumerosLetras(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
      return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9-_.,?)(¿@\s]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
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
    <br><center><h2> Nueva Nota / Observación <h2></center>
      <!--Poner titulo o nombre -->
      <br>

      <div class="row">
        <div class="col-sm-1"></div>
        <?php 
        if(!isset($_POST['Asunto'])){
         ?>
         <div class="col-sm-10">
          <!--Inicio de contenido de caja de texto--> 
          <form action="AltaNotas.php" method="POST" onsubmit="return validar()">
            <!--Inicio Contenido central-->
            <?php
            include_once "../../clases/MySQLConector.php";
            $Fecha = date("Y-m-d");
            $Mysql = new MySQLConector();
            $Mysql->Conectar();
            $Consulta = "SELECT alumno.Nombre, alumno.Grupos_idGrupos,alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM , alumno.FechaNac, alumno.Sexo, carreras.Nombre AS NombreCarrera , grupos.Grupo , grupos.Grado , grupos.Grado, grupos.Grupo FROM alumno INNER JOIN grupos ON alumno.Grupos_idGrupos=grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras WHERE alumno.idAlumno ='1';";

            $Resultado = $Mysql->Consulta($Consulta);
            while ($fila = mysqli_fetch_array($Resultado)){           

              ?>
              <div class=" row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4" >
                  <label><b>Fecha:</b></label> <input type="date" id="FechaNota" class="form-control input-sm" name="FechaNota">
                </div>
              </div>
              
              <?php echo "<input type=\"hidden\" value=\"1\" id=\"Alumno\" name=\"Alumno\">" ?>
              <label><b>Nombre:</b> <?php echo $fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM']; ?></label><br>
            <?php }?>

            <label><b>Asunto:</b></label> <input type="text" class="form-control input-sm" id="Asunto" name="Asunto">
            <label><b>Observacion: </b></label>
            <textarea  name="Observacion" id="Observacion" class="form-control input-sm" onkeypress="return NumerosLetras(event);"></textarea>
            <br>
            <button type="submit" class="btn btn-success"  id="GuardarRegistro" onclick="" >
              Guardar
            </button>
            <br>
            <br><br>
            <br>
          </form>
        </div>
      <?php } else {
        include_once "../../clases/SQLControlador.php";
        include_once "../../clases/Notas.php";

        $Alumno_idAlumno = $_POST['Alumno'];
        $Fecha = $_POST['FechaNota'];
        $Asunto = $_POST['Asunto'];
        $Observaciones = $_POST['Observacion'];


        $Notas = new Notas();
        $Notas->setAlumno_idAlumno($Alumno_idAlumno);
        $Notas->setAsunto($Asunto);
        $Notas->setFecha($Fecha);
        $Notas->setObservacion($Observaciones);

        $SQLControlador = new SQLControlador();
        $SQLControlador->AgregarNotas($Notas);
      }
      ?>
      <div class="col-sm-1"></div>
    </div>
    <?php include '../menus/PiePagina.php';?>
  </div>
</div>
<!--Fin Contenedor medio-->
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#Observacion').on('input', function (e) {
      if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
      }
    });
    
  });
</script>