<?php

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/** Llamada clase Basedato **/
 include("class.Basedato.php");
/** Llamada clase Historial **/
 include("class.Historial.php");

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
	 * Verifica que una mac no exista en el sistema
	 *
	 * @param $mac
	 * @name ver_mac
	 * @return Boolean
	 */
	function ver_mac($mac){
		
		$sql = "SELECT mac
				FROM inventario_pc
				WHERE mac = '".$mac."' ";
		
		$db = new Basedato();
		$resultado = $db->ejecutar_sql_archivo($sql);
		$res = mysql_fetch_array($resultado);
		$aux = $res['mac'];
		
		return $aux;
		
	}
	
	
	/**
	 * Ingresar un inventario al sistema
	 *
	 * @param $id_unidad, $red, $ip, $mac, $netbios, $grupo, $usuario, $impresora, $telefono,$establecimiento,$serie_pc,$serie_monitor,$modelo_pc,$modelo_mon,$procesador,$disco_duro,$ram
	 * @name add_inventario
	 * @return Boolean
	 */
	function add_inventario($id_unidad,$red,$ip,$mac,$net,$grupo,$usuario,$impresora,$telefono,$serie_pc,$serie_monitor,$modelo_pc,$modelo_mon,$procesador,$disco_duro,$ram){
		
		$inv = new Inventario_pc();
		$res = $inv->ver_mac($mac);
		
		if($res){
			
			return 0;
			
		}else{
			
			$sql = "INSERT INTO inventario_pc(id_unidad,red,ip,mac,netbios,grupo_trabajo,nombre_usuario,impresora,telefono,establecimiento,serie_pc,serie_monitor,modelo_pc,modelo_monitor,procesador,disco_duro,ram)
			                           VALUES(".$id_unidad.",".$red.",'".$ip."','".$mac."','".$net."','".$grupo."','".$usuario."','".$impresora."','".$telefono."','Hospital Dr Juan Noe C.','".$serie_pc."','".$serie_monitor."','".$modelo_pc."','".$modelo_mon."','".$procesador."','".$disco_duro."','".$ram."')";
			
			//$ut = new Utiles();
			//$ut->addlog("../servicios/msj_addregistro.log","$sql \n");
			
			$bd = new Basedato();
			$resultado = $bd->ejecutar_sql_archivo($sql);
			
			return $resultado;
		}
	}
	
	/**
	 * Recupera todas las ordenes de inventarios del sistema
	 *
	 * @param $mac, $ip , $unidad, $nombre
	 * @name get_inventarioall
	 * @return Intentario_pc[]
	 */
	function get_inventarioall($mac,$ip,$unidad,$nombre){
		
		if($unidad == ''){
		   $unidad = '%';
		}
		
		$sql = "SELECT inventario_pc.id_inventario, unidad.nombre_unidad, inventario_pc.red, inventario_pc.ip, inventario_pc.mac, inventario_pc.netbios, inventario_pc.grupo_trabajo, inventario_pc.nombre_usuario, inventario_pc.impresora, inventario_pc.telefono,
     				   inventario_pc.establecimiento,inventario_pc.serie_pc, inventario_pc.serie_monitor,inventario_pc.modelo_pc,inventario_pc.modelo_monitor,inventario_pc.procesador,inventario_pc.disco_duro,inventario_pc.ram
				FROM inventario_pc
					Inner Join unidad ON unidad.id_unidad = inventario_pc.id_unidad
				WHERE cast(mac as char)  LIKE cast('".$mac."' as char) 
					AND cast(ip as char)  LIKE cast('".$ip."' as char) 
					AND cast(inventario_pc.id_unidad as char)  LIKE cast('".$unidad."' as char) 
					AND inventario_pc.nombre_usuario LIKE '%$nombre%'";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i]['id_inventario'] = $res['id_inventario'];
			$arreglodatos[$i]['nombre_unidad'] = $res['nombre_unidad'];
			$arreglodatos[$i]['red'] = $res['red'];
			$arreglodatos[$i]['ip'] = $res['ip'];
			$arreglodatos[$i]['mac'] = $res['mac'];
			$arreglodatos[$i]['netbios'] = $res['netbios'];
			$arreglodatos[$i]['grupo_trabajo'] = $res['grupo_trabajo'];
			$arreglodatos[$i]['nombre_usuario'] = $res['nombre_usuario'];
			$arreglodatos[$i]['impresora'] = $res['impresora'];
			$arreglodatos[$i]['telefono'] = $res['telefono'];
			$arreglodatos[$i]['establecimiento'] = $res['establecimiento'];
			$arreglodatos[$i]['serie_pc'] = $res['serie_pc'];
			$arreglodatos[$i]['serie_monitor'] = $res['serie_monitor'];
			$arreglodatos[$i]['modelo_pc'] = $res['modelo_pc'];
			$arreglodatos[$i]['modelo_monitor'] = $res['modelo_monitor'];
			$arreglodatos[$i]['procesador'] = $res['procesador'];
			$arreglodatos[$i]['disco_duro'] = $res['disco_duro'];
			$arreglodatos[$i++]['ram'] = $res['ram'];
			
		}
		
		return $arreglodatos;
		
	}
	
	/**
	 * Recupera la orden especifica de inventario del sistema
	 *
	 * @param $id
	 * @name get_inventario
	 * @return Intentario_pc[]
	 */
	function get_inventario($id){
		
		$sql = "SELECT inventario_pc.id_inventario, unidad.id_unidad, unidad.nombre_unidad, inventario_pc.red, inventario_pc.ip, inventario_pc.mac, inventario_pc.netbios, inventario_pc.grupo_trabajo, inventario_pc.nombre_usuario, inventario_pc.impresora, inventario_pc.telefono,
	     				   inventario_pc.establecimiento,inventario_pc.serie_pc, inventario_pc.serie_monitor,inventario_pc.modelo_pc,inventario_pc.modelo_monitor,inventario_pc.procesador,inventario_pc.disco_duro,inventario_pc.ram
		
				FROM inventario_pc
					Inner Join unidad ON unidad.id_unidad = inventario_pc.id_unidad
				WHERE id_inventario = ".$id." ";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i]['id_inventario'] = $res['id_inventario'];
			$arreglodatos[$i]['id_unidad'] = $res['id_unidad'];
			$arreglodatos[$i]['nombre_unidad'] = $res['nombre_unidad'];
			$arreglodatos[$i]['red'] = $res['red'];
			$arreglodatos[$i]['ip'] = $res['ip'];
			$arreglodatos[$i]['mac'] = $res['mac'];
			$arreglodatos[$i]['netbios'] = $res['netbios'];
			$arreglodatos[$i]['grupo_trabajo'] = $res['grupo_trabajo'];
			$arreglodatos[$i]['nombre_usuario'] = $res['nombre_usuario'];
			$arreglodatos[$i]['impresora'] = $res['impresora'];
			$arreglodatos[$i]['telefono'] = $res['telefono'];
			$arreglodatos[$i]['establecimiento'] = $res['establecimiento'];
			$arreglodatos[$i]['serie_pc'] = $res['serie_pc'];
			$arreglodatos[$i]['serie_monitor'] = $res['serie_monitor'];
			$arreglodatos[$i]['modelo_pc'] = $res['modelo_pc'];
			$arreglodatos[$i]['modelo_monitor'] = $res['modelo_monitor'];
			$arreglodatos[$i]['procesador'] = $res['procesador'];
			$arreglodatos[$i]['disco_duro'] = $res['disco_duro'];
			$arreglodatos[$i++]['ram'] = $res['ram'];
			
		}
		
		return $arreglodatos;
	}
	
	/**
	 * Actualiza un registro del sistema del sistema
	 *
	 * @param $id, $id_unidad,$red,$ip,$mac,$net,$grupo,$usuario,$impresora,$telefono,$establecimiento,$serie_pc,$serie_monitor,$modelo_pc,$modelo_mon,$procesador,$disco_duro,$ram,$evento,$username
	 * @name upd_inventario
	 * @return Boolean
	 */
	function upd_inventario($id,$id_unidad,$red,$ip,$mac,$net,$grupo,$usuario,$impresora,$telefono,$establecimiento,$serie_pc,$serie_monitor,$modelo_pc,$modelo_mon,$procesador,$disco_duro,$ram,$evento,$username){
		
		//Se agrega historial de recambio 
		if($evento==2){
			$hit = new Historial();
			$hit->add_historial($id,$username);
		}
		
		$sql = "UPDATE inventario_pc 
				SET id_unidad = ".$id_unidad.", 
					red = ".$red.", 
					ip = '".$ip."', 
					mac = '".$mac."', 
					netbios = '".$net."', 
					grupo_trabajo = '".$grupo."', 
					nombre_usuario = '".$usuario."', 
					impresora = '".$impresora."',
					telefono = '".$telefono."',
					establecimiento = '".$establecimiento."',
					serie_pc = '".$serie_pc."',
					serie_monitor = '".$serie_monitor."',
					modelo_pc = '".$modelo_pc."',
					modelo_monitor = '".$modelo_mon."',
					procesador = '".$procesador."',
					disco_duro = '".$disco_duro."',
					ram = '".$ram."'
				WHERE id_inventario = ".$id." ";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		//$ut = new Utiles();
		//$ut->addlog("msj_updregistro.log"," $sql\n");
		
		return $resultado;
		
	}
	
	/**
	 * Busca todas la Unidades del Hospital para el formulario update
	 *
	 * @param 
	 * @name get_unidad
	 * @return Unidad[]
	 */
	function get_unidadupd(){
		
		$sql = "SELECT id_unidad, nombre_unidad
				FROM Unidad
				ORDER BY nombre_unidad ASC";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i]['id_unidad'] = $res['id_unidad'];
			$arreglodatos[$i++]['nombre_unidad'] = $res['nombre_unidad'];
			
		}
		
		return $arreglodatos;
	}
	
/**
	 * Recupera los datos especificos de un equipo
	 *
	 * @param $mac
	 * @name get_inventarioall
	 * @return Intentario_pc[]
	 */
	function get_detalleequipo($mac){
		
		$sql = "SELECT inventario_pc.id_inventario, unidad.nombre_unidad, inventario_pc.red, inventario_pc.ip, inventario_pc.mac, inventario_pc.netbios, inventario_pc.grupo_trabajo, inventario_pc.nombre_usuario, inventario_pc.impresora, 
     				   inventario_pc.telefono,inventario_pc.establecimiento,inventario_pc.serie_pc, inventario_pc.serie_monitor,inventario_pc.modelo_pc,inventario_pc.modelo_monitor,inventario_pc.procesador,inventario_pc.disco_duro,inventario_pc.ram
				FROM inventario_pc
					Inner Join unidad ON unidad.id_unidad = inventario_pc.id_unidad
				WHERE mac = '".$mac."' ";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
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
}