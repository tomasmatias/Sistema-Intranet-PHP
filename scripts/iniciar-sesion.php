<?php
	require 'funciones.php';
	$usuario = $_POST['txtUsuario'];
	$clave = $_POST['txtClave'];
	conectar();
	if( validarLogin($usuario, $clave) ){
   // validación para entrar al sistema 		
			if( esAdmin())
			header('Location: ../admin/index.php');
		else header('Location: ../panelUsuario.php');
			}else{
	// de lo contrario si los datos no son correctos volveremos al formulario de inicio
?>

<!-- Alerta de Javascript si los datos son incorrectos -->
<script>
alert('Los datos ingresados son incorrectos, intente nuevamente.');	
location.href ="../index.html";
</script>
<?php
	desconectar();
}
?>
