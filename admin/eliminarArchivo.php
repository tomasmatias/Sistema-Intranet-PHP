<?php 
  if (empty($_GET['id'])==false) 
  { 
    $id = $_GET['id']; 
    //Conectamos con la base de datos 
    $link=mysql_connect('localhost','root','', 'dbtuts'); 
    mysql_select_db("dbtuts", $link); 

    $sql = "DELETE from  tbl_uploads WHERE id='$id'";  
    $result = mysql_query($sql); 
    echo '<script>alert("Archivo eliminado, correctamente!")</script>'; 
    echo '<script>location.href="subirArchivos.php"</script>';
  } 
  else 
  { 
    echo '<script>alert("No se pudo eliminar el archivo, intente nuevamente.")</script> ';
  } 
?>            