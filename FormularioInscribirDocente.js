function ValidarDatos()
{	
	var nombre=document.getElementById("nombredesc");
			if(!nombre.value.length>0)
				{
					alert("El nombre no puede estar vacio.");
					return false;
				}
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
			var dni=document.getElementById("dnidesc");
			if(dni.value.length!==8)
				{
					alert("DNI debe contener 8 digitos");
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
function Volver()
{
	return true;
}
