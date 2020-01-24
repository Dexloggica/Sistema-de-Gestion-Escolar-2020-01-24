function ValidarDatos()
	{
		var descripciont=document.getElementById("DescripcionDeportes");
			alert("tengo"+descripciont);
			if(editardeportes.respuesta.value==="--")
			{
					alert("La respuesta no es correcta.");
					editardeportes.respuesta.focus();
					return false;	
			}
			if((!editardeportes.descripcion.value>0) && editardeportes.respuesta.value===1)
				{
					alert("La descripción no puede estar vacia.");
					editardeportes.descripcion.focus();
					return false;
				}
			if(descripciont.value.length>0)	
				{
					var cantDescripciont= descripciont.value.length; //cantidad original
				
					var filtroString = descripciont.value.split(1);
						filtroString = filtroString[0].split(2);
						filtroString = filtroString[0].split(3);
						filtroString = filtroString[0].split(4);
						filtroString = filtroString[0].split(5);
						filtroString = filtroString[0].split(6);
						filtroString = filtroString[0].split(7);
						filtroString = filtroString[0].split(8);
						filtroString = filtroString[0].split(9);
						filtroString = filtroString[0].split(0);
					existeNumero=filtroString[0].length!==cantDescripciont;
					
					if(existeNumero){
					alert("La descripcion no puede ser numérica");
					editardeportes.descripcion.focus();
					return !existeNumero;
					}
				}
		
	return true;
	}
