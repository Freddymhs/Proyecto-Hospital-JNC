// Variables para setear
onload=function() 
{
	cAyuda=document.getElementById("mensajesAyuda");
	cNombre=document.getElementById("ayudaTitulo");
	cTex=document.getElementById("ayudaTexto");
	divTransparente=document.getElementById("transparencia");
	divMensaje=document.getElementById("transparenciaMensaje");
	form=document.getElementById("formulario");
	urlDestino="mail.php";
	
	claseNormal="input";
	claseError="inputError";
	
	preCarga("ok.gif", "loading.gif", "error.gif");
}

function preCarga()
{
	imagenes=new Array();
	for(i=0; i<arguments.length; i++)
	{
		imagenes[i]=document.createElement("img");
		imagenes[i].src=arguments[i];
	}
}

function nuevoAjax()
{ 
	var xmlhttp=false; 
	try 
	{ 
		// No IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{ 
		try
		{ 
			// IE 
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); } 
	return xmlhttp; 
}

function limpiaForm()
{
	//for(i=0; i<=18; i++)
	for(i=0; i<=5; i++)
	{
		form.elements[i].className=claseNormal;
	}
	//document.getElementById("observaciones").className=claseNormal;
	document.getElementById("apellidos").className=claseNormal;
}

function campoError(campo)
{
	campo.className=claseError;
	error=1;
}

function ocultaMensajeTrue()
{
	divTransparente.style.display="none";
	window.location = "registro_paciente.php";
}

function ocultaMensajeError()
{
	divTransparente.style.display="none";
}

function muestraMensaje(mensaje)
{
	divMensaje.innerHTML=mensaje;
	divTransparente.style.display="block";
}

function eliminaEspacios(cadena)
{
	// Funcion para eliminar espacios delante y detras de cada cadena
	while(cadena.charAt(cadena.length-1)==" ") cadena=cadena.substr(0, cadena.length-1);
	while(cadena.charAt(0)==" ") cadena=cadena.substr(1, cadena.length-1);
	return cadena;
}

function validaLongitud(valor, permiteVacio, minimo, maximo)
{
	var cantCar=valor.length;
	if(valor=="")
	{
		if(permiteVacio) return true;
		else return false;
	}
	else
	{
		if(cantCar>=minimo && cantCar<=maximo) return true;
		else return false;
	}
}

function validaCorreo(valor)
{
	var reg=/(^[a-zA-Z0-9._-]{1,30})@([a-zA-Z0-9.-]{1,30}$)/;
	if(reg.test(valor)) return true;
	else return false;
}

function validaForm()
{
	limpiaForm();
	error=0;
	
	var num_ficha=eliminaEspacios(form.num_ficha.value);
	var num_ficha_hosp=eliminaEspacios(form.num_ficha_hosp.value);
	var fecha_creada=eliminaEspacios(form.fecha_creada.value);
	var rut=eliminaEspacios(form.rut.value);
	var nombres=eliminaEspacios(form.nombres.value);
	var fecha_nac=eliminaEspacios(form.fecha_nac.value);
	var apellidos=eliminaEspacios(form.apellidos.value);
	var edad=eliminaEspacios(form.edad.value);
	var direccion=eliminaEspacios(form.direccion.value);
	var profesion=eliminaEspacios(form.profesion.value);
	var procedencia=eliminaEspacios(form.procedencia.value);
	var escolaridad=document.getElementById('escolaridad').value;
	var estado_civil=document.getElementById('estado_civil').value;
	var mac=eliminaEspacios(form.mac.value);
	var genero=document.getElementById('genero').value;
	var transfusiones=document.getElementById('transfusiones').value;
	var sexo=document.getElementById('sexo').value;
	var alergia=document.getElementById('alergia').value;
	var donante=document.getElementById('donante').value;
	var observaciones=eliminaEspacios(form.observaciones.value);
	
	if(!validaLongitud(num_ficha, 0, 2, 10)) campoError(form.num_ficha);
	if(!validaLongitud(num_ficha_hosp, 0, 2, 10)) campoError(form.num_ficha_hosp);
	if(!validaLongitud(fecha_creada, 0, 10, 10)) campoError(form.fecha_creada);
	if(!validaLongitud(rut, 0, 11, 12)) campoError(form.rut);
	if(!validaLongitud(nombres, 0, 4, 100)) campoError(form.nombres);
	if(!validaLongitud(apellidos, 0, 4, 100)) campoError(form.apellidos);
	//if(!validaLongitud(fecha_nac, 0, 10, 10)) campoError(form.fecha_nac);
	//if(!validaLongitud(edad, 0, 1, 3)) campoError(form.edad);
	//if(!validaLongitud(direccion, 0, 4, 100)) campoError(form.direccion);
	//if(!validaLongitud(profesion, 0, 4, 100)) campoError(form.profesion);
	//if(!validaLongitud(procedencia, 0, 4, 100)) campoError(form.procedencia);
	/*
	if(escolaridad == 0){
	   campoError(form.escolaridad)
	}
	if(estado_civil == 0){
	   campoError(form.estado_civil)
	}
	
	if(!validaLongitud(mac, 0, 4, 100)) campoError(form.mac);
	
	if(genero == 0){
	   campoError(form.genero)
	}
	if(transfusiones == 0){
	   campoError(form.transfusiones)
	}
	if(sexo == 0){
	   campoError(form.sexo)
	}
	if(alergia == 0){
	   campoError(form.alergia)
	}
	if(donante == 0){
	   campoError(form.donante)
	}
	*/
	if(error==1)
	{
		var texto="<img src='imagenes/Error.png' alt='Error'><br><br>Error: revise los campos en rojo.<br><br><button style='width:80px; height:20px; font-size:10px;' onClick='ocultaMensajeError()' type='button'>Ok</button>";
		muestraMensaje(texto);
	}
	else
	{
		
		var ajax=nuevoAjax();
		ajax.open("POST","servicios/ws_addregistro.php", true);
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("num_ficha="+num_ficha+"&num_ficha_hosp="+num_ficha_hosp+"&fecha_creada="+fecha_creada+"&rut="+rut+"&nombres="+nombres+"&fecha_nac="+fecha_nac+"&apellidos="+apellidos+"&edad="+edad+"&direccion="+direccion+"&profesion="+profesion+"&procedencia="+procedencia+"&escolaridad="+escolaridad+"&estado_civil="+estado_civil+"&mac="+mac+"&genero="+genero+"&transfusiones="+transfusiones+"&sexo="+sexo+"&alergia="+alergia+"&donante="+donante+"&observaciones="+observaciones);
		
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				
				var xml = ajax.responseXML;
				var campo = xml.getElementsByTagName('estado')[0].childNodes[0].data;
				
				if(campo=="1")
				{
					var texto="<img src='imagenes/Good.png' alt='Ok'><br>Registro guardado con exito<br><br><button style='width:80px; height:20px; font-size:10px;' onClick='ocultaMensajeTrue()' type='button'>Ok</button>";
				}
				else var texto="<img src='imagenes/Error.png'><br><br>Error: El RUT ya existe o <br> campo llenado erroneamente<br><br><button style='width:80px; height:20px; font-size:10px;' onClick='ocultaMensajeError()' type='button'>Ok</button>";
				
				muestraMensaje(texto);
				
			}
		}
		
	}
}
