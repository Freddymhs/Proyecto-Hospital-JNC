<?
include_once "../clases/class.Mantencion.php";
include_once "../clases/Utiles.inc";


$mant = new Mantencion();



$id_mant = '%';
$unidad = '2';
$usuario = '%';


$res = $mant->get_mantencion($id_mant,$usuario,$unidad);


header('Content-Type: text/xml');

if (sizeof($res)==0) {
	$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
				"<estado>0</estado>".
				"<mensaje>Registros no encontrados  (ws_getmantencion)</mensaje>".
				"<mantenciones>".
					"<mantencion></mantencion>".
				"</mantenciones>".
			"</resultado>";
} else {

		$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?><resultado>".
					"<estado>1</estado>".
					"<mensaje>Resultado encontrados  (ws_getmantencion)</mensaje>".
					"<mantenciones>";
			
        for ($i=0; $i < sizeof($res); $i++){
        
			    $xml.= 	"<mantencion>".
	 							"<id>".$res[$i]['id_mantencion']."</id>".	
	 							"<nombre>".$res[$i]['nombre_usuario']."</nombre>".
	 							"<unidad>".$res[$i]['nombre_unidad']."</unidad>".
	 							"<id>".$res[$i]['fecha_ultima_mantencion']."</id>".
	 							"<id>".$res[$i]['dias_asignados']."</id>".
	 							"<id>".$res[$i]['descripcion']."</id>".
						"</mantencion>";
		}
		
		$xml.= 		"</mantenciones>".
 		        "</resultado>";
}
  	
print $xml;
				
?>