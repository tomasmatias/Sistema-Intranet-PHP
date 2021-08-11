<?php
  require '../scripts/funciones.php';
  if(! haIniciadoSesion() || ! esAdmin() )
  {
    header('Location: index.html');
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

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
 
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">


    
  </head>

  <body>

  <?php include './menu-superior.php'; ?> 
    <div class="container-fluid">
      <div class="row">

        <?php include './sidebar.php'; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h1 class="page-header">Panel de Inicio</h1>

          <h4 class="sub-header">Bienvenid@ : <?= $_SESSION['usuario'] ?>.</h4>
          <p>Bienvenido a la version intranet de prueba para la ilustre Municipalidad de Nacimiento</p>
          <!-- <a href="registrar.php"  class="btn btn-primary">Agregar Nuevo Usuario</a> --> 
          <!-- <a href="agregarCategoria.php"  class="btn btn-primary">Agregar Nueva Categoria</a> --> 
          <!-- <a href="subirArchivos.php"  class="btn btn-primary">Subir Archivos</a> --> 
          <hr style="border: 1px solid;">
          <p>Las opciones laterales estan habilitadas, si desea ingrese.</p>

          <br>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>      