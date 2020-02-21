<?php

include_once "../clases/class.TipoExamen.php";
include_once "../clases/Utiles.inc";


$tipo = new TipoExamen();

$res = $tipo->get_tipoExamen();

header('Content-Type: text/xml');

if (sizeof($res)==0) {
	$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
				"<estado>0</estado>".
				"<mensaje>Registros no encontrados  (ws_getTipoExamenes)</mensaje>".
				"<examenes>".
					"<examen></examen>".
				"</examenes>".
			"</resultado>";
} else {

		$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
					"<estado>1</estado>".
					"<mensaje>Resultado encontrados  (ws_getTipoExamenes)</mensaje>".
					"<examenes>";
			
        for ($i=0; $i < sizeof($res); $i++){
        
			    $xml.= 	"<examen>".
	 							"<idexamen>".$res[$i]->id_tipoexamen."</idexamen>".	
	 							"<nomexamen>".$res[$i]->tipoexamen_nombre."</nomexamen>".
						"</examen>";
		}
		
		$xml.= 		"</examenes>".
 		        "</resultado>";
}
  	
print $xml;