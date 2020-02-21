<?  /* ****************************************************************
* Proyecto SAVIA - GESTA VISION 2005
* http://www.gestavision.cl
* info@gestavision.cl
* Autor: Javier Gallardo Warden
* Fecha: 13/07/2005
*
* Incorpora un serie de utilidades para el sistema
**************************************************************** */


class Utiles {

	function boton_submit($base) {
		/* 	<a onmouseover="changeImages('$base','$bo');return true" onmouseout="changeImages('$base','$bn');return true" href="#"> ... </a>*/
		/* 		$bo = "img/botones/".$base."-over.jpg"; */
		$bn = "img/botones/".$base."-normal.jpg";
		$r1 = <<<BOT1
	<input id="$base" type='image' name="$base" src='$bn' alt='' height='32' width='100' border='0'> 
BOT1;
		return $r1;
}

function boton_link($base) {
	$bn = "img/botones/".$base."-normal.jpg";
	$r1 = <<<BOT1
	<img src='$bn' alt='' border='0' />
BOT1;
	return $r1;
}
function boton_atras($base) {
	$bn = "img/botones/".$base."-normal.jpg";
	$r1 = <<<BOT1
	<a onClick='history.go(-1)' href='#'><img alt='' src='$bn' border='0'></a>
BOT1;
	return $r1;
}

/**
 * Crea boton 'Reset' de formulario
 *
 * @param Formulario de origen (String) $f 
 * @return Boton
 */
function boton_reset($f) {
	$bn = "img/botones/limpiar-normal.jpg";
	$r1 = <<<BOT1
	<a onclick='document.$f.reset();return false;' href='#'><img alt='Limpiar Formulario...' src='$bn' border='0'></a> 
BOT1;
	return $r1;
}

/**
	 * Calcula Digito Verificador de RUT.
	 *
	 * @param int $rut
	 * @return (string) Digito Verificador
	 */
function digito_verif($rut) {
	$d = "765432765432";
	$r =(string) substr(("000000000000" . (string) $rut),-12);
	$s = 0;
	for ($i = 0; $i <= 11; $i++) {
		$s += substr($d,$i,1) * substr($r,$i,1);
	}
	$s = 11 - fmod($s, 11);
	switch ($s) {
		case 10:
		return (string) "K";
		break;

		case 11:
		return (string) "0";
		break;

		default:
		return (string) $s;
		break;
	}
}

/**
	 * Fuerza la carga de la url dada en el parÃ¡metro, esta funciÃ³n incorpora en el cÃ³digo un javascript
	 *
	 * @param String $url: Url que se desea cargar
	 */
function cargar_pagina($url) {
	echo "<script language='JavaScript'>
			 location.href='$url';
			 </script>";
} // Fin cargar_pagina

/**
	 * Muestra un mensaje de alerta usando JavaScript
	 *
	 * @param String msg: Mensaje a ser desplegado
	 */
function alerta($msg) {
	echo "<script language='JavaScript'>
		      alert('$msg');
		      </script>";
} //fin alerta


/**
	 * Vuelve tantas pÃ¡ginas como se indique en el parÃ¡metro
	 *
	 * @param int $pags: NÃºmero de pÃ¡ginas a volver
	 */
function volver_atras($pags) {
	echo "<script language='JavaScript'>
			   history.go($pags);
			 </script>";
} // Fin cargar_pagina

/**
	 * Formatea RUT como 00.000.000
	 *
	 * @param int $rut
	 * @return string
	 */
function format_rut($rut) {
	return  substr(number_format("10000".$rut,0,"","."),-10);
}

/**
	 * Convierte sigla de curso a texto.
	 *
	 * @param varchar(3) $sigla [N]ivel[G]rado[P]aralelo
	 * @param Int $formato ; 0:formato largo (Primero Medio A), 1:formato corto (1º Medio A)
	 * @return (String)
	 */
function curso_sigla_a_nombre($sigla, $formato=0) {
	if ($formato==0) {
		//Formato Largo, por defecto
		$ordin = array("1"=>"Primero","2"=>"Segundo","3"=>"Tercero","4"=>"Cuarto","5"=>"Quinto","6"=>"Sexto","7"=>"Septimo","8"=>"Octavo");
	} else {
		//Formato corto, cualquier valor $formato>0
		$ordin = array("1"=>"1º","2"=>"2º","3"=>"3º","4"=>"4º","5"=>"5º","6"=>"6º","7"=>"7º","8"=>"8º");
	}
	$grado = array("M"=>"Medio","B"=>"B&aacute;sico");
	return $ordin[substr($sigla,1,1)] . " " . $grado[substr($sigla,0,1)] . " ".substr($sigla,2,1)."";
}


/**
 * Retorna un array con los doce formatos para las alternativas
 * @param Int formato : puede tomar los siguientes valores, 0:viñetas, 1:números, 2:letras, 3:Romanos, por defecto se devuelve viñetas
 *
 * 
 */
function formato_alternativas($formato=0) {
	switch ($formato) {
		case 0: $arr = array('*','*','*','*','*','*','*','*','*','*','*','*');break;
		case 1: $arr = array('1)','2)','3)','4)','5)','6)','7)','8)','9)','10)','11)','12)');break;
		case 2: $arr = array('a)','b)','c)','d)','e)','f)','g)','h)','i)','j)','k)','l)');break;
		case 3: $arr = array('i)','ii)','iii)','iv)','v)','vi)','vii)','viii)','ix)','x)','xi)','xii)');break;
		
	}
	return $arr;
}

/**
 * Toma el Valor, si es Nulo, o UnSet o "" entrega 0, de lo contrario devuelve el Número
 *
 * @param Numero (Int, Float) $valor
 * @return Int : 0 o el mismo valor.
 */
function asignar_cero_si_es_unset($valor) {
	if (! isset($valor) OR $valor=="" OR is_null($valor)) 
		return 0;
	else 
		return $valor;
}
/**
 * Retorna la edad partiendo de una fecha dada en el formato dd-mm-aaaa
 *
 * @param String $fecha (dd-mm-aaaa)
 * @return Int
 */

function edad($fecha) { 
    $fecha_n = explode('-', $fecha); 
    $edad = floor(((date('Y') - $fecha_n[2]) * 372 + (date('m') - $fecha_n[1]) * 31 + date('d') - $fecha_n[0]) / 372) ; 
    return $edad; 
} 


function get_tabla($datos, $style_file='default.sty') {
	//$datos es un arreglo de dos dimensiones $datos[filas][columnas]
	//puedo contar las columnas haciendo $elementos = count($datos[fila_n]);
	include_once("styles/$style_file");
	
	
	$trs = count($datos);
		//Cantidad de Filas	
	$tds = count($datos[0]);
		//Cantidad de Columnas
		
	$tabla  = "<table align='center' style='$style_table' cellspacing=0>";
	
	$tabla .= "<tr style='$style_tr_header'>";
		for ($y=0; $y<$tds; $y++) {
			//Agregar las cabeceras
			$tabla .= "<th style='$style_th'>".$datos[0][$y]."</th>";
		}
	$tabla .= "</tr>";
	
	for ($x=1; $x<$trs; $x++) {
		//Agregar los demas TRs
		if (($x%2)==0) {
			//Fila Par
			$tabla .= "<tr style='$style_tr_par'>";
		} else {
			//Fila Impar
			$tabla .= "<tr style='$style_tr_impar'>";
		}
		
		//Agrega la primera columna de cada fila
		$tabla .= "<td style='$style_td_primera'>".$datos[$x][0]."</td>";
		for ($y=1; $y<$tds; $y++) {
			//Agregar los datos de las demás columnas
			$tabla .= "<td style='$style_td_dato'>".$datos[$x][$y]."</td>";
		}
		$tabla .= "</tr>";
	}
	$tabla .= "</table>";
	return $tabla;
	
}

/**
 * Toma una fecha en format yyyy-mm-dd y la devuelve como dd-mm-yyyy
 *
 * @param String $fecha en formato yyyy-mm-dd
 */
public function reviertefecha($fecha) {
	$nf = substr($fecha,8,2)."/".substr($fecha,5,2)."/".substr($fecha,0,4);
	return $nf;
}

/**
 * Toma una fecha en format dd-mm-yyyy  y la devuelve como yyyy-mm-dd
 *
 * @param String $fecha en formato yyyy-mm-dd
 */
public function reviertefecha2($fecha) {
	$nf = substr($fecha,8,2)."-".substr($fecha,5,2)."-".substr($fecha,0,4);
	return $nf;
}
/**
 * Toma una fecha en format d-m-yyyy	
 *
 * @param String $fecha en formato yyyy-mm-dd
 */
public function reviertefecha3($fecha) {
	$nf = substr($fecha,6,4)."-".substr($fecha,3,2)."-".substr($fecha,0,2);
	return $nf;
}
/**
 * Toma una fecha en format dd-mm-yyyy	
 *
 * @param String $fecha en formato yyyy-mm-dd
 */
public function reviertefecha4($fecha) {
	$nf = substr($fecha,6,4)."-".substr($fecha,3,2)."-".substr($fecha,0,2);
	return $nf;
}

/**
 * Toma una Hora en format 00:00:00 y la devuelve como 00:00
 *
 * @param String $hora en formato 00:00:00
 */
public function hora($hora) {
	$res = substr($hora,0,5);
	return $res;
}
/**
 * Toma una fecha en format0 dd-mm-yyyy y la devuelve como yyyy-mm-dd
 *
 * @param String $fecha en formato dd-mm-yyyy
 */
public function inviertefecha($fecha) {
	$nf = substr($fecha,6,4)."/".substr($fecha,3,2)."/".substr($fecha,0,2);
	return $nf;
}
/**
 * Toma un rut sin digito verificador 15695496 y devuelve el digito verificador
 *
 * @param Int $rut
 */
function dv($r){
	$s=1;for($m=0;$r!=0;$r/=10)
	$s=($s+$r%10*(9-$m++%6))%11;
	return chr($s?$s+47:75);
}

public function addlog($file, $msj) {
			if (file_exists($file)) {
				//Si existe el archivo, lo abre
				$fs = fopen($file,"a+");
				fwrite($fs,$msj);
				fclose($fs);
			} else {
				//Si el archivo no existe se crea y es la primera visita
				$fs = fopen($file,"w");
				// y le graba el valor 1
				fwrite($fs,"");
				fclose($fs);
			}
} //end addlog



} //Fin clase&