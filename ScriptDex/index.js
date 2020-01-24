function ValidarDatos()
	{
		var numerodeperfiles=document.getElementById("nperfil").value;
		
			if((!/^([0-9])*$/.test(numerodeperfiles)))
			{
				alert("Debe ingresar un número");
				generarnumeroperfiles.numerodeperfiles.focus();
				return false;
			}
			if(!generarnumeroperfiles.numerodeperfiles.value.length>0)
			{	alert("El campo esta vacio");
				generarnumeroperfiles.numerodeperfiles.focus();
				return false;
			}
								
		return true;
	}
function ValidarPerfiles(n)
	{
		//tengo n perfiles
		//los n perfiles deben ser string not null
		var perfilclase = document.getElementsByClassName("perfildesc");
		
		for (contadorj =1; contadorj <= n; contadorj++) 
			{
			
				var descripcion=document.getElementsByClassName("perfildesc");
				
				if(!(perfilclase[contadorj-1].value.length>0))
					{
						alert("El perfil "+contadorj+" esta vacio.");
						
						return false;
					}
				
				if(!isNaN(descripcion[contadorj-1].value))
					{
						alert("Ingrese un nombre en el perfil "+contadorj);
						return false;
					}
				
				
			}
			var usuario=document.getElementById("usuariodesc");
			if(!usuario.value.length>0)
				{
					alert("El Campo Usuario del administrador se encuentra vacio.");
					return false;
				}
				
			var psw=document.getElementById("pswdesc");
			if(!psw.value.length>0)
				{
					alert("El Campo Password se encuentra vacio.");
					return false;
				}
			var ciudad=document.getElementById("ciudaddesc");
			if(!ciudad.value.length>0)
				{
					alert("El campo ciudad no puede estar vacio.");
					return false;
				}
			if(ciudad.value.length>0 && !isNaN(ciudad.value))
				{
					alert("La ciudad no puede ser numérica");
					return false;
				}

			var provincia=document.getElementById("provinciadesc");
			if(!provincia.value.length>0)
				{
					alert("El campo provincia no puede estar vacio.");
					return false;
				}
	        if(provincia.value.length>0 && !isNaN(provincia.value))
				{
					alert("La provincia no puede ser numérica.");
					return false;
				}

			var pais=document.getElementById("paisdesc");
			if(!pais.value.length>0)
				{
					alert("El campo pais no puede estar vacio.");
					return false;
				}
			if(pais.value.length>0 && !isNaN(pais.value))
				{
					alert("El pais no puede ser numérico.");
					return false;
				}

			var cp=document.getElementById("cpdesc");
			if(!cp.value.length>0)
				{
					alert("El campo código postal no puede estar vacio.");
					return false;
				}
			if(cp.value.length>0 && isNaN(cp.value))
				{
					alert("El Código postal debe ser numérico.");
					return false;
				}
			var nombre=document.getElementById("nombredesc");
			if(!nombre.value.length>0)
				{
					alert("El nombre no puede estar vacio.");
					return false;
				}
			//if(!isNaN(nombre.value))
			if(nombre.value.length>0)	
				{
					var cantNombre= nombre.value.length; //cantidad original
				
					var filtroString = nombre.value.split(1);
						filtroString = filtroString[0].split(2);
						filtroString = filtroString[0].split(3);
						filtroString = filtroString[0].split(4);
						filtroString = filtroString[0].split(5);
						filtroString = filtroString[0].split(6);
						filtroString = filtroString[0].split(7);
						filtroString = filtroString[0].split(8);
						filtroString = filtroString[0].split(9);
						filtroString = filtroString[0].split(0);
					existeNumero=filtroString[0].length!=cantNombre;
					
					if(existeNumero){
					alert("El nombre no puede ser numérico");
					return !existeNumero;
					}
				}
			var apellido=document.getElementById("apellidodesc");
			if(!apellido.value.length>0)
				{
					alert("El apellido no puede estar vacio");
					return false;
				}
			if(apellido.value.length>0)	
				{
					var cantApellido= apellido.value.length; //cantidad original
				
					var filtroString = apellido.value.split(1);
						filtroString = filtroString[0].split(2);
						filtroString = filtroString[0].split(3);
						filtroString = filtroString[0].split(4);
						filtroString = filtroString[0].split(5);
						filtroString = filtroString[0].split(6);
						filtroString = filtroString[0].split(7);
						filtroString = filtroString[0].split(8);
						filtroString = filtroString[0].split(9);
						filtroString = filtroString[0].split(0);
					existeNumero=filtroString[0].length!=cantApellido;
					
					if(existeNumero){
					alert("El Apellido no puede ser numérico");
					return !existeNumero;
					}
				}		
			var sexo=document.getElementById("sexodesc");
			if(sexo.value=="--")
				{
					alert("Seleccione sexo.");
					return false;
				}
			var dni=document.getElementById("dnidesc");
			if(dni.value.length!==8)
				{
					alert("DNI debe tener 8 digitos");
					return false;
				}
			
			if(dni.value.length===8)
				{	
					var test= dni.value.slice(0,1); //obtengo primer caracter
					var test2= dni.value.slice(1,8); //obtengo los siguientes
					if(((test==='m' || test==='M') && !isNaN(test2) ) || ((test==='f' || test==='F') &&  !isNaN(test2)) || !isNaN(dni.value))
					{
				
				
					}else
						{
							alert("El DNI del Docente no es valido");
							return false;
						}
				}
			var cuil=document.getElementById("cuildesc");
			if(!cuil.value.length>0)
				{
					alert("CUIL vacio");
					return false;
				}
			if(cuil.value.length!=11)
				{
					alert("Ingrese su cuil,no diferente a 11 digitos.");
					return false;
				}
			if(isNaN(cuil.value))
				{
					alert("El CUIL debe ser numérico");
					return false;
				}
		
		return true;
	}
