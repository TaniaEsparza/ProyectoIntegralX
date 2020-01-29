<?php
session_start();
    /*if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

    }else{
        echo "<h1>Por Favor Inicia Sesión<h1>";
        echo "<script> setTimeout(function () { window.location.href='Login.php'; },3000); </script>";
        exit;
      }*/
      ?>
      <?php

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



        <script language="javascript" type="text/javascript">
          function validar() {
              //obteniendo el valor que se puso en el campo text del formulario
              miCampoTexto = document.getElementById('Articulo').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca el Nombre del Articulo, el campo se encuentra vacio!');
                return false;
              }

              miCampoTexto = document.getElementById('Descripcion').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca una Descripción, el campo se encuentra vacio!');
                return false;
              }

              miCampoTexto = document.getElementById('Preciou').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca el Precio Unitario, el campo se encuentra vacio!');
                return false;
              }

              miCampoTexto = document.getElementById('Proveedores').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca el Proveedor, el campo se encuentra vacio!');
                return false;
              }

              miCampoTexto = document.getElementById('Origenes').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca el Origen, el campo se encuentra vacio!');
                return false;
              }

              miCampoTexto = document.getElementById('Serie').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca el Numero de Serie, el campo se encuentra vacio!');
                return false;
              }

              txtFecha = document.getElementById('FechaIngreso').value;
              if(!isNaN(txtFecha)){
                alert('Seleccione o introduzca la fecha de ingreso!');
                return false;
              }

              miCampoTexto = document.getElementById('Tipo').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca el Tipo de Inventario, el campo se encuentra vacio!');
                return false;
              }

              txtFecha = document.getElementById('FechaRegistro').value;
              if(!isNaN(txtFecha)){
                alert('Seleccione o introduzca la fecha de registro!');
                return false;
              }

              miCampoTexto = document.getElementById('idEstatus').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca el ID Estatus, el campo se encuentra vacio!');
                return false;
              }

              miCampoTexto = document.getElementById('Marca').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca la Marca, el campo se encuentra vacio!');
                return false;
              }

              miCampoTexto = document.getElementById('Modelo').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca el Modelo, el campo se encuentra vacio!');
                return false;
              }

               miCampoTexto = document.getElementById('ClaveInventario').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca el Modelo, el campo se encuentra vacio!');
                return false;
              }

              miCampoTexto = document.getElementById('Anyo').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca el Año, el campo se encuentra vacio!');
                return false;
              }

              miCampoTexto = document.getElementById('Categorias').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca la Categoria, el campo se encuentra vacio!');
                return false;
              }

              miCampoTexto = document.getElementById('Area').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca el Area, el campo se encuentra vacio!');
                return false;
              }

              miCampoTexto = document.getElementById('Ubicacion').value;  
              if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
                alert('Establezca la Ubicacion, el campo se encuentra vacio!');
                return false;
              }

              return true;
            }

          </script>

          <script>
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

            function NumerosDecimales(e){
              var key = window.Event ? e.which : e.keyCode
              return (key >= 48 && key <= 57 || key == 46)
            }

            function SoloNumeros(e){
              var key = window.Event ? e.which : e.keyCode
              return (key >= 48 && key <= 57)
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
            <div class="col-sm-2">
              <?php //include 'MenuLateral.php' ?>
            </div>

            <div class="col-sm-10">

              <br>
              <br>

              <center>
                <h2 class="card-title">INVENTARIO</h2>
              </center>
              <?php if(!isset($_POST['Articulo'])){?>
                <div class="card border-success">
                  <div class="card-body">
                    <form action="./AltaInventario.php" method="POST" enctype="multipart/form-data" onsubmit="return validar()">
                     <form novalidate>
                      <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : null ?>">
                      <div class="row">

                        <div class="col-md-3">
                          <STRONG>Artículo: </STRONG><br>
                          <input type="text" class="form-control uppercase" id="Articulo" name="Articulo">
                        </div>
                        <div class="col-md-9">
                          <STRONG>Descripcion: </STRONG><br>
                          <input type="text" class="form-control uppercase" name="Descripcion" id="Descripcion">
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-3">
                          <STRONG>Precio Unitario: </STRONG><br>
                          <input type="text" class="form-control uppercase" placeholder="$" id="Preciou"  name="Preciou" onkeypress="return NumerosDecimales(event);" >
                        </div>
                        <div class="col-sm-3">
                          <STRONG>Proveedores:</STRONG><br>
                          <input class="form-control" type="text" name="Proveedores" id="Proveedores">
                        </div>
                        <div class="col-sm-3">
                          <STRONG>Origenes:</STRONG><br>
                          <input class="form-control" type="text" name="Origenes" id="Origenes">
                        </div>
                        <div class="col-sm-3">
                          <STRONG>No de Serie:</STRONG><br>
                          <input class="form-control" type="text" name="Serie" id="Serie">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-3">
                          <br>
                          <STRONG>Fecha ingreso Cecyt:</STRONG><br>
                          <input class="form-control" type="date" name="FechaIngreso" id="FechaIngreso">
                        </div>
                        <div class="col-sm-3">
                          <br>
                          <STRONG>Tipo de inventario:</STRONG><br>
                          <input class="form-control" placeholder="Información zac" type="text" name="Tipo" id="Tipo">
                        </div> 

                        <div class="col-sm-3">
                          <br>
                          <STRONG>Fecha de registro Zac:</STRONG><br>
                          <input class="form-control" type="date" name="FechaRegistro" id="FechaRegistro">
                        </div>  
                        <div class="col-sm-3">
                          <br>
                          <STRONG>ID estatus:</STRONG><br>
                          <input class="form-control" placeholder="Info zac" type="text" id="idEstatus" name="idEstatus">
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-sm-3">
                          <STRONG>Marca:</STRONG><br>
                          <input class="form-control" type="text" name="Marca" id="Marca">
                        </div>
                        <div class="col-sm-3">
                          <STRONG>Modelo:</STRONG><br>
                          <input class="form-control" type="text" name="Modelo" id="Modelo">
                        </div>
                        <div class="col-sm-3">
                          <STRONG>Clave Inventario:</STRONG><br>
                          <input class="form-control" type="text" name="ClaveInventario" id="ClaveInventario">
                        </div>
                        <div class="col-sm-3">
                          <STRONG>Imagen:</STRONG><br>
                          <img src="./imagenes/inventario/<?php echo isset($row['imagen']) ? $row['imagen'] : "" ?>" class="img-thumbnail">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-3">
                          <STRONG>Mes:</STRONG>
                          <select class="form-control" name="Mes">
                            <option value="1" <?php if(isset($row['mes']) && $row['mes'] == "1"){ echo "selected"; } ?>>Enero</option>
                            <option value="2" <?php if(isset($row['mes']) && $row['mes'] == "2"){ echo "selected"; } ?>>Febrero</option>
                            <option value="3" <?php if(isset($row['mes']) && $row['mes'] == "3"){ echo "selected"; } ?>>Marzo</option>
                            <option value="4" <?php if(isset($row['mes']) && $row['mes'] == "4"){ echo "selected"; } ?>>Abril</option>
                            <option value="5" <?php if(isset($row['mes']) && $row['mes'] == "5"){ echo "selected"; } ?>>Mayo</option>
                            <option value="6" <?php if(isset($row['mes']) && $row['mes'] == "6"){ echo "selected"; } ?>>Junio</option>
                            <option value="7" <?php if(isset($row['mes']) && $row['mes'] == "7"){ echo "selected"; } ?>>Julio</option>
                            <option value="8" <?php if(isset($row['mes']) && $row['mes'] == "8"){ echo "selected"; } ?>>Agosto</option>
                            <option value="9" <?php if(isset($row['mes']) && $row['mes'] == "9"){ echo "selected"; } ?>>Septiembre</option>
                            <option value="10" <?php if(isset($row['mes']) && $row['mes'] == "10"){ echo "selected"; } ?>>Octubre</option>
                            <option value="11" <?php if(isset($row['mes']) && $row['mes'] == "11"){ echo "selected"; } ?>>Noviembre</option>
                            <option value="12" <?php if(isset($row['mes']) && $row['mes'] == "12"){ echo "selected"; } ?>>Diciembre</option>
                          </select name=concepto>
                        </div>

                        <div class="col-sm-3">
                          <STRONG>Año:</STRONG><br>
                          <input class="form-control" type="text" name="Anyo" id="Anyo" onkeypress="return SoloNumeros(event);" maxlength="4">
                        </div>       

                        <div class="col-md-6">
                          <STRONG>Agregar Imagen:</STRONG>
                          <input type="file" class="form-control" id="image" name="image" >
                        </div>
                      </div>   
                      <br>
                      <div class="row">
                        <div class="col-sm-6">
                         <STRONG>Categorias:</STRONG><br>
                         <input class="form-control" type="text" name="Categorias" id="Categorias">
                       </div>
                       <div class="col-md-4">
                         <STRONG>Estado Fisico:</STRONG>
                         <select class="form-control" name="Estado">
                          <option value="1" <?php if(isset($row['mes']) && $row['mes'] == "1"){ echo "selected"; } ?>>Bueno</option>
                          <option value="2" <?php if(isset($row['mes']) && $row['mes'] == "2"){ echo "selected"; } ?>>Regular</option>
                          <option value="3" <?php if(isset($row['mes']) && $row['mes'] == "3"){ echo "selected"; } ?>>Malo</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </body>

              <br>
              <div class="row">      
               <div class="col-md">        
                <div class="card border-success">
                 <div class="card-body">

                  <div class="row">
                    <div class="col-md-4">
                     <STRONG>Area: </STRONG><br>
                     <select name="idArea" id="idArea" class="m-1 custom-select">
                       <?php
                       include_once "../../clases/MySQLConector.php";
                       $Mysql = new MySQLConector();
                       $Mysql->Conectar();
                       $Consulta2 = "SELECT * FROM `areasplantel`;";
                       $Resultado2 = $Mysql->Consulta($Consulta2);
                       if($Resultado2)
                        while ($fila2 = mysqli_fetch_array($Resultado2)){           
                          echo " <option value=\"{$fila2['idAreasPlantel']}\">{$fila2['NombreArea']}</option>";
                        }
                        ?>
                      </select>
                    </div>

                    <div class="col-md-4">
                     <STRONG>Ubicación:</STRONG><br>
                     <input type="text" class="form-control uppercase" id="Ubicacion" name="Ubicacion" readonly>
                   </div>

                   <div class="col-md-4">
                     <STRONG>Empleado:</STRONG><br>
                     <select name="Empleado" id="Empleado" class="m-1 custom-select">
                       <?php
                       include_once "../../clases/MySQLConector.php";
                       $Mysql = new MySQLConector();
                       $Mysql->Conectar();
                       $Consulta2 = "SELECT * FROM `personal`;";
                       $Resultado2 = $Mysql->Consulta($Consulta2);
                       if($Resultado2)
                        while ($fila2 = mysqli_fetch_array($Resultado2)){           
                          echo " <option value=\"{$fila2['idPersonal']}\">{$fila2['Nombre']} {$fila2['ApellidoP']} {$fila2['ApellidoM']}</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <button href="Historial_Ingresos/index.php" type="submit" name="agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>

                </form>
              <?php }else {

                include_once "../../clases/SQLControlador.php";
                include_once "../../clases/Inventario.php";

                $Inventario = new Inventario();

                $Articulo = $_POST['Articulo'];
                $Descripcion = $_POST['Descripcion']; 
                $Precio = $_POST['Preciou']; 
                $Proveedores = $_POST['Proveedores'];
                $Origenes = $_POST['Origenes'];
                $Serie = $_POST['Serie'];
                $FechaIngreso = $_POST['FechaIngreso'];
                $Tipo = $_POST['Tipo'];
                $FechaRegistro = $_POST['FechaRegistro'];
                $Estatus = $_POST['idEstatus'];
                $Marca = $_POST['Marca'];
                $Modelo = $_POST['Modelo'];
                $ClaveInventario = $_POST['ClaveInventario'];
                $Mes = $_POST['Mes'];
                $Anyo = $_POST['Anyo'];
                  //$imagen = '$newFileName',
                $Categorias = $_POST['Categorias'];
                $Estado = $_POST['Estado'];
                $Area = $_POST['idArea'];
                $Ubicacion = $_POST['Ubicacion'];
                $Empleado = $_POST['Empleado'];


                $Inventario->setArticulo($Articulo);
                $Inventario->setDescripcion($Descripcion);
                $Inventario->setPrecio($Precio);
                $Inventario->setProveedores($Proveedores);
                $Inventario->setOrigenes($Origenes);
                $Inventario->setNoSerie($Serie);
                $Inventario->setFechaIngreso($FechaIngreso);
                $Inventario->setTipo($Tipo);
                $Inventario->setFechaRegistroZac($FechaRegistro);
                $Inventario->setEstatus($Estatus);
                $Inventario->setMarca($Marca);
                $Inventario->setModelo($Modelo);
                $Inventario->setClaveInventario($ClaveInventario);
                $Inventario->setMes($Mes);
                $Inventario->setAnyo($Anyo);
                //$Inventario->setImagen($imgContent);
                $Inventario->setCategorias($Categorias);
                $Inventario->setEstadoFisico($Estado);
                $Inventario->setArea($Area);
                $Inventario->setUbicacion($Ubicacion);
                $Inventario->setEmpleado($Empleado);

                $SQLControlador = new SQLControlador();
                $R = $SQLControlador->AgregarArticuloInventario($Inventario);

                if($R == 1){

                  if(empty($_FILES["image"]["tmp_name"])){
                    echo "<script language='javascript'>window.location = 'ConsultaInventario.php'</script>";
                  }else{

                   include_once "../../clases/MySQLConector.php";
                   $Mysql = new MySQLConector();
                   $Mysql->Conectar();
                   $Consulta2 = "SELECT MAX(inventario.idInventario) AS idInventario FROM inventario";
                   $Resultado2 = $Mysql->Consulta($Consulta2);
                   while ($fila = $Resultado2->fetch_assoc()) {
                    $idInv = $fila['idInventario'];
                  }
                  echo "<script language='javascript'>alert('".$idInv."')</script>";                

                  $check = getimagesize($_FILES["image"]["tmp_name"]);
                  if($check !== false){
                    $image = $_FILES['image']['tmp_name'];
                    $imgContent = addslashes(file_get_contents($image));
                    $dbHost     = 'localhost';
                    $dbUsername = 'root';
                    $dbPassword = '';
                    $dbName     = 'cecyte';

                    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

                    if($db->connect_error){
                      die("Connection failed: " . $db->connect_error);
                    }

                //Insert image content into database

                    $insert = $db->query("UPDATE inventario SET imagen ='$imgContent' where idInventario = '".$idInv
                      ."';");
                    if($insert){
                //echo "File uploaded successfully.";
                      echo "<script language='javascript'>alert('La imagen se subio exitosamente')</script>";
                      echo "<script language='javascript'>window.location = 'ConsultaInventario.php'</script>";
                    }else{
              // echo "File upload failed, please try again.";
                      echo "<script language='javascript'>alert('Error al subir imagen')</script>";
                    } 
                  }else{
          //echo "Please select an image file to upload.";
                    echo "<script language='javascript'>alert('Selecciona una imagen con el formato correcto')</script>";
                  }
                }
              }

            }?>
            <script>

// Agregue el siguiente código si desea que aparezca el nombre del archivo en seleccionar
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>


<script type="text/javascript">
 $(document).ready(function(){
  getDatosArea();

  $('#idArea').change(function(){
   getDatosArea();
 })
})
</script>

<script type="text/javascript">
 function getDatosArea(){
  $.ajax({
   type:"GET",
   url:"../../clases/tablasmodales/ConsultaArea.php",
   data:"idArea="+$('#idArea').val(),
   success:function(r){
    var obj = JSON.parse(r);
    document.getElementById('Ubicacion').value = obj.edificio;
  }
});
}

</script>
<br>

</div>
</html>
<?php //} ?>


