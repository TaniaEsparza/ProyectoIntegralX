<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
</head>

<script language="javascript" type="text/javascript">
	function validar() {
              //obteniendo el valor que se puso en el campo text del formulario

              miCampoTexto = document.getElementById('Folio').value;
              if(miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)){
              	alert('Intoduzca el Folio!');
              	return false;
              }

              txtFecha = document.getElementById('Fecha').value;
              if(!isNaN(txtFecha)){
              	alert('Seleccione o introduzca la Fecha!');
              	return false;
              }

              return true;
          }
      </script>

      <?php
      $Fecha = date("Y-m-d");
      ?>

      <body>
      	<div class="container">
      		<br>
      		<?php include "../menus/MenuDocenteTutor.php";
      		MenuAlumnoDocenteTutor();?>
      	</div>
      	<div class="container">
      		<div class="row">
      			<div class="col-sm-3">
      				<?php //include 'MenuLateral.php' ?>
      			</div>
      			<div class="col-sm-9">
      				<br>
      				<br>
      				<center>
      					<h2 class="card-title">INGRESOS</h2>
      				</center>
      				<div class="card border-success">
      					<div class="card-body">
      						<?php if(!isset($_GET['Fecha'])){?>
      							<form action="./AltaIngreso.php" method="GET"  onsubmit="return validar()">
      								<b>Folio: </b>
      								<input type="text" id="Folio" name="Folio" class="form-control">
      								<br>
      								<b>Nombre de Alumno: </b>
      								<select name="idAlumno" id="idAlumno"  class="m-1 custom-select">
      									<?php
      									include_once "../../clases/MySQLConector.php";
      									$Mysql = new MySQLConector();
      									$Mysql->Conectar();
      									$Consulta2 = "SELECT * FROM `Alumno`;";
      									$Resultado2 = $Mysql->Consulta($Consulta2);
      									if($Resultado2)
      										while ($fila2 = mysqli_fetch_array($Resultado2)){           
      											echo " <option value=\"{$fila2['idAlumno']}\">{$fila2['Nombre']} {$fila2['ApellidoP']} {$fila2['ApellidoM']}</option>";
      										}
      										?>
      									</select>
      									<br>
      									<b>Grado y Grupo: </b>
      									<select name="idGrupo" id="idGrupo"  class="m-1 custom-select">
      										<?php
      										include_once "../../clases/MySQLConector.php";
      										$Mysql = new MySQLConector();
      										$Mysql->Conectar();
      										$Consulta2 = "SELECT grupos.idGrupos, grupos.Grado, grupos.Grupo, grupos.Carreras_idCarreras, carreras.idCarreras, carreras.Nombre FROM grupos, carreras WHERE carreras.idCarreras = grupos.Carreras_idCarreras ;";
      										$Resultado2 = $Mysql->Consulta($Consulta2);
      										if($Resultado2)
      											while ($fila2 = mysqli_fetch_array($Resultado2)){           
      												echo " <option value=\"{$fila2['idGrupos']}\">{$fila2['Grado']}-{$fila2['Grupo']} {$fila2['Nombre']}</option>";
      											}
      											?>
      										</select>
      										<br>
      										<b>Fecha: </b>
      										<input type="date" name="Fecha" id="Fecha"class="form-control" value="<?php print_r($Fecha)?>"> 
      										<br>
      										<b>Monto: </b>
     										<input type="text" hidden="" id="Monto" name="Monto">
                                                            <input type="text" hidden="" id="MLetra" name="MLetra">

      										<input type="text" name="MontoLetra" id="MontoLetra" class="form-control" readonly>
      										<br>
      										<b>Concepto: </b>
      										<select name="idConceptodePago" id="idConceptodePago"  class="m-1 custom-select">
      											<?php
      											include_once "../../clases/MySQLConector.php";
      											$Mysql = new MySQLConector();
      											$Mysql->Conectar();
      											$Consulta2 = "SELECT * FROM `conceptodepago` WHERE conceptodepago.Estatus = 1;";
      											$Resultado2 = $Mysql->Consulta($Consulta2);
      											if($Resultado2)
      												while ($fila2 = mysqli_fetch_array($Resultado2)){           
      													echo " <option value=\"{$fila2['idConceptoDePago']}\">{$fila2['NombreConcepto']}</option>";
      												}
      												?>
      											</select>
      											<br>
      											<b>Observación: </b>
      											<textarea class="form-control" rows="2" id="Observacion" name="Observacion"></textarea>
      											<br>
      											<button type="submit" name="agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>     
      										</form>
      										<?php 
      									}else{
      										include_once "../../clases/SQLControlador.php";
      										include_once "../../clases/Ingresos.php";

      										$Ingresos = new Ingresos();

      										$idAlumno = $_GET['idAlumno'];
      										$idGrupo = $_GET['idGrupo']; 
      										$idConceptodePago = $_GET['idConceptodePago']; 
      										$Fecha = $_GET['Fecha'];
      										$Observacion = $_GET['Observacion'];
      										$Monto = $_GET['Monto'];
                                                                  $MLetra = $_GET['MLetra'];
      										$Folio = $_GET['Folio'];

      										$Ingresos->setidAlumno($idAlumno);
      										$Ingresos->setidGrupo($idGrupo);
      										$Ingresos->setidConceptodePago($idConceptodePago);
      										$Ingresos->setFecha($Fecha);
      										$Ingresos->setObservacion($Observacion);
      										$Ingresos->setMonto($Monto);
                                                                  $Ingresos->setMontoLetra($MLetra);
      										$Ingresos->setFolio($Folio);

      										$SQLControlador = new SQLControlador();
      										$SQLControlador->AgregarIngresos($Ingresos);
      									}?>
      								</div>
      							</div>
      						</div>
      					</div>
      				</div>
      			</body>
      			</html>

      			<script type="text/javascript">
      				$(document).ready(function(){
      					getDatosConceptosdePago();

      					$('#idConceptodePago').change(function(){
      						getDatosConceptosdePago();
      					})

      				})
      			</script>

      			<script type="text/javascript">
      				function getDatosConceptosdePago(){
      					$.ajax({
      						type:"GET",
      						url:"../../clases/tablasmodales/ConsultaConceptosdePago.php",
      						data:"idConceptodePago="+$('#idConceptodePago').val(),
      						success:function(c){
      							var obj = JSON.parse(c);
      							document.getElementById('MontoLetra').value = '$ '+ obj.Monto + ' ' + obj.MontoLetra;
                                                document.getElementById('Monto').value = obj.Monto;
      							document.getElementById('MLetra').value = obj.MontoLetra;
      						}
      					});
      				} 
      			</script>
      			<script type="text/javascript">
      				$(document).ready(function(){
      					$('#idConceptodePago').select2();

      					$('select').select2({ 
      						language: {
      							noResults: function() {
      								return "No hay resultado";        
      							},
      							searching: function() {
      								return "Buscando..";
      							}
      						}
      					});
      				});
      			</script>
