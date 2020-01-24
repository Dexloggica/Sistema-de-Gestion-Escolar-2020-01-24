function ValidarDatos()
	{
		
		if(editarestudios.nivel.value!="no tiene estudios" && editarestudios.nivel.value=="--")
		{
			alert("Seleccione un nivel");
			editarestudios.nivel.focus();
			return false;
		}
		
		if(editarestudios.institucion.value=="" && editarestudios.nivel.value!="no tiene estudios")
		{
			alert("Ingrese un establecimiento");
			editarestudios.institucion.focus();
			return false;
		}
		
		if(editarestudios.titulo.value=="" && editarestudios.nivel.value!="no tiene estudios")
		{
			alert("Ingrese el Título.");
			editarestudios.titulo.focus();
			return false;
		}
	
		if((editarestudios.mes.value==4 || editarestudios.mes.value==6 || editarestudios.mes.value==9 || editarestudios.mes.value==11) && editarestudios.dia.value>30)
		{
			alert("Ese dia no existe");
			editarestudios.dia.focus();
			return false;
		}
		
		//controlar si es bisiesto
		if((editarestudios.anio.value % 4 == 0) && ((editarestudios.anio.value % 100 != 0) || (editarestudios.anio.value % 400 == 0)))
		{
			if(editarestudios.mes.value==2 && editarestudios.dia.value>=30)
			{	
				alert("ese dia no existe, es bisiesto");
				editarestudios.dia.focus();				
				return false;
			}
		}else if(editarestudios.mes.value==2 && editarestudios.dia.value>=29)
		{	
			alert("ese dia no existe en febrero");
			editarestudios.dia.focus();
			return false;
		}
	//controlar que esa fecha haya ocurrido
		
		var fechahoy = new Date();
		var anioingresado=editarestudios.anio.value;
		var mesingresado=editarestudios.mes.value-1;
		var diaingresado=editarestudios.dia.value;
		var fechaingresada = new Date();
		fechaingresada.setFullYear(anioingresado, mesingresado, diaingresado);

		if (fechaingresada > fechahoy)
		{	
			alert("Fecha inválida");
			return false;
		}
		
		return true;
	}
