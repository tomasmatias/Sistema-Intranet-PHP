<?php
$dbhost ="localhost";
$dbuser ="root";
$dbpass ="";
$dbname ="dbtuts";

$obj_conexion = mysqli_connect($dbhost,$dbuser,$dbpass);
if(!$obj_conexion)
{
    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
}
else
{
    echo "";
}

?>
