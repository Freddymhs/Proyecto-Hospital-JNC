// JavaScript Document

	var http;
	var idselectunidad;
	var idselecttecnico;
	
	function enviaQueryUnidad(id, archivo)
	{
		http = getXMLHttpObject();
		
		//Preparamos la peticion
		http.open("GET", archivo, true);
		
		idselectunidad = id;
		//se manda la informacion obtenida a la funcion handleHttpResponse
		// esta funcion se llamará cuando la respuesta haya llegado
		http.onreadystatechange = handleHttpResponseUnidad;
		
		//como se escoge metodo GES no se manda nada en el body
		// enviamos la peticion
		http.send(null);
	}
	
	function enviaQueryTecnicos(id, archivo)
	{
		http = getXMLHttpObject();
		
		//Preparamos la peticion
		http.open("GET", archivo, true);
		
		idselecttecnico = id;
		//se manda la informacion obtenida a la funcion handleHttpResponse
		// esta funcion se llamará cuando la respuesta haya llegado
		http.onreadystatechange = handleHttpResponseTecnico;
		
		//como se escoge metodo GES no se manda nada en el body
		// enviamos la peticion
		http.send(null);
	}
	
	function getXMLHttpObject()
	{
		var xmlhttp;
		
		try
		{
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{	
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				try
				{	
					xmlhttp = new XMLHttpRequest();
				}
				catch(e)
				{	
					xmlhttp = false;
					alert('error');
				}
			}
		}	
		return xmlhttp;
	}
	
	function handleHttpResponseUnidad()
	{
		if (http.readyState == 4)
		{
			//primer cambio
			var unidades = http.responseXML.getElementsByTagName('unidad');
			
			// limpiarmos el combo
			document.getElementById(idselectunidad).innerHTML = "";
			// se coloca la opcion predeterminada
			option = document.createElement('option');
			option.appendChild( document.createTextNode('-- Seleccione una Unidad --'));
			document.getElementById(idselectunidad).appendChild(option);
		
			for (i=0; i < unidades.length; i++)
			{
				// tomamos el valor del atributo clave del tag modelo del XML
				option = document.createElement('option');
				option.setAttribute('value', unidades[i].firstChild.firstChild.nodeValue);
				// tomamos la descripcion del modelo del XML y lo colocamos en el select
				
				segundohijo = unidades[i].firstChild.nextSibling; //avanza al siguiente nodo hijo
				elementoDesc = document.createTextNode(segundohijo.firstChild.nodeValue);
				option.appendChild(elementoDesc);
				
				document.getElementById(idselectunidad).appendChild(option);
			}
		}
	}
	
	function handleHttpResponseTecnico()
	{
		if (http.readyState == 4)
		{
			//primer cambio
			var tecnicos = http.responseXML.getElementsByTagName('tecnico');
			
			// limpiarmos el combo
			document.getElementById(idselecttecnico).innerHTML = "";
			// se coloca la opcion predeterminada
			option = document.createElement('option');
			option.appendChild( document.createTextNode('-- Seleccione un Tecnico --'));
			document.getElementById(idselecttecnico).appendChild(option);
		
			for (i=0; i < tecnicos.length; i++)
			{
				// tomamos el valor del atributo clave del tag modelo del XML
				option = document.createElement('option');
				option.setAttribute('value', tecnicos[i].firstChild.firstChild.nodeValue);
				// tomamos la descripcion del modelo del XML y lo colocamos en el select
				
				segundohijo = tecnicos[i].firstChild.nextSibling; //avanza al siguiente nodo hijo
				elementoDesc = document.createTextNode(segundohijo.firstChild.nodeValue);
				option.appendChild(elementoDesc);
				
				document.getElementById(idselecttecnico).appendChild(option);
			}
		}
	}