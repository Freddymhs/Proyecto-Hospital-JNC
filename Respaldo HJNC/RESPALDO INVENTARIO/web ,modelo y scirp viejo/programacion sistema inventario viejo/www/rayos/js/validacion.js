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
	for(i=0; i<=12; i++)
	{
		form.elements[i].className=claseNormal;
	}
	document.getElementById("unidad").className=claseNormal;
	document.getElementById("estado").className=claseNormal;
	document.getElementById("destino").className=claseNormal;	
	document.getElementById("diag").className=claseNormal;
}

function campoError(campo)
{
	campo.className=claseError;
	error=1;
}

function ocultaMensajeTrue()
{
	divTransparente.style.display="none";
	window.location = "ingresar_examen.php";
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
	var contador = 0;
	
	var numero=eliminaEspacios(form.numero.value);
	var fecha_exam=eliminaEspacios(form.fecha_exam.value);
	var fecha_ret=eliminaEspacios(form.fecha_ret.value);
	var nombre_pac=eliminaEspacios(form.nombre_pac.value);
	var tipo_exam=document.getElementById('exam').value;
	var tipo_exam2=document.getElementById('exam2').value;
	var tipo_exam3=document.getElementById('exam3').value;
	var tipo_exam4=document.getElementById('exam4').value;
	var tipo_exam5=document.getElementById('exam5').value;
	var unidad=document.getElementById('unidad').value;
	var estado=document.getElementById('estado').value;
	var destino=document.getElementById('destino').value;
	var diag=eliminaEspacios(form.diag.value);
	var usuario=eliminaEspacios(form.usuario.value);
	
	/***** CONTADOR DE EXAMEN *****/
	if(tipo_exam != 0){
	   contador = contador + 1;
	}
	if(tipo_exam2 != 0){
	   contador = contador + 1;
	}
	if(tipo_exam3 != 0){
	   contador = contador + 1;
	}
	if(tipo_exam4 != 0){
	   contador = contador + 1;
	}
	if(tipo_exam5 != 0){
	   contador = contador + 1;
	}
	/******************************/
	/**** CONTROL CAMPOS VACIOS ***/
	if(!validaLongitud(numero, 0, 2, 15)) campoError(form.numero);
	if(!validaLongitud(fecha_exam, 0, 10, 10)) campoError(form.fecha_exam);
	if(!validaLongitud(fecha_ret, 0, 10, 10)) campoError(form.fecha_ret);
	if(!validaLongitud(nombre_pac, 0, 4, 100)) campoError(form.nombre_pac);
	
	if(tipo_exam == 0){
	   campoError(form.exam)
	}
	if(unidad == 0){
	   campoError(form.unidad)
	}
	if(estado == 0){
	   campoError(form.estado)
	}
	if(destino == 0){
	   campoError(form.destino)
	}
	
	if(!validaLongitud(diag, 0, 4, 100)) campoError(form.diag);
	
	/******************************/
	
	if(error==1)
	{
		var texto="<img src='imagenes/Error.png' alt='Error'><br><br>Error: Revise los campos en rojo.<br><br><button style='width:80px; height:20px; font-size:10px;' onClick='ocultaMensajeError()' type='button'>Ok</button>";
		muestraMensaje(texto);
	}
	else
	{
		
		var ajax=nuevoAjax();
		ajax.open("POST","servicios/ws_addexamen.php", true);
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("numero="+numero+"&fecha_exam="+fecha_exam+"&fecha_ret="+fecha_ret+"&nombre_pac="+nombre_pac+"&tipo_exam="+tipo_exam+"&tipo_exam2="+tipo_exam2+"&tipo_exam3="+tipo_exam3+"&tipo_exam4="+tipo_exam4+"&tipo_exam5="+tipo_exam5+"&unidad="+unidad+"&estado="+estado+"&destino="+destino+"&diag="+diag+"&usuario="+usuario+"&contador="+contador);
		
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
				else var texto="<img src='imagenes/Error.png'><br><br>Error: Campo llenado erroneamente<br><br><button style='width:80px; height:20px; font-size:10px;' onClick='ocultaMensajeError()' type='button'>Ok</button>";
				
				muestraMensaje(texto);
				
			}
		}
	}
}
