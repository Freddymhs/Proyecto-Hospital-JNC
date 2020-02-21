// JavaScript Document
function maximaLongitud(texto,maxlong) {
  var tecla, in_value, out_value;

  if (texto.value.length > maxlong) {
	in_value = texto.value;
	out_value = in_value.substring(0,maxlong);
	texto.value = out_value;
	return false;
  }
  return true;
} 