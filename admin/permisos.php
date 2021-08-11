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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Panel de Administración</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> 

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- CSS ME -->
    
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

  </head>

  <body>

    <?php include './menu-superior.php'; ?>

     <div class="container-fluid"">

      <div class="row"> 
        <?php  include './sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
          <h1 class="page-header">Edición de Permisos</h1>
          <h4 class="sub-header">Seleccione el usuario al que quiera modificar los permisos.</h4>
          <div class="table-responsive">
            <table class="table table-striped" border="1">
              <thead>
                <tr> 
                  <th style="background-color: #fff" >N° de Anexo</th> 
                  <th style="background-color: #fff" >Nombre de Usuario</th>
                  <th style="background-color: #fff" >Cargo</th>
                  <th style="background-color: #fff" >Acción</th>
                </tr> 
              </thead>
          <tbody>
            <?php 
                $i = 1;
                foreach( $usuarios as $usuario ): ?>
                <tr>
                  <td style="background-color: #fff" ><?= $i++;   ?></td>
                  <td style="background-color: #fff" ><?= $usuario[0]?></td>
                  <td style="background-color: #fff" ><?= $usuario[2]?></td>
                  <td style="background-color: #fff" ><a href="./editarPermisos.php?usuario=<?= $usuario[0] ?>">Editar Permisos</a></td>
                </tr>
           <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>