function ValidarDatos()
	{
		//campo obligatorio
		if(editardatoscontacto.telefono1.value=="" || isNaN(editardatoscontacto.telefono1.value))
		{	alert("Ingrese un número de telefono válido.");
			editardatoscontacto.telefono1.focus();
			return false;
		}
		//campo no obligatorio
		if(isNaN(editardatoscontacto.telefono2.value))
		{	alert("Ingrese un número de telefono válido.");
			editardatoscontacto.telefono2.focus();
			return false;
		}
		if(isNaN(editardatoscontacto.telefono3.value))
		{	alert("Ingrese un número de telefono válido.");
			editardatoscontacto.telefono3.focus();
			return false;
		}
		if(isNaN(editardatoscontacto.telefono4.value))
		{	alert("Ingrese un número de telefono válido.");
			editardatoscontacto.telefono4.focus();
			return false;
		}
		var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if ( !expr.test(editardatoscontacto.email.value) && editardatoscontacto.email.value.length>=1)
		{
			alert("La dirección de correo es incorrecta.");
			editardatoscontacto.email.focus();
			return false;
		}
	return true;	
	}
