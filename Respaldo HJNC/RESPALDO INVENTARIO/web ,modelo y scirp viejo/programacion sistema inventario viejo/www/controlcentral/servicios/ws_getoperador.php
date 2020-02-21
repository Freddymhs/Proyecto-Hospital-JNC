<?php

include_once "../clases/class.Operador.php";
include_once "../clases/Utiles.inc";


$operario = new Operador();

$res = $operario->get_operador();

header('Content-Type: text/xml');

if (sizeof($res)==0) {
	$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
				"<estado>0</estado>".
				"<mensaje>Registros no encontrados  (ws_operador)</mensaje>".
				"<operadores>".
					"<operador></operador>".
				"</operadores>".
			"</resultado>";
} else {

		$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
					"<estado>1</estado>".
					"<mensaje>Resultado encontrados  (ws_operador)</mensaje>".
					"<operadores>";
			
        for ($i=0; $i < sizeof($res); $i++){
        
			    $xml.= 	"<operador>".
	 							"<idoperador>".$res[$i]->id_operador."</idoperador>".	
	 							"<nombreoperador>".$res[$i]->nombre_operador."</nombreoperador>".
						"</operador>";
		}
		
		$xml.= 		"</operadores>".
 		        "</resultado>";
}
  	
print $xml;


?>