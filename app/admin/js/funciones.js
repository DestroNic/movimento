
//Valida correo
function valida_correo(correo) {
		  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
			
		   return (true)
		  } else {
		   
		   return (false);
		  }
		 }
//*************************************************************************************************************************************
//valida números
function valida_numero(numero)
{
if (!/^([0-9])*$/.test(numero)){
		return false;
}else{
		return true;
	}
}
//*******************************************************************************************************
//función para validar cadenas de solo letras
function valida_cadena(texto)
	{
		var RegExPattern = "[1-9]";
		 if (texto.match(RegExPattern))
		 {
		 	return false;
		 }else
		 {
		 	return true;
		 }
	}
//************************************************************
function limpiar()
{
	document.form.reset();
	document.form.nombre.focus();
}

function validar()
{
	var form =document.form;
	if(form.nombre.value==0)
	{
		alert("ingrese el nombre");
		form.nombre.value="";
		form.nombre.focus();
		return false;
	}
	
	if (form.telefono.value==0)
	{
		alert("ingrese el telefono");
		form.telefono.value="";
		form.telefono.focus();
		return false;
	}
	if (form.correo.value==0)
	{
		alert("ingrese el E-Mail");
		form.correo.value="";
		form.correo.focus();
		return false;
	}
	if (valida_correo(form.correo.value)==false)
	{
		alert("ingrese un E-Mail correcto");
		form.correo.value="";
		form.correo.focus();
		return false;
	}
	document.form.submit();
}
