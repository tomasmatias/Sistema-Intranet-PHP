<?php
include_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html>
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
	 <?php include './menu-lateral.php'; ?>
<div class="header">
	<label>Vista Archivos</label>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
	<table class="table table-striped" width="80%" border="1">
				<tr>
					<th colspan="4">Subidas:<label><a href="subirArchivos.php">Subir Archivo Nuevo</a></label></th>
				</tr>
				<tr>
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
  ?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="docs/<?php echo $row['file'] ?>" target="/docs">Ver Archivo</a></td>
     
        </tr>
        <?php
 }
 ?>
	</table>
	</div>
</body>
</html>

