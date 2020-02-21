<?

include_once "../clases/class.Inventario_pc.php";
include_once "../clases/Utiles.inc";


$inv = new Inventario_pc();

if (isset($_POST["evento"]))
{		$evento = $_POST["evento"];
}else {
    	$evento = 0;//0
}

if (isset($_POST["username"]))
{		$username = $_POST["username"];
}else {
    	$username = 0;//0
}

if (isset($_POST["id"]))
{		$id = $_POST["id"];
}else {
    	$id = 0;//0
}

if (isset($_POST["ip"]))
{		$ip = $_POST["ip"];
}else {
	    $ip = 0;//0
}

if (isset($_POST["mac"]))
{		$mac = $_POST["mac"];
}else {
	    $mac = '';//''
}

if (isset($_POST["red"]))
{		$red = $_POST["red"];
}else {
	    $red = 0;//0
}

if (isset($_POST["grupo"]))
{		$grupo = $_POST["grupo"];
}else {
	    $grupo = '';//''
}

if (isset($_POST["unidad"]))
{		$id_unidad = $_POST["unidad"];
}else {
	    $id_unidad = '';//''
}

if (isset($_POST["net"]))
{		$net = $_POST["net"];
}else {
	    $net = '';//''
}

if (isset($_POST["usuario"]))
{		$usuario = $_POST["usuario"];
}else {
	    $usuario = '';//''
}

if (isset($_POST["impresora"]))
{		$impresora = $_POST["impresora"];
}else {
	    $impresora = '';//0
}

if (isset($_POST["telefono"]))
{		$telefono = $_POST["telefono"];
}else {
	    $telefono = 0;//0
}

if (isset($_POST["establecimiento"])){
		$establecimiento = $_POST["establecimiento"];
}else { 
		$establecimiento = '';//''
}

if (isset($_POST["serie_pc"])){
		$serie_pc = $_POST["serie_pc"];
}else {
	    $serie_pc = 0;//0
}

if (isset($_POST["serie_monitor"])){
		$serie_monitor = $_POST["serie_monitor"];
}else {
	    $serie_monitor = 0;//0
}

if (isset($_POST["modelo_pc"])){
		$modelo_pc = $_POST["modelo_pc"];
}else {
	    $modelo_pc = '';//''
}

if (isset($_POST["modelo_mon"])){
		$modelo_mon = $_POST["modelo_mon"];
}else {
	    $modelo_mon = '';//0
}

if (isset($_POST["procesador"])){
		$procesador = $_POST["procesador"];
}else {
	    $procesador = '';//0
}

if (isset($_POST["disco_duro"])){
		$disco_duro = $_POST["disco_duro"];
}else {
	    $disco_duro = '';//0
}

if (isset($_POST["ram"])){
		$ram = $_POST["ram"];
}else {
	    $ram = 0;//0
}

//$ut = new Utiles();
//$ut->addlog("msj_updregistro.log","$evento,$id,$id_unidad,$red,$ip,$mac,$net,$grupo,$usuario,$impresora,$telefono,$establecimiento,$serie_pc,$serie_monitor,$modelo_pc,$modelo_mon,$procesador,$disco_duro,$ram\n");

$res = $inv->upd_inventario($id,$id_unidad,$red,$ip,$mac,$net,$grupo,$usuario,$impresora,$telefono,$establecimiento,$serie_pc,$serie_monitor,$modelo_pc,$modelo_mon,$procesador,$disco_duro,$ram,$evento,$username);

header('Content-Type: text/xml');

if ($res) {
	$ret="1"; 
	$msj="Grabacion Existosa  (ws_updinventario)";
} else {
	$ret="0";
	$msj="ERROR:  (ws_updinventario)";
}
$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
			"<estado>$ret</estado>".
			"<mensaje>$msj</mensaje>".
	   "</resultado>";
  	
print $xml;

?>