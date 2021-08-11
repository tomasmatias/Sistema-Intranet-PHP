function validar(){
var txtCat, txtDesc, txtRuta;

	txtCat = document.getElementById("txtCat").value;
	txtDesc = document.getElementById("txtDesc").value;
	txtRuta = document.getElementById("txtRuta").value;

	if(txtCat === "" || txtDesc === "" || txtRuta === ""){
		alert("Todos los campos son obligatorios, porfavor complete.");
		return false;
		
	}else if(txtCat.length >45){
		alert("El nombre de la seccion es muy largo, Intente nuevamente.");
		return false;
	}else if(txtDesc.length>255){
		alert("El nombre de descripcion es muy largo, Intente nuevamente.");
		return false;
	}else if(txtRuta.length>40){
		alert("La ruta es muy larga, Intente Nuevamente.");
		return false;
	}
}