function validar(){
var txtUsuario, txtClave, txtCargo, txtAdmin;
	
	txtUsuario = document.getElementById("txtUsuario").value;
	txtClave = document.getElementById("txtClave").value;
	txtCargo = document.getElementById("txtCargo").value;
	

	if (txtUsuario === "" || txtClave === "" || txtCargo === "") {
		alert("Todos los campos son obligatorios, porfavor complete.");
		return false;
		
	}else if(txtUsuario.length >45){
		alert("El nombre de Usuario es muy largo, Intente nuevamente.");
		return false;
	}else if(txtClave.length >45 ){
		alert("La clave de Usuario es muy larga, Intente nuevamente.");
		return false;
	}else if(txtCargo.length>45){
		alert("El cargo es muy largo, Intente Nuevamente");
		return false;
	}



}