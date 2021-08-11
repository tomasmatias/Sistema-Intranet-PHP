<?php
  require '../scripts/funciones.php';
  // Validación de la sesión como administrador:
  if(! haIniciadoSesion() || ! esAdmin() )
  {
    header('Location: index.html');
  }
  // Verificación del parámetro GET:
  if( isset($_GET['usuario']) )
    $id = $_GET['usuario'];
  else header('Location: ../panelAdmin.php');
  // Captura de las categorías:
  conectar();
  $usuario = getUsuarioPorId($id);
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

    <!-- CSS -->

  

  </head>

  <body>
    <?php include 'menu-superior.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include 'sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Panel de Administración</h1>

          <h4 class="sub-header">Modificando Datos Personales del Usuario</h4> 
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
            
            <div class="panel panel-default" style="width: 70%;">
              <div class="panel-heading"><h3 class="panel-title">Edición Datos Usuario</h3></div>
              <div class="panel-body">
                <form action="../scripts/editar-usuario.php" method="POST">
                  <div class="form-group">
                    <label for="txtId">Usuario</label>
                    <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" value="<?= $usuario[0] ?>" readonly >
                  </div>                
                  <div class="form-group">
                    <label for="txtNombre">Clave</label>
                    <input type="text" class="form-control" id="txtClave" name="txtClave"  value="<?= $usuario[1] ?>">
                  </div>
                  <div class="form-group">
                    <label for="txtDescripcion">Cargo</label>
                    <input type="text" class="form-control" id="txtCargo" name="txtCargo" value="<?= $usuario[2] ?>">
                  </div>
                  <div class="form-group">
                    <!--
                    <label for="txtRuta">Admin</label>
                    <input type="text" class="form-control" id="txtAdmin" name="txtAdmin" value="<?= $usuario[3] ?>" readonly>
                  </div>                  
                -->
                  <button type="submit" class="btn btn-default">Guardar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>
