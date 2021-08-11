<?php

// UTILIZACION DE FOREACH PARA EXTRAER TODOS LOS VALORES

// PARA CAMBIAR EL TAMAÑO DE LOS ARCHIVOS DE SUBIDA, ENTRAR AL ICONO WAMP/PHP/PHP.INI Y BUSCAR UPLOAD_MAX_FILE_SIZE
// LIMITE DE SUBIDA DE ARCHIVOS 20MB.

foreach ($_FILES["archivo"]["tmp_name"] as $key => $tmp_name) 
{
	//VALIDACION PARA VER SI EL ARCHIVO EXISTE	
	if($_FILES["archivo"]["name"][$key])
	{
		$filename = $_FILES["archivo"]["name"][$key]; // CREACION DE VARIABLE PARA OBTENER EL  NOMBRE ORIGINAL DEL ARCHIVO
		$source = $_FILES["archivo"]["tmp_name"][$key]; // CREACION DE VARIABLE PARA OBTENER UN NOMBRE TEMPORAL DEL ARCHIVO

		$directorio = 'docs'; // CREACION DE VARIABLES PARA LA RUTA EN LA QUE SE DESEAN GUARDAR LOS ARCHIVOS

		// VALIDAMOS SI LA RUTA DE DESTINO EXISTE, EN CASO DE QUE NO EXISTA LA CREAMOS

		/*if (file_exists($directorio)) 
		{
			mkdir($directorio, 0777) or die("No se puede crear el directorio");
		}

		*/

		$dir=opendir($directorio); // CREACION DE VARIABLE PARA ABRIR EL DIRECTORIO
		$target_path= $directorio.'/'.$filename; // RUTA DE DESTINO , ASI COMO EL NOMBRE DEL ARCHIVO

		// MOVEMOS Y VALIDAMOS EL ARCHIVO QUE SE HAYA CARGADO CORRECTAMENTE
		// EL PRIMER CAMPO ES EL ORIGEN Y EL SEGUNDO EL DESTINO 

		if(move_uploaded_file($source,$target_path))
		{
			echo '<script>alert("El Archivo se ha subido de forma exitosa")</script>';
			echo '<script>location.href ="subirArchivos.php"</script>';
		}else{
			echo '<script>alert("Error, archivo no subido correctamente")</script>';
		}

		closedir($dir);
		
		}

	}


	

?>