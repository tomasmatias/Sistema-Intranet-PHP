<?php
  require '../scripts/funciones.php';
  if(! haIniciadoSesion() || ! esAdmin() )
  {
    header('Location: ../index.html');
  }

  conectar();
  $categorias = getTodasCategorias();
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

    <!-- CSS ME --> 

    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

  </head>

  <body>
    <?php include 'menu-superior.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include 'sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Edición de Secciones</h1>

          <h4 class="sub-header">Seleccione la categoría que desea editar haciendo click en el enlace correspondiente.</h4>
          <div class="table-responsive">
            <table class="table table-striped" border="1">
              <thead>
                <tr>
                  <!-- "table table-striped" border="3" style="background-color: #8E8E8E;"-->
                  <th style="background-color: #fff">N° de Secciones</th>
                  <th style="background-color: #fff">Nombre de Sección</th>
                  <th style="background-color: #fff">Acción</th>
                  <th style="background-color: #fff">Eliminar</th>
                </tr>
              </thead>
              <tbody>
        <?php foreach( $categorias as $categoria ): ?>
                <tr>
                  <td style="background-color: #fff" ><?= $categoria[0] ?></td>
                  <td style="background-color: #fff" ><?= $categoria[1] ?></td>
                  <td style="background-color: #fff" ><a href="./editarCategoria.php?id=<?= $categoria[0] ?>">Editar Sección </a></td>
                  <td style="background-color: #fff" ><a href="./eliminarCategoria.php?ID_Categoria=<?= $categoria[0] ?>">Eliminar Sección</a></td>
                </tr>
        <?php endforeach ?>
              </tbody>
            </table>
          </div>
          <!--
          <a href="agregarCategoria.php" class="btn btn-primary">Nueva categoría</button>
          -->
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>

