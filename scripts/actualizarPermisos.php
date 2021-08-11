<?php
  require 'funciones.php';
  // Validación de la sesión como administrador:
  if(! haIniciadoSesion() || ! esAdmin() )
  {
    header('Location: index.html');
  }
  // Verificación del parámetro POST:
  if( isset($_POST['txtUsuario']) )
    $usuario = $_POST['txtUsuario'];
  else header('Location: index.php');

  //Actualización de Permisos
  conectar();

  eliminarPermisos($usuario);
  $categorias = getTodasCategorias();


  // Reasignacion de permisos 
    foreach ($categorias as $categoria):
      if(  isset( $_POST['categoria'.$categoria[0]] ) )
        asignarPermisos($usuario, $categoria[0]);
    endforeach;


    header('Location: ../admin/editarPermisos.php?usuario='.$usuario);

    desconectar();



?>




