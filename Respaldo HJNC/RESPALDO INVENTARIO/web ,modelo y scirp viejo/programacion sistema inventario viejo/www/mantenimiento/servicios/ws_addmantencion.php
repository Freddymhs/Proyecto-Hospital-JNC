<?

include_once "../clases/class.Mantencion.php";
include_once "../clases/Utiles.inc";

$mant = new Mantencion();

if (isset($_POST["mac"]))
{		$mac = $_POST["mac"];
}else {
	    $mac = "";//""
}

if (isset($_POST["unidad"]))
{		$unidad = $_POST["unidad"];
}else {
	    $unidad = '';//''
}

if (isset($_POST["usuario"]))
{		$usuario = $_POST["usuario"];
}else {
	    $usuario = '';//''
}

if (isset($_POST["tecnico"]))
{		$tecnico = $_POST["tecnico"];
}else {
	    $tecnico = '';//''
}

if (isset($_POST["mant_prev"]))
{		$mant_prev = $_POST["mant_prev"];
}else {
	    $mant_prev = '';//''
}

if (isset($_POST["mant_correct"]))
{		$mant_correct = $_POST["mant_correct"];
}else {
	    $mant_correct;//''
}

if (isset($_POST["dias"]))
{		$dias = $_POST["dias"];
}else {
	    $dias = 0;//0
}

$res = $mant->add_mantecion($mac,$unidad,$usuario,$tecnico,$mant_prev,$mant_correct,$dias);

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