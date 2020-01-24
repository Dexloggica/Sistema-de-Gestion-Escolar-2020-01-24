function ValidarDatos()
	{
		
		if(editarfechanacimiento.dia.value=="--")
		{
				alert("Falta ingresar dia");
				editarfechanacimiento.dia.focus();
				return false;
		}
		
		if(editarfechanacimiento.mes.value=="--")
		{
				alert("Falta ingresar mes");
				editarfechanacimiento.mes.focus();
				return false;
		}
		
		if(editarfechanacimiento.anio.value=="--")
		{
				alert("Falta ingresar año");
				editarfechanacimiento.anio.focus();
				return false;
		}
		
		if(editarfechanacimiento.dia.value>30 && (editarfechanacimiento.mes.value==="4" || editarfechanacimiento.mes.value==="6" || editarfechanacimiento.mes.value==="9" || editarfechanacimiento.mes.value==="11"))
		{
			alert("Ese dia no existe en ese mes");
			return false;
		}
		
		//controlar si es bisiesto
		if((editarfechanacimiento.anio.value % 4 == 0) && ((editarfechanacimiento.anio.value % 100 != 0) || (editarfechanacimiento.anio.value % 400 == 0)))
		{
			if(editarfechanacimiento.mes.value==2 && editarfechanacimiento.dia.value>=30)
			{	
				alert("ese dia no existe");
				editarfechanacimiento.dia.focus();				
				return false;
			}
		}else if(editarfechanacimiento.mes.value==2 && editarfechanacimiento.dia.value>=29)
		{	
			alert("ese dia no existe en febrero");
			editarfechanacimiento.dia.focus();
			return false;
		}
		
	//controlar que esa fecha haya ocurrido
		
		var fechahoy = new Date();
		var anioingresado=editarfechanacimiento.anio.value;
		var mesingresado=editarfechanacimiento.mes.value-1;
		var diaingresado=editarfechanacimiento.dia.value;
		var fechaingresada = new Date();
		fechaingresada.setFullYear(anioingresado, mesingresado, diaingresado);

		if (fechaingresada >= fechahoy || anioingresado===fechahoy.getFullYear())
		{	
			alert("Fecha inválida");
			return false;
		}
		
		
	return true;
	}
