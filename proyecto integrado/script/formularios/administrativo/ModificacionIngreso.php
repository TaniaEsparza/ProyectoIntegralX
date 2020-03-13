<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinAdmin']))
{
   echo "<script language='javascript'>window.location='LoginAdmin.php'</script>";
}
?>
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

                miCampoTexto = document.POSTElementById('Folio').value;
                if(miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)){
                	alert('Intoduzca el Folio!');
                	return false;
                }

                txtFecha = document.POSTElementById('Fecha').value;
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
                           <h2 class="card-title">MODIFICACIÓN</h2>
                     </center>
                     <div class="card border-success">
                           <div class="card-body">
                                <?php if(!isset($_POST['Fecha'])){?>
                                     <?php 
                                     include_once "../../clases/MySQLConector.php";
                                     $Mysql = new MySQLConector();
                                     $Mysql->Conectar();
                                     $ConsultaG = "SELECT * FROM ingresos WHERE ingresos.idIngresos = '".$_SESSION['idIngreso']."'";
                                     $ResultadoG = $Mysql->Consulta($ConsultaG);
                                     if($ResultadoG)
                                          while ($filaG = mysqli_fetch_array($ResultadoG)){  
                                               ?>
                                               <form action="./ModificacionIngreso.php" method="POST" onsubmit="return validar()">
                                                  <div class="row">
                                                    <div class="col-md-8">
                                                      <b>Folio: </b>
                                                      <input type="text" style="color:red" id="Folio" name="Folio" class="form-control" value="<?php echo $filaG['Folio'] ?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                      <b>Fecha: </b>
                                                      <input type="date" name="Fecha" id="Fecha"class="form-control" value="<?php echo $filaG['Fecha'] ?>"> 
                                                    </div>
                                                  </div>

                                                  <div class="row">
                                                    <div class="col-md-6">
                                                       <b>Nombre de Alumno: </b>
                                                    <select name="idAlumno" id="idAlumno" class="m-1 custom-select">
                                                         <?php
                                                         include_once "../../clases/MySQLConector.php";
                                                         $Mysql = new MySQLConector();
                                                         $Mysql->Conectar();
                                                         $Consulta2 = "SELECT * FROM `Alumno`;";
                                                         $Resultado2 = $Mysql->Consulta($Consulta2);
                                                         if($Resultado2)
                                                              while ($fila2 = mysqli_fetch_array($Resultado2)){           
                                                                  //echo " <option value=\"{$fila2['idAlumno']}\">{$fila2['Nombre']} {$fila2['ApellidoP']} {$fila2['ApellidoM']}</option>";
                                                                   echo " <option value=\"{$fila2['idAlumno']}\" "; if($filaG['idAlumno'] == $fila2['idAlumno']) { echo "selected";} echo " > {$fila2['Nombre']} {$fila2['ApellidoP']} {$fila2['ApellidoM']}</option>"; 
                                                             }
                                                             ?>
                                                       </select>
                                                    </div>
                                                    <div class="col-md-6">
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
                                                                 //echo " <option value=\"{$fila2['idGrupo']}\">{$fila2['Grado']}-{$fila2['Grupo']} {$fila2['Nombre']}</option>";
                                                                  echo " <option value=\"{$fila2['idGrupos']}\" "; if($filaG['idGrupo'] == $fila2['idGrupos']) { echo "selected";} echo " >{$fila2['Grado']}-{$fila2['Grupo']} {$fila2['Nombre']}</option>"; 
                                                            }
                                                            ?>
                                                      </select>
                                                    </div>
                                                  </div>

                                                    <div class="row">
                                                      <div class="col-md-12">
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
                                                                //echo " <option value=\"{$fila2['idConceptoDePago']}\">{$fila2['NombreConcepto']}</option>";
                                                                 echo " <option value=\"{$fila2['idConceptoDePago']}\" "; if($filaG['idConceptodePago'] == $fila2['idConceptoDePago']) { echo "selected";} echo " > {$fila2['NombreConcepto']}</option>"; 
                                                           }
                                                           ?>
                                                        </select> 
                                                      </div>
                                                      <div class="col-md-12">
                                                        <b>Monto: </b>
                                                      <input type="text" hidden="" id="Monto" name="Monto">
                                                      <input type="text" hidden="" id="MLetra" name="MLetra">
                                                      <input type="text" name="MontoLetra" id="MontoLetra" class="form-control" readonly>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                        <b>Observación: </b>
                                                        <textarea class="form-control" rows="2" id="Observacion" name="Observacion"><?php echo $filaG['Observacion']; ?></textarea>
                                                      </div>
                                                    </div>
                                                     <div class="row">
                                                      <div class="col-md-4">
                                                        <b>Estatus: </b>
                                                        <select name="Estatus" id="Estatus" class="m-1 custom-select">
                                                            <option value="1" <?php if($filaG['Estatus'] == 1 ){ echo "selected";} ?>>Activo</option>
                                                            <option value="0" <?php if($filaG['Estatus'] == 0 ){ echo "selected";} ?>>Inactivo</option>
                                                        </select>
                                                      </div>
                                                     </div>

                                                    <br>
                                                <button type="submit" name="agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>     
                                          </form>
                                          <?php
                                    }
                                    ?>
                                    <?php 
                              }else{
                                 include_once "../../clases/SQLControlador.php";
                                 include_once "../../clases/Ingresos.php";

                                 $Ingresos = new Ingresos();

                                 $idIngreso = $_SESSION['idIngreso'];
                                 $idAlumno = $_POST['idAlumno'];
                                 $idGrupo = $_POST['idGrupo']; 
                                 $idConceptodePago = $_POST['idConceptodePago']; 
                                 $Fecha = $_POST['Fecha'];
                                 $Observacion = $_POST['Observacion'];
                                 $Monto = $_POST['Monto'];
                                 $Folio = $_POST['Folio'];
                                 $Estatus = $_POST['Estatus'];
                                 $MLetra = $_POST['MLetra'];

                                 $Ingresos->setidIngresos($idIngreso);
                                 $Ingresos->setidAlumno($idAlumno);
                                 $Ingresos->setidGrupo($idGrupo);
                                 $Ingresos->setidConceptodePago($idConceptodePago);
                                 $Ingresos->setFecha($Fecha);
                                 $Ingresos->setObservacion($Observacion);
                                 $Ingresos->setMonto($Monto);
                                 $Ingresos->setFolio($Folio);
                                 $Ingresos->setEstatus($Estatus);
                                 $Ingresos->setMontoLetra($MLetra);

                                 $SQLControlador = new SQLControlador();
                                 $SQLControlador->ModificarIngresos($Ingresos);
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
             type:"POST",
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
