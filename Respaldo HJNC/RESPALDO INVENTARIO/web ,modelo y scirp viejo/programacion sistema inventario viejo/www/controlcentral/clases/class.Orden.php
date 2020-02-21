<?php

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * Clase Orden
 **/

/**
 * Llamada clase Basedato
 **/
 include("class.Basedato.php");

class Orden{
	
	// --- ATTRIBUTES ---
    
    /**
     * Short description of attribute id_orden
     *
     * @access public
     * @var smallint
     */
    public $id_orden = 0;
    
    /**
     * Short description of attribute id_unidad
     *
     * @access public
     * @var smallint
     */
    public $id_unidad = 0;
    
    /**
     * Short description of attribute id_detalle
     *
     * @access public
     * @var smallint
     */
    public $id_detalle = 0;
    
    /**
     * Short description of attribute id_operador
     *
     * @access public
     * @var smallint
     */
    public $id_operador = 0;
    
    /**
     * Short description of attribute turno
     *
     * @access public
     * @var string
     */
    public $turno = '';
	
	/**
     * Short description of attribute problema
     *
     * @access public
     * @var string
     */
    public $problema = '';
	
    /**
     * Short description of attribute estado
     *
     * @access public
     * @var string
     */
    public $estado = '';
    
    /**
     * Short description of attribute fecha
     *
     * @access public
     * @var date
     */
    public $fecha_inicio = '1900-01-01';
    
    /**
     * Short description of attribute hora
     *
     * @access public
     * @var string
     */
    public $hora = '00:00';
    
    
    // --- OPERATIONS ---
    
    
    /**
	 * Agrega una nueva orden de trabajo al sistema
	 *
	 * @param $id_unidad,$id_operador,$turno,$problema
	 * @name add_orden
	 * @return Orden[]
	 */
    function add_orden($id_unidad,$id_operador,$turno,$problema){
    	
    	$sql="INSERT INTO orden (id_unidad,id_operador,turno,problema,estado,fecha_inicio,hora_inicio)
    					  VALUES(".$id_unidad.",".$id_operador.",'".$turno."','".$problema."','Ingresada',CURDATE(),CURTIME())";
    	
    	//$ut = new Utiles();
		//$ut->addlog("../servicios/msj_add_solicitud.log","$sql\n result : $sql\n");
    	
    	$bd = new Basedato();
    	$resultado = $bd->ejecutar_sql_archivo($sql);
		$id = mysql_insert_id();
		
		$arreglo_resultado = array();
		
		if($resultado==1){
			$arreglo_resultado[0]['respuesta'] = 1;
			$arreglo_resultado[1]['id'] = $id;
		}else{
			$arreglo_resultado[0]['respuesta'] = 0;
		}
		
		return $arreglo_resultado;
    	
    }
    
    /**
	 * Retorna todas las ordenes del turno dia
	 *
	 * @param $fecha
	 * @name get_ordenturnodia
	 * @return $arreglodatos
	 */
    function get_ordenturnodia($fecha){
    	
    	$sql = "SELECT orden.id_orden, orden.fecha_inicio, unidad.nombre_unidad, orden.estado,
					   operador.nombre_operador, orden.problema
				FROM orden
					Left Join detalle_orden ON detalle_orden.id_detalle = orden.id_detalle
					Inner Join unidad ON unidad.id_unidad = orden.id_unidad
					Inner  Join operador ON operador.id_operador = orden.id_operador
				WHERE orden.turno = '08:00-20:00'
					AND orden.fecha_inicio = '".$fecha."'
				    AND orden.estado IN ('Ingresada', 'Pendiente', 'Realizada')";
    	
    	$bd = new Basedato();
    	$resultado = $bd->ejecutar_sql_archivo($sql);
    	
    	$arreglodatos = array();
    	$i=0;
    	
    	while($res = mysql_fetch_array($resultado)){
    		
    		$arraglodatos[$i]['id_orden'] = $res['id_orden'];
    		$arraglodatos[$i]['fecha_inicio'] = $res['fecha_inicio'];
    		$arraglodatos[$i]['nombre_unidad'] = $res['nombre_unidad'];
    		$arraglodatos[$i]['estado'] = $res['estado'];
    		$arraglodatos[$i]['nombre_operador'] = $res['nombre_operador'];
    		$arraglodatos[$i++]['problema'] = $res['problema'];
    	}
    	
    	return $arraglodatos;
    	
    }
    
/**
	 * Retorna todas las ordenes del turno noche
	 *
	 * @param $fecha
	 * @name get_ordenturnonoche
	 * @return $arreglodatos
	 */
    function get_ordenturnonoche($fecha){
    	
    	$sql = "SELECT orden.id_orden, orden.fecha_inicio, unidad.nombre_unidad, orden.estado,
					   operador.nombre_operador, orden.problema
				FROM orden
					Left Join detalle_orden ON detalle_orden.id_detalle = orden.id_detalle
					Inner Join unidad ON unidad.id_unidad = orden.id_unidad
					Inner  Join operador ON operador.id_operador = orden.id_operador
				WHERE orden.turno = '20:00-08:00'
					AND orden.fecha_inicio = '".$fecha."'
				    AND orden.estado IN ('Ingresada','Pendiente', 'Realizada')";
    	
    	$bd = new Basedato();
    	$resultado = $bd->ejecutar_sql_archivo($sql);
    	
    	$arreglodatos = array();
    	$i=0;
    	
    	while($res = mysql_fetch_array($resultado)){
    		
    		$arraglodatos[$i]['id_orden'] = $res['id_orden'];
    		$arraglodatos[$i]['fecha_inicio'] = $res['fecha_inicio'];
    		$arraglodatos[$i]['nombre_unidad'] = $res['nombre_unidad'];
    		$arraglodatos[$i]['estado'] = $res['estado'];
    		$arraglodatos[$i]['nombre_operador'] = $res['nombre_operador'];
    		$arraglodatos[$i++]['problema'] = $res['problema'];
    	}
    	
    	return $arraglodatos;
    	
    }
    
    /* Retorna la orden especificada pro su id
	 *
	 * @param $id_orden
	 * @name get_ordenid
	 * @return $arreglodatos
	 */
    function get_ordenid($id_orden){
    	
    	$sql = "SELECT orden.id_orden, unidad.nombre_unidad, orden.turno, operador.nombre_operador, orden.problema,
					   orden.fecha_inicio, orden.hora_inicio, orden.estado, detalle_orden.solucion, detalle_orden.fecha_fin,
					   detalle_orden.hora_fin
				FROM orden
					 Left Join detalle_orden ON detalle_orden.id_detalle = orden.id_detalle
					 Inner Join unidad ON unidad.id_unidad = orden.id_unidad
					 Inner  Join operador ON operador.id_operador = orden.id_operador
				WHERE orden.id_orden = ".$id_orden." ";
    	
    	$bd = new Basedato();
    	$resultado = $bd->ejecutar_sql_archivo($sql);
    	
    	$arreglodatos = array();
    	$i = 0;
    	
    	while($res = mysql_fetch_array($resultado)){
    		
    		$arreglodatos[$i]['id_orden'] = $res['id_orden'];
    		$arreglodatos[$i]['nombre_unidad'] = $res['nombre_unidad']; 
    		$arreglodatos[$i]['turno'] = $res['turno']; 
    		$arreglodatos[$i]['nombre_operador'] = $res['nombre_operador']; 
    		
    		//CORTA LA CADENA EN 10 PARTES DE 50 CARACTERES
			$texto1 = substr($res['problema'],0,50);
			$texto2 = substr($res['problema'],50,50);
			$texto3 = substr($res['problema'],100,50);
			$texto4 = substr($res['problema'],150,50);
			$texto5 = substr($res['problema'],200,50);
			$texto6 = substr($res['problema'],250,50);
			$texto7 = substr($res['problema'],300,50);
			$texto8 = substr($res['problema'],350,50);
			$texto9 = substr($res['problema'],400,50);
			$texto10 = substr($res['problema'],450,50);
			$texto11 = substr($res['problema'],500,50);
    		
			$arreglodatos[$i]['problema'] = $texto1;
			$arreglodatos[$i]['problema1'] = $texto2;
			$arreglodatos[$i]['problema2'] = $texto3;
			$arreglodatos[$i]['problema3'] = $texto4;
			$arreglodatos[$i]['problema4'] = $texto5;
			$arreglodatos[$i]['problema5'] = $texto6;
			$arreglodatos[$i]['problema6'] = $texto7;
			$arreglodatos[$i]['problema7'] = $texto8;
			$arreglodatos[$i]['problema8'] = $texto9;
			$arreglodatos[$i]['problema9'] = $texto10;
			$arreglodatos[$i]['problema10'] = $texto11;
    		
    		$arreglodatos[$i]['fecha_inicio'] = $res['fecha_inicio']; 
    		$arreglodatos[$i]['hora_inicio'] = $res['hora_inicio']; 
    		$arreglodatos[$i]['estado'] = $res['estado']; 
    		
    		//CORTA LA CADENA EN 10 PARTES DE 50 CARACTERES
			$texto1 = substr($res['solucion'],0,50);
			$texto2 = substr($res['solucion'],50,50);
			$texto3 = substr($res['solucion'],100,50);
			$texto4 = substr($res['solucion'],150,50);
			$texto5 = substr($res['solucion'],200,50);
			$texto6 = substr($res['solucion'],250,50);
			$texto7 = substr($res['solucion'],300,50);
			$texto8 = substr($res['solucion'],350,50);
			$texto9 = substr($res['solucion'],400,50);
			$texto10 = substr($res['solucion'],450,50);
			$texto11 = substr($res['solucion'],500,50);
    		
			$arreglodatos[$i]['solucion'] = $texto1;
			$arreglodatos[$i]['solucion1'] = $texto2;
			$arreglodatos[$i]['solucion2'] = $texto3;
			$arreglodatos[$i]['solucion3'] = $texto4;
			$arreglodatos[$i]['solucion4'] = $texto5;
			$arreglodatos[$i]['solucion5'] = $texto6;
			$arreglodatos[$i]['solucion6'] = $texto7;
			$arreglodatos[$i]['solucion7'] = $texto8;
			$arreglodatos[$i]['solucion8'] = $texto9;
			$arreglodatos[$i]['solucion9'] = $texto10;
			$arreglodatos[$i]['solucion10'] = $texto11;
    		
    		/*$arreglodatos[$i]['solucion'] = $res['solucion'];*/ 
    		
    		$arreglodatos[$i]['fecha_fin'] = $res['fecha_fin']; 
    		$arreglodatos[$i++]['hora_fin'] = $res['hora_fin']; 
    		
    	}
    	
    	return $arreglodatos;
    	  	
    }
    
     /**
	 * Agrega el Detalle de una Orden
	 *
	 * @param $id_orden,$solucion,$fecha_fin,$hora,$estado
	 * @name add_ordendetalle
	 * @return $respuesta
	 */
    function add_ordendetalle($id_orden,$solucion,$fecha_fin,$hora,$estado){
    	
    	//** LLAMO FUNCION VER_ORDENDETALLE **//
    	$ord = new Orden();
    	$res = $ord->ver_ordendetalle($id_orden);
    	$existe = $res['existe'];
    	$id_orddet = $res['id_detalle'];
    	
    	if($existe==0){
    		//** EL DETALLE DE LA ORDEN NO EXISTE **//
    		$sql = "INSERT INTO detalle_orden(solucion,fecha_fin,hora_fin)
								       VALUES('".$solucion."','".$fecha_fin."','".$hora."')";
	    	
	    	$bd = new Basedato();
	    	$bd->ejecutar_sql_archivo($sql);
	    	$id_orddet = mysql_insert_id();
    	}
    	if($existe==1){
	    	//** EL DETALLE DE LA ORDEN EXISTE **//
	    	$ord->upd_detalleorden($id_orddet,$solucion,$fecha_fin,$hora);
    	}
    	
    	$resultado = $ord->upd_orden($id_orden,$id_orddet,$estado);
    	
    	return $resultado;
    	
    }
    
    /**
	 * Actualiza el estado de una Orden
	 *
	 * @param $id_orden,$id_orddet,$estado
	 * @name upd_orden
	 * @return $respuesta
	 */
    function upd_orden($id_orden,$id_orddet,$estado){
    	
    	$sql = "UPDATE orden SET id_detalle = ".$id_orddet.", estado = '".$estado."'
				WHERE id_orden = ".$id_orden." ";
    	
    	$bd = new Basedato();
    	$resultado = $bd->ejecutar_sql_archivo($sql);
    	
    	return $resultado;
    	
    }
    
/**
	 * Actualiza la solucion, fecha, hora de un DetalleOrden
	 *
	 * @param $id_orddet,$solucion,$fecha_fin,$hora
	 * @name upd_detalleorden
	 * @return bolean
	 */
    function upd_detalleorden($id_orddet,$solucion,$fecha_fin,$hora){
    	
    	$sql = "UPDATE detalle_orden SET solucion = '".$solucion."', fecha_fin = '".$fecha_fin."', hora_fin = '".$hora."' 
    			WHERE id_detalle = ".$id_orddet." ";
    	
    	$bd = new Basedato();
    	$resultado = $bd->ejecutar_sql_archivo($sql);
    	
    	return $resultado;
    }
    
 	/**
	 * Verifica si la detalle de la orden existe.
	 *
	 * @param $id_orden
	 * @name ver_ordendetalle
	 * @return bolean
	 */
    function ver_ordendetalle($id_orden){
    	
    	$sql = "SELECT CASE WHEN orden.id_detalle THEN 1 ELSE 0 END existe, detalle_orden.id_detalle
				FROM orden,detalle_orden
				WHERE orden.id_orden = ".$id_orden." ";
				    	
    	$bd = new Basedato();
    	$resultado = $bd->ejecutar_sql_archivo($sql);
    	$res = mysql_fetch_array($resultado);
    	
    	$arreglodatos = array();
    	$arreglodatos['existe'] = $res['existe'];   
    	$arreglodatos['id_detalle'] = $res['id_detalle']; 
    	
    	return $arreglodatos;
    }
    
    
    
    
    
}