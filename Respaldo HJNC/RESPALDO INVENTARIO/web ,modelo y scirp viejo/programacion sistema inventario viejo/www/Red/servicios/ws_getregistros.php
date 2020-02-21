<?
include_once "../clases/class.Inventario_pc.php";
include_once "../clases/Utiles.inc";

$inv = new Inventario_pc();

if (isset($_GET["mac"]))
{		
		$mac = $_GET["mac"];
}else {
		$mac = '1';//1
}

$res = $inv->get_inventarioall($mac);

for ($i=0; $i < sizeof($res); $i++){
							
								echo"<tr>";
									//echo"<td>".$res[$i]['id_solicitud']."</td>";
echo "<td><a style=\"text-decoration:underline;cursor:pointer;\" onclick=\"enviar_datos('".$res[$i]['id_inventario']."')\">".$res[$i]['id_inventario']."</a></td>";
									echo"<td>".$res[$i]['ip']."</td>";
									echo"<td>".$res[$i]['mac']."</td>";
									echo"<td>".$res[$i]['nombre_unidad']."</td>";
									echo"<td>".$res[$i]['red']."</td>";
									echo"<td>".$res[$i]['nombre_usuario']."</td>";
									echo"<td>".$res[$i]['grupo_trabajo']."</td>";
									echo"<td>".$res[$i]['netbios']."</td>";
									echo"<td>".$res[$i]['impresora']."</td>";
								echo"</tr>";
							
							}
?>