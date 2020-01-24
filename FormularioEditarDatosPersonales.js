function ValidarDatos()
	{
		//obligatorio
		if(editardatospersonales.situaciondelpadre.value=="--")
		{
			alert("Complete el campo Situacion del Padre");
			editardatospersonales.situaciondelpadre.focus();
			return false;
		}
			if(editardatospersonales.situaciondelamadre.value=="--")
		{
			alert("Complete el campo Situacion de la Madre");
			editardatospersonales.situaciondelamadre.focus();
			return false;
		}
		
		//no obligatorio
		/*if(editardatospersonales.estadocivil.value=="--")
		{
			
			editardatospersonales.edtadocivil.value="Soltero";
			return false:
		}
		if(editardatospersonales.cantidadhijos.value=="")
		{
			editardatospersonales.cantidadhijos.value=0;
			return false;
		}
		*/
		if(editardatospersonales.cantidadhijos.value<0 || isNaN(editardatospersonales.cantidadhijos.value))
		{
			alert("El campo Cantidad de Hijos posee valor inválido");
			editardatospersonales.cantidadhijos.focus();
			return false;
		}
		
		
		return true;
	}
