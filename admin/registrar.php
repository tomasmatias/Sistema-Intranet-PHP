<?php
    $user="root";
    $password="";
    $bd="intranet";
    $sv="localhost";
    
    $obj_conexion = 
    mysqli_connect($sv,$user,$password,$sv);
    if(!$obj_conexion)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        echo "";
    }
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

    <!-- Validaciones en JavaScript -->

    <script src="validar-usuario.js" type="text/javascript"></script>

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
          
       	<h1 class="page-header">Agregar Nuevo Usuario:</h1>

  		<form action="registro.php" method="post" onsubmit="return validar();">
   
		<div class="form-group">
			<label for="email">Usuario:</label>
<input style="width: 20%;" type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Ingrese Usuario" required="required"  >
	 	 </div>

		<div class="form-group">
	  	 	<label for="pwd">Clave:</label>
<input style="width: 20%;" type="password" class="form-control" id="txtClave" name="txtClave" placeholder="Ingrese Clave"required="required"   >
	    </div>

  <div class="form-group">
      <label for="pwd">Cargo:</label>
     <input style="width: 20%;" type="text" class="form-control" id="txtCargo" name="txtCargo" placeholder="Ingrese Cargo" required="required"  > 
      </div> 


        <div class="form-group">
    <label for="pwd">N° de Permiso (1 para admin y 0 para usuario):</label>
    <br>
   <input style="width: 20%;" type="number" class="form-control" id="txtAdmin" name="txtAdmin" placeholder="Ingrese N° de Permiso"required="required"> 
   </div>
   
<hr>

<button type="submit" id="btnguardar" name="btnguardar" class="btn btn-primary">Guardar</button>

<input type="reset" name="btn-reset" value="Limpiar Campos" class="btn btn-primary">

		</form>

       </div>

       <?php
       if(isset($_POST['btnguardar'])){
	 	require("registro.php");

		}
       ?>

    </div>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>      

