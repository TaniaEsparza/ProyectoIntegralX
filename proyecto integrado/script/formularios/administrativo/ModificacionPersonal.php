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
		regexp = /.[0-9]{5}$/
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
  miCampoTexto = document.getElementById("Nombre").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Nombre esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("ApellidoP").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Apellido Paterno esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("ApellidoM").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Apellido Materno esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("RFC").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo RFC esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("CURP").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo CURP esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("IMSS").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo No. IMSS esta vacio!');
  	return false;
  }

miCampoTexto = document.getElementById("NoEmpleado").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo No Empleado esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("FechaIngreso").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Fecha Ingreso esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("Puesto").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Puesto esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("Horas").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Horas esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("Bruto").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Bruto esta vacio!');
  	return false;
  }

  miCampoTexto = document.getElementById("Neto").value;
  if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
  	alert('Verifica el campo Neto esta vacio!');
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
		<br><center><h2> -- Modificación Personal -- </h2></center>
		<!--Poner titulo o nombre -->

		<div class="row">
			<div class="col-sm-1"></div>
			<!--Inicio Contenido central-->
			<div class="col-sm-10">
				<!--Inicio de contenido de caja de texto--> 
				<?php if(!isset($_POST['Nombre'])){
					


					include_once "../../clases/SQLControlador.php";
					include_once "../../clases/Usuarios.php";

					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta = "SELECT * FROM `personal`, `informacionlaboral` WHERE idPersonal = '".$_SESSION['idPersonal']."' AND Personal.InformacionLaboral_idInformacionLaboral = informacionlaboral.idInformacionLaboral;";

					$Resultado = $Mysql->Consulta($Consulta);
					$row = mysqli_fetch_array($Resultado);
					$idIL = $row['idInformacionLaboral'];
					$idLN = $row['LugarNacimiento_idLugarNacimiento'];
					$idD=$row['Domicilio_idDomicilio'];
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
					$TelefonoCelular = $row['TelefonoCel'];
					$Correo = $row['Correo'];
					$FechaNacimiento = $row['FechaNacimiento'];
					$TipoSangre = $row['TipoSangre'];
					$Sexo = $row['Sexo'];
					$EstadoCivil = $row['EstadoCivil'];
					
	            	$Neto = $row['Neto'];
					$Bruto = $row['Bruto'];

					?>


					<form action="ModificacionPersonal.php" method="POST" onsubmit="return validar()">
						<br>
						<div class="card border-success">
							<div class="card-body">
								<h4 align="center">Información Personal</h4>
								<br>
								<div class="row">
									<div class="col-sm-4">
										<b>Nombre(s):</b>
										<input type="text" name="Nombre"  class="form-control" id="Nombre" value="<?php echo $Nombre?>" on keypress="return soloLetras(event);" maxlength="25">		
									</div>
									<div class="col-sm-4">
										<b>Apellido Paterno:</b>
										<input type="text" name="ApellidoP" class="form-control" id="ApellidoP" value="<?php echo $ApellidoP?>" onkeypress="return soloLetras(event);" maxlength="20">
									</div>
									<div class="col-md-4">
										<b>Apellido Materno:</b>
										<input type="text" name="ApellidoM" class="form-control" id="ApellidoM" value="<?php echo $ApellidoM?>" onkeypress="return soloLetras(event);" maxlength="20">
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<b>RFC:</b>
										<input type="text" name="RFC" class="form-control" id="RFC" value="<?php echo $RFC?>" maxlength="13" onKeyUp="this.value = this.value.toUpperCase();" onkeypress="return NumerosLetrasSinCaracteres(event);" >
									</div>
									<div class="col-md-4">
										<b>CURP:</b>
										<input type="text" name="CURP" class="form-control" id="CURP" value="<?php echo $CURP?>" maxlength="18" onKeyUp="this.value = this.value.toUpperCase();" onkeypress="return NumerosLetrasSinCaracteres(event);" >
									</div>
									<div class="col-md-4">
										<b>No. IMSS:</b>
										<input type="text" name="IMSS" class="form-control" id="IMSS" value="<?php echo $IMSS?>" maxlength="11" onKeyUp="this.value = this.value.toUpperCase();" onkeypress="return soloNumeros(event);" >
									</div>
								</div>
								
								<br>
								<br>

								<h4 align="center">Información Laboral</h4><br>
								<input type="hidden" name="idIL" value="<?php echo $idIL;?>">
								<div class="row">
									<div class="col-md-4">
										<b>Número Empleado:</b>
										<input type="text" name="NoEmpleado" id="NoEmpleado" value="<?php echo $NoEmpleado; ?>" class="form-control input-sm" " onkeypress="return soloNumeros(event);">
									</div>
									<div class="col-md-4">
										<b>Fecha de Ingreso:</b>
										<input type="date" name="FechaIngreso" id="FechaIngreso" value="<?php echo $FechaIngreso;?>" class="form-control" >

									</div>
									<div class="col-md-4">
										<b>Departamento:</b>
										<select name="Departamento" class="m-1 custom-select">

											<option value="Docente" <?php if($Departamento == 'Docente'){echo "selected";} ?>>Docente</option>
											<option value="Administrativo"<?php if($Departamento == 'Administrativo'){echo "selected";} ?>>Administrativo</option>
											<option value="Directivo"<?php if($Departamento == 'Directivo'){echo "selected";} ?>>Directivo</option>
											
										</select>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<b>Puesto:</b>
										<input type="text" name="Puesto" id="Puesto"  value="<?php echo $Puesto; ?>" class="form-control input-sm" rendoly>
										<br>
										
									</div>

									<div class="col-md-4">
										<b>Horas:</b>
										<input type="text" name="Horas" id="Horas" value="<?php echo $Horas; ?>" class="form-control input-sm"onkeypress="return soloNumeros(event);">
										<br>
									</div>

									<div class="col-md-4">
										<b>Bruto:</b>
										<input type="text" name="Bruto" id="Bruto" value="<?php echo $Bruto; ?>" class="form-control input-sm"onkeypress="return NumeroDecimal(event, this);">
										<br>
									</div>
									<div class="col-md-4">
										<b>Neto:</b>
										<input type="text" name="Neto" id="Neto" value="<?php echo $Neto; ?>" class="form-control input-sm"onkeypress="return NumeroDecimal(event, this);">
										<br>
									</div>

								</div>
								<button type="submit" class="btn btn-success glyphicon glyphicon-plus" > Guardar registro</button><br>
							</div>
					
						</div>
						<br>
						<!--Button-->
						<br>
						<br>
					</form>
					<?php 
				}else{
//---------------------------------------------------------------------------------------------------------------------------------------------------------
					 

					include_once "../../clases/Personal.php";
					$Personal = new Personal();

					$Nombre = $_POST['Nombre'];
					$ApellidoP = $_POST['ApellidoP'];
					$ApellidoM = $_POST['ApellidoM'];
					$RFC = $_POST['RFC'];
					$CURP = $_POST['CURP'];
					$IMSS = $_POST['IMSS'];
					$NoEmpleado = $_POST['NoEmpleado'];
					$FechaIngreso = $_POST['FechaIngreso'];
					$Departamento = $_POST['Departamento'];
					$Puesto = $_POST['Puesto'];
					$Horas = $_POST['Horas'];
					$Bruto = $_POST['Bruto'];
					$Neto = $_POST['Neto'];
					$idIL = $_POST['idIL']; 

					$Personal->setidPersonal($_SESSION['idPersonal']);
					$Personal->setNombre($Nombre);
					$Personal->setApellidoP($ApellidoP);
					$Personal->setApellidoM($ApellidoM);
					$Personal->setRFC($RFC);
					$Personal->setCURP($CURP);
					$Personal->setSS($IMSS);
					

					include_once "../../clases/InformacionLaboral.php";
					$InformacionLaboral = new InformacionLaboral();

					$InformacionLaboral->setidInformacionLaboral($idIL);
					$InformacionLaboral->setNoEmpleado($NoEmpleado);
					$InformacionLaboral->setFechaIngreso($FechaIngreso);
					$InformacionLaboral->setDepartamento($Departamento);
					$InformacionLaboral->setPuesto($Puesto);
					$InformacionLaboral->setHoras($Horas);
					$InformacionLaboral->setBruto($Bruto);
					$InformacionLaboral->setNeto($Neto);

					include_once "../../clases/SQLControlador.php";

    		      	$SQLControlador = new SQLControlador();
		            $SQLControlador->ModificacionPersonal($Personal, $InformacionLaboral);



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
		$('#Nombre').on('input', function (e) {
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

		$('#SS').on('input', function (e) {
			if (!/^[0-9]*$/i.test(this.value)) {
				this.value = this.value.replace(/[^0-9]+/ig,"");
			}
		});

	});
</script>