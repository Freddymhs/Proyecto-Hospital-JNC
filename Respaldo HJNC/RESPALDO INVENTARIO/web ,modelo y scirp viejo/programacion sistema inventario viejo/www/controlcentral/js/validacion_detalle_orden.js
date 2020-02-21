// Variables para setear
 
 
 onload=function() 
{
	cAyuda=document.getElementById("mensajesAyuda");
	cNombre=document.getElementById("ayudaTitulo");
	cTex=document.getElementById("ayudaTexto");
	divTransparente=document.getElementById("transparenciaDetalle");
	divMensaje=document.getElementById("transparenciaMensajeDetalle");
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
	for(i=0; i<=3; i++)
	{
		form.elements[i].className=claseNormal;
	}
	document.getElementById("estado").className=claseNormal;
}

function campoError(campo)
{
	campo.className=claseError;
	error=1;
}

function ocultaMensajeTrue()
{
	divTransparente.style.display="none";
	window.location = "historial_turno.php";
	
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
	
	var id=eliminaEspacios(form.id.value);
	var solucion=eliminaEspacios(form.solucion.value);
	var fecha_fin=eliminaEspacios(form.fecha_fin.value);
	var caja=eliminaEspacios(form.caja.value);
	var estado=document.getElementById('estado').value;
	
	if(!validaLongitud(solucion, 0, 5, 500)) campoError(form.solucion);
	if(!validaLongitud(fecha_fin, 0, 10, 10)) campoError(form.fecha_fin);
	if(!validaLongitud(caja, 0, 5, 5)) campoError(form.caja);
	
	if(estado==0){
	   campoError(form.estado)
	}
	
	if(error==1)
	{
		var texto="<img src='imagenes/Error.png' alt='Error'><br><br>Error: revise los campos en rojo.<br><br><button style='width:45px; height:18px; font-size:10px;' onClick='ocultaMensajeError()' type='button'>Ok</button>";
		muestraMensaje(texto);
	}
	else
	{
		
		var ajax=nuevoAjax();
		ajax.open("POST","servicios/ws_upd_orden.php", true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("id="+id+"&solucion="+solucion+"&fecha_fin="+fecha_fin+"&caja="+caja+"&estado="+estado);
	
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				
				var xml = ajax.responseXML;
				var campo = xml.getElementsByTagName('estado')[0].childNodes[0].data;
				
				
				if(campo=="1")
				{
					var texto="<img src='imagenes/Good.png' alt='Ok'><br>Orden Actualizada";
					
				}else
					var texto="<img src='imagenes/Error.png' alt='Error'><br><br>Error: Servidor ocupado <br>intente mas tarde";
					
				muestraMensaje(texto);
				
			}
			
		}

	}
}
