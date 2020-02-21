<?php

include_once "../clases/class.Orden.php";
include_once "../clases/Utiles.inc";


$ord= new Orden();


$fecha = "2010-12-13";


$res = $ord->get_ordenturnodia($fecha);

header('Content-Type: text/xml');

if (sizeof($res)==0) {
	$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
				"<estado>0</estado>".
				"<mensaje>Registros no encontrados  (ws_getordenturnodia)</mensaje>".
				"<orden>".
					"<ordenes></ordenes>".
				"</orden>".
			"</resultado>";
} else {

		$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
					"<estado>1</estado>".
					"<mensaje>Resultado encontrados  (ws_getordenturnodia)</mensaje>".
					"<orden>";
			
        for ($i=0; $i < sizeof($res); $i++){
        
			    $xml.= 	"<ordenes>".
	 							"<id_orden>".$res[$i]['id_orden']."</id_orden>".	
	 							"<fecha_inicio>".$res[$i]['fecha_inicio']."</fecha_inicio>".
			    				"<nombre_unidad>".$res[$i]['nombre_unidad']."</nombre_unidad>".	
	 							"<estado>".$res[$i]['estado']."</estado>".
			    				"<nombre_operador>".$res[$i]['nombre_operador']."</nombre_operador>".	
	 							"<problema>".$res[$i]['problema']."</problema>".
						"</ordenes>";
		}
		
		$xml.= 		"</orden>".
 		        "</resultado>";
}
  	
print $xml;



