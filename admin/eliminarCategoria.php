<?php 
if(empty($_GET['ID_Categoria'])==false)
{
    $ID_Categoria = $_GET['ID_Categoria'];
    
    $link = mysql_connect('localhost','root','','intranet');
    
    mysql_select_db("intranet",$link);
    
    $sql = "DELETE FROM categorias where ID_Categoria='$ID_Categoria'";
    
    $result = mysql_query($sql);
    
    echo '<script>alert("Seccion Eliminada")</script>';
    echo '<script>location.href="categorias.php"</script>';    
}
else
{
    echo '<script>alert("No se pudo eliminar la Seccion")</script>';
}   

?>