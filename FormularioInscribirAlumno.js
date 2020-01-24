function ValidarDatos()
{	var dni=document.getElementById("dniTutor");
	var dniAlumno=document.getElementById("dniAlumno");
	if(dni.value.length!==8)
		{
			alert("El DNI del Tutor debe tener 8 digitos");
			return false;
		}
	if(dniAlumno.value.length!==8)
		{
			alert("El DNI del Alumno debe tener 8 digitos");
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
					alert("El DNI del Tutor no es valido");
					return false;
				}
		}
	if(dniAlumno.value.length===8)
		{	
			var test= dniAlumno.value.slice(0,1); //obtengo primer caracter
			var test2= dniAlumno.value.slice(1,8); //siguiente
			
			if(((test==='m' || test==='M') && !isNaN(test2) ) || ((test==='f' || test==='F') &&  !isNaN(test2)) || !isNaN(dniAlumno.value))
			{
				
				
			}else
				{
					alert("El DNI del Alumno no es valido");
					return false;
				}
		}
	return true;
}
function ValidarFormularioVinculacion()
{
	//validar tutor
		var nombret=document.getElementById("nombreTutor");
			if(!nombret.value.length>0)
				{
					alert("El nombre del Tutor no puede estar vacio.");
					return false;
				}
			//if(!isNaN(nombre.value))
			if(nombret.value.length>0)	
				{
					var cantNombret= nombret.value.length; //cantidad original
				
					var filtroString = nombret.value.split(1);
						filtroString = filtroString[0].split(2);
						filtroString = filtroString[0].split(3);
						filtroString = filtroString[0].split(4);
						filtroString = filtroString[0].split(5);
						filtroString = filtroString[0].split(6);
						filtroString = filtroString[0].split(7);
						filtroString = filtroString[0].split(8);
						filtroString = filtroString[0].split(9);
						filtroString = filtroString[0].split(0);
					existeNumero=filtroString[0].length!=cantNombret;
					
					if(existeNumero){
					alert("El nombre no puede ser numérico");
					return !existeNumero;
					}
				}
			var apellidot=document.getElementById("apellidoTutor");
			if(!apellidot.value.length>0)
				{
					alert("El apellido del Tutor no puede estar vacio");
					return false;
				}
			if(apellidot.value.length>0)	
				{
					var cantApellidot= apellidot.value.length; //cantidad original
				
					var filtroString = apellidot.value.split(1);
						filtroString = filtroString[0].split(2);
						filtroString = filtroString[0].split(3);
						filtroString = filtroString[0].split(4);
						filtroString = filtroString[0].split(5);
						filtroString = filtroString[0].split(6);
						filtroString = filtroString[0].split(7);
						filtroString = filtroString[0].split(8);
						filtroString = filtroString[0].split(9);
						filtroString = filtroString[0].split(0);
					existeNumero=filtroString[0].length!=cantApellidot;
					
					if(existeNumero){
					alert("El Apellido no puede ser numérico");
					return !existeNumero;
					}
				}
		var cuilt=document.getElementById("cuilTutor");
			if(!cuilt.value.length>0)
				{
					alert("CUIL Tutor vacio");
					return false;
				}
			if(cuilt.value.length!=11)
				{
					alert("Ingrese CUIL Tutor, no diferente a 11 digitos.");
					return false;
				}
			if(isNaN(cuilt.value))
				{
					alert("El CUIL del Tutor debe ser numérico");
					return false;
				}			
//validar alumno 
	var nombre=document.getElementById("nombreAlumno");
			if(!nombre.value.length>0)
				{
					alert("El nombre del Alumno no puede estar vacio.");
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
			var apellido=document.getElementById("apellidoAlumno");
			if(!apellido.value.length>0)
				{
					alert("El apellido del Alumno no puede estar vacio");
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
		var cuil=document.getElementById("cuilAlumno");
			if(!cuil.value.length>0)
				{
					alert("CUIL Alumno vacio");
					return false;
				}
			if(cuil.value.length!=11)
				{
					alert("Ingrese CUIL Alumno, no diferente a 11 digitos.");
					return false;
				}
			if(isNaN(cuil.value))
				{
					alert("El CUIL del Alumno debe ser numérico");
					return false;
				}
	
	return true;
}

