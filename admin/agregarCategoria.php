<?php 
require '../scripts/funciones.php';
if(! haIniciadoSesion ()  || ! esAdmin () )
{
header ('location: index.html');
}

conectar();
$usuarios = getUsuario();
desconectar();
?>

<!DOCTYPE html>

<html lang="es">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel de Administración</title>
  
    <!-- Validaciones JavaScript  --> 

    <script src="validar-seccion.js" type="text/javascript"></script>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Custom styles for this template -->

    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- CSS ME -->

    <link rel="stylesheet" type="text/css" href="../css/estilos.css"> 

  </head>

  <body>
    <?php include './menu-superior.php'; ?>

    <div class="container-fluid">

      <div class="row">

        <?php include './sidebar.php'; ?>

        <!-- <?php include './menu-lateral.php'; ?> -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >

        <h1 class="page-header">Agregar Nueva Sección:</h1>

      <form action="registrarCategoria.php" method="post" onsubmit="return validar();">
    <div class="form-group">
      <label for="email">Sección:</label>
        <input style="width: 20%;" type="text" class="form-control" id="txtCat" name="txtCat" placeholder="Ingrese Sección" required="required" >
     </div>
    <div class="form-group">
        <label for="pwd">Descripción:</label>
          <input style="width: 20%;" type="text" class="form-control" id="txtDesc" name="txtDesc" placeholder="Ingrese Descripción" required="required" >
      </div>
      <div class="form-group">
        <label for="pwd">Ruta:</label>
          <input style="width: 20%;" type="text" class="form-control" id="txtRuta" name="txtRuta" placeholder="Ingrese Ruta" required="required" >

      </div>

      <!--
      <div class="form-group">
        <label for="pwd">N° de Permiso (0 para admin y 1 para usuario):</label>
          <input style="width: 20%;" type="number" class="form-control" id="pwd" name="txtAdmin" placeholder="Ingrese N° de Permisos">
      </div>
    -->
      <hr>
       <button type="submit" id="btnguardar" name="btnguardar" class="btn btn-primary">Guardar</button>
       <input type="reset" name="btn-reset" value="Limpiar Campos" class="btn btn-primary" >
    </form>
       </div>
       <?php
       if(isset($_POST['btnguardar'])){
      require("registrarCategoria.php");

    }
       ?>
     <!--
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h1 class="page-header">Panel Inicio</h1>

          <h4 class="sub-header">Bienvenido, administrador.</h4>
          <p>Si desea agregar un usuario haga click en el siguiente boton</p>
          <a href="agregarUsuario.php"  class="btn btn-primary">Agregar Nuevo Usuario</a>
          <hr>
          <p>Las opciones laterales estan habilitadas.</p>
          <br>
        </div>
      </div>
   -->
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>      