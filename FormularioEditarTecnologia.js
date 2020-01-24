function ValidarDatos()
	{
		if(editartecnologia.respuesta1.value=="--")
		{
			alert("Complete el campo solicitado");
			editartecnologia.respuesta1.focus();
			return false;
		}
		if(editartecnologia.respuesta2.value=="--")
		{
			alert("Complete el segundo campo solicitado");
			editartecnologia.respuesta2.focus();
			return false;
		}
	return true;
	}
