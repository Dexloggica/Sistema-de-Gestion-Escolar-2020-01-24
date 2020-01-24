	function ValidarDatos()
	{
		if(editardomicilio.tipovivienda.value=="--")
		{
			alert("Elija un tipo de Vivienda.");
			editardomicilio.tipovivienda.focus();
			return false;
		}
		if(editardomicilio.tipovivienda.value=="Casa" && editardomicilio.calle.value=="")
		{
			alert("Ingrese calle.");
			editardomicilio.calle.focus();
			return false;
		}
		if(editardomicilio.tipovivienda.value=="Casa" && editardomicilio.numero.value=="")
		{
			alert("Ingrese número.");
			editardomicilio.numero.focus();
			return false;
		}
		/*if(editardomicilio.tipovivienda.value=="Casa" && editardomicilio.barrio.value=="")
		{
			alert("Ingrese Barrio.");
			editardomicilio.barrio.focus();
			return false;
		}
		*/ 
		return true;
	}
