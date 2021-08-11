<?php


/* Variable Conexion global */

$conexion = null;

function conectar() /* Conexion a base de datos */
{
global $conexion; /* hace referencia a todas las variables globales */ 
$conexion = mysqli_connect('localhost','root','','intranet');  /* sentencia mysqli_connect para hacer conexion con la BD */
mysqli_set_charset ($conexion, 'utf8'); /* sentencia mysqli_set_charset establece el conjunto de caracteres predeterminados del cliente */

}






function conectarTabla()
{
global $conexion;

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbtuts";

mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');
}


function tienePermiso($usuario, $idCat)
{
global $conexion;
$result = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM permisos WHERE usuario='".$usuario."' AND ID_Categoria=".$idCat); /*sentencia que sirve para hacer una consulta a la base de datos */
$row = mysqli_fetch_assoc($result);
$numero = $row['total'];
return $numero > 0;
}

/* Editar categoria por ID */

function editarCategoria($id, $nombre, $descripcion, $ruta)
{
global $conexion;
$conexion = mysqli_query($conexion, "UPDATE categorias SET categoria='".$nombre."', descripcion='".$descripcion."', ruta='".$ruta."' WHERE ID_Categoria = ".$id);
}

function llenarCombo()
{
global $conexion;
mysql_connect('localhost','root','','intranet');
$conexion = mysqli_fetch_array($conexion, "SELECT * FROM cargo order by cod_cargo asc");
}



/* Editar Usuario  */ 

function editarUsuario($usuario, $clave, $cargo)
{
global $conexion;
$conexion = mysqli_query($conexion, "UPDATE usuarios SET usuario='".$usuario."', clave='".$clave."' , cargo='".$cargo."' where usuario='".$usuario."' ");
}


function getTodasCategorias()  /*Funcion para obtener las categorias */ 
{
global $conexion;
$respuesta = mysqli_query($conexion, "select * from categorias");
return $respuesta->fetch_all(); /* sentencia fetch_all devuelve un grupo de arrays */
}


// int or numeric = .$id

// varchar = '$usuario'

function getCategoriaPorId($id)
{
global $conexion;
$respuesta = mysqli_query($conexion, "SELECT * FROM categorias WHERE ID_Categoria =  ".$id);		
return mysqli_fetch_row($respuesta);
}


/* Obtener usuario por ID */

function getUsuarioPorId($usuario)
{
global $conexion;
$respuesta = mysqli_query($conexion, "SELECT * FROM usuarios where usuario=  '$usuario'" );
return mysqli_fetch_row($respuesta);
}

/* Filtrar Categorias por Usuario */

function getCategoriasPorUser()
{
	global $conexion;
	$respuesta = mysqli_query($conexion, "SELECT C.categoria, C.descripcion, C.ruta FROM permisos P INNER JOIN categorias C ON P.ID_Categoria = C.ID_Categoria WHERE usuario =  '".$_SESSION['usuario']."'");
	return $respuesta->fetch_all();

}

/* Obtener Usuario */

function getUsuario()
{
global $conexion;
$respuesta = mysqli_query($conexion, "SELECT * from usuarios WHERE admin<>1");
return $respuesta->fetch_all();
}


/*Validación de Login al hacer conexion*/

function validarLogin($usuario, $clave)  

{
	global $conexion;
	$consulta = "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."'";
	$respuesta = mysqli_query ($conexion, $consulta);

	if($fila = mysqli_fetch_row($respuesta) )
	{
		session_start();
		$_SESSION['usuario'] = $usuario;
		$_SESSION['admin'] = $fila[3];
		return true;
	}
		return false; 
}


/* FUNCION PARA ELIMINAR PERMISOS EN EL USUARIO */

function eliminarPermisos($usuario)
{
	global $conexion;
	mysqli_query($conexion, "DELETE FROM permisos WHERE usuario='".$usuario."'");
}


/* FUNCION ELIMINAR USUARIOS */

function eliminarUsuario($usuario)
{
	global $conexion;
	mysqli_query($conexion, "DELETE FROM usuarios WHERE usuario='".$usuario."'");
}


/* FUNCION REGISTRAR USUARIO */ 

function registrarUsuario($usuario, $clave, $cargo, $admin)
{
	global $conexion;
	mysqli_query($conexion, "INSERT INTO usuarios VALUES('".$usuario."', '".$clave."', '".$cargo."', '".$admin."')");
}

/*
$this->conectar();
$sql = "INSERT INTO usuarios VALUES ('$usuario','$clave','$cargo','$admin')";
$sentencia = $this->m->query($sql);
if($this->m->affected_arrows > 0 ){
	echo "Se registro satisfactoriamente";
}else{
	echo "No se pudo registrar satisfactoriamente, intente nuevamente ";
} 
*/

/* FUNCION PARA ASIGNAR PERMISOS, EN VALORES USUARIOS Y ID CAT*/

function asignarPermisos($usuario, $idCat)
	{
		global $conexion;
		mysqli_query($conexion, "INSERT INTO permisos VALUES('".$usuario."', ".$idCat.")");	 	
	}


/*FUNCION PARA VERIFICAR LA CONEXION DEL ADMINISTRADOR AL SISTEMA  */

function esAdmin()
{
return $_SESSION['admin'];
}

/* FUNCION PARA INICIO DE SESIÓN */

function haIniciadoSesion()  
{
session_start();
return isset($_SESSION['usuario']);
}

/* FUNCION PARA DESCONECTAR SESIÓN */

function desconectar() 
{
global $conexion;
mysqli_close($conexion);
}







?>

