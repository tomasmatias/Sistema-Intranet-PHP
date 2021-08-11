<?php

$conexion;

require '../scripts/funciones.php';

conectar();


// CREACION DE VARIABLES $USUARIO, $CLAVE, $CARGO Y $PERMISO PARA ALMACENAR LOS DATOS

$categoria = $_POST['txtCat'];
$descripcion = $_POST['txtDesc'];
$ruta = $_POST['txtRuta'];


// CONSULTA PARA INSERTAR LOS DATOS RECOGIDOS EN LAS VARIABLES DENTRO DEL FORMULARIO
// CAMPO AUTO INCREMENT SE RELLENA CON LA PALABRA "NULL"

$insertar = mysqli_query($conexion, "INSERT INTO categorias VALUES(NULL, '".$categoria."', '".$descripcion."', '".$ruta."')");

// EJECUCION DE CONSULTA

$resultado = mysqli_query($conexion, $insertar); 

// IF PARA VERIFICAR SI LA CATEGORIA SE REGISTRO O NO, DE LO CONTRARIO INGRESE NUEVAMENTE LOS DATOS

if(!$resultado){
echo'<script>alert("Seccion Registrada Satisfactoriamente")</script>';
echo '<script>location.href ="index.php"</script>'; 

}else
{
echo '<script>alert("Error, Seccion no Registrada") </script>';
}


mysqli_close($conexion);


?>
