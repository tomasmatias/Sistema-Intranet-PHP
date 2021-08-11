<?php


$conexion;

require '../scripts/funciones.php';

conectar();

// CREACION DE VARIABLES $USUARIO, $CLAVE, $CARGO Y $PERMISO PARA ALMACENAR LOS DATOS

$usuario = $_POST['txtUsuario'];
$clave = $_POST['txtClave'];
$cargo = $_POST['txtCargo'];
$permiso = $_POST['txtAdmin'];

// CONSULTA PARA INSERTAR LOS DATOS RECOGIDOS EN LAS VARIABLES DENTRO DEL FORMULARIO

//$insertar = mysqli_query($conexion, "INSERT INTO usuarios VALUES('".$usuario."', '".$clave."', '".$cargo."', '".$permiso."')");

$insertar = mysqli_query($conexion, "INSERT INTO usuarios VALUES ('".$usuario."','".$clave."','".$cargo."','".$permiso."')");

// EJECUCION DE CONSULTA
 	
$resultado = mysqli_query($conexion, $insertar); 

// IF PARA VERIFICAR SI EL USUARIO SE REGISTRO O NO, DE LO CONTRARIO INGRESE NUEVAMENTE LOS DATOS

if(!$resultado){
echo'<script>alert("Usuario registrado satisfactoriamente!")</script>';
echo'<script>alert("Ahora elija los permisos para el usuario.")</script>';
echo '<script>location.href ="permisos.php"</script>';
}else
{
echo '<script>alert("Error, Usuario no Registrado.")</script>';
}

mysqli_close($conexion);

?>
