<?php
include_once "../clases/class.Ficha.php";
include_once "../clases/Utiles.inc";

$ficha = new Ficha();

if (isset($_POST["id_ficha"])){
		$id_ficha = $_POST["id_ficha"];
}else {
	    $id_ficha = 0;//0
}

if (isset($_POST["num_ficha_hosp"])){
		$num_ficha_hosp = $_POST["num_ficha_hosp"];
}else {
	    $num_ficha_hosp = 0;//0
}

if (isset($_POST["num_ficha"])){
		$num_ficha = $_POST["num_ficha"];
}else {
	    $num_ficha = 0;//0
}

if (isset($_POST["fecha_creada"])){
		$fecha_creada = $_POST["fecha_creada"];
}else {
	    $fecha_creada = '2000-01-01';//''
}

if (isset($_POST["rut"])){
		$rut = $_POST["rut"];
}else {
	    $rut = '';//''
}

if (isset($_POST["nombres"])){
		$nombres = $_POST["nombres"];
}else {
	    $nombres = '';//''
}

if (isset($_POST["fecha_nac"])){
		$fecha_nac = $_POST["fecha_nac"];
}else {
	    $fecha_nac = '2000-01-01';//''
}

if (isset($_POST["apellidos"])){
		$apellidos = $_POST["apellidos"];
}else {
	    $apellidos = '';//''
}

if (isset($_POST["edad"])){
		$edad = $_POST["edad"];
}else {
	    $edad = 0;//0
}

if (isset($_POST["direccion"])){
		$direccion = $_POST["direccion"];
}else {
	    $direccion = '';//''
}

if (isset($_POST["profesion"])){
		$profesion = $_POST["profesion"];
}else {
	    $profesion = '';//''
}

if (isset($_POST["procedencia"])){
		$procedencia = $_POST["procedencia"];
}else {
	    $procedencia = '';//''
}

if (isset($_POST["escolaridad"])){
		$escolaridad = $_POST["escolaridad"];
}else {
	    $escolaridad = '';//''
}

if (isset($_POST["estado_civil"])){
		$estado_civil = $_POST["estado_civil"];
}else {
	    $estado_civil = '';//''
}

if (isset($_POST["mac"])){
		$mac = $_POST["mac"];
}else {
	    $mac = '';//''
}

if (isset($_POST["genero"])){
		$genero = $_POST["genero"];
}else {
	    $genero = '';//''
}

if (isset($_POST["transfusiones"])){
		$transfusiones = $_POST["transfusiones"];
}else {
	    $transfusiones = '';//''
}

if (isset($_POST["sexo"])){
		$sexo = $_POST["sexo"];
}else {
	    $sexo = '';//''
}

if (isset($_POST["alergia"])){
		$alergia = $_POST["alergia"];
}else {
	    $alergia = '';//''
}

if (isset($_POST["donante"])){
		$donante = $_POST["donante"];
}else {
	    $donante = '';//''
}

if (isset($_POST["observaciones"])){
		$observaciones = $_POST["observaciones"];
}else {
	    $observaciones = '';//''
}

//$ut = new Utiles();
//$ut->addlog("../servicios/msj_updregistro.log","$id_ficha,$num_ficha,$fecha_creada,$rut,$nombres,$fecha_nac,$apellidos,$edad,$direccion,$profesion,$procedencia,$escolaridad,$estado_civil,$mac,$genero,$transfusiones,$sexo,$alergia,$donante,$observaciones \n");

$res = $ficha->updregistro($id_ficha,$num_ficha,$num_ficha_hosp,$fecha_creada,$rut,$nombres,$fecha_nac,$apellidos,$edad,$direccion,$profesion,$procedencia,$escolaridad,$estado_civil,$mac,$genero,$transfusiones,$sexo,$alergia,$donante,$observaciones);

header('Content-Type: text/xml');

if ($res) {
	$ret="1"; 
	$msj="Grabacion Existosa  (ws_updregistro)";
} else {
	$ret="0";
	$msj="ERROR:  (ws_updregistro)";
}
$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
			"<estado>$ret</estado>".
			"<mensaje>$msj</mensaje>".
	   "</resultado>";
  	
print $xml;

