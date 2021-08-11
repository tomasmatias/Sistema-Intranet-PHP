<?php 
include_once '../admin/dbconfig.php';
require '../scripts/funciones.php';
if(! haIniciadoSesion() )
{
header('Location: index.html');
}

conectar();
$categorias = getCategoriasPorUser();
desconectar();
?>
  <!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sección Multimedia</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <link href="../css/dashboard.css" rel="stylesheet">


    <style>
    body { padding-top: 50px; }
    .starter-template { padding: 40px 15px; text-align: center; }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
           <nav>
          <ul class="nav nav-pills pull-right">
            <!--
            <li role="presentation" class="active"><a href="">Inicio</a></li> -->
            <li role="presentation"><a href="../scripts/cerrar-sesion.php">Cerrar Sesion</a></li>
          </ul>
        </nav>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Ilustre Municipalidad de Nacimiento</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../panelUsuario.php">Inicio</a></li>
            <!--
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        -->
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

  <div class="starter-template">
  <table class="table table-striped" border="3">
          <h4>Archivos Subidos</h4>
        <!-- <a href="subirArchivos.php">Subir Archivo Nuevo</a></label></th> -->
        <tr>
          <td>Id del Archivo</td>
          <td>Nombre del Archivo</td>
          <td>Tipo de Archivo</td>
          <td>Peso de Archivo</td>
          <td>Vista</td>
        </tr>
           <?php
 $sql="SELECT * FROM tbl_uploads";
 $result_set=mysql_query($sql);
 while($row=mysql_fetch_array($result_set))
 {
  ?>    <tr>
        <td><?php echo $row['id']   ?></td>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
     	<td><a href="../admin/docs/<?php echo $row['file'] ?>" target="/docs">Descargar</a></td>
        </tr>
        
        <?php
 }
 ?>
  </table>	   





      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>


