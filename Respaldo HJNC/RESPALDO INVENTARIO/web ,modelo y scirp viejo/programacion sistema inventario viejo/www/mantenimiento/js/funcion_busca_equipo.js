// JavaScript Document

function nuevoAjax()
{ 
    var xmlhttp=false; 
    try 
    { 
        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
    }
    catch(e)
    { 
        try
        { 
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
        } 
        catch(E) { xmlhttp=false; }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') { xmlhttp=new XMLHttpRequest(); } 

    return xmlhttp; 
}

function traerDatos()
{
    var mac=document.getElementById("mac").value;
    var campo1=document.getElementById("ip");
	var campo2=document.getElementById("serie_monitor");
	var campo3=document.getElementById("grupo");
	var campo4=document.getElementById("unidad");
	var campo5=document.getElementById("net");
	var campo6=document.getElementById("modelo_pc");
	var campo7=document.getElementById("serie_pc");
	var campo8=document.getElementById("usuario");
	var campo9=document.getElementById("modelo_mon");
	var campo10=document.getElementById("procesador");
	var campo11=document.getElementById("disco_duro");
	var campo12=document.getElementById("ram");

    var ajax=nuevoAjax();
    ajax.open("POST", "servicios/ws_recupera_detalle_equipo.php", true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("mac="+mac);
     
	 
    ajax.onreadystatechange=function()
    {
        if (ajax.readyState==4)
        {
            var respuesta=ajax.responseXML;// Rescata el contenido del archivo XML retornado del servidor:
            campo1.value=respuesta.getElementsByTagName("ip")[0].childNodes[0].data;
			campo2.value=respuesta.getElementsByTagName("serie_monitor")[0].childNodes[0].data;
			campo3.value=respuesta.getElementsByTagName("grupo_trabajo")[0].childNodes[0].data;
			campo4.value=respuesta.getElementsByTagName("nombre_unidad")[0].childNodes[0].data;
			campo5.value=respuesta.getElementsByTagName("netbios")[0].childNodes[0].data;
			campo6.value=respuesta.getElementsByTagName("modelo_pc")[0].childNodes[0].data;
			campo7.value=respuesta.getElementsByTagName("serie_pc")[0].childNodes[0].data;
			campo8.value=respuesta.getElementsByTagName("nombre_usuario")[0].childNodes[0].data;
			campo9.value=respuesta.getElementsByTagName("modelo_mon")[0].childNodes[0].data;
			campo10.value=respuesta.getElementsByTagName("procesador")[0].childNodes[0].data;
			campo11.value=respuesta.getElementsByTagName("disco_duro")[0].childNodes[0].data;
			campo12.value=respuesta.getElementsByTagName("ram")[0].childNodes[0].data;
        }
    }
}