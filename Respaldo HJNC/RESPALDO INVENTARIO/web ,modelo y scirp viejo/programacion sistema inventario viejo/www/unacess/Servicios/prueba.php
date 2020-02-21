<?php
include_once "../clases/Utiles.inc";
include_once "../clases/class.Basedatos.php";

$ut = new Utiles();

$sql = "SELECT rut, fecha FROM datos WHERE id_datos BETWEEN 5001 AND 10186 ";

$bd = new BaseDatos();
$resultado = $bd->ejecutar_sql_archivo($sql);

$arreglodatos = array();
$i=0;
    
while ($res = mysql_fetch_array($resultado)){
    
	  $rut = $arreglodatos[$i]['rut'] = $res['rut'];
	  $fecha = $arreglodatos[$i]['fecha'] = $res['fecha'];
	    
	  $dig = $ut->dv($rut);
	  $cont = strlen($rut);
	  
	  if($cont == 8){
		$rut = substr(number_format("10000".$rut,0,"","."),-10);
	  }else{
		$rut = substr(number_format("10000".$rut,0,"","."),-9);
	  }
	  
	  $sql2 = "INSERT INTO ficha(rut_pac,fecha_ficha)
	  					 VALUES('".$rut.'-'.$dig."','".$fecha."')";
	  
	  $bd->ejecutar_sql_archivo($sql2);
	  
  //echo"consulta : $rut-$dig, $fecha";
 
}




//$rut = '8121231';

//$dig = $ut->dv($rut);
//$rut = $ut->format_rut($rut);

//$cont = strlen($rut);
/*
if($cont == 8){
	$rut = substr(number_format("10000".$rut,0,"","."),-10);
}else{
	$rut = substr(number_format("10000".$rut,0,"","."),-9);
}

echo "rut : $rut-$dig";

*/