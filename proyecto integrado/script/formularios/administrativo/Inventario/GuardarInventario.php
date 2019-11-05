<?php
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

    }else{
        echo "<h1>Por Favor Inicia Sesión<h1>";
        echo "<script> setTimeout(function () { window.location.href='Login.php'; },3000); </script>";
        exit;
    }
?>
<?php
require('conexion.php');
//REGISTRO NUEVO EN LA BASE DE DATOS
if (isset($_POST['articulo']) AND $_POST['id'] == null AND isset($_FILES['imagen']) AND $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
  $fileTmpPath = $_FILES['imagen']['tmp_name'];
  $fileName = $_FILES['imagen']['name'];
  $fileSize = $_FILES['imagen']['size'];
  $fileType = $_FILES['imagen']['type'];
  $fileNameCmps = explode(".", $fileName);
  $fileExtension = strtolower(end($fileNameCmps));
  $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
  $uploadFileDir = './imagenes/inventario/';
  $dest_path = $uploadFileDir . $newFileName;
  
  if(move_uploaded_file($fileTmpPath, $dest_path))
  {
    $sql = "INSERT INTO inventario
    (articulo, descripcion, precio, cantidad, proveedores, origenes, serie, fecha_ingreso, tipo, fecha_registro, estatus, marca, modelo,
    mes, ano, imagen, categorias, estado, area, ubicacion, empleado)
    VALUES ('$_POST[articulo]', '$_POST[descripcion]', '$_POST[precio]', '$_POST[cantidad]', '$_POST[proveedores]', '$_POST[origenes]', '$_POST[serie]', '$_POST[fecha_ingreso]', '$_POST[tipo]', 
    '$_POST[fecha_registro]', '$_POST[estatus]', '$_POST[marca]', '$_POST[modelo]', '$_POST[mes]', '$_POST[ano]', '$newFileName', '$_POST[categorias]', '$_POST[estado]', '$_POST[area]', '$_POST[ubicacion]', 
    '$_POST[empleado]')";

    if ($conexion->query($sql) === TRUE){
      echo "<h1>Operacion Exitosa!<h1>";
      echo "<script> setTimeout(function () { window.location.href='index.php'; },3000); </script>";
    } else {
      echo "Error: ".$sql."<br>".$conexion->error;
    }
  }
	
}else if(isset($_POST['articulo']) AND $_POST['id'] != null) {
  if(isset($_FILES['imagen']) AND $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
    $fileTmpPath = $_FILES['imagen']['tmp_name'];
    $fileName = $_FILES['imagen']['name'];
    $fileSize = $_FILES['imagen']['size'];
    $fileType = $_FILES['imagen']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $uploadFileDir = './imagenes/inventario/';
    $dest_path = $uploadFileDir . $newFileName;
    if(move_uploaded_file($fileTmpPath, $dest_path))
    {

      $sql = "UPDATE inventario SET 
      articulo = '$_POST[articulo]', 
      descripcion = '$_POST[descripcion]', 
      precio = '$_POST[precio]', 
      cantidad = '$_POST[cantidad]',
      proveedores = '$_POST[proveedores]',
      origenes = '$_POST[origenes]',
      serie = '$_POST[serie]',
      fecha_ingreso = '$_POST[fecha_ingreso]',
      tipo = '$_POST[tipo]',
      fecha_registro = '$_POST[fecha_registro]',
      estatus = '$_POST[estatus]',
      marca = '$_POST[marca]',
      modelo = '$_POST[modelo]',
      mes = '$_POST[mes]',
      ano = '$_POST[ano]',
      imagen = '$newFileName',
      categorias = '$_POST[categorias]',
      estado = '$_POST[estado]',
      area = '$_POST[area]',
      ubicacion = '$_POST[ubicacion]',
      empleado = '$_POST[empleado]'
      WHERE id = $_POST[id]";
    }
  }else{
    $sql = "UPDATE inventario SET 
      articulo = '$_POST[articulo]', 
      descripcion = '$_POST[descripcion]', 
      precio = '$_POST[precio]', 
      cantidad = '$_POST[cantidad]',
      proveedores = '$_POST[proveedores]',
      origenes = '$_POST[origenes]',
      serie = '$_POST[serie]',
      fecha_ingreso = '$_POST[fecha_ingreso]',
      tipo = '$_POST[tipo]',
      fecha_registro = '$_POST[fecha_registro]',
      estatus = '$_POST[estatus]',
      marca = '$_POST[marca]',
      modelo = '$_POST[modelo]',
      mes = '$_POST[mes]',
      ano = '$_POST[ano]',
      categorias = '$_POST[categorias]',
      estado = '$_POST[estado]',
      area = '$_POST[area]',
      ubicacion = '$_POST[ubicacion]',
      empleado = '$_POST[empleado]'
      WHERE id = $_POST[id]";
  }
        
  if ($conexion->query($sql) === TRUE) {
    echo "<h1>Operacion Exitosa!<h1>";
    echo "<script> setTimeout(function () { window.location.href='index.php'; },3000); </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
  }
  
  
  //MUESTRA EL FORMULARIO Y EN CASO DE TENER ID MUESTRA LOS DATOS DEL REGISTRO
} else {
	if (isset($_GET['id'])) {
	  $sql = "SELECT * FROM inventario WHERE id = $_GET[id]";
	  $result = $conexion->query($sql);
	  $row = $result->fetch_assoc();
	}
	
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>

  <link rel="icon" type="image/vnd.microsoft.icon" href="imagenes/Mapa.ico">

  <link rel="stylesheet" type="text/css" href="css/style_menu_alumno.css">
  <link rel="stylesheet" type="text/css" href="css/style_menu_izquierdo_alumno.css">
  <link rel="stylesheet" type="text/css" href="css/style_pie_pagina.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

   <script src="js/validCampoFranz.js"></script>
       <script type="text/javascript">
            $(function(){
                //Para escribir solo letras
                $('#Articulo').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#Marca').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#provedor').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#origen').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#categoria').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#area').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#ubicacion').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                $('#empleado').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');



                $('#preciou').validCampoFranz('0123456789'); 
                $('#cant').validCampoFranz('0123456789'); 
                $('#id').validCampoFranz('0123456789');
                $('#ano').validCampoFranz('0123456789');
                
            });
        </script>        

</head>

<body>
  <div class="container">
    <br>
    <?php include "MenuSuperior.php"; ?>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <?php include 'MenuLateral.php' ?>
      </div>
      
      <div class="col-sm-9">

        <br>
        <br>

        <center>
          <h2 class="card-title">INVENTARIO</h2>
        </center>
        <div class="card border-success">
          <div class="card-body">
            <form action="./GuardarInventario.php" method="POST" enctype="multipart/form-data">
               <form novalidate>
              <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : null ?>">
              <div class="row">

                <div class="col-md-3">
                  <STRONG>Artículo: </STRONG><br>
                  <input type="text" class="form-control uppercase" id="Articulo" name="articulo" value="<?php echo isset($row['articulo']) ? $row['articulo'] : "" ?>"required>
                </div>
                <div class="col-md-6">
                  <STRONG>Descrpcion: </STRONG><br>
                  <input type="text" class="form-control uppercase" name="descripcion" value="<?php echo isset($row['descripcion']) ? $row['descripcion'] : "" ?>"required>
                </div>
               <div class="col-md-3">
                  <STRONG>Precio Unitario: </STRONG><br>
                  <input type="text" class="form-control uppercase" placeholder="$" id="preciou"  name="precio" value="<?php echo isset($row['precio']) ? $row['precio'] : "" ?>"required>
               </div>

             </div>
              <br>

                <div class="row">
                <div class="col-sm-2">
                  <STRONG>Cantidad:</STRONG><br>
                  <input class="form-control" type="text" name="cantidad" id="cant" value="<?php echo isset($row['cantidad']) ? $row['cantidad'] : "" ?>"required>
                </div>
                <div class="col-sm-4">
                  <STRONG>Proveedores:</STRONG><br>
                  <input class="form-control" type="text" name="proveedores" id="provedor" value="<?php echo isset($row['proveedores']) ? $row['proveedores'] : "" ?>"required>
                </div>
                <div class="col-sm-3">
                  <STRONG>Origenes:</STRONG><br>
                  <input class="form-control" type="text" name="origenes" id="origen" value="<?php echo isset($row['origenes']) ? $row['origenes'] : "" ?>"required>
                </div>
                <div class="col-sm-3">
                  <STRONG>No de Serie:</STRONG><br>
                  <input class="form-control" type="text" name="serie" value="<?php echo isset($row['serie']) ? $row['serie'] : "" ?>"required>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-3">
                  <br>
                  <STRONG>Fecha ingreso Cecyt:</STRONG><br>
                  <input class="form-control" type="date" name="fecha_ingreso" value="<?php echo isset($row['fecha_ingreso']) ? $row['fecha_ingreso'] : "" ?>"required>
                </div>
                  <div class="col-sm-3">
                    <br>
                 <STRONG>Tipo de invenatario:</STRONG><br>
                  <input class="form-control" placeholder="Información zac" type="text" name="tipo" value="<?php echo isset($row['tipo']) ? $row['tipo'] : "" ?>"required>
                </div> 
              
                <div class="col-sm-3">
                  <br>
                  <STRONG>Fecha de registro Zac:</STRONG><br>
                   <input class="form-control" type="date" value="<?php echo isset($row['fecha_registro']) ? $row['fecha_registro'] : "" ?>"  name="fecha_registro" required>
                </div>  
                <div class="col-sm-3">
                  <br>
                  <STRONG>ID estatus:</STRONG><br>
                  <input class="form-control" placeholder="Info zac" type="text" id="id" name="estatus" value="<?php echo isset($row['estatus']) ? $row['estatus'] : "" ?>"required>
              </div>
              </div>
                <br>

                <div class="row">
                <div class="col-sm-3">
                  <STRONG>Marca:</STRONG><br>
                  <input class="form-control" type="text" name="marca" id="Marca" value="<?php echo isset($row['marca']) ? $row['marca'] : "" ?>"required>
                </div>
                <div class="col-sm-3">
                  <STRONG>Modelo:</STRONG><br>
                  <input class="form-control" type="text" name="modelo" value="<?php echo isset($row['modelo']) ? $row['modelo'] : "" ?>"required>
                </div>
                <div class="col-sm-3">
                  <STRONG>Imagen:</STRONG><br>
                  <img src="./imagenes/inventario/<?php echo isset($row['imagen']) ? $row['imagen'] : "" ?>" class="img-thumbnail"required>
                </div>
                </div>
                  <br>
                
                
              <div class="row">
              <div class="col-md-3">
                <STRONG>Mes:</STRONG>
                <select class="form-control" name="mes">
                  <option></option>
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
               <input class="form-control" type="text" name="ano" id="ano" value="<?php echo isset($row['ano']) ? $row['ano'] : "" ?>"required>
              </div>       
               

            <div class="col-md-6">

              <STRONG>Agregar Imagen:</STRONG>
              <input type="file" id="imagen" name="imagen">
            </div>
            </div>   
              <br>
       <div class="row">
      <div class="col-sm-6">
       <STRONG>Categorias:</STRONG><br>
        <input class="form-control" type="text" name="categorias" id="categoria" value="<?php echo isset($row['categorias']) ? $row['categorias'] : "" ?>"required>
      </div>
       <div class="col-md-4">
     <STRONG>Estado Fisico:</STRONG>
    <select class="form-control" name="estado"required>
    <option></option>
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
       <input type="text" class="form-control uppercase" id="area" name="area" value="<?php echo isset($row['area']) ? $row['area'] : "" ?>"required>
     </div>

  <div class="col-md-4">
   <STRONG>Ubicación:</STRONG><br>
    <input type="text" class="form-control uppercase" id="ubicacion" name="ubicacion" value="<?php echo isset($row['ubicacion']) ? $row['ubicacion'] : "" ?>"required>
  </div>

   <div class="col-md-4">
     <STRONG>Empleado:</STRONG><br>
    <input type="text"class="form-control uppercase" id="empleado" name="empleado" value="<?php echo isset($row['empleado']) ? $row['empleado'] : "" ?>"required>
     </div>
    </div>
    <br>
    
    <button href="Historial_Ingresos/index.php" type="submit" name="agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>

</form>
<script>

// Agregue el siguiente código si desea que aparezca el nombre del archivo en seleccionar
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
    <br>

 
</div>
           


           


</html>
<?php } ?>
           