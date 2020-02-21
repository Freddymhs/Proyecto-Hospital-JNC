<?php

/*** Llamada clase Basedato ***/
 include("class.Basedatos.php");

class TipoExamen
{
    // --- ATTRIBUTES ---
    
    /**
     * Short description of attribute id_tipoexamen
     *
     * @access public
     * @var smallint
     */
    public $id_tipoexamen= 0;
    
    /**
     * Short description of attribute tipoexamen_nombre
     *
     * @access public
     * @var string
     */
    public $tipoexamen_nombre = '';
    
    
    
	// --- OPERATIONS ---
	
	
	/**
	 * Busca todos los tipos de examenes del Hospital
	 *
	 * @param 
	 * @name get_tipoExamen
	 * @return Unidad[]
	 */
	function get_tipoExamen(){
		
		$sql = "SELECT id_tipoexamen, tipoexamen_nombre
				FROM tipo_examen
				ORDER BY tipoexamen_nombre ASC ";
		
		$bd = new Basedatos();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i] = new TipoExamen();
			$arreglodatos[$i]->id_tipoexamen = $res['id_tipoexamen'];
			$arreglodatos[$i++]->tipoexamen_nombre = $res['tipoexamen_nombre'];
			
		}
		
		return $arreglodatos;
	}
	
}