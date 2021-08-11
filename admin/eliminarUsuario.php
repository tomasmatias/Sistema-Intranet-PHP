<?php
if(empty($_GET['usuario'])==false)
{
		$usuario = $_GET['usuario'];

		$link = mysql_connect('localhost','root','','intranet');
		mysql_select_db("intranet",$link);

		$sql =  "DELETE FROM usuarios WHERE usuario='".$usuario."'";
		$result = mysql_query($sql);
		echo '<script>alert("Registro eliminado")</script>';
		echo '<script>location.href="lista.php"</script>';
}
else
{
		echo '<script>alert("No se pudo eliminar el Registro")</script>';
}

?> 


