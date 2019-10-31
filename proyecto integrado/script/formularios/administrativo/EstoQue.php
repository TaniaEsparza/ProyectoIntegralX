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
  <script type="text/javascript" src="../../js/funciones.js"></script>
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
        miCampoTexto = document.getElementById("numero").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo numero esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("asunto").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo asunto esta vacio!');
          return false;
        }
        return true;
      }
    </script>

    <script language="javascript" type="text/javascript">
      function validarModificacion() {
        //obteniendo el valor que se puso en el campo text del formulario
        miCampoTexto = document.getElementById("numerou").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo numero esta vacio!');
          return false;
        }

        miCampoTexto = document.getElementById("asuntou").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
          alert('Verifica el campo asunto esta vacio!');
          return false;
        }
        return true;
      }
    </script>

    <body>
      <!--Inicio contenedor Cabecera-->
      <div class="container">
        <?php include "../menus/MenuDocenteTutor.php";
        MenuAlumnoDocenteCanalizacion();?>
        <br>
      </div>
      <!--Fin contenedor Cabecera-->

      <!--Inicio Contenedor medio-->
      <div class="container">
        <!--Poner titulo o nombre -->
        <br><center><h2> Tabla Clásulas </h2></center>
        <!--Poner titulo o nombre -->

        <div class="row">
          <!--Inicio de menu izquierdo-->
          <div class="col-sm-3">
            <!--Fin inicio menu izquierdo-->
          </div>
          <!--Inicio Contenido central-->
          <div class="col-sm-9">
           <!--Inicio de contenido de caja de texto-->
           <br>
           <div id="buscador"></div>
           <div class="col-md-12" id="tabla"></div>
           <br><br><br><br><br><br>

           <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Agregar nueva cláusula</h4>
                  <button type="button" class="close" data-dismiss="modal" id="CerrarRegistro" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <label>Número</label>
                  <input type="text" name="numero" id="numero" class="form-control input-sm"   maxlength="5" >
                  <label>Asunto</label>
                  <input type="text" name="asunto" id="asunto" class="form-control input-sm"  maxlength="20" >
                </div>
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

          <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Modificación cláusula</h4>
                  <button type="button" class="close" data-dismiss="modal" id="CerrarRegistro" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <label>Número</label>
                  <input type="text" name="numerou" id="numerou" class="form-control input-sm"  onkeypress="return soloLetras(event);" maxlength="5" >
                  <label>Asunto</label>
                  <input type="text" name="asuntou" id="asuntou" class="form-control input-sm" onkeypress="return soloLetras(event);" maxlength="20" >
                  <label>Estado</label>
                  <select name="Estado" id="Estado" class="custom-select">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>
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
      $('#tabla').load('../../clases/tablasmodales/TablaClausulas.php');
    //$('#buscador').load('../../clases/tablasmodales/BuscadorCanalizacionesTutor.php');
      //ValidarTutorJustificantesRegistro();
         //ValidarTutorJustificantesModificacion();
       });
     </script>
     <script type="text/javascript">

      $(document).ready(function(){
        $('#GuardarRegistro').click(function(){
          event.preventDefault();
          if($('#numero').val() == ''){
                    //alert('Nombre solos');
                  }else if ($('#asunto').val()=='') {
                    //alert('Campo de texto Apellido Paterno solo');
                  }else{
                    Numero=$('#numero').val();
                    Asunto=$('#asunto').val();
                    agregarDatosClausula(Numero,Asunto);
                  }
                });

        $('#numero').on('input', function (e) {
          if (!/^[0-9\s]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^0-9.\s]+/ig,"");
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
                    //alert('Nombre solos');
                  }else if ($('#asuentou').val()=='') {
                    //alert('Campo de texto Apellido Paterno solo');
                  }else{
                    actualizaDatos();
                  }
                });

        $('#CerrarRegistro').click(function() {
          $("#numero").val("");
          $('#asunto').val("");
        });

        $('#CerrarRegistroA').click(function() {
          $("#numero").val("");
          $('#asunto').val("");
        });

      });
    </script>