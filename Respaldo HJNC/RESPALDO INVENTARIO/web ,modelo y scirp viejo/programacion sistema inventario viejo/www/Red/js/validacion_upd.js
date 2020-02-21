// JavaScript Document

// Variables para setear
onload=function() 
{
	cAyuda=document.getElementById("mensajesAyuda");
	cNombre=document.getElementById("ayudaTitulo");
	cTex=document.getElementById("ayudaTexto");
	divTransparente=document.getElementById("transparenciaUpd");
	divMensaje=document.getElementById("transparenciaMensajeUpd");
	form=document.getElementById("formContenedorUpdate");
	urlDestino="mail.php";
	
	claseNormal="input";
	claseError="inputError";
	
	preCarga("ok.gif", "loading.gif", "error.gif");
}

function preCarga()
{	imagenes=new Array();
	for(i=0; i<arguments.length; i++)
	{
		imagenes[i]=document.createElement("img");
		imagenes[i].src=arguments[i];
	}
}

function nuevoAjax()
{ 	var xmlhttp=false; 
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
{	for(i=0; i<=14; i++)
	{
		form.elements[i].className=claseNormal;
	}
	document.getElementById("procesador").className=claseNormal;
	document.getElementById("disco_duro").className=claseNormal;
	document.getElementById("ram").className=claseNormal;
}

function campoError(campo)
{	campo.className=claseError;
	error=1;
}

function ocultaMensajeTrue()
{	divTransparente.style.display="none";
	window.location = "formulario_update.php";
}

function ocultaMensajeError()
{	divTransparente.style.display="none";
}

function muestraMensaje(mensaje)
{   divMensaje.innerHTML=mensaje;
	divTransparente.style.display="block";
}

function eliminaEspacios(cadena)
{	// Funcion para eliminar espacios delante y detras de cada cadena
	while(cadena.charAt(cadena.length-1)==" ") cadena=cadena.substr(0, cadena.length-1);
	while(cadena.charAt(0)==" ") cadena=cadena.substr(1, cadena.length-1);
	return cadena;
}

function validaLongitud(valor, permiteVacio, minimo, maximo)
{	var cantCar=valor.length;
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
{	var reg=/(^[a-zA-Z0-9._-]{1,30})@([a-zA-Z0-9.-]{1,30}$)/;
	if(reg.test(valor)) return true;
	else return false;
}

function validaForm()
{
	limpiaForm();
	error=0;
	
	var evento = 1;
	var username = document.getElementById('username').value;
	var id=eliminaEspacios(form.id.value);
	var num=eliminaEspacios(form.num.value);
	var ip=eliminaEspacios(form.ip.value);
	var mac=eliminaEspacios(form.mac.value);
	var red=eliminaEspacios(form.red.value);
	var grupo=eliminaEspacios(form.grupo.value);
	var net=eliminaEspacios(form.net.value);
	var usuario=eliminaEspacios(form.usuario.value);
	var unidad=document.getElementById('unidad').value;
	var impresora=eliminaEspacios(form.impresora.value);
	var telefono=eliminaEspacios(form.telefono.value);
	var serie_pc=eliminaEspacios(form.serie_pc.value);
	var serie_monitor=eliminaEspacios(form.serie_monitor.value);
	
	if(num == 0){
		var modelo_pc=document.getElementById('modelo_pc').value;
	}
	if(num == 1){
		var modelo_pc=document.getElementById('modelo_pc1').value;
	}
	if(num == 2){
		var modelo_pc=document.getElementById('modelo_pc2').value;
	}
	
	if(num == 3){
		var modelo_pc=document.getElementById('modelo_pc3').value;
	}
	
	if(num == 4){
		var modelo_pc=document.getElementById('modelo_pc4').value;
	}
	
	if(num == 5){
		var modelo_pc=document.getElementById('modelo_pc5').value;
	}
	
	if(num == 6){
		var modelo_pc=document.getElementById('modelo_pc6').value;
	}
	
	
	var modelo_mon=document.getElementById('modelo_mon').value;
	var procesador=eliminaEspacios(form.procesador.value);
	var disco_duro=eliminaEspacios(form.disco_duro.value);
	var ram=eliminaEspacios(form.ram.value);
	
	if(!validaLongitud(ip, 0, 7, 23)) campoError(form.ip);
	if(!validaLongitud(mac, 0, 17, 17)) campoError(form.mac);
	if(!validaLongitud(red, 0, 2, 4)) campoError(form.red);
	if(!validaLongitud(grupo, 0, 3, 50)) campoError(form.grupo);
	if(!validaLongitud(net, 0, 2, 50)) campoError(form.net);
	if(!validaLongitud(usuario, 0, 4, 500)) campoError(form.usuario);
	if(!validaLongitud(procesador, 0, 4, 50)) campoError(form.procesador);
	if(!validaLongitud(disco_duro, 0, 4, 50)) campoError(form.disco_duro);
	if(!validaLongitud(ram, 0, 4, 50)) campoError(form.ram);
	
	if(unidad == 0){
	   campoError(form.unidad)
	}
	if(modelo_pc == 0){
	   campoError(form.modelo_pc)
	}
	if(modelo_mon == 0){
	   campoError(form.modelo_mon)
	}
	
	if(error==1)
	{
		var texto="<img src='imagenes/Error.png' alt='Error'><br><br>Error: revise los campos en rojo.<br><br><button style='width:45px; height:18px; font-size:10px;' onClick='ocultaMensajeError()' type='button'>Ok</button>";
		muestraMensaje(texto);
	}
	else
	{
		
		var ajax=nuevoAjax();
		ajax.open("POST","servicios/ws_updregistro.php", true);
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("evento="+evento+"&username="+username+"&id="+id+"&ip="+ip+"&mac="+mac+"&red="+red+"&grupo="+grupo+"&net="+net+"&usuario="+usuario+"&unidad="+unidad+"&impresora="+impresora+"&telefono="+telefono+"&serie_pc="+serie_pc+"&serie_monitor="+serie_monitor+"&modelo_pc="+modelo_pc+"&modelo_mon="+modelo_mon+"&procesador="+procesador+"&disco_duro="+disco_duro+"&ram="+ram);
		
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				
				var xml = ajax.responseXML;
				var campo = xml.getElementsByTagName('estado')[0].childNodes[0].data;
				
				if(campo=="1")
				{
					var texto="<img src='imagenes/Good.png' alt='Ok'><br>Registro Actualizado con exito";
				}
				else var texto="<img src='imagenes/Error.png'><br><br>Error: Escoja la Unidad<br><br><button style='width:45px; height:18px; font-size:10px;' onClick='ocultaMensajeError()' type='button'>Ok</button>";
				
				muestraMensaje(texto);
				
			}
		}
	}
}

// Mensajes de ayuda

if(navigator.userAgent.indexOf("MSIE")>=0) navegador=0;
else navegador=1;

function colocaAyuda(event)
{	if(navegador==0)
	{
		var corX=window.event.clientX+document.documentElement.scrollLeft;
		var corY=window.event.clientY+document.documentElement.scrollTop;
	}
	else
	{
		var corX=event.clientX+window.scrollX;
		var corY=event.clientY+window.scrollY;
	}
	cAyuda.style.top=corY+20+"px";
	cAyuda.style.left=corX+15+"px";
}

function ocultaAyuda()
{	cAyuda.style.display="none";
	if(navegador==0) 
	{
		document.detachEvent("onmousemove", colocaAyuda);
		document.detachEvent("onmouseout", ocultaAyuda);
	}
	else 
	{
		document.removeEventListener("mousemove", colocaAyuda, true);
		document.removeEventListener("mouseout", ocultaAyuda, true);
	}
}

function muestraAyuda(event, campo)
{	colocaAyuda(event);
	
	if(navegador==0) 
	{ 
		document.attachEvent("onmousemove", colocaAyuda); 
		document.attachEvent("onmouseout", ocultaAyuda); 
	}
	else 
	{
		document.addEventListener("mousemove", colocaAyuda, true);
		document.addEventListener("mouseout", ocultaAyuda, true);
	}
	
	cNombre.innerHTML=campo;
	cTex.innerHTML=ayuda[campo];
	cAyuda.style.display="block";
}