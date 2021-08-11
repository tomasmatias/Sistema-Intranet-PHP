<?php
  require 'funciones.php';

  // Validación de la sesión como administrador:
  if(! haIniciadoSesion() || ! esAdmin() )
  {
    header('Location: ../index.html');
  }

  // Verificación del parámetro POST:
  if( isset($_POST['txtUsuario']) && isset($_POST['txtClave']) && isset($_POST['txtCargo']))
    {
      $usuario = $_POST['txtUsuario'];
      $clave = $_POST['txtClave'];
      $cargo  = $_POST['txtCargo'];
    }

    /* $usuario = $_POST['txtUsuario']; */

  else header('Location: ../admin/index.php');

  // sentencia conexion 
  conectar();


  editarUsuario($usuario, $clave, $cargo);

  header('Location: ../admin/editarUsuarios.php?usuario='.$usuario);

  desconectar();
?>


