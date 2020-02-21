<?php

include_once "../clases/class.Orden.php";
include_once "../clases/Utiles.inc";

$ut = new Utiles();
$ord = new Orden();

if (isset($_POST["id"]))
{		$id_orden = $_POST["id"];
}else {
	    $id_orden = 0;//0
}

if (isset($_POST["solucion"]))
{		$solucion = $_POST["solucion"];
}else {
	    $solucion = '';//''
}

if (isset($_POST["fecha_fin"]))
{		$fecha_fin = $_POST["fecha_fin"];
		$fecha_fin = $ut->reviertefecha3($fecha_fin);
}else {
	    $fecha_fin = '';//''
}

if (isset($_POST["caja"]))
{		$hora = $_POST["caja"];
}else {
	    $hora = '';//''
}

if (isset($_POST["estado"]))
{		$estado = $_POST["estado"];
}else {
	    $estado = '';//''
}

//$ut->addlog("../servicios/msj_updorden.log","result : $id_orden, $solucion, $fecha_fin,$hora, $estado\n");

$res = $ord->add_ordendetalle($id_orden,$solucion,$fecha_fin,$hora,$estado);

//$ut->addlog("../servicios/msj_updorden.log","xml es : $res \n");

header('Content-Type: text/xml');

if($res == 1) {
	$ret="1"; 
	$msj="Grabacion Existosa  (add_ordendetalle)";
} else {
	$ret="0";
	$msj="ERROR:  (add_ordendetalle)";
}
$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
			"<estado>$ret</estado>".
			"<mensaje>$msj</mensaje>".
	   "</resultado>";
  	
print $xml;

?>