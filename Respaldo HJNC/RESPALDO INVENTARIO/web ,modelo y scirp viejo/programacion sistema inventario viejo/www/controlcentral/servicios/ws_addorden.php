<?php
include_once "../clases/class.Orden.php";
include_once "../clases/Utiles.inc";

$orden = new Orden();

if (isset($_POST["unidad"]))
{		$id_unidad = $_POST["unidad"];
}else {
	    $id_unidad = 0;//0
}

if (isset($_POST["operador"]))
{		$id_operador = $_POST["operador"];
}else {
	    $id_operador = 0;//0
}

if (isset($_POST["turno"]))
{		$turno = $_POST["turno"];
}else {
	    $turno = '';//''
}

if (isset($_POST["problema"]))
{		$problema = $_POST["problema"];
}else {
	    $problema = '';//''
}


//$ut = new Utiles();
//$ut->addlog("../servicios/msj_addorden.log","$sql\n result : $id_unidad, $id_operador, $turno, $problema\n");

$res = $orden->add_orden($id_unidad,$id_operador,$turno,$problema);


header('Content-Type: text/xml');

if($res[0]['respuesta']==1){
	$ret= $res[0]['respuesta'];
	$id = $res[1]['id'];
	$msj= "Grabacion Existosa  (ws_addsolicitud)";
}else{
	$ret="0";
	$msj="ERROR:  (ws_addsolicitud)";
	$id = 0;
}


$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>
			<estado>$ret</estado>
			<mensaje>$msj</mensaje>
			<id>$id</id>
		</resultado>";

print $xml;
?>
