<?php

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * Clase Inventario_pc
 **/

/**
 * Llamada clase Basedato
 **/
 include("class.Basedato.php");

class Inventario_pc
{
    // --- ATTRIBUTES ---
    
    /**
     * Short description of attribute id_inventario
     *
     * @access public
     * @var smallint
     */
    public $id_inventario = 0;
    
    /**
     * Short description of attribute id_unidad
     *
     * @access public
     * @var smallint
     */
    public $id_unidad = 0;
    
    /**
     * Short description of attribute red
     *
     * @access public
     * @var numeric
     */
    public $red = 0;
    
    /**
     * Short description of attribute ip
     *
     * @access public
     * @var char
     */
    public $ip = '';
    
    /**
     * Short description of attribute mac
     *
     * @access public
     * @var char
     */
    public $mac = '';
    
    /**
     * Short description of attribute netbios
     *
     * @access public
     * @var char
     */
    public $netbios = '';
    
    /**
     * Short description of attribute grupo_trabajo
     *
     * @access public
     * @var char
     */
    public $grupo_trabajo = '';
    
    /**
     * Short description of attribute nombre_usuario
     *
     * @access public
     * @var char
     */
    public $nombre_usuario = '';
    
    /**
     * Short description of attribute impresora
     *
     * @access public
     * @var char
     */
    public $impresora = '';
    
    /**
     * Short description of attribute telefono
     *
     * @access public
     * @var char
     */
    public $telefono= 0;
    
    /**
     * Short description of attribute establecimiento
     *
     * @access public
     * @var char
     */
    public $establecimiento= '';
    
    /**
     * Short description of attribute serie_pc
     *
     * @access public
     * @var char
     */
    public $serie_pc= '';
    
    /**
     * Short description of attribute serie_monitor
     *
     * @access public
     * @var char
     */
    public $serie_monitor= '';
    
    /**
     * Short description of attribute modelo_pc
     *
     * @access public
     * @var char
     */
    public $modelo_pc= '';
    
    /**
     * Short description of attribute modelo_monitor
     *
     * @access public
     * @var char
     */
    public $modelo_monitor= '';
    
    /**
     * Short description of attribute procesador
     *
     * @access public
     * @var char
     */
    public $procesador= '';
    
    /**
     * Short description of attribute disco_duro
     *
     * @access public
     * @var char
     */
    public $disco_duro= '';
    
    /**
     * Short description of attribute ram
     *
     * @access public
     * @var char
     */
    public $ram= '';
    
    
	// --- OPERATIONS ---
	
	
	/**
	 * Recupera los datos especificos de un equipo
	 *
	 * @param $mac
	 * @name get_inventarioall
	 * @return Intentario_pc[]
	 */
	function get_inventarioall($mac){
		
		$sql = "SELECT inventario_pc.id_inventario, unidad.nombre_unidad, inventario_pc.red, inventario_pc.ip, inventario_pc.mac, inventario_pc.netbios, inventario_pc.grupo_trabajo, inventario_pc.nombre_usuario, inventario_pc.impresora, 
     				   inventario_pc.telefono,inventario_pc.establecimiento,inventario_pc.serie_pc, inventario_pc.serie_monitor,inventario_pc.modelo_pc,inventario_pc.modelo_monitor,inventario_pc.procesador,inventario_pc.disco_duro,inventario_pc.ram
				FROM inventario_pc
					Inner Join unidad ON unidad.id_unidad = inventario_pc.id_unidad
				WHERE mac = '".$mac."' ";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_inventario($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i]['ip'] = $res['ip'];
			$arreglodatos[$i]['serie_monitor'] = $res['serie_monitor'];
			$arreglodatos[$i]['grupo_trabajo'] = $res['grupo_trabajo'];
			$arreglodatos[$i]['nombre_unidad'] = $res['nombre_unidad'];
			$arreglodatos[$i]['netbios'] = $res['netbios'];
			$arreglodatos[$i]['modelo_pc'] = $res['modelo_pc'];
			$arreglodatos[$i]['serie_pc'] = $res['serie_pc'];
			$arreglodatos[$i]['nombre_usuario'] = $res['nombre_usuario'];
			$arreglodatos[$i]['modelo_monitor'] = $res['modelo_monitor'];
			$arreglodatos[$i]['procesador'] = $res['procesador'];
			$arreglodatos[$i]['disco_duro'] = $res['disco_duro'];
			$arreglodatos[$i]['ram'] = $res['ram'];
			
		}
		
		return $arreglodatos;
		
	}
	
   /**
	 * Recupera todos los equipo del inventario 
	 *
	 * @param $mac,$usuario,$unidad
	 * @name get_inventarioequipo
	 * @return Intentario_pc[]
	 */
	function get_inventarioequipo($mac,$usuario,$unidad){
		
		$sql = "SELECT inventario_pc.id_inventario, unidad.nombre_unidad, inventario_pc.red, inventario_pc.ip, inventario_pc.mac, inventario_pc.netbios, inventario_pc.grupo_trabajo, inventario_pc.nombre_usuario, inventario_pc.impresora, 
     				   inventario_pc.telefono,inventario_pc.establecimiento,inventario_pc.serie_pc, inventario_pc.serie_monitor,inventario_pc.modelo_pc,inventario_pc.modelo_monitor,inventario_pc.procesador,inventario_pc.disco_duro,inventario_pc.ram
				FROM inventario_pc
					Inner Join unidad ON unidad.id_unidad = inventario_pc.id_unidad
				WHERE cast(inventario_pc.mac as char) like cast('".$mac."' as char)
				  AND cast(inventario_pc.id_unidad as char)  LIKE cast('".$unidad."' as char) 
				  AND inventario_pc.nombre_usuario LIKE '%$usuario%'";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_inventario($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i]['ip'] = $res['ip'];
			$arreglodatos[$i]['mac'] = $res['mac'];
			$arreglodatos[$i]['serie_monitor'] = $res['serie_monitor'];
			$arreglodatos[$i]['grupo_trabajo'] = $res['grupo_trabajo'];
			$arreglodatos[$i]['nombre_unidad'] = $res['nombre_unidad'];
			$arreglodatos[$i]['netbios'] = $res['netbios'];
			$arreglodatos[$i]['modelo_pc'] = $res['modelo_pc'];
			$arreglodatos[$i]['serie_pc'] = $res['serie_pc'];
			$arreglodatos[$i]['nombre_usuario'] = $res['nombre_usuario'];
			$arreglodatos[$i]['modelo_monitor'] = $res['modelo_monitor'];
			$arreglodatos[$i]['procesador'] = $res['procesador'];
			$arreglodatos[$i]['disco_duro'] = $res['disco_duro'];
			$arreglodatos[$i++]['ram'] = $res['ram'];
			
		}
		
		return $arreglodatos;
		
	}

}