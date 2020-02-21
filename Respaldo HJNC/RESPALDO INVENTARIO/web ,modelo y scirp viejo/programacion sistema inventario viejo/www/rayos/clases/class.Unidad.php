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
 include("class.Basedatos.php");

class Unidad
{
    // --- ATTRIBUTES ---
    
    /**
     * Short description of attribute id_unidad
     *
     * @access public
     * @var smallint
     */
    public $id_unidad = 0;
    
    /**
     * Short description of attribute unidad_nombre
     *
     * @access public
     * @var string
     */
    public $unidad_nombre = '';
    
    
    
	// --- OPERATIONS ---
	
	
	/**
	 * Busca todas la Unidades del Hospital
	 *
	 * @param 
	 * @name get_unidad
	 * @return Unidad[]
	 */
	function get_unidad(){
		
		$sql = "SELECT id_unidad, unidad_nombre
				FROM unidad
				ORDER BY id_unidad ASC ";
		
		$bd = new Basedatos();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i] = new Unidad();
			$arreglodatos[$i]->id_unidad = $res['id_unidad'];
			$arreglodatos[$i++]->unidad_nombre = $res['unidad_nombre'];
			
		}
		
		return $arreglodatos;
	}
	
}