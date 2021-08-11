<?php
$conexion;
include_once 'dbconfig.php';
if(isset($_POST['btn-upload']))
{

$file = rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$folder="docs/";

// Declaracion de variables

// Archivo en kilobytes

$new_size = $file_size/10000;

// Nombre de archivo en minuscula

$new_file_name = strtolower($file);

// Archivo Final

$final_file=str_replace(' ', '-' ,$new_file_name);

if(move_uploaded_file($file_loc,$folder.$final_file)){
	$sql = "INSERT INTO tbl_uploads (file,type,size) VALUES ('$final_file','$file_type','$new_size')";
	mysql_query($sql);
	?>
	<script>
		alert('Archivo Subido Correctamente');
		window.location.href='subirArchivos.php?success';
	</script>
	<?php
}
else
{
?>
<!--
	<script>
		alert('Error Subiendo Archivo, Intente Nuevamente');
			window.location.href='subirArchivos.php?fail';
	</script>
-->
	<?php
	}
}	
?>























