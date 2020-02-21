// JavaScript Document

var celda_ant;         
celda_ant="";  

function ilumina(celda){ 
	if (celda_ant=="") 
	{ 
		celda_ant = celda; 
	}
	
	celda_ant.style.backgroundColor=""; 
	celda.style.backgroundColor="#ECE4BC";/*"#ECE4BC";*/ 
	celda_ant = celda; 
}