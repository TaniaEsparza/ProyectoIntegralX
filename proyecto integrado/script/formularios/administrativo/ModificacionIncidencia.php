<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <!--  meta tags -->
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

  <script language="javascript" type="text/javascript">
    function validar() {
              //obteniendo el valor que se puso en el campo text del formulario

              txtFecha = document.getElementById('Fecha').value;
              if(!isNaN(txtFecha)){
                alert('Seleccione o introduzca la Fecha!');
                return false;
              }

              miCampoTexto = document.getElementById('HoraInicial').value;
              if(miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)){
                alert('Seleccione o introduzca la Hora de Inicio!');
                return false;
              }

              txtFecha = document.getElementById('HoraFinal').value;
              if(!isNaN(txtFecha)){
                alert('Seleccione o introduzca la la Hora de Fin!');
                return false;
              }


              return true;
            }
          </script>


        </head>

        <body>
          <div class="container">
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
                <h2 class="card-title">CEDULA DE CONTROL DE INCIDENCIAS</h2>
              </center><br><br>
              <?php if(!isset($_POST['Fecha'])){?>
                <form action="./ModificacionIncidencia.php" method="POST" onsubmit="return validar()">
                  <?php 
                  include_once "../../clases/MySQLConector.php";
                  $Mysql = new MySQLConector();
                  $Mysql->Conectar();
                  $ConsultaG = "SELECT incidencias.idIncidencias, incidencias.idEmpleado AS idPersonalI, incidencias.idClausulas AS idClausulasI, incidencias.Fecha, incidencias.Observaciones, incidencias.HoraInicial, incidencias.HoraFinal, clausulas.idClausulas, clausulas.Asunto, personal.idPersonal, personal.Nombre, personal.ApellidoP, personal.ApellidoM FROM incidencias, clausulas, personal WHERE incidencias.idIncidencias = '".$_SESSION['idIncidencia']."' AND incidencias.idEmpleado = personal.idPersonal and incidencias.idClausulas = clausulas.idClausulas;";
                  $ResultadoG = $Mysql->Consulta($ConsultaG);
                  if($ResultadoG)
                    while ($filaG = mysqli_fetch_array($ResultadoG)){  

                      ?>
                      <form novalidate>
                        <div class="row">
                          <div class="col-md">
                            <div class="card border-success">
                              <div class="card-body">
                                <center>
                                  <h3 class="card-title">DATOS DEL TRABAJADOR</h3>
                                </center>

                                <div class="row">
                                  <div class="col-xl-8">
                                    <STRONG>Nombre del empleado:</STRONG><br><br>
                                    <select name="idPersonal" id="idPersonal" class="m-1 custom-select">
                                     <?php
                                     include_once "../../clases/MySQLConector.php";
                                     $Mysql = new MySQLConector();
                                     $Mysql->Conectar();
                                     $Consulta2 = "SELECT * FROM `personal`;";
                                     $Resultado2 = $Mysql->Consulta($Consulta2);
                                     if($Resultado2)
                                      while ($fila2 = mysqli_fetch_array($Resultado2)){
                                        echo " <option value=\"{$fila2['idPersonal']}\" "; if($filaG['idPersonalI'] == $fila2['idPersonal']) { echo "selected";} echo " > {$fila2['Nombre']} {$fila2['ApellidoP']} {$fila2['ApellidoM']}</option>";  

                                        //echo " <option value=\"{$fila2['idPersonal']}\">{$fila2['Nombre']} {$fila2['ApellidoP']} {$fila2['ApellidoM']}</option>";
                                      }
                                      ?>
                                    </select>
                                  </div>

                                  <div class="col-xl-4">
                                    <STRONG>Solicitud de fecha:</STRONG><br><br>
                                    <input type="date" id="Fecha" name="Fecha" value="<?php echo $filaG['Fecha'] ?>" class="custom-select">
                                    <br>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-xl-8">
                                    <STRONG>Puesto:</STRONG><br><br>
                                    <input type="text" class="form-control uppercase" placeholder="Digite Puesto" id="Puesto"  disabled><br>
                                  </div>
                                  <div class="col-xl-4">
                                    <STRONG>No.empleado:</STRONG><br><br>
                                    <input type="text" class="form-control uppercase" placeholder="Digite No.Emp" id="NumeroEmpleado"  disabled><br>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <br>
                            <br>

                            <div class="row">
                              <div class="col-md">
                                <div class="card border-success">
                                  <div class="card-body">
                                    <center>
                                      <h3 class="card-title">SOLICITUD</h3>
                                    </center>

                                    <div class="row">
                                      <div class="col-xl-4">
                                        <STRONG>Cláusula CCT:</STRONG><br>
                                        <select name="idClausula" id="idClausula" class="m-1 custom-select">
                                         <?php
                                         include_once "../../clases/MySQLConector.php";
                                         $Mysql = new MySQLConector();
                                         $Mysql->Conectar();
                                         $Consulta2 = "SELECT * FROM `clausulas`;";
                                         $Resultado2 = $Mysql->Consulta($Consulta2);
                                         if($Resultado2)
                                          while ($fila2 = mysqli_fetch_array($Resultado2)){  
                                            echo " <option value=\"{$fila2['idClausulas']}\" "; if($filaG['idClausulasI'] == $fila2['idClausulas']) { echo "selected";} echo " >{$fila2['Numero']}</option>";           
                                            //echo " <option value=\"{$fila2['idClausulas']}\">{$fila2['Numero']}</option>";
                                          }
                                          ?>
                                        </select>
                                      </div>

                                      <div class="col-xl-8">
                                        <STRONG>Asunto:</STRONG><br>
                                        <input type="text" class="form-control uppercase" id="Asunto" placeholder="Digite Asunto" name="Asunto"  disabled><br>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-xl-4">
                                        <STRONG>Documentación que se anexa:</STRONG><br>
                                        <input type="text" class="form-control uppercase" placeholder="Digite documentación"  id="Documentos" name="Documentos" disabled><br>
                                      </div>

                                      <div class="col-xl-8">
                                        <STRONG>Lo anterior por los siguientes motivos:</STRONG><br>
                                        <textarea class="form-control" placeholder="Digite Motivos" rows="2" id="Observaciones"  name="Observaciones"><?php echo $filaG['Observaciones'] ?></textarea>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-xl-4">
                                       <STRONG>Hora Inicial: </STRONG>
                                       <input type="time" class="form-control" id="HoraInicial" name="HoraInicial" value="<?php echo $filaG['HoraInicial'] ?>"> 
                                     </div>
                                     <div class="col-xl-4">
                                       <STRONG>Hora Final: </STRONG>
                                       <input type="time" class="form-control" id="HoraFinal" name="HoraFinal" value="<?php echo $filaG['HoraFinal'] ?>"> 
                                     </div>
                                   </div>
                                   <br>
                                   <button type="submit" name="agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar </button>
                                 </div>
                               </div>
                             </div>
                           </div>
                         </form>
                         <?php
                       } 
                       ?>
                     </form>
                   <?php }else{

                     include_once "../../clases/SQLControlador.php";
                     include_once "../../clases/Incidencias.php";

                     $Incidencias = new Incidencias();

                     $idIncidencia = $_SESSION['idIncidencia'];
                     $idClausula = $_POST['idClausula'];
                     $idPersonal = $_POST['idPersonal']; 
                     $Fecha = $_POST['Fecha']; 
                     $Observaciones = $_POST['Observaciones'];
                     $HoraInicial = $_POST['HoraInicial'];
                     $HoraFinal = $_POST['HoraFinal'];

                     $Incidencias->setidIncidencias($idIncidencia);
                     $Incidencias->setidClausula($idClausula);
                     $Incidencias->setidPersonal($idPersonal);
                     $Incidencias->setFecha($Fecha);
                     $Incidencias->setObservaciones($Observaciones);
                     $Incidencias->setHoraInicial($HoraInicial);
                     $Incidencias->setHoraFinal($HoraFinal);

                     $SQLControlador = new SQLControlador();
                     $SQLControlador->ModificacionIncidencia($Incidencias);
                   }
                   ?>
                 </div>
               </body>
               </html>

               <script type="text/javascript">
                 $(document).ready(function(){
                  getDatosEmpleado();
                  getDatosClausula();

                  $('#idPersonal').change(function(){
                   getDatosEmpleado();
                 })

                  $('#idClausula').change(function(){
                   getDatosClausula();
                 })

                })
              </script>

              <script type="text/javascript">
               function getDatosEmpleado(){
                $.ajax({
                 type:"GET",
                 url:"../../clases/tablasmodales/ConsultaEmpleado.php",
                 data:"idPersonal="+$('#idPersonal').val(),
                 success:function(r){
                  var obj = JSON.parse(r);
                  document.getElementById('Puesto').value = obj.Puesto;
                  document.getElementById('NumeroEmpleado').value = obj.NoEmpleado;
                }
              });
              }

              function getDatosClausula(){
                $.ajax({
                 type:"GET",
                 url:"../../clases/tablasmodales/ConsultaClausula.php",
                 data:"idClausula="+$('#idClausula').val(),
                 success:function(c){
                  var obj = JSON.parse(c);
                  document.getElementById('Asunto').value = obj.Asunto;
                  document.getElementById('Documentos').value = obj.Documentacion;
                }
              });
              }

            </script>
            <?php  ?>