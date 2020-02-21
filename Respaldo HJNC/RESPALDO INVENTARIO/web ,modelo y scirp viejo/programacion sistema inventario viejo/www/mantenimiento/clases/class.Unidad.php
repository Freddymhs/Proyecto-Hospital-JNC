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
     * Short description of attribute nombre_unidad
     *
     * @access public
     * @var string
     */
    public $nombre_unidad = '';
    
    
    
	// --- OPERATIONS ---
	
	
	/**
	 * Busca todas la Unidades del Hospital
	 *
	 * @param 
	 * @name get_unidad
	 * @return Unidad[]
	 */
	function get_unidad(){
		
		$sql = "SELECT id_unidad, nombre_unidad
				FROM unidad
				ORDER BY nombre_unidad ASC ";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_mantenimiento($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i] = new Unidad();
			$arreglodatos[$i]->id_unidad = $res['id_unidad'];
			$arreglodatos[$i++]->nombre_unidad = $res['nombre_unidad'];
			
		}
		
		return $arreglodatos;
	}
	
	/**
	 * Busca el nombre de una Unidad
	 *
	 * @param 
	 * @name get_unidadnombre
	 * @return Unidad[]
	 */
	function get_unidadnombre($unidad){
		
		$sql = "SELECT id_unidad
		        FROM unidad
		        WHERE nombre_unidad = '".$unidad."' ";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_mantenimiento($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i] = new Unidad();
			$arreglodatos[$i]->id_unidad = $res['id_unidad'];
			
		}
		
		return $arreglodatos;
	}
	
}