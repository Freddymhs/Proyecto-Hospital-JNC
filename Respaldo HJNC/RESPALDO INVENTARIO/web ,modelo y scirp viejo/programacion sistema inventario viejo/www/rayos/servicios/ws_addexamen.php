<?php

include_once "../clases/class.Examen.php";
include_once "../clases/Utiles.inc";


$examen = new Examen();


if (isset($_POST["tipo_exam"])){
		$id_tipoexamen = $_POST["tipo_exam"];
}else {
	    $id_tipoexamen = 0;//0
}

if (isset($_POST["tipo_exam2"])){
		$id_tipoexamen2 = $_POST["tipo_exam2"];
}else {
	    $id_tipoexamen2 = 0;//0
}

if (isset($_POST["tipo_exam3"])){
		$id_tipoexamen3 = $_POST["tipo_exam3"];
}else {
	    $id_tipoexamen3 = 0;//0
}

if (isset($_POST["tipo_exam4"])){
		$id_tipoexamen4 = $_POST["tipo_exam4"];
}else {
	    $id_tipoexamen4 = 0;//0
}

if (isset($_POST["tipo_exam5"])){
		$id_tipoexamen5 = $_POST["tipo_exam5"];
}else {
	    $id_tipoexamen5 = 0;//0
}

if (isset($_POST["unidad"])){
		$id_unidad = $_POST["unidad"];
}else {
	    $id_unidad = 0;//0
}

if (isset($_POST["numero"])){
		$num_examen = $_POST["numero"];
}else {
	    $num_examen = 0;//0
}

if (isset($_POST["nombre_pac"])){
		$examen_nombre_paciente = $_POST["nombre_pac"];
}else {
	    $examen_nombre_paciente = "";//0
}

if (isset($_POST["fecha_exam"])){
		$examen_fecha = $_POST["fecha_exam"];
}else {
	    $examen_fecha = "";//0
}

if (isset($_POST["fecha_ret"])){
		$examen_fecha_retorno = $_POST["fecha_ret"];
}else {
	    $examen_fecha_retorno = "";//0
}

if (isset($_POST["estado"])){
		$examen_estado = $_POST["estado"];
}else {
	    $examen_estado = "";//0
}

if (isset($_POST["diag"])){
		$examen_diagnostico = $_POST["diag"];
}else {
	    $examen_diagnostico = "";//0
}

if (isset($_POST["destino"])){
		$examen_destino = $_POST["destino"];
}else {
	    $examen_destino = "";//0
}

if (isset($_POST["usuario"])){
		$usuario = $_POST["usuario"];
}else {
	    $usuario = "";//0
}

if (isset($_POST["contador"])){
		$contador = $_POST["contador"];
}else {
	    $contador = 0;//0
}

//$ut = new Utiles();
//$ut->addlog("../servicios/msj_addexamen.log","$id_tipoexamen,$id_tipoexamen2,$id_tipoexamen3,$id_tipoexamen4,$id_tipoexamen5,$id_unidad,$num_examen,$examen_nombre_paciente,$examen_fecha,$examen_fecha_retorno,$examen_estado,$examen_diagnostico,$examen_destino,$usuario,$contador \n");

$res = $examen->add_examen($id_tipoexamen,$id_tipoexamen2,$id_tipoexamen3,$id_tipoexamen4,$id_tipoexamen5,$id_unidad,$num_examen,$examen_nombre_paciente,$examen_fecha,$examen_fecha_retorno,$examen_estado,$examen_diagnostico,$examen_destino,$usuario,$contador);

header('Content-Type: text/xml');

if ($res) {
	$ret="1"; 
	$msj="Grabacion Existosa  (ws_addexamen)";
} else {
	$ret="0";
	$msj="ERROR:  (ws_addexamane)";
}
$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
			"<estado>$ret</estado>".
			"<mensaje>$msj</mensaje>".
	   "</resultado>";
  	
print $xml;

?>

