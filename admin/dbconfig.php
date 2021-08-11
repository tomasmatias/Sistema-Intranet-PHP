<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbtuts";

mysql_connect($dbhost,$dbuser,$dbpass) or die('Imposible conectarse al servidor.'); 
mysql_select_db($dbname) or die('Problema de seleccion de base de datos.');

?>