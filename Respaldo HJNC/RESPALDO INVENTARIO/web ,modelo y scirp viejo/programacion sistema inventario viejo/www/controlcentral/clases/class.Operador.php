<?php
if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * Clase Unidad
 **/

/**
 * Llamada clase Basedato
 **/
 include("class.Basedato.php");

class Operador{
	
	// --- ATTRIBUTES ---
    
    /**
     * Short description of attribute id_operador
     *
     * @access public
     * @var smallint
     */
    public $id_operador = 0;
    
    /**
     * Short description of attribute nombre_operador
     *
     * @access public
     * @var string
     */
    public $nombre_operador = '';
    
    
    
	// --- OPERATIONS ---
	
	
	/**
	 * Busca todas los Operadores del Hospital
	 *
	 * @param 
	 * @name get_operador
	 * @return Operador[]
	 */
	function get_operador(){
		
		$sql = "SELECT id_operador, nombre_operador
				FROM operador
				ORDER BY nombre_operador ASC";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i] = new Operador();
			$arreglodatos[$i]->id_operador = $res['id_operador'];
			$arreglodatos[$i++]->nombre_operador = $res['nombre_operador'];
			
		}
		
		return $arreglodatos;
		
	}
	
	
	
	
}