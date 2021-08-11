<?php
require 'scripts/funciones.php';
if(! haIniciadoSesion() )
{
header('Location: index.html');
}

conectar();
$categorias = getCategoriasPorUser();
desconectar();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Panel de Usuario</title>

    <!-- Bootstrap css servidor cdn  -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- Hoja de estilos css  -->
    
    <link rel="stylesheet" href="css/jumbotron-narrow.css">

    <!-- Calendario Jquery -->

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="jumbotron-narrow.css" rel="stylesheet">
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="">Inicio</a></li>
            <li role="presentation"><a href="scripts/cerrar-sesion.php">Cerrar Sesion</a></li>
            
          </ul>
        </nav>
        <h3 class="text-muted">Intranet</h3>
      </div>

      <div class="jumbotron">

        <!-- IMPRESION NOMBRE DE USUARIO -->
        
        <h1>Bienvenido, <?= $_SESSION['usuario'] ?>.</h1>
        <!-- <p class="lead">Version de prueba Intranet</p> -->
        <!-- <li role="presentation"><a href="admin/vista.php">Descargas</li></a> -->
             </div> 
      <div class="row marketing">

         <!-- CATEGORIAS DINAMICAS FOREACH -->

  <?php foreach( $categorias as $fila ): ?>
      <div class="col-lg-6">
          <h4><a href="categorias/<?= $fila[2] ?>"><?= $fila[0] ?></a></h4>
          <p><?= $fila[1] ?></p>    
        </div>
  <?php endforeach ?>

      </div>
      <hr>
      <footer class="footer">
        <p>@Ilustre Municipalidad de Nacimiento</p>
      </footer>
    </div> 

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
                  