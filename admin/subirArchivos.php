<?php
  require_once 'dbconfig.php';
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
  
    <!-- Custom styles for this template  -->
    
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- CSS ME  -->

    <link rel="stylesheet" type="text/css" href="../css/estilos.css"> 

     <?php include './sidebar.php'; ?>
    
  </head>
  <body>
    <?php include './menu-superior.php'; ?>
         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
        <h1 class="page-header">Sección de Subida de Archivos</h1>
       <form name="form1" id="form1" method="post" action="subir.php"  enctype="multipart/form-data">
      <div class="form-group">
      <input style="width: 50%;" type="file" class="form-control" name="file"> 
      <br>
      <button type="submit" class="btn btn-primary" name="btn-upload">Subir</button>
      </div>
      </form>
      <br><br>
      <?php
        if (isset($_GET['success'])) {          
       ?>
     <script type="text/javascript">Archivo subido correctamente</script><!-- <a href="vista.php">Click Aqui para Visualizar</a> -->
      <br>
      <br>
      <?php
          }
          elseif (isset($_GET['fail'])) 
          {
      ?>
      <label>Problema Subiendo el Archivo</label>
      <?php
          }
          else
          {
      ?>
     <!-- <label>Se Puede Subir Cualquier Archivo</label> -->
      <?php
          }
          ?>
    </div>
    <br>
    <br>
    <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main" >
   <table class="table table-striped" border="1"> 

          <h4>Archivos Subidos</h4>
         <!-- <a href="subirArchivos.php">Subir Archivo Nuevo</a></label></th> -->
   <thead>
        <tr>
          <th style="background-color: #fff">ID del Archivo</th>
          <th style="background-color: #fff">Nombre del Archivo</th>
          <th style="background-color: #fff">Tipo de Archivo</th>
          <th style="background-color: #fff">Peso de Archivo</th>
          <th style="background-color: #fff">Vista</th> 
          <th style="background-color: #fff">Acción</th>
        </tr>
    </thead>
           <?php
 $sql="SELECT * FROM tbl_uploads";
 $result_set=mysql_query($sql);
 while($row=mysql_fetch_array($result_set))
 {
  ?>    
  <tr>
        <td style="background-color: #fff"><?php echo $row['id']   ?></td>
        <td style="background-color: #fff"><?php echo $row['file'] ?></td>
        <td style="background-color: #fff"><?php echo $row['type'] ?></td>
        <td style="background-color: #fff"><?php echo $row['size'] ?></td>
        <td style="background-color: #fff"><a href="docs/<?php echo $row['file'] ?>" target="/docs">Descargar</a></td>
        <td style="background-color: #fff"><a href="eliminarArchivo.php?id=<?= $row['id']?>">Eliminar</a></td>
        <!--    <td><a href="eliminarUsuario.php?usuario=<?= $usuario[0] ?>">Eliminar Usuario</a></td>  --> 
        </tr>
        <?php
 }
 ?>
  </table>
  </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>      
