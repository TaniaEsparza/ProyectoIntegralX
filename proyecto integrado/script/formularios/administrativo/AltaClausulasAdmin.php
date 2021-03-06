<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinAdmin']))
{
   echo "<script language='javascript'>window.location='LoginAdmin.php'</script>";
}

unset($_SESSION['ConsultaCla']);
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
  <link rel="stylesheet" type="text/css" href="./../../../css/select2.min.css">

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="./../../../js/jquery-3.3.1.js"></script>
	<script src="../../js/Funciones.js"></script>
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

	<!--Solo Numeros-->
	<script type="text/javascript">
		function soloNumeros(e){
			var key = window.Event ? e.which : e.keyCode
			if(key >= 48 && key <= 57){

			}else{
        //alert('Solo numeros Por favor');
      }
      return (key >= 48 && key <= 57)
    }

//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toString();
    letras = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 39, 46, 6, 44]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
    	if(key == especiales[i]) {
    		tecla_especial = true;
    		break;
    	}
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
      //alert('Tecla no aceptada');
      return false;
    }
  }
</script>

<script language="javascript" type="text/javascript">
	function validar() {
        //obteniendo el valor que se puso en el campo text del formulario
        miCampoTexto = document.getElementById("numero").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo numero esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("asunto").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo Asunto esta vacio!');
        	return false;
        }
        return true;
      }
    </script>

    <script language="javascript" type="text/javascript">
     function ValidarModificacion() {
  //obteniendo el valor que se puso en el campo text del formulario
  miCampoTexto = document.getElementById("numerou").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo Nombre esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("asuntou").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo Apellido Paterno esta vacio!');
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
    <?php include "../menus/MenuCapturista.php";
    MenuAlumnoCapturista();?>
  </div>
  <!--Fin contenedor Cabecera-->

  <!--Inicio Contenedor medio-->
  <div class="container">
    <!--Poner titulo o nombre -->
    <br><center><h2> Catalogo Cláusulas </h2></center>
    <!--Poner titulo o nombre -->

    <div class="row">
     <!--Inicio de menu izquierdo-->
     <!--Inicio Contenido central-->
     <div class="col-sm-3">

          <?php //include '../menus/MenuIzquierdoAlumnoCap.php';
          ?>
          <!---------------------------------------------------------------------------------------------------------------------------------------------->
          <!--Fin inicio menu izquierdo-->
        </div>
        <div class="col-sm-9">
         <!--Inicio de contenido de caja de texto-->
         <br>
         <div id="buscador"></div>
         <div class="col-md-12" id="tabla"></div>
         

         <!--Modal para nuevo-->
         <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-md" role="document">
           <div class="modal-content">
            <div class="modal-header">
             <h4 class="modal-title" id="myModalLabel">Agrega nueva clausula</h4>
             <button type="button" class="close" data-dismiss="modal" id="CerrarRegistro" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
           <div class="modal-body">
             <label>Cláusula o Número:</label>
             <input type="text" name="numero" id="numero" class="form-control input-sm" onKeyPress="return soloNumeros(event)" maxlength="5" >
             <label>Asunto:</label>
             <input type="text" name="asunto" id="asunto" class="form-control input-sm" onkeypress="return soloLetras(event);">
             <label>En caso de:</label>
             <input type="text" name="motivo" id="motivo" class="form-control input-sm" onkeypress="return soloLetras(event);">
             <label>Documentación que debera anexar:</label>
             <input type="text" name="documentacion" id="documentacion" class="form-control input-sm" onkeypress="return soloLetras(event);">
             <div class="modal-footer">
              <button type="button" class="btn btn-success"  id="GuardarRegistro" onclick="return validar()" >
               Agregar
             </button>
             <button type="button" class="btn btn-danger"  id="CerrarRegistroA"  data-dismiss="modal"  >
               Cerrar
             </button>
           </div>
         </div>
       </div>
     </div>
   </div>

   <!--Modal modificar datos-->
   <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md" role="document">
     <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Modificar cláusula</h4>
       <button type="button" class="close" data-dismiss="modal" id="CerrarRegistroU" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
     <div class="modal-body">
      <input type="text" hidden="" id="idclausula" name="">
      <label>Cláusula o Número:</label>
      <input type="text" name="numerou" id="numerou" class="form-control input-sm" onKeyPress="return soloNumeros(event)" maxlength="5">
      <labsel>Asunto:</label>
      <input type="text" name="asuntou" id="asuntou" class="form-control input-sm" onkeypress="return soloLetras(event);">
      <label>En caso de:</label>
      <input type="text" name="motivou" id="motivou" class="form-control input-sm" onkeypress="return soloLetras(event);">
      <label>Documentación que debera anexar:</label>
      <input type="text" name="documentacionu" id="documentacionu" class="form-control input-sm" onkeypress="return soloLetras(event);">
      <label>Estado:</label>
      <select name="estatusu" id="estatusu" class="custom-select" style="width: 100%" >
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
      </select>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"  id="actualizadatos" onclick="return ValidarModificacion()" >
         Agregar
       </button>
       <button type="button" class="btn btn-danger"  id="CerrarRegistroAU"  data-dismiss="modal"  >
         Cerrar
       </button>
     </div>
   </div>
 </div>
</div> 
</div>
<!--Fin Contenido central-->
</div>
<!--Fin Contenedor medio-->

<!--Inicio de pie de pagina-->
<?php include "../menus/PiePagina.php";?>

<!--fin de pie de pagina-->
</body>
</html>

<script type="text/javascript">
 $(document).ready(function(){
  $('#tabla').load('../../clases/tablasmodales/TablaClausulas.php');
  $('#buscador').load('./../../clases/tablasmodales/BuscadorClausulas.php');

  		//ValidarTutorJustificantesRegistro();
         //ValidarTutorJustificantesModificacion();
         
       });
     </script>

     <script type="text/javascript">
      $(document).ready(function(){
       $('#GuardarRegistro').click(function(){
        event.preventDefault();
        if($('#numero').val() == ''){
        }else if ($('#asunto').val()=='') {
        }else if ($('#motivo').val()=='') {
        }else if ($('#documentacion').val()=='') {
        }else{
         Numero=$('#numero').val();
         Asunto=$('#asunto').val();
         Motivo=$('#motivo').val();
         Documentacion=$('#documentacion').val();

         agregarDatosClausula(Numero,Asunto,Motivo,Documentacion);
       }
     });

       $('#numero').on('input', function (e) {
        if (!/^[0-9.\s]*$/i.test(this.value)) {
         this.value = this.value.replace(/[^a-z0-9.\s]+/ig,"");
       }
     });
       $('#asunto').on('input', function (e) {
        if (!/^[a-z0-9.\s]*$/i.test(this.value)) {
         this.value = this.value.replace(/[^a-z0-9.\s]+/ig,"");
       }
     });


       $('#actualizadatos').click(function(event){
        event.preventDefault();
        if($('#numerou').val() == ''){
        }else if ($('#asuntou').val()=='') {
        }else if ($('#motivou').val()=='') {
        }else if ($('#documentacionu').val()=='') {
        }else{
         ModificacionClausulas();
       }
     });

       $('#CerrarRegistro').click(function() {
        $("#numero").val("");
        $('#asunto').val("");
        $('#motivo').val("");
        $('#documentacion').val("");
      });

       $('#CerrarRegistroA').click(function() {
        $("#numero").val("");
        $('#asunto').val("");
        $('#motivo').val("");
        $('#documentacion').val("");
      });

     });
   </script>
