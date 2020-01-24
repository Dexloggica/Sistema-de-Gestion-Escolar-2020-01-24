function ValidarDatos()
	{
		
		if(editarmisdatospersonales.nombre.value.length>0 && !isNaN(editarmisdatospersonales.nombre.value))
		{	alert("Ingrese el nombre.");
			editarmisdatospersonales.nombre.focus();
			return false;
		}
		if(!isNaN(editarmisdatospersonales.apellido.value) && editarmisdatospersonales.nombre.value.length>0)
		{	alert("Ingrese el apellido.");
			editarmisdatospersonales.apellido.focus();
			return false;
		}
		
		if(editarmisdatospersonales.sexo.value=="--" && editarmisdatospersonales.nombre.value.length>0 && editarmisdatospersonales.apellido.value.length>0)
		{	alert("Seleccione el sexo.");
			editarmisdatospersonales.sexo.focus();
			return false;
		}
		
		if(editarmisdatospersonales.dni.value.length!=8 && isNaN(editarmisdatospersonales.dni.value) || isNaN(editarmisdatospersonales.dni.value) || (editarmisdatospersonales.sexo.value=="Masculino" || editarmisdatospersonales.sexo.value=="Femenino") && editarmisdatospersonales.dni.value.length!=8)
		{	alert("Ingrese el dni.");
			editarmisdatospersonales.dni.focus();
			return false;
		}
		if(editarmisdatospersonales.cuil.value.length!=11 && isNaN(editarmisdatospersonales.cuil.value) || isNaN(editarmisdatospersonales.cuil.value) || editarmisdatospersonales.cuil.value.length!=11 && editarmisdatospersonales.dni.value.length==8)
		{
			alert("Ingrese el cuil");
			editarmisdatospersonales.cuil.focus();
			return false;
		}
		
		return true;
	}
