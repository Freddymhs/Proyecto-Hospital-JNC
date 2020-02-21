// JavaScript Document

var celda_ant;         
celda_ant="";  

function ilumina(celda){ 
	if (celda_ant=="") 
	{ 
		celda_ant = celda; 
	}
	
	celda_ant.style.backgroundColor=""; 
	celda.style.backgroundColor="#D5E8F1";/*"##C7ECFE " E2EDFF;*/ 
	celda_ant = celda; 
}