<?php
if (!isset($_SESSION)) { session_start(); $_SESSION['NombreUsuarioCAP'] = 1; }
/*if (!isset ($_SESSION['LoggedinCAP']))
{
   echo "<script language='javascript'>window.location='LoginCE.php'</script>";
};
unset($_SESSION['consulta']);*/
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
	<script src="./../../../js/jquery-3.3.1.min.js"></script>
	<script src="./../../../js/jquery-3.3.1.slim.min.js"></script>
	<script src="./../../../js/popper.min.js"></script>
	<script src="./../../../js/bootstrap.min.js"></script>
	<script src="./../../../js/select2.js"></script>


	<!--Icono en pestaña-->
	<link rel="icon" type="image/vnd.microsoft.icon" href="../../../imagenes/Mapa.ico">

	<!--STYLOS-->
	<link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">
	<link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuCapturista.css">

	<!--Iconos-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script>
		function soloNumeros(e){
			var key = window.Event ? e.which : e.keyCode
			return (key >= 48 && key <= 57)
		}

//Para decimales
function NumeroDecimal(e, field) {
	key = e.keyCode ? e.keyCode : e.which
  // backspace
  if (key == 8) return true
  // 0-9
if (key > 47 && key < 58) {
	if (field.value == "") return true
		regexp = /.[0-9]{2}$/
	return !(regexp.test(field.value))
}
  // .
  if (key == 46) {
  	if (field.value == "") return false
  		regexp = /^[0-9]+$/
  	return regexp.test(field.value)
  }
  // other key
  return false

}

function NumerosLetrasSinCaracteres(e) {
	tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
    	return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9\s]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function NumerosLetrasCorreo(e) {
	tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
    	return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9.,-_@]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


function NumerosLetras(e) {
	tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
    	return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9-_.,\s]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toString();
    letras = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 39, 46, 6, 44, 95 ,45]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

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

<!--Validar Cajas Vacias-->
<script language="javascript" type="text/javascript">
	function validar() {
  //obteniendo el valor que se puso en el campo text del formulario
  miCampoTexto = document.getElementById("EstadoCivil").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Estado Civil esta vacio!');
  	return false;
  }

  var txtFecha = document.getElementById('FechaNacimiento').value;
  if(!isNaN(txtFecha)){
  	alert('Seleccione o intraduzca una fecha!');
  	return false;
  }

  miCampoTexto = document.getElementById("Correo").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Correo esta vacio!');
  	return false;
  }

  var txtCorreo = document.getElementById("Correo").value;
  if(!(/\S+@\S+\.\S+/.test(txtCorreo))){
  	alert('Escriba un correo válido');
  	return false;
  }

  Validacion = document.getElementById('Paisl').disabled;
  if(Validacion == false){
  	miCampoTexto = document.getElementById("Paisl").value;
  	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  		alert('Verifica el campo Pais del Lugar de Nacimiento esta vacio!');
  		return false;
  	}
  }

  Validacion = document.getElementById('Estadol').disabled;
  if(Validacion == false){
  	miCampoTexto = document.getElementById("Estadol").value;
  	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  		alert('Verifica el campo Estado del Lugar de Nacimiento esta vacio!');
  		return false;
  	}
  }

  Validacion = document.getElementById('Localidadl').disabled;
  if(Validacion == false){
  	miCampoTexto = document.getElementById("Localidadl").value;
  	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  		alert('Verifica el campo Localidad del Lugar de Nacimiento esta vacio!');
  		return false;
  	}
  }

  Validacion = document.getElementById('Municipiol').disabled;
  if(Validacion == false){
  	miCampoTexto = document.getElementById("Municipiol").value;
  	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  		alert('Verifica el campo Localidad del Lugar de Nacimiento esta vacio!');
  		return false;
  	}
  }

  miCampoTexto = document.getElementById("CPd").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo CP del Domicilio esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("Called").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Calle del Domicilio esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("Numerod").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Numero del Domicilio esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("Coloniad").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Colonia del Domicilio esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("Municipiod").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Municipio del Domicilio esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("Localidadd").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Localidad del Domicilio esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("Estadod").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo de texto Estado del Domicilio esta vacio!');
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
		MenuCapturista();?>

	</div>
	<!--Fin contenedor Cabecera-->

	<!--Inicio Contenedor medio-->
	<div class="container">
		<!--Poner titulo o nombre -->
		<br><center><h2> -- Cédula Básica Personal -- </h2></center>
		<!--Poner titulo o nombre -->

		<div class="row">
			<div class="col-sm-1"></div>
			<!--Inicio Contenido central-->
			<div class="col-sm-10">
				<!--Inicio de contenido de caja de texto--> 
				<?php if(!isset($_POST['RFC'])){

					include_once "../../clases/SQLControlador.php";
					include_once "../../clases/Usuarios.php";

					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT * FROM `personal` WHERE idPersonal ='".$_SESSION['NombreUsuarioCAP']."';";
					$Resultado = $Mysql->Consulta($Consulta);
					$row = mysqli_fetch_array($Resultado);

					$Nombre=$row["Nombre"];
					$ApellidoP=$row["ApellidoP"];
					$ApellidoM = $row['ApellidoM']; 
					$RFC = $row['RFC'];
					$CURP = $row['CURP'];
					$IMSS = $row['SS'];
					$NoEmpleado = $row['NoEmpleado']; 
					$FechaIngreso = $row['FechaIngreso'];
					$Departamento = $row['Departamento'];
					$Puesto = $row['Puesto'];
					$Horas = $row['Horas'];

					?>
					<form action="AltaCedulaPersonal.php" method="POST" onsubmit="return validar()">
						<br>
						<div class="card border-success">
							<div class="card-body">
								<h4 align="center">Información Personal</h4>
								<br>
								<div class="row">
									<div class="col-sm-4">
										<b>Nombre(s):</b>
										<input type="text" name="NombrePersonal"  class="form-control" id="NombreAlumno" placeholder="<?php echo $Nombre?>" onkeypress="return soloLetras(event);" maxlength="25" readonly="readonly">		
									</div>
									<div class="col-sm-4">
										<b>Apellido Paterno:</b>
										<input type="text" name="ApellidoP" class="form-control" id="ApellidoP" placeholder="<?php echo $ApellidoP?>" onkeypress="return soloLetras(event);" maxlength="20" readonly="readonly">
									</div>
									<div class="col-md-4">
										<b>Apellido Materno:</b>
										<input type="text" name="ApellidoM" class="form-control" id="ApellidoM" placeholder="<?php echo $ApellidoM?>" onkeypress="return soloLetras(event);" maxlength="20" readonly="readonly">
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<b>RFC:</b>
										<input type="text" name="RFC" class="form-control" id="RFC"  placeholder="<?php echo $RFC?>" maxlength="13" onKeyUp="this.value = this.value.toUpperCase();" onkeypress="return NumerosLetrasSinCaracteres(event);" readonly="readonly">
									</div>
									<div class="col-md-4">
										<b>CURP:</b>
										<input type="text" name="CURP" class="form-control" id="CURP" placeholder="<?php echo $CURP?>" maxlength="18" onKeyUp="this.value = this.value.toUpperCase();" onkeypress="return NumerosLetrasSinCaracteres(event);" readonly="readonly">
									</div>
									<div class="col-md-4">
										<b>No. IMSS:</b>
										<input type="text" name="IMSS" class="form-control" id="IMSS" placeholder="<?php echo $IMSS?>" maxlength="11" onKeyUp="this.value = this.value.toUpperCase();" onkeypress="return soloNumeros(event);" readonly="readonly">
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<b>Tipo de Sangre:</b>
										<select name="TipoSangre" class="m-1 custom-select">
											<option value="AB+">AB+</option>
											<option value="AB-">AB-</option>
											<option value="A+">A+</option>
											<option value="A-">A-</option>
											<option value="B+">B+</option>
											<option value="B-">B-</option>
											<option value="O+">O+</option>
											<option value="O-">O-</option>
										</select>
									</div>
									<div class="col-md-4">
										<b>Estado Civil:</b>
										<input type="text" name="EstadoCivil" class="form-control" id="EstadoCivil" placeholder="Estado Civil" onkeypress="return soloLetras(event);" maxlength="20">
									</div>
									<div class="col-md-4">
										<b><i>Fecha Nacimiento:</i></b>
										<input type="date" name="FechaNacimiento" class="form-control" id="FechaNacimiento" >
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<b>Correo:</b>
										<input type="email" name="Correo" class="form-control" id="Correo" placeholder="Correo" onkeypress="return NumerosLetrasCorreo(event);" maxlength="50">
									</div>
									<div class="col-md-4">
										<b>Sexo:</b>
										<select name="Sexo" class="m-1 custom-select ">
											<!--select2-hidden-accesible-->
											<option value="F">F</option>
											<option value="M">M</option>
										</select>
									</div>
									<div class="col-md-4">
										<b>Telefono Celular:</b>
										<input type="text" name="TelefonoCelular" class="form-control" id="TelefonoEmergencia" placeholder="Telefono de Emergencia" onKeyPress="return soloNumeros(event)" maxlength="10">
									</div>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="card border-success"> 
							<div class="card-body">
								<h4 align="center">Lugar de Nacimiento</h4><br>
								<?php
								include_once "../../clases/MySQLConector.php";

								$Mysql = new MySQLConector();
								$Mysql->Conectar();

								$Consulta = "SELECT * FROM `lugarnacimiento`";
								$Resultado = $Mysql->Consulta($Consulta);
								?>
								<select name="LugarNacimiento" id="LugarNacimiento" class="m-1 custom-select "> 
									<?php
									while ($fila = $Resultado->fetch_assoc()) { 
										?>

										<?php 
										echo " <option value=\"{$fila['idLugarNacimiento']}\">{$fila['Municipio']}, {$fila['Localidad']}, {$fila['Estado']}, {$fila['Pais']}</option>";
									}
									?>
								</select>
								<div class="radio">  
									<i>Otro Lugar:</i>
									<input type="checkbox" name="OtroLugar" onclick="Paisl.disabled = Estadol.disabled = Localidadl.disabled = Municipiol.disabled = !this.checked"/> <br>
									<div class="row">
										<div class="col-md-6">
											<b>País</b>
											<input type="text" name="Paisl" id="Paisl" class="form-control input-sm" placeholder="Pais" onkeypress="return NumerosLetras(event);" disabled maxlength="30">
										</div>
										<div class="col-md-6">
											<b>Estado</b>
											<input type="text" name="Estadol" id="Estadol" class="form-control input-sm" placeholder="Estado" onkeypress="return NumerosLetras(event);" disabled maxlength="30">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<b>Municipio</b>
											<input type="text" name="Municipiol" id="Municipiol" class="form-control input-sm" placeholder="Municipio" onkeypress="return NumerosLetras(event);" disabled maxlength="30">
										</div>
										<div class="col-md-6">
											<b>Localidad</b>
											<input type="text" name="Localidadl" id="Localidadl" class="form-control input-sm" placeholder="Localidad" onkeypress="return NumerosLetras(event);" disabled maxlength="30">
										</div>
									</div>				
								</div>
							</div>
						</div>
						<br>
						<div class="card border-success">
							<div class="card-body">
								<h4 align="center">Domicilio</h4><br>
								<div class="row">
									<div class="col-md-4">
										<b>CP</b>
										<input type="text" name="CPd" id="CPd" class="form-control input-sm" placeholder="CP" onKeyPress="return soloNumeros(event)" maxlength="5" >
									</div>
									<div class="col-md-4">
										<b>Calle</b>
										<input type="text" name="Called" id="Called" class="form-control input-sm" placeholder="Calle" onkeypress="return NumerosLetras(event);" maxlength="30" >
									</div>
									<div class="col-md-4">
										<b>Número</b>
										<input type="text" name="Numerod" id="Numerod" class="form-control input-sm" placeholder="Numero" onkeypress="return NumerosLetras(event);" maxlength="20">
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<b>Colonia</b>
										<input type="text" name="Coloniad" id="Coloniad" class="form-control input-sm" placeholder="Colonia" onkeypress="return NumerosLetras(event);" maxlength="50" >
									</div>
									<div class="col-md-4">
										<b>Municipio</b>
										<input type="text" name="Municipiod" id="Municipiod" class="form-control input-sm" placeholder="Municipio" onkeypress="return NumerosLetras(event);" maxlength="50" >
									</div>
									<div class="col-md-4">
										<b>Localidad</b>
										<input type="text" name="Localidadd" id="Localidadd" class="form-control input-sm" placeholder="Localidad" onkeypress="return NumerosLetras(event);" maxlength="50" >
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<b>Estado</b>
										<input type="text" name="Estadod" id="Estadod" class="form-control input-sm" placeholder="Estado" onkeypress="return soloLetras(event);" maxlength="50">
									</div>
									<div class="col-md-4">
										<b>Tel. Casa</b>
										<input type="text" name="TelCasad" id="TelCasad" class="form-control input-sm" placeholder="Tel. Casa" onKeyPress="return soloNumeros(event)" maxlength="10"> 
									</div>
								</div>								
							</div>
						</div>
						<br>
						<div class="card border-success">
							<div class="card-body">
								<h4 align="center">Información Laboral</h4><br>
								<div class="row">
									<div class="col-md-4">
										<b>Número Empleado: </b>
										<input type="text" name="NoEmpleado" class="form-control input-sm" placeholder="<?php echo $NoEmpleado; ?>" readonly="readonly">
									</div>
									<div class="col-md-4">
										<b>Fecha de Ingreso: </b>
										<input type="date" name="FechaIngreso" value="<?php echo $FechaIngreso;?>" class="form-control" readonly="readonly">

									</div>
									<div class="col-md-4">
										<b>Departamento: </b>
										<input type="text" name="Departamento"  placeholder="<?php echo $Departamento; ?>"  class="form-control input-sm" readonly="readonly">
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<b>Puesto: </b>
										<input type="text" name="Puesto"  placeholder="<?php echo $Puesto; ?>" class="form-control input-sm" readonly="readonly">
									</div>
									<div class="col-md-4">
										<b>Horas: </b>
										<input type="text" name="Horas" placeholder="<?php echo $Horas; ?>" class="form-control input-sm" readonly="readonly">
									</div>
									<div class="col-md-4">
										<b>Bruto: </b>
										<input type="text" name="Bruto" placeholder="<?php //echo $Horas; ?>" class="form-control input-sm" readonly="readonly">
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<b>Neto: </b>
										<input type="text" name="Neto" placeholder="<?php //echo $Puesto; ?>" class="form-control input-sm" readonly="readonly">
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="card border-success">
							<div class="card-body">
								<h4 align="center">Información Académica</h4><br>
								<div class="row">
									<div class="col-md-6">
										<b>Último Grado de estudios:</b>
										<select name="UltimoGradoEstudios" class="m-1 custom-select">
											<option value="Maestria">Maestría</option>
											<option value="Licenciatura">Licenciatura</option>
											<option value="Barchillerato">Barchillerato</option>
										</select>
									</div>
									<div class="col-md-6">
										<b>Carrera o Especialidad:</b>
										<input type="text" name="CarreraEspecialidad" class="form-control input-sm" onkeypress="return soloLetras(event);">
									</div>
									<div class="col-md-6">
										<b>Área de conocimientos:</b>
										<input type="text" name="AreaConocimientos" class="form-control input-sm" onkeypress="return soloLetras(event);">
									</div>
									<div class="col-md-6">
										<b>Entidad Federativa dónde estudió:</b>
										<input type="text" name="EntidadFedEstudio" class="form-control input-sm" onkeypress="return soloLetras(event);">
									</div>
									<div class="col-md-6">
										<b>Nombre de la Institución:</b>
										<input type="text" name="NombreInstitucion" class="form-control input-sm" onkeypress="return soloLetras(event);">
									</div>
									<div class="col-md-6">
										<b>Estatus:</b>
										<input type="text" name="Estatus" class="form-control input-sm" onkeypress="return soloLetras(event);">
									</div>
									<div class="col-md-6">
										<b>Nombre del documento académico:</b>
										<input type="text" name="DocAcademico" class="form-control input-sm" onkeypress="return soloLetras(event);">
									</div>
									<div class="col-md-6">
										<b>Fecha de Expedición del documento:</b>
										<input type="text" name="ExpDocAcademico" class="form-control input-sm" onkeypress="return soloLetras(event);">
									</div>
									<div class="col-md-6">
										<b>No. De folio del documento académico:</b>
										<input type="text" name="FolioDocAcademico" class="form-control input-sm" onkeypress="return soloLetras(event);">
									</div>
								</div>
								<button type="submit" class="btn btn-success glyphicon glyphicon-plus" > Guardar registro</button><br>
							</div>
						</div>
						<br>
						<!--Button-->
						<br>
						<br>
						<br>
						<!--Fin Button-->
					</form>
					<?php 
				}else{
//---------------------------------------------------------------------------------------------------------------------------------------------------------
					include_once "../../clases/Personal.php";
					$Personal = new Personal();

					$FechaNacimiento = $_POST['FechaNacimiento'];
					$TipoSangre = $_POST['TipoSangre'];
					$Correo = $_POST['Correo'];
					$TelefonoCelular = $_POST['TelefonoCelular'];
					$EstadoCivil = $_POST['EstadoCivil'];
					$Sexo = $_POST['Sexo'];

					$Personal->setidPersonal($_SESSION['NombreUsuarioCAP']);
					$Personal->setFechaNac($FechaNacimiento);
					$Personal->setTipoSangre($TipoSangre);
					$Personal->setCorreo($Correo);
					$Personal->setTelefonoCel($TelefonoCelular);
					$Personal->setEstadoCivil($EstadoCivil);
					$Personal->setSexo($Sexo);

//-------------------------------------------------------------------------------------------------
					include_once "../../clases/LugarNacimiento.php";
					$LugarNacimiento = new lugarNacimiento();
					if(!empty($_POST['OtroLugar'])){
						$Paisl =$_POST['Paisl'];
						$Paisl = ucwords(strtolower($Paisl));
						$Estadol = $_POST['Estadol'];
						$Estadol = ucwords(strtolower($Estadol));
						$Localidadl = $_POST['Localidadl'];
						$Localidadl = ucwords(strtolower($Localidadl));
						$Municipiol = $_POST['Municipiol'];
						$Municipiol = ucwords(strtolower($Municipiol));
						$LugarNacimiento->setPais($Paisl);
						$LugarNacimiento->setEstado($Estadol);
						$LugarNacimiento->setLocalidad($Localidadl);
						$LugarNacimiento->setMunicipio($Municipiol);
					}else{
						$idLugarNacimiento = $_POST['LugarNacimiento'];
						$LugarNacimiento->setidLugarNacimiento($idLugarNacimiento);
					}

            /*$SQLControlador = new SQLControlador();
            $SQLControlador-> AgregarLugarNacimiento($LugarNacimiento);*/
//------------------------------------------------------------------------------------------------- 
            include_once "../../clases/Domicilio.php";
            $Domicilio = new Domicilio();

            $CP = $_POST['CPd'];
            $Calle = $_POST['Called'];
            $Calle = ucwords(strtolower($Calle));
            $Numero = $_POST['Numerod'];
            $Colonia = $_POST['Coloniad'];
            $Colonia = ucwords(strtolower($Colonia));
            $Municipio = $_POST['Municipiod'];
            $Municipio = ucwords(strtolower($Municipio));
            $Localidad = $_POST['Localidadd'];
            $Localidad = ucwords(strtolower($Localidad));
            $Estado = $_POST['Estadod'];
            $Estado = ucwords(strtolower($Estado));
            $TelefonoCasa = $_POST['TelCasad'];

            $Domicilio->setCP($CP);
            $Domicilio->setCalle($Calle);
            $Domicilio->setNumero($Numero);
            $Domicilio->setColonia($Colonia);
            $Domicilio->setMunicipio($Municipio);
            $Domicilio->setLocalidad($Localidad);
            $Domicilio->setEstado($Estado);
            $Domicilio->setTelefonoCasa($TelefonoCasa);

            /*$SQLControlador = new SQLControlador();
            $SQLControlador-> AgregarDomicilioAlumno($Domicilio,$Alumno);*/
//--------------------------------------------------------------------------------------------------
            
            
            include_once "../../clases/EstudiosPersonal.php";
            $EstudiosPersonal = new EstudiosPersonal();
			
			$UltimoGrado = $_POST['UltimoGradoEstudios'];
            $CarreraEspecialidad = $_POST['CarreraEspecialidad'];
            $AreaConocimientos = $_POST['AreaConocimientos'];
            $EntidadFederativa = $_POST['EntidadFedEstudio'];
            $Institucion = $_POST['Institucion'];
            $Estatus = $_POST['Estatus'];
            $DocAcademico = $_POST['DocAcademico'];
            $FechaExpedicion = $_POST['ExpDocAcademico'];
            $NoFolioDoc = $_POST['FolioDocAcademico'];
             
            $EstudiosPersonal->setPersonal_idPersonal($_SESSION['NombreUsuarioCAP']);
            $EstudiosPersonal->setUltimoGrado($UltimoGrado);
            $EstudiosPersonal->setCarrera($CarreraEspecialidad);
            $EstudiosPersonal->setAreaConocimiento($AreaConocimientos);
            $EstudiosPersonal->setEntidadFederativa($EntidadFederativa);
            $EstudiosPersonal->setInstitucion($Institucion);
            $EstudiosPersonal->setEstatus($Estatus);
            $EstudiosPersonal->setDocAcademico($DocAcademico);
            $EstudiosPersonal->setFechaExpedicion($FechaExpedicion);
            $EstudiosPersonal->setNoFolioDoc($NoFolioDoc);



			include_once "../../clases/SQLControlador.php";

            $SQLControlador = new SQLControlador();
            $SQLControlador->AltaCedulaPersonal($Personal,$LugarNacimiento,$Domicilio,$EstudiosPersonal);

          
//--------------------------------------------------------------------------------------------------
        }
        ?>
        <!--Fin de contenido de caja de texto--> 
    </div>
    <!--Fin Contenido central-->
    <!--Inicio de pie de pagina-->
    <?php include '../menus/PiePagina.php';?>

    <!--fin de pie de pagina-->
</div>
<!--Fin Contenedor medio-->

<!--Inicio de pie de pagina-->

<!--fin de pie de pagina-->
</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		$('#Secundaria').select2();
		$('#LugarNacimiento').select2();

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
<script type="text/javascript">
	$(document).ready(function(){
		$('#NombreAlumno').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.\s]+/ig,"");
			}
		});

		$('#ApellidoP').on('input', function (e) {
			if (!/^[ a-z0A-Z-9.\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.\s]+/ig,"");
			}
		});

		$('ApellidoM').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.\s]+/ig,"");
			}
		});

		$('#CURP').on('input', function (e) {
			if (!/^[ A-Z0-9\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^A-Z0-9\s]+/ig,"");
			}
		});

		$('#Correo').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_"@?¿\s]+/ig,"");
			}
		});

		$('#TelefonoEmergencia').on('input', function (e) {
			if (!/^[0-9]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^0-9]+/ig,"");
			}
		});

		$('#NC').on('input', function (e) {
			if (!/^[0-9]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^0-9]+/ig,"");
			}
		});

		$('#SS').on('input', function (e) {
			if (!/^[0-9]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^0-9]+/ig,"");
			}
		});

		$('#Paisl').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Estadol').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Municipiol').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Localidadl').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#CPd').on('input', function (e) {
			if (!/^[0-9]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^0-9]+/ig,"");
			}
		});

		$('#Called').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Numerod').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Coloniad').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Municipiod').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Localidadd').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Estadod').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#TelCasad').on('input', function (e) {
			if (!/^[0-9]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^0-9]+/ig,"");
			}
		});

		$('#Matricula').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});
		$('#Nombre').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Municipio').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Estado').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Pais').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Promedio').on('input', function (e) {
			if (!/^[0-9.]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^0-9]+/ig,"");
			}
		});

		$('#TipoTratamiento').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

		$('#Enfermedad').on('input', function (e) {
			if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
			}
		});

	});
</script>