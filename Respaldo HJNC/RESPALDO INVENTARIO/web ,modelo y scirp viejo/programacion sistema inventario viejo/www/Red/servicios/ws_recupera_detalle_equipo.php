<?php

include_once "../clases/class.Inventario_pc.php";
include_once "../clases/Utiles.inc";

$inv = new Inventario_pc();
				
if (isset($_POST["mac"]))
{		$mac = $_POST["mac"];
}else {
		$mac = '0';//
}

$res = $inv->get_detalleequipo($mac);


if (sizeof($res)==0) {
	$xml="<?xml version='1.0' encoding='ISO-8859-1'?>";
	$xml.="<datos>";
	 $xml.="<ip>0</ip>";
	$xml.="</datos>";
	header("Content-type: text/xml");
}	
else{
	$xml="<?xml version='1.0' encoding='ISO-8859-1'?>";
	$xml.="<datos>";

  		for ($i=0; $i < sizeof($res); $i++){

		$xml.="<ip>".$res[$i]['ip']."</ip>";
		$xml.="<serie_monitor>".$res[$i]['serie_monitor']."</serie_monitor>";
		$xml.="<grupo_trabajo>".$res[$i]['grupo_trabajo']."</grupo_trabajo>";
		$xml.="<nombre_unidad>".$res[$i]['nombre_unidad']."</nombre_unidad>";
		$xml.="<netbios>".$res[$i]['netbios']."</netbios>";
		$xml.="<modelo_pc>".$res[$i]['modelo_pc']."</modelo_pc>";
		$xml.="<serie_pc>".$res[$i]['serie_pc']."</serie_pc>";
		$xml.="<nombre_usuario>".$res[$i]['nombre_usuario']."</nombre_usuario>";
		$xml.="<modelo_mon>".$res[$i]['modelo_monitor']."</modelo_mon>";
		$xml.="<procesador>".$res[$i]['procesador']."</procesador>";
		$xml.="<disco_duro>".$res[$i]['disco_duro']."</disco_duro>";
		$xml.="<ram>".$res[$i]['ram']."</ram>";

	$xml.="</datos>";
	header("Content-type: text/xml");
  }
}

echo $xml;

?>