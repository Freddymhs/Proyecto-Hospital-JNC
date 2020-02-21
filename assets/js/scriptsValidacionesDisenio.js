/* onmouseleave="limpaUPS()" */
/*<!-- onfocusout="limpiaSelected()" -->*/



// OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script  
////se DESACTIVAN los inputs con un script desde el html   y se activan gracias a funciones js
// OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script // OTROS script 

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



// xasigna en off los inputs de seriales

// document.getElementById("dateMonitor").disabled = true;


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// telefono// telefono// telefono// telefono// telefono// telefono// telefono// telefono// telefono// telefono// telefono


function cleanTelefono(){
	if (document.getElementById("selectTelefono").value != "") {
		document.getElementById('collapTelefonoNum').value = '';

	}
}

function cleanTelefonoSelected(){
	if (document.getElementById("collapTelefonoNum").value != "") {
		document.getElementById("selectTelefono").selectedIndex = "0";
	}
}

// persona// persona// persona// persona// persona// persona// persona// persona// persona// persona// persona// persona// persona

function cleanPersona(){
	if (document.getElementById("selectPersona").value != "") {
		document.getElementById('collapRutP').value = '';
		document.getElementById('collapNombreP').value = '';
		document.getElementById('collapCorreoP').value = '';
		document.getElementById("collapRolP").selectedIndex = "0";
	}
}

function cleanPersonaSelected(){
	if (document.getElementById("collapRutP").value != "") {
		document.getElementById("selectPersona").selectedIndex = "0";
	}
}

// unidad// unidad// unidad// unidad// unidad// unidad// unidad// unidad// unidad// unidad// unidad// unidad// unidad// unidad// unidad// unidad


function cleanUnidad(){
	if (document.getElementById("selectunidades").value != "") {
		document.getElementById('collapNunidad').value = '';
		document.getElementById('collapUespecif').value = '';
	}
}

function cleanUnidadSelected(){
	if (document.getElementById("collapNunidad").value != "") {
		document.getElementById("selectunidades").selectedIndex = "0";
	}
}

// monitores// monitores// monitores// monitores// monitores// monitores// monitores// monitores// monitores// monitores

function cleanNewMonitor(){
	if (document.getElementById("selectMonitor").value != "") {
		document.getElementById('collapModMon').value = '';
		document.getElementById('collapMonFun').value = '';
		document.getElementById('collapResMon').value = '';
		document.getElementById('collapPulMon').value = '';
		document.getElementById('collapMarMon').value = '';
		
		document.getElementById("txtserialmonitor").disabled = false;

		



	}
}

function cleanMonitSelected(){
	if (document.getElementById("collapModMon").value != "") {
		document.getElementById("selectMonitor").selectedIndex = "0";


		document.getElementById("txtserialmonitor").disabled = false;

	}
}



// Computadoras// Computadoras// Computadoras// Computadoras// Computadoras// Computadoras// Computadoras// Computadoras// Computadoras// Computadoras

function cleanNewPc(){
	if (document.getElementById("selectpc").value != "") {
		document.getElementById('collapModelPC').value = '';
		document.getElementById('collapMarcaPC').value = '';
		document.getElementById('collapDisc1').value = '';
		document.getElementById('collapDisco2').value = '';
		document.getElementById('collapProcePc').value = '';
		document.getElementById('collapMemoPc').value = '';
		document.getElementById('collapSoPc').value = '';
		
		document.getElementById("txtserialpc").disabled = false;

	}
}

function cleanPcSelected(){
	if (document.getElementById("collapModelPC").value != "") {
		document.getElementById("selectpc").selectedIndex = "0";
		
		document.getElementById("txtserialpc").disabled = false;

		
	}
}

// IMPRESORA// IMPRESORA// IMPRESORA// IMPRESORA// IMPRESORA// IMPRESORA// IMPRESORA// IMPRESORA// IMPRESORA// IMPRESORA// IMPRESORA

function cleanNewImp(){
	if (document.getElementById("selectImpresora").value != "") {
		document.getElementById('collapModelImpr').value = '';
		document.getElementById('collapFuncImpr').value = '';
		document.getElementById('collapMarcaImp').value = '';

		document.getElementById("txtserialimpresora").disabled = false;
		
	}
}

function cleanImpSelected(){
	if (document.getElementById("collapModelImpr").value != "") {
		document.getElementById("selectImpresora").selectedIndex = "0";

		document.getElementById("txtserialimpresora").disabled = false;
	}
}


/*<!-- UPS --><!-- UPS --><!-- UPS --><!-- UPS --><!-- UPS --><!-- UPS --><!-- UPS --><!-- UPS --><!-- UPS -->*/
/* onmouseleave="limpaUPS()" */


function cleanNewUps(){
	if (document.getElementById("selectups").value != "") {
		document.getElementById('collapModUPs').value = '';
		document.getElementById('collapMarcaUps').value = '';
		document.getElementById('collapCapacUps').value = '';
		document.getElementById('collapFuncUps').value = '';
		document.getElementById("txtserialups").disabled = false;


	}
}

/*<!-- onfocusout="limpiaSelected()" -->*/
function cleanUpsSelected(){
	if (document.getElementById("collapModUPs").value != "") {
		document.getElementById("selectups").selectedIndex = "0";
		document.getElementById("txtserialups").disabled = false;

		
	}
}



