<?
include_once "../clases/class.Unidad.php";
include_once "../clases/Utiles.inc";


$unidad = new Unidad();

$res = $unidad->get_unidad();

header('Content-Type: text/xml');

if (sizeof($res)==0) {
	$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
				"<estado>0</estado>".
				"<mensaje>Registros no encontrados  (ws_getunidad)</mensaje>".
				"<unidades>".
					"<unidad></unidad>".
				"</unidades>".
			"</resultado>";
} else {

		$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
					"<estado>1</estado>".
					"<mensaje>Resultado encontrados  (ws_getunidad)</mensaje>".
					"<unidades>";
			
        for ($i=0; $i < sizeof($res); $i++){
        
			    $xml.= 	"<unidad>".
	 							"<idunidad>".$res[$i]->id_unidad."</idunidad>".	
	 							"<nomunidad>".$res[$i]->unidad_nombre."</nomunidad>".
						"</unidad>";
		}
		
		$xml.= 		"</unidades>".
 		        "</resultado>";
}
  	
print $xml;
?>